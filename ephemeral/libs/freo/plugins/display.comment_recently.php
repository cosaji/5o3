<?php

/*********************************************************************

 新着コメント表示プラグイン (2010/09/01)

 Copyright(C) 2009-2010 freo.jp

*********************************************************************/

//外部ファイル読み込み
require_once FREO_MAIN_DIR . 'freo/internals/security_comment.php';

/* メイン処理 */
function freo_display_comment_recently()
{
	global $freo;

	//コメント取得
	$stmt = $freo->pdo->prepare('SELECT * FROM ' . FREO_DATABASE_PREFIX . 'comments ORDER BY id DESC LIMIT :limit');
	$stmt->bindValue(':limit', intval($freo->config['plugin']['comment_recently']['default_limit']), PDO::PARAM_INT);
	$flag = $stmt->execute();
	if (!$flag) {
		freo_error($stmt->errorInfo());
	}

	$comments = array();
	$entries  = array();
	$pages    = array();
	while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
		if ($data['entry_id']) {
			$entries[] = intval($data['entry_id']);
		} elseif ($data['page_id']) {
			$pages[] = $freo->pdo->quote($data['page_id']);
		}

		$comments[$data['id']] = $data;
	}

	//コメント保護データ取得
	$comment_securities = freo_security_comment('user', array_keys($comments));

	foreach ($comment_securities as $id => $security) {
		if (!$security) {
			continue;
		}

		$comments[$id]['user_id'] = null;
		$comments[$id]['name']    = ($comments[$id]['approved'] == 'no') ? $freo->config['comment']['approve_name'] : $freo->config['comment']['restriction_name'];
		$comments[$id]['mail']    = null;
		$comments[$id]['url']     = null;
		$comments[$id]['ip']      = null;
		$comments[$id]['text']    = ($comments[$id]['approved'] == 'no') ? $freo->config['comment']['approve_text'] : $freo->config['comment']['restriction_text'];
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
		'plugin_comment_recentries'          => $comments,
		'plugin_comment_recently_securities' => $comment_securities,
		'plugin_comment_recently_entries'    => $entries,
		'plugin_comment_recently_pages'      => $pages
	));

	return;
}

?>
