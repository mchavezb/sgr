<ul id="menu">
<?php if($this->session->userdata('idPerfil')=='01' || $this->session->userdata('idPerfil')=='03' ){
    echo '  <li>
                <a href="#">Mesas</a>
                    <ul>                
                        <li><a href="'.base_url().'mesas">Ver Mesas</a></li>
                        <li id="junt-mesa"><a href="#">Juntar Mesas</a></li>                   
                    </ul>        
            </li>';}?>
<?php if($this->session->userdata('idPerfil')=='01' || $this->session->userdata('idPerfil')=='04' ){
    echo '  <li>
                <a href="#">Ventas</a>
                    <ul>                
<<<<<<< HEAD
                        <li><a href="'.base_url().'pedidos">Cobrar Pedidos</a></li>
=======
                        <li><a href="'.base_url().'pedidos">Pedidos</a></li>
>>>>>>> 9b38beca98ee6c1d4230643bb4fe1d6db26b32d0
                        <li><a href="'.base_url().'reservas">Reservas</a></li>                  
                    </ul>        
            </li>
            <li>
                <a href="#">Contabilidad</a>
                    <ul>                
<<<<<<< HEAD
                        <li><a href="'.base_url().'caja/aperturar">Apertura de Caja</a></li>
                        <li><a href="'.base_url().'caja/cerrar">Cierre de Caja</a></li>
                        <li><a href="#">Flujo de Caja</a></li>                      
=======
                        <li><a href="#">Apertura de Caja</a></li>
                        <li><a href="#">Cierre de Caja</a></li>
                        <li><a href="#">Flujo de Efectivo</a></li>                      
>>>>>>> 9b38beca98ee6c1d4230643bb4fe1d6db26b32d0
                    </ul>        
            </li>';}?>
<?php if($this->session->userdata('idPerfil')=='01' || $this->session->userdata('idPerfil')=='04' ){
    echo '  <li>
                <a href="#">Administración</a>
                    <ul>
<<<<<<< HEAD
                        <li><a href="'.base_url().'adm_mesas">Mesas</a></li>
                        <li><a href="'.base_url().'adm_platos">Platos</a></li>
                        <li><a href="'.base_url().'adm_usuarios">Usuarios</a></li>              
=======
                        <li><a href="#AdmMesas">Mesas</a></li>
                        <li><a href="#AdmPlatos">Platos</a></li>
                        <li><a href="#AdmUsuarios">Usuarios</a></li>              
>>>>>>> 9b38beca98ee6c1d4230643bb4fe1d6db26b32d0
                    </ul>        
            </li>';}?>
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