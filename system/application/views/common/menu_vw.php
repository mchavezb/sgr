                <ul id="menu">
                    <li>
                        <a href="#">Mesas</a>
                        <ul>                
                            <li><a href="<?=$this->config->item('base_url')?>mesas">Ver Mesas</a></li>
                            <li id="junt-mesa"><a href="#">Juntar Mesas</a></li>                   
                        </ul>        
                    </li>
                    <li>
                        <a href="#">Ventas</a>
                        <ul>                
                            <li><a href="<?=$this->config->item('base_url')?>pedidos">Pedidos</a></li>
                            <li><a href="<?=$this->config->item('base_url')?>reservas">Reservas</a></li>                      
                        </ul>        
                    </li>
                    <li>
                        <a href="#">Contabilidad</a>
                        <ul>                
                            <li><a href="#Apertura">Apertura de Caja</a></li>
                            <li><a href="#Cierre">Cierre de Caja</a></li>
                            <li><a href="#Flujo">Flujo de Efectivo</a></li>                      
                        </ul>        
                    </li>
                    <li>
                        <a href="#">Administración</a>
                        <ul>
                            <li><a href="#AdmMesas">Mesas</a></li>
                            <li><a href="#AdmPlatos">Platos</a></li>
                            <li><a href="#AdmUsuarios">Usuarios</a></li>              
                        </ul>
                    </li>                
                </ul>
<!-- pop-up -->
<div id="dialog" title="Juntar mesas :">
    <?php $this->load->view('pop-up/juntar_mesas_vw');?>
</div>
<!-- fin del pop-up-->
<script>
    $(document).ready(function() {
        $("#dialog").dialog({
            autoOpen:false,
            hide: 'fade',
            modal: true
        });
        $("#junt-mesa").on("click",function(){
            $("#dialog").dialog("open");
        });
    }); 
</script>