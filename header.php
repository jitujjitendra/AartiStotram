<?php
/**
 * Theme Header
 *
 * @package AartiStotram
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Skip to content -->
<a class="skip-link screen-reader-text" href="#main-content"><?php esc_html_e( 'Skip to content', 'aartistotram' ); ?></a>

<!-- Site Header -->
<header id="site-header" class="site-header">
    <div class="header-container">
        <!-- Logo -->
        <div class="site-branding">
            <?php if ( has_custom_logo() ) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-title-link">
                    <span class="site-logo-icon">&#x1F549;</span>
                    <span class="site-title"><?php bloginfo( 'name' ); ?></span>
                </a>
            <?php endif; ?>
        </div>

        <!-- Navigation -->
        <nav id="primary-navigation" class="primary-navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'aartistotram' ); ?>">
            <?php
            if ( has_nav_menu( 'primary' ) ) {
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'nav-menu',
                    'container'      => false,
                    'fallback_cb'    => 'aartistotram_fallback_menu',
                    'walker'         => new AartiStotram_Nav_Walker(),
                ) );
            } else {
                aartistotram_fallback_menu();
            }
            ?>
        </nav>

        <!-- Header Actions -->
        <div class="header-actions">
            <!-- Search Toggle -->
            <button class="search-toggle" aria-label="<?php esc_attr_e( 'Open Search', 'aartistotram' ); ?>" type="button">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </button>

            <!-- Mobile Menu Toggle -->
            <button class="mobile-menu-toggle" aria-label="<?php esc_attr_e( 'Toggle Menu', 'aartistotram' ); ?>" type="button" aria-expanded="false">
                <span class="hamburger">
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                </span>
            </button>
        </div>
    </div>

    <!-- Search Overlay -->
    <div class="search-overlay" id="search-overlay" aria-hidden="true">
        <div class="search-overlay-inner">
            <form role="search" method="get" class="search-overlay-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <input type="search" class="search-overlay-input" placeholder="<?php esc_attr_e( 'Search prayers, aartis, mantras...', 'aartistotram' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                <button type="submit" class="search-overlay-submit">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </button>
            </form>
            <button class="search-overlay-close" type="button" aria-label="<?php esc_attr_e( 'Close Search', 'aartistotram' ); ?>">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
        </div>
    </div>
</header>

<!-- Mobile Navigation Drawer -->
<div class="mobile-nav-drawer" id="mobile-nav-drawer" aria-hidden="true">
    <div class="mobile-nav-header">
        <span class="mobile-nav-title"><?php bloginfo( 'name' ); ?></span>
        <button class="mobile-nav-close" type="button" aria-label="<?php esc_attr_e( 'Close Menu', 'aartistotram' ); ?>">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>
    </div>
    <nav class="mobile-nav-menu">
        <?php
        if ( has_nav_menu( 'primary' ) ) {
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'menu_class'     => 'mobile-menu-list',
                'container'      => false,
                'fallback_cb'    => 'aartistotram_fallback_menu',
            ) );
        } else {
            aartistotram_fallback_menu();
        }
        ?>
    </nav>
</div>
<div class="mobile-nav-overlay" id="mobile-nav-overlay"></div>

<main id="main-content" class="site-main">
