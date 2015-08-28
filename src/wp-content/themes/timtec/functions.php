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
