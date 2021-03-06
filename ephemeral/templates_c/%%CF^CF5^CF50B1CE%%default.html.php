<?php /* Smarty version 2.6.26, created on 2014-12-11 09:21:53
         compiled from iphones/internals/login/default.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'iphones/internals/login/default.html', 4, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'iphones/header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<section>
			<h1>ログイン</h1>
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
				<li>ユーザーIDとパスワードを入力してください。</li>
				<!--<?php if (((is_array($_tmp=$this->_tpl_vars['freo']['config']['user']['regist'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>-->
				<li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['core']['http_file'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/regist">ユーザー登録を行う</a>。</li>
				<!--<?php endif; ?>-->
				<li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['core']['http_file'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/reissue">パスワードを再発行する</a>。</li>
			</ul>
			<form action="<?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['core']['https_file'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/login" method="post">
				<fieldset>
					<legend>認証フォーム</legend>
					<dl>
						<dt>ユーザーID</dt>
							<dd><input type="text" name="freo[user]" size="20" value="<?php echo ((is_array($_tmp=$_POST['freo']['user'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></dd>
						<dt>パスワード</dt>
							<dd><input type="password" name="freo[password]" size="20" value="<?php echo ((is_array($_tmp=$_POST['freo']['password'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></dd>
					</dl>
					<ul>
						<li><input type="checkbox" name="freo[session]" id="label_session" value="keep" /> <label for="label_session">ログイン状態を記憶する</label></li>
					</ul>
					<p><input type="submit" value="認証する" /></p>
				</fieldset>
			</form>
		</section>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'iphones/footer.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>