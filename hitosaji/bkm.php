<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="ja">
	<head>
		<title>ひとさじ</title>
		<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
		<meta http-equiv="content-type" content="text/html;charset=UTF-8">
		<link href="main.css" rel="stylesheet" type="text/css" media="all">
	</head>
	<body>
		<div id="container">
			<?php include("header.php"); ?>
			<?php include("navi.php"); ?>
			<div id="main"><!--本文-->
					<h2>bookmarks</h2>
					<h3>bookomarks' lists</h3>
					<p><a href="#about">▼このサイトについて▼</a></p>
					<p>
						<table border="0" cellspacing="0" width="720">
							<tr  valign="top">
								<td width="225">
<?php

$sites[]=array('site'=>'a pois','name'=>'kb','url'=>'http://kwne.jp/~apois/','bannerUrl'=>'b/apois.gif',);
$sites[]=array('site'=>'[Carpe-DM]','name'=>'京作','url'=>'http://carpe-dm.sakura.ne.jp/','bannerUrl'=>'http://carpe-dm.sakura.ne.jp/banner.gif',);
$sites[]=array('site'=>'landmark','name'=>'かしわば','url'=>'http://landmark.konjiki.jp','bannerUrl'=>'http://landmark.konjiki.jp/banner.png',);
//$sites[]=array('site'=>'','name'=>'','url'=>'','bannerUrl'=>'',);



function showLink($str){
	$site=$str['site'];
	$name=$str['name'];
	$url=$str['url'];
	$bannerUrl=$str['bannerUrl'];

	$HTML=<<<EOD
<a href="$url" target="_blank">
<img src="$bannerUrl" alt="$name" height="40" width="200" border="0"><br>
$site</a>：{$name}さん
<br><br>
EOD;
	echo $HTML;
}	
?>
<!--■■■ A to Z ■■■-->
<b>illustration</b>（A to Z）<br><br>
<?php
	foreach($sites as $key => $value){
		showLink($sites[$key]);
	}
?>
<a href="http://abendgebet.jp/" target="_blank">
<img src="http://abendgebet.jp/icon/ag.gif" alt="OWLLIGHT" height="40" width="200" border="0"><br>
OWLLIGHT</a>：萩オスさん
<br><br>
<a href="http://nd60.moo.jp" target="_blank">
<img src="http://nd60.moo.jp/banner.gif" alt="Nd60" height="40" width="200" border="0"><br>
Nd60</a>：sumiさん
	<br><br>
<a href="http://side-b.jp/oka/index.html" target="_blank">
<img src="http://sunori.fc2web.com/rebana.gif" alt="REVIVE" height="40" width="200" border="0"><br>
REVIVE</a>：丘さん
	<br><br>
<a href="http://million-field.sakura.ne.jp/steelbeat/" target="_blank">
<img src="http://million-field.sakura.ne.jp/steelbeat/banner.jpg" alt="Steelbeat" height="40" width="200" border="0"><br>
Steelbeat</a>：鷹山弾さん

<!--■■■ あいうえお ■■■-->
</td>
<td width="225"><b>illustration</b>（123, あいうえお）
	<br><br>
<a href="http://sekitou.sub.jp/" target="_blank">
<img src="http://sekitou.sub.jp/banner.gif" alt="赤橙" height="40" width="200" border="0"><br>
赤橙</a>：ヨシツギさん
	<br><br>
<a href="http://tokeisou.client.jp/" target="_blank">
<img src="http://tokeisou.client.jp/banner.jpg" alt="とけいそう" height="40" width="200" border="0"><br>
とけいそう</a>：ちなさん
	<br><br>
<a href="http://nantala-kantala.sakura.ne.jp/" target="_blank">
<img src="http://nantala-kantala.sakura.ne.jp/nk.gif" alt="ナンタラカンタラ" height="40" width="200" border="0"><br>
ナンタラカンタラ</a>：ほにゃららさん
	<br><br>
<a href="http://tumetume.fuma-kotaro.com/" target="_blank">
<img src="b/hidume.jpg" alt="ヒヅメカギヅメ" height="40" width="200" border="0"><br>
ヒヅメカギヅメ</a>：myunさん
	<br><br>
<a href="http://rakugakijikan.ninja-web.net/" target="_blank">
<img src="b/rkgkjkn.gif" alt="楽描時間" height="40" width="200" border="0"><br>
楽描時間</a>：Ryo-ta.Hさん
	<br><br>
<a href="http://otowa.ciao.jp/" target="_blank">
<img src="http://otowa.ciao.jp/banner/woyoyo_b01.gif" alt="ヲヨヨ" height="40" width="200" border="0"><br>
ヲヨヨ</a>：吟さん

	</td><td width="">
<!--■■■ そのた ■■■-->
	<b>design</b><br><br>
<a href="http://www.balcolony.com/otakudesign/" target="_blank">オタクとデザイン</a>：染谷さん<br>
	<br><b>novels</b><br><br>
<a href="http://bio.hacca.jp/hinaya/" target="_blank">雛屋</a>：藤井環さん<br>
	<br><b>composer</b><br><br>
<a href="http://yanagi.ash.jp/" target="_blank">Irregular-beat</a>：yanagiさん<br>
<a href="http://hypersaw.blog33.fc2.com/" target="_blank">世界の片隅で紡ぐ音楽</a>：hypersawさん<br>
<a href="http://ameblo.jp/capmira/" target="_blank">どことなくなんとなく</a>：キャプテンミライさん<br>
<a href="http://mmmusic.yu-nagi.com/" target="_blank">トラボル亭</a>：トラボルタさん<br>

<!--■■■ ★ ■■■-->
	<br><b>+</b><br><br>
<a href="http://www.asukashinsha.jp/s/" target="_blank">季刊エス</a><br>

<!--■■■ SNS、ポータル ■■■-->
	<br><b>+</b><br><br>
<a href="http://www.creatorsbank.com/" target="_blank">CREATORSBANK</a><br>
<a href="http://piapro.jp/" target="_blank">PIAPRO</a><br>
<a href="http://www.pixiv.net/" target="_blank">pixiv</a><br>
<a href="http://www.tinami.com/" target="_blank">TINAMI</a><br>

<!--■■■ イベント ■■■-->
	<br><b>+</b><br><br>
<a href="http://www.comitia.co.jp/" target="_blank">COMITIA</a><br>
<a href="http://festa.pixiv.net/" target="_blank">pixivフェスタ</a><br>
<a href="http://market.pixiv.net/" target="_blank">pixivマーケット</a><br>

	<br><b>+</b><br><br>
<A href="http://www.dafont.com/ target="_blank">dafont.com</a><br>
<A href="http://www.eweb-design.com/" target="_blank">eWeb</a><br>
<a href="http://ja.wikipedia.org/wiki/" target="_blank">Wikipedia</a><br>
<A href="http://www.colordic.org/" target="_blank">原色大辞典</a><br>
<A href="http://chotto.art.coocan.jp/" target="_blank">ねこまたぎくらぶ</a><br>

	<br><b>+</b><br><br>
<a href="http://creativecommons.jp/" target="_blank">クリエイティブ・コモンズ・ジャパン</a><br>
	</td></tr>
	</table><br>
					</p>
					
					<a name="about"><h3>This site's information</h3></a>
					<p>
						<table width="" border="0" cellspacing="2" cellpadding="0">
							<tr>
								<td>site name：</td>
								<td><B>ひとさじ</B> ... hitosaji<br></td>
							</tr><tr>
								<td>master：</td>
								<td><B>匙 まりこ</B> ... SAJI Mariko<br></td>
							</tr><tr>
								<td>url：</td>
								<td>http://5o3/main.jp/hitosaji/</td>
							<tr valign="top">
								<td>banner：</td>
								<td>
									<img src="b.jpg" alt="banner" height="40" width="200" border="0">
									http://5o3/main.jp/hitosaji/b.jpg<br>
									<img src="b.gif" alt="banner" height="40" width="200" border="0">
									http://5o3/main.jp/hitosaji/b.gif<br>
								</td>
							</tr>
						</table>
						<br>
						リンクはトップページ（http://5o3/main.jp/hitosaji/）にお願いいたします。<br>
						創作サイトさんからのリンクであれば、ご報告は特に必要ありません。<br>
					</p>
			</div><!--本文-->
			<?php include("footer.php"); ?>
		</div>
	</body>
</html>