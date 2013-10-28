<style>
.ui-widget-header{
<<<<<<< HEAD
	background: url("<?php echo base_url();?>f/img/ui-bg_gloss-wave_35_f6a828_500x100.png");
=======
	background: url("f/img/ui-bg_gloss-wave_35_f6a828_500x100.png");
>>>>>>> 9b38beca98ee6c1d4230643bb4fe1d6db26b32d0
}
</style>
	<form method="post" action="<?php echo base_url()?>pedidos/anotar">
		Ingresa la nota de tu pedido :<br>
		<input type="text" name="nota">
		<input type="hidden" id="id_pedido" name="idpedido" value="">
		<input type="hidden" name="id_mesa" value="<?php echo $idmesa;?>">
		<input type="submit" value="ACEPTAR">
		<!-- <a href="" class="ui-icon-closethick">Cerrar</a>
		<button type="button" class="close">CANCELAR</button> -->
        (máximo 15 caracteres)
	</form>