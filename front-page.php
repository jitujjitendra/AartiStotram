<?php
/**
 * Front Page Template
 *
 * @package AartiStotram
 */

get_header();
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-particles"></div>
    <div class="hero-content">
        <div class="hero-badge"><?php esc_html_e( 'Divine Prayers', 'aartistotram' ); ?></div>
        <h1 class="hero-title"><?php esc_html_e( 'Discover Divine Prayers & Sacred Texts', 'aartistotram' ); ?></h1>
        <p class="hero-subtitle"><?php esc_html_e( 'Explore our collection of Aartis, Stotras, Chalisa, Mantras and more for your daily spiritual practice', 'aartistotram' ); ?></p>
        <form role="search" method="get" class="hero-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <div class="hero-search-wrapper">
                <svg class="hero-search-icon" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                <input type="search" class="hero-search-input" placeholder="<?php esc_attr_e( 'Search aarti, chalisa, mantra...', 'aartistotram' ); ?>" name="s" value="" />
                <button type="submit" class="hero-search-btn"><?php esc_html_e( 'Search', 'aartistotram' ); ?></button>
            </div>
        </form>
        <div class="hero-tags">
            <span class="hero-tag-label"><?php esc_html_e( 'Popular:', 'aartistotram' ); ?></span>
            <a href="<?php echo esc_url( home_url( '/?s=ganesh+aarti' ) ); ?>" class="hero-tag">Ganesh Aarti</a>
            <a href="<?php echo esc_url( home_url( '/?s=hanuman+chalisa' ) ); ?>" class="hero-tag">Hanuman Chalisa</a>
            <a href="<?php echo esc_url( home_url( '/?s=shiv+stotram' ) ); ?>" class="hero-tag">Shiv Stotram</a>
        </div>
    </div>
    <div class="hero-wave">
        <svg viewBox="0 0 1440 120" preserveAspectRatio="none">
            <path d="M0,80 C480,150 960,10 1440,80 L1440,120 L0,120 Z" fill="#FFF8F0"/>
        </svg>
    </div>
</section>

<!-- Today's Path Section -->
<section class="section todays-path-section fade-in-section">
    <div class="container">
        <div class="section-header">
            <span class="section-badge"><?php esc_html_e( 'Daily Inspiration', 'aartistotram' ); ?></span>
            <h2 class="section-title"><?php esc_html_e( 'Today\'s Path', 'aartistotram' ); ?> <span class="hindi-text">आज का पाठ</span></h2>
        </div>
        <?php
        $today_post = get_posts( array(
            'numberposts' => 1,
            'post_status' => 'publish',
            'orderby'     => 'date',
            'order'       => 'DESC',
        ) );
        if ( $today_post ) :
            $post = $today_post[0];
            setup_postdata( $post );
        ?>
        <div class="todays-path-card">
            <div class="todays-path-image">
                <?php if ( has_post_thumbnail( $post ) ) : ?>
                    <?php echo get_the_post_thumbnail( $post, 'aartistotram-hero', array( 'loading' => 'lazy' ) ); ?>
                <?php else : ?>
                    <div class="todays-path-placeholder">
                        <span>&#x1F549;</span>
                    </div>
                <?php endif; ?>
            </div>
            <div class="todays-path-content">
                <?php
                $cats = get_the_category( $post->ID );
                if ( $cats ) :
                ?>
                    <span class="todays-path-category"><?php echo esc_html( $cats[0]->name ); ?></span>
                <?php endif; ?>
                <h3 class="todays-path-title">
                    <a href="<?php echo esc_url( get_permalink( $post ) ); ?>"><?php echo esc_html( get_the_title( $post ) ); ?></a>
                </h3>
                <p class="todays-path-excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt( $post ), 30 ) ); ?></p>
                <a href="<?php echo esc_url( get_permalink( $post ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'Read Now', 'aartistotram' ); ?> &rarr;</a>
            </div>
        </div>
        <?php
            wp_reset_postdata();
        endif;
        ?>
    </div>
</section>

<!-- Browse by Deity Section -->
<section class="section deity-section fade-in-section">
    <div class="container">
        <div class="section-header">
            <span class="section-badge"><?php esc_html_e( 'Divine Deities', 'aartistotram' ); ?></span>
            <h2 class="section-title"><?php esc_html_e( 'Browse by Deity', 'aartistotram' ); ?> <span class="hindi-text">देवी-देवता</span></h2>
        </div>
        <div class="deity-grid">
            <?php
            $deities = array(
                array( 'name' => 'Ganesh', 'hindi' => 'गणेश', 'icon' => '🙏', 'slug' => 'ganesh' ),
                array( 'name' => 'Shiv', 'hindi' => 'शिव', 'icon' => '🔱', 'slug' => 'shiv' ),
                array( 'name' => 'Vishnu', 'hindi' => 'विष्णु', 'icon' => '🕉️', 'slug' => 'vishnu' ),
                array( 'name' => 'Hanuman', 'hindi' => 'हनुमान', 'icon' => '🚩', 'slug' => 'hanuman' ),
                array( 'name' => 'Durga', 'hindi' => 'दुर्गा', 'icon' => '🌺', 'slug' => 'durga' ),
                array( 'name' => 'Lakshmi', 'hindi' => 'लक्ष्मी', 'icon' => '🪷', 'slug' => 'lakshmi' ),
                array( 'name' => 'Krishna', 'hindi' => 'कृष्ण', 'icon' => '🦚', 'slug' => 'krishna' ),
                array( 'name' => 'Ram', 'hindi' => 'राम', 'icon' => '🏹', 'slug' => 'ram' ),
            );
            foreach ( $deities as $deity ) :
            ?>
            <a href="<?php echo esc_url( home_url( '/tag/' . $deity['slug'] . '/' ) ); ?>" class="deity-card">
                <span class="deity-icon"><?php echo $deity['icon']; ?></span>
                <span class="deity-name"><?php echo esc_html( $deity['name'] ); ?></span>
                <span class="deity-hindi"><?php echo esc_html( $deity['hindi'] ); ?></span>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Explore Collections Section -->
<section class="section collections-section fade-in-section">
    <div class="container">
        <div class="section-header">
            <span class="section-badge"><?php esc_html_e( 'Collections', 'aartistotram' ); ?></span>
            <h2 class="section-title"><?php esc_html_e( 'Explore Collections', 'aartistotram' ); ?> <span class="hindi-text">संग्रह</span></h2>
        </div>
        <div class="collections-grid">
            <?php
            $collections = array(
                array( 'name' => 'Aartis', 'hindi' => 'आरती', 'desc' => 'Divine hymns of praise', 'slug' => 'aarti', 'color' => '#E63946' ),
                array( 'name' => 'Chalisa', 'hindi' => 'चालीसा', 'desc' => '40-verse devotional songs', 'slug' => 'chalisa', 'color' => '#FF6B35' ),
                array( 'name' => 'Stotras', 'hindi' => 'स्तोत्र', 'desc' => 'Sacred verses and hymns', 'slug' => 'stotra', 'color' => '#FFC300' ),
                array( 'name' => 'Mantras', 'hindi' => 'मंत्र', 'desc' => 'Powerful sacred chants', 'slug' => 'mantra', 'color' => '#2EC4B6' ),
                array( 'name' => 'Vrat Katha', 'hindi' => 'व्रत कथा', 'desc' => 'Fasting day stories', 'slug' => 'vrat-katha', 'color' => '#9B5DE5' ),
            );
            foreach ( $collections as $col ) :
                $cat = get_category_by_slug( $col['slug'] );
                $count = $cat ? $cat->count : 0;
            ?>
            <a href="<?php echo esc_url( home_url( '/category/' . $col['slug'] . '/' ) ); ?>" class="collection-card" style="--card-accent: <?php echo esc_attr( $col['color'] ); ?>">
                <div class="collection-card-inner">
                    <span class="collection-hindi"><?php echo esc_html( $col['hindi'] ); ?></span>
                    <h3 class="collection-name"><?php echo esc_html( $col['name'] ); ?></h3>
                    <p class="collection-desc"><?php echo esc_html( $col['desc'] ); ?></p>
                    <?php if ( $count ) : ?>
                        <span class="collection-count"><?php echo esc_html( $count ); ?> <?php esc_html_e( 'prayers', 'aartistotram' ); ?></span>
                    <?php endif; ?>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Latest Prayers Section -->
<section class="section latest-section fade-in-section">
    <div class="container">
        <div class="section-header">
            <span class="section-badge"><?php esc_html_e( 'Recently Added', 'aartistotram' ); ?></span>
            <h2 class="section-title"><?php esc_html_e( 'Latest Prayers', 'aartistotram' ); ?> <span class="hindi-text">नवीनतम</span></h2>
        </div>
        <div class="posts-grid">
            <?php
            $latest = get_posts( array(
                'numberposts' => 6,
                'post_status' => 'publish',
                'orderby'     => 'date',
                'order'       => 'DESC',
                'offset'      => 1,
            ) );
            foreach ( $latest as $post ) :
                setup_postdata( $post );
            ?>
            <article class="post-card">
                <div class="post-card-image">
                    <?php if ( has_post_thumbnail( $post ) ) : ?>
                        <a href="<?php echo esc_url( get_permalink( $post ) ); ?>">
                            <?php echo get_the_post_thumbnail( $post, 'aartistotram-card', array( 'loading' => 'lazy' ) ); ?>
                        </a>
                    <?php else : ?>
                        <a href="<?php echo esc_url( get_permalink( $post ) ); ?>" class="post-card-placeholder">
                            <span>&#x1F549;</span>
                        </a>
                    <?php endif; ?>
                    <?php
                    $cats = get_the_category( $post->ID );
                    if ( $cats ) :
                    ?>
                        <span class="post-card-badge"><?php echo esc_html( $cats[0]->name ); ?></span>
                    <?php endif; ?>
                </div>
                <div class="post-card-body">
                    <h3 class="post-card-title">
                        <a href="<?php echo esc_url( get_permalink( $post ) ); ?>"><?php echo esc_html( get_the_title( $post ) ); ?></a>
                    </h3>
                    <p class="post-card-excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt( $post ), 15 ) ); ?></p>
                </div>
            </article>
            <?php endforeach; wp_reset_postdata(); ?>
        </div>
    </div>
</section>

<!-- From Our Blog Section -->
<section class="section blog-section fade-in-section">
    <div class="container">
        <div class="section-header">
            <span class="section-badge"><?php esc_html_e( 'Blog', 'aartistotram' ); ?></span>
            <h2 class="section-title"><?php esc_html_e( 'From Our Blog', 'aartistotram' ); ?> <span class="hindi-text">ब्लॉग</span></h2>
        </div>
        <div class="blog-grid">
            <?php
            $blog_cat = get_category_by_slug( 'blog' );
            $blog_args = array(
                'numberposts' => 3,
                'post_status' => 'publish',
            );
            if ( $blog_cat ) {
                $blog_args['category'] = $blog_cat->term_id;
            }
            $blog_posts = get_posts( $blog_args );
            if ( ! $blog_posts ) {
                $blog_posts = get_posts( array( 'numberposts' => 3, 'post_status' => 'publish' ) );
            }
            foreach ( $blog_posts as $post ) :
                setup_postdata( $post );
            ?>
            <article class="blog-card">
                <div class="blog-card-image">
                    <?php if ( has_post_thumbnail( $post ) ) : ?>
                        <a href="<?php echo esc_url( get_permalink( $post ) ); ?>">
                            <?php echo get_the_post_thumbnail( $post, 'medium', array( 'loading' => 'lazy' ) ); ?>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="blog-card-body">
                    <span class="blog-card-date"><?php echo esc_html( get_the_date( 'M d, Y', $post ) ); ?></span>
                    <h3 class="blog-card-title">
                        <a href="<?php echo esc_url( get_permalink( $post ) ); ?>"><?php echo esc_html( get_the_title( $post ) ); ?></a>
                    </h3>
                    <p class="blog-card-excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt( $post ), 20 ) ); ?></p>
                </div>
            </article>
            <?php endforeach; wp_reset_postdata(); ?>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="section newsletter-section fade-in-section">
    <div class="container">
        <div class="newsletter-card">
            <div class="newsletter-content">
                <h2 class="newsletter-title"><?php esc_html_e( 'Get Daily Prayers in Your Inbox', 'aartistotram' ); ?></h2>
                <p class="newsletter-desc"><?php esc_html_e( 'Subscribe to receive daily aartis, mantras, and spiritual content directly in your email.', 'aartistotram' ); ?></p>
                <form class="newsletter-form" action="#" method="post">
                    <input type="email" class="newsletter-input" placeholder="<?php esc_attr_e( 'Your email address', 'aartistotram' ); ?>" required />
                    <button type="submit" class="btn btn-primary newsletter-btn"><?php esc_html_e( 'Subscribe', 'aartistotram' ); ?></button>
                </form>
                <p class="newsletter-note"><?php esc_html_e( 'No spam, unsubscribe anytime.', 'aartistotram' ); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Feature Strip -->
<section class="feature-strip fade-in-section">
    <div class="container">
        <div class="feature-strip-grid">
            <div class="feature-item">
                <span class="feature-icon">⚡</span>
                <span class="feature-text"><?php esc_html_e( 'Fast Loading', 'aartistotram' ); ?></span>
            </div>
            <div class="feature-item">
                <span class="feature-icon">📿</span>
                <span class="feature-text"><?php esc_html_e( '1000+ Prayers', 'aartistotram' ); ?></span>
            </div>
            <div class="feature-item">
                <span class="feature-icon">📱</span>
                <span class="feature-text"><?php esc_html_e( 'Mobile Friendly', 'aartistotram' ); ?></span>
            </div>
            <div class="feature-item">
                <span class="feature-icon">🔍</span>
                <span class="feature-text"><?php esc_html_e( 'Easy Search', 'aartistotram' ); ?></span>
            </div>
            <div class="feature-item">
                <span class="feature-icon">🌐</span>
                <span class="feature-text"><?php esc_html_e( 'Hindi & English', 'aartistotram' ); ?></span>
            </div>
        </div>
    </div>
</section>

<!-- PDF Library Section (Hidden for future use) -->
<section class="section pdf-library-section hidden-section fade-in-section">
    <div class="container">
        <div class="section-header">
            <span class="section-badge"><?php esc_html_e( 'Downloads', 'aartistotram' ); ?></span>
            <h2 class="section-title"><?php esc_html_e( 'PDF Library', 'aartistotram' ); ?> <span class="hindi-text">PDF पुस्तकालय</span></h2>
        </div>
        <p class="section-desc"><?php esc_html_e( 'Download prayers in PDF format for offline reading.', 'aartistotram' ); ?></p>
        <div class="pdf-grid">
            <!-- PDF items will be dynamically loaded when enabled -->
            <div class="pdf-card">
                <div class="pdf-icon">📄</div>
                <h4><?php esc_html_e( 'Hanuman Chalisa PDF', 'aartistotram' ); ?></h4>
                <a href="#" class="btn btn-outline"><?php esc_html_e( 'Download', 'aartistotram' ); ?></a>
            </div>
            <div class="pdf-card">
                <div class="pdf-icon">📄</div>
                <h4><?php esc_html_e( 'Ganesh Aarti PDF', 'aartistotram' ); ?></h4>
                <a href="#" class="btn btn-outline"><?php esc_html_e( 'Download', 'aartistotram' ); ?></a>
            </div>
            <div class="pdf-card">
                <div class="pdf-icon">📄</div>
                <h4><?php esc_html_e( 'Shiv Stotram PDF', 'aartistotram' ); ?></h4>
                <a href="#" class="btn btn-outline"><?php esc_html_e( 'Download', 'aartistotram' ); ?></a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
