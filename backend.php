<?php

class AdbienceBackend {
	
	public function __construct() {
		
		add_action( 'admin_menu', array( $this, 'register_my_custom_menu_page' ) );
		add_action( 'widgets_init', create_function('', 'return register_widget("AdbienceAdGrouptWidget");') );
	}
	
	public function register_my_custom_menu_page(){
   		add_menu_page( 'Adbience', 'Adbience', 'manage_options', 'adbience_main', array( $this, 'mainPage' ) , plugins_url( 'adbience/assets/icon_tiny.png' ), 6);
		add_submenu_page( 'adbience_main', 'Adbience - Short Codes', 'Short Codes', 'manage_options', 'adbience_short_codes', array($this, 'shortcodesPage') );
	}
	
	public function mainPage() {
		
		include(ADBIENCE_DIRECTORY . '/templates/backend/main.php' );
	}
	
	public function shortcodesPage() {
		include(ADBIENCE_DIRECTORY . '/templates/backend/shortcodes.php' );
	}
}