<?
  require_once("conexionAdo.php");
  require_once("../../lib/yaml/Yaml.class.php");
  class basedatosAdo
  {
    var $conn;
    var $bd;
    var $codemp;

    function basedatosAdo($codemp)
    {
      $this->bd=new conexionAdo();
      //$sf_config_dir = '';
      $sf_config_dir = $_SESSION['sf_config_dir'];

      $driver="postgres";
      if($sf_config_dir!=''){
        $opciones = Yaml::load($sf_config_dir."/databases.yml");
        $opciones = $opciones['all']['propel']['param'];
        $hostname = $opciones['hostspec'];
        $user     = $opciones['username'];
        $port     = $opciones['port'];
        $password = $opciones['password'];
        $dbname   = $opciones['database'];
      }else{
        // Aqui se modifica las direcciones estaticas de conexion con la BD
        $hostname = "localhost";
        $user     = "postgres";
        $password = "postgres";
        $dbname   = "SIMA";
        $port     = "5432";
      }
      //$port="5432";
      $this->codemp = $codemp;

      $this->conn=$this->bd->conectar($driver,$hostname,$user,$password,$port,$dbname);
      $this->conn->Execute("SET search_path TO ".chr(34).SIMA."$codemp".chr(34));
      $this->conn->Execute('SET CLIENT_ENCODING TO "UNICODE"');
    }

    function select($sql)
    {
      $rs=$this->conn->Execute($sql);
      return $rs;
    }

    function actualizar($sql)
    {
      $this->conn->Execute($sql);
    }

    function closed()
    {
      $this->conn->Close();
    }

    function startTransaccion()
    {
      $this->conn->StartTrans();
    }

    function completeTransaccion()
    {
      $this->conn->CompleteTrans();
    }

    function Commit()
    {
      $this->conn->CommitTrans();
    }


    function longitud($tabla)
    {
       $rs=$this->conn->MetaColumns($tabla,$toupper=false);
      return $rs;
    }
    
    function Log($refmov, $codapl, $tabla, $codmod, $tipope)
    {
      $loguse = $_SESSION['loguse'];
//      print $loguse;

      $sql = "SELECT id FROM ".'"SIMA_USER".'."USUARIOS WHERE LOGUSE='$loguse'";
//print $sql;      
      $rs = $this->select($sql);

      if($rs) $codintusu= $rs->fields['id'];
      else $codintusu= 'SINUSU';
      
      $sql = "INSERT INTO ".'"SIMA_USER".'."SEGBITACO(refmov, codapl, codintusu, valcla, codmod, tipope, fecope, horope)
      VALUES('$refmov', '$codapl', '$codintusu', '$tabla', '$codmod', '$tipope', CURRENT_DATE, CURRENT_TIMESTAMP );
      ";
//print $sql;exit;
      $this->conn->Execute($sql);
      
    }

  }
?>
