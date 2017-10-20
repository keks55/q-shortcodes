/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// button background colors
	wp.customize( 'button_bg', function( value ) {
		value.bind( function( to ) {
			$( '.q_btn' ).css('background', to );
		});
	});
	wp.customize( 'button_color', function( value ) {
		value.bind( function( to ) {
			$( '.q_btn' ).css('color', to );
		});
	});
	// service button background colors
	wp.customize( 'button_bg_serv', function( value ) {
		value.bind( function( to ) {
			$( '.q_btn_service' ).css('background', to );
		});
	});
	wp.customize( 'button_color_serv', function( value ) {
		value.bind( function( to ) {
			$( '.q_btn_service' ).css('color', to );
		});
	});
	// toggle settings
	wp.customize( 'toggle_bg', function( value ) {
		value.bind( function( to ) {
			$( '.toggle_title' ).css('background', to );
		});
	});
	// icon color
	wp.customize( 'icon_color', function( value ) {
		value.bind( function( to ) {
			$( '.qicon i' ).css('color', to );
		});
	});
	// button icon color
	wp.customize( 'icon_btn_color', function( value ) {
		value.bind( function( to ) {
			$( '.q_btn i' ).css('color', to );
		});
	});
	// divider settings
	wp.customize( 'divider_width', function( value ) {
		value.bind( function( to ) {
			$( '.q_divider' ).css('border-width', to );
		});
	});
	wp.customize( 'divider_style', function( value ) {
		value.bind( function( to ) {
			$( '.q_divider' ).css('border-style', to );
		});
	});
	wp.customize( 'divider_color', function( value ) {
		value.bind( function( to ) {
			$( '.q_divider' ).css('border-color', to );
		});
	});
} )( jQuery );
