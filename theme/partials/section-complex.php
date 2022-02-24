<?php
$complex = get_sub_field('complex');
extract($complex, EXTR_PREFIX_SAME, "complex");
do_action('sectionOpener', 'min-h-screen flex space-x-5 -my-[60px]'); ?>
<div class="w-8/12 border-r border-blue pr-5 flex flex-col py-[100px]">
    <?php do_action('basicContent', 'title', 'sectionTitle'); ?>
    <?php do_action('basicContent', 'text', ''); ?>
    <div class="mt-auto">
        <?php echo $title_2; ?>
        <?php echo $text_2; ?>
    </div>
</div>
<div class="w-4/12 py-[100px]">
    <?php echo $title_3; ?>
    <?php echo $text_3; ?>
</div>
<?php do_action('sectionCloser'); ?>