<?php
add_action('widgets_init','shopquanao_home_categories_load_widgets');

function shopquanao_home_categories_load_widgets(){
		register_widget("shopquanao_home_categories");
}

class shopquanao_home_categories extends WP_widget{


	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		parent::__construct(
			'shopquanao_home_categories', // Base ID
			__('@[SQA] Home Categories' ), // Name
			array( 'description' => __( 'Home Categories' ), ) // Args
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
		
		preg_match_all('!\d+!', $instance['categories'], $categories);
		
		$categories = $categories[0];
		
		echo $before_widget; ?>
			<div id="home-categories-widget">
				<?php
				foreach ($categories as $category)
				{
					$term = get_term_by( 'id', $category, 'product_cat' );
					$cat_name = $term->name;
					
					$thumbnail_id = get_woocommerce_term_meta( $category, 'thumbnail_id', true );
					$cat_image = wp_get_attachment_url( $thumbnail_id );
					?>
					
					<?php
				}?>
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
			$defaults = array( 'categories' => '' );
			$instance = wp_parse_args((array) $instance, $defaults); 
		?>
		
		<p>
			<label for="<?php echo $this->get_field_id('categories'); ?>"><?php _e( 'Categories:' ); ?></label>
			<input class="widefat" style="width: 210px;" id="<?php echo $this->get_field_id('categories'); ?>" name="<?php echo $this->get_field_name('categories'); ?>" value="<?php echo $instance['categories']; ?>" />
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
		$instance['categories'] = strip_tags( $new_instance['categories'] );
		return $instance;
	}

}
?>