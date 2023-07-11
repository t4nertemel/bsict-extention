<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.linkedin.com/in/taner-temel-ba7b9844
 * @since      1.0.0
 *
 * @package    Bsict_Extention
 * @subpackage Bsict_Extention/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Bsict_Extention
 * @subpackage Bsict_Extention/includes
 * @author     Taner Temel <taner.temel@sict.bolton.gov.uk>
 */
class Bsict_Extention_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'bsict-extention',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
