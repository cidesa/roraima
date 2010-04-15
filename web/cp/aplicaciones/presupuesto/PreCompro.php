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
$tools=new tools();


$modulo="";
$forma="Comprometer";
$modulo=$_SESSION["modulo"] . " > Ejecución Presupuestaria > ".$forma;

Limpiar();
Obtener_FormatoPresup();
if (!empty($_POST["var"]))
  {
    if (!empty($_POST["refcom"]))
     {
       $refcom=str_pad(trim($_POST["refcom"]),8,0,STR_PAD_LEFT);
       $feccom=$_POST["feccom"];
     }
     else
     {
       if (!empty($_GET["refcom"]))
       {
         $refcom=str_pad(trim($_GET["refcom"]),8,0,STR_PAD_LEFT);
         $feccom=$_GET["feccom"];
       }
     }
    $var=$_POST["var"];
    // Si viene por Referencia Precompromiso
    if (!empty($_GET["refprc"]))
    {
      $refprc=trim($_GET["refprc"]);
      $monprc=trim($_GET["monto"]);
      $descom=trim($_POST["descom"]);
      $tipcom=trim($_POST["tipcom"]);
      $nomext=trim($_POST["nomext"]);
      $refiereprc=trim($_POST["refiereprc"]);
      $cedrif=trim($_POST["cedrif"]);
      $nomben=trim($_POST["nomben"]);
      $desprc=trim($_POST["desprc"]);
      $var='11';
    }

        ///////////////// BARRA DE MENU /////////////////
    if ($var=='1')
      {
        if ($tb=$tools->primerRegistro('cpcompro','refcom'))
        {
          $refcom=strtoupper(trim($tb->fields["refcom"]));
          $var=9;   //Para que haga la busqueda
        }
      }
    else if ($var=='2') //Anterior
      {
        if (!empty($refcom))
        {
          $aux=strtoupper(trim($refcom));
          $tb=$tools->primerRegistro('cpcompro','refcom');
          $refcom=strtoupper(trim($tb->fields["refcom"]));
          if ($aux==$refcom)
          {
             $tb=$tools->ultimoRegistro('cpcompro','refcom');
             $refcom=strtoupper(trim($tb->fields["refcom"]));
             $var=9;   //Para que haga la busqueda
          }
          else
          {
             $tb=$tools->anteriorRegistro('cpcompro','refcom',$aux,'N');
             $refcom=strtoupper(trim($tb->fields["refcom"]));
             $var=9;   //Para que haga la busqueda
          }
        }
        else
        {
          $tb=$tools->ultimoRegistro('cpcompro','refcom');
          $refcom=strtoupper(trim($tb->fields["refcom"]));
          $var=9;   //Para que haga la busqueda
        }
      }
    else if ($var=='3') //PROXIMO
      {
        if (!empty($refcom))
        {
          $aux=strtoupper(trim($refcom));
          $tb=$tools->ultimoRegistro('cpcompro','refcom');
          $refcom=strtoupper(trim($tb->fields["refcom"]));
          if ($aux==$refcom)
          {
            $tb=$tools->primerRegistro('cpcompro','refcom');
            $refcom=strtoupper(trim($tb->fields["refcom"]));
            $var=9;   //Para que haga la busqueda
          }
         else
          {
             $tb=$tools->proximoRegistro('cpcompro','refcom',$aux,'N');
             $refcom=strtoupper(trim($tb->fields["refcom"]));
             $var=9;   //Para que haga la busqueda
          }
        }
        else
        {
          $tb=$tools->primerRegistro('cpcompro','refcom');
          $refcom=strtoupper(trim($tb->fields["refcom"]));
          $var=9;   //Para que haga la busqueda
        }
      }

    else if ($var=='4')
      {
        if ($tb=$tools->ultimoRegistro('cpcompro','refcom'))
        {
          $refcom=strtoupper(trim($tb->fields["refcom"]));
          $var=9;   //Para que haga la busqueda
        }
      }
    //////////////// FIN MENU ////////////////

    if ($var==9){
      //////  Busqueda por Codigo  ////////
       $sql="select *,to_char(fecanu,'dd/mm/yyyy') as fecanu,  to_char(feccom,'dd/mm/yyyy') as feccom from CPCompro where trim(refcom)='$refcom'";
       if ($tb=$tools->buscar_datos($sql))
       {
        $imec='M'; //IncMod = "M"   MODIFICAR
        $salvar='No';
         Datos_Compromiso();
        $fechaValida=true;
        $block='S';
        //Cargar_GridImpCom();

       }else{
         $imec='I'; //IncMod = "M"  INCLUIR
         $salvar='Si';
         $fechaValida=true;
         $block='N';
        // $fechaValida=validarFechaPresup($feccom);
       }

    /*}else if ($var=='10'){   //Cuando viene por Refe. PreCompromiso

      $sql="";
       if ($tb=$tools->buscar_datos($sql))
       {
    */
    }
}


  function Datos_Compromiso(){
  global $tools;
  global $tb;
  global $Eliminar;
  global $feccom;
  global $descom;
  global $tipcom;
  global $refprc;
  global $moncom;
  global $salaju;
  global $cedrif;
  global $stacom;
  global $fecanu;
  global $EstatusCom;
  global $nomext;
  global $desprc;
  global $nomben;
  global $estatus;
  global $monaju;
  global $reqaut;
  global $montoreal;
  global $aprcom;

     $RegistroConsultado = $tb->fields["refcom"];
     $feccom = $tb->fields["feccom"];
     $descom = trim($tb->fields["descom"]);
     $tipcom = trim($tb->fields["tipcom"]);
     $refprc = trim($tb->fields["refprc"]);
     $moncom = $tb->fields["moncom"];

    /* se Multipplico por -1, para que cuando sea un ajuste mayor
    muestre el monto positivo
    */

     $salaju = $tb->fields["salaju"] * (-1);
     $montoreal = $tb->fields["moncom"] - $tb->fields["salaju"] ;
     $cedrif = trim($tb->fields["cedrif"]);
     $stacom = trim($tb->fields["stacom"]);
     $fecanu = $tb->fields["fecanu"];
     $EstatusCom = trim($tb->fields["stacom"]);
     $monaju = trim($tb->fields["monaju"]);
     $Eliminar = VerificarEliminar();
     $aprcom = $tb->fields["aprcom"];

      $sql="select nomext, reqaut from CPDocCom where trim(tipcom)='$tipcom'";
       if ($tb=$tools->buscar_datos($sql)) { $nomext = $tb->fields["nomext"]; $reqaut = $tb->fields["reqaut"]; }else{ $nomext=""; }

      $sql="select desprc from CpPreCom where trim(refprc)='$refprc'";
       if ($tb=$tools->buscar_datos($sql)) { $desprc=$tb->fields["desprc"]; }else{ $desprc=""; }

      $sql="select nomben from Opbenefi where trim(cedrif)='$cedrif'";
       if ($tb=$tools->buscar_datos($sql)) { $nomben=$tb->fields["nomben"]; }else{ $nomben=""; }

       if ($stacom=='N'){
         if ($fecanu<>''){ $estatus='Anulado el '.$fecanu; } else { $estatus='Anulado'; }
       }
       else { $estatus=""; }
  }

  function VerificarEliminar()
  {
     global $refcom;
     global $tools;
     global $msg;
     global $monaju;

     $Eliminar='Si';
    if (substr($refcom,0,2)=='OC'){
         $sql="select * from caordcom where trim(ordcom) like '%".substr($refcom,3,6)."'";
          if ($tools->buscar_datos($sql)){
          $Eliminar="No";
          $msg="El Compromiso NO Puede Ser Eliminado,Porque Fue Generado Desde Otro Modulo";
        }
    }else if (substr($refcom,0,2)=='OS'){
         $sql="select * from caordser where trim(ordser) like '%".substr($refcom,2,6)."'";
          if ($tools->buscar_datos($sql)){
          $Eliminar="No";
          $msg="El Compromiso NO Puede Ser Eliminado,Porque Fue Generado Desde Otro Modulo";
        }
    }

  return $Eliminar;
  }


  function Limpiar()
  {
  global $descta;
  global $salvar;
  global $Eliminar;
  global $feccom;
  global $descom;
  global $tipcom;
  global $refprc;
  global $moncom;
  global $salaju;
  global $cedrif;
  global $stacom;
  global $fecanu;
  global $EstatusCom;
  global $nomext;
  global $desprc;
  global $nomben;
  global $estatus;
  global $msg;
  global $refiereprc;

     $descta="";
     $salvar="No";
     $msg="";
     $Eliminar="No";
     $feccom="";
     $descom="";
     $tipcom="";
     $refprc="";
     $block='N';
     $moncom="";
     $salaju="";
     $cedrif="";
     $stacom="";
     $fecanu="";
     $EstatusCom="";
     $nomext="";
     $desprc="";
     $nomben="";
     $estatus="";
     $refiereprc="";
  }

  function Obtener_FormatoPresup()
  {
  global $tools;
  global $bd;
  global $FormatoPresup;
  global $NumeroPeriodos;
  global $fechainicio;
  global $anoinicio;
  global $fechacierre;
  global $anocierre;
  global $asignacion;
  global $NivelDisponibilidad;
  global $Formar_NivelDisponibilidad;

    ////////// Definicion Presupuestaria ///////////
     $sql="select * from cpdefniv where  CodEmp='001'";
     if ($tb=$tools->buscar_datos($sql))
     {
     $FormatoPresup       = trim($tb->fields["forpre"]);
     $NumeroPeriodos      = trim($tb->fields["numper"]);
     $NivelDisponibilidad = trim($tb->fields["nivdis"]);
     $fechainicio         = $tb->fields["fecini"];
     $anoinicio           = substr($tb->fields["fecini"],0,4);
     $fechacierre         = $tb->fields["feccie"];
     $anocierre           = substr($tb->fields["feccie"],0,4);

     if (trim($tb->fields["asiper"])=='S'){ $asignacion=true; } else { $asignacion=false; }

    $sql="select LonNiv from CpNiveles where (Select SUM(LonNiv) AS LonNiv2 From CpNiveles where Consec<='$NivelDisponibilidad')  > 0";
       if ($tools->buscar_datos($sql)){
      $Formar_NivelDisponibilidad=true;
     }else{
       $Formar_NivelDisponibilidad=false;
     }

     }
  }



  function agregar_valor($donde,$valor,$formato)
   {   ?>
     <script>
     var donde='<? echo $donde; ?>';
     var formato='<? echo $formato; ?>';
     if (formato=='#'){
       document.getElementById(donde).value='<? echo number_format($valor,2,',','.'); ?>';
    }else{
      document.getElementById(donde).value='<? echo $valor; ?>';
    }
    </script>
   <? }


?>
<script language="JavaScript" type="text/javascript">
       function actualizar_saldos2() //Actualiza el Saldo Actual
      {
      f=document.form1;
      i=1;
      var valor1=0;
      var valor2=0;
      var valor3=0;
      var valor4=0;
      var acum=0;
      var acum2=0;
      var acum3=0;
      var acum4=0;

      var valor_total=0;

      while (i <= 50)
      {
        var x2="x"+i+"2";
        var x3="x"+i+"3";
        var x4="x"+i+"4";
        var x6="x"+i+"6";
        if (document.getElementById(x2).value!=""){
          str= document.getElementById(x2).value.toString();
          str= str.replace(',','');
          str= str.replace(',','');
          str= str.replace(',','');
          var num2=parseFloat(str);  //Valor Real sin (.) y ni (,)
          valor2=valor2 + num2;
          }

        if (document.getElementById(x3).value!=""){
          str= document.getElementById(x3).value.toString();
          str= str.replace(',','');
          str= str.replace(',','');
          str= str.replace(',','');
          var num3=parseFloat(str);  //Valor Real sin (.) y ni (,)
          valor3=valor3 + num3;
          }

        if (document.getElementById(x4).value!=""){
          str= document.getElementById(x4).value.toString();
          str= str.replace(',','');
          str= str.replace(',','');
          str= str.replace(',','');
          var num4=parseFloat(str);  //Valor Real sin (.) y ni (,)
          valor4=valor4 + num4;
          }

          i=i+1;
        }

          document.getElementById("totmont").value=format(valor2.toFixed(2),'.','.',',');
          document.getElementById("moncom").value=format(valor2.toFixed(2),'.','.',',');
          document.getElementById("totcausado").value=format(valor3.toFixed(2),'.','.',',');
          document.getElementById("totpagdo").value=format(valor4.toFixed(2),'.','.',',');

     }

       function actualizar_saldos2cont(cont) //Actualiza el Saldo Actual
      {
      f=document.form1;
      i=1;
      var valor1=0;
      var valor2=0;
      var valor3=0;
      var valor4=0;
      var acum=0;
      var acum2=0;
      var acum3=0;
      var acum4=0;

      var valor_total=0;
      while (i <= parseInt(cont)-1)
      {
        var x2="x"+i+"2";
        var x3="x"+i+"3";
        var x4="x"+i+"4";
        var x6="x"+i+"6";
        if (document.getElementById(x2).value!=""){
          str= document.getElementById(x2).value.toString();
          str= str.replace(',','');
          str= str.replace(',','');
          str= str.replace(',','');
          var num2=parseFloat(str);  //Valor Real sin (.) y ni (,)
          valor2=valor2 + num2;
          }

        if (document.getElementById(x3).value!=""){
          str= document.getElementById(x3).value.toString();
          str= str.replace(',','');
          str= str.replace(',','');
          str= str.replace(',','');
          var num3=parseFloat(str);  //Valor Real sin (.) y ni (,)
          valor3=valor3 + num3;
          }

        if (document.getElementById(x4).value!=""){
          str= document.getElementById(x4).value.toString();
          str= str.replace(',','');
          str= str.replace(',','');
          str= str.replace(',','');
          var num4=parseFloat(str);  //Valor Real sin (.) y ni (,)
          valor4=valor4 + num4;
          }

          i=i+1;
        }

          document.getElementById("totmont").value    = format(valor2.toFixed(2),'.','.',',');
          document.getElementById("moncom").value     = format(valor2.toFixed(2),'.','.',',');
          document.getElementById("totcausado").value = format(valor3.toFixed(2),'.','.',',');
          document.getElementById("totpagdo").value   = format(valor4.toFixed(2),'.','.',',');

     }

  function ColocarFormatoLocal(key,valor,id)  //ColocarFormato a una caja de texto
    {
      if (key.keyCode==13)
      {
        if (parseInt(id.length)==3){ j=parseInt(id.substring(1,2)); }else{  j=parseInt(id.substring(1,3));  }
        var pos=j+1;
        var aux="x"+pos+"1";

        ColocarFormato(key,valor,id);

      // verificar_saldo(key,id);
      }
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
<script language="JavaScript"  src="../../lib/general/js/prototype.js"></script>
<style type="text/css">
<!--
.style9 {color: #FFFFFF
 }
-->
</style>
<script language="JavaScript" type="text/JavaScript">
  function desactivar(i)
  {
    f=document.form1
    var eliminar='<? echo $Eliminar; ?>'
    var fechaValida='<? echo $fechaValida; ?>'
    var refcom='<? echo $refcom; ?>'
    var refiereprc='<? echo $refiereprc; ?>'
    var imec='<? echo $imec; ?>'

        //alert(eliminar);
    if (eliminar=='No'){ f.descom.disabled=true   } else { f.descom.disabled=false }
    if (imec=='I'){ f.descom.disabled=false   }

    //if (refiereprc=='S'){ f.busq_refpre.disabled=true; } else { f.busq_refpre.disabled=false;  }

    if (refiereprc=='S'){ bloquearGrip(3,i-1,1); }

    if (refcom!=""){

      if (imec=='M'){
        f.refcom.disabled=true;
        f.feccom.disabled=true;
        f.tipcom.disabled=true;
        f.cedrif.disabled=true;

        bloquearGrip(6,i-1,1);
      }else{
        if (fechaValida==true){
          f.refcom.disabled=true;
          f.feccom.disabled=false;
          f.tipcom.disabled=false;
          f.cedrif.disabled=false; }
        //desbloquearGrip(5,i-1,1);
      }
    }
  }

  function ColocarFormatoOnBlueLocal(key,valor,id)  //ColocarFormato a una caja de texto
    {
     // ColocarFormatoOnBlue(key,valor,id)
      //actualizar_saldos2()
    //  alert(valor);
   //   alert(id);
      if (valor!="")
      {
          valor= valor.replace(',','');
      valor= valor.replace(',','');
      valor= valor.replace(',','');

      var valor=parseFloat(valor);
      document.getElementById(id).value=format(valor.toFixed(2),'.','.',',');
      }
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
<td height="100%" valign="top">
<table width="100%" height="175" border="0" class="box">
  <!--DWLayoutTable-->
  <tr>
    <td width="100%" height="20" valign="top" class="breadcrumb">SIGA<? echo $modulo; ?></td>
  </tr>
  <tr >
    <td  >
      <table width="100%" class="recuadro">
      <tr>
         <!--td align="center" width="27%"  -->
          <!-- a href='javascript: primero();'><img src="../../images/1.GIF" width="13" height="13"--></a>
          <!-- a href='javascript: anterior();'><img src="../../images/2.GIF" width="13" height="13"--></a>
          <!-- a href='javascript: siguiente();'><img src="../../images/3.GIF" width="13" height="13"--></a>
          <!-- a href='javascript: ultimo();'><img src="../../images/4.GIF" width="13" height="13"--></a>
          <!--<input type="button" name="Button" value="|&lt;" onClick="primero()">
          <input type="button" name="Submit2" value="&lt;&lt;" onClick="anterior()">
          <input type="button" name="Submit3" value="&gt;&gt;" onClick="siguiente()">
          <input type="button" name="Submit4" value="&gt;|" onClick="ultimo()">-->
        <!-- /td-->
        <td align="CENTER" width="22%">
            <?php  if((iif($aprcom==$reqaut,'S','N')=='N' and $stacom!='N')){ ?><input name="AprCom" type="button" class="important" id="AprCom" value="APROBAR" onClick="Aprobar_Compromiso();" > <? } ?>
            <?php  if((iif($aprcom=='S','S','')=='S' and $stacom!='N')){ ?><div class="letras_rojas">Este Documento ha sido Aprobado</div><? } ?>
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
    <td class="box" >
  <table width="100%" align="center" class="bodyline">
                <!--DWLayoutTable-->
                <tr valign="middle">
                  <td width="12%" height="24" class="form_label_01">Referencia:</td>
                  <td colspan="3" class="form_label_01"><input name="refcom" type="text" class="imagenInicio" id="refcom" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'"  value="<? print $refcom;?>" size="8" maxlength="8" onKeyPress="buscarenter(event)" onblur="if (document.getElementById('refcom').value!=''){ document.getElementById('refcom').value=document.getElementById('refcom').value.pad(8,'0',0); document.getElementById('var').value='9'; f.submit(); }else{ document.getElementById('refcom').value=document.getElementById('refcom').value.pad(8,'#',0);  document.getElementById('var').value='9'; f.submit();}"></td>
                  <td width="8%" class="form_label_01">Fecha: </td>
                  <?
                  if ($block!='S') { ?>
                  <td colspan="2"><input name="feccom" type="text"  class="imagenInicio" id="feccom" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $feccom;?>" size="10" onKeyUp = "this.value=formateafecha(this.value);" onBlur="validar_fecha()"></td>
          <? } else {  ?>
                  <td colspan="2"><input name="feccom" type="text"  class="imagenInicio" id="feccom" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $feccom;?>" size="10" onKeyUp = "this.value=formateafecha(this.value);" readonly="true"></td>
          <? } ?>
                  <td align="center"><font color="#FF0000"><? echo $estatus;?></font></td>
                </tr>
                <tr valign="middle">
                  <td height="22" valign="top" class="form_label_01">Descripci&oacute;n:</td>
                  <td colspan="7" class="form_label_01"><textarea name="descom" cols="87" rows="2" wrap="VIRTUAL" class="imagenInicio" id="descom" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'"><? print $descom;?></textarea></td>
                </tr>
                <tr>
                  <td height="22" colspan="8" class="form_label_01"><table width="100%" border="0">
                    <tr>
                      <td width="56%">
           <fieldset>
           <legend>&nbsp;Tipo Compromiso&nbsp;&nbsp;</legend>
          <table width="100%" cellpadding="2" cellspacing="1" >
                      <tr valign="middle">
                        <td width="32%" class="form_label_01">C&oacute;digo : </td>
                        <td width="10%"><input name="tipcom" type="text"  class="imagenInicio" id="tipcom" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $tipcom;?>" size="4" maxlength="10" onKeyPress="enterA(event,tipcom.id,nomext.id,refiereprc.id,cedrif.id,1);"></td>
                        <td width="19%"><input name="busq_tp" type="button" id="busq_tp" value="..." onClick="javascript: catalogo3(nomext.id,tipcom.id,refiereprc.id,tipcom.id,1);"></td>
                        <td width="39%"><input name="refiereprc" type="hidden" id="refiereprc" value="<? echo $refiereprc; ?>"></td>
                      </tr>
                      <tr>
                        <td colspan="4"><input name="nomext" type="text"  class="imagenInicio" id="nomext" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $nomext;?>" size="40" readonly="true"></td>
                      </tr>
                    </table>
          </fieldset>            </td>
                      <td width="44%">
           <fieldset>
           <legend>&nbsp;Saldos&nbsp;&nbsp;</legend>
          <table cellpadding="2" cellspacing="1">
                      <tr valign="middle">
                        <td>Ajustado :                          </td>
                        <td align="right"><input name="salaju" type="text"  class="imagenInicio1" id="disp2" value="<? print number_format($salaju,2,'.',',');?>" size="15" readonly="true"></td>
                        <td class="form_label_01">Bs</td>
                      </tr>
                      <tr valign="middle">
                        <td >Compromiso :                          </td>
                        <td align="right"  ><input name="apar" type="text"  class="imagenInicio1" id="apar2" value="<? print number_format($montoreal,2,'.',',');?>" size="15" readonly="true"></td>
                        <td>Bs</td>
                      </tr>
                    </table>
           </fieldset>            </td>
                    </tr>
                  </table></td>
                </tr>
                <tr valign="middle">
                  <td height="24" colspan="2" class="form_label_01">Cod Beneficiario :
                  </td>
                  <td width="12%" class="form_label_01"><input name="cedrif" type="text"  class="imagenInicio" id="cedrif" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $cedrif;?>" size="13" maxlength="15" readonly="true"></td>
                  <td width="6%" class="form_label_01"><input name="busq_benef" type="button" id="busq_benef" value="..." onClick="javascript: catalogo(nomben.id,cedrif.id,cedrif.id,2);"></td>
                  <td colspan="4" class="form_label_01"><input name="nomben" type="text"  class="imagenInicio" id="nomben" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $nomben;?>" size="52" readonly="true"></td>
                </tr>
                <tr valign="middle">
                  <td height="24" colspan="2" class="form_label_01">Ref. Precompromiso : </td>
                  <td class="form_label_01"><input name="refprc" type="text"  class="imagenInicio" id="refprc" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $refprc;?>" size="13" maxlength="15" readonly="true"></td>
                  <td class="form_label_01"><input name="busq_refpre" type="button" id="busq_refpre" value="..." onClick="javascript: catalogo(desprc.id,refprc.id,refprc.id,3);"></td>
                  <td colspan="4" class="form_label_01"><input name="desprc" type="text"  class="imagenInicio" id="desprc" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $desprc;?>" size="52" readonly="true"></td>
                </tr>
                <tr valign="middle">
                  <td height="17" colspan="2" class="form_label_01">Monto Compromiso : </td>
                  <td colspan="6" class="form_label_01"> <input name="moncom" type="text"  class="imagenInicio1" id="moncom" value="<? print number_format($moncom,2,'.',',');?>" size="20" readonly="true">
                  </td>
                </tr>
                <tr>
                  <td height="0"></td>
                  <td width="15%"></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td width="5%"></td>
                  <td width="4%"></td>
                  <td width="38%"></td>
                </tr>
              </table>
  </td>
  </tr>
  <tr>
    <td><table width="100%" border="0" class="recuadro">
      <tr>
        <td width="2%" <a href='javascript: catalogogrid(1,1,2,"G");'><img src="../../lib/general/toolbar/imgs/iconNewNewsEntry.gif" width="16" height="16"></a></td>
        <td width="98%" class="tpButtons">IMPUTACIONES PRESUPUESTARIAS</td>
      </tr>
      <tr>
        <td colspan="4">
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr valign="bottom" bgcolor="#ECEBE6">
                  <td width="100%" height="1"> <div class="grid01" id="grid01">
          <table  border="0" cellpadding="0" cellspacing="0">
          <? if ($imec=='I'){ ?>
            <tr>
              <td class="queryheader" >&nbsp;</td>
              <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;&nbsp;C&oacute;digo Presupuestario </td>
              <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;&nbsp;Monto</td>
              <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;&nbsp;Causado</td>
              <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10"> Pagado </td>
               <? //if ($refiereprc=='N'){ ?>
              <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;Disponibilidad </td>
              <? //} ?>
              <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10"> Ajuste </td>
              <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10"> Referencia </td>
              <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10"> Saldo a Comprometer</td>
            </tr>
          <? }else{ ?>
            <tr>
              <td class="queryheader" >&nbsp;</td>
              <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;&nbsp;C&oacute;digo Presupuestario </td>
              <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;&nbsp;Monto</td>
              <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;&nbsp;Causado</td>
              <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10"> Pagado </td>
               <? //if ($refiereprc=='N'){ ?>
              <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;Disponibilidad </td>
              <? //} ?>
              <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10"> Ajuste </td>
              <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10"> Referencia </td>
              <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10"> Saldo a Comprometer</td>
            </tr>
          <? } ?>
              <?
              ////////   //////////
              $i=1;
              if ($var=='11'){   //Cuando viene por Refe. PreCompromiso
                $contad  = $_GET["contad"];
                $cod_bus = split("/",$refprc);

               for($tg=1;$tg<=$contad;$tg++){
                 $sql = "select * From CPImpPrc Where trim(RefPrc)='$cod_bus[$tg]'";

                if ($tb=$tools->buscar_datos($sql)){
                  $totcausado = 0;
                  $totmonto   = 0;
                  $totpagdo   = 0;
                  while (!$tb->EOF){
                     $totmonto   = $totmonto+$tb->fields["monimp"];
                     $totcausado = $totcausado+$tb->fields["moncau"];
                     $totpagdo   = $totpagdo+$tb->fields["monpag"];

                     if ($tb->fields["monaju"] > 0){ $msg="El Compromiso No Puede ser Eliminado Ni Anulado, Tiene un Ajuste."; }
                        ?>
                      <tr>
                        <td class="grid_line01_br"><input name="x<? print $i;?>0" type="txt" class="imagenborrar" id="x<? print $i;?>0" onClick="eliminar_grip(<? print $i;?>,7)" value="" size="1" onFocus="this.blur()"></td>
                        <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>1" id="x<? print $i;?>1" type="text" class="grid_txt02" size="32" value="<? print $tb->fields["codpre"]; ?>"   tabindex="2"></td>
                        <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>2" id="x<? print $i;?>2" type="text" class="grid_txt02" size="15" value="<? print number_format($tb->fields["monimp"],2,'.',','); ?>" align="right"  tabindex="2" ></td>
                        <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>3" id="x<? print $i;?>3" type="text" class="breadcrumbv2" size="15" value="<? print number_format($tb->fields["moncau"],2,'.',','); ?>" align="right"  tabindex="2" ></td>
                        <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>4" id="x<? print $i;?>4" type="text" class="breadcrumbv2" size="15" value="<? print number_format($tb->fields["monpag"],2,'.',','); ?>" align="right"  tabindex="2" ></td>
                         <? if ($refiereprc=='N'){ ?>
                        <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>5" id="x<? print $i;?>5" type="text" class="breadcrumbv2" size="18" value="0.00" align="right"  tabindex="2" readonly="true" ></td>
                        <? } ?>
                        <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>6" id="x<? print $i;?>6" type="text" class="breadcrumbv2" size="15" value="<? print number_format(($tb->fields["monaju"]*(-1)),2,'.',','); ?>" align="right"  tabindex="2" ></td>
                        <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>7" id="x<? print $i;?>7" type="text" class="breadcrumbv2" size="15" value="<? echo $cod_bus[$tg]; ?>" align="right"   tabindex="2" ></td>
                        <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>8" id="x<? print $i;?>8" type="text" class="breadcrumbv2" size="15" value="<? echo number_format($tb->fields["monto"] - $tb->fields["causado"],2,'.',','); ?>" align="right"   tabindex="2" ></td>
                      </tr>
                      <?
                    $tb->MoveNext();
                    $i=$i+1;
                    }   //While
                  }   //EndIf
                }

              }else{ $sql="select * from cpimpcom where trim(refcom)='$refcom'";

              if ($tb=$tools->buscar_datos($sql)){
              $totcausado = 0;
                $totmonto   = 0;
                $totpagdo   = 0;
                while (!$tb->EOF){
                     $totmonto   = $totmonto+$tb->fields["monimp"];
                     $totcausado = $totcausado+$tb->fields["moncau"];
                     $totpagdo   = $totpagdo+$tb->fields["monpag"];
                       if ($tb->fields["monaju"] > 0){ $msg="El Compromiso No Puede ser Eliminado Ni Anulado, Tiene un Ajuste."; }

                    $refere= iif($tb2->fields["refere"],'NULO','');
                    ?>
                  <tr>
                    <td  class="grid_line01_br"><input name="x<? print $i;?>0" type="txt" class="imagenborrar" id="x<? print $i;?>0" onClick="eliminar_grip(<? print $i;?>,6)" value="" size="1" onFocus="this.blur()"></td>
                    <td  align="left"  class="grid_line01_br"><input name="x<? print $i;?>1" id="x<? print $i;?>1" type="text" class="grid_txt02" size="32" value="<? print $tb->fields["codpre"]; ?>" align="right"  tabindex="2"></td>
                    <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>2" id="x<? print $i;?>2" type="text" class="grid_txt02" size="15" value="<? print number_format($tb->fields["monimp"],2,'.',','); ?>" align="right"  tabindex="2" ></td>
                    <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>3" id="x<? print $i;?>3" type="text" class="breadcrumbv2" size="15" value="<? print number_format($tb->fields["moncau"],2,'.',','); ?>" align="right"  tabindex="2" ></td>
                    <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>4" id="x<? print $i;?>4" type="text" class="breadcrumbv2" size="15" value="<? print number_format($tb->fields["monpag"],2,'.',','); ?>" align="right"  tabindex="2" ></td>
                     <? //if ($refiereprc=='N'){ ?>
                    <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>5" id="x<? print $i;?>5" type="text" class="breadcrumbv2" size="18" value="" align="right"  tabindex="2" readonly="true" ></td>
                    <? //} ?>
                    <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>6" id="x<? print $i;?>6" type="text" class="breadcrumbv2" size="15" value="<? print number_format(($tb->fields["monaju"]* (-1)),2,'.',','); ?>" align="right"  tabindex="2" ></td>
                    <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>7" id="x<? print $i;?>7" type="text" class="breadcrumbv2" size="15" value="<? echo $refere; ?>" align="right"   tabindex="2" ></td>
                    <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>8" id="x<? print $i;?>8" type="text" class="breadcrumbv2" size="15" value="<? echo number_format($tb->fields["monimp"] - $tb->fields["moncau"],2,'.',','); ?>" align="right"   tabindex="2" readonly="true" ></td>
                  </tr>
                  <?
                $tb->MoveNext();
                $i=$i+1;
                } ?>
              <script>
              //actualizar_saldos();
              </script> <?
              }else{
	              $i=1;
	              while ($i<=50){
	              //javascript:alert(event.KeyCode); if (event.KeyCode==13){ verificar_saldo(event,this.id); }
	              //ColocarFormatoLocal(event,this.value,this.id)
	              ?>
	              <tr>
	                <td  class="grid_line01_br"><input name="x<? print $i;?>0" type="txt" class="imagenborrar" id="x<? print $i;?>0" onClick="eliminar_grip(<? print $i;?>,7)" value="" size="1" onFocus="this.blur()"></td>
	                <td  align="left"  class="grid_line01_br"><input name="x<? print $i;?>1" id="x<? print $i;?>1" type="text" class="grid_txt01" size="32"  align="left"  tabindex="2"  onKeyDown="javascript:return dFilter (event.keyCode, this,'<? echo $FormatoPresup; ?>');" onBlur="if ($F('refiereprc')=='N') gridatos1(this.value,this.id,'x<? print $i;?>2','x<? print $i;?>2')" value=""></td>
	                <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>2" id="x<? print $i;?>2" type="text" class="grid_txt02" size="15"  align="right" tabindex="2"  onKeyPress="entermonto(event,'x<? print $i;?>1',this.id,'x<? print $i+1;?>1')"  onClick="QuitarComa(this.value,this.id)" onBlur="verificar_saldo(event,this.id)" value="0.00"></td>
	                <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>3" id="x<? print $i;?>3" type="text" class="breadcrumbv2" size="15"  align="right" onKeyPress="actualizar_saldos2()" tabindex="2" value="0.00" ></td>
	                <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>4" id="x<? print $i;?>4" type="text" class="breadcrumbv2" size="15"  align="right" onKeyPress="actualizar_saldos2()" tabindex="2" value="0.00"></td>
	                 <?  /* if ($refiereprc=='N'){ Mensaje($refiereprc); */ ?>
	                <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>5" id="x<? print $i;?>5" type="text" class="breadcrumbv2" size="18" align="right" tabindex="2" readonly="true" value="0.00"></td>
	                <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>6" id="x<? print $i;?>6" type="text" class="breadcrumbv2" size="15" align="right" tabindex="2"  readonly="true"></td>
	                <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>7" id="x<? print $i;?>7" type="text" class="breadcrumbv2" size="15" value="" align="right"   tabindex="2" readonly="true"></td>
	                <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>8" id="x<? print $i;?>8" type="text" class="breadcrumbv2" size="12" value="" align="right"   tabindex="2" readonly="true"></td>
	              </tr>
	              <?
	                $i=$i+1;
	                }
                }   //WHILE
               }    //ENDIF
               ?>
          </table>
                    </div></td>
                </tr>
              </table>
    </td>
      </tr>
      <tr>
        <td height="22" colspan="4"><table width="100%" border="0">
          <tr class="queryheader">
            <td width="6%"><img src="../../images/spacer.gif" width="10" > </td>
            <td width="30%" class="tpHead" >Totales</td>
            <td width="18%"><input name="totmont" type="text" class="cajadetextosimple" id="totmont" size="16" readonly="true"></td>
            <td width="17%"><input name="totcausado" type="text" class="cajadetextosimple" id="totcausado" size="16" readonly="true"></td>
            <td width="29%"><input name="totpagdo" type="text" class="cajadetextosimple" id="totpagdo" size="16" readonly="true"></td>
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
      <input type="hidden" name="var" id="var" />
  <?  /////////////////////////////////////////////////////// ?>
    </span></td>
  </tr>
</table>  </tr>
</td>
</table>

<? if ($imec=='I') { ?>
  <script language="JavaScript" type="text/javascript">
      document.getElementById('feccom').focus();
  </script>
<?
  } ?>

<input name="trash" type="hidden" id="trash">

 <script>
  cont='<? print $i; ?>'
  imec='<? print $imec; ?>'
  actualizar_saldos2cont(cont);
  //var refiereprc='<? echo $refiereprc; ?>'
  //alert(refiereprc);
  //if (refiereprc=='S'){ bloquearGrip(6,i-1,3); }
  //alert(imec);
  if (imec=='M'){ bloquearGrip(6,i,1); }else{ bloquearGrip(6,i-1,3); }

 </script>

</form>

<map name="Map">
  <area shape="rect" coords="-2,0,18,20" href="javascript: catalogogrid(0,2)">
</map>
<? require_once('../../lib/general/bottom.php'); ?>
</body>

<script language="JavaScript">

function validar_fecha()
    {
      f=document.form1;
      fecha=document.getElementById('feccom').value;

      if (fecha.length==10)
      {
        f=document.form1;
        pagina="validar.php?fecha="+f.feccom.value+"&varfec=1";
        window.open(pagina,"validar","menubar=no,toolbar=no,scrollbars=no,width=50,height=50,resizable=yes,left=350,top=300");
      }
      else
      {
        //alert("Longitud de Fecha inválida");
        document.getElementById('feccom').value=mostrarfecha();
        document.getElementById('feccom').focus();
      }

    }

  function buscarenter(e)
      {
        if (e.keyCode==13)
      {
        f=document.form1;
        //f.action="PreCompro.php?var=<? echo '9'; ?>";
        document.getElementById('var').value='9';
        f.submit();
      }
     }

    function Eliminar()
     {
      if(confirm("¿Esta seguro que desear Eliminar ?"))
        {
          f=document.form1;
          f.action="imecPreCompro.php?imec=<? echo 'E'; ?>";
          f.submit();
        }
     }

  function Limpiar()
           {
               location=("PreCompro.php")
           }


   function onButtonClick(itemId,itemValue) //TOOLBAR
    {
      f=document.form1;

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
      salvar = '<? echo $salvar; ?>'
      if (salvar=='Si'){
        if(confirm("¿Realmente desea Salvar?"))
        {
          f=document.form1;
          f.refcom.disabled=false;
          if (document.form1.descom.value=="")
            { alert("No puede salvar sin introducir una descripción"); }

          else if (document.form1.cedrif.value=="")
            { alert("No puede salvar sin introducir el código del beneficiario"); }


          else{
                document.getElementById("x15").disabled=false
                document.getElementById("x16").disabled=false

                f.action="imecPreCompro.php?imec=<? echo 'I'; ?>";
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
          cancelar();
      }
      else if(itemId == '0_delete')
      {
        var eliminar='<? echo $Eliminar; ?>';
        var estatus='<? echo $estatus; ?>';
        var totcausado='<? echo $totcausado; ?>';
        var msg='<? echo $msg; ?>';

        if (eliminar=='Si'){
          if (estatus!=''){ alert ("El Compromiso ya esta Anulado") }
          else if (msg!=''){ alert(msg); }
          else if (totcausado > 0){ alert("El Compromiso No Puede ser Eliminado Ni Anulado, Tiene Movimiento") }
          else
          {
            if(confirm("¿Esta seguro que desea Anular/Eliminar este Código?"))
              {
                document.form1.refcom.disabled=false;
                refcom=document.form1.refcom.value;
                window.open("anuPreCompro.php?refcom="+refcom+"&operacion=P&feccom="+document.getElementById('feccom').value,"","menubar=no,toolbar=no,scrollbars=no,width=500,height=150,resizable=no,left=300,top=200");
                //f=document.form1;
                //f.action='imecPreCompro.php?imec='<? echo "E"; ?>;
                //f.submit();
              }
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
    aToolBar.loadXML("../../lib/general/_toolbarV1.xml");
    aToolBar.setToolbarCSS("toolbar_zone2","toolbarText3");
    aToolBar.showBar();


     function primero()
      {
      f=document.form1;
      f.refcom.disabled=false;
      //f.action="PreCompro.php?var=<? print '1';?>";
      document.getElementById('var').value='1';
      f.submit();
     }
     function anterior()
      {
      f=document.form1;
      f.refcom.disabled=false;
      //f.action="PreCompro.php?var=<? print '2';?>";
      document.getElementById('var').value='2';
      f.submit();
     }
     function siguiente()
      {
      f=document.form1;
      f.refcom.disabled=false;
      //f.action="PreCompro.php?var=<? print '3';?>";
      document.getElementById('var').value='3';
      f.submit();
     }
     function ultimo()
      {
      f=document.form1;
      f.refcom.disabled=false;
      //f.action="PreCompro.php?var=<? print '4';?>";
      document.getElementById('var').value='4';
      f.submit();
     }

     function catalogogrid(c1,c2,fc,tipo)
     {

      f      = document.form1;
      refere = f.refiereprc.value;
      if (refere=='N')
      {
        i = 1;
        while (i<=50)
        {
          var x = "x"+i+c1;
          var y = "x"+i+c2;
          if (document.getElementById(x).value=="")
          {
            if (i==1)
            {
              campo  = "x1"+c1;
              campo2 = "x1"+c2;
              foco   = "x1"+fc;
              i      = 50;
            }
            else
            {
              campo  = x;
              campo2 = y;
              foco   = "x"+i+fc;
              i      = 50;
            }
          }
          i=i+1;
        }
        ///document.getElementById('getf').value = "S";
        //campo2 = 'trash'; //x q no necesito el campo2, tonces lo relleno con lo que sea
        ///sql='select codpre as codigo, nompre as descripcion from cpdeftit a, cpdefniv b where length(rtrim(a.codpre))= length(rtrim(b.forpre)) and codpre like upper(�%�) order by a.codpre';
        //sql    = 'select a.codpre as codigo, a.nompre as descripcion From cpasiini a, CPDEFTIT b Where a.codpre=b.codpre and a.perpre=�00� and a.monasi>0 and UPPER(a.nompre) like upper(�%�)  order by a.codpre';
        //pagina = "catalogo2.php?campo="+campo+"&campo2="+campo2+"&sql="+sql+"&foco="+foco+"&tipo="+tipo;
        //window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=580,height=400,resizable=yes,left=50,top=50");

          var host = '<? echo $_SERVER["HTTP_HOST"]; ?>';
          pagina='http://'+host+'/herramientas_dev.php/generales/catalogo/metodo/PreCompro_Cpasiini/clase/Cpasiini/frame/form1/obj1/'+campo+'/campo1/codpre/submit/false';
          window.open(pagina,"true","menubar=no,toolbar=no,scrollbars=yes,width=490,height=490,resizable=yes,left=500,top=80");

      }
     }



 function catalogo2(campo,campo2,foco,sql)
     {
      f=document.form1;
      pagina="catalogo2.php?campo="+campo+"&campo2="+campo2+"&sql="+sql+"&foco="+foco;
      window.open(pagina,"","menubar=no,toolbar=no,scrollbars=yes,width=510,height=500,resizable=yes,left=50,top=50");
     }


 function catalogo_check(campo,campo2,foco,sql)
     {
      f=document.form1;
      pagina="catal_check.php?campo="+campo+"&campo2="+campo2+"&sql="+sql+"&foco="+foco;
      window.open(pagina,"","menubar=no,toolbar=no,scrollbars=yes,width=510,height=500,resizable=yes,left=50,top=50");
     }


 function catalogo3(campo,campo2,campo3,foco,sw)  //Tipo de compromiso que me trae 3 valores
   {
      //var sql='Select NomExt as Nombre_Extendido,TipCom as Codigo, RefPrc as Refiere, NomAbr as Nombre_Abreviado From CPDocCom where TipCom like upper(�%�) Order By TipCom';
      //pagina="catalogo3.php?campo="+campo+"&campo2="+campo2+"&campo3="+campo3+"&sql="+sql+"&foco="+foco;
      //window.open(pagina,"","menubar=no,toolbar=no,scrollbars=yes,width=460,height=500,resizable=yes,left=50,top=50");

          var host = '<? echo $_SERVER["HTTP_HOST"]; ?>';
          pagina='http://'+host+'/herramientas_dev.php/generales/catalogo/metodo/Precompro_Cpdoccom/clase/Cpdoccom/frame/form1/obj1/'+campo2+'/obj2/'+campo+'/obj3/'+campo3+'/campo1/tipcom/campo2/nomext/campo3/refprc/submit/false';
          window.open(pagina,"true","menubar=no,toolbar=no,scrollbars=yes,width=490,height=490,resizable=yes,left=500,top=80");


   }

 function catalogo(campo,campo2,foco,sw)
   {
   var pagina='';
   var host = '<? echo $_SERVER["HTTP_HOST"]; ?>';

   if (sw==1) {
      var sql='Select NomExt as Nombre_Extendido,TipCom as Codigo, NomAbr as Nombre_Abreviado,RefPrc as Refiere From CPDocCom where TipCom like upper(�%�) Order By TipCom';
      catalogo2(campo,campo2,foco,sql);

    }

   else if (sw==2) {
          f=document.form1;
          refere=f.refiereprc.value;
        if (refere=='N')
        {
            //var sql='select nomben as nombre,cedrif as cedula_rif,dirben as dirección from opbenefi order by cedrif';
            //catalogo2(campo,campo2,foco,sql);

            pagina='http://'+host+'/herramientas_dev.php/generales/catalogo/metodo/Preprecom_Opbenefi/clase/Opbenefi/frame/form1/obj1/'+campo2+'/obj2/'+campo+'/campo1/cedrif/campo2/nomben/submit/false';
        }
        else if (refere=='S')
        {
            if (document.getElementById('cedrif').value=="" && document.getElementById('refprc').value!="")
            {
                //var sql='select nomben as nombre,cedrif as cedula_rif,dirben as dirección from opbenefi order by cedrif';
                //catalogo2(campo,campo2,foco,sql);
                pagina='http://'+host+'/herramientas_dev.php/generales/catalogo/metodo/Preprecom_Opbenefi/clase/Opbenefi/frame/form1/obj1/'+campo2+'/obj2/'+campo+'/campo1/cedrif/campo2/nomben/submit/false';
            }
        }
    }

   else if (sw==3) {
      f=document.form1;
      refere=f.refiereprc.value;
      if (refere=='S')
      {
          var feccom=document.getElementById("feccom").value;
          var sql='Select DesPrc as Descripcion,RefPrc as Referencia,CedRif as Beneficiario,to_char(FecPrc,�dd/mm/yyyy�) as Fecha,MonPrc as Monto From CPPrecom Where StaPrc=�A� and SALCOM < MONPRC-SALAJU and FecPrc <=  to_date((�'+feccom+'�),�dd/mm/yyyy�) and RefPrc like upper(�%�) Order By RefPrc';
          catalogo_check(campo,campo2,'submit',sql);
      }
    }

  if (pagina!=''){
    window.open(pagina,"true","menubar=no,toolbar=no,scrollbars=yes,width=490,height=490,resizable=yes,left=500,top=80");
  }

   }

  function Verificar_longitud(id)
  {
    f=document.form1;
    var FormatoPresup='<? echo $FormatoPresup; ?>'
    //alert(id);
    val=document.getElementById(id).value;
    if ((FormatoPresup.length)==(val.length))
      {
        return true;
      }else
      {
        return false;
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
      val=document.getElementById(id).value;
      if (val!="")
      {
          if (j!=1)
          {
            i=1;
             while (i<=50)
              {
                var x="x"+i+"1";
                if (j!=i)
                {
                  if (val==document.getElementById(x).value)
                  {
                    aux= j-1;
                    aux= "x"+aux+"1";
                    document.getElementById(id).value="";
                    document.getElementById(id2).value="";
                    alert("El Título Presupuestario esta Repetido");
                    document.getElementById(id).focus();
                    i=51;
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


  function gridatos1(tira,id,donde,foco)
    {
       if (tira!='')
       {
          a=repetido2(id,donde);
          if (a==false)
          {
            if (Verificar_longitud(id)){
              cadena=rayitasfc(tira);
              document.getElementById(id).value=cadena;

              f=document.form1;
              cuantos='PreCompro-Grip';
              sql="Select nompre as campo1 From CPDEFTIT Where trim(CodPre)=�"+cadena+"�";
              //sql="Select a.codpre as codigo, b.nompre as descripcion From cpasiini a, CPDEFTIT b Where a.codpre=b.codpre and trim(a.CodPre)=�"+cadena+"� and a.perpre=�00� and a.monasi>0";
              //sql2="Select sum(a.MonDis) as mondis From cpasiini a, CPDEFTIT b Where a.codpre=b.codpre and trim(a.CodPre)=�"+cadena+"� and a.perpre=�00� and a.monasi>0";
              anocierre = '<? echo $anocierre;?>'
              sql2=cadena;
              pagina="gridatos.php?cuantos="+cuantos+"&cta="+cadena+"&id="+id+"&donde="+donde+"&foco="+foco+"&sql="+sql+"&sql2="+sql2+"&anocierre="+anocierre;
              window.open(pagina,"","menubar=no,toolbar=no,scrollbars=no,width=500,height=20,resizable=no,left=100,top=300");
            }
            else{
              alert("El Título Presupuestario no es de ultimo nivel");
            }
          }
    }
    }


   function verificar_saldo(e,id)
   {
        var refiereprc=document.getElementById('refiereprc').value;
          var str=document.getElementById(id).value;
          str= str.replace(',','');
          str= str.replace(',','');
          str= str.replace(',','');
          var monto=parseFloat(str);  //Valor Real sin (.) y ni (,)

        if (monto > 0)
        {
          var Formar_NivelDisponibilidad='<? echo $Formar_NivelDisponibilidad; ?>';

          if (refiereprc=='S')
          {
              //alert(Formar_NivelDisponibilidad);
            // obtener fila actual
            if (parseInt(id.length)==3)
            {
              j=parseInt(id.substring(1,2));
            }
            else
            {
              j=parseInt(id.substring(1,3));
            }
            var id5="x"+j+"5" //Columna de Disponibilidad
            var id2="x"+j+"2" //Columna de Monto
            var id3="x"+j+"3" //Columna de Causado
            var id8="x"+j+"8" //Columna de Saldo a Comprometer
            var cont=j+1;
            var id_nuevo="x"+cont+"1" //Columna de Disponibilidad

        str= document.getElementById(id5).value.toString();
        str= str.replace(',','');
        str= str.replace(',','');
        str= str.replace(',','');

        var id5=parseFloat(str);  //Valor Real sin (.) y ni (,)
                                  //Columna de Disponibilidad


        str= document.getElementById(id).value.toString();
        str= str.replace(',','');
        str= str.replace(',','');
        str= str.replace(',','');

        var id1=parseFloat(str);  //Valor Real sin (.) y ni (,)
                                  //Columna de Disponibilidad

            if ((id1 > id5 ) || (id1==0))  //Monto > MontoImputado
            {
          alert('El Monto a Comprometer es mayor al Saldo del Compromiso.');
          document.getElementById(id).value='0.00';
              document.getElementById(id).focus();
              document.getElementById(id).select();

            }else
            {
          var valor=parseFloat(id1);
          document.getElementById(id).value=format(valor.toFixed(2),'.','.',',');
          var saldo = $F(id2) + $F(id3);
		  $(id8).value=format(valor.toFixed(2),'.','.',',');


              document.getElementById(id_nuevo).focus();
            // document.getElementById(id_nuevo).select();
            }



          }else if (refiereprc=='N'){

              if (Formar_NivelDisponibilidad==true)
              {
                var anocierre='<? echo $anocierre; ?>';

                feccom = document.getElementById("feccom").value;
                var NivelDisponibilidad = '<? echo $NivelDisponibilidad; ?>';


            if (parseInt(id.length)==3)
            {
              j=parseInt(id.substring(1,2));
            }
            else
            {
              j=parseInt(id.substring(1,3));
            }

          var id33="x"+j+"1";
            var id2="x"+j+"2" //Columna de Monto
            var id3="x"+j+"3" //Columna de Causado
            var id8="x"+j+"8" //Columna de Saldo a Comprometer

                //alert(Formar_NivelDisponibilidad);
              // obtener fila actual
                   //Seleccionamo el codigo de la fila en donde se encuentra
          //var id2="x"+j+"2";                    //Columna del monto
                //id3=id.substring(0,2)+"1";

                var codigobuscar = document.getElementById(id33).value+"%";
                //var montocom     = document.getElementById(id).value;
                var montocom = monto;

          var saldo = parseFloat($F(id2)) + parseFloat($F(id3));
		  $(id8).value=format(saldo.toFixed(2),'.','.',',');

          var id5="x"+j+"5";                    //Columna de Disponibilidad
              var cont=j+1;
              var id_nuevo="x"+cont+"1"             //Columna de Disponibilidad

                //id5=id.substring(0,2)+"5";          //Columna de Disponibilidad
                var coldispo     = id5;               //Columna de Disponibilidad
                //var colmonto=id.substring(0,2)+"2";
                var colmonto = "x"+j+"2";

                // alert(document.getElementById("x15").value)
                //Colocar % al codigo
                pagina="gridatos.php?codigobuscar="+codigobuscar+"&anocierre="+anocierre+"&feccom="+feccom+"&NivelDisponibilidad="+NivelDisponibilidad+"&montocom="+montocom+"&coldispo="+coldispo+"&cuantos=PreCompro-Asignacion&colmonto="+colmonto
//alert(pagina);
                window.open(pagina,"","menubar=no,toolbar=no,scrollbars=no,width=500,height=20,resizable=no,left=100,top=300");

              //  var valor = parseFloat(document.getElementById(id2).value);
        //  document.getElementById(id).value=format(valor.toFixed(2),'.','.',',');
            //  document.getElementById(id_nuevo).focus();
              }

          }else{  alert("Debe seleccionar un Tipo de Compromiso. ");  }

        //}
      }
   }


    function enterA(e,campo,campo2,campo3,foco,sw)
    {
      if (e.keyCode==13)
      {
        aux= document.getElementById(campo).value.toUpperCase();
        document.getElementById(campo).value=aux.toUpperCase();

        if (aux!="")
        {
          f=document.form1;
          cuantos='Busqueda3';
          valor=document.getElementById(campo).value;
          sql='Select NomExt as Nombre_Extendido,TipCom as Codigo, NomAbr as Nombre_Abreviado,RefPrc as Refiere From CPDocCom where trim(TipCom)=(�'+valor+'�) Order By TipCom';
          pagina="gridatos.php?campo="+campo+"&campo2="+campo2+"&campo3="+campo3+"&sql="+sql+"&foco="+foco+"&cuantos="+cuantos;
          window.open(pagina,"","menubar=no,toolbar=no,scrollbars=yes,width=500,height=20,resizable=yes,left=10,top=300");
        }
      }
    }

     function actualizar_saldos() //Actualiza el Saldo Actual
      {
      f=document.form1;
      i=1;
      var valor1=0;
      var valor2=0;
      var valor3=0;
      var valor4=0;
      var acum=0;
      var acum2=0;
      var acum3=0;
      var acum4=0;

      var valor_total=0;

      while (i<=50)
      {
        //alert(i);
        var x2="x"+i+"2";
        var x3="x"+i+"3";
        var x4="x"+i+"4";
        var x6="x"+i+"6";
        if (document.getElementById(x2).value!=""){
          str= document.getElementById(x2).value.toString();
          str= str.replace(',','');
          str= str.replace(',','');
          str= str.replace(',','');
          var num2=parseFloat(str);  //Valor Real sin (.) y ni (,)
          valor2=valor2 + num2;
          }

        if (document.getElementById(x3).value!=""){
          str= document.getElementById(x3).value.toString();
          str= str.replace(',','');
          str= str.replace(',','');
          str= str.replace(',','');
          var num3=parseFloat(str);  //Valor Real sin (.) y ni (,)
          valor3=valor3 + num3;
          }

        if (document.getElementById(x4).value!=""){
          str= document.getElementById(x4).value.toString();
          str= str.replace(',','');
          str= str.replace(',','');
          str= str.replace(',','');
          var num4=parseFloat(str);  //Valor Real sin (.) y ni (,)
          valor4=valor4 + num4;
          }

          i=i+1;
        }

          document.getElementById("totmont").value    = format(valor2.toFixed(2),'.','.',',');
          document.getElementById("moncom").value     = format(valor2.toFixed(2),'.','.',',');
          document.getElementById("totcausado").value = format(valor3.toFixed(2),'.','.',',');
          document.getElementById("totpagdo").value   = format(valor4.toFixed(2),'.','.',',');

     }


    function validarFecha(fecha,foco)
    {
      pagina="gridatos.php?cuantos=validarFechaPresup&sql="+fecha+"&foco="+foco;
      window.open(pagina,"","menubar=no,toolbar=no,scrollbars=no,width=20,height=20,resizable=no,left=100,top=300");
    }

     function eliminar_grip(i,c)
       {
         f=document.form1;
      var fila;
      for (fila=i;fila<50;fila++)
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
      if (i==50)
      {
        for (col=0;col<=c;col++)
        {
          var x="x"+i+col;
          document.getElementById(x).value="";
        }

      }//if (fila==20)
     }

      function consulta()
      {
          f=document.form1;
          var host = '<? echo $_SERVER["HTTP_HOST"]; ?>';
          document.getElementById('var').value='9';
          //var campo2='descom';
          //var campo='refcom';
          //var foco='submit';
          //sql='Select refcom as Codigo, descom as Nombre from cpcompro where upper(refcom) like upper(�%�) order by refcom';
          //pagina="catalogo2.php?campo="+campo+"&campo2="+campo2+"&sql="+sql+"&foco="+foco;
          //window.open(pagina,"","menubar=no,toolbar=no,scrollbars=yes,width=570,height=500,resizable=yes,left=50,top=50");

          pagina='http://'+host+'/herramientas_dev.php/generales/catalogo/metodo/Cpcompro_Precompro/clase/Cpcompro/frame/form1/obj1/refcom/obj2/descom/campo1/refcom/campo2/descom/submit/true';
          window.open(pagina,"true","menubar=no,toolbar=no,scrollbars=yes,width=490,height=490,resizable=yes,left=500,top=80");
     }

  function foco(e,id)
  {
      if (e.keyCode==13)
      {
          if (parseInt(id.length)==3)
          {
            j=parseInt(id.substring(1,2));
          }
          else
          {
            j=parseInt(id.substring(1,3));
          }

      cont = j + 1;
      var id_nuevo="x"+cont+"1";
      document.getElementById(id_nuevo).focus();
    }
  }

    function entermonto(e,cod,id,fc)
    {
      if (e.keyCode==13)
      {

        if ((validarnumero(id)==true) && (document.getElementById(id).value>0))
        {
           ColocarFormato(e,document.getElementById(id).value,id);
           focos(e,fc);
        }
        else
        {
          document.getElementById(id).value='0.00';
          document.getElementById(id).focus();
          document.getElementById(id).select();
        }
      }
    }


    function Aprobar_Compromiso(sw)
    {
      var status='<? echo $status; ?>';
      if (status=="N")
      {
         alert("Este Compromiso no se puede Aprobar por que esta Anulado");

      }else{
           if (f.refcom.value!="")
           {
              f        = document.form1;
                f.action = "imecPreCompro.php?imec=A";
                f.submit();
           }
      }
    }
</script>
</html>