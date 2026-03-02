<?php
get_header();

if (!function_exists('nks_normalize_rows')) {
    function nks_normalize_rows($value)
    {
        if (!is_array($value)) {
            return [];
        }

        if ($value === []) {
            return [];
        }

        $keys = array_keys($value);
        $is_list = ($keys === array_keys($keys));

        return $is_list ? $value : [$value];
    }
}

if (!function_exists('nks_resolve_acf_link')) {
    function nks_resolve_acf_link($link_value, $fallback_text = '', $fallback_url = '#')
    {
        $resolved = [
            'url' => $fallback_url,
            'title' => $fallback_text,
            'target' => '_self',
        ];

        if (is_array($link_value)) {
            if (!empty($link_value['url'])) {
                $resolved['url'] = $link_value['url'];
            }
            if (!empty($link_value['title'])) {
                $resolved['title'] = $link_value['title'];
            }
            if (!empty($link_value['target'])) {
                $resolved['target'] = $link_value['target'];
            }

            return $resolved;
        }

        if (is_string($link_value) && $link_value !== '') {
            $resolved['url'] = $link_value;
        }

        return $resolved;
    }
}
?>

<!-- Cinematic Preloader -->
<div id="preloader" class="fixed inset-0 z-[9999] flex items-center justify-center bg-black">
    <div class="preloader-content flex flex-col items-center">
        <div class="preloader-line w-48 h-[2px] bg-white/20 relative overflow-hidden">
            <div class="preloader-progress absolute inset-y-0 left-0 bg-primary w-0"></div>
        </div>
        <div class="preloader-text mt-4 text-white text-xs tracking-[0.3em] font-light uppercase opacity-50">Loading...
        </div>
    </div>
</div>

<main class="w-full relative">

    <!-- Hero Slider Section -->
    <section class="relative h-screen w-full overflow-hidden">
        <div class="swiper myHeroSwiper w-full h-full">
            <div class="swiper-wrapper">
                <?php
                $hero_slides = nks_normalize_rows(get_field('hero_slides'));
                if (!empty($hero_slides)):
                    foreach ($hero_slides as $slide):
                        $bg_image = $slide['slide_bg_image'] ?? '';
                        $badge = $slide['slide_badge'] ?? '';
                        $heading = $slide['slide_heading'] ?? '';
                        $desc = $slide['slide_description'] ?? '';
                        $btn1 = nks_resolve_acf_link(
                            $slide['slide_btn1_link'] ?? '',
                            $slide['slide_btn1_text'] ?? '',
                            '#'
                        );
                        $btn2 = nks_resolve_acf_link(
                            $slide['slide_btn2_link'] ?? '',
                            $slide['slide_btn2_text'] ?? '',
                            '#'
                        );
                        ?>
                        <div class="swiper-slide relative hero-slide overflow-hidden">
                            <!-- Background Layer -->
                            <div class="absolute inset-0 overflow-hidden">
                                <div class="hero-slide__bg bg-cover bg-center w-full h-full"
                                    style="background-image: url('<?php echo esc_url($bg_image); ?>');">
                                </div>
                            </div>
                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-linear-to-t from-black via-black/50 to-transparent z-10"></div>
                            <!-- Content -->
                            <div class="relative h-full w-full flex items-end justify-start z-20 container mx-auto">
                                <div class="max-w-3xl px-6 py-8 lg:px-16 lg:py-18 mb-6">
                                    <?php if ($badge): ?>
                                        <span class="inline-block bg-primary text-white text-md px-3.5 py-1 rounded-lg mb-2.5"
                                            data-hero-anim>
                                            <?php echo esc_html($badge); ?>
                                        </span>
                                    <?php endif; ?>
                                    <?php if ($heading): ?>
                                        <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white leading-tight mb-6 max-w-4xl"
                                            data-hero-anim>
                                            <?php echo esc_html($heading); ?>
                                        </h1>
                                    <?php endif; ?>
                                    <?php if ($desc): ?>
                                        <p class="text-gray-300 text-md sm:text-xl max-w-2xl mb-8" data-hero-anim>
                                            <?php echo esc_html($desc); ?>
                                        </p>
                                    <?php endif; ?>
                                    <?php if (!empty($btn1['title']) || !empty($btn2['title'])): ?>
                                        <div class="flex flex-wrap gap-4" data-hero-anim>
                                            <?php if (!empty($btn1['title'])): ?>
                                                <a href="<?php echo esc_url($btn1['url']); ?>"
                                                    target="<?php echo esc_attr($btn1['target']); ?>"
                                                    <?php echo $btn1['target'] === '_blank' ? 'rel="noopener noreferrer"' : ''; ?>
                                                    class="inline-block rounded-lg bg-white border border-primary text-primary hover:text-white hover:bg-primary p-2 font-medium transition-all text-sm sm:text-md">
                                                    <?php echo esc_html($btn1['title']); ?>
                                                </a>
                                            <?php endif; ?>
                                            <?php if (!empty($btn2['title'])): ?>
                                                <a href="<?php echo esc_url($btn2['url']); ?>"
                                                    target="<?php echo esc_attr($btn2['target']); ?>"
                                                    <?php echo $btn2['target'] === '_blank' ? 'rel="noopener noreferrer"' : ''; ?>
                                                    class="inline-block rounded-lg bg-primary text-white border-primary hover:bg-white hover:text-primary p-2 font-medium transition-all text-sm sm:text-md">
                                                    <?php echo esc_html($btn2['title']); ?>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; endif; ?>
            </div>
        </div>
    </section>

    <!-- map section — untouched -->
    <section class="py-16 bg-white overflow-hidden">
        <div class="container mx-auto">
            <h2 class="text-primary text-4xl lg:text-6xl font-medium text-center">Driving millions of impressions</h2>
            <h2 class="text-4xl lg:text-6xl font-medium text-center">through immersive Experiences </h2>

            <p class="text-center text-lg lg:text-2xl mt-7 mx-auto max-w-lg font-medium mb-12">Book your slot for the
                next event and let your brand shine in front of millions nationwide.</p>

            <div class="relative max-w-5xl mx-auto">
                <div id="india-map-chart" class="w-full h-[600px] md:h-[800px]"></div>

                <!-- Custom state Detail box (Figma Style) -->
                <div id="state-detail-box"
                    class="absolute pointer-events-none opacity-0 z-50 bg-[#FDF8F8] border border-primary/30 p-6 rounded-2xl shadow-xl transition-all duration-300 min-w-[300px]">
                    <h3 id="detail-state-name" class="text-primary text-3xl font-bold mb-3">State Name</h3>
                    <p id="detail-state-desc" class="text-gray-700 text-sm mb-4 leading-relaxed">Book your slot for the
                        next event and let your brand shine in front of millions nationwide.</p>
                    <p id="detail-state-value" class="text-primary text-4xl font-bold">1000+</p>
                </div>
            </div>
        </div>
    </section>

    <!-- about section -->
    <section class="py-16 bg-primary text-white">
        <div class="container mx-auto">
            <div class="px-3 sm:px-5 lg:px-10">
                <h2 class="border border-white rounded-full inline-block px-3 py-1.5 mb-5">About</h2>
                <div class="grid lg:grid-cols-[500px_auto] mb-20">
                    <div class="mb-5 lg:mb-0">
                        <h4 class="font-semibold text-3xl md:text-4xl">
                            <?php echo esc_html(get_field('about_heading')); ?>
                        </h4>
                    </div>
                    <div>
                        <p class="font-medium text-md md:text-xl">
                            <?php echo esc_html(get_field('about_description')); ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-4 sm:px-5 lg:px-10">
                <?php
                $about_images = nks_normalize_rows(get_field('about_images'));
                if (!empty($about_images)):
                    foreach ($about_images as $item): ?>
                        <img src="<?php echo esc_url($item['about_image']); ?>"
                            alt="<?php echo esc_attr($item['about_image_alt'] ?? 'About image'); ?>"
                            class="w-full h-[580px] object-cover object-center">
                    <?php endforeach;
                endif; ?>
            </div>
        </div>
    </section>

    <!-- Mission Vision -->
    <section class="py-16 h-screen">
        <div class="container h-full px-3 sm:px-5 lg:px-10 mx-auto mission-vision" id="mission-vision">
            <?php
            $mission_images = nks_normalize_rows(get_field('mission_images'));
            $vision_images = nks_normalize_rows(get_field('vision_images'));
            $first_main_img = '';
            if (!empty($mission_images) && is_array($mission_images[0])) {
                $first_main_img = $mission_images[0]['mission_image'] ?? '';
            }
            ?>
            <div class="grid lg:grid-cols-[1fr_1fr_92px] gap-6 lg:gap-8 h-full items-end">
                <div class="mission-vision__media relative overflow-hidden h-[380px] lg:h-full">
                    <img id="mission-vision-main-image" class="w-full h-full object-cover mission-vision__main-image"
                        src="<?php echo esc_url($first_main_img); ?>" alt="Mission and vision visual">
                </div>

                <div class="pb-1">
                    <span
                        class="inline-flex items-center rounded-full border border-gray-300 text-gray-800 px-4 py-2 text-md font-medium mb-6">
                        Our Purpose</span>

                    <div class="flex items-center gap-8 mb-6">
                        <button type="button" class="mission_tab_btn mission-vision__tab-btn mission-vision__tab-btn--active flex items-center gap-2"
                            data-tab-trigger="mission">
                            <svg width="20" height="20" viewBox="0 0 31 31" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M28.6025 8.55042C30.206 11.9041 30.5104 15.733 29.4569 19.2979C28.4035 22.8629 26.0668 25.9112 22.898 27.8547C19.7291 29.7982 15.9527 30.4989 12.2975 29.8217C8.64238 29.1446 5.36763 27.1375 3.1053 24.1878C0.842965 21.2381 -0.246566 17.555 0.046982 13.8493C0.340531 10.1435 1.99635 6.67787 4.69487 4.12118C7.39338 1.56448 10.9433 0.0979919 14.6595 0.00473654C18.3757 -0.0885189 21.9947 1.19807 24.818 3.6162L28.0926 0.3402C28.3094 0.123371 28.6035 0.00155748 28.9101 0.00155748C29.2168 0.00155748 29.5108 0.123371 29.7277 0.3402C29.9445 0.557029 30.0663 0.851113 30.0663 1.15776C30.0663 1.4644 29.9445 1.75848 29.7277 1.97531L15.861 15.842C15.6442 16.0588 15.3501 16.1806 15.0435 16.1806C14.7368 16.1806 14.4427 16.0588 14.2259 15.842C14.0091 15.6251 13.8873 15.3311 13.8873 15.0244C13.8873 14.7178 14.0091 14.4237 14.2259 14.2069L18.2299 10.2029C17.1448 9.4852 15.8492 9.15477 14.5529 9.26506C13.2566 9.37535 12.0354 9.9199 11.0871 10.8106C10.1388 11.7012 9.5189 12.8859 9.32767 14.1727C9.13643 15.4596 9.3851 16.7733 10.0334 17.9013C10.6817 19.0292 11.6918 19.9053 12.9 20.3878C14.1082 20.8703 15.4439 20.9309 16.6908 20.5598C17.9377 20.1887 19.0229 19.4076 19.7707 18.343C20.5185 17.2783 20.8851 15.9925 20.8111 14.6936C20.8026 14.5419 20.824 14.3899 20.8742 14.2465C20.9244 14.103 21.0023 13.9708 21.1036 13.8575C21.2049 13.7442 21.3275 13.6519 21.4644 13.5859C21.6013 13.52 21.7499 13.4816 21.9017 13.4731C22.2081 13.4559 22.5089 13.5611 22.7378 13.7656C22.8512 13.8668 22.9434 13.9894 23.0094 14.1264C23.0754 14.2633 23.1137 14.4119 23.1222 14.5636C23.2276 16.4021 22.7025 18.2215 21.6337 19.7211C20.565 21.2207 19.0165 22.3107 17.2443 22.811C15.4721 23.3113 13.5822 23.192 11.887 22.4727C10.1919 21.7534 8.79284 20.4772 7.92121 18.8551C7.04959 17.233 6.75753 15.362 7.09332 13.5514C7.42911 11.7408 8.37264 10.099 9.76796 8.89727C11.1633 7.69557 12.9269 7.00593 14.7673 6.94234C16.6076 6.87875 18.4146 7.44501 19.8896 8.54753L23.1757 5.26142C20.7675 3.26202 17.7055 2.22283 14.5778 2.34346C11.4502 2.4641 8.47732 3.73603 6.2303 5.91498C3.98328 8.09394 2.62052 11.0263 2.40376 14.1487C2.187 17.2712 3.13153 20.3637 5.05593 22.8322C6.98033 25.3008 9.74891 26.9713 12.8299 27.5229C15.9109 28.0745 19.0871 27.4684 21.7485 25.8209C24.4098 24.1734 26.3686 21.6008 27.2487 18.597C28.1288 15.5933 27.8681 12.3703 26.5167 9.54709C26.3845 9.2705 26.3676 8.95273 26.4698 8.6637C26.5719 8.37466 26.7846 8.13803 27.0612 8.00587C27.3378 7.8737 27.6556 7.85682 27.9446 7.95895C28.2337 8.06107 28.4703 8.27383 28.6025 8.55042Z"
                                    fill="#D4D4D4" />
                            </svg>
                            MISSION</button>
                        <button type="button" class="vission_tab_btn mission-vision__tab-btn flex items-center gap-2" data-tab-trigger="vision">
                            <svg width="24" height="24" viewBox="0 0 40 40" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7.38545 27.0785C4.92363 29.1465 4.10303 35.2846 4.10303 35.2846C4.10303 35.2846 10.2412 34.464 12.3091 32.0022C13.4743 30.6236 13.4579 28.5064 12.1614 27.2262C11.5234 26.6174 10.6831 26.2655 9.80168 26.2383C8.92024 26.211 8.05978 26.5103 7.38545 27.0785Z"
                                    stroke="#D4D4D4" stroke-width="2.46182" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M19.6937 24.6165L14.77 19.6929C15.6434 17.4271 16.7431 15.2552 18.0524 13.2101C19.9648 10.1525 22.6275 7.63501 25.7875 5.89704C28.9474 4.15907 32.4995 3.25843 36.1058 3.2808C36.1058 7.7449 34.8256 15.5899 26.2585 21.3341C24.1855 22.645 21.9862 23.7446 19.6937 24.6165Z"
                                    stroke="#D4D4D4" stroke-width="2.46182" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M14.771 19.6893H6.56494C6.56494 19.6893 7.46761 14.7164 9.84736 13.1245C12.5061 11.3519 18.0534 13.1245 18.0534 13.1245"
                                    stroke="#D4D4D4" stroke-width="2.46182" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M19.6934 24.6232V32.8293C19.6934 32.8293 24.6662 31.9266 26.2582 29.5469C28.0307 26.8881 26.2582 21.3408 26.2582 21.3408"
                                    stroke="#D4D4D4" stroke-width="2.46182" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>

                            VISION</button>
                    </div>

                    <div class="mission-vision__panel mission-vision__panel--active" data-tab-panel="mission">
                        <h3 class="text-primary text-3xl md:text-4xl font-semibold mb-5">
                            <?php echo esc_html(get_field('mission_heading')); ?>
                        </h3>
                        <p class="text-gray-600 text-lg md:text-xl leading-10">
                            <?php echo esc_html(get_field('mission_text')); ?>
                        </p>
                    </div>

                    <div class="mission-vision__panel" data-tab-panel="vision">
                        <h3 class="text-primary text-3xl md:text-4xl font-semibold mb-5">
                            <?php echo esc_html(get_field('vision_heading')); ?>
                        </h3>
                        <p class="text-gray-600 text-lg md:text-xl leading-10">
                            <?php echo esc_html(get_field('vision_text')); ?>
                        </p>
                    </div>
                </div>

                <div class="space-y-4 md:space-y-5 mission-vision__thumb-list">
                    <?php foreach ($mission_images as $i => $item):
                        $thumb_index = is_numeric($i) ? ((int) $i) : 0;
                        ?>
                        <button type="button"
                            class="mission-vision__thumb <?php echo $thumb_index === 0 ? 'mission-vision__thumb--active' : ''; ?>"
                            data-tab-thumb="mission" data-image-index="<?php echo $thumb_index; ?>"
                            aria-label="Mission image <?php echo $thumb_index + 1; ?>">
                            <img class="w-full h-[110px] object-cover"
                                src="<?php echo esc_url($item['mission_image'] ?? ''); ?>"
                                alt="Mission thumbnail <?php echo $thumb_index + 1; ?>">
                        </button>
                    <?php endforeach; ?>

                    <?php foreach ($vision_images as $i => $item):
                        $thumb_index = is_numeric($i) ? ((int) $i) : 0;
                        ?>
                        <button type="button" class="mission-vision__thumb hidden" data-tab-thumb="vision"
                            data-image-index="<?php echo $thumb_index; ?>"
                            aria-label="Vision image <?php echo $thumb_index + 1; ?>">
                            <img class="w-full h-[110px] object-cover"
                                src="<?php echo esc_url($item['vision_image'] ?? ''); ?>"
                                alt="Vision thumbnail <?php echo $thumb_index + 1; ?>">
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Services -->
    <section class="py-20 bg-primary text-white">
        <div class="container mx-auto lg:px-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-10 items-stretch">
                <div class="px-3 sm:px-5 lg:px-0">
                    <span class="inline-flex border border-white/80 rounded-full px-4 py-2 text-sm mb-6">Our
                        Services</span>
                    <h2 class="text-3xl md:text-4xl font-bold leading-tight mb-5">
                        <?php echo esc_html(get_field('services_heading')); ?>
                    </h2>
                    <p class="text-lg leading-relaxed max-w-3xl mb-6">
                        <?php echo esc_html(get_field('services_description')); ?>
                    </p>
                    <?php
                    $services_btn = nks_resolve_acf_link(
                        get_field('services_btn_link'),
                        get_field('services_btn_text'),
                        '#'
                    );
                    ?>
                    <?php if (!empty($services_btn['title'])): ?>
                        <a href="<?php echo esc_url($services_btn['url']); ?>"
                            target="<?php echo esc_attr($services_btn['target']); ?>"
                            <?php echo $services_btn['target'] === '_blank' ? 'rel="noopener noreferrer"' : ''; ?>
                            class="inline-block bg-white text-primary px-5 py-3 rounded-xl font-semibold mb-8">
                            <?php echo esc_html($services_btn['title']); ?>
                        </a>
                    <?php endif; ?>

                    <div class="grid gap-4">
                        <?php
                        $service_cards = nks_normalize_rows(get_field('service_cards'));
                        if (!empty($service_cards)):
                            foreach ($service_cards as $card): ?>
                                <div class="border border-white/90 rounded-[10px] p-6 bg-transparent">
                                    <h3 class="text-2xl md:text-4xl font-bold mb-3">
                                        <?php echo esc_html($card['service_card_title'] ?? ''); ?>
                                    </h3>
                                    <p class="text-base leading-relaxed">
                                        <?php echo esc_html($card['service_card_description'] ?? ''); ?>
                                    </p>
                                </div>
                            <?php endforeach; endif; ?>
                    </div>
                </div>

                <div class="relative sm:px-5 lg:px-0">
                    <div class="swiper servicesSwiper h-[460px] md:h-[620px] lg:h-full">
                        <div class="swiper-wrapper">
                            <?php
                            $service_slides = nks_normalize_rows(get_field('service_slider_images'));
                            if (!empty($service_slides)):
                                foreach ($service_slides as $i => $slide):
                                    $slide_index = is_numeric($i) ? ((int) $i) : 0;
                                    ?>
                                    <div class="swiper-slide">
                                        <img class="w-full h-full object-cover"
                                            src="<?php echo esc_url($slide['service_slider_image'] ?? ''); ?>"
                                            alt="<?php echo esc_attr($slide['service_slider_alt'] ?? 'Experiential display service ' . ($slide_index + 1)); ?>">
                                    </div>
                                <?php endforeach; endif; ?>
                        </div>
                        <div class="swiper-pagination services-swiper-pagination !bottom-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <?php include 'templates/testimonial.php' ?>

    <!-- FAQ Accordion -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-3 sm:px-5 lg:px-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-10 items-start">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold leading-tight text-[#111] mb-8">
                        <?php echo wp_kses_post(get_field('faq_heading')); ?>
                    </h2>
                    <div class="grid grid-cols-3 gap-4">
                        <?php
                        $faq_images = nks_normalize_rows(get_field('faq_images'));
                        if (!empty($faq_images)):
                            foreach ($faq_images as $img): ?>
                                <img class="w-full h-[230px] object-cover" src="<?php echo esc_url($img['faq_image']); ?>"
                                    alt="<?php echo esc_attr($img['faq_image_alt'] ?? ''); ?>">
                            <?php endforeach; endif; ?>
                    </div>
                </div>

                <div class="grid gap-3" id="faq-accordion">
                    <?php
                    $faqs = nks_normalize_rows(get_field('faqs'));
                    if (!empty($faqs)):
                        foreach ($faqs as $i => $faq):
                            $is_first = $i === 0;
                            ?>
                            <div class="rounded-lg bg-[#F8F8F8] p-4" data-faq-item>
                                <button type="button"
                                    class="w-full flex items-center justify-between gap-3 text-left text-lg font-semibold text-[#121212]"
                                    data-faq-trigger>
                                    <span><?php echo esc_html($faq['faq_question']); ?></span>
                                    <span
                                        class="w-7 h-7 rounded-md text-sm bg-primary text-white inline-flex items-center justify-center transition-transform <?php echo $is_first ? 'rotate-90' : ''; ?>"
                                        data-faq-icon aria-hidden="true">
                                        <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                                    </span>
                                </button>
                                <div class="<?php echo $is_first ? 'pt-3' : 'hidden pt-3'; ?>" data-faq-content>
                                    <p class="m-0 text-[#575757] text-base leading-relaxed">
                                        <?php echo esc_html($faq['faq_answer']); ?>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; endif; ?>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
