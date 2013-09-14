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

	class Mesas
	{	
		private $lista;

		public function __construct()
		{
			$this->lista = array();
		}

		public function insert( $numero , $estado , $capacidad )
		{	
			$query = "INSERT INTO mesa VALUES( null , '$numero' , '$estado' , '$capacidad' )";
			
			$result = mysql_query( $query , Main::Conn() );
			if( $result )
				return true;
			else
				return false;
		}

		public function update( $id , $numero , $estado , $capacidad )
		{
			$query  = "UPDATE mesa SET numero = '$numero', estado = '$estado', capacidad = '$capacidad' WHERE id =  $id";

			$result = mysql_query( $query , Main::Conn() );
			if( $result )
				return true;
			else
				return false;
		}

		public function delete( $id )
		{
			$query = "DELETE FROM mesa WHERE id = ".$id; 

			$result = mysql_query( $query , Main::Conn() );

			if( $result )
				return true;
			else
				return false;
		}

		public function findAll()
		{
			$query = "SELECT * FROM mesa";

			$result = mysql_query( $query , Main::Conn() );
			while( $row = mysql_fetch_assoc($result) )
			{
				$this->lista[] = $row;
			}

			return $this->lista;
		}

		public function findById( $value )
		{
			$query = "SELECT * FROM mesa WHERE id = '$value'";

			$result = mysql_query( $query , Main::Conn() );
			while( $row = mysql_fetch_assoc($result) )
			{
				$this->lista[] = $row;
			}

			return $this->lista;
		}
	}
?>