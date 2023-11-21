<div class="thumbnail">

	<!-- / Start Solved Check -->
	<?php if ( get_field( 'solved' ) ): ?>
	<div class="done"><div class="solvedicon"></div></div>
	<?php else: // field_name returned false ?>
	<?php endif; // end of if field_name logic ?>
  <!-- / Ende FSolved Check -->


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

    <!-- / WP  Bild
    <?php the_post_thumbnail('medium'); ?>-->

		<!-- / ACF Bild -->
		<?php $image = get_field('image');
		if( !empty($image) ):
			// vars
			$url = $image['url'];
			$title = $image['title'];
			$alt = $image['alt'];
			// thumbnail
			$size = 'medium';
			$thumb = $image['sizes'][ $size ];
			$width = $image['sizes'][ $size . '-width' ];
			$height = $image['sizes'][ $size . '-height' ]; ?>
			<img src="<?php echo $thumb; ?>" alt="Kitesurf Lost & Found" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
	  	<?php endif; ?>
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

    <!-- / Start Feld Datum
    <?php $postmarke = get_post_meta($post->ID, 'date', true); if ( $postmarke ) : ?>
    <li class="metapost sub topspace"><?php the_field('date'); ?></li>
    <?php else : ?><?php endif; ?>
   Ende Feld Datum -->

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

    <!-- / Start Feld Datum
    <?php $postmarke = get_post_meta($post->ID, 'fdate', true); if ( $postmarke ) : ?>
    <li class="metapost"><?php the_field('fdate'); ?></li>
    <?php else : ?><?php endif; ?>
     Ende Feld Datum -->

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
        <li class="concontent phone">Tel.: <?php the_field('phone'); ?></li>
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

<!--
<?php if ( 'verloren' == get_post_type() ) {
      echo '<a href="#" class="btn btncta" data-toggle="modal" data-target="#contactmodal">Gefunden!</a>';
      } elseif ( 'gefunden' == get_post_type() ) {
	  echo '<a href="#" class="btn btncta" data-toggle="modal" data-target="#contactmodal">Gehört mir!</a>';
      }
      ?>  -->

        </div>
</div>
