<?php
/**
 * Neat Website Pack
 *
 * @package       NEATWEBSITE
 * @author        Delower Hossain
 * @license       gplv2-or-later
 * @version       1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:   Neat Website Pack
 * Plugin URI:    https://neatwebsites.com.au
 * Description:   This is a starter plugin pack for all Neat Website's Client. These basic plugins are recommened for every website. If you have any Question feel free to message us.
 * Version:       1.0.0
 * Author:        Delower Hossain
 * Author URI:    https://www.dbuggers.com
 * Text Domain:   neat-website-pack
 * Domain Path:   /languages
 * License:       GPLv2 or later
 * License URI:   https://www.gnu.org/licenses/gpl-2.0.html
 *
 * You should have received a copy of the GNU General Public License
 * along with Neat Website Pack. If not, see <https://www.gnu.org/licenses/gpl-2.0.html/>.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

// Include your custom code here.

require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'neatwebsitepack_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function neatwebsitepack_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Akismet',
			'slug'      => 'akismet',
			'required'  => false,
		),
		
		array(
			'name'      => 'Jetpack',
			'slug'      => 'jetpack',
			'required'  => false,
		),
		
		array(
			'name'      => 'Rank Math',
			'slug'      => 'seo-by-rank-math',
			'required'  => false,
		),
				
		array(
			'name'      => 'Sucuri Security',
			'slug'      => 'sucuri-scanner',
			'required'  => false,
		),
				
		array(
			'name'      => 'Updraft Plus - #1 Backup Plugin',
			'slug'      => 'updraftplus',
			'required'  => false,
		),
		
				
		array(
			'name'      => 'Wp Auto Terms',
			'slug'      => 'auto-terms-of-service-and-privacy-policy',
			'required'  => false,
		),
				
		array(
			'name'      => 'SiteGround Optimizer',
			'slug'      => 'sg-cachepress',
			'required'  => false,
		),
				
		array(
			'name'      => 'Manage Notification E-mails',
			'slug'      => 'manage-notification-emails',
			'required'  => false,
		),
				
		array(
			'name'      => 'Blackhole for Bad Bots',
			'slug'      => 'blackhole-bad-bots',
			'required'  => false,
		),


		
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'neatwebsitepack',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'plugins.php',            // Parent menu slug.
		'capability'   => 'manage_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		
		/*
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'neatwebsitepack' ),
			'menu_title'                      => __( 'Install Plugins', 'neatwebsitepack' ),
			/* translators: %s: plugin name. * /
			'installing'                      => __( 'Installing Plugin: %s', 'neatwebsitepack' ),
			/* translators: %s: plugin name. * /
			'updating'                        => __( 'Updating Plugin: %s', 'neatwebsitepack' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'neatwebsitepack' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'neatwebsitepack'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'neatwebsitepack'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'neatwebsitepack'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). * /
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'neatwebsitepack'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'neatwebsitepack'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'neatwebsitepack'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'neatwebsitepack'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'neatwebsitepack'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'neatwebsitepack'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'neatwebsitepack' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'neatwebsitepack' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'neatwebsitepack' ),
			/* translators: 1: plugin name. * /
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'neatwebsitepack' ),
			/* translators: 1: plugin name. * /
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'neatwebsitepack' ),
			/* translators: 1: dashboard link. * /
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'neatwebsitepack' ),
			'dismiss'                         => __( 'Dismiss this notice', 'neatwebsitepack' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'neatwebsitepack' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'neatwebsitepack' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
		*/
	);

	tgmpa( $plugins, $config );
	
	}
