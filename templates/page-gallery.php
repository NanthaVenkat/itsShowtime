<?php
/*
Template Name: Gallery
Template Post Type: page
*/

get_header();

$gallery_images = [
    home_url('/wp-content/uploads/2026/02/banner1.webp'),
    home_url('/wp-content/uploads/2026/02/banner2-scaled.webp'),
    home_url('/wp-content/uploads/2026/02/banner3.webp'),
    home_url('/wp-content/uploads/2026/02/about-banner-1.jpg'),
    home_url('/wp-content/uploads/2026/02/about-banner-2.jpg'),
    home_url('/wp-content/uploads/2026/02/about-banner-3.jpg'),
];

$project_card_1 = home_url('/wp-content/uploads/2026/02/about-banner-2.jpg');
$project_card_2 = home_url('/wp-content/uploads/2026/02/about-banner-3.jpg');
$project_card_3 = home_url('/wp-content/uploads/2026/02/about-banner-1.jpg');
?>

<main class="gallery-page bg-[#f3f3f3] text-[#151515]">
    <section class="pt-40 pb-16">
        <div class="container mx-auto px-4 lg:px-10 text-center">
            <h1 class="text-primary text-4xl md:text-6xl font-semibold leading-tight mb-5">
                Moments and visuals from<br class="hidden md:block">our projects.
            </h1>
            <p class="text-[#565656] font-medium text-base md:text-lg max-w-2xl mx-auto">
                A glimpse into how we transform spaces into immersive brand experiences using visual and
                multi-sensory technology.
            </p>
        </div>
    </section>

    <section>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-0">
            <?php foreach ($gallery_images as $index => $image): ?>
                <figure class="overflow-hidden !mb-0">
                    <img
                        src="<?php echo esc_url($image); ?>"
                        alt="Gallery visual <?php echo esc_attr((string) ($index + 1)); ?>"
                        class="w-full h-[300px] md:h-[380px] lg:h-[420px] object-cover"
                        data-gallery-flip-image>
                </figure>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="bg-primary text-white py-16">
        <div class="container mx-auto px-4 lg:px-10 text-center">
            <p class="max-w-5xl mx-auto text-base md:text-xl leading-relaxed">
                Naked eye advertising refers to outdoor 3D LED displays that create the illusion of three-dimensional
                depth and realism without requiring special glasses. These high-resolution, often 90-degree corner,
                screens are designed for high recall and strong visual impact.
            </p>
        </div>
    </section>

    <section class="py-16">
        <div class="container mx-auto px-4 lg:px-10">
            <div class="text-center mb-10">
                <h2 class="text-primary text-4xl md:text-6xl font-semibold mb-4">Recent Projects</h2>
                <p class="text-[#565656] font-medium max-w-2xl mx-auto">Naked eye advertising refers to outdoor 3D LED displays that create the illusion of three-dimensional visuals.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <article>
                    <img src="<?php echo esc_url($project_card_1); ?>" alt="Samsung Technologies video wall" class="w-full h-[320px] md:h-[420px] object-cover mb-3">
                    <div class="flex flex-wrap items-center justify-between text-[#252525] gap-3 text-sm md:text-base">
                        <p><span class="font-semibold">Samsung Technologies</span> | Video Wall</p>
                        <time datetime="2025-01-25">January 25 2025</time>
                    </div>
                </article>

                <article>
                    <img src="<?php echo esc_url($project_card_2); ?>" alt="Apple Technologies naked eye billboard" class="w-full h-[320px] md:h-[420px] object-cover mb-3">
                    <div class="flex flex-wrap items-center justify-between text-[#252525] gap-3 text-sm md:text-base">
                        <p><span class="font-semibold">Apple Technologies</span> | Naked Eye Billboard</p>
                        <time datetime="2025-01-25">January 25 2025</time>
                    </div>
                </article>
            </div>

            <article>
                <img src="<?php echo esc_url($project_card_3); ?>" alt="Samsung Technologies featured billboard" class="w-full h-[360px] md:h-[520px] object-cover mb-3">
                <div class="flex flex-wrap items-center justify-between text-[#252525] gap-3 text-sm md:text-base">
                    <p><span class="font-semibold">Samsung Technologies</span> | Video Wall</p>
                    <time datetime="2025-01-25">January 25 2025</time>
                </div>
            </article>
        </div>
    </section>
</main>

<?php get_footer(); ?>