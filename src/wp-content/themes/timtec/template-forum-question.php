<?php global $_MENUS; ?>
<div id="forum-question" class="base-content container">
    <section>
        <div class="col-md-12 ">
            <h3>
                <a href="<?php echo $_MENUS['rede']['Fórum']; ?>">
                    <?php _oi("Fórum"); ?> 
                </a>
            </h3>
            <?php get_template_part('templates/content-single', get_post_type()); ?>
        </div>
    </section>
    <div class="clear"></div>
</div>
