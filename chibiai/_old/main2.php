<?php

include_once('common.php');
showHeader2();

?>
	<div id="middle">
		<h1>My little Child</h1>
		<div class="column">
			<h2>
				<span class="title">概要</span>
				<span class="Cookie">Outline</span>
			</h2>
			<p class="em">
				「うたの☆プリンスさまっ♪」美風藍くんメイン・	藍くんの幼少期の姿テーマ本<br>
				2014/7/20 <a href="http://www.youyou.co.jp/only/utapuri/score4/" target="_blank">カルテット・スコア4</a>発行予定<br>
				全年齢対象	<br>
			</p>
			<p>
				当企画は、「ちいさい美風藍くん」をテーマにした漫画・小説の合同本（アンソロジー）です。<br>
				藍くんを愛する15名の作品を、藍くんを愛する皆さまへお届けいたします。<br>
			</p>
		</div>
		<div class="column">
			<h2>
				<span class="title">お知らせ</span>
				<span class="Cookie">What's new</span>
			</h2>
			<table>
				<tr>
					<th>2014.6.10</th>
					<td>
						6.29<a href="http://zero-plan.com/love/2014inSummer/top.html" target="_blank">「ラヴ♥コレクション2014 in Summer」</a>でフライヤーを配布してくださるサークル様のお知らせです。<br>
						た52「白玉日和」さま<br>
						どうぞよろしくお願いいたします！
					</td>
				</tr><tr>
					<th>2014.6.10</th>
					<td>
						執筆者一覧を修正いたしました。<br>
					</td>
				</tr><tr>
					<th>2014.5.25</th>
					<td>
						執筆者一覧を修正いたしました。<br>
					</td>
				</tr><tr>
					<th>2014.5.9</th>
					<td>
						ラブレ10でフライヤーを配布してくださるサークル様のお知らせです。<br>
						う29「白玉日和」さま、こ17「藍屋」さま、こ25「8bit-nano?」さま、さ05「GC-LOG」さま、さ06「カリブ」さま<br>	
					</td>
				</tr>
				<tr>
					<th>2014.5.6</th>
					<td>
						サイト公開<br>
						2014.5.11 <a href="http://www.youyou.co.jp/only/utapuri/10/" target="_blank">「ラブソング・レッスン♪10th」</a> こ47「ひとさじ」にて、フライヤー配布を行います。<br>
					</td>
				</tr>
			</table>
		</div>
		<div class="columnL">
			<h2>
				<span class="title">頒布</span>
				<span class="Cookie">distribution</span>
			</h2>
			<p>
				2014/7/20 カルテット・スコア4発行予定<br>
				<a href="http://www.youyou.co.jp/only/utapuri/score4/" target="_blank" title="【カルテット☆スコア♪4】"><img src="http://www.youyou.co.jp/only/utapuri/score4/bn.gif" border="0" width="200" height="40" alt="【カルテット☆スコア♪4】バナー" /></a>
				<br>
				主催サークル：「ひとさじ」（申込済）<br>

			</p>
		</div>
		<div class="columnR">
			<h2>
				<span class="title">仕様</span>
				<span class="Cookie">Specifications</span>
			</h2>
			<p>
				表紙フルカラー、本文スミ、A5、右綴じ／ページ数未定<br>
				詳細は追って告知いたします。<br>
			</p>
		</div>
		<div class="clear"></div>
		<div class="column">
			<h2>
				<span class="title">執筆者</span>
				<span class="Cookie">Members</span>
			</h2>
			<?
				for($i=0;$i<count($member);$i++){
			?>
			<div class="member">

				<div class="name">
					<?php echo $member[$i]['name']; ?>
					<?php
						if(strlen($member[$i]['circle'])>0){
					?>
						／ <font color="#7d7b83"><?php echo $member[$i]['circle']; ?></font>
					<?php
						}
					?>
				</div><br>
				
				
				<?php
					if(strlen($member[$i]['pixiv'])>0){
						if(is_numeric($member[$i]['pixiv'])){
							$pixivUrl = 'http://www.pixiv.net/member.php?id='.$member[$i]['pixiv'];
						}else{
							$pixivUrl = 'http://pixiv.me/'.$member[$i]['pixiv'];
						}
						echo '<a href="'.$pixivUrl.'" class="pixivUrl" target="_blank">pixiv</a>';
					}
				 ?>
				 <br>
			</div>
			<?
				}
			?>
			<div style="text-align:right; clear:left;">（五十音順、敬称略）</div>
		</div>
		<div class="column">
			<h2>
				<span class="title">当企画とこのページについて</span>
				<span class="Cookie">Information about the book and this website</span>
			</h2>
			<p>
				主催：匙（ひとさじ）　<a href="http://www.pixiv.net/member.php?id=7324652" class="pixivUrl" target="_blank">pixiv</a><br>
			</p>
			<p>
				このページは、個人による合同誌の告知ページです。<br>
				原作及び企業等との関係は一切ございません。<br>
				何卒、ご理解・ご協力のほど、よろしくお願いいたします。<br>
				<br>
				当企画については主催までご連絡ください。<br>
				（発行・頒布についての執筆者への問い合わせはご遠慮ください）<br>
				emo5o3☆yahoo.co.jp（☆ → @）
				件名冒頭は『[MLC]についての問い合わせ』としてくださるようお願いいたします。<br>
			</p>
		</div>
		<div class="column">
			<h2>
				<span class="title">リンク</span>
				<span class="Cookie">Link</span>
			</h2>
			<p>
				<img src="banner.jpg" alt="banner" width="" height="" /><br>
			</p>
			<p>
				<a href="http://5o3.main.jp/chibiai/">http://5o3.main.jp/chibiai/</a><br>
				http://5o3.main.jp/chibiai/banner.jpg<br>
			</p>
			<p>
				同人系以外のサイトからのリンクはご遠慮ください。<br>
				リンクの際は、ご報告は不要です。<br>
			</p>
		</div>
		<div class="clear"></div>		
	</div>
<? showFooter(); ?>