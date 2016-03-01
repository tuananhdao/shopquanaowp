<?php
/**
 * The main template file
 * @package Niteco
 * @subpackage shopquanao
 * @since shopquanao 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content woocommerce">
		<?php if ( is_active_sidebar( 'sidebar-1' ) ) :
			dynamic_sidebar( 'sidebar-1' );
		endif; ?>
		
		<?php if ( is_active_sidebar( 'sidebar-2' ) ) :
			dynamic_sidebar( 'sidebar-2' );
		endif; ?>
		
		<div id="content" role="main">
		</div><!-- #content -->
		
		<?php if ( is_active_sidebar( 'sidebar-3' ) ) :
			dynamic_sidebar( 'sidebar-3' );
		endif; ?>
	</div><!-- #primary -->

<?php get_footer(); ?>
