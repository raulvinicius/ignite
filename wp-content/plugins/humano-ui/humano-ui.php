<?php 

	/**
	 * @package Humano_UI
	 * @version 1.0
	 */
	/*
	Plugin Name: Humano UI
	Plugin URI: http://wordpress.org/plugins/humano-ui/
	Description: Re-skin the Admin Panel to better user experience.
	Author: Raul Vinicius
	Version: 1.0
	Author URI: http://humanostud.io
	*/


	defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

	function humano_ui_load_wp_admin_style() {
	        wp_register_style( 'custom_wp_admin_css', plugins_url() . '/humano-ui/admin-style.css', false, '1.0.0' );
	        wp_enqueue_style( 'custom_wp_admin_css' );
	}
	add_action( 'admin_enqueue_scripts', 'humano_ui_load_wp_admin_style' );


	function humano_ui_load_wp_login_style() {
	        wp_register_style( 'custom_wp_login_css', plugins_url() . '/humano-ui/login-style.css', false, '1.0.0' );
	        wp_enqueue_style( 'custom_wp_login_css' );
	}
	add_action( 'login_enqueue_scripts', 'humano_ui_load_wp_login_style' );
