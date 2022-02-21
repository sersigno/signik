<?php
$contact = get_field('contact_data', 'options');
extract($contact, EXTR_PREFIX_SAME, "cd");

$social = get_field('social', 'options');
extract($social, EXTR_PREFIX_SAME, "social");
?>
<footer id="footer" class="tw-bg-red lg:tw-bg-transparent">
    <div class="tw-max-w-screen-xl tw-mx-auto tw-flex tw-flex-col lg:tw-flex-row tw-py-8 lg:tw-py-10 tw-px-4 lg:tw-px-0 tw-text-white lg:tw-text-black">
        <div class="tw-hidden lg:tw-block  lg:tw-w-2/6">
            <?php if (have_rows('posgrados', 'options')) : ?>
                <h4 class="tw-text-red tw-italic tw-font-serif tw-mb-4 lg:tw-mb-7 tw-font-bold">Posgrados</h4>
                <nav>
                    <?php while (have_rows('posgrados', 'options')) : the_row();
                        $id = get_sub_field('posgrado');
                        $title = get_the_title($id);
                    ?>
                        <a href="<?php echo get_the_permalink($id) ?>" class="tw-text-[15px] tw-flex before:tw-content-['•'] before:tw-text-cream before:tw-mr-3 before:tw-block hover:tw-text-red tw-transition-colors"><?php echo $title ?></a>
                    <?php endwhile; ?>
                </nav>
            <?php endif; ?>
        </div>
        <div class="tw-hidden lg:tw-block lg:tw-w-2/6 lg:tw-ml-12">
            <?php if (have_rows('diplomados', 'options')) : ?>
                <h4 class="tw-text-red tw-italic tw-font-serif tw-mb-4 lg:tw-mb-7 tw-font-bold">Diplomados</h4>
                <nav>
                    <?php while (have_rows('diplomados', 'options')) : the_row();
                        $id = get_sub_field('diplomado');
                        $title = get_the_title($id);
                    ?>
                        <a href="<?php echo get_the_permalink($id) ?>" class="tw-text-[15px] tw-flex before:tw-content-['•'] before:tw-text-cream before:tw-mr-3 before:tw-block hover:tw-text-red tw-transition-colors"><?php echo $title ?></a>
                    <?php endwhile; ?>
                </nav>
            <?php endif; ?>
        </div>
        <div class="lg:tw-w-1/6 lg:tw-ml-auto lg:tw-text-center">
            <h4 class="tw-text-white lg:tw-text-red tw-italic tw-font-serif tw-font-bold tw-mb-3 lg:tw-mb-6">Conoce</h4>
            <a class="tw-text-2xl lg:tw-text-[2rem] tw-whitespace-normal lg:tw-max-w-[160px] tw-block lg:tw-mx-auto tw-leading-none tw-transition-opacity tw-font-serif hover:tw-opacity-80" href="https://territoriodedialogos.com/" rel="noreferrer noopener">
                Territorio de diálogos
                <small class="tw-text-base tw-mt-[5px] tw-leading-none tw-block">Revista semestral</small>
            </a>
        </div>
    </div>

    <div class="tw-bg-red tw-text-white lg:tw-mt-2">
        <div class="tw-max-w-screen-xl tw-mx-auto tw-flex tw-flex-col lg:tw-flex-row tw-pt-4 tw-pb-8 lg:tw-py-9 tw-px-4 lg:tw-px-0">
            <nav class="tw-text-[14px] tw-flex tw-flex-col lg:tw-flex-row lg:tw-items-center tw-font-serif tw-space-y-4 lg:tw-space-y-0 lg:tw-space-x-16">
                <?php
                echo $contact['address'] ? '<div><i class="fa fa-map-marker-alt tw-mr-4 lg:tw-mr-3"></i>' . $contact['address'] . '</div>' : '';
                echo $contact['email'] ? '<div><i class="fa fa-envelope tw-mr-4 lg:tw-mr-3"></i><a href="mailto:' . $contact['email'] . '" target="_blank" class="hover:tw-opacity-80 tw-transition-opacity" rel="noreferrer noopener" aria-label="' . $contact['email'] . '">' . $contact['email'] . '</a></div>' : '';
                echo $contact['phone_1'] ? '<div><i class="fa fa-phone tw-mr-4 lg:tw-mr-3"></i>
                    <a href="tel:' . $contact['phone_1'] . '" target="_blank" class="hover:tw-opacity-80 tw-transition-opacity" rel="noreferrer noopener" aria-label="' . $contact['phone_1'] . '">' . $contact['phone_1'] . '</a> / 
                    <a href="tel:' . $contact['phone_2'] . '" target="_blank" class="hover:tw-opacity-80 tw-transition-opacity" rel="noreferrer noopener" aria-label="' . $contact['phone_2'] . '">' . $contact['phone_2'] . '</a></div>' : '';
                ?>
            </nav>
            <nav class="tw-ml-auto tw-flex tw-items-center tw-mt-6 lg:tw-mt-0">
                <?php foreach ($social as $key => $value) :
                    $fa = ($key == 'facebook') ? $fa = 'facebook-f' : $fa = $key;
                    echo $value ? '<a href="' . $value . '" target="_blank" class="tw-px-4 hover:tw-opacity-80 tw-transition-opacity" rel="noreferrer noopener" aria-label="' . $key . '"><i class="fab fa-' . $fa . '"></i></a>' : '';
                endforeach; ?>
            </nav>
        </div>
    </div>

    <div class="tw-bg-black tw-text-white tw-text-[11px] tw-italic tw-font-serif tw-py-4 lg:tw-py-2 tw-px-4 tw-text-center lg:tw-text-left">
        <div class="tw-max-w-screen-xl tw-mx-auto tw-flex tw-flex-col lg:tw-flex-row tw-justify-between">
            <p class="tw-mt-1 lg:tw-mt-0 tw-order-last lg:tw-order-first"><span class="tw-opacity-40">Diseño y desarrollo por</span> <a href="http://sersigno.com" class="tw-opacity-40 hover:tw-opacity-100 tw-transition-opacity">Ser Signo</a></p>
            <p><?php echo '© ' . date("Y") . ' Colegio de Saberes | <a href="' . get_bloginfo("url") . '/politica-privacidad/" class="hover:tw-text-red tw-transition-colors" rel="noreferrer noopener">Aviso de privacidad</a>' ?></p>
        </div>
    </div>
</footer>
<?php wp_footer() ?>
</body>

</html>