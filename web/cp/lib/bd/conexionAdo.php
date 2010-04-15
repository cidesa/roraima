<?
require_once($_SESSION["x"].'adodb/adodb.inc.php');

class conexionAdo
{
	var $conn;
	var $dsn;
	function conexionAdo()
	{
		$this->conn="";
	}
	function conectar($driver,$server,$user,$pws,$port='5432',$sid)
	{
		if($driver=='mysql'){
 			$this->conn = &ADONewConnection($driver); //Conexion con MySQL
 			$this->conn->PConnect($server,$user,$pws,$sid);
		}
		else if($driver=='postgres'){
		    $this->dsn = $driver.'://'.$user.':'.$pws.'@'.$server.':'.$port.'/'.$sid.'?persist'; //Conexion con PostgreSQL
 			$this->conn = ADONewConnection($this->dsn); //Conexion con PostgreSQL
 			//$this->conn->PConnect($server,$user,$pws,$sid);
		}
		else if($driver=='oci8'){
			$this->conn = ADONewConnection($driver); //Conexion con Oracle
			$this->conn->Connect($server, $user, $pws, $sid);
		}
		else if($driver=='ibase'){
 			$this->conn = &ADONewConnection($driver); //Conexion con InterBase
 			$this->conn->PConnect($server.':'.$sid,$user,$pws);
		}

		return $this->conn;
	}
	function cerrarConexion()
	{
		$this->conn->Close();
	}
}
?>