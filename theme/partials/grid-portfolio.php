<?php do_action('sectionOpener'); ?>
<?php do_action('basicContent', 'title', 'sectionTitle'); ?>
<?php if (have_rows('posts')) : ?>
    <div class="tw-max-w-screen-lg tw-mx-auto tw-px-4 tw-pt-16 tw-pb-12 tw-grid lg:tw-grid-cols-3 tw-gap-6">
        <?php while (have_rows('posts')) :
            the_row();
            $post =  get_sub_field('post');
            setup_postdata($post); ?>

            <?php get_template_part('partials/card', 'post') ?>
        <?php wp_reset_postdata();
        endwhile; ?>
    </div>
<?php endif; ?>
<?php do_action('sectionCloser'); ?>