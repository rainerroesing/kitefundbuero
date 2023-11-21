
<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="input-group">
        <label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>



            <input type="text" class="form-control" placeholder="Suche nach Kitesurf Marke, Modell, Spot..."
                   value="<?php echo get_search_query(); ?>" name="s" id="s" />
            <span class="input-group-btn">


        <button type="submit" class="btn btn-danger" id="searchsubmit">
          <span class="glyphicon glyphicon-search"></span>
        </button>

        </span>
    </div>
</form>
