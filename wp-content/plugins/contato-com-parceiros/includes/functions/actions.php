<?php
//adiocionar admin menu
add_action ('admin_menu', 'mainAdminPage');

function mainAdminPage()
{
	// página principal
	add_menu_page(
		'Contato com Parceiros', //string $page_title
		'Contato com Parceiros', //string $menu_title
		'manage_options', //string $capability
		'cpp-admin', //string $menu_slug
		'returnMainPage', //callable $function
		'dashicons-email-alt2', //string $icon_url
		150 //int $position
	);
	/*add_submenu_page(
		//string $parent_slug,
		//string $page_title,
		//string $menu_title,
		//string $capability,
		//string $menu_slug,
		//callable $function = '',
		//int $position = null
	)*/
	//Add a submenu page.
}
function returnMainPage(){
    include CCP_PATH."/includes/views/index.php"; 
}