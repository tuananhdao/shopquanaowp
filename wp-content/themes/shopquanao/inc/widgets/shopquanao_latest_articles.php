<?php
add_action('widgets_init','shopquanao_latest_articles_load_widgets');

function shopquanao_latest_articles_load_widgets(){
		register_widget("shopquanao_latest_articles");
}

class shopquanao_latest_articles extends WP_widget{


	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		parent::__construct(
			'shopquanao_latest_articles', // Base ID
			__('@[SQA] Home Latest Articles' ), // Name
			array( 'description' => __( 'Home Latest Articles' ), ) // Args
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
			<div id="latest-articles-widget">
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
				}
				
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 3,
					'order'   => 'DESC',
					'orderby' => 'modified',
				);
				
				$the_query = new WP_Query( $args );
				
				if ( $the_query->have_posts() ) {
					?>
					<h2 class="widget-title fairplay-italic"><?php echo $widget_title; ?></h2>
					<?php
					while ( $the_query->have_posts() ) {
						$the_query->the_post();
						
						$feat_image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
					?>
						<div class="latest-article">
							<a href="<?php echo get_the_permalink(); ?>">
								<img class="latest-article-thumbnail" src="<?php echo $feat_image; ?>" title="<?php echo get_the_title(); ?>" alt="<?php echo get_the_title(); ?>" />
								<h3 class="latest-article-title fairplay-regular"><?php echo get_the_title(); ?></h3>
								<div class="latest-article-date"><?php echo get_the_date('M d, Y'); ?></div>
							</a>
						</div>
					<?php
					}
				} else {
					// no posts found
				}
				/* Restore original Post Data */
				wp_reset_postdata(); ?>
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