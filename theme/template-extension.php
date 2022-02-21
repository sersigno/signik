<?php
/* Template Name: Extensión académica */
/* Template Description: Loopea los terms de una taxonomía definida */
get_header();

$args = array(
    'post_type' => 'programas-academicos',
    'tax_query' => array(
        array(
            'taxonomy' => 'tipo',
            'field'    => 'slug',
            'terms'    => 'diplomado'
        ),
    )
);
$the_query = new WP_Query($args);
?>
<div id="page-content">
    <?php do_action('pageTitle', get_the_ID()) ?>

    <div class="tw-max-w-screen-lg tw-mx-auto tw-pt-10 lg:tw-pt-16 tw-pb-10 lg:tw-pb-12 tw-px-4">

        <div class="tabTriggers">
            <button class="tabTrigger active" data-target="introduccion">Introducción</button>
            <button class="tabTrigger" data-target="diplomados">Diplomados</button>
            <button class="tabTrigger" data-target="seminarios">Seminarios</button>
        </div>

        <div id="introduccion" class="tabContent normalizeText">
            <?php the_content() ?>
        </div>

        <div id="diplomados" class="tabContent">
            <?php if ($the_query->have_posts()) : ?>
                <div class="tw-grid lg:tw-grid-cols-3 tw-gap-6">
                    <?php while ($the_query->have_posts()) :
                        $the_query->the_post();
                        get_template_part('partials/card', 'post');
                        wp_reset_postdata();
                    endwhile; ?>
                </div>
            <?php endif; ?>
        </div>

        <div id="seminarios" class="tabContent">

            <?php if (have_rows('accordion')) : while (have_rows('accordion')) : the_row(); ?>
                    <button class="accTrigger"><?php the_sub_field('title');  ?></button>
                    <div class="accContent">
                        <?php if (have_rows('seminarios')) : ?>
                            <?php while (have_rows('seminarios')) : the_row(); ?>
                                <div class="tw-flex tw-flex-col lg:tw-flex-row tw-border-b tw-border-light last:tw-border-0 tw-py-5 lg:tw-pt-6 lg:tw-pb-10 tw-space-y-6 lg:tw-space-y-0 lg:tw-space-x-6">
                                    <div class="tw-w-full lg:tw-w-5/12">
                                        <p class="tw-text-medium tw-text-sm">Seminario</p>
                                        <h4 class="tw-text-red tw-font-bold tw-italic tw-text-[18px] tw-font-serif tw-mb-3"><?php the_sub_field('seminario');  ?></h4>
                                        <?php the_sub_field('description');  ?>
                                    </div>
                                    <div class="tw-w-full lg:tw-w-5/12">
                                        <p class="tw-text-medium tw-text-sm">Imparte</p>
                                        <p class="tw-mb-3 tw-leading-[19px]"><strong class="tw-font-bold"><?php the_sub_field('imparte');  ?></strong><br>
                                            <?php the_sub_field('credenciales');  ?></p>
                                        <?php the_sub_field('semblanza');  ?>
                                    </div>
                                    <div class="tw-w-full lg:tw-w-2/12">
                                        <p class="tw-text-medium tw-text-sm">Horario</p>
                                        <?php the_sub_field('horario');  ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
            <?php endwhile;
            endif; ?>

        </div>

    </div>
</div>
<?php get_footer(); ?>