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
    <div class="banner">
        <div class="container">
            <div id="carousel-news" class="carousel slide" data-ride="carousel">
                <h2 class="title"><?php _oi("Novidades"); ?></h2>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <span></span>
                        <span class="post-category orange">#Categoria</span>
                        <h3 class="post-title"><a href="">Lorem ipsum dolor sit amet consectetur adipiscing elit</a></h3>
                        <div class="post-excerpt"><a href="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis molestie a dui at porttitor. Nunc at imperdiet ipsum, in consequat elit.</a></div>
                        <div class="read-more"><a href=""><?php _oi("Leia mais"); ?> <span class="arrow"><i class="fa fa-arrow-right"></i></span></a></div>
                    </div>
                    <div class="item">
                        <span></span>
                        <span class="post-category orange">#Categoria</span>
                        <h3 class="post-title"><a href="">Lorem ipsum dolor sit amet consectetur adipiscing elit</a></h3>
                        <div class="post-excerpt"><a href="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis molestie a dui at porttitor. Nunc at imperdiet ipsum, in consequat elit.</a></div>
                        <div class="read-more"><a href=""><?php _oi("Leia mais"); ?> <span class="arrow"><i class="fa fa-arrow-right"></i></span></a></div>
                    </div>
                    <div class="item">
                        <span></span>
                        <span class="post-category orange">#Categoria</span>
                        <h3 class="post-title"><a href="">Lorem ipsum dolor sit amet consectetur adipiscing elit</a></h3>
                        <div class="post-excerpt"><a href="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis molestie a dui at porttitor. Nunc at imperdiet ipsum, in consequat elit.</a></div>
                        <div class="read-more"><a href=""><?php _oi("Leia mais"); ?> <span class="arrow"><i class="fa fa-arrow-right"></i></span></a></div>
                    </div>
                </div>

                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-news" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-news" data-slide-to="1"></li>
                    <li data-target="#carousel-news" data-slide-to="2"></li>
                </ol>
            </div>
        </div>
        
    </div>

    <div class="container">
        <div class="row">
            <div class="main-news">
                <div class="featured">
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
            <div class="sidebar-news">
                <div class="last-news">

                    <h2 class="sidebar-title"><?php _oi("As mais atuais"); ?></h2>

                    <div class="list-item">
                        <h3 class="post-title"><a href="">Lorem ipsum dolor sit amet consectetur adipiscing elit</a></h3>
                        <time class="post-date">as 00h00 dia 00/00/0000</time>
                        <div class="news-box" style="background-image: url(http://lorempixel.com/300/150/);"><span class="post-category orange">#Categoria</span></div>
                    </div>

                    <div class="list-item">
                        <h3 class="post-title"><a href="">Lorem ipsum dolor sit amet consectetur adipiscing elit</a></h3>
                        <time class="post-date">as 00h00 dia 00/00/0000</time>
                        <div class="news-box" style="background-image: url(http://lorempixel.com/300/150/);"><span class="post-category orange">#Categoria</span></div>
                    </div>

                    <div class="list-item">
                        <h3 class="post-title"><a href="">Lorem ipsum dolor sit amet consectetur adipiscing elit</a></h3>
                        <time class="post-date">as 00h00 dia 00/00/0000</time>
                        <div class="news-box" style="background-image: url(http://lorempixel.com/300/150/);"><span class="post-category orange">#Categoria</span></div>
                    </div>
                </div>
                <div class="twitter-news">
                                        
                    <h2 class="sidebar-title"><?php _oi("Do Twitter"); ?></h2>

                    <div class="list-item">
                        <div class="twitter-avatar"><a href="https://twitter.com/timtec_oficial"><img src="https://pbs.twimg.com/profile_images/481125416648728578/kmFmSt39_400x400.jpeg" alt="TIM Tec Oficial"></a></div>
                        <div class="twitter-username"><a href="https://twitter.com/timtec_oficial">TIM Tec Oficial</a></div>
                        <time class="twitter-date">00/00/0000 00:00</time>
                        <div class="twitter-content">
                            RT <a href="#">@UFMGBR</a> Importância cultural de jogos digitais será tema de simpósio nesta semana <a href="#">https://t.co/zEXB6LB0G2</a>
                        </div>
                    </div>
                    <div class="list-item">
                        <div class="twitter-avatar"><a href="https://twitter.com/timtec_oficial"><img src="https://pbs.twimg.com/profile_images/481125416648728578/kmFmSt39_400x400.jpeg" alt="TIM Tec Oficial"></a></div>
                        <div class="twitter-username"><a href="https://twitter.com/timtec_oficial">TIM Tec Oficial</a></div>
                        <time class="twitter-date">00/00/0000 00:00</time>
                        <div class="twitter-content">
                            RT <a href="#">@UFMGBR</a> Importância cultural de jogos digitais será tema de simpósio nesta semana <a href="#">https://t.co/zEXB6LB0G2</a>
                        </div>
                    </div>
                    
                    <div class="list-item">
                        <div class="twitter-avatar"><a href="https://twitter.com/timtec_oficial"><img src="https://pbs.twimg.com/profile_images/481125416648728578/kmFmSt39_400x400.jpeg" alt="TIM Tec Oficial"></a></div>
                        <div class="twitter-username"><a href="https://twitter.com/timtec_oficial">TIM Tec Oficial</a></div>
                        <time class="twitter-date">00/00/0000 00:00</time>
                        <div class="twitter-content">
                            RT <a href="#">@UFMGBR</a> Importância cultural de jogos digitais será tema de simpósio nesta semana <a href="#">https://t.co/zEXB6LB0G2</a>
                        </div>
                    </div>

                    <div class="list-item">
                        <div class="twitter-avatar"><a href="https://twitter.com/timtec_oficial"><img src="https://pbs.twimg.com/profile_images/481125416648728578/kmFmSt39_400x400.jpeg" alt="TIM Tec Oficial"></a></div>
                        <div class="twitter-username"><a href="https://twitter.com/timtec_oficial">TIM Tec Oficial</a></div>
                        <time class="twitter-date">00/00/0000 00:00</time>
                        <div class="twitter-content">
                            RT <a href="#">@UFMGBR</a> Importância cultural de jogos digitais será tema de simpósio nesta semana <a href="#">https://t.co/zEXB6LB0G2</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
