=== Custom Permalink Editor ===
Contributors: Team KCG
Tags: custom permalinks,custom url,permalink,permalinks,url,url editor,address,custom,link,custom post type,custom post url,woocommerce permalink,slug
Tested up to: 6.9
Stable tag: 1.0.6
Requires PHP: 7.4
Requires at least: 5.4
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Set Custom Permalink Editor on a per-post, per-tag per-page, and per-category basis.

== Description == 

Custom Permalink Editor is a powerful yet simple plugin that allows you to create SEO-friendly custom URLs for your WordPress posts and pages. Perfect for content creators, marketers, and site owners who want complete control over their permalink structure.

**Key Features:**

✓ **Easy Permalink Customization** - Change URLs for individual posts and pages with just a few clicks
✓ **SEO-Friendly URLs** - Create clean, readable URLs that improve your search engine rankings
✓ **No Global Changes** - Customize permalinks per post/page without affecting your site's default permalink structure
✓ **Safe & Reversible** - Deactivating the plugin reverts all posts back to their default WordPress permalinks
✓ **Categories & Tags Support** - Edit permalinks for categories and tags as well
✓ **Custom Post Type Support** - Existing custom permalinks for custom post types continue to work (Pro version required for editing)

**How It Works:**

1. Install and activate the plugin
2. Edit any post or page
3. Find the Custom Permalink Editor box
4. Enter your desired custom URL
5. Save and publish - your new permalink is live!

**Perfect For:**

- Blog posts with specific keyword requirements
- Landing pages with marketing-friendly URLs
- Portfolio items with branded permalinks
- Product pages with clean, memorable URLs
- Migrating content from other platforms while maintaining URL structure


== Support == 

Need help or have questions? We're here to assist you!

- **Support Requests**: Use our <a href="https://kingscrestglobal.com/contact/">contact form</a> for technical support
- **Custom Modifications**: Contact us for any custom development needs
- **Feedback**: We value your feedback and suggestions for improvements
- **Pro Version**: Interested in premium features? <a href="https://kingscrestglobal.com/contact/">Get in touch</a> 

== Privacy Policy ==

> This plugin does not collect any user Information
> If you need any custom modification or any other thing contact with https://kingscrestglobal.com/ and mention Custom Permalink Editor


== Screenshots ==
1. screenshot-1.png

== Advanced Filters ==

For developers who need more control, Custom Permalink Editor provides several filters to customize its behavior.

= Add PATH_INFO in $_SERVER Variable =

Enable PATH_INFO support in the $_SERVER variable. This is useful for certain server configurations.

**Usage:**
`
add_filter( 'cp_editor_path_info', '__return_true' );
`

= Exclude Specific Permalinks =

Prevent specific permalinks from being processed by the plugin. Useful for excluding system files like sitemaps or special pages.

**Example:** Exclude sitemap.xml from processing
`
function team_kcg_exclude_permalink( $permalink ) {
  // Check if permalink contains 'sitemap.xml'
  if ( false !== strpos( $permalink, 'sitemap.xml' ) ) {
    return '__true';
  }
  
  return;
}
add_filter( 'cp_editor_exclude_permalink', 'team_kcg_exclude_permalink' );
`

= Exclude Specific Post Types =

Remove the Custom Permalink Editor form from specific post types. Helpful if you want to disable the feature for certain content types.

**Example:** Exclude a custom post type called 'custompost'
`
function team_kcg_exclude_post_type( $post_type ) {
  // Replace 'custompost' with your actual post type name
  if ( 'custompost' === $post_type ) {
    return '__true';
  }
  
  return '__false';
}
add_filter( 'cp_editor_exclude_post_type', 'team_kcg_exclude_post_type' );
`

= Exclude Specific Posts =

Exclude individual posts or pages from showing the Custom Permalink Editor form. You can filter by ID, template, or any post property.

**Example:** Exclude post with ID 1557
`
function team_kcg_exclude_posts( $post ) {
  // Exclude specific post by ID
  if ( 1557 === $post->ID ) {
    return true;
  }
  
  // You can also exclude by other criteria
  // Example: Exclude posts with a specific template
  // if ( get_page_template_slug( $post->ID ) === 'template-landing.php' ) {
  //   return true;
  // }
  
  return false;
}
add_filter( 'cp_editor_exclude_posts', 'team_kcg_exclude_posts' );
`

= Allow Accented Characters =

By default, the plugin removes accents from permalinks for better URL compatibility. Enable this filter if you need to preserve accented characters.

**Usage:**
`
function team_kcg_allow_accents() {
  return true;
}
add_filter( 'cp_editor_allow_accents', 'team_kcg_allow_accents' );
`

= Allow Capital Letters =

By default, permalinks are converted to lowercase. Use this filter to preserve capital letters in your custom URLs.

**Usage:**
`
function team_kcg_allow_capitals() {
  return true;
}
add_filter( 'cp_editor_allow_caps', 'team_kcg_allow_capitals' );
`

**Note:** Add these code snippets to your theme's `functions.php` file or use a custom plugin/code snippets plugin.


== Installation ==

**Automatic Installation (Recommended):**

1. Log in to your WordPress admin dashboard
2. Navigate to Plugins > Add New
3. Search for "Custom Permalink Editor"
4. Click "Install Now" next to Custom Permalink Editor
5. Once installed, click "Activate"
6. You're ready to start creating custom permalinks!

**Manual Installation via WordPress:**

1. Download the plugin ZIP file
2. Go to Plugins > Add New in your WordPress admin
3. Click "Upload Plugin" at the top
4. Choose the downloaded ZIP file
5. Click "Install Now"
6. Activate the plugin

**Manual Installation via FTP:**

1. Download and extract the plugin ZIP file
2. Upload the `custom-permalink-editor` folder to `/wp-content/plugins/` directory
3. Log in to your WordPress admin dashboard
4. Navigate to Plugins and activate Custom Permalink Editor

== How To Use ==

**Changing a Post or Page Permalink:**

1. Navigate to Posts > All Posts (or Pages > All Pages)
2. Click on the post/page you want to edit
3. Scroll down to find the "Custom Permalink Editor" meta box
4. Enter your desired custom URL in the text field (without the domain)
5. Click "Update" or "Publish" to save your changes
6. Visit your post to see the new permalink in action!

**Example:**
- Default URL: `yoursite.com/2026/01/11/my-blog-post/`
- Custom URL: `yoursite.com/seo-friendly-custom-url/`

**Reverting to Default Permalinks:**

Simply deactivate the plugin and all posts will automatically revert to WordPress default permalink structure.

== Frequently Asked Questions ==

= Does this plugin work with custom post types? =

Yes! If you have existing custom permalinks for custom post types, they will continue to work. However, creating new custom permalinks or editing existing ones for custom post types requires the Pro version.

= Will this affect my site's overall permalink structure? =

No. Custom Permalink Editor only changes the URLs of individual posts/pages you specifically edit. Your site's default permalink structure remains unchanged.

= What happens if I deactivate the plugin? =

All custom permalinks will be disabled and your posts/pages will revert to their default WordPress URLs. Your content is safe - only the URLs change.

= Can I edit category and tag permalinks? =

Yes! The plugin supports custom permalinks for both categories and tags. Simply edit them from the WordPress admin panel.

= Will custom permalinks affect my SEO? =

Custom permalinks can improve your SEO by allowing you to create more relevant, keyword-rich URLs. However, changing existing URLs may require setting up 301 redirects to maintain SEO value.

= Does this work with WPML or Polylang? =

Yes, the plugin is compatible with multilingual plugins like WPML and Polylang.

= Can I use special characters in custom permalinks? =

The plugin automatically sanitizes permalinks to ensure they're URL-safe. Special characters and accents are handled appropriately. You can use filters to allow accents if needed (see Filters section).

= What's the difference between Free and Pro versions? =

The Free version allows custom permalinks for posts, pages, categories, and tags. It also preserves existing custom permalinks for custom post types. The Pro version adds full editing capabilities for custom post types and additional premium features.

= I have custom post types. Can I still edit their permalinks? =

If your custom post types already have custom permalinks, they will continue working. To create new custom permalinks or edit existing ones for custom post types, you'll need to upgrade to the Pro version.

= Is this plugin compatible with WooCommerce? =

The plugin is designed for standard posts and pages. For WooCommerce products (which are custom post types), existing custom permalinks will work, but editing requires the Pro version.

= Will this slow down my website? =

No. Custom Permalink Editor is lightweight and optimized for performance. It won't affect your site's loading speed.

= Can I bulk edit permalinks? =

Currently, permalinks need to be edited individually. This ensures you have full control over each URL.

== Changelog ==
= 1.0.6

* Feature: Custom post types with existing custom permalinks will continue to work
* Feature: Existing custom URLs for custom post types are now preserved and functional
* Update: New custom permalinks for custom post types cannot be created (Pro feature)
* Update: Custom post type edit screen shows existing custom URL in read-only mode with Pro upgrade message
* Update: Posts/pages without existing custom URLs show Pro upgrade message for custom post types

= 1.0.5

* Permalink edit enabled for post and page only
* XSS Vulnerability Fixes
* PHP 8 code updates and fixes

= 1.0.4

* Tested with wordpress latest version.
* Fix: Some basic issue.

= 1.0.2 =

* Initial launch of the plugin


== Upgrade Notice ==

= 1.0.6 =
Important update: Custom post types with existing custom permalinks will continue to work. New custom post type permalinks require Pro version.


