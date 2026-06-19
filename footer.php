<?php
/**
 * Theme Footer
 *
 * @package AartiStotram
 */
?>
</main><!-- #main-content -->

<!-- Footer -->
<footer id="site-footer" class="site-footer">
    <!-- Wave Divider -->
    <div class="footer-wave">
        <svg viewBox="0 0 1440 120" preserveAspectRatio="none">
            <path d="M0,60 C360,120 720,0 1080,60 C1260,90 1380,80 1440,60 L1440,120 L0,120 Z" fill="currentColor"/>
        </svg>
    </div>

    <div class="footer-main">
        <div class="container">
            <div class="footer-grid">
                <!-- About Column -->
                <div class="footer-col footer-about">
                    <div class="footer-logo">
                        <span class="footer-logo-icon">&#x1F549;</span>
                        <span class="footer-logo-text"><?php bloginfo( 'name' ); ?></span>
                    </div>
                    <p class="footer-desc">
                        <?php echo esc_html( get_bloginfo( 'description' ) ?: 'Divine collection of Aartis, Stotras, Chalisa and Mantras for daily spiritual practice.' ); ?>
                    </p>
                </div>

                <!-- Quick Links -->
                <div class="footer-col">
                    <h4 class="footer-heading"><?php esc_html_e( 'Quick Links', 'aartistotram' ); ?></h4>
                    <ul class="footer-links">
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'aartistotram' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/category/aarti/' ) ); ?>"><?php esc_html_e( 'Aartis', 'aartistotram' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/category/chalisa/' ) ); ?>"><?php esc_html_e( 'Chalisa', 'aartistotram' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/category/stotra/' ) ); ?>"><?php esc_html_e( 'Stotras', 'aartistotram' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/category/mantra/' ) ); ?>"><?php esc_html_e( 'Mantras', 'aartistotram' ); ?></a></li>
                    </ul>
                </div>

                <!-- Categories -->
                <div class="footer-col">
                    <h4 class="footer-heading"><?php esc_html_e( 'Categories', 'aartistotram' ); ?></h4>
                    <ul class="footer-links">
                        <li><a href="<?php echo esc_url( home_url( '/category/vrat-katha/' ) ); ?>"><?php esc_html_e( 'Vrat Katha', 'aartistotram' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"><?php esc_html_e( 'Blog', 'aartistotram' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About Us', 'aartistotram' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'aartistotram' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'aartistotram' ); ?></a></li>
                    </ul>
                </div>

                <!-- Contact / Social -->
                <div class="footer-col">
                    <h4 class="footer-heading"><?php esc_html_e( 'Connect', 'aartistotram' ); ?></h4>
                    <p class="footer-contact-text"><?php esc_html_e( 'Follow us for daily prayers and spiritual content.', 'aartistotram' ); ?></p>
                    <div class="footer-social">
                        <a href="#" aria-label="Facebook" class="social-link"><svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg></a>
                        <a href="#" aria-label="Twitter" class="social-link"><svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/></svg></a>
                        <a href="#" aria-label="YouTube" class="social-link"><svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0C.488 3.45.029 5.804 0 12c.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0C23.512 20.55 23.971 18.196 24 12c-.029-6.185-.484-8.549-4.385-8.816zM9 16V8l8 4-8 4z"/></svg></a>
                        <a href="#" aria-label="Instagram" class="social-link"><svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><rect x="2" y="2" width="20" height="20" rx="5" ry="5" fill="none" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="4" fill="none" stroke="currentColor" stroke-width="2"/><circle cx="17.5" cy="6.5" r="1.5"/></svg></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <p class="copyright">&copy; 2025 <?php bloginfo( 'name' ); ?>. All rights reserved.</p>
        </div>
    </div>
</footer>

<!-- Back to Top -->
<button class="back-to-top" id="back-to-top" aria-label="<?php esc_attr_e( 'Back to top', 'aartistotram' ); ?>">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <polyline points="18 15 12 9 6 15"></polyline>
    </svg>
</button>

<?php wp_footer(); ?>
</body>
</html>
