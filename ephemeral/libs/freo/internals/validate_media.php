<?php

/*********************************************************************

 freo | 入力データ検証 | メディア登録 (2010/12/22)

 Copyright(C) 2009-2010 freo.jp

*********************************************************************/

/* 入力データ検証 */
function freo_validate_media($mode, $input)
{
	global $freo;

	$errors = array();

	if ($mode == 'file') {
		//ファイル名
		if ($input['media']['file'] == '') {
			$errors[] = 'ファイル名が入力されていません。';
		} elseif (!preg_match('/^[\w\-\.]+$/', $input['media']['file'])) {
			$errors[] = 'ファイル名は半角英数字で入力してください。';
		} elseif (mb_strlen($input['media']['file'], 'UTF-8') > 80) {
			$errors[] = 'ファイル名は80文字以内で入力してください。';
		} elseif (file_exists(FREO_FILE_DIR . 'medias/' . $input['media']['path'] . $input['media']['file'])) {
			$errors[] = $input['media']['file'] . 'はすでに存在します。';
		}
	} elseif ($mode == 'directory') {
		//ディレクトリ名
		if ($input['media']['directory'] == '') {
			$errors[] = 'ディレクトリ名が入力されていません。';
		} elseif (!preg_match('/^[\w\-\/]+$/', $input['media']['directory'])) {
			$errors[] = 'ディレクトリ名は半角英数字で入力してください。';
		} elseif (mb_strlen($input['media']['directory'], 'UTF-8') > 80) {
			$errors[] = 'ディレクトリ名は80文字以内で入力してください。';
		} elseif (file_exists(FREO_FILE_DIR . 'medias/' . $input['media']['path'] . $input['media']['directory'])) {
			$errors[] = $input['media']['path'] . $input['media']['directory'] . '/はすでに存在します。';
		}
	} else {
		//アップロード先
		if ($input['media']['path'] != '') {
			if (!preg_match('/^[\w\-\/]+$/', $input['media']['path'])) {
				$errors[] = 'アップロード先は半角英数字で入力してください。';
			} elseif (mb_strlen($input['media']['path'], 'UTF-8') > 255) {
				$errors[] = 'アップロード先は255文字以内で入力してください。';
			}
		}

		//アップロード項目数取得
		$file_count = count($input['media']['file']);

		//ファイル
		if ($input['media']['file'][0] == '') {
			$errors[] = 'ファイルが入力されていません。';
		}

		$filenames = array();
		for ($i = 0; $i < $file_count; $i++) {
			if ($input['media']['file'][$i] == '') {
				continue;
			}

			if (isset($filenames[$input['media']['file'][$i]])) {
				$errors[] = 'ファイル名はすべて異なるものを入力してください。';
			} elseif (!$freo->config['media']['filename'] and !preg_match('/^[\w\.\~\-\&\#\+\=\;\@\%]+$/', $input['media']['file'][$i])) {
				$errors[] = 'ファイル名は半角英数字で入力してください。';
			} elseif (!$freo->config['media']['filename'] and mb_strlen($input['media']['file'][$i], 'UTF-8') > 80) {
				$errors[] = 'ファイル名は80文字以内で入力してください。';
			} elseif ($mode == 'insert' and !$freo->config['media']['filename'] and file_exists(FREO_FILE_DIR . 'medias/' . $input['media']['path'] . $input['media']['file'][$i])) {
				$errors[] = $input['media']['path'] . $input['media']['file'][$i] . 'はすでにアップロードされています。';
			}

			$filenames[$input['media']['file'][$i]] = true;
		}
	}

	return $errors;
}

?>
