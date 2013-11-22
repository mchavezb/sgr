<?php
//session_start();
require_once("conex.php");

class cocinaLogic
{
    public function traerCocineros()
    {
    	$return = "";
		try
		{	
			$sql = "select idUsuario,nombres from usuario where Perfil_idPerfil = 2 and activo <> 0";
			$mysqli = ConexionBD::ConexBD();
			$rs = $mysqli->query($sql);
			while( $row = mysqli_fetch_array ($rs,MYSQLI_ASSOC)) 
			{				
				//$return .= "<tr>";
				//$return .= "<td>";			
				$return .= "<div id='".$row["idUsuario"]."_".$row["nombres"]."' class='cocinero'>".$row["nombres"]."</div><br>";
				//$return .= "</td>";
				//$return .= "</tr>";
			}
			echo $return;
		} 
		catch(Exception $e)
		{
			throw $e;
		}
    }

    public function traerPlatos()
	{
       $return="";
       $thisNota="";
       $notaEval="";
       try 
       {
			$sql = "(select 
					p.p_nombre AS 'nombre', 
					p.idProducto AS 'idPlato', 
					GROUP_CONCAT(DISTINCT (m.mesa_num)) AS  'numMesa', 
					p.p_tiempoestimado AS 'TiempoEstimado', 
					GROUP_CONCAT(co.fecha) as 'fecha', 
					GROUP_CONCAT(cp.idPedido) AS 'idComandaxPedido',
					COUNT(cp.idPedido) AS 'cantidad', 
					GROUP_CONCAT(cp.Comanda_idComanda) AS 'Comanda_idComanda', 
					GROUP_CONCAT(cp.nota) as 'nota' 
					FROM comanda co, ComandaxPedido cp, Producto p, Mesa m 
					WHERE co.idComanda = cp.Comanda_idComanda 
					AND cp.Producto_idProducto = p.idProducto 
					AND co.Mesa_idMesa = m.idMesa 
					AND cp.estado = 1 
					AND cp.nota = '' 
					AND p.p_tiempoestimado is not null 				
					GROUP BY p.idProducto ) 
					union all 
					(select 					
					p.p_nombre AS 'nombre', 
					p.idProducto AS 'idPlato', 
					m.mesa_num AS  'numMesa',
					p.p_tiempoestimado AS 'TiempoEstimado',
					co.fecha as 'fecha', 
					cp.idPedido AS 'idComandaxPedido',
					(select 1 as cantidad) as 'cantidad',				
					cp.Comanda_idComanda AS 'Comanda_idComanda', 
					cp.nota as 'nota' 
					FROM comanda co, ComandaxPedido cp, Producto p, Mesa m 
					WHERE co.idComanda = cp.Comanda_idComanda 
					AND cp.Producto_idProducto = p.idProducto 
					AND co.Mesa_idMesa = m.idMesa 
					AND cp.estado = 1 
					AND cp.nota <> ''	
					AND p.p_tiempoestimado is not null 		
					)
					ORDER BY fecha ASC";
		
			$mysqli = ConexionBD::ConexBD();
			$rs = $mysqli->query($sql);			
			$row_cnt = mysqli_num_rows($rs);
			
			if($row_cnt > 0)
			{
				
				while( $row = mysqli_fetch_array ($rs,MYSQLI_ASSOC)) 
				{
					$notaEval = $this->quitarComas($row["nota"]);
					if(!(empty($notaEval)) && $notaEval!=",")
					{
						$thisNota = $row["nota"];
					}	
					$return .= "<tr>";
					$return .= "<td>";
					$return .= "<div id='".$row["nombre"]."_".$row["idComandaxPedido"]."_".$thisNota."_".$row["cantidad"]."' class='plato'>";						
					$return .= $row["nombre"]." - Mesa: <b>".$row["numMesa"]."</b><br /> Cantidad - <b>".$row["cantidad"]."</b><br />Tiempo Estimado: <b>".$row["TiempoEstimado"]." min</b></br></br>";
					if(!(empty($notaEval)) && $notaEval!=",")
					{
						$return .= "<a href='#' id='dialog-link' class='notas-title ui-state-default ui-corner-all'><span class='ui-icon ui-icon-newwin'></span>¡NOTAS!</a>";
						$return .= "<div id='dialog' class='".$row["idComandaxPedido"]."' title='NOTA MESA Nro : ".$row["numMesa"]."'><p>".$row["nota"]."</p></div>";
					}					
					$return .= "</td>";
					$return .= "</tr>";
					$thisNota = "";
				}
			}
			else
			{
				$return .= "<div>";
				$return .= "no hay elementos que mostrar";
				$return .= "</div>";
			}
			mysqli_free_result($rs);				
			echo $return;
       } 
       catch(Exception $e) 
       {
             throw $e;
       }
    }
	
	public function ActualizarEstadoPreparacion($IdComandaxPedido,$estado,$IDCocineroSelected,$cocineroSelected,$cantidad)
    {
		$sql="";
		$sqlTipo00="";
		$msg00 = "";
		$sqlTipo01="";
		$msg01 = "";
		$msg = "";
		$array00 = null;
		$sqlTipo01Completar = "";
		$IdComandaxPedido_array_tmp = explode(",", $IdComandaxPedido);

		try 
		{	
			for($i = 0; $i < count($IdComandaxPedido_array_tmp); $i++)
			{
				$sql .= "UPDATE comandaxpedido SET estado =  ".$estado." 
						WHERE idPedido = ".$IdComandaxPedido_array_tmp[$i]."; ";
			}
			
			$mysqli = ConexionBD::ConexBD();
			switch ($estado) {
				case '2':
					$mysqli->multi_query($sql);
					$this->GrabarComandaxCocinero($IDCocineroSelected,$cocineroSelected,$IdComandaxPedido_array_tmp);
					echo ( count($IdComandaxPedido_array_tmp) . " Platos se encuentran en preparacion !");
					break;
				
				case '3':
					
					//para tipo entrega 00
					$msg00 = $this->CrearNuevoHTML00($IdComandaxPedido,$cantidad);
					if($msg00!="")
					{
						$array00 = $this->traerPlatosEntregaTipo00($IdComandaxPedido);
						for($i = 0; $i < count($array00); $i++)
						{
							$sqlTipo00 .= "UPDATE comandaxpedido SET estado =  ".$estado." WHERE idPedido = ".$array00[$i]."; ";
						}
						$mysqli->multi_query($sqlTipo00);
						//mysqli_free_result();
					}

					//para tipo entrega 01
					$total = $this->traerCantPlatos();
					$msg01 = $this->CrearNuevoHTML01($IdComandaxPedido,$cantidad);
					$Arraymsg = explode("___", $msg01);
					$Arraymsg[1] = isset($Arraymsg[1]) ? $Arraymsg[1] : null;
					// lo hago por este error http://dev.mysql.com/doc/refman/5.0/en/commands-out-of-sync.html
					$mysqli2 = ConexionBD::ConexBD();
					if(!is_null($Arraymsg[1]) && $Arraymsg[1] != "")
					{	
						$result = $Arraymsg[1];
						$arrayResult = explode(",", $result);
						$cod = "";
						$cod2 = "";
						for($i=1; $i<count($arrayResult); $i+=2)
						{
						    $cod .= $arrayResult[$i].",";
						}
						$cod2 = $this->quitarComas($cod);
						$sqlTipo01 = "UPDATE comandaxpedido SET estado = '10' WHERE idPedido in (".$cod2.")";
						
						if(!$mysqli2->query($sqlTipo01))
						{
							echo($mysqli->error);
						}
					}
					$rs = $mysqli2->query("select count(cp.idPedido) as 'cantidad',m.mesa_num as 'mesa_num', GROUP_CONCAT(DISTINCT (cp.idpedido)) as 'idpedido' from comandaxpedido cp, comanda co, mesa m 
							where cp.comanda_idcomanda=co.idcomanda and co.mesa_idmesa = m.idmesa and  cp.estado = 10 and cp.Tipoatencion_idtipoatencion = 01
							group by m.mesa_num");
					if(!empty($rs))
					{
						while( $row = mysqli_fetch_array ($rs,MYSQLI_ASSOC)) 
						{
							if($total[$row["mesa_num"]] - $row["cantidad"] == 0)
							{
								$arrayPedido = $this->traerPlatosEntregaTipo01($row["idpedido"]);
								for($i = 0; $i < count($arrayPedido); $i++)
								{
									$sqlTipo01Completar .= "UPDATE comandaxpedido SET estado = 3 WHERE idPedido = ".$arrayPedido[$i]."; ";
								}
								$mysqli2->multi_query($sqlTipo01Completar);
							}
						}
						mysqli_free_result($rs);
					}
					if($msg00!="")
					{
						$msg .= $msg00;
					}
					if($msg01!="___")
					{
						$msg .= $Arraymsg[0];
					}
					//echo($msg);
			}
		}
		catch(Exception $e) 
		{
			throw $e;
		}
	}

	public function CrearNuevoHTML00($IdComandaxPedido,$cantidad)
	{
		$return="";

		$sql = "SELECT COUNT( cp.idPedido ) AS  'cant_plato', m.mesa_num AS  'numero_mesa', cp.idPedido AS  'idPedido', p.p_nombre AS  'nombre_plato', cc.Nombre as 'NombreCocinero', cp.nota as 'nota'
				FROM comandaxpedido cp, producto p, mesa m, comanda co, comandaxcocinero cc
				WHERE cp.Producto_idProducto = p.idProducto
				AND co.Mesa_idMesa = m.idMesa
				AND cp.Comanda_idComanda = co.idComanda
				AND cp.idPedido = cc.idPedido
				AND cp.tipoatencion_idtipoatencion = 00
				AND cp.idpedido
				IN (".$IdComandaxPedido.") 
				GROUP BY tipoatencion_idtipoatencion";

		$mysqli = ConexionBD::ConexBD();
		$rs = $mysqli->query($sql);
		$row_cnt00 = mysqli_num_rows($rs);
	
		if($row_cnt00>0)
		{
			while( $row = mysqli_fetch_array ($rs,MYSQLI_ASSOC)) 
			{
				$notaEval = $this->quitarComas($row["nota"]);
				if(!(empty($notaEval)) && $notaEval!=",")
				{
					$thisNota = $row["nota"];
				}
				$return .= "<li>";
				$return .= "<div class='terminadoDIV' id='".$row["idPedido"]."'>";					
				$return .= $row["nombre_plato"]."<br />";				
				$return .= "Mesa : <b>".$row["numero_mesa"]."</b><br />";									
				//$return .= "Cantidad : <b>".$row["cant_plato"]."</b><br />";
				$return .= "Cantidad : <b>".$cantidad."</b><br />";
				$return .= "<div class='cocineroPreparacion'>".$row["NombreCocinero"]."</div>";
				if(!(empty($notaEval)) && $notaEval!=",")
				{					
					$return .= "<br><b class='aviso1'>¡NOTA!</b><br>";
					$return .= "<p class='aviso2'>".$row["nota"]."</p>";					
				}					
				$return .= "</div>";
				$return .= "</li>";	
			}
		}
		
		mysqli_free_result($rs);
		return $return;
	}
	
	public function CrearNuevoHTML01($IdComandaxPedido,$cantidad)
	{
		$res = "";
		$return ="";

		$sql = "SELECT m.mesa_num as 'numero_mesa', cp.idpedido as 'idPedido', p.p_nombre as 'nombre_plato' , cc.Nombre as 'NombreCocinero', cp.nota as 'nota'
				FROM comandaxpedido cp, producto p, mesa m, comanda co , comandaxcocinero cc
				WHERE cp.Producto_idProducto = p.idProducto 
				AND co.Mesa_idMesa = m.idMesa 
				AND cp.Comanda_idComanda = co.idComanda 
				AND cp.idPedido = cc.idPedido
				AND cp.tipoatencion_idtipoatencion = 01 
				AND cp.idpedido IN (".$IdComandaxPedido.")";
		   		
		$mysqli = ConexionBD::ConexBD();
		$rs = $mysqli->query($sql);
		$row_cnt01 = mysqli_num_rows($rs);

		//$resClean="";			
	
		if($row_cnt01>0)
		{
			while( $row = mysqli_fetch_array ($rs,MYSQLI_ASSOC)) 
			{
				$res .= $row["numero_mesa"].",".$row["idPedido"].",";
				$notaEval = $this->quitarComas($row["nota"]);
				$return .= "<li>";
				$return .= "<div class='terminadoDIV' id='".$row["idPedido"]."'>";					
				$return .= $row["nombre_plato"]."<br />";				
				$return .= "Mesa : ".$row["numero_mesa"]."<br />";
				$return .= "Cantidad : <b>".$cantidad."</b><br />";	
				$return .= "<div class='cocineroPreparacion'>".$row["NombreCocinero"]."</div>";
				if(!(empty($notaEval)) && $notaEval!=",")
				{					
					$return .= "<br><b class='aviso1'>¡NOTA!</b><br>";
					$return .= "<p class='aviso2'>".$row["nota"]."</p>";					
				}									
				$return .= "</div>";
				$return .= "</li>";				
			}
		}
		$resClean = $this->quitarComas($res);
		mysqli_free_result($rs);
		return $return."___".$resClean;
	}

	public function traerCantPlatos()
	{
		$array = null;
		
		$sql = "select count(m.mesa_num) as cantidad, m.mesa_num as mesa FROM comanda co, ComandaxPedido cp, Mesa m 
				WHERE co.idComanda = cp.Comanda_idComanda					
				AND co.Mesa_idMesa = m.idMesa
				AND cp.TipoAtencion_idTipoAtencion = 01 group by m.mesa_num"; 
		
		$mysqli = ConexionBD::ConexBD();
		$rs = $mysqli->query($sql);
		
		while( $row = mysqli_fetch_array ($rs,MYSQLI_ASSOC)) 
		{
			$array[$row["mesa"]] = $row["cantidad"];
		}

		return $array;		
		mysqli_free_result($rs);
	}

	public function traerPlatosEntregaTipo00($result)
	{
		
		$array = null;
		$cont=0;
		$sql = "select idPedido as 'id' from comandaxpedido where idPedido in (".$result.") and TipoAtencion_idTipoAtencion = 00;"; 
		
		   		
		$mysqli = ConexionBD::ConexBD();
		$rs = $mysqli->query($sql);
		
		while( $row = mysqli_fetch_array ($rs,MYSQLI_ASSOC)) 
		{
			$array[$cont] = $row["id"];
			$cont++;
		}

		mysqli_free_result($rs);
		return $array;
	}

	public function traerPlatosEntregaTipo01($result)
	{		
		$array = null;
		$cont=0;
		$sql = "select idPedido as 'id' from comandaxpedido where idPedido in (".$result.") and TipoAtencion_idTipoAtencion = 01";

		$mysqli = ConexionBD::ConexBD();
		$rs = $mysqli->query($sql);

		while( $row = mysqli_fetch_array ($rs,MYSQLI_ASSOC)) 
		{
			$array[$cont] = $row["id"];
			$cont++;
		}

		mysqli_free_result($rs);
		return $array;
	}
	
	public function quitarComas($string)
	{
		$codigos = "";
		//$arrayCodigosMas1 = null;
		$arrayCodigos = explode(",",$string);
		for($i=0; $i<count($arrayCodigos); $i++)
		{
			if($arrayCodigos[$i]!=null)
			{
				$codigos.= $arrayCodigos[$i];
				//$arrayCodigosMas1[$i+1] = isset($arrayCodigos[$i+1]) ? $arrayCodigos[$i+1] : null;
				//if(count($arrayCodigos)>$i+1)
				//{
					if(!empty($arrayCodigos[$i+1]))
					{
						$codigos.=",";
					}
				//}
				
			}
		}
		return $codigos;
	}

	public function actualizarEnPreparacion()
	{
		$return="";
		$sql="(SELECT p.p_nombre AS 'nombre', 
				GROUP_CONCAT( DISTINCT (m.mesa_num) ) AS 'numMesa',
				p.p_tiempoestimado AS 'TiempoEstimado', 
				GROUP_CONCAT( DISTINCT (cp.idPedido) ) AS 'idComandaxPedido',
				COUNT( DISTINCT (cp.idPedido) ) AS 'cantidad',
				GROUP_CONCAT( cp.nota ) AS 'nota',
				cc.idCocinero AS 'idCocinero',
				cc.nombre AS 'NombreCocinero'
				FROM comanda co, ComandaxPedido cp, Producto p, Mesa m, comandaxcocinero cc
				WHERE co.idComanda = cp.Comanda_idComanda 
				AND cp.Producto_idProducto = p.idProducto 
				AND co.Mesa_idMesa = m.idMesa 
				AND cp.idPedido = cc.idPedido 
				AND cp.estado in (2,10) 
				AND cp.nota = '' 
				AND p.p_tiempoestimado is not null 				
				GROUP BY p.idProducto )
				union all 
				(select 					
				p.p_nombre AS 'nombre', 				
				m.mesa_num AS  'numMesa',
				p.p_tiempoestimado AS 'TiempoEstimado',				
				GROUP_CONCAT(DISTINCT (cp.idPedido)) AS 'idComandaxPedido',
				(select 1 as cantidad) as 'cantidad',				
				cp.nota as 'nota',
				cc.idCocinero as 'idCocinero', 
				cc.nombre as 'NombreCocinero' 
				FROM comanda co, ComandaxPedido cp, Producto p, Mesa m, comandaxcocinero cc
				WHERE co.idComanda = cp.Comanda_idComanda 
				AND cp.Producto_idProducto = p.idProducto 
				AND co.Mesa_idMesa = m.idMesa 
				AND cp.idPedido = cc.idPedido 
				AND cp.estado  in (2,10)
				AND cp.nota <> ''	
				AND p.p_tiempoestimado is not null)";

		$mysqli = ConexionBD::ConexBD();
		$rs = $mysqli->query($sql);			
		$row_cnt = mysqli_num_rows($rs);
		
		if($row_cnt > 0)
		{
			while( $row = mysqli_fetch_array ($rs,MYSQLI_ASSOC)) 
			{
				if(!empty($row["nombre"]))
				{
					$notaEval = $this->quitarComas($row["nota"]);
					$return .= "<div class='preparando' id='".$row["idComandaxPedido"]."'>";
					$return .= $row["nombre"]." - Mesa: <b>".$row["numMesa"]."</b><br> Cantidad - <b>".$row["cantidad"]."</b><br>Tiempo Estimado: <b>".$row["TiempoEstimado"]." min</b><br><br>";
					$return .= "<div id='".$row["idCocinero"]."' class='cocineroPreparacion'>".$row["NombreCocinero"]."</div>";			
					if(!(empty($notaEval)) && $notaEval!=",")
					{					
						$return .= "<br><b class='aviso1'>¡NOTA!</b><br>";
						$return .= "<p class='aviso2'>".$row["nota"]."</p>";					
					}					
					$return .= "<button type='button' onClick=\"CancelarPreparacion('".$row["idComandaxPedido"]."')\">¡Cancelar!</button></div>";	
					//$return .= "<button type='button' onClick='CancelarPreparacion();'>¡Cancelar!</button></div>";	
				}
			}
		}
		mysqli_free_result($rs);
		echo $return;
	}

	public function GrabarComandaxCocinero($IDCocineroSelected,$cocineroSelected,$IdComandaxPedido_array_tmp)
	{
		$sql="";
		for($i = 0; $i < count($IdComandaxPedido_array_tmp); $i++)
		{
			$sql .= "insert into comandaxcocinero(idCocinero,idPedido,Nombre) values ('".$IDCocineroSelected."','".$IdComandaxPedido_array_tmp[$i]."','".$cocineroSelected."'); ";
		}		
		$mysqli = ConexionBD::ConexBD();
		$mysqli->multi_query($sql);
	}

	public function actualizarTerminados()
	{
		$return="";

		$sql = "(SELECT 
				cp.idPedido as 'idPedido', 
				COUNT( DISTINCT (cp.idPedido) ) AS 'cantidad', 
				GROUP_CONCAT( DISTINCT (m.mesa_num) ) AS 'numMesa', 
				p.p_nombre AS 'nombre', 
				cc.Nombre as 'nombreCocinero', 
				GROUP_CONCAT( cp.nota ) AS 'nota' 
				FROM comanda co, ComandaxPedido cp, Producto p, Mesa m, comandaxcocinero cc 
				WHERE co.idComanda = cp.Comanda_idComanda  
				AND cp.Producto_idProducto = p.idProducto 
				AND co.Mesa_idMesa = m.idMesa 
				AND cp.idPedido = cc.idPedido 
				AND cp.estado in (3,10) 
				AND cp.nota = '' 
				AND p.p_tiempoestimado is not null  
				GROUP BY p.idProducto) 
				union all 
				(select 
				cp.idPedido as 'idPedido',
				(select 1 as cantidad) as 'cantidad',
				m.mesa_num AS 'numMesa', 
				p.p_nombre AS  'nombre', 
				cc.Nombre AS 'nombreCocinero', 
				cp.nota  AS 'nota' 
				FROM comanda co, ComandaxPedido cp, Producto p, Mesa m, comandaxcocinero cc 
				WHERE co.idComanda = cp.Comanda_idComanda 
				AND cp.Producto_idProducto = p.idProducto 
				AND co.Mesa_idMesa = m.idMesa 
				AND cp.idPedido = cc.idPedido 
				AND cp.estado IN ( 3, 10 ) 
				AND cp.nota <> '' 
				AND p.p_tiempoestimado IS NOT NULL)";

		$mysqli = ConexionBD::ConexBD();
		$rs = $mysqli->query($sql);			
		$row_cnt = mysqli_num_rows($rs);
		
		if($row_cnt > 0)
		{
			while( $row = mysqli_fetch_array ($rs,MYSQLI_ASSOC)) 
			{	
				if($row["idPedido"]!=0)
				{
					$notaEval = $this->quitarComas($row["nota"]);
					if(!(empty($notaEval)) && $notaEval!=",")
					{
						$thisNota = $row["nota"];
					}
					$return .= "<li>";
					$return .= "<div class='terminadoDIV' id='".$row["idPedido"]."'>";					
					$return .= $row["nombre"]."<br />";				
					$return .= "Mesa : <b>".$row["numMesa"]."</b><br />";									
					$return .= "Cantidad : <b>".$row["cantidad"]."</b><br />";
					$return .= "<div class='cocineroPreparacion'>".$row["nombreCocinero"]."</div>";
					if(!(empty($notaEval)) && $notaEval!=",")
					{					
						$return .= "<br><b class='aviso1'>¡NOTA!</b><br>";
						$return .= "<p class='aviso2'>".$row["nota"]."</p>";					
					}					
					$return .= "</div>";
					$return .= "</li>";	
				}				
			}
		}
		mysqli_free_result($rs);
		echo $return;
	}

	public function CancelarPreparacion($idCancelar)
	{
		//$cancelar = str_replace('_', ',', $idCancelar);
		//str_replace('--', '-', $challenge)
		$this->eleminarComandaxCocinero($idCancelar);
		$return=0;
		$sql="";
		$array = explode(",", $idCancelar);
		for($i=0;$i<count($array);$i++)
		{
			$sql .= "update comandaxpedido set estado = 1 where idPedido = ".$array[$i]."; ";	
		}


		//$sql="update comandaxpedido set estado = 1 where idPedido in (".$cancelar.")";

		$mysqli = ConexionBD::ConexBD();
		$rs = $mysqli->multi_query($sql);			
		//$row_cnt = mysqli_num_rows($rs);
		
		if($rs)
		{
			$return=1;
		}
		
		echo $return;
	}

	public function eleminarComandaxCocinero($idCancelar)
	{
		$sql="";
		$array = explode(",", $idCancelar); 
		for($i=0;$i<count($array);$i++)
		{
			$sql .= "delete from comandaxcocinero where idPedido = ". $array[$i]."; ";	
		}
		
		$mysqli = ConexionBD::ConexBD();
		$mysqli->multi_query($sql);	
		//$mysqli2->multi_query($sqlTipo01Completar);
	}

	public function logout()
	{
		//session_destroy();
		/*$sql = "update usuario set activo = 0 where idUsuario = 011";

		$mysqli = ConexionBD::ConexBD();
		$mysqli->query($sql);*/
		//echo $array;
		//header("../index.php");
	}
}

$logic = new cocinaLogic();
//Nombre del metodo que voy a llamar
$method = isset($_POST["method"]) ? $_POST["method"] : null ;

//parametros del metodo ActualizarEstadoPreparacion
$IdComandaxPedido = isset($_POST["IdComandaxPedido"]) ? $_POST["IdComandaxPedido"] : null ;
$IDCocineroSelected = isset($_POST["ParameteridCocineroSelected"]) ? $_POST["ParameteridCocineroSelected"] : null ;
$cocineroSelected = isset($_POST["ParametercocineroSelected"]) ? $_POST["ParametercocineroSelected"] : null ;
$estado = isset($_POST["estado"]) ? $_POST["estado"] : null ;
$cantidad = isset($_POST["cantidad"]) ? $_POST["cantidad"] : null ;


$idCancelar = isset($_POST["id"]) ? $_POST["id"] : null ;

if(!is_null($method))
{	
	if($method == "ActualizarEstadoPreparacion")
	{
		$logic->ActualizarEstadoPreparacion($IdComandaxPedido,$estado,$IDCocineroSelected,$cocineroSelected,$cantidad);		
	}
	if($method == "traerPlatos")
	{
		$logic->traerPlatos();	
	}
	if($method == "actualizarEnPreparacion")
	{
		$logic->actualizarEnPreparacion();	
	}	
	if($method == "actualizarTerminados")
	{
		$logic->actualizarTerminados();	
	}
	if($method == "traerCocineros")
	{
		$logic->traerCocineros();	
	}	
	if($method == "CancelarPreparacion")
	{
		$logic->CancelarPreparacion($idCancelar);	
	}	
	if($method == "Logout")
	{
		$logic->Logout();	
	}			
		
}

?>