<?php


if (! defined('ABSPATH')) {
	exit;
}

class Custom_Permalink_Editor_Admin
{

	public function __construct()
	{

		add_action('admin_menu', array($this, 'admin_menu'));
		add_action('admin_enqueue_scripts', array($this, 'load_plugins_page_style'));
	}

	public function admin_menu()
	{
		add_menu_page(
			'Custom Permalink Editor',
			'Custom Permalink Editor',
			'cp_editor_view_post_permalinks',
			'cp-editor',
			array($this, 'post_permalinks_page'),
			'dashicons-admin-links'
		);
		$post_permalinks_hook     = add_submenu_page(
			'cp-editor',
			'Post Types Permalinks',
			'Post Types Permalinks',
			'cp_editor_view_post_permalinks',
			'cp-editor',
			array($this, 'post_permalinks_page')
		);
	}

	public function wp_pm_load_style()
	{
		wp_enqueue_style(
			'custom-permalink-editor-about-style',
			plugins_url(
				'/assets/css/cp-editor.min.css',
				CP_EDITOR_FILE
			),
			array(),
			CP_EDITOR_VERSION
		);
	}

	public function load_plugins_page_style($hook)
	{
		// Only load on plugins.php page
		if ('plugins.php' !== $hook) {
			return;
		}

		wp_enqueue_style(
			'custom-permalink-editor-plugins-style',
			plugins_url(
				'/assets/css/cp-editor.min.css',
				CP_EDITOR_FILE
			),
			array(),
			CP_EDITOR_VERSION
		);
	}

	public function wp_pm_admin_content()
	{
		$active_tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : 'info';

		$content = '<div class="wrap">
			<h1 class="wp-heading-inline">
				' . __('Custom Permalink Editor', 'custom-permalink-editor') . ' ' . CP_EDITOR_VERSION . '
			</h1>
			
			<nav class="nav-tab-wrapper">
				<a href="' . esc_url(admin_url('admin.php?page=cp-editor&tab=info')) . '" class="nav-tab ' . ($active_tab === 'info' ? 'nav-tab-active' : '') . '">' . __('Info', 'custom-permalink-editor') . '</a>
				<a href="' . esc_url(admin_url('admin.php?page=cp-editor&tab=user-guide')) . '" class="nav-tab ' . ($active_tab === 'user-guide' ? 'nav-tab-active' : '') . '">' . __('User Guide', 'custom-permalink-editor') . '</a>
				<a href="' . esc_url(admin_url('admin.php?page=cp-editor&tab=support')) . '" class="nav-tab ' . ($active_tab === 'support' ? 'nav-tab-active' : '') . '">' . __('Support', 'custom-permalink-editor') . '</a>
			</nav>
			
			<div class="tab-content" style="margin-top: 20px;">';

		if ($active_tab === 'info') {
			$content .= '
				<div class="kcg_admin_parent_container">
					<div class="kcg_admin_container">
						<h4>
						' . __('You can create/edit URL for posts and pages only by adding /, - or both at the same time.', 'custom-permalink-editor') . '
						</h4>
						<h4>
						' . __('If you want to edit the URL for other post types, you can use the Custom Permalink Editor Pro plugin.', 'custom-permalink-editor') . '
						<a href="https://kingscrestglobal.com/contact/" target="_blank" class="button button-primary button-small">' . __('Get Pro', 'custom-permalink-editor') . '</a>
						</h4>
						<img src="' . plugin_dir_url(dirname(__FILE__)) . 'assets/images/permalink-manager.png' . '" class="plugin_image" alt="Custom Permalink Editor">
					</div>
				</div>';
		} elseif ($active_tab === 'user-guide') {
			$content .= '
				<div class="kcg_admin_parent_container">
					<div class="kcg_admin_container">
						<h2>
						' . __('Uses Guide', 'custom-permalink-editor') . '
						</h2>
						<h4>
							' . __('You can change post permalink by the following steps:', 'custom-permalink-editor') . '
						</h4>
						<ul>
							<li>- ' . __('Edit your posts/pages and create SEO friendly custom URL.', 'custom-permalink-editor') . '</li>
							<li>- ' . __('In the permalink box insert your desired permalink and update the post.', 'custom-permalink-editor') . '</li>
							<li>- ' . __('Preview your post and see the post URL is changed.', 'custom-permalink-editor') . '</li>
							<li>- ' . __('If you want to revert to the Wordpress default URL system, just deactivate the plugin.', 'custom-permalink-editor') . '</li>
						</ul>
					</div>
				</div>';
		} elseif ($active_tab === 'support') {
			$content .= '
				<div class="kcg_admin_parent_container">
					<div class="kcg_admin_container">
						<h2>' . __('Need help or want to get the pro version?', 'custom-permalink-editor') . '</h2>
						<p>' . __('If you have any questions, issues, or need assistance with the plugin, feel free to reach out to us.', 'custom-permalink-editor') . '</p>
						<p style="margin-top: 20px;">
							<a href="https://kingscrestglobal.com/contact/" target="_blank" class="button button-primary button-hero">' . __('Contact Us', 'custom-permalink-editor') . '</a>
						</p>
					</div>
				</div>';
		}

		$content .= '
			</div>
		</div>';

		$allowed_html = $this->custom_permalink_allowed_tags();
		echo wp_kses($content, $allowed_html);
	}

	public function custom_permalink_allowed_tags()
	{
		$allowed_tags = array(
			'a' => array(
				'class' => array(),
				'href'  => array(),
				'rel'   => array(),
				'title' => array(),
				'target' => array(),
			),
			'nav' => array(
				'class' => array(),
			),
			'button' => array(
				'class' => array(),
				'type' => array(),
			),
			'div' => array(
				'class' => array(),
				'id' => array(),
				'title' => array(),
				'style' => array(),
			),
			'span' => array(
				'id' => true,
				'class' => true,
				'type' => true,
				'value' => true,
				'style' => true,
			),
			'li' => array(),
			'em' => array(),
			'h1' => array(),
			'h2' => array(),
			'h3' => array(),
			'h4' => array(),
			'h5' => array(),
			'h6' => array(),
			'i' => array(),
			'img' => array(
				'alt'    => array(),
				'class'  => array(),
				'height' => array(),
				'src'    => array(),
				'width'  => array(),
			),
			'li' => array(
				'class' => array(),
			),
			'ol' => array(
				'class' => array(),
			),
			'p' => array(
				'class' => array(),
				'style' => array(),
			),
			'q' => array(
				'cite' => array(),
				'title' => array(),
			),
			'span' => array(
				'class' => array(),
				'title' => array(),
				'style' => array(),
			),
			'strike' => array(),
			'strong' => array(),
			'ul' => array(
				'class' => array(),
			),
		);

		return $allowed_tags;
	}

	public function post_permalinks_page()
	{
		$this->wp_pm_load_style();
		$this->wp_pm_admin_content();

		add_filter('admin_footer_text', array($this, 'admin_footer_text'), 5);
	}

	public function admin_footer_text()
	{
		$wp_pm_footer_text = __('Custom Permalink Editor version', 'custom-permalink-editor') .
			' ' . CP_EDITOR_VERSION . ' ' .
			__('by', 'custom-permalink-editor') .
			' <a href="https://kingscrestglobal.com/" target="_blank">' .
			__('Team KCG', 'custom-permalink-editor') .
			'</a>' .
			' - ' .
			'Visit Us:' .
			' <a href="https://kingscrestglobal.com/" target="_blank">' .
			__('Kings Crest Global', 'custom-permalink-editor') .
			'</a>';

		return $wp_pm_footer_text;
	}
}

new Custom_Permalink_Editor_Admin();
