<?php
/**
 * Template Name: Notícias
 */
?>

<?php
do_action('get_header');
get_template_part('templates/header');
?>
<div id="page-news" class="base-content">
    <div class="banner" style="background-image: url(http://lorempixel.com/1920/500/);">
        <div class="container">
            <h2 class="title"><?php _oi("Novidades"); ?></h2>
            <div class="info">
                <span class="post-category orange">#Categoria</span>
                <h3 class="post-title"><a href="">Lorem ipsum dolor sit amet consectetur adipiscing elit</a></h3>
                <div class="post-excerpt"><a href="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis molestie a dui at porttitor. Nunc at imperdiet ipsum, in consequat elit.</a></div>
                <div class="read-more"><a href=""><?php _oi("Leia mais"); ?> <span class="arrow"><i class="fa fa-arrow-right"></i></span></a></div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="news col-md-8">
                <div class="featured row">
                    <div class="featured-big">
                        <div class="news-box" style="background-image: url(http://lorempixel.com/600/400/);">
                            <span class="post-category blue">#Categoria</span>
                            <h3 class="post-title"><a href="">Lorem ipsum dolor sit amet consectetur adipiscing elit</a></h3>
                            <div class="post-excerpt"><a href="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis molestie a dui at porttitor. Nunc at imperdiet ipsum, in consequat elit.</a></div>
                        </div>
                    </div>
                    <div class="featured-small">
                        <div class="news-box" style="background-image: url(http://lorempixel.com/600/400/);">
                            <span class="post-category blue">#Categoria</span>
                            <h3 class="post-title"><a href="">Lorem ipsum dolor sit amet consectetur adipiscing elit</a></h3>
                        </div>
                    </div>
                    <div class="featured-small">
                        <div class="news-box" style="background-image: url(http://lorempixel.com/600/400/);">
                            <span class="post-category blue">#Categoria</span>
                            <h3 class="post-title"><a href="">Lorem ipsum dolor sit amet consectetur adipiscing elit</a></h3>
                        </div>
                    </div>
                </div>

                <div class="list">
                    <h2 class="list-title">Notícias geral</h2>

                    <div class="list-item">
                        <span class="post-category orange">#Categoria</span>
                        <time class="post-date">as 00h00 dia 00/00/0000</time>
                        <h3 class="post-title"><a href="">Lorem ipsum dolor sit amet consectetur adipiscing elit</a></h3>
                        <div class="post-excerpt"><a href="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis molestie a dui at porttitor. Nunc at imperdiet ipsum, in consequat elit.</a></div>
                    </div>

                    <div class="list-item">
                        <span class="post-category orange">#Categoria</span>
                        <time class="post-date">as 00h00 dia 00/00/0000</time>
                        <h3 class="post-title"><a href="">Lorem ipsum dolor sit amet consectetur adipiscing elit</a></h3>
                        <div class="post-excerpt"><a href="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis molestie a dui at porttitor. Nunc at imperdiet ipsum, in consequat elit.</a></div>
                    </div>

                    <div class="list-item">
                        <span class="post-category orange">#Categoria</span>
                        <time class="post-date">as 00h00 dia 00/00/0000</time>
                        <h3 class="post-title"><a href="">Lorem ipsum dolor sit amet consectetur adipiscing elit</a></h3>
                        <div class="post-excerpt"><a href="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis molestie a dui at porttitor. Nunc at imperdiet ipsum, in consequat elit.</a></div>
                    </div>
                </div>
            </div>
            <div class="sidebar col-md-4">
                
            </div>
        </div>
    </div>
</div>
