<?php
/**
 * AartiStotram Theme Functions
 *
 * @package AartiStotram
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'AARTISTOTRAM_VERSION', '1.0.0' );
define( 'AARTISTOTRAM_DIR', get_template_directory() );
define( 'AARTISTOTRAM_URI', get_template_directory_uri() );

/**
 * Theme Setup
 */
function aartistotram_setup() {
    // Add title tag support
    add_theme_support( 'title-tag' );

    // Post thumbnails
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'aartistotram-card', 400, 300, true );
    add_image_size( 'aartistotram-hero', 1200, 600, true );

    // HTML5 support
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // Custom logo
    add_theme_support( 'custom-logo', array(
        'height'      => 80,
        'width'       => 250,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // Register nav menus
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'aartistotram' ),
        'footer'  => esc_html__( 'Footer Menu', 'aartistotram' ),
    ) );

    // Content width
    if ( ! isset( $content_width ) ) {
        $content_width = 1200;
    }
}
add_action( 'after_setup_theme', 'aartistotram_setup' );

/**
 * Enqueue Styles and Scripts
 */
function aartistotram_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'aartistotram-fonts',
        'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Noto+Sans+Devanagari:wght@400;500;600;700&display=swap',
        array(),
        null
    );

    // Main stylesheet
    wp_enqueue_style(
        'aartistotram-main',
        AARTISTOTRAM_URI . '/assets/css/main.css',
        array(),
        AARTISTOTRAM_VERSION
    );

    // Theme stylesheet (WordPress requirement)
    wp_enqueue_style(
        'aartistotram-style',
        get_stylesheet_uri(),
        array( 'aartistotram-main' ),
        AARTISTOTRAM_VERSION
    );

    // Main JS
    wp_enqueue_script(
        'aartistotram-main',
        AARTISTOTRAM_URI . '/assets/js/main.js',
        array(),
        AARTISTOTRAM_VERSION,
        true
    );

    // Localize script
    wp_localize_script( 'aartistotram-main', 'aartistotramData', array(
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'siteUrl' => home_url( '/' ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'aartistotram_scripts' );

/**
 * Register Widget Areas
 */
function aartistotram_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'aartistotram' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'aartistotram' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Column 1', 'aartistotram' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Footer first column.', 'aartistotram' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Column 2', 'aartistotram' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Footer second column.', 'aartistotram' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Column 3', 'aartistotram' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Footer third column.', 'aartistotram' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'aartistotram_widgets_init' );

/**
 * Custom Excerpt Length
 */
function aartistotram_excerpt_length( $length ) {
    return 25;
}
add_filter( 'excerpt_length', 'aartistotram_excerpt_length' );

/**
 * Custom Excerpt More
 */
function aartistotram_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'aartistotram_excerpt_more' );

/**
 * Breadcrumbs
 */
function aartistotram_breadcrumbs() {
    if ( is_front_page() ) {
        return;
    }

    echo '<nav class="breadcrumbs" aria-label="Breadcrumb">';
    echo '<ol class="breadcrumb-list" itemscope itemtype="https://schema.org/BreadcrumbList">';

    // Home
    echo '<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">';
    echo '<a href="' . esc_url( home_url( '/' ) ) . '" itemprop="item"><span itemprop="name">' . esc_html__( 'Home', 'aartistotram' ) . '</span></a>';
    echo '<meta itemprop="position" content="1" />';
    echo '</li>';

    $position = 2;

    if ( is_category() ) {
        echo '<li class="breadcrumb-item active" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">';
        echo '<span itemprop="name">' . esc_html( single_cat_title( '', false ) ) . '</span>';
        echo '<meta itemprop="position" content="' . esc_attr( $position ) . '" />';
        echo '</li>';
    } elseif ( is_single() ) {
        $categories = get_the_category();
        if ( ! empty( $categories ) ) {
            echo '<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">';
            echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $categories[0]->name ) . '</span></a>';
            echo '<meta itemprop="position" content="' . esc_attr( $position ) . '" />';
            echo '</li>';
            $position++;
        }
        echo '<li class="breadcrumb-item active" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">';
        echo '<span itemprop="name">' . esc_html( get_the_title() ) . '</span>';
        echo '<meta itemprop="position" content="' . esc_attr( $position ) . '" />';
        echo '</li>';
    } elseif ( is_page() ) {
        echo '<li class="breadcrumb-item active" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">';
        echo '<span itemprop="name">' . esc_html( get_the_title() ) . '</span>';
        echo '<meta itemprop="position" content="' . esc_attr( $position ) . '" />';
        echo '</li>';
    } elseif ( is_search() ) {
        echo '<li class="breadcrumb-item active" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">';
        echo '<span itemprop="name">' . esc_html__( 'Search Results', 'aartistotram' ) . '</span>';
        echo '<meta itemprop="position" content="' . esc_attr( $position ) . '" />';
        echo '</li>';
    } elseif ( is_404() ) {
        echo '<li class="breadcrumb-item active" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">';
        echo '<span itemprop="name">' . esc_html__( '404 - Page Not Found', 'aartistotram' ) . '</span>';
        echo '<meta itemprop="position" content="' . esc_attr( $position ) . '" />';
        echo '</li>';
    }

    echo '</ol>';
    echo '</nav>';
}

/**
 * Custom Menu Walker for Primary Nav (removed - using default walker for compatibility)
 */

/**
 * Fallback menu if no menu assigned
 */
function aartistotram_fallback_menu() {
    echo '<ul class="nav-menu">';
    echo '<li class="menu-item"><a href="' . esc_url( home_url( '/' ) ) . '">Home</a></li>';
    echo '<li class="menu-item"><a href="' . esc_url( home_url( '/category/aarti/' ) ) . '">Aartis</a></li>';
    echo '<li class="menu-item"><a href="' . esc_url( home_url( '/category/chalisa/' ) ) . '">Chalisa</a></li>';
    echo '<li class="menu-item"><a href="' . esc_url( home_url( '/category/stotra/' ) ) . '">Stotras</a></li>';
    echo '<li class="menu-item"><a href="' . esc_url( home_url( '/category/mantra/' ) ) . '">Mantras</a></li>';
    echo '<li class="menu-item"><a href="' . esc_url( home_url( '/category/vrat-katha/' ) ) . '">Vrat Katha</a></li>';
    echo '<li class="menu-item"><a href="' . esc_url( home_url( '/blog/' ) ) . '">Blog</a></li>';
    echo '<li class="menu-item menu-hidden"><a href="' . esc_url( home_url( '/pdf-library/' ) ) . '">PDF Library</a></li>';
    echo '</ul>';
}

/**
 * Add Preconnect for Google Fonts
 */
function aartistotram_resource_hints( $urls, $relation_type ) {
    if ( 'preconnect' === $relation_type ) {
        $urls[] = array(
            'href' => 'https://fonts.googleapis.com',
            'crossorigin' => 'anonymous',
        );
        $urls[] = array(
            'href' => 'https://fonts.gstatic.com',
            'crossorigin' => 'anonymous',
        );
    }
    return $urls;
}
add_filter( 'wp_resource_hints', 'aartistotram_resource_hints', 10, 2 );

/**
 * Add theme color meta
 */
function aartistotram_meta_theme_color() {
    echo '<meta name="theme-color" content="#E63946">' . "\n";
}
add_action( 'wp_head', 'aartistotram_meta_theme_color', 1 );
