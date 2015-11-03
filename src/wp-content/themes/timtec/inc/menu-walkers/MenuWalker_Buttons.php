<?php
class MenuWalker_Buttons extends Walker_Nav_Menu{
    function start_lvl(){}
    function end_lvl(){}
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){
        ?>
        <a href="<?php echo $item->url ?>" class="btn"><?php echo $item->title ?></a>
        <?php
    }

    function end_el(){}
}