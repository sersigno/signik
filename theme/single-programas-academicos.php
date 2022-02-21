<?php get_header();
the_post();
$diplomado = has_term('diplomado', 'tipo');
?>
<div id="page-content">
	<?php if (!$diplomado) : ?>
		<div class="tw-bg-gray-100 lg:tw-mt-5 lg:tw-min-h-[190px] tw-flex tw-justify-center tw-flex-col tw-items-center tw-py-10 lg:tw-py-12">
			<?php the_title('<h1 class="tw-text-[22px] lg:tw-text-[28px] tw-font-serif tw-italic tw-font-bold tw-text-red tw-max-w-screen-md tw-text-center tw-leading-[1.2] tw-mb-5 lg:tw-mb-2 tw-px-4 lg:tw-px-0">', '</h1>'); ?>
			<p class="tw-text-medium tw-text-[14px] tw-px-4 lg:tw-px-0 tw-text-center"><?php the_field('registro') ?></p>
		</div>
	<?php endif ?>
	<div class="tw-max-w-screen-lg tw-mx-auto tw-pb-10 lg:tw-pb-10 <?php echo $diplomado ? 'tw-pt-2 lg:tw-pt-4' : 'tw-pt-10 lg:tw-pt-14' ?>">
		<div class="tabTriggers <?php echo $diplomado ? 'tw-hidden' : '' ?>">
			<button class="tabTrigger active" data-target="intro">Introducción</button>
			<button class="tabTrigger" data-target="plan">Plan de estudios</button>
			<button class="tabTrigger" data-target="profs">Profesores</button>
			<button class="tabTrigger" data-target="reqs">Requisitos</button>
			<button class="tabTrigger lg:tw-hidden" data-target="fechas">Fechas y cuotas</button>
		</div>

		<div id="intro" class="tabContent normalizeText">
			<div class="tw-flex tw-flex-col lg:tw-flex-row lg:tw-space-x-9">
				<div class="lg:tw-w-8/12">
					<?php if ($diplomado) the_title('<h1 class="tw-text-[22px] lg:tw-text-[28px] tw-font-serif tw-italic tw-font-bold tw-text-red tw-max-w-screen-md tw-leading-[1.2] tw-mb-5 lg:tw-mb-7">', '</h1>'); ?>
					<?php the_content(); ?>
				</div>
				<div class="lg:tw-w-4/12 tw-bg-gray-100 tw-px-8 tw-py-8 fechas tw-text-[14px] <?php echo !$diplomado ? 'tw-hidden lg:tw-block' : '' ?>">
					<?php the_field('fechas_y_cuotas') ?>
				</div>
			</div>
		</div>

		<div id="plan" class="tabContent">
			<?php if (have_rows('plan')) : ?>
				<div class="tw-grid lg:tw-grid-cols-2 tw-gap-6 lg:tw-gap-7">
					<?php while (have_rows('plan')) : the_row();
						$contenido = get_sub_field('contenido'); ?>
						<div class="tw-border-light lg:tw-border lg:tw-px-8 lg:tw-py-6">
							<p class="tw-text-[14px] tw-text-medium"><?php the_sub_field('orden') ?></p>
							<h5 class="tw-text-[18px] tw-text-red tw-font-serif tw-font-bold tw-italic"><?php the_sub_field('nombre') ?></h5>
							<?php echo $contenido ? '<p class="tw-mt-4">' . $contenido . '</p>' : '' ?>
						</div>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>

			<?php
			$extra_text = get_field('extra_text');
			if ($extra_text) : ?>
				<div class="tw-mt-12 normalizeText">
					<?php echo $extra_text ?>
				</div>
			<?php endif; ?>

			<?php if (have_rows('accordion')) : ?>
				<div class="tw-mt-12">
					<h3 class="tw-flex tw-items-center tw-justify-center tw-text-medium tw-text-[22px] lg:tw-text-[28px] tw-font-serif tw-italic tw-mb-8 before:tw-hidden lg:before:tw-block before:tw-bg-medium before:tw-block before:tw-h-px before:tw-grow before:tw-mr-4 after:tw-hidden lg:after:tw-block after:tw-bg-medium after:tw-block after:tw-h-px after:tw-grow after:tw-ml-4">Seminarios</h3>
					<?php while (have_rows('accordion')) : the_row(); ?>
						<button class="accTrigger"><?php the_sub_field('title');  ?></button>
						<div class="accContent">
							<?php if (have_rows('seminarios')) : ?>
								<?php while (have_rows('seminarios')) : the_row(); ?>
									<div class="tw-flex tw-flex-col lg:tw-flex-row tw-border-b tw-border-light last:tw-border-0 tw-py-5 lg:tw-pt-6 lg:tw-pb-10 tw-space-y-5 lg:tw-space-y-0 lg:tw-space-x-6">
										<div class="tw-w-full lg:tw-w-7/12">
											<p class="tw-text-medium tw-text-sm">Seminario</p>
											<h4 class="tw-text-red tw-font-bold tw-italic tw-text-[18px] tw-font-serif tw-mb-3"><?php the_sub_field('seminario');  ?></h4>
											<?php the_sub_field('description');  ?>
										</div>
										<div class="tw-w-full lg:tw-w-3/12">
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
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
		</div>

		<div id="profs" class="tabContent">
			<?php if (have_rows('profesores')) : ?>
				<h3 class="tw-text-red tw-text-lg lg:tw-text-xl tw-mb-7">Claustro de profesores</h3>
				<div class="tw-grid lg:tw-grid-cols-3 tw-gap-7">
					<?php while (have_rows('profesores')) : the_row(); ?>
						<div class="tw-flex tw-flex-col tw-border-b tw-border-cream tw-pb-7">
							<h5 class="tw-font-bold"><?php the_sub_field('nombre') ?></h5>
							<p class="tw-text-medium tw-mb-3 tw-min-h-[24px]"><?php the_sub_field('credenciales') ?></p>
							<p class=""><?php the_sub_field('semblanza') ?></p>
						</div>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
		</div>

		<div id="reqs" class="tabContent normalizeText tw-max-w-screen-md tw-mx-auto">
			<?php the_field('requisitos') ?>
		</div>

		<div id="fechas" class="tabContent normalizeText tw-max-w-screen-sm tw-mx-auto">
			<?php the_field('fechas_y_cuotas') ?>
		</div>

	</div>
</div>
<?php get_footer(); ?>