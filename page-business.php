<?php /* Template Name: Business Template */?>
<?php
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );
?>
<?php get_header() ?>
<main>
	<section class="section-common-keyvisual js-keyvisual">
		<div class="wrapper">
			<h1 class="keyvisual-title wow fade-in"><span class="is-japan">事業概要</span><span
					class="is-english">BUSINESS</span></h1>
		</div>
	</section>
	<div class="block-heading">
		<div class="anchor-common">
			<div class="wrapper">
				<ul class="anchor-list">
					<?php
					$business = get_field( 'business' );
					if ( is_array( $business ) )
						foreach ( $business as $b ) :
							$title_layout = null;
							foreach ( $b['contents'] as $c )
								if ( $c['acf_fc_layout'] == 'title' ) {
									$title_layout = $c;
									break;
								}
							?>
							<li class="anchor-item"><a class="trans" href="#<?php echo $title_layout['title']; ?>">
									<?php echo $title_layout['title']; ?>
								</a></li>
						<?php endforeach; ?>
				</ul>
			</div>
		</div>
		<nav class="breadcrumb">
			<ol class="breadcrumb-list">
				<li><a href="<?php echo home_url(); ?>/">HOME</a></li>
				<li>事業概要</li>
			</ol>
		</nav>
	</div>
	<div class="section-business-intro">
		<div class="wrapper">
			<div class="intro-heading wow fade-in">
				<p class="heading-text"><span class="md">CPA Excellent Partners</span><br>With three businesses that
					will accompany you throughout your life,<br class="md">We support the enriching lives of all
					accounting personnel.</p>
				<p class="heading-description">
					We, CPA Excellent Partners Co., Ltd., aim to expand the potential of all accounting personnel
					through comprehensive support such as "learning support," "career support," and "human resources
					exchange support."
					In addition to expanding the qualification school "CPA Accounting Academy" nationwide, which boasts
					a 41.6% pass rate for the certified public accountant exam (2022), we also offer "CPA Learning", an
					e-learning platform where anyone can easily learn bookkeeping and accounting for free. ,
					We operate ``CPASS,'' a lifelong support service for accounting personnel, including ``CPASS
					Career,'' a recruitment service specializing in accounting personnel.
				</p>
			</div>
			<div class="intro-image wow fade-in"><img class="image-common md"
					src="<?php echo get_template_directory_uri(); ?>/img/business/intro_img.png"
					alt="CPAエクセレントパートナーズは 生涯に寄り添う3つの事業で、 あらゆる会計人材の豊かな人生を応援します" loading="eager" width="1002"
					height="768"><img class="image-common sm"
					src="<?php echo get_template_directory_uri(); ?>/img/business/sp/intro_img.png"
					alt="CPAエクセレントパートナーズは 生涯に寄り添う3つの事業で、 あらゆる会計人材の豊かな人生を応援します" loading="eager" width="352" height="588">
			</div>
		</div>
	</div>
	<?php if ( is_array( $business ) )
		foreach ( $business as $b ) :
			$title_layout = null;
			foreach ( $b['contents'] as $c )
				if ( $c['acf_fc_layout'] == 'title' ) {
					$title_layout = $c;
					break;
				} ?>
			<section class="section-business-detail <?php echo $title_layout['pattern']; ?>"
				id="<?php echo $title_layout['title']; ?>">
				<?php if ( $title_layout['pattern'] != 'is-custom' ) : ?>
					<div class="detail-heading wow fade-in">
						<div class="wrapper">
							<h2 class="title-common-tertiary"><span class="is-big">
									<?php echo $title_layout['title']; ?>
								</span>
								<?php if ( $title_layout['catchcopy'] ) : ?><span class="is-small">
										<?php echo $title_layout['catchcopy']; ?>
									</span>
								<?php endif; ?>
							</h2>
						</div>
					</div>
				<?php endif; ?>
				<div class="wrapper">
					<div class="detail-wrapper wow fade-in">
						<?php if ( $title_layout['pattern'] == 'is-custom' ) : ?>
							<h2 class="title-common-tertiary is-custom"><span class="is-big">
									<?php echo $title_layout['title']; ?>
								</span>
								<?php if ( $title_layout['catchcopy'] ) : ?><span class="is-small">
										<?php echo $title_layout['catchcopy']; ?>
									</span>
								<?php endif; ?>
							</h2>
						<?php endif; ?>
						<?php if ( is_array( $b['contents'] ) )
							foreach ( $b['contents'] as $c ) : ?>

								<?php if ( $c['acf_fc_layout'] == 'main' ) : ?>
									<div class="detail-main">
										<div class="detail-content">
											<?php if ( $c['logo'] ) : ?>
												<div class="detail-logo">
													<?php echo wp_get_attachment_image( $c['logo'], 'full' ); ?>
												</div>
											<?php endif; ?>
											<?php if ( $c['title'] ) : ?>
												<h3 class="detail-title">
													<?php echo str_replace( '<br />', '<br class="md" />', $c['title'] ); ?>
												</h3>
											<?php endif; ?>
											<?php if ( $c['body'] ) : ?>
												<p class="detail-description">
													<?php echo $c['body']; ?>
												</p>
											<?php endif; ?>
										</div>
										<?php if ( isset( $c['slides'] ) && is_array( $c['slides'] ) ) : ?>
											<div
												class="<?php if ( count( $c['slides'] ) > 1 ) : ?>js-slider-business<?php endif; ?> business-slider">
												<?php if ( is_array( $c['slides'] ) )
													foreach ( $c['slides'] as $img )
														echo '<figure class="slider-image">' . wp_get_attachment_image( $img, 'full', false, array( 'class' => 'object-common' ) ) . '</figure>'; ?>
											</div>
										<?php endif; ?>
									</div>

								<?php elseif ( $c['acf_fc_layout'] == 'data' ) : ?>
									<div class="detail-chart">
										<?php if ( is_array( $c['contents2'] ) )
											foreach ( $c['contents2'] as $c2 ) : ?>
												<div class="chart-block">
													<h3 class="chart-title">
														<?php echo str_replace( '※', '<span class="is-small">※</span>', $c2['title'] ); ?>
													</h3>
													<?php if ( $c2['img'] ) : ?>
														<figure class="chart-image">
															<?php echo wp_get_attachment_image( $c2['img'], 'full' ); ?>
														</figure>
													<?php else : ?>
														<div class="post-content chart-text">
															<?php echo str_replace( '<ul>', '<ul class="chart-list">', $c2['body'] ); ?>
														</div>
													<?php endif; ?>
												</div>
											<?php endforeach; ?>
									</div>

								<?php elseif ( $c['acf_fc_layout'] == 'note' ) : ?>
									<div class="detail-note">
										<p>
											<?php echo $c['body']; ?>
										</p>
									</div>

								<?php elseif ( $c['acf_fc_layout'] == 'point' ) : ?>
									<div class="detail-point">
										<h3 class="point-title"><span>POINT</span></h3>
										<div class="point-inner">
											<?php if ( $c['img'] ) : ?>
												<figure class="point-image">
													<?php echo wp_get_attachment_image( $c['img'], 'full' ); ?>
												</figure>
											<?php endif; ?>
											<?php if ( $c['img'] ) : ?>
												<?php if ( $c['title'] || $c['body'] ) : ?>
													<div class="point-content">
														<?php if ( $c['title'] ) : ?>
															<h4 class="point-heading">
																<?php echo $c['title']; ?>
															</h4>
														<?php endif; ?>
														<?php if ( $c['body'] ) : ?>
															<p class="point-text">
																<?php echo $c['body']; ?>
															</p>
														<?php endif; ?>
													</div>
												<?php endif; ?>
											<?php else : ?>
												<?php if ( $c['title'] || $c['body'] ) : ?>
													<?php if ( $c['title'] ) : ?>
														<h4 class="point-heading">
															<?php echo $c['title']; ?>
														</h4>
													<?php endif; ?>
													<?php if ( $c['body'] ) : ?>
														<p class="point-text">
															<?php echo $c['body']; ?>
														</p>
													<?php endif; ?>
												<?php endif; ?>
											<?php endif; ?>
										</div>
									</div>

								<?php elseif ( $c['acf_fc_layout'] == 'youtube' ) : ?>
									<div class="detail-video">
										<div class="video-wrapper">
											<div class="video-youtube js-youtube" id="<?php echo $c['youtube-id']; ?>"
												data-video="<?php echo $c['youtube-id']; ?>"></div>
										</div>
									</div>

								<?php elseif ( $c['acf_fc_layout'] == 'link' ) : ?><a class="button-common-primary is-blank"
										href="<?php echo $c['url']; ?>" target="_blank" rel="noopener">
										<?php echo $c['title']; ?>
									</a>
								<?php endif; ?>
							<?php endforeach; ?>
					</div>
				</div>
			</section>
		<?php endforeach; ?>
</main>
<?php get_footer() ?>