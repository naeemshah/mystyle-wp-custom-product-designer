<?php
/**
 * Class for the MyStyle Design Profile Shortcode.
 *
 * @package MyStyle
 * @since 1.4.0
 */

/**
 * MyStyle_Design_Profile_Shortcode class.
 */
abstract class MyStyle_Design_Profile_Shortcode {

	/**
	 * Output the design profile shortcode.
	 */
	public static function output() {

		$design_profile_page = MyStyle_Design_Profile_Page::get_instance();

		// -------------------- Handle exceptions ---------------------- //
		$ex = $design_profile_page->get_exception();
		if ( null !== $ex ) {
			if ( null !== $design_profile_page->get_pager() ) {
				// Index.
				$template_name = 'design-profile/index-error-general.php';
			} else {
				// Design profile page.
				switch ( get_class( $ex ) ) {
					case 'MyStyle_Unauthorized_Exception':
						$template_name = 'design-profile/profile-error-unauthorized.php';
						break;
					case 'MyStyle_Forbidden_Exception':
						$template_name = 'design-profile/profile-error-forbidden.php';
						break;
					default:
						$template_name = 'design-profile/profile-error-general.php';
				}
			}

			ob_start();
			require MYSTYLE_TEMPLATES . $template_name;
			$out = ob_get_contents();
			ob_end_clean();
		} else {
			// --------------- Valid Requests ------------------------- //
			if ( null !== $design_profile_page->get_design() ) {
				$out = self::output_design_profile();
			} else {
				$out = self::output_design_index();
			}
		}

		return $out;
	}

	/**
	 * Returns the output for a design profile.
	 *
	 * @return string
	 */
	public static function output_design_profile() {
		$design_profile_page = MyStyle_Design_Profile_Page::get_instance();

		// ------------- Set the template variables -------------------//
		$design = $design_profile_page->get_design();

		$previous_design = $design_profile_page->get_previous_design();
		if ( null !== $previous_design ) {
			$previous_design_url = MyStyle_Design_Profile_Page::get_design_url( $previous_design );
		}

		$next_design = $design_profile_page->get_next_design();
		if ( null !== $next_design ) {
			$next_design_url = MyStyle_Design_Profile_Page::get_design_url( $next_design );
		}

		$product     = $design->get_Product();
		$product_menu_type = MyStyle_Options::get_design_profile_product_menu_type();

		// ---------- Call the view layer -------------------- //
		ob_start();
		require MYSTYLE_TEMPLATES . 'design-profile/profile.php';
		$out = ob_get_contents();
		ob_end_clean();

		return $out;
	}

	/**
	 * Returns the output for the design index.
	 *
	 * @return string Returns the output for the design index.
	 */
	public static function output_design_index() {
		// Get the design profile page.
		$design_profile_page = MyStyle_Design_Profile_Page::get_instance();

		/* @var $pager \Mystyle_Pager phpcs:ignore */
		$pager = $design_profile_page->get_pager();

		// ---------- Call the view layer ------------------ //
		ob_start();
		require MYSTYLE_TEMPLATES . 'design-profile/index.php';
		$out = ob_get_contents();
		ob_end_clean();

		return $out;
	}

}
