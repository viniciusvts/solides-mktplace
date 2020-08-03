<?php
$_POST[CCP_Table_Message] = stripslashes($_POST[CCP_Table_Message]);
include CTS_View_Path."/inc/paginate.php";
$action = $_POST['action'];
if(isset($action)){
	if($action == 'trash'){
		$bdReturn = deleteDataById($_POST[CCP_Table_Id]);
		if(!$bdReturn){
			echo "<div class='error'><strong>";
			echo get_lang("EE");
			echo "</strong></div>";
		}
	}
}else if( isset($_POST[CCP_ItensPorPagOption]) ){
	update_option(CCP_ItensPorPagOption, $_POST[CCP_ItensPorPagOption]);
}
//constroi a tela
include CTS_View_Path."/template/header.php";
include CTS_View_Path."/template/edit.php";
include CTS_View_Path."/template/footer.php";