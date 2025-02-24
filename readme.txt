=== Quick Permalink Flusher ===
Contributors: habibnote
Tags: permalink, flusher, quick
Requires at least: 5.2
Tested up to: 6.7
Stable tag: 1.0.0
Requires PHP: 7.2
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Short Description: Quickly flush permalinks in WordPress with a single click.

== Description ==

Quick Permalink Flusher is a lightweight WordPress plugin that allows you to flush your permalink structure quickly with a single click. This is particularly useful when you've made changes to your permalink settings or added custom post types, and you need to refresh your rewrite rules without navigating through multiple menus.

Features:
- Flush permalinks with just one click.
- Improves site performance after updating permalink structure.
- Simple and user-friendly interface.

== Installation ==

1. Upload the `quick-permalink-flusher` plugin folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Go to the "Settings" menu and find the "Flush Permalink" option.
4. Click the "Flush Permalink" button to refresh your permalink structure instantly.

== Frequently Asked Questions ==

= Why do I need to flush permalinks? =
Flushing permalinks can resolve issues such as broken links or missing content when you change your permalink structure or add new post types.

= How does this plugin work? =
This plugin provides a button that triggers the `flush_rewrite_rules()` function in WordPress, clearing and refreshing the permalink settings.

= Will this work for custom post types? =
Yes, this plugin works for custom post types and any changes made to permalink settings.

== Changelog ==

= 1.0.0 =
* Initial release.
* Added a button to flush permalink structure.

== Upgrade Notice ==

= 1.0.0 =
This is the initial release of the plugin.

== Acknowledgements ==

Thanks to the WordPress community for creating such an amazing platform!
