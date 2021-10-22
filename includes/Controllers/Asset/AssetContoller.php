<?php

namespace Exdda\Controllers\Asset; 

class AssetContoller {

	private $suffix;
	private $version; 

	function __construct() {

		$this->suffix  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';    
		$this->version = ( defined( 'WP_DEBUG' ) && WP_DEBUG ) ? time() : exdda()->version(); 
		$this->ajaxurl = admin_url( 'admin-ajax.php' ); 

		add_action( 'wp_enqueue_scripts', array( $this, 'register_script' ), 1 );
		add_action( 'admin_init', array( $this, 'register_admin_script' ), 1 ); 
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_script' ) );  
		 
	}     

	function register_script_both_end() {  
		wp_register_style( 'exdda-fontello', exdda()->get_assets_uri( "vendor/fontello/css/fontello.css" ), array(), $this->version );  
	}

	function register_script() {
		$this->register_script_both_end();   

		if ( is_singular() ) {    

			wp_enqueue_style( 'exdda-fontello' );    

			wp_register_script( 'featherlight', exdda()->get_assets_uri( "vendor/featherlight/featherlight.min.js" ), array( 'jquery' ), $this->version, true ); 
			  
			wp_enqueue_script( 'featherlight' );
			wp_enqueue_script( 'exdda-public' );     

			wp_localize_script('exdda-public', 'exdda',
				array( 
					'ajaxurl' => $this->ajaxurl, 
				)
			); 
		}  
		wp_enqueue_style( 'exdda-affiliate-sc' );  
	}

	function register_admin_script() {
		$this->register_script_both_end(); 
		
		wp_register_style( 'select2', exdda()->get_assets_uri( "vendor/select2/select2.min.css" ), array(), $this->version ); 
		wp_register_style( 'exdda-admin', exdda()->get_assets_uri( "admin/css/main{$this->suffix}.css" ), array(), $this->version );

		wp_register_script( 'select2', exdda()->get_assets_uri( "vendor/select2/select2.min.js" ), array( 'jquery' ), $this->version, true );  
		wp_register_script( 'exdda-admin', exdda()->get_assets_uri( "admin/js/main{$this->suffix}.js" ), array( 'jquery', 'wp-color-picker', 'jquery-ui-sortable' ), $this->version, true );  
		
	}

	function admin_script() { 
		
		wp_enqueue_style( 'wp-color-picker' ); 
		wp_enqueue_style( 'select2' );  
		wp_enqueue_style( 'exdda-admin' ); 
		 
		wp_enqueue_script( 'select2' );    
	} 
 
}