<style>
.ui-widget-header{
	background: url("<?php echo base_url();?>f/img/ui-bg_gloss-wave_35_f6a828_500x100.png");
}
</style>
	<form method="post" action="<?php echo base_url()?>pedidos/eliminar">
		¿Estás seguro que deseas eliminar este pedido?<br>
	
		<input type="hidden" name="id_mesa" value="<?php echo $idmesa;?>">

		<input type="hidden" id="elim_pedido" name="elim_pedido" value="">
		<input type="submit" value="ACEPTAR">
		<!-- <button type="button" 
        onclick="window.open('', '_self', ''); self.close();">Discard</button> -->
	</form>

