<?php
add_action('widgets_init','shopquanao_slogan_load_widgets');

function shopquanao_slogan_load_widgets(){
		register_widget("shopquanao_slogan");
}

class shopquanao_slogan extends WP_widget{


	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		parent::__construct(
			'shopquanao_slogan', // Base ID
			__('@[SQA] Home Slogan Module' ), // Name
			array( 'description' => __( 'Home Slogan module' ), ) // Args
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
		
		$line1 = $instance['title'];
		$splitted_line_1 = split('. ', $line1);
		$line1 = '';
		$i = 0;
		for (;$i < count($splitted_line_1); $i++)
		{
			if ($i % 2 == 0)
				$line1 .= $splitted_line_1[$i].'. <b>';
			else
				$line1 .= $splitted_line_1[$i].'.</b> ';
		}
		
		if ($i % 2 == 0)
		{
			$line1 = substr($line1, 0, -6);
		}
		else
			$line1 = substr($line1, 0, -4);
		?>
		<div id="slogan-widget">
			<h2 class="slogan-line-1 fairplay-italic"><?php echo $line1; ?></h2>
			<div class="slogan-line-2 raleway-medium"><?php echo $instance['text']; ?></div>
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
			$defaults = array( 'title' => 'Bespoke. Great. Custom. Hand-Crafted.', 'text' => 'Launch your online store with <a href="http://google.com.vn">Aloha</a>. This fully responsive and minimalist storefront is built for foolproof customization. Learn more.');
			$instance = wp_parse_args((array) $instance, $defaults); 
		?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Line 1:' ); ?></label>
			<input class="widefat" style="width: 210px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('text'); ?>"><?php _e( 'Line 2:' ); ?></label>
			<textarea class="widefat" style="width: 210px;" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $instance['text']; ?></textarea>
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
		$instance['text'] = $new_instance['text'];
		$instance['title'] = strip_tags( $new_instance['title'] );
		return $instance;
	}

}
?>