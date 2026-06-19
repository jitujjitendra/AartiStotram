<?php
/**
 * Archive Template
 *
 * @package AartiStotram
 */

get_header();
?>

<div class="archive-hero">
    <div class="container">
        <?php aartistotram_breadcrumbs(); ?>
        <h1 class="archive-title">
            <?php
            if ( is_category() ) {
                single_cat_title();
            } elseif ( is_tag() ) {
                single_tag_title();
            } elseif ( is_author() ) {
                the_archive_title();
            } else {
                the_archive_title();
            }
            ?>
        </h1>
        <?php if ( get_the_archive_description() ) : ?>
            <div class="archive-description"><?php the_archive_description(); ?></div>
        <?php endif; ?>
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
                    <?php
                    $cats = get_the_category();
                    if ( $cats ) :
                    ?>
                        <span class="post-card-badge"><?php echo esc_html( $cats[0]->name ); ?></span>
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

        <!-- Pagination -->
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
            <h2><?php esc_html_e( 'No posts found', 'aartistotram' ); ?></h2>
            <p><?php esc_html_e( 'Try searching for what you need.', 'aartistotram' ); ?></p>
            <?php get_search_form(); ?>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
