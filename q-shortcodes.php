<?php
/*
Plugin Name: q-Shortcodes
Plugin URI:  http://keksus.com/q-shortcodes.html
Description: This plugin contain shortcodes: buttons, tabs, icons, toggles, services, divider, clear, columns( 12 col grid)
Version:     1.0
Author:      Keksus
Author URI:  http://keksus.com/
License:     GPLv3

Copyright 2017-2018 Keksus.com 
*/

// exit if direct access
if ( !defined( 'ABSPATH' ) ) die;

register_activation_hook( __FILE__, 'keksus_q_activate' );

//remove empty p tags
//remove_filter('the_content','wpautop');

function keksus_q_activate() {
	set_theme_mod('button_bg',     '#000');
	set_theme_mod('button_color',  '#fff');
	set_theme_mod('button_bg_serv', '#000');
	set_theme_mod('button_color_serv', '#fff');
	set_theme_mod('button_radius', '3px');
	set_theme_mod('divider_color', '#ccc');
	set_theme_mod('divider_width', '1px');
	set_theme_mod('divider_style', 'solid');
	set_theme_mod('toggle_bg',     '#BEEB9F');
	set_theme_mod('icon_color',    '#000');
	set_theme_mod('icon_btn_color','#fff');
}

if ( is_admin() ) {
	add_action( 'admin_enqueue_scripts', 'keksus_q_scripts_admin' );
	add_action( 'init', 'keksus_q_button' );	
}
else {
	add_action( 'wp_enqueue_scripts', 'keksus_q_scripts_frontend' );
	add_action( 'customize_preview_init', 'keksus_q_customizer_init' );
	require_once 'shortcodes.php';
}

function keksus_q_customizer_init() {
	wp_enqueue_script( 'qcustomizer', plugins_url( 'js/customizer.js',__FILE__ ),  array( 'customize-preview' ), '', true );
}

function keksus_q_scripts_admin() {
	wp_enqueue_style( 'qadmin',  plugins_url( 'css/qadmin.css',__FILE__ ) );
}

function keksus_q_scripts_frontend() {
	wp_enqueue_style( 'qfrontend',   plugins_url( 'css/qfrontend.css',__FILE__ ) );
	wp_enqueue_style( 'ionicons',    plugins_url( 'css/ionicons.min.css',__FILE__ ) );
	wp_enqueue_style( 'fontawesome', plugins_url( 'css/font-awesome.min.css',__FILE__ ) );
	wp_enqueue_script( 'qmain',      plugins_url( 'js/qfrontend.js',__FILE__ ) );
}
// Register and add button to tinymce
function keksus_q_button() {
	add_filter( 'mce_external_plugins', 'keksus_q_add_buttons' );
	add_filter( 'mce_buttons', 'keksus_q_register_buttons' );
}
// Register buttons
function keksus_q_register_buttons( $buttons ) {
	array_push( $buttons, 'q_btn' );
	return $buttons;
}

function keksus_q_add_buttons( $plugin_array ) {
    $plugin_array['q_btn'] = plugins_url( 'js/editor.js',__FILE__ );
    return $plugin_array;
}

// Customizer options
function keksus_q_options() {
	// Sections
	$options['q_colors'] = array(
		'title'    => __('q-Shortcodes ( ͡° ͜ʖ ͡°)', 'q'),
        'type' 	   => 'add_section',
        'priority' => 100,
	);
	// Colors
	$options['button_bg'] = array(
		'label'		=> __( 'Button Background', 'q' ),
		'slug'		=> 'button_bg', 
		'default'	=> '#000',
		'section'	=> 'q_colors', 
		'type'	    => 'colors'
	);
	$options['button_color'] = array(
		'label'		=> __( 'Button Color', 'q' ),
		'slug'		=> 'button_color', 
		'default'	=> '#fff',
		'section'	=> 'q_colors', 
		'type'	    => 'colors'
	);
	$options['icon_btn_color'] = array(
		'label'		=> __( 'Button Icon Color', 'q' ),
		'slug'		=> 'icon_btn_color', 
		'default'	=> '#fff',
		'section'	=> 'q_colors', 
		'type'	    => 'colors'
	);
	$options['button_bg_serv'] = array(
		'label'		=> __( 'Service Button Background', 'q' ),
		'slug'		=> 'button_bg_serv', 
		'default'	=> '#000',
		'section'	=> 'q_colors', 
		'type'	    => 'colors'
	);
	$options['button_color_serv'] = array(
		'label'		=> __( 'Service Button Color', 'q' ),
		'slug'		=> 'button_color_serv', 
		'default'	=> '#fff',
		'section'	=> 'q_colors', 
		'type'	    => 'colors'
	);
	$options['button_radius'] = array(
		'label'		=> __( 'Buttons Border Radius', 'q' ),
		'slug'		=> 'button_radius', 
		'default'	=> '3px',
		'section'	=> 'q_colors', 
		'type'	    => 'text',
		'callback'  => 'keksus_q_sanitize_text'
	);
	$options['icon_color'] = array(
		'label'		=> __( 'Icons Block Color', 'q' ),
		'slug'		=> 'icon_color', 
		'default'	=> '#000',
		'section'	=> 'q_colors', 
		'type'	    => 'colors'
	);
	$options['toggle_bg'] = array(
		'label'		=> __( 'Toggle Background', 'q' ),
		'slug'		=> 'toggle_bg', 
		'default'	=> '#beeb9f',
		'section'	=> 'q_colors', 
		'type'	    => 'colors'
	);
	$options['divider_color'] = array(
		'label'		=> __( 'Divider Color', 'q' ),
		'slug'		=> 'divider_color', 
		'default'	=> '#ccc',
		'section'	=> 'q_colors', 
		'type'	    => 'colors'
	);
	$options['divider_width'] = array(
		'label'		=> __( 'Divider Height', 'q' ),
		'slug'		=> 'divider_width', 
		'default'	=> '1px',
		'section'	=> 'q_colors', 
		'type'	    => 'text',
		'callback'  => 'keksus_q_sanitize_text'
	);
	$options['divider_style'] = array(
		'label'		=> __( 'Divider Style', 'q' ),
		'slug'		=> 'divider_style', 
		'default'	=> '',
		'section'	=> 'q_colors', 
		'type'      => 'select',
        'choices'   => array(
            'solid'   => 'solid',
            'dotted'  => 'dotted',
            'dashed'  => 'dashed',
            'double'  => 'double'
        )
	);
	return $options;
}

// Customizer
function keksus_q_customize_register( $wp_customize ){

    foreach( keksus_q_options() as $k => $v ) {
    	$callback   = isset( $v['callback'] ) ? $v['callback'] : null;
		$priority   = isset( $v['priority'] ) ? $v['priority'] : null;
		$choices    = isset( $v['choices'] )  ? $v['choices']  : null;

    	if ( 'add_section' == $v['type'] ) {
    		// Add sections
			$wp_customize->add_section( 'q_'.$k, array(
				'title'		=> $v['title'],
				'priority' 	=> $priority
			));
		}
		elseif ( 'colors' == $v['type'] ){
			// Add colors
			$wp_customize->add_setting( $v['slug'], array(
				'default'			=> $v['default'],
				'transport' 		=> 'postMessage',
				'sanitize_callback'	=> $callback
			));
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $v['slug'], array(
				'label'		=> $v['label'], 
				'section'	=> 'q_'.$v['section'],
				'settings'	=> $v['slug'],
				'priority'	=> $priority
			)));
		}
		else {
			// Add other settings
			$wp_customize->add_setting( $v['slug'], array(
				'default'			=> $v['default'],
				'sanitize_callback'	=> $callback
			));
			$wp_customize->add_control( new WP_Customize_Control( $wp_customize, $v['slug'], array(
				'label'		=> $v['label'], 
				'section'	=> 'q_'.$v['section'],
				'type'		=> $v['type'],
				'priority'	=> $priority,
				'choices'   => $choices
			)));
		}
    }
 
}
add_action( 'customize_register', 'keksus_q_customize_register' );

// Add CSS to head
function keksus_q_customizer_head_styles() {
	$button_bg         = get_theme_mod( 'button_bg' ); 
	$button_color      = get_theme_mod( 'button_color' );
	$button_bg_serv    = get_theme_mod( 'button_bg_serv' ); 
	$button_color_serv = get_theme_mod( 'button_color_serv' );
	$button_radius     = get_theme_mod( 'button_radius' );
	$icon_color        = get_theme_mod( 'icon_color' );
	$icon_btn_color    = get_theme_mod( 'icon_btn_color' );
	$toggle_bg         = get_theme_mod( 'toggle_bg' ); 
	$divider_width     = get_theme_mod( 'divider_width' ); 
	$divider_style     = get_theme_mod( 'divider_style' );
	$divider_color     = get_theme_mod( 'divider_color' );
    ?>
		<style type="text/css">
			.q_btn{
				background: <?php echo $button_bg; ?>; 
			}
			.q_btn{
				color: <?php echo $button_color; ?>; 
			}
			.q_btn_service{
				background: <?php echo $button_bg_serv; ?>; 
			}
			.q_btn_service{
				color: <?php echo $button_color_serv; ?>; 
			}
			.q_btn,.q_btn_service{
				border-radius: <?php echo $button_radius; ?>; 
			}
			.qicon i{
				color: <?php echo $icon_color; ?>; 
			}
			.q_btn i{
				color: <?php echo $icon_btn_color; ?>; 
			}
			.toggle_title{
				background: <?php echo $toggle_bg; ?>; 
			}
			.q_divider{
				border-width: <?php echo $divider_width; ?>; 
			}
			.q_divider{
				border-bottom-style: <?php echo $divider_style; ?>; 
			}
			.q_divider{
				border-color: <?php echo $divider_color; ?>; 
			}
		</style>
	<?php
}
add_action( 'wp_head', 'keksus_q_customizer_head_styles');

/**
 * Sanitize input text
 * force_balance_tags($text) Wordpress function in /wp-includes/formatting.php
 */
function keksus_q_sanitize_text( $input ) {
	return wp_kses_post(force_balance_tags($input));
}
