<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <?php $is_front_page = is_front_page(); ?>
    <header class="nks-header <?php echo $is_front_page ? 'nks-header--transparent' : ''; ?>">
        <div class="nks-shell nks-header__inner">
            <div class="nks-brand">
                <?php if (has_custom_logo()) {
                    the_custom_logo();
                } else { ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="nks-brand__text"><?php bloginfo('name'); ?></a>
                <?php } ?>
            </div>

            <nav class="nks-nav" aria-label="Primary Navigation">
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'nks-nav__list',
                    'fallback_cb'    => false,
                ]);
                ?>
            </nav>

            <button class="nks-mobile-toggle" id="nks-mobile-toggle" type="button" aria-label="Open Menu" aria-expanded="false" aria-controls="nks-mobile-menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>

        <div class="nks-mobile-menu" id="nks-mobile-menu">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'nks-mobile-menu__list',
                'fallback_cb'    => false,
            ]);
            ?>
        </div>
    </header>