<?php
$allItensGroupedById = getCountCadaParceiro();
?>
<table class="wp-list-table widefat fixed striped posts">
	<thead>
		<tr>
			<th scope="col" id="title" class="manage-column column-categories column-primary">
				Parceiro
			</th>
			<th scope="col" id="title" class="manage-column column-author column-primary">
				Quantidade
			</th>
		</tr>
	</thead>
	<tbody id="the-list" data-wp-lists="list:post">
		<?php
		foreach($allItensGroupedById as $data){
            /** informações do parceiro */
            $parceiroInf = get_post($data[CCP_Table_ParceiroId]);
            $urlToEdit = $_SERVER["REQUEST_URI"]."&".CCP_Table_ParceiroId."=".$parceiroInf->ID
		?>
		<tr class="linha">
            <td class="title column-title has-row-actions column-primary" data-colname="Title">
                <strong>
                    <a class="row-title" 
                    href="<?php echo $urlToEdit ?>">  
                        <?php echo $parceiroInf->post_title ?>
                    </a>
                </strong>
            </td>
            <td class="title column-title">
                <?php echo $data['qtd'] ?>
            </td>
		</tr>
		<?php
		}
		?>
	</tbody>
	<tfoot>
		<tr>
			<th scope="col" id="title" class="manage-column column-categories column-primary">
				Parceiro
			</th>
			<th scope="col" id="title" class="manage-column column-author column-primary">
				Quantidade
			</th>
		</tr>
	</tfoot>
</table>