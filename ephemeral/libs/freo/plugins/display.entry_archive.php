<?php

/*********************************************************************

 エントリーアーカイブ表示プラグイン (2010/09/01)

 Copyright(C) 2009-2010 freo.jp

*********************************************************************/

/* メイン処理 */
function freo_display_entry_archive()
{
	global $freo;

	//エントリー取得
	if (FREO_DATABASE_TYPE == 'mysql') {
		$stmt = $freo->pdo->prepare('SELECT DATE_FORMAT(datetime, \'%Y-%m\') AS month, COUNT(*) AS count FROM ' . FREO_DATABASE_PREFIX . 'entries WHERE approved = \'yes\' AND (status = \'publish\' OR (status = \'future\' AND datetime <= :now1)) AND display = \'publish\' AND (close IS NULL OR close >= :now2) GROUP BY month ORDER BY month DESC');
	} else {
		$stmt = $freo->pdo->prepare('SELECT STRFTIME(\'%Y-%m\', datetime) AS month, COUNT(*) AS count FROM ' . FREO_DATABASE_PREFIX . 'entries WHERE approved = \'yes\' AND (status = \'publish\' OR (status = \'future\' AND datetime <= :now1)) AND display = \'publish\' AND (close IS NULL OR close >= :now2) GROUP BY month ORDER BY month DESC');
	}
	$stmt->bindValue(':now1', date('Y-m-d H:i:s'));
	$stmt->bindValue(':now2', date('Y-m-d H:i:s'));
	$flag = $stmt->execute();
	if (!$flag) {
		freo_error($stmt->errorInfo());
	}

	$archives = array();
	while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
		if (preg_match('/^(\d\d\d\d)\-(\d\d)$/', $data['month'], $matches)) {
			$archives[] = array(
				'year'  => $matches[1],
				'month' => $matches[2],
				'count' => $data['count']
			);
		}
	}

	//データ割当
	$freo->smarty->assign(array(
		'plugin_entry_archives' => $archives
	));

	return;
}

?>
