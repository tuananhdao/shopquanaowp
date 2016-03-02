<?php
// For the Theme Setting Page
add_action("admin_init", "display_theme_panel_fields");
add_action("admin_menu", "add_theme_menu_item");

/*
 * WooCommerce hooks
 */
 
// loop hooks
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_category_name', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_out_of_stock_flash', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail');
add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail2', 5);
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
add_action( 'woocommerce_after_shop_loop', 'woocommerce_result_count', 5 );

// remove defaults
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar' );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

// single product hooks
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs' );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_stylist', 2 );
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 25 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 24 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_navigator', 1 );
?>