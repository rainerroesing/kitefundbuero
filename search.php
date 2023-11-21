<?php
/*
Template Name: Search Page
*/
?>

<?php get_header(); ?>


    <div class="row">
        <div class="content csearchpage">
            <div class="container">

                <!-- / Entscheidet ob 0 oder mehr Ergebnisse -->
                <?php /* Search Count */ $allsearch = new WP_Query("s=$s&showposts=-1");  $count = $allsearch->post_count; _e('');
                if($count == "0") : ?>

                <h1 class="titles text-center">Leider keine Suchergebnisse</h1>

                <?php else : ?>

                <h1 class="titles text-center">
                <?php printf( __( 'Suchergebnisse für: %s', 'verloren' ), '<span>' . get_search_query() . '</span>' ); ?>
                </h1>


                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3 col-sm-4 col-sm-offset-4">
                        <ul class="nav nav-pills nav-justified">
                            <li class="active">
                                <a data-toggle="tab" href="#searchtaball">Alles
                                <?php /* Search Count Verloren */ $allsearch = new WP_Query("s=$s&showposts=-1");  $count = $allsearch->post_count; _e('');                                    echo ("(". $count .")"); wp_reset_query(); ?></a>
                            </li>


                            <li>
                                <a data-toggle="tab" href=
                                "#searchtabverloren">Verloren
                                <?php /* Search Count Verloren */ $allsearch = new WP_Query("s=$s&showposts=-1&post_type=verloren");
                                $count = $allsearch->post_count; _e('');
                                echo ("(". $count .")"); wp_reset_query(); ?></a>
                            </li>


                            <li>
                                <a data-toggle="tab" href=
                                "#searchtabgefunden">Gefunden
                                <?php /* Search Count Verloren */ $allsearch = new WP_Query("s=$s&showposts=-1&post_type=gefunden");
                                $count = $allsearch->post_count; _e('');
                                echo ("(". $count .")"); wp_reset_query(); ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php endif; ?><!-- / Beendet Suchheader -->

                <div class="tab-content searchfeed">
                    <div class="tab-pane fade in active" id="searchtaball">
                        <div class="grid">

                            <?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>

                            <div class="grid-item hero-feature">

                                <?php get_template_part( 'content', get_post_format() ); ?>

                            </div>
                            <?php endwhile; else : ?><?php endif; ?>

                        </div><!-- /.grid -->



                    </div><!-- /.tab-->


                     <div class="tab-pane fade" id="searchtabverloren">
                        <div class="grid">

                        <!-- / Entscheidet ob es auch im Tab verloren Posts gibt -->
                        <?php /* Search Count */ $allsearch = new WP_Query("s=$s&showposts=-1&post_type=verloren");  $count = $allsearch->post_count; _e('');
                        if($count == "0") : ?>

                        <?php else : ?>
                            <?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>
                                                    <?php
                                                  if ( get_post_type() == 'verloren' )  {
                                                    echo '<div class="grid-item hero-feature">';
                                                    get_template_part( 'content', get_post_format() );
                                                    echo '</div>';
                                                      }
                                                      else {
                                                      }
                                                      ; ?><?php endwhile; else : ?><?php endif; ?>

                        <?php endif; ?><!-- / Beendet Tab Abfrage -->

                        </div><!-- /.grid -->
                        </div><!-- /.tab-pane -->


                    <div class="tab-pane fade" id="searchtabgefunden">
                        <div class="grid">

                        <!-- / Entscheidet ob es auch im Tab verloren Posts gibt -->
                        <?php /* Search Count */ $allsearch = new WP_Query("s=$s&showposts=-1&post_type=gefunden");  $count = $allsearch->post_count; _e('');
                        if($count == "0") : ?>
                        <?php else : ?>
                        <?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?><?php
                                              if ( get_post_type() == 'gefunden' )  {
                                                echo '<div class="grid-item hero-feature">';
                                                get_template_part( 'content', get_post_format() );
                                                echo '</div>';
                                              }
                                              else {
                                              }
                                              ; ?><?php endwhile; else : ?>
                                              <?php endif; ?>
                            <?php endif; ?><!-- / Beendet Tab Abfrage -->

                        </div><!-- /.grid -->
                        </div><!-- /.tab-pane -->

                </div><!-- /.tab-content -->

                            <div class="row text-center noresults_cta">
                            <a href="<?php echo esc_url( get_permalink(11) ); ?>">
                              <?php if ( is_active_sidebar( 'lost_btn_widget' ) ) : ?>
                                <div role="complementary">
                                  <?php dynamic_sidebar( 'lost_btn_widget' ); ?>
                                </div><!-- #primary-sidebar -->
                              <?php endif; ?>
                       </a>
                 </div>

                  <div class="row text-center noresults_cta">
                    <a href="<?php echo esc_url( get_permalink(26) ); ?>">
                      <?php if ( is_active_sidebar( 'found_btn_widget' ) ) : ?>
                        <div role="complementary">
                          <?php dynamic_sidebar( 'found_btn_widget' ); ?>
                        </div><!-- #primary-sidebar -->
                      <?php endif; ?>
                            </a>
                </div>

            </div><!-- /.container -->
        </div> <!-- /.content -->
    </div><!-- /.row -->

    <?php get_footer(); ?>
