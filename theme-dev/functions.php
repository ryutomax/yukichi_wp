<?php
// CSSファイル読み込み
function enqueue_styles() {
	$version = date('Ymd-His'); // バージョン番号を設定

	if (is_page('contact')) {
		wp_enqueue_style('jquery-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css', [], $version, 'al');
	}
	// wp_enqueue_style('slick',  get_template_directory_uri() .'/assets/vender/slick-1.8.1/slick/slick.css', [], $version, 'all');
	// wp_enqueue_style('slick-theme',  get_template_directory_uri() .'/assets/vender/slick-1.8.1/slick/slick-theme.css', [], $version, 'all');
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
	// wp_enqueue_script('jQuery', get_template_directory_uri() . '/assets/vender/jquery-3.7.1.min.js', [], $version, true);
	// wp_enqueue_script('slick-min', get_template_directory_uri() . '/assets/vender/slick-1.8.1/slick/slick.min.js', [], $version, true);
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

//カスタム投稿タイプ生成 呼び出し
function create_post_type() {

	post_type_template('menu', 'おしながき', 7);
	post_type_template('news', 'お知らせ', 8);
}
add_action( 'init', 'create_post_type' );

//アイキャッチ画像有効化
add_theme_support( 'post-thumbnails' );

//投稿タイプ生成
function post_type_template ($postTypeName, $label, $menuPosition) {
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
			"{$postTypeName}-cat",
			$postTypeName,
			[
				'label' => 'カテゴリ',
				'labels' => array(
					'all_items' => 'カテゴリ一覧',
					'add_new_item' => 'カテゴリを追加',
					'name' => 'カテゴリ',
					'singular_name' => 'カテゴリ',
				),
				'hierarchical' => true,
				'public' => true,
				'show_ui' => true,
				'show_in_rest' => true,
				// 'show_in_menu' => false //管理画面 非表示
			]
		);
}

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

// ========================================
// カスタム投稿タイプ　一覧レイアウト調整
// ========================================
// 管理画面にカスタムタクソノミーのドロップダウンを追加
function add_custom_taxonomy_filter() {
	global $typenow;
	$post_type = 'menu'; // カスタム投稿タイプのスラッグ
	$taxonomy  = 'menu-cat'; // カスタムタクソノミーのスラッグ

	if ($typenow == $post_type) {
			$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
			$info_taxonomy = get_taxonomy($taxonomy);
			wp_dropdown_categories(array(
					'show_option_all' => __("全ての{$info_taxonomy->label}"),
					'taxonomy'        => $taxonomy,
					'name'            => $taxonomy,
					'orderby'         => 'name',
					'selected'        => $selected,
					'show_count'      => true,
					'hide_empty'      => true,
			));
	};
}
add_action('restrict_manage_posts', 'add_custom_taxonomy_filter');

// クエリを変更して絞り込みを実施
function filter_custom_post_type_by_taxonomy($query) {
	global $pagenow;
	$post_type = 'menu'; // カスタム投稿タイプのスラッグ
	$taxonomy  = 'menu-cat'; // カスタムタクソノミーのスラッグ

	if ($pagenow == 'edit.php' && isset($_GET[$taxonomy]) && $_GET[$taxonomy] != '' && $query->query_vars['post_type'] == $post_type) {
			$term = get_term_by('id', $_GET[$taxonomy], $taxonomy);
			$query->query_vars[$taxonomy] = $term->slug;
	}
}
add_filter('pre_get_posts', 'filter_custom_post_type_by_taxonomy');


// カスタム列を追加
function add_custom_taxonomy_column($columns) {
    // 新しい列を追加する前に、既存の列を保持する
    $new_columns = array();

    foreach ($columns as $key => $value) {
        $new_columns[$key] = $value;
        // 'date'列の前に新しい列を追加
        if ($key === 'title') {
            $new_columns['menu-cat'] = __('カテゴリ');
        }
    }

    return $new_columns;
}
add_filter('manage_menu_posts_columns', 'add_custom_taxonomy_column');

// カスタム列にデータを表示
function display_custom_taxonomy_column($column, $post_id) {
    if ($column == 'menu-cat') {
        $terms = get_the_terms($post_id, 'menu-cat');
        if (!empty($terms)) {
            $out = array();
            foreach ($terms as $term) {
                $out[] = sprintf('<a href="%s">%s</a>',
                    esc_url(add_query_arg(array('menu' => get_post_type($post_id), 'menu-cat' => $term->slug), 'edit.php')),
                    esc_html(sanitize_term_field('name', $term->name, $term->term_id, 'menu-cat', 'display'))
                );
            }
            echo join(', ', $out);
        } else {
            _e('なし');
        }
    }
}
add_action('manage_menu_posts_custom_column', 'display_custom_taxonomy_column', 10, 2);

// ========================================
// カスタム投稿タイプ　一覧レイアウト調整　end
// ========================================