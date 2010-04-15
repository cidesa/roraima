<?
session_start();
if (empty($_SESSION["x"]))
{
  ?>
  <script language="JavaScript" type="text/javascript">
      location=("http://"+window.location.host+"/autenticacion_dev.php/login");
  </script>
  <?
}

require_once($_SESSION["x"].'adodb/adodb-exceptions.inc.php');
require_once($_SESSION["x"].'lib/bd/basedatosAdo.php');
require_once($_SESSION["x"].'lib/general/funciones.php');
require_once($_SESSION["x"].'lib/general/tools.php');
validar(array(8,11,15));            //Seguridad  del Sistema
$codemp=$_SESSION["codemp"];
$bd=new basedatosAdo($codemp);
$tools= new tools();

$modulo="";
$forma="Solicitud-Conformación-Autorización y Aprobación de Traslados";
$modulo=$_SESSION["modulo"] . " >  Ejecución Presupuestaria > ".$forma;
Limpiar();
 //limpóar datos  del movimiento
 $i=1;
 while ($i<=20)
 {
     $_POST["x".$i."1"]= "";
     $_POST["x".$i."2"]= "";
     $_POST["x".$i."3"]= number_format(0,2,'.',',');
     $i=$i +1;
 }
//CARGAR MASCARA
  $sql="SELECT *, to_char(fecini,'dd/mm/yyyy') as fecini, to_char(feccie,'dd/mm/yyyy') as feccie,
    to_char(fecini,'yyyy') as anoinicio, to_char(feccie,'yyyy') as anocierre, nivdis
    from cpdefniv where codemp='001'";
  $tb=$bd->select($sql);
  if (!$tb->EOF)
  {
    $_SESSION["formato"]=$tb->fields["forpre"];
    $numper=$tb->fields["numper"];
    $fechainicio=$tb->fields["fecini"];
    $fechacierre=$tb->fields["feccie"];
    $anoinicio=$tb->fields["anoinicio"];
    $anocierre=$tb->fields["anocierre"];
    $prenivdis=$tb->fields["nivdis"];
  }
  else
  {
    $_SESSION["formato"]="G";
  }
///////////////

$var=$_POST["var"];
 if (!empty($_GET["mod"])) {$mod=$_GET["mod"];}
 if (!empty($_POST["codigo"])) { $codigo=strtoupper(trim(str_pad($_POST["codigo"],8,'0',STR_PAD_LEFT)));  $var = ($codigo[2]!='#') ? ('9') : $_POST["var"]; }
$block="N";

///////////////// BARRA DE MENU /////////////////
    if ($var=='1')
      {
        if ($tb=$tools->primerRegistro('CPSolTrasla','reftra'))
        {
          $codigo=strtoupper(trim($tb->fields["reftra"]));
          $var=9;   //Para que haga la busqueda
        }
      }
    else if ($var=='2') //Anterior
      {
        if (!empty($codigo))
        {
            $aux=$codigo;
            //chekeamos q no sea el primero
          $tb=$tools->primerRegistro('CPSolTrasla','reftra');
          $codigo=strtoupper(trim($tb->fields["reftra"]));
          if ($aux==$codigo)
          {
            $tb=$tools->ultimoRegistro('CPSolTrasla','reftra');
               $codigo=strtoupper(trim($tb->fields["reftra"]));
              $var=9;   //Para que haga la busqueda
          }
          else
          {
            $tb=$tools->anteriorRegistro('CPSolTrasla','reftra',$aux,'N');
            $codigo=strtoupper(trim($tb->fields["reftra"]));
            $var=9;   //Para que haga la busqueda
          }
        }
        else
        {
          $tb=$tools->ultimoRegistro('CPSolTrasla','reftra');
          $codigo=strtoupper(trim($tb->fields["reftra"]));
          $var=9;   //Para que haga la busqueda
        }
      }
    else if ($var=='3') //PROXIMO
      {
        if (!empty($codigo))
        {
            $aux=$codigo;
            //chekeamos q no sea el ultimo
          $tb=$tools->ultimoRegistro('CPSolTrasla','reftra');
          $codigo=strtoupper(trim($tb->fields["reftra"]));
          if ($aux==$codigo)
          {
            $tb=$tools->primerRegistro('CPSolTrasla','reftra');
               $codigo=strtoupper(trim($tb->fields["reftra"]));
              $var=9;   //Para que haga la busqueda
          }
          else
          {
            $tb=$tools->proximoRegistro('CPSolTrasla','reftra',$aux,'N');
            $codigo=strtoupper(trim($tb->fields["reftra"]));
            $var=9;   //Para que haga la busqueda
          }
        }
        else
        {
          $tb=$tools->primerRegistro('CPSolTrasla','reftra');
          $codigo=strtoupper(trim($tb->fields["reftra"]));
          $var=9;   //Para que haga la busqueda
        }
      }
    else if ($var=='4')
      {
        if ($tb=$tools->ultimoRegistro('CPSolTrasla','reftra'))
        {
          $codigo=strtoupper(trim($tb->fields["reftra"]));
          $var=9;   //Para que haga la busqueda
        }
      }
    //////////////// FIN MENU ////////////////
    if ($var=='9'){
      //////  Busqueda por codigo del proyecto  ////////
      $imec='I';
      if  (!empty($codigo))
      {
        $tb='';
          //$codigo=strtoupper(trim(str_pad($codigo,8,'0',STR_PAD_LEFT)));
          $sql="select a.*,to_char(a.fectra,'dd/mm/yyyy') as  fectra,to_char(a.fecpre,'dd/mm/yyyy') as  fecpre,to_char(a.fecanu,'dd/mm/yyyy') as  fecanu,
               to_char(a.feccont,'dd/mm/yyyy') as feccont,  to_char(a.feccon,'dd/mm/yyyy') as feccon  ,to_char(a.fecgob,'dd/mm/yyyy') as  fecgob,
               to_char(a.fecniv4,'dd/mm/yyyy') as  fecniv4, to_char(a.fecniv5,'dd/mm/yyyy') as  fecniv5, to_char(a.fecniv6,'dd/mm/yyyy') as  fecniv6 From CPSolTrasla as a , cpartley b Where a.codart=b.codart and reftra = '".$codigo."' ";

          $tb=$bd->select($sql);

          if (!$tb->EOF)
          {
            $btnAprobar = "S";
            $desc    = $tb->fields["destra"];
            $periodo = $tb->fields["pertra"];
            $fecha   = $tb->fields["fectra"];

          //	$desart  = $tb->fields["desart"];
        // echo  	$stacon  = $tb->fields["stacon"];
        // echo  	$stapre  = $tb->fields["stapre"];
       //  echo  	$stagob  = $tb->fields["stagob"];

            if (trim($tb->fields["feccont"])!="")
            {
             $feccont=$tb->fields["feccont"];
            }

            $codart=$tb->fields["codart"];
            if (!empty($codart)) {Mostrar_DatosArt($codart); }

            //$stapre=$tb->fields["stapre"];
            $fecpre=$tb->fields["fecpre"];
            $despre=$tb->fields["despre"];
            $justificacion=$tb->fields["justificacion"];
            $tipo=strtoupper($tb->fields["tipo"]);
            $tipgas=strtoupper($tb->fields["tipgas"]);
            $fecanu=$tb->fields["fecanu"];
            $status = $tb->fields["statra"];

            if (strtoupper($status)=="N")
            {
               $estado="Anulado el ".$fecanu;
            }else{
              $estado = Mostrar_status();
            }

            /*
            else //if (trim($status)=="N")
            {
                 if (trim($stapre)=="")
              {
                $estado= "Elaborado el ". $fecha;
              }
              else if (strtoupper(trim($stapre))=="S")
              {
                $estado= "Conformado por Presupuesto el  ". $tb->fields["fecpre"];
              }
              else if (strtoupper(trim($stapre))=="N")
              {
                $estado= "No Aprobado";
                // Deshabilitar boton de aprobado
                $btnAprobar="N";
              }
            } //if (trim($status)=="N")
            */

          $sql = "select * from cpartley where codart = '".$codart."' ";
          $tb  = $bd->select($sql);
          if (!$tb->EOF)
           {
             $desart = $tb->fields["desart"];
             $stacon = $tb->fields["stacon"];
             $stapre = $tb->fields["stapre"];
             $stagob = $tb->fields["stagob"];
             $staniv4 = $tb->fields["staniv4"];
             $staniv5 = $tb->fields["staniv5"];
             $staniv6 = $tb->fields["staniv6"];
           }

            //Verificar si esta solicitud  ha sido pasada a traslado, para deshabilitar el grid  y todos las cajas de texto
            $sql="SELECT * FROM CPTRASLA WHERE  trim(reftra) = '".trim($codigo)."' ";
            $tb=$bd->select($sql);
            if (!$tb->EOF)
             {
              $block="S";  //desabilita los botones de aprobacion entre otras cosas
              $statra = iif($status=$tb->fields["statra"]=='A','A','');

              // Deshabilitar boton de aprobado
               $btnAprobar="N";
             }
             else
             {
              $block="N";
              //$statra="";
             }
             //cargar datos  movimientos traslados  (grid)
              //cargar datos
             $pos=1;
             $sqldet="Select * From CPSolMovTra Where trim(RefTra)='".trim($codigo)."' ORDER BY CodOri";
             $tb2=$bd->select($sqldet);
             while (!$tb2->EOF)
             {
                 $_POST["x".$pos."1"]= $tb2->fields["codori"];
                 $_POST["x".$pos."2"]= $tb2->fields["coddes"];
                 $_POST["x".$pos."3"]= $tb2->fields["monmov"];
                $tb2->MoveNext();
                $pos=$pos+1;
             }
             ///////////////////////////////////////////

            $ModoConsulta='S';
            $imec='M';
            //verificar si se puede eliminar
             if (Verificar_Dependencias($codigo))
             {
                $Eliminar='N';
             }
/*
			//Se coloco esto, ya que,
			//no se va a validar una solicitud
			//cuando no se ha aprobado
			//strpos($estado,'Elaborado');
             else  if ( (strpos($estado,'Elaborado')===false	) and (Verificar_Disponibilidad()==false) )
             {
               $Eliminar='N';
             }*/
           }//if (!$tb->EOF)
          else
           {
            $aux = substr($codigo,2);
            $aux = "TR".$aux;
            $sql = "select * from cpprecom where trim(refprc) = '".trim($aux)."' ";
            $tb  = $bd->select($sql);
             if (!$tb->EOF)
            {
              Mensaje("El Codigo ya se encuentra asignado a un Movimiento (PreCompromiso).");
              $codigo="";
              $mod="";
          }
          }
        }//si no esta vacio codigo
    }




  function Mostrar_status()
  {
  global $tb;
  global $bd;
  global $abrstacon;
  global $abrstapre;
  global $abrstagob;
  global $abrstaniv4;
  global $abrstaniv5;
  global $abrstaniv6;
  $estatus2='';

          $sql = "select * from cpdefapr";
          $tb2  = $bd->select($sql);
          if (!$tb2->EOF)
           {
             $des_stacon  = $tb2->fields["stacon"];
             $des_stapre  = $tb2->fields["stapre"];
             $des_stagob  = $tb2->fields["stagob"];
             $des_staniv4  = $tb2->fields["staniv4"];
             $des_staniv5  = $tb2->fields["staniv5"];
             $des_staniv6  = $tb2->fields["staniv6"];
             $abrstapre   = $tb2->fields["abrstapre"];
             $abrstacon   = $tb2->fields["abrstacon"];
             $abrstagob   = $tb2->fields["abrstagob"];
             $abrstaniv4  = $tb2->fields["abrstaniv4"];
             $abrstaniv5  = $tb2->fields["abrstaniv5"];
             $abrstaniv6  = $tb2->fields["abrstaniv6"];

           }

  if ($tb->fields["stacon"] == "" and $tb->fields["stagob"] == "" and $tb->fields["stapre"] == ""  ){
       $estatus2 = "Elaborado el ".$tb->fields["fectra"];
  }

  if ($tb->fields["stacon"] == "" and $tb->fields["stagob"] == "" and $tb->fields["stapre"] == "S"  ){
       $estatus2 = "Conformado por ".$des_stapre." el ".$tb->fields["fecpre"];
  }

  if ($tb->fields["stacon"] == "" and $tb->fields["stagob"] == "S" and $tb->fields["stapre"] == ""  ){
       $estatus2 = "Conformado por ".$des_stagob." el ".$tb->fields["fecgob"];
  }

  if ($tb->fields["stacon"] == "S" and $tb->fields["stagob"] == "" and $tb->fields["stapre"] == ""  ){
       $estatus2 = "Conformado por ".$des_stacon." el ".$tb->fields["feccon"];
  }

  if ($tb->fields["stacon"] == "S" and $tb->fields["stagob"] == "" and $tb->fields["stapre"] == "S"  ){
       $estatus2 = "Conformado por ".$des_stapre." el ".$tb->fields["fecpre"]." Aprobado por el ".$des_stacon." el ".$tb->fields["feccon"];
  }

  if ($tb->fields["stacon"] == "" and $tb->fields["stagob"] == "S" and $tb->fields["stapre"] == "S"  ){
       $estatus2 = "Conformado por ".$des_stapre." el ".$tb->fields["fecpre"].", Autorizado por ".$des_stagob." el ".$tb->fields["fecgob"];
  }

  if ($tb->fields["stacon"] == "S" and $tb->fields["stagob"] == "S" and $tb->fields["stapre"] == ""  ){
       $estatus2 = "Autorizado por ".$des_stagob." el  ".$tb->fields["fecgob"].", Conformado por ".$des_stacon." el ".$tb->fields["feccon"];
  }

  if ($tb->fields["stacon"] == "S" and $tb->fields["stagob"] == "S" and $tb->fields["stapre"] == "S"  ){
       $estatus2 = "Conformado por ".$des_stapre." el ".$tb->fields["fecpre"].", Autorizado por ".$des_stagob." el  ".$tb->fields["fecgob"].", Aprobado por ".$des_stacon." el ".$tb->fields["feccon"];
  }

  if ($tb->fields["staniv4"] == "S"){
    $estatus2 = $estatus2.", Conformado por ".$des_staniv4." el ".$tb->fields["fecniv4"];
  }
  if ($tb->fields["staniv5"] == "S"){
    $estatus2 = $estatus2.", Conformado por ".$des_staniv5." el ".$tb->fields["fecniv5"];
  }
  if ($tb->fields["staniv6"] == "S"){
    $estatus2 = $estatus2.", Conformado por ".$des_staniv6." el ".$tb->fields["fecniv6"];
  }


  if ($tb->fields["stacon"] == "N" or $tb->fields["stagob"] == "N" or $tb->fields["stapre"] == "N" or $tb->fields["staniv4"] == "N" or $tb->fields["staniv5"] == "N" or $tb->fields["staniv6"] == "N"){
    //echo $tb->fields["stacon"];
       $estatus2 = "NO APROBADO";
  }

  return $estatus2;
  }


  function Mostrar_DatosArt($codigo)
  {
    global $bd;
    global $tools;
    global $desart;

    $codigo= strtoupper(trim($codigo));
    try
      {
         $sql="Select * From CPArtLey Where CodArt ='".$codigo."' ";
        if ($tb=$tools->buscar_datos($sql))
        {
          $desart=$tb->fields["desart"];
        }
        else
        {
          $desart="";
          Mensaje("El Articulo de Ley no esta Definido");
          $foco="codart";
        }
       }  // try
    catch(Exception $e)
      {
          print "Excepcion Obtenida: ".$e->getMessage()."\n";
          return false;
      }
  }

  function Limpiar()
  {
    global $desc;
    global $feccont;
    global $codart;
    global $desart;
    global $estado;
    global $justificacion;
    global $tipo;
    global $tipgas;
    global $btnAprobar;
    $desc="";
    $feccont="";
    $codart="";
    $desart="";
    $estado="";
    $justificacion="";
    $tipo="";
    $tipgas="";
    $btnAprobar="N";
    }

   function Verificar_Dependencias($codigo)
  {
    global $bd;
    global $tools;
    global $Msj;

    $codigo= strtoupper(trim($codigo));
    try
      {
           $sql="SELECT * FROM CPTRASLA WHERE REFTRA='".$codigo."' ";
        if ($tb=$tools->buscar_datos($sql))
        {
          $Msj="La Solicitud no puede ser eliminada, ya generó un Traslado";
          return true;
        }
        else
        {
          return false;
          } //else
      }  // try
    catch(Exception $e)
      {
          print "Excepcion Obtenida: ".$e->getMessage()."\n";
          return false;
      }
  }


  function Verificar_Disponibilidad()
  {
    global $bd;
    global $tools;
    global $Msj;

    try
      {
            //////////Verificar disponibilidad para poder eliminar //////////////////////////////////////////////////////////////////////////
        $VerDispon="S";
        $Msj="";
        $i=1;
        while ($i<=20)
        {
          if ((trim($_POST["x".$i."1"])!="")  and (trim($_POST["x".$i."2"])!="") and (number_format($_POST["x".$i."3"],2,'.',',')!= number_format(0,2,'.',',')) )
          {
              $sql="select mondis from cpasiini where trim(codpre)='".trim($_POST["x".$i."2"])."'  and perpre='00'";
              if ($tb=$tools->buscar_datos($sql))
              {
                $MonDis=$tb->fields["mondis"];
                $MonTra=(float)(str_replace(',','',$_POST["x".$i."3"]));
                if ($MonDis < $MonTra)
                {
                  $VerDispon="N";
                  $Msj="NO se puede Eliminar ó Anular el Traslado. El Monto Disponible de la Partida " . trim($_POST["x".$i."2"]) . " es de " . number_format($MonDis,2,'.',',') .". Al Disminuirla por el Monto del Traslado quedaría Negativa.";
                  $i=21;
                }//if ($MonDis < $_POST["x".$i."3"])
              }	// if ($tb=$tool->buscar_datos($sql))
              else
              {
                $VerDispon="N";
                $Msj="La Partida " . trim($_POST["x".$i."2"]) . " no se encuentra en la Base de Datos. Por Favor Verifique";
                $i=21;
              }//else  if ($tb=$tool->buscar_datos($sql))

              $i=$i+1;
          } //if ((trim($_POST["x".$i."1"])!="")  and (trim($_POST["x".$i."2"])!="") and (number_format($_POST["x".$i."3"],2,'.',',')!= number_format(0,2,'.',',')) )
          else
          {
            $i=21;
          }
        } //while

        if ($VerDispon=="N")
        {
          return false;
        }
        else
        {
          return true;
        }

      }  // try
    catch(Exception $e)
      {
          print "Excepcion Obtenida: ".$e->getMessage()."\n";
          return false;
      }
  }

?>
<script>
     function  actualizarsaldos2()
      {
       f=document.form1;
      i=1;
      var acum3=0;
      while (i<=20)
      {
        var x3="x"+i+"3";
        str3= document.getElementById(x3).value.toString();
        str3= str3.replace(',','');
        str3= str3.replace(',','');
        str3= str3.replace(',','');

        var num3=parseFloat(str3);

        acum3=acum3+num3;

        document.getElementById(x3).value=format(num3.toFixed(2),'.','.',',');
        i=i+1;
      }
      document.form1.totmon.value=format(acum3.toFixed(2),'.','.',',');
     }
</script>
<!-- DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd"-->
<html>
<head>
<title><? echo $forma; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK media=all href="../../lib/css/base.css" type=text/css rel=stylesheet>
<link href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
<link href="../../lib/css/estilos.css" rel="stylesheet" type="text/css">
<link rel="STYLESHEET" type="text/css"  href="../../lib/general/toolbar/css/dhtmlXToolbar.css">
<link  href="../../lib/css/datepickercontrol.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" TYPE="text/css" MEDIA="screen" href="../../lib/css/tabber.css">

<script language="JavaScript"  src="../../lib/general/js/fecha.js"></script>
<script language="JavaScript"  src="../../lib/general/js/datepickercontrol.js"></script>
<script language="JavaScript"  src="../../lib/general/toolbar/js/dhtmlXProtobar.js"></script>
<script language="JavaScript"  src="../../lib/general/toolbar/js/dhtmlXToolbar.js"></script>
<script language="JavaScript"  src="../../lib/general/toolbar/js/dhtmlXCommon.js"></script>
<script type='text/javascript' src='../../lib/general/js/dFilter.js'></script>
<script type="text/javascript" src="../../lib/general/js/funciones.js"></script>
<script type="text/javascript" src="../../lib/general/js/tabber.js"></script>
<script type="text/JavaScript" src="../../lib/general/js/prototype.js"></script>

<style type="text/css">
<!--
.migrid {
  color: #00000;
  width: 530px;
  height: 106px;
  /*overflow: auto;*/
  overflow:scroll;
  background-color: #FFFFFF;
}
-->
</style>

</head>

<body>
<form name="form1" method="post" action="">
<table width="100%" align="center">
  <tr>
<td width="100%">
      <? require_once('../../lib/general/top_p.php'); ?>
    </td>
  </tr>
</table>
<table width="584" align="center">
<tr>
<td>
<table width="100%" height="175" border="0" class="box">
  <!--DWLayoutTable-->
  <tr>
            <td height="20" valign="top" class="breadcrumb">SIGA<? echo $modulo; ?>
</td>
  </tr>
   <tr>
   <td>
    <table width="100%" class="recuadro">
      <tr>
         <td align="center" width="7%">
          <!-- a href='javascript: primero();'><img src="../../images/1.GIF" width="13" height="13"--></a>
          <!-- a href='javascript: anterior();'><img src="../../images/2.GIF" width="13" height="13"--></a>
          <!-- a href='javascript: siguiente();'><img src="../../images/3.GIF" width="13" height="13"--></a>
          <!-- a href='javascript: ultimo();'><img src="../../images/4.GIF" width="13" height="13"--></a>
          <!--<input type="button" name="Button" value="|&lt;" onClick="primero()">
          <input type="button" name="Submit2" value="&lt;&lt;" onClick="anterior()">
          <input type="button" name="Submit3" value="&gt;&gt;" onClick="siguiente()">
          <input type="button" name="Submit4" value="&gt;|" onClick="ultimo()">-->
        </td>
        <td align="left" width="42%">
        <? if ((strtoupper($status)!="N") and ($block!="S")){ ?>
            <? if ($stapre=='S') { ?><input name="AprSolP"  type="button" class="important" id="AprSolP"  value="<? echo $abrstapre;  ?>" onClick="Aprobar_Solicitud('P');" > <?  } ?>
            <? if ($stagob=='S') { ?><input name="AprSolG"  type="button" class="important" id="AprSolG"  value="<? echo $abrstagob;  ?>" onClick="Aprobar_Solicitud('G');" > <?  } ?>
            <? if ($stacon=='S') { ?><input name="AprSolC"  type="button" class="important" id="AprSolC"  value="<? echo $abrstacon;  ?>" onClick="Aprobar_Solicitud('C');" > <?  } ?>
            <? if ($staniv4=='S'){ ?><input name="AprSolN4" type="button" class="important" id="AprSolN4" value="<? echo $abrstaniv4; ?>" onClick="Aprobar_Solicitud('N4');" > <? } ?>
            <? if ($staniv5=='S'){ ?><input name="AprSolN5" type="button" class="important" id="AprSolN5" value="<? echo $abrstaniv5; ?>" onClick="Aprobar_Solicitud('N5');" > <? } ?>
            <? if ($staniv6=='S'){ ?><input name="AprSolN6" type="button" class="important" id="AprSolN6" value="<? echo $abrstaniv6; ?>" onClick="Aprobar_Solicitud('N6');" > <? } ?>
        <? } ?>
            </td>
          <td align="right" width="61%">
          <?  // MENU PRINCIPAL  // ?>
          <div  align="center" id="toolbar_zone2" style="border :0px solid Silver;"/>
        </td>
      </tr>
    </table>
  </td>
   </tr>
      <tr>
            <td colspan="2" class="box" >
            <table width="100%" border="0" class="bodyline">
            <tr>
                            <td height="10" colspan="3">
              <div align="center"><strong><font color="#FF0000" size="2" face="Verdana, Arial, Helvetica, sans-serif">
              <? print  $estado;?>
              </font></strong></div>
               </td>
                </tr>
                          <tr>
                            <td colspan="3">
                              <fieldset>
                              <legend>Datos de la Solicitud de Traslado </legend>
                              <table width="100%" border="0">
                                <tr>
                                  <td>&nbsp;</td>
                                  <td>Referencia:</td>
                                  <td>
                     <? if (($ModoConsulta=='S')  or ($mod=='I'))   { ?>
                    <input name="codigo" type="text" class="imageninicio2" id="codigo" value="<? print $codigo;?>" size="8" maxlength="8" readonly="true">
                      <? } else {?>
                    <input name="codigo" type="text" class="imagenInicio" id="codigo" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" onKeyPress="buscarenter(event)" value="<? print $codigo;?>" size="8" maxlength="8" onblur="if (document.getElementById('codigo').value!=''){ document.getElementById('codigo').value=document.getElementById('codigo').value.pad(8,'0',0); document.getElementById('var').value='9'; document.form1.submit(); }else{ document.getElementById('codigo').value=document.getElementById('codigo').value.pad(8,'#',0);  document.getElementById('var').value='9';  document.form1.submit();}">
                    <? } ?>
                  </td>
                                  <td colspan="2">&nbsp;</td>
                                  <input name="periodo" type="hidden" value="<?  print $periodo; ?>">
                                  <td width="62">&nbsp;</td>
                                  <td width="55">Fecha:</td>
                                  <td width="89">
                  <? if ($ModoConsulta=='S') { ?>
                     <input name="fecha" type="text" id="fecha" value="<? print $fecha;?>" size="10"  readonly="true" class="imagenInicio2">
                  <? } else { ?>
                  <input name="fecha" type="text"  class="imagenInicio" id="fecha" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $fecha;?>" size="10" onKeyUp = "this.value=formateafecha(this.value);" onBlur="validar_fecha()">
                  <? } ?>
                  </td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td valign="top">Descripci&oacute;n:</td>
                                  <td colspan="6"><? if ($block=='S') { ?>
                    <textarea name="desc" cols="79" rows="2" wrap="VIRTUAL" class="imagenInicio2" id="desc" readonly="true" ><? print $desc;?></textarea>
                     <? } else { ?>
                  <textarea name="desc" cols="79" rows="2" wrap="VIRTUAL" class="imagenInicio" id="desc" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" onKeyPress="focos(event,'codart')"><? print $desc;?></textarea>
                    <? } ?>
                </td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td colspan="7"><table width="100%" border="0">
                                    <tr>
                                      <td width="99">Art&iacute;culo/Ley</td>
                                      <td width="53"><? if ($block=='S') { ?>
                    <input name="codart" type="text" class="imagenInicio2" id="codart" value="<? print $codart;?>" size="4" maxlength="3" readonly="true" ></td>
                     <? } else { ?>
                    <input name="codart" type="text" class="imagenInicio" id="codart" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $codart;?>" size="4" maxlength="3" onKeyPress="enterA(event,'codart','desart','feccont')" >
                    <? } ?>
                                      <td width="43">
                    <? if ($block=='S') { ?>
                      <input name="Button" type="button" class="botton" value="..." readonly="true" >
                     <? } else { ?>
                     <input name="Button" type="button" class="botton" value="..." onClick="catalogoA('codart','desart','feccont','C');">
                     <? } ?>
                     </td>
                                      <td width="352"><div align="right">
                                        <input name="desart" type="text" class="imagenInicio2" id="desart" value="<? print $desart;?>" size="62"  readonly="true">
                                      </div></td>
                                    </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td colspan="7"><table width="100%" border="0">
                                    <tr>
                                      <td width="85">Motivo del Traspaso:</td>
                                      <td width="174"><? if ($block=='S') { ?>
                                        <select name="tipo" id="tipo" style="width:152px"  disabled="true" >
                      <? } else { ?>
                                        <select name="tipo" id="tipo" style="width:152px" onChange="document.form1.tipgas.focus()"  >
                      <? } ?>
                                          <option value="TRASLADO" <? if (trim($tipo)=="TRASLADO") {print "selected";}?>>TRASLADO</option>
                                          <option value="INSUBSISTENCIA" <? if (trim($tipo)=="INSUBSISTENCIA") {print "selected";}?>>INSUBSISTENCIA</option>
                                          <option value="REDUCCION" <? if (trim($tipo)=="REDUCCION") {print "selected";}?>>REDUCCION</option>
                                          <option value="RECURSOS ADICIONALES" <? if ($tipo=="RECURSOS ADICIONALES") {print "selected";}?>>RECURSOS ADICIONALES</option>
                                        </select>
                                      </td>
                                      <td width="202">Fecha env&iacute;o para Aprobaci&oacute;n:</td>
                                      <td width="86"><div align="right">
                    <? if ($block=='S') { ?>
                      <input name="feccont" type="text"  class="imagenInicio2" id="feccont"  value="<? print $feccont;?>" size="10"  readonly="true">
                    <? } else { ?>
                    <input name="feccont" type="text"  class="imagenInicio" id="feccont" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $feccont;?>" size="10" onKeyUp = "this.value=formateafecha(this.value);" onBlur=" if (compareDate2(document.form1.fecha.value,document.form1.feccont.value)==1){ alert('La fecha debe ser mayor o igual a la fecha de la solicitud.'); }else{ document.form1.tipo.focus(); }">
                   <? } ?>

                                      </div></td>
                                    </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td width="1">&nbsp;</td>
                                  <td width="94">&nbsp;Tipo Gasto: </td>
                                  <td width="180"><? if ($block=='S') { ?>
                                       <select name="tipgas" id="tipgas" style="width:152px" disabled="true">
                      <? } else { ?>
                                       <select name="tipgas" id="tipgas" style="width:152px"  >
                      <? } ?>
                    <option value="CORRIENTE" <? if (trim($tipgas)=="CORRIENTE") {print "selected";}?>>CORRIENTE</option>
                    <option value="CAPITAL" <? if (trim($tipgas)=="CAPITAL") {print "selected";}?>>CAPITAL</option>

                                  </select>
                  </td>
                                  <td width="53">&nbsp;</td>
                                  <td colspan="4">&nbsp;</td>
                                </tr>
                              </table>
                            </fieldset>
              </td>
                          </tr>
                          <tr>
              <table width='100%' border='0' class="bodyline" cellpadding="0" cellspacing="0" >
              <tr>
                              <td width="30%"><input name="formatras" id="formatras" type="radio" value="UU" checked>
                              Uno a Uno</td>
                              <td width="30%"><input name="formatras" id="formatras" type="radio" value="UV">
                              Uno a Varios </td>
                              <td width="20%"><input name="formatras"  id="formatras" type="radio" value="VU">
                                Varios a Uno </td>
              </tr>
              </table>
            </tr>
                          <tr>
                            <td colspan="3" valign="top" >
              <div class="tabber">
               <div class="tabbertab">
                <h2>Solicitud de Traslado</h2>
                <table width="580" height="180" border="0" cellpadding="0" cellspacing="0">
                 <tr>
                <td colspan="3">
                <table width="580" border="0" class="recuadro">
                <tr>
                  <td width="26" class="tpButtons">
                  <? if ($block!='S') {?>
                  <a href='javascript: catalogogrid("G");'><img src="../../lib/general/toolbar/imgs/iconNewNewsEntry.gif" width="16" height="16" border="0"></a>
                  <? } else {?>
                  <img src="../../lib/general/toolbar/imgs/iconNewNewsEntry.gif" width="16" height="16" border="0">
                  <? } ?>
                  </td>
                  <td width="500"  class="tpButtons">MOVIMIENTOS</td>
            </tr>
            <tr>
            <td colspan="4">
          <table border="0" cellpadding="0" cellspacing="0"  >
                    <tr valign="bottom" bgcolor="#ECEBE6">
                    <td height="1">
                      <div class="migrid" id="grid01">
                      <table  border="0" cellpadding="0" cellspacing="0">
                        <tr>
                        <td class="queryheader" >&nbsp;</td>
                        <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;&nbsp;Codigo Presup. Origen</td>
                        <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;&nbsp;Codigo Presup. Destino</td>
                        <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;&nbsp;Monto</td>
                        <!--td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;&nbsp;Disponibilidad</td-->
                        </tr>
                      <?
                      ////////   //////////
                     $i=1;
                  while ($i<=20)
                  {
                   ?>
                      <tr>
                        <td class="grid_line01_br"><input name="x<? print $i;?>0" type="txt" class="imagenborrar" id="x<? print $i;?>0" onClick="eliminar(<? print $i;?>,3)"  value="" size="1" onFocus="this.blur()" ></td>
                        <td  align="left" class="grid_line01_br"><input name="x<? print $i;?>1" id="x<? print $i;?>1" type="text" class="grid_txt01" size="28" onKeyDown="javascript:return dFilter (event.keyCode, this,'<?print $_SESSION["formato"];?>');" align="right"  value="<? print  $_POST["x".$i."1"];?>" onFocus="$('cajaactual').value='1';$('cajafoco').value='2';ColocarTituloPresupuestario(this.id,'1');" onBlur="enterGRID(event,this.id,'trash','x<? print $i;?>2');" ></td>
                        <td  align="left" class="grid_line01_br"><input name="x<? print $i;?>2" id="x<? print $i;?>2" type="text" class="grid_txt01" size="28" onKeyDown="javascript:return dFilter (event.keyCode, this,'<?print $_SESSION["formato"];?>');" align="right"  value="<? print  $_POST["x".$i."2"];?>" onFocus="$('cajaactual').value='2';$('cajafoco').value='3';ColocarTituloPresupuestario(this.id,'2');" onBlur="enterGRID(event,this.id,'trash','x<? print $i;?>3');" ></td>
                        <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>3" id="x<? print $i;?>3" type="text" class="grid_txt02" size="15" value="<? if (empty($_POST["x".$i."3"])) {print number_format(0,2,'.',',');}  else {print number_format($_POST["x".$i."3"],2,'.',',');}  ?>" align="right"  onKeyPress="entermonto(event,'x<? print $i;?>1',this.id,'x<? print $i+1;?>1')"></td>
            <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>4" id="x<? print $i;?>4" type="hidden" class="grid_txt02" size="6" value="" align="right"></td>
                        </tr>
                  <?
                  $i=$i+1;
                  }
                ?>
                  </table>
                  </div></td>
                </tr>
                </table>
            </td>
            </tr>
            <tr>
            <td height="100%" colspan="4"><table width="100%" border="0" align="right">
                    <tr class="queryheader">

                    <td width="418" align="center" class="tpHead">TOTAL
                     </td>
                    <td width="88">
                      <div align="right">
                      <input name="totmon" type="text" class="cajadetextosimple" id="totmon" size="15" readonly="true">
                      </div></td>
                    <td width="17">&nbsp;&nbsp;</td>
                    </tr>
                  </table></td>
                </tr>
              </table>
                </td>
                </tr>
              </table>
              </div>
              <div class="tabbertab">
                <h2>Justificación</h2>
                <table width="530" height="180" border="0" cellpadding="0" cellspacing="0">
                 <tr>
                <td colspan="3"><div align="center">
                <? if ($block=='S') { ?>
                    <textarea name="justificacion" cols="90" rows="10" wrap="PHYSICAL" class="imagenInicio2" id="justificacion " readonly="true"><? print $justificacion ;?></textarea>
                   <? } else { ?>
                         <textarea name="justificacion" cols="90" rows="10" wrap="PHYSICAL" class="imagenInicio" id="justificacion " onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" onKeyPress="focos(event,'codart')"><? print $justificacion ;?></textarea>
                  <? } ?>
                   </div></td>
                </tr>
              </table>
              </div>
              </div>							</td>
                          </tr>
              </table>
      </td>
  </tr>
  <tr>
            <td></td>
  </tr>
  <tr>
    <td class="breadcrumb"><span class="style13">Registro de <? echo $forma; ?>...</span></td>
                <input name="trash" type="hidden" id="trash">
          <input name="cajaactual" type="hidden" id="cajaactual" value="1">
           <input name="cajafoco" type="hidden" id="cajafoco" value="2">
           <input name="getf" type="hidden" id="getf" value="S">
           <? //cajas de textos oculatas para guardar los datos de aprobacion de la solicitud, para que al momento
             //de grabar, se actualicen tambien estos datos  ?>
           <input name="fecpre" type="hidden" id="fecpre" value="<? print $fecpre;?>">
           <input name="stapre" type="hidden" id="stapre" value="<? print $stapre;?>">
           <input name="despre" type="hidden" id="despre" value="<? print $despre;?>">
           <input type="hidden" name="var" id="var" />
  </tr>
</table>
  </tr>
</td>
</table>
 <?
if  (!empty($codigo))
{
   if ($block=="S")
   {
     $salvar='N';
   }
   else
   {
      $salvar='S';
    }

   if ($ModoConsulta=='S')
   {
     if ($block!='S')
     {
      ?>
        <script>
          document.form1.desc.focus();
          document.form1.desc.select();
        </script>
      <?
    }
   }
   else
   {
    ?>
      <script>
        document.form1.fecha.focus();
       </script>
    <?
   }

 }
else
{
 $salvar='N'
?>
  <script>
    document.form1.codigo.focus();
    document.form1.codigo.select();
   </script>
<?
}
?>
</form>
<? require_once('../../lib/general/bottom.php'); ?>
</body>
 <script>
    block='<? print $block;?>';
  if (block=="S")
  {
  bloquearGrip(3,20,0);
  }
  actualizarsaldos2();
</script>
<script language="JavaScript">


  function buscarenter(e)
      {
        if (e.keyCode==13)
    {
        f=document.form1;
      if (f.codigo.value!="")
      {
      //f.action="PreSolTrasla.php?var=<? echo '9'; ?>&mod=<? echo 'I' ?>";
      document.getElementById('var').value='9';
      f.submit();
      }
      }
     }

    function validar_fecha()
    {
      f=document.form1;
      fecha=document.getElementById('fecha').value;
      periodo=f.fecha.value.substring(3,5);
      if (fecha.length==10)
      {
        f=document.form1;
        ori="S";
        pagina="validar_fecha.php?fecha="+f.fecha.value+"&periodo="+periodo+"&origen="+ori;
        window.open(pagina,"validar","menubar=no,toolbar=no,scrollbars=no,width=50,height=50,resizable=yes,left=350,top=300");

      }
      else
      {
        if (fecha.length!=10)
          {
        //alert("Longitud de Fecha inválida");
        document.getElementById('fecha').value=mostrarfecha();
        document.getElementById('fecha').focus();
        }
      }

    }


    function enterA(e,id,donde,foco)
    {
      if (e.keyCode==13)
      {
       f=document.form1;
         if (f.codigo.value!="")
       {
        aux= document.getElementById('codart').value.toUpperCase();
        document.getElementById('codart').value=aux.toUpperCase();
        aux=aux.pad(3, "0",0);
        document.getElementById('codart').value=aux;
        if (aux!="")
        {
          cuantos='1';
          sql='select desart as campo1 from cpartley where trim(codart)=trim(�'+aux+'�) order by codart';
          pagina="gridatos.php?cuantos="+cuantos+"&id="+id+"&donde="+donde+"&foco="+foco+"&sql="+sql;
          window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=no,width=50,height=50,resizable=no,left=100,top=300");
        } //if (aux!="")
      } // if (f.codigo.value!="")
      }  //if (e.keyCode==13)
    }   //end function

     function catalogoA(c1,c2,fc,tipo)
     {
      f=document.form1;
      if (f.codigo.value!="")
      {
      campo=c1;
      campo2=c2;
      foco=fc;

      //sql='select codart as codigo,desart as descripcion from cpartley where upper(desart) like upper(�%�) order by codart';
      //pagina="catalogo2.php?campo="+campo+"&campo2="+campo2+"&sql="+sql+"&foco="+foco+"&tipo="+tipo;
      //window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=580,height=490,resizable=yes,left=50,top=50");

      var host = '<? echo $_SERVER["HTTP_HOST"]; ?>';
          pagina='http://'+host+'/herramientas_dev.php/generales/catalogo/metodo/Cpartley_Preartley/clase/Cpartley/frame/form1/obj1/'+campo+'/obj2/'+campo2+'/campo1/codart/campo2/desart/submit/false';
          window.open(pagina,"true","menubar=no,toolbar=no,scrollbars=yes,width=490,height=490,resizable=yes,left=500,top=80");

      }
     }


     function catalogogrid(tipo)
     {
     	var pagina='';
        var host = '<? echo $_SERVER["HTTP_HOST"]; ?>';

	      f=document.form1;

	      c1=f.cajaactual.value;
	      fc=f.cajafoco.value;
	      i=1;
	      while (i<=20)
	      {
	        var x="x"+i+c1;
	        if (document.getElementById(x).value=="")
	        {
	          if (i==1)
	          {
	            campo="x1"+c1;
	            foco="x1"+fc;
	            i=20;
	          }
	          else
	          {
	            campo=x;
	            foco="x"+i+fc;
	            i=20;
	          }
	        }
       	 i=i+1;
      }
      campo2='trash';
      //sql='select codpre as codigo, nompre as descripcion, case estatus when �I� then �INVERSION� else �GASTO� END  as tipo  from cpdeftit a, cpdefniv b where length(rtrim(a.codpre))= length(rtrim(b.forpre)) and upper(nompre) like upper(�%�) order by a.codpre';
      if (c1=='1')
      {
        //sql='select a.codpre as codigo, a.nompre as descripcion, case b.estatus when �I� then �INVERSION� else �GASTO� END  as tipo From cpasiini a, CPDEFTIT b Where upper(a.nompre) like upper(�%�) and  a.codpre=b.codpre and a.perpre=�00� and a.monasi>0  order by a.codpre';
    pagina='http://'+host+'/herramientas_dev.php/generales/catalogo/metodo/Presoltrasla_Cpasiini/clase/Cpasiini/frame/form1/obj1/'+campo+'/campo1/codpre/submit/false';

      }else{
        //sql='select a.codpre as codigo, a.nompre as descripcion, case b.estatus when �I� then �INVERSION� else �GASTO� END  as tipo From cpasiini a, CPDEFTIT b Where upper(a.nompre) like upper(�%�) and  a.codpre=b.codpre and a.perpre=�00�  order by a.codpre';
        pagina='http://'+host+'/herramientas_dev.php/generales/catalogo/metodo/Presoltrasla_Cpasiini2/clase/Cpasiini/frame/form1/obj1/'+campo+'/campo1/codpre/submit/false';

      }

      //pagina="catalogo2.php?campo="+campo+"&campo2="+campo2+"&sql="+sql+"&foco="+foco+"&tipo="+tipo;
      //window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=580,height=400,resizable=yes,left=50,top=50");

    if (pagina!=''){
        window.open(pagina,"true","menubar=no,toolbar=no,scrollbars=yes,width=490,height=490,resizable=yes,left=500,top=80");
    }
     }

     function enterGRID(e,id,donde,foco)
     {
      if ($F(id)!='')
      {

        // obtener fila actual
        if (parseInt(id.length)==3)
        {
          j=parseInt(id.substring(1,2));
        }
        else
        {
          j=parseInt(id.substring(1,3));
        }
        var x="x"+j+"1"
        var y="x"+j+"2"

        a=repetido2(id,donde);
        if (a==false)
        {
          r=document.getElementById(id).value.substring(0,1);//verificamos q no sean puras rayitas
          aux= document.getElementById(id).value;
          cadena=rayitasfc(aux);
          if ((aux!="") && (r!='-'))
          {
            cuantos='dossql';
            sql="select codpre as codigo, nompre as campo1 from cpdeftit where trim(codpre)= trim(�"+cadena+"�)";
            if ($F(y)!=''){  //Codigo Destino
                anocierre = ''   //Para que no validara el monto disponible
            	sql2="select * from cpasiini where trim(codpre)= trim(�"+cadena+"�) and perpre=�00�";
            }else{
                anocierre = '<? echo $anocierre;?>'
            	//sql2="select * from cpasiini where trim(codpre)= trim(�"+cadena+"�) and perpre=�00� and monasi>0";
            	sql2=cadena;
            }
            mensaje="El Título Presupuestario no tiene asignación Inicial";
            pagina="gridatos.php?cuantos="+cuantos+"&id="+id+"&donde="+donde+"&foco="+foco+"&sql="+sql+"&sql2="+sql2+"&mensaje="+mensaje+"&anocierre="+anocierre;
            window.open(pagina,"","menubar=no,toolbar=no,scrollbars=no,width=50,height=50,resizable=no,left=100,top=300");
          }
        }
      }
     }


     function rayitasfc(tira)
    {
        long=tira.length;
        i=1;
        if (long > 1)
        {
          i=long;
          while (i>0)
          {
            if ( (tira.charAt(i)=='0') || (tira.charAt(i)=='1') || (tira.charAt(i)=='2') || (tira.charAt(i)=='3') || (tira.charAt(i)=='4') || (tira.charAt(i)=='5') || (tira.charAt(i)=='6') || (tira.charAt(i)=='7') || (tira.charAt(i)=='8') || (tira.charAt(i)=='9'))
            {
              hasta=i+1;
              i=0;
            }
            i=i-1;
          }
        tira= tira.substring(0,hasta);
        return tira;
        }
    }


    function dispo(cod,id,donde,foco,row)
     {
        r=document.getElementById(cod).value.substring(0,1);//verificamos q no sean puras rayitas
         if ((document.getElementById(cod).value!="") && (r!='-') && (document.getElementById('getf').value=='S'))
      {
        cuantos="disptrasla";
        anocierre='<? print $anocierre;?>';
        prenivdis='<? print $prenivdis;?>';
        codigo=document.getElementById(cod).value;
        referencia=document.getElementById('codigo').value;
        monacu=Acumular_MontosPorCodigo(row);
        pagina="gridatos.php?cuantos="+cuantos+"&id="+id+"&monacu="+monacu+"&anocierre="+anocierre+"&prenivdis="+prenivdis+"&codigo="+codigo+"&referencia="+referencia;
        window.open(pagina,"","menubar=no,toolbar=no,scrollbars=no,width=50,height=50,resizable=no,left=300,top=300");
      }
     }

    function entermonto(e,cod,id,fc)
    {
      if (e.keyCode==13)
      {
        // obtener fila actual
        if (parseInt(id.length)==3)
        {
          j=parseInt(id.substring(1,2));
        }
        else
        {
          j=parseInt(id.substring(1,3));
        }
        var x="x"+j+"1"
        var y="x"+j+"2"

        //verificar que los cod. pres origen y destino esten informados
        if ((document.getElementById(x).value=="")  || (document.getElementById(y).value=="" ) )
        {
           document.getElementById(id).value='0.00';
           alert("Deben estar informados los Códigos Presupuestarios Origen y Destino")
           document.getElementById(x).focus;
           document.getElementById(x).select();
        }
        else
        {
          if (validarnumero(id)==true)
          {
            document.getElementById('getf').value='S'
            dispo(cod,id,'disp',fc,j);
            actualizarsaldos(e);
            focos(e,fc);
          }
          else
          {
            document.getElementById(id).value='0.00';
            document.getElementById(id).focus();
            document.getElementById(id).select();
          }
        }// else  datos en  blanco
      } //if (e.keyCode==13)
    } //end function



    function actualizarsaldos(e)
      {
    if (e.keyCode==13)
    {
       f=document.form1;
        i=1;
        var acum3=0;
        while (i<=20)
        {
          var x3="x"+i+"3";
          str3= document.getElementById(x3).value.toString();
          str3= str3.replace(',','');
          str3= str3.replace(',','');
          str3= str3.replace(',','');

          var num3=parseFloat(str3);

          acum3=acum3+num3;

          document.getElementById(x3).value=format(num3.toFixed(2),'.','.',',');
          i=i+1;
        }
        document.form1.totmon.value=format(acum3.toFixed(2),'.','.',',');
      }
       }


     function  ColocarTituloPresupuestario(id,c)
     {

     f=document.form1;
     if (parseInt(id.length)==3)
    {
      j=parseInt(id.substring(1,2));
    }
    else
    {
        j=parseInt(id.substring(1,3));
    }

     if (j!=1)
       {
         if ((f.formatras[1].checked) && (c=="1"))   //uno a varios  y la columna actual es la 1
         {
            j=j-1;
            var x="x"+j+"1";
            document.getElementById(id).value=document.getElementById(x).value
         }

         if ((f.formatras[2].checked) && (c=="2"))   //uno a varios  y la columna actual es la 2
         {
            j=j-1;
            var x="x"+j+"2";
            document.getElementById(id).value=document.getElementById(x).value
         }
       }
     }


     function repetido2(id,id2)
    {
    f=document.form1;
    chk="N";
    // obtener fila actual
    if (parseInt(id.length)==3)
    {
      j=parseInt(id.substring(1,2));
    }
    else
    {
        j=parseInt(id.substring(1,3));
    }


    val=document.getElementById(id).value;
    c1=f.cajaactual.value; //columnaactual
    if  (c1=="1") {c2="2";}
    if  (c1=="2") {c2="1";}
    var h="x"+j+c2;
    valdes=document.getElementById(h).value

    //Verifico primero que el título presupuestario no este repetido en la misma fila
     if ((val!="") && (valdes!=""))
     {
       if (val==valdes)
       {
         alert("El Título Presupuestario esta Repetido"),
         document.getElementById(id).value="";
         document.getElementById(id).focus();
         chk="S";
        return true;
       }
     }

    //se verifica que la combinación de codigos presupuestarios no este repetida en alguna otra fila
    if ((val!="") && (chk=="N"))
      {
          if (j!=1)
          {
            i=1;
             while (i<=20)
              {
                var x="x"+i+c1;
                var y="x"+i+c2;
                if (j!=i)
                {
                  if ((val==document.getElementById(x).value)  && (valdes==document.getElementById(y).value) )
                  {
                    document.getElementById(id).value="";
                    document.getElementById(id2).value="";
                    alert("El Movimiento esta Repetido en el Traslado");
                    document.getElementById(id).focus();
                    i=21;
                    chk="S";
                    return true;
                  }
                }
              i=i+1;
              }
          }
        }


      if (chk=="N")
      {
          //se verifica que el codigo presup. origen, no sea destino en algún otro movimiento
        if  (c1=="1")
        {
          if (Es_CodigoDestino(j))
           {
             return  true;
           }
          else
           {
            return false;
           }
        }//if  (c1=="1")

          //se verifica que el codigo presup. destino, no sea origen en algún otro movimiento
        if  (c1=="2")
        {
          if (Es_CodigoOrigen(j))
           {
             return  true;
           }
          else
           {
            return false;
           }
        }//if  (c1=="1")
      }//	if (chk=="N")
    } //end function


    function Es_CodigoDestino(row)
    {
      chk="N";
      var x="x"+row+"1";

         i=1;
         while (i<=20)
      {
        var y="x"+i+"2";
        if (document.getElementById(x).value == document.getElementById(y).value)
         {
           i=21;
         chk="S";
         document.getElementById(x).value="";
           alert("El Título Presupuestario no puede ser Origen del Movimiento");
         document.getElementById(x).focus();
         return true;
         }
        i=i+1;
       }

         if (chk=="N")
      {
        return false;
      }
    }


    function Es_CodigoOrigen(row)
    {
      chk="N";
      var x="x"+row+"2";

         i=1;
         while (i<=20)
      {
        var y="x"+i+"1";
        if (document.getElementById(x).value == document.getElementById(y).value)
         {
           i=21;
         chk="S";
          document.getElementById(x).value="";
         alert("El Título Presupuestario no puede ser Destino del Movimiento");
          document.getElementById(x).focus();
         return true;
         }
        i=i+1;
       }

         if (chk=="N")
      {
        return false;
      }
    }

    function Acumular_MontosPorCodigo(row)
    {
      var MontoporCodigo=0;
      var h="x"+row+"3";
      str= document.getElementById(h).value.toString();
      str= str.replace(',','');
      str= str.replace(',','');
      str= str.replace(',','');
      var MontoTraCod=parseFloat(str);

      var x="x"+row+"1";
      f=document.form1;
      i=1;
      while (i<=20)
      {
          if (i!=row)
         {
           var  y="x"+i+"1";
           if (document.getElementById(x).value == document.getElementById(y).value)
           {
                  var  aux="x"+i+"3";
            str3= document.getElementById(aux).value.toString();
            str3= str3.replace(',','');
            str3= str3.replace(',','');
            str3= str3.replace(',','');
            var monto=parseFloat(str3);
            MontoTraCod = MontoTraCod + monto
             }
        } //if (i!=row)
        i=i+1;
      }//while
      MontoporCodigo=MontoTraCod;
      return MontoporCodigo;
    }


     function eliminar(i,c)
       {
         f=document.form1;
	      var fila;
	      for (fila=i;fila<20;fila++)
	      {
	        for (col=0;col<=c;col++)
	        {
	          var x="x"+fila+col;
	          fila2=parseInt(fila)+1;
	          var y="x"+fila2+col;

	         if ($(y) )
             {
	          $(x).value=$(y).value;
	          if (col==3)
	          {
	            $(y).value="0.00";
	           }
	           else
	           {
	             $(y).value="" ;
	           }
	         }
	        }

	      }
	      //ultima fila
	      if (i==20)
	      {
	        for (col=0;col<=c;col++)
	        {
	          var x="x"+i+col;
	          var x="x"+i+col;
	          if (col==3)
	          {
	            document.getElementById(x).value="0.00";
	           }
	           else
	           {
	             document.getElementById(x).value="" ;
	           }
	        }

	      }//if (fila==20)
	      actualizarsaldos2()
	      $(cajaactual).value=1;
	      $(cajafoco).value=2;
     }

    function Aprobar_Solicitud(sw)
    {
      var status='<? echo $status; ?>';
      if (status=="N")
      {
         alert("Este Traslado no se puede Aprobar por que esta Anulado");

      }else{
//	      aprobar = '<? print $btnAprobar;?>';
  //      if (aprobar=='S')
    //    {
           if (f.codigo.value!="")
           {
             f   = document.form1;
             cod = f.codigo.value;
             imec = 'M';
             window.open("aprSolTrasla.php?codigo="+cod+"&sw="+sw+"&imec="+imec,"AprobarSolicitud","menubar=no,toolbar=no,scrollbars=no,width=600,height=240,resizable=no,left=200,top=200");
           } // if (f.codigo.value!="")
        // } //if (aprobar=='S')
      }
    }


      function cancelar()
       {
        location=("PreSolTrasla.php")
       }


       function verificar()
       {

      f=document.form1;
      if (TrimString(f.desc.value)=="")
      {
        alert("No puede salvar sin introducir Descripción del Traslado");
        return false;
      }
      else if (TrimString(f.fecha.value)=="")
      {
        alert("No puede salvar sin introducir la Fecha del Traslado");
        return false;
      }
      else if (TrimString(f.totmon.value)=="0.00")
      {
        alert("No puede salvar sin introducir el Monto del Traslado");
        return false;
      }
      else
      {
        return true;
      }

    }



    function onButtonClick(itemId,itemValue)// TOOLBAR
    {
      f=document.form1;

      //alert("Button "+itemId+" was pressed"+(itemValue?("\n select value : "+itemValue):""));
      if(itemId == '0_ojo'){
        alert("Usted vera una Consulta");
      }
      /////////////////////
      else if(itemId == '0_save')
      {
        save='<? print $salvar;?>';
        if (save=='S')
        {
          if(confirm("¿Realmente desea Salvar?"))
          {
            f=document.form1;
            if (verificar())
              {
                //  f.periodo.value=f.fecha.value.substring(3,5);
                  f.action="imecPreSolTrasla.php?imec=<? print $imec?>";
                  f.submit();
              }
          }
       }
      }
      //////////////////////////
      else if(itemId == '0_print'){
          print();
      }
      else if(itemId == '0_new'){

      }
      else if(itemId == '0_form'){

      }
      else if(itemId == '0_search'){
        consulta();
      }
      else if(itemId == '0_filter'){

      }
      else if(itemId == '0_cancelar'){
        if(confirm("¿Desea Cancelar la Transaccion?"))
        {
          cancelar();
        }
      }
      else if(itemId == '0_delete')
      {
        modoconsulta = "<? print $ModoConsulta?>";
        if (modoconsulta=='S')
          {
          status='<? echo $status; ?>';
          if (status=="N")
          {
             alert("El Traslado ya esta Anulado");
          }
          else
          {
            var eliminar = '<? echo $Eliminar; ?>';
            var msg      = '<? echo $Msj; ?>';
            var statra   = '<? echo $statra; ?>';
            if (eliminar=='N'){ alert(msg)}
            else if (statra=='A')
            {
                  alert('La Solicitud no puede ser eliminada, ya genero un Traslado.');
            }
            else{
              if(confirm("¿Esta seguro que desea Eliminar?"))
                {
                  //f=document.form1;
                  //f.periodo.value=f.cmbperiodo.options[f.cmbperiodo.selectedIndex].value;
                  //f.action="imecPreSolTrasla.php?imec=<? print "E"?>";
                  //f.submit();
                  f=document.form1;
                  codigo=f.codigo.value;
                  //f.periodo.value=f.cmbperiodo.options[f.cmbperiodo.selectedIndex].value;
                  f.periodo.value=f.fecha.value.substring(3,5);
                  ope='P';
                  fecpre=f.fecha.value;
                  window.open("anuPreSolTrasla.php?codigo="+codigo+"&fecpre="+fecpre+"&operacion="+ope,"AnularTraslado","menubar=no,toolbar=no,scrollbars=no,width=600,height=150,resizable=no,left=200,top=250");
                }
            }
          }//if (status=="N")
        }// if (modoconsulta=='S')

      }

      else if(itemId == '0_calc'){
        alert("llamando la calculadora");
      }
      else if(itemId == '0_calend'){
        alert("LLamando el Calendario");
      }
      else if(itemId == '0_salir'){
        window.close();
      }
    };


    aToolBar=new dhtmlXToolbarObject('toolbar_zone2','100%',16,"");
    aToolBar.setOnClickHandler(onButtonClick);
    aToolBar.loadXML("../../lib/general/_toolbarV1.xml")
    aToolBar.setToolbarCSS("toolbar_zone2","toolbarText3");
    aToolBar.showBar();

     function primero()
      {
      f=document.form1;
      //f.action="PreSolTrasla.php?var=<? print '1';?>";
      document.getElementById('var').value='1';
      f.submit();
     }
     function anterior()
      {
      f=document.form1;
      //f.action="PreSolTrasla.php?var=<? print '2';?>";
      document.getElementById('var').value='2';
      f.submit();
     }
     function siguiente()
      {
      f=document.form1;
      //f.action="PreSolTrasla.php?var=<? print '3';?>";
      document.getElementById('var').value='3';
      f.submit();
     }
     function ultimo()
      {
      f=document.form1;
      //f.action="PreSolTrasla.php?var=<? print '4';?>";
      document.getElementById('var').value='4';
      f.submit();
     }

      function consulta()
      {
          f=document.form1;
          $('var').value='9';
          //var campo2='desc';
          //var campo='codigo';
          //var foco='submit';
          //sql='Select reftra as Codigo, destra as Nombre from cpsoltrasla where upper(destra) like upper(�%�) order by reftra';
          //pagina="catalogo2.php?campo="+campo+"&campo2="+campo2+"&sql="+sql+"&foco="+foco;
          //window.open(pagina,"","menubar=no,toolbar=no,scrollbars=yes,width=570,height=500,resizable=yes,left=50,top=50");

      var host = '<? echo $_SERVER["HTTP_HOST"]; ?>';
          pagina='http://'+host+'/herramientas_dev.php/generales/catalogo/metodo/Cpsoltrasla_Presoltrasla/clase/Cpsoltrasla/frame/form1/obj1/codigo/obj2/desc/campo1/reftra/campo2/destra/var/9/submit/true';
          window.open(pagina,"true","menubar=no,toolbar=no,scrollbars=yes,width=490,height=490,resizable=yes,left=500,top=80");

     }


  </script>



</html>

