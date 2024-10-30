<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    bugyard
 * @subpackage bugyard/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    bugyard
 * @subpackage bugyard/public
 * @author     Your Name <email@example.com>
 */
class bugyard_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $bugyard    The ID of this plugin.
	 */
	private $bugyard;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $bugyard       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $bugyard, $version ) {

		$this->bugyard = $bugyard;
		$this->version = $version;
		$this->wp_cbf_options = get_option($this->bugyard);

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in bugyard_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The bugyard_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->bugyard, plugin_dir_url( __FILE__ ) . 'css/bugyard-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in bugyard_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The bugyard_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->bugyard, plugin_dir_url( __FILE__ ) . 'js/bugyard-public.js', array( 'jquery' ), $this->version, false );
	}

	

	public function do_bugyard() {

		if($this->wp_cbf_options['isActive'] && $this->wp_cbf_options['project_name']){
			$app_key = $this->wp_cbf_options['project_name'];
			echo '<script type="text/javascript" id="by-script" data-bugyard="'.esc_attr($app_key).'" async="async" defer="defer" src="https://bugyard.io/dist/widget/bugyard.min.js"></script>';
		}
	}

	

}
