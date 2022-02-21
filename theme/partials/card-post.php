<a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>" class="tw-flex tw-flex-col tw-group tw-bg-cream tw-h-[350px]">
    <?php the_post_thumbnail('medium', array(
        'class' => 'tw-w-full tw-object-cover tw-object-center tw-h-[120px] lg:tw-h-[140px] lg:group-hover:tw-h-[120px] tw-transition-all tw-duration-300 tw-ease-in'
    )); ?>
    <div class="tw-flex-grow tw-relative">
        <?php the_title('<h3 class="tw-font-bold tw-text-black tw-px-6 tw-ease-in tw-absolute tw-top-5 lg:tw-top-1/2 lg:group-hover:tw-top-5 lg:tw--translate-y-1/2 lg:group-hover:tw-translate-y-0 tw-transition-all tw-duration-300 tw-text-[18px] tw-leading-[22px]">', '</h3>'); ?>
        <div class="tw-transition-all tw-duration-400 tw-ease-in tw-delay-100 tw-absolute tw-px-6 tw-bottom-4 lg:tw-opacity-0 lg:group-hover:tw-opacity-100 detalles tw-leading-4">
            <?php the_field('detalles'); ?>
        </div>
    </div>
</a>