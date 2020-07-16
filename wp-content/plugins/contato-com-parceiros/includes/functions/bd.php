<?php
if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * salvar uma entrada
 * @param String name
 * @param String $email
 * @param String $site
 * @param String $tel
 * @param String $message
 * @return int|false|null quantidade de rows afetados
 * 		ou false se não houve inserção
 * @author Vinicius de Santana
 */
function insertNewData($name, $email, $site, $tel, $message, $parceiro){
	global $wpdb;
	$array = array(
		CCP_Table_Name => $name,
		CCP_Table_Email => $email,
		CCP_Table_Site => $site,
		CCP_Table_Tel => $tel,
		CCP_Table_Message => $message,
		CCP_Table_Parc => $parceiro,
	);
	$return = $wpdb->insert( CCP_Table, $array , CCP_Table_Format);
	return $return;
}

/**
 * deleta uma entrada pelo nome
 * @param String $name
 * @return int|false quantidade de rows afetados ou false
 * @author Vinicius de Santana
 */
function deleteDataByName($name){
	global $wpdb;
	$array = array(CCP_Table_Name => $name);
	$return = $wpdb->delete( CCP_Table, $array );
	return $return;
}

/**
 * deleta uma entrada pelo id
 * @param String $id
 * @return int|false quantidade de rows afetados ou false
 * @author Vinicius de Santana
 */
function deleteDataById($id){
	global $wpdb;
	$array = array(CCP_Table_Id => $id);
	$return = $wpdb->delete( CCP_Table, $array );
	return $return;
}

/**
 * resgata entradas
 * @param int $page
 * @return ARRAY_A um array com os dados
 * @author Vinicius de Santana
 */
function queryAllData($page = 1){
	$page--; //sim, página 1 é igual a pagina 0 pro banco
	if(!is_int($page) || $page<0) return null; //previne sql injection i pagina negativa
	$numMaxPages = getNumberOfPages();
	if($page > $numMaxPages) return null;//quer página que não existe
	
	global $wpdb;
	$qtdRownsPorPagina = get_option(CCP_ItensPorPagOption);
	$rowRelativoAPagina = $qtdRownsPorPagina * $page;
	$sql ="SELECT * FROM ".CCP_Table.
			" ORDER BY ".CCP_Table_Id." DESC".
			" LIMIT ".$rowRelativoAPagina.",".$qtdRownsPorPagina;
	$return = $wpdb->get_results( $sql, "ARRAY_A" );
	return $return;
}

/**
 * Retorna quantidade de páginas possiveis
 * @return int qutd de páginas possiveis
 * @author Vinicius de Santana
 */
function getNumberOfPages(){
	global $wpdb;
	$sql ="SELECT COUNT(*) FROM ".CCP_Table;
	$resp = $wpdb->get_results( $sql, "ARRAY_A" );
	$numRows = $resp[0]['COUNT(*)'];
	$qtdRownsPorPagina = get_option(CCP_ItensPorPagOption);
	$return = $numRows / $qtdRownsPorPagina;
	return $return;
}

/**
 * resgata entrada baseado no id
 * @param int $id
 * @return ARRAY_A o array do shorcode
 * @author Vinicius de Santana
 */
function queryDataById($id = 0){
	if(!is_int($id)) return null; //previne sql injection
	global $wpdb;
	$sql ="SELECT * FROM ".CCP_Table_Name.
			" WHERE ".CCP_Table_Id."=".$id;
	$return = $wpdb->get_row( $sql, "ARRAY_A" );
	return $return;
}

/**
 * resgata entrada baseado no nome
 * @param String $name
 * @return ARRAY_A o array do shorcode
 * @author Vinicius de Santana
 */
function queryDataByName($name){
	if(strpos($name, ';')) return null; //previne sql injection
	global $wpdb;
	$sql ="SELECT * FROM ".CCP_Table_Name.
			" WHERE ".CCP_Table_Name."='".$name."'";
	$return = $wpdb->get_row( $sql, "ARRAY_A" );
	return $return;
}