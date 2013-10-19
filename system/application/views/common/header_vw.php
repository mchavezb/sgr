<div class="container-top">
	<div class="bloque-titulo">Sistema de Gestión de Restaurantes</div>
	<div class="divider-vertical"></div>
	<?php if($this->session->userdata('esta_logueado')){
			echo '<div class="bloque-titulo">'.$this->session->userdata('nombres').' '.$this->session->userdata('apellidos').' ';if($this->session->userdata('idPerfil')=='01'){
	echo '(Administrador)';
}elseif($this->session->userdata('idPerfil')=='02'){
	echo '(Cocinero)';
}elseif($this->session->userdata('idPerfil')=='03'){
	echo '(Mozo)';
}elseif($this->session->userdata('idPerfil')=='04'){
	echo '(Cajero)';
} echo '</div><div class="divider-vertical"></div>';}?>
	<?php if($this->session->userdata('esta_logueado')){
			echo '<div class="bloque-titulo"><a href="'.base_url().'main/logout">Log out</a></div><div class="divider-vertical"></div>';}?>
</div>





	

