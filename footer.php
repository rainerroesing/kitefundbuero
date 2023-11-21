

<div class="row" id="banner">
    <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">

<?php if ( is_active_sidebar( 'banner_footer_widget' ) ) : ?>
<div role="complementary">
  <?php dynamic_sidebar( 'banner_footer_widget' ); ?>
</div><!-- #primary-sidebar -->
<?php endif; ?>


</div>
</div>


 <footer class="footer text-center">

      <div class="container">

          <div id="share"></div>

          <div class="footerwidgets">


              <div class="row" id="disclaimer">
                  <div class="col-xs-12">
          <?php if ( is_active_sidebar( 'footer_widget' ) ) : ?>
            <div role="complementary">
                <?php dynamic_sidebar( 'footer_widget' ); ?>
            </div><!-- #primary-sidebar -->
          <?php endif; ?>
         </div>
          </div>

              <div>
            <?php wp_nav_menu( array(
            'theme_location' => 'secondmenu',
            'container_class' => 'secondmenuclass' ) ); ?>

              </div>

          </div>
         </div>

    </footer>

    <!-- Sharing -->
    <link href="<?php bloginfo('template_directory');?>/css/font-awesome.min.css" rel="stylesheet">

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php bloginfo('template_directory');?>/js/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_directory');?>/js/isotope.pkgd.min.js"></script>
    <!-- Sharing buttons -->
    <!-- Custom functions -->
    <script src="<?php bloginfo('template_directory');?>/js/custom.js"></script>
    <!-- Sharing Settings-->



<?php wp_footer(); ?>


  </body>
</html>
