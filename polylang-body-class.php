<?php
/*
Plugin Name: Polylang Body Class
Plugin URI: https://github.com/diggy/polylang-body-class
Version: 1.0.0
Author: Peter J. Herrel
Author uri: https://github.com/diggy
Description: Adds prefixed and sanitized locale to body classes. Background: https://git.io/vyIh7
License: GPL-2.0+
License URI: https://www.gnu.org/licenses/gpl-2.0.txt
*/

# prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Adds prefixed and sanitized locale to body classes
 *
 * @param  array $classes An array of body classes.
 * @return array
 */
add_filter( 'body_class', 'pll_plugin_body_class' );
function pll_plugin_body_class( $classes )
{
    if ( function_exists( 'PLL' ) && $language = PLL()->model->get_language( get_locale() ) )
    {
        $classes[] = 'pll-' . str_replace( '_', '-', sanitize_title_with_dashes( $language->get_locale( 'raw' ) ) );
    }

    return $classes;
}
