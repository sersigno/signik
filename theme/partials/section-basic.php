<?php $img = get_sub_field('image');
extract($img, EXTR_PREFIX_SAME, "img");
$button = get_sub_field('button');
extract($button, EXTR_PREFIX_SAME, "btn"); ?>

<?php do_action('sectionOpener', 'class'); ?>
<div class="tw-bg-light tw-mt-8 lg:tw-my-4">
    <div class="tw-max-w-screen-xl tw-mx-auto tw-flex tw-flex-col lg:tw-flex-row lg:tw-border-x-4 tw-border-white lg:tw-h-[240px]">
        <?php echo $image ? wp_get_attachment_image($image, 'medium', '', array('class' => 'tw-w-[200px] lg:tw-w-1/6 tw-h-auto lg:tw-h-full tw-mx-auto tw-block tw--mt-8 lg:tw-mt-0 tw-object-cover tw-object-center lg:tw-w-1/6')) : ''; ?>
        <div class="lg:tw-w-4/6 tw-flex tw-flex-col tw-justify-center tw-border-x-4 tw-border-white tw-px-4 lg:tw-px-12 tw-my-8 lg:tw-my-0 tw-text-center lg:tw-text-left">
            <?php do_action('basicContent', 'title', 'tw-text-[22px] lg:tw-text-[28px] tw-text-blue tw-font-serif tw-italic after:tw-content-[\'\'] after:tw-block after:tw-w-[40px] after:tw-h-[2px] after:tw-bg-red after:tw-mt-4 after:tw-mx-auto lg:after:tw-mx-0 tw-mb-6'); ?>
            <?php do_action('basicContent', 'text'); ?>
        </div>
        <?php do_action(
            'basicContent',
            'button',
            'tw-w-fit lg:tw-w-1/6 lg:tw-bg-medium tw-block lg:tw-flex tw-mx-auto lg:tw-mx-0 tw-items-center tw-justify-center ' .
                'tw-border tw-border-red lg:tw-border-0 tw-py-2 tw-px-6 hover:tw-bg-red hover:tw-text-white tw-transition-colors tw-outline-1 ' .
                'lg:tw-outline tw-outline-white tw-outline-offset-[-10px] tw-font-serif tw-uppercase tw-italic tw-text-blue lg:tw-text-white tw-mb-14 lg:tw-mb-0 tw-text-[14px]'
        ); ?>
    </div>
</div>
<?php do_action('sectionCloser'); ?>