<?php
/*
Plugin Name: Widget de Forum Categories Description: Adds a ForumCategories to the sidebar
Version: 1.0
Author: HackLab
*/

class WidgetForumCategories extends WP_Widget {
    function WidgetForumCategories() {
        $widget_ops = array('classname' => 'ForumCategories', 'description' => 'Adds a Forum Categories to the sidebar' );
        parent::WP_Widget('ForumCategories', 'Forum Categories', $widget_ops);

    }
 
    function widget($args, $instance) { 
        echo "<h3>Categorias</h3>"; 
        $args = array(
            'hide_empty' => true, 
        );
        $terms = get_terms('dwqa-question_category', $args);
            

        echo '<ul class="subcats-blog"> ';    
        foreach($terms as $term){
            $link = get_term_link($term);
            echo '<li><a href="' . $link  . '" >' .  $term->name . '</a></li>';
        }

        echo '</ul>' ;
    }
 
    function update($new_instance, $old_instance) {

        $instance = $old_instance;

        return $instance;
    }
    
    function form($instance) {
        echo "<h3>Categorias do Forum</h3>";
    }
 
}

function registerWidgetForumCategories() {
    register_widget("WidgetForumCategories");
}

add_action('widgets_init', 'registerWidgetForumCategories');
    
?>
