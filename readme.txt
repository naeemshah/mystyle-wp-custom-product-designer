=== MyStyle Custom Product Designer ===
Contributors: mystyleplatform
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.html
Tags: customization, designer, personalization, product-preview, woocommerce, custom product, product designer, Post, plugin, admin, posts, shortcode, images, page, image
Requires at least: 3.3
Tested up to: 5.2.4
Requires PHP: 5.3
Stable tag: 3.13.7

The MyStyle Custom Product Designer allows your website visitors to design, customize & personalize, and purchase your WooCommerce products.

== Description ==

You can enable any product in WooCommerce for personalization / customization using the MyStyle Custom Product Designer.  This allows any user to design their own graphics with a photo-realistic live product preview, and can generate the print file for the order to exact high-res specs (Full-Mode only).  The Customizer itself complete with graphics, uploaded images, and high-res print images are hosted remotely in the cloud by the MyStyle Platform and Amazon s3.  Users have a live product preview throughout the design experience.  Popular products to personalize include phone cases, t-shirts, canvas prints, etc.

= Requirements =

Please note that the MyStyle Custom Product Designer is a serviceware plugin, and requires an active MyStyle Developer account to use in Full-Mode and for access to the high-res, cloud-hosted print files.  The MyStyle Custom Product Designer works in conjunction with the [MyStylePlatform.com](http://www.mystyleplatform.com/?ref=wprm) customization service.

= Benefits =

* Awesome User Experience
* User-designed products saves time and eliminates redundant design work
* High design-completion and sell-thru ratios
* World-class design tools in the MyStyle Customizer
* Easy / Quick to install
* Print-ready images streamline production with any fulfillment
 * Use our catalog of products and network of manufacturers, or use your own!
* Experienced San Diego based development team for support or custom feature development
* 100% American Made in the USA! No outsourcing!

= Plugin Features =

* Users can design their own products right on your website and:
 * Upload photos
 * Add custom text (vector)
 * Add custom patterns with custom colors
 * Apply cool effects (dropshadow, glow, bevel)
 * Design multi-side products
 * Design multiple sides simultaneously
 * Add gradients (color fades)
* Integrates with WooCommerce products easily
* Adds custom products directly to the user's WooCommerce shopping cart
* Product prices and description content controlled by WooCommerce as normal
* Thumbnail of user's custom design shows in the shopping cart for each customized item
* Flash AND HTML5 Mobile versions
 * Mobile auto-detection
* Print-ready image file generation (can be made to match your exact print specs)
 * Print files can be retrieved in the normal WooCommerce order history in the admin (Full-Mode only)
 * Print files are available with a paid license (see [MyStyle Platform website](http://www.mystyleplatform.com/?ref=wprm2) for pricing)
* New products can be added to our system upon request
* New backgrounds, foregrounds or fonts can be added upon request
* Configur8 feature allowing the product image on the product info page to be changed based on user input.

= Examples =

You can see some examples of the MyStyle Custom Product Designer in use (and try it out) at the following sites:

* [Custom skateboards and longboards](http://www.whateverskateboards.com/?ref=wprm2) (Whatever Skateboards)
* [Custom canvas prints](http://www.makecanvasprints.com/?ref=wprm2) (Make Canvas Prints)
* [Disc golf discs and ultimate frisbee discs](http://www.flydiscs.com/?ref=wprm2) (Fly Discs)
* [iPhone cases and phone cases](http://www.case-monkey.com/?ref=wprm2) (Case Monkey)

== Installation ==

The MyStyle Custom Product Designer requires that you have WordPress with the WooCommerce plugin activated. The plugin is very easy to install and can be set up in just a few minutes.  This is a serviceware plugin, meaning that once installed, it will load the Custom Product Designer app remotely from a hosted service, and it will function with all features. However, when in Demo Mode, it will function without access to Print Files. To enable Full Mode, with access to print files, you will need to obtain your MyStyle Developer API Key and Secret, and enter them in your MyStyle settings.

1. Install the Plugin:  Upload the mystyle folder to your website's `/wp-content/plugins/` directory
2. Activate the plugin:  Find MyStyle in your 'Plugins' menu in the WordPress admin and press 'Activate'.  This will enable the plugin and also automatically create a "customize" page where the Product Designer will load when someone goes to design their own product. This new Customize page will be created complete with the Customizer Shortcode already in the content. You do not have to manually create your Customize App page or use the shortcode anywhere.  When a user clicks 'customize' on any product, they will be taken to this automatically created page.  You may change the title of this page in your page list, or add your own content to it before or after the shortcode.
3. Follow the links in the Settings > MyStyle admin to obtain your Developer account, API Key and Secret, and enter them in the settings page.  When you register for your Developer account, you'll be given a temporary demo ID to test with until we can review your account and provide you with your own credentials.
4. In the WooCommerce product settings, go to the MyStyle tab (beneath product data), check the box 'Make Customizable' box and enter a corresponding Template Id. Try using the Template Id 70 for a 12x16 canvas print template.  You will receive a list of template ids once you have an active license.

== Screenshots ==

1. Example of a phone case in the customizer with text added that says "Your Design Here" with different fonts, dropshadow colors, and a Blue-to-Pink gradient as the background
2. Example of someone customizing text on the side of a BMW
3. Example of someone who has uploaded a number of images into a phone case design and is adding some stylized text with glow and shadow
4. Example of a Skateboard being customized in the customizer
5. Example of a Smart Car with a background image applied

== Changelog ==
= 3.13.7 =
* Fixed the ability to load designs on another product

= 3.13.6 =
* Minor bug fixes

= 3.13.5 =
* Customizer now correctly redirects to translated cart (when using WPML).

= 3.13.4 =
* Bumping the version to fix an issue with the previous release (3.13.3).

= 3.13.3 =
* Bumping the version to fix an issue with the previous release (3.13.2).

= 3.13.2 =
* Fixed a bug where the customizer wasn't showing on translations of the MyStyle Customize page.

= 3.13.1 =
* Now returns directly to cart after TM Extra Product Options cart item edit.
* Updated the readme.txt to reflect that the plugin has been tested with up to WP 5.2.4.

= 3.13.0 =
* Added a new 'hidden' design access setting.
* Updated the readme.txt to reflect that the plugin has been tested with up to WP 5.2.3.
* Updated the main plugin file to reflect that the plugin has been tested with up to WC 3.7.1.

= 3.12.5 =
* Fixed a bug with the customize page with sites running later versions of 
  jQuery.

= 3.12.4 =
* Fixed a bug where deleted designs were breaking the cart (if the user had that
  particular design in their cart).
* Updated the readme.txt to reflect that the plugin has been tested with up to WP 5.2.2.

= 3.12.3 =
* Improved the styling/usablitity of the MyStyle controls on the WC Order form.

= 3.12.2 =
* Fixed a bug where the customizer was failing to load under certain circumstances.

= 3.12.1 =
* Added a safety check to the function that overwrites the cart image.
* Updated the readme.txt to reflect that the plugin has been tested with up to WP 5.2.1.
* Updated the main plugin file to reflect that the plugin has been tested with up to WC 3.6.4.

= 3.12.0 =
* Added CRUD functionality for MyStyle Designs to the WordPress/WooCommerce REST API.

= 3.11.1 =
* Fixed a conflict with retrieving the mystyle session when other plugins have
  prematurely started the PHP session.

= 3.11.0 =
* Made the MyStyle admin options hookable.
* Updated the NPM/JavaScript dependencies.

= 3.10.1 =
* Fixed a bug with the tool functions on the main settings page.
* Updated the readme.txt to reflect that the plugin has been tested with up to WP 5.1.1.
* Updated the main plugin file to reflect that the plugin has been tested with up to WC 3.5.7.

= 3.10.0 =
* Now adds a "Custom " prefix (ex "Custom T-Shirt") to the title on the design profile page (@webbninja).
* Now shows a list of products below the design on the design profile page for the customer to add the design to.
  Allows you to customize the layout of this list (grid, list, disabled) via an admin setting (@webbninja).
* Now skips the email input step for the customizer when the user is already logged in (@webbninja).
* Updated the readme.txt to reflect that the plugin has been tested with up to WP 5.1.0.
* Updated the 'WC tested up to' variable to reflect that the plugin has been tested with up to WooCommerce 3.5.5.

= 3.9.1 =
* Fixed bug where 404 response code was being incorrectly set.

= 3.9.0 =
* Hid unnecessary links in footer for better design through conversion on customizer page.
* Fixed a bug with the viewport scaling on the Customize page.
* Made the "Full Screen" button font and close icon larger.
* Moved full screen button above app for mobile users who cannot scroll.
* Added JS testing with Karma, Mocha and Chai.
* Added CSS linting with stylelint.
* Added JS linting with eslint.

= 3.8.2 =
* Fixed a bug where the options from designs that were upgraded to products weren't coming through.

= 3.8.1 =
* Now resizing the viewport on the Customize page when the window is resized.
* Added a CSS rule that fixes large margins on the Customize page for the Divi theme.

= 3.8.0 =
* Fixed all code style issues flagged by PHPCS.
* Fixed numerous security issues flagged by PHPCS.
* Added code coverage analysis tools.
* Added the ability to set per-product design complete redirect urls (@webbninja)
* Added contributing and issue submission guidelines for GitHub.
* Updated the readme.txt to reflect that the plugin has been tested with up to WP 5.0.3.
* Updated the 'WC tested up to' variable to reflect that the plugin has been tested with up to WooCommerce 3.5.4.

= 3.7.0 =
* Form Integration Config feature is now functional.

= 3.6.0 =
* Added the Configur8 feature.

= 3.5.3 =
* Fixed a bug where pagination wasn't showing on the Customize page for WC 3.2 and up when there were more than 12 customizable products.
* Updated the readme.txt to reflect that the plugin has been tested with up to WP 4.9.8.
* Updated the 'WC tested up to' variable to reflect that the plugin has been tested with up to WooCommerce 3.4.5.

= 3.5.2 =
* Fixed a bug where the redirect whitelist code was expecting different line endings.
* Updated the readme.txt to reflect that the plugin has been tested with up to WP 4.9.6.

= 3.5.1 =
* Fixed a bug with setting the enable Flash option.

= 3.5.0 =
* Fixed a bug with the MyStyle Handoff when using the Alternate Design Complete URL option.
* Added a switch to hide/show the Add to Cart button on the Design Profile page.
* Refactored the option retrieval functions.

= 3.4.0 =
* Now tacks `design_complete=1` and `design_id=<new design id>` onto the Alternate Design Complete Redirect URL.
* Includes a design_complete.js file. This file will set the value of any design_id form fields.
* Adds the design_complete.js file on pages with the design_complete=1 url param.
* Adds a [mystyle_design] shortcode that will display a design and link to a print file (or the Renderer).

= 3.3.0 =
* Added full-screen mode.
* More responsive customizer improvements (viewport, landscape/portrait orientation, etc).

= 3.2.0 =
* Responsive customizer improvements (viewport, etc).
* Updated the readme.txt to reflect that the plugin is compatible with up to WordPress 4.9.5.

= 3.1.3 =
* Redirect URLs can now be passed in via the customizer page URL. Redirect URL domains must be whitelisted in the settings.

= 3.1.2 =
* Bug Fix: Fixed a bug with our design profile shortcode and WP 4.9's new Sandbox for Safety feature.
* Updated the readme.txt to reflect that the plugin is compatible with up to WordPress 4.9.2.

= 3.1.1 =
* Security bug: Fixed a security bug where private designs were being listed on the design gallery/index.

= 3.1.0 =
* Now gracefully handling no WooCommerce situations.
* You can now set an alternate design complete url.
* Updated the readme.txt to reflect that the plugin is tested with up to WP 4.8.3.
* Updated the 'WC tested up to' field to 3.2.3.

= 3.0.0 =
* Plugin now uses the MyStyle HTML5 based customizer by default (previous versions used the Flash customizer by default).

= 2.1.3 =
* Minor fixes to the MyStyle_WooCommerce_Admin_Order class.
* Updated readme.txt to reflect that the plugin has been tested with up to WP 4.8.2.
* Updated the mystyle.php file to refect that the plugin requires at least version 2.2.0 of WooCommerce.
* Updated the mystyle.php file to refect that the plugin has been tested with up to version 3.1.2 of WooCommerce.

= 2.1.2 =
* Changed renderer link to show for all lincensees.
* Changed links on former print image urls to only show if image data contains the correct file extension.

= 2.1.1 =
* Fixed an issue with the Design Profile Page Fix tool.
* Updated readme.txt to reflect that the plugin has been tested with up to WP 4.8.0.
* Updated readme.txt to reflect that the plugin has been tested with up to WooCommerce 3.1.1.

= 2.1.0 =
* Added a system for theming the output of the plugin.
* Added a themable template file for the output of the cart item thumbnail for customized products.

= 2.0.3 =
* Now using actual passthru data from the handoff in the design complete email reload url.
* Now sending actual passthru data from the handoff in the mystyle_send_design_complete_email hook (used by the Email Manager add-on).
* Reception of the design description and price is now optional in the handoff (fixes an error message briefly displayed before redirecting to the cart).

= 2.0.2 =
* Fixed a bug with setting the quantity when adding to the cart from the design profile page.
* Now goes to the cart and displays a message when adding to the cart from the design profile page.

= 2.0.1 =
* Fixed an issue with the retrieving order item designs when the design is private.

= 2.0.0 =
* Added support for WC 3.0
* Added support for PHP 7.0
* Added support for HTTPS for the HTML5 customizer.

= 1.7.0 =
* Now only storing sessions after design save.
* Automatically purges all abandoned sessions.

= 1.6.3 =
* Now catching session errors (and starting a new session).

= 1.6.2 =
* Fixed an integration issue with the woocommerce-dynamic-pricing plugin.

= 1.6.1 =
* Hotfix to fix errors caused by vcs merge issue in v1.6.0 release.

= 1.6.0 =
* Now able to add variation data to the cart from the design profile page.
* Now recalculating the variation_id based on the selected attributes in the post data during the handoff.
* Fixed bug where the 'wc' property in the MyStyle class was erroneously marked as 'static'.

= 1.5.2 =
* Renderer link.

= 1.5.1 =
* Fixed a bug causing a MyStyle_Unauthorized_Exception when an anonymous user attempted to create a private design.

= 1.5.0 =
* Added link to the cart to edit the design.
* Fixed a bug with the price showing incorrectly for products with variations.
* Fixed a bug with that was occurring when the design_id somehow ended up as an empty string.
* Significant improvements to the testing system (fixed isolation bugs, fixed dependency issues).
* Significant refactoring (reorganized much of the code by function, additional use of singletons).

= 1.4.9 =
* Updated the user facing order info to use the design profile url.
* Added style for an admin warning box. Added delete function to the DesignManager class.
* Fixed the notice system to allow for different colors for different notice types.

= 1.4.8 =
* Added function for instantiating a design from a result array (for use by add-ons at this point).

= 1.4.7 =
* Changed the default title for the Design Profile Page to 'Community Design Gallery'.
* Changed the page title for individual design profile pages to 'Design ####'.

= 1.4.6 =
* Added support for editing designs that are in the cart.
* Updated the readme.txt to reflect that the plugin is fully tested and working with WP 4.6.1.

= 1.4.5 =
* Now supports /customize urls that are missing the "h" parameter (falls back to quantity 1 with no options).

= 1.4.4 =
* Fixed a bug with creating and purchasing private designs while not logged in.
* Updated the readme.txt to reflect that the plugin is fully tested and working with WP 4.6.0.

= 1.4.3 =
* Added pagination to the design profile index.
* Listed the Email Manager in the add-ons directory.

= 1.4.2 =
* Added a design index where you can view and page through saved public designs.
* Now storing cart data with the design.
* Design profile page now supports custom slugs.
* Fixed bug where customize page title was being hidden from menus.

= 1.4.1 =
* Fixed a bug where the upgrader wasn't properly creating the design profile page.

= 1.4.0 =
* Added design profile pages.

= 1.3.7 =
* Fixed a bug that occurred when an order was marked as completed.

= 1.3.6 =
* Added code to recreate invalid session ids.

= 1.3.5 =
* Fixed a bug with the function that generates session ids.

= 1.3.4 =
* Updated the session id generation function to add support for servers that don't have openssl.
* Updated the instructions in the readme.txt

= 1.3.3 =
* Bumping the version to try to fix vcs merge issue.

= 1.3.2 =
* Removed duplicate upgrade code from the MyStyle class constructor, to try to fix upgrade issue.

= 1.3.1 =
* Now setting the design complete email 'from' address using the admin email and blog name.
* Fixed a bug with the boolean options on the main settings page.
* Now passing through the print_type.
* Fixed an issue where the save/validation messages weren't showing on the main settings page.
* Added a 'mystyle_send_design_complete_email' action hook to allow for custom design complete emails.

= 1.3.0 =
* Now storing additional data including the designer's email address.
* Now tracking sessions.
* Fully tested and working with WP 4.5.1.

= 1.2.10 =
* Now displaying the design id in the cart, orders admin and Design Created email.
* Fixed an issue with passing product addons through the customizer into the cart.

= 1.2.9 =
* Added a field to allow the admin to optionally hide the page title on the Customize page.
* Added a Product field for optionally passing ux variables into the customizer.
* Added a Product field for optionally passing the print type into the customizer.
* Added a Product field for optionally passing a design id into the customizer.

= 1.2.8 =
* Now passing attributes through.
* WP 4.5 fully tested and working.

= 1.2.7 =
* Removed some forgotten debug messages.

= 1.2.6 =
* Fixed an issue with the frontend when the Customize page is deleted.
* Fixed an issue with activating the plugin from wp-cli.

= 1.2.5 =
* Fixed some issues with the examples in the readme.txt file.
* Updated the readme.txt to reflect that WP 4.4.2 is tested and working.

= 1.2.4 =
* Fixed a bug with the Fix Customize Page tool.
* Added example sites to the readme.txt file.

= 1.2.3 =
* Fixed a bug with the Fix Customize Page tool.

= 1.2.2 =
* Plugin is fully tested and working with WooCommerce 2.5.1
* Fixed an issue with the unit tests when running WooCommerce 2.5

= 1.2.1 =
* Changed the author from mystyle to mystyleplatform.
* Fixed bug with the thumbnail image in latest WP (caused by srcset attribute).
* Now validating the mystyle product options.
* Fixed some WP Coding Standards issues with some of the test files.
* Added more sophisticated notices system.
* Fixed some CSS issues with the admin screens in the latest WP and fixed a typo in a CSS name.
* Updated the readme.txt to reflect that WP 4.4.1 is fully tested and working.

= 1.2.0 =
* Add-ons directory added.
* Now sends design-saved email to user.

= 1.1.15 =
* Fixed bug with loading front-end on non-post pages.

= 1.1.14 =
* Now supports reloading designs through the Design Manager add-on.

= 1.1.13 =
* Modified the form/field text on the settings page.

= 1.1.12 =
* Added field allowing you to choose to always load the HTML5 customizer.

= 1.1.11 =
* Fixed bug with the passthru data when customizer accessed from product listing.

= 1.1.10 =
* Modified the css to set the width and height of the customizer-wrapper.

= 1.1.9 =
* Added frontend stylesheet.
* Added tool for fixing the Customize page.
* Fixed a bug with the cart thumbnail.

= 1.1.8 =
* Added support for product attributes/variations.
* Fixed bug with add to cart handler on WooCommerce < 2.3.

= 1.1.7 =
* Added support for multiple print files.
* Fixed bug with add to cart hook.

= 1.1.6 =
* Fixed bug causing customize button to show on non-customizable products.

= 1.1.5 =
* Added support for quantities.

= 1.1.4 =
* Added listing of customizable products to the Customize page.

= 1.1.3 =
* Fixed a bug with the help system.
* Updated the readme.

= 1.1.2 =
* Fixed cart item data issue with WooCommerce 2.2.
* Added link to product catalog.

= 1.1.1 =
* Fixed force_mobile bug.

= 1.1.0 =
* Added support for mobile.
* Admin UI enhancements.

= 1.0.1 =
* Basic PHPUnit test coverage complete.

= 1.0.0 =
* Added PHPUnit tests for the MyStyle_Handoff class.
* Added PHPUnit tests for the MyStyle_Design class.
* Added PHPUnit tests for the MyStyle_DesignManager class.
* Added PHPUnit tests for the MyStyle_EntityManager class.

= 0.5.3 =
* Added PHPUnit tests for the MyStyle_Install class.

= 0.5.2 =
* Updated the README.md file.

= 0.5.1 =
* Fixed truncated plugin description
* Fixed default download directory for easier install
* Fixed marketplace banner graphic for WP page title text

= 0.5.0 =
* Beta release
* Added Designs table

= 0.4.2 =
* Updated the readme.txt
* Updated the help

= 0.4.1 =
* Fixed the help link.
* Updated the registration url.

= 0.4.0 =

* Added customize button to product listing.
* Fixed bug with extra closing div on the front end product page.
* Added help link to options page.
* Now handling no param scenario for Customize page.

= 0.3.0 =

* Added basic customizer functionality.

= 0.2.1 =

* Added Secret field.

= 0.2.0 =

* Now tested with PHPUnit and QUnit and fully compatible with WP 4.2

= 0.1.0 =
* Initial Alpha release.
