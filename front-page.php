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
        <div class="hero-badge">Divine Prayers</div>
        <h1 class="hero-title">Discover Divine Prayers &amp; Sacred Texts</h1>
        <p class="hero-subtitle">Explore our collection of Aartis, Stotras, Chalisa, Mantras and more for your daily spiritual practice</p>
        <form role="search" method="get" class="hero-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <div class="hero-search-wrapper">
                <svg class="hero-search-icon" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                <input type="search" class="hero-search-input" placeholder="Search aarti, chalisa, mantra..." name="s" value="" />
                <button type="submit" class="hero-search-btn">Search</button>
            </div>
        </form>
        <div class="hero-tags">
            <span class="hero-tag-label">Popular:</span>
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
            <span class="section-badge">Daily Inspiration</span>
            <h2 class="section-title">Today's Path</h2>
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
                    <?php echo get_the_post_thumbnail( $post, 'large', array( 'loading' => 'lazy' ) ); ?>
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
                <a href="<?php echo esc_url( get_permalink( $post ) ); ?>" class="btn btn-primary">Read Now &rarr;</a>
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
            <span class="section-badge">Divine Deities</span>
            <h2 class="section-title">Browse by Deity</h2>
        </div>
        <div class="deity-grid">
            <?php
            $deities = array(
                array( 'name' => 'Ganesh', 'icon' => '&#x1F549;', 'slug' => 'ganesh' ),
                array( 'name' => 'Shiv', 'icon' => '&#x1F531;', 'slug' => 'shiv' ),
                array( 'name' => 'Vishnu', 'icon' => '&#x1F549;', 'slug' => 'vishnu' ),
                array( 'name' => 'Hanuman', 'icon' => '&#x1F3F4;', 'slug' => 'hanuman' ),
                array( 'name' => 'Durga', 'icon' => '&#x1F33A;', 'slug' => 'durga' ),
                array( 'name' => 'Lakshmi', 'icon' => '&#x1F33C;', 'slug' => 'lakshmi' ),
                array( 'name' => 'Krishna', 'icon' => '&#x1F3B6;', 'slug' => 'krishna' ),
                array( 'name' => 'Ram', 'icon' => '&#x1F3F9;', 'slug' => 'ram' ),
            );
            foreach ( $deities as $deity ) :
            ?>
            <a href="<?php echo esc_url( home_url( '/tag/' . $deity['slug'] . '/' ) ); ?>" class="deity-card">
                <span class="deity-icon"><?php echo $deity['icon']; ?></span>
                <span class="deity-name"><?php echo esc_html( $deity['name'] ); ?></span>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Explore Collections Section -->
<section class="section collections-section fade-in-section">
    <div class="container">
        <div class="section-header">
            <span class="section-badge">Collections</span>
            <h2 class="section-title">Explore Collections</h2>
        </div>
        <div class="collections-grid">
            <?php
            $collections = array(
                array( 'name' => 'Aartis', 'desc' => 'Divine hymns of praise', 'slug' => 'aarti', 'color' => '#E63946' ),
                array( 'name' => 'Chalisa', 'desc' => '40-verse devotional songs', 'slug' => 'chalisa', 'color' => '#FF6B35' ),
                array( 'name' => 'Stotras', 'desc' => 'Sacred verses and hymns', 'slug' => 'stotra', 'color' => '#FFC300' ),
                array( 'name' => 'Mantras', 'desc' => 'Powerful sacred chants', 'slug' => 'mantra', 'color' => '#2EC4B6' ),
                array( 'name' => 'Vrat Katha', 'desc' => 'Fasting day stories', 'slug' => 'vrat-katha', 'color' => '#9B5DE5' ),
            );
            foreach ( $collections as $col ) :
                $cat = get_category_by_slug( $col['slug'] );
                $count = $cat ? $cat->count : 0;
            ?>
            <a href="<?php echo esc_url( home_url( '/category/' . $col['slug'] . '/' ) ); ?>" class="collection-card" style="--card-accent: <?php echo esc_attr( $col['color'] ); ?>">
                <div class="collection-card-inner">
                    <h3 class="collection-name"><?php echo esc_html( $col['name'] ); ?></h3>
                    <p class="collection-desc"><?php echo esc_html( $col['desc'] ); ?></p>
                    <?php if ( $count ) : ?>
                        <span class="collection-count"><?php echo esc_html( $count ); ?> prayers</span>
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
            <span class="section-badge">Recently Added</span>
            <h2 class="section-title">Latest Prayers</h2>
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
                            <?php echo get_the_post_thumbnail( $post, 'medium', array( 'loading' => 'lazy' ) ); ?>
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
            <span class="section-badge">Blog</span>
            <h2 class="section-title">From Our Blog</h2>
        </div>
        <div class="blog-grid">
            <?php
            $blog_posts = get_posts( array(
                'numberposts' => 3,
                'post_status' => 'publish',
            ) );
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
                <h2 class="newsletter-title">Get Daily Prayers in Your Inbox</h2>
                <p class="newsletter-desc">Subscribe to receive daily aartis, mantras, and spiritual content directly in your email.</p>
                <form class="newsletter-form" action="#" method="post">
                    <input type="email" class="newsletter-input" placeholder="Your email address" required />
                    <button type="submit" class="btn btn-primary newsletter-btn">Subscribe</button>
                </form>
                <p class="newsletter-note">No spam, unsubscribe anytime.</p>
            </div>
        </div>
    </div>
</section>

<!-- Feature Strip -->
<section class="feature-strip fade-in-section">
    <div class="container">
        <div class="feature-strip-grid">
            <div class="feature-item">
                <span class="feature-icon">&#x26A1;</span>
                <span class="feature-text">Fast Loading</span>
            </div>
            <div class="feature-item">
                <span class="feature-icon">&#x1F4FF;</span>
                <span class="feature-text">1000+ Prayers</span>
            </div>
            <div class="feature-item">
                <span class="feature-icon">&#x1F4F1;</span>
                <span class="feature-text">Mobile Friendly</span>
            </div>
            <div class="feature-item">
                <span class="feature-icon">&#x1F50D;</span>
                <span class="feature-text">Easy Search</span>
            </div>
            <div class="feature-item">
                <span class="feature-icon">&#x1F310;</span>
                <span class="feature-text">Hindi &amp; English</span>
            </div>
        </div>
    </div>
</section>

<!-- PDF Library Section (Hidden for future use) -->
<section class="section pdf-library-section hidden-section fade-in-section">
    <div class="container">
        <div class="section-header">
            <span class="section-badge">Downloads</span>
            <h2 class="section-title">PDF Library</h2>
        </div>
        <p class="section-desc">Download prayers in PDF format for offline reading.</p>
        <div class="pdf-grid">
            <div class="pdf-card">
                <div class="pdf-icon">&#x1F4C4;</div>
                <h4>Hanuman Chalisa PDF</h4>
                <a href="#" class="btn btn-outline">Download</a>
            </div>
            <div class="pdf-card">
                <div class="pdf-icon">&#x1F4C4;</div>
                <h4>Ganesh Aarti PDF</h4>
                <a href="#" class="btn btn-outline">Download</a>
            </div>
            <div class="pdf-card">
                <div class="pdf-icon">&#x1F4C4;</div>
                <h4>Shiv Stotram PDF</h4>
                <a href="#" class="btn btn-outline">Download</a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
