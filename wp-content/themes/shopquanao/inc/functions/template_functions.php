<?php
if ( ! function_exists( 'shopquanao_cart_link' ) ) {
	function shopquanao_cart_link() {
		?>
			<a class="cart-contents" href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" title="<?php _e( 'View your shopping cart'); ?>">
				<span class="amount"><?php //echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span> <span class="count"><?php echo wp_kses_data( sprintf( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ) );?></span>
			</a>
		<?php
	}
}

function woocommerce_show_product_loop_category_name(){
	wc_get_template( 'loop/category-name.php' );
}


function woocommerce_show_product_loop_out_of_stock_flash() {
	wc_get_template( 'loop/sold-out-flash.php' );
}

function woocommerce_template_single_stylist() {
	global $product;
	$koostis = $product->get_attribute( 'stylist' ); ?>
	<span class="stylist raleway-regular"><?php echo $koostis; ?></span>
	<?php
}

function woocommerce_template_single_navigator() {
	global $post;
	$terms = get_the_terms( $post->ID, 'product_cat' );
	$the_term = end($terms);
	?>
	<div class="single-product-navigator fairplay-regular">
		<a href="<?php echo get_term_link($the_term->term_id); ?>" class="back">Back to: <?php echo $the_term->name; ?></a>
		<span class="right">
			<?php
			$prev_post = get_previous_post();
			$next_post = get_next_post();
			
			if (!empty( $prev_post )): ?>
			  <a href="<?php echo get_permalink( $prev_post->ID ); ?>">Previous</a>
			<?php endif;
			
			if (!empty( $prev_post ) && !empty( $next_post )) echo ' / ';
			
			if (!empty( $next_post )): ?>
			  <a href="<?php echo get_permalink( $next_post->ID ); ?>">Next</a>
			<?php endif; ?>
		</span>
	</div>
	<?php
}

function woocommerce_template_loop_product_thumbnail2() { ?>
		<div class="loop-product-thumbnail-container"><?php echo woocommerce_get_product_thumbnail(); ?></div>
<?php }
?>