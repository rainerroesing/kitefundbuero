<?php
/*
Template Name: Search Page
*/
?>

<?php get_header(); ?>


    <div class="row">
        <div class="content">
            <div class="container csinglepage">

<div class="col-sm-6 col-sm-offset-3">
              <div class="thumbnail">


              <?php if ( 'verloren' == get_post_type() ) {
                    echo '<div class="postlabel labelverloren text-center">';
                    } elseif ( 'gefunden' == get_post_type() ) {
              	  echo '<div class="postlabel labelgefunden text-center">';
                    }
                    ?>

              <?php if ( 'verloren' == get_post_type() ) {
                    echo strip_tags(get_the_term_list( $post->ID, 'lostitem', ' ', ', ', ' ' ));
                    } elseif ( 'gefunden' == get_post_type() ) {
                    echo strip_tags(get_the_term_list( $post->ID, 'founditem', ' ', ', ', ' ' ));
                    }
                    ?>

                    <?php if ( 'verloren' == get_post_type() ) {
                          echo 'verloren';
                          } elseif ( 'gefunden' == get_post_type() ) {
                    	  echo 'gefunden';
                          }
                          ?>



                  <!--<?php $post_type = get_post_type( $post->ID );echo $post_type; ?>-->

                </div>

                  <!-- / Start Bild-->
                  <?php the_post_thumbnail('medium'); ?>

                  <!-- / Ende Bild -->

              <div class="caption">
              <ul>
                  <!-- / Start LOST -->
                  <!-- / Start Feld Marke -->
                  <?php $postmarke = get_post_meta($post->ID, 'brand', true); if ( $postmarke ) : ?>
                  <li class="metapost main"><!--<span>Brand</span>--><?php the_field('brand'); ?>
                  <?php else : ?><?php endif; ?>

                  <?php $postmarke = get_post_meta($post->ID, 'model', true); if ( $postmarke ) : ?>
                  <?php the_field('model'); ?>
                  </li>

                  <?php else : ?><?php endif; ?>
                  <!-- / Ende Feld Marke -->

                  <!-- / Start Feld Model
                  <?php $postmarke = get_post_meta($post->ID, 'model', true); if ( $postmarke ) : ?>
                  <li class="metapost"><span>Modell</span><?php the_field('model'); ?></li>
                  <?php else : ?><?php endif; ?>
                 / Ende Feld Model-->

                  <!-- / Start Feld Datum -->
                  <?php $postmarke = get_post_meta($post->ID, 'date', true); if ( $postmarke ) : ?>
                  <li class="metapost sub topspace"><!--<span>Date</span>--><?php the_field('date'); ?></li>
                  <?php else : ?><?php endif; ?>
                  <!-- / Ende Feld Datum-->

                  <!-- / Start Feld Spot -->
                  <?php $postmarke = get_post_meta($post->ID, 'spot', true); if ( $postmarke ) : ?>
                  <li class="metapost sub"><!--<span>Spot</span>--><?php the_field('spot'); ?> (<?php the_field('country'); ?>)</li>

                  <?php else : ?><?php endif; ?>
                  <!-- / Ende Feld Spot-->

                  <!-- / Start Feld Beschreibung -->
                  <?php $postmarke = get_post_meta($post->ID, 'description', true); if ( $postmarke ) : ?>
                  <li>
                      <div class="descontent topspace"><?php the_field('description'); ?></div></li>
                  <?php else : ?><?php endif; ?>
                  <!-- / Ende Feld Beschreibung -->
                  <!-- / End LOST -->

                   <!-- / Start FOUND -->
                  <!-- / Start Feld Spot -->
                  <?php $postmarke = get_post_meta($post->ID, 'fspot', true); if ( $postmarke ) : ?>
                  <li class="metapost"><!--<span>Spot</span>--><?php the_field('fspot'); ?> (<?php the_field('fcountry'); ?>)</li>
                  <?php else : ?><?php endif; ?>
                  <!-- / Ende Feld Spot -->

                  <!-- / Start Feld Datum -->
                  <?php $postmarke = get_post_meta($post->ID, 'fdate', true); if ( $postmarke ) : ?>
                  <li class="metapost"><!--<span>Date</span>--><?php the_field('fdate'); ?></li>
                  <?php else : ?><?php endif; ?>
                  <!-- / Ende Feld Datum -->

                  <!-- / Start Feld Beschreibung -->
                  <?php $postmarke = get_post_meta($post->ID, 'fdescription', true); if ( $postmarke ) : ?>
                  <li>
                      <div class="descontent topspace"><?php the_field('fdescription'); ?></div></li>
                  <?php else : ?><?php endif; ?>
                  <!-- / Ende Feld Beschreibung -->
                  <!-- / End FOUND -->

                  <li class="topspace" id="contactline">
                  </li>

                  <!-- / Start Feld Name -->
                  <?php $postmarke = get_post_meta($post->ID, 'name', true); if ( $postmarke ) : ?>
                  <li class="concontent"><span class="glyphicon glyphicon-user"></span>  <?php the_field('name'); ?></li>
                  <?php else : ?><?php endif; ?>
                  <!-- / Ende Feld Name -->


                      <!-- / Start Feld Phone -->
                      <?php $postmarke = get_post_meta($post->ID, 'phone', true); if ( $postmarke ) : ?>
                      <li class="concontent">Tel.: <?php the_field('phone'); ?></li>
                      <?php else : ?><?php endif; ?>
                      <!-- / Ende Feld Phone-->

                  <!-- / Start Feld Phone -->
                  <?php $postmarke = get_post_meta($post->ID, 'email', true); if ( $postmarke ) : ?>
                  <li class="concontent lostmail"><a href="mailto:<?php the_field('email'); ?>"><p class="conversion text-center"><span class="glyphicon glyphicon-send"></span>E-Mail</p></a></li>
                  <?php else : ?><?php endif; ?>
                  <!-- / Ende Feld Phone-->


                  <!-- / Start Feld Name -->
                  <?php $postmarke = get_post_meta($post->ID, 'fname', true); if ( $postmarke ) : ?>
                  <li class="concontent"><span class="glyphicon glyphicon-user"></span>  <?php the_field('fname'); ?></li>
                  <?php else : ?><?php endif; ?>
                  <!-- / Ende Feld Name-->

                  <!-- / Start Feld Phone -->
                  <?php $postmarke = get_post_meta($post->ID, 'fphone', true); if ( $postmarke ) : ?>
                  <li class="concontent">Tel.: <?php the_field('fphone'); ?></li>
                  <?php else : ?><?php endif; ?>
                  <!-- / Ende Feld Phone -->

                  <!-- / Start Feld Phone -->
                  <?php $postmarke = get_post_meta($post->ID, 'femail', true); if ( $postmarke ) : ?>
                  <li class="concontent foundmail"><a href="mailto:<?php the_field('femail'); ?>"><p class="conversion text-center"><span class="glyphicon glyphicon-send"></span>E-Mail</p></a></li>
                  <?php else : ?><?php endif; ?>
                  <!-- / Ende Feld Phone -->



              </ul>


                      </div>
              </div>


              <?php
        $post_id = get_the_ID();
        $delete_nonce = wp_create_nonce('delete_post_' . $post_id);
        $delete_url = home_url('/delete-post/' . $post_id . '/?delete_nonce=' . $delete_nonce);
        ?>
        <a href="<?php echo esc_url($delete_url); ?>" class="delete-post-link">Eintrag löschen</a>



            </div><!-- /.thumbnail -->
          </div><!-- /.col -->
        </div> <!-- /.content -->
    </div><!-- /.row -->
  </div><!-- /.row -->

    <?php get_footer(); ?>
