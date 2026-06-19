<?php
/**
 * Category Template
 *
 * @package AartiStotram
 */

get_header();
$category = get_queried_object();
?>

<div class="category-hero">
    <div class="container">
        <?php aartistotram_breadcrumbs(); ?>
        <h1 class="category-title"><?php single_cat_title(); ?></h1>
        <?php if ( category_description() ) : ?>
            <div class="category-description"><?php echo category_description(); ?></div>
        <?php endif; ?>
        <span class="category-count">
            <?php
            printf(
                esc_html( _n( '%s Prayer', '%s Prayers', $category->count, 'aartistotram' ) ),
                esc_html( number_format_i18n( $category->count ) )
            );
            ?>
        </span>
    </div>
</div>

<div class="content-area">
    <div class="container">
        <?php if ( have_posts() ) : ?>
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
                    <a href="<?php the_permalink(); ?>" class="post-card-link"><?php esc_html_e( 'Read More', 'aartistotram' ); ?> &rarr;</a>
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
            <h2><?php esc_html_e( 'No prayers found in this category', 'aartistotram' ); ?></h2>
            <p><?php esc_html_e( 'Please check back soon or try searching.', 'aartistotram' ); ?></p>
            <?php get_search_form(); ?>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
