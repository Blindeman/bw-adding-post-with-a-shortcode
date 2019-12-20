<?php
/**
 * Plugin Name: BW Adding Posts Through a Shortcode
 * Plugin URI: https://blindemanwebsites.com/today-i-learned/
 * Github plugin URI: https://github.com/Blindeman/bw-adding-posts-through-shortcode
 * Description: A WordPress plugin to add posts or custom post types to a page with the shortcode
 `[insert_posts posttype="post" howmany="5" class="bw-post-list" entryheader="h2" date="no"]`.  
 entryheader can take any valid HTML tag and date takes yes or no.  
 Compatible with https://github.com/afragen/github-updater
 * Version: 0.0.4
 * Author: Naomi Blindeman
 * Author URI: https://blindemanwebsites.com/
 * License: GNU General Public License 3.0
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: bw-adding-posts-through-shortcode
 */

defined( 'ABSPATH' ) or die;

// Add Shortcode
function insert_posts_shortcode( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'posttype' => 'post',
			'howmany' => 5,
			'class' => 'bw-post-list',
            'entryheader' => 'h2',
            'date' => 'no'
		),
		$atts,
		'insert_posts'
    );

    if( strpos( $atts['posttype'], ',') !== FALSE ){
        //if there is more than one post_type
        $aPosttype = explode( ',', $atts['posttype'] );
        //pushing it through sanitize_title() for the sake of cheap sanitation
        //with a fallback of post
        foreach( $aPosttype as $key => $value ){
            $aPosttype[$key] = sanitize_title( $value, 'post' );
        }
    } else {
        //if there is only one post_type
        //pushing it through sanitize_title() for the sake of cheap sanitation
        //with a fallback of post
        $aPosttype = array( sanitize_title( $atts['posttype'], 'post') );
    }
    
    // WP_Query arguments
    $args = array(
        'post_type'              => $aPosttype,
        'posts_per_page'         => intval( $atts['howmany'] ),
    );

    // The Query
    $bw_query = new WP_Query( $args );

    // The Loop
    if ( $bw_query->have_posts() ) {
        $bw_post_list = "<div class='" . sanitize_html_class( $atts['class'], 'bw-post-list' ) . "'>";
        while ( $bw_query->have_posts() ) {
            $bw_query->the_post();
            //get the classes for posts to give more control
            $sPostClasses = implode( ' ', get_post_class() );
            //put together the html for the posts
            $bw_post_list .= "<article class='" . $sPostClasses . "'>" . 
                "<header>" . 
                    "<" . sanitize_html_class( $atts['entryheader'], 'h2' ) . " class=\"entry-title\">" . 
                        "<a href=\"" . get_the_permalink() . "\" title=\"" . get_the_title() . "\" rel=\"bookmark\">" . 
                            get_the_title() . 
                        "</a>" . 
                    "</" . sanitize_html_class( $atts['entryheader'], 'h2' ) . ">" . 
                    ( $atts['date'] === "yes" ? "<div class=\"entry-meta\"><span class=\"entry-date\">" . get_the_time( get_option( 'date_format' ) ) . "</span></div>" : "" ) .
                    ( current_user_can( 'edit_pages' ) ? "<a href=\"" . get_edit_post_link() . "\" class=\"post-edit-link\">" . __( 'Edit', 'bw-adding-posts-through-shortcode' ) . "</a>" : "" ) . 
                "</header>" . 
                "<a href=\"" . get_the_permalink() . "\" title=\"" . get_the_title() . "\" class=\"thumbnail-link\">" . 
                    get_the_post_thumbnail() . 
                "</a>" . 
                "<div class=\"entry-summary\">" . 
                    get_the_excerpt() . 
                "</div>" . 
            "</article>";
        }
        $bw_post_list .= "</div>";
    } else {
        //put together the html for no posts found
        $bw_post_list = "<div class='" . sanitize_html_class( $atts['class'], 'bw-post-list' ) . "'><article class='nopost'>" . __( 'There are no posts to display.', 'bw-adding-posts-through-shortcode') . "</article></div>";
    }

    // Restore original Post Data
    wp_reset_postdata();

	return $bw_post_list;

}
add_shortcode( 'insert_posts', 'insert_posts_shortcode' );