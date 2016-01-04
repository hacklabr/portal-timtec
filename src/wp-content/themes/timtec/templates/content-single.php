<div class="container">
    <div class="row">
        <div class="single-news">
        <?php while (have_posts()) : the_post(); ?>
            <article <?php post_class(); ?>>
                <header>
                    <span class="post-category orange"><?php _cat(); ?></span>
                    <time class="post-date"><?php _date() ?></time>
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

        </div>
    </div>
</div>
