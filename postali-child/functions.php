<?php
/**
 * Theme functions.
 *
 * @package Postali Child
 * @author Postali LLC
 */
	require_once dirname( __FILE__ ) . '/includes/admin.php';
	require_once dirname( __FILE__ ) . '/includes/utility.php';
	require_once dirname( __FILE__ ) . '/includes/updates-cpt.php'; // Custom Post Type Updates
	require_once dirname( __FILE__ ) . '/includes/attorneys-cpt.php'; // Custom Post Type Attorneys

	// remove slug for attorney cpt 
	function na_remove_slug( $post_link, $post, $leavename ) {
		if ( 'attorneys' != $post->post_type || 'publish' != $post->post_status ) {
			return $post_link;
		}
		$post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
		return $post_link;
	}
	add_filter( 'post_type_link', 'na_remove_slug', 10, 3 );
	
	function na_parse_request( $query ) {
		if ( ! $query->is_main_query() || 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
			return;
		}
		if ( ! empty( $query->query['name'] ) ) {
			$query->set( 'post_type', array( 'post', 'attorneys', 'page' ) );
		}
	}
	add_action( 'pre_get_posts', 'na_parse_request' );

	// get all of our scripts
	add_action('wp_enqueue_scripts', 'postali_parent');
	function postali_parent() {
		wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/assets/css/styles.css' ); // Enqueue parent theme styles
	
	}  

	add_action('wp_enqueue_scripts', 'postali_child');
	function postali_child() {

		wp_enqueue_style( 'child-styles', get_stylesheet_directory_uri() . '/style.css' ); // Enqueue Child theme style sheet (theme info)
		wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/assets/css/styles.css'); // Enqueue child theme styles.css
		wp_enqueue_style( 'slick-css', get_stylesheet_directory_uri() . '/assets/css/slick.css'); // Enqueue child theme styles.css

		wp_register_style( 'icomoon-fonts', 'https://cdn.icomoon.io/152819/Ashcroft/style-cf.css?4vjm3m', array() );
		wp_enqueue_style('icomoon-fonts');

		wp_register_style( 'adobe-fonts', 'https://use.typekit.net/enp0fxj.css', array() );
		wp_enqueue_style('adobe-fonts');

		// lightbox script
		wp_register_script('lightbox-scripts', get_stylesheet_directory_uri() . '/assets/js/lity.js',array('jquery'), null, true); 
		wp_enqueue_script('lightbox-scripts');

		// Compiled .js using Grunt.js
		wp_register_script('custom-scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.min.js',array('jquery'), null, true); 
		wp_enqueue_script('custom-scripts');
		wp_register_script('slick-min', get_stylesheet_directory_uri() . '/assets/js/slick.min.js',array('jquery'), null, true); 
		wp_enqueue_script('slick-min');
		wp_register_script('slick-custom-min', get_stylesheet_directory_uri() . '/assets/js/slick-custom.min.js',array('jquery'), null, true); 
		wp_enqueue_script('slick-custom-min');
		wp_register_script('page-scroll-min', get_stylesheet_directory_uri() . '/assets/js/page-scroll.min.js',array('jquery'), null, true); 
		wp_enqueue_script('page-scroll-min');
		
		wp_register_script('home-min', get_stylesheet_directory_uri() . '/assets/js/home.min.js',array('jquery'), null, true); 
		wp_enqueue_script('home-min');

	}

	// Register Site Navigations
	function postali_child_register_nav_menus() {
		register_nav_menus(
			array(
				'header-nav' => __( 'Header Navigation', 'postali' ),
				'footer-nav' => __( 'Footer Navigation', 'postali' ),
			)
		);
	}
	add_action( 'init', 'postali_child_register_nav_menus' );

	// Add Custom Logo Support
	add_theme_support( 'custom-logo' );

	function postali_custom_logo_setup() {
		$defaults = array(
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		);
		add_theme_support( 'custom-logo', $defaults );
	}
	add_action( 'after_setup_theme', 'postali_custom_logo_setup' );

	// ACF Options Pages
	if( function_exists('acf_add_options_page') ) {

		acf_add_options_page(array(
			'page_title'    => 'Locations',
			'menu_title'    => 'Locations',
			'menu_slug'     => 'locations',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-admin-site', // Add this line and replace the second inverted commas with class of the icon you like
			'redirect'      => false
		));

		acf_add_options_page(array(
			'page_title'    => 'Practice Areas',
			'menu_title'    => 'Practice Areas',
			'menu_slug'     => 'practiceareas',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-businessman', // Add this line and replace the second inverted commas with class of the icon you like
			'redirect'      => false
		));


		acf_add_options_page(array(
			'page_title'    => 'Customizations',
			'menu_title'    => 'Customizations',
			'menu_slug'     => 'customizations',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-admin-appearance',
			'redirect'      => false
		));

	}

	// Save newly created fields to child theme
	add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
	function my_acf_json_save_point( $path ) {
		
		// update path
		$path = get_stylesheet_directory() . '/acf-json';
		
		// return
		return $path;
	
	}

	// return custom number of posts for updates 
	function my_cptui_change_posts_per_page( $query ) {
		if ( is_admin() || ! $query->is_main_query() ) {
		   return;
		}
	
		if ( is_post_type_archive( 'updates' ) ) {
		   $query->set( 'posts_per_page', 9 );
		}
	}
	add_filter( 'pre_get_posts', 'my_cptui_change_posts_per_page' );

	// custom excerpt length for blog roll
	function custom_excerpt_length( $length ) {
		return 20;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
	
	// Add ability to add SVG to Wordpress Media Library
	function cc_mime_types($mimes) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}
	add_filter('upload_mimes', 'cc_mime_types');
	
	//add SVG to allowed file uploads
	function add_file_types_to_uploads($file_types){

		$new_filetypes = array();
		$new_filetypes['svg'] = 'image/svg+xml';
		$new_filetypes['vcf'] = 'text/vcard';
		$file_types = array_merge($file_types, $new_filetypes );

		return $file_types;
	}
	add_action('upload_mimes', 'add_file_types_to_uploads');


	// Widget Logic Conditionals
	function is_child($parent) {
		global $post;
			return $post->post_parent == $parent;
		}
		
		// Widget Logic Conditionals (ancestor) 
		function is_tree( $pid ) {
		global $post;
		
		if ( is_page($pid) )
		return true;
		
		$anc = get_post_ancestors( $post->ID );
		foreach ( $anc as $ancestor ) {
			if( is_page() && $ancestor == $pid ) {
				return true;
				}
		}
		return false;
	}
	
	// WP Backend Menu area taller
	add_action('admin_head', 'taller_menus');

	function taller_menus() {
	echo '<style>
		.posttypediv div.tabs-panel {
			max-height:500px !important;
		}
	</style>';
	}

	// Customize the logo on the wp-login.php page
	function my_login_logo() { ?>
		<style type="text/css">
			#login h1 a, .login h1 a {
			background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.png);
			height:45px;
			width:204px;
			background-size: 204px 45px;
			background-repeat: no-repeat;
			padding-bottom: 30px;
			}
		</style>
	<?php }
	add_action( 'login_enqueue_scripts', 'my_login_logo' );

	// Contact Form 7 Submission Page Redirect
	add_action( 'wp_footer', 'mycustom_wp_footer' );
	
	function mycustom_wp_footer() {
	?>
	<script type="text/javascript">
	document.addEventListener( 'wpcf7mailsent', function( event ) {
		location = '/form-success/';
	}, false );
	</script>
	<?php
	}

    function retrieve_latest_gform_submissions() {
    $site_url = get_site_url();
    $search_criteria = [
        'status' => 'active'
    ];
    $form_ids = 1; //search all forms
    $sorting = [
        'key' => 'date_created',
        'direction' => 'DESC'
    ];
    $paging = [
        'offset' => 0,
        'page_size' => 5
    ];
    
    $submissions = GFAPI::get_entries($form_ids, null, $sorting, $paging);
    $start_date = date('Y-m-d H:i:s', strtotime('-5 day'));
    $end_date = date('Y-m-d H:i:s');
    $entry_in_last_5_days = false;
    
    foreach ($submissions as $submission) {
        if( $submission['date_created'] > $start_date  && $submission['date_created'] <= $end_date ) {
            $entry_in_last_5_days = true;
        } 
    }
    if( !$entry_in_last_5_days ) {
        wp_mail('webdev@postali.com', 'Submission Status', "No submissions in last 5 days on $site_url");
    }
}
add_action('check_form_entries', 'retrieve_latest_gform_submissions');
?>