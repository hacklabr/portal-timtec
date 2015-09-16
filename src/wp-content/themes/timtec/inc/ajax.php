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

add_action("wp_ajax_saveCadUserDown", function() {

    $name = $_POST['name'];
    $name = explode(" ", $name);
        for ($i = 0; $i < sizeof($name); $i++) {
            if ($i < 1) {
                $first_name = $name[$i];
            } else {
                $last_name .= " " . $name[$i];
            }
        }

    $email =  isset($_POST['email']) ? $_POST['email']: null;
    $login = isset($_POST['login']) ? $_POST['login']: null;
    $pass = isset($_POST['password']) ? $_POST['password']: null;
    $telefone = isset($_POST['telefone']) ? $_POST['telefone']: null;
    $form_sent = isset($_POST['form_sent']) ?$_POST['form_sent']: null;
    $last_name =  isset($last_name) ? $last_name: null;
   

    $user_id = wp_insert_user(array(
        'user_email' => $email,
        'user_pass' => $pass,
        'user_login' => $login,
        'first_name' => $first_name,
        'last_name' => $last_name
        ));

    $user_meta = add_user_meta( $user_id, 'telefone', $telefone );
    $user_meta = add_user_meta( $user_id, 'form_sent', $form_sent );
    
    $success = !is_wp_error($user_meta);

    $response = array(
        'success' => $success,
        'is_user_logged_in' => $success,
        'error' => !$success ? $user_id->get_error_message() : null
    );

    echo json_encode($response);

    die();
});
