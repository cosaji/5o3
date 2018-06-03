<?php /* Smarty version 2.6.26, created on 2013-08-25 03:26:20
         compiled from internals/admin/profile_preview.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'internals/admin/profile_preview.html', 9, false),array('modifier', 'nl2p', 'internals/admin/profile_preview.html', 18, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'internals/admin/header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div id="content">
		<h2>プロフィール登録</h2>
		<ul>
			<li>以下の内容で登録します。</li>
		</ul>
		<dl>
			<dt>名前</dt>
				<dd><?php echo ((is_array($_tmp=$this->_tpl_vars['user']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</dd>
			<dt>メールアドレス</dt>
				<dd><?php echo ((is_array($_tmp=$this->_tpl_vars['user']['mail'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</dd>
			<!--<?php if (((is_array($_tmp=$this->_tpl_vars['user']['url'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>-->
			<dt>URL</dt>
				<dd><?php echo ((is_array($_tmp=$this->_tpl_vars['user']['url'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</dd>
			<!--<?php endif; ?>-->
			<!--<?php if (((is_array($_tmp=$this->_tpl_vars['user']['text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>-->
			<dt>紹介文</dt>
				<dd><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['user']['text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('nl2p', true, $_tmp) : smarty_modifier_nl2p($_tmp)); ?>
</dd>
			<!--<?php endif; ?>-->
		</dl>
		<div id="action">
			<form action="<?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['core']['http_file'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/admin/profile_form" method="get">
				<fieldset>
					<legend>プロフィール編集フォーム</legend>
					<input type="hidden" name="session" value="1" />
					<p><input type="submit" value="戻る" /></p>
				</fieldset>
			</form>
			<form action="<?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['core']['http_file'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/admin/profile_preview" method="post">
				<fieldset>
					<legend>プロフィール登録フォーム</legend>
					<input type="hidden" name="freo[token]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['token'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
					<p><input type="submit" value="登録する" /></p>
				</fieldset>
			</form>
		</div>
	</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'internals/admin/footer.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>