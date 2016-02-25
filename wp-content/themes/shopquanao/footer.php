<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->
	<div id="footer" role="contentinfo">
		<div id="footer-menu-1" class="footer-menu"><?php wp_nav_menu( array( 'menu' => 'footer-menu-1' ) ); ?></div>
		<div id="footer-menu-2" class="footer-menu"><?php wp_nav_menu( array( 'menu' => 'footer-menu-2' ) ); ?></div>
		<div id="footer-info" class="fairplay-regular">
			<div class="first-line">Ⓒ2015 - badcdcdcdcđ<br />
			Dbm ldmf <a href="http://google.com.vn">bdbdvdvdvdvd</a> & <a href="http://google.com.vn">kđjfkjdf</a></div>
			<div class="second-line fairplay-bold">0123-456-789, <a href="mailto:info@niteco.se">info@niteco.se</a></div>
			<div class="third-line">USA, Sanfrancisco<br />1575 Djfjdm nnmnsdbfns kisjdf hù jbdf</div>
		</div>
		<div id="social-links" class="footer-menu">
			<a target="_blank" class="social-link facebook raleway-semibold" href="<?php echo get_option('facebook_url'); ?>"><span>Facebook</span></a>
			<a target="_blank" class="social-link twitter raleway-semibold" href="<?php echo get_option('twitter_url'); ?>"><span>Twitter</span></a>
			<a target="_blank" class="social-link instagram raleway-semibold" href="<?php echo get_option('instagram_url'); ?>"><span>Instagram</span></a>
			<a target="_blank" class="social-link pinterest raleway-semibold" href="<?php echo get_option('pinterest_url'); ?>"><span>Pinterest</span></a>
			<a target="_blank" class="social-link googleplus raleway-semibold" href="<?php echo get_option('googleplus_url'); ?>"><span>Google+</span></a>
		</div>
		<div class="clear"></div>
	</div><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>