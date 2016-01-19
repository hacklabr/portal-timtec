<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */

if(preg_match('#^/pt/cursos/?(\?.*)?#', $_SERVER['REQUEST_URI'])){
    header('Location: http://mooc.timtec.com.br/courses');
    http_response_code(307);
    die;
}

pll_register_string('Texto do link leia mais', 'leia mais', 'timtec');

function custom_excerpt_length( $length ) {
    return 23;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


//function new_excerpt_more($more) {
//  global $post;
//  return '<a class="moretag" href="'. get_permalink($post->ID) . '"> &hellip; ' . pll__('leia mais') . '</a>';
//}
//add_filter( 'excerpt_more', 'new_excerpt_more', 999 );

define('SLUG', 'portal-timtec');

add_action('init', function(){
  global $WPEIP;
  if(function_exists('pll_default_language') && $WPEIP){
    global $WPEIP;
    $WPEIP->setDefaultLanguage(pll_default_language());
    $WPEIP->setCurrentLanguage(pll_current_language());
  }
});

session_start();

require __DIR__ . '/inc/classes/PrivateFile.php';
require __DIR__ . '/inc/classes/OneToOneMetabox.php';
require __DIR__ . '/inc/classes/OneToManyMetabox.php';
require __DIR__ . '/inc/classes/ManyToManyRelation.php';

require __DIR__ . '/inc/ajax.php';

require __DIR__ . '/inc/post-types/teacher.php';
require __DIR__ . '/inc/post-types/course.php';
require __DIR__ . '/inc/post-types/organization.php';
require __DIR__ . '/inc/post-types/redessociais.php';
require __DIR__ . '/inc/post-types/conselho.php';
require __DIR__ . '/inc/post-types/faq.php';
//require __DIR__ . '/inc/post-types/installation.php';

require __DIR__ . '/inc/metaboxes/teacher-course-relation.php';
require __DIR__ . '/inc/metaboxes/course-download.php';
require __DIR__ . '/inc/metaboxes/link_redesocial.php';
require __DIR__ . '/inc/metaboxes/list_icon_awesome.php';

require __DIR__ . '/inc/metaboxes/page-header-text.php';

require __DIR__ . '/inc/shortcode-destaque.php';
require __DIR__ . '/inc/shortcode-accordion.php';
require __DIR__ . '/inc/admin-page-destaques-noticias.php';

require __DIR__ . '/inc/widgets/widget-forum-categories.php';
require __DIR__ . '/inc/widgets/widget-forum-tags.php';

require __DIR__ . '/inc/menu-walkers/MenuWalker_Buttons.php';

global $_MENUS;

$_MENUS = [
    'sobre' => [
        'Conheça o TIMTec' => '/pt/conheca-timtec/',
        'O que são MOOCs' => '/pt/o-que-sao-moocs/',
        'Conselho Consultivo TIMTec' => '/pt/conselho/',
    ],
    'software' => [
        'Explore a plataforma' => '/pt/explore-a-plataforma/',
        'Instale agora' => '/pt/download/',
        'Manuais da plataforma' => '/pt/manuais/',
        'Desenvolva o software' => '/pt/desenvolva-o-software/',
    ],
    'cursos' => [
        'Lista de cursos' => '/pt/lista-de-cursos/',
    ],
    'rede' => [
        'Conheça a rede TIMTec' => '/pt/conheca-a-rede-tim-tec/',
        'FAQ' => '/faq/',
        'Fórum' => '/pt/forum/',
        'Suporte' => '/pt/suporte/',
    ]
];

$sage_includes = [
  'lib/utils.php',                 // Utility functions
  'lib/init.php',                  // Initial theme setup and constants
  'lib/wrapper.php',               // Theme wrapper class
  'lib/conditional-tag-check.php', // ConditionalTagCheck class
  'lib/config.php',                // Configuration
  'lib/assets.php',                // Scripts and stylesheets
  'lib/titles.php',                // Page titles
  'lib/extras.php',                // Custom functions
  'inc/metaboxes/url-video-course.php', //MetaBox
  'inc/metaboxes/url-course.php', //MetaBox
  'inc/metaboxes/colorbox-category.php', //ColorBox Category
  ];

  foreach ($sage_includes as $file) {
    if (!$filepath = locate_template($file)) {
      trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
    }

    require_once $filepath;
  }
  unset($file, $filepath);



/*
 *  ================ REWRITE RULES ================ *
 */
//*

//pll_register_string('URL Cursos', 'cursos', 'timtec');
pll_register_string('URL Software', 'software', 'timtec');
pll_register_string('URL Redes', 'redes', 'timtec');
pll_register_string('URL Noticias', 'noticias', 'timtec');
pll_register_string('URL Suporte', 'suporte', 'timtec');
pll_register_string('URL Cadastro', 'cadastro', 'timtec');
//pll_register_string('URL Contato', 'contato', 'timtec');
//pll_register_string('URL Conselho', 'conselho', 'timtec');

pll_register_string('URL Manuais', 'manuais', 'timtec');
pll_register_string('URL Desenvolva', 'desenvolva-o-software', 'timtec');
pll_register_string('URL Download', 'download', 'timtec');
//pll_register_string('URL Faq', 'faq', 'timtec');
pll_register_string('URL Mural', 'mural', 'timtec');
pll_register_string('URL Conheça', 'conheca-timtec', 'timtec');
pll_register_string('URL MOOCS', 'o-que-sao-moocs', 'timtec');
pll_register_string('URL Explore', 'explore-a-plataforma', 'timtec');
// pll_register_string('URL Conheça a Rede', 'conheca-a-rede-tim-tec', 'timtec');

add_action('generate_rewrite_rules', function ($wp_rewrite) {
  $new_rules=[];
  foreach (pll_languages_list() as $lcode) {
//    $str_courses = pll_translate_string('cursos', $lcode);
//    $new_rules["^$lcode/$str_courses/?$"] = "index.php?template=courses";

//    $str_conselho = pll_translate_string('conselho', $lcode);
//    $new_rules["^$lcode/$str_conselho/?$"] = "index.php?template=conselho";
//
//    $str_software = pll_translate_string('software', $lcode);
//    $new_rules["^$lcode/$str_software/?$"] = "index.php?template=software";
//
//    $str_redes = pll_translate_string('redes', $lcode);
//    $new_rules["^$lcode/$str_redes/?$"] = "index.php?template=redes";
//
    $str_noticias = pll_translate_string('noticias', $lcode);
    $new_rules["^$lcode/$str_noticias/?$"] = "index.php?post_type=post";
//
//    $str_suporte = pll_translate_string('suporte', $lcode);
//    $new_rules["^$lcode/$str_suporte/?$"] = "index.php?template=suporte";
//
//    $str_cadastro = pll_translate_string('cadastro', $lcode);
//    $new_rules["^$lcode/$str_cadastro/?$"] = "index.php?template=cadastro";
//
////    $str_contato = pll_translate_string('contato', $lcode);
////    $new_rules["^$lcode/$str_contato/?$"] = "index.php?template=contato";
//
//
//    $str_manuais = pll_translate_string('manuais', $lcode);
//    $new_rules["^$lcode/$str_manuais/?$"] = "index.php?template=manuais";
//
//    $str_desenvolva = pll_translate_string('desenvolva-o-software', $lcode);
//    $new_rules["^$lcode/$str_desenvolva/?$"] = "index.php?template=desenvolva-o-software";
//
//    $str_download = pll_translate_string('download', $lcode);
//    $new_rules["^$lcode/$str_download/?$"] = "index.php?template=download";
//
//    $str_faq = pll_translate_string('faq', $lcode);
//    $new_rules["^$lcode/$str_faq/?$"] = "index.php?template=faq";
//
//    $str_mural = pll_translate_string('mural', $lcode);
//    $new_rules["^$lcode/$str_mural/?$"] = "index.php?template=mural";
//
//    $str_conheca = pll_translate_string('conheca-timtec', $lcode);
//    $new_rules["^$lcode/$str_conheca/?$"] = "index.php?template=conheca-timtec";
//
//    $str_moocs = pll_translate_string('o-que-sao-moocs', $lcode);
//    $new_rules["^$lcode/$str_moocs/?$"] = "index.php?template=o-que-sao-moocs";
//
//    $str_explore = pll_translate_string('explore-a-plataforma', $lcode);
//    $new_rules["^$lcode/$str_explore/?$"] = "index.php?template=explore-a-plataforma";

//    $str_conheca_rede = pll_translate_string('conheca-a-rede-tim-tec', $lcode);
//    $new_rules["^$lcode/$str_conheca_rede/?$"] = "index.php?template=conheca-a-rede-tim-tec";

  }
  $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
  return $wp_rewrite;
});

add_filter('query_vars', function ($public_query_vars) {
  $public_query_vars[] = "template";
  return $public_query_vars;
});

add_action('template_redirect', function() {
  if ($template = get_query_var('template')) {
    if(file_exists(__DIR__ . "/templates/page-{$template}.php")){
      require __DIR__ . "/templates/page-{$template}.php";
      die;
    }
  }
});
add_action( 'after_setup_theme', function(){
    $menus = [
        'sobre' => 'Menu Sobre',
        'software' => 'Menu Software',
        'cursos' => 'Menu Cursos',
        'rede' => 'Menu Rede'
    ];

    foreach($menus as $location => $description){
        register_nav_menu( $location , $description );
    }
});

// */

/**
* Adicionar Select com Busca de Icones Awesome Post_type RedeSocial
*/
function rede_social_icon_select() {
  global $post_type;
  if(is_admin() && $post_type  ==  'rede_social' ){

    wp_register_script('fontawesomeiconpicker', get_bloginfo('template_directory') .'/assets/scripts/fontawesome-iconpicker.min.js');
    wp_enqueue_script('fontawesomeiconpicker');

    wp_register_script('icon-selector', get_bloginfo('template_directory') .'/assets/scripts/icon-selector.js');
    wp_enqueue_script('icon-selector');

    wp_register_style('fontawesomecss', get_bloginfo('template_directory') .'/assets/styles/font-awesome.min.css');
    wp_enqueue_style('fontawesomecss');

    wp_register_style('fontawesomeiconpickercss', get_bloginfo('template_directory') .'/assets/styles/fontawesome-iconpicker.min.css');
    wp_enqueue_style('fontawesomeiconpickercss');
  }

}

add_action( 'admin_print_scripts-post-new.php', 'rede_social_icon_select', 11 );
add_action( 'admin_print_scripts-post.php', 'rede_social_icon_select', 11 );




/**
* Alterar Nome PostType "Post"  para "Notícias"
**/
add_action( 'admin_menu', 'rename_post_for_noticia_label' );
add_action( 'init', 'rename_post_for_noticia_object' );
function rename_post_for_noticia_label() {
  global $menu;
  global $submenu;
  $menu[5][0] = 'Notícias';
  $submenu['edit.php'][5][0] = 'Notícias';
  $submenu['edit.php'][10][0] = 'Add Notícias';
  $submenu['edit.php'][16][0] = 'Notícias Tags';
  echo '';
}

function rename_post_for_noticia_object() {
  global $wp_post_types;
  
  $wp_post_types['post']->has_archive = true;
  $wp_post_types['post']->rewrite = pll__('noticias');
  
  $labels = &$wp_post_types['post']->labels;
  $labels->name = 'Notícias';
  $labels->singular_name = 'Notícias';
  $labels->add_new = 'Add Notícias';
  $labels->add_new_item = 'Add Notícias';
  $labels->edit_item = 'Edit Notícias';
  $labels->new_item = 'Notícias';
  $labels->view_item = 'View Notícias';
  $labels->search_items = 'Search Notícias';
  $labels->not_found = 'No Notícias found';
  $labels->not_found_in_trash = 'No Notícias found in Trash';
  $labels->all_items = 'All Notícias';
  $labels->menu_name = 'Notícias';
  $labels->name_admin_bar = 'Notícias';
}



// Remove sharing buttons on archive and search pages
// function jptweak_remove_share() {
//   if ( is_page( 4  ) || is_page( 46 )) {
//       remove_filter( 'the_content', 'sharing_display',19 );
//       remove_filter( 'the_excerpt', 'sharing_display',19 );
//       if ( class_exists( 'Jetpack_Likes' ) ) {
//           remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
//       }
//   }

// }

function jptweak_remove_share() {
    remove_filter( 'the_content', 'sharing_display',19 );
    remove_filter( 'the_excerpt', 'sharing_display',19 );
    if ( class_exists( 'Jetpack_Likes' ) ) {
        remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
    }
}

add_action( 'loop_start', 'jptweak_remove_share' );


