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

define('SLUG', 'portal-timtec');

session_start();

require __DIR__ . '/inc/classes/PrivateFile.php';
require __DIR__ . '/inc/classes/OneToOneMetabox.php';
require __DIR__ . '/inc/classes/OneToManyMetabox.php';
require __DIR__ . '/inc/classes/ManyToManyRelation.php';

require __DIR__ . '/inc/ajax.php';

require __DIR__ . '/inc/post-types/teacher.php';
require __DIR__ . '/inc/post-types/course.php';
require __DIR__ . '/inc/post-types/organization.php';
//require __DIR__ . '/inc/post-types/installation.php';

require __DIR__ . '/inc/metaboxes/teacher-course-relation.php';
require __DIR__ . '/inc/metaboxes/course-download.php';



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
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

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
 

