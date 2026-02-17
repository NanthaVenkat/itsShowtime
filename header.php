<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-black text-white antialiased font-sans'); ?>>
    <?php wp_body_open(); ?>

    <header id="site-header" class="fixed w-full top-0 z-50 transition-all duration-300 bg-transparent py-4">
        <div class="container mx-auto px-6 lg:px-12 flex justify-between items-center">
            <!-- Logo -->
            <div class="site-logo">
                <?php if (has_custom_logo()) {
                    the_custom_logo();
                } else { ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="nks-brand__text"><?php bloginfo('name'); ?></a>
                <?php } ?>
            </div>

            <!-- Desktop Menu -->
            <nav class="hidden md:flex items-center space-x-10">
                <?php
                $menu_items = [
                    'Home' => home_url('/'),
                    'Gallery' => '#',
                    'Blog' => '#',
                    'About Us' => '#',
                    'Services' => '#',
                ];

                foreach ($menu_items as $name => $link): ?>
                    <a href="<?php echo $link; ?>"
                        class="text-gray-300 hover:text-white text-sm uppercase tracking-widest font-medium transition-colors duration-300 relative group">
                        <?php echo $name; ?>
                        <span
                            class="absolute left-0 bottom-[-4px] w-0 h-[2px] bg-red-600 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                <?php endforeach; ?>
            </nav>

            <!-- CTA Button -->
            <div class="hidden md:block">
                <a href="#"
                    class="bg-red-600 hover:bg-red-700 text-white px-6 py-2.5 rounded-full font-bold uppercase text-xs tracking-wider transition-all duration-300 shadow-lg hover:shadow-red-600/30 transform hover:-translate-y-0.5">
                    Contact Us
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button id="menu-toggle" class="md:hidden text-white focus:outline-none">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu Overlay -->
        <div id="mobile-menu"
            class="fixed inset-0 bg-black/95 z-40 transform translate-x-full transition-transform duration-300 md:hidden flex flex-col justify-center items-center space-y-8">
            <button id="menu-close" class="absolute top-6 right-6 text-white text-4xl">&times;</button>
            <?php foreach ($menu_items as $name => $link): ?>
                <a href="<?php echo $link; ?>"
                    class="text-2xl font-bold uppercase tracking-widest hover:text-red-500 transition-colors">
                    <?php echo $name; ?>
                </a>
            <?php endforeach; ?>
            <a href="#"
                class="bg-red-600 text-white px-8 py-3 rounded-lg font-bold uppercase tracking-wider mt-4">Contact
                Us</a>
        </div>
    </header>