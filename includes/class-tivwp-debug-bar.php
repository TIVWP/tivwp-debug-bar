<?php

/**
 * Class TIVWP_Debug_Bar
 */
class TIVWP_Debug_Bar {

	/**
	 * Collect strings for the output here.
	 *
	 * @var string[]
	 */
	protected static $output = array();

	/**
	 * Getter for the `$output`.
	 *
	 * @return string[]
	 */
	public static function getOutput() {
		return self::$output;
	}

	/**
	 * Setter for the `$output` - appends to it.
	 *
	 * @param string $string_to_add
	 */
	public static function output_add( $string_to_add ) {
		self::$output[] = $string_to_add;
	}

	/**
	 * TIVWP_Updater_Debug_Bar static "constructor".
	 */
	public static function construct() {
		add_filter( 'debug_bar_panels', array( __CLASS__, 'debug_bar_panels' ), PHP_INT_MAX );

	}

	/**
	 * Create the Debug Bar panel.
	 *
	 * @param array $panels Array of existing panels.
	 *
	 * @return array Array with our panel added.
	 */
	public static function debug_bar_panels( $panels ) {
		require_once dirname( __FILE__ ) . '/class-tivwp-debug-bar-panel.php';
		$panel    = new TIVWP_Debug_Bar_Panel( 'TIVWP' );
		$panels[] = $panel;

		return $panels;
	}

	/**
	 * Add a link to the output.
	 *
	 * @param string $url       The URL.
	 * @param string $link_text The text. Default is the URL itself.
	 */
	public static function print_link( $url, $link_text = '' ) {
		self::output_add( ''
		                  . '<a href="' . esc_url( $url ) . '">'
		                  . esc_html( $link_text ?: $url )
		                  . '</a>' );
		self::print_backtrace();
	}

	/**
	 * Add formatted backtrace to the output.
	 */
	public static function print_backtrace() {
		ob_start();
		debug_print_backtrace();
		self::output_add( '<pre>' . ob_get_clean() . '</pre>' );
	}
}
