<div id="page-faq" class="base-content container">
    <section>
        <div class="col-md-12 ">
            <h3><?php _oi("FAQ"); ?></h3>  

            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <?php while (have_posts()) : the_post(); ?>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading<?php echo get_the_ID(); ?>">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo get_the_ID(); ?>" aria-expanded="true" aria-controls="collapse<?php echo get_the_ID(); ?>">
                            <span class="text"><?php the_title(); ?></span>
                            <span class="icon-wrapper"><span class="icon"></span></span>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse<?php echo get_the_ID(); ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading<?php echo get_the_ID(); ?>">
                        <div class="panel-body">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            </div>
        </div>
    </section>
</div>