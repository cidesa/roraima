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
$forma="Traslados";
$modulo=$_SESSION["modulo"] . " > Ejecución Presupuestaria > ".$forma;
Limpiar();
 //limáar datos  del movimiento
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
    to_char(fecini,'yyyy') as anoinicio, to_char(feccie,'yyyy') as anocierre
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
if  (!empty($_GET["mod"])) {$mod=$_GET["mod"];}
 if (!empty($_POST["codigo"])) { $codigo=strtoupper(trim(str_pad($_POST["codigo"],8,'0',STR_PAD_LEFT)));}

///////////////// BARRA DE MENU /////////////////
    if ($var=='1')
      {
        if ($tb=$tools->primerRegistro('CPTrasla','reftra'))
        {
          $codigo=$codigo=strtoupper(trim($tb->fields["reftra"]));
          $var=9;   //Para que haga la busqueda
        }
      }
    else if ($var=='2') //Anterior
      {
        if (!empty($codigo))
        {
            $aux=$codigo;
            //chekeamos q no sea el primero
          $tb=$tools->primerRegistro('CPTrasla','reftra');
          $codigo=strtoupper(trim($tb->fields["reftra"]));
          if ($aux==$codigo)
          {
            $tb=$tools->ultimoRegistro('CPTrasla','reftra');
               $codigo=strtoupper(trim($tb->fields["reftra"]));
              $var=9;   //Para que haga la busqueda
          }
          else
          {
            $tb=$tools->anteriorRegistro('CPTrasla','reftra',$aux,'N');
            $codigo=strtoupper(trim($tb->fields["reftra"]));
            $var=9;   //Para que haga la busqueda
          }
        }
        else
        {
          $tb=$tools->ultimoRegistro('CPTrasla','reftra');
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
          $tb=$tools->ultimoRegistro('CPTrasla','reftra');
          $codigo=strtoupper(trim($tb->fields["reftra"]));
          if ($aux==$codigo)
          {
            $tb=$tools->primerRegistro('CPTrasla','reftra');
               $codigo=strtoupper(trim($tb->fields["reftra"]));
              $var=9;   //Para que haga la busqueda
          }
          else
          {
            $tb=$tools->proximoRegistro('CPTrasla','reftra',$aux,'N');
            $codigo=strtoupper(trim($tb->fields["reftra"]));
            $var=9;   //Para que haga la busqueda
          }
        }
        else
        {
          $tb=$tools->primerRegistro('CPTrasla','reftra');
          $codigo=strtoupper(trim($tb->fields["reftra"]));
          $var=9;   //Para que haga la busqueda
        }
      }
    else if ($var=='4')
      {
        if ($tb=$tools->ultimoRegistro('CPTrasla','reftra'))
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
        //	$codigo=strtoupper(trim(str_pad($codigo,8,'0',STR_PAD_LEFT)));
          $sql="Select *,to_char(fectra,'dd/mm/yyyy') as  fectra, to_char(fecanu,'dd/mm/yyyy') as fecanu
          From CPTrasla Where trim(reftra) = '".trim($codigo)."' ";
          $tb=$bd->select($sql);
          if (!$tb->EOF)
           {
            $periodo=$tb->fields["pertra"];
            $fecha=$tb->fields["fectra"];
            $desc=$tb->fields["destra"];
            $status=$tb->fields["statra"];

            if (strtoupper(trim($status))=="N")
            {
                if (trim($tb->fields["fecanu"])!="")
              {
               $estado="Anulado el " .$tb->fields["fecanu"];
              }
              else
              {
               $estado="Anulado";
                }
            }//if (strtoupper(trim($status))=="N")

             //cargar datos  movimientos traslados  (grid)

             $gridNomTitPre1=array();
             $gridNomTitPre2=array();
              //cargar datos
             $block="S";
             $pos=1;
             $sqldet="Select * From CPMovTra Where trim(RefTra)='".trim($codigo)."' ORDER BY CodOri";
             $tb2=$bd->select($sqldet);
             while (!$tb2->EOF)
             {
                   $_POST["x".$pos."1"]= $tb2->fields["codori"];
                 $gridNomTitPre1[$pos]= CargarNombre_CodPre($tb2->fields["codori"]);
                 $_POST["x".$pos."2"]= $tb2->fields["coddes"];
                 $gridNomTitPre2[$pos]= CargarNombre_CodPre($tb2->fields["coddes"]);
                 $_POST["x".$pos."3"]= $tb2->fields["monmov"];

                 //cargar datos del cod. presupuestario Nombre y Disponibilidad
                $tb2->MoveNext();
                $pos=$pos+1;
             }
             ///////////////////////////////////////////

            $ModoConsulta='S';
            $imec='M';
            //verificar si se puede eliminar
            if (Verificar_Disponibilidad()==false) { $Eliminar='N'; };

           }//if (!$tb->EOF)
          else //no existe el traslado, se verifica que exista la solicitud y se muestran sus datos
           {
            $sql = "Select *,to_char(feccon,'dd/mm/yyyy') as  feccon,to_char(fecpre,'dd/mm/yyyy') as  fecpre, to_char(fectra,'dd/mm/yyyy') as fectra From CPSolTrasla Where trim(RefTra) = '".trim($codigo)."' ";

            $tb=$bd->select($sql);
            if (!$tb->EOF)
            {
               $stapre=$tb->fields["stapre"];


               if (verificar($tb->fields["stacon"],$tb->fields["stapre"],$tb->fields["stagob"],$tb->fields["codart"],$tb)=='S')
               {
                  //Solicitud Aprobada, se muestran los datos de la solictud
                //Cargar_Solicitud
                /////////////////////////////////////////////////////////////////////////////////////////////
                $periodo=$tb->fields["pertra"];
                if (trim($tb->fields["fecpre"])!="")
                {
                   $fecha=$tb->fields["fecpre"];
                }
                else
                {
                  //$fecha=
                  $fecha=$tb->fields["fectra"];
                }//if (trim($tb->fields["feccon"])!="")
                $desc=$tb->fields["destra"];

                 //cargar datos  movimientos traslados  (grid)
                 $gridNomTitPre1=array();
                 $gridNomTitPre2=array();
                  //cargar datos
                 $block="S";
                 $pos=1;
                 $sqldet="Select * From CPSolMovTra Where trim(RefTra)='".trim($codigo)."' ORDER BY CodOri";
                 $tb2=$bd->select($sqldet);
                 while (!$tb2->EOF)
                 {
                     $_POST["x".$pos."1"]= $tb2->fields["codori"];
                     $gridNomTitPre1[$pos]= CargarNombre_CodPre($tb2->fields["codori"]);
                     $_POST["x".$pos."2"]= $tb2->fields["coddes"];
                     $gridNomTitPre2[$pos]= CargarNombre_CodPre($tb2->fields["coddes"]);
                     $_POST["x".$pos."3"]= $tb2->fields["monmov"];
                    $tb2->MoveNext();
                    $pos=$pos+1;
                 }
                 /////////////////////////////////////////////////////////////////////////////////////////////

               }
               else
              {
                 Mensaje("Esta Solicitud de Traslado no esta Aprobada");
                 $codigo="";
                 $mod="";
              }	// if (strtoupper(trim($stapre))=="S")
            }
            else
            {
               Mensaje("No Existe Esta Solicitud de Traslado");
               $codigo="";
               $mod="";
            }	//if (!$tb->EOF)
          } //else, no existe el  traslado
        }//si no esta vacio codigo
    }


   function verificar($stacon,$stapre,$stagob,$codart,$tb=array())
   {
       global $bd;
       //$z = new tool();
       $status = "S";

      $sql = "select * from cpartley where codart = '".$codart."' ";
      $tb2  = $bd->select($sql);
      if (!$tb2->EOF)
       {
         $stacon2 = $tb2->fields["stacon"];
         $stapre2 = $tb2->fields["stapre"];
         $stagob2 = $tb2->fields["stagob"];
         $staniv4  = $tb2->fields["staniv4"];
         $staniv5  = $tb2->fields["staniv5"];
         $staniv6  = $tb2->fields["staniv6"];
       }
    if ($stacon2=='S')
    {
      if (iif($stacon2==$stacon,'S','N')=='N'){ return 'N'; }
    }

    if ($stapre2=='S')
    {
      if (iif($stapre==$stapre,'S','N')=='N'){ return 'N'; }
    }

    if ($stagob2=='S')
    {
      if (iif($stagob2==$stagob,'S','N')=='N'){ return 'N'; }
    }

    if ($staniv4=='S')
    {
      if (iif($staniv4==$tb->fields["staniv4"],'S','N')=='N'){ return 'N'; }
    }

    if ($staniv5=='S')
    {
      if (iif($staniv5==$tb->fields["staniv5"],'S','N')=='N'){ return 'N'; }
    }

    if ($staniv6=='S')
    {
      if (iif($staniv6==$tb->fields["staniv6"],'S','N')=='N'){ return 'N'; }
    }

    $tb2->close();
    return $status;
   }

  function Limpiar()
  {
    global $desc;
    global $estado;
    global $block;
    global $status;
    global $nomcodpre;

    $desc="";
    $estado="";
    $block="S";
    $status="";
    $nomcodpre="";
    }

  function CargarNombre_CodPre($codpre)
  {
    global $bd;
    global $tools;

    $codpre= trim($codpre);
    try
      {
           $sql="Select nompre From cpdeftit where trim(codpre)='".$codpre."' ";
        if ($tb=$tools->buscar_datos($sql))
        {
          $NomCodPre=$tb->fields["nompre"];
          $sql="select mondis from cpasiini where trim(codpre)='".$codpre."'  and perpre='00'";
          if ($tb2=$tools->buscar_datos($sql))
          {
            $NomCodPre=$NomCodPre. ",  Disponibilidad:  ". number_format($tb2->fields["mondis"],2,'.',',');
          }
        }
        else
        {
          $NomCodPre="";
          } //else

        return $NomCodPre;
      }  // try
    catch(Exception $e)
      {
          print "Excepcion Obtenida: ".$e->getMessage()."\n";
          return "";
      }
  }

   function Verificar_Disponibilidad()
  {
    global $bd;
    global $tools;
    global $Msj;
    global $fechainicio;

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
                $MonDis = Monto_disponible_ejecucion(substr($fechainicio,6,4),trim($_POST["x".$i."2"]),'00');
                $MonTra=(float)(str_replace(',','',$_POST["x".$i."3"]));

                if ($MonDis < $MonTra)
                {
                  $VerDispon="N";
                  $Msj="NO se puede  � Anular el Traslado. El Monto Disponible de la Partida " . trim($_POST["x".$i."2"]) . " es de " . number_format($MonDis,2,'.',',') .". Al Disminuirla por el Monto del Traslado quedaría Negativa.";
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
<script type="text/JavaScript"  src="../../lib/general/js/prototype.js"></script>
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
            <td height="20" valign="top" class="breadcrumb">SIGA <? echo $modulo; ?>
</td>
  </tr>
   <tr>
   <td>
    <table width="100%" class="recuadro">
      <tr>
         <td align="center" width="27%">
          <!-- a href='javascript: primero();'><img src="../../images/1.GIF" width="13" height="13"--></a>
          <!-- a href='javascript: anterior();'><img src="../../images/2.GIF" width="13" height="13"--></a>
          <!-- a href='javascript: siguiente();'><img src="../../images/3.GIF" width="13" height="13"--></a>
          <!-- a href='javascript: ultimo();'><img src="../../images/4.GIF" width="13" height="13"--></a>
          <!--<input type="button" name="Button" value="|&lt;" onClick="primero()">
          <input type="button" name="Submit2" value="&lt;&lt;" onClick="anterior()">
          <input type="button" name="Submit3" value="&gt;&gt;" onClick="siguiente()">
          <input type="button" name="Submit4" value="&gt;|" onClick="ultimo()">-->
        </td>
        <td align="left" width="12%">
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
                              <legend>Datos del Traslado</legend>
                              <table width="100%" border="0">
                                <tr>
                                  <td width="1">&nbsp;</td>
                                  <td width="83">Referencia:</td>
                                  <td width="191">
                     <? if (($ModoConsulta=='S')  or ($mod=='I'))   { ?>
                    <input name="codigo" type="text" class="imageninicio2" id="codigo" value="<? print $codigo;?>" size="8" maxlength="8" readonly="true">
                      <? } else {?>
                    <input name="codigo" type="text" class="imagenInicio" id="codigo" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" onKeyPress="buscarenter(event)" value="<? print $codigo;?>" size="8" maxlength="8">
                    <? } ?>
                  </td>
                                  <td colspan="2">&nbsp;</td>
                                  <input name="periodo" type="hidden" value="<?  print $periodo; ?>">
                                  <td width="62">&nbsp;</td>
                                  <td width="50">Fecha:</td>
                                  <td width="94">
                  <?
                  if ($ModoConsulta=='S') { ?>
                     <input name="fecha" type="text" id="fecha" value="<? print $fecha;?>" size="10"  readonly="true" class="imagenInicio2">
                     <input name="fecha2" type="hidden" id="fecha2" value="<?  print $fecha; ?>">
                  <? } else { ?>
                    <input name="fecha" type="text"  class="imagenInicio" id="fecha" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $fecha;?>" size="10" maxlenght='10' onKeyUp = "this.value=formateafecha(this.value);" onBlur="validar_fecha();">
                     <input name="fecha2" type="hidden" id="fecha2" value="<?  print $fecha; ?>">
                  <? } ?>
                  </td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td valign="top">Descripci&oacute;n:</td>
                                  <td colspan="6"><textarea name="desc"  cols="64" rows="2" wrap="VIRTUAL" class="imagenInicio" id="desc" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'"><? print $desc;?></textarea>
                 </td>
                                </tr>
                              </table>
                            </fieldset>
              </td>
                          </tr>
                          <tr>
                            <td width="42%"><input name="formatras" id="formatras" type="radio" value="UU" checked>
                            Uno a Uno</td>
                            <td width="39%"><input name="formatras" id="formatras" type="radio" value="UV">
                            Uno a Varios </td>
                            <td width="19%"><input name="formatras"  id="formatras" type="radio" value="VU">
                              Varios a Uno </td>
                          </tr>
                          <tr>
                            <td colspan="3">
              <table width="545" height="180" border="0" cellpadding="0" cellspacing="0">
                 <tr>
                <td colspan="3">
                <table width="545" border="0" class="recuadro">
                <tr>
                  <td width="26" class="tpButtons">
                  <? if ($block!='S') {?>
                  <a href='javascript: catalogogrid("G");'><img src="../../lib/general/toolbar/imgs/iconNewNewsEntry.gif" width="16" height="16" border="0"></a>
                  <? } else {?>
                  <img src="../../lib/general/toolbar/imgs/iconNewNewsEntry.gif" width="16" height="16" border="0">
                  <? } ?>
                  </td>
                  <td width="500"  class="tpButtons">MOVIMIENTOS DEL TRASLADO </td>
            </tr>
            <tr>
            <td colspan="4">
          <table border="0" cellpadding="0" cellspacing="0">
                    <tr valign="bottom" bgcolor="#ECEBE6">
                    <td height="1">
                      <div class="migrid" id="grid01">
                      <table  border="0" cellpadding="0" cellspacing="0">
                        <tr>
                        <td class="queryheader" >&nbsp;</td>
                        <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;&nbsp;Codigo Presup. Origen</td>
                        <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;&nbsp;Codigo Presup. Destino</td>
                        <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;&nbsp;Monto</td>
                        </tr>
                      <?
                      ////////   //////////
                     $i=1;
                  while ($i<=20)
                  {
                    if ($block=="S")
                    {
                     ?>
                        <tr>
                          <td class="grid_line01_br"><input name="x<? print $i;?>0" type="txt" class="imagenborrar" id="x<? print $i;?>0"  value="" size="1" onFocus="this.blur()" readonly="true" ></td>
                          <td  align="left" class="grid_line01_br">
                            <input name="x<? print $i;?>1" id="x<? print $i;?>1" type="text" class="grid_txt01" size="28"  align="right"  value="<? print  $_POST["x".$i."1"];?>"  onFocus="document.getElementById('nomcodpre').value='<? print $gridNomTitPre1[$i]; ?>'" readonly="true"></td>
                          <td  align="left" class="grid_line01_br"><input name="x<? print $i;?>2" id="x<? print $i;?>2" type="text" class="grid_txt01" size="28"  align="right"  value="<? print  $_POST["x".$i."2"];?>"  onFocus="document.getElementById('nomcodpre').value='<? print $gridNomTitPre2[$i]; ?>'" readonly="true"></td>
                          <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>3" id="x<? print $i;?>3" type="text" class="grid_txt02" size="15" value="<? if (empty($_POST["x".$i."3"])) {print number_format(0,2,'.',',');}  else {print number_format($_POST["x".$i."3"],2,'.',',');}  ?>" align="right" readonly="true"></td>
                        </tr>
                    <?
                    }
                    else //$block=="N"
                    {
                     ?>
                        <tr>
                          <td class="grid_line01_br"><input name="x<? print $i;?>0" type="txt" class="imagenborrar" id="x<? print $i;?>0" onClick="eliminar(<? print $i;?>,3)"  value="" size="1" onFocus="this.blur()" ></td>
                          <td  align="left" class="grid_line01_br"><input name="x<? print $i;?>1" id="x<? print $i;?>1" type="text" class="grid_txt01" size="28" onKeyDown="javascript:return dFilter (event.keyCode, this,'<?print $_SESSION["formato"];?>');" align="right"  value="<? print  $_POST["x".$i."1"];?>" onKeyPress="enterGRID(event,this.id,'trash','x<? print $i;?>2');" onFocus="document.getElementById('cajaactual').value='1';document.getElementById('cajafoco').value='2';ColocarTituloPresupuestario(this.id,'1');"></td>
                          <td  align="left" class="grid_line01_br"><input name="x<? print $i;?>2" id="x<? print $i;?>2" type="text" class="grid_txt01" size="28" onKeyDown="javascript:return dFilter (event.keyCode, this,'<?print $_SESSION["formato"];?>');" align="right"  value="<? print  $_POST["x".$i."2"];?>" onKeyPress="enterGRID(event,this.id,'trash','x<? print $i;?>3');" onFocus="document.getElementById('cajaactual').value='2';document.getElementById('cajafoco').value='3';ColocarTituloPresupuestario(this.id,'2')" ></td>
                          <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>3" id="x<? print $i;?>3" type="text" class="grid_txt02" size="15" value="<? if (empty($_POST["x".$i."3"])) {print number_format(0,2,'.',',');}  else {print number_format($_POST["x".$i."3"],2,'.',',');}  ?>" align="right"  onKeyPress="entermonto(event,'x<? print $i;?>1',this.id,'x<? print $i+1;?>1')"></td>
                        </tr>
                    <?
                    }//else
                    $i=$i+1;
                  }	//while
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
              </td>
              <td colspan="3">&nbsp;
              </td>
                          </tr>
              </table>
      </td>
  </tr>
  <tr>
     <td>
    <fieldset>
    <legend>Nombre del Código Presupuestario</legend>
    <table width="100%" border="0">
    <tr>
      <td width="1"><textarea name="nomcodpre" cols="85" rows="1" wrap="VIRTUAL" class="imagenInicio2" id="nomcodpre" readonly="true" ><? print $nomcodpre;?></textarea></td>
     </tr>
    </table>
    </fieldset>
   </td>
  </tr>
  <tr>
    <td class="breadcrumb"><span class="style13">Registro de <? echo $forma; ?>...</span></td>
           <input name="trash" type="hidden" id="trash">
           <input name="cajaactual" type="hidden" id="cajaactual" value="1">
           <input name="cajafoco" type="hidden" id="cajafoco" value="2">
           <input name="getf" type="hidden" id="getf" value="S">
           <input name="validofecha" type="hidden" id="validofecha" value="N">
           <input type="hidden" name="var" id="var" />
           <input type="hidden" name="mod" id="mod" />
  </tr>
</table>
  </tr>
</td>
</table>
 <?
if  (!empty($codigo))
{
   $salvar='S';

   if ($ModoConsulta=='S')
   {
      ?>
        <script>
          document.form1.desc.focus();
          document.form1.desc.select();
        </script>
      <?
   }
   else
   {
    ?>
      <script>
        //document.form1.cmbperiodo.focus();
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
      //f.action="PreTrasla.php?var=<? echo '9'; ?>&mod=<? echo 'I' ?>";
      document.getElementById('var').value='9';
      document.getElementById('mod').value='I';
      f.submit();
      }
      }
     }

    function validar_fecha()
    {
      f=document.form1;

        validarfecha();
        //validarFechaPresup();

    }

   function validarFechaPresup()
   {
     fecha=document.getElementById('fecha').value;
     if (fecha!="")
     {
        //document.getElementById('validofecha').value="S";
        //f=document.form1;
        ori="T";
        pagina="validar_fecha.php?fecha="+f.fecha.value+"&periodo="+periodo+"&origen="+ori;
        window.open(pagina,"validar","menubar=no,toolbar=no,scrollbars=no,width=50,height=50,resizable=yes,left=350,top=300");
      }

   }

   function validarfecha_respaldo()
   {
     fecha=document.getElementById('fecha').value;
     if (fecha!="")
     {
      periodo = f.cmbperiodo.options[f.cmbperiodo.selectedIndex].value
      if ((fecha.length==10) && (TrimString(f.cmbperiodo.options[f.cmbperiodo.selectedIndex].text)!=""))
      {
        document.getElementById('validofecha').value="S";
        f      = document.form1;
        ori    = "T";
        pagina = "validar_fecha.php?fecha="+f.fecha.value+"&periodo="+periodo+"&origen="+ori;
        window.open(pagina,"validar","menubar=no,toolbar=no,scrollbars=no,width=50,height=50,resizable=yes,left=350,top=300");
      }
      else
      {
         if (TrimString(f.cmbperiodo.options[f.cmbperiodo.selectedIndex].text)=="")
           {
            alert("Debe seleccionar un período");
            document.getElementById('cmbperiodo').focus();
           }

        if (fecha.length!=10)
        {
          alert("Longitud de Fecha inválida");
          document.getElementById('fecha').value="";
          document.getElementById('fecha').focus();
        }
      }
     }//  if (trim(fecha)!="")
   }



   function validarfecha()
   {
      f       = document.form1;
      fecha   = document.getElementById('fecha').value;
      fecha2  = document.getElementById('fecha2').value;

      periodo = f.fecha.value.substring(3,5);
      if (fecha.length==10)
      {
        if (fecha>=fecha2)
        {
          //f=document.form1;
          //ori="S";
          //pagina="validar_fecha.php?fecha="+f.fecha.value+"&periodo="+periodo+"&origen="+ori;
          //window.open(pagina,"validar","menubar=no,toolbar=no,scrollbars=no,width=50,height=50,resizable=yes,left=350,top=300");

          document.getElementById('validofecha').value="S";
          f      = document.form1;
          ori    = "T";
          pagina = "validar_fecha.php?fecha="+f.fecha.value+"&periodo="+periodo+"&origen="+ori;
          window.open(pagina,"validar","menubar=no,toolbar=no,scrollbars=no,width=50,height=50,resizable=yes,left=350,top=300");

        }else{
          alert('La fecha no puede ser menor a la solicitud');
        }

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


   function VerificarPeriodos()
    {
      f=document.form1;
      f.fecha.value="";
      if (f.codigo.value!="")
      {
       if (TrimString(f.cmbperiodo.options[f.cmbperiodo.selectedIndex].text)=="")
       {
        alert("Período Inválido");
        f.cmbperiodo.focus();
       }
       else
       {
        f.fecha.focus();
        f.fecha.select();
       }
      } //if (f.codigo.value!="")
     }  //end function

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

      sql='select codart as codigo,desart as descripcion from cpartley where trim(codart) like(�%�) order by codart';
      pagina="catalogo2.php?campo="+campo+"&campo2="+campo2+"&sql="+sql+"&foco="+foco+"&tipo="+tipo;
      window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=490,height=490,resizable=yes,left=50,top=50");
      }
     }


     function catalogogrid(tipo)
     {
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
      sql='Select a.codpre as codigo, a.nompre as descripcion, case b.estatus when �I� then �INVERSION� else �GASTO� END  as tipo From cpasiini a, CPDEFTIT b Where upper(a.nompre) like upper(�%�) and  a.codpre=b.codpre and a.perpre=�00� and a.monasi>0  order by a.codpre';

      pagina="catalogo2.php?campo="+campo+"&campo2="+campo2+"&sql="+sql+"&foco="+foco+"&tipo="+tipo;
      window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
     }

     function enterGRID(e,id,donde,foco)
     {
         if (e.keyCode==13)
      {
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
            //sql2="select * from cpasiini where trim(codpre)= trim(�"+cadena+"�) and perpre=�00� and monasi>0";
            anocierre = '<? echo $anocierre;?>'
            sql2=cadena;
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
            document.getElementById(x).value=document.getElementById(y).value;
            if (col==3)
            {
              document.getElementById(y).value="0.00";
             }
             else
             {
               document.getElementById(y).value="" ;
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
     }

      function Aprobar_Solicitud()
    {
      aprobar='<? print $btnAprobar;?>';
      if (aprobar=='S')
      {
         if (f.codigo.value!="")
         {
           f=document.form1;
           cod=f.codigo.value;
           ope='M';
           window.open("aprSolTrasla.php?codigo="+cod+"&operacion="+ope,"AprobarSolicitud","menubar=no,toolbar=no,scrollbars=no,width=600,height=170,resizable=no,left=200,top=200");
         } // if (f.codigo.value!="")
         } //if (aprobar=='S')
    }


      function cancelar()
       {
        location=("PreTrasla.php")
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
      }else if (fecha<fecha2){
      alert('La fecha no puede ser menor a la solicitud');
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
            //alert(document.getElementById('validofecha').value);
            //if (document.getElementById('validofecha').value=="S")
            //{
                //f.periodo.value=f.cmbperiodo.options[f.cmbperiodo.selectedIndex].value;
                f.action="imecPreTrasla.php?imec=<? print $imec?>";
                f.submit();
             //}//if (document.getElementById('validofecha').value=="S")
            }// if (verificar())
        }//if(confirm("¿Realmente desea Salvar?"))
       }//if (save=='S')
      }// else if(itemId == '0_save')
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
          var fechainicio='<? echo $fechainicio; ?>';
          var fechacierre='<? echo $fechacierre; ?>';
          if (compareDate(document.getElementById('fecha').value,fechainicio,fechacierre)==0)
          {
            alert("La Fecha debe estar entre la Fecha de Inicio y la Fecha Final del Ejercicio");
          }else{
              var eliminar='<? echo $Eliminar; ?>';
              var msg ='<? echo $Msj; ?>';
              if (eliminar=='N'){ alert(msg) }
              else
              {
                if(confirm("Esta seguro que desea Eliminar?"))
                  {
                    f=document.form1;
                    codigo=f.codigo.value;
                    ope='P';
                    fecpre=f.fecha.value;
                    window.open("anuPreTrasla.php?codigo="+codigo+"&fecpre="+fecpre+"&operacion="+ope,"AnularTraslado","menubar=no,toolbar=no,scrollbars=no,width=600,height=150,resizable=no,left=200,top=250");
                  }
              }//if (eliminar=='N'){ alert(msg)}
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
      //f.action="PreTrasla.php?var=<? print '1';?>";
      document.getElementById('var').value='1';
      f.submit();
     }
     function anterior()
      {
      f=document.form1;
      //f.action="PreTrasla.php?var=<? print '2';?>";
      document.getElementById('var').value='2';
      f.submit();
     }
     function siguiente()
      {
      f=document.form1;
      //f.action="PreTrasla.php?var=<? print '3';?>";
      document.getElementById('var').value='3';
      f.submit();
     }
     function ultimo()
      {
      f=document.form1;
      //f.action="PreTrasla.php?var=<? print '4';?>";
      document.getElementById('var').value='4';
      f.submit();
     }

      function consulta()
      {
          f=document.form1;
          document.getElementById('var').value='9';
          //var campo2='nompre';
          //var campo='codigopre';
          //var foco='submit';
          //sql='Select codpre as Codigo, nompre as Nombre, coddep as Depend from cpdeftit where upper(nompre) like upper(�%�) order by codpre';
          //pagina="catalogo2.php?campo="+campo+"&campo2="+campo2+"&campo3="+campo3+"&sql="+sql+"&foco="+foco;
          //window.open(pagina,"","menubar=no,toolbar=no,scrollbars=yes,width=570,height=500,resizable=yes,left=50,top=50");

          var host = '<? echo $_SERVER["HTTP_HOST"]; ?>';
              pagina='http://'+host+'/herramientas_dev.php/generales/catalogo/metodo/Cptrasla_PreTrasla/clase/Cptrasla/frame/form1/obj1/codigo/campo1/reftra/submit/true';
              window.open(pagina,"true","menubar=no,toolbar=no,scrollbars=yes,width=490,height=490,resizable=yes,left=500,top=80");
     }
  </script>
</html>
