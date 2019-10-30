<?php
/**
 *
 * Class for integrating with the WPML (The WordPress Multilingual) plugin.
 *
 * @package MyStyle
 * @since 3.13.2
 */

/**
 * MyStyle_Wpml class.
 */
class MyStyle_Wpml {

	/**
	 * The name of the db table where this WPML translations are stored.
	 *
	 * Note: this is without the db prefix.
	 *
	 * @var string
	 */
	const TRANSLATIONS_TABLE_NAME = 'icl_translations';

	/**
	 * Singleton class instance.
	 *
	 * @var MyStyle_Wpml
	 */
	private static $instance;

	/**
	 * Returns the name of the WPML translations table.
	 *
	 * @global type $wpdb
	 * @return string Returns the name of the WPML translations table.
	 */
	public function get_translations_table_name() {
		global $wpdb;

		return $wpdb->prefix . self::TRANSLATIONS_TABLE_NAME;
	}

	/**
	 * Function that determines if the the WPML plugin is installed.
	 *
	 * Note: we test against database tables so that this function will work
	 * regardless of plugin load order.
	 *
	 * @returns boolean Returns true if the WPML plugin is installed. Otherwise,
	 * returns false.
	 * @global type $wpdb
	 */
	public function is_installed() {
		global $wpdb;

		$table_name = $this->get_translations_table_name();

		$stmt = $wpdb->prepare( 'SHOW TABLES LIKE \'%s\'', $table_name );

		$found_table_name = $wpdb->get_var( $stmt );

		if ( $found_table_name === $table_name ) {
			$is_installed = true;
		} else {
			$is_installed = false;
		}

		return $is_installed;
	}

	/**
	 * Function that determines if the page with an id of $translation_id is a
	 * translation of the page with an id of $parent_id.
	 *
	 * @param int $parent_id The post id of the parent page.
	 * @param int $translation_id The post id of the page that might be a
	 * translation.
	 * @returns boolean Returns true if the page is a translation of the
	 * parent page. Returns false if the page is not a translation of the parent
	 * page. Also returns false if WPML isn't found.
	 * @global type $wpdb
	 */
	public function is_translation_of_page( $parent_id, $translation_id ) {
		global $wpdb;

		// If WPML isn't installed, just return false.
		if ( ! $this->is_installed() ) {
			return false;
		}

		$stmt = $wpdb->prepare(
			"SELECT 1
			 FROM {$this->get_translations_table_name()}
			 WHERE element_type = 'post_page'
			 AND element_id = %d
			 AND trid = (SELECT trid
				FROM {$this->get_translations_table_name()}
				WHERE element_type = 'post_page'
				AND element_id = %d
				)
			",
			$translation_id, $parent_id
		);
		$ret = $wpdb->query($stmt);

		$is_translation_of_page = boolval($ret);

		return boolval($ret);
	}

	/**
	 * Resets the singleton instance. This is used during testing if we want to
	 * clear out the existing singleton instance.
	 *
	 * @return MyStyle_Wpml Returns the singleton instance
	 * of this class.
	 */
	public static function reset_instance() {

		self::$instance = new self();

		return self::$instance;
	}

	/**
	 * Gets the singleton instance.
	 *
	 * @return MyStyle_Wpml Returns the singleton instance
	 * of this class.
	 */
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

}