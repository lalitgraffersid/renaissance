<?php
/**
 * simplfyi functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package simplfyi
 */

if ( ! function_exists( 'simplfyi_by_alfyi_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function simplfyi_by_alfyi_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on simplfyi, use a find and replace
		 * to change 'simplfyi_by_alfyi' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'simplfyi_by_alfyi', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'simplfyi_by_alfyi' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'simplfyi_by_alfyi_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'simplfyi_by_alfyi_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function simplfyi_by_alfyi_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'simplfyi_by_alfyi_content_width', 640 );
}
add_action( 'after_setup_theme', 'simplfyi_by_alfyi_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function simplfyi_by_alfyi_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'simplfyi_by_alfyi' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'simplfyi_by_alfyi' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'simplfyi_by_alfyi_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function simplfyi_by_alfyi_scripts() {
	wp_enqueue_style( 'simplfyi_by_alfyi-style', get_stylesheet_uri() );

	wp_enqueue_style( 'my-style', get_template_directory_uri() . '/css/custom_style.css', true, array() ); 

	wp_enqueue_style( 'datatable_css', 'https://nightly.datatables.net/css/jquery.dataTables.css', array(),true );
	wp_register_script( 'jQuery', 'https://nightly.datatables.net/js/jquery.dataTables.js', array(),true );

	wp_enqueue_script( 'simplfyi_by_alfyi-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'simplfyi_by_alfyi-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'simplfyi_by_alfyi_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

add_filter( 'use_block_editor_for_post', '__return_false' );


// function show_template() {
//     global $template;
//     print_r($template);
// }
// add_action('wp_head', 'show_template');

/*
* Creating a function to create our CPT
*/
 
function custom_post_type() {
 
	// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'Courses', 'Post Type General Name', 'twentythirteen' ),
			'singular_name'       => _x( 'Course', 'Post Type Singular Name', 'twentythirteen' ),
			'menu_name'           => __( 'Courses', 'twentythirteen' ),
			'parent_item_colon'   => __( 'Parent Course', 'twentythirteen' ),
			'all_items'           => __( 'All Courses', 'twentythirteen' ),
			'view_item'           => __( 'View Course', 'twentythirteen' ),
			'add_new_item'        => __( 'Add New Course', 'twentythirteen' ),
			'add_new'             => __( 'Add New', 'twentythirteen' ),
			'edit_item'           => __( 'Edit Course', 'twentythirteen' ),
			'update_item'         => __( 'Update Course', 'twentythirteen' ),
			'search_items'        => __( 'Search Course', 'twentythirteen' ),
			'not_found'           => __( 'Not Found', 'twentythirteen' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
		);
		 
	// Set other options for Custom Post Type
		 
		$args = array(
			'label'               => __( 'courses', 'twentythirteen' ),
			'description'         => __( 'Course news and reviews', 'twentythirteen' ),
			'labels'              => $labels,
			// Features this CPT supports in Post Editor
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
			// You can associate this CPT with a taxonomy or custom taxonomy. 
			'taxonomies'          => array( 'genres' ),
			/* A hierarchical CPT is like Pages and can have
			* Parent and child items. A non-hierarchical CPT
			* is like Posts.
			*/ 
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		);
		 
		// Registering your Custom Post Type
		register_post_type( 'courses', $args );
	 
	}
	 
	/* Hook into the 'init' action so that the function
	* Containing our post type registration is not 
	* unnecessarily executed. 
	*/
	 
	add_action( 'init', 'custom_post_type', 0 );

	function myscript() {
		?>
		<script type="text/javascript">
	
	jQuery("#trigger1a,#trigger2a").hover(function () {
		jQuery(".responses").removeClass("show");
		jQuery("#response1").addClass("show");
	});
	jQuery("#trigger1b,#trigger2b").hover(function () {
		jQuery(".responses").removeClass("show");
		jQuery("#response2").addClass("show");
	});
	jQuery("#trigger1c,#trigger2c").hover(function () {
		jQuery(".responses").removeClass("show");
		jQuery("#response3").addClass("show");
	});
	jQuery("#trigger1d,#trigger2d").hover(function () {
		jQuery(".responses").removeClass("show");
		jQuery("#response4").addClass("show");
	});
	jQuery("#trigger1e,#trigger2e").hover(function () {
		jQuery(".responses").removeClass("show");
		jQuery("#response5").addClass("show");
	});
			
			
  jQuery("video").prop('muted', true);
			jQuery("#mute-video").addClass('unmuted');

  jQuery("#mute-video").click( function (){
	  //alert("sasa");
    if( jQuery("video").prop('muted') ) {
          jQuery("video").prop('muted', false);
		jQuery("#mute-video").removeClass('unmuted');
    } else {
      jQuery("video").prop('muted', true);
		jQuery("#mute-video").addClass('unmuted');
    }
  });
					
jQuery(document).ready(function() {

  setTimeout(function() {
    jQuery('video')[0].load();
  }, 0);

  jQuery('#videoPlay').on('click', function() {
	 jQuery('video').play();
    // Change is here -------^
    if (jQuery('video').hasClass('is-playing')) {
      jQuery('video').removeClass().addClass('is-paused');
      jQuery('video')[0].pause();
    } else {
      jQuery('video').removeClass().addClass('is-playing');
      jQuery('video')[0].play();
    }
    return false;
  });

});

		
		</script>
		<?php
		}
		add_action( 'wp_footer', 'myscript' );
		
		function myscript_jquery() {
			wp_enqueue_script( 'jquery' );
		}
		add_action( 'wp_head' , 'myscript_jquery' );

add_filter( 'use_block_editor_for_post', '__return_false' );

// Custom redirection
function my_logged_in_redirect() {
     
    if ( is_page( 6348 ) ) 
    {
    	echo "<script>
	         setTimeout(function(){
	            window.location.href = 'https://renaissance.ac.in/';
	         }, 10000);
	      </script>";
    }
}
add_action( 'template_redirect', 'my_logged_in_redirect' );

// Student Details Start
add_action( 'admin_menu', 'student_details' );

function student_details() {
add_menu_page( 'My Custom Options', 'Student Detail', 'manage_options', 'student_details', 'my_custom_options' );
}

function my_custom_options() {
if ( !current_user_can( 'manage_options' ) )  {
    wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
}
// button redirection
echo '<div>';
echo '<button style="background: #2F2F2F; font-style: normal; font-weight: 500; font-size: 14px; line-height: 21px;text-align: center; color: #FFFFFF; padding: 12px 10px;margin: 31px 0px 0px 0px;cursor: pointer;"><a target="_blank" href="https://renaissance.ac.in/student-details-table/" style="border: none;outline: none;color:#ffffff;">Student Details</a></button>';
echo '</div>';

}
// Student Details End

add_action('admin_head', 'my_custom_fonts'); // admin_head is a hook my_custom_fonts is a function we are adding it to the hook

function my_custom_fonts() {
  echo '<style>
   			#qfb-page-messages,#menu-comments, #menu-tools, #toplevel_page_edit-post_type-acf-field-group, #toplevel_page_elementor, #toplevel_page_jet-engine, #toplevel_page_jet-menu, #toplevel_page_cfdb7-list{ display:none !important;}
  #wpfooter {
    display: none;
}
  </style>';
}

add_action('wp_head', 'google_facebook_code');
function google_facebook_code(){
?>
	<meta name="facebook-domain-verification" content="0mooq8uh8o4wjlel8ray9yrgavsase" />
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<meta name="google-site-verification" content="u3PhSuD83CKFif_fyQwDqFjA2RhFI4cEVrafEPJhntI" />
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-216502634-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-216502634-1');
	</script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-216502634-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	  gtag('config', 'UA-216502634-1');
	</script>

	<!-- Facebook Pixel Code -->
	<script>
		!function(f,b,e,v,n,t,s)
		{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];
		s.parentNode.insertBefore(t,s)}(window, document,'script',
		'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '169908541625791');
		fbq('track', 'PageView');
	</script>
	<noscript>
		<img height="1" width="1" style="display:none"
	src="https://www.facebook.com/tr?id=169908541625791&ev=PageView&noscript=1"
	/>
	</noscript>
<!-- End Facebook Pixel Code -->
<?php
};
