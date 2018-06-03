<?php

/*********************************************************************

 新着トラックバック表示プラグイン (2010/09/01)

 Copyright(C) 2009-2010 freo.jp

*********************************************************************/

//外部ファイル読み込み
require_once FREO_MAIN_DIR . 'freo/internals/security_trackback.php';

/* メイン処理 */
function freo_display_trackback_recently()
{
	global $freo;

	//トラックバック取得
	$stmt = $freo->pdo->prepare('SELECT * FROM ' . FREO_DATABASE_PREFIX . 'trackbacks ORDER BY id DESC LIMIT :limit');
	$stmt->bindValue(':limit', intval($freo->config['plugin']['trackback_recently']['default_limit']), PDO::PARAM_INT);
	$flag = $stmt->execute();
	if (!$flag) {
		freo_error($stmt->errorInfo());
	}

	$trackbacks = array();
	$entries    = array();
	$pages      = array();
	while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
		if ($data['entry_id']) {
			$entries[] = intval($data['entry_id']);
		} elseif ($data['page_id']) {
			$pages[] = $freo->pdo->quote($data['page_id']);
		}

		$trackbacks[$data['id']] = $data;
	}

	//トラックバック保護データ取得
	$trackback_securities = freo_security_trackback('user', array_keys($trackbacks));

	foreach ($trackback_securities as $id => $security) {
		if (!$security) {
			continue;
		}

		$trackbacks[$id]['name']  = $freo->config['trackback']['approve_name'];
		$trackbacks[$id]['url']   = null;
		$trackbacks[$id]['ip']    = null;
		$trackbacks[$id]['title'] = null;
		$trackbacks[$id]['text']  = $freo->config['trackback']['approve_text'];
	}

	//エントリータイトル取得
	if (!empty($entries)) {
		$stmt = $freo->pdo->query('SELECT id, title FROM ' . FREO_DATABASE_PREFIX . 'entries WHERE id IN(' . implode(',', $entries) . ')');
		if (!$stmt) {
			freo_error($freo->pdo->errorInfo());
		}

		$entries = array();
		while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$entries[$data['id']] = $data;
		}
	}

	//ページタイトル取得
	if (!empty($pages)) {
		$stmt = $freo->pdo->query('SELECT id, title FROM ' . FREO_DATABASE_PREFIX . 'pages WHERE id IN(' . implode(',', $pages) . ')');
		if (!$stmt) {
			freo_error($freo->pdo->errorInfo());
		}

		$pages = array();
		while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$pages[$data['id']] = $data;
		}
	}

	//データ割当
	$freo->smarty->assign(array(
		'plugin_trackback_recentries'          => $trackbacks,
		'plugin_trackback_recently_securities' => $trackback_securities,
		'plugin_trackback_recently_entries'    => $entries,
		'plugin_trackback_recently_pages'      => $pages
	));

	return;
}

?>
