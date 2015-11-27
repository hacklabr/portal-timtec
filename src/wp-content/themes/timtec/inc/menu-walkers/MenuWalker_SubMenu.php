<?php
class MenuWalker_SubMenu extends Walker_Nav_Menu{

    function start_lvl( &$output, $depth = 0, $args = array() ){
        $output .= '<ul class="sub-menu">';
    }

    function end_lvl( &$output, $depth = 0, $args = array() ){
        $output .= '</ul>';
    }
}