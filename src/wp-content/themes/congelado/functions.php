<?php
/*
 * IMPORTANTE
 * substituir todos os SLUG pelo slug do projeto
 */

include dirname(__FILE__).'/includes/congelado-functions.php';
include dirname(__FILE__).'/includes/html.class.php';
include dirname(__FILE__).'/includes/utils.class.php';
include dirname(__FILE__).'/includes/opengraph.php';
//include dirname(__FILE__).'/includes/form.class.php';


/*
 * Content Width
 */
if ( ! isset( $content_width ) ) :
    $content_width = 980;
endif;

/*
 *
 * Settings Default setup
 *
 */
add_action( 'after_setup_theme', 'SLUG_setup' );
function SLUG_setup() {

    load_theme_textdomain('SLUG', get_template_directory() . '/languages' );

    /*
     *
     * Enable support FEED
     *
     */
    add_theme_support('automatic-feed-links');

    /*
     * Post Thumbnails
     * set_post_thumbnail_size( 200, 150, true );
     *
     * REGISTRAR AQUI TODOS OS TAMANHOS UTILIZADOS NO LAYOUT
     *
     * add_image_size('nome',X,Y);
     * add_image_size('nome2',X,Y);
     */
    add_theme_support('post-thumbnails');

    /*
     *
     * Custom Background
     *
     */
    add_theme_support('custom-background');
}

/*
 *
 * Custom Header
 *
 */

//include dirname(__FILE__).'/includes/custom-header.php';

/*
 *
 * Remove admin bar from front-end
 *
 */
remove_action('wp_footer','wp_admin_bar_render',1000);
function remove_admin_bar() {
   return false;
}
add_filter( 'show_admin_bar' , 'remove_admin_bar');

/*
 *
 * Excerpet More
 *
 */
add_filter('utils_excerpt_more_link', 'SLUG_utils_excerpt_more',10,2);
function SLUG_utils_excerpt_more($more_link, $post){
    return '...<br /><a class="more-link" href="'. get_permalink($post->ID) . '">' . __('Continue reading &raquo;', 'SLUG') . '</a>';
}
add_filter( 'excerpt_more', 'SLUG_auto_excerpt_more' );
function SLUG_auto_excerpt_more( $more ) {
    global $post;
    return '...<br /><a class="more-link" href="'. get_permalink($post->ID) . '">' . __('Continue reading &raquo;', 'SLUG') . '</a>';
}

/*
 * Register Sidebar
*/
    if(function_exists('register_sidebar')) :
        register_sidebar( array(
            'name' =>  'Sidebar',
            'description' => __('Sidebar', 'psa'),
            'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content clearfix">',
            'after_widget' => '</div></div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ) );
    endif;
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////







/////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////   LOGIN SCREEN  //////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////

function SLUG_custom_login_logo() {
    echo '
        <style type="text/css">
            .login h1 a { background-image: url('. html::getImageUrl('logo.png') .'); background-size: auto; }
        </style>';
}
add_action('login_head', 'SLUG_custom_login_logo');

function new_headertitle($url) {
    return get_bloginfo('sitetitle');
}
add_filter('login_headertitle','new_headertitle');

function custom_login_headerurl($url) {
    return home_url();
}
add_filter ('login_headerurl', 'custom_login_headerurl');

/*
 *
 * Custom Menus
 *
 */
add_action( 'init', 'SLUG_custom_menus' );
function SLUG_custom_menus() {
    register_nav_menus( array(
        'main' => __('Menu name', 'SLUG'),
    ) );
}

/*
 *
 * Comments
 *
 */
if (!function_exists('SLUG_comment')) :
    function SLUG_comment($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        ?>
        <li <?php comment_class("clearfix"); ?> id="comment-<?php comment_ID(); ?>">
            <p class="comment-meta alignright bottom">
                <?php comment_reply_link(array('depth' => $depth, 'max_depth' => $args['max_depth'])) ?> <?php edit_comment_link( __('Edit', 'SLUG'), '| ', ''); ?>
            </p>
            <p class="comment-meta bottom">
                <?php printf( __('By %s on %s at %s.', 'SLUG'), get_comment_author_link(), get_comment_date(), get_comment_time()); ?>
                <?php if($comment->comment_approved == '0') : ?><br/><em><?php _e('Your comment is awaiting moderation.', 'SLUG'); ?></em><?php endif; ?>
            </p>
            <?php echo get_avatar($comment, 66); ?>
            <div class="content">
                <?php comment_text(); ?>
            </div>
        </li>
        <?php
    }
endif;

/*
 * Emails sender
*/
add_filter( 'wp_mail_from_name', 'colband_mail_sender_name' );
function colband_mail_sender_name($from_name) {
    return get_option('blogname');
}
add_filter( 'wp_mail_from', 'colband_mail_sender' );
function colband_mail_sender($from_name) {
    return get_option('admin_email');
}

/*
 *
 * Add files Javascript & CSS
 *
 */

add_action('wp_print_scripts', 'SLUG_addJS');
function SLUG_addJS() {
    if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' );
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-ui-core');
    wp_enqueue_script('jquery-ui-widget');

    wp_enqueue_script('congelado', get_stylesheet_directory_uri().'/js/congelado.js', array('jquery-ui-widget'));

    wp_localize_script('congelado', 'vars', array(
        'ajaxurl' => admin_url('admin-ajax.php')
    ));

}

add_action('wp_print_styles', 'SLUG_addCSS');
function SLUG_addCSS() {
    wp_enqueue_style( 'SLUG-default', get_stylesheet_uri() );
    //wp_enqueue_style('XXXXX', get_stylesheet_directory_uri().'/css/XXXX.css');
}

/*
 *
 * Version files CSS/JS
 *
 * Description: Force the browser to load the file when amended
 */
add_action( 'wp_print_scripts', function() {
    global $wp_scripts;
    if ( $wp_scripts != NULL ) :
        foreach( $wp_scripts->registered as $script) :
            $src = str_replace(get_bloginfo('url'),'',$script->src);
            if(preg_match('#^/?wp-content#',$src)){
                $fname = ABSPATH."/$src";
                $script->ver = $script->ver ? $script->ver . '.' . md5_file($fname) : md5_file($fname);
            }
        endforeach;
    endif;
});
add_action( 'wp_print_styles', function() {
    global $wp_styles;

    if ( $wp_styles != NULL ) :
        foreach( $wp_styles->registered as $style_name => $style) :
            $src = str_replace(get_bloginfo('url'), '', $style->src);
            if(preg_match('#^/?wp-content#', $src)) :
                $fname = ABSPATH."/$src";
                $style->ver = $style->ver ? $style->ver . '.' . md5_file($fname) : md5_file($fname);
            endif;
        endforeach;
    endif;
});
