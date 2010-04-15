<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
  require_once('../../adodb/adodb.inc.php');
  require_once("conexionAdo.php");
  require_once("../../lib/yaml/Yaml.class.php");

  class basedatosAdo
  {
    private $conn;
    private $bd;
    private $confbd;
    private $schema;
    private $empresa;

    function basedatosAdo()
    {
      $this->bd=new conexionAdo();
      $opciones = Yaml::load("../../lib/bd/databases.yml");

      $confbd = $opciones['database']['name'];

      if(isset($_SESSION['schema'])) $this->schema = $_SESSION['schema'];
      else{
        if($_SERVER['REQUEST_METHOD']=='GET'){
          if(isset($_GET['schema'])){
            $_SESSION['schema'] = $_GET['schema'];
            $this->schema = $_GET['schema'];
          }else if(isset($_SESSION['schema'])) $this->schema = $_SESSION['schema'];
          else $this->schema=$opciones[$confbd]['schema'];
        }elseif($_SERVER['REQUEST_METHOD']=='POST'){
          if(isset($_POST['schema'])){
            $_SESSION['schema'] = $_POST['schema'];
            $this->schema = $_POST['schema'];
          }else if(isset($_SESSION['schema'])) $this->schema = $_SESSION['schema'];
          else $this->schema=$opciones[$confbd]['schema'];
        }
      }

      $hostname=$opciones[$confbd]['host'];
      $user=$opciones[$confbd]['usuario'];
      $password=$opciones[$confbd]['password'];
      $dbname=$opciones[$confbd]['bd'];
      //$this->schema=$opciones[$confbd]['schema'];
      $port=$opciones[$confbd]['port'];
      $this->empresa=$opciones[$confbd]['empresa'];

      $this->conn=$this->bd->conectar("postgres",$hostname,$user,$password,$port,$dbname);

      // Configuración de la codificación por defecto
      $this->conn->Execute('SET CLIENT_ENCODING TO "UNICODE"');

    }

    function select($sql, $schema = '')
    {
        if($schema=='') $this->conn->Execute('SET search_path TO "'.$this->schema.'"');
        else $this->conn->Execute('SET search_path TO "'.strtoupper($schema).'"');
        $rs=$this->conn->Execute($sql);
      return $rs;
    }

    function selectu($sql)
    {
      $this->conn->Execute('SET search_path TO "SIMA_USER"');
      $rs=$this->conn->Execute($sql);
      return $rs;
    }

    function actualizar($sql)
    {
      $this->conn->Execute('SET search_path TO "'.$this->schema.'"');
      $this->conn->Execute($sql);
    }

    function closed()
    {
      $this->conn->Close();
    }

    function getSchema()
    {return $this->schema;}

    function getEmpresa()
    {return $this->empresa;}

    function Validar()
    {
    	return true;
    }

  }
?>
