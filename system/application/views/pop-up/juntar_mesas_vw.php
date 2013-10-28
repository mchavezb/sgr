<style>
.ui-widget-header{
	background: url("<?php echo base_url();?>f/img/ui-bg_gloss-wave_35_f6a828_500x100.png");
}
</style>
<?php $mesas_libres = json_decode(file_get_contents("C://xampp/htdocs/sgr/data/data_tables.json"));
	$libres = $mesas_libres->inf_mesas;?>
	<form method="post" action="<?php echo base_url()?>mesas/juntar">
		<table>
			<thead>
				<tr>
					<th width="100px">Mesa</th>
					<th width="100px">Capacidad</th>
				</tr>
			</thead>
			<tbody>
			<?php $i = 0; 
			foreach ($libres as $key => $value) {
					if($value->mesa_estado==0){?>
				<tr>
					<td>
						<input type="checkbox" name="mesa<?php echo $value->idMesa;?>" id="check<?php echo $value->idMesa ?>" value="<?php echo $value->idMesa;?>"> Mesa <?php echo $value->mesa_num?>
					</td>
					<td>
						<?php echo $value->capacidad;?> personas
					</td>	
				<?php $i++;}
					}?>
				<?php if($i==0){?>
				<tr>
					<td colspan="2">¡ No hay mesas disponibles !</td>
					<td></td>
				</tr>
				<?php }else{ ?>
				<tr>
					<td></td>
					<td><input type="submit" value="JUNTAR"></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</form>