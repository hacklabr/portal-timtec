<section id="modal-home">
    <div class="bg-modal"></div>
    <div class="modal">
        <a href="#" class="close">x</a>
        <h3>Esse é o Novo Site do TIM TEC!</h3>
        <hr>
        <p>Se você é aluno e quer ir para a plataforma de cursos o novo endereço é <a href="http://mooc.timtec.com.br" target="_blank">mooc.timtec.com.br</a></p>
    </div>
</section>


<section id="news" class="" >
    <div class="container">
        <h3>Novidades: </h3>
        <div id="newsCarouselWrapper" class="container-fluid">
   <div id="newsCarousel" class="carousel slide">
      <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <div class="item-item col-md-6">
                        <a href="#" class="categoria">
                            #categoria
                        </a>
                        <a href="#">
                           <span>Novidade 1 - titulo, lote, Inspum |</span>
                            <span> ás 18h30 12/09/2015</span>
                        </a>
                    </div>
                 </div>
                 <div class="item ">
                    <div class="item-item col-md-6">
                        <a href="#" class="categoria">
                            #categoria
                        </a>
                        <a href="#">
                           <span>Novidade 2 - titulo, lote, Inspum |</span>
                            <span> ás 10h30 10/09/2015</span>
                        </a>
                    </div>
                 </div>
                 <div class="item ">
                    <div class="item-item col-md-6">
                        <a href="#" class="categoria">
                            #categoria
                        </a>
                        <a href="#">
                           <span>Novidade 3 - titulo, lote, Inspum |</span>
                            <span> ás 09h30 19/09/2015</span>
                        </a>
                    </div>
                 </div>

      </div>
      <!-- Controls
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
      </a>
      -->
   </div>
</div>
    </div>
</section>

<section id="banner" class=" ">
    <div class="container">
        <div class="col-md-10 center">
            <div class="row cerebro">
                <h3>
                    <?php _oi("TIM TEC ="); ?>
                    <span class="titulo"><?php _oi("SOFTWARE LIVRE + CURSOS + REDE E-TEC BRASIL"); ?> </span>
                </h3>
                <div class="itens-banner">
                    <div class="col-md-4">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icones-software.png" />
                        <h4><?php _oi("Software"); ?> </h4>
                        <p><?php _oi("Lorem ipsum dolor sit amet, consectetur adipiscing elit. "); ?> </p>
                        <a href="#"><i class="fa fa-caret-down"></i></a>
                    </div>
                    <div class="col-md-4">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icones-cursos.png" />
                        <h4><?php _oi("Cursos"); ?> </h4>
                        <p><?php _oi("Lorem ipsum dolor sit amet, elit. Maecenasid velit lobortis."); ?></p>
                        <a href="#"><i class="fa fa-caret-down"></i></a>
                    </div>
                    <div class="col-md-4">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icones-redes.png" />
                        <h4><?php _oi("Redes"); ?> </h4>
                        <p><?php _oi("Lorem ipsum consectetur adipiscing ultricies magna porta, molestie diam."); ?></p>
                        <a href="#"><i class="fa fa-caret-down"></i></a>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="section1" class="">
    <div class="container">
        <div class="boxs row">
            <div class="col-md-6">
                <div class="box">
                    <div class="icon">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ilustra-software01.png" />
                    </div>
                    <div class="title">
                        <h3><?php _oi("SOFTWARE"); ?></h3>
                    </div>
                    <div class="text">
                        <?php _oi("Suco de cevadiss, é um leite divinis, qui tem matis, aguis e fermentis. Interagi  vehicula ac nisi. Aenean vel dui dui. Nullam leo erat, aliquet quis tempus a, posuere ut mi. Ut scelerisque neque et turpis posuere pulvinar pellentesque nibh ullamcorper. Pharetra in mattis molestie, volutpat elementum justo. Aenean ut ante turpis. Pellentesque laoreet mé vel lectus scelerisque interdum cursus velit auctor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ac mauris lectus, non scelerisque augue. Aenean justo massa."); ?>
                    </div>
                    <div class="links">
                        <?php foreach($_MENUS['software'] as $label => $url): ?>
                            <a href="<?php echo $url ?>" class="btn"><?php echo $label; ?></a>
                        <?php endforeach; ?>
                        <?php
                        /*
                        wp_nav_menu(array(
                            'menu'    => 'software',
                            'walker'  => new MenuWalker_Buttons() //use our custom walker
                        ));
                         */
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-2 linha">
                <span class="linha-centro" >
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/listra-verde.png" />
                </span>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icones-boxes-principais-software.png" class="icon-imgPrinc" />
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icones-cursos.png"  class="icon-imgSecun"/>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icones-redes.png"  class="icon-imgSecun2" />
            </div>
            <div class="col-md-4">
               <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ilustra-software02.png" class="img"/>
            </div>
        </div> <!-- /.row -->
    </div><!-- /container-->
</section>



<section id="section2" class="">
    <div class="container">
        <div class="boxs row">
            <div class="col-md-6">
               <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ilustra-cursos.png" class="img"/>
            </div>
            <div class="col-md-2 linha">
                <span class="linha-centro" >
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/listra-azul.png" />
                </span>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icones-software.png" class="icon-imgPrinc" />
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icones-boxes-principais-cursos.png"  class="icon-imgSecun"/>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icones-redes.png"  class="icon-imgSecun2" />
            </div>
            <div class="col-md-4">
                <div class="box">
                    <div class="text text1">
                        <?php _oi("Suco de cevadiss, é um leite divinis, qui tem lupuliz, matis, aguis e fermentis. Ut scelerisque neque et turpis posuere pulvinar pellentesque nibh ullamcorper.  Aenean justo massa."); ?>
                    </div>
                    <div class="title">
                        <h3><?php _oi("CURSOS"); ?></h3>
                    </div>
                    <div class="text">
                        <?php _oi("Suco de cevadiss, é um leite divinis, aguis e fermentis. Ut scelerisque neque et turpis posuere pulvinar pellentesque nibh ullamcorper.  Aenean justo massa."); ?>
                    </div>
                    <div class="links">
                        <?php foreach($_MENUS['cursos'] as $label => $url): ?>
                            <a href="<?php echo $url ?>" class="btn"><?php echo $label; ?></a>
                        <?php endforeach; ?>
                        <?php
                        /*
                        wp_nav_menu(array(
                            'menu'    => 'cursos',
                            'walker'  => new MenuWalker_Buttons() //use our custom walker
                        ));
                         */
                        ?>
                    </div>
                </div>
            </div>
        </div> <!-- /.row -->
    </div><!-- /container-->
</section>





<section id="section3" class="">
    <div class="container">
        <div class="boxs row">
            <div class="col-md-12">
               <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ilustra-redes.png" class="img"/>
            </div>
            <div class="col-md-6">
                    <div class="title">
                        <h3><?php _oi("REDES"); ?></h3>
                    </div>
                    <div class="links">
                        <?php foreach($_MENUS['rede'] as $label => $url): ?>
                            <a href="<?php echo $url ?>" class="btn"><?php echo $label; ?></a>
                        <?php endforeach; ?>
                        <?php
                        /*
                        wp_nav_menu(array(
                            'menu'    => 'redes',
                            'walker'  => new MenuWalker_Buttons() //use our custom walker
                        ));
                         */
                        ?>
                    </div>
            </div>
            <div class="col-md-2 linha">
                <span class="linha-centro" >
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/listra-branco.png" />
                </span>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icones-software.png" class="icon-imgPrinc" />
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icones-cursos.png"  class="icon-imgSecun"/>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icones-boxes-principais-redes.png"  class="icon-imgSecun2" />
            </div>
            <div class="col-md-4">
                <div class="box">
                    <div class="text">
                        <?php _oi("Suco de cevadiss,  qui tem lupuliz, matis, aguis e fermentis. Ut scelerisque neque et turpis posuere pulvinar pellentesque nibh ullamcorper.  Aenean justo massa."); ?>
                    </div>
                </div>
            </div>
        </div> <!-- /.row -->
    </div><!-- /container-->
</section>


