<?php

/**
 * Plugin Name: Custom Permalink Editor
 * Plugin URI: https://kingscrestglobal.com/
 * Description: Easily customize permalinks for individual posts and pages without affecting your existing URL rewrite rules.
 * Version: 1.0.6
 * Requires PHP: 7.4
 * Author: Team KCG
 * Author URI: https://kingscrestglobal.com/contact/
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 *
 * Text Domain: custom-permalink-editor
 * Domain Path: /languages/  
 *
 */



if (! defined('ABSPATH')) {
	exit;
}

if (! defined('CP_EDITOR_FILE')) {
	define('CP_EDITOR_FILE', __FILE__);
}

if (! defined('CP_EDITOR_VERSION')) {
	define('CP_EDITOR_VERSION', '1.0.6');
}

// Show notice if Pro version activation was blocked
add_action('admin_notices', function () {
	if (get_transient('cpe_pro_activation_blocked')) {
		delete_transient('cpe_pro_activation_blocked');
		echo '<div class="notice notice-error is-dismissible"><p><strong>' . esc_html__(
			'Custom Permalink Editor Pro could not be activated.',
			'custom-permalink-editor'
		) . '</strong> ' . esc_html__(
			'Please deactivate the free version of Custom Permalink Editor first, then activate the Pro version.',
			'custom-permalink-editor'
		) . '</p></div>';
	}
});

// Add Go Pro link to plugin action links
add_filter('plugin_action_links_' . plugin_basename(__FILE__), function ($links) {
	$pro_link = '<a href="https://kingscrestglobal.com/contact/" target="_blank" style="color: #d63638; font-weight: bold">' . esc_html__('Go Pro', 'custom-permalink-editor') . '</a>';
	$links[] = $pro_link;
	return $links;
});

// Update message for free version
add_action('in_plugin_update_message-custom-permalink-editor/custom-permalink-editor.php', function ($plugin_data) {
	cp_version_update_warning(CP_EDITOR_VERSION, $plugin_data['new_version']);
});

function cp_version_update_warning($current_version, $new_version)
{
	$current_version_minor_part = explode('.', $current_version)[1];
	$new_version_minor_part = explode('.', $new_version)[1];

	if ($current_version_minor_part === $new_version_minor_part) {
		return;
	}

?>
	<hr class="cp-major-update-warning__separator" />
	<div class="cp-major-update-warning">
		<div class="cp-major-update-warning__icon">
			<span class="dashicons dashicons-info-outline"></span>
		</div>
		<div>
			<div class="cp-major-update-warning__title">
				<?php echo esc_html__('Heads up, Please backup before upgrade!', 'custom-permalink-editor'); ?>
			</div>
			<div class="cp-major-update-warning__message">
				<?php
				printf(
					/* translators: %1$s Link open tag, %2$s: Link close tag. */
					esc_html__('In the new version of Custom Permalink Editor, URL modifications are available only for Posts and Pages. Custom post type permalinks from previous versions will work but you will not able to add new custom post type permalinks. To edit custom post type permalinks, please upgrade to the %1$sPro version%2$s.', 'custom-permalink-editor'),
					'<a href="https://kingscrestglobal.com/contact/" target="_blank" style="color: #d63638; font-weight: bold">',
					'</a>'
				);
				?>
			</div>
		</div>
	</div>
<?php
}

// Include the main Custom Permalink Editor class.
require_once plugin_dir_path(CP_EDITOR_FILE) . 'includes/class-custom-permalink-editor.php';
