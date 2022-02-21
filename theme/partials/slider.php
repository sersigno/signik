<?php
$content = get_sub_field('content');
$gallery = get_sub_field('gallery');
?>

<?php do_action('sectionOpener'); ?>
<div class="tw-max-w-screen-xl tw-mx-auto tw-flex tw-flex-col lg:tw-flex-row lg:tw-mt-6 lg:tw-mb-16">
    <div class="tw-bg-red tw-text-white lg:tw-aspect-square tw-flex tw-justify-center tw-flex-col tw-px-7 tw-py-10 lg:tw-p-12 tw-mx-4 lg:tw-mx-0 tw--mt-6 lg:tw-mt-0 tw-relative tw-z-10 lg:tw-w-5/12">
        <?php do_action('basicContent', 'title', 'tw-text-[21px] lg:tw-text-[30px] tw-text-bold tw-font-bold tw-mb-4 lg:tw-mb-8'); ?>
        <?php do_action('basicContent', 'text'); ?>
        <?php do_action('basicContent', 'button', 'btn btn-white tw-mt-8'); ?>
    </div>
    <?php if ($gallery) : ?>
        <div class="main-slider glide lg:tw-w-7/12 tw-order-first lg:tw-order-last">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides fade">
                    <?php foreach ($gallery as $img_id) : ?>
                        <li class="glide__slide fade tw-h-[300px] lg:tw-h-[533px]"><?php echo wp_get_attachment_image($img_id, 'large', '', array('class' => 'tw-w-full tw-h-full tw-object-cover tw-object-center')); ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>

        <div class="main-slider glide lg:tw-w-7/12 tw-order-first lg:tw-order-last tw-hidden">
            <?php foreach ($gallery as $img_id) : ?>
                <?php echo wp_get_attachment_image($img_id, 'large', '', array('class' => 'tw-w-full tw-h-full tw-object-cover tw-object-center')); ?>
            <?php endforeach ?>
        </div>
    <?php endif; ?>
</div>
<?php do_action('sectionCloser'); ?>