<?php
add_action('widgets_init','shopquanao_subscription_load_widgets');

function shopquanao_subscription_load_widgets(){
		register_widget("shopquanao_subscription");
}

class shopquanao_subscription extends WP_widget{


	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		parent::__construct(
			'shopquanao_subscription', // Base ID
			__('@[SQA] Subscription Module' ), // Name
			array( 'description' => __( 'Demo subscription module' ), ) // Args
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
		?>
		<div id="subscription-widget">
			<h2 class="subscription-title fairplay-italic"><?php echo $instance['title1']; ?> <span class="fairplay-bold"><?php echo $instance['title2']; ?></span></h2>
			<div class="subscription-description raleway-medium"><?php echo $instance['text']; ?></div>
			<div class="subcription-form">
				<input id="subscription-email" name="subscription-email" type="text" placeholder="YOUR EMAIL" class="raleway-semibold"/>
				<button id="subscription-submit" class="raleway-semibold">Subscribe</button>
			</div>
		</div>
		<?php
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
			$defaults = array( 'title1' => 'Signup for', 'title2' => 'Updates', 'text'=> 'Phasellus pretium velit eu risus consequat porttitor lementum purus vestibumlum semperto veliterom semper pretium risus phasell condi ment molestie.');
			$instance = wp_parse_args((array) $instance, $defaults); 
		?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title1'); ?>"><?php _e( 'Title 1:' ); ?></label>
			<input class="widefat" style="width: 210px;" id="<?php echo $this->get_field_id('title1'); ?>" name="<?php echo $this->get_field_name('title1'); ?>" value="<?php echo $instance['title1']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('title2'); ?>"><?php _e( 'Title 2:' ); ?></label>
			<input class="widefat" style="width: 210px;" id="<?php echo $this->get_field_id('title2'); ?>" name="<?php echo $this->get_field_name('title2'); ?>" value="<?php echo $instance['title2']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('text'); ?>"><?php _e( 'Description:' ); ?></label>
			<input class="widefat" style="width: 210px;" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" value="<?php echo $instance['text']; ?>" />
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
		$instance['text'] = strip_tags( $new_instance['text'] );
		$instance['title1'] = strip_tags( $new_instance['title1'] );
		$instance['title2'] = strip_tags( $new_instance['title2'] );
		return $instance;
	}

}
?>