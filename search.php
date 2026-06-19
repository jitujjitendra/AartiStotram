<?php
/**
 * Search Results Template
 *
 * @package AartiStotram
 */

get_header();
?>

<div class="search-hero">
    <div class="container">
        <?php aartistotram_breadcrumbs(); ?>
        <h1 class="search-title">
            <?php
            printf(
                esc_html__( 'Search Results for: %s', 'aartistotram' ),
                '<span>' . esc_html( get_search_query() ) . '</span>'
            );
            ?>
        </h1>
        <!-- Search Again -->
        <form role="search" method="get" class="search-again-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <input type="search" class="search-again-input" value="<?php echo get_search_query(); ?>" name="s" placeholder="<?php esc_attr_e( 'Search again...', 'aartistotram' ); ?>" />
            <button type="submit" class="btn btn-primary"><?php esc_html_e( 'Search', 'aartistotram' ); ?></button>
        </form>
    </div>
</div>

<div class="content-area">
    <div class="container">
        <?php if ( have_posts() ) : ?>
        <p class="results-count">
            <?php
            global $wp_query;
            printf(
                esc_html( _n( '%s result found', '%s results found', $wp_query->found_posts, 'aartistotram' ) ),
                esc_html( number_format_i18n( $wp_query->found_posts ) )
            );
            ?>
        </p>
        <div class="posts-grid">
            <?php while ( have_posts() ) : the_post(); ?>
            <article <?php post_class( 'post-card' ); ?>>
                <div class="post-card-image">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail( 'aartistotram-card', array( 'loading' => 'lazy' ) ); ?>
                        </a>
                    <?php else : ?>
                        <a href="<?php the_permalink(); ?>" class="post-card-placeholder"><span>&#x1F549;</span></a>
                    <?php endif; ?>
                </div>
                <div class="post-card-body">
                    <h2 class="post-card-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <p class="post-card-excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 15 ) ); ?></p>
                </div>
            </article>
            <?php endwhile; ?>
        </div>

        <nav class="pagination-nav">
            <?php
            the_posts_pagination( array(
                'mid_size'  => 2,
                'prev_text' => '&larr; Previous',
                'next_text' => 'Next &rarr;',
            ) );
            ?>
        </nav>

        <?php else : ?>
        <div class="no-results">
            <div class="no-results-icon">🔍</div>
            <h2><?php esc_html_e( 'No results found', 'aartistotram' ); ?></h2>
            <p><?php esc_html_e( 'Sorry, we couldn\'t find what you were looking for. Try different keywords.', 'aartistotram' ); ?></p>
            <div class="no-results-suggestions">
                <h3><?php esc_html_e( 'Popular Searches:', 'aartistotram' ); ?></h3>
                <div class="suggestion-tags">
                    <a href="<?php echo esc_url( home_url( '/?s=aarti' ) ); ?>" class="hero-tag">Aarti</a>
                    <a href="<?php echo esc_url( home_url( '/?s=chalisa' ) ); ?>" class="hero-tag">Chalisa</a>
                    <a href="<?php echo esc_url( home_url( '/?s=mantra' ) ); ?>" class="hero-tag">Mantra</a>
                    <a href="<?php echo esc_url( home_url( '/?s=hanuman' ) ); ?>" class="hero-tag">Hanuman</a>
                    <a href="<?php echo esc_url( home_url( '/?s=ganesh' ) ); ?>" class="hero-tag">Ganesh</a>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
