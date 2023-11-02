<?php
/**
 * Block Name: linkrenderssafari
 * Description: Testing acf link render on Safari
 */


$resources = get_field( 'resources_to_link' );
?>

<?php if ( ! empty( $resources ) ) : ?>
	<section class="p-10 border-2 border-border-primary border-solid rounded-6 mb-20">
		<div class="flex flex-col gap-10">
			<?php foreach ( $resources as $resource ) : ?>
				<div>
					<?php if ( ! empty( $resource['name'] ) ) : ?>
						<h4 class="mb-6">
							<?= $resource['name'] ?>
						</h4>
					<?php endif; ?>

					<?php if ( $resource['fichier_ou_lien'] == 'Fichier' ) :
						$file = $resource['file_to_link']['file'];
						$title = $resource['file_to_link']['title'];
						?>
						<?php if ( ! empty( $file ) ) : ?>
							<a href="<?= $file['url'] ?>" download class="btn btn--filled">
								<?php if ( ! empty( $title ) ) : ?>
									<?= $title ?>
								<?php else : ?>
									Download file
								<?php endif; ?>
							</a>
						<?php endif; ?>
					<?php elseif ( ! empty( $resource['link'] ) ) :
						$link = $resource['link'] ?>
						<a href="<?= $link['url'] ?>" class="btn btn--filled"
							target="<?= ! empty( $link['target'] ) ? $link['target'] : '_self' ?>">
							<?php if ( ! empty( $link['title'] ) ) : ?>
								<?= $link['title'] ?>
							<?php else : ?>
								Follow link
							<?php endif; ?>
						</a>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</section>
<?php endif; ?>