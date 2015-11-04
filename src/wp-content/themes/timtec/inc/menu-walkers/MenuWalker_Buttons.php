<?php
class MenuWalker_Buttons extends Walker_Nav_Menu{
    public function start_lvl( &$output, $depth = 0, $args = array() ) {}
    public function end_lvl( &$output, $depth = 0, $args = array() ) {}
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){
        ?>
        <a href="<?php echo $item->url ?>" class="btn"><?php echo $item->title ?></a>
        <?php
    }

    public function end_el( &$output, $item, $depth = 0, $args = array() ) {}
}