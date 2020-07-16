<div class="ctsoptions">
	<table class="wp-list-table widefat fixed striped posts">
		<thead>
			<tr>
				<th scope="col" id="title" class="manage-column column-title column-primary">
					Opções
				</th>
		</thead>
	</table>
	<form action="<?php echo($_SERVER['REQUEST_URI']); ?>" method="post" class="option">
		<label for="<?php echo CCP_ItensPorPagOption ?>">Itens por página</label>
		<select id="ppp" name="<?php echo CCP_ItensPorPagOption ?>">
			<?php
			$itensPorPaginaOption = get_option( CCP_ItensPorPagOption );
			$ItensPorPagina = array(10,25,50,100);
			foreach($ItensPorPagina as $idioma){
			?>
			<option value="<?php echo $idioma ?>" <?php if($idioma==$itensPorPaginaOption){echo('selected');} ?>>
				<?php echo $idioma ?>
			</option>
			<?php
			}
			?>
		</select>
	</form>
</div>