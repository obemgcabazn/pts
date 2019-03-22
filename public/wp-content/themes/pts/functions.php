<?php
if ( !is_admin() )  show_admin_bar(false);

register_nav_menus( array( 
  'header_menu' => __( 'Верхнее меню' ), 
  'footer_menu' => __( 'Нижнее меню' ), 
));

// Добавляем Стили и Скрипты
if ( !is_admin() ) {
  add_action( 'wp_print_styles', 'pts_style_method' );
  add_action( 'wp_enqueue_scripts', 'pts_scripts_method' );
}

function pts_style_method () {
  wp_enqueue_style( 'bootstrap', get_template_directory_uri() . "/css/bootstrap-pts.css", '', '', '' );
  wp_enqueue_style( 'concat', get_template_directory_uri() . "/css/concat.css", '', '', '' );
}

function pts_scripts_method(){
  wp_deregister_script('jquery');
  wp_enqueue_script('jquery', "https://yastatic.net/jquery/2.0.3/jquery.min.js", '', '', 'true');
  wp_enqueue_script( 'popper', "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js", '', '', 'true');
  wp_enqueue_script( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', '', '', 'true' );
  wp_enqueue_script( 'carousel', get_template_directory_uri() . "/js/jquery.carouFredSel-6.0.4-packed.js", '', '', 'true' );
  wp_enqueue_script( 'script', get_template_directory_uri() . '/js/scripts.js', '', '', 'true' );
}

//Выводит Заголовок страницы Title
function get_title() {
  $queried_object = get_queried_object();

  if($title = get_field('title')) {
    return $title;
  } else {
    return ltrim(wp_title("",false));
  }
}


// Вывод верхнего меню
function print_top_menu() {
  $header_menu = wp_nav_menu( array(
      'theme_location'  => 'header_menu',
      'container'       => 'nav',
      'container_class' => 'navbar',
      'container_id'    => '',
      'menu'            => 'div',
      'menu_class'      => 'nav',
      'fallback_cb'     => 'wp_page_menu',
      'items_wrap'      => '<ul id="%1$s" class="%2$s" role="navigation">%3$s</ul>',
      'depth'           => 0,
      'echo'            => 0
  ) );
  $header_menu = str_replace('class="menu-item', 'class="menu-item nav-item', $header_menu);
  $header_menu = str_replace('<a href', '<a class="nav-link" href', $header_menu);
  return $header_menu;
}

// Вывод верхнего меню
function print_footer_menu() {
  $header_menu = wp_nav_menu( array(
      'theme_location'  => 'footer_menu',
      'container'       => 'nav',
      'container_class' => 'navbar',
      'container_id'    => '',
      'menu'            => 'div',
      'menu_class'      => 'nav',
      'fallback_cb'     => 'wp_page_menu',
      'items_wrap'      => '<ul id="%1$s" class="%2$s" role="navigation">%3$s</ul>',
      'depth'           => 0,
      'echo'            => 0
  ) );
  $header_menu = str_replace('class="menu-item', 'class="menu-item nav-item', $header_menu);
  $header_menu = str_replace('<a href', '<a class="nav-link" href', $header_menu);
  return $header_menu;
}


// Отключаем сам REST API
add_filter('rest_enabled', '__return_false');

// Отключаем фильтры REST API
remove_action( 'xmlrpc_rsd_apis',            'rest_output_rsd' );
remove_action( 'wp_head',                    'rest_output_link_wp_head', 10, 0 );
remove_action( 'template_redirect',          'rest_output_link_header', 11, 0 );
remove_action( 'auth_cookie_malformed',      'rest_cookie_collect_status' );
remove_action( 'auth_cookie_expired',        'rest_cookie_collect_status' );
remove_action( 'auth_cookie_bad_username',   'rest_cookie_collect_status' );
remove_action( 'auth_cookie_bad_hash',       'rest_cookie_collect_status' );
remove_action( 'auth_cookie_valid',          'rest_cookie_collect_status' );
remove_filter( 'rest_authentication_errors', 'rest_cookie_check_errors', 100 );

// Отключаем события REST API
remove_action( 'init',          'rest_api_init' );
remove_action( 'rest_api_init', 'rest_api_default_filters', 10, 1 );
remove_action( 'parse_request', 'rest_api_loaded' );

// Отключаем Embeds связанные с REST API
remove_action( 'rest_api_init',          'wp_oembed_register_route'              );
remove_filter( 'rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4 );

remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
// если собираетесь выводить вставки из других сайтов на своем, то закомментируйте след. строку.
remove_action( 'wp_head',                'wp_oembed_add_host_js'                 );

remove_filter('the_content', 'wptexturize'); /* убираем авотдобавление параграфиов */
remove_action( 'wp_head', 'wp_resource_hints', 2); /* удаляем dns-prefetch */

// убираем emoji
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

// Убираем мусор из шапки
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');

/* удаляем shortlink и canonical */
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );
remove_action ('wp_head', 'rel_canonical');

/* Сброс фильтра для html в описании категории */
remove_filter('pre_term_description', 'wp_filter_kses');
remove_filter('pre_term_description', 'wp_kses_data');

// Удаляем RSS ленту
function fb_disable_feed() {
  wp_redirect(get_option('siteurl'));//будет осуществляться редирект на главную страницу
}
add_action('do_feed', 'fb_disable_feed', 1);
add_action('do_feed_rdf', 'fb_disable_feed', 1);
add_action('do_feed_rss', 'fb_disable_feed', 1);
add_action('do_feed_rss2', 'fb_disable_feed', 1);
add_action('do_feed_atom', 'fb_disable_feed', 1);
add_action('do_feed_rss2_comments', 'fb_disable_feed', 1);
add_action('do_feed_atom_comments', 'fb_disable_feed', 1);
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );