<?php
/**
 * Adbience Widgets
 * 
 * These widgets are designed to display adbience widgg
 */

class AdbienceAdGrouptWidget extends WP_Widget {
  function AdbienceAdGrouptWidget() {
    $widget_ops = array('classname' => 'AdbienceAdGrouptWidget', 'description' => 'Displays the ads associated with a particar ad group.' );
    $this -> WP_Widget('AdbienceAdGrouptWidget', 'Adbience Ad Group', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    $title = $instance['title'];
		?>
		<p>
			<label for="<?php echo $this -> get_field_id('title'); ?>">Title:
				<input class="widefat" id="<?php echo $this -> get_field_id('title'); ?>" name="<?php echo $this -> get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" />
			</label>
		</p>
		<?php
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		return $instance;
	}
	

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
	
		echo $before_widget;
		$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
	
		if (!empty($title))
		echo $before_title . $title . $after_title;;
		
		// WIDGET CODE GOES HERE
		echo "<h1>This is my new widget!</h1>";
		
		echo $after_widget;
	}

}

class AdbienceNeedsFeedWidget extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'AdbienceNeedsFeedWidget', 'description' => 'Displays the needs widget.');
		$this -> WP_Widget('AdbienceNeedsFeedWidget', 'Adbience Needs', $widget_ops);
	}

	public function form($instance) {
		$instance = wp_parse_args((array)$instance, array('title' => ''));

		$title = $instance['title'];

		include (ADBIENCE_DIRECTORY . '/templates/backend/widget_title.php');
	}

	public function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		return $instance;
	}

	public function widget($args, $instance) {
		extract($args, EXTR_SKIP);

		echo $before_widget;
		$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);

		if (!empty($title))
			echo $before_title . $title . $after_title;
		;

		$front = new AdbienceFrontend();
		echo $front -> insertNeedsFeedWidget();

		echo $after_widget;
	}

}

class AdbienceOpportunitiesFeedWidget extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'AdbienceOpportunitiesFeedWidget', 'description' => 'Displays the opportunities widget.');
		$this -> WP_Widget('AdbienceOpportunitiesFeedWidget', 'Adbience Opportunities', $widget_ops);
	}

	public function form($instance) {
		$instance = wp_parse_args((array)$instance, array('title' => ''));

		$title = $instance['title'];

		include (ADBIENCE_DIRECTORY . '/templates/backend/widget_title.php');
	}

	public function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		return $instance;
	}

	public function widget($args, $instance) {
		extract($args, EXTR_SKIP);

		echo $before_widget;
		$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);

		if (!empty($title))
			echo $before_title . $title . $after_title;
		;

		$front = new AdbienceFrontend();
		echo $front -> insertNeedsFeedWidget();

		echo $after_widget;
	}

}

function adb_load_widget() {
	register_widget( 'AdbienceNeedsFeedWidget' );
}
	
add_action( 'widgets_init', 'adb_load_widget' );
