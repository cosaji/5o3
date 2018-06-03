<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="ja">
	<head>
		<title>ひとさじ</title>
		<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
		<meta http-equiv="content-type" content="text/html;charset=UTF-8">
		<link href="../main.css" rel="stylesheet" type="text/css" media="all">
		<link href="img.css" rel="stylesheet" type="text/css" media="all">
		<!--jQuery Masonry-->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
		<script type="text/javascript" src="../js/jquery.masonry.min.js"></script>
		<script type="text/javascript">  
			$(function(){
				$('.wrap').masonry();
			})
		</script>
		<script type="text/javascript">
			$(function(){
				var $container = $('#.wrap');
				$container.imagesLoaded( function(){
					$container.masonry({
						itemSelector : '.box'
					});
				});
			});
		</script>
	</head>
	<body>
		<div id="container">
			<?php
				$file_origin = pathinfo(__FILE__);
				include_once(dirname(__FILE__).'/../header.php');
			?>
			<?php include("img_navi.php"); ?>
		<div id="main"><!--本文-->		
			<h2>the SOLGERs (pixiv Fantasia 5)</h2>
			<h3>2011</h3>
			<p>
				たのしいゾルガー家まとめ<br>
			</p>
				<div class="wrap">
					<div class="box">
						<IMG SRC="xxx/sol_02.jpg" height="400" width="300"><br><br>
						バレンタイン！<br>
					</div>
					<div class="box">
						<IMG SRC="xxx/sol_child03.jpg" height="255" width="300"><br><br>
						なかよし<br>
					</div>
					<div class="box">
						<IMG SRC="xxx/sol_03.jpg" height="240" width="300"><br><br>
						みんなでおやすみ<br>
					</div>
					<div class="box">
						<IMG SRC="xxx/sol_01.jpg" height="409" width="300"><br><br>
						家族<br>
					</div>
					<div class="box">
						<IMG SRC="xxx/sol_child02.jpg" height="400" width="300"><br><br>
						長女と長男と次男<br>
						このあと次女も産まれます こだくさん<br>
					</div>
					<div class="box">
						<IMG SRC="xxx/sol_child01.jpg" height="213" width="300"><br><br>
						ぬいぐるみのひつじに話しかけちゃう長女<br>
					</div>
					<div class="box">
						<IMG SRC="xxx/sol_child04.jpg" height="225" width="300"><br><br>
						ぱぱだいすき<br>
					</div>
				</div> 
			</div><!--本文-->
			<?php include("../footer.php"); ?>
		</div>
	</body>
</html>