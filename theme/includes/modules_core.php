<?php
/*
Template picker based on the ACF layout metod
*/
function templatePicker($id)
{
    if (have_rows('modules', $id)) :
        while (have_rows('modules', $id)) :
            the_row();
            $type = get_sub_field('type');
            get_template_part('partials/' . get_row_layout() . ($type ? '-' . $type : ''));
        endwhile;
    endif;
}
add_action('pickTemplate', 'templatePicker');



function openSection()
{
    $settings = get_sub_field('section_settings');
    $attributes = get_sub_field('attributes');
    $background = get_sub_field('background');
    $type = get_sub_field('type');
    $layout = get_row_layout() . '-' . ($type ? $type : 'default');

    if ($settings) extract($settings, EXTR_PREFIX_SAME, "settings");
    if ($attributes) extract($attributes, EXTR_PREFIX_SAME, "attr");
    if ($background) extract($background, EXTR_PREFIX_SAME, "bg");

    if ($color_scheme == 'bg-dark' || $color_scheme == 'bg-darker') {
        $text_color = 'text-white';
    }

    echo ('<section ' . ($id ? ' id="' . $id . '"' : '') . ' class="' . $layout . ($classes ? ' ' . $classes . ' ' : '') . ($color_scheme ? $color_scheme . ' ' . $text_color . ' ' : '') . ($background_check && $color_scheme ? 'py-global' : 'my-global') . '">');
}
function closeSection()
{
    echo '</section>';
}

add_action('sectionOpener', 'openSection');
add_action('sectionCloser', 'closeSection');


/*
Display an element with custom classes
*/
function renderContent($case = '', $classes = '')
{
    switch ($case) {
        case 'title':
            $title = get_sub_field('title');
            extract($title, EXTR_PREFIX_SAME, "title");
            echo $title_title ? '<' . $title_tag . ' class="' . $classes . ' ' . $title_classes . '">' . $title_title . '</' . $title_tag . '>' : '';
            break;
        case 'text':
            $text = get_sub_field('text');
            echo $text ? '<div class="' . $classes . '">' . $text . '</div>' : '';
            break;
        case 'button':
            $button = get_sub_field('button');
            extract($button, EXTR_PREFIX_SAME, "btn");
            echo $button_text ? '<a href="' . $button_url . '" class="' . $classes . '">' . $button_text . '</a>' : '';
            break;
    }
}
add_action('basicContent', 'renderContent', 10, 2);



/*
Display logo
*/
function renderHeaderLogo()
{
    $logo = get_field('logo', 'options');
    extract($logo, EXTR_PREFIX_SAME, "logo");

    if (isset($logo_svg_sm) && isset($logo_svg_lg)) {
        echo '<div class="d-lg-none">' . $logo_svg_sm . '</div><div class="d-none d-lg-block">' . $logo_svg_lg . '</div>';
    } elseif (isset($logo_svg_sm) && !isset($logo_svg_lg)) {
        echo $logo_svg_sm;
    } elseif (!isset($logo_svg_sm) && isset($logo_svg_lg)) {
        echo $logo_svg_lg;
    } elseif (!isset($logo_svg_sm) && !isset($logo_svg_lg)) {
        if (isset($logo_sm) && isset($logo_lg)) {
            echo ('<img src="' . $logo_sm['url'] . '" alt="' . get_bloginfo('name') . '" class="d-block d-lg-none img-fluid">');
            echo ('<img src="' . $logo_lg['url'] . '" alt="' . get_bloginfo('name') . '" class="d-none d-lg-block img-fluid">');
        } elseif (isset($logo_sm) && !isset($logo_lg)) {
            echo ('<img src="' . $logo_sm['url'] . '" alt="' . get_bloginfo('name') . '" class="d-block img-fluid">');
        } elseif (!isset($logo_sm) && isset($logo_lg)) {
            echo ('<img src="' . $logo_lg['url'] . '" alt="' . get_bloginfo('name') . '" class="d-block img-fluid">');
        } else {
            bloginfo('name');
        }
    }
}
add_action('headerLogoPicker', 'renderHeaderLogo', 10, 1);

function renderFooterLogo()
{
    $logo = get_field('logo', 'options');
    extract($logo, EXTR_PREFIX_SAME, "logo");

    if ($logo_footer_svg_sm && $logo_footer_svg_lg) {
        echo '<div class="d-lg-none">' . $logo_svg_sm . '</div><div class="d-none d-lg-block">' . $logo_svg_lg . '</div>';
    } elseif ($logo_footer_svg_sm && !$logo_footer_svg_lg) {
        echo $logo_footer_svg_sm;
    } elseif (!$logo_footer_svg_sm && $logo_footer_svg_lg) {
        echo $logo_footer_svg_lg;
    } elseif (!$logo_footer_svg_sm && !$logo_footer_svg_lg) {
        if ($logo_footer_sm && $logo_footer_lg) {
            echo ('<img src="' . $logo_footer_sm['url'] . '" width="' . $logo_footer_sm['width'] . '" height="' . $logo_footer_sm['height'] . '" alt="' . get_bloginfo('name') . '" class="tw-block lg:tw-hidden tw-max-w-full">');
            echo ('<img src="' . $logo_footer_lg['url'] . '" width="' . $logo_footer_lg['width'] . '" height="' . $logo_footer_lg['height'] . '" alt="' . get_bloginfo('name') . '" class="tw-block lg:tw-hidden tw-max-w-full">');
        } elseif ($logo_footer_sm && !$logo_footer_lg) {
            echo ('<img src="' . $logo_footer_sm['url'] . '" width="' . $logo_footer_sm['width'] . '" height="' . $logo_footer_sm['height'] . '" alt="' . get_bloginfo('name') . '" class="tw-block lg:tw-hidden tw-max-w-full">');
        } elseif (!$logo_sm && $logo_lg) {
            echo ('<img src="' . $logo_footer_lg['url'] . '" width="' . $logo_footer_lg['width'] . '" height="' . $logo_footer_lg['height'] . '" alt="' . get_bloginfo('name') . '" class="tw-block lg:tw-hidden tw-max-w-full">');
        } else {
            bloginfo('name');
        }
    }
}
add_action('footerLogoPicker', 'renderFooterLogo', 10, 1);


/*
Display (or hide) the page title
*/
function pageTitlePicker($id)
{
    $show = get_field('show_page_title', $id);
    if (!$show) return;
    get_template_part('partials/page', 'title');
}
add_action('pageTitle', 'pageTitlePicker', 10, 1);
