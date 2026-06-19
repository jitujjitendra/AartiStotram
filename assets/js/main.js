/**
 * AartiStotram Theme - Main JavaScript
 * 
 * @package AartiStotram
 * @version 1.0.0
 */

(function () {
    'use strict';

    // DOM Ready
    document.addEventListener('DOMContentLoaded', function () {
        initStickyHeader();
        initMobileMenu();
        initSearchOverlay();
        initBackToTop();
        initScrollAnimations();
        initSmoothScroll();
    });

    /**
     * Sticky Header
     */
    function initStickyHeader() {
        const header = document.getElementById('site-header');
        if (!header) return;

        let lastScroll = 0;
        const scrollThreshold = 80;

        window.addEventListener('scroll', function () {
            const currentScroll = window.pageYOffset;

            if (currentScroll > scrollThreshold) {
                header.classList.add('header-sticky');
            } else {
                header.classList.remove('header-sticky');
            }

            if (currentScroll > lastScroll && currentScroll > 300) {
                header.classList.add('header-hidden');
            } else {
                header.classList.remove('header-hidden');
            }

            lastScroll = currentScroll;
        }, { passive: true });
    }

    /**
     * Mobile Menu
     */
    function initMobileMenu() {
        const toggle = document.querySelector('.mobile-menu-toggle');
        const drawer = document.getElementById('mobile-nav-drawer');
        const overlay = document.getElementById('mobile-nav-overlay');
        const closeBtn = document.querySelector('.mobile-nav-close');

        if (!toggle || !drawer) return;

        function openMenu() {
            drawer.classList.add('active');
            overlay.classList.add('active');
            toggle.setAttribute('aria-expanded', 'true');
            drawer.setAttribute('aria-hidden', 'false');
            document.body.style.overflow = 'hidden';
        }

        function closeMenu() {
            drawer.classList.remove('active');
            overlay.classList.remove('active');
            toggle.setAttribute('aria-expanded', 'false');
            drawer.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';
        }

        toggle.addEventListener('click', openMenu);
        if (closeBtn) closeBtn.addEventListener('click', closeMenu);
        if (overlay) overlay.addEventListener('click', closeMenu);

        // Close on ESC
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && drawer.classList.contains('active')) {
                closeMenu();
            }
        });
    }

    /**
     * Search Overlay
     */
    function initSearchOverlay() {
        const toggleBtns = document.querySelectorAll('.search-toggle');
        const overlay = document.getElementById('search-overlay');
        const closeBtn = document.querySelector('.search-overlay-close');
        const input = document.querySelector('.search-overlay-input');

        if (!overlay) return;

        function openSearch() {
            overlay.classList.add('active');
            overlay.setAttribute('aria-hidden', 'false');
            document.body.style.overflow = 'hidden';
            if (input) {
                setTimeout(function () { input.focus(); }, 200);
            }
        }

        function closeSearch() {
            overlay.classList.remove('active');
            overlay.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';
        }

        toggleBtns.forEach(function (btn) {
            btn.addEventListener('click', openSearch);
        });

        if (closeBtn) closeBtn.addEventListener('click', closeSearch);

        // Close on ESC
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && overlay.classList.contains('active')) {
                closeSearch();
            }
        });
    }

    /**
     * Back to Top Button
     */
    function initBackToTop() {
        const btn = document.getElementById('back-to-top');
        if (!btn) return;

        window.addEventListener('scroll', function () {
            if (window.pageYOffset > 500) {
                btn.classList.add('visible');
            } else {
                btn.classList.remove('visible');
            }
        }, { passive: true });

        btn.addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    /**
     * Scroll Animations (IntersectionObserver)
     */
    function initScrollAnimations() {
        const elements = document.querySelectorAll('.fade-in-section');
        if (!elements.length) return;

        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });

            elements.forEach(function (el) {
                observer.observe(el);
            });
        } else {
            // Fallback: show all
            elements.forEach(function (el) {
                el.classList.add('is-visible');
            });
        }
    }

    /**
     * Smooth Scroll for anchor links
     */
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(function (link) {
            link.addEventListener('click', function (e) {
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    }

})();
