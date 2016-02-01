<?php

    add_action( 'show_user_profile', 'timtec_user_profile_fields' );
    add_action( 'edit_user_profile', 'timtec_user_profile_fields' );

    function timtec_user_profile_fields( $user ) { 
?>
    <table class="form-table">
        <h3> Campos do Cadastro </h3>
        <tr>
            <th><label for="twitter">Instituição</label></th>
            <td>
                <input type="text" name="instituicao" id="instituicao" value="<?php echo esc_attr( get_the_author_meta( 'instituicao', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"> Nome da instituição. </span>
            </td>
        </tr>
        <tr>
            <th><label for="twitter">Estado</label></th>
            <td>
                <input type="text" name="estado" id="estado" value="<?php echo esc_attr( get_the_author_meta( 'estado', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"> Nome do estado. </span>
            </td>
        </tr>
        <tr>
            <th><label for="twitter">Cidade</label></th>
            <td>
                <input type="text" name="cidade" id="cidade" value="<?php echo esc_attr( get_the_author_meta( 'cidade', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"> Nome da cidade. </span>
            </td>
        </tr>
    </table>
<?php 
    };
?>


<?php 
    add_action( 'personal_options_update', 'timtec_user_profile_fields_save' );
    add_action( 'edit_user_profile_update', 'timtec_user_profile_fields_save' );

    function timtec_user_profile_fields_save( $user_id ) {

        if ( !current_user_can( 'edit_user', $user_id ) )
            return false;
        
        update_usermeta( $user_id, 'instituicao', $_POST['instituicao'] );
        update_usermeta( $user_id, 'estado', $_POST['estado'] );
        update_usermeta( $user_id, 'cidade', $_POST['cidade'] );
    }
?>

