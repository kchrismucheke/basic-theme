<?php
function create_acf_block_cli_register_blocks() {
    // ACF Block Registration
    $blocks = array(
    'linkrenderssafari'
);
    foreach ($blocks as $block) {
        register_block_type( get_template_directory() . '/" . blocks . "/' . $block );
    }
}
add_action( 'init', 'create_acf_block_cli_register_blocks' );