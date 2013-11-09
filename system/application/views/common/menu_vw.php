<ul id="menu">
<?php if($this->session->userdata('idPerfil')=='01' || $this->session->userdata('idPerfil')=='03' ){
    echo '  <li>
                <a href="#">Mesas</a>
                    <ul>                
                        <li><a href="'.base_url().'mesas">Ver Mesas</a></li>
                                       
                    </ul>        
            </li>';}?>
<?php if($this->session->userdata('idPerfil')=='01' || $this->session->userdata('idPerfil')=='04' ){
    echo '  <li>
                <a href="#">Ventas</a>
                    <ul>                
                        <li><a href="'.base_url().'pedidos">Cobrar Pedidos</a></li>
                        <li><a href="'.base_url().'reservas">Reservas</a></li>                  
                    </ul>        
            </li>
            <li>
                <a href="#">Contabilidad</a>
                    <ul>                
                        <li><a href="'.base_url().'caja/aperturar">Apertura de Caja</a></li>
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
                    </ul>        
            </li>';}?>
</ul>