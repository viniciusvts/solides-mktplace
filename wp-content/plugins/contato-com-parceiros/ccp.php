<?php
/**
 * Plugin Name: Contato com parceiros
 * Plugin URI: https://www.dnadevendas.com.br/
 * Description: Salvar e gerenciar dados a serem enviados para os parceiros
 * Version: 1.0
 * Author: Vinicius de Santana
 * Author URI: http://www.vtsantana.com.br
 */
if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define('CCP_PATH', dirname( __FILE__ ) );
define('CTS_URL', plugins_url( '', __FILE__ ) );
define('CCP_ItensPorPagOption', 'ccppageitens');
define('CCP_Table', 'ccp_table');
define('CCP_Table_Id', 'id');
define('CCP_Table_Name', 'name');
define('CCP_Table_Email', 'email');
define('CCP_Table_Site', 'site');
define('CCP_Table_Tel', 'tel');
define('CCP_Table_Message', 'mensagem');
define('CCP_Table_Parc', 'parceiro');
define('CCP_Table_Format', array('%s','%s'));

include_once CCP_PATH.'/includes/functions/bd.php';
include_once CCP_PATH.'/includes/functions/actions.php';
include_once CCP_PATH.'/includes/functions/endpoints.php';//;)

register_activation_hook(__FILE__, 'install');
register_uninstall_hook(__FILE__, 'uninstall');
//==================================================================
//funções
/**
 * função de instalação do plugin
 */
function install(){
	global $wpdb;
	add_option(CCP_ItensPorPagOption, 30);
	$wpdb->query("CREATE TABLE IF NOT EXISTS ".CCP_Table." ("
			.CCP_Table_Id." int NOT NULL AUTO_INCREMENT, "
			.CCP_Table_Name." VARCHAR(100) NOT NULL, "
			.CCP_Table_Email." VARCHAR(100) NOT NULL, "
			.CCP_Table_Site." VARCHAR(100) NOT NULL, "
			.CCP_Table_Tel." VARCHAR(100) NOT NULL, "
			.CCP_Table_Message." TEXT NOT NULL, "
			.CCP_Table_Parc." VARCHAR(200) NOT NULL, "
			."PRIMARY KEY (".CCP_Table_Id."))"
	);
}

/**
 * função de desinstalação do plugin
 */
function uninstall(){
	global $wpdb;
	delete_option(CCP_ItensPorPagOption);
	$wpdb->query('DROP TABLE IF EXISTS '.CCP_Table);
}