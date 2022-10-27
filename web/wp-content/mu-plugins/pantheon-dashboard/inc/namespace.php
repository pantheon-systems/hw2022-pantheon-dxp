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