<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product, $woocommerce;

$attachment_ids = $product->get_gallery_attachment_ids();

if ( $attachment_ids ) {
	$loop 		= 0;
	$columns 	= apply_filters( 'woocommerce_product_thumbnails_columns', 3 );
	?>
	<div class="flexslider">
	  <ul class="slides">
		<?php
		foreach ( $attachment_ids as $attachment_id ) {

			$classes = array( 'wp-post-image' );

			if ( $loop === 0 || $loop % $columns === 0 )
				$classes[] = 'first';

			if ( ( $loop + 1 ) % $columns === 0 )
				$classes[] = 'last';

			$image_link = wp_get_attachment_url( $attachment_id );

			if ( ! $image_link )
				continue;

			$image_title 	= esc_attr( get_the_title( $attachment_id ) );
			$image_caption 	= esc_attr( get_post_field( 'post_excerpt', $attachment_id ) );

			$image       = wp_get_attachment_image_src( $attachment_id, 'full');
			$image_src = $image[0];

			$image_class = esc_attr( implode( ' ', $classes ) );
			?>
			<li><img class="<?php echo $image_class; ?>" alt="<?php echo $image_caption; ?>" src="<?php echo $image_src; ?>" /></li>
			<?php
			$loop++;
		}
		?>
	  </ul>
	</div>
	<?php
} else {
	?>
	<div class="thumbnail-altenative">
	<?php
	if ( has_post_thumbnail() ) {
		$image_caption = get_post( get_post_thumbnail_id() )->post_excerpt;
		$image_link    = wp_get_attachment_url( get_post_thumbnail_id() );
		$image         = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
			'title'	=> get_the_title( get_post_thumbnail_id() )
		) );

		$attachment_count = count( $product->get_gallery_attachment_ids() );

		if ( $attachment_count > 0 ) {
			$gallery = '[product-gallery]';
		} else {
			$gallery = '';
		}

		echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s" data-rel="prettyPhoto' . $gallery . '">%s</a>', $image_link, $image_caption, $image ), $post->ID );

	} else {

		echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), __( 'Placeholder', 'woocommerce' ) ), $post->ID );

	}
	?>
	</div>
	<?php
}
?>