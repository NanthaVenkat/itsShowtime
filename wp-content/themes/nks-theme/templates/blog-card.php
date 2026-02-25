<div class="blog-card-wrapper h-full">
    <a href="<?php the_permalink(); ?>" class="group h-full block">
        <article class="bg-white rounded-xl overflow-hidden transition-shadow h-full flex flex-col">
            <div class="relative aspect-[4/3] overflow-hidden">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('medium_large', ['class' => 'w-full object-cover transition-transform duration-500 group-hover:!scale-105 h-[200px] rounded-xl group-hover:!rounded-0']); ?>
                <?php else : ?>
                    <div class="w-full h-full bg-gray-200"></div>
                <?php endif; ?>
            </div>
            <div class="p-5 flex flex-col flex-grow">
                <?php
                $categories = get_the_category();
                $category_name = !empty($categories) ? $categories[0]->name : 'News';
                ?>
                <span class="tag-label !capitalize text-sm font-medium text-[#171717] border border-[#B2B2B2] px-2 py-1 rounded inline-block w-fit mb-3"><?php echo esc_html($category_name); ?></span>
                <h3 class="text-base font-bold text-primary mb-3 leading-tight group-hover:underline">
                    <?php the_title(); ?>
                </h3>
                <p class="text-gray-600 text-xs line-clamp-3 mb-4">
                    <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                </p>
            </div>
        </article>
    </a>
</div>