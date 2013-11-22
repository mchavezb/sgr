<?php 
	//session_start();
	/*if($_SESSION["cocinero"]!=true)
	{
		header("../index.php");
	}*/	
	require_once("logic/cocinaLogic.php");
	$objCocina = new cocinaLogic();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>M&oacute;dulo de cocina SGR</title>
<link rel="stylesheet" href="css/style.css">
<link href="css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">

<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery.ui.touch-punch.min.js"></script>
<script src="js/jquery-ui-1.10.3.custom.js"></script>

</head>
<script>

	var platilloObj = null;
	var cocineroPlatillo = "";
	var idCocineroSelected = "";
	var cocineroSelected = "";
	var platilloSelected = ""; 
	var idPlatilloSelected = "";
	var idComandaxPedidoSelected = "";
	var idComandaSelected = "";
	var PlatilloEnPreparacion = "";
	var platilloEnPreparacionObj = null;
	var nota="";
	var cantidad=0;
	
	$( document ).ready(function() {
		$(window).scroll(function(){
			if(window.pageYOffset >= 100)
			{				
				$('#cocineros').attr("style","position: fixed; padding-left: 80px;");
			}
			else 
			{
				$('#cocineros').attr("style","padding-left: 80px;");			
			}
		});
	});


	function actualizarCocineros()
	{
		$.ajax({
		  type: "POST",
		  url: "logic/cocinaLogic.php",
		  data: 
		  { 
			method : "traerCocineros"				
		  },
		  success: function(msg){				
			$("#cocineros").html(msg);

			$(".cocinero").each(function(){
				 var cocinero = this.id.split('_');		 
				 $(this).draggable({ 
					cursor: 'move',
					helper: 'clone',
					revert: 'true',
					contaiment: 'document',				
					opacity: 0.7,				
					start: function(){
						idCocineroSelected = cocinero[0];
						cocineroSelected = cocinero[1];						
					}					
				});
			});

		  }
		});
	}

	function traerPlatos()
	{
		$.ajax({
		  type: "POST",
		  url: "logic/cocinaLogic.php",
		  data: 
		  { 
			method : "traerPlatos"				
		  },
		  success: function(msg){				
			$("#platosContenedor").html(msg);				
			setDropable();				
		  }
		});
	}

	function actualizarEnPreparacion()
	{
		$.ajax({
		  type: "POST",
		  url: "logic/cocinaLogic.php",
		  data: 
		  { 
			method : "actualizarEnPreparacion"				
		  },
		  success: function(msg){				
			$("#EnProceso").html(msg);
			//alert("entra por aca");

			$("#EnProceso").sortable({
			cursor: 'move',
			connectWith: "#Terminado"
			}).disableSelection();

			$("#Terminado").sortable({			
				receive: function(event, ui){
					$.ajax({
						type: "POST",
						url: "logic/cocinaLogic.php",
						data: { 
							method: "ActualizarEstadoPreparacion", 
							IdComandaxPedido: ui.item[0].firstChild.parentElement.id,
							estado: 3
						},						
						success: function(msg){
							$("#Terminado").append(msg);
							ui.item[0].remove();
						}
					});
				}
			});
		  }
		});
	}

	function actualizarTerminados()
	{
		$.ajax({
		  type: "POST",
		  url: "logic/cocinaLogic.php",
		  data: 
		  { 
			method : "actualizarTerminados"				
		  },
		  success: function(msg){				
			$("#Terminado").html(msg);		
		  }
		});
	}	
	
	function setDropable()
	{
		$(".plato").each(function(i){
			var platillo = this.id.split('_');

			$(this).find(".notas-title").click(function(event)
			{
				var ID = $(this).context.parentElement.id;
				var IDarray = ID.split('_');
				$("."+IDarray[1]).dialog("open");				
				event.preventDefault();
			});

			$( "#dialog" ).dialog({
				autoOpen: false,
				width: 400,
				buttons: [
					{
						text: "Ok",
						click: function() {
							$( this ).dialog( "close" );
						}
					}
				]
			});

			$( "#dialog-link, #icons li" ).hover(
				function() {
					$( this ).addClass( "ui-state-hover" );
				},
				function() {
					$( this ).removeClass( "ui-state-hover" );
				}
			);
			
			$(this).droppable({ 
				tolerance: 'fit',
				hoverClass: 'border',	
				over:function(event,ui) {
					$(this).css( "height", "+=32" );
				},
				out:function(event,ui) {
					$(this).css( "height", "-=32" );
				},
				drop: function( event, ui ) {
					//adiciona el cocinero al plato
					$(this).append("<div id='"+idCocineroSelected+"' class='cocineroPreparacion'>"+cocineroSelected+"</div>");							
					platilloObj = $(this);
					cocineroPlatillo = $(this).html();
					platilloSelected = platillo[0];
					idComandaxPedidoSelected = platillo[1];	
					nota = platillo[2];
					cantidad = platillo[3];				
					
					$.ajax({
						type: "POST",
						url: "logic/cocinaLogic.php",
						data: 
						{
							method: "ActualizarEstadoPreparacion", 
							IdComandaxPedido: idComandaxPedidoSelected,
							ParameteridCocineroSelected: idCocineroSelected,
							ParametercocineroSelected: cocineroSelected,
							estado: 2
						},
						success: function(msg){
							//EnProceso(cocineroPlatillo,platilloObj,PlatilloEnPreparacion,tipoEntregaSelected,CantPlatosPorTipoEntrega,mesaSelected);
							//platilloObj[0].remove();	
							//$(this).remove();
							EnProceso(cocineroPlatillo,platilloObj,idComandaxPedidoSelected,nota,cantidad);	
							//alert(msg);
						}
					});
				}
			})
		});			
	}

	function EnProceso(cocineroPlatillo,platilloObj,idComandaxPedidoSelected,nota,cantidad)
	{
		if(nota!="")
		{
			$("#EnProceso").append("<li><div class='preparando' id='"+idComandaxPedidoSelected+"'>"+cocineroPlatillo+"</br><b class='aviso1'>¡NOTA!</b></br> <p class='aviso2'>"+nota+"</p><button type='button' onClick=\"CancelarPreparacion('"+idComandaxPedidoSelected+"')\">¡Cancelar!</button></div></li>");
		}
		if(nota=="")
		{
			$("#EnProceso").append("<li><div class='preparando' id='"+idComandaxPedidoSelected+"'>"+cocineroPlatillo+"<button type='button' onClick=\"CancelarPreparacion('"+idComandaxPedidoSelected+"')\">¡Cancelar!</button></div></li>");	
		}
			
		platilloObj[0].remove();	

		$("#EnProceso").find("#dialog-link").remove();			

		$("#EnProceso").sortable({
			cursor: 'move',
			connectWith: "#Terminado"
		}).disableSelection();

		$("#Terminado").sortable({			
			over: function()
			{
				$("#Terminado").css("background-color: #007526");
			},
			receive: function(event, ui){
				
				$.ajax({
					type: "POST",
					url: "logic/cocinaLogic.php",
					data: { method: "ActualizarEstadoPreparacion", 
						IdComandaxPedido: ui.item[0].firstChild.id,
						cantidad: cantidad,
						estado: 3},						
					success: function(msg){
						//alert(msg);
						//var mensaje = msg.split('___');
						//$("#Terminado").append(mensaje[0]);
						$("#Terminado").append(msg);
						ui.item[0].remove();
						/*if(mensaje[1]!=null)
						{
							alert("Se han terminado los pedido de la mesa : " + mensaje[1]);	
						}*/
						
					}
				});
			}
		});
	}	

	function CancelarPreparacion(cancelarIDs)
	{
		var r = confirm("Deseas cancelar el pedido ?");
		if (r == true)
		{
			$.ajax({
			  type: "POST",
			  url: "logic/cocinaLogic.php",
			  data: 
			  { 
				method : "CancelarPreparacion",
				id: cancelarIDs				
			  },
			  success: function(msg){				
			  	traerPlatos();
				actualizarEnPreparacion();
			  }
			});
		}
	}

	function Logout()
	{
		/*alert(window.location);
		window.location = "localhost/sgr/index.php";
		alert(window.location.href);*/

		//deleteAllCookies();
		//createCookie( name , "" , -1 ); 
		//alert(document.cookie);
		window.location = "http://localhost/sgr/main/logout";

		/*$.ajax({
			type: "POST",
			url: "logic/cocinaLogic.php",
			data: 
			{ 
				method : "Logout"			
			},
			success: function(){	
				//alert("redireccion a la pagina de login de marco" . window.location.href);
				//window.location.replace("/sgr/index.php");
				//window.location.href = "";
				deleteAllCookies();
				window.location.href = "localhost/sgr/index.php";

				//top.location = "index.php"
				
			}
		});*/
		//event.preventDefault();
	}

	/*function deleteAllCookies() {
		var cookies = document.cookie.split(";");

		for (var i = 0; i < cookies.length; i++) {
			var cookie = cookies[i];
			var eqPos = cookie.indexOf("=");
			var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
			//document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:00 GMT';
			document.cookie ='';
			alert(document.cookie);
		}
	}*/
	function createCookie( name, value, days ) {
    if ( days ) {
        var date = new Date(); 
        date.setTime( date.getTime() + ( days*24*60*60*1000 ) ); 
        var expires = "; expires=" + date.toGMTString();
    } else {
        var expires = "";      
    }
    document.cookie = name+"="+value+expires+"; path=/";
}

			
	// 300 000 = 5 minutos
	// 120 000 = 2 minutos
	actualizarCocineros()
	traerPlatos();
	actualizarEnPreparacion();
	actualizarTerminados();		
	setInterval(function(){actualizarCocineros()},30000);
	setInterval(function(){traerPlatos()},31000);
	setInterval(function(){actualizarTerminados()},32000);
	

	
		
</script>

<body>
	<div><button onClick="Logout()">CERRAR MODULO DE COCINA</button></div>	
	<div class="centraTabla">
		<table class="tablaPrincipal">
			<thead>
				<tr>
					<th align="center" style="font-size: 2em;">COCINEROS</th>
					<th align="center" style="font-size: 2em;">PLATILLOS EN COLA</th>
					<th align="center" style="font-size: 2em;">EN PROCESO</th>
					<th align="center" style="font-size: 2em;">TERMINADO</th>
				</tr>
			</thead>
		<tr>
			<td class="td" style="width:16%; vertical-align:top;" >
				<div id="cocineros" style="padding-left: 80px;"></div>
			</td>
			<td class="td" style="vertical-align:top;">
				<table class="platosContenedor" id="platosContenedor"></table>     
			</td>
			<td style="vertical-align:top;"><table class="preparandoContenedor"><tr><td style="vertical-align:top;"><ul id="EnProceso" class="droptrue"></ul></td></tr></table></td>
			<td style="vertical-align:top;"><table class="terminadoContenedor"><tr><td style="vertical-align:top;"><ul id="Terminado" class="droptrue terminado"></ul></td></tr></table></td>
		</tr>
		</table>  
	</div>
</body>

</html>