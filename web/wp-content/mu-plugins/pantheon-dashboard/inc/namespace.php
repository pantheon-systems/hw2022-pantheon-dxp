<?php
namespace Pantheon\Dashboard;

use WP_Admin_Bar;
use WP_Http;
use WP_Theme;

// Primary colors.
const COLOR_BLUE = '#3017A1';
const COLOR_BLACK = '#000000';
const COLOR_WHITE = '#FFFFFF';
const COLOR_YELLOW = '#ffdc28';

function bootstrap() {
	add_action( 'admin_init', __NAMESPACE__ . '\\add_color_scheme', 999 );
	add_action( 'admin_bar_menu', __NAMESPACE__ . '\\admin_bar_menu' );
}

function add_color_scheme() {
	wp_admin_css_color(
		'pantheon',
		__( 'Pantheon' ),
		add_query_arg( 'version', 'hw2022-10-26-1' . time(), plugin_dir_url( dirname( __FILE__ ) ) . 'dist/css/pantheon-dashboard.css' ),
		[
			COLOR_BLUE,
			COLOR_BLACK,
			COLOR_YELLOW,
			COLOR_WHITE,
		],
		[
			'base' => COLOR_WHITE,
			'focus' => COLOR_BLUE,
			'current' => COLOR_BLUE,
		]
	);
}

/**
 * Add new admin menu bar logo.
 */
function admin_bar_menu( WP_Admin_Bar $wp_admin_bar ) {
	$logo_url = get_logo_url();
	$alt_text = __( 'Pantheon Admin' );
	// Add the new logo item.
	$wp_admin_bar->add_menu(
		[
			'id' => 'pantheon',
			'title' => "<span class=\"pantheon-logo-wrapper\"><img src=\"$logo_url\" alt=\"$alt_text\" height=\"32\" /></span><span class=\"screen-reader-text\">Pantheon</span>",
			'href' => admin_url(),
		]
	);
}

/**
 * Get the logo url.
 */
function get_logo_url() : string {
	return sprintf( '%s/assets/%s', untrailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ), 'pantheon-logo-white.svg' );
}

