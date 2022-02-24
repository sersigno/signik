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



function openSection($classes = '')
{
    $attributes = get_sub_field('attributes');
    $attributes ? extract($attributes, EXTR_PREFIX_SAME, "attr") : '';

    $type = get_sub_field('type');
    $layout = get_row_layout() . '-' . ($type ? $type : 'default');

    echo ('<section ' . ($id ? 'id="' . $id . '" ' : '') . 'class="' . $layout . ($classes ? ' ' . $classes : '') . ($attr_classes ? ' ' . $attr_classes : '') . '">');
}
add_action('sectionOpener', 'openSection');

function closeSection()
{
    echo '</section>';
}
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
    $logo ? extract($logo, EXTR_PREFIX_SAME, "logo") : '';

    if (isset($logo_logo)) {
        echo $logo_logo;
    } else {
        bloginfo('name');
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
