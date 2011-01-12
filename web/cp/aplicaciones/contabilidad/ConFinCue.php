<?
session_name('cidesa');
session_start();
if (empty($_SESSION["x"]))
{
  ?>
  <script language="JavaScript" type="text/javascript">
      location=("http://"+window.location.host+"/autenticacion.php/login");
  </script>
  <?php
}

require_once($_SESSION["x"].'/lib/bd/basedatosAdo.php');
require_once($_SESSION["x"].'/lib/general/funciones.php');
require_once($_SESSION["x"].'/lib/general/tools.php');
validar(array(8,11,15));            //Seguridad  del Sistema
$codemp=$_SESSION["codemp"];
$bd=new basedatosAdo($codemp);
$tools=new tools();

$modulo="";
$forma="Catalogo de Cuentas";
$modulo=$_SESSION["modulo"] . " > Contabilidad Financiera >".$forma;

Limpiar();

//CARGAR MASCARA
$sql="SELECT * from contaba where codemp='001'";
if ($tb=$tools->buscar_datos($sql))
{
$modulo = $modulo."  *** Ejercicio Fiscal: ".substr($tb->fields["feccie"],0,4)." ***";
$_SESSION["formato"]=$tb->fields["forcta"];
$forcta=$tb->fields["forcta"];
}
else
{
$_SESSION["formato"]="";
$forcta="";
        ?>
        <script language="JavaScript" type="text/javascript">
                alert('Debe configurar las Definiciones Específicas de la Institucion\npara poder cargar Cuentas Nuevas')
                //location=("http://"+window.location.host+"/autenticacion.php/login");
        </script>
        <?php

}

if (!empty($_GET["var"]))
  {
    if (!empty($_POST["mcodigo"])){ $codigo=trim($_POST["mcodigo"]); } else { $codigo=trim($_GET["mcodigo"]);}
    $var=$_GET["var"];

        ///////////////// BARRA DE MENU /////////////////
    if ($var=='1')
      {
        if ($tb=$tools->primerRegistro('contabb','codcta'))
        {
          $codigo=$mcodigo=trim($tb->fields["codcta"]);
          $var='9';   //Para que haga la busqueda
        }
      }
    else if ($var=='2') //Anterior
      {
        if (!empty($codigo))
        {
          $tb=$tools->anteriorRegistro('contabb','codcta',$codigo,'N');
          $codigo=$mcodigo=trim($tb->fields["codcta"]);
      if (!$tb)
          {
            if ($tb=$tools->ultimoRegistro('contabb','codcta'))
          {
              $codigo=$mcodigo=trim($tb->fields["codcta"]);
          }
          }
          $var='9';   //Para que haga la busqueda
        }
        else
        {
          $tb=$tools->primerRegistro('contabb','codcta');
          $codigo=$mcodigo=trim($tb->fields["codcta"]);
          $var='9';   //Para que haga la busqueda
        }
      }
    else if ($var=='3') //PROXIMO
      {
        if (!empty($codigo))
        {
          $tb=$tools->proximoRegistro('contabb','codcta',$codigo,'N');
          $codigo=$mcodigo=trim($tb->fields["codcta"]);
          if (!$tb)
          {
            if ($tb=$tools->primerRegistro('contabb','codcta'))
          {
              $codigo=$mcodigo=trim($tb->fields["codcta"]);
          }
          }
          $var='9';   //Para que haga la busqueda
        }
        else
        {
          $tb=$tools->primerRegistro('contabb','codcta');
          $codigo=$mcodigo=trim($tb->fields["codcta"]);
          $var='9';   //Para que haga la busqueda
        }
      }
    else if ($var=='4')
      {
        if ($tb=$tools->ultimoRegistro('contabb','codcta'))
        {
          $codigo=$mcodigo=trim($tb->fields["codcta"]);
          $var='9';   //Para que haga la busqueda
        }
      }
    //////////////// FIN MENU ////////////////

    if ($var=='9'){
      //////  Busqueda por Codigo  ////////
      $sql="select * from contaba where codemp='001' and codtesact<>'' and codtespas<>'' and codind<>'' and codegd<>'' and codctd<>'' and codcta<>'' and codord<>''";
      $tb=$bd->select($sql);
      if (!$tb->EOF)
        {
        //$long_form=strlen($tb->fields["forcta"]);  // #-## = 4
        $MascaraContabilidad=$tb->fields["forcta"];  //  #-##
          $etadef=$tb->fields["etadef"]; // Cuenta cerrada
        }

      //$codigo1=str_pad(' ',$long_form,' ',str_pad_right);
      //$codigo=$mcodigo.$codigo1;
//echo $codigo;


      $sql="select * from CONTABB where codcta='$codigo'";
      $tb=$bd->select($sql);

      if (!$tb->EOF)
      {
        $descta=$tb->fields["descta"];
        $mcodigo=$tb->fields["codcta"];
        $IncMod = "M";
        //DatosCuentas($tb);
        $saldo_anterior=$tb->fields["salant"]; //SaldoAntesDeModificar = CCur(ObtenerValorRegistro(ContaBB!salant))
        $debcre=trim($tb->fields["debcre"]);
        $cargab=trim($tb->fields["cargab"]);
        if ($debcre=='D'){ $ts_deudor='Si'; }else{ $ts_deudor='No'; }
        if ($cargab=='C'){ $c_si='Si'; }else{ $c_si='No'; }

		$desha = 'N';
		$camnomcatcta =  $_SESSION["configemp"]["aplicacion"]["contabilidad"]["modulos"]["confincue"]["camnomcatcta"];
		if ($camnomcatcta != 'S')
		{
	        $sqla="select * from CONTABC1 where codcta='$codigo'";
	        $ta=$bd->select($sqla);
	        if (!$ta->EOF)
	        {
	        	$desha =  'S';
	        }
		}

      }else    //Si no consigue el codigo (NUEVO)
      {
        if (buscar_codigo_padre($codigo,&$codigopadre))
        {
	       $sql="select debcre, cargab from contabb where trim(codcta)='$codigopadre'";
	       $tb2=$bd->select($sql);
	       if (!$tb2->EOF)
	       {
	         $debcre=trim($tb2->fields["debcre"]);
         	 $cargab=trim($tb2->fields["cargab"]);

	         if ($debcre=='D'){ $ts_deudor='Si'; }else{ $ts_deudor='No'; }
        	 if ($cargab=='C'){ $c_si='Si'; }else{ $c_si='No'; }
 	       }

          $IncMod = "I";
          $mcodigo=$codigo;
        }else{
          Mensaje("Nivel Anterior no Existe...");
      ?>
        <script>
          location=("ConFinCue.php");
        </script>
      <?
        }

        if (!buscar_codigo_padre2($codigo)) //verifica que el papa no sea cargable
        {
          Mensaje("El Código Padre de esta Cuenta ya es Cargable, no puede tener mas hijos");
      ?>
        <script>
          location=("ConFinCue.php");
        </script>
      <?

        }

          if (!verifica_cta($codigo)) //verifica que la cuenta contable no este mocha
          {
            Mensaje("El formato del Código Contable es Inválido");
        ?>
          <script>
            location=("ConFinCue.php");
          </script>
        <?
          }
    // colocamos que la cuenta sea cargable si es de ultimo nivel
    $loncod=strlen($codigo);
    $lonfor=strlen($forcta);
    if ($loncod==$lonfor)
    {
    //  print $focoradio='S';
    }

      }
        $sql="select to_char(fecini,'dd/mm/yyyy') as fecini, to_char(feccie,'dd/mm/yyyy') as feccie from contaba1 WHERE pereje='01'";
        $tb=$bd->select($sql);
        if (!$tb->EOF)
          {
           $fecini=$tb->fields["fecini"];
           $feccie=$tb->fields["feccie"];
          }
    }


    //if ($tools->buscar_codigoHijo($codigo)){  $Eliminar='No'; }else { if (VerificarEliminar()){ $Eliminar2='Si'; }else{ $Eliminar2='No'; } }
    if ($tools->buscar_codigoHijo($codigo)){  $Eliminar='No'; }else { $msg=VerificarEliminar(); }
}
  function VerificarEliminar()
  {
     global $codigopadre;
        global $codigo;
     //global $tb;
     global $tools;

     if ($codigopadre){ $CodigoPad=trim($codigopadre); } else { $CodigoPad=trim($codigo); }

     $sql="select * from contabc1 where trim(codcta)='$CodigoPad'";
     if ($tools->buscar_datos($sql)){
      // 	Mensaje("Existen Comprobantes contables para este código de cuenta");
    //	return false;
         $msg="Existen Comprobantes contables para este código de cuenta";
      return $msg;

    }
     else{
       $sql="select * from caprovee where trim(codcta) = '$CodigoPad'";
         if ($tools->buscar_datos($sql)){
          $msg="Existen Proveedores con este código contable asociado";
         return $msg;
       }
       else{
      $sql="select * from	 cpdeftit where trim(codcta) = '$CodigoPad'";
          if ($tools->buscar_datos($sql)){
            $msg="Existen Tutulos Presupuestarios con este código contable asociado";
             return $msg;
       }
       else{ return ""; }
    }

   }

    //exit;
  }

  function Limpiar()
  {
  global $saldo_anterior;
  global $descta;
    $saldo_anterior=0;
    $descta="";
  }
?>
<!-- DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd"-->
<html>
<head>
<title><? echo $forma; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK media=all href="../../lib/css/base.css" type=text/css rel=stylesheet>
<link href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
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
  function desactivar()
  {
    var etadef='<? echo $etadef; ?>';
    var incmod='<? echo $IncMod; ?>';

    if ((etadef=='C') && (incmod!='I'))  //Etapa de Definicion Cerrado
      {
        alert('La Etapa de Definición esta cerrada, no podrá actualiza los Saldos');
      //Modificacion
      //document.getElementById("RadioGroup2").disabled=true
      document.form1.RadioGroup2[0].disabled=true
      document.form1.RadioGroup2[1].disabled=true
      document.form1.RadioGroup1[0].disabled=true
      document.form1.RadioGroup1[1].disabled=true

      //alert(document.form1.RadioGroup2[1].checked)
      //if (document.form1.RadioGroup2[0].checked)  //Es Verdadedor Cargable = "Si"
      //{ document.getElementById("x15").disabled=false
        // document.getElementById("x16").disabled=false
      //}
      //else{
      document.getElementById("x15").disabled=true
            document.getElementById("x16").disabled=true
      // }

      }
      else		//Etapa de Definicion Abierto
      {
        if ((document.form1.RadioGroup1[0].checked) && (document.form1.RadioGroup2[0].checked)) //Tipo Saldo Deudor y Cargable = "Si"
      {
        document.getElementById("x15").disabled=false
        document.getElementById("x16").disabled=true
      }
        else if ((document.form1.RadioGroup1[1].checked) && (document.form1.RadioGroup2[0].checked)) //Tipo Saldo Acreedor y Cargable = "Si"
      {
        document.getElementById("x15").disabled=false
        document.getElementById("x16").disabled=true
      }
      else
      {
        //document.getElementById("x14").disabled=true
        document.getElementById("x15").disabled=true
        document.getElementById("x16").disabled=true
      }
      }

    if ((etadef=='C') && (incmod=='I'))  //Etapa de Definicion Cerrado Inclusion
    {
        document.getElementById("x15").disabled=true
         document.getElementById("x16").disabled=true
    }

  }

    function deshabilitardatos()
    {
      var desha='<?php echo $desha; ?>';
      if (desha=='S'){

      document.getElementById("mcodigo").readOnly=true;
      document.getElementById("descta").readOnly=true;
      document.form1.RadioGroup2[0].disabled=true;
      document.form1.RadioGroup2[1].disabled=true;
      document.form1.RadioGroup1[0].disabled=true;
      document.form1.RadioGroup1[1].disabled=true;
      document.getElementById("x15").disabled=true
      document.getElementById("x16").disabled=true
     }
     }

     function actualizar_saldos() //Actualiza el Saldo Actual
      {
      f=document.form1;
      i=1;
      var acum=0;
      var acum2=0;
      var valor=0;
      var valor_total=0;

      while (i<=13)
      {
        //alert(i);
        var x="x"+i+"4";
        var x2="x"+i+"5";
        if (i==1){
          str= document.getElementById(x2).value.toString();
          str= str.replace(',','');
          str= str.replace(',','');
          str= str.replace(',','');

          var num=parseFloat(str);  //Valor Real sin (.) y ni (,)

          valor=num;
          //alert(valor);
        }else{
          str= document.getElementById(x).value.toString();
          str= str.replace(',','');
          str= str.replace(',','');
          str= str.replace(',','');

          var num=parseFloat(str);  //Valor Real sin (.) y ni (,)

        //alert(valor);
        //alert(num);
          valor=valor + num;
          document.getElementById(x2).value=format(valor.toFixed(2),'.','.',',');
          //alert(valor_total);
        }
        i=i+1;
      }

     }

  function ColocarFormatoLocal(key,valor,id)  //ColocarFormato a una caja de texto
    {
      ColocarFormato(key,valor,id)
      actualizar_saldos()
    }


  function ColocarFormatoOnBlueLocal(key,valor,id)  //ColocarFormato a una caja de texto
    {
      ColocarFormatoOnBlue(key,valor,id)
      actualizar_saldos()
      //document.getElementById("x21").focus()
    }

    function Deshabilitardatos()
    {
      document.getElementById("mcodigo").readOnly=true;
      document.getElementById("descta").readOnly=true;
      document.form1.RadioGroup2[0].disabled=true;
      document.form1.RadioGroup2[1].disabled=true;
      document.form1.RadioGroup1[0].disabled=true;
      document.form1.RadioGroup1[1].disabled=true;
    }


  </script>

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
<form name="form1" onsubmit="return false;" method="post" action="ConFinCue.php?var=9">
<table width="100%" align="center">
  <tr>
<td width="100%"><? require_once('../../lib/general/top.php'); ?></td>
  </tr>
<tr>
<td height="432" valign="top" align="center">
<table width="432" height="175" border="0" class="box">
  <tr>
        <td class="breadcrumb">SIGA  <? echo $modulo; ?>
      </tr>
  <!--DWLayoutTable-->
  <tr >
    <td  >
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
          <input type="button" name="Submit4" value="&gt;|" onClick="ultimo()">-->        </td>
        <td align="left" width="12%">            </td>
          <td align="right" width="61%">
          <?  // MENU PRINCIPAL  // ?>
          <div  align="center" id="toolbar_zone2" style="border :0px solid Silver;"/>        </td>
      </tr>
    </table>  </td>
  </tr>
  <tr>
    <td class="box" >

        <table width="100%" align="center" class="bodyline">
          <!--DWLayoutTable-->
                <tr>
                  <td height="22" colspan="3" class="form_label_01"><table width="100%" height="291%" border="0">
                    <tr>
                     <td width="71" height="22" class="form_label_01">C&oacute;digo:</td>
                  <td width="160" class="form_label_01"><input name="mcodigo" type="text" class="imagenInicio" id="mcodigo" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? echo $mcodigo; ?>" size="<? strlen($_SESSION["formato"]); ?>" maxlength="<? strlen($_SESSION["formato"]); ?>" onKeyPress="if (event.keyCode==13) {document.getElementById('descta').focus();}" onBlur="QuitaRaya(this.value,this.id)" onKeyDown="javascript:return dFilter (event.keyCode, this,'<?print $_SESSION["formato"];?>');"> </td>
                  <td width="115" class="form_label_01">&nbsp;</td>
                  <td width="198" class="form_label_01">&nbsp;</td>
                  </tr>
                <tr valign="middle">
                  <td height="40%" class="form_label_01">Descripci&oacute;n:</td>
                  <td colspan="3" class="form_label_01"><input name="descta" type="text"  class="imagenInicio" id="descta" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? echo $descta;?>" size="70" ></td>
                  </tr>
                  </table></td>
                  </tr>
                <tr>
                  <td height="22" class="form_label_01"><fieldset><legend>Cargable</legend>
          <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
            <?
            if ($focoradio=='S')
      {
              ?>
                <td>
                   <label><input name="RadioGroup2" id="RadioGroup2" type="radio" value="Si" checked onClick="radio1()">Si</label></td>
                 <td>
                  <label><input name="RadioGroup2" id="RadioGroup2" type="radio" value="No" onClick="radio2()">No</label></td>
              <?
      }
            else if ($c_si=='Si'){ ?>
            <td>
             <label><input name="RadioGroup2" id="RadioGroup2" type="radio" value="Si" onClick="desactivar()" checked>Si</label></td>
                    <td>
            <label><input name="RadioGroup2" id="RadioGroup2" type="radio" value="No" onClick="desactivar()">No</label></td>

            <? }else{ ?>
            <td>
              <label><input type="radio" name="RadioGroup2"  id="RadioGroup2" value="Si" onClick="desactivar()">Si</label></td>
                    <td>
             <label><input type="radio" name="RadioGroup2"  id="RadioGroup2" value="No" onClick="desactivar()" checked>No</label></td>

          <? } ?>
                    </tr>
                  </table>
         </fieldset>				  </td>
                  <td height="22" class="form_label_01"><fieldset><legend>Tipo Saldo</legend>
          <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
            <? if ($ts_deudor=='Si'){ ?>
            <td>
             <label><input name="RadioGroup1" id="RadioGroup1" type="radio" value="D" onClick="desactivar()" checked>Deudor</label></td>
                    <td>					  <label><input name="RadioGroup1" id="RadioGroup1" type="radio" value="C" onClick="desactivar()">
            Acreedor</label></td>

            <? }else{ ?>
            <td>
              <label><input type="radio" id="RadioGroup1" name="RadioGroup1" value="D" onClick="desactivar()">Deudor</label></td>
                    <td>
             <label><input type="radio" id="RadioGroup1" name="RadioGroup1" value="C" onClick="desactivar()" checked>
             Acreedor</label></td>

          <? } ?>
                    </tr>
                  </table>
          </fieldset>	</td>
                  <td class="form_label_01"><!--DWLayoutEmptyCell-->&nbsp;</td>
                </tr>

                <tr>
                  <td width="140" height="0"></td>
                  <td width="182" colspan="-5"></td>
                  <td width="232"></td>
                </tr>
      </table>    </td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="0"  class="recuadro">
                <tr valign="bottom" bgcolor="#ECEBE6">
                  <td width="104%" height="1"> <div class="grid01" id="grid01">
<table width="122%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="140" class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">Per&iacute;odo</td>
    <td width="84" class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;&nbsp;D&eacute;bito</td>
    <td width="113" class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;&nbsp;Cr&eacute;dito</td>
    <td width="138" class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;&nbsp;Saldo del Per&iacute;odo</td>
    <td width="121" class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10"> Saldo Actual </td>
    <td width="156" class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10"> Saldo Programado</td>
    <td width="153" class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10"> Saldo Acumulado </td>
  </tr>
    <tr>
      <td class="grid_line01_br">&nbsp;</td>
      <td  align="right" class="grid_line01_br">&nbsp;</td>
      <td  align="right" class="grid_line01_br">&nbsp;</td>
      <td  align="right" class="grid_line01_br">&nbsp;</td>
      <td  align="right" class="grid_line01_br"><input name="x15" id="x15" type="text" class="grid_txt02" size="15" value="<? echo number_format($saldo_anterior,2,'.',',');?>" align="right" tabindex="2" onKeyPress="ColocarFormatoLocal(event,this.value,this.id)" onClick="QuitarComa(this.value,this.id)" onBlur="ColocarFormatoOnBlueLocal(event,this.value,this.id)"></td>
      <td  align="right" class="grid_line01_br"><input name="x16" id="x16" type="text" class="grid_txt02" size="15" value="0.00" align="right" onKeyPress="ColocarFormatoLocal(event,this.value,this.id)" tabindex="2" onClick="QuitarComa(this.value,this.form,this.id)" onBlur="ColocarFormatoOnBlueLocal(this.value,this.id)"></td>
      <td  align="right" class="grid_line01_br">&nbsp;</td>
    </tr>
    <?
    //////// Cargar_Periodos //////////
    $i=2;
    $sql= "select * From CONTABB1 where trim(codcta)= '$codigo' and to_char(fecini,'DD/MM/YYYY')='$fecini' and to_char(feccie,'DD/MM/YYYY')='$feccie' Order By pereje";
    $tb=$bd->select($sql);
    if (!$tb->EOF){
      while (!$tb->EOF){
      //while ($i<=12)
     ?>
    <tr>
      <td  class="grid_line01_br"><input name="x<? print $i;?>1" type="text" class="grid_txt01" id="x<? print $i;?>1" tabindex="1" value="<? print $tb->fields["pereje"]; ?>" size="8" maxlength="2" readonly="true"></td>
      <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>2" id="x<? print $i;?>2" type="text" class="grid_txt02" size="15" value="<? print number_format($tb->fields["totdeb"],2,'.',','); ?>" align="right"  tabindex="2" readonly="true"></td>
      <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>3" id="x<? print $i;?>3" type="text" class="grid_txt02" size="15" value="<? print number_format($tb->fields["totcre"],2,'.',','); ?>" align="right"  tabindex="2" readonly="true"></td>
      <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>4" id="x<? print $i;?>4" type="text" class="grid_txt02" size="15" value="<? print number_format(($tb->fields["totdeb"]-$tb->fields["totcre"]),2,'.',','); ?>" align="right"   tabindex="2" readonly="true"></td>
      <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>5" id="x<? print $i;?>5" type="text" class="grid_txt02" size="15" value="<? print number_format($tb->fields["totdeb1"],2,'.',','); ?>" align="right"  tabindex="2" readonly="true"></td>
      <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>6" id="x<? print $i;?>6" type="text" class="grid_txt02" size="15" value="<? print number_format($tb->fields["totdeb1"],2,'.',','); ?>" align="right"  tabindex="2" readonly="true"></td>
      <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>7" id="x<? print $i;?>7" type="text" class="grid_txt02" size="15" value="<? print number_format($tb->fields["totdeb1"],2,'.',','); ?>" align="right"  tabindex="2" readonly="true"></td>
    </tr>
    <?
    $tb->MoveNext();
    $i=$i+1;
    } ?>
    <script>
    actualizar_saldos();
    </script> <?

    }else{
    $i=2;
    while ($i<=13){
    ?>
    <tr>
      <td class="grid_line01_br"><input name="x<? print $i;?>1" type="text" class="grid_txt01" id="x<? print $i;?>1" tabindex="1" value="<? print digitos($i-1); ?>" size="8" maxlength="2" readonly="true"></td>
      <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>2" id="x<? print $i;?>2" type="text" class="grid_txt02" size="15" value="<? print number_format($tb->fields["totdeb"],2,'.',','); ?>" align="right"  tabindex="2"  readonly="true"></td>
      <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>3" id="x<? print $i;?>3" type="text" class="grid_txt02" size="15" value="<? print number_format($tb->fields["totcre"],2,'.',','); ?>" align="right" onKeyPress="actualizar_saldos(event,this.id)" tabindex="2"  readonly="true"></td>
      <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>4" id="x<? print $i;?>4" type="text" class="grid_txt02" size="15" value="<? print number_format(($tb->fields["totdeb"]-$tb->fields["totcre"]),2,'.',','); ?>" align="right" onKeyPress="actualizar_saldos(event,this.id)" tabindex="2"  readonly="true"></td>
      <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>5" id="x<? print $i;?>5" type="text" class="grid_txt02" size="15" value="<? print number_format($tb->fields["totdeb1"],2,'.',','); ?>" align="right"  onKeyPress="actualizar_saldos()" tabindex="2"  readonly="true"></td>
      <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>6" id="x<? print $i;?>6" type="text" class="grid_txt02" size="15" value="<? print number_format($tb->fields["totdeb1"],2,'.',','); ?>" align="right" tabindex="2"  readonly="true"></td>
      <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>7" id="x<? print $i;?>7" type="text" class="grid_txt02" size="15" value="<? print number_format($tb->fields["totdeb1"],2,'.',','); ?>" align="right"  tabindex="2"  readonly="true"></td>
    </tr>
    <?
      $tb->MoveNext();
      $i=$i+1;
      }
      if ($IncMod=='M'){
        Mensaje("No existen períodos definidos para la cuenta");
        }
     }
     ?>
</table>
            <? ///////////////////////?>
                    </div></td>
                </tr>
                <? // } ?>
              </table></td>
  </tr>
  <tr>
    <td class="breadcrumb"><span class="style13">Registro de <? echo $forma; ?>...
  <?  ///// variable oculta que se necesita para guardar //// ?>
      <input name="fecini" type="hidden" id="fecini" value="<? echo $fecini; ?>" />
      <input name="feccie" type="hidden" id="feccie" value="<? echo $feccie; ?>" />
      <input name="feccie" type="hidden" id="feccie" value="<? echo $feccie; ?>" />
      <input name="etadef" type="hidden" id="etadef" value="<? echo $etadef; ?>" />
      <input name="saldo_anterior" type="hidden" id="saldo_anterior" value="<? echo $saldo_anterior; ?>" />
  <?  /////////////////////////////////////////////////////// ?>
    </span></td>
  </tr>
</table>  </tr>
</td>
</table>
<script>
desactivar();
deshabilitardatos();
</script>
</form>
</body>
<script language="JavaScript">

    function buscarenter()
      {
      f=document.form1;
      f.action="ConFinCue.php?var=<? echo '9'; ?>";
      f.submit();
     }

  function radio1()
  {
    document.getElementById('RadioGroup2').checked=true;
  }

  function radio2()
  {
    document.getElementById('RadioGroup2').checked=true;
  }

     function QuitaRaya(tira,id)
     {
       if ($F(id)!='')
       {
         document.getElementById(id).value=rayitasfc(tira);
          if (document.getElementById('mcodigo').value!='undefined')
         {
            buscarenter();
         }
       }
     }


     function rayitasfc(tira)
    {
        long=tira.length;
        i=1;
        hasta=1;
        if (long >= 1)
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


    function Eliminar()
     {
       var eliminar='<? echo $Eliminar; ?>';
    var eliminar2='<? echo $Eliminar2; ?>';
    if (eliminar=='No'){ alert("No se puede eliminar la Cuenta Contable")}
    else if (eliminar2=='No'){ alert("No se pudo eliminar la Cuenta Contable")}
    else
    {
      if(confirm("¿Esta seguro que desear Eliminar este Código?"))
        {
          f=document.form1;
          f.action="imecConFinCue.php?imec=<? echo 'E'; ?>";
          f.submit();
        }
    }
     }

  function Limpiar()
           {
               location=("ConFinCue.php")
           }


         function onButtonClick(itemId,itemValue)// TOOLBAR
    {
      f=document.form1;

      //alert("Button "+itemId+" was pressed"+(itemValue?("\n select value : "+itemValue):""));
      if(itemId == '0_ojo'){
        //alert("Usted vera una Consulta");
        catalogo2('mcodigo','x','mcodigo');  // campo, x = que no devuelva nada en el 2do campo, mcodigo = foco
      }
      /////////////////////
      else if(itemId == '0_cancelar')
           {
               Limpiar();
           }

      else if(itemId == '0_save')
      {
       var desha='<?php echo $desha; ?>';
       var etadef='<? echo $etadef; ?>';
    var incmod='<? echo $IncMod; ?>';


       if (desha!='S') {
      if ((etadef!='C') || (incmod=='I')) {  //Etapa de Definicion Cerrado
        if(confirm("¿Realmente desea Salvar?"))
        {
          f=document.form1;
          if (document.form1.mcodigo.value=="")
            { alert("No puede salvar sin introducir el Código Contable"); }

          else if (document.form1.descta.value=="")
            { alert("No puede salvar sin introducir la Descripción del Código Contable"); }
              else{
                document.getElementById("x15").disabled=false
                document.getElementById("x16").disabled=false

                f.action="imecConFinCue.php?imec=<? echo 'I'; ?>&IncMod=<? echo $IncMod; ?>";
                f.submit();
            }
        }
        }else
        {
          alert('No puede realizar modificaciones la Cuenta Contable, la Etapa de Definición esta cerrada');
        }
        }else {
          alert("No puede realizar modificaciones la Cuenta Contable ya esta siendo utilizada");
        }
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
        var eliminar='<? echo $Eliminar; ?>';
        var msg='<? echo $msg; ?>';
        if (eliminar=='No'){ alert("No se puede eliminar esta Cuenta Contable")}
        else if (msg!=''){ alert(msg)}
        else
        {
          if(confirm("¿Esta seguro que desea Eliminar este Código?"))
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


     function primero()
      {
      f=document.form1;
      f.action="ConFinCue.php?var=<? print '1';?>";
      f.submit();
     }
     function anterior()
      {
      f=document.form1;
      f.action="ConFinCue.php?var=<? print '2';?>";
      f.submit();
     }
     function siguiente()
      {
      f=document.form1;
      f.action="ConFinCue.php?var=<? print '3';?>";
      f.submit();
     }
     function ultimo()
      {
      f=document.form1;
      f.action="ConFinCue.php?var=<? print '4';?>";
      f.submit();
     }


     function catalogo2(campo,campo2,foco)
     {
    f=document.form1;
      //sql='select codcta as CODIGO, descta as DESCRIPCION from contabb where cargab=¿C¿ and descta like upper(¿%¿) order by codcta';
      sql='select codcta  as CODIGO,descta as DESCRIPCION from contabb where descta like upper(¿%¿) order by codcta';

      pagina="catalogo2.php?campo="+campo+"&campo2="+campo2+"&sql="+sql+"&foco="+foco;
      //pagina="catalogo2.php?campo="+campo+"&sql="+sql+"&foco="+foco;
      window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
     }

      function consulta()
      {
          //document.getElementById('var').value='C';
          f=document.form1;
          var host = '<? echo $_SERVER["HTTP_HOST"]; ?>';
          var campo2='descta';
          var campo='mcodigo';
          var foco='submit';

          //sql="select codcta as codigo, descta as descripcion from contabb where descta like upper(¿%¿) order by codcta";

          //pagina="catalogo2.php?campo="+campo+"&campo2="+campo2+"&sql="+sql+"&foco="+foco;
          //window.open(pagina,"","menubar=no,toolbar=no,scrollbars=yes,width=570,height=500,resizable=yes,left=50,top=50");

          pagina='http://'+host+'/herramientas.php/generales/catalogo/metodo/Contabb_ConFinCue/clase/Contabb/frame/form1/obj1/mcodigo/campo1/codcta/submit/true';
          window.open(pagina,"true","menubar=no,toolbar=no,scrollbars=yes,width=490,height=490,resizable=yes,left=500,top=80");
     }

</script>
</html>

<? if ($IncMod=='I') { ?>
  <script>
    document.getElementById('descta').focus();
  </script>
<? }

  if (empty($_GET["var"])) { ?>
  <script>
    document.getElementById('mcodigo').focus();
  </script>

<? }

?>
