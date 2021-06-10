<?php
get_header();

	if ( get_query_var('post_type') == "download" ) {

		get_template_part( "archive", get_query_var('post_type') );

	} else if ( get_query_var('post_type') == "parceiros" ) {

		get_template_part( "archive", get_query_var('post_type') );

	} else {

		get_template_part( "archive" );

	} 

get_footer();
