<?php
/**
 * Center for Data and Computation Technologies functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Center_for_Data_and_Computation_Technologies
 */
@ini_set( 'upload_max_size' , '8M' );
@ini_set( 'post_max_size', '8M');
@ini_set( 'max_execution_time', '300' );

if ( ! function_exists( 'center_for_data_and_computation_technologies_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function center_for_data_and_computation_technologies_setup() {

        add_action( 'init', 'script_enqueuer' );
        function script_enqueuer() {
           
           // Register the JS file with a unique handle, file location, and an array of dependencies
           wp_register_script( "liker_script", '/wp-content/themes/center-for-data-and-computation-technologies/js/ajax.js', array('jquery') );
          
           // localize the script to your domain name, so that you can reference the url to admin-ajax.php file easily
           wp_localize_script( 'liker_script', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));        
           
           // enqueue jQuery library and the script you registered above
           wp_enqueue_script( 'jquery' );
           wp_enqueue_script( 'liker_script' );
        }

        //Dang ky Register sidebar
        register_sidebar( array(
            'id'=>'quick_link',
            'name'=>__( 'Sidebar Footer', 'theme_text_domain' )
        ));
        register_sidebar( array(
            'id'=>'quick_link2',
            'name'=>__( 'Sidebar Footer2', 'theme_text_domain' )
        ));
        /* Kích hoạt tính năng hỗ trợ woocommerce
         */
        add_theme_support('woocommerce');
        add_theme_support('custom-logo');

        function them_class_cho_menu($ulclass) {
            $a = preg_replace('/<a /', '<a class="nav-link"', $ulclass);
            return preg_replace('/<li /', '<li class="nav-item"', $a);
        }

        add_filter('wp_nav_menu','them_class_cho_menu');

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Center for Data and Computation Technologies, use a find and replace
         * to change 'center-for-data-and-computation-technologies' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'center-for-data-and-computation-technologies', get_template_directory() . '/languages' );

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
            'menu-1' => esc_html__( 'Primary', 'center-for-data-and-computation-technologies' ),
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
        add_theme_support( 'custom-background', apply_filters( 'center_for_data_and_computation_technologies_custom_background_args', array(
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

add_action("wp_ajax_my_user_like", "my_user_like");
add_action("wp_ajax_nopriv_my_user_like", "please_login");
// define the function to be fired for logged in users
function my_user_like() {
   $like = true;
   
   // If above action fails, result type is set to 'error' and like_count set to old value, if success, updated to new_like_count  
   if($like === false) {
      $result['type'] = "error";
      $result['like_count'] = $like_count;
   }
   else {
      $result['type'] = "success";
      $result['like_count'] = $new_like_count;
   }
   
   // Check if action was fired via Ajax call. If yes, JS code will be triggered, else the user is redirected to the post page
   if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
      $result = json_encode($result);
      echo $result;
   }
   else {
      header("Location: ".$_SERVER["HTTP_REFERER"]);
   }
   // don't forget to end your scripts with a die() function - very important
   die();
}
// define the function to be fired for logged out users
function please_login() {
   echo json_encode("You must log in to like");
   die();
}
// Đăng ký UserName
function regist_user() {
    $args = array(
        'post_type' => 'user',
        'post_status' => 'publish'
    );

    $loop = new WP_Query( $args ); 
        
    while ( $loop->have_posts() ) : $loop->the_post();
        if (get_field('address_email') == $_REQUEST["email"]) {
            $result = json_encode('Email');
            echo $result;
            die();
        }
    endwhile;
    wp_reset_postdata();

    $post_id = wp_insert_post(array (
        'post_type' => 'user',
        'post_title' => $_REQUEST["username"],
        'post_content' => 'Hi! Contact me via ' . $_REQUEST["email"],
        'post_status' => 'publish',
    ));

    add_post_meta($post_id, 'address_email', $_REQUEST["email"], true);
    add_post_meta($post_id, 'pass_word', $_REQUEST["password"], true);

    // Check if action was fired via Ajax call. If yes, JS code will be triggered, else the user is redirected to the post page
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $result = json_encode(true);
        echo $result;
    } else {
        header("Location: ".$_SERVER["HTTP_REFERER"]);
    }
    die();
}
add_action("wp_ajax_regist_user", "regist_user");
add_action("wp_ajax_nopriv_regist_user", "regist_user");

// UserName Login 
function login_user() {
    $args = array(
        'post_type' => 'user',
        'post_status' => 'publish'
    );

    $loop = new WP_Query( $args ); 
        
    while ( $loop->have_posts() ) : $loop->the_post();
        if (get_field('address_email') == $_REQUEST["email"]) {
            if (get_field('pass_word') == $_REQUEST["password"]) {
                $result = json_encode(true);
                echo $result;
                die();
            } else {
                $result = json_encode('wrong');
                echo $result;
                die();
            }
        }
    endwhile;
    wp_reset_postdata();

    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $result = json_encode(false);
        echo $result;
    } else {
        header("Location: ".$_SERVER["HTTP_REFERER"]);
    }
    die();
}
add_action("wp_ajax_login_user", "login_user");
add_action("wp_ajax_nopriv_login_user", "login_user");

add_action( 'after_setup_theme', 'center_for_data_and_computation_technologies_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function center_for_data_and_computation_technologies_content_width() {
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters( 'center_for_data_and_computation_technologies_content_width', 640 );
}
add_action( 'after_setup_theme', 'center_for_data_and_computation_technologies_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function center_for_data_and_computation_technologies_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'center-for-data-and-computation-technologies' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'center-for-data-and-computation-technologies' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'center_for_data_and_computation_technologies_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function center_for_data_and_computation_technologies_scripts() {
    wp_enqueue_style( 'center-for-data-and-computation-technologies-style', get_stylesheet_uri() );

    wp_enqueue_script( 'center-for-data-and-computation-technologies-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

    wp_enqueue_script( 'center-for-data-and-computation-technologies-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'center_for_data_and_computation_technologies_scripts' );

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

