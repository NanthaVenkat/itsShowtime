<section class="py-20 bg-[#fafafa]">
    <div class="container mx-auto px-3 sm:px-5 lg:px-10">
        <span class="inline-flex border border-[#D8D8D8] text-secondary-b90 rounded-full px-4 py-2 text-sm mb-6 space-x-0 font-medium">
            <?php the_field('testimonial_badge'); ?>
        </span>
        <h2 class="text-3xl md:text-4xl font-bold leading-tight mb-8">
            <?php the_field('testimonial_title'); ?>
        </h2>

        <?php if( have_rows('testimonials') ): ?>
            <div class="swiper testimonialSwiper !pb-2.5">
                <div class="swiper-wrapper">
                    <?php while( have_rows('testimonials') ): the_row(); 
                        $image = get_sub_field('client_image');
                    ?>
                        <div class="swiper-slide bg-white shadow-md rounded-2xl" style="height: unset;">
                            <article class="text-[#1a1a1a] p-5 h-full flex flex-col">
                                <p class="m-0 text-base leading-relaxed pb-4">
                                    “<?php the_sub_field('quote'); ?>”
                                </p>
                                <div class="flex items-center gap-3 pt-4 mt-auto border-t border-[#E5E5E5]">
                                    <img class="w-11 h-11 rounded-full object-cover"
                                         src="<?php echo esc_url($image['url'] ?? home_url('/wp-content/uploads/2026/02/default-avatar.jpg')); ?>"
                                         alt="<?php echo esc_attr(get_sub_field('client_name')); ?>">
                                    <div>
                                        <h4 class="m-0 text-base font-bold"><?php the_sub_field('client_name'); ?></h4>
                                        <p class="m-0 text-sm"><?php the_sub_field('client_designation'); ?></p>
                                    </div>
                                </div>
                            </article>
                        </div>
                    <?php endwhile; ?>
                </div>
                <div class="swiper-pagination testimonial-pagination !static !mt-6"></div>
            </div>
        <?php endif; ?>
    </div>
</section>