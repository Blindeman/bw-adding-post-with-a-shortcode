# bw-adding-posts-through-a-shortcode
Contributor: naomiblindeman 
Tested up to: 5.3.2  
Stable tag: 0.1.0  
License: GNU General Public License 3.0  
License URI: https://www.gnu.org/licenses/gpl-3.0.html  

A WordPress plugin to add posts or custom post types to a page with the shortcode  
[insert_posts posttype=\"post\" howmany=\"5\" class=\"bw-post-list\" entryheader=\"h2\" date=\"no\" featuredimage=\"yes\" imagesize=\"post-thumbnail\" summary=\"summary\"].  

## Description
A WordPress plugin to add posts or custom post types to a page with the shortcode  
[insert_posts posttype="post" howmany="5" class="bw-post-list" entryheader="h2" date="no" featuredimage="yes" imagesize="post-thumbnail" summary="summary"].  
entryheader can take any valid HTML tag and date and featured image takes yes or no. imagesize, standard, is set to your theme's post-thumbnail, but you can use any other named image size. Summary takes the option summary or content.  
Compatible with https://github.com/afragen/github-updater

## Frequently Asked Questions

### What are all the options?

*posttype*: the name of the posttype you want to show. Takes a comma-seperated list. Default is post.  
*howmany*: the number of posts you wish to show, since there is no pagination option, a short list is probably better. Default is 5.  
*class*: the class you want to give to the container holding the posts. Takes a space-seperated list. Default is bw-post-list.  
*entryheader*: the html-tag you want to wrap the title of the posts in. Takes any valid html-tag. Default is h2.  
*date*: whether to show the date or not. Takes yes or no. Default is no.  
*featuredimage*: whether to show the featured image or not. Takes yes or no. Default is yes.  
*imagesize*: sets the size of the featured image. Takes only the name of an image-size set in your theme or another plugin. Default is post-thumbnail.  
*summary*: whether to use the_excerpt or the_content to show post content. Takes summary or content. Default is summary.  

## Changelog

### 0.1.0 / January 13, 2020
* New option to choose content or summary
* And choose image size for the featured image

### 0.0.6 / December 28, 2019
* Give option to choose whether to show a featured image

### 0.0.5 / December 20, 2019
* Fixed the disappearing plugin description

### 0.0.4 / December 20, 2019
* Added two more options: entryheader="h2" and date="no"

### 0.0.3 / September 10, 2019
* Big Fix: only show edit post link when a user is logged in and is allowed to edit pages

### 0.0.2 / September 5, 2019
* Added Text Domain and wrapped the two strings in __()
* Put featured image above the summary-div instead of inside it, since it is not part of the summary