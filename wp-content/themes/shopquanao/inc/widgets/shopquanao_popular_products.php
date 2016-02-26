<?php
add_action('widgets_init','shopquanao_popular_products_load_widgets');

function shopquanao_popular_products_load_widgets(){
		register_widget("shopquanao_popular_products");
}

class shopquanao_popular_products extends WP_widget{

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		parent::__construct(
			'shopquanao_popular_products', // Base ID
			__('@[SQA] Home Popular Products' ), // Name
			array( 'description' => __( 'Home Popular Products' ), ) // Args
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		
		// outputs the content of the widget
		
		extract($args); //$instance['key'];
		
		echo $before_widget; ?>
			<div id="popular-products-widget">
				<?php
				$widget_title = $instance['title'];
				$splitted_widget_title = split(' ', $widget_title);
				$widget_title = '';
				for ($i = 0; $i < count($splitted_widget_title); $i++)
				{
					if ($i == count($splitted_widget_title) - 1)
						$widget_title .= '<b>'.$splitted_widget_title[$i].'</b>';
					else
						$widget_title .= $splitted_widget_title[$i].' ';
				} ?>
				<h2 class="widget-title fairplay-italic"><?php echo $widget_title; ?></h2>
				<?php
					$args = array(
					'post_type' => 'product',
					'posts_per_page' => 8,
					'meta_key' => 'total_sales',
					'orderby' => 'meta_value_num',
					);

					$loop = new WP_Query( $args );
					if ( $loop->have_posts() ) {
					while ( $loop->have_posts() ) : $loop->the_post();
					woocommerce_get_template_part( 'content', 'product' );
					endwhile;
					} else {
					echo __( 'No products found' );
					}

					wp_reset_query();

				?>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		<?php
		echo $after_widget;
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		?>
		
		<?php
			$defaults = array( 'title' => 'Popular Products' );
			$instance = wp_parse_args((array) $instance, $defaults); 
		?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" style="width: 210px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
		<?php
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		return $instance;
	}

}
?>