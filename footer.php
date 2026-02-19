<footer class="bg-gray-900 text-white pt-16 pb-8 mt-20">
    <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-12">
        <div>
            <h3 class="text-lg font-semibold mb-4">Quick links </h3>
            <?php wp_nav_menu(['theme_location' => 'footer', 'container' => false, 'menu_class' => 'space-y-2 text-gray-400']); ?>
        </div>

        <div>
            <h3 class="text-xl font-bold mb-4"><?php bloginfo('name'); ?></h3>
            <p class="text-gray-400"><?php bloginfo('description'); ?></p>
        </div>
        <div>
            <?php if (is_active_sidebar('footer-1')):
                dynamic_sidebar('footer-1');
            endif; ?>
        </div>

    </div>
    <div class="container mx-auto px-4 mt-12 pt-8 border-t border-gray-800 text-center text-gray-500 text-sm">
        &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>