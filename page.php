<?php get_header(); ?>


<section class="page">
	<div class="container">



		<h1>
			<?php the_title(); ?>
		</h1>

		<?php if ( have_posts() ) :
			while ( have_posts() ) :
				the_post(); ?>

				<?php the_content(); ?>

				<!-- 				<?php
				// 				$date_string = get_field( 'birthday', $post->ID );  
// 				$date = DateTime::createFromFormat( 'Ymd', $date_string );  
// 				$interval = $date->diff( new DateTime );  
// 				echo '(' .$interval->y.' ans)'; 
				?> -->
				<?php if ( $wysitest = get_field( 'wysitest' ) ) : ?>
					<?php echo $wysitest; ?> <!-- Code for loading the wysiwyg field -->
				<?php endif; ?>

			<?php endwhile; else : endif; ?>



	</div>
</section>

<?php get_footer(); ?>