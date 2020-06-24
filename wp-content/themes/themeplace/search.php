<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package themeplace
 */

get_header();

	if ( get_query_var('post_type') == "download" ) {

		get_template_part( "archive", get_query_var('post_type') );

	} else {

		get_template_part( "archive" );

	} 

get_footer();
