<?php
/**
 * Single Post Template
 *
 * @package AartiStotram
 */

get_header();
?>

<div class="single-hero">
    <div class="container">
        <?php aartistotram_breadcrumbs(); ?>
    </div>
</div>

<div class="content-area">
    <div class="container">
        <div class="content-layout">
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'single-article' ); ?>>
                <?php while ( have_posts() ) : the_post(); ?>

                <header class="entry-header">
                    <?php
                    $categories = get_the_category();
                    if ( $categories ) :
                    ?>
                    <div class="entry-categories">
                        <?php foreach ( $categories as $cat ) : ?>
                            <a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>" class="entry-category-badge"><?php echo esc_html( $cat->name ); ?></a>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                    <h1 class="entry-title"><?php the_title(); ?></h1>

                    <div class="entry-meta">
                        <span class="entry-date">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                            <?php echo esc_html( get_the_date() ); ?>
                        </span>
                        <span class="entry-reading-time">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                            <?php
                            $content = get_the_content();
                            $word_count = str_word_count( strip_tags( $content ) );
                            $reading_time = max( 1, ceil( $word_count / 200 ) );
                            echo esc_html( $reading_time . ' min read' );
                            ?>
                        </span>
                    </div>
                </header>

                <?php if ( has_post_thumbnail() ) : ?>
                <div class="entry-thumbnail">
                    <?php the_post_thumbnail( 'large', array( 'loading' => 'lazy' ) ); ?>
                </div>
                <?php endif; ?>

                <div class="entry-content prayer-content">
                    <?php the_content(); ?>
                </div>

                <footer class="entry-footer">
                    <?php
                    $tags = get_the_tags();
                    if ( $tags ) :
                    ?>
                    <div class="entry-tags">
                        <span class="tags-label"><?php esc_html_e( 'Tags:', 'aartistotram' ); ?></span>
                        <?php foreach ( $tags as $tag ) : ?>
                            <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" class="entry-tag"><?php echo esc_html( $tag->name ); ?></a>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                    <!-- Share Buttons -->
                    <div class="entry-share">
                        <span class="share-label"><?php esc_html_e( 'Share:', 'aartistotram' ); ?></span>
                        <a href="https://wa.me/?text=<?php echo esc_url( get_permalink() ); ?>" target="_blank" rel="noopener" class="share-btn share-whatsapp" aria-label="Share on WhatsApp">WhatsApp</a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( get_permalink() ); ?>" target="_blank" rel="noopener" class="share-btn share-facebook" aria-label="Share on Facebook">Facebook</a>
                        <a href="https://twitter.com/intent/tweet?url=<?php echo esc_url( get_permalink() ); ?>&text=<?php echo esc_attr( get_the_title() ); ?>" target="_blank" rel="noopener" class="share-btn share-twitter" aria-label="Share on Twitter">Twitter</a>
                    </div>
                </footer>

                <?php endwhile; ?>
            </article>

            <!-- Sidebar -->
            <?php get_sidebar(); ?>
        </div>

        <!-- Related Posts -->
        <?php
        $categories = get_the_category();
        if ( $categories ) :
            $related = get_posts( array(
                'numberposts'  => 4,
                'category__in' => array( $categories[0]->term_id ),
                'post__not_in' => array( get_the_ID() ),
                'post_status'  => 'publish',
            ) );
            if ( $related ) :
        ?>
        <section class="related-posts">
            <h2 class="related-title"><?php esc_html_e( 'Related Prayers', 'aartistotram' ); ?> <span class="hindi-text">संबंधित पाठ</span></h2>
            <div class="posts-grid posts-grid-4">
                <?php foreach ( $related as $post ) : setup_postdata( $post ); ?>
                <article class="post-card post-card-sm">
                    <div class="post-card-image">
                        <?php if ( has_post_thumbnail( $post ) ) : ?>
                            <a href="<?php echo esc_url( get_permalink( $post ) ); ?>">
                                <?php echo get_the_post_thumbnail( $post, 'aartistotram-card', array( 'loading' => 'lazy' ) ); ?>
                            </a>
                        <?php else : ?>
                            <a href="<?php echo esc_url( get_permalink( $post ) ); ?>" class="post-card-placeholder"><span>&#x1F549;</span></a>
                        <?php endif; ?>
                    </div>
                    <div class="post-card-body">
                        <h3 class="post-card-title">
                            <a href="<?php echo esc_url( get_permalink( $post ) ); ?>"><?php echo esc_html( get_the_title( $post ) ); ?></a>
                        </h3>
                    </div>
                </article>
                <?php endforeach; wp_reset_postdata(); ?>
            </div>
        </section>
        <?php endif; endif; ?>
    </div>
</div>

<?php get_footer(); ?>
