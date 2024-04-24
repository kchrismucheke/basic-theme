<?php /* Template Name: Flex Test Template */ ?>
<?php
// check if the flexible content field has rows of data.
if ( have_rows( 'blocks' ) ) :
	// loop through the rows of data.
	$i = 1;
	$block_i = 1;
	while ( have_rows( 'blocks' ) ) :
		the_row();

		$layout = get_row_layout();
		$layout = str_replace( '_', '-', $layout );

		//Block outer
		$background_color = get_sub_field( 'background_color' );
		$margin_sizes = get_sub_field( 'margin_size' );
		$padding_size = get_sub_field( 'padding_size' );
		$base_title = get_sub_field( 'title' );
		$base_intro = get_sub_field( 'intro' );
		$no_min_height = get_sub_field( 'no_min_height' );
		$margin_class = '';
		foreach ( $margin_sizes as $margin_size ) {
			$margin_class .= ' my-' . $margin_size;
		}

		if ( $layout == 'rating' && $padding_size != 'md' )
			$padding_size = 'lg';
		$inner_layout = get_sub_field( 'layout' );
		$layout_class = $layout;
		if ( $layout == 'form' && get_sub_field( 'simple_form' ) )
			$layout_class = 'form-simple'
				?>

		<?php if ( $layout == 'defaults' ) : ?>
			<?php $default_layout = get_sub_field( 'layout' ); ?>
			<?php include locate_template( 'tpl/blocks/default-' . $default_layout . '.php' ); ?>
		<?php else : ?>
			<?php if ( get_sub_field( 'in_container' ) )
				$padding_size = 0; ?>
			<section id="<?php if ( get_sub_field( 'custom_id' ) ) :
				echo get_sub_field( 'custom_id' );
			else :
				echo 'block-' . $block_i;
			endif; ?>" class="block block--<?php echo $layout_class;
			 if ( $inner_layout )
				 echo ' block--' . $layout . '--' . $inner_layout; ?> background-<?php echo $background_color;
						  if ( $background_color == 'blue' )
							  echo ' color-white'; ?> <?php echo $margin_class; ?> <?php if ( $layout != 'text-image' )
										 echo 'py-' . $padding_size; ?> <?php if ( $no_min_height )
												  echo 'no-min-height'; ?>">
				<?php /*include locate_template( 'tpl/blocks/block-' . $layout . '.php' ); */ ?>
			</section>

		<?php endif; ?>
		<?php
		$block_i++;
		$i++;
	endwhile;

endif;
$base_title = null;
?>