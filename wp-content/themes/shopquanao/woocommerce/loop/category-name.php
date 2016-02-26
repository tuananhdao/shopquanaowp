<?php
/**
 * Product loop category name
 *
 * @see 	    http://niteco.se
 * @author 		Tuan Anh Dao
 * @package 	shopquanao
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$product_cats = wp_get_post_terms( get_the_ID(), 'product_cat' );

    if ( $product_cats && ! is_wp_error ( $product_cats ) ){

        $single_cat = array_shift( $product_cats ); ?>

        <div class="product_category_title"><?php echo $single_cat->name; ?></div>

<?php } ?>