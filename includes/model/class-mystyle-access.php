<?php
/**
 * The MyStyle_Access class stores the various different possible values for the
 * MyStyle access variable.
 *
 * Note: the constants are all prefixed with 'ACCESS_' because the rest of the
 * name in all three cases is a reserved word in PHP.
 *
 * @package MyStyle
 * @since 1.4.2
 */

/**
 * MyStyle_Access class.
 */
abstract class MyStyle_Access {

	/**
	 * Anyone can access.
	 *
	 * @var int
	 */
	const ACCESS_PUBLIC = 0;

	/**
	 * Only the author can access.
	 *
	 * @var int
	 */
	const ACCESS_PRIVATE = 1;

	/**
	 * Only the admin can access (not yet implemented).
	 *
	 * @var int
	 */
	const ACCESS_RESTRICTED = 2;

}
