<?php

/*********************************************************************

 freo | 管理画面 | メディア入力 (2011/12/17)

 Copyright(C) 2009-2011 freo.jp

*********************************************************************/

//外部ファイル読み込み
require_once FREO_MAIN_DIR . 'freo/internals/validate_media.php';

/* メイン処理 */
function freo_main()
{
	global $freo;

	//ログイン状態確認
	if ($freo->user['authority'] != 'root' and $freo->user['authority'] != 'author') {
		freo_redirect('login', true);
	}

	//パラメータ検証
	if (!isset($_GET['path']) or !preg_match('/^[\w\-\/]+$/', $_GET['path'])) {
		$_GET['path'] = null;
	}

	//リクエストメソッドに応じた処理を実行
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		//ワンタイムトークン確認
		if (!freo_token('check', (isset($_GET['type']) ? $_GET['type'] : null))) {
			$freo->smarty->append('errors', '不正なアクセスです。');
		}

		if ($_POST['media']['exec'] == 'insert_directory' or $_POST['media']['exec'] == 'rename_directory') {
			//入力データ検証
			if (!$freo->smarty->get_template_vars('errors')) {
				$errors = freo_validate_media('directory', $_POST);

				if ($errors) {
					foreach ($errors as $error) {
						$freo->smarty->append('errors', $error);
					}
				}
			}
		} elseif ($_POST['media']['exec'] == 'rename') {
			//入力データ検証
			if (!$freo->smarty->get_template_vars('errors')) {
				$errors = freo_validate_media('file', $_POST);

				if ($errors) {
					foreach ($errors as $error) {
						$freo->smarty->append('errors', $error);
					}
				}
			}
		} else {
			//アップロード項目数取得
			$file_count = count($_FILES['media']['tmp_name']['file']);

			//アップロードデータ初期化
			for ($i = 0; $i < $file_count; $i++) {
				if (!isset($_FILES['media']['tmp_name']['file'][$i])) {
					$_FILES['media']['tmp_name']['file'][$i] = null;
				}
			}

			//アップロードデータ取得
			for ($i = 0; $i < $file_count; $i++) {
				if (is_uploaded_file($_FILES['media']['tmp_name']['file'][$i])) {
					$_POST['media']['file'][$i] = $_FILES['media']['name']['file'][$i];
				} else {
					$_POST['media']['file'][$i] = null;
				}
			}

			//入力データ検証
			if (!$freo->smarty->get_template_vars('errors')) {
				$errors = freo_validate_media(!empty($_POST['media']['file_org']) ? 'update' : 'insert', $_POST);

				if ($errors) {
					foreach ($errors as $error) {
						$freo->smarty->append('errors', $error);
					}
				}
			}

			//ファイルアップロード
			for ($i = 0; $i < $file_count; $i++) {
				$file_flag = false;

				if (!$freo->smarty->get_template_vars('errors')) {
					if (is_uploaded_file($_FILES['media']['tmp_name']['file'][$i])) {
						$temporary_dir = FREO_FILE_DIR . 'temporaries/medias/';

						if (move_uploaded_file($_FILES['media']['tmp_name']['file'][$i], $temporary_dir . $_FILES['media']['name']['file'][$i])) {
							chmod($temporary_dir . $_FILES['media']['name']['file'][$i], FREO_PERMISSION_FILE);

							$file_flag = true;
						} else {
							$freo->smarty->append('errors', 'ファイルをアップロードできません。');
						}

						if ($file_flag) {
							if ($freo->config['media']['thumbnail']) {
								$thumbnail_width  = isset($_POST['media']['thumbnail_width'])  ? $_POST['media']['thumbnail_width']  : $freo->config['media']['thumbnail_width'];
								$thumbnail_height = isset($_POST['media']['thumbnail_height']) ? $_POST['media']['thumbnail_height'] : $freo->config['media']['thumbnail_height'];

								freo_resize($temporary_dir . $_FILES['media']['name']['file'][$i], FREO_FILE_DIR . 'temporaries/media_thumbnails/' . $_FILES['media']['name']['file'][$i], $thumbnail_width, $thumbnail_height);
							}
							if ($freo->config['media']['original']) {
								freo_resize($temporary_dir . $_FILES['media']['name']['file'][$i], $temporary_dir . $_FILES['media']['name']['file'][$i], $freo->config['media']['original_width'], $freo->config['media']['original_height']);
							}
						}
					}
				}
			}
		}

		//エラー確認
		if ($freo->smarty->get_template_vars('errors')) {
			//エラー表示
			$media = $_POST['media'];
		} else {
			$_SESSION['input'] = $_POST;

			//登録処理へ移動
			freo_redirect('admin/media_post?freo%5Btoken%5D=' . freo_token('create', (isset($_GET['type']) ? $_GET['type'] : null)) . (isset($_GET['type']) ? '&type=' . $_GET['type'] : ''));
		}
	} else {
		//新規データ設定
		$media = array(
			'thumbnail_width'  => $freo->config['media']['thumbnail_width'],
			'thumbnail_height' => $freo->config['media']['thumbnail_height']
		);
	}

	//ディレクトリ取得
	$dirs = freo_main_get_dir(FREO_FILE_DIR . 'medias/');

	$directories = array();
	foreach ($dirs as $dir) {
		$directories[] = preg_replace('/^' . preg_quote(FREO_FILE_DIR . 'medias/', '/') . '/', '', $dir);
	}

	//データ割当
	$freo->smarty->assign(array(
		'token'       => freo_token('create', (isset($_GET['type']) ? $_GET['type'] : null)),
		'directories' => $directories,
		'input' => array(
			'media' => $media
		)
	));

	if (isset($_GET['type']) and $_GET['type'] == 'iframe') {
		//データ出力
		freo_output('internals/admin/iframe_media_form.html');
	}

	return;
}

/* ディレクトリ取得 */
function freo_main_get_dir($path)
{
	global $freo;

	$files = array();

	if (!file_exists($path)) {
		return $files;
	}

	if ($dir = scandir($path)) {
		$tmp_directories = array();

		foreach ($dir as $data) {
			if ($data == '.' or $data == '..') {
				continue;
			}

			if (is_dir($path . $data)) {
				$tmp_directories[] = $data;
			}
		}

		$dir = $tmp_directories;
	}

	foreach ($dir as $data) {
		$files = array_merge($files, array($path . $data . '/'), freo_main_get_dir($path . $data . '/'));
	}

	return $files;
}

?>
