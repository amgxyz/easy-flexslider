<?php
/*
* Plugin Name: Easy Flexslider
* Plugin URI: http://andrewgunn.xyz
* Description: Adds support for Flexslider to your site.
* Version: 1.0
* Author: Andrew M. Gunn
* Author URI: http://andrewmgunn.com
* Text Domain: easy-flexslider
* License: GPL2
****
*/
defined( 'ABSPATH' ) or die( 'Plugin file cannot be accessed directly.' );


interface I_EFS_Toolbox {
	function __construct();
	function EFS_flush_rewrite_rules();
	function EFS_register_scrolldepth();
}
/**
* Classes and interfaces
*/
class EFS_Toolbox {

	public function __construct() {

		register_activation_hook( __FILE__, array( $this, 'efs_flush_rewrite_rules' ));
		register_deactivation_hook( __FILE__, array( $this, 'efs_flush_rewrite_rules' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'efs_register_flexslider' ) );

	}

	public function efs_flush_rewrite_rules() {
		flush_rewrite_rules();
	}

	public function efs_register_flexslider() {
		wp_register_script( 'flexslider_js', plugins_url(  'inc/flexslider/jquery.flexslider.js', __FILE__ ), array('jquery'));
		wp_register_script( 'flexslider_min_js', plugins_url( 'inc/flexslider/jquery.flexslider-min.js', __FILE__ ), array('jquery'));
	    wp_register_style( 'flexslider_css', plugins_url( 'inc/flexslider/flexslider.css', __FILE__ ));
	    wp_register_style( 'flexslider_min_css', plugins_url( 'inc/flexslider/flexslider.min.css', __FILE__ ));
	    wp_register_style( 'flexslider_less', plugins_url( 'inc/flexslider/flexslider.less', __FILE__ ));
	    
	    wp_enqueue_script( 'flexslider_js' );
	    wp_enqueue_script( 'flexslider_min_js' );
		
		wp_enqueue_style( 'flexslider_css' );		
		wp_enqueue_style( 'flexslider_min_css' );		
		wp_enqueue_style( 'flexslider_less' );		
	}

}

$efs = new EFS_Toolbox();
//$ece->ece_init();