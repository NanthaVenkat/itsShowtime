<footer class="bg-[#121212] text-white pt-16 pb-8 mt-20">
    <div class="container mx-auto px-4 lg:px-10 grid grid-cols-1 md:grid-cols-2 gap-12">
        <div>
            <?php if (is_active_sidebar('footer-widgets')):
                dynamic_sidebar('footer-widgets');
            endif; ?>
        </div>
        <div>
            <p>Subscribe to our newsletter </p>
        </div>
        <div class="flex gap-12">
            <div>
                <?php
                $menu_name = __('Quick Links', 'nks-theme');
                $locations = get_nav_menu_locations();
                if (!empty($locations['footer'])) {
                    $menu_obj = wp_get_nav_menu_object($locations['footer']);
                    if ($menu_obj && !empty($menu_obj->name)) {
                        $menu_name = $menu_obj->name;
                    }
                }
                ?>
                <h3 class="text-lg font-semibold mb-4"><?php echo esc_html($menu_name); ?></h3>
                <?php wp_nav_menu(['theme_location' => 'footer', 'container' => false, 'menu_class' => 'space-y-2 text-gray-400']); ?>
            </div>

            <div>
                <?php if (is_active_sidebar('footer-social')):
                    dynamic_sidebar('footer-social');
                endif; ?>
            </div>
        </div>

        <!-- <div>
            <h3 class="text-xl font-bold mb-4"><`?php bloginfo('name'); ?></h3>
            <p class="text-gray-400"><`?php bloginfo('description'); ?></p>
        </div> -->

    </div>
    <div class="container mx-auto px-4 lg:px-10 mt-12 text-sm">
        &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>