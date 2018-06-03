<?php

/*********************************************************************

 freo | 管理画面 | メディア削除 (2010/12/22)

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
	if (!isset($_GET['name']) or !preg_match('/^[\w\-\/\.]+$/', $_GET['name'])) {
		$_GET['name'] = null;
	}
	if (!isset($_GET['path']) or !preg_match('/^[\w\-\/]+$/', $_GET['path'])) {
		$_GET['path'] = null;
	}

	//ワンタイムトークン確認
	if (!freo_token('check', (isset($_GET['type']) ? $_GET['type'] : null))) {
		freo_redirect('admin/media?error=1' . (isset($_GET['type']) ? '&type=' . $_GET['type'] : ''));
	}

	if (empty($_GET['directory'])) {
		//ファイル削除
		if (!unlink(FREO_FILE_DIR . 'medias/' . $_GET['path'] . $_GET['name'])) {
			freo_redirect('admin/media?error=1' . (isset($_GET['type']) ? '&type=' . $_GET['type'] : ''));
		}

		//サムネイル削除
		if (file_exists(FREO_FILE_DIR . 'media_thumbnails/' . $_GET['path'] . $_GET['name'])) {
			if (!unlink(FREO_FILE_DIR . 'media_thumbnails/' . $_GET['path'] . $_GET['name'])) {
				freo_redirect('admin/media?error=1' . (isset($_GET['type']) ? '&type=' . $_GET['type'] : ''));
			}
		}
	} else {
		//ディレクトリ削除
		if (!freo_rmdir(FREO_FILE_DIR . 'medias/' . $_GET['path'] . $_GET['name'])) {
			freo_redirect('admin/media?error=1' . (isset($_GET['type']) ? '&type=' . $_GET['type'] : ''));
		}

		//サムネイル用ディレクトリ削除
		if (!freo_rmdir(FREO_FILE_DIR . 'media_thumbnails/' . $_GET['path'] . $_GET['name'])) {
			freo_redirect('admin/media?error=1' . (isset($_GET['type']) ? '&type=' . $_GET['type'] : ''));
		}
	}

	//ログ記録
	if (empty($_GET['directory'])) {
		freo_log('ファイルを削除しました。');
	} else {
		freo_log('ディレクトリを削除しました。');
	}

	//メディア管理へ移動
	if (empty($_GET['directory'])) {
		$exec = 'delete';
	} else {
		$exec = 'delete_directory';
	}

	freo_redirect('admin/media?exec=' . $exec . '&name=' . $_GET['name'] . '&path=' . $_GET['path'] . (isset($_GET['type']) ? '&type=' . $_GET['type'] : ''));

	return;
}

?>
