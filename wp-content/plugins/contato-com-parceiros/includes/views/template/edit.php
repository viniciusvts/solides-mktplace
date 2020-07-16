<?php
$sheet = isset($_GET['sheet'])?$_GET['sheet']:1;
$ccpData = queryAllData($sheet);
$maxNumPages = getNumberOfPages();//é float,
?>
<table class="wp-list-table widefat fixed striped posts">
	<thead>
		<tr>
			<th scope="col" id="title" class="manage-column column-categories column-primary">
				Parceiro
			</th>
			<th scope="col" id="title" class="manage-column column-author column-primary">
				Nome
			</th>
			<th scope="col" id="email" class="manage-column column-categories column-shortcode">
				Email
			</th>
			<th scope="col" id="site" class="manage-column column-categories column-shortcode">
				Site
			</th>
			<th scope="col" id="telefone" class="manage-column column-author column-shortcode">
				Telefone
			</th>
			<th scope="col" id="mensagem" class="manage-column column-shortcode">
				Mensagem
			</th>
		</tr>
	</thead>
	<tbody id="the-list" data-wp-lists="list:post">
		<?php
		foreach($ccpData as $data){
			$ccpID = $data[CCP_Table_Id];
			$ccpName = $data[CCP_Table_Name];
			$ccpEmail = $data[CCP_Table_Email];
			$ccpSite = $data[CCP_Table_Site];
			$ccpTel = $data[CCP_Table_Tel];
			$ccpMessage = $data[CCP_Table_Message];
			$ccpParceiro = $data[CCP_Table_Parc];
		?>
		<tr class="linha"><!--procuro essa classe no javascript, não remova-->
			<form action="<?php echo($_SERVER['REQUEST_URI']); ?>" method="POST">
				<input type="hidden" name="action" value="edit" class="inputAction">
				<input type="hidden" value="<?php echo($ccpID); ?>" name="<?php echo CCP_Table_Id ?>">
				<td class="title column-title has-row-actions column-primary" data-colname="Title">
					<strong class="namedisplay">
						<?php echo $ccpParceiro ?>
					</strong>
					<div class="row-actions">
						<span class="trash trashLinks" msgOnClick="Quer Apagar?">
							<a href="">Apagar</a>
						</span>
					</div>
				</td>
				<td class="title column-title">
					<?php echo $ccpName ?>
				</td>
				<td class="title column-title">
					<?php echo $ccpEmail ?>
				</td>
				<td class="title column-title">
					<?php echo $ccpSite ?>
				</td>
				<td class="title column-title">
					<?php echo $ccpTel ?>
				</td>
				<td class="title column-title">
					<?php echo $ccpMessage ?>
				</td>
			</form>
		</tr>
		<?php
		}
		?>
	</tbody>
	<tfoot>
		<tr>
			<th scope="col" id="title" class="manage-column column-title column-primary">
				Parceiro
			</th>
			<th scope="col" id="title" class="manage-column column-title column-primary">
				Nome
			</th>
			<th scope="col" id="email" class="manage-column column-shortcode">
				Email
			</th>
			<th scope="col" id="site" class="manage-column column-shortcode">
				Site
			</th>
			<th scope="col" id="telefone" class="manage-column column-shortcode">
				Telefone
			</th>
			<th scope="col" id="mensagem" class="manage-column column-shortcode">
				Mensagem
			</th>
		</tr>
	</tfoot>
</table>
<div class="paginate">
	<div class="col">
		<?php
			//links da paginação
			$prev = cts_get_prev_page_link($maxNumPages);
			$next = cts_get_next_page_link($maxNumPages);
			$page = $_GET['sheet'];
			if($prev){
				echo "<a class='np-link' href='".$prev."'>";
				echo "Anterior";
				echo "</a>";
			}
		?>
	</div>
	<div class="col"><?php if(isset($page)){echo"Pag: ".$page;}else{echo"Pag: 1";} ?></div>
	<div class="col">
		<?php
			if($next){
				echo "<a class='np-link' href='".$next."'>";
				echo "Próxima";
				echo "</a>";
			}
		?>
	</div>
</div>