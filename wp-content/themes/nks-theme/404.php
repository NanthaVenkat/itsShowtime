<?php get_header(); ?>

<style>
    header:not(.bg-black\/90) .nks-nav__list li:not(.current-menu-item) a {
        color: #202020;
    }
</style>

<main class="container mx-auto px-4 py-24 text-center">
    <h1 class="text-9xl font-black text-gray-200">404</h1>
    <h2 class="text-3xl font-bold mt-4">Oops! That page can’t be found.</h2>
    <p class="text-gray-600 mt-4 mb-8">It looks like nothing was found at this location. Maybe try a search?</p>
    <a href="<?php echo esc_url(home_url('/')); ?>"
        class="bg-primary text-white px-8 py-3 rounded-lg font-bold hover:opacity-[0.8] transition">
        Go Back Home
    </a>
</main>
<?php get_footer(); ?>