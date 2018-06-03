<?php

/*********************************************************************

 freo | ファイル表示 (2010/11/06)

 Copyright(C) 2009-2010 freo.jp

*********************************************************************/

//外部ファイル読み込み
require_once FREO_MAIN_DIR . 'freo/internals/security_entry.php';
require_once FREO_MAIN_DIR . 'freo/internals/security_page.php';
require_once FREO_MAIN_DIR . 'freo/internals/filter_entry.php';
require_once FREO_MAIN_DIR . 'freo/internals/filter_page.php';

/* メイン処理 */
function freo_main()
{
	global $freo;

	//パラメータ検証
	if (!isset($_GET['mode']) and isset($freo->parameters[1])) {
		$_GET['mode'] = $freo->parameters[1];
	}
	if (!isset($_GET['mode']) or !preg_match('/^[\w\-]+$/', $_GET['mode'])) {
		freo_error('表示モードを指定してください。');
	}

	if (!isset($_GET['width']) or !preg_match('/^\d+$/', $_GET['width']) or $_GET['width'] < 1) {
		$_GET['width'] = null;
	}
	if (!isset($_GET['height']) or !preg_match('/^\d+$/', $_GET['height']) or $_GET['height'] < 1) {
		$_GET['height'] = null;
	}

	if ($_GET['mode'] == 'page') {
		if (!isset($_GET['id']) and isset($freo->parameters[2])) {
			$parameters = array();
			$i          = 1;
			while (isset($freo->parameters[++$i])) {
				if (!$freo->parameters[$i]) {
					continue;
				}

				$parameters[] = $freo->parameters[$i];
			}
			$_GET['id'] = implode('/', $parameters);

			if (preg_match('/(.+)\.\w+$/', $_GET['id'], $matches)) {
				$_GET['id'] = $matches[1];
			}
		}
		if (!isset($_GET['id']) or !preg_match('/^[\w\-\/]+$/', $_GET['id'])) {
			freo_error('表示したいページを指定してください。');
		}
	} else {
		if (!isset($_GET['id']) and isset($freo->parameters[2])) {
			$_GET['id'] = $freo->parameters[2];

			if (preg_match('/(.+)\.\w+$/', $_GET['id'], $matches)) {
				$_GET['id'] = $matches[1];
			}
		}
		if (!isset($_GET['id']) or !preg_match('/^\d+$/', $_GET['id']) or $_GET['id'] < 1) {
			$_GET['id'] = null;

			if (!isset($_GET['code']) and isset($freo->parameters[2])) {
				$_GET['code'] = $freo->parameters[2];
			}

			if (isset($_GET['code'])) {
				$stmt = $freo->pdo->prepare('SELECT id FROM ' . FREO_DATABASE_PREFIX . 'entries WHERE code = :code');
				$stmt->bindValue(':code',  $_GET['code']);
				$flag = $stmt->execute();
				if (!$flag) {
					freo_error($stmt->errorInfo());
				}

				if ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
					$_GET['id'] = $data['id'];
				}
			}

			if (!$_GET['id']) {
				freo_error('表示したいエントリーを指定してください。');
			}
		}
	}

	//ファイル取得
	if ($_GET['mode'] == 'page') {
		//ページ取得
		if (isset($_GET['type']) and $_GET['type'] == 'image') {
			$stmt = $freo->pdo->prepare('SELECT * FROM ' . FREO_DATABASE_PREFIX . 'pages WHERE id = :id AND approved = \'yes\' AND (status = \'publish\' OR (status = \'future\' AND datetime <= :now1)) AND (close IS NULL OR close >= :now2) AND image IS NOT NULL');
		} else {
			$stmt = $freo->pdo->prepare('SELECT * FROM ' . FREO_DATABASE_PREFIX . 'pages WHERE id = :id AND approved = \'yes\' AND (status = \'publish\' OR (status = \'future\' AND datetime <= :now1)) AND (close IS NULL OR close >= :now2) AND file IS NOT NULL');
		}
		$stmt->bindValue(':id',   $_GET['id']);
		$stmt->bindValue(':now1', date('Y-m-d H:i:s'));
		$stmt->bindValue(':now2', date('Y-m-d H:i:s'));
		$flag = $stmt->execute();
		if (!$flag) {
			freo_error($stmt->errorInfo());
		}

		if ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$page = $data;
		} else {
			freo_error('指定されたファイルが見つかりません。');
		}

		//ページフィルター取得
		$page_filters = freo_filter_page('user', array($_GET['id']));
		$page_filter  = $page_filters[$_GET['id']];

		if ($page_filter) {
			freo_error(str_replace('[$title]', $page['title'], $freo->config['page']['filter_title']));
		}

		//ページ保護データ取得
		$page_securities = freo_security_page('user', array($_GET['id']));
		$page_securitie  = $page_securities[$_GET['id']];

		if ($page_securitie) {
			freo_error(str_replace('[$title]', $page['title'], $freo->config['page']['restriction_title']));
		}

		if (isset($_GET['type']) and $_GET['type'] == 'image') {
			$filename = FREO_FILE_DIR . 'page_images/' . $page['id'] . '/' . $page['image'];
		} elseif ($freo->config['page']['thumbnail'] and file_exists(FREO_FILE_DIR . 'page_thumbnails/' . $page['id'] . '/' . $page['file']) and isset($_GET['type']) and $_GET['type'] == 'thumbnail') {
			$filename = FREO_FILE_DIR . 'page_thumbnails/' . $page['id'] . '/' . $page['file'];
		} else {
			$filename = FREO_FILE_DIR . 'page_files/' . $page['id'] . '/' . $page['file'];
		}
	} else {
		//エントリー取得
		if (isset($_GET['type']) and $_GET['type'] == 'image') {
			$stmt = $freo->pdo->prepare('SELECT * FROM ' . FREO_DATABASE_PREFIX . 'entries WHERE id = :id AND approved = \'yes\' AND (status = \'publish\' OR (status = \'future\' AND datetime <= :now1)) AND (close IS NULL OR close >= :now2) AND image IS NOT NULL');
		} else {
			$stmt = $freo->pdo->prepare('SELECT * FROM ' . FREO_DATABASE_PREFIX . 'entries WHERE id = :id AND approved = \'yes\' AND (status = \'publish\' OR (status = \'future\' AND datetime <= :now1)) AND (close IS NULL OR close >= :now2) AND file IS NOT NULL');
		}
		$stmt->bindValue(':id',   $_GET['id'], PDO::PARAM_INT);
		$stmt->bindValue(':now1', date('Y-m-d H:i:s'));
		$stmt->bindValue(':now2', date('Y-m-d H:i:s'));
		$flag = $stmt->execute();
		if (!$flag) {
			freo_error($stmt->errorInfo());
		}

		if ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$entry = $data;
		} else {
			freo_error('指定されたファイルが見つかりません。');
		}

		//エントリーフィルター取得
		$entry_filters = freo_filter_entry('user', array($_GET['id']));
		$entry_filter  = $entry_filters[$_GET['id']];

		if ($entry_filter) {
			freo_error(str_replace('[$title]', $entry['title'], $freo->config['entry']['filter_title']));
		}

		//エントリー保護データ取得
		$entry_securities = freo_security_entry('user', array($_GET['id']));
		$entry_securitie  = $entry_securities[$_GET['id']];

		if ($entry_securitie) {
			freo_error(str_replace('[$title]', $entry['title'], $freo->config['entry']['restriction_title']));
		}

		if (isset($_GET['type']) and $_GET['type'] == 'image') {
			$filename = FREO_FILE_DIR . 'entry_images/' . $entry['id'] . '/' . $entry['image'];
		} elseif ($freo->config['entry']['thumbnail'] and file_exists(FREO_FILE_DIR . 'entry_thumbnails/' . $entry['id'] . '/' . $entry['file']) and isset($_GET['type']) and $_GET['type'] == 'thumbnail') {
			$filename = FREO_FILE_DIR . 'entry_thumbnails/' . $entry['id'] . '/' . $entry['file'];
		} else {
			$filename = FREO_FILE_DIR . 'entry_files/' . $entry['id'] . '/' . $entry['file'];
		}
	}

	//変換チェック
	if (($freo->agent['type'] == 'mobile' and preg_match('/\.(gif|jpeg|jpg|jpe|png)$/i', $filename) and (($_GET['mode'] == 'page' and $freo->config['page']['thumbnail']) or ($_GET['mode'] == 'view' and $freo->config['entry']['thumbnail']))) or ($_GET['width'] and $_GET['height'])) {
		$flag = true;
	} else {
		$flag = false;
	}

	//出力ファイル名決定
	$output = $filename;

	if ($flag) {
		if ($freo->agent['career'] == 'docomo' and preg_match('/\.png$/i', $filename)) {
			$output = basename($filename) . '.gif';
		}
	}

	//データ出力
	header('Content-Type: ' . freo_mime($output));
/*
	if ($freo->agent['type'] == 'mobile') {
		header('Pragma: no-cache');
		header('Cache-Control: no-cache');
	}
*/
	if ($flag) {
		if ($_GET['width'] and $_GET['height']) {
			$max_width  = $_GET['width'];
			$max_height = $_GET['height'];
		} else {
			$max_width  = FREO_MOBILE_FILE_WIDTH;
			$max_height = FREO_MOBILE_FILE_HEIGHT;
		}

		freo_resize($filename, $output, $max_width, $max_height, true);
	} else {
		readfile($filename);
	}

	return;
}

?>
