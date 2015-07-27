<?php

new PrivateFile(array(
    'slug' => 'course-download',
    'post_type' => 'course',
    'meta_name' => 'exported-file',
    'title' => __('Course Download File', SLUG),
    'description' => '',
    'validation' => 'application\/x\-(gzip|xz)',
    'title' => __('Invalid file', SLUG),
    'access_control' => function () {
        return is_user_logged_in();
    },
));