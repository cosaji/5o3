<?php

/*********************************************************************

 freo | 管理画面 | メディア管理 (2010/12/22)

 Copyright(C) 2009-2010 freo.jp

*********************************************************************/

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

	//親ディレクトリ取得
	$path = $_GET['path'];

	if (preg_match('/(.+)\/$/', $path, $matches)) {
		$path = $matches[1];
	}
	$pos = strrpos($path, '/');

	if ($pos > 0) {
		$parent = substr($path, 0, $pos) . '/';
	} else {
		$parent = '';
	}

	//メディア取得
	$directories = array();
	$files       = array();

	if ($dir = scandir(FREO_FILE_DIR . 'medias/' . $_GET['path'])) {
		foreach ($dir as $data) {
			if ($data == '.' or $data == '..') {
				continue;
			}

			if (is_dir(FREO_FILE_DIR . 'medias/' . $_GET['path'] . $data)) {
				$directories[] = array(
					'name'     => $data,
					'datetime' => date('Y-m-d H:i:s', filemtime(FREO_FILE_DIR . 'medias/' . $_GET['path'] . $data)),
				);
			} else {
				list($width, $height, $size) = freo_file(FREO_FILE_DIR . 'medias/' . $_GET['path'] . $data);

				if (is_file(FREO_FILE_DIR . 'media_thumbnails/' . $_GET['path'] . $data)) {
					list($thumbnail_width, $thumbnail_height, $thumbnail_size) = freo_file(FREO_FILE_DIR . 'media_thumbnails/' . $_GET['path'] . $data);

					$thumbnail = array(
						'name'     => $data,
						'datetime' => date('Y-m-d H:i:s', filemtime(FREO_FILE_DIR . 'media_thumbnails/' . $_GET['path'] . $data)),
						'width'    => $thumbnail_width,
						'height'   => $thumbnail_height,
						'size'     => $thumbnail_size,
					);
				} else {
					$thumbnail = array();
				}

				$files[] = array(
					'name'      => $data,
					'datetime'  => date('Y-m-d H:i:s', filemtime(FREO_FILE_DIR . 'medias/' . $_GET['path'] . $data)),
					'width'     => $width,
					'height'    => $height,
					'size'      => $size,
					'thumbnail' => $thumbnail
				);
			}
		}
	} else {
		freo_error('メディア格納ディレクトリ ' . FREO_FILE_DIR . 'medias/' . $_GET['path'] . ' を開けません。');
	}

	//データ割当
	$freo->smarty->assign(array(
		'token'       => freo_token('create', (isset($_GET['type']) ? $_GET['type'] : null)),
		'parent'      => $parent,
		'directories' => $directories,
		'files'       => $files
	));

	if (isset($_GET['type']) and $_GET['type'] == 'iframe') {
		//データ出力
		freo_output('internals/admin/iframe_media.html');
	}

	return;
}

?>
