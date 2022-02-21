<?php do_action('sectionOpener'); ?>

<div class="tw-max-w-screen-xl tw-mx-auto tw-mt-12 lg:tw-mt-6 tw-mb-20 lg:tw-mb-16">

    <div class="tw-mx-auto">
        <?php do_action(
            'basicContent',
            'title',
            'tw-flex tw-items-center tw-justify-center tw-text-red tw-text-[22px] lg:tw-text-[28px] tw-font-serif tw-italic tw-mb-8 ' .
                'before:tw-hidden lg:before:tw-block before:tw-bg-red before:tw-block before:tw-h-px before:tw-grow before:tw-mr-4 ' .
                'after:tw-hidden lg:after:tw-block after:tw-bg-red after:tw-block after:tw-h-px after:tw-grow after:tw-ml-4'
        ) ?>
    </div>

    <?php if (have_rows('posts')) : ?>
        <div class="post-carousel glide">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    <?php while (have_rows('posts')) :
                        the_row();
                        $post =  get_sub_field('post');
                        setup_postdata($post); ?>
                        <li class="glide__slide">
                            <?php get_template_part('partials/card', 'post') ?>
                        </li>
                    <?php wp_reset_postdata();
                    endwhile; ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>

</div>

<?php do_action('sectionCloser'); ?>