<?php acf_form_head(); ?>
<?php
/*
Template Name: Submit Gefunden Classic
*/
?>
<?php get_header(); ?>

<div class="content csubmitpage">

  <div class="subpagecontent">
    <div class="container">

      <h2 class="titles text-center">

        <?php while ( have_posts() ) : the_post(); ?>
            <?php the_title(); ?></h2>
        <?php the_content(); ?>
            <?php endwhile; // end of the loop. ?>


     <div class="triangle"></div>
    </div>
</div>
<div class="container">

<div class="row">
<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 submitform">

  <?php while ( have_posts() ) : the_post(); ?>

  				<?php acf_form(array(
					'post_id'		=> 'new_post',
					'new_post'		=> array(
						'post_type'		=> 'gefunden',
						'post_status'		=> 'publish'
					),
					'submit_value'		=> 'Abschicken',
          'return'        =>  home_url('/danke/'), 
          'uploader' => 'basic',
				)); ?>


      <?php endwhile; // end of the loop. ?>

    </div>
    </div>

</div>


<!-- ACF Form stuff BEGIN -->
<?php acf_enqueue_uploader(); ?>

<script type="text/javascript">
(function($) {

	// setup fields
	acf.do_action('append', $('#popup-id'));

})(jQuery);
</script>
<!-- ACF Form stuff END -->

<?php get_footer(); ?>
