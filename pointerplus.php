<?php
/**
 * Plugin Name: Simple Pointers with PointerPlus
 * Plugin URI: https://github.com/Mte90/pointerplus
 * Description: Facilitates the creation of single pointers for WP Admin.
 * Author: Mte90 & QueryLoop
 * Author URI: http://mte90.net
 * Version: 1.0.0
 * Text Domain: your-domain
 * Domain Path: /languages
 */

if ( !defined( 'WPINC' ) ) {
	die;
}

// Load and initialize class. If you're loading the PointerPlus class in another plugin or theme, this is all you need.
require_once 'class-pointerplus.php';
new PointerPlus();

///////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////// Everything after this point is only for pointerplus configuration ///////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * Initialize localization routines. If you're already doing it in your plugin or theme dismiss this.
 *
 * @since 1.0.0
 */
function pointerplus_load_localization() {
	load_plugin_textdomain( 'your-domain', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'pointerplus_load_localization' );

/**
 * Add pointers.
 *
 * @param $pointers
 * @param $prefix
 *
 * @return mixed
 */
function custom_initial_pointers( $pointers, $prefix ) {
	return array_merge( $pointers, array(
		$prefix . '_settings' => array(
			'selector' => '#menu-settings',
			'title' => '<h3>' . __( 'PointerPlus Test', 'your-domain' ) . '</h3>',
			'text' => '<p>' . __( 'The plugin is active and ready to start working.', 'your-domain' ) . '</p>',
			'edge' => 'left',
			'align' => 'middle',
			'width' => 260,
			'class' => 'pointerplus',
		),
		$prefix . '_posts' => array(
			'selector' => '#menu-posts',
			'title' => '<h3>' . __( 'PointerPlus for Posts', 'your-domain' ) . '</h3>',
			'text' => '<p>' . __( 'One more pointer.', 'your-domain' ) . '</p>',
			'edge' => 'left',
			'align' => 'middle',
			'width' => 350,
			'class' => 'pointerplus',
		),
		$prefix . '_pages' => array(
			'selector' => '#menu-pages',
			'title' => '<h3>' . __( 'PointerPlus Pages', 'your-domain' ) . '</h3>',
			'text' => '<p>' . __( 'A pointer for pages.', 'your-domain' ) . '</p>',
			'edge' => 'left',
			'align' => 'middle',
			'width' => 300,
			'class' => 'pointerplus',
		),
		$prefix . '_show-settings-link' => array(
			'selector' => '#show-settings-link',
			'title' => '<h3>' . __( ' PointerPlus Help', 'your-domain' ) . '</h3>',
			'text' => '<p>' . __( 'A pointer for help tab.', 'your-domain' ) . '</p>',
			'edge' => 'top',
			'align' => 'right',
			'width' => 300,
			'class' => 'pointerplus',
		)
	) );
}
add_filter( 'pointerplus_list', 'custom_initial_pointers', 10, 2 );