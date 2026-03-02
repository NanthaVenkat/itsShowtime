<section class="form-container py-16">
    <div class="container mx-auto px-4 lg:px-10 grid grid-cols-1 lg:grid-cols-[1fr_1fr] gap-10">
        <?php if (is_active_sidebar('footer-form')): ?>
            <?php dynamic_sidebar('footer-form'); ?>
        <?php endif ?>
        <!-- <div>
                <h3 class="text-primary text-5xl font-semibold mb-3">Let's Talk</h3>
                <p class="text-[#4f4f4f]">Drop your details and project brief. We'll help evaluate the right
                    technical direction and execution plan.</p>
            </div>

            <div>
                <h4 class="text-3xl font-semibold mb-5">How can we help you?</h4>

                <`?php echo do_shortcode('[wpforms id="113"]'); ?>
            </div>
        <`?php endif; ?> -->
    </div>
</section>