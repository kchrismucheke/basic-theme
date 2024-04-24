<?php /* Template Name: Demos Template */ ?>
<?php
if ( get_row_layout() == 'steps_new' ) :
	$block_title_new = get_sub_field( 'steps_title_new' );
	$steps_description_new = get_sub_field( 'steps_description_new' );

	$bg_color_new = get_sub_field( 'background_color_new' );
	?>

	<section class="<?= $bg_color_new ? "custom-background" : 'default-background'; ?>">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php if ( $block_title_new ) : ?>
						<h2 class="block-title"><?= $block_title_new; ?></h2>
					<?php endif; ?>
					<?php if ( $steps_description_new ) : ?>
						<div class="description">
							<?= $steps_description_new; ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="col-md-12">
					<?php if ( have_rows( 'steps_repeater_new' ) ) : ?>
						<div class="steps">
							<?php while ( have_rows( 'steps_repeater_new' ) ) :
								the_row();
								$icon_or_number_new = get_sub_field( 'icon_or_number_new' );
								$title_new = get_sub_field( 'title_new' );
								$description_new = get_sub_field( 'description_new' );
								?>
								<div class="step">
									<?php if ( $icon_or_number_new ) {
										echo "<span class='icon-number'>$icon_or_number_new</span>";
									} ?>
									<h3 class="step-title"><?= $title_new; ?></h3>
									<div class="step-description"><?= $description_new; ?></div>
								</div>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

<?php endif; ?>