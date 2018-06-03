<?php /* Smarty version 2.6.26, created on 2013-08-25 23:03:44
         compiled from iphones/internals/filter/default.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'iphones/internals/filter/default.html', 4, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'iphones/header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<section>
			<h1>フィルター設定</h1>
			<!--<?php if (((is_array($_tmp=$this->_tpl_vars['freo']['query']['error'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>-->
			<ul class="attention">
				<li>不正なアクセスです。</li>
			</ul>
			<!--<?php elseif (((is_array($_tmp=$this->_tpl_vars['errors'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>-->
			<ul class="attention">
				<!--<?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>-->
				<li><?php echo ((is_array($_tmp=$this->_tpl_vars['error'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</li>
				<!--<?php endforeach; endif; unset($_from); ?>-->
			</ul>
			<!--<?php elseif (((is_array($_tmp=$this->_tpl_vars['freo']['query']['exec'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)) == 'update'): ?>-->
			<ul class="complete">
				<li>フィルター設定を編集しました。</li>
			</ul>
			<!--<?php endif; ?>-->
			<ul>
				<li>以下の内容を表示するかどうか選択してください。</li>
			</ul>
			<form action="<?php echo ((is_array($_tmp=$this->_tpl_vars['freo']['core']['https_file'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/filter" method="post">
				<fieldset>
					<legend>フィルター設定フォーム</legend>
					<input type="hidden" name="freo[token]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['token'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
					<table summary="フィルター">
						<thead>
							<tr>
								<th>フィルター</th>
								<th>設定内容</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>フィルター</th>
								<th>設定内容</th>
							</tr>
						</tfoot>
						<tbody>
							<!--<?php $_from = $this->_tpl_vars['freo']['refer']['filters']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['refer_filter']):
?>-->
							<tr>
								<td><?php echo ((is_array($_tmp=$this->_tpl_vars['refer_filter']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
								<td>
									<input type="radio" name="filter[<?php echo ((is_array($_tmp=$this->_tpl_vars['refer_filter']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
]" id="label_filter_<?php echo ((is_array($_tmp=$this->_tpl_vars['refer_filter']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
_yes" value="1"<?php if (((is_array($_tmp=$this->_tpl_vars['input']['filter'][$this->_tpl_vars['refer_filter']['id']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?> checked="checked"<?php endif; ?> /> <label for="label_filter_<?php echo ((is_array($_tmp=$this->_tpl_vars['refer_filter']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
_yes">表示する</label>
									&nbsp;
									<input type="radio" name="filter[<?php echo ((is_array($_tmp=$this->_tpl_vars['refer_filter']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
]" id="label_filter_<?php echo ((is_array($_tmp=$this->_tpl_vars['refer_filter']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
_no" value=""<?php if (! ((is_array($_tmp=$this->_tpl_vars['input']['filter'][$this->_tpl_vars['refer_filter']['id']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?> checked="checked"<?php endif; ?> /> <label for="label_filter_<?php echo ((is_array($_tmp=$this->_tpl_vars['refer_filter']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
_no">表示しない</label>
								</td>
							</tr>
							<!--<?php endforeach; endif; unset($_from); ?>-->
						</tbody>
					</table>
					<p><input type="submit" value="設定する" /></p>
				</fieldset>
			</form>
		</section>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'iphones/footer.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>