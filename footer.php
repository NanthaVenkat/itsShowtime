<?php
$form_shortcode = get_theme_mod('nks_footer_form_shortcode', '[wpforms id="1" title="false" description="false"]');
?>

<footer class="nks-footer">
    <div class="nks-shell nks-footer__grid">
        <div>
            <p class="nks-footer__label">How to reach us</p>
            <h2 class="nks-footer__title">Build your next campaign with us</h2>
            <p class="nks-footer__meta">Email: hello@showtime.com</p>
            <p class="nks-footer__meta">Phone: +91 98765 43210</p>
        </div>

        <div>
            <p class="nks-footer__label">Send us your query</p>
            <div class="nks-footer__form" id="contact">
                <?php
                if (shortcode_exists('wpforms')) {
                    echo do_shortcode($form_shortcode);
                } else {
                    echo '<p class="nks-footer__fallback">Install and activate WPForms, then set your form shortcode in Customizer key: nks_footer_form_shortcode.</p>';
                }
                ?>
            </div>
        </div>

        <div>
            <p class="nks-footer__label">Quick links</p>
            <?php
            wp_nav_menu([
                'theme_location' => 'footer',
                'container'      => false,
                'menu_class'     => 'nks-footer__menu',
                'fallback_cb'    => false,
            ]);
            ?>
        </div>
    </div>

    <div class="nks-shell nks-footer__bottom">
        <p>&copy; <?php echo esc_html(wp_date('Y')); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>