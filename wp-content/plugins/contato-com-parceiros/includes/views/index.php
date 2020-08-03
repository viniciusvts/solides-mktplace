<?php
define('CTS_View_Path', dirname( __FILE__ ) );
$idDoParceiro = $_GET[CCP_Table_ParceiroId];
if(isset($idDoParceiro)){
	include CTS_View_Path."/template/show-parceiro-messages.php";
}else{
	include CTS_View_Path."/template/show-parceiro-count.php";
}