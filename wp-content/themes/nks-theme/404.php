<?php get_header(); ?>
<main class="container mx-auto px-4 py-24 text-center">
    <h1 class="text-9xl font-black text-gray-200">404</h1>
    <h2 class="text-3xl font-bold mt-4">Oops! That page can’t be found.</h2>
    <p class="text-gray-600 mt-4 mb-8">It looks like nothing was found at this location. Maybe try a search?</p>
    <a href="<?php echo esc_url(home_url('/')); ?>"
        class="bg-blue-600 text-white px-8 py-3 rounded-lg font-bold hover:bg-blue-700 transition">
        Go Back Home
    </a>
</main>
<?php get_footer(); ?>