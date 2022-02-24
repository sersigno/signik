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

<body <?php body_class('font-slab text-blue') ?>>
    <header id="header" class="px-5">
        <div class="py-8 border-b border-blue flex items-center justify-between">
            <a class=" tw-w-[260px] lg:tw-w-[324px] tw-inline-block tw-z-50 tw-relative" href="<?php bloginfo('url'); ?>">
                <?php do_action('headerLogoPicker'); ?>
            </a>
            <button id="ham" class="hamburger hamburger--collapse" type="button">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
        <p class="text-xl mt-5 mb-4">Soluciones significativas en comunicación visual</p>
        <ul>
            <li>Front-end Developer</li>
            <li>UX/UI</li>
            <li>Worpress</li>
            <li>Branding</li>
            <li>Graphic Design</li>
        </ul>
    </header>
    <nav class="hidden">
        <?php wp_nav_menu(array(
            'theme_location' => 'main-nav',
            'container' => '',
            'menu_class' => 'hidden lg:tw-ml-auto tw-fixed lg:tw-relative tw-top-0 tw-left-0 tw-w-full lg:tw-w-fit tw-h-full lg:tw-h-fit tw-flex-col lg:tw-flex-row ' .
                'tw-justify-center tw-items-center tw-space-y-5 lg:tw-space-y-0 lg:tw-space-x-6 ' .
                'tw-list-none  tw-bg-white tw-z-20',
            'menu_id' => 'main-nav',
        )); ?>
    </nav>