<?php

new PrivateFile(array(
    'slug' => 'course-download',
    'post_type' => 'course',
    'meta_name' => 'exported-file',
    'title' => __('Course Download File', SLUG),
    'description' => '',
    'validation' => '.*',
    'validation_error' => __('Invalid file', SLUG),
    'access_control' => function(){
        if(is_user_logged_in()){
            $form_sent = get_user_meta(get_current_user_id(), 'form_sent', true);
            return $form_sent;
        } else {
            return false;
        }
    },
));