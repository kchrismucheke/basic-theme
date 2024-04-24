<?php
/**
 *
 * Template Name: Selzy Feature Конструктор блоков
 *
 */
?>
<?php //include_once('HomePageNew3/blocks/head.php'); ?>

<?php if ( have_rows( 'flexible_content' ) ) :
	while ( have_rows( 'flexible_content' ) ) :
		the_row();
		if ( get_row_layout() == '2_images_section' ) : ?>
			<link rel="stylesheet" href="#" />
		<?php endif;
	endwhile;
endif; ?>

<link rel="stylesheet" type="text/css" href="#" />

</head>

<body class="page">
	<?php //include_once ( 'HomePageNew3/blocks/header.php' ); ?>

	<!-- Custom HTML -->
	<main class="page-main">
		<?php if ( have_rows( 'flexible_content' ) ) : ?>
			<?php while ( have_rows( 'flexible_content' ) ) :
				the_row(); ?>

				<?php if ( get_row_layout() === 'head' ) :
					$title = get_sub_field( 'title' );
					$descr = get_sub_field( 'descr' );
					$btn = get_sub_field( 'btn' );
					$image = get_sub_field( 'image' );
					$left_title = get_sub_field( 'left_title' );
					$left_descr = get_sub_field( 'left_descr' );
					$right_title = get_sub_field( 'right_title' );
					$head_text_for_btn = get_sub_field( 'head_text_for_btn' );
					?>

					<section class="head">
						<div class="container">
							<div class="breadcrumbs_wrapper">
								<?php yoast_breadcrumb(); ?>
							</div>

							<div class="row justify-content-between align-items-center">
								<div class="col-lg-6 head__text-block">
									<?php if ( $title ) : ?>
										<h1 class="h1"><?php echo $title; ?></h1>
									<?php endif; ?>
									<?php if ( $descr ) : ?>
										<p class="head__description"><?php echo $descr; ?></p>
									<?php endif; ?>
									<?php if ( $btn ) :
										$btn_url = $btn['url'];
										$btn_title = $btn['title'];
										$btn_target = $btn['target'] ? $btn['target'] : '_self';
										$noopener = $btn['target'] ? 'rel="noopener"' : null;
										?>
										<div class="head__btn_block">
											<a class="btn btn-green head__btn" <?php echo $noopener; ?>
												href="<?= esc_url( $btn_url ); ?>"
												target="<?= esc_attr( $btn_target ); ?>"><?= esc_html( $btn_title ); ?></a>
											<?php if ( ! empty( $head_text_for_btn ) ) : ?>
												<div class="head__text_for_btn"> <?= $head_text_for_btn; ?></div>
											<?php endif; ?>
										</div>
									<?php endif; ?>
								</div>

								<?php if ( $image ) : ?>
									<div class="col-lg-6 head__image-wrapper">
										<img class="img-responsive" src="<?php echo $image['url']; ?>" width="507" height="422"
											alt="<?php echo $image['alt']; ?>">
									</div>
								<?php endif; ?>
							</div>

							<div class="head__info">
								<div class="head__left">
									<?php if ( $left_title ) : ?>
										<h2 class="h2"><?php echo $left_title; ?></h2>
									<?php endif; ?>
									<?php if ( $left_descr ) : ?>
										<p><?php echo $left_descr; ?></p>
									<?php endif; ?>
								</div>
								<div class="head__right">
									<?php if ( $right_title ) : ?>
										<h3 class="h3"><?php echo $right_title; ?></h3>
									<?php endif; ?>
									<?php if ( have_rows( 'head_list' ) ) : ?>
										<ul class="rhomb-list">
											<?php while ( have_rows( 'head_list' ) ) :
												the_row();
												$head_item = get_sub_field( 'head_item' );
												?>
												<li class="rhomb-list__item"><span><?php echo $head_item; ?></span></li>
											<?php endwhile; ?>
										</ul>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</section>
				<?php endif; ?>

				<?php if ( get_row_layout() == 'cta' ) :
					$title = get_sub_field( 'title' );
					$descr_h2 = get_sub_field( 'descr_h2' );
					$descr = get_sub_field( 'descr' );
					$btn = get_sub_field( 'btn' );
					$cta_text_for_btn = get_sub_field( 'cta_text_for_btn' );
					?>
					<section class="cta cta--center">
						<div class="container">
							<?php if ( $title ) : ?>
								<h2 class="h2--center"><?php echo $title; ?></h2>
							<?php endif; ?>

							<?php if ( $descr_h2 ) : ?>
								<div class="descr-h2"><?php echo $descr_h2; ?></div>
							<?php endif; ?>

							<?php if ( $btn ) :
								$btn_url = $btn['url'];
								$btn_title = $btn['title'];
								$btn_target = $btn['target'] ? $btn['target'] : '_self';
								$noopener = $btn['target'] ? 'rel="noopener"' : null;
								?>
								<a class="btn btn-green" <?php echo $noopener; ?> href="<?php echo esc_url( $btn_url ); ?>"
									target="<?php echo esc_attr( $btn_target ); ?>"><?php echo esc_html( $btn_title ); ?></a>
								<?php if ( ! empty( $cta_text_for_btn ) ) : ?>
									<div class="text_for_btn"><?php echo $cta_text_for_btn; ?></div>
								<?php endif; ?>
							<?php endif; ?>
							<?php if ( $descr ) : ?>
								<p><?php echo $descr; ?></p>
							<?php endif; ?>
						</div>
					</section>
				<?php endif; ?>

				<?php if ( get_row_layout() == 'tabs' ) :
					$title = get_sub_field( 'title' );
					$descr = get_sub_field( 'descr' );
					$pomenyat_mestami = get_sub_field( 'pomenyat_mestami' );
					$btn = get_sub_field( 'btn' );
					$tabs_text_for_btn = get_sub_field( 'tabs_text_for_btn' );
					?>
					<section class="tabs">
						<div class="container">
							<h2 class="h2 h2--center"><?php echo $title; ?></h2>
							<?php if ( $descr ) : ?>
								<div class="descr-h2"><?php echo $descr; ?></div>
							<?php endif; ?>
							<div class="tabs__row <?= $pomenyat_mestami ? "tabs__row--reverse" : ''; ?>">
								<div class="progress">
									<span class="progress__current">1</span>/<span class="progress__count">3</span>
									<span class="progress__line"><span></span></span>
								</div>
								<div class="tabs__nav">
									<?php if ( have_rows( 'tabs_list' ) ) :
										while ( have_rows( 'tabs_list' ) ) :
											the_row();
											$tab_title = get_sub_field( 'tab_title' );
											$tab_descr = get_sub_field( 'tab_descr' );
											$tab_img = get_sub_field( 'tab_img' );
											?>
											<div class="tabs__item">
												<?php if ( $tab_title ) : ?>
													<h3 class="h3 tabs__title"><?php echo $tab_title; ?></h3>
												<?php endif; ?>
												<div class="tabs__item-content">
													<?php if ( $tab_img ) : ?>
														<div class="tabs__image-wrapper">
															<img class="img-responsive lazyload" data-src="<?php echo $tab_img['url']; ?>"
																width="580" height="490" alt="<?php echo $tab_img['alt']; ?>">
														</div>
													<?php endif; ?>
													<?php if ( $tab_descr ) :
														echo $tab_descr;
													endif; ?>
												</div>
											</div>
										<?php endwhile; ?>
									<?php endif; ?>
								</div>
								<div class="tabs__content"></div>
							</div>

							<?php if ( $btn ) :
								$btn_url = $btn['url'];
								$btn_title = $btn['title'];
								$btn_target = $btn['target'] ? $btn['target'] : '_self';
								$noopener = $btn['target'] ? 'rel="noopener"' : null;
								?>
								<div class="wrap_btn">
									<a class="btn btn-green" <?php echo $noopener; ?> href="<?php echo esc_url( $btn_url ); ?>"
										target="<?php echo esc_attr( $btn_target ); ?>"><?php echo esc_html( $btn_title ); ?></a>
									<?php if ( ! empty( $tabs_text_for_btn ) ) : ?>
										<div class="text_for_btn"><?php echo $tabs_text_for_btn; ?></div>
									<?php endif; ?>
								</div>
							<?php endif; ?>

						</div>
					</section>
				<?php endif; ?>

				<?php if ( get_row_layout() == '2_columns' ) :
					$title = get_sub_field( 'title' );
					$descr = get_sub_field( 'descr' );
					?>
					<section class="two-columns">
						<div class="container">
							<h2 class="h2 h2--center"><?php echo $title; ?></h2>
							<?php if ( $descr ) : ?>
								<div class="descr-h2"><?php echo $descr; ?></div>
							<?php endif; ?>
							<?php if ( have_rows( 'column_list' ) ) : ?>
								<ul class="two-columns__list">
									<?php while ( have_rows( 'column_list' ) ) :
										the_row();
										$item_icon = get_sub_field( 'item_icon' );
										$item_title = get_sub_field( 'item_title' );
										$item_descr = get_sub_field( 'item_descr' );
										?>
										<li class="two-columns__item">
											<?php if ( $item_icon ) : ?>
												<div class="two-columns__image-wrapper">
													<img class="img-responsive lazyload" data-src="<?php echo $item_icon['url']; ?>" width="80"
														height="80" alt="<?php echo $item_icon['alt']; ?>">
												</div>
											<?php endif; ?>
											<?php if ( $item_title ) : ?>
												<h3 class="h3"><?php echo $item_title; ?></h3>
											<?php endif; ?>
											<?php if ( $item_descr ) : ?>
												<p><?php echo $item_descr; ?></p>
											<?php endif; ?>
										</li>
									<?php endwhile; ?>
								</ul>
							<?php endif; ?>
						</div>
					</section>
				<?php endif; ?>

				<?php if ( get_row_layout() == 'text_image' ) :
					$title = get_sub_field( 'title' );
					$subtitle = get_sub_field( 'subtitle' );
					$descr = get_sub_field( 'descr' );
					$descr_h2 = get_sub_field( 'descr_h2' );
					$image = get_sub_field( 'image' );
					$bg_color = get_sub_field( 'bg_color' );
					$link = get_sub_field( 'link' );
					?>
					<section class="text-image" <?= $bg_color ? "style='background-color: $bg_color'" : ''; ?>>
						<div class="container">
							<?php if ( $title ) : ?>
								<h2 class="h2 h2--center"><?php echo $title; ?></h2>
							<?php endif; ?>
							<?php if ( $descr_h2 ) : ?>
								<div class="descr-h2"><?php echo $descr_h2; ?></div>
							<?php endif; ?>
							<div class="row justify-content-between wrap-composition">
								<div class="col-lg-6 order-2 order-lg-1 text-image__text">
									<?php if ( $subtitle ) : ?>
										<h3 class="h3"><?php echo $subtitle; ?></h3>
									<?php endif; ?>
									<?php if ( $descr ) :
										echo $descr;
									endif; ?>

									<?php if ( $link ) :
										$link_url = $link['url'];
										$link_title = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
										$noopener = $link['target'] ? 'rel="noopener"' : null;
										?>
										<div class="wrap-link">
											<a class="link-purple" <?php echo $noopener; ?> href="<?php echo esc_url( $link_url ); ?>"
												target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
										</div>
									<?php endif; ?>
								</div>
								<?php if ( $image ) : ?>
									<?php //if ($image_desktop): ?>
									<div class="col-lg-6 order-1 order-lg-2 text-image__image-wrapper">
										<!--<picture>
						<source media="(max-width: 991px)"
							 data-srcset="<?php /*echo $image_mobile; */ ?> 1x, <?php /*echo $image_mobile2x; */ ?> 2x">
						<img class="img-responsive lazyload" width="580" height="273" alt="<?php /*echo $image_alt; */ ?>"
							 data-src="<?php /*echo $image_desktop; */ ?>" data-srcset="<?php /*echo $image_desktop2x; */ ?> 2x">
					</picture>-->
										<img class="img-responsive lazyload" data-src="<?php echo $image['url']; ?>" width="580"
											height="273" alt="<?php echo $image['alt']; ?>">
									</div>
								<?php endif; ?>
							</div>
						</div>
					</section>
				<?php endif; ?>

				<?php if ( get_row_layout() == '3_columns' ) :
					$title = get_sub_field( 'title' );
					$descr_h2 = get_sub_field( 'descr_h2' );
					$bg_color = get_sub_field( 'bg_color' );
					$btn = get_sub_field( 'btn' );
					$three_columns_text_for_btn = get_sub_field( 'three_columns_text_for_btn' );
					?>
					<section class="three-columns" <?= $bg_color ? "style='background-color: $bg_color'" : ''; ?>>
						<div class="container">
							<h2 class="h2 h2--center"><?php echo $title; ?></h2>
							<?php if ( $descr_h2 ) : ?>
								<div class="descr-h2"><?php echo $descr_h2; ?></div>
							<?php endif; ?>
							<?php if ( have_rows( 'column_list' ) ) : ?>
								<div class="row three-columns__row">
									<?php while ( have_rows( 'column_list' ) ) :
										the_row();
										$item_icon = get_sub_field( 'item_icon' );
										$item_title = get_sub_field( 'item_title' );
										$item_descr = get_sub_field( 'item_descr' );
										?>
										<div class="col-lg-4 three-columns__item">
											<?php if ( $item_icon ) : ?>
												<div class="three-columns__image-wrapper">
													<img class="img-responsive lazyload" data-src="<?php echo $item_icon['url']; ?>" width="80"
														height="80" alt="<?php echo $item_icon['alt']; ?>">
												</div>
											<?php endif; ?>
											<?php if ( $item_title ) : ?>
												<h3 class="h3"><?php echo $item_title; ?></h3>
											<?php endif; ?>
											<?php if ( $item_descr ) :
												echo $item_descr;
											endif; ?>
										</div>
									<?php endwhile; ?>
								</div>
							<?php endif; ?>
							<?php if ( $btn ) :
								$btn_url = $btn['url'];
								$btn_title = $btn['title'];
								$btn_target = $btn['target'] ? $btn['target'] : '_self';
								$noopener = $btn['target'] ? 'rel="noopener"' : null;
								?>
								<div class="wrap_btn">
									<a class="btn btn-green" <?php echo $noopener; ?> href="<?php echo esc_url( $btn_url ); ?>"
										target="<?php echo esc_attr( $btn_target ); ?>"><?php echo esc_html( $btn_title ); ?></a>
									<?php if ( ! empty( $three_columns_text_for_btn ) ) : ?>
										<div class="text_for_btn"><?php echo $three_columns_text_for_btn; ?></div>
									<?php endif; ?>
								</div>
							<?php endif; ?>
						</div>
						</div>
					</section>
				<?php endif; ?>

				<?php if ( get_row_layout() == 'faq' ) :
					$title = get_sub_field( 'title' );
					$answer_title = get_sub_field( 'answer_title' );
					?>
					<?php if ( ICL_LANGUAGE_CODE === 'en' ) : ?>
						<section class="customers_section">
							<img class="bg-image" width="128" height="24" loading="lazy"
								src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/customers-bg-arrow.svg" alt="Selzy">
							<div class="container">
								<div class="row">
									<div class="col-lg-4">
										<div class="wrap-composition">
											<h2 class="h2">50,000+ customers can't be wrong...</h2>
											<p>Selzy is the easiest way to start selling with email. But don't just take our word for
												it,
												here's what our clients say</p>
											<div class="rating">
												<div class="rating_count">
													4.8 / 5
												</div>
												<div class="rating_stars">
													<img class="img-responsive" width="128" height="24" loading="lazy"
														src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/rating-stars-4-85.svg"
														alt="Selling with emails">
												</div>
											</div>
											<div class="rating_descr">
												based on 500+ reviews
											</div>
										</div>
									</div>
									<div class="col-lg-8">
										<div class="review_slider owl-carousel">
											<div class="review_slide">
												<div class="h4 title">"This email marketing platform surprised us"</div>
												<div class="stars">
													<img class="img-responsive" width="112" height="16" loading="lazy"
														src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/rating-stars-5.svg"
														alt="Selling with emails">
												</div>
												<blockquote>
													<p>A true gem we discovered in a huge pile of email marketing software.
														Way more affordable than those big known brands, and it outperforms them!
														All we need for full blown email marketing campaigns.</p>
												</blockquote>
												<div class="person_wrap">
													<div class="wrap-img">
														<img class="img-person" width="44" height="44" loading="lazy"
															src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/review-person-1.webp"
															alt="Galyna M.">
														<img class="img-social" width="24" height="24" loading="lazy"
															src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/review-social-2.svg"
															alt="Selzy">
													</div>
													<div class="h5">Galyna M.</div>
												</div>
											</div>
											<div class="review_slide">
												<div class="h4 title">"Analytics break down is super"</div>
												<div class="stars">
													<img class="img-responsive" width="112" height="16" loading="lazy"
														src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/rating-stars-4-5.svg"
														alt="Selling with emails">
												</div>
												<blockquote>
													<p>The overview dashboard is something I really love, because of how easy it is
														to understand and the summary statistics of my overall opens, clicks and
														unsubscribe. The support desk is really great and quick to respond.</p>
												</blockquote>
												<div class="person_wrap">
													<div class="wrap-img">
														<img class="img-person" width="44" height="44" loading="lazy"
															src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/review-person-2.webp"
															alt="Anthony I.">
														<img class="img-social" width="24" height="24" loading="lazy"
															src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/review-social-2.svg"
															alt="Selzy">
													</div>
													<div class="h5">Anthony I.</div>
												</div>
											</div>
											<div class="review_slide">
												<div class="h4 title">"A no brainer, great piece of software"</div>
												<div class="stars">
													<img class="img-responsive" width="112" height="16" loading="lazy"
														src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/rating-stars-5.svg"
														alt="Selling with emails">
												</div>
												<blockquote>
													<p>Great UI, super easy to use and navigate around. I really love the ease of use
														and
														the amazing and attractive templates it has that makes it so simple.</p>
												</blockquote>
												<div class="person_wrap">
													<div class="wrap-img">
														<img class="img-person" width="44" height="44" loading="lazy"
															src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/review-person-3.png"
															alt="Sam B.">
														<img class="img-social" width="24" height="24" loading="lazy"
															src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/review-social-1.svg"
															alt="Selzy">
													</div>
													<div class="h5">Sam B.</div>
												</div>
											</div>
											<div class="review_slide">
												<div class="h4 title">"One of the best email services I've used"</div>
												<div class="stars">
													<img class="img-responsive" width="112" height="16" loading="lazy"
														src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/rating-stars-5.svg"
														alt="Selling with emails">
												</div>
												<blockquote>
													<p>Selzy is cost effective to the max and it makes it clear how my list health
														is going. Also top of the line support. We are talking minutes no matter
														what time I pinged the chat.</p>
												</blockquote>
												<div class="person_wrap">
													<div class="wrap-img">
														<img class="img-person" width="44" height="44" loading="lazy"
															src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/review-person-4.webp"
															alt="Oliver D.">
														<img class="img-social" width="24" height="24" loading="lazy"
															src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/review-social-2.svg"
															alt="Selzy">
													</div>
													<div class="h5">Oliver D.</div>
												</div>
											</div>
											<div class="review_slide">
												<div class="h4 title">"Value for money"</div>
												<div class="stars">
													<img class="img-responsive" width="112" height="16" loading="lazy"
														src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/rating-stars-5.svg"
														alt="Selling with emails">
												</div>
												<blockquote>
													<p>I have been extremely satisfied with Selzy and would highly recommend it to
														anyone looking for a reliable and user-friendly email campaign management tool.
														The analytics and reporting tools are top-notch, providing detailed insights
														into the performance of my campaigns.</p>
												</blockquote>
												<div class="person_wrap">
													<div class="wrap-img">
														<img class="img-person" width="44" height="44" loading="lazy"
															src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/review-person-5.png"
															alt="Anand S.">
														<img class="img-social" width="24" height="24" loading="lazy"
															src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/review-social-1.svg"
															alt="Selzy">
													</div>
													<div class="h5">Anand S.</div>
												</div>
											</div>
											<div class="review_slide">
												<div class="h4 title">"Amazing support and easy to use software"</div>
												<div class="stars">
													<img class="img-responsive" width="112" height="16" loading="lazy"
														src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/rating-stars-5.svg"
														alt="Selling with emails">
												</div>
												<blockquote>
													<p>I can run a campaign easily. It’s an alternative solution to the CRM+Email
														marketing tool I use on a daily basis.</p>
												</blockquote>
												<div class="person_wrap">
													<div class="wrap-img">
														<img class="img-person" width="44" height="44" loading="lazy"
															src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/review-person-6.png"
															alt="Jaimar F.">
														<img class="img-social" width="24" height="24" loading="lazy"
															src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/review-social-2.svg"
															alt="Selzy">
													</div>
													<div class="h5">Jaimar F.</div>
												</div>
											</div>
											<div class="review_slide">
												<div class="h4 title">"Super easy to use and super fast to built your emails"</div>
												<div class="stars">
													<img class="img-responsive" width="112" height="16" loading="lazy"
														src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/rating-stars-5.svg"
														alt="Selling with emails">
												</div>
												<blockquote>
													<p>Create email campaigns super fast, and having my email list on different
														categories
														is awesome. Been using Selzy a lot, no complaints at all.</p>
												</blockquote>
												<div class="person_wrap">
													<div class="wrap-img">
														<img class="img-person" width="44" height="44" loading="lazy"
															src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/review-person-7.png"
															alt="Yomar M.">
														<img class="img-social" width="24" height="24" loading="lazy"
															src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/review-social-2.svg"
															alt="Selzy">
													</div>
													<div class="h5">Yomar M.</div>
												</div>
											</div>
											<div class="review_slide">
												<div class="h4 title">"Email marketing software everyone must have"</div>
												<div class="stars">
													<img class="img-responsive" width="112" height="16" loading="lazy"
														src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/rating-stars-5.svg"
														alt="Selling with emails">
												</div>
												<blockquote>
													<p>Selzy is a one-stop solution for all your email marketing needs and it’s
														on a budget. Highly recommended for all marketers out there.</p>
												</blockquote>
												<div class="person_wrap">
													<div class="wrap-img">
														<img class="img-person" width="44" height="44" loading="lazy"
															src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/review-person-8.png"
															alt="Venkatesh M.">
														<img class="img-social" width="24" height="24" loading="lazy"
															src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/review-social-1.svg"
															alt="Selzy">
													</div>
													<div class="h5">Venkatesh M.</div>
												</div>
											</div>
											<div class="review_slide">
												<div class="h4 title">"Selzy won me over in 3 minutes"</div>
												<div class="stars">
													<img class="img-responsive" width="112" height="16" loading="lazy"
														src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/rating-stars-5.svg"
														alt="Selling with emails">
												</div>
												<blockquote>
													<p>I sent the first (test) campaign in less than 5 minutes. How did Selzy get me?
														Pleasant dashboard, clear statistics, including the deliverability of emails
														from the campaign, send an email to contacts who haven't opened the message
														(with one click), simple import of contacts</p>
												</blockquote>
												<div class="person_wrap">
													<div class="wrap-img">
														<img class="img-person" width="44" height="44" loading="lazy"
															src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/review-person-9.png"
															alt="Maroš">
														<img class="img-social" width="24" height="24" loading="lazy"
															src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/review-social-3.svg"
															alt="Selzy">
													</div>
													<div class="h5">Maroš</div>
												</div>
											</div>
											<div class="review_slide">
												<div class="h4 title">"Very Impressive! Absolute gem."</div>
												<div class="stars">
													<img class="img-responsive" width="112" height="16" loading="lazy"
														src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/rating-stars-5.svg"
														alt="Selling with emails">
												</div>
												<blockquote>
													<p>Great buy! The builder covers everything, I was looking at the large array of
														design
														templates. The UX/UI is just smooth. Selzy makes Mailchimp look pale in
														comparison.</p>
												</blockquote>
												<div class="person_wrap">
													<div class="wrap-img">
														<img class="img-person" width="44" height="44" loading="lazy"
															src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/review-person-10.png"
															alt="Ecclesia">
														<img class="img-social" width="24" height="24" loading="lazy"
															src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/review-social-3.svg"
															alt="Selzy">
													</div>
													<div class="h5">Ecclesia</div>
												</div>
											</div>
											<div class="review_slide">
												<div class="h4 title">"All-in-one app for email marketing"</div>
												<div class="stars">
													<img class="img-responsive" width="112" height="16" loading="lazy"
														src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/rating-stars-5.svg"
														alt="Selling with emails">
												</div>
												<blockquote>
													<p>Selzy covers your entire workflow from gathering prospective emails through web
														forms for opt-in to creating campaigns. No need for multiple apps.</p>
												</blockquote>
												<div class="person_wrap">
													<div class="wrap-img">
														<img class="img-person" width="44" height="44" loading="lazy"
															src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/review-person-11.png"
															alt="Kaizer">
														<img class="img-social" width="24" height="24" loading="lazy"
															src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/review-social-3.svg"
															alt="Selzy">
													</div>
													<div class="h5">Kaizer</div>
												</div>
											</div>
											<div class="review_slide">
												<div class="h4 title">"Best email marketing tool I've seen"</div>
												<div class="stars">
													<img class="img-responsive" width="112" height="16" loading="lazy"
														src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/rating-stars-5.svg"
														alt="Selling with emails">
												</div>
												<blockquote>
													<p>Selzy support is beyond excellent. Response time is less than 5 minutes,
														and staff is skilled.</p>
												</blockquote>
												<div class="person_wrap">
													<div class="wrap-img">
														<img class="img-person" width="44" height="44" loading="lazy"
															src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/review-person-12.png"
															alt="Creaktor">
														<img class="img-social" width="24" height="24" loading="lazy"
															src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/review-social-3.svg"
															alt="Selzy">
													</div>
													<div class="h5">Creaktor</div>
												</div>
											</div>
											<div class="review_slide">
												<div class="h4 title">"Emails in just click and go"</div>
												<div class="stars">
													<img class="img-responsive" width="112" height="16" loading="lazy"
														src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/rating-stars-5.svg"
														alt="Selling with emails">
												</div>
												<blockquote>
													<p>Selzy is an awesome tool for email marketing. The team is cooperative and they
														are
														keen to make it possible for users to maximize the CRM advantage possibility.
													</p>
												</blockquote>
												<div class="person_wrap">
													<div class="wrap-img">
														<img class="img-person" width="44" height="44" loading="lazy"
															src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/review-person-13.png"
															alt="Sayyam">
														<img class="img-social" width="24" height="24" loading="lazy"
															src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/review-social-3.svg"
															alt="Selzy">
													</div>
													<div class="h5">Sayyam</div>
												</div>
											</div>
											<div class="review_slide">
												<div class="h4 title">"Simplify email handling and enhance marketing"</div>
												<div class="stars">
													<img class="img-responsive" width="112" height="16" loading="lazy"
														src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/rating-stars-5.svg"
														alt="Selling with emails">
												</div>
												<blockquote>
													<p>The best thing about Selzy is its ability to manage marketing emails with
														fantastic
														templates, simplifying the process.</p>
												</blockquote>
												<div class="person_wrap">
													<div class="wrap-img">
														<img class="img-person" width="44" height="44" loading="lazy"
															src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/review-person-14.png"
															alt="Santosh K.">
														<img class="img-social" width="24" height="24" loading="lazy"
															src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/review-social-4.svg"
															alt="Selzy">
													</div>
													<div class="h5">Santosh K.</div>
												</div>
											</div>
										</div>
										<div class="customers_bottom">
											<div class="h5">There’s more</div>
											<p>Learn how we helped other businesses meet their goals. See more reviews on </p>
											<div class="customers_bottom__images">
												<img class="img-responsive" width="100" height="24" loading="lazy"
													src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/customers-soc-1.svg"
													alt="Selzy">
												<img class="img-responsive" width="100" height="24" loading="lazy"
													src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/customers-soc-2.png"
													alt="Selzy">
												<img class="img-responsive" width="100" height="24" loading="lazy"
													src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/customers-soc-3.svg"
													alt="Selzy">
												<img class="img-responsive" width="100" height="24" loading="lazy"
													src="<?= get_template_directory_uri(); ?>/templates/selzy-home/img/customers-soc-4.svg"
													alt="Selzy">
											</div>
										</div>
									</div>
								</div>
							</div>
						</section>
					<?php endif; ?>
					<section class="faq" itemscope itemtype="https://schema.org/FAQPage">
						<div class="container">
							<h2 class="h2 h2--center"><?php echo $title; ?></h2>
							<div class="faq__row">
								<div class="faq__nav">
									<?php if ( have_rows( 'faq_repeater' ) ) :
										while ( have_rows( 'faq_repeater' ) ) :
											the_row();
											$question = get_sub_field( 'question' );
											$answer = get_sub_field( 'answer' );
											?>
											<div class="faq__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
												<?php if ( $question ) : ?>
													<h3 class="faq__question" itemprop="name"><?php echo $question; ?></h3>
												<?php endif; ?>
												<?php if ( $answer ) : ?>
													<div class="faq__answer" itemscope itemprop="acceptedAnswer"
														itemtype="https://schema.org/Answer">
														<div itemprop="text">
															<?php if ( $answer_title ) : ?>
																<p class="faq__answer-title"><?php echo $answer_title; ?></p>
															<?php endif; ?>
															<?php echo $answer; ?>
														</div>
													</div>
												<?php endif; ?>
											</div>
										<?php endwhile; ?>
									<?php endif; ?>
								</div>
								<div class="faq__content"></div>
							</div>
						</div>
					</section>
				<?php endif; ?>

				<?php if ( get_row_layout() == 'end_cta' ) :
					$title = get_sub_field( 'title' );
					$descr = get_sub_field( 'descr' );
					$btn = get_sub_field( 'btn' );
					$text_for_btn = get_sub_field( 'text_for_btn', false );
					?>
					<section class="cta cta--end">
						<div class="container">
							<?php if ( $title ) : ?>
								<h2 class="h2 h2--center"><?php echo $title; ?></h2>
							<?php endif; ?>
							<?php if ( $descr ) : ?>
								<p><?php echo $descr; ?></p>
							<?php endif; ?>
							<?php if ( $btn ) :
								$btn_url = $btn['url'];
								$btn_title = $btn['title'];
								$btn_target = $btn['target'] ? $btn['target'] : '_self';
								$noopener = $btn['target'] ? 'rel="noopener"' : null;
								?>
								<a class="btn btn-green" <?php echo $noopener; ?> href="<?php echo esc_url( $btn_url ); ?>"
									target="<?php echo esc_attr( $btn_target ); ?>"><?php echo esc_html( $btn_title ); ?></a>
								<?php if ( ! empty( $text_for_btn ) ) : ?>
									<div class="text_for_btn"><?php echo $text_for_btn; ?></div>
								<?php endif; ?>
							<?php endif; ?>
						</div>
					</section>
				<?php endif; ?>


				<?php if ( get_row_layout() == '2_images_section' ) :
					$title = get_sub_field( 'title' );
					$descr_h2 = get_sub_field( 'descr_h2' );
					$bg_color = get_sub_field( 'bg_color' );
					?>
					<section class="twoImages_section" <?= $bg_color ? "style='background-color: $bg_color'" : ''; ?>>
						<div class="container">
							<h2 class="h2 h2--center"><?php echo $title; ?></h2>
							<?php if ( $descr_h2 ) : ?>
								<div class="descr-h2"><?php echo $descr_h2; ?></div>
							<?php endif; ?>

							<?php if ( have_rows( 'column_list' ) ) : ?>
								<div class="twoImages_slider">
									<?php while ( have_rows( 'column_list' ) ) :
										the_row();
										$item_img = get_sub_field( 'item_img' );
										$item_title = get_sub_field( 'item_title' );
										$item_descr = get_sub_field( 'item_descr' );
										$item_link = get_sub_field( 'item_link' );
										?>
										<div class="twoImages_slide">
											<?php if ( $item_img ) : ?>
												<img class="img-responsive lazyload" data-src="<?php echo $item_img['url']; ?>" width="560"
													height="258" alt="<?php echo $item_img['alt']; ?>">
											<?php endif; ?>
											<?php if ( $item_title ) : ?>
												<h3 class="h3"><?php echo $item_title; ?></h3>
											<?php endif; ?>
											<?php if ( $item_descr ) :
												echo $item_descr;
											endif; ?>

											<?php if ( $item_link ) :
												$item_link_url = $item_link['url'];
												$item_link_title = $item_link['title'];
												$item_link_target = $item_link['target'] ? $item_link['target'] : '_self';
												$noopener = $item_link['target'] ? 'rel="noopener"' : null;
												?>
												<div class="wrap-link">
													<a class="link-purple" <?php echo $noopener; ?>
														href="<?php echo esc_url( $item_link_url ); ?>"
														target="<?php echo esc_attr( $item_link_target ); ?>"><?php echo esc_html( $item_link_title ); ?></a>
												</div>
											<?php endif; ?>
										</div>
									<?php endwhile; ?>
								</div>
							<?php endif; ?>
						</div>
					</section>
				<?php endif; ?>


				<?php if ( get_row_layout() == 'steps_new' ) :
					$block_title_new = get_sub_field( "steps_title_new" );
					$steps_description_new = get_sub_field( "steps_description_new" );

					$bg_color_new = get_sub_field( "background_color_new" );
					?>
					<section class="learn_section" <?= $bg_color_new ? "style='background-color: $bg_color_new'" : ''; ?>>
						<div class="container">
							<div class="row">
								<div class="col-lg-4">
									<div class="wrap_title">
										<?php if ( $block_title_new ) { ?>
											<h2 class="h2"><?= $block_title_new; ?></h2>
										<?php } ?>
										<?php if ( $steps_description_new ) { ?>
											<div class="h2_descr">
												<?= $steps_description_new; ?>
											</div>
										<?php } ?>
									</div>
								</div>
								<div class="col-lg-8">
									<?php if ( have_rows( 'steps_repeater_new' ) ) : ?>
										<div class="learn_items">
											<?php while ( have_rows( 'steps_repeater_new' ) ) :
												the_row();
												$icon_or_number_new = get_sub_field( 'icon_or_number_new' );
												$title_new = get_sub_field( 'title_new' );
												$description_new = get_sub_field( 'description_new' );
												?>
												<div class="learn_item">
													<?php if ( $icon_or_number_new ) {
														echo $icon_or_number_new;
													} ?>
													<h3 class="h3"><?= $title_new; ?></h3>
													<?= $description_new; ?>
												</div>
											<?php endwhile; ?>
										</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</section>
				<?php endif; ?>


			<?php endwhile; ?>
		<?php endif; ?>
	</main>

	<?php //require_once ( 'HomePageNew3/blocks/footer.php' ); ?>


	<?php if ( have_rows( 'flexible_content' ) ) :
		while ( have_rows( 'flexible_content' ) ) :
			the_row();
			if ( get_row_layout() == '2_images_section' ) : ?>
				<script src="<?= get_template_directory_uri() ?>/templates/common/libs/owl.carousel/owl.carousel.min.js"></script>
			<?php endif;
		endwhile;
	endif; ?>

	<script src="<?= get_template_directory_uri() ?>/templates/common/libs/owl.carousel/owl.carousel.min.js"></script>
	<script src="<?= get_asset_url( "/templates/selzy-feature/js/selzy-feature.min.js" ) ?>"></script>

</body>

</html>