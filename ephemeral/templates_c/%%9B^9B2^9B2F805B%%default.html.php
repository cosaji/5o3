<?php /* Smarty version 2.6.26, created on 2014-07-27 11:13:19
         compiled from iphones/internals/profile/default.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'iphones/internals/profile/default.html', 4, false),array('modifier', 'nl2p', 'iphones/internals/profile/default.html', 14, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'iphones/header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<section>
			<h1>プロフィール</h1>
			<h2>ユーザー <?php echo ((is_array($_tmp=$this->_tpl_vars['user']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 のプロフィール</h2>
			<dl>
				<dt>名前</dt>
					<dd><?php echo ((is_array($_tmp=$this->_tpl_vars['user']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</dd>
				<!--<?php if (((is_array($_tmp=$this->_tpl_vars['user']['url'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>-->
				<dt>URL</dt>
					<dd><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['user']['url'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['user']['url'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></dd>
				<!--<?php endif; ?>-->
				<!--<?php if (((is_array($_tmp=$this->_tpl_vars['user']['text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>-->
				<dt>紹介文</dt>
					<dd><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['user']['text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('nl2p', true, $_tmp) : smarty_modifier_nl2p($_tmp)); ?>
</dd>
				<!--<?php endif; ?>-->
				<dt>権限</dt>
					<dd><!--<?php if (((is_array($_tmp=$this->_tpl_vars['user']['authority'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)) == 'root'): ?>-->管理者<!--<?php elseif (((is_array($_tmp=$this->_tpl_vars['user']['authority'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)) == 'author'): ?>-->投稿者<!--<?php elseif (((is_array($_tmp=$this->_tpl_vars['user']['authority'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)) == 'guest'): ?>-->ゲスト<!--<?php endif; ?>--></dd>
				<!--<?php if (((is_array($_tmp=$this->_tpl_vars['user_associate']['group'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>-->
				<dt>グループ</dt>
					<dd>
						<ul>
							<!--<?php $_from = $this->_tpl_vars['freo']['refer']['groups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['refers_group']):
?>-->
							<!--<?php if (((is_array($_tmp=$this->_tpl_vars['user_associate']['group'][$this->_tpl_vars['refers_group']['id']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>--><li><?php echo ((is_array($_tmp=$this->_tpl_vars['refers_group']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</li><!--<?php endif; ?>-->
							<!--<?php endforeach; endif; unset($_from); ?>-->
						</ul>
					</dd>
				<!--<?php endif; ?>-->
				<!--<?php if (((is_array($_tmp=$this->_tpl_vars['user']['authority'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)) == 'root' || ((is_array($_tmp=$this->_tpl_vars['user']['authority'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)) == 'author'): ?>-->
				<dt>登録記事</dt>
					<dd><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['core']['http_file'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/entry?user=<?php echo ((is_array($_tmp=$this->_tpl_vars['user']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['core']['http_file'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/entry?user=<?php echo ((is_array($_tmp=$this->_tpl_vars['user']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></dd>
				<!--<?php endif; ?>-->
			</dl>
		</section>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'iphones/footer.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>