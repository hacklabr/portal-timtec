<?php global $_MENUS; ?>
<div class="wrap " role="document">
    <div class="container">
        <div class="page-header">
            <h1>
                <a href="<?php echo $_MENUS['rede']['Fórum']; ?>">
                    <?php _oi("Fórum"); ?>
                </a>
            </h1>
        </div>
        <?php get_template_part('templates/content-single', get_post_type()); ?>
    </div>
</div><!-- /.wrap -->