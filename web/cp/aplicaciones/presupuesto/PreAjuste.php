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
$codemp = $_SESSION["codemp"];
$bd     = new basedatosAdo($codemp);
$tools  = new tools();


$modulo = "";
$forma  = "Ajustes Ejecución";
$modulo = $_SESSION["modulo"] . " > Ejecución Presupuestaria > ".$forma;
$block="S";
 //limpiar datos  del movimiento
 $i=1;
 while ($i<=50)
 {
     $_POST["x".$i."1"] = "";
     $_POST["x".$i."2"] = number_format(0,2,'.',',');
     $_POST["x".$i."3"] = number_format(0,2,'.',',');
     $_POST["x".$i."4"] = "";
     $_POST["x".$i."5"] = "";
     $_POST["x".$i."6"] = "";
     $i=$i +1;
 }

//CARGAR MASCARA
  $sql="SELECT *, to_char(fecini,'dd/mm/yyyy') as fecini, to_char(feccie,'dd/mm/yyyy') as feccie,
    to_char(fecini,'yyyy') as anoinicio, to_char(feccie,'yyyy') as anocierre
    from cpdefniv where codemp='001'";
  $tb=$bd->select($sql);
  if (!$tb->EOF)
  {
    $_SESSION["formato"] = $tb->fields["forpre"];
    $numper      = $tb->fields["numper"];
    $fechainicio = $tb->fields["fecini"];
    $fechacierre = $tb->fields["feccie"];
    $anoinicio   = $tb->fields["anoinicio"];
    $anocierre   = $tb->fields["anocierre"];
    $prenivdis   = $tb->fields["nivdis"];
  }
  else
  {
    $_SESSION["formato"] = "G";
  }
///////////////

 if (!empty($_POST["var"]))    { $var    = $_POST["var"];}
 if (!empty($_POST["mod"]))    { $mod    = $_POST["mod"];}
 if (!empty($_POST["codigo"])) { $codigo = strtoupper(trim(str_pad($_POST["codigo"],8,'0',STR_PAD_LEFT)));}
 if (!empty($_POST["fecha"]))  { $fecha  = $_POST["fecha"];}
 if (!empty($_POST["desc"]))   { $desc   = $_POST["desc"];}
 if (!empty($_POST["tipaju"])) { $tipaju = $_POST["tipaju"];}
 if (!empty($_POST["reftipaju"])) { $reftipaju = $_POST["reftipaju"];}
 if (!empty($_POST["destipaju"])) { $destipaju = $_POST["destipaju"];}
 if (!empty($_POST["refmov"])) {  $refmov = strtoupper(trim(str_pad($_POST["refmov"],8,'0',STR_PAD_LEFT)));}
 if (!empty($_POST["fecmov"])) {  $fecmov = $_POST["fecmov"];}
 if (!empty($_POST["desmov"])) {  $desmov = $_POST["desmov"];}

if ($var!='9') {Limpiar();}

///////////////// BARRA DE MENU /////////////////
    if ($var=='1')
      {
        if ($tb=$tools->primerRegistro('CPAjuste','refaju'))
        {
          $codigo=$codigo=strtoupper(trim($tb->fields["refaju"]));
          $var=9;   //Para que haga la busqueda
        }
      }
    else if ($var=='2') //Anterior
      {
        if (!empty($codigo))
        {
            $aux=$codigo;
            //chekeamos q no sea el primero
          $tb=$tools->primerRegistro('CPAjuste','refaju');
          $codigo=strtoupper(trim($tb->fields["refaju"]));
          if ($aux==$codigo)
          {
            $tb=$tools->ultimoRegistro('CPAjuste','refaju');
               $codigo=strtoupper(trim($tb->fields["refaju"]));
              $var=9;   //Para que haga la busqueda
          }
          else
          {
            $tb=$tools->anteriorRegistro('CPAjuste','refaju',$aux,'N');
            $codigo=strtoupper(trim($tb->fields["refaju"]));
            $var=9;   //Para que haga la busqueda
          }
        }
        else
        {
          $tb=$tools->ultimoRegistro('CPAjuste','refaju');
          $codigo=strtoupper(trim($tb->fields["refaju"]));
          $var=9;   //Para que haga la busqueda
        }
      }
    else if ($var=='3') //PROXIMO
      {
        if (!empty($codigo))
        {
            $aux=$codigo;
            //chekeamos q no sea el ultimo
          $tb=$tools->ultimoRegistro('CPAjuste','refaju');
          $codigo=strtoupper(trim($tb->fields["refaju"]));
          if ($aux==$codigo)
          {
            $tb=$tools->primerRegistro('CPAjuste','refaju');
               $codigo=strtoupper(trim($tb->fields["refaju"]));
              $var=9;   //Para que haga la busqueda
          }
          else
          {
            $tb=$tools->proximoRegistro('CPAjuste','refaju',$aux,'N');
            $codigo=strtoupper(trim($tb->fields["refaju"]));
            $var=9;   //Para que haga la busqueda
          }
        }
        else
        {
          $tb=$tools->primerRegistro('CPAjuste','refaju');
          $codigo=strtoupper(trim($tb->fields["refaju"]));
          $var=9;   //Para que haga la busqueda
        }
      }
    else if ($var=='4')
      {
        if ($tb=$tools->ultimoRegistro('CPAjuste','refaju'))
        {
          $codigo=strtoupper(trim($tb->fields["refaju"]));
          $var=9;   //Para que haga la busqueda
        }
      }
    //////////////// FIN MENU ////////////////

    if ($var=='9'){
      //////  Busqueda por codigo del Ajuste  ////////
       $imec='I';
       $block="N";
       $ModoConsulta="N";
      if  (!empty($codigo))
      {
          //$codigo=strtoupper(trim(str_pad($codigo,8,'0',STR_PAD_LEFT)));
           $sql="Select *,to_char(fecaju,'dd/mm/yyyy') as  fecaju,to_char(fecanu,'dd/mm/yyyy') as fecanu from CPAjuste Where trim(refaju) = '".trim($codigo)."' ";

       /*$sql="Select to_char(cpcompro.feccom,'dd/mm/yyyy') as feccom, CPAjuste.*,to_char(cpajuste.fecaju,'dd/mm/yyyy') as fecaju,
      to_char(cpajuste.fecanu,'dd/mm/yyyy') as fecanu from CPAjuste inner join cpcompro
       on cpcompro.refcom=CPAjuste.refere
       Where trim(refaju) = '".trim($codigo)."'";*/

           if ($tb=$tools->buscar_datos($sql))
           {
            $fecha  = $tb->fields["fecaju"];
            $desc   = $tb->fields["desaju"];
            $tipaju = $tb->fields["tipaju"];

            if (!empty($tipaju)) { Mostrar_DatosTipAju($tipaju); }

            $refmov=$tb->fields["refere"];
            $desmov=$tb->fields["desanu"];
            $fecanu=$tb->fields["fecanu"];
            $status=$tb->fields["staaju"];

            if (strtoupper(trim($status))=="N")
            {
               $estado="Anulado el ".$fecanu;
            }//if (strtoupper(trim($status))=="N")

             //cargar datos  movimientos ajustes  (grid)

             $block="S";
             $pos=1;
             $sqldet="Select * From CPMovAju Where trim(RefAju)='".trim($codigo)."' ";
             $tb2=$bd->select($sqldet);
             while (!$tb2->EOF)
             {
                 $_POST["x".$pos."1"]= $tb2->fields["codpre"];
                 $_POST["x".$pos."2"]= $tb2->fields["monaju"]*(-1);
                 $_POST["x".$i."3"]= number_format(0,2,'.',',');
                 $_POST["x".$i."4"]= "";
                 $_POST["x".$i."5"]= "";
                 $_POST["x".$i."6"]= "";
                $tb2->MoveNext();
                $pos=$pos+1;
             }
             ///////////////////////////////////////////

            $ModoConsulta='S';
            $imec='M';
            $mod='M';

           }//if (!$tb->EOF)
        }//si no esta vacio codigo
    }//if ($var=='9'){

  function Mostrar_DatosTipAju($codigo)
  {
    global $bd;
    global $tools;
    global $destipaju;

    $codigo= strtoupper(trim($codigo));
    try
      {
         $sql="Select nomext From CpDocAju Where trim(TipAju) = '".trim($codigo)."' ";
        if ($tb=$tools->buscar_datos($sql))
        {
          $destipaju=$tb->fields["nomext"];
        }
        else
        {
          $destipaju="";
          Mensaje("El Tipo de Ajuste no esta existe");
          $foco="tipaju";
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
    global $estado;
    global $block;
    global $status;
    global $fecha;
    global $tipaju;
    global $destipaju;
    global $refmov;
    global $desmov;

    $desc="";
    $estado="";
    $block="S";
    $status="";
    $fecha="";
    $tipaju="";
    $destipaju="";
    $refmov="";
    $desmov="";
    }


?>
<script>

     function  actualizarsaldos2()
      {
       f=document.form1;
      i=1;
      var acum=0;
      while (i<=50)
      {
        var x2="x"+i+"2";
        str= document.getElementById(x2).value.toString();
        str= str.replace(',','');
        str= str.replace(',','');
        str= str.replace(',','');

        var num=parseFloat(str);

        acum=acum+num;

        document.getElementById(x2).value=format(num.toFixed(2),'.','.',',');
        i=i+1;
      }
      document.form1.totmon.value=format(acum.toFixed(2),'.','.',',');
     }

    function MostrarDetalleGrid(id)
     {
        f=document.form1;
        aux= document.getElementById(id).value.toUpperCase();
        document.getElementById(id).value=aux.toUpperCase();
        aux=aux.pad(8, "0",0);
        document.getElementById(id).value=aux;
        if (aux!="")
        {
          cuantos='detmov';
          refmov=document.getElementById('reftipaju').value;
          fecmov=document.getElementById('fecmov').value;
          fecha=document.getElementById('fecha').value;
          if (refmov=="C") {sql2='Select * From CPImpCom Where trim (refcom) =trim(�'+aux+'�) order by Codpre';	}
          if (refmov=="A") {sql2='Select * From CPImpCau Where trim (refcau) =trim(�'+aux+'�) order by Codpre';	}
          if (refmov=="G") {sql2='Select * From CPImpPag Where trim (refpag) =trim(�'+aux+'�) order by Codpre';	}
          if (refmov=="P") {sql2='Select * From CPImpPrc Where trim (refprc) =trim(�'+aux+'�) order by Codpre';	}
          pagina="gridatos.php?cuantos="+cuantos+"&refmov="+refmov+"&fecmov="+fecmov+"&fecha="+fecha+"&sql2="+sql2;
          window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=no,width=50,height=50,resizable=no,left=100,top=300");
        } //if (aux!="")
    }   //end function

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
  width: 540px;
  height: 105px;
  /*overflow: auto;*/
  overflow:scroll;
  background-color: #FFFFFF;
}

-->
</style>

<script>
    function validar_fecha()
    {
      f=document.form1;
      fecha=document.getElementById('fecha').value;
      if (fecha.length==10)
      {
        f=document.form1;
        fecmov=document.getElementById('fecmov').value;
        cuantos="valfecaju";
        pagina="gridatos.php?cuantos="+cuantos+"&fecmov="+fecmov+"&fecha="+fecha;
        window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=no,width=50,height=50,resizable=yes,left=100,top=300");
      }
      else
      {
       // alert("Longitud de Fecha inválida");
        document.getElementById('fecha').value=mostrarfecha();
        document.getElementById('fecha').focus();
      }
    }

</script>
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
                              <legend>Datos del Ajuste </legend>
                              <table width="100%" border="0">
                                <tr>
                                  <td width="1">&nbsp;</td>
                                  <td width="82">Referencia:</td>
                                  <td width="119">
                     <? if (($ModoConsulta=='S')  or ($mod=='I'))   { ?>
                    <input name="codigo" type="text" class="imageninicio2" id="codigo" value="<? print $codigo;?>" size="8" maxlength="8" readonly="true">
                      <? } else {?>
                    <input name="codigo" type="text" class="imagenInicio" id="codigo" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" onKeyPress="buscarenter(event)" value="<? print $codigo;?>" size="8" maxlength="8" onblur="if (document.getElementById('codigo').value!=''){ document.getElementById('codigo').value=document.getElementById('codigo').value.pad(8,'0',0); document.getElementById('var').value='9'; document.getElementById('mod').value='I'; document.form1.submit(); }else{ document.getElementById('codigo').value=document.getElementById('codigo').value.pad(8,'#',0);  document.getElementById('var').value='9'; document.getElementById('mod').value='I'; f.submit();}" maxlength="8" >
                    <? } ?>
                  </td>
                                  <td colspan="2"><input name="var" type="hidden" id="var" value="<? print $var;?>">
                                  <input name="mod" type="hidden" id="mod" value="<? print $mod;?>">	<input name="block" type="hidden" id="block" value="<? print $block;?>">
                                  <input name="ModoConsulta" type="hidden" id="ModoConsulta" value="<? print $ModoConsulta;?>">
                                  <input name="imec" type="hidden" id="imec" value="<? print $imec;?>"></td>
                                  <td width="61">

                    </td>
                                  <td width="49">Fecha:</td>
                                  <td width="99">
                            <? if ($ModoConsulta=='S') { ?>
                               <input name="fecha" type="text" id="fecha" value="<? print $fecha;?>" size="10"  readonly="true" class="imagenInicio2">
                            <? } else { ?>
                            <input name="fecha" type="text"  class="imagenInicio" id="fecha" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $fecha;?>" size="10" maxlength="10"  onKeyUp = "this.value=formateafecha(this.value);" onBlur="validar_fecha()">
                            <? } ?>
                  </td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td valign="top">Descripci&oacute;n:</td>
                                  <td colspan="6"><textarea name="desc"  cols="70" rows="2" wrap="VIRTUAL" class="imagenInicio" id="desc" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'"><? print $desc;?></textarea>
                 </td>
                                </tr>
                </table>
                <fieldset>
                                <legend>Tipo Ajuste </legend>
                                <table width="100%" border="0">
                                    <tr>
                                      <td width="44">C&oacute;digo</td>
                                      <td width="53"><? if ($ModoConsulta=='S') { ?>
                    <input name="tipaju" type="text" class="imagenInicio2" id="tipaju" value="<? print $tipaju;?>" size="4" maxlength="4" readonly="true" >
                     <? } else { ?>
                    <input name="tipaju" type="text" class="imagenInicio" id="tipaju" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $tipaju;?>" size="4" maxlength="4" onKeyPress="enterA(event,'tipaju','destipaju','reftipaju','refmov')" >
                    <? } ?>	<input name="reftipaju" type="hidden" id="reftipaju" value="<? print $reftipaju;?>">									  </td>
                                      <td width="28">
                       <? if ($ModoConsulta=='S')   { ?>
                      <input name="btnTipAju" type="button" class="botton" id="btnTipAju"  readonly="true"  value="...">
                      <? } else {?>
                      <input name="btnTipAju" type="button" class="botton" id="btnTipAju" onClick="catalogoA('tipaju','destipaju','reftipaju','refmov','C');" value="...">
                      <? } ?>
                                      <td width="433"><div align="right">
                                        <input name="destipaju" type="text" class="imagenInicio2" id="destipaju" value="<? print $destipaju;?>" size="61"  readonly="true">
                                      </div></td>
                                    </tr>
                                  </table>
                  </fieldset>
                <fieldset>
                              <legend>Datos del Movimiento</legend>
                              <table width="100%" border="0">
                                <tr>
                                  <td width="1">&nbsp;</td>
                                  <td width="82">Referencia:</td>
                                  <td width="85">
                     <? if ($ModoConsulta=='S')   { ?>
                                     <input name="refmov" type="text" class="imageninicio2" id="refmov" value="<? print $refmov;?>" size="8" maxlength="8" readonly="true">
                                    <? } else {?>
                    <input name="refmov" type="text" class="imagenInicio" id="refmov" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" onKeyPress="enterB(event,'refmov','fecmov','desmov','x12')" value="<? print $refmov;?>" size="8" maxlength="8">
                  <? } ?>								  </td>
                                  <td colspan="2">
                  <? if ($ModoConsulta=='S')   { ?>
                    <input name="btnMov" type="button" class="botton" id="btnMov" readonly="true"  value="...">
                  <? } else {?>
                    <input name="btnMov" type="button" class="botton" id="btnMov" onClick="catalogoB('refmov','fecmov','desmov','x12','C');" value="...">
                      <? } ?>
                  </td>
                                  <td width="75">

                    </td>
                                  <td width="60">Fecha:</td>
                                  <td width="121">
                     <input name="fecmov" type="text" id="fecmov" value="<? print $fecmov;?>" size="10"  readonly="true" class="imagenInicio2">
                  </td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td valign="top">Descripci&oacute;n:</td>
                                  <td colspan="6"><textarea name="desmov"  cols="66" rows="2" wrap="VIRTUAL" class="imagenInicio2" id="desmov"  readonly="true" ><? print $desmov;?></textarea>
                 </td>
                                </tr>
                </table>
                </fieldset>
                            </fieldset>
              </td>
                          </tr>
                          <tr>
                            <td colspan="3" align="center">
              <table width="545" height="180" border="0" cellpadding="0" cellspacing="0">
                 <tr>
                <td colspan="3">
                <table width="545" border="0" class="recuadro">
                <tr>
                  <td colspan="5" class="tpButtons">								  MOVIMIENTOS DEL AJUSTE </td>
                  </tr>
            <tr>
            <td>
          <table border="0" cellpadding="0" cellspacing="0">
                    <tr valign="bottom" bgcolor="#ECEBE6">
                    <td height="1">
                      <div class="migrid" id="grid01">
                      <table  border="0" cellpadding="0" cellspacing="0">
                        <tr>
                        <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;&nbsp;Codigo Presupuestario</td>
                        <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;&nbsp;Monto Ajuste </td>
                        <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;&nbsp;Monto</td>
                        <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;&nbsp;Ref. Precom .                                                </td>
                        <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;&nbsp;Ref. Compromiso </td>
                        <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;&nbsp;Ref. Causado</td>
                        </tr>
                      <?
                      ////////   //////////
                     $i=1;
                  while ($i<=50)
                  {
                     ?>
                        <tr>
                          <td  align="left"  class="grid_line01_br"><input name="x<? print $i;?>1" id="x<? print $i;?>1" type="text" class="grid_txt01" size="32" align="right"  value="<? print  $_POST["x".$i."1"];?>"  readonly="true"></td>
                          <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>2" id="x<? print $i;?>2" type="text" class="grid_txt02" size="18" value="<? if (empty($_POST["x".$i."2"])) {print number_format(0,2,'.',',');}  else {print number_format($_POST["x".$i."2"],2,'.',',');}  ?>" align="right"  onKeyPress="entermonto(event,this.id,'x<? print $i+1;?>2')" onBlur="disp(this.id)"></td>
                          <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>3" id="x<? print $i;?>3" type="text" class="breadcrumbv2" size="16" value="<? if (empty($_POST["x".$i."3"])) {print number_format(0,2,'.',',');}  else {print number_format($_POST["x".$i."3"],2,'.',',');}  ?>" align="right" readonly="true" ></td>
                          <td  align="center" class="grid_line01_br"><input name="x<? print $i;?>4" id="x<? print $i;?>4" type="text" class="breadcrumbv2" size="18" align="right"  value="<? print  $_POST["x".$i."4"];?>"  readonly="true"></td>
                          <td  align="center"  class="grid_line01_br"><input name="x<? print $i;?>5" id="x<? print $i;?>5" type="text" class="breadcrumbv2" size="22" align="right"  value="<? print  $_POST["x".$i."5"];?>"  readonly="true"></td>
                          <td  align="center"  class="grid_line01_br"><input name="x<? print $i;?>6" id="x<? print $i;?>6" type="text" class="breadcrumbv2" size="18" align="right"  value="<? print  $_POST["x".$i."6"];?>"  readonly="true"></td>
                        </tr>
                    <?
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
            <td height="100%"><table width="100%" border="0" align="right">
                    <tr class="queryheader">

                    <td width="225" align="center" class="tpHead">TOTAL
                      </td>
                    <td width="96">
                      <div align="right">
                      <input name="totmon" type="text" class="cajadetextosimple" id="totmon" size="18" readonly="true">
                      </div></td>
                    <td width="297">&nbsp;&nbsp;</td>
                    </tr>
                  </table></td>
                </tr>
              </table>
                </td>
                </tr>
              </table>
              </td>
              </tr>
              </table>
      </td>
  </tr>

  <tr>
    <td class="breadcrumb"><span class="style13">Registro de <? echo $forma; ?>...</span></td>
                <input name="trash" type="hidden" id="trash">
          <input name="cajaactual" type="hidden" id="cajaactual" value="1">
           <input name="cajafoco" type="hidden" id="cajafoco" value="2">
           <input name="getf" type="hidden" id="getf" value="S">
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
      bloquearGrip(6,50,1);
      }
      actualizarsaldos2();
      if ((document.getElementById('refmov').value!="") && (document.getElementById('mod').value=='I'))
      {
       document.getElementById('x12').focus();
       document.getElementById('x12').select();
       MostrarDetalleGrid('refmov');
      }
  </script>

<script language="JavaScript">

    function disp(id)
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
        var x="x"+j+"1";
        var x2="x"+j+"2";
        var x3="x"+j+"3";
        var x4="x"+j+"4";
        var x5="x"+j+"5";
        var x6="x"+j+"6";
        //var y="x"+j+"3"; //monto movimiento
        //var monto = $F(id);


          var mon = document.getElementById(id).value.toString();
          mon = mon.replace(',','');
          mon = mon.replace(',','');
          mon = mon.replace(',','');

          var mon2 = document.getElementById(x3).value.toString();
          mon2 = mon2.replace(',','');
          mon2 = mon2.replace(',','');
          mon2 = mon2.replace(',','');


       cod = $F(x).substring(0,1);//verificamos q no sean puras rayitas

      if ((cod!="--") && (cod!=""))
      {
        if ( (mon < 0) && (Math.abs(mon) > mon2) ){
          $(x2).value = 0.00;
          alert('El monto a ajustar no puede ser menor al monto de la imputacion');

        //}else if ($F(id)==0){
         // $(x2).value = 0.00;
         //alert('El monto a ajustar no puede ser igual a 0');

        }else if ($F(id)>0){
          var referencia = $F(x4) + "/" + $F(x5) + "/" + $F(x6);


          var cadena=rayitasfc(aux);
         // fecha=document.getElementById('fecha').value;
          var anocierre='<? print $anocierre;?>';
          var prenivdis='<? print $prenivdis;?>';

          var refmov = '<? print $refmov;?>';
          if(refmov=='') refmov=$('refmov').value;
          var codigo=$F(x);

          var RefiereA = $F('reftipaju');

       cuantos="dispotraslado";
          //sql="select mondis as campo1 from cpasiini where trim(codpre) = trim(�"+cadena+"�) and perpre=�00�";
          //pagina="gridatos.php?cuantos="+cuantos+"&id="+monto+"&donde="+donde+"&foco="+foco+"&sql="+sql+"&mon="+mon+"&fecha="+fecha+"&anocierre="+anocierre+"&prenivdis="+prenivdis+"&codigo="+codigo;

          pagina = "gridatos.php?cuantos="+cuantos+"&tipo="+RefiereA+"&refmov="+refmov+"&codigo="+codigo+"&otro="+referencia+"&anocierre="+anocierre+"&prenivdis="+prenivdis+"&monmov="+mon+"&id="+id;
          window.open(pagina,"","menubar=no,toolbar=no,scrollbars=no,width=50,height=50,resizable=no,left=300,top=300");
        }
      }

    }

      function buscarenter(e)
      {
        if (e.keyCode==13)
      {
            f=document.form1;
          if (f.codigo.value!="")
          {
              document.getElementById('var').value='9';
              document.getElementById('mod').value='I';
              f.submit();
          }
        }
     }


     function enterA(e,id,donde,otro,foco)
    {
      if (e.keyCode==13)
      {
       f=document.form1;
         if (f.codigo.value!="")
       {
        aux= document.getElementById(id).value.toUpperCase();
        document.getElementById(id).value=aux.toUpperCase();
        if (aux!="")
        {
          cuantos='det';
          sql='Select nomext as campo1,refier as campo2 from CpDocAju where trim (tipaju) =trim(�'+aux+'�)';
          pagina="gridatos.php?cuantos="+cuantos+"&id="+id+"&donde="+donde+"&foco="+foco+"&otro="+otro+"&sql="+sql;
          window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=no,width=50,height=50,resizable=no,left=100,top=300");
        } //if (aux!="")
      } // if (f.codigo.value!="")
      }  //if (e.keyCode==13)
    }   //end function

     function catalogoA(c1,c2,c3,fc,tipo)
     {
      f=document.form1;
      var host = '<? echo $_SERVER["HTTP_HOST"]; ?>';
      if (f.codigo.value!="")
      {
        campo=c1;
        campo2=c2;
        campo3=c3;
        foco=fc;

        pagina='http://'+host+'/herramientas_dev.php/generales/catalogo/metodo/Cpdocaju_Predocaju/clase/Cpdocaju/frame/form1/obj1/'+campo+'/obj2/'+campo2+'/obj3/'+campo3+'/campo1/tipaju/campo2/nomext/campo3/refier';
        window.open(pagina,"true","menubar=no,toolbar=no,scrollbars=yes,width=490,height=490,resizable=yes,left=500,top=80");

       //sql='Select tipaju as Codigo,nomext as Nombre_Extendido,refier as Refiere from CpDocAju where trim (tipaju) like(�%�) order by tipaju';
      //pagina="catalogo3.php?campo="+campo+"&campo2="+campo2+"&campo3="+campo3+"&sql="+sql+"&foco="+foco+"&tipo="+tipo;
      //window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=490,height=490,resizable=yes,left=50,top=50");

      }
     }

    function enterB(e,id,donde,otro,foco)
    {
      if (e.keyCode==13)
      {
       f=document.form1;
         if (f.codigo.value!="")
       {
          if (f.tipaju.value!="")
        {
          aux= document.getElementById(id).value.toUpperCase();
          document.getElementById(id).value=aux.toUpperCase();
          aux=aux.pad(8, "0",0);
          document.getElementById(id).value=aux;
          if (aux!="")
          {
            cuantos='det';
            tipo='MOV';
            refmov=document.getElementById('reftipaju').value;
            fecha=document.getElementById('fecha').value;
            if (refmov=="C")
              {sql='Select to_char(feccom,�dd/mm/yyyy�) as campo1,descom as campo2 From CPCompro Where StaCom=�A� and feccom <= to_date(�'+fecha+'�,�dd/mm/yyyy�) and (moncom-salaju-salcau)>0 and trim (refcom) =trim(�'+aux+'�)';
               sql2='Select * From CPImpCom Where trim (refcom) =trim(�'+aux+'�) order by Codpre';	}
            if (refmov=="A")
              {sql='Select to_char(feccau,�dd/mm/yyyy�) as campo1,descau as campo2 From CPCausad Where StaCau=�A� and feccau <= to_date(�'+fecha+'�,�dd/mm/yyyy�) and (moncau-salaju-salpag)>0 and trim (refcau) =trim(�'+aux+'�)';
               sql2='Select * From CPImpCau Where trim (refcau) =trim(�'+aux+'�) order by Codpre';	}
            if (refmov=="G")
              {sql='Select to_char(fecpag,�dd/mm/yyyy�) as campo1,despag as campo2 From CPPagos Where StaPag=�A� and fecpag <= to_date(�'+fecha+'�,�dd/mm/yyyy�) and (monpag-salaju)>0 and trim (refpag) =trim(�'+aux+'�)';
               sql2='Select * From CPImpPag Where trim (refpag) =trim(�'+aux+'�) order by Codpre';	}
            if (refmov=="P")
              {sql='Select to_char(fecprc,�dd/mm/yyyy�) as campo1,desprc as campo2 From CPPrecom Where StaPrc=�A� and fecprc <= to_date(�'+fecha+'�,�dd/mm/yyyy�) and (monprc-salaju-salcom)>0 and trim (refprc) =trim(�'+aux+'�)';
               sql2='Select * From CPImpPrc Where trim (refprc) =trim(�'+aux+'�) order by Codpre';	}


            pagina="gridatos.php?cuantos="+cuantos+"&id="+id+"&donde="+donde+"&foco="+foco+"&otro="+otro+"&tipo="+tipo+"&refmov="+refmov+"&fecha="+fecha+"&sql="+sql+"&sql2="+sql2;
            window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=no,width=50,height=50,resizable=no,left=100,top=300");
          } //if (aux!="")
         }// if (f.codigo.tipcau.value!="")
        else
        {
             alert("Debe introducir el tipo de ajuste...");
        }// else if (f.codigo.tipcau.value!="")
      } // if (f.codigo.value!="")
      }  //if (e.keyCode==13)
    }   //end function



     function catalogoB(c1,c2,c3,fc,tipo)
     {
      f=document.form1;
      var host = '<? echo $_SERVER["HTTP_HOST"]; ?>';
      if (f.codigo.value!="")
      {
        if (f.tipaju.value!="")
        {
          campo=c1;
          campo2=c2;
          campo3=c3;
          foco='submit';
          refmov=document.getElementById('reftipaju').value;
          fecaju=document.getElementById('fecha').value;
          fecaju=fecaju.replace('/','-');
          fecaju=fecaju.replace('/','-');
          fecaju=fecaju.replace('/','-');
          if (refmov=="C"){ var catalogo = 'Cpcompro_PreAjuste'; var clase = 'Cpcompro'; //sql='Select refcom as Referencia,to_char(feccom,�dd/mm/yyyy�) as Fecha,descom as Descripcion,moncom as Monto From CPCompro Where StaCom=�A� and feccom <= to_date(�'+fecaju+'�,�dd/mm/yyyy�) and (moncom-salaju-salcau)>0 and trim(refcom) like(�%�) order by refcom';
            devolver='/campo1/refcom/campo2/feccom/campo3/descom';
          }
          if (refmov=="A") {var catalogo = 'Cpcausad_PreAjuste'; var clase = 'Cpcausad'; //sql='Select refcau as Referencia,to_char(feccau,�dd/mm/yyyy�) as Fecha,descau as Descripcion,moncau as Monto From CPCausad Where StaCau=�A� and feccau <= to_date(�'+fecaju+'�,�dd/mm/yyyy�) and (moncau-salaju-salpag)>0 and trim(refcau) like(�%�) order by refcau';
            devolver='/campo1/refcau/campo2/feccau/campo3/descau';
          }
          if (refmov=="G") {var catalogo = 'Cppagos_PreAjuste'; var clase = 'Cppagos'; //sql='Select refpag as Referencia,to_char(fecpag,�dd/mm/yyyy�) as Fecha,despag as Descripcion,monpag as Monto From CPPagos  Where StaPag=�A� and fecpag <= to_date(�'+fecaju+'�,�dd/mm/yyyy�) and (monpag-salaju)>0 and trim(refpag) like(�%�) order by refpag';
            devolver='/campo1/refpag/campo2/fecpag/campo3/despag';
          }
          if (refmov=="P") {var catalogo = 'Cpprecom_PreAjuste'; var clase = 'Cpprecom'; //sql='Select refprc as Referencia,to_char(fecprc,�dd/mm/yyyy�) as Fecha,desprc as Descripcion,monprc as Monto From CPPrecom Where StaPrc=�A� and fecprc <= to_date(�'+fecaju+'�,�dd/mm/yyyy�) and (monprc-salaju-salcom)>0 and trim(refprc) like(�%�) order by refprc';
            devolver='/campo1/refprc/campo2/fecprc/campo3/desprc';
          }

          pagina='http://'+host+'/herramientas_dev.php/generales/catalogo/metodo/'+catalogo+'/clase/'+clase+'/frame/form1/obj1/'+campo+'/obj2/'+campo2+'/obj3/'+campo3+devolver+'/param1/'+fecaju+'/submit/true';
//          pagina="catalogo3.php?campo="+campo+"&campo2="+campo2+"&campo3="+campo3+"&sql="+sql+"&foco="+foco+"&tipo="+tipo;

//          pagina='http://'+host+'/herramientas_dev.php/generales/catalogo/metodo/Precompro_Cpdoccom/clase/Cpdoccom/frame/form1/obj1/'+campo2+'/obj2/'+campo+'/obj3/'+campo3+'/campo1/tipcom/campo2/nomext/campo3/refprc/submit/false';
          window.open(pagina,"true","menubar=no,toolbar=no,scrollbars=yes,width=490,height=490,resizable=yes,left=500,top=80");


         }// if (f.codigo.tipcau.value!="")
      else
        {
             alert("Debe introducir el tipo de ajuste...");
        }// else if (f.codigo.tipcau.value!="")

      }
     }

    function entermonto(e,id,fc)
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
        var x2="x"+j+"2"
        var y="x"+j+"3" //monto movimiento

        //verificar que los cod. pres este informado
        if ((document.getElementById(x).value=="")  )
        {
           document.getElementById(id).value='0.00';
           alert("El Código Presupuestario debe estar formado")
           document.getElementById(id).focus;
           document.getElementById(id).select();
        }
        else
        {
          str= document.getElementById(y).value.toString();
          str= str.replace(',','');
          str= str.replace(',','');
          str= str.replace(',','');
          var monmov=parseFloat(str);

      //    if (isnumber(id)==true)
     //     {
        //              if (document.getElementById(id).value > 0)
        //    {
               // if (document.getElementById(id).value > monmov)
              // {
              //   document.getElementById(id).value='0.00';
              //   actualizarsaldos(e);
              //   alert("El Monto a Ajustar es mayor al Monto de la Imputación");
              //   document.getElementById(id).focus;
              //   document.getElementById(id).select();
              // }
             // else //monto correcto
            //  {
                 actualizarsaldos(e);
                 focos(e,fc);
             // }
        //    }//if (document.getElementById(id).value > 0)
        //   else
        //     {
        //       alert("Dato Invalido");
        //      document.getElementById(id).value='0.00';
        //      document.getElementById(id).focus();
        //      document.getElementById(id).select();
        //    }
     //     }
      //    else
      //    {
      //      document.getElementById(id).value='10.00';
      //      document.getElementById(id).focus();
     //       document.getElementById(id).select();
      //    }
        }// else  datos en  blanco
      } //if (e.keyCode==13)
    } //end function



    function actualizarsaldos(e)
      {
    if (e.keyCode==13)
    {
       f=document.form1;
        i=1;
        var acum=0;
        while (i<=50)
        {
          var x2="x"+i+"2";
          str= document.getElementById(x2).value.toString();
          str= str.replace(',','');
          str= str.replace(',','');
          str= str.replace(',','');

          var num=parseFloat(str);

          acum=acum+num;

          document.getElementById(x2).value=format(num.toFixed(2),'.','.',',');
          i=i+1;
        }
        document.form1.totmon.value=format(acum.toFixed(2),'.','.',',');
      }
       }


      function cancelar()
       {
        location=("preAjuste.php")
       }


       function verificar()
       {

      f=document.form1;
      if (TrimString(f.desc.value)=="")
      {
        alert("No puede salvar sin introducir la Descripción del Ajuste");
        return false;
      }
      else if (TrimString(f.fecha.value)=="")
      {
        alert("No puede salvar sin introducir la Fecha del Ajuste");
        return false;
      }
      else if (TrimString(f.tipaju.value)=="")
      {
        alert("No puede salvar sin introducir el Tipo de Ajuste");
        return false;
      }
      else if (TrimString(f.totmon.value)=="0.00")
      {
        alert("No puede salvar sin introducir el Monto de Ajuste");
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
                f.action="imecPreAjuste.php";
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
             alert("El Ajuste ya esta Anulado");
          }
          else
          {
              if(confirm("¿Esta seguro que desea Eliminar?"))
                {
                  f      = document.form1;
                  codigo = f.codigo.value;
                  ope    = 'P';
                  fecpre = f.fecha.value;
                  window.open("anupreAjuste.php?codigo="+codigo+"&fecpre="+fecpre+"&operacion="+ope,"AnularTraslado","menubar=no,toolbar=no,scrollbars=no,width=600,height=150,resizable=no,left=200,top=250");
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
      document.getElementById('var').value='1';
      f.submit();
     }

     function anterior()
      {
      f=document.form1;
      document.getElementById('var').value='2';
      f.submit();
     }
     function siguiente()
      {
      f=document.form1;
      document.getElementById('var').value='3';
      f.submit();
     }
     function ultimo()
      {
      f=document.form1;
      document.getElementById('var').value='4';
      f.submit();
     }

      function consulta()
      {
          f=document.form1;
          var host = '<? echo $_SERVER["HTTP_HOST"]; ?>';
          document.getElementById('var').value='9';
          //var campo2='desc';
          //var campo='codigo';
          //var foco='submit';
          //sql='Select refaju as Codigo, desaju as Nombre, desaju as Fecha from cpajuste where upper(desaju) like upper(�%�) order by refaju';
          //pagina="catalogo2.php?campo="+campo+"&campo2="+campo2+"&sql="+sql+"&foco="+foco;
          //window.open(pagina,"","menubar=no,toolbar=no,scrollbars=yes,width=570,height=500,resizable=yes,left=50,top=50");

          pagina='http://'+host+'/herramientas_dev.php/generales/catalogo/metodo/Cpajuste_PreAjuste/clase/Cpajuste/frame/form1/obj1/codigo/campo1/refaju/submit/true';
          window.open(pagina,"true","menubar=no,toolbar=no,scrollbars=yes,width=490,height=490,resizable=yes,left=500,top=80");

     }


  </script>



</html>
