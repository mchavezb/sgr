<?php
class ConexionBD
{
	public static function ConexBD()
	{
		
		//Variables locales
		$cn=NULL; $db=NULL;
		try {
			
			//servidor, usuario, password, base de datos;
			$mysqli = @new MySQLi("localhost","root","","sgr");
				
			if($mysqli->connect_errno)
			{
				throw new Exception($mysqli->connect_error);
			}
			
			return $mysqli;
		} 
		catch (Exception $e)
		{
			error_log("\n".$e->getMessage(). "\t   fecha: \t" . date("l,M d, Y g:i:s"),3,"../error_log/errores.log");
			throw new Exception("No se pudo conectar a la BD");	
		}
	}
}
?>