=== bw-adding-posts-through-a-shortcode ===
Contributors: Naomi Blindeman
Tags: posts, post list, list of posts
Tested up to: 5.3.2
Stable tag: 0.0.4
License: GNU General Public License 3.0
License URI: https://www.gnu.org/licenses/gpl-3.0.html

== Description ==
A WordPress plugin to add posts or custom post types to a page with the shortcode [insert_posts posttype="post" howmany="5" class="bw-post-list" entryheader="h2" date="no"].
entryheader can take any valid HTML tag and date takes yes or no.
Compatible with https://github.com/afragen/github-updater

== Changelog ==

= 0.0.4 / December 20, 2019 =
* Added two more options: entryheader="h2" and date="no"

= 0.0.3 / September 10, 2019 =
* Big Fix: only show edit post link when a user is logged in and is allowed to edit pages

= 0.0.2 / September 5, 2019 =
* Added Text Domain and wrapped the two strings in __()
* Put featured image above the summary-div instead of inside it, since it is not part of the summary