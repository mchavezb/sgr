<ul id="menu">
<?php if($this->session->userdata('idPerfil')=='01' || $this->session->userdata('idPerfil')=='03' ){
            if($this->session->userdata('caja_ok')==1){
                echo '  <li>
                            <a href="#">Mesas</a>
                                <ul>                
                                    <li><a href="'.base_url().'mesas">Ver Mesas</a></li>
                                                   
                                </ul>        
                        </li>';}}?>
<?php if($this->session->userdata('idPerfil')=='01' || $this->session->userdata('idPerfil')=='04' ){
            if($this->session->userdata('caja_ok')==1){
                echo '  <li>
                            <a href="#">Ventas</a>
                                <ul>                
                                    <li><a href="'.base_url().'pedidos">Cobrar Pedidos</a></li>
                                    <li><a href="'.base_url().'reservas">Reservas</a></li>                  
                                </ul>        
                        </li>';
            }
            echo '
            <li>
                <a href="#">Contabilidad</a>
                    <ul>                
                        <li><a href="'.base_url().'caja/apert">Apertura de Caja</a></li>
                        <li><a href="'.base_url().'caja/cerrar">Cierre de Caja</a></li>
                        <li><a href="'.base_url().'caja/operaciones">Operaciones</a></li>
                        <li><a href="'.base_url().'reportes">Reportes</a></li>  
                    </ul>        
            </li>';}?>
<?php if($this->session->userdata('idPerfil')=='01'){
    echo '  <li>
                <a href="#">Administración</a>
                    <ul>
                        <li><a href="'.base_url().'adm_mesas">Mesas</a></li>
                        <li><a href="'.base_url().'adm_platos">Platos</a></li>
                        <li><a href="'.base_url().'adm_usuarios">Usuarios</a></li> 
                        <li><a href="'.base_url().'adm_cajas">Cajas</a></li>              
                    </ul>        
            </li>';}?>
</ul>