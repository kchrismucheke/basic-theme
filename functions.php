<?php

// Enqueuing
function load_css() {

	wp_register_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', [], 1, 'all' );
	wp_enqueue_style( 'bootstrap' );

	wp_register_style( 'main', get_template_directory_uri() . '/css/main.css', [], 1, 'all' );
	wp_enqueue_style( 'main' );

}
add_action( 'wp_enqueue_scripts', 'load_css' );

function load_js() {
	wp_enqueue_script( 'jquery' );

	wp_register_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', [ 'jquery' ], 1, true );
	wp_enqueue_script( 'bootstrap' );
}
add_action( 'wp_enqueue_scripts', 'load_js' );


// Nav Menus
register_nav_menus( array(
	'top-menu' => __( 'Top Menu', 'theme' ),
	'footer-menu' => __( 'Footer Menu', 'theme' ),
) );

// Theme Support
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );

// Image Sizes
add_image_size( 'small', 600, 600, false );

function fix_post_id_on_preview( $null, $post_id ) {
	if ( is_preview() ) {
		return get_the_ID();
	} else {
		$acf_post_id = isset( $post_id->ID ) ? $post_id->ID : $post_id;

		if ( ! empty( $acf_post_id ) ) {
			return $acf_post_id;
		} else {
			return $null;
		}
	}
}
add_filter( 'acf/pre_load_post_id', 'fix_post_id_on_preview', 10, 2 );

function register_acf_blocks() {
	/**
	 * We register our block's with WordPress's handy
	 * register_block_type();
	 *
	 * @link https://developer.wordpress.org/reference/functions/register_block_type/
	 */
	register_block_type( __DIR__ . '/blocks/linkrenderssafari' );
}
// Here we call our tt3child_register_acf_block() function on init.
add_action( 'init', 'register_acf_blocks' );
function treatment_faq( $atts ) {
	$treatment_faq = '<div class="accordion mt-80" id="treatment-accordion">
            
                        <h3 class="fs-36 lh-40 fw-500 text-uppercase pb-50">Frequently asked questions</h3>';
	$faq_field = get_field( 'faqs' );
	foreach ( $faq_field as $key => $faq ) {
		$show = ( $key == 0 ) ? 'show' : '';
		$collapsed = ( $key >= 1 ) ? 'collapsed' : '';
		$expanded = ( $key == 0 ) ? 'true' : '';
		$treatment_faq .= ' <div class="accordion-item">
                                                    <h2 class="accordion-header" id="heading' . $key . '">
                                                        <button class="accordion-button ' . $collapsed . '" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $key . '" aria-expanded="' . $expanded . '" aria-controls="collapse' . $key . '">
                                                            ' . $faq['title'] . '
                                                        </button>
                                                    </h2>
                                                    <div id="collapse' . $key . '" class="accordion-collapse collapse ' . $show . '" aria-labelledby="heading' . $key . '" data-bs-parent="#treatment-accordion">
                                                        <div class="accordian-body p-3">' . $faq['description'] . '</div>
                                                    </div>
                                                </div>';
	}
	$treatment_faq .= '</div>
                ';
	return $treatment_faq;
}
add_shortcode( 'faq', 'treatment_faq' );

function before_and_after( $atts ) {

	$before_after = get_field( 'before_after' );
	$slider_options = '{ "freeScroll": false, "prevNextButtons": true, "pageDots": false, "wrapAround": true }';
	$images = '</div><div class="col-md-8"><div class="main-carousel mt-80" data-flickity=\'' . $slider_options . '\'>';

	foreach ( $before_after as $image ) {
		$images .= '<div class="carousel-cell">
                        <div class="before-after-img" style="background-image:url(' . $image['image']['url'] . ');"></div>
                </div>';
	}
	$images .= '</div></div><div class="col-md-12">';
	return $images;
}
add_shortcode( 'before_after', 'before_and_after' );


function treatment_fee( $atts ) {
	$heading = ( isset( $atts['heading'] ) ) ? $atts['heading'] : 'TREATMENT FEES';
	$heading_classes = ( isset( $atts['layout'] ) ) ? 'Start Consultation' : 'col-md-12';
	$classes = ( isset( $atts['layout'] ) ) ? 'col-md-12' : 'col-lg-8';
	$classes_2 = ( isset( $atts['layout'] ) ) ? 'col-md-12 d-none' : 'col-lg-4';
	$layout = ( isset( $atts['layout'] ) ) ? $atts['layout'] : '';

	echo '<div style="display:none">';
	var_dump( $atts );
	echo '</div>';

	$treatment_fee = '</div>
                    </div>
                </div>
            <div class="treatment-fee pt-90 pb-90 mt-80 bg-light-gray">
            <div class="container-md">
                <div class="row justify-content-md-center">
                    <div class="' . $heading_classes . '">
                        <h3 class="text-uppercase fs-36 lh-40 fw-500 mb-40">' . $heading . '</h3>
                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="' . $classes . '">
                        <ul class="list-group list-group-flush layout-' . $layout . '">';

	foreach ( get_field( 'fee' ) as $fee ) {
		$treatment_fee .= "<li class='list-group-item fs-16 lh-28 pe-0 ps-0 bg-light-gray'><p class='mb-0'><span class='text-left fw-600 text-uppercase'>" . $fee['title'] . "</span><span class='float-end'>£" . $fee['fee'] . "</span></p>";
		if ( $fee['details'] !== '' ) {
			$treatment_fee .= "<p class='pe-5 me-5'>" . $fee['details'] . "</p>";
		}
		$treatment_fee .= "</li>";
	}

	$treatment_fee .= '</ul>
                    </div>
                    <div class="' . $classes_2 . '">';
	$info_field = get_field( 'info' );
	$treatment_fee .= '<div class="info-item ms-0 ms-lg-5">
                            <div class="row m-0 mb-5 mt-5">

                                <div class="col-12 col-sm-4 col-lg-12 mb-5">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img width="60px" height="60px" src="' . get_stylesheet_directory_uri() . '/img/icons/watch_later.svg" alt="Treatment Time Clock">
                                        </div>
                                        <div class="col-md-9"><p class="fs-16 lh-28 mb-0"><span class="fw-600">Treatment Time</span><br/>' . $info_field['treatment_time'] . '</p></div>
                                    </div>
                                </div>
                            
                                <div class="col-12 col-sm-4 col-lg-12 mb-5">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img width="60px" height="60px" src="' . get_stylesheet_directory_uri() . '/img/icons/calendar_today.svg" alt="Duration of effect calendar">
                                        </div>
                                        <div class="col-md-9"><p class="fs-16 lh-28 mb-0"><span class="fw-600">Duration of effect</span><br/>' . $info_field['duration_of_effect'] . '</p></div>
                                    </div>
                                </div>
                            
                                <div class="col-12 col-sm-4 col-lg-12 mb-5">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img width="60px" height="60px" src="' . get_stylesheet_directory_uri() . '/img/icons/work.svg" alt="Back to work briefcase">
                                        </div>
                                        <div class="col-md-9"><p class="fs-16 lh-28 mb-0"><span class="fw-600">Back to Work</span><br/>' . $info_field['back_to_work'] . '</p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-md">
			<div class="row justify-content-md-center">
				<div class="col-md-12">';
	return $treatment_fee;
}
add_shortcode( 'fee', 'treatment_fee' );

function treatment_fee_icons( $atts ) {
	$classes_2 = 'col-12';

	$treatment_fee_icons = '<div class="treatment-fee pt-90 pb-50 bg-light-gray">
            <div class="container-md">
                
                <div class="row">
                    
                    <div class="' . $classes_2 . '">';
	$info_field = get_field( 'info' );
	$treatment_fee_icons .= '<div class="info-item">
                        <div class="row">
                            <div class="col-md-4">
                            <div class="row m-0 mb-5">
                                <div class="col-3 align-middle p-0">
                                    <img style="opacity: 0.55" width="60" src="' . get_stylesheet_directory_uri() . '/img/icons/watch_later.svg">
                                </div>
                                <div class="col-9 align-middle pe-0"><p class="fs-16 lh-28 mb-0"><span class="fw-600">Treatment Time</span><br/>' . $info_field['treatment_time'] . '</p></div>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="row m-0 mb-5">
                                <div class="col-3 align-middle p-0">
                                    <img style="opacity: 0.55" width="60" src="' . get_stylesheet_directory_uri() . '/img/icons/calendar_today.svg">
                                </div>
                                <div class="col-9 align-middle pe-0"><p class="fs-16 lh-28 mb-0"><span class="fw-600">Duration of effect</span><br/>' . $info_field['duration_of_effect'] . '</p></div>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="row m-0 mb-5">
                                <div class="col-3 align-middle p-0">
                                    <img style="opacity: 0.55" width="60" src="' . get_stylesheet_directory_uri() . '/img/icons/work.svg">
                                </div>
                                <div class="col-9 align-middle pe-0"><p class="fs-16 lh-28 mb-0"><span class="fw-600">Back to Work</span><br/>' . $info_field['back_to_work'] . '</p></div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
	return $treatment_fee_icons;
}
add_shortcode( 'fee_icons', 'treatment_fee_icons' );

function acf_field_shortcode( $atts ) {
	// Extract attributes from the shortcode
	$atts = shortcode_atts( array(
		'field' => '',
		'post_id' => 'options',
	), $atts, 'acf_field' );

	// Get the field value
	$field_value = get_field( $atts['field'], $atts['post_id'] );

	// Return the field value
	return $field_value;
}
add_shortcode( 'acf_field', 'acf_field_shortcode' );

add_filter( 'acf/field_group/disable_field_settings_tabs', '__return_true' );