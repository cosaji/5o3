#webliberty::App::Init.pm (2009/04/06)
#Copyright(C) 2002-2009 Knight, All rights reserved.

package webliberty::App::Init;

use strict;

### � �� �� �トラ� �� �
sub new {
	my $class = shift;

	my $self = {
		init   => undef,
		config => undef,
		label  => undef
	};
	bless $self, $class;

	$self->{init}   = $self->_set_init;
	$self->{config} = $self->_set_config;
	$self->{label}  = $self->_set_label;

	return $self;
}

### 初期� �定取�?
sub get_init {
	my $self = shift;
	my $name = shift;

	my $init;

	if ($name) {
		$init = $self->{init}->{$name};
	} else {
		$init = $self->{init};
	}

	return $init;
}

### � ��?� �定取�?
sub get_config {
	my $self = shift;
	my $name = shift;

	my $config;

	if ($name) {
		$config = $self->{config}->{$name};
	} else {
		$config = $self->{config};
	}

	return $config;
}

### � �ベル取� �?
sub get_label {
	my $self = shift;
	my $name = shift;

	my $label;

	if ($name) {
		$label = $self->{label}->{$name};
	} else {
		$label = $self->{label};
	}

	return $label;
}

### 初期� ��?
sub _set_init {
	my $self = shift;

	my $init = {
		#� �� �� ��?
		script       => 'Web Diary Professional',
		version      => '4.72',
		copyright    => 'Copyright(C) 2002-2009 Knight',
		script_file  => './index.cgi',
		tb_file      => './diary-tb.cgi',
		paint_file   => './diary-paint.cgi',
		html_file    => './index.html',
		parse_size   => 15000,
		jcode_mode   => 0,
		chmod_mode   => 1,
		suexec_mode  => 0,
		rewrite_mode => 0,
		des_key      => '',

		#� �� �ファ� �� �
		data_dir           => './data/',
		data_config        => './data/init.cgi',
		data_user          => './data/user.log',
		data_profile       => './data/profile.log',
		data_record        => './data/record.log',
		data_field         => './data/field.log',
		data_top           => './data/top.log',
		data_menu          => './data/menu.log',
		data_link          => './data/link.log',
		data_diary_dir     => './data/diary/',
		data_diary_index   => './data/diary/index.log',
		data_comt_dir      => './data/comment/',
		data_comt_index    => './data/comment/index.log',
		data_tb_dir        => './data/trackback/',
		data_tb_index      => './data/trackback/index.log',
		data_lock          => './data/diary.lock',
		data_upfile_dir    => './data/upfile/',
		data_thumbnail_dir => './data/thumbnail/',
		data_image_dir     => './data/image/',
		data_icon_dir      => './data/icon/',
		data_icon          => './data/icon.log',
		data_tmp_file      => 'Temporary.file',
		data_ext           => 'log',

		#� �� �� �ファ� �� �
		skin_dir             => './skin/',
		skin_header          => 'header.html',
		skin_footer          => 'footer.html',
		skin_diary           => 'diary.html',
		skin_navigation      => 'navigation.html',
		skin_comment         => 'comment.html',
		skin_complete        => 'complete.html',
		skin_trackback       => 'trackback.html',
		skin_image           => 'image.html',
		skin_icon            => 'icon.html',
		skin_edit            => 'edit.html',
		skin_list            => 'list.html',
		skin_search          => 'search.html',
		skin_top             => 'top.html',
		skin_profile         => 'profile.html',
		skin_receive         => 'receive.html',
		skin_album           => 'album.html',
		skin_gallery         => 'gallery.html',
		skin_pch             => 'pch.html',
		skin_admin           => 'admin.html',
		skin_admin_work      => 'admin_work.html',
		skin_admin_navi      => 'admin_navi.html',
		skin_admin_form      => 'admin_form.html',
		skin_admin_edit      => 'admin_edit.html',
		skin_admin_comment   => 'admin_comment.html',
		skin_admin_trackback => 'admin_trackback.html',
		skin_admin_confirm   => 'admin_confirm.html',
		skin_admin_field     => 'admin_field.html',
		skin_admin_icon      => 'admin_icon.html',
		skin_admin_top       => 'admin_top.html',
		skin_admin_menu      => 'admin_menu.html',
		skin_admin_link      => 'admin_link.html',
		skin_admin_profile   => 'admin_profile.html',
		skin_admin_pwd       => 'admin_pwd.html',
		skin_admin_env       => 'admin_env.html',
		skin_admin_paint     => 'admin_paint.html',
		skin_admin_user      => 'admin_user.html',
		skin_admin_build     => 'admin_build.html',
		skin_admin_record    => 'admin_record.html',
		skin_admin_status    => 'admin_status.html',
		skin_mobile_header   => 'mobile_header.html',
		skin_mobile_footer   => 'mobile_footer.html',
		skin_mobile_list     => 'mobile_list.html',
		skin_mobile_comtnavi => 'mobile_comtnavi.html',
		skin_mobile_tbnavi   => 'mobile_tbnavi.html',
		skin_mobile_search   => 'mobile_search.html',
		skin_mobile_view     => 'mobile_view.html',
		skin_mobile_comment  => 'mobile_comment.html',
		skin_mobile_form     => 'mobile_form.html',
		skin_js_title        => 'js_title.html',
		skin_js_text         => 'js_text.html',
		skin_error           => 'error.html',

		#� �� �� �� �ブフ� �� �� �
		archive_dir => './archives/',
		archive_ext => 'html',

		#JSファ� �� �
		js_navi_start_file => './data/navi_start.js',
		js_navi_end_file   => './data/navi_end.js',
		js_title_file      => './data/title.js',
		js_text_file       => './data/text.js',

		#ペイ� �ト用ファ� �� �
		spainter_jar   => './spainter.jar',
		paintbbs_jar   => './PaintBBS.jar',
		pch_jar        => './PCHViewer.jar',
		resource_dir   => './res/',
		paint_dir      => './data/paint/',
		pch_dir        => './data/pch/',
		paint_tmp_file => 'Temporary',

		#repng2jpeg� �ファ� �� �
		resize_pl => './resize.pl',

		#プラ� �� �� �� �� ��?
		plugin_dir => './lib/webliberty/Plugin/',

		#� �殊サ� �バ�? �� �� ��?
		data_upfile_path    => '',
		data_thumbnail_path => '',
		data_image_path     => '',
		data_icon_path      => '',
		archive_path        => '',
		paint_path          => '',
		pch_path            => ''
	};

	#曜日� �� ��?
	@{$init->{weeks}} = ('� �', '�?', '� �', '� �', '� �', '�?', '�?');

	#� �� �� ��?� �� �月� � ��?
	@{$init->{months}} = ('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12');

	#� �� �� ��?
	%{$init->{rewrite}} = (
		'' => '',
		'' => '',
		'' => '',
		'' => '',
		'' => ''
	);

	return $init;
}

### � ��?� ��?
sub _set_config {
	my $self = shift;

	my $config = {
		#� �� �� ��?
		site_title        => 'My Diary',
		back_url          => 'http://your.site.addr/index.html',
		mobile_site_title => 'My Diary',
		mobile_back_url   => 'http://your.site.addr/index.html',
		site_description  => '� ��?� �生� � �を� ��ま� �� �� �� �� �た日記� � ��?',
		site_url          => '',

		#� �� �� �� �� �� ��?
		page_size           => '10',
		navi_size           => '10',
		show_comt           => '0',
		show_tb             => '0',
		list_size           => '5',
		image_size          => '5',
		cmtlist_size        => '5',
		tblist_size         => '5',
		admin_size          => '10',
		mobile_page_size    => '5',
		mobile_cmtlist_size => '5',
		mobile_tblist_size  => '5',

		#RSS� �� ��?
		rss_mode       => '0',
		rss_length     => '300',
		rss_size       => '10',
		rss_field_list => '',

		#投� � �� �� �� �� �� �� ��?
		use_field => '1',
		use_icon  => '0',
		use_color => '0',
		use_file  => '1',
		use_image => '0',
		use_id    => '0',
		use_tburl => '1',

		#投� � �記� ���? �初期� ��?
		default_stat  => '1',
		default_break => '1',
		default_comt  => '0',
		default_tb    => '0',
		comt_stat     => '1',
		tb_stat       => '1',

		#投� � �記� ���? �� �� �� ��?
		title_mode         => '0',
		paragraph_mode     => '1',
		autolink_mode      => '1',
		autolink_attribute => 'class=&quot;top&quot;',
		continue_text      => '続きを� � ��?',
		new_days           => '3',
		text_color         => '#808080<>#B38099<>#8080B3<>#80B380<>#B3B380<>#FF9955<>#FF77DD<>#FF7777',
		decoration_mode    => '0',
		img_maxwidth       => '200',
		thumbnail_mode     => '0',
		file_attribute     => 'class=&quot;top&quot;',
		quotation_color    => '#AAAAAA',
		whisper_mode       => '0',

		#� �� �バムペ�? �� �� �� ��?
		album_size           => '10',
		album_delimiter_size => '5',
		album_target         => 'image',

		#� �� ��?�?� �� �ペ�? �� �� �� ��?
		top_mode           => '0',
		top_size           => '10',
		top_delimiter_size => '10',
		top_field          => '0',
		top_field_list     => '',
		top_break          => '1',

		#ナビ� �� �� �� �� �� �� �� �� ��?
		show_calendar    => '1',
		show_field       => '1',
		show_search      => '1',
		show_past        => '1',
		show_menu        => '0',
		menu_list        => '',
		show_link        => '0',
		link_list        => '',
		date_navigation  => '1',
		field_navigation => '1',
		show_navigation  => '0',
		pos_navigation   => '0',

		#プロフィ� �� �� �� �� �� ��?
		profile_mode  => '0',
		profile_break => '1',

		#� �� �� �� �� ��?� �� ��?
		user_mode      => '0',
		auth_comment   => '0',
		auth_trackback => '0',
		auth_field     => '0',
		auth_icon      => '0',
		auth_top       => '0',
		auth_menu      => '0',
		auth_link      => '0',
		auth_paint     => '1',
		record_size    => '50',

		#� �� �� �通知� �� ��?
		sendmail_cmt_mode => '0',
		sendmail_tb_mode  => '0',
		sendmail_path     => '/usr/sbin/sendmail',
		sendmail_list     => 'your@mail.addr',
		sendmail_admin    => '',
		sendmail_length   => '500',
		sendmail_detail   => '0',

		#� �� �� �� �� �� �� ��?
		receive_mode  => '0',
		pop_server    => 'your.pop.server',
		pop_user      => 'user',
		pop_pwd       => 'pwd',
		receive_list  => 'your@mail.addr',
		receive_field => '',

		#� �� �PING� �� ��?
		ping_mode => '0',
		ping_list => 'http://www.blogpeople.net/servlet/weblogUpdates<>http://ping.myblog.jp<>http://blog.goo.ne.jp/XMLRPC<>http://ping.bloggers.jp/rpc/',

		#� �� �� �ト投� �� �� ��?
		paint_tool             => 'shipainter',
		paint_image_width      => '300',
		paint_image_height     => '300',
		paint_quality          => '1',
		paint_image_size       => '60',
		paint_compress_level   => '15',
		paint_link             => '0',
		paint_maxwidth         => '500',
		animation_text         => '� �ニメ� �� �� �� �',
		animation_attribute    => 'class=&quot;top&quot;',
		gallery_size           => '10',
		gallery_delimiter_size => '5',
		gallery_maxwidth       => '100',

		#Cookie� �� ��?
		cookie_id       => 'webdiary',
		cookie_holddays => '90',
		cookie_admin    => 'webdiary_admin',

		#HTMLファ� �� �� �き�? �し�? �� ��?
		html_index_mode   => '0',
		html_archive_mode => '0',
		html_field_mode   => '0',
		html_field_list   => './archives/note/index.html,雑� �?<>./archives/days/index.html,雑� �?::� ��?� ��?',

		#JSファ� �� �� �き�? �し�? �� ��?
		js_title_mode       => '0',
		js_title_field_mode => '0',
		js_title_field_list => './data/note_title.js,雑� �?<>./data/days_title.js,雑� �?::� ��?� ��?',
		js_title_size       => '5',
		js_text_mode        => '0',
		js_text_field_mode  => '0',
		js_text_field_list  => './data/note_text.js,雑� �?<>./data/days_text.js,雑� �?::� ��?� ��?',
		js_text_size        => '3',

		#投� � �� �限�? �� ��?
		base_url         => '',
		black_list       => 'anonymizer.com<>delegate',
		proxy_mode       => '1',
		ng_word          => '',
		need_word        => '',
		need_japanese    => '0',
		max_link         => '0',
		wait_time        => '60',
		black_list_tb    => 'http://spam.site.addr/',
		ng_word_tb       => '',
		need_word_tb     => '',
		need_japanese_tb => '0',
		need_link_tb     => '0'
	};

	return $config;
}

### � �ベル� ��?
sub _set_label {
	my $self = shift;

	my $label = {
		#パソ� �� �� �� �ド用� �ベル
		pc_no    => '記� ��番� �',
		pc_id    => '記� ��ID',
		pc_stat  => '� ��?',
		pc_break => '� �行�? �変換',
		pc_comt  => '� �� �� �ト�? �受� �?',
		pc_tb    => 'トラ�?� �バッ� �� �受� �?',
		pc_field => '�?�?',
		pc_date  => '投� � �� ��?',
		pc_name  => '名前',
		pc_subj  => '題名',
		pc_text  => '� ��?� �� �� �',
		pc_color => '�?字色',
		pc_icon  => '� �� �� �� �',
		pc_file  => 'ファ� �� �',
		pc_image => 'ミニ� ��?',
		pc_host  => 'ホス�?',

		pc_pno   => '� �記� ��番� �',
		pc_mail  => '? � �� �� �� �',
		pc_url   => '? � �? � �? � �',
		pc_rank  => '投� � �� �� �� �',
		pc_pwd   => '削除� �� �',

		#� �� �� �� �ド用� �ベル
		mobile_no    => '記� ��番� �',
		mobile_id    => '記� ��ID',
		mobile_stat  => '� ��?',
		mobile_break => '� �行�? �変換',
		mobile_comt  => '? � �? ��� ��� �?� �受� �?',
		mobile_tb    => '? �?? ��� � �? � �? ��� ��� � �? � �� �受� �?',
		mobile_field => '�?�?',
		mobile_date  => '投� � �� ��?',
		mobile_name  => '名前',
		mobile_subj  => '題名',
		mobile_text  => '? ��� � �? � �? � �? � �? �?',
		mobile_color => '�?字色',
		mobile_icon  => '? � �? � �? � �? �?',
		mobile_file  => '? ��� � �? � �? �?',
		mobile_image => '? ��� �?� ��?',
		mobile_host  => '? ��� � �? �?',

		mobile_pno   => '� �記� ��番� �',
		mobile_mail  => 'E? ��� � �? �?',
		mobile_url   => 'URL',
		mobile_rank  => '投� � �? ��� ��� � �',
		mobile_pwd   => '削除? � �? � �'
	};

	return $label;
}

1;
