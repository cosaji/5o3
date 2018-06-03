<?php

/*********************************************************************

 カテゴリー記事数表示プラグイン (2010/09/01)

 Copyright(C) 2009-2010 freo.jp

*********************************************************************/

/* メイン処理 */
function freo_display_category_count()
{
	global $freo;

	//カテゴリーごとの記事数取得
	$stmt = $freo->pdo->prepare('SELECT category_id, COUNT(*) FROM ' . FREO_DATABASE_PREFIX . 'entries LEFT JOIN ' . FREO_DATABASE_PREFIX . 'category_sets ON id = entry_id WHERE approved = \'yes\' AND (status = \'publish\' OR (status = \'future\' AND datetime <= :now1)) AND (close IS NULL OR close >= :now2) GROUP BY category_id');
	$stmt->bindValue(':now1', date('Y-m-d H:i:s'));
	$stmt->bindValue(':now2', date('Y-m-d H:i:s'));
	$flag = $stmt->execute();
	if (!$flag) {
		freo_error($stmt->errorInfo());
	}

	$category_counts = array();
	while ($data = $stmt->fetch(PDO::FETCH_NUM)) {
		$category_counts[$data[0]] = $data[1];
	}

	//データ割当
	$freo->smarty->assign(array(
		'plugin_category_counts' => $category_counts
	));

	return;
}

?>
