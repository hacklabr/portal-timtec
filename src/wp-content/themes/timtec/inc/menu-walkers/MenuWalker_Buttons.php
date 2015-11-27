<?php
class MenuWalker_Buttons extends Walker_Nav_Menu{
    public function start_lvl( &$output, $depth = 0, $args = array() ) {}

    public function end_lvl( &$output, $depth = 0, $args = array() ) {}

    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){
        $output .= "<a href=\"{$item->url}\" class=\"btn\">{$item->title}</a>";
    }

    public function end_el(){}
}