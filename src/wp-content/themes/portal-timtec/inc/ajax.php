<?php

add_action("wp_ajax_search", function() {
    //ex jQuery.getJSON(ajaxurl,{action: 'search', post_type:'evento', fields:'ID,post_title', keyword:'e'}, function(r){ console.log(r); })
    $args = array(
        'post_type' => $_REQUEST['post_type'],
        'posts_per_page' => -1,
        'post_parent' => 0,
        'orderby' => 'title',
        'order' => 'ASC',
        's' => $_REQUEST['keyword']
    );
    if ($_REQUEST['fields']) {
        $fields = explode(',', $_REQUEST['fields']);
        $response = array_map(function($item) use($fields) {
            $result = array();
            foreach ($fields as $field) {
                if ($item->$field) {
                    $result[$field] = $item->$field;
                }
            }
            return $result;
        }, get_posts($args));
    } else {
        $response = get_posts($args);
    }
    echo json_encode($response);
    die;
});
