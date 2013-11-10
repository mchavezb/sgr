<style>
.ui-widget-header{
	background: url("<?php echo base_url();?>f/img/ui-bg_gloss-wave_35_f6a828_500x100.png");
}
</style>
	<form method="post" action="<?php echo base_url()?>pedidos/exonerar">
		¿Estás seguro que deseas exonerar de pago este pedido?<br>
	
		<input type="hidden" name="id_mesa" value="<?php echo $idmesa;?>">

		<input type="hidden" id="exon_pedido" name="exon_pedido" value="">
		<input type="submit" value="ACEPTAR">
		<!-- <button type="button" 
        onclick="window.open('', '_self', ''); self.close();">Discard</button> -->
	</form>