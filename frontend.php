<?php

class AdbienceFrontend {

	public function __construct() {
		add_action('wp_enqueue_scripts', array($this, 'addScripts'));
		$this -> addShortCodes();
	}

	public function addScripts() {

		wp_enqueue_script('adb_main', plugins_url('js/connect.js', __FILE__));
	}

	public function addShortCodes() {
		add_shortcode('ad', array($this, 'insertAdCode'));
		add_shortcode('adgroup', array($this, 'insertAdGroupCode'));
		add_shortcode('adb_needs', array($this, 'insertNeedsWidget'));
		add_shortcode('adb_needs_feed', array($this, 'insertNeedsFeedWidget'));
	}

	public function insertAdCode($atts) {

		if (isset($atts['id'])) {

			return '<adbience:widget type="ad" id="' . trim($atts['id']) . '" /></adbience:widget>';

		}

		return '';

	}

	public function insertAdGroupCode($atts) {

	}

	public function insertNeedsWidget($atts = array()) {

		$customer_id = get_option('adb_cus_id', '');

		if ($customer_id) {

			return '<adbience:widget type="needs" id="' . $customer_id . '" />
			<!--[if IE 9]>
				<iframe src="http://iframe.adbience.com/needs?mode=iframe&mtype=needs&elementid=stamfordchamber:ie&cid=' . $customer_id . '" scrolling="yes" frameborder="0" style="width: 100%; height:0px;"></iframe>
			<![endif]-->
							
			<!--[if lt IE 9]>
				<iframe src="http://iframe.adbience.com/needs?mode=iframe&mtype=needs&elementid=stamfordchamber:ie&cid=' . $customer_id . '" scrolling="yes" frameborder="0" id="stamfordchamber:ie" style="width: 100%; height: 600px;"></iframe>
			<![endif]-->
			</adbience:widget>';

		} else {
			return 'Customer ID is required for widget';
		}
	}

	public function insertNeedsFeedWidget($atts = array()) {

		$customer_id = get_option('adb_cus_id', '');

		if ($customer_id) {

			return '<adbience:widget type="needs_feed" id="' . $customer_id . '" />
			<!--[if IE 9]>
				<iframe src="http://iframe.adbience.com/need/feeds?mode=iframe&mtype=needs&elementid=stamfordchamber:ie&cid=' . $customer_id . '" scrolling="yes" frameborder="0" style="width: 100%; height:0px;"></iframe>
			<![endif]-->
							
			<!--[if lt IE 9]>
				<iframe src="http://iframe.adbience.com/needs/feed?mode=iframe&mtype=needs&elementid=stamfordchamber:ie&cid=' . $customer_id . '" scrolling="yes" frameborder="0" id="stamfordchamber:ie" style="width: 100%; height: 600px;"></iframe>
			<![endif]-->
			</adbience:widget>';

		} else {
			return 'Customer ID is required for widget';
		}

	}

}
