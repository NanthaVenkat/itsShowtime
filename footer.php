<section class="py-16">
    <div class="container mx-auto px-4 lg:px-10 grid grid-cols-1 lg:grid-cols-[1fr_2fr] gap-10">
        <div>
            <h3 class="text-primary text-5xl font-semibold mb-3">Let's Talk</h3>
            <p class="text-[#4f4f4f] max-w-sm">Drop your details and project brief. We'll help evaluate the right
                technical direction and execution plan.</p>
        </div>

        <div>
            <h4 class="text-3xl font-semibold mb-5">How can we help you?</h4>

            <form class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="text" placeholder="First Name"
                    class="h-12 rounded border border-[#d8d8d8] px-4 bg-white focus:outline-none focus:border-primary">
                <input type="text" placeholder="Last Name"
                    class="h-12 rounded border border-[#d8d8d8] px-4 bg-white focus:outline-none focus:border-primary">
                <input type="email" placeholder="Email"
                    class="h-12 rounded border border-[#d8d8d8] px-4 bg-white focus:outline-none focus:border-primary">
                <input type="tel" placeholder="Mobile Number"
                    class="h-12 rounded border border-[#d8d8d8] px-4 bg-white focus:outline-none focus:border-primary">
                <textarea rows="5" placeholder="Message"
                    class="md:col-span-2 rounded border border-[#d8d8d8] p-4 bg-white focus:outline-none focus:border-primary"></textarea>
                <button type="submit"
                    class="md:col-span-2 h-12 rounded-lg bg-primary text-white font-medium hover:bg-red-700 transition-colors">
                    Contact Us For Experience Branding
                </button>
            </form>
        </div>
    </div>
</section>

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