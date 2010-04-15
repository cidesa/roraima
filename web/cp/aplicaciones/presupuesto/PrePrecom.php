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

require($_SESSION["x"].'lib/bd/basedatosAdo.php');
require($_SESSION["x"].'lib/general/funciones.php');
require($_SESSION["x"].'lib/general/tools.php');
validar(array(8,11,15));            //Seguridad  del Sistema
$codemp=$_SESSION["codemp"];
$bd=new basedatosAdo($codemp);
$z=new tools();

$modulo = "";
$forma  = "Precomprometer";
$modulo = $_SESSION["modulo"] . " > Ejecución Presupuestaria > ".$forma;

//CARGAR MASCARA
    $sql = "SELECT forpre, to_char(fecini,'dd/mm/yyyy') as fecini, to_char(feccie,'dd/mm/yyyy') as feccie,
    to_char(fecini,'yyyy') as anoinicio, to_char(feccie,'yyyy') as anocierre, nivdis
    from cpdefniv where codemp='001'";

  if ($tb=$z->buscar_datos($sql))
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
    $_SESSION["formato"]="";
  }
///////////////

if (!empty($_POST["var"]))
  {
    $var=$_POST["var"];
    if ($var=='C') //CONSULTA
    {
      $codigo=str_pad(strtoupper(trim($_POST["codigo"])),8,'0',STR_PAD_LEFT);
    }
    else if ($var=='1')//PRIMERO
    {
      if ($tb=$z->primerRegistro('cpprecom','refprc'))
      {
        $codigo=str_pad(strtoupper(trim($tb->fields["refprc"])),8,'0',STR_PAD_LEFT);
      }
    }
    else if ($var=='2')//ANTERIOR
    {
      if (!empty($_POST["codigo"]))
      {
        $aux=str_pad(strtoupper(trim($_POST["codigo"])),8,'0',STR_PAD_LEFT);
        //chekeamos q no sea el primero
          $tb=$z->primerRegistro('cpprecom','refprc');
          $codigo=strtoupper(trim($tb->fields["refprc"]));
          if ($aux!=$codigo)
          {
            $tb=$z->anteriorRegistro('cpprecom','refprc',$aux,'N');
          }
             else
          {
             $tb=$z->ultimoRegistro('cpprecom','refprc');
          }
      }
      else
      {
       $tb=$z->ultimoRegistro('cpprecom','refprc');
      }
      if (!$tb->EOF)
      {
        $codigo=strtoupper(trim($tb->fields["refprc"]));
      }
    }
    else if ($var=='3')//SIGUIENTE
    {
      if (!empty($_POST["codigo"]))
      {
        $aux=str_pad(strtoupper(trim($_POST["codigo"])),8,'0',STR_PAD_LEFT);
        //chekeamos q no sea el ultimo
          $tb=$z->ultimoRegistro('cpprecom','refprc');
          $codigo=strtoupper(trim($tb->fields["refprc"]));
          if ($aux!=$codigo)
          {
            $tb=$z->proximoRegistro('cpprecom','refprc',$aux,'N');
          }
          else
          {
            $tb=$z->primerRegistro('cpprecom','refprc');
          }
      }
      else
      {
        $tb=$z->primerRegistro('cpprecom','refprc');
      }
      if (!$tb->EOF)
      {
        $codigo=strtoupper(trim($tb->fields["refprc"]));
      }
    }
    else if ($var=='4')//ULTIMO
    {
      if ($tb=$z->ultimoRegistro('cpprecom','refprc'))
      {
        $codigo=str_pad(strtoupper(trim($tb->fields["refprc"])),8,'0',STR_PAD_LEFT);
      }
    }
      //TRAER DATOS
      $sql="select *,to_char(fecprc,'dd/mm/yyyy') as fecprc from cpprecom where refprc='".$codigo."' ";
      if ($tb=$z->buscar_datos($sql))
      {
        $imec='M';
        $block='S';
        $disp='N';
        $save='S';

        $codigo=$tb->fields["refprc"];
        $fecha=$tb->fields["fecprc"];
        $desc=$tb->fields["desprc"];
        $tippre=$tb->fields["tipprc"];

          $sql2="select nomext from cpdocprc where tipprc='".$tippre."' ";
          if ($tb2=$z->buscar_datos($sql2))
          {
            $nomext=$tb2->fields["nomext"];
          }
          else
          {
            $nomext="";
          }
        $monprc=$tb->fields["monprc"];
        $salaju=$tb->fields["salaju"] * (-1);
        $montoreal = $tb->fields["monprc"] - $tb->fields["salaju"] ;
        $codben=$tb->fields["cedrif"];
          $sql2="select nomben from opbenefi where cedrif='".$codben."' ";
          if ($tb2=$z->buscar_datos($sql2))
          {
            $nomben=$tb2->fields["nomben"];
          }
          else
          {
            $nomben="";
          }
        $status=$tb->fields["staprc"];
        $sql2="select * from cpimpprc where refprc='".$codigo."' ";
        $grid1=array();
        $grid2=array();
        $grid3=array();
        $grid4=array();
        $grid5=array();

        if ($tb2=$z->buscar_datos($sql2))
        {
          $check='1';
          $i=1;
          while (!$tb2->EOF)
          {
            $grid1[$i] = trim($tb2->fields["codpre"]);
            $grid2[$i] = $tb2->fields["monimp"];
            $grid3[$i] = $tb2->fields["moncom"];
            $grid4[$i] = $tb2->fields["moncau"];
            $grid5[$i] = $tb2->fields["monpag"];
            $grid6[$i] = $tb2->fields["monaju"];

            $i=$i+1;
            $tb2->MoveNext();
          }
        }

        $cont=$i-1;
        if ((float)$grid3[1]>0)
        {
          $save='N';
        }
        else
        {
          $save='S';
        }
      }
      else
      {
        $fc='2';
        $save='S';
        $imec='I';
        $block='N';
        $disp='S';
        $check='0';
        $codigo=$codigo;
        $fecha='';
        $desc="";
        $tippre="";
        $nomext="";
        $monprc="";
        $salaju="";
        $codben="";
        $nomben="";
        $status="";
      }

}
else// 1ra vez
{
  $save='S';
  $imec='I';
  $disp='S';
  $fc='1';
  $block='N';
  $check='0';
  $codigo='';
  $fecha='';
  $desc="";
  $tippre="";
  $nomext="";
  $monprc="";
  $salaju="";
  $codben="";
  $nomben="";
  $status="";
}
if (!empty($_POST["var2"]))
  {
    $var2=$_POST["var2"];
    if ($var2=='L')
    {
      $fc='1';
      $disp='S';
      $imec='I';
      $block='N';
      $check='0';
      $codigo='';
      $fecha='';
      $desc="";
      $tippre="";
      $nomext="";
      $monprc="";
      $salaju="";
      $codben="";
      $nomben="";
      $status="";
    }
  }


?>
<script>
    function actualizarsaldos2()
      {
       f=document.form1;
        i=1;
        var acum2=0;
        var acum3=0;
        var acum4=0;
        var acum5=0;

        while (i<=20)
        {
          var x2="x"+i+"2";
          var x3="x"+i+"3";
          var x4="x"+i+"4";
          var x5="x"+i+"5";
          str2= document.getElementById(x2).value.toString();
          str3= document.getElementById(x3).value.toString();
          str4= document.getElementById(x4).value.toString();
          str5= document.getElementById(x5).value.toString();
          str2= str2.replace(',','');
          str3= str3.replace(',','');
          str4= str4.replace(',','');
          str5= str5.replace(',','');
          str2= str2.replace(',','');
          str3= str3.replace(',','');
          str4= str4.replace(',','');
          str5= str5.replace(',','');
          str2= str2.replace(',','');
          str3= str3.replace(',','');
          str4= str4.replace(',','');
          str5= str5.replace(',','');

          var num2=parseFloat(str2);
          var num3=parseFloat(str3);
          var num4=parseFloat(str4);
          var num5=parseFloat(str5);

          acum2=acum2+num2;
          acum3=acum3+num3;
          acum4=acum4+num4;
          acum5=acum5+num5;

          document.getElementById(x2).value=format(num2.toFixed(2),'.','.',',');
          document.getElementById(x3).value=format(num3.toFixed(2),'.','.',',');
          document.getElementById(x4).value=format(num4.toFixed(2),'.','.',',');
          document.getElementById(x5).value=format(num5.toFixed(2),'.','.',',');

          i=i+1;
        }
        document.form1.totmonto.value=format(acum2.toFixed(2),'.','.',',');
        document.getElementById('totcom').value=format(acum3.toFixed(2),'.','.',',');
        document.getElementById('totcau').value=format(acum4.toFixed(2),'.','.',',');
        document.getElementById('totpag').value=format(acum5.toFixed(2),'.','.',',');
        document.getElementById('monprc').value=format(acum2.toFixed(2),'.','.',',');
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
<script language="JavaScript"  src="../../lib/general/js/funciones.js"></script>
<script language="JavaScript"  src="../../lib/general/js/fecha.js"></script>
<script language="JavaScript"  src="../../lib/general/js/datepickercontrol.js"></script>
<script language="JavaScript"  src="../../lib/general/toolbar/js/dhtmlXProtobar.js"></script>
<script language="JavaScript"  src="../../lib/general/toolbar/js/dhtmlXToolbar.js"></script>
<script language="JavaScript"  src="../../lib/general/toolbar/js/dhtmlXCommon.js"></script>
<script type='text/javascript' src='../../lib/general/js/dFilter.js'></script>
<script type="text/JavaScript"  src="../../lib/general/js/prototype.js"></script>

<style type="text/css">
<!--
.style9 {color: #FFFFFF
 }
-->
</style>

<script language="JavaScript" type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
</head>

<body onLoad="MM_preloadImages('../../images/rbut_01_f2.gif','../../images/rbut_02_f2.gif','../../images/rbut_03_f2.gif','../../images/rbut_04_f2.gif')">
<table width="100%" align="center">
  <tr>
<td width="100%">
      <? require_once('../../lib/general/top_p.php'); ?>
    </td>
  </tr>
</table>
<form name="form1" method="post" action="">
  <table align="center" cellpadding="0" cellspacing="0">
  <tr>
  <td height="343" valign="top">
  <table width="592" border="0" align="right" cellpadding="0" cellspacing="0" class="box">
          <!--DWLayoutTable-->
          <tr>
            <td valign="top" class="breadcrumb">SIGA <? echo $modulo; ?></td>
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
          <td align="right" width="61%">


          <?  // MENU PRINCIPAL  // ?>
          <div  align="center" id="toolbar_zone2" style="border :0px solid Silver;"/>
        </td>
      </tr>
    </table>
        </td>
      </tr>
      <tr>
        <td class="box">
        <table width="100%" align="center" cellpadding="0" cellspacing="0" class="bodyline">
                <!--DWLayoutTable-->
                <tr valign="middle">
                    <td height="24" colspan="8" class="form_label_01">
              <table border="0" cellspacing="0" cellpadding="0" width="100%">
                      <tr>
                        <td width="76">Referencia:</td>
                        <td width="61">
                          <? if ($block=='N') { ?>
                          <input name="codigo" type="text" onblur="if (document.getElementById('codigo').value!=''){ document.getElementById('codigo').value=document.getElementById('codigo').value.pad(8,'0',0); document.getElementById('var').value='C'; f.submit(); }else{ document.getElementById('codigo').value=document.getElementById('codigo').value.pad(8,'#',0); }" id="codigo" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" onKeyPress="buscarenter(event)" value="<? print $codigo;?>" size="8" maxlength="8" onmouseout="this.className='imagenInicio'" onmouseover="this.className='imagenFoco'" class="imagenInicio">
                          <? } else {?>
                          <input name="codigo" type="text" id="codigo" value="<? print $codigo;?>" size="8" maxlength="8" readonly="true" class="imagenInicio">
                          <? } ?>
                        </td>
                        <td width="219"> <div align="center"><strong><font color="#0000CC" size="2" face="Verdana, Arial, Helvetica, sans-serif">
                            <? if ($status=='N')
                      {
                      $sql2="select to_char(fecanu,'dd/mm/yyyy') as fecanu from cpprecom where refprc='".$codigo."'";
                      if ($sqlanu=$z->buscar_datos($sql2))
                      {
                        print "ANULADO EL ".$sqlanu->fields["fecanu"];
                      }
                      else
                      {
                        print "ANULADO";
                      }
                      }
                ?>
                        </font></strong></div></td>
                        <td width="53">&nbsp;</td>
                        <td width="158"> <div align="right">Fecha:
                            <? if ($block=='N') { ?>
                            <input name="fecha" type="text"  id="fecha" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $fecha;?>" size="10" onKeyUp = "this.value=formateafecha(this.value);" onBlur="validar_fecha()" onmouseout="this.className='imagenInicio'" onmouseover="this.className='imagenFoco'" class="imagenInicio">
                            <? } else { ?>
                            <input name="fecha" type="text" id="fecha" value="<? print $fecha;?>" size="10" onKeyUp = "this.value=formateafecha(this.value);" readonly="true" class="imagenInicio">
                            <? } ?>
                        </div></td>
                        <td width="13">&nbsp;</td>
                      </tr>
                    </table>
          </td>
                </tr>
                <tr valign="middle">
                  <td width="80" height="22" valign="top" class="form_label_01">Descripci&oacute;n:</td>
                  <td colspan="7" class="form_label_01">
            <textarea name="desc" cols="88" rows="2" wrap="VIRTUAL" id="desc" onmouseout="this.className='imagenInicio'" onmouseover="this.className='imagenFoco'" class="imagenInicio"><? print $desc;?></textarea></td>
        </tr>
                <tr>
                  <td height="22" colspan="8" class="form_label_01"><table width="100%" border="0">
                      <tr>
                        <td width="50%">
                          <fieldset>
                          <legend>&nbsp;Tipo Precompromiso&nbsp;&nbsp;</legend>
                          <table cellpadding="2" cellspacing="1" >
                            <tr valign="middle">
                              <td width="6" class="form_label_01"><div align="right"></div></td>
                              <td width="193">C&oacute;digo:
                                <input name="tippre" type="text"  class="imagenInicio" id="tippre" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $tippre;?>" size="4" maxlength="10" onKeyPress="enterA(event,'tippre','nomext','codben')">
                                <input name="Button" type="button" class="botton" value="..." onClick="catalogoA('tippre','nomext','codben','C');"></td>
                              <td width="5">&nbsp; </td>
                              <td width="1">&nbsp;</td>
                            </tr>
                            <tr>
                              <td colspan="4"><input name="nomext" type="text"  class="imagenInicio" id="nomext" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $nomext;?>" size="44" readonly="true"></td>
                            </tr>
                          </table>
                          </fieldset></td>
                        <td width="50%">
                          <fieldset>
                          <legend>&nbsp;Saldos&nbsp;&nbsp;</legend>
                          <table cellpadding="2" cellspacing="1">

                            <tr valign="middle">
                              <td>Ajustado:</td>
                              <td><input name="salaju" type="text"  class="imagenInicio1" id="salaju" value="<? print number_format($salaju,2,'.',',');?>" size="20" readonly="true"></td>
                              <td class="form_label_01">Bs</td>
                            </tr>


                            <tr valign="middle">
                              <td class="form_label_01">Precompromiso: </td>
                              <td class="form_label_01">
<input name="salpre" type="text" readonly="true" class="imagenInicio1" id="salpre" value="<? print number_format($montoreal,2,'.',',');?>" size="20"></td>
                              <td class="form_label_01">Bs</td>
                            </tr>


                          </table>
                          </fieldset></td>
                      </tr>
                    </table></td>
                </tr>
                <tr valign="middle">
                  <td height="24" colspan="8" class="form_label_01"><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td>Cod Beneficiario:</td>
                        <td>
<input name="codben" type="text"  class="imagenInicio" id="codben" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $codben;?>" size="13" maxlength="15" onKeyPress="enterB(event,'codben','nomben','x11')">
                          <input name="Submit2" type="button" class="botton" value="..." onClick="catalogoB('codben','nomben','x11','C');"></td>
                        <td>
<div align="right">
                            <input name="nomben" type="text"  class="imagenInicio" id="nomben" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $nomben;?>" size="48" readonly="true">
                          </div></td>
                      </tr>
                      <tr>
                        <td>Monto Precompromiso:</td>
                        <td><input name="monprc" type="text"  class="imagenInicio1" id="monprc" value="<? print number_format($monprc,2,'.',',');?>" size="17" readonly="true"></td>
                        <td>
            <div align="right">
            <? if ($disp=='S') { ?>
            Disponible
                            <input name="disp" type="text"  class="imagenInicio1" id="disp" value="<? print number_format($disp,2,'.',',');?>" size="20" readonly="true">
            <? } else { ?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="20" name="disp" id="disp" class="escondido" readonly="true">
            <? } ?>
                        </div>
              </td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td height="0"></td>
                  <td width="238"></td>
                  <td width="42"></td>
                  <td width="42"></td>
                  <td width="42"></td>
                  <td width="42"></td>
                  <td width="42"></td>
                  <td width="52"></td>
                </tr>
              </table>
  </td>
  </tr>
  <tr>
    <td><table width="586" border="0" class="recuadro">
                <tr>
                  <td width="26" class="tpButtons">
          <? if ($block=='N') {?>
            <a href='javascript: catalogogrid(1,1,2,"G");'><img src="../../lib/general/toolbar/imgs/iconNewNewsEntry.gif" width="16" height="16"></a>
          <? } else {?>
            <img src="../../lib/general/toolbar/imgs/iconNewNewsEntry.gif" width="16" height="16">
          <? } ?>
          </td>
                  <td width="548" class="tpButtons">IMPUTACIONES PRESUPUESTARIAS</td>
      </tr>
      <tr>
        <td colspan="4">
  <table border="0" cellpadding="0" cellspacing="0">
                      <tr valign="bottom" bgcolor="#ECEBE6">
                        <td height="1">
                          <div class="grid01" id="grid01">
                  <table  border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td class="queryheader" >&nbsp;</td>
                      <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;&nbsp;C&oacute;digo Presupuestario </td>
                      <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;&nbsp;Monto</td>
                      <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;&nbsp;Comprometido</td>
                      <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">Causado</td>
                      <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">Pagado</td>
                      <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">Ajuste</td>
                 </tr>
              <?
              ////////   //////////
        if ($check!='1')
        {
          $i=1;
          while ($i<=20)
          {
           ?>
              <tr>
                <td class="grid_line01_br"><input name="x<? print $i;?>0" type="txt" class="imagenborrar" id="x<? print $i;?>0" onClick="eliminar(<? print $i;?>,5)" value="" size="1" ></td>
                <td  align="left" class="grid_line01_br"><input name="x<? print $i;?>1" id="x<? print $i;?>1" type="text" class="grid_txt01" size="32" onKeyDown="javascript:return dFilter (event.keyCode, this,'<?print $_SESSION["formato"];?>');" align="right"  value="" onKeyPress="enterGRID(event,this.id,'trash','x<? print $i;?>2');" onFocus="document.getElementById('getf').value='S'"></td>
                <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>2" id="x<? print $i;?>2" type="text" class="grid_txt02" size="15" value="<? print number_format(0,2,'.',','); ?>" align="right" onFocus="dispo('x<? print $i;?>1','x<? print $i;?>2','disp','x<? print $i;?>2')" onBlur="document.getElementById('getf').value='S'" onKeyPress="entermonto(event,'x<? print $i;?>1',this.id,'x<? print $i+1;?>1')"></td>
                <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>3" id="x<? print $i;?>3" type="text" class="breadcrumbv2" size="15" value="<? print number_format(0,2,'.',','); ?>" align="right" readonly="true"></td>
                <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>4" id="x<? print $i;?>4" type="text" class="breadcrumbv2" size="15" value="<? print number_format(0,2,'.',','); ?>" align="right" readonly="true"></td>
                <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>5" id="x<? print $i;?>5" type="text" class="breadcrumbv2" size="15" value="<? print number_format(0,2,'.',','); ?>" align="right" readonly="true"></td>
                <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>6" id="x<? print $i;?>6" type="text" class="breadcrumbv2" size="15" value="<? print number_format(0,2,'.',','); ?>" align="right" readonly="true"></td>
                </tr>
          <?
          $i=$i+1;
          }
        }
        else
        {
          $i=1;
          while ($i<=$cont)
          {
              ?>
              <tr>
                <td class="grid_line01_br"><input name="x<? print $i;?>0" type="txt" class="imagenborrar" id="x<? print $i;?>0" onClick="eliminar(<? print $i;?>,5)" value="" size="1" ></td>
                <td  align="left" class="grid_line01_br"><input name="x<? print $i;?>1" id="x<? print $i;?>1" type="text" class="grid_txt01" size="32" value="<? print $grid1[$i]; ?>" align="right"  tabindex="2"  readonly="true"></td>
                <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>2" id="x<? print $i;?>2" type="text" class="breadcrumbv2" size="15" value="<? print number_format($grid2[$i],2,'.',','); ?>" align="right" onKeyPress="actualizar_saldos(event,this.id)" tabindex=""  readonly="true"></td>
                <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>3" id="x<? print $i;?>3" type="text" class="breadcrumbv2" size="15" value="<? print number_format($grid3[$i],2,'.',','); ?>" align="right" onKeyPress="actualizar_saldos(event,this.id)" tabindex=""  readonly="true"></td>
                <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>4" id="x<? print $i;?>4" type="text" class="breadcrumbv2" size="15" value="<? print number_format($grid4[$i],2,'.',','); ?>" align="right"  onKeyPress="actualizar_saldos()" tabindex=""  readonly="true"></td>
                <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>5" id="x<? print $i;?>5" type="text" class="breadcrumbv2" size="15" value="<? print number_format($grid5[$i],2,'.',','); ?>" align="right" tabindex=""  readonly="true"></td>
                <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>6" id="x<? print $i;?>6" type="text" class="breadcrumbv2" size="15" value="<? print number_format($grid6[$i],2,'.',','); ?>" align="right" tabindex=""  readonly="true"></td>
                </tr>
            <?
          $i=$i+1;
          }
          //$i=$i+1;
          while ($i<=20)
          {
          ?>
              <tr>
                <td class="grid_line01_br"><input name="x<? print $i;?>0" type="txt" class="imagenborrar" id="x<? print $i;?>0" onClick="eliminar(<? print $i;?>,5)" value="" size="1" ></td>
                <td  align="left" class="grid_line01_br"><input name="x<? print $i;?>1" id="x<? print $i;?>1" type="text" class="grid_txt01" size="32" value="" align="right"  tabindex="2"  readonly="true"></td>
                <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>2" id="x<? print $i;?>2" type="text" class="breadcrumbv2" size="15" value="<? print number_format(0,2,'.',','); ?>" align="right" onKeyPress="actualizar_saldos(event,this.id)" tabindex=""  readonly="true"></td>
                <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>3" id="x<? print $i;?>3" type="text" class="breadcrumbv2" size="15" value="<? print number_format(0,2,'.',','); ?>" align="right" onKeyPress="actualizar_saldos(event,this.id)" tabindex=""  readonly="true"></td>
                <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>4" id="x<? print $i;?>4" type="text" class="breadcrumbv2" size="15" value="<? print number_format(0,2,'.',','); ?>" align="right"  onKeyPress="actualizar_saldos()" tabindex=""  readonly="true"></td>
                <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>5" id="x<? print $i;?>5" type="text" class="breadcrumbv2" size="15" value="<? print number_format(0,2,'.',','); ?>" align="right" tabindex=""  readonly="true"></td>
                <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>6" id="x<? print $i;?>6" type="text" class="breadcrumbv2" size="15" value="<? print number_format(0,2,'.',','); ?>" align="right" tabindex=""  readonly="true"></td>
                </tr>

           <?
          $i=$i+1;
          }
        }
        ?>
          </table>
                    </div></td>
                </tr>
              </table>
    </td>
      </tr>
      <tr>
        <td height="100%" colspan="4"><table border="0" align="right">
                      <tr class="queryheader">

                        <td class="tpHead" width="110">
                          <div align="center">Totales</div></td>
                        <td>
                          <div align="right">
                            <input name="totmonto" type="text" class="cajadetextosimple" id="totmonto" size="16" readonly="true">
                          </div></td>
                        <td>
                          <div align="right">
                            <input name="totcom" type="text" class="cajadetextosimple" id="totcom" size="17" readonly="true">
                          </div></td>
                        <td>
                          <div align="right">
                            <input name="totcau" type="text" class="cajadetextosimple" id="totcau" size="15" readonly="true">
                          </div></td>
                        <td>
                          <div align="right">
                            <input name="totpag" type="text" class="cajadetextosimple" id="totpag" size="15" readonly="true">
                          </div></td>
                        <td>&nbsp;&nbsp;</td>
                      </tr>
                    </table></td>
                </tr>
        </table>

   </td>
  </tr>
  <tr>
            <td class="breadcrumb"><span class="style13">Registro de <? echo $forma; ?>...
              <?  ///// variable oculta que se necesita para guardar //// ?>
              <input name="fecini" type="hidden" id="fecini" value="<? //echo $fecini; ?>" />
              <?  /////////////////////////////////////////////////////// ?>
              <input name="save" type="hidden" id="save" value="<? print $save;?>">
        <input name="save2" type="hidden" id="save2" value="<? print $save2;?>">
              <input name="trash" type="hidden" id="trash">
              <input name="getf" type="hidden" id="getf" value="S">
              <input name="del" type="hidden" id="del" value="N">
              <input type="hidden" name="var" id="var" />
              <input type="hidden" name="var2" id="var2" />
              </span></td>
  </tr>
</table>
</td>
 </tr>
</table>
<script>
  fc='<? print $fc; ?>';
  if (fc=='1')
  {
    document.getElementById('codigo').focus();
  }
  else if (fc=='2')
  {
    document.getElementById('fecha').focus();
  }
  actualizarsaldos2();
</script>
</form>
<? require_once('../../lib/general/bottom.php'); ?>
</body>
<script language="JavaScript">

  function primero()
      {
      f=document.form1;
      //f.action="PrePrecom.php?var=<? print '1';?>";
      document.getElementById('var').value='1';
      f.submit();
     }
     function anterior()
      {
      f=document.form1;
      //f.action="PrePrecom.php?var=<? print '2';?>";
      document.getElementById('var').value='2';
      f.submit();
     }
     function siguiente()
      {
      f=document.form1;
      //f.action="PrePrecom.php?var=<? print '3';?>";
      document.getElementById('var').value='3';
      f.submit();
     }
     function ultimo()
      {
      f=document.form1;
      //f.action="PrePrecom.php?var=<? print '4';?>";
      document.getElementById('var').value='4';
      f.submit();
     }

  function buscarenter(e)
      {
    f=document.form1;
        if ((e.keyCode==13) && (f.codigo.value!=""))
      {
        //f.action="PrePrecom.php?var=<? echo 'C'; ?>";
        document.getElementById('var').value='C';
        f.submit();
      }
     }

     function enterA(e,id,donde,foco)
    {
      if (e.keyCode==13)
      {
        aux= document.getElementById('tippre').value.toUpperCase();
        document.getElementById('tippre').value=aux.toUpperCase();
        if (aux!="")
        {
          f=document.form1;
          cuantos='1';
          sql='select tipprc as codigo, nomext as campo1 from cpdocprc where trim(tipprc)=trim(�'+aux+'�) order by tipprc';
          pagina="gridatos.php?cuantos="+cuantos+"&id="+id+"&donde="+donde+"&foco="+foco+"&sql="+sql;
          window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=no,width=50,height=50,resizable=no,left=100,top=300");
        }
      }
    }

     function catalogoA(c1,c2,fc,tipo)
     {
      f=document.form1;
      campo=c1;
      campo2=c2;
      foco=fc;
      //sql='select tipprc as codigo,nomext as nombre_extendido, nomabr as nombre_abreviado from Cpdocprc where tipprc like(�%�) order by tipprc';
      //pagina="catalogo2.php?campo="+campo+"&campo2="+campo2+"&sql="+sql+"&foco="+foco+"&tipo="+tipo;
      //window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=580,height=490,resizable=yes,left=50,top=50");

           var host = '<? echo $_SERVER["HTTP_HOST"]; ?>';
          pagina='http://'+host+'/herramientas_dev.php/generales/catalogo/metodo/Preprecom_Cpdocprc/clase/Cpdocprc/frame/form1/obj1/'+campo+'/obj2/'+campo2+'/campo1/tipprc/campo2/nomext/submit/false';
          window.open(pagina,"true","menubar=no,toolbar=no,scrollbars=yes,width=490,height=490,resizable=yes,left=500,top=80");

     }

     function enterB(e,id,donde,foco)
    {
      if (e.keyCode==13)
      {
        aux= document.getElementById('codben').value.toUpperCase();
        document.getElementById('codben').value=aux.toUpperCase();
        if (aux!="")
        {
          f=document.form1;
          cuantos='1';
          sql='select nomben as campo1 from opbenefi where trim(cedrif)=trim(�'+aux+'�) order by cedrif';
          pagina="gridatos.php?cuantos="+cuantos+"&id="+id+"&donde="+donde+"&foco="+foco+"&sql="+sql;
          window.open(pagina,"","menubar=no,toolbar=no,scrollbars=no,width=50,height=50,resizable=no,left=100,top=300");
        }
      }
    }

     function catalogoB(c1,c2,fc,tipo)
     {
      f=document.form1;
      campo=c1;
      campo2=c2;
      foco=fc;
      //sql='select cedrif as cedula_rif, nomben as nombre, dirben as dirección from Opbenefi where cedrif like upper(�%�) order by cedrif';
      //pagina="catalogo2.php?campo="+campo+"&campo2="+campo2+"&sql="+sql+"&foco="+foco+"&tipo="+tipo;
      //window.open(pagina,"","menubar=no,toolbar=no,scrollbars=yes,width=580,height=490,resizable=yes,left=50,top=50");

           var host = '<? echo $_SERVER["HTTP_HOST"]; ?>';
          pagina='http://'+host+'/herramientas_dev.php/generales/catalogo/metodo/Preprecom_Opbenefi/clase/Opbenefi/frame/form1/obj1/'+campo+'/obj2/'+campo2+'/campo1/cedrif/campo2/nomben/submit/false';
          window.open(pagina,"true","menubar=no,toolbar=no,scrollbars=yes,width=490,height=490,resizable=yes,left=500,top=80");

     }

     function catalogogrid(c1,c2,fc,tipo)
     {
      f=document.form1;

      i=1;
      while (i<=20)
      {
        var x="x"+i+c1;
        var y="x"+i+c2;
        if (document.getElementById(x).value=="")
        {
          if (i==1)
          {
            campo="x1"+c1;
            campo2="x1"+c2;
            foco="x1"+fc;
            i=20;
          }
          else
          {
            campo=x;
            campo2=y;
            foco="x"+i+fc;
            i=20;
          }
        }
        i=i+1;
      }
      document.getElementById('getf').value="S";
      campo2='trash';
      //sql='select a.codpre as codigo, a.nompre as descripcion from cpasiini a, cpdefniv b where length(rtrim(a.codpre))= length(rtrim(b.forpre)) and a.perpre=�00� and a.mondis > 0 and UPPER(a.nompre) like upper(�%�) order by a.codpre';
      //pagina="catalogo2.php?campo="+campo+"&campo2="+campo2+"&sql="+sql+"&foco="+foco+"&tipo="+tipo;
      //window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=580,height=400,resizable=yes,left=50,top=50");

           var host = '<? echo $_SERVER["HTTP_HOST"]; ?>';
          pagina='http://'+host+'/herramientas_dev.php/generales/catalogo/metodo/Preprecom_Cpasiini/clase/Cpasiini/frame/form1/obj1/'+campo+'/obj2/'+campo2+'/campo1/codpre/campo2/nompre/submit/false';
          window.open(pagina,"true","menubar=no,toolbar=no,scrollbars=yes,width=490,height=490,resizable=yes,left=500,top=80");

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
              cuantos='1';
              //sql="select codpre as codigo, nompre as descripcion from cpdeftit a, cpdefniv b where length(rtrim(a.codpre))= length(rtrim(b.forpre)) and trim(codpre)= trim(�"+cadena+"�) order by a.codpre";
              sql="select mondis as campo1 from cpasiini where trim(codpre) = trim(�"+cadena+"�) and perpre=�00� and mondis > 0";
            //  alert(sql);
              pagina="gridatos.php?cuantos="+cuantos+"&id="+id+"&donde="+donde+"&foco="+foco+"&sql="+sql;
              window.open(pagina,"","menubar=no,toolbar=no,scrollbars=no,width=50,height=50,resizable=no,left=100,top=300");
            }
          }
        }
     }

     function dispo(cod,monto,donde,foco)
     {
       r=document.getElementById(cod).value.substring(0,1);//verificamos q no sean puras rayitas

         if ((document.getElementById(cod).value!="") && (r!='-') && (document.getElementById('getf').value=='S'))
      {
        mon= document.getElementById(monto).value.toString();
        mon= mon.replace(',','');
        mon= mon.replace(',','');
        mon= mon.replace(',','');
        aux=document.getElementById(cod).value;
        cuantos="disp";
        cadena=rayitasfc(aux);
        fecha=document.getElementById('fecha').value;
        anocierre='<? print $anocierre;?>';
        prenivdis='<? print $prenivdis;?>';
        codigo=document.getElementById(cod).value;
        sql="select mondis as campo1 from cpasiini where trim(codpre) = trim(�"+cadena+"�) and perpre=�00�";
        pagina="gridatos.php?cuantos="+cuantos+"&id="+monto+"&donde="+donde+"&foco="+foco+"&sql="+sql+"&mon="+mon+"&fecha="+fecha+"&anocierre="+anocierre+"&prenivdis="+prenivdis+"&codigo="+codigo;
        window.open(pagina,"","menubar=no,toolbar=no,scrollbars=no,width=50,height=50,resizable=no,left=300,top=300");
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

    function resta_disp(id)
    {
      disp=document.getElementById('disp').value;
      mon=document.getElementById(id).value;
      strd= disp.toString();
      strm= mon.toString();
      strd= strd.replace(',','');
      strd= strd.replace(',','');
      strd= strd.replace(',','');
      strm= strm.replace(',','');
      strm= strm.replace(',','');
      strm= strm.replace(',','');
      numd=parseFloat(strd);
      numm=parseFloat(strm);
      dif=numd-numm;
      document.getElementById('disp').value=format(dif.toFixed(2),'.','.',',');
     // document.getElementById('tippre').focus();
     // document.getElementById(id).focus();
    }

    function entermonto(e,cod,id,fc)
    {
      if (e.keyCode==13)
      {

        if ((validarnumero(id)==true) && (document.getElementById(id).value>0))
        {
          document.getElementById('getf').value='S'
          dispo(cod,id,'disp',fc);
          resta_disp(id);
          focos(e,fc);
          actualizarsaldos(e);
        }
        else
        {
          document.getElementById(id).value='0.00';
          document.getElementById(id).focus();
          document.getElementById(id).select();
        }
      }
    }

     function repetido2(id,id2)
    {
      f=document.form1;
      chk="N";
       if (parseInt(id.length)==3)
      {
        j=parseInt(id.substring(1,2));
      }
      else
      {
        j=parseInt(id.substring(1,3));
      }
      //j=parseInt(id.substring(1,2));
      val=document.getElementById(id).value;
      if (val!="")
      {
          if (j!=1)
          {
            i=1;
             while (i<=20)
              {
                var x="x"+i+"1";
                if (j!=i)
                {
                  if (val==document.getElementById(x).value)
                  {
                    aux= j-1;
                    aux= "x"+aux+"2";
                    document.getElementById(id).value="";
                    document.getElementById(id2).value="";
                    alert("El código presupuestario está repetido");
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
        return false;
      }
    }

    function validar_fecha()
    {
      f=document.form1;
      fecha=document.getElementById('fecha').value;
      if (fecha.length==10)
      {
        f=document.form1;
        pagina="validar.php?fecha="+f.fecha.value;
        window.open(pagina,"validar","menubar=no,toolbar=no,scrollbars=no,width=50,height=50,resizable=yes,left=350,top=300");
      }
      else
      {
        //alert("Longitud de Fecha inválida");
        document.getElementById('fecha').value=mostrarfecha();
        document.getElementById('fecha').focus();
      }

    }

   function cancelar()
     {
         f=document.form1;
      //f.action="PrePrecom.php?var2=<? print 'L';?>";
      document.getElementById('var2').value='L';

      f.submit();
     }

  function anueli()
  {
    f=document.form1;
    status='<?=$status;?>';
    pagina="eliminarPrePrecom.php?ref="+f.codigo.value+"&status="+status+"&totcom="+f.totcom.value+"&fecha="+f.fecha.value;
    window.open(pagina,"","menubar=no,toolbar=no,scrollbars=no,width=200,height=20,resizable=yes,left=350,top=300");
  }

  function salvar()
    {
      f=document.form1;
      save='<? print $save;?>';
      if (save=='S')
      {
        if(confirm("¿Realmente desea Salvar?"))
        {
          ver1=montos();
          ver2=verificar();
          if ( ver1 && ver2 )
          {
            imec='<? print $imec;?>';
            f.action="imecPrePreCom.php?imec="+imec;
            f.submit();
          }
        }
      }
    }

  function montos()
  {
    monto=true;
    vacio=false;
    i=1;
    while ( (i<=20) && (!vacio) )
    {
      var x="x"+i+"1"; //codpre
      var y="x"+i+"2"; // monto
        // 	chequeamos que tenga codigo presup.
        if ( (document.getElementById(x).value!='') && (document.getElementById(x).value.substr(0,1)!='-') )
        {
          // chequeamos que el monto no sea CERO.
          if (document.getElementById(y).value=='0.00' || document.getElementById(y).value=='')
          {
            alert('El monto de la fila '+i+' esta en 0 bs. o vacío');
            monto=false;
          }
        }
        else
        {
          vacio=true;
        }
      i=i+1;
    }
    return monto;
  }

  function verificar()
    {
      f=document.form1;

      if (!verificar_campo_clave(0,f.codigo.value,"No puede salvar sin introducir la Referencia del Precompromiso"))
      {
        return false;
      }
      else if (!verificar_campo_clave(0,f.fecha.value,"No puede salvar sin introducir la Fecha del Precompromiso"))
      {
        return false;
      }
      else if (!verificar_campo_clave(0,f.desc.value,"No puede salvar sin introducir la Descripción del Precompromiso"))
      {
        return false;
      }
      else if (!verificar_campo_clave(0,f.tippre.value,"No puede salvar sin introducir el Tipo de Precompromiso"))
      {
        return false;
      }
      else if (!verificar_campo_clave(0,f.codben.value,"No puede salvar sin introducir el Codigo del Beneficiario"))
      {
        return false;
      }
      else if (!verificar_campo_clave(0,f.nomben.value,"No puede salvar sin introducir el Nombre del Beneficiario"))
      {
        return false;
      }
      else if (!verificar_campo_clave(0,document.getElementById('x11').value,"No puede salvar sin introducir el Codigo Presupuestario"))
      {
        return false;
      }

      else if ((f.totmonto.value=='') || (f.totmonto.value=='0.00'))
      {
        return false;
      }
      else
      {
        return true;
      }

    }

  function actualizarsaldos(e)
      {
    if (e.keyCode==13)
    {
       f=document.form1;
        i=1;
        var acum=0;
        var acum2=0;
        var acum3=0;
        var acum4=0;
        var acum5=0;
        while (i<=20)
        {
          var x2="x"+i+"2";
          var x3="x"+i+"3";
          var x4="x"+i+"4";
          var x5="x"+i+"5";
          str2= document.getElementById(x2).value.toString();
          str3= document.getElementById(x3).value.toString();
          str4= document.getElementById(x4).value.toString();
          str5= document.getElementById(x5).value.toString();
          str2= str2.replace(',','');
          str3= str3.replace(',','');
          str4= str4.replace(',','');
          str5= str5.replace(',','');
          str2= str2.replace(',','');
          str3= str3.replace(',','');
          str4= str4.replace(',','');
          str5= str5.replace(',','');
          str2= str2.replace(',','');
          str3= str3.replace(',','');
          str4= str4.replace(',','');
          str5= str5.replace(',','');

          var num2=parseFloat(str2);
          var num3=parseFloat(str3);
          var num4=parseFloat(str4);
          var num5=parseFloat(str5);

          acum2=acum2+num2;
          acum3=acum3+num3;
          acum4=acum4+num4;
          acum5=acum5+num5;

          document.getElementById(x2).value=format(num2.toFixed(2),'.','.',',');
          document.getElementById(x3).value=format(num3.toFixed(2),'.','.',',');
          document.getElementById(x4).value=format(num4.toFixed(2),'.','.',',');
          document.getElementById(x5).value=format(num5.toFixed(2),'.','.',',');
          document.getElementById('monprc').value=format(acum2.toFixed(2),'.','.',',');
          i=i+1;
        }
        document.form1.totmonto.value=format(acum2.toFixed(2),'.','.',',');
        document.form1.totcom.value=format(acum3.toFixed(2),'.','.',',');
        document.form1.totcau.value=format(acum4.toFixed(2),'.','.',',');
        document.form1.totpag.value=format(acum5.toFixed(2),'.','.',',');
      }
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
          if ( (col==2) || (col==3) || (col==4) || (col==5))
          {
            document.getElementById(y).value="0.00";
          }
          else
          {
            document.getElementById(y).value="";
          }
        }

      }
      //ultima fila
      if (i==20)
      {
        for (col=0;col<=c;col++)
        {
          var x="x"+i+col;
          if ( (col==2) || (col==3) || (col==4) || (col==5))
          {
            document.getElementById(y).value="0.00";
          }
          else
          {
            document.getElementById(y).value="";
          }
        }

      }//if (fila==20)
     actualizarsaldos2();
     }

  function onButtonClick(itemId,itemValue)// TOOLBAR
    {
      f=document.form1;

      if(itemId == '0_ojo'){
        //alert("Usted vera una Consulta");
        catalogo2('mcodigo','x','mcodigo');  // campo, x = que no devuelva nada en el 2do campo, mcodigo = foco
      }
      /////////////////////
      else if(itemId == '0_cancelar')
           {
               cancelar();
           }

      else if(itemId == '0_save')
      {
        salvar();
      }
      //////////////////////////
      else if(itemId == '0_print'){
          print();
      }
      else if(itemId == '0_new'){
        alert("Nuevo Formulario");
      }
      else if(itemId == '0_form'){
        alert("Modificar Formulario");
      }
      else if(itemId == '0_search'){
        consulta();
      }
      else if(itemId == '0_filter'){
        alert("Filtro");
      }
      else if(itemId == '0_cancelar'){
        cancelar();
      }
      else if(itemId == '0_delete')
      {
        anueli();
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

       function consulta()
      {
          var host = '<? echo $_SERVER["HTTP_HOST"]; ?>';
          f=document.form1;
          document.getElementById('var').value='C';
          //var campo2='desc';
          //var campo='codigo';
          //var foco='submit';
         // sql='Select refprc as Codigo, desprc as Descripcion from cpprecom where upper(desprc) like upper(�%�) order by refprc';
         // pagina="catalogo2.php?campo="+campo+"&campo2="+campo2+"&sql="+sql+"&foco="+foco;

          pagina='http://'+host+'/herramientas_dev.php/generales/catalogo/metodo/Cpprecom_Preprecom/clase/Cpprecom/frame/form1/obj1/codigo/obj2/desc/campo1/refprc/campo2/desprc/submit/true';
          window.open(pagina,"true","menubar=no,toolbar=no,scrollbars=yes,width=490,height=490,resizable=yes,left=500,top=80");

     }



</script>
</html>