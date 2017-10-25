<?php
// remove &nbsp;
function fix_html( $content ){   
	$array = array (
		'&nbsp;' => '',
	);
	$content = strtr( $content, $array );
	return $content;
}
add_filter( 'the_content', 'fix_html' );

// Button
function q_button_shortcode( $atts, $content = null ){
	extract( shortcode_atts( array(
		'text'    => 'Sample text',
		'url'     => '',
		'target'  => 'self',
		'icon'    => ''
	), $atts ));
	
	$out  = '<div class="qb">';
	$out .= '<a class="q_btn" target='. esc_attr( $target ) .' href='. esc_attr( $url ) .'>';
	if ( $icon ) 
	$out .= '<i class="'. esc_attr( $icon ) .'"></i>';
	$out .= '<span>'. do_shortcode( wp_kses_post( $content ) ) .'</span></a>';
	$out .=	'</div>';
	return $out;
}
add_shortcode('q_button', 'q_button_shortcode');

// Icons block
function q_icon_shortcode( $atts, $content = null ){
	extract( shortcode_atts( array(
		'class'    => 'ion-flag'
	), $atts ));
	return '<div class="qicons">
				<div class="qicon"><i class="'. esc_attr( $class ) .'"></i></div>
				'. do_shortcode( wp_kses_post( $content ) ) .'
			</div>';
}
add_shortcode('q_icon', 'q_icon_shortcode');

// Tabs block
function q_tabs_shortcode( $atts, $content = null ){
	extract( shortcode_atts( array(
		'tabcount'    => ''
	), $atts ));
	$out  = '<div class="qtbs">';
	$out .= '<div class="tabs"><ul class="tab-links">'. do_shortcode( wp_kses_post( $content ) ) .'</ul></div>';
	$out .= '<div class="tab-content"></div>';
	$out .= '</div>';
	return $out;	
}
add_shortcode('q_tabs', 'q_tabs_shortcode');

// Tab block
function q_tab_shortcode( $atts, $content = null ){
	extract( shortcode_atts( array(
		'id'    => '',
		'name'  => ''
	), $atts ));
	$out  = '<li><a href="#tab'.$id.'">'.$name.'</a></li>';
	$out .= '<div id="tab'.$id.'" class="tab">'. do_shortcode( wp_kses_post( $content ) ) .'</div>';
	return $out;
}
add_shortcode('q_tab', 'q_tab_shortcode');

// Service block
function q_service_shortcode( $atts, $content = null ){
	extract( shortcode_atts( array(
		'btn_text' => 'read more',
		'url'      => '',
		'target'   => 'self',
	), $atts ));
	return '<div class="q_service">
				'. do_shortcode( wp_kses_post( $content ) ) .'
				<div class="service_btn"><a class="q_btn_service" target='. esc_attr( $target ) .' href='. esc_attr( $url ) .'><span>'. esc_attr( $btn_text ) .'</span></a></div>		
			</div>';
}
add_shortcode('q_service', 'q_service_shortcode');

// Toggle block
function q_toggle_shortcode( $atts, $content = null ){
	extract( shortcode_atts( array(
		'title'    => 'Sample toggle title'
	), $atts ));
	$out  = '<div class="qtoggle">';
	$out .= '<div class="toggle_title"><i class="ion-plus"></i>'. esc_attr( $title ) .'</div>';
	$out .= '<div class="toggle_text"><p>'. do_shortcode( wp_kses_post( $content ) ) .'</p></div>';
	$out .= '</div>';
	return $out;	
}
add_shortcode('q_toggle', 'q_toggle_shortcode');

// Divider line
function q_divider_shortcode(){
	return '<div class="q_divider"></div>';
}
add_shortcode('q_divider', 'q_divider_shortcode');

// Columns
function q_column_shortcode( $atts, $content = null ){
	return '<div class="q">'. do_shortcode( wp_kses_post( $content ) ) .'</div>';
}
add_shortcode('q', 'q_column_shortcode');
function q1_column_shortcode( $atts, $content = null ){
	return '<div class="q1">'. do_shortcode( wp_kses_post( $content ) ) .'</div>';
}
add_shortcode('q1', 'q1_column_shortcode');

function q2_column_shortcode( $atts, $content = null ){
	return '<div class="q2">'. do_shortcode( wp_kses_post( $content ) ) .'</div>';
}
add_shortcode('q2', 'q2_column_shortcode');

function q3_column_shortcode( $atts, $content = null ){
	return '<div class="q3">'. do_shortcode( wp_kses_post( $content ) ) .'</div>';
}
add_shortcode('q3', 'q3_column_shortcode');

function q4_column_shortcode( $atts, $content = null ){
	return '<div class="q4">'. do_shortcode( wp_kses_post( $content ) ) .'</div>';
}
add_shortcode('q4', 'q4_column_shortcode');

function q5_column_shortcode( $atts, $content = null ){
	return '<div class="q5">'. do_shortcode( wp_kses_post( $content ) ) .'</div>';
}
add_shortcode('q5', 'q5_column_shortcode');

function q6_column_shortcode( $atts, $content = null ){
	return '<div class="q6">'. do_shortcode( wp_kses_post( $content ) ) .'</div>';
}
add_shortcode('q6', 'q6_column_shortcode');

function q7_column_shortcode( $atts, $content = null ){
	return '<div class="q7">'. do_shortcode( wp_kses_post( $content ) ) .'</div>';
}
add_shortcode('q7', 'q7_column_shortcode');

function q8_column_shortcode( $atts, $content = null ){
	return '<div class="q8">'. do_shortcode( wp_kses_post( $content ) ) .'</div>';
}
add_shortcode('q8', 'q8_column_shortcode');

function q9_column_shortcode( $atts, $content = null ){
	return '<div class="q9">'. do_shortcode( wp_kses_post( $content ) ) .'</div>';
}
add_shortcode('q9', 'q9_column_shortcode');

function q10_column_shortcode( $atts, $content = null ){
	return '<div class="q10">'. do_shortcode( wp_kses_post( $content ) ) .'</div>';
}
add_shortcode('q10', 'q10_column_shortcode');

function q11_column_shortcode( $atts, $content = null ){
	return '<div class="q11">'. do_shortcode( wp_kses_post( $content ) ) .'</div>';
}
add_shortcode('q11', 'q11_column_shortcode');

function q12_column_shortcode( $atts, $content = null ){
	return '<div class="q12">'. do_shortcode( wp_kses_post( $content ) ) .'</div>';
}
add_shortcode('q12', 'q12_column_shortcode');
// end columns

// Clear div
function q_clear_shortcode(){
	return '<div class="q_clear"></div>';
}
add_shortcode('q_clear', 'q_clear_shortcode');



