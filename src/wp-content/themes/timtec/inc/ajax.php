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

add_action( "wp_ajax_saveCadUserDown", function() {

    $nome_completo = isset($_POST['nome']) ? $_POST['nome'] : null;
    $nome_usuario = isset($_POST['usuario']) ? $_POST['usuario']: null;
    $email = isset($_POST['email']) ? $_POST['email']: null;
    $confirmar_email = isset($_POST['confirmemail']) ?$_POST['confirmemail']: null;
    $senha = isset($_POST['senha']) ? $_POST['senha']: null;
    $confirmar_senha = isset($_POST['repetir_senha']) ? $_POST['repetir_senha']: null;   
    $instituicao = isset($_POST['instituicao']) ? $_POST['instituicao']: null;
    $estado = isset($_POST['estado']) ? $_POST['estado']: null;
    $cidade = isset($_POST['cidade']) ?$_POST['cidade']: null;
    
    $first_name = $nome_completo;
    $last_name = " ";
    
    $name = explode( " ", $nome_completo );
    for ($i = 0; $i < count($name); $i++) {
        if ($i < 1) {
            $first_name = $name[$i];
        } else {
            $last_name .= " " . $name[$i];
        }
    }
   
    $user_id = wp_insert_user(array(
        'user_login'=> $nome_usuario,
        'user_email' => $email,
        'user_pass' => $senha,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'user_registered' => date('j F Y'),
        'role' => 'subscriber',      
    ));

    if ( is_wp_error( $user_id ) ) {
        $response = array(
            'success' => "false",
            'error' => $user_id->get_error_message(),
        );
    }else{
        update_user_meta( $user_id, 'instituicao', $instituicao );
        update_user_meta( $user_id, 'estado', $estado );
        update_user_meta( $user_id, 'cidade', $cidade );

        $response = array(
            'success' => "true",
            'error' => ""
        );
    };

    echo json_encode( $response );
 
    die();
});
