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
$nomemp=$_SESSION["nomemp"];
$bd=new basedatosAdo($codemp);

$modulo="";
$forma="Definición Especifica de Institución";
$modulo=$_SESSION["modulo"] . " > Contabilidad Financiera >".$forma;

$sql="select forcta,to_char(fecini,'dd/mm/yyyy') as fecini, to_char(feccie,'dd/mm/yyyy') as feccie from contaba where codemp='001'";
  $tb=$bd->select($sql);
  if (!$tb->EOF)
  {
     $formato=$tb->fields["forcta"];
     $fecini=$tb->fields["fecini"];
     $feccie=$tb->fields["feccie"];
  }

$vacio = "S";
$nro="12";

if (!empty ($_GET["fecha1"])) {
  $fecha = $_GET["fecha1"];
  $vacio = "N";
} else {
  $vacio = "S";
}
if (!empty ($_GET["fecha2"])) {
  $fechacie = $_GET["fecha2"];
  $vacio = "N";
} else {
  $vacio = "S";
}

if ($vacio=='N')
{
  if (!empty ($_POST["formato"]))
  { $formato=$_POST["formato"]; }
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
<link href="../../lib/css/estilos.css" rel="stylesheet" type="text/css">
<link rel="STYLESHEET" type="text/css"  href="../../lib/general/toolbar/css/dhtmlXToolbar.css">
<link  href="../../lib/css/datepickercontrol.css" rel="stylesheet" type="text/css">
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

.grid888 {
  color: #00000;
  width: 355px;
  height: 200px;
  /*overflow: auto;*/
  overflow:scroll;
  background-color: #FFFFFF;
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
//-->
</script>
<script language="JavaScript" type="text/JavaScript">
<!--
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
<form name="form1" method="post" action="">
<table width="100%" align="center">
  <tr>
<td width="100%">
      <? require_once('../../lib/general/top.php'); ?>
    </td>
  </tr>
<tr>
<td align="center">
<table width="584" height="175" border="0" class="box" >
  <tr>
        <td class="breadcrumb">SIGA  <? echo $modulo; ?>      </tr>
  <!--DWLayoutTable-->
  <tr >
    <td bgcolor="#FFFFDD"  class="box" >
      <? //include('menu.php'); ?>	</td>
  </tr>
  <tr>
    <td class="box" >
        <table width="545" align="center" class="bodyline">
          <!--DWLayoutTable-->
                <tr>
                  <td height="22" class="form_label_01"><table width="100%" border="0">
                    <tr>
                     <td width="63" height="24" class="form_label_01">C&oacute;digo:</td>
                  <td colspan="3" class="form_label_01"><input name="codemp" type="text" class="imagenInicio" id="codemp" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $codemp;?>" size="8" readonly="true"></td>
                  <td width="214" colspan="4" class="form_label_01"><!--DWLayoutEmptyCell-->&nbsp;</td>
                  </tr>
                <tr valign="middle">
                  <td height="22" class="form_label_01">Nombre:</td>
                  <td colspan="7" class="form_label_01"><input name="nomemp" type="text"  class="imagenInicio" id="nomemp" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $nomemp;?>" size="70" readonly="true"></td>
                  </tr>
                <tr valign="middle">
                  <td height="22" class="form_label_01">Formato:</td>
                  <td colspan="7" class="form_label_01"><input name="formato" type="text" class="imagenInicio" id="formato" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" onKeyup="validatecla(event)" onBlur="quita()" value="<? print $formato;?>" size="40" maxlength="40"></td>
                    </tr>
                  </table></td>
                  </tr>

                <tr>
                  <td height="0"><table border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="179" height="17" valign="top" class="tpButtons">Fechas de los Ejercicios </td>
                  <td width="168" colspan="-5" valign="top" class="tpButtons">Distribuci&oacute;n de los Per&iacute;odos </td>
                </tr>
                <tr>
                  <td height="58" class="form_label_01" valign="top"><table width="100%" cellpadding="2" cellspacing="1" bgcolor="#EEF2F2" class="recuadro">
                    <tr valign="middle">
                      <td width="43%" class="form_label_01">Inicio : </td>
                      <td width="57%">
            <? if ($vacio=="S") {?>
            <input name="fecini" type="text"  class="imagenInicio" id="fecini" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $fecini;?>" size="10" maxlength="10" datepicker="true">
            <? } else {?>
            <input name="fecini" type="text"  class="imagenInicio" id="fecini" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $fecha;?>" size="10" maxlength="10" datepicker="true">
            <? } ?>
            </td>
                      </tr>
                    <tr valign="middle">
                      <td class="form_label_01">Cierre :</td>
                      <td>
              <? if ($vacio=="S") {?>
            <input name="feccie" type="text"  class="imagenInicio" id="feccie" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $feccie;?>" size="10" maxlength="10" datepicker="true">
            <? } else {?>
            <input name="feccie" type="text"  class="imagenInicio" id="feccie" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $fechacie;?>" size="10" maxlength="10" datepicker="true">
            <? } ?>
            </td>
                      </tr>
                    <tr valign="middle">
                      <td colspan="2" class="form_label_01"><div align="center">
                        <label>
                        <input name="dist" type="button" id="dist" value="Distribuir" onClick="periodos();">
                        </label>
                      </div></td>
                      </tr>
                  </table>                    </td>
                  <td colspan="-5" class="form_label_01" valign="top"><div class="grid888" id="div">
                    <table width="100%" cellpadding="2" cellspacing="1" bgcolor="#EEF2F2" class="recuadro">
                      <? //$sw=0; if ($sw==0): $sw=1;  ?>
                      <tr valign="middle">
                        <td width="23%" class="form_label_01 Order">Periodo</td>
                        <td width="43%" class="form_label_01 Order">Fecha Desde </td>
                        <td width="34%" class="form_label_01 Order">Fecha Hasta </td>
                      </tr>
                      <?
          /////// Cargar Periodos ///////
      if ($vacio == "N")
      {
        $cont = 1;
      $incmes = 1;
        $splitfecha = split('/', $fecha);
        $fecha_for = $splitfecha[2] . "-" . $splitfecha[1] . "-" . $splitfecha[0];
        $splitfecha = split('/', $fechacie);
        $fechacie_for = $splitfecha[2] . "-" . $splitfecha[1] . "-" . $splitfecha[0];


        while ((strtotime($fecha_for) < strtotime($fechacie_for)) && ($cont <= $nro))
        {
          $splitfecha = split('-', $fecha_for);
          $sfecha = $splitfecha[2] . "/" . $splitfecha[1] . "/" . $splitfecha[0];
          $periodo = str_pad((String) $cont, 2, '0', STR_PAD_LEFT);
          $incmes=(int)$incmes;
          $fectem=date("Y-m-d", strtotime("$fecha_for $incmes month"));
          $dia=1;
          $fecfin=date("Y-m-d", strtotime("$fectem -$dia day"));
          $splitfecha = split('-', $fecfin);
          $s2fecha = $splitfecha[2] . "/" . $splitfecha[1] . "/" . $splitfecha[0];
      ?>
            <tr valign="middle" class="fila1">
                <td class="form_label_01"><input name="x<? print $cont;?>1" id="x<? print $cont;?>1" readonly="true" type="text" class="grid_txt02" size="3" value="<? print $periodo;?>"></td>
              <td class="form_label_01"><input name="x<? print $cont;?>2" id="x<? print $cont;?>2" readonly="true" type="text" class="grid_txt02" size="10" value="<? print $sfecha;?>"></td>
              <td class="form_label_01"><input name="x<? print $cont;?>3" id="x<? print $cont;?>3" readonly="true" type="text" class="grid_txt02" size="10" value="<? if ($cont ==$nro) print $fechacie; else print $s2fecha;?>"></td>
            </tr>

       <?
       $fecha_for=date("Y-m-d", strtotime("$fecha_for $incmes month"));
        $cont = $cont +1;
        } // fin while

      }
      else // si vacio="S"
      {
              //$sql = "SELECT pereje, to_char(fechas,'dd/mm/yyyy') AS fechas, to_char(fecdes,'dd/mm/yyyy') AS fecdes FROM Contaba1 WHERE FECINI =to_date('$fecini','dd/mm/yyyy') AND FECCIE =to_date('$feccie','dd/mm/yyyy') Order By pereje";
        $sql = "SELECT pereje, to_char(fechas,'dd/mm/yyyy') AS fechas, to_char(fecdes,'dd/mm/yyyy') AS fecdes FROM Contaba1 Order By pereje limit 12";

        $tb=$bd->select($sql);
        if (!$tb->EOF)
        {
        while (!$tb->EOF){
          if ($sw==0): $sw=1;  ?>
              <tr valign="middle" class="fila1">
              <td class="form_label_01"><? echo $tb->fields["pereje"]; ?></td>
              <td class="form_label_01"><? echo $tb->fields["fecdes"]; ?></td>
              <td class="form_label_01"><? echo $tb->fields["fechas"]; ?></td>
              </tr>
              <? else: $sw=0; ?>
              <tr valign="middle" class="fila2">
              <td class="form_label_01"><? echo $tb->fields["pereje"]; ?></td>
              <td class="form_label_01"><? echo $tb->fields["fecdes"]; ?></td>
              <td class="form_label_01"><? echo $tb->fields["fechas"]; ?></td>
              </tr>
              <?   endif;
        $tb->MoveNext();
        } //while
        } //EndIf
      }
        ?>
                    </table>
                  </div></td>
                    </tr>
                  </table></td>
                  </tr>
      </table>
<input type="hidden" id="cont" name="cont" value="<? print $cont; ?>">
              <?  // MENU PRINCIPAL  // ?>
              <div  align="center" id="toolbar_zone2" style="border :0px solid Silver;"/>		</td>
  </tr>
  <tr>
    <td class="breadcrumb"><span class="style13">Registro de <? echo $forma; ?>...</span></td>
  </tr>
</table>
  </tr>
</td>
</table>
<? require_once('../../lib/general/bottom.php'); ?>
</form>
</body>
<script language="JavaScript">

  function validatecla(e)
  {
    tecla=e.keyCode;
    if (tecla==13)
    {
      document.getElementById('fecini').focus();
    }
    else if (tecla==51 || tecla==109 || tecla==16 || tecla==0 || tecla==8|| tecla==17)
    {
      if (tecla==109)
      {
        lon=document.getElementById('formato').value.length;
        valor=document.getElementById('formato').value.substr(lon-2,1);
        if (valor=='-')
        {
          lon=document.getElementById('formato').value.length;
          valor=document.getElementById('formato').value.substr(0,lon-1);
          document.getElementById('formato').value=valor;
        }
      }
    }
    else
    {
      lon=document.getElementById('formato').value.length;
      valido=true;
      for (i=0;i<=lon;i++)
      {
        if (document.getElementById('formato').value[i]!='-' || document.getElementById('formato').value[i]!='#')
        {
          valido=false;
          break;
        }
      }
      if (!valido)
      {
        document.getElementById('formato').value='';
        alert('Caracteres no válidos. Solo se aceptan "#" y "-" ');
      }

      lon=document.getElementById('formato').value.length;
      valor=document.getElementById('formato').value.substr(0,lon-1);
      document.getElementById('formato').value=valor;
    }
  }

  function quita()
  {
    lon=document.getElementById('formato').value.length;
    valor=document.getElementById('formato').value.substr(lon-1,1);
    if (valor=='-')
    {
      lon=document.getElementById('formato').value.length;
      valor=document.getElementById('formato').value.substr(0,lon-1);
      document.getElementById('formato').value=valor;
    }
  }


     function periodos()
     {
      f=document.form1;
      f.action="ConFinIns.php?fecha1="+f.fecini.value+"&fecha2="+f.feccie.value;
    f.submit();
     }





    function onButtonClick(itemId,itemValue)// TOOLBAR
    {
      //alert("Button "+itemId+" was pressed"+(itemValue?("\n select value : "+itemValue):""));
      if(itemId == '0_ojo'){
        alert("Usted vera una Consulta");
      }
      /////////////////////
      else if(itemId == '0_save')
      {
        f=document.form1;
        if(confirm("¿Realmente desea Salvar?"))
        {
          /*
          if (imec=='I')
          {*/
            //alert(imec);
/*            if (f.ref.value==" "){alert("No pueden haber Campos vacios");}
            if (f.cod_pre.value==" "){alert("No pueden haber Campos vacios");}
            if (f.fecha.value==" "){alert("No pueden haber Campos vacios");}
            if (f.des_ref.value==" "){alert("No pueden haber Campos vacios");}
            if (f.cod_ben.value==" "){alert("No pueden haber Campos vacios");}
            if (f.monto.value==" "){alert("No pueden haber Campos vacios");}
              i=1;
              var grid="/";
              var grid2="/";
              var grid3="/";
              var grid4="/";
              var grid5="/";
              cont=0;
              while (i<=20)
              {
                var x1="x"+i+"1";
                var x2="x"+i+"2";
                var x3="x"+i+"3";
                var x4="x"+i+"4";
                var x5="x"+i+"5";

                  if ((document.getElementById(x1).value!=" ") && (document.getElementById(x2).value!=" ") && (document.getElementById(x3).value!=" ") && (document.getElementById(x4).value!=" ") && (document.getElementById(x5).value!=" "))
                  {
                    grid=grid+document.getElementById(x1).value+"/";
                    grid2=grid2+document.getElementById(x2).value+"/";
                    grid3=grid3+document.getElementById(x3).value+"/";
                    grid4=grid4+document.getElementById(x4).value+"/";
                    grid5=grid5+document.getElementById(x5).value+"/";
                    cont=cont+1;
                  }
                i=i+1;
              }
              //alert(grid3);*/

            //pagina="salvar.php?ref="+f.ref.value+"&cod_pre="+f.cod_pre.value+"&fecha="+f.fecha.value+"&des_ref="+f.des_ref.value+"&cod_ben="+f.cod_ben.value+"&monto="+f.monto.value+"&grid="+grid+"&grid2="+grid2+"&grid3="+grid3+"&grid4="+grid4+"&grid5="+grid5+"&imec="+imec+"&cont="+cont;
            //window.open(pagina,"Salvar","menubar=no,toolbar=no,scrollbars=no,width=200,height=20,resizable=yes,left=50,top=50");
      var vacio='<? print $vacio;?>';
      if (vacio=='N')
      {

        if (document.getElementById('formato').value.length>=2)
        {
          f.action="imecConFinIns.php";
          f.submit();
        }
        else
        {
          alert('El Formato del Codigo Contable debe poseer mas de 1 dígito');
          document.getElementById('formato').value.focus();
        }
      }
      else
      {
        alert('Debe realizar el Proceso de Distribución antes de Grabar');
      }
          /*}
          else
          {
            pagina="cerrarap.php?ref="+f.ref.value;
            window.open(pagina,"Cerrar Apartado","menubar=no,toolbar=no,scrollbars=no,width=200,height=20,resizable=yes,left=50,top=50");
          }*/

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
        alert("Busqueda");
      }
      else if(itemId == '0_filter'){
        alert("Filtro");
      }
      else if(itemId == '0_cancelar'){
        if(confirm("¿Desea Cancelar la Transaccion?"))
        {
          f=document.form1;
      f.action="ConFinIns.php";
      f.submit();
        }
      }
      else if(itemId == '0_delete')
      {
          f=document.form1;
          sta='<?=$staapa2;?>';
          pagina="eliminar.php?ref="+f.ref.value+"&sta="+sta+"&montot2="+f.montot2.value+"&apar="+f.apar.value+"&disp="+f.disp.value;
          window.open(pagina,"Eliminar Apartado","menubar=no,toolbar=no,scrollbars=no,width=200,height=20,resizable=yes,left=200,top=300");
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
    aToolBar.loadXML("../../lib/general/_toolbarV1.xml");
    aToolBar.setToolbarCSS("toolbar_zone2","toolbarText3");
    aToolBar.showBar();


  function IsNumeric(valor)// FORMATEAR FECHA
    {
    var log=valor.length; var ok="S";
    for (x=0; x<log; x++)
    { v1=valor.substr(x,1);
    v2 = parseInt(v1);
    //Compruebo si es un valor num�rico
    if (isNaN(v2)) { ok= "N";}
    }
    if (ok=="S") {return true;} else {return false; }
    }

    var primerslap=false;
    var segundoslap=false;
    var tercerslap=false;
   function formateafecha(fecha)
  {
    var long = fecha.length;
    var dia;
    var mes;
    var ano;

    if ((long>=2) && (primerslap==false)) { dia=fecha.substr(0,2);
    if ((IsNumeric(dia)==true) && (dia<=31) && (dia!="00")) { fecha=fecha.substr(0,2)+"/"+fecha.substr(3,7); primerslap=true; }
    else { fecha=""; primerslap=false;}
    }
    else
    { dia=fecha.substr(0,1);
    if (IsNumeric(dia)==false)
    {fecha="";}
    if ((long<=2) && (primerslap=true)) {fecha=fecha.substr(0,1); primerslap=false; }
    }
    if ((long>=5) && (segundoslap==false))
    { mes=fecha.substr(3,2);
    if ((IsNumeric(mes)==true) &&(mes<=12) && (mes!="00")) { fecha=fecha.substr(0,5)+"/"+fecha.substr(6,4); segundoslap=true; }
    else { fecha=fecha.substr(0,3); segundoslap=false;}
    }
    else { if ((long<=5) && (segundoslap=true)) { fecha=fecha.substr(0,4); segundoslap=false; } }
    if (long>=7)
    { ano=fecha.substr(6,4);
    if (IsNumeric(ano)==false) { fecha=fecha.substr(0,6); }
    else { if (long==10){ if ((ano==0) || (ano<1900) || (ano>2100)) { fecha=fecha.substr(0,6); } } }
    }

    if (long>=10)
    {
    fecha=fecha.substr(0,10);
    dia=fecha.substr(0,2);
    mes=fecha.substr(3,2);
    ano=fecha.substr(6,4);
    // A�o no viciesto y es febrero y el dia es mayor a 28
    if ( (ano%4 != 0) && (mes ==02) && (dia > 28) ) { fecha=fecha.substr(0,2)+"/"; }
    }
    return (fecha);
  }
  </script>

</html>
