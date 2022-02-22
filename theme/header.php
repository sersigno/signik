<!doctype html>
<html <?php language_attributes() ?>>

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php if (is_front_page() || is_home()) {
            echo get_bloginfo('name');
        } else {
            echo wp_title('');
        } ?>
    </title>
    <script src="https://kit.fontawesome.com/8e1d5ccbe1.js" crossorigin="anonymous"></script>
    <?php wp_head() ?>
</head>

<?php
$logo = get_field('logo', 'options');
//extract($logo, EXTR_PREFIX_SAME, "logo");

$contact = get_field('contact_data', 'options');
//extract($contact, EXTR_PREFIX_SAME, "cd");

$social = get_field('social', 'options');
//extract($social, EXTR_PREFIX_SAME, "social");
?>

<body <?php body_class('tw-font-sans') ?>>
    <header id="header" class="">
        <nav class="tw-max-w-screen-xl tw-mx-auto lg:tw-flex tw-items-center tw-py-4 lg:tw-py-7 tw-px-4 xl:tw-px-0">
            <a class="tw-w-[260px] lg:tw-w-[324px] tw-inline-block tw-z-50 tw-relative" href="<?php bloginfo('url'); ?>">
                <?php do_action('headerLogoPicker'); ?>
            </a>
            <button id="ham" class="hamburger hamburger--collapse tw-float-right lg:tw-hidden tw-z-50 tw-relative tw-mt-3" type="button">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
            <?php wp_nav_menu(array(
                'theme_location' => 'main-nav',
                'container' => '',
                'menu_class' => ' tw-hidden lg:tw-flex lg:tw-ml-auto tw-fixed lg:tw-relative tw-top-0 tw-left-0 tw-w-full lg:tw-w-fit tw-h-full lg:tw-h-fit tw-flex-col lg:tw-flex-row ' .
                    'tw-justify-center tw-items-center tw-space-y-5 lg:tw-space-y-0 lg:tw-space-x-6 ' .
                    'tw-list-none  tw-bg-white tw-z-20',
                'menu_id' => 'main-nav',
            )); ?>
        </nav>
    </header>