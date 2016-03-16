<?php
/**
 * Template Name: Lista de Cursos Template
 */
?>

<?php
global $teacher_course_relation, $couse_download;

do_action('get_header');
get_template_part('templates/header');


$q_header = get_option('destaques-cursos');

?>
<div id="page-course" class="base-content">
    <div class="banner">
        <div class="container">
            <div id="carousel-list-course" class="carousel slide" data-ride="carousel">
                <h2 class="title"><?php _oi("CURSOS"); ?> <span class="subtitle">[<?php _oi("Lista de Cursos"); ?>]</span></h2>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <div class="mobile-text">1. <?php _oi("Introdução"); ?></div>
                        <?php echo  $q_header['texto1']; ?>
                    </div>
                    <div class="item">
                        <div class="mobile-text">2. <?php _oi("Eixos"); ?></div>
                        <?php echo  $q_header['texto2']; ?>
                    </div>
                    <div class="item">
                        <div class="mobile-text">3. <?php _oi("Licença"); ?></div> <?php echo  $q_header['texto3']; ?>
                    </div>
                </div>

                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-list-course" data-slide-to="0" class="active">
                        <span class="number">1</span> <span class="text"><?php _oi("Introdução"); ?></span>
                    </li>
                    <li data-target="#carousel-list-course" data-slide-to="1">
                        <span class="number">2</span> <span class="text"><?php _oi("Eixos"); ?></span>
                    </li>
                    <li data-target="#carousel-list-course" data-slide-to="2">
                        <span class="number">3</span> <span class="text"><?php _oi("Licença"); ?></span>
                    </li>
                </ol>
            </div>
        </div>
    </div>

    <div class="container">
        <section>
            <h3><?php _oi("Cursos ativos"); ?></h3>
        </section>
        <div class="clear"></div>

        <section id="section2" class="">
            <div class="list-courses">
                <ul>
                    <?php
                    $args = array(
                        'posts_per_page' => -1,
                        'post_type' => 'course'
                    );
                    $loop_courses = new WP_Query($args);

                    while ($loop_courses->have_posts()) : $loop_courses->the_post();
                        $url = get_the_permalink();
                        $thumb = wp_get_attachment_url(get_post_thumbnail_id());
                        $title = get_the_title();
                        $course_url = get_metadata('post', get_the_ID(), 'url_course', true);
                        $youtube_url = get_metadata('post', get_the_ID(), 'url_youtube_course', true);
                        $instituto = get_metadata('post', get_the_ID(), 'instituto_course', true);


                        $teachers = $teacher_course_relation->getRelatedPosts();
                        $teacher = [];
                        $teacher_name = [];
                        if (is_array($teachers)) {  
                            $teacher = [];
                            $teachers_name = array_map(function($e) {
                                return $e->post_title;
                            }, $teachers );

                            $teachers_id = array_map(function($e) {
                                return $e->ID;
                            }, $teachers );
                          
                            for( $i = 0; $i < count( $teachers_id ); $i++  ){
                                $link = get_the_permalink( $teachers_id[ $i ] );
                                $teacher[ $i ] = "<a href='".$link."' alt='".$teachers_name[ $i ]."'>" .$teachers_name[ $i ]. "</a>";
                                $teacher_name[ $i ] = "<span>" .$teachers_name[ $i ]. "</span>";
                            };

                            $teacher = implode( ", ", $teacher );
                            $teacher_name = implode( ", ", $teacher_name );  
                        }
                        ?>
                        <li>
                            <?php 
                                if( empty( $youtube_url) ){
                            ?>
                                    <div class="thumb" style="background-image: url(<?php echo $thumb ?>)"></div>
                            <?php 
                                }else{
                                    $embed_code = wp_oembed_get( $youtube_url , array('width'=>355) ); 
                                    echo $embed_code;
                                }
                            ?>
                            <div class="content-curso">
                                <div class="content-lista">
                                    <div class="institute"><?php echo $instituto ?></div>
                                    <h4><a href="<?php echo $url ?>"><?php echo $title ?></a></h4>
                                    <div class="author"><?php echo $teacher; ?></div>
                                </div>

                                <div class="btns_lista_curso">
                                    <?php if ($course_url): ?>
                                        <a href="<?php echo $course_url; ?>" class="btn goto">Assistir aulas</a>
                                    <?php endif; ?>
                                    <?php
                                    if ($couse_download->getFilePath(get_the_ID())):
                                        if ( is_user_logged_in() ) {
                                            $download_url = $couse_download->getFileUrl(get_the_ID());
                                    ?>
                                        <a href="<?php echo $download_url ?>" class="download">
                                            <i class="fa fa-cloud-download"></i> Baixar pacote
                                        </a>
                                    <?php 
                                        }else{
                                    ?>
                                            <a href="#" data-toggle="modal" data-target="#modal-login" class="download">
                                                <i class="fa fa-cloud-download"></i> Baixar pacote
                                            </a>
                                    <?php                                     
                                        }//EndIf user Logged
                                    endif;//COURSE
                                    ?>
                                </div>
                            </div>

                        </li>
                        <?php
                    endwhile;
                    wp_reset_query();
                    ?>
                </ul>
            </div>
            <div class="show-more-courses">
                <p>carregar mais cursos</p>
                <i class="fa fa-angle-down"></i>
            </div>
        </section>
    </div>
</div>
