<?php
	class Main
	{
		public static function Conn()
		{
			$conn = mysql_connect( 'mysql9.000webhost.com' , 'a6895914_sgr' , 'Maple1991' );
			mysql_query("SET NAMES 'utf8'");
			mysql_select_db( 'a6895914_sgr' );

			return $conn;
		}
	}

	class Platos
	{	
		private $lista;

		public function __construct()
		{
			$this->lista = array();
		}

		public function insert( $nombre , $estado , $tiempo, $precio )
		{	
			$query = "INSERT INTO plato VALUES( null , '$nombre' , '$estado' , '$tiempo', '$precio' )";
			
			$result = mysql_query( $query , Main::Conn() );
			if( $result )
				return true;
			else
				return false;
		}

		public function update( $id , $nombre , $estado , $tiempo, $precio )
		{
			$query  = "UPDATE plato SET nombre = '$nombre', estado = '$estado', tiempo = '$tiempo', precio = '$precio' WHERE id =  $id";

			$result = mysql_query( $query , Main::Conn() );
			if( $result )
				return true;
			else
				return false;
		}

		public function delete( $id )
		{
			$query = "DELETE FROM plato WHERE id = ".$id; 

			$result = mysql_query( $query , Main::Conn() );

			if( $result )
				return true;
			else
				return false;
		}

		public function findAll()
		{
			$query = "SELECT * FROM plato";

			$result = mysql_query( $query , Main::Conn() );
			while( $row = mysql_fetch_assoc($result) )
			{
				$this->lista[] = $row;
			}

			return $this->lista;
		}

		public function findById( $value )
		{
			$query = "SELECT * FROM plato WHERE id = '$value'";

			$result = mysql_query( $query , Main::Conn() );
			while( $row = mysql_fetch_assoc($result) )
			{
				$this->lista[] = $row;
			}

			return $this->lista;
		}
	}
?>