<?php do_action('sectionOpener', 'border-y border-blue py-10'); ?>
<?php do_action('basicContent', 'title', 'sectionTitle w-5/12'); ?>
<div class="grid grid-cols-3 gap-8">
    <?php if (have_rows('packs')) : while (have_rows('packs')) : the_row(); ?>
            <div class="pack">
                <?php the_sub_field('title') ?>
                <?php the_sub_field('description') ?>
                <?php the_sub_field('price') ?>
                <?php the_sub_field('url') ?>
            </div>
    <?php endwhile;
    endif; ?>
</div>
<?php do_action('sectionCloser'); ?>