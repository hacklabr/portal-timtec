<div class="container">
    <div class="row">
        <div class="single-news">
        <?php while (have_posts()) : the_post(); ?>
            <article <?php post_class(); ?>>
                <header>
                    <span class="post-category orange">#Categoria</span>
                    <time class="post-date">00/00/00000</time>
                    <h3 class="post-title">
                        <?php the_title() ?>
                    </h3>
                </header>
                <div class="post-content">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>
        </div>
        <div class="sidebar-news">
            <div class="last-news">

                <h2 class="sidebar-title"><?php _e("As mais atuais"); ?></h2>
                <?php while($q_atuais->have_posts()): $q_atuais->the_post(); ?>
                    <div class="list-item">
                        <h3 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                        <time class="post-date"><?php _date() ?></time>
                        <div class="news-box" style="<?php _img_url() ?>"><span class="post-category orange"><?php _cat() ?></span></div>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php /* 
            <div class="twitter-news">
                                    
                <h2 class="sidebar-title"><?php _e("Do Twitter"); ?></h2>

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

            <?php  */ ?>
        </div>
    </div>
</div>
