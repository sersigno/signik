<?php
$contact = get_field('contact_data', 'options');
$contact ? extract($contact, EXTR_PREFIX_SAME, "cd") : '';

$social = get_field('social', 'options');
$social ? extract($social, EXTR_PREFIX_SAME, "social") : '';
?>
<footer id="footer" class="tw-bg-red lg:tw-bg-transparent">
    <div class="tw-bg-black tw-text-white tw-text-[11px] tw-italic tw-font-serif tw-py-4 lg:tw-py-2 tw-px-4 tw-text-center lg:tw-text-left">
        <div class="tw-max-w-screen-xl tw-mx-auto tw-flex tw-flex-col lg:tw-flex-row tw-justify-between">
            <p class="tw-mt-1 lg:tw-mt-0 tw-order-last lg:tw-order-first"><span class="tw-opacity-40">Diseño y desarrollo por</span> <a href="http://sersigno.com" class="tw-opacity-40 hover:tw-opacity-100 tw-transition-opacity">Ser Signo</a></p>
            <p><?php echo '© ' . date("Y") . ' Colegio de Saberes | <a href="' . get_bloginfo("url") . '/politica-privacidad/" class="hover:tw-text-blue tw-transition-colors" rel="noreferrer noopener">Aviso de privacidad</a>' ?></p>
        </div>
    </div>
</footer>
<div class="bg-gradient fixed top-0 left-0 w-full h-full animate-colorFader bg-radialMask -z-10"></div>
<?php wp_footer() ?>
</body>

</html>