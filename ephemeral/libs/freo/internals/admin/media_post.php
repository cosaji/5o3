<?php

/*********************************************************************

 freo | 管理画面 | メディア登録 (2011/12/17)

 Copyright(C) 2009-2011 freo.jp

*********************************************************************/

/* メイン処理 */
function freo_main()
{
	global $freo;

	//ログイン状態確認
	if ($freo->user['authority'] != 'root' and $freo->user['authority'] != 'author') {
		freo_redirect('login', true);
	}

	//入力データ確認
	if (empty($_SESSION['input'])) {
		freo_redirect('admin/media?error=1' . (isset($_GET['type']) ? '&type=' . $_GET['type'] : ''));
	}

	//ワンタイムトークン確認
	if (!freo_token('check', (isset($_GET['type']) ? $_GET['type'] : null))) {
		freo_redirect('admin/media?error=1' . (isset($_GET['type']) ? '&type=' . $_GET['type'] : ''));
	}

	//入力データ取得
	$media = $_SESSION['input']['media'];

	//アップロード先取得
	$file_dir      = FREO_FILE_DIR . 'medias/' . ($media['path'] ? $media['path'] . '/' : '');
	$thumbnail_dir = FREO_FILE_DIR . 'media_thumbnails/' . ($media['path'] ? $media['path'] . '/' : '');

	if ($media['exec'] == 'rename_directory') {
		//ディレクトリ名変更
		if (!rename($file_dir . $media['directory_org'], $file_dir . $media['directory'])) {
			freo_error('ディレクトリ ' . $file_dir . $media['directory_org'] . ' の名前を変更できません。');
		}

		//サムネイル用ディレクトリ名変更
		if (file_exists($thumbnail_dir . $media['directory_org'])) {
			if (!rename($thumbnail_dir . $media['directory_org'], $thumbnail_dir . $media['directory'])) {
				freo_error('ディレクトリ ' . $thumbnail_dir . $media['directory_org'] . ' の名前を変更できません。');
			}
		}
	} elseif ($media['exec'] == 'insert_directory') {
		//ディレクトリ作成
		if (!freo_mkdir($file_dir . $media['directory'], FREO_PERMISSION_DIR)) {
			freo_error('ディレクトリ ' . $file_dir . $media['directory'] . ' を作成できません。');
		}
	} elseif ($media['exec'] == 'rename') {
		//ファイル名変更
		if (!rename($file_dir . $media['file_org'], $file_dir . $media['file'])) {
			freo_error('ファイル ' . $file_dir . $media['file_org'] . ' の名前を変更できません。');
		}

		//サムネイル名変更
		if (file_exists($thumbnail_dir . $media['file_org'])) {
			if (!rename($thumbnail_dir . $media['file_org'], $thumbnail_dir . $media['file'])) {
				freo_error('ファイル ' . $thumbnail_dir . $media['file_org'] . ' の名前を変更できません。');
			}
		}
	} else {
		//ファイル削除
		if (isset($media['file_org']) and !unlink(FREO_FILE_DIR . 'medias/' . ($media['path'] ? $media['path'] . '/' : '') . $media['file_org'])) {
			freo_error('ファイル ' . $file_dir . $media['file_org'] . ' を削除できません。');
		}

		//ファイル保存
		if (!freo_mkdir($file_dir, FREO_PERMISSION_DIR)) {
			freo_error('ディレクトリ ' . $file_dir . ' を作成できません。');
		}

		//アップロード項目数取得
		$file_count = count($media['file']);

		//現在日時取得
		$now = time();

		for ($i = 0; $i < $file_count; $i++) {
			if ($media['file'][$i] == '') {
				continue;
			}

			$org_media = $media['file'][$i];

			if (rename(FREO_FILE_DIR . 'temporaries/medias/' . $media['file'][$i], $file_dir . $media['file'][$i])) {
				if ($freo->config['media']['filename'] and preg_match('/\.(.*)$/', $media['file'][$i], $matches)) {
					$filename = date('YmdHis', $now + $i) . '.' . $matches[1];

					if (rename($file_dir . $media['file'][$i], $file_dir . $filename)) {
						$media['file'][$i] = $filename;
					} else {
						freo_error('ファイル ' . $file_dir . $media['file'][$i] . ' の名前を変更できません。');
					}
				}

				chmod($file_dir . $media['file'][$i], FREO_PERMISSION_FILE);
			} else {
				freo_error('ファイル ' . FREO_FILE_DIR . 'temporaries/medias/' . $media['file'][$i] . ' を移動できません。');
			}

			if ($freo->config['media']['thumbnail']) {
				$thumbnail_dir = FREO_FILE_DIR . 'media_thumbnails/' . ($media['path'] ? $media['path'] . '/' : '');
				$temporary_dir = FREO_FILE_DIR . 'temporaries/media_thumbnails/';

				if ($org_media and file_exists($temporary_dir . $org_media)) {
					if (!freo_mkdir($thumbnail_dir, FREO_PERMISSION_DIR)) {
						freo_error('ディレクトリ ' . $thumbnail_dir . ' を作成できません。');
					}

					if (rename($temporary_dir . $org_media, $thumbnail_dir . $media['file'][$i])) {
						chmod($thumbnail_dir . $media['file'][$i], FREO_PERMISSION_FILE);
					} else {
						freo_error('ファイル ' . $temporary_dir . $org_media . ' を移動できません。');
					}
				}
			}
		}
	}

	//入力データ破棄
	$_SESSION['input'] = array();

	//ログ記録
	if (isset($media['directory_org'])) {
		freo_log('ディレクトリ名を変更しました。');
	} elseif (isset($media['directory'])) {
		freo_log('ディレクトリを新規に作成しました。');
	} elseif (isset($media['file_org'])) {
		freo_log('ファイル名を変更しました。');
	} else {
		freo_log('ファイルを新規に登録しました。');
	}

	//エントリー管理へ移動
	if (isset($media['directory_org'])) {
		$exec = 'rename_directory';
	} elseif (isset($media['directory'])) {
		$exec = 'insert_directory';
	} elseif (isset($media['file_org'])) {
		$exec = 'rename';
	} else {
		$exec = 'insert';
	}

	freo_redirect('admin/media?exec=' . $exec . (isset($media['path']) ? '&path=' . $media['path'] : '') . (isset($_GET['type']) ? '&type=' . $_GET['type'] : ''));

	return;
}

?>
