<?php

new PrivateFile(array(
    'slug' => 'course-download',
    'post_type' => 'course',
    'meta_name' => 'course-download',
    'title' => __('Course Download File', SLUG),
    'description' => '',
    'validation' => 'application/x-gzip',
    'access_control' => function () {
        return is_user_logged_in();
    },
));