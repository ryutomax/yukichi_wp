<?php
// CSSファイル読み込み
function enqueue_styles() {
	$version = date('Ymd-His'); // バージョン番号を設定

	if (is_page('contact')) {
		wp_enqueue_style('jquery-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css', [], $version, 'al');
	}
	wp_enqueue_style('slick',  get_template_directory_uri() .'/assets/vender/slick-1.8.1/slick/slick.css', [], $version, 'all');
	wp_enqueue_style('slick-theme',  get_template_directory_uri() .'/assets/vender/slick-1.8.1/slick/slick-theme.css', [], $version, 'all');
	wp_enqueue_style('style',  get_template_directory_uri() .'/assets/css/app-min.css', [], $version, 'all');
}
add_action('wp_enqueue_scripts', 'enqueue_styles');
//JSファイル読み込み
function enqueue_scripts() {
	$version = date('Ymd-Hi'); // バージョン番号を設定

	if (is_home() || is_front_page()) {
		wp_enqueue_script('top', get_theme_file_uri('/assets/js/parts/top-min.js'), [], $version, true);
	}
	if (is_single()||is_page('information')) {
		wp_enqueue_script('single', get_theme_file_uri('/assets/js/parts/single-min.js'), [], $version, true);
	}
	if (is_page('contact')) {
		wp_enqueue_script('datepicker', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', [], $version, true);
		wp_enqueue_script('contact', get_theme_file_uri('/assets/js/parts/contact-min.js'), [], $version, true);
	}
	wp_enqueue_script('jQuery', get_template_directory_uri() . '/assets/vender/jquery-3.7.1.min.js', [], $version, true);
	wp_enqueue_script('slick-min', get_template_directory_uri() . '/assets/vender/slick-1.8.1/slick/slick.min.js', [], $version, true);
	wp_enqueue_script('bundle', get_template_directory_uri() . '/assets/js/bundle.js', [], $version, true);
	// wp_enqueue_script('noBundle', get_template_directory_uri() . '/assets/js/nonBundle/noBundle-min.js', [], $css_version, true);
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');

// ========================================
// お問い合わせ バリデーションメッセージ変更
// ========================================
function my_exam_validation_rule( $Validation, $data, $Data ) {

	$Validation->set_rule( '貴社名(部署名)', 'noEmpty', array( 'message' => '必須項目です。' ) );
	$Validation->set_rule( '媒体名・番組名', 'noEmpty', array( 'message' => '必須項目です。' ) );
	$Validation->set_rule( 'ご担当者様氏名', 'noEmpty', array( 'message' => '必須項目です。' ) );
	$Validation->set_rule( 'メールアドレス', 'noEmpty', array( 'message' => '必須項目です。' ) );
	// $Validation->set_rule( 'メールアドレス', 'mail', array( 'message' => '形式を確認してください。' ) );
	// $Validation->set_rule( 'メールアドレス（確認用）', 'noEmpty', array( 'message' => '※メールアドレス（確認用）を入力してください。' ) );
	// $Validation->set_rule( 'メールアドレス（確認用）', 'eq', array( 'message' => '※メールアドレスが一致しません。' ) );
	$Validation->set_rule( '連絡可能な電話番号', 'noEmpty', array( 'message' => '必須項目です。' ) );
	$Validation->set_rule( '取材内容・趣旨', 'noEmpty', array( 'message' => '必須項目です。' ) );
	$Validation->set_rule( '取材方法', 'noEmpty', array( 'message' => '必須項目です。' ) );
	$Validation->set_rule( '取材希望日時または期限', 'noEmpty', array( 'message' => '必須項目です。' ) );
	$Validation->set_rule( '撮影の有無', 'noEmpty', array( 'message' => '必須項目です。' ) );

	return $Validation;
}
// キー指定）mwform_validation_mw-wp-form-OOO
add_filter( 'mwform_validation_mw-wp-form-130', 'my_exam_validation_rule', 10, 3 );

//カスタム投稿タイプ生成　呼び出し
function create_post_type() {

	post_type_template('music', 'Music', 7, true);
	post_type_template('animation', 'Anime', 8, true);
	post_type_template('game', 'Game', 9, true);
	post_type_template('entertainment', 'Entertainment', 10, true);
	post_type_template('gallery', '画像ギャラリ―', 11, false);
	post_type_template('meta-info', '付属情報', 12, false);
}
add_action( 'init', 'create_post_type' );

//アイキャッチ画像
add_theme_support( 'post-thumbnails' );

//投稿タイプ生成
function post_type_template ($postTypeName, $label, $menuPosition, $main_type) {
	if ($main_type == true) {
		register_post_type(
			$postTypeName,
			[
				'label' => $label,
				'public' => true,
				'has_archive' => true,
				'show_in_rest' => true,
				'menu_position' => $menuPosition,
				'supports' =>  [  // 初期値 title と editor のみ
					'title',  // 記事タイトル
					'editor',  // 記事本文
					'thumbnail',  // アイキャッチ画像
					'revisions'  // リビジョン
				]
			]
		);

		register_taxonomy(
			"{$postTypeName}-tag",
			$postTypeName,
			[
				'label' => 'タグ',
				'labels' => array(
					'all_items' => 'タグ一覧',
					'add_new_item' => 'タグを追加',
					'name' => 'タグ',
					'singular_name' => 'タグ',
				),
				'hierarchical' => false,
				'public' => true,
				'show_ui' => true,
				'show_in_rest' => true
			]
		);
	} else {
		register_post_type(
			$postTypeName,
			[
				'label' => $label,
				'public' => true,
				'has_archive' => true,
				'show_in_rest' => true,
				'menu_position' => $menuPosition,
				'supports' =>  [  // 初期値 title と editor のみ
					'title',  // 記事タイトル
					'editor',  // 記事本文
					'revisions'  // リビジョン
				]
			]
		);
	}
}

//複数のカスタム投稿タイプへ共通のカスタムタクソノミーを付与
function add_custom_taxonomy() {
	//カテゴリ
	$args = array(
			'labels' => 'カテゴリー',
			'hierarchical' => true, // このタクソノミーが階層化される（カテゴリーのように）かどうか
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_rest' => true,
			'query_var' => true,
			'show_in_menu' => false
	);
	register_taxonomy('category', ['game', 'music' , 'entertainment', 'animation'], $args);

	//TOPカルーセル
	$args = array(
			'label' => 'TOPカルーセル',
			'labels' => [
				'name' => 'TOPカルーセル(表示順)',
				'singular_name' => 'TOPカルーセル',
			],
			'hierarchical' => true, // このタクソノミーが階層化される（カテゴリーのように）かどうか
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_rest' => true,
			'query_var' => true,
			'show_in_menu' => false //管理画面メニュー表示
	);
	register_taxonomy('top_carousel', ['game', 'music' , 'entertainment', 'animation'], $args);

	//Pick Up News
	$args = array(
			'label' => 'Pick Up News',
			'labels' => [
				'name' => 'Pick Up News',
				'singular_name' => 'Pick Up News'
			],
			'hierarchical' => true, // このタクソノミーが階層化される（カテゴリーのように）かどうか
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_rest' => true,
			'query_var' => true,
			'show_in_menu' => false //管理画面メニュー表示
	);
	register_taxonomy('pick_up_news', ['game', 'music' , 'entertainment', 'animation'], $args);

	//紐づけタグ
	$args = array(
			'label' => '付属情報紐づけ',
			'labels' => [
				'all_items' => '付属情報紐づけ一覧',
				'add_new_item' => '付属情報紐づけを追加',
				'name' => '付属情報紐づけ',
				'singular_name' => '付属情報紐づけ',
			],
			'hierarchical' => false, // このタクソノミーが階層化される（カテゴリーのように）かどうか
			'public' => true,
			'show_ui' => true,
			'show_in_rest' => true,
			'query_var' => true,
	);
	register_taxonomy('meta-bind', ['game', 'music', 'entertainment', 'animation', 'meta-info'], $args);
}
// init アクションフックを使用して、カスタムタクソノミーを初期化
add_action('init', 'add_custom_taxonomy');

// 「新規カテゴリー追加」を非表示
function my_admin_style() {
    echo '<style>
    div.components-flex-item > button {
        display:none;
    }
    </style>'.PHP_EOL;
}
add_action('admin_print_styles', 'my_admin_style');

// 管理画面メニュー情報変更
function change_menu_label() {
	global $menu, $submenu;
	unset($menu[2]); //ダッシュボード
	unset($menu[4]); //スペース
	unset($menu[10]);//メディア
	unset($menu[5]); //投稿
	// $menu[6];//インタビュー
	// $menu[7];//音楽
	// $menu[8];//アニメ
	// $menu[9];//ゲーム
	// $menu[]
	// $menu[15];
	// $menu[25];
	$menu[19] = ["画像・ファイル", "upload_files", "upload.php", "", "menu-top menu-icon-media" ,"menu-media" ,"dashicons-admin-media"];
	$submenu['upload.php'][5][0] = '画像・ファイル一覧';
	$submenu['upload.php'][10][0] = '画像・ファイルを追加';
}
add_action( 'admin_menu', 'change_menu_label' );

function add_custom_menu_item() {
	add_menu_page(
			'TOPカルーセル', // ページタイトル
			'TOPカルーセル', // メニュータイトル
			'manage_options', // 必要な権限
			'top_carousel-list', // ページスラッグ
			'display_menu_top_carousel' // ページを表示する関数
	);
	add_menu_page(
			'Pick Up News', // ページタイトル
			'Pick Up News', // メニュータイトル
			'manage_options', // 必要な権限
			'pick_up_news-list', // ページスラッグ
			'display_menu_pick_up_news' // ページを表示する関数
	);
}
add_action('admin_menu', 'add_custom_menu_item');