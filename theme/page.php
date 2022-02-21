<?php get_header(); ?>

<div id="page-content">
    <?php do_action('pageTitle', get_the_ID()); ?>
    <?php if ('' !== get_post()->post_content) {
        echo '<div class="tw-max-w-screen-lg tw-mx-auto tw-pt-10 lg:tw-pt-16 tw-pb-10 lg:tw-pb-14 tw-px-4 lg:tw-px-[1px]">';
        the_content();
        echo '</div>';
    } ?>
    <?php do_action('pickTemplate', get_the_ID()) ?>
</div>

<?php get_footer(); ?>