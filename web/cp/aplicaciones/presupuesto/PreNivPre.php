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
require_once($_SESSION["x"].'lib/bd/basedatosAdo.php');
require_once($_SESSION["x"].'lib/general/funciones.php');
require_once($_SESSION["x"].'lib/general/tools.php');
validar(array(8,11,15));            //Seguridad  del Sistema
$codemp=$_SESSION["codemp"];
$bd=new basedatosAdo($codemp);
$z= new tools();

$modulo="";
$forma="Niveles Presupuestarios";
$modulo=$_SESSION["modulo"] . " > Def. Especificas > ".$forma;


  if (!empty($_GET["var"]))
  {
    $var=$_GET["var"];
      if ($var=='L')
      {
        //Limpiar
        $numreg=0;
        $imec="";
        $check="0";
      }
  }

  //Limpiar
  $numreg=0;
  $imec="";
  $check="0";

  //ACTIVATE//
  $sql="select * from cpdefniv";
  $tb=$bd->select($sql);
  $tb2=$bd->select($sql);
  if (!$tb->EOF)
  {
    $numreg=1;
  }
  else
  {
    $numreg=0;
  }
  //Close($tb);
  $numreg."--";
  if ($numreg>0)
  {
    $imec="M";
    $check='1';
  }
  else
  {
    $imec="I";
    $check='0';
  }

  $sql="select * from empresa where codemp='001'";
  if ($tb=$z->buscar_datos($sql))
  {
    $empresa=$tb->fields["nomemp"];
  }
  /////////////

  if ($check=='1')
  {
    //Datos Cabecera
    $sql="select *, forpre,to_char(fecini,'dd/mm/yyyy') as fecini,to_char(feccie,'dd/mm/yyyy') as feccie,
      to_char(fecper,'dd/mm/yyyy') as fecper
      from cpdefniv where codemp='001'";
    if ($tb=$z->buscar_datos($sql))
    {
      $clacat=trim((String)$tb->fields["rupcat"]);
      $clapar=trim((String)$tb->fields["ruppar"]);
      $nivel=trim((String)$tb->fields["nivdis"]);
      $formato=trim($tb->fields["forpre"]);
      $fecha1=$tb->fields["fecini"];
      $fecha2=$tb->fields["feccie"];
      $fecha3=$tb->fields["fecper"];
      $numper=trim((String)$tb->fields["numper"]);
      $corr=trim($tb->fields["coraep"]);
      //$tiptraprc=trim($tb->fields["tiptraprc"]);
      $corprc=$tb->fields["corprc"];
      $asiper=$tb->fields["asiper"];
      $corcom=$tb->fields["corcom"];
      $corcau=$tb->fields["corcau"];
      $corpag=$tb->fields["corpag"];
      $corsoltra=$tb->fields["corsoltra"];
      $cortrasla=$tb->fields["cortrasla"];
      $corsoladidis=$tb->fields["corsoladidis"];
      $coradidis=$tb->fields["coradidis"];
      $coraju=$tb->fields["coraju"];

    }

    // Datos Grid y llenamos las cajitas aux para el codigo presupuestario
    $grid1=array();
    $grid2=array();
    $grid3=array();
    $grid4=array();
    $arre=array();
    $sql="select * from cpniveles order by consec";
    $tb=$bd->select($sql);
    $cont=0;
    while (!$tb->EOF)
    {
      $cont=$cont+1;
      $grid1[$cont]=$tb->fields["catpar"];
      $grid2[$cont]=$tb->fields["lonniv"];
      $grid3[$cont]=trim($tb->fields["nomabr"]);
      $grid4[$cont]=trim($tb->fields["nomext"]);
      ////////////////
      $i=1;
      $numeral="";
      while ($i<=intval($tb->fields["lonniv"]))
      {
        $numeral=$numeral."#";
        $i=$i+1;
      }

        if ($tb->fields["consec"]>1)
        {
          $numeral="-".$numeral;
        }

      $arre[$cont]=$numeral;
      ////////////////

      $tb->MoveNext();
    }



  }
  else
  {
    //$empresa="";
    $clacat="";
    $clapar="";
    $nivel="";
    $formato="";
    $fecha1="";
    $fecha2="";
    $fecha3="";
    $numper="1";
    $corr="0";
    $tiptraprc="";
    $asiper="";
    $cont=0;

      $corprc=0;
      $corcom=0;
      $corcau=0;
      $corpag=0;
      $corsoltra=0;
      $cortrasla=0;
      $corsoladidis=0;
      $coradidis=0;
      $coraju=0;


    while ($cont<=20)
    {
      $cont=$cont+1;
      $grid1[$cont]="";
      $grid2[$cont]="";
      $grid3[$cont]="";
      $grid4[$cont]="";
    }
  }




?>
<!--DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
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
<script type='text/javascript' src='../../lib/general/js/funciones.js'></script>
<script type="text/JavaScript"  src="../../lib/general/js/prototype.js"></script>
<script type="text/javascript" src="../../lib/general/js/tabber.js"></script>

</head>

<body>
<form name="form1" method="post" action="">
<table width="100%" align="center">
  <tr>
<td width="100%">
      <? require_once('../../lib/general/top_p.php'); ?>
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center"><table border="0"  class="box">
          <tr>
        <td class="breadcrumb">SIGA  <? echo $modulo; ?>
      <input name="imec" type="hidden" id="imec"></td>
      </tr>
      <tr>
        <td><table width="100%" class="recuadro">
      <tr>
         <td align="center" width="27%"><!--<input type="button" name="Button" value="|&lt;" onClick="primero()">
          <input type="button" name="Submit2" value="&lt;&lt;" onClick="anterior()">
          <input type="button" name="Submit3" value="&gt;&gt;" onClick="siguiente()">
          <input type="button" name="Submit4" value="&gt;|" onClick="ultimo()">-->				</td>
        <td align="left" width="12%">
            </td>
          <td align="right" width="61%">
          <?  // MENU PRINCIPAL  // ?>
          <div  align="center" id="toolbar_zone2" style="border :0px solid Silver;"/>
        </td>
      </tr>
    </table></td>
      </tr>
      <tr>
        <td class="box">
<table width="100%" align="center" class="bodyline">
                <!--DWLayoutTable-->
                <tr>
                  <td height="22" colspan="3" class="form_label_01"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td>Nombre Empresa
                          <input name="empresa" type="text" id="empresa" readonly="true" class="imagenInicio2" value="<? print $empresa;?>" size="86"></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td height="22" colspan="3" class="form_label_01"> <fieldset>
                    <legend>Datos del Código Presupuestario</legend>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="36%">Clasifi. de Categor&iacute;as
                 <select name="clacat" id="clacat" onChange="calcularniveldisp(this.id)">
                  <option value="<? print $clacat;?>"><? print $clacat;?></option>
                  <? if ($clacat!=''){ ?> <option value=""></option>  <? } ?>
                  <? if ($clacat!='1'){ ?> <option value="1">1</option> <? } ?>
                  <? if ($clacat!='2'){ ?> <option value="2">2</option> <? } ?>
                  <? if ($clacat!='3'){ ?> <option value="3">3</option> <? } ?>
                  <? if ($clacat!='4'){ ?> <option value="4">4</option> <? } ?>
                  <? if ($clacat!='5'){ ?> <option value="5">5</option> <? } ?>
                  <? if ($clacat!='6'){ ?> <option value="6">6</option> <? } ?>
                  <? if ($clacat!='7'){ ?> <option value="7">7</option> <? } ?>
                  <? if ($clacat!='8'){ ?> <option value="8">8</option> <? } ?>
                                </select></td>
                              <td width="34%">Clasif. de Partidas <select name="clapar" id="clapar" onChange="calcularniveldisp(this.id)">
                                  <option value="<? print $clapar;?>"><? print $clapar;?></option>
                  <? if ($clapar!=''){ ?> <option value=""></option>  <? } ?>
                  <? if ($clapar!='1'){ ?> <option value="1">1</option> <? } ?>
                  <? if ($clapar!='2'){ ?> <option value="2">2</option> <? } ?>
                  <? if ($clapar!='3'){ ?> <option value="3">3</option> <? } ?>
                  <? if ($clapar!='4'){ ?> <option value="4">4</option> <? } ?>
                  <? if ($clapar!='5'){ ?> <option value="5">5</option> <? } ?>
                  <? if ($clapar!='6'){ ?> <option value="6">6</option> <? } ?>
                  <? if ($clapar!='7'){ ?> <option value="7">7</option> <? } ?>
                  <? if ($clapar!='8'){ ?> <option value="8">8</option> <? } ?>
                                </select></td>
                              <td width="30%">Nivel Disponibilidad <select name="nivel" id="nivel" onChange="validar_nivel()" >
                   <option value="<? print $nivel;?>"><? print $nivel;?></option>
                  <? if ($nivel!=''){ ?> <option value=""></option>  <? } ?>
                  <? if ($nivel!='1'){ ?> <option value="1">1</option> <? } ?>
                  <? if ($nivel!='2'){ ?> <option value="2">2</option> <? } ?>
                  <? if ($nivel!='3'){ ?> <option value="3">3</option> <? } ?>
                  <? if ($nivel!='4'){ ?> <option value="4">4</option> <? } ?>
                  <? if ($nivel!='5'){ ?> <option value="5">5</option> <? } ?>
                  <? if ($nivel!='6'){ ?> <option value="6">6</option> <? } ?>
                  <? if ($nivel!='7'){ ?> <option value="7">7</option> <? } ?>
                  <? if ($nivel!='8'){ ?> <option value="8">8</option> <? } ?>
                  <? if ($nivel!='9'){ ?> <option value="9">9</option> <? } ?>
                  <? if ($nivel!='10'){ ?> <option value="10">10</option> <? } ?>
                  <? if ($nivel!='11'){ ?> <option value="11">11</option> <? } ?>
                  <? if ($nivel!='12'){ ?> <option value="12">12</option> <? } ?>
                  <? if ($nivel!='13'){ ?> <option value="13">13</option> <? } ?>
                  <? if ($nivel!='14'){ ?> <option value="14">14</option> <? } ?>
                  <? if ($nivel!='15'){ ?> <option value="15">15</option> <? } ?>
                  <? if ($nivel!='16'){ ?> <option value="16">16</option> <? } ?>
                                </select></td>

                            </tr>
                          </table></td>
                      </tr>
                    </table>
                    </fieldset></td>
                </tr>
                <tr>
                  <td width="140" height="0"></td>
                  <td width="182" colspan="-5"></td>
                  <td width="232"></td>
                </tr>
              </table>		</td>
      </tr>
      <tr>
        <td><table width="100%" border="0">
                <tr>
                  <td width="100%" colspan="2"> <table border="0" cellpadding="0" cellspacing="0"  class="recuadro">
                      <tr valign="bottom" bgcolor="#ECEBE6">
                        <td height="1"> <div class="grid02" id="grid02">
                            <? ///////// G R I D ////////////?>
                            <table  border="0" cellpadding="0" cellspacing="0">
                              <tr>
                                <td height="23" class="queryheader" >&nbsp;</td>
                                <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;&nbsp;Tipo</td>
                                <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;&nbsp;Longitud</td>
                                <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;&nbsp;Nombre
                                  Abr. </td>
                                <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">
                                  Nombre Extendido</td>
                              </tr>

                              <?
    //////// Carga GRID //////////
    if ($check!='1')
        {
          $i=1;
          while ($i<=20)
          {
           ?>
                              <tr>
                                <td class="grid_line01_br"><input name="x<? print $i;?>0" type="txt" class="imagenborrar" id="x<? print $i;?>0" onClick="eliminar3(<? print $i;?>,4)" value="" size="1" ></td>
                                <td  align="right" class="grid_line01_br"><select name="x<? print $i;?>1" id="x<? print $i;?>1">
                                      <option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                      <option value="C" onClick="validar_cmb('x<? print $i;?>1');">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CATEGORIA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                      <option value="P" onClick="validar_cmb('x<? print $i;?>1');">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PARTIDA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                      </select></td>
                                <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>2" id="x<? print $i;?>2" type="text" class="grid_txt03" size="10" value="" onKeyPress="longitud2(event,this.id,'x<? print $i;?>3');" onBlur="longitud2f(event,this.id,'x<? print $i;?>3');"></td>
                                <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>3" id="x<? print $i;?>3" type="text" class="grid_txt03" size="17" value="" onKeyPress="abr(event,this.id,'x<? print $i;?>4');"></td>
                                <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>4" id="x<? print $i;?>4" type="text" class="grid_txt03" size="30" value="" onKeyPress="focos(event,'x<? print $i+1;?>1')"></td>
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
            if ($grid1[$i]=='C')
            {
              $v1='C';
              $grid1[$i]="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CATEGORIA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            }
            else if ($grid1[$i]=='P')
            {
              $v1='P';
              $grid1[$i]="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PARTIDA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            }
            else
            {
              $v1='';
              $grid1[$i]="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            }

          ?>
                             <tr>
                                <td class="grid_line01_br"><input name="x<? print $i;?>0" type="txt" class="imagenborrar" id="x<? print $i;?>0" onClick="eliminar3(<? print $i;?>,4)" value="" size="1" ></td>
                                <td  align="right" class="grid_line01_br"><select name="x<? print $i;?>1" id="x<? print $i;?>1">
                                     <option value="<? print $v1;?>"><? print $grid1[$i];?></option>
                                    <? if ($v1!=''){ ?>	<option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option> <? } ?>
                                    <? if ($v1!='C'){ ?> <option value="C" onClick="validar_cmb('x<? print $i;?>1');">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CATEGORIA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option> <? } ?>
                                    <? if ($v1!='P'){ ?> <option value="P" onClick="validar_cmb('x<? print $i;?>1');">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PARTIDA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option> <? } ?>
                                      </select></td>
                                <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>2" id="x<? print $i;?>2" type="text" class="grid_txt03" size="10" value="<? print $grid2[$i];?>" onKeyPress="longitud2(event,this.id,'x<? print $i;?>3');" onBlur="longitud2f(event,this.id,'x<? print $i;?>3');"></td>
                                <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>3" id="x<? print $i;?>3" type="text" class="grid_txt03" size="17" value="<? print $grid3[$i];?>" onKeyPress="abr(event,this.id,'x<? print $i;?>4');"></td>
                                <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>4" id="x<? print $i;?>4" type="text" class="grid_txt03" size="30" value="<? print $grid4[$i];?>" onKeyPress="focos(event,'x<? print $i+1;?>1')"></td>
                              </tr>
                              <?
          $i=$i+1;
          }
          while ($i<=20)
          {
          ?>
                            <tr>
                                <td class="grid_line01_br"><input name="x<? print $i;?>0" type="txt" class="imagenborrar" id="x<? print $i;?>0" onClick="eliminar3(<? print $i;?>,4)" value="" size="1" ></td>
                                <td  align="right" class="grid_line01_br"><select name="x<? print $i;?>1" id="x<? print $i;?>1">
                                      <option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                      <option value="C" onClick="validar_cmb('x<? print $i;?>1');">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CATEGORIA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                      <option value="P" onClick="validar_cmb('x<? print $i;?>1');">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PARTIDA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                      </select></td>
                                <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>2" id="x<? print $i;?>2" type="text" class="grid_txt03" size="10" value="" onKeyPress="longitud2(event,this.id,'x<? print $i;?>3');" onBlur="longitud2f(event,this.id,'x<? print $i;?>3');"></td>
                                <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>3" id="x<? print $i;?>3" type="text" class="grid_txt03" size="17" value="" onKeyPress="abr(event,this.id,'x<? print $i;?>4');"></td>
                                <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>4" id="x<? print $i;?>4" type="text" class="grid_txt03" size="30" value="" onKeyPress="focos(event,'x<? print $i+1;?>1')"></td>
                              </tr>
                              <?
          $i=$i+1;
          }
        }
          ?>
                            </table>
                            <? ///////////////////////?>
                          </div></td>
                      </tr>
                      <tr>
                        <td> <div align="center">Formato Código Presupuestario
                            <input name="formato" type="text" class="imagenInicio2" id="formato" size="50" readonly="true" value="<? print $formato;?>" maxlength="100">
                          </div></td>
                      </tr>
                    <tr>
                        <td class="box">
                      <div class="tabber">
                     <div class="tabbertab">
              <h2>Configuracion Generales </h2>
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="bodyline">
                            <tr>
                              <td width="39%"> <fieldset>
                                <legend>Fechas</legend>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="62%">Inicio Ejercicio </td>
                                    <td width="38%"><input name="fecha1" type="text"  class="imagenInicio" id="fecha1" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $fecha1;?>" size="10" datepicker="true" onKeyUp = "this.value=formateafecha(this.value);" onKeyPress="validar_fecha(event)"></td>
                                  </tr>
                                  <tr>
                                    <td>Fin de Ejercicio </td>
                                    <td><input name="fecha2" type="text"  class="imagenInicio" id="fecha2" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $fecha2;?>" size="10" datepicker="true" onKeyUp = "this.value=formateafecha(this.value);" onKeyPress="validar_fecha(event)"></td>
                                  </tr>
                                  <tr>
                                    <td>Per&iacute;odo </td>
                                    <td><input name="fecha3" type="text"  class="imagenInicio" id="fecha3" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $fecha3;?>" size="10" datepicker="true" onKeyUp = "this.value=formateafecha(this.value);"onKeyPress="focos(event,'asigper')"></td>
                                  </tr>
                                </table>
                                </fieldset></td>
                              <td width="61%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td colspan="2"> <fieldset>
                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td width="7%">&nbsp;</td>
                                          <td width="44%">Asignaci&oacute;n Periodica</td>
                                          <td width="29%" >

                       <? if ($asiper=='S') { ?>
                                            <input type="radio" name="asigper" id="asigper" value="S" onClick="radio1()" checked>
                       <? } else {?>
                       <input type="radio" name="asigper" id="asigper" value="S" onClick="radio1()">
                       <? } ?>
                                            Si

                       </td>
                                          <td width="20%">
                       <label>
                       <? if ($asiper=='S') { ?>
                                             <input name="asigper" type="radio" id="asigper" value="N" onClick="radio1()">
                       <? } else {?>
                         <input name="asigper" type="radio" id="asigper" value="N" onClick="radio1()" checked>
                       <? } ?>
                                            No
                       </label>
                      </td>
                                        </tr>
                                        <tr>
                                          <td>&nbsp;</td>
                                          <td>N&uacute;mero de Per&iacute;odos</td>
                                          <td colspan="2"><select name="numper" id="numper">
                                                <option value="<? print $numper;?>"><? print $numper;?></option>
                        <? if ($numper!='1'){ ?> <option value="1">1</option> <? } ?>
                        <? if ($numper!='2'){ ?> <option value="2">2</option> <? } ?>
                        <? if ($numper!='3'){ ?> <option value="3">3</option> <? } ?>
                        <? if ($numper!='4'){ ?> <option value="4">4</option> <? } ?>
                        <? if ($numper!='5'){ ?> <option value="5">5</option> <? } ?>
                        <? if ($numper!='6'){ ?> <option value="6">6</option> <? } ?>
                        <? if ($numper!='7'){ ?> <option value="7">7</option> <? } ?>
                        <? if ($numper!='8'){ ?> <option value="8">8</option> <? } ?>
                        <? if ($numper!='9'){ ?> <option value="9">9</option> <? } ?>
                        <? if ($numper!='10'){ ?> <option value="10">10</option> <? } ?>
                        <? if ($numper!='11'){ ?> <option value="11">11</option> <? } ?>
                        <? if ($numper!='12'){ ?> <option value="12">12</option> <? } ?>
                                            </select></td>
                                        </tr>
                                      </table>
                                      </fieldset></td>
                                    <?php /* <td> <fieldset>
                                      <legend>Precompromiso</legend>
                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td> <label>
                                            <input type="radio" name="precom" id="precom" value="S">
                                            Si</label> </td>
                                          <td><label>
                                            <input type="radio" name="precom" id="precom" value="N" checked>
                                            No</label></td>
                                        </tr>
                                      </table>
                                      </fieldset> </td> */?>
                                  </tr>
                                  <tr>

                                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td><div align="center"><a href='javascript: periodos();'><img src="../../images/periodos.gif" width="95" height="32"></a></div></td>
                                        </tr>
                                      </table></td>
                                  </tr>
                                </table></td>

                            </tr>
                          </table>
                </div>

                     <!-- div class="tabbertab">
              <h2>Configuracion de Correlativos </h2>
              <table width="100%" cellpadding="0" cellspacing="5" class="bodyline">

                <tr>
                  <td >AEP:</td>
                  <td ><input name="corr" type="text" id="corr" value="<? print $corr;?>" size="4" class="imagenInicio" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'"></td>
                </tr>
                <tr>
                  <td >Precompromiso: </td>
                  <td ><input name="corprc" type="text" id="corprc" value="<? print $corprc;?>" size="4" class="imagenInicio" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'"></td>
                </tr>
                <tr>
                  <td >Compromiso: </td>
                  <td ><input name="corcom" type="text" id="corcom" value="<? print $corcom;?>" size="4" class="imagenInicio" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'"></td>
                </tr>
                <tr>
                  <td >Causado: </td>
                  <td ><input name="corcau" type="text" id="corcau" value="<? print $corcau;?>" size="4" class="imagenInicio" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'"></td>
                </tr>
                <tr>
                  <td >Pagado: </td>
                  <td ><input name="corpag" type="text" id="corpag" value="<? print $corpag;?>" size="4" class="imagenInicio" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'"></td>
                </tr>
                <tr>
                  <td >Solicitud de Traslado: </td>
                  <td ><input name="corsoltra" type="text" id="corsoltra" value="<? print $corsoltra;?>" size="4" class="imagenInicio" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'"></td>
                </tr>
                <tr>
                  <td >Traslado: </td>
                  <td ><input name="cortrasla" type="text" id="cortrasla" value="<? print $cortrasla;?>" size="4" class="imagenInicio" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'"></td>
                </tr>
                <tr>
                  <td >Solicitud de Adicion/Disminucion: </td>
                  <td ><input name="corsoladidis" type="text" id="corsoladidis" value="<? print $corsoladidis;?>" size="4" class="imagenInicio" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'"></td>
                </tr>
                <tr>
                  <td >Adicion/Disminucion: </td>
                  <td ><input name="coradidis" type="text" id="coradidis" value="<? print $coradidis;?>" size="4" class="imagenInicio" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'"></td>
                </tr>
                <tr>
                  <td >Ajuste: </td>
                  <td ><input name="coraju" type="text" id="coraju" value="<? print $coraju;?>" size="4" class="imagenInicio" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'"></td>
                </tr>

              </table>
             </div !-->
             </div>

              </td>
                      </tr>
                    </table></td>
                </tr>
              </table></td>
      </tr>
      <tr>
        <td class="breadcrumb">Registro de <? echo $forma; ?>...
  <?  ///// variable oculta que se necesita para guardar //// ?>
      <input name="fecini" type="hidden" id="fecini" value="<? //echo $fecini; ?>" />
              <?  /////////////////////////////////////////////////////// ?>
              <input type="hidden" name="f1" value="<? print $arre[1];?>" id="f1">
              <input type="hidden" name="f2" value="<? print $arre[2];?>" id="f2">
              <input type="hidden" name="f3" value="<? print $arre[3];?>" id="f3">
              <input type="hidden" name="f4" value="<? print $arre[4];?>" id="f4">
              <input type="hidden" name="f5" value="<? print $arre[5];?>" id="f5">
              <input type="hidden" name="f6" value="<? print $arre[6];?>" id="f6">
              <input type="hidden" name="f7" value="<? print $arre[7];?>" id="f7">
              <input type="hidden" name="f8" value="<? print $arre[8];?>" id="f8">
              <input type="hidden" name="f9" value="<? print $arre[9];?>" id="f9">
              <input type="hidden" name="f10" value="<? print $arre[10];?>" id="f10">
              <input type="hidden" name="f11" value="<? print $arre[11];?>" id="f11">
              <input type="hidden" name="f12" value="<? print $arre[12];?>" id="f12">
        <input type="hidden" name="f13" value="<? print $arre[13];?>" id="f13">
        <input type="hidden" name="f14" value="<? print $arre[14];?>" id="f14">
        <input type="hidden" name="f15" value="<? print $arre[15];?>" id="f15">
        <input type="hidden" name="f16" value="<? print $arre[16];?>" id="f16">
        <input type="hidden" name="f17" value="<? print $arre[17];?>" id="f17">
        </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
<? require_once('../../lib/general/bottom.php'); ?>
</form>
</body>
<script language="JavaScript">

    function buscarenter(e)
      {
        if (e.keyCode==13)
    {
      f=document.form1;
      f.action="ConFinCue.php?var=<? echo '9'; ?>";
      f.submit();
    }
     }

    function poner_num(n)
    {
        i=1;
      tira="";
        while (i<=n)
      {
          tira=tira+"#";
        i=i+1;
      }
      return tira;
    }


    function radio1()
    {
      if (document.form1.asigper[0].checked)
    {
      //document.form1.numper.disabled=false;

    }
    else
    {
      //document.getElementById('numper').selectedIndex="0";
      //document.form1.numper.disabled=true;
    }

      }


    function longitud2(e,id,fc)
    {
      if (e.keyCode==13)
      {
        if (validarnumeroint(id)==false)
        {
          document.getElementById(id).value="";
          document.getElementById(id).focus();
          document.getElementById(id).select();
        }
        else
        {
      if (id.length==3)
      {idsig=id.substring(0,2)+"3";}
      else
      {idsig=id.substring(0,3)+"3";}
          cuantos=parseInt(document.getElementById(id).value);
          ultimo=parseInt(document.getElementById('clapar').value)+parseInt(document.getElementById('clacat').value);
      if (id.length==3)
      {fila=id.substring(1,2);}
      else
      {fila=id.substring(1,3);}

              if (fila=='1')
              {
                numeral=poner_num(cuantos);
                document.getElementById('f1').value=numeral;
              }
              else
              {
                numeral=poner_num(cuantos);
                aux="f"+fila;
                document.getElementById(aux).value="-" + numeral;

                document.getElementById('formato').value=document.getElementById('formato').value + "-" + numeral;
              }

              i=1;
              document.getElementById('formato').value="";
              while (i<=ultimo)
              {
                var x="f"+i;
                document.getElementById('formato').value=document.getElementById('formato').value + document.getElementById(x).value;
                i=i+1;
              }

              document.getElementById(idsig).value="";
              focos(e,fc);
        }
      }
    }

    function longitud2mod(id,fc)
    {
        if (validarnumeroint(id)==false)
        {
          document.getElementById(id).value="";
          document.getElementById(id).focus();
          document.getElementById(id).select();
        }
        else
        {
          if (id.length==3)
      {idsig=id.substring(0,2)+"3";}
      else
      {idsig=id.substring(0,3)+"3";}
          cuantos=parseInt(document.getElementById(id).value);
          ultimo=parseInt(document.getElementById('clapar').value)+parseInt(document.getElementById('clacat').value);
          if (id.length==3)
      {fila=id.substring(1,2);}
      else
      {fila=id.substring(1,3);}

              if (fila=='1')
              {
                numeral=poner_num(cuantos);
                document.getElementById('f1').value=numeral;
              }
              else
              {
                numeral=poner_num(cuantos);
                aux="f"+fila;
                document.getElementById(aux).value="-" + numeral;

                document.getElementById('formato').value=document.getElementById('formato').value + "-" + numeral;
              }

              i=1;
              document.getElementById('formato').value="";
              while (i<=ultimo)
              {
                var x="f"+i;
                document.getElementById('formato').value=document.getElementById('formato').value + document.getElementById(x).value ;
                i=i+1;
              }

              document.getElementById(idsig).value="";
             // focos(e,fc);
        }
    }


    function longitud2f(e,id,fc)
    {
        if (validarnumeroint(id)==false)
        {
          document.getElementById(id).value="";
          document.getElementById(id).focus();
          document.getElementById(id).select();
        }
        else
        {
          if (id.length==3)
      {idsig=id.substring(0,2)+"3";}
      else
      {idsig=id.substring(0,3)+"3";}
          cuantos=parseInt(document.getElementById(id).value);
          ultimo=parseInt(document.getElementById('clapar').value)+parseInt(document.getElementById('clacat').value);
          if (id.length==3)
      {fila=id.substring(1,2);}
      else
      {fila=id.substring(1,3);}

              if (fila=='1')
              {
                numeral=poner_num(cuantos);
                document.getElementById('f1').value=numeral;
              }
              else
              {
                numeral=poner_num(cuantos);
                aux="f"+fila;
                document.getElementById(aux).value="-" + numeral;

                document.getElementById('formato').value=document.getElementById('formato').value + "-" + numeral;
              }

              i=1;
              document.getElementById('formato').value="";
              while (i<=ultimo)
              {
                var x="f"+i;
                document.getElementById('formato').value=document.getElementById('formato').value + document.getElementById(x).value ;
                i=i+1;
              }

              document.getElementById(idsig).value="";
              focos(e,fc);
        }
    }

    function validar_nivel()
    {
      f=document.form1;
      combo=document.getElementById('nivel').value;
      if (combo=="")
      {
        alert("Debe Seleccionar Un Nivel de Disponibilidad");
        f.nivel.focus();
      }
      else
      {
        suma=parseInt(document.getElementById('clapar').value)+parseInt(document.getElementById('clacat').value);
        combo=parseInt(document.getElementById('nivel').value);
        if (combo>=suma)
        {
          alert("El nivel de Disponibilidad debe ser menor o igual a "+suma);
          document.getElementById('nivel').value=suma;
        }
        else
        {
          document.getElementById('clacat').disabled=true;
          document.getElementById('clapar').disabled=true;
          document.getElementById('x11').focus();
        }
      }
    }

    function calcularniveldisp(id)
    {
      f=document.form1;
      clapar=document.getElementById('clapar').value;
      clacat=document.getElementById('clacat').value;
      if (clacat!="" && clapar!="")
      {
          suma=parseInt(clapar)+parseInt(clacat);
          document.getElementById('nivel').value=suma;
          if (id=='clacat')
             document.getElementById('clapar').focus();
          else
             document.getElementById('nivel').focus();
      }

    }

    function validar_cmb(id)
    {
      contc=0;
      contp=0;
      i=1;
      var x="x"+i+"1";
      while ((i<=20) && (document.getElementById(x).value!=""))
      {
        var x="x"+i+"1";
        if (document.getElementById(x).value=='C')
        {
          contc=contc+1;
        }
        if (document.getElementById(x).value=='P')
        {
          contp=contp+1;
        }
        i=i+1;
      }

      cat=parseInt(document.getElementById('clacat').value);
      par=parseInt(document.getElementById('clapar').value);
      aux=id.substring(0,2)+"2";
      if (contc>cat)
      {
        alert("No se pueden agregar mas categorías");
        document.getElementById(id).focus();
        document.getElementById(id).selectedIndex="0";
      }
      else if (contp>par)
      {
        alert("No se pueden agregar mas partidas");
        document.getElementById(id).focus();
        document.getElementById(id).selectedIndex="0";
      }
      else
      {
        document.getElementById(aux).focus();
      }

    }

    function abr(e,id,fc)
    {
      if (e.keyCode==13)
      {
        idant=id.substring(0,2)+"2";
        lon=parseInt(document.getElementById(idant).value);
        if (document.getElementById(id).value.length==lon)
        {
          focos(e,fc)
        }
      }
      else
      {
        idant=id.substring(0,2)+"2";
        lon=parseInt(document.getElementById(idant).value);
        if (document.getElementById(id).value.length>=lon)
        {
          document.getElementById(id).value=document.getElementById(id).value.substring(0,lon-1);
        }
      }

    }

    function verificar()
    {
      f=document.form1;
      if (f.clacat.value=="")
      {
        alert("Debe Seleccionar la Cantidad de Categorías");
        return false;
      }
      else if (f.clapar.value=="")
      {
        alert("Debe Seleccionar la Cantidad de Categorías");
        return false;
      }
      else if (f.clapar.value=="")
      {
        alert("Debe Seleccionar El Nivel de Disponibilidad");
        return false;
      }
      else if (!verificar_campo_clave(0,f.formato.value,"No puede salvar sin tener un formato de Código Presupuestario"))
      {
        return false;
      }
      else if (!verificar_campo_clave(0,f.fecha1.value,"No puede salvar sin introducir la Fecha de Inicio del Ejercicio"))
      {
        return false;
      }
      else if (!verificar_campo_clave(0,f.fecha2.value,"No puede salvar sin introducir la Fecha de Fin del Ejercicio"))
      {
        return false;
      }
      else if (!verificar_campo_clave(0,f.fecha3.value,"No puede salvar sin introducir la Fecha del Período"))
      {
        return false;
      }
      else
      {
        return true;
      }

    }

      function eliminar(i)
     {
         i=1;
         while (i<=20)
      {
        var x1="x"+i+"1";
        var x2="x"+i+"2";
        var x3="x"+i+"3";
        var x4="x"+i+"4";

        //document.getElementById(x1).selectedIndex="0";
        if (document.getElementById(x1).options[document.getElementById(x1).selectedIndex].value!="")
        {
        document.getElementById(x1).selectedIndex="1";
        }
        else
        {
        document.getElementById(x1).selectedIndex="0";
        }

        document.getElementById(x2).value="";
        document.getElementById(x3).value="";
        document.getElementById(x4).value="";
        i=i+1;
      }
      document.getElementById('formato').value="";
      document.getElementById('f1').value="";
      document.getElementById('f2').value="";
      document.getElementById('f3').value="";
      document.getElementById('f4').value="";
      document.getElementById('f5').value="";
      document.getElementById('f6').value="";
      document.getElementById('f7').value="";
      document.getElementById('f8').value="";
      document.getElementById('f9').value="";
      document.getElementById('f10').value="";
      document.getElementById('f11').value="";
      document.getElementById('f12').value="";

     }

    function eliminar2(i,c)
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
            document.getElementById(y).value="";
        }

      }
      //ultima fila
      if (i==20)
      {
        for (col=0;col<=c;col++)
        {
          var x="x"+i+col;
            document.getElementById(y).value="";
        }

      }//if (fila==20)
     actualizarsaldos2();
     }


    function eliminar3(i,c)
       {
         f=document.form1;
        var fila=i;
          for (col=0;col<=c;col++)
          {
            var x="x"+fila+col;
            if (col==2)
            {
              document.getElementById(x).value=0;
            }
            else
            {
              fila2=parseInt(fila)+1;
                document.getElementById(x).value="";
            }
          }
          var id="x"+i+"2";
          var fc="x"+i+"1";
          longitud2mod(id,fc);
          var x="x"+fila+"2";
          document.getElementById(x).value="";
       }


    function validar_fecha(e)
    {
      f=document.form1;
      if (e.keyCode==13)
     {
       fechaini=document.getElementById('fecha1').value;
       fechafin=document.getElementById('fecha2').value;

       if (fechaini.length!=10 && fechaini!="" )
       {
        alert("Longitud de Fecha Inicio de Ejercicio Inválida");
        document.getElementById('fecha1').value="";
        document.getElementById('fecha1').focus();
        return;
        }

       if (fechafin.length!=10 && fechafin!="" )
       {
        alert("Longitud de Fecha Fin de Ejercicio Inválida");
        document.getElementById('fecha2').value="";
        document.getElementById('fecha2').focus();
        return;
       }

          var sDia0 = fechaini.substr(0, 2);
          var sMes0 = fechaini.substr(3, 2);
          var sAno0 = fechaini.substr(6, 4);
          var sDia1 = fechafin.substr(0, 2);
          var sMes1 = fechafin.substr(3, 2);
          var sAno1 = fechafin.substr(6, 4);
          var fecha1= sMes0 + "/" + sDia0 + "/"+sAno0;
          var fecha2= sMes1 + "/" + sDia1 + "/"+sAno1;
          f1=new Date(fecha1);
          f2=new Date(fecha2);
          if (f1>f2)
          {
           alert("La Fecha de Inicio debe ser menor que la Fecha Final del Ejercicio");
           document.getElementById('fecha1').select();
           document.getElementById('fecha1').focus();
          }
      }//end  if (e.keyCode==13)
    }

    function validar_fecha2()
    {
      f=document.form1;
       fechaini=document.getElementById('fecha1').value;
       fechafin=document.getElementById('fecha2').value;

       if (fechaini.length!=10 && fechaini!="" )
       {
        alert("Longitud de Fecha Inicio de Ejercicio Inválida");
        document.getElementById('fecha1').value="";
        document.getElementById('fecha1').focus();
        return false;
        }

       if (fechafin.length!=10 && fechafin!="" )
       {
        alert("Longitud de Fecha Fin de Ejercicio Inválida");
        document.getElementById('fecha2').value="";
        document.getElementById('fecha2').focus();
        return false;
       }

          var sDia0 = fechaini.substr(0, 2);
          var sMes0 = fechaini.substr(3, 2);
          var sAno0 = fechaini.substr(6, 4);
          var sDia1 = fechafin.substr(0, 2);
          var sMes1 = fechafin.substr(3, 2);
          var sAno1 = fechafin.substr(6, 4);
          var fecha1= sMes0 + "/" + sDia0 + "/"+sAno0;
          var fecha2= sMes1 + "/" + sDia1 + "/"+sAno1;
          f1=new Date(fecha1);
          f2=new Date(fecha2);
          if (f1>f2)
          {
           alert("La Fecha de Inicio debe ser menor que la Fecha Final del Ejercicio");
           document.getElementById('fecha1').select();
           document.getElementById('fecha1').focus();
           return false;
          }
       return true;
    }

     function periodos()
     {
         f=document.form1;
      pagina="periodos.php?nro="+f.numper.value+"&fecha1="+f.fecha1.value+"&fecha2="+f.fecha2.value;
      window.open(pagina,"Periodos","menubar=no,toolbar=no,scrollbars=no,width=350,height=280,resizable=yes,left=350,top=300");
     }

     function cancelar()
     {
         f=document.form1;
      f.action="PreNivPre.php?var=<? print 'L';?>";
      f.submit();
     }

     function chequea_niveles()
     {
       cat=document.getElementById('clacat').value;
       par=document.getElementById('clapar').value;

       var i=1;
       var contcat=0;
       var contpar=0;
       var estabiencat=false;
       var estabienpar=false;
       while (i<=20)
       {
         var x="x"+i+"1";
         if (document.getElementById(x).value=='C')
         {
           contcat=contcat+1;
         }
         if (document.getElementById(x).value=='P')
         {
           contpar=contpar+1;
         }
         i++;
       }

       if ( parseInt(cat)!= parseInt(contcat) )
       { return false; }
       else
       { estabiencat=true; }
       if ( parseInt(par)!= parseInt(contpar) )
       { return false; }
       else
       { estabienpar=true; }

    if (estabiencat && estabienpar)
    {
      return true;
    }

     }

     function salvar()
    {
      f=document.form1;
        if(confirm("¿Realmente desea Salvar?"))
        {
          if (validar_fecha2())
          {
              if (verificar() && chequea_niveles())
              {
                f.clacat.disabled=false;
                f.clapar.disabled=false;
                imec='<? print $imec;?>';
                f.action="imecPreNivPre.php?imec="+imec;
                f.submit();
              }
              else
              {
                 alert('Los niveles de Categorías y Partidas no Coinciden con las del Grid')
              }
         }
        }
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
        //alert("Nuevo Formulario");
      }
      else if(itemId == '0_form'){
        //alert("Modificar Formulario");
      }
      else if(itemId == '0_search'){
        //alert("Busqueda");
      }
      else if(itemId == '0_filter'){
        //alert("Filtro");
      }
      else if(itemId == '0_cancelar'){
          cancelar();
      }
      else if(itemId == '0_delete')
      {
        var eliminar='<? echo $Eliminar; ?>';
        var msg='<? echo $msg; ?>';
        if (eliminar=='No'){ alert("No se puede eliminar esta Cuenta Contable")}
        else if (msg!=''){ alert(msg)}
        else
        {
          if(confirm("�Esta seguro que desea Eliminar este Código?"))
            {
              f=document.form1;
              f.action="imecConFinCue.php?imec=<? echo 'E'; ?>";
              f.submit();
            }
        }
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



</script>

</html>
