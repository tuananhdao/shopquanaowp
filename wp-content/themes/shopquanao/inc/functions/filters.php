<?php
/*
 * Filters Added for shopquanao ('the theme')
 */

add_filter( 'wp_title', 'shopquanao_wp_title', 10, 2 );
add_filter( 'woocommerce_available_variation', 'woocommerce_variation_price_html_fix', 10, 3 );
add_filter( 'woocommerce_dropdown_variation_attribute_options_args', 'woocommerce_dropdown_variation_show_option_none_fix', 10, 1 );