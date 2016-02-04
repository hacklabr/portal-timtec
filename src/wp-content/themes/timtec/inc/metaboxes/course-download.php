<?php
global $couse_download; 

$couse_download = new PrivateFile(array(
    'slug' => 'course-download',
    'post_type' => 'course',
    'meta_name' => 'exported-file',
    'title' => __('Course Download File', SLUG),
    'description' => '',
    'validation' => '.*',
    'validation_error' => __('Invalid file', SLUG),
    'access_control' => function(){
        if(is_user_logged_in()){
            return true;
        } else {
           return wp_redirect( home_url() . "/lista-de-cursos" );;
        }
    },
));