<?php

/**
 * dostart Theme Customizer
 *
 * @package dostart
 */

if ( ! defined('ABSPATH') ) {
	exit; // Exit if accessed directly.
}

/**
 * Customizer Loader
 */

if ( class_exists('Kirki') ) {

	Kirki::add_config(
		'theme_config_id',
		array(
			'capability'  => 'edit_theme_options',
			'option_type' => 'theme_mod',
		)
	);

	/*=======================================================================*/
	/* [ General Settings ]
    /*=======================================================================*/

	Kirki::add_panel(
		'dostart_general_settings',
		array(
			'priority' => 19,
			'title'    => esc_html__('Global', 'dostart'),
		)
	);

	/*---------------------------------
      [ Basic Settings ]  
     --------------------------------*/
	Kirki::add_section(
		'dostart_basic_settings',
		array(
			'priority' => 30,
			'title'    => __('Basic Settings', 'dostart'),
			'priority' => 30,
			'panel'    => 'dostart_general_settings',
		)
	);


	// ------Google Analytics Tracking ID -----*/
	Kirki::add_field(
		'theme_config_id',
		array(
			'type'     => 'text',
			'settings' => 'dostart_google_analytics_id',
			'label'    => __('Google Analytics Tracking ID Ex: UA-XXX', 'dostart'),
			'section'  => 'dostart_basic_settings',
			// 'transport'   => 'postMessage',
		)
	);

	// ------Google Adsense Code -----*/
	Kirki::add_field(
		'theme_config_id',
		array(
			'type'     => 'text',
			'settings' => 'dostart_google_adsense_publisher_id',
			'label'    => __('Google Adsense Publisher ID Ex: pub-XXX', 'dostart'),
			'section'  => 'dostart_basic_settings',
			// 'transport'   => 'postMessage',
		)
	);


	Kirki::add_field(
		'theme_config_id',
		[
			'type'      => 'typography',
			'settings'  => 'dostart_typography_setting',
			'label'     => esc_html__('Control Label', 'dostart'),
			'section'   => 'dostart_basic_settings',
			'default'   => [
				'font-family'    => 'Source Sans Pro',
				'variant'        => 'regular',
				'font-size'      => '16px',
				'line-height'    => '1.5',
				'letter-spacing' => '0',
				'color'          => '#666666',
				'text-transform' => 'none',
				'text-align'     => 'left',
			],
			'priority'  => 10,
			'transport' => 'auto',
			'output'    => [
				[
					'element' => 'body',
				],
			],
		]
	);
	//------Theme Layouts -----*/
	Kirki::add_field(
		'theme_config_id',
		[
			'type'     => 'switch',
			'settings' => 'dostart_theme_layout',
			'label'    => esc_html__('Box Layouts', 'dostart'),
			'section'  => 'dostart_basic_settings',
			'default'  => 'off',
			'priority' => 10,
			'choices'  => [
				'on'  => esc_html__('Enable', 'dostart'),
				'off' => esc_html__('Disable', 'dostart'),
			],
		]
	);

	/*---------------------------------
      [ Social Media Icons ]  
     --------------------------------*/
	Kirki::add_section(
		'dostart_social_icons',
		array(
			'priority'    => 30,
			'title'       => __('Social Media Icons', 'dostart'),
			'description' => __('Social Media links', 'dostart'),
			'priority'    => 30,
			'panel'       => 'dostart_general_settings',
		)
	);

	//------Facebook Icon -----*/
	Kirki::add_field(
		'theme_config_id',
		[
			'type'     => 'checkbox',
			'settings' => 'social_open_new_tab',
			'label'    => esc_html__('Open New Tab', 'dostart'),
			'section'  => 'dostart_social_icons',
			'priority' => 10,
		]
	);

	//------Facebook Icon -----*/
	Kirki::add_field(
		'theme_config_id',
		[
			'type'            => 'link',
			'settings'        => 'dostart_social_facebook',
			'label'           => esc_html__('Facebook', 'dostart'),
			'section'         => 'dostart_social_icons',
			'priority'        => 10,
			// 'transport' => 'postMessage',    
			'partial_refresh' => array(
				'dostart_social_facebook' => array(
					'selector'        => '.footer-social-icon',
					'render_callback' => '__return_false',
				),
			),
		]
	);

	//------Twitter Icon -----*/
	Kirki::add_field(
		'theme_config_id',
		[
			'type'            => 'link',
			'settings'        => 'dostart_social_twitter',
			'label'           => esc_html__('Twitter', 'dostart'),
			'section'         => 'dostart_social_icons',
			'priority'        => 10,
			// 'transport' => 'postMessage',    
			'partial_refresh' => array(
				'dostart_social_twitter' => array(
					'selector'        => '.footer-social-icon',
					'render_callback' => '__return_false',
				),
			),
		]
	);

	//------Youtube Icon -----*/
	Kirki::add_field(
		'theme_config_id',
		[
			'type'            => 'link',
			'settings'        => 'dostart_social_youtube',
			'label'           => esc_html__('Youtube', 'dostart'),
			'section'         => 'dostart_social_icons',
			'priority'        => 10,
			// 'transport' => 'postMessage',    
			'partial_refresh' => array(
				'dostart_social_youtube' => array(
					'selector'        => '.footer-social-icon',
					'render_callback' => '__return_false',
				),
			),
		]
	);

	//------Pinterest Icon -----*/
	Kirki::add_field(
		'theme_config_id',
		[
			'type'            => 'link',
			'settings'        => 'dostart_social_pinterest',
			'label'           => esc_html__('Pinterest', 'dostart'),
			'section'         => 'dostart_social_icons',
			'priority'        => 10,
			// 'transport' => 'postMessage',    
			'partial_refresh' => array(
				'dostart_social_pinterest' => array(
					'selector'        => '.footer-social-icon',
					'render_callback' => '__return_false',
				),
			),
		]
	);

	//------Behance Icon -----*/
	Kirki::add_field(
		'theme_config_id',
		[
			'type'            => 'link',
			'settings'        => 'dostart_social_behance',
			'label'           => esc_html__('Behance', 'dostart'),
			'section'         => 'dostart_social_icons',
			'priority'        => 10,
			// 'transport' => 'postMessage',    
			'partial_refresh' => array(
				'dostart_social_behance' => array(
					'selector'        => '.footer-social-icon',
					'render_callback' => '__return_false',
				),
			),
		]
	);


	//------Linkedin Icon -----*/
	Kirki::add_field(
		'theme_config_id',
		[
			'type'            => 'link',
			'settings'        => 'dostart_social_linkedin',
			'label'           => esc_html__('Linkedin', 'dostart'),
			'section'         => 'dostart_social_icons',
			'priority'        => 10,
			// 'transport' => 'postMessage',    
			'partial_refresh' => array(
				'dostart_social_linkedin' => array(
					'selector'        => '.footer-social-icon',
					'render_callback' => '__return_false',
				),
			),
		]
	);

	//------Instagramm Icon -----*/
	Kirki::add_field(
		'theme_config_id',
		[
			'type'            => 'link',
			'settings'        => 'dostart_social_instagram',
			'label'           => esc_html__('Instagramm', 'dostart'),
			'section'         => 'dostart_social_icons',
			'priority'        => 10,
			// 'transport' => 'postMessage',    
			'partial_refresh' => array(
				'dostart_social_instagram' => array(
					'selector'        => '.footer-social-icon',
					'render_callback' => '__return_false',
				),
			),
		]
	);


	/*---------------------------------
         [ Theme Global Color ]
     -------------------------------*/
	Kirki::add_section(
		'colors',
		array(
			'priority' => 30,
			'title'    => __('Colors', 'dostart'),
			'panel'    => 'dostart_general_settings',
		)
	);

	//----Theme Primary Color --------*/
	Kirki::add_field(
		'theme_config_id',
		[
			'type'     => 'color',
			'settings' => 'dostart_theme_primary_color',
			'label'    => __('Theme Primary Color', 'dostart'),
			'section'  => 'colors',
			'default'  => '#065FD4',
			// 'transport'   => 'postMessage',
		]
	);

	//------Theme Title Color -----*/
	Kirki::add_field(
		'theme_config_id',
		[
			'type'     => 'color',
			'settings' => 'dostart_theme_title_color',
			'label'    => __('Theme Title Color', 'dostart'),
			'section'  => 'colors',
			'default'  => '#212121',
			// 'transport'   => 'postMessage',
		]
	);


	//------Back To Top Background -----*/
	Kirki::add_field(
		'theme_config_id',
		[
			'type'     => 'color',
			'settings' => 'dostart_backtotop_bg',
			'label'    => __('Back To Top Background', 'dostart'),
			'section'  => 'colors',
			'default'  => '#065FD4',
			// 'transport'   => 'postMessage',
		]
	);



	/*=======================================================================*/
	/* [ Header ]
    /*=======================================================================*/

	Kirki::add_panel(
		'dostart_header',
		array(
			'priority' => 19,
			'title'    => esc_html__('Header', 'dostart'),
		)
	);

	/*---------------------------------
      [ Breadcrumb ]  
     --------------------------------*/
	Kirki::add_section(
		'dostart_breadcrumb',
		array(
			'priority' => 30,
			'title'    => __('Breadcrumb', 'dostart'),
			'priority' => 30,
			'panel'    => 'dostart_header',
		)
	);


	// ------Breadcrum Image Header -----*/
	Kirki::add_field(
		'theme_config_id',
		array(
			'type'        => 'background',
			'settings'    => 'dostart_breaccrumb_image',
			'label'       => esc_html__('Breadcrumb Image', 'dostart'),
			'description' => esc_html__('Set Background Image / Color for Breadcrumb', 'dostart'),
			'section'     => 'dostart_breadcrumb',
			'default'     => array(
				'background-color'      => '#065fd4',
				'background-image'      => '',
				'background-repeat'     => 'repeat',
				'background-position'   => 'center center',
				'background-size'       => 'cover',
				'background-attachment' => 'scroll',
			),
			'transport'   => 'postMessage',
			'output'      => array(
				array(
					'element' => '.dostart-breadcrumb',
				),
			),
		)
	);

	// ------Breadcrumb Title Color -----*/
	Kirki::add_field(
		'theme_config_id',
		array(
			'type'        => 'color',
			'settings'    => 'dostart_breadcrumb_title_color',
			'label'       => __('Breadcrumb Title Color', 'dostart'),
			'description' => __('Pick Breadcrumb Title Color Defult: #333', 'dostart'),
			'section'     => 'dostart_breadcrumb',
			'default'     => '#ffffff',
			'transport'   => 'auto',
			'priority'    => 10,
			'output'    => array(
				array(
					'element' => '.breadcrumb-inner-content h1, .dostart-breadcrumb a, .dostart-breadcrumb li',
				),
			),
		)
	);


	/*---------------------------------
      [ Primary Menu ]  
     --------------------------------*/
	Kirki::add_section(
		'dostart_primary_menu',
		array(
			'priority' => 30,
			'title'    => __('Primary Menu', 'dostart'),
			'priority' => 30,
			'panel'    => 'dostart_header',
		)
	);

	//------Primary Menu Color -----*/
	Kirki::add_field(
		'theme_config_id',
		[
			'type'     => 'color',
			'settings' => 'dostart_primary_menu_color',
			'label'    => __('Menu Text Color', 'dostart'),
			'section'  => 'dostart_primary_menu',
			'default'  => '#333',
			// 'transport'   => 'postMessage',
		]
	);

	//------Primary Menu Icon -----*/
	Kirki::add_field(
		'theme_config_id',
		[
			'type'     => 'switch',
			'settings' => 'dostart_menu_arrow_down',
			'label'    => esc_html__('Menu Icon', 'dostart'),
			'section'  => 'dostart_primary_menu',
			'default'  => '1',
			'priority' => 10,
			'choices'  => [
				'on'  => esc_html__('Enable', 'dostart'),
				'off' => esc_html__('Disable', 'dostart'),
			],
		]
	);




	/*=======================================================================-*/
	/* [ Footer Customizer ]
    /*========================================================================*/

	Kirki::add_section(
		'dostart_footer',
		array(
			'priority' => 30,
			'title'    => __('Footer', 'dostart'),
		)
	);

	//----- Footer Widget Background ------/
	Kirki::add_field(
		'theme_config_id',
		[
			'type'     => 'color',
			'settings' => 'dostart_footer_widget_bg',
			'label'    => __('Footer Widget Background', 'dostart'),
			'section'  => 'dostart_footer',
			'default'  => '#2f2e2e',
		]
	);

	//------- Footer Background ---------/
	Kirki::add_field(
		'theme_config_id',
		[
			'type'      => 'color',
			'settings'  => 'dostart_footer_bg',
			'label'     => __('Footer Background', 'dostart'),
			'section'   => 'dostart_footer',
			'default'   => '#222222',
			'transport' => 'postMessage',
		]
	);

	//------- Footer text color ---------/
	Kirki::add_field(
		'theme_config_id',
		[
			'type'     => 'color',
			'settings' => 'dostart_copyright_text_color',
			'label'    => __('Copyright Text Color', 'dostart'),
			'section'  => 'dostart_footer',
			'default'  => '#666666',
		]
	);

	//-----  Copyright Text ---------/
	Kirki::add_field(
		'theme_config_id',
		[
			'type'            => 'editor',
			'settings'        => 'dostart_copyright_text',
			'label'           => esc_html__('Copyright Text', 'dostart'),
			'section'         => 'dostart_footer',
			'default'         => esc_html__('© Powered by WordPress 2020', 'dostart'),
			'priority'        => 10,
			'transport'       => 'postMessage',
			'partial_refresh' => array(
				'dostart_footer' => array(
					'selector'        => '.copyright-text',
					'render_callback' => '__return_false',
				),
			),
		]
	);



	/*
	=======================================================================*/
	/*
	 [ Blog ]
	/*=======================================================================*/

	Kirki::add_panel(
		'dostart_blog',
		array(
			'priority' => 30,
			'title'    => esc_html__('Blog', 'dostart'),
		)
	);

	/*
	---------------------------------
	[ Basic Settings ]
	--------------------------------*/
	Kirki::add_section(
		'dostart_blog_basic_settings',
		array(
			'priority' => 30,
			'title'    => __('Settings', 'dostart'),
			'panel'    => 'dostart_blog',
		)
	);

	// ------Breadcrumb Title -----*/
	Kirki::add_field(
		'theme_config_id',
		array(
			'type'     => 'text',
			'settings' => 'dostart_blog_or_archive_title',
			'label'    => esc_html__('Blog / Title Breadcrumb Title', 'dostart'),
			'section'  => 'dostart_blog_basic_settings',
			'default'  => 'Latest news',
			'priority' => 10,
		)
	);

	// ------Blog Excerpt Length -----*/
	Kirki::add_field(
		'theme_config_id',
		array(
			'type'     => 'slider',
			'settings' => 'dostart_blog_excerpt_length',
			'label'    => esc_html__('Excerpt Length', 'dostart'),
			'section'  => 'dostart_blog_basic_settings',
			'default'  => 42,
			'choices'  => array(
				'min'  => 10,
				'max'  => 100,
				'step' => 1,
			),
		)
	);

	/*
	---------------------------------
	[ Blog Dettails ]
	--------------------------------*/
	Kirki::add_section(
		'dostart_blog_details',
		array(
			'priority' => 30,
			'title'    => __('Blog Details', 'dostart'),
			'priority' => 30,
			'panel'    => 'dostart_blog',
		)
	);


	// ---- Blog Post Columns -----*/
	Kirki::add_field(
		'theme_config_id',
		array(
			'type'            => 'select',
			'settings'        => 'dostart_blog_single_layout',
			'label'           => esc_html__('Page Layout', 'dostart'),
			'section'         => 'dostart_blog_details',
			'default'         => 'sidebar',
			'priority'        => 10,
			'multiple'        => 1,
			'choices'         => array(
				'full' => esc_html__('Full Width', 'dostart'),
				'sidebar' => esc_html__('Sidebar Layout', 'dostart'),
			),
		)
	);


	// ------Blog Post Navigation on / off -----*/
	Kirki::add_field(
		'theme_config_id',
		array(
			'type'     => 'switch',
			'settings' => 'dostart_blog_navigation_switch',
			'label'    => esc_html__('Post Navigation (Next/Previous)', 'dostart'),
			'section'  => 'dostart_blog_details',
			'default'  => '1',
			'priority' => 10,
			'choices'  => array(
				'on'  => esc_html__('Enable', 'dostart'),
				'off' => esc_html__('Disable', 'dostart'),
			),
		)
	);

	// ------Releated Post on / off -----*/
	Kirki::add_field(
		'theme_config_id',
		array(
			'type'     => 'switch',
			'settings' => 'dostart_blog_related_post',
			'label'    => esc_html__('Show Related Post', 'dostart'),
			'section'  => 'dostart_blog_details',
			'default'  => '0',
			'priority' => 10,
			'choices'  => array(
				'on'  => esc_html__('Enable', 'dostart'),
				'off' => esc_html__('Disable', 'dostart'),
			),
		)
	);

	// -----Related Post Title------*/
	Kirki::add_field(
		'theme_config_id',
		array(
			'type'            => 'text',
			'settings'        => 'dostart_related_post_title',
			'label'           => __('Related Post Title', 'dostart'),
			'section'         => 'dostart_blog_details',
			'default'         => 'Related Post',
			'priority'        => 10,
			'active_callback' => array(
				array(
					'setting'  => 'dostart_blog_related_post',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);

	// ------Related Post Limit -----*/
	Kirki::add_field(
		'theme_config_id',
		array(
			'type'            => 'number',
			'settings'        => 'dostart_related_post_limit',
			'label'           => esc_html__('Blog Related Post Limit', 'dostart'),
			'description'     => esc_html__('Related posts per page', 'dostart'),
			'section'         => 'dostart_blog_details',
			'default'         => 3,
			'choices'         => array(
				'min'  => 1,
				'max'  => 4,
				'step' => 1,
			),
			'active_callback' => array(
				array(
					'setting'  => 'dostart_blog_related_post',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);

	// ---- Blog Post Columns -----*/
	Kirki::add_field(
		'theme_config_id',
		array(
			'type'            => 'select',
			'settings'        => 'dostart_blog_post_column',
			'label'           => esc_html__('Related Posts Per Row.', 'dostart'),
			'section'         => 'dostart_blog_details',
			'default'         => '4',
			'priority'        => 10,
			'multiple'        => 1,
			'choices'         => array(
				'12' => esc_html__('One Column', 'dostart'),
				'6' => esc_html__('Two Columns', 'dostart'),
				'4' => esc_html__('Three Columns', 'dostart'),
				'3' => esc_html__('Four Columns', 'dostart'),
				'2' => esc_html__('six Columns', 'dostart'),
			),
			'active_callback' => array(
				array(
					'setting'  => 'dostart_blog_related_post',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);
}



if ( ! class_exists('Dostart_Customizer') ) {

	/**
	 * Declear Class
	 */
	class Dostart_Customizer
	{

		/**
		 * Instance
		 *
		 * @access private
		 * @var    object
		 */
		private static $instance;

		/**
		 * making instatance of the class
		 */
		public static function get_instance() {
			if ( ! isset(self::$instance) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			add_action('customize_preview_init', array( $this, 'dostart_customize_preview_js' ));
			add_action('customize_register', array( $this, 'dostart_customize_register' ));
		}

		/**
		 * Add postMessage support for site title and description for the Theme Customizer.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */

		public function dostart_customize_register( $wp_customize ) {

			/**
			 * Move Default Section
			 */
			$wp_customize->get_section('header_image')->panel     = 'dostart_header';
			$wp_customize->get_section('colors')->panel           = 'dostart_general_settings';
			$wp_customize->get_section('title_tagline')->panel    = 'dostart_header';
			$wp_customize->get_section('background_image')->panel = 'dostart_general_settings';
		}


		/**
		 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
		 */
		public function dostart_customize_preview_js() {
			wp_enqueue_script('dostart-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'jquery', 'customize-preview' ), DOSTART_THEME_VERSION, true);
		}
	}
}

/**
 *  calling class by get_instance()
 */

Dostart_Customizer::get_instance();
