<?php

/*********************************************************************

 freo | プロフィール (2010/09/01)

 Copyright(C) 2009-2010 freo.jp

*********************************************************************/

/* メイン処理 */
function freo_main()
{
	global $freo;

	//パラメータ検証
	if (!isset($_GET['id']) and isset($freo->parameters[1])) {
		$_GET['id'] = $freo->parameters[1];
	}
	if (!isset($_GET['id']) or !preg_match('/^[\w\-]+$/', $_GET['id'])) {
		freo_error('表示したいユーザーを指定してください。');
	}

	//ユーザー取得
	$stmt = $freo->pdo->prepare('SELECT * FROM ' . FREO_DATABASE_PREFIX . 'users WHERE id = :id');
	$stmt->bindValue(':id', $_GET['id']);
	$flag = $stmt->execute();
	if (!$flag) {
		freo_error($stmt->errorInfo());
	}

	if ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$user = $data;
	} else {
		freo_error('指定されたユーザーが見つかりません。');
	}

	//データ割当
	$freo->smarty->assign(array(
		'token' => freo_token('create'),
		'user'  => $user
	));

	return;
}

?>
