<?php $m_libres = json_decode(file_get_contents("C://xampp/htdocs/sgr/data/data_tables.json"));
	$lib = $m_libres->inf_mesas;?>
	<form method="post" action="<?php echo base_url()?>mesas/agregar">
		<table>
			<thead>
				<tr>
					<th width="100px">Mesa</th>
					<th width="100px">Capacidad</th>
				</tr>
			</thead>
			<tbody>
			<?php $i = 0; 
			foreach ($lib as $k => $val) {
					if($val->mesa_estado==0){?>
				<tr>
					<td>
						<input type="checkbox" name="mesa<?php echo $val->idMesa;?>" id="check<?php echo $val->idMesa ?>" value="<?php echo $val->idMesa;?>"> Mesa <?php echo $val->mesa_num?>
						<input type="hidden" id="comanda" name="comanda" value='<?php echo $idComanda ?>'>
						<input type="hidden" id="id_mesa_i" name="id_mesa_i" value='<?php echo $idmesa ?>'>
					</td>
					<td>
						<?php echo $val->capacidad;?> personas
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
					<td><input type="submit" value="AGREGAR"></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</form>