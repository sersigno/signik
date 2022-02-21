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
extract($logo, EXTR_PREFIX_SAME, "logo");

$contact = get_field('contact_data', 'options');
extract($contact, EXTR_PREFIX_SAME, "cd");

$social = get_field('social', 'options');
extract($social, EXTR_PREFIX_SAME, "social");
?>

<body <?php body_class('tw-font-sans') ?>>
    <header id="header" class="">
        <div id="top-bar" class="tw-bg-red tw-text-white tw-hidden md:tw-block">
            <div class="tw-max-w-screen-xl tw-mx-auto tw-flex tw-flex-col lg:tw-flex-row tw-py-2 lg:tw-py-2">
                <nav class="tw-mr-auto tw-flex tw-items-center">
                    <?php foreach ($social as $key => $value) :
                        $fa = ($key == 'facebook') ? $fa = 'facebook-f' : $fa = $key;
                        echo $value ? '<a href="' . $value . '" target="_blank" class="tw-px-4 hover:tw-opacity-80 tw-transition-opacity" rel="noreferrer noopener" aria-label="' . $key . '"><i class="fab fa-' . $fa . '"></i></a>' : '';
                    endforeach; ?>
                </nav>
                <nav class="tw-text-[14px] tw-flex tw-items-center tw-font-serif tw-space-x-8">
                    <?php
                    echo $contact['email'] ? '<div><i class="fa fa-envelope tw-mr-3"></i><a href="mailto:' . $contact['email'] . '" target="_blank" class="hover:tw-opacity-80 tw-transition-opacity" rel="noreferrer noopener" aria-label="' . $contact['email'] . '">' . $contact['email'] . '</a></div>' : '';
                    echo $contact['phone_1'] ? '<div><i class="fa fa-phone tw-mr-3"></i>
                    <a href="tel:' . $contact['phone_1'] . '" target="_blank" class="hover:tw-opacity-80 tw-transition-opacity" rel="noreferrer noopener" aria-label="' . $contact['phone_1'] . '">' . $contact['phone_1'] . '</a> / 
                    <a href="tel:' . $contact['phone_2'] . '" target="_blank" class="hover:tw-opacity-80 tw-transition-opacity" rel="noreferrer noopener" aria-label="' . $contact['phone_2'] . '">' . $contact['phone_2'] . '</a></div>' : '';
                    ?>
                </nav>
                <button id="search-trigger" class="tw-flex tw-items-center tw-px-4 hover:tw-opacity-80 tw-transition-opacity tw-hidden tw-ml-8" aria-label="Buscar">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
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