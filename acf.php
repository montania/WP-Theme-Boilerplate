<?php if(!defined('ABSPATH')) die();

/**
 * Returns a filed translation options array.
 * Option keys are set by the normalized filed name.
 *
 * @return array
 */
function get_field_translation_options() {
    return [
        'example' => true,
    ];
}


if (function_exists("register_field_group")) :

    // Insert ACF Export

endif;