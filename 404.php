<?php
/**
 * 404 Page Template
 *
 * @package AartiStotram
 */

get_header();
?>

<div class="error-404-page">
    <div class="container">
        <div class="error-content">
            <div class="error-icon">&#x1F549;</div>
            <h1 class="error-title">404</h1>
            <h2 class="error-subtitle"><?php esc_html_e( 'Page Not Found', 'aartistotram' ); ?></h2>
            <p class="error-desc"><?php esc_html_e( 'The page you are looking for might have been moved or doesn\'t exist. Let us guide you back to the path of devotion.', 'aartistotram' ); ?></p>

            <form role="search" method="get" class="error-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <input type="search" placeholder="<?php esc_attr_e( 'Search prayers...', 'aartistotram' ); ?>" name="s" class="error-search-input" />
                <button type="submit" class="btn btn-primary"><?php esc_html_e( 'Search', 'aartistotram' ); ?></button>
            </form>

            <div class="error-links">
                <h3><?php esc_html_e( 'Popular Pages:', 'aartistotram' ); ?></h3>
                <ul>
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'aartistotram' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/category/aarti/' ) ); ?>"><?php esc_html_e( 'Aartis', 'aartistotram' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/category/chalisa/' ) ); ?>"><?php esc_html_e( 'Chalisa', 'aartistotram' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/category/stotra/' ) ); ?>"><?php esc_html_e( 'Stotras', 'aartistotram' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/category/mantra/' ) ); ?>"><?php esc_html_e( 'Mantras', 'aartistotram' ); ?></a></li>
                </ul>
            </div>

            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'Go to Homepage', 'aartistotram' ); ?></a>
        </div>
    </div>
</div>

<?php get_footer(); ?>
