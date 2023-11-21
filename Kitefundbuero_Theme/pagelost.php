<?php
/*
Template Name: Verloren Page
*/
?><?php get_header(); ?>

        <div class="content clistpage">

          <div class="subpagecontent">
            <div class="container">

              <a href="<?php echo esc_url( get_permalink(11) ); ?>">
                <?php if ( is_active_sidebar( 'lost_btn_widget' ) ) : ?>
                  <div role="complementary">
                    <?php dynamic_sidebar( 'lost_btn_widget' ); ?>
                  </div><!-- #primary-sidebar -->
                <?php endif; ?>
            </a>



             <div class="triangle"></div>
            </div>
        </div>


            <div class="container">

                <h1 class="titles text-center">
                <?php echo get_the_title(); ?>
                <!--<?php $count_posts = wp_count_posts('verloren');
                echo ("(" . $published_posts = $count_posts->publish) . ")"; ?>-->
                </h1>



              <h5 class="text-center subline">
                  <a href="<?php echo esc_url( get_permalink(26) ); ?>">
                             <span> <?php echo get_post_field('post_content', $id); ?></span>
                           </a></h5>


                <div class="row pagefound">
                    <div class="col-sm-12">
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
                                        endwhile; endif;
                                    ?>
</div>
                           <div class="row text-center pagebtn">

                    </div>
                    <!-- /.col -->

                <!-- /.row -->

                <?php $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

                  $custom_args = array(
                      'post_type' => 'verloren',
                      'posts_per_page' => 20,
                      'paged' => $paged,
                      'orderby' => array(
                      'date' => 'DESC',
                      ),
                    );

                  $custom_query = new WP_Query( $custom_args ); ?><?php if ( $custom_query->have_posts() ) : ?><!-- the loop -->

                <?php $count = 0; ?>

                <div class="grid">
                    <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

                    <?php $count++; ?>

                    <div class="grid-item hero-feature">
                        <?php get_template_part( 'content', get_post_format() ); ?>
                    </div>

                    <?php if ($count == 3) : ?>

                              <?php if ( is_active_sidebar( 'banner_loop_widget' ) ) : ?>
                              <div role="complementary">
                                <?php dynamic_sidebar( 'banner_loop_widget' ); ?>
                              </div><!-- #primary-sidebar -->
                              <?php endif; ?>


                  <?php else : ?><?php endif; ?>

                    <?php endwhile; ?>

                </div>
                <!-- end of the loop -->

              <?php custom_pagination($custom_query->max_num_pages,"",$paged); ?>
              <?php wp_reset_postdata(); ?><?php else:  ?><?php endif; ?>


            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
      </div>
      <!-- /.content -->


    <?php get_footer(); ?>
