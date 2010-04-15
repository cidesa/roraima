<?
session_start();
//require_once($_SESSION["x"].'adodb/adodb-exceptions.inc.php');
//require_once($_SESSION["x"].'lib/bd/basedatosAdo.php');
//require_once($_SESSION["x"].'lib/general/Herramientas.class.php');

//$bd=new basedatosAdo($codemp);

class tools
{
  var $codigo;
  var $descripcion;
  var $fecha;
  var $tipcom;
  var $asientos=array(0 => array("cuenta" => " ","descripcion" => " ","referencia" => " ","debecre" => " ","monasi" => 0));
  var $numAsientos;
  var $sql;
  var $contabb;
  function inicializar()
  {
    $this->numAsientos=0;
  }
  function tools()
  {
  }

  function eliminarRegistroDetalle($tabla,$cod,$like,$log=false,$mod='xxx', $formulario='yyy')
  {
    global $bd;

    try
      {
          $bd->startTransaccion();
          $sql="SELECT * FROM ".strtoupper($tabla)." WHERE RTRIM(".strtoupper($cod).")=RTRIM('".$like."')";
          $tb=$bd->select($sql);

          if (!$tb->EOF)
          {
            // Guardar en segbitaco
            if($log) $id = $tb->fields["id"];
            
            $sql2="delete from ".strtoupper($tabla)." WHERE RTRIM(".strtoupper($cod).")=RTRIM('".$like."')";
            $bd->actualizar($sql2);
            
            if($log) $bd->Log($id, $mod, ucfirst(strtolower($tabla)), ucfirst(strtolower($formulario)), 'E');
            $bd->completeTransaccion();
            return true;
          }
          else
          {
            return false;
          }

      }
      catch(Exception $e)
      {
          print "Excepcion Obtenida: ".$e->getMessage()."\n";
      }

  }

  function buscar_datos($sql)
  {
    global $bd;
    try
      {
        //echo "$sql"."<br>";
        $tb=$bd->select($sql);
        if (!$tb->EOF)
        {
          //$tb->MoveFirst();
          //echo "si";
          return $tb;
        }
        else
        {
          return false;
        }
      }
    catch(Exception $e)
      {
          print "Excepcion Obtenida: ".$e->getMessage()."\n";
          return false;
      }
  }

  function buscar_codigoHijo($codigo)
  {
    $x=new tools();
    global $bd;
    $codigo= strtoupper(trim($codigo));

    try
      {
        $sql="Select count(codcta) as codcta from CONTABB where codcta like '".$codigo."%' ";
        if ($tb=$x->buscar_datos($sql))
        {
          if ($tb->fields["codcta"]>1)
          {
            return true;
          }
          else
          {
            return false;
          }
        }
        else
        {
          return false;
        }
      }
    catch(Exception $e)
      {
          print "Excepcion Obtenida: ".$e->getMessage()."\n";
          return false;
      }
  }

  function primerRegistro($nombreTabla,$campoClave)
  {
    $x=new tools();
    global $bd;
    try
      {
        $sql="SELECT * FROM ".$nombreTabla." WHERE ".$campoClave."=(SELECT MIN (".$campoClave.") FROM ".$nombreTabla.")";
        if ($tb=$x->buscar_datos($sql))
        {
          return $tb;
        }
        else
        {
          return false;
        }

      }
    catch(Exception $e)
      {
          print "Excepcion Obtenida: ".$e->getMessage()."\n";
          return false;
      }
  }





  function primerRegistroAsi($nombreTabla,$campoClave)
  {
    $x=new tools();
    global $bd;
    try
      {
        $sql="SELECT * FROM ".$nombreTabla." WHERE ".$campoClave."=(SELECT MIN (".$campoClave.") FROM ".$nombreTabla." where perpre='00')";
        if ($tb=$x->buscar_datos($sql))
        {
          return $tb;
        }
        else
        {
          return false;
        }

      }
    catch(Exception $e)
      {
          print "Excepcion Obtenida: ".$e->getMessage()."\n";
          return false;
      }
  }

  function ultimoRegistro($nombreTabla,$campoClave)
  {
    $x=new tools();
    global $bd;
    try
      {
        $sql="SELECT * FROM ".$nombreTabla." WHERE ".$campoClave."=(SELECT MAX (".$campoClave.") FROM ".$nombreTabla.")";
        if ($tb=$x->buscar_datos($sql))
        {
          return $tb;
        }
        else
        {
          return false;
        }

      }
    catch(Exception $e)
      {
          print "Excepcion Obtenida: ".$e->getMessage()."\n";
          return false;
      }
  }

  function ultimoRegistroAsi($nombreTabla,$campoClave)
  {
    $x=new tools();
    global $bd;
    try
      {
        $sql="SELECT * FROM ".$nombreTabla." WHERE ".$campoClave."=(SELECT MAX (".$campoClave.") FROM ".$nombreTabla." where perpre='00')";
        if ($tb=$x->buscar_datos($sql))
        {
          return $tb;
        }
        else
        {
          return false;
        }

      }
    catch(Exception $e)
      {
          print "Excepcion Obtenida: ".$e->getMessage()."\n";
          return false;
      }
  }

  function anteriorRegistro($nombreTabla,$campoClave,$valorCampoClave,$fecha)
  {
    $x=new tools();
    global $bd;
    try
      {
        if (!$valorCampoClave=="")
        {
          if ($fecha=="S")
          {
            $sql="SELECT * FROM ".$nombreTabla." WHERE ".$campoClave."=(SELECT MAX (".$campoClave.") FROM ".$nombreTabla." WHERE RTRIM(".$campoClave.") < to_date('".(string)$valorCampoClave."','dd/mm/yyyy'))";
          }
          else
          {
            $sql="SELECT * FROM ".$nombreTabla." WHERE ".$campoClave."=(SELECT MAX (".$campoClave.") FROM ".$nombreTabla." WHERE RTRIM(".$campoClave.") < TRIM('".$valorCampoClave."'))";
          }
            if ($tb=$x->buscar_datos($sql))
            {
              return $tb;
            }
            else
            {
              return false;
            }
        }
        else
        {
          if ($tb=$x->primerRegistro($nombreTabla,$campoClave))
          {
            return $tb;
          }
          else
          {
            return false;
          }
        }

      }
    catch(Exception $e)
      {
          print "Excepcion Obtenida: ".$e->getMessage()."\n";
          return false;
      }
  }

  function anteriorRegistroAsi($nombreTabla,$campoClave,$valorCampoClave,$fecha)
  {
    $x=new tools();
    global $bd;
    try
      {
        if (!$valorCampoClave=="")
        {
          if ($fecha=="S")
          {
            $sql="SELECT * FROM ".$nombreTabla." WHERE ".$campoClave."=(SELECT MAX (".$campoClave.") FROM ".$nombreTabla." WHERE RTRIM(".$campoClave.") < to_date('".(string)$valorCampoClave."','dd/mm/yyyy'))";
          }
          else
          {
            $sql="SELECT * FROM ".$nombreTabla." WHERE ".$campoClave."=(SELECT MAX(".$campoClave.") FROM ".$nombreTabla." WHERE RTRIM(".$campoClave.") < TRIM('".$valorCampoClave."') and perpre='00')";
          }
            if ($tb=$x->buscar_datos($sql))
            {
              return $tb;
            }
            else
            {
              return false;
            }
        }
        else
        {
          if ($tb=$x->primerRegistro($nombreTabla,$campoClave))
          {
            return $tb;
          }
          else
          {
            return false;
          }
        }

      }
    catch(Exception $e)
      {
          print "Excepcion Obtenida: ".$e->getMessage()."\n";
          return false;
      }
  }

  function proximoRegistro($nombreTabla,$campoClave,$valorCampoClave,$fecha)
  {
    $x=new tools();
    global $bd;
    try
      {
        if (!$valorCampoClave=="")
        {
          if ($fecha=="S")
          {
            $sql="SELECT * FROM ".$nombreTabla." WHERE ".$campoClave."=(SELECT MIN (".$campoClave.") FROM ".$nombreTabla." WHERE RTRIM(".$campoClave.") > to_date('".(string)$valorCampoClave."','dd/mm/yyyy'))";
          }
          else
          {
            $sql="SELECT * FROM ".$nombreTabla." WHERE ".$campoClave."=(SELECT MIN (".$campoClave.") FROM ".$nombreTabla." WHERE RTRIM(".$campoClave.") > TRIM('".$valorCampoClave."'))";
          }
            if ($tb=$x->buscar_datos($sql))
            {
              return $tb;
            }
            else
            {
              return false;
            }
        }
        else
        {
          if ($tb=$x->primerRegistro($nombreTabla,$campoClave))
          {
            return $tb;
          }
          else
          {
            return false;
          }
        }

      }
    catch(Exception $e)
      {
          print "Excepcion Obtenida: ".$e->getMessage()."\n";
          return false;
      }
  }

  function proximoRegistroAsi($nombreTabla,$campoClave,$valorCampoClave,$fecha)
  {
    $x=new tools();
    global $bd;
    try
      {
        if (!$valorCampoClave=="")
        {
          if ($fecha=="S")
          {
            $sql="SELECT * FROM ".$nombreTabla." WHERE ".$campoClave."=(SELECT MIN (".$campoClave.") FROM ".$nombreTabla." WHERE RTRIM(".$campoClave.") > to_date('".(string)$valorCampoClave."','dd/mm/yyyy'))";
          }
          else
          {
            $sql="SELECT * FROM ".$nombreTabla." WHERE ".$campoClave."=(SELECT MIN(".$campoClave.") FROM ".$nombreTabla." WHERE (".$campoClave.") >'".$valorCampoClave."' and perpre='00')";

          }
            if ($tb=$x->buscar_datos($sql))
            {
              return $tb;
            }
            else
            {
              return false;
            }
        }
        else
        {
          if ($tb=$x->primerRegistro($nombreTabla,$campoClave))
          {
            return $tb;
          }
          else
          {
            return false;
          }
        }

      }
    catch(Exception $e)
      {
          print "Excepcion Obtenida: ".$e->getMessage()."\n";
          return false;
      }
  }

  function validarFechaPresup($fecha)
  {
  $x=new tools();
  global $bd;

    if (strlen($fecha)==10)
    {
      //chekea periodo cerrado
       $sql="select cerrado from cppereje where to_date('".$fecha."','DD/MM/YYYY') between fecdes and fechas";

      if ($tb=$x->buscar_datos($sql))
      {
        if ($tb->fields["cerrado"]=='C')
        {
          Mensaje("El Periodo en Presupuesto fue Cerrado");
          return false;
        }
        else
        {
          return true;
        }
      }
      else
      {
        Mensaje("Fecha fuera del Ejercicio Fiscal");
        return false;
      }
    }
    else
    {
      Mensaje("Formato de Fecha Inválido");
      return false;
    }

  }

  function Fecha_en_Periodo_Abierto($fecha)
  {
  $x=new tools();
  global $bd;

    if (strlen($fecha)==10)
    {
      //chekea periodo cerrado
      $sql="select *  from cppereje where cerrado='N' and to_date('".$fecha."','DD/MM/YYYY') between fecdes and fechas ";
      if ($tb=$x->buscar_datos($sql))
      {
          return true;
      }
      else
      {
        Mensaje("El Periodo en Presupuesto fue Cerrado");
        return false;
      }
    }
    else
    {
      Mensaje("Formato de Fecha Inválido");
      return false;
    }

  }

  function Validar_Periodo($fecha,$nombreTabla)
  {
  $x=new tools();
  global $bd;


    $sql="Select to_char(fecini,'dd/mm/yyyy') as fecini,to_char(feccie,'dd/mm/yyyy') as feccie  from ".$nombreTabla."";
    if ($tb=$x->buscar_datos($sql))
    {
      if (strlen($fecha)==10)
      {
         $fecini=$tb->fields["fecini"];
         $feccie=$tb->fields["feccie"];

        $splitfecha = split('/', $fecha);
        $splitfecini = split('/', $fecini);
        $splitfeccie = split('/', $feccie);

        $fecha_for = $splitfecha[2] . "-" . $splitfecha[1] . "-" . $splitfecha[0];
        $fecini_for = $splitfecini[2] . "-" . $splitfecini[1] . "-" . $splitfecini[0];
        $feccie_for = $splitfeccie[2] . "-" . $splitfeccie[1] . "-" . $splitfeccie[0];

        if ((strtotime($fecha_for)>= strtotime($fecini_for))  and (strtotime($fecha_for)<= strtotime($feccie_for)))
           {
          return true;
        }
        else
        {
          Mensaje("La Fecha esta fuera del Período");
          return false;
        }
       }  //if (strlen($fecha)==10)
       else
       {
           Mensaje("Formato de Fecha  Inválido");
           return  false;
       }
    }//if ($tb=$x->buscar_datos($sql))
    else
    {
      Mensaje("La Fecha debe estar entre la Fecha de Inicio y la Fecha Final del Ejercicio");
      return false;
    }
  }


  function formar_nivelDisponibilidad($codigo,$niveldisp)
  {
    $x=new tools();
    global $bd;

      $sql="select sum(lonniv) as total from cpniveles where consec <= '".$niveldisp."' ";
      if ($tb=$x->buscar_datos($sql))
      {
        if ($tb->fields["total"]>0)
        {
          $nroguiones=intval($niveldisp) - 1;
          $res=substr($codigo,0,$tb->fields["total"] + $nroguiones);
          return $res;
        }
        else
        {
          return $res="";
        }
      }
      else
      {
        return $res="";
      }
  }


  function getVerCorrelativo($campo,$tabla,&$output)
  {
    global $bd;
    $z = new tools();

      $sql   = "select $campo from $tabla";
      $output = '';
      if ($tb=$z->buscar_datos($sql))
      {
        $output = $tb->fields["$campo"]+1;
      }
      return $output;
  }


  function getSalvarCorrelativo($campo,$tabla,$reg)
  {
    global $bd;
    $z = new tools();

  try
  {
        $sql   = "update $tabla set $campo=$reg";
        $bd->actualizar($sql);

      return true;

  }catch(Execption $e)
  {
          print "Excepcion Obtenida: ".$e->getMessage()."\n";
          return 0;
  }
  }

  function ConfBotones()
  {
      global $z;
	  global $bd;

  	$sql = "select * from cpdefniv";

  	if ($tb=$z->buscar_datos($sql))
	{
	    $btn['eliminar'] = $tb->fields["btneli"];
	    $btn['anular'] = $tb->fields["btnanu"];
  	}

  	$sql = "select * from contaba";
  	if ($tb=$z->buscar_datos($sql))
	{
	    $btn['btnmodcom'] = $tb->fields["btnmodcom"];
  	}

  	return $btn;
  }

// FIN CLASS
}


function conCredencial($credenciales, $modulo,$permiso)
{
  //print_r($permiso);exit();
  //echo '<pre>';
  //print_r($credenciales); exit();
  //print $modulo.'  ';
  if($modulo!=''){
    if(is_array($credenciales)){
      foreach($credenciales as $cred){
        foreach($permiso as $per){

          if(strtolower($cred)==strtolower($modulo).'_'.$per ||
            strtolower($cred)=='admin' ||
            'anueli'.strtolower($cred)==strtolower($modulo).'_'.$per ||
            'anular'.strtolower($cred)==strtolower($modulo).'_'.$per ||
            'anu'.strtolower($cred)==strtolower($modulo).'_'.$per ||
            'apr'.strtolower($cred)==strtolower($modulo).'_'.$per ||
            'imec'.strtolower($cred)==strtolower($modulo).'_'.$per
            ) return true;
        }
      }
      return false;
    }else return false;
  }else return false;

}

  function validar($permiso = array(8,11,15),$app='', $modulo='')
  {

    $script = $_SERVER['SCRIPT_NAME'];
    //print $script;
    $script = split('/',$script);
    if($app=='') $app = strtolower($script[(count($script)-1)]);
    if($modulo=='') $modulo = strtolower($script[(count($script)-2)]);

    $credenciales = $_SESSION['symfony/user/sfUser/credentials'];
    $env = $_SESSION['environment'];
    if($env!='dev') $env=''; else $env='_'.$env;

  if (!empty($_SESSION["sesion_usuario"])):
    $sesion_usuario=$_SESSION["sesion_usuario"];
  else:
      $sesion_usuario=0;
  endif;

  if ((session_id()==$sesion_usuario) and (!empty($_SESSION["x"]))):

      if ( !conCredencial($credenciales,$modulo,$permiso) && !conCredencial($credenciales,$app,$permiso) ):
        ?>
        <script language="javascript1.1" type="text/javascript">
          location=("http://"+window.location.host+"/autenticacion<?php echo $env;  ?>.php/generales/nocredentials");
        </script>
        <?
      endif;

  else:
              ?>
              <script language="javascript1.1" type="text/javascript">
                alert("Acceso Denegado")
                //location=("../../login.php")
                location=("http://"+window.location.host+"/autenticacion<?php echo $env;  ?>.php/login");
              </script>
              <?
  endif;

  }


   function LanzarReporte($modulo, $rpt)
  { ?>
  <script>
    if(confirm("¿Desea imprimir la orden Pre-Impresa?"))
    {
      var ruta='http://'+window.location.host;
      pagina=ruta+"/reportes/reportes/<? echo $modulo; ?>/r.php=?r=<? echo $rpt; ?>";
      window.open(pagina,1,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80");
    }

  </script>
  <? }



   function Mensaje($msg)
  { ?>
  <script>alert('<? echo $msg; ?>');</script>
  <? }

   function Regresar($txt)
  { ?>
  <script>
   location=("<? echo $txt; ?>");</script>
  <? }

   function cerrar()
  { ?>
  <script>close();</script>
  <? }

  function instr($palabra,$busqueda,$comienzo,$concurrencia){

    $tamano=strlen($palabra);
    $cont=0;
    $cont_conc=0;

    for ($i=$comienzo;$i<=$tamano;$i++){
      $cont=$cont+1;
      if ($palabra[$i]==$busqueda):
        $cont_conc=$cont_conc+1;

        if ($cont_conc==$concurrencia):
          $i=$tamano;
        endif;
      endif;
    }
      if ($concurrencia > $cont_conc ):
         $cont=0;
      else:
         $cont;
      endif;

    return $instr=$cont;
    }


  function digitos($i)
    {
      if ($i<10)
      {
      $i="0".$i;
      }
      return $i;
    }


    //////////////// FUNCIONES DEL MODULO DE PRESUPUESTO /////////////
    function FormateaTexto($codigo)
  {
  //Esta funcion elimina los guiones a la derecha del código.
      $CodFor=$codigo;
      $pos=strlen($codigo)-1;
      while ($pos>=0)
      {
        if (substr($codigo, $pos, 1) == '-')
        {
        $CodFor=substr($codigo,0,$pos);
        }
      else
      {
         break;
      }
          $pos = $pos - 1;
          }
      return $CodFor;
  }

  function pre_buscar_codigo_padre($codigo)
  {
  global $codigopadre;
  global $bd;

    $codigo=strtoupper(trim($codigo));
       $pos = 0;
      $nivel = 1;
      while ($pos <= strlen($codigo)){
      if (substr($codigo, $pos, 1) == '-'){
      $nivel = $pos; }
      $pos = $pos + 1;
     }

    if ($nivel <> 1)
    {
       $codigopadre = substr($codigo, 0, $nivel);
        $sql="Select * from CPDefTit where trim(CodPre)='$codigopadre'";
       $tb=$bd->select($sql);
      if (!$tb->EOF){ return true; } else { return false; }

      }else{ return true; }
  }


  function pre_buscar_codigoHijo($codigo)
  {
    global $bd;
    $tools=new tools();
    $codigo= strtoupper(trim($codigo));
    try
      {
        $sql="select count(codpre) as codpre from cpdeftit where codpre like '".$codigo."%' ";
        if ($tb=$tools->buscar_datos($sql))
        {
          if ($tb->fields["codpre"]>1)
          {
            return true;
          }
          else
          {
            return false;
          }
        }
        else
        {
          return false;
        }
      }
    catch(Exception $e)
      {
          print "Excepcion Obtenida: ".$e->getMessage()."\n";
          return false;
      }
  }


  function buscar_codigo_padre($codigo,$codigopadre='')
  {
  global $codigopadre;
  global $bd;
  //$bd=new basedatosAdo($_SESSION["codemp"]);

    $codigo=strtoupper(trim($codigo));
      $pos = 0;
      $nivel = 0;
      while ($pos <= strlen($codigo))
      {

        if (substr($codigo,$pos,1)=='-')
          {
          $nivel = $pos;
        }
        $pos = $pos + 1;
     }

    if ($nivel != 0)
    {
       $codigopadre = substr($codigo, 0, $nivel);
       $sql="select * from contabb where trim(codcta)='$codigopadre'";
       $tb=$bd->select($sql);
      if (!$tb->EOF){ return true; } else { return false; }

      }else{ return true; }
  }

  function buscar_codigo_padre2($codigo)
  {
  global $codigopadre;
  global $bd;
  //$bd=new basedatosAdo($_SESSION["codemp"]);

    $codigo=strtoupper(trim($codigo));
      $pos = 0;
      $nivel = 0;
      while ($pos <= strlen($codigo))
      {

        if (substr($codigo,$pos,1)=='-')
          {
          $nivel = $pos;
        }
        $pos = $pos + 1;
     }

    if ($nivel != 0)
    {
       $codigopadre = substr($codigo, 0, $nivel);
       $sql="select * from contabb where trim(codcta)='$codigopadre'";
       $tb=$bd->select($sql);
      if (!$tb->EOF)
      {
          if ($tb->fields["cargab"]=='C')
        { return false; }
        else
        { return true; }
      }
      else
      {
        return true;
      }
    }
    return true;
  }



    //////////////////////////////////////////////////////////////////


  function verifica_cta($codigo)
  {  global $bd;

       $sql="select forcta from contaba";
       $tb=$bd->select($sql);
       $arre=split("-",$tb->fields["forcta"]);

       $val=array();
       $i=0;
       $acum=0;
       while ($i<=count($arre)-1)
       {
           if ($i==0)
           {
              $valor=strlen($arre[$i]);
              $acum=$valor+1;
           }
             else
             {
               $valor=strlen($arre[$i])+$acum;
             $acum=$valor+1;
             }
            $val[]=$valor;
            $i++;
       }
    $loncodigo=strlen(trim($codigo));
  if (in_array ($loncodigo, $val))
  {return true;}else{return false;}

  }

  function GenerarCodigo($nombreTabla,$campoClave)
  {
    $x=new tools();
    global $bd;
    try
      {
        $sql="SELECT  ".$campoClave."  FROM ".$nombreTabla." ";
        if ($tb=$x->buscar_datos($sql))
        {
          $UltCod=($tb->fields[$campoClave])  + 1;
        }
        else
        {
          $UltCod=1;
        }
        return  $UltCod;
      }
    catch(Exception $e)
      {
          print "Excepcion Obtenida: ".$e->getMessage()."\n";
          return 0;
      }
  }

  // está funcion toma un fecha con formato 01/12/2002

// y lo transforma a 2002/12/01 antes de guardarlo en

// una base de datos mysql



//echo fentrada("01/01/2005");



function fentrada($cad){

$uno=substr($cad, 0, 2);

$dos=substr($cad, 3, 2);

$tres=substr($cad, 6, 4);

$cad2 = ($tres."/".$dos."/".$uno);

return $cad2;

}

// Está funcion hace lo contrario toma una fecha con
// formato 2002/12/01 y lo transforma a 01/12/2002
// antes de mostrarlo en una página, despues de leerlo
// desde una base de datos mysql

function fsalida($cad2){
  $tres=substr($cad2, 0, 4);
  $dos=substr($cad2, 5, 2);
  $uno=substr($cad2, 8, 2);
  $cad = ($uno."/".$dos."/".$tres);
  return $cad;
}

// Está funcion hace lo contrario toma una fecha con
// formato 2002/12/01 y lo transforma a 01-12-2002
// antes de mostrarlo en una página, despues de leerlo
// desde una base de datos mysql

function fentrada2($cad){
  $uno=substr($cad, 0, 2);
  $dos=substr($cad, 3, 2);
  $tres=substr($cad, 6, 4);
  $cad2 = ($tres."-".$dos."-".$uno);
  return $cad2;
}


  function validar_cierre($fecha)
  {
  $x=new tools();
  global $bd;

    if (strlen($fecha)==10)
    {
      $sql="select * from contaba1 where to_date('".$fecha."','DD/MM/YYYY') between fecdes and fechas";
      if ($tb=$x->buscar_datos($sql))
      {
        if ($tb->fields["status"]=='C')
        {
          Mensaje("La Fecha del Comprobante pertenece a un periodo Cerrado");
          return false;
        }
        else //Status='A'
        {
          return true;
        }
      }
      else
      {
        Mensaje("Error al encontrar este comprobante");
        return false;
      }
    }
    else
    {
      Mensaje("Formato de Fecha Inválido");
      return false;
    }
  }

  function Monto_disponible_ejecucion($ano,$codigo,$periodo)
  {
    global $bd;
    $x      = new tools();
    $mondis = 0;

  if ($periodo=='00')
  {
    $fecini = '01';
    $feccie = '12';
  }else
  {
    $fecini=$periodo;
    $feccie=$periodo;
  }

      $sql="select sum(monasi +
      coalesce(obtener_ejecucion(rtrim(codpre),'".$fecini."','".$feccie."','".$ano."','TRA'),0) +
      coalesce(obtener_ejecucion(rtrim(codpre),'".$fecini."','".$feccie."','".$ano."','ADI'),0) -
      coalesce(obtener_ejecucion(rtrim(codpre),'".$fecini."','".$feccie."','".$ano."','TRN'),0) -
      coalesce(obtener_ejecucion(rtrim(codpre),'".$fecini."','".$feccie."','".$ano."','DIS'),0) -
      coalesce(obtener_ejecucion(rtrim(codpre),'".$fecini."','".$feccie."','".$ano."','PRC'),0)) as mondis
      from cpasiini where codpre like '".$codigo."' and anopre='".$ano."' and perpre='".$periodo."'";

      if ($tb=$x->buscar_datos($sql))
      {
        if ($tb->fields["mondis"]!='')
    {
      $mondis=$tb->fields["mondis"];
    }
      }
      return $mondis;
  }

  function ObtenerPeriodo($fecha)
  {
      global $bd;
      $z      = new tools();

      $sql ="select pereje from cppereje where fecdes<=to_date('".$fecha."','dd/mm/yyyy') and fechas>=to_date('".$fecha."','dd/mm/yyyy')";
    $periodo='';

      if ($tb=$z->buscar_datos($sql))
      {
        $periodo = $tb->fields["pereje"];
      }
      return $periodo;

  }

  function iif($testVar,$verdadero,$falso)
  {
      if ($testVar) {
          return $verdadero ;
      }
      else {
          return $falso ;
      }
  }

  function Confirmar($msg)
  { ?>
  <script>confirm('<? echo $msg; ?>');</script>
  <? }


   function irPagina($aplicacion,$modulo)
  { ?>
  <script>
      var ruta='http://'+window.location.host;
      pagina=ruta+"/contabilidadpresupuesto/aplicaciones/<? echo $aplicacion; ?>/<? echo $modulo; ?>";
      window.open(pagina,'<? echo $modulo; ?>',"menubar=no,toolbar=no,scrollbars=yes,width=800,height=600,resizable=yes,left=1000,top=80");

  </script>
  <? }

?>

