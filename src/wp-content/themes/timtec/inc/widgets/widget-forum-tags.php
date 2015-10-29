<?php
/*
Plugin Name: Widget de Forum Tags Description: Adds a ForumTags to the sidebar
Version: 1.0
Author: HackLab
*/

class WidgetForumTags extends WP_Widget {
    function WidgetForumTags() {
        $widget_ops = array('classname' => 'Forum Tags', 'description' => 'Adds a Forum Tags to the sidebar' );
        parent::WP_Widget('ForumTags', 'Forum Tags', $widget_ops);

    }
 
    function widget($args, $instance) { 
        echo "<h3>Tópicos</h3>"; 
        $args = array(
            'hide_empty' => true, 
        );
        $terms = get_terms('dwqa-question_tag', $args);
            

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

function registerWidgetForumTags() {
    register_widget("WidgetForumTags");
}

add_action('widgets_init', 'registerWidgetForumTags');
    
?>
