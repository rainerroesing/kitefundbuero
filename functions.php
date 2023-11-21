<?php
/**
* Adds theme support for custom header, feed links, title tag, post formats, HTML5 and post thumbnails
*/
function bornholm_add_theme_support() {
add_theme_support( 'custom-header' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'title-tag' );
add_theme_support( 'post-formats', array(
'aside',
'link',
'gallery',
'status',
'quote',
'image',
'video',
'audio',
'chat'
) );
add_theme_support( 'html5', array(
'comment-list',
'comment-form',
'search-form',
'gallery',
'caption',
) );
add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'bornholm_add_theme_support' );

/*
function themes_taxonomy() {
    register_taxonomy(
        'verloren_categories',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
        'verloren',        //post type name
        array(
            'hierarchical' => true,
            'label' => 'Kategorie - Verloren',  //Display name
            'query_var' => true,
            'rewrite' => array(
            'slug' => 'lostcat', // This controls the base slug that will display before each term
            'with_front' => false // Don't display the category base before
            )
        )
    );

    register_taxonomy(
        'gefunden_categories',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
        'gefunden',        //post type name
        array(
            'hierarchical' => true,
            'label' => 'Kategorie - Gefunden',  //Display name
            'query_var' => true,
            'rewrite' => array(
            'slug' => 'themes', // This controls the base slug that will display before each term
            'with_front' => false // Don't display the category base before
            )
        )
    );
}
add_action( 'init', 'themes_taxonomy');
*/



function create_taxonomie_lost(){
	$labels = array(
		'name' => _x('Lost Items', 'taxonomy general name'),
		'singular_name' => _x('Lost Item','taxonomy singular name'),
		'search_items' => __('Search Lost Items'),
		'all_item' => __('All Lost Items'),
		'parent_item' => __('Parent Lost Item'),
		'parent_item_colon' => __('Parent Lost Item'),
		'edit_item' => __('Edit Lost Item'),
		'update_item' => __('Update Lost Item'),
		'add_new_item' => __('Add New Lost Item'),
		'new_item_name' => __('New Lost Item'),
		'menu_name' => __('Lost Item'),
	);

	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'lost-items'),
	);
	register_taxonomy('lostitem', array('verloren'), $args);
}
	add_action('init','create_taxonomie_lost');

	function create_taxonomie_found(){
		$labels = array(
			'name' => _x('Found Items', 'taxonomy general name'),
			'singular_name' => _x('Found Item','taxonomy singular name'),
			'search_items' => __('Search Found Items'),
			'all_item' => __('All Found Items'),
			'parent_item' => __('Parent Found Item'),
			'parent_item_colon' => __('Parent Found Item'),
			'edit_item' => __('Edit Found Item'),
			'update_item' => __('Update Found Item'),
			'add_new_item' => __('Add New Found Item'),
			'new_item_name' => __('New Found Item'),
			'menu_name' => __('Found Item'),
		);

		$args = array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'show_admin_column' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'found-items'),
		);
		register_taxonomy('founditem', array('gefunden'), $args);
	}
		add_action('init','create_taxonomie_found');


		// Our custom post type function
		function create_posttype() {

			register_post_type( 'verloren',
			// CPT Options
				array(
					'labels' => array(
		      'name' => __( 'Verloren' ),
		      'singular_name' => __( 'Verloren' )
					),
					'public' => true,
					'has_archive' => true,
					'rewrite' => array('slug' => 'verloren'),
		      'supports' => array( 'title', 'thumbnail'),

				)
			);

		    register_post_type( 'gefunden',
			// CPT Options
				array(
					'labels' => array(
		      'name' => __( 'Gefunden' ),
		      'singular_name' => __( 'Gefunden' )
					),
					'public' => true,
					'has_archive' => true,
					'rewrite' => array('slug' => 'gefunden'),
		      'supports' => array( 'title', 'thumbnail'),

				)
			);
		}
		// Hooking up our function to theme setup
		add_action( 'init', 'create_posttype' );

		function generate_random_unique_post_id($post_type) {
		    $random_id = wp_generate_password(12, false); // Generate a random string of 12 characters

		    // Check if the generated ID already exists in the database for the specified post type
		    $post = get_page_by_path($random_id, OBJECT, $post_type);

		    // If the ID already exists, generate a new one recursively
		    if ($post) {
		        return generate_random_unique_post_id($post_type);
		    }

		    return $random_id;
		}

		// Hook into the post creation process and set the random ID for "verloren" and "gefunden" custom post types
		function set_random_post_id($data, $postarr) {
		    $custom_post_types = array("verloren", "gefunden");

		    if (in_array($data['post_type'], $custom_post_types) && empty($postarr['ID'])) {
		        $data['post_name'] = generate_random_unique_post_id($data['post_type']);
		    }

		    return $data;
		}
		add_filter('wp_insert_post_data', 'set_random_post_id', 10, 2);



		// Register a custom endpoint for handling post deletion.
		function custom_register_delete_endpoint() {
		    add_rewrite_rule('delete-post/([0-9]+)/?$', 'index.php?delete_post=$matches[1]', 'top');
		}
		add_action('init', 'custom_register_delete_endpoint');

		// Add a custom query variable for the endpoint.
		function custom_query_vars($vars) {
		    $vars[] = 'delete_post';
		    return $vars;
		}
		add_filter('query_vars', 'custom_query_vars');

		// Handle post deletion for both logged-in and logged-out users.
		function custom_handle_post_deletion() {
		    if (get_query_var('delete_post')) {
		        $post_id = get_query_var('delete_post');

		        // Verify the nonce to ensure the action is legitimate.
		        if (isset($_GET['delete_nonce']) && wp_verify_nonce($_GET['delete_nonce'], 'delete_post_' . $post_id)) {
		            // Check if the current user can delete the post (customize this condition according to your needs).
		            // If user is not logged in, allow post deletion.
		            if (current_user_can('delete_post', $post_id) || !is_user_logged_in()) {
		                // Delete the post.
		                wp_delete_post($post_id);

		                // Redirect to a success page or somewhere else.
		                wp_redirect(home_url());
		                exit;
		            }
		        }
		    }
		}
		add_action('template_redirect', 'custom_handle_post_deletion');


		function custom_wp_mail_from($email) {
		    return 'no-reply@kitefundbuero.de'; // Replace with your desired sender email address
		}

		function custom_wp_mail_from_name($name) {
		    return 'Kitefundbuero (nicht antworten)'; // Replace with your desired sender name
		}

		add_filter('wp_mail_from', 'custom_wp_mail_from');
		add_filter('wp_mail_from_name', 'custom_wp_mail_from_name');



/**
 * Extend WordPress search to include custom fields
 *
 * http://adambalee.com
 */

/**
 * Join posts and postmeta tables
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
 */
function cf_search_join( $join ) {
    global $wpdb;

    if ( is_search() ) {
        $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }

    return $join;
}
add_filter('posts_join', 'cf_search_join' );

/**
 * Modify the search query with posts_where
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
 */
function cf_search_where( $where ) {
    global $pagenow, $wpdb;

    if ( is_search() ) {
        $where = preg_replace(
            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
    }

    return $where;
}
add_filter( 'posts_where', 'cf_search_where' );

/**
 * Prevent duplicates
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
 */
function cf_search_distinct( $where ) {
    global $wpdb;

    if ( is_search() ) {
        return "DISTINCT";
    }

    return $where;
}
add_filter( 'posts_distinct', 'cf_search_distinct' );

// Menue
function wpb_custom_new_menu() {
  register_nav_menus(
    array(
      'mainmenu' => __( 'Mainmenu' ),
      'secondmenu' => __( 'Secondmenu' )
    )
  );
}
add_action( 'init', 'wpb_custom_new_menu' );

// Menu active class
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}

// Removes pages from search
function remove_pages_from_search() {
    global $wp_post_types;
    $wp_post_types['page']->exclude_from_search = true;
}
add_action('init', 'remove_pages_from_search');


// Custom pagination
function custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   *
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  /**
   * We construct the pagination arguments to enter into our paginate_links
   * function.
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('&laquo;'),
    'next_text'       => __('&raquo;'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<nav class='custom-pagination'>";
      echo "<span class='page-numbers page-num'>Seite " . $paged . " von " . $numpages . "</span> ";
      echo $paginate_links;
    echo "</nav>";
  }
}


function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Lost Button Widget',
		'id'            => 'lost_btn_widget',
		'before_widget' => '<button class="btn btn-default btn-lost" type="button">
			                  <span class="glyphicon glyphicon-flash" aria-hidden="true"></span>',
		'after_widget'  => '</button>',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => 'Found Button Widget',
		'id'            => 'found_btn_widget',
		'before_widget' => '<button class="btn btn-default btn-found" type="button">
												<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>',
		'after_widget'  => '</button>',
		'before_title'  => '',
		'after_title'   => '',
	) );


	register_sidebar( array(
		'name'          => 'Footer Widget',
		'id'            => 'footer_widget',
		'before_widget' => '<div class="col-md-4">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded text-left">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Banner Footer Widget',
		'id'            => 'banner_footer_widget',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="banner">',
		'after_title'   => '</span>',
	) );

	register_sidebar( array(
		'name'          => 'Banner Footer Widget EN',
		'id'            => 'en_banner_footer_widget',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="banner">',
		'after_title'   => '</span>',
	) );

	register_sidebar( array(
		'name'          => 'Banner in Loop Widget',
		'id'            => 'banner_loop_widget',
		'before_widget' => '<div class="grid-item grid-item-add hero-feature"><div class="thumbnail">',
		'after_widget'  => '</div></div>',
	) );


	register_sidebar( array(
		'name'          => 'Banner in Loop Widget EN',
		'id'            => 'en_banner_loop_widget',
		'before_widget' => '<div class="grid-item grid-item-add hero-feature"><div class="thumbnail">',
		'after_widget'  => '</div></div>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );







//Auto add and update Title field: https://www.advancedcustomfields.com/resources/acf-pre_save_post/ --- changed
	function my_post_title_updater( $post_id ) {

		$my_post = array();
		$my_post['ID'] = $post_id;

	$this_post = get_post( $post_id );

		if ( $this_post->post_type == 'verloren' ) {
			$my_post['post_title'] = $this_post->brand .' '. $this_post->model .' / '. $this_post->spot.' / '. $this_post->name;
		} elseif ( $this_post->post_type == 'gefunden' ) {
			$my_post['post_title'] = $this_post->fspot .' / '. $this_post->fname;
		}


		// Update the post into the database
		wp_update_post( $my_post );
		update_post_meta($post_id,'_thumbnail_id',$this_post->image);

	}

	// run after ACF saves the $_POST['fields'] data
	add_action('acf/save_post', 'my_post_title_updater');


// Creates translation duplicates
	add_action( 'wp_insert_post', 'my_duplicate_on_publishh', 100 );
	function my_duplicate_on_publishh( $post_id ) {

	    $post = get_post( $post_id );

	    // don't save for autosave
	    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
	        return $post_id;
	    }
	    // dont save for revisions
	    if ( isset( $post->post_type ) && $post->post_type == 'revision' ) {
	        return $post_id;
	    }

	    // we need this to avoid recursion see add_action at the end
	    remove_action( 'wp_insert_post', 'my_duplicate_on_publishh', 100 );

	        // make duplicates if the post being saved
	        // #1. itself is not a duplicate of another or
	        // #2. does not already have translations

	        $is_translated = apply_filters( 'wpml_element_has_translations', '', $post_id, $post->post_type );

	        if ( !$is_translated ) {
	            do_action( 'wpml_admin_make_post_duplicates', $post_id );
	        }
#
	    // must hook again - see remove_action further up
	    add_action( 'wp_insert_post', 'my_duplicate_on_publishh',100 );

	}

	function send_email_on_post_creation($post_id) {
	    // Check if this is a new post
	    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
	    if (wp_is_post_revision($post_id)) return;

	    $post = get_post($post_id);
	    $post_type = $post->post_type;

	    if ($post_type == 'gefunden' || $post_type == 'verloren') {
	        $email_fields = array('email', 'femail');
	        $email = '';

	        // Check both email fields
	        foreach ($email_fields as $field_name) {
	            $field_value = get_field($field_name, $post_id);
	            if (!empty($field_value)) {
	                $email = $field_value;
	                break;
	            }
	        }

	        // Check if an email is found
	        if (!empty($email)) {
	            // Get the post URL
	            $post_url = get_permalink($post_id);

	            $subject = 'Kitefundbuero - Link zum löschen';
	            $message = "Dein Eintrag wurde erstellt. Hier kannst Du ihn wieder löschen: $post_url";
	            $headers = array('Content-Type: text/html; charset=UTF-8');

	            // Send the email
	            wp_mail($email, $subject, $message, $headers);
	        }
	    }
	}

	add_action('acf/save_post', 'send_email_on_post_creation', 20);



?>
