<?php /* Smarty version 2.6.26, created on 2012-09-20 23:22:04
         compiled from internals/admin/information_preview.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'internals/admin/information_preview.html', 8, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'internals/admin/header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div id="content">
		<h2>インフォメーション登録</h2>
		<ul>
			<li>以下の内容で登録します。</li>
		</ul>
		<dl>
			<!--<?php if (((is_array($_tmp=$this->_tpl_vars['information']['entry_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>-->
			<dt>エントリーID</dt>
				<dd><?php echo ((is_array($_tmp=$this->_tpl_vars['information']['entry_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</dd>
			<!--<?php endif; ?>-->
			<!--<?php if (((is_array($_tmp=$this->_tpl_vars['information']['page_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>-->
			<dt>ページID</dt>
				<dd><?php echo ((is_array($_tmp=$this->_tpl_vars['information']['page_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</dd>
			<!--<?php endif; ?>-->
			<!--<?php if (((is_array($_tmp=$this->_tpl_vars['information']['text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>-->
			<dt>本文</dt>
				<dd><?php echo $this->_tpl_vars['information']['text']; ?>
</dd>
			<!--<?php endif; ?>-->
		</dl>
		<div id="action">
			<form action="<?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['core']['http_file'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/admin/information_form" method="get">
				<fieldset>
					<legend>インフォメーション編集フォーム</legend>
					<input type="hidden" name="session" value="1" />
					<p><input type="submit" value="戻る" /></p>
				</fieldset>
			</form>
			<form action="<?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['core']['http_file'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/admin/information_preview" method="post">
				<fieldset>
					<legend>インフォメーション登録フォーム</legend>
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