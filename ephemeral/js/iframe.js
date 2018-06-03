/*********************************************************************

 freo | インラインフレーム (2012/07/07)

 Copyright(C) 2009-2012 freo.jp

*********************************************************************/

$(document).ready(function() {
	//メディア管理
	$("#media").tablesorter({
		headers: {
			2: { sorter: 'digit' },
			3: { sorter: false },
			4: { sorter: false }
		}
	});

	//メディアアップロード欄追加
	$('#media_add').click(function() {
		$('#media_file').append($('#media_template').html());
	});
	$('#media_template').hide();

	//メディア挿入
	$('a.insert').click(function() {
		if (parent.tinymce.isIE) {
			parent.tinyMCE.activeEditor.focus();
			parent.tinyMCE.activeEditor.selection.moveToBookmark(parent.tinymce.EditorManager.activeEditor.windowManager.bookmark);
		}
		parent.tinyMCE.activeEditor.execCommand('mceInsertContent', false, $(this).attr('title'));
		parent.$.fn.colorbox.close();
	});

	//削除確認
	$('a.delete').click(function() {
		return confirm('本当に削除してもよろしいですか？');
	});
	$('form.delete').submit(function() {
		return confirm('本当に削除してもよろしいですか？');
	});

	//ColorBox
	var extensions = ['gif', 'GIF', 'jpeg', 'JPEG', 'jpg', 'JPG', 'jpe', 'JPE', 'png', 'PNG'];

	var target = '';
	$.each(extensions, function() {
		if (target) {
			target += ',';
		}
		target += 'a[href$=\'.' + this + '\']';
	});
	$(target).colorbox();

	$('a.colorbox').colorbox({ width:'80%', height:'80%', iframe:true });
});
