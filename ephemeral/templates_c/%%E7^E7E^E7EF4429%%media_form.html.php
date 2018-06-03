<?php /* Smarty version 2.6.26, created on 2012-09-20 22:42:33
         compiled from internals/admin/media_form.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'internals/admin/media_form.html', 3, false),array('modifier', 'cat', 'internals/admin/media_form.html', 45, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'internals/admin/header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div id="content">
		<!--<?php if (((is_array($_tmp=$this->_tpl_vars['freo']['query']['directory'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>-->
		<h2><!--<?php if (((is_array($_tmp=$_GET['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>-->ディレクトリ名変更<!--<?php else: ?>-->ディレクトリ作成<!--<?php endif; ?>--></h2>
		<!--<?php if (((is_array($_tmp=$this->_tpl_vars['errors'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>-->
		<ul class="attention">
			<!--<?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>-->
			<li><?php echo ((is_array($_tmp=$this->_tpl_vars['error'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</li>
			<!--<?php endforeach; endif; unset($_from); ?>-->
		</ul>
		<!--<?php endif; ?>-->
		<!--<?php if (((is_array($_tmp=$_GET['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>-->
		<ul>
			<li><!--<?php if (((is_array($_tmp=$this->_tpl_vars['freo']['query']['path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>--><code><?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['query']['path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</code> 内にある<!--<?php endif; ?>-->ディレクトリ <code><?php echo ((is_array($_tmp=$_GET['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</code> の名前を変更します。</li>
			<li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['core']['http_file'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/admin/media<?php if (((is_array($_tmp=$this->_tpl_vars['freo']['query']['path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>?path=<?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['query']['path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>"><!--<?php if (((is_array($_tmp=$this->_tpl_vars['freo']['query']['path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>-->この階層の<!--<?php endif; ?>-->メディアを一欄表示する</a>。</li>
		</ul>
		<form action="<?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['core']['http_file'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/admin/media_form?directory=1&amp;name=<?php echo ((is_array($_tmp=$_GET['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&amp;path=<?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['query']['path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" method="post">
			<fieldset>
				<legend>ディレクトリ名変更フォーム</legend>
				<input type="hidden" name="freo[token]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['token'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
				<input type="hidden" name="media[exec]" value="rename_directory" />
				<input type="hidden" name="media[path]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['query']['path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
				<input type="hidden" name="media[directory_org]" value="<?php echo ((is_array($_tmp=$_GET['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
				<dl>
					<dt>ディレクトリ名</dt>
						<dd><input type="text" name="media[directory]" size="50" value="<?php echo ((is_array($_tmp=$_GET['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></dd>
				</dl>
				<p><input type="submit" value="変更する" /></p>
			</fieldset>
		</form>
		<h2>ディレクトリ移動</h2>
		<ul>
			<li>移動先を選択してください。</li>
		</ul>
		<form action="<?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['core']['http_file'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/admin/media_move?directory=1&amp;name=<?php echo ((is_array($_tmp=$_GET['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&amp;path=<?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['query']['path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" method="post">
			<fieldset>
				<legend>メディア移動フォーム</legend>
				<input type="hidden" name="freo[token]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['token'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
				<dl>
					<dt>移動先</dt>
						<dd>
							<select name="media[path]">
								<option value="">メディア管理ディレクトリ直下</option>
								<!--<?php $_from = $this->_tpl_vars['directories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['directory']):
?>-->
								<!--<?php if (((is_array($_tmp=$this->_tpl_vars['freo']['query']['path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)) != ((is_array($_tmp=$this->_tpl_vars['directory'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)) && ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['freo']['query']['path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('cat', true, $_tmp, ((is_array($_tmp=$_GET['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))) : smarty_modifier_cat($_tmp, ((is_array($_tmp=$_GET['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))))) ? $this->_run_mod_handler('cat', true, $_tmp, '/') : smarty_modifier_cat($_tmp, '/')) != ((is_array($_tmp=$this->_tpl_vars['directory'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>-->
								<option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['directory'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['directory'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
								<!--<?php endif; ?>-->
								<!--<?php endforeach; endif; unset($_from); ?>-->
							</select>
						</dd>
				</dl>
				<p><input type="submit" value="移動する" /></p>
			</fieldset>
		</form>
		<h2>ディレクトリ削除</h2>
		<ul>
			<li>このディレクトリを削除するには、<em>削除ボタン</em>を押してください。</li>
		</ul>
		<form action="<?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['core']['http_file'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/admin/media_delete" method="get" class="delete">
			<fieldset>
				<legend>ディレクトリ削除フォーム</legend>
				<input type="hidden" name="freo[token]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['token'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
				<input type="hidden" name="directory" value="1" />
				<input type="hidden" name="name" value="<?php echo ((is_array($_tmp=$_GET['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/" />
				<input type="hidden" name="path" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['query']['path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
				<p><input type="submit" value="削除する" /></p>
			</fieldset>
		</form>
		<!--<?php else: ?>-->
		<ul>
			<li><!--<?php if (((is_array($_tmp=$this->_tpl_vars['freo']['query']['path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>--><code><?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['query']['path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</code> 内に<!--<?php endif; ?>-->ディレクトリを作成します。</li>
			<li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['core']['http_file'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/admin/media<?php if (((is_array($_tmp=$this->_tpl_vars['freo']['query']['path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>?path=<?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['query']['path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>"><!--<?php if (((is_array($_tmp=$this->_tpl_vars['freo']['query']['path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>-->この階層の<!--<?php endif; ?>-->メディアを一欄表示する</a>。</li>
		</ul>
		<form action="<?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['core']['http_file'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/admin/media_form?directory=1<?php if (((is_array($_tmp=$this->_tpl_vars['freo']['query']['path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>&amp;path=<?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['query']['path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>" method="post">
			<fieldset>
				<legend>ディレクトリ作成フォーム</legend>
				<input type="hidden" name="freo[token]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['token'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
				<input type="hidden" name="media[exec]" value="insert_directory" />
				<input type="hidden" name="media[path]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['query']['path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
				<dl>
					<dt>ディレクトリ名</dt>
						<dd><input type="text" name="media[directory]" size="50" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['input']['media']['directory'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></dd>
				</dl>
				<p><input type="submit" value="作成する" /></p>
			</fieldset>
		</form>
		<!--<?php endif; ?>-->
		<!--<?php else: ?>-->
		<h2><!--<?php if (((is_array($_tmp=$this->_tpl_vars['freo']['query']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>-->ファイル差し替え<!--<?php else: ?>-->ファイル登録<!--<?php endif; ?>--></h2>
		<!--<?php if (((is_array($_tmp=$this->_tpl_vars['errors'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>-->
		<ul class="attention">
			<!--<?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>-->
			<li><?php echo ((is_array($_tmp=$this->_tpl_vars['error'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</li>
			<!--<?php endforeach; endif; unset($_from); ?>-->
		</ul>
		<!--<?php endif; ?>-->
		<ul>
			<!--<?php if (((is_array($_tmp=$this->_tpl_vars['freo']['query']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>-->
			<li><!--<?php if (((is_array($_tmp=$this->_tpl_vars['freo']['query']['path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>--><code><?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['query']['path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</code> に登録された<!--<?php endif; ?>-->ファイル <code><?php echo ((is_array($_tmp=$_GET['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</code> を差し替えます。</li>
			<li>差し替えたいファイルを選択してください。</li>
			<!--<?php else: ?>-->
			<li><!--<?php if (((is_array($_tmp=$this->_tpl_vars['freo']['query']['path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>--><code><?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['query']['path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</code> に<!--<?php endif; ?>-->登録したいファイルを選択してください。</li>
			<!--<?php endif; ?>-->
			<li><abbr class="attention" title="入力必須">*</abbr> の付いた項目は入力必須項目です。</li>
			<li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['core']['http_file'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/admin/media<?php if (((is_array($_tmp=$this->_tpl_vars['freo']['query']['path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>?path=<?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['query']['path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>"><!--<?php if (((is_array($_tmp=$this->_tpl_vars['freo']['query']['path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>-->この階層の<!--<?php endif; ?>-->メディアを一欄表示する</a>。</li>
		</ul>
		<form action="<?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['core']['http_file'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/admin/media_form<?php if (((is_array($_tmp=$this->_tpl_vars['freo']['query']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>?name=<?php echo ((is_array($_tmp=$_GET['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&amp;path=<?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['query']['path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>" method="post" enctype="multipart/form-data">
			<fieldset>
				<legend>メディア登録フォーム</legend>
				<input type="hidden" name="freo[token]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['token'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
				<input type="hidden" name="media[exec]" value="insert" />
				<!--<?php if (((is_array($_tmp=$this->_tpl_vars['freo']['query']['path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>-->
				<input type="hidden" name="media[path]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['query']['path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
				<!--<?php endif; ?>-->
				<!--<?php if (((is_array($_tmp=$this->_tpl_vars['freo']['query']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>-->
				<input type="hidden" name="media[file_org]" value="<?php echo ((is_array($_tmp=$_GET['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
				<!--<?php endif; ?>-->
				<dl id="media_file">
					<!--<?php if (! ((is_array($_tmp=$this->_tpl_vars['freo']['query']['path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>-->
					<dt>アップロード先 <abbr class="attention" title="入力必須">*</abbr></dt>
						<dd>
							<select name="media[path]">
								<option value="">メディア管理ディレクトリ直下</option>
								<!--<?php $_from = $this->_tpl_vars['directories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['directory']):
?>-->
								<option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['directory'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if (((is_array($_tmp=$this->_tpl_vars['input']['media']['path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)) && ((is_array($_tmp=$this->_tpl_vars['input']['media']['path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)) == ((is_array($_tmp=$this->_tpl_vars['directory'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?> selected="selected"<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['directory'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
								<!--<?php endforeach; endif; unset($_from); ?>-->
							</select>
						</dd>
					<!--<?php endif; ?>-->
					<dt>ファイル <abbr class="attention" title="入力必須">*</abbr></dt>
						<dd><input type="file" name="media[file][]" size="30" /></dd>
				</dl>
				<!--<?php if (! ((is_array($_tmp=$this->_tpl_vars['freo']['query']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>-->
				<dl id="media_template">
					<dt>ファイル</dt>
						<dd><input type="file" name="media[file][]" size="30" /></dd>
				</dl>
				<p><a href="javascript:void(0)" id="media_add">ファイル選択欄を追加</a></p>
				<!--<?php endif; ?>-->
				<!--<?php if (((is_array($_tmp=$this->_tpl_vars['freo']['config']['media']['thumbnail'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>-->
				<dl>
					<dt>サムネイル画像の最大横幅 <abbr class="attention" title="入力必須">*</abbr></dt>
						<dd><input type="text" name="media[thumbnail_width]" size="4" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['input']['media']['thumbnail_width'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /> px</dd>
					<dt>サムネイル画像の最大縦幅 <abbr class="attention" title="入力必須">*</abbr></dt>
						<dd><input type="text" name="media[thumbnail_height]" size="4" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['input']['media']['thumbnail_height'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /> px</dd>
				</dl>
				<!--<?php endif; ?>-->
				<p><input type="submit" value="登録する" /></p>
			</fieldset>
		</form>
		<!--<?php if (((is_array($_tmp=$this->_tpl_vars['freo']['query']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>-->
		<h2>ファイル名変更</h2>
		<ul>
			<li>ファイル <code><?php echo ((is_array($_tmp=$_GET['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</code> の名前を変更します。</li>
		</ul>
		<form action="<?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['core']['http_file'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/admin/media_form?name=<?php echo ((is_array($_tmp=$_GET['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&amp;path=<?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['query']['path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" method="post">
			<fieldset>
				<legend>ファイル名変更フォーム</legend>
				<input type="hidden" name="freo[token]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['token'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
				<input type="hidden" name="media[exec]" value="rename" />
				<input type="hidden" name="media[path]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['query']['path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
				<input type="hidden" name="media[file_org]" value="<?php echo ((is_array($_tmp=$_GET['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
				<dl>
					<dt>ファイル名</dt>
						<dd><input type="text" name="media[file]" size="50" value="<?php echo ((is_array($_tmp=$_GET['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></dd>
				</dl>
				<p><input type="submit" value="変更する" /></p>
			</fieldset>
		</form>
		<h2>ファイル移動</h2>
		<ul>
			<li>移動先を選択してください。</li>
		</ul>
		<form action="<?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['core']['http_file'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/admin/media_move?name=<?php echo ((is_array($_tmp=$_GET['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&amp;path=<?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['query']['path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" method="post">
			<fieldset>
				<legend>メディア移動フォーム</legend>
				<input type="hidden" name="freo[token]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['token'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
				<input type="hidden" name="media[file]" value="<?php echo ((is_array($_tmp=$_GET['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
				<dl>
					<dt>移動先</dt>
						<dd>
							<select name="media[path]">
								<option value="">メディア管理ディレクトリ直下</option>
								<!--<?php $_from = $this->_tpl_vars['directories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['directory']):
?>-->
								<!--<?php if (((is_array($_tmp=$this->_tpl_vars['freo']['query']['path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)) != ((is_array($_tmp=$this->_tpl_vars['directory'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>-->
								<option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['directory'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['directory'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
								<!--<?php endif; ?>-->
								<!--<?php endforeach; endif; unset($_from); ?>-->
							</select>
						</dd>
				</dl>
				<p><input type="submit" value="移動する" /></p>
			</fieldset>
		</form>
		<h2>ファイル削除</h2>
		<ul>
			<li>このファイルを削除するには、<em>削除ボタン</em>を押してください。</li>
		</ul>
		<form action="<?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['core']['http_file'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/admin/media_delete" method="get" class="delete">
			<fieldset>
				<legend>ファイル削除フォーム</legend>
				<input type="hidden" name="freo[token]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['token'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
				<input type="hidden" name="name" value="<?php echo ((is_array($_tmp=$_GET['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
				<input type="hidden" name="path" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['query']['path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
				<p><input type="submit" value="削除する" /></p>
			</fieldset>
		</form>
		<!--<?php endif; ?>-->
		<!--<?php endif; ?>-->
	</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'internals/admin/footer.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>