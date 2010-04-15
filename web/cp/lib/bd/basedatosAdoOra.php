<?
	require_once($_SESSION["x"].'/lib/bd/conexionAdo.php');
	class basedatosAdo
	{
		var $conn;
		var $bd;
		
		function basedatosAdo($codemp)
		{
			$this->bd=new conexionAdo();
			$driver="oci8";
			$server="SOPORTE01";
  			$user="SIMA".$codemp;
  			$password="SIMA".$codemp;
  			$dbname="SIMA";
			$port="";
  			$this->conn=$this->bd->conectar($driver,$server,$user,$password,$port,$dbname);
		}
		
		function prepare($sql)
		{
			$this->conn->PrepareSP($sql);
		}
		
		function select($sql)
		{
			//$this->conn->Execute('SET search_path TO "SIMA011"');
			$rs=$this->conn->Execute($sql);
			return $rs;
		}
		
		function actualizar($sql)
		{
			//$this->conn->Execute('SET search_path TO "SIMA011"');
			$this->conn->Execute($sql);
		}
		
		function autoExecuteInsert($tabla,$record,$sentencia)
		{
			$this->conn->AutoExecute($tabla,$record,$sentencia);
		}
		
		function autoExecuteUpdate($tabla,$record,$sentencia,$condicion)
		{
			$this->conn->AutoExecute($tabla,$record,$sentencia,$condicion);
		}
		
		function begintrans()
		{
			$this->conn->BeginTrans();
		}
		
		function committrans()
		{
			$this->conn->CommitTrans();
		}
		
		function startTransaccion()
		{
			$this->conn->StartTrans();
		}
		
		function completeTransaccion()
		{
			$this->conn->CompleteTrans();
		}
		
		function insert($rs,$record)
		{
			$insert=$this->conn->GetInsertSQL($rs, $record); 
			$this->conn->Execute($insert);
		}
		
		function update($rs,$record)
		{
			$update=$this->conn->GetUpdateSQL($rs, $record); 
			$this->conn->Execute($update);
		}
		
		function closed()
		{
			$this->conn->Close();
		}

		function select1($sql)  //Para hacer la conexion con Sima_user
		{
			//$this->conn->Execute('SET search_path TO "SIMA_USER"');
			$rs=$this->conn->Execute($sql);
			return $rs;
		}

		function basedatosAdo1()
		{
			$this->bd=new conexionAdo();
			$driver="oci8";
			$server="SOPORTE01";
  			$user="SIMA012";
  			$password="SIMA012";
  			$dbname="SIMA";
			$port="";
  			$this->conn=$this->bd->conectar($driver,$server,$user,$password,$port,$dbname);
		}

	}
?>