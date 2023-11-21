<?php
/*
Template Name: Startseite
*/
?>

<?php get_header(); ?>



    <div class="row">
        <div class="content cstartpage">

           <div class="pagecontent">
             <div class="container">


              <?php if (have_posts()) : while (have_posts()) : the_post();?>

     <div class="postlogo col-sm-2 col-md-1 col-md-offset-1 hidden-xs">
       <img src="<?php bloginfo('template_directory');?>/images/square.svg" alt="stoerer">
     </div>
                <div class="col-sm-10 col-md-9">
               <?php the_content(); ?>
              </div>

              <?php endwhile; endif; ?>
              <div class="triangle"></div>
             </div>
         </div>

            <div class="container">
                <!-- Nav tabs -->


                <ul class="nav nav-pills device-small" role="tablist">
                    <li class="active col-xs-6 col-sm-12 text-center" role=
                    "presentation">
                        <a aria-controls="home" data-toggle="tab" href="#search" role="tab">Gerade verloren</a>

                    </li>


                    <li class="col-xs-6 text-center" role="presentation">
                        <a aria-controls="profile" data-toggle="tab" href="#found" role="tab">Frisch angespült</a>

                    </li>
                </ul>
                <!-- End Nav Tabs -->
                <!-- Tab panes -->


                <div class="tab-content">
                    <!-- Verloren Block Start -->


                    <div class="tab-pane active col col-xs-12 col-sm-6" id=
                    "search" role="tabpanel">

                    <div class="row text-center tabsubline">
                        <h1 class="titles"><?php echo get_post_meta($post->ID, 'txt_lost', true); ?></h1>
                    </div>

                    <div class="row text-center">
                        <!--<a href="<?php echo esc_url( get_permalink(11) ); ?>">
                        <button class="btn btn-default btn-lost" type="button">
                        <span class="glyphicon glyphicon-flash" aria-hidden="true"></span>
                        Jetzt Verlust melden</button></a>-->
                        <a href="<?php echo esc_url( get_permalink(11) ); ?>">
                        <?php if ( is_active_sidebar( 'lost_btn_widget' ) ) : ?>
                          <div role="complementary">
                            <?php dynamic_sidebar( 'lost_btn_widget' ); ?>
                          </div><!-- #primary-sidebar -->
                        <?php endif; ?>
                      </a>

                      </div>

                        <!--<p class="text-center countsubline hidden-xs">
                                <?php
                                $count_posts = wp_count_posts('verloren');
                                echo ('Insgesamt ' . $published_posts = $count_posts->publish) .'';
                            ?>
                        </p>-->







                        <div class="row startfeed">
                            <div class="grid">
                                <?php $loop = new WP_Query( array( 'post_type' => 'verloren', 'posts_per_page' => 6, 'orderby' => array('date' => 'DESC'), )); ?>
                                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                                <div class="grid-item hero-feature">
                                    <?php get_template_part( 'content', get_post_format() ); ?>

                                </div>
                                <?php endwhile; wp_reset_query(); ?>
                            </div>
                            <!-- grid -->
                            <div class="fader text-center">
                                <a href="<?php echo esc_url( get_permalink(7) ); ?>">
                                <button class="btn btn-default btn-readmore" type="button">
                                  <span class="glyphicon glyphicon-plus-sign"></span>
                                </button></a>
                            </div>
                        </div>
                        <!-- row -->

                    </div>
                    <!-- Verloren Block Ende -->
                    <!-- Gefunden Block Start -->


                    <div class="tab-pane col-xs-12 col-sm-6" id="found" role=
                    "tabpanel">

                    <div class="row text-center tabsubline">
                        <h1 class="titles"><?php echo get_post_meta($post->ID, 'txt_found', true); ?></h1>


                    </div>

                  <div class="row text-center">
                      <!--<a href="<?php echo esc_url( get_permalink(26) ); ?>">
                        <button class="btn btn-default btn-found" type="button">
                        <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                        Jetzt Fund melden</button></a>-->
                        <a href="<?php echo esc_url( get_permalink(26) ); ?>">
                        <?php if ( is_active_sidebar( 'found_btn_widget' ) ) : ?>
                          <div role="complementary">
                            <?php dynamic_sidebar( 'found_btn_widget' ); ?>
                          </div><!-- #primary-sidebar -->
                        <?php endif; ?>
                      </a>

                                            </div>




                        <!--<p class="text-center countsubline hidden-xs">
                                <?php
                                $count_posts = wp_count_posts('gefunden');
                                echo ('Insgesamt ' . $published_posts = $count_posts->publish) .'';
                                ?>
                        </p>-->





                        <div class="row startfeed">
                            <div class="grid">
                                <?php $loop = new WP_Query( array( 'post_type' => 'gefunden', 'posts_per_page' => 6, 'orderby' => array('date' => 'DESC')) ); ?><?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                                <div class="grid-item hero-feature">
                                    <?php get_template_part( 'content', get_post_format() ); ?>
                                </div>
                                <?php endwhile; wp_reset_query(); ?>
                            </div>
                            <!-- grid -->
                            <div class="fader fader-right text-center">
                              <a href="<?php echo esc_url( get_permalink(9) ); ?>">
                                <button class="btn btn-default btn-readmore" type="button">
                                  <span class="glyphicon glyphicon-plus-sign"></span>
                               </button></a>
                            </div>
                        </div>
                        <!-- row -->


                    </div>
                    <!-- found -->
                    <!-- Gefunden Block Start -->
                </div> <!-- /.tab content -->

            </div><!-- /.container -->
        </div><!-- /.content -->
    </div>
    <!-- /.row -->
    <?php get_footer(); ?>
