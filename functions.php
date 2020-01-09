<?php
/**
 * All resorces declaration like stylesheet and javascript
 */
function WPbook_Theme_resorces()
{
    wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/book_style.css', array(), '1.0.0', 'all');
    //css
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.3.1', 'all');
    wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/prashant.css', array(), '1.0.0', 'all');
    // //js
    // wp_enqueue_script('jquery');
    // wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '4.3.1', true);
    // wp_enqueue_script('customsjs', get_template_directory_uri() . '/js/prashant.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'WPbook_Theme_resorces');


/**
 * Custom Post Type
 */
function wpportfolio1_register_post_type()
{   
    $labels = array(
        'name'                  => _x('Portfolio', 'Post type general name', 'textdomain'),
        'singular_name'         => _x('Portfolio', 'Post type singular name', 'textdomain'),
        'menu_name'             => _x('Portfolio', 'Admin Menu text', 'textdomain'),
        'name_admin_bar'        => _x('Portfolio', 'Add New on Toolbar', 'textdomain'),
        'add_new'               => __('Add New', 'textdomain'),
        'add_new_item'          => __('Add New portfolio', 'textdomain'),
        'new_item'              => __('New portfolio', 'textdomain'),
        'edit_item'             => __('Edit portfolio', 'textdomain'),
        'view_item'             => __('View portfolio', 'textdomain'),
        'all_items'             => __('All portfolio', 'textdomain'),
        'search_items'          => __('Search portfolio', 'textdomain'),
        'parent_item_colon'     => __('Parent portfolio:', 'textdomain'),
        'not_found'             => __('No portfolio found.', 'textdomain' ),
        'not_found_in_trash'    => __('No portfolio found in Trash.', 'textdomain'),
        'featured_image'        => _x('Portfolio Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain'),
        'set_featured_image'    => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'use_featured_image'    => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'archives'              => _x('Portfolio archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain'),
        'insert_into_item'      => _x('Insert into portfolio', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain'),
        'uploaded_to_this_item' => _x('Uploaded to this portfolio', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain'),
        'filter_items_list'     => _x('Filter portfolio list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain'),
        'items_list_navigation' => _x('Portfolio list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain'),
        'items_list'            => _x('Portfolio list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain'),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'portfolio', 
                                    'with_front' => true,
                                    'pages'     => true,
                                    'feeds'     => false,
                                ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields' ),
    );
    register_post_type('portfolio', $args);
}
add_action('init', 'wpportfolio1_register_post_type');


/**
 * Custom header setup
 */
function wp_themename_custom_header_setup()
{
    $header_info = array(
        'width'         => 8000,
        'height'        => 4000,
        // 'flex-width'         => true,
        // 'flex-height'        => true,
        'default-image' => get_template_directory_uri() . '/img/slider-image.png',
    );
    add_theme_support('custom-header', $header_info);
}
add_action('after_setup_theme', 'wp_themename_custom_header_setup');


/**
 * Navigation Menus
 */
function wpbook_theme_setup()
{
    add_theme_support('menus');
    register_nav_menu('primary', 'Primary Header Navigation');
    register_nav_menu('footer', 'Footer Navigation');
    add_theme_support('post-thumbnails');
    add_image_size('small-thumbnail', 180, 120, true);
    add_image_size('banner-image', 920, 210, array('left','top'));
    //add post format support
    add_theme_support('post-formats', array('aside', 'gallery', 'link'));
}
add_action('init', 'wpbook_theme_setup');

/**
 * Customize excerpt word count length 
 */
function wpBook_custom_excerpt_length()
{
    return 50;
}
add_filter('excerpt_length', 'wpBook_custom_excerpt_length');

/**
 * Add our widget location
 */
function wpBook_widget_location() {
    register_sidebar(
        array(
            'name' => 'Sidebar',
            'id' => 'sidebar1',
            'before_widget' => '<div class="widget-item">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class = "my-special-class>',
            'after_tite' => '</h4>'
        )
    );

    register_sidebar(
        array(
            'name' => 'Footer Area 1',
            'id' => 'footer1',
            'before_widget' => '<div class="widget-item">',
            'after_widget' => '</div>'
        )
    );

    register_sidebar(
        array(
            'name' => 'Footer Area 2',
            'id' => 'footer2',
            'before_widget' => '<div class="widget-item">',
            'after_widget' => '</div>'
        )
    );
}
add_action('widgets_init', 'wpBook_widget_location');
