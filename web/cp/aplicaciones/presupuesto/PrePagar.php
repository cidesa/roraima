<?
/////////////////////////	/////////////////////////	/////////////////////////

//NOTA: CAMBIAR EL TAMANO DEL CAMPO REFCAU DE LA TABLA CPPAGOS A 100 COMO MINIMOS
//       Y AGREGAR EL CAMPO staimp DE 1  	//
//    trig_incpag -> Referencia_Causad VARCHAR(100);

/////////////////////////	/////////////////////////	/////////////////////////

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
$forma="Pagar";
$modulo=$_SESSION["modulo"] . " > Ejecución Presupuestaria > ".$forma;

Limpiar();
Obtener_FormatoPresup();
if (!empty($_POST["var"]))
  {
    if (!empty($_POST["refpag"]))
    {
       $refpag=str_pad(trim($_POST["refpag"]),8,0,STR_PAD_LEFT);
       $fecpag=$_POST["fecpag"];
    }
    else
    {
      if (!empty($_GET["refpag"]))
      {
        $refpag=str_pad(trim($_GET["refpag"]),8,0,STR_PAD_LEFT);
        $fecpag=$_GET["fecpag"];
      }
    }

    $var=$_POST["var"];
    // Si viene por Referencia
    if (!empty($_GET["refcau"]))
    {
      $refcau=trim($_GET["refcau"]);
      $monpag=trim($_GET["monto"]);
      //$fecpag=trim($_POST["fecpag"]);
      $despag=trim($_POST["despag"]);
      $tippag=trim($_POST["tippag"]);
      $nomext=trim($_POST["nomext"]);
      $refierea=trim($_POST["refierea"]);
            //Mensaje($_POST["cedrif"]);
      if (!empty($_POST["cedrif"])){
        $cedrif=trim($_POST["cedrif"]);
        $nomben=trim($_POST["nomben"]);
      }else{

        $cedrif=trim($_GET["cedrif"]);
        $sql="Select * From OPBENEFI Where trim(cedrif)='$cedrif'";
         if ($tb=$tools->buscar_datos($sql))
         {
          $nomben=$tb->fields["nomben"];
         }
      }

      //$desprc=trim($_POST["desprc"]);
      $var='11';
    }

        ///////////////// BARRA DE MENU /////////////////
    if ($var=='1')
      {
        if ($tb=$tools->primerRegistro('cppagos','refpag'))
        {
          $refpag=trim($tb->fields["refpag"]);
          $var=9;   //Para que haga la busqueda
        }
      }
    else if ($var=='2') //Anterior
      {
        if (!empty($refpag))
        {
          $aux=trim($refpag);
          $tb=$tools->primerRegistro('cppagos','refpag');
          $refpag=trim($tb->fields["refpag"]);
          if ($aux==$refpag)
          {
             $tb=$tools->ultimoRegistro('cppagos','refpag');
             $refpag=trim($tb->fields["refpag"]);
             $var=9;   //Para que haga la busqueda
          }
          else
          {
             $tb=$tools->anteriorRegistro('cppagos','refpag',$aux,'N');
             $refpag=trim($tb->fields["refpag"]);
             $var=9;   //Para que haga la busqueda
          }
        }
        else
        {
          $tb=$tools->ultimoRegistro('cppagos','refpag');
          $refpag=trim($tb->fields["refpag"]);
          $var=9;   //Para que haga la busqueda
        }
      }
    else if ($var=='3') //PROXIMO
      {
        if (!empty($refpag))
        {
          $aux=trim($refpag);
          $tb=$tools->ultimoRegistro('cppagos','refpag');
          $refpag=trim($tb->fields["refpag"]);
          if ($aux==$refpag)
          {
             $tb=$tools->primerRegistro('cppagos','refpag');
             $refpag=trim($tb->fields["refpag"]);
             $var=9;   //Para que haga la busqueda
          }
          else
          {
             $tb=$tools->proximoRegistro('cppagos','refpag',$aux,'N');
             $refpag=trim($tb->fields["refpag"]);
             $var=9;   //Para que haga la busqueda
          }
        }
        else
        {
          $tb=$tools->primerRegistro('cppagos','refpag');
          $refpag=trim($tb->fields["refpag"]);
          $var=9;   //Para que haga la busqueda
        }
      }

    else if ($var=='4')
      {
        if ($tb=$tools->ultimoRegistro('cppagos','refpag'))
        {
          $refpag=$refpag=trim($tb->fields["refpag"]);
          $var=9;   //Para que haga la busqueda
        }
      }
    //////////////// FIN MENU ////////////////
    if (($var=='9') or ($var=='11')){
      //////  Busqueda por Codigo  ////////
        $sql="select *,to_char(fecanu,'dd/mm/yyyy') as fecanu,  to_char(fecpag,'dd/mm/yyyy') as fecpag from cppagos where trim(refpag)='$refpag'";
       if ($tb=$tools->buscar_datos($sql))
       {
        $imec='M'; //IncMod = "M"   MODIFICAR
        $salvar='No';
         Datos_Pagado();
        $fechaValida=true;
        //Cargar_GridImpCom();

       }else{
         $imec='I'; //IncMod = "M"  INCLUIR
         $salvar='Si';
         $fechaValida=true;
        // $fechaValida=validarFechaPresup($fecpag);
       }
    /*}else if ($var=='10'){   //Cuando viene por Refe. PreCompromiso

      $sql="";
       if ($tb=$tools->buscar_datos($sql))
       {
    */
    }
}


  function Datos_Pagado(){
  global $tools;
  global $tb;
  global $Eliminar;
  global $fecpag;
  global $despag;
  global $tippag;
  global $refcau;
  global $monpag;
  global $salaju;
  global $cedrif;
  global $stapag;
  global $fecanu;
  global $EstatusPag;
  global $nomext;
  //global $desprc;
  global $nomben;
  global $estatus;
  global $monaju;


     $RegistroConsultado = $tb->fields["refpag"];
     $fecpag = $tb->fields["fecpag"];
     $despag = trim($tb->fields["despag"]);
     $tippag = trim($tb->fields["tippag"]);
     $refcau = trim($tb->fields["refcau"]);
     $monpag = $tb->fields["monpag"];

    /* se Multipplico por -1, para que cuando sea un ajuste mayor
    muestre el monto positivo
    */
     $salaju = $tb->fields["salaju"] * (-1);
     $monapa = $tb->fields["monpag"] - $tb->fields["salaju"];
     $cedrif = trim($tb->fields["cedrif"]);
     $stapag = trim($tb->fields["stapag"]);
     $fecanu = $tb->fields["fecanu"];
     $EstatusPag = trim($tb->fields["stapag"]);
     $monaju = trim($tb->fields["monaju"]);
     $Eliminar=VerificarEliminar();

      $sql="select nomext from CPDocPag where trim(tippag)='$tippag'";
       if ($tb=$tools->buscar_datos($sql)) { $nomext=$tb->fields["nomext"]; }else{ $nomext=""; }

      /*$sql="select desprc from CpPreCom where trim(refcau)='$refcau'";
       if ($tb=$tools->buscar_datos($sql)) { $desprc=$tb->fields["desprc"]; }else{ $desprc=""; }*/

       $sql="select nomben from opbenefi where trim(cedrif)='$cedrif'";
       if ($tb=$tools->buscar_datos($sql)) { $nomben=$tb->fields["nomben"]; }else{ $nomben=""; }

       if ($stapag=='N'){
         if ($fecanu<>''){ $estatus='Anulado el '.$fecanu; } else { $estatus='Anulado'; }
       }
       else { $estatus=""; }
  }

  function VerificarEliminar()
  {
     global $refpag;
     global $tools;
     global $msg;

     $Eliminar='Si';
     $sql="select * from tsmovlib where trim(reflib)='$refpag'";
     if (!$tools->buscar_datos($sql))
     {
        $Eliminar="Si";
     }else{

       $msg="El Pagado no puede ser Anulado o Eliminado porque se Originó en Otro Módulo"; }

  return $Eliminar;
  }


  function Limpiar()
  {
  global $descta;
  global $salvar;
  global $Eliminar;
  global $fecpag;
  global $despag;
  global $tippag;
  global $refcau;
  global $monapa;
  global $monpag;
  global $salaju;
  global $cedrif;
  global $stapag;
  global $fecanu;
  global $EstatusPag;
  global $nomext;
  //global $desprc;
  global $nomben;
  global $estatus;
  global $msg;
  global $refierea;

      $descta="";
     $salvar="No";
     $msg="";
     $Eliminar="No";
     $fecpag="";
     $despag="";
     $tippag="";
     $refcau="";
     $monpag="";
     $salaju="";
     $cedrif="";
     $stapag="";
     $fecanu="";
     $EstatusPag="";
     $nomext="";
     //$desprc="";
     $nomben="";
     $estatus="";
     $refierea="";
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
     $FormatoPresup=trim($tb->fields["forpre"]);
     $NumeroPeriodos=trim($tb->fields["numper"]);
     $NivelDisponibilidad=trim($tb->fields["nivdis"]);
     $fechainicio=$tb->fields["fecini"];
     $anoinicio=substr($tb->fields["fecini"],0,4);
     $fechacierre=$tb->fields["feccie"];
     $anocierre=substr($tb->fields["feccie"],0,4);
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
   { 	?>
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
  function desactivar(i)
  {
    f=document.form1
    var eliminar='<? echo $Eliminar; ?>'
    var fechaValida='<? echo $fechaValida; ?>'
    var refpag='<? echo $refpag; ?>'
    var refierea='<? echo $refierea; ?>'
    var imec='<? echo $imec; ?>'
        //alert(eliminar);
    if (eliminar=='No'){ f.despag.disabled=true	 } else { f.despag.disabled=false }
    if (imec=='I'){ f.despag.disabled=false	 }
    //alert(refierea);
    //if (refierea=='S'){ f.busq_refpre.disabled=true; } else { f.busq_refpre.disabled=false;  }

    if (refpag!=""){

      if (imec=='M'){
        f.refpag.disabled=true;
        f.fecpag.disabled=true;
        f.tippag.disabled=true;
        f.cedrif.disabled=true;

        bloquearGrip(6,i-1,1);
      }else{
        if (fechaValida==true){
          f.refpag.disabled=true;
          f.fecpag.disabled=false;
          f.tippag.disabled=false;
          f.cedrif.disabled=false; }
        //desbloquearGrip(5,i-1,1);
      }
      if ((refierea=='A') || (refierea=='P') || (refierea=='C'))
      {
        bloquearGrip(0,i-1,1); //Bloquea solamente la columna 1=Codigo Presupuesto
        bloquearGrip(6,i-1,3); //Bloquea desde la columna 3=Ajuste
      }
    }
  }

  function ColocarFormatoOnBlueLocal(key,valor,id)  //ColocarFormato a una caja de texto
    {
      ColocarFormatoOnBlue(key,valor,id)
      //actualizar_saldos2()
    }

  function ColocarFormatoLocal(key,valor,id)  //ColocarFormato a una caja de texto
    {
     // if (key.keyCode==13){
        if (parseInt(id.length)==3){ j=parseInt(id.substring(1,2)); }else{	j=parseInt(id.substring(1,3));	}
        pos=j+1;
        aux="x"+pos+"1";
        aux1="x"+j+"5";

        if (verificar_saldo(id,aux1))
        {
	        document.getElementById(aux).focus();
	        ColocarFormato(key,valor,id);
	        if (key.keyCode==13){	}
        }else
        {
        	document.getElementById(id).value=0;
        	document.getElementById(id).select();
        }
        actualizar_saldos();
      //}
        //actualizar_saldos();
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
<form name="form1" method="post">
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
    <td width="100%" height="20" valign="top" class="breadcrumb">SIGA <? echo $modulo; ?></td>
  </tr>
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
    <td class="box" >
  <table width="100%" align="center" class="bodyline">
                <!--DWLayoutTable-->
                <tr valign="middle">
                  <td width="12%" height="24" class="form_label_01">Referencia:</td>
                  <td colspan="3" class="form_label_01"><input name="refpag" autocomplete = "off"  type="text" class="imagenInicio" id="refpag" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'"  value="<? print $refpag;?>" size="8" maxlength="8" onKeyPress="buscarenter(event)" onblur="if (document.getElementById('refpag').value!=''){ document.getElementById('refpag').value=document.getElementById('refpag').value.pad(8,'0',0); document.getElementById('var').value='9'; f.submit(); }else{ document.getElementById('refpag').value=document.getElementById('refpag').value.pad(8,'#',0);  document.getElementById('var').value='9'; f.submit();}"></td>
                  <td width="8%" class="form_label_01">Fecha: </td>
                  <? if ($imec=='I') { ?>
                  <td colspan="2"><input name="fecpag" autocomplete = "off" type="text" class="imagenInicio" id="fecpag" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $fecpag;?>" size="10" onKeyUp = "this.value=formateafecha(this.value);" onBlur="validar_fecha()">
                  <? } else { ?>
          <td colspan="2"><input name="fecpag" autocomplete = "off" type="text" class="imagenInicio" id="fecpag" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $fecpag;?>" size="10" onKeyUp = "this.value=formateafecha(this.value);" readonly="true">
                  <? } ?>
                  </td>
                  <td align="center"><font color="#FF0000"><? echo $estatus;?></font></td>
                </tr>
                <tr valign="middle">
                  <td height="22" valign="top" class="form_label_01">Descripci&oacute;n:</td>
                  <td colspan="7" class="form_label_01"><textarea name="despag" autocomplete = "off" cols="86" rows="2" wrap="VIRTUAL" class="imagenInicio" id="despag" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'"><? print $despag;?></textarea></td>
                </tr>
                <tr>
                  <td height="22" colspan="8" class="form_label_01"><table width="100%" border="0">
                    <tr>
                      <td width="56%">
           <fieldset>
           <legend>&nbsp;Tipo Pagado&nbsp;&nbsp;</legend>
           <table width="100%" cellpadding="2" cellspacing="1" >
                      <tr valign="middle">
                        <td width="32%" class="form_label_01">C&oacute;digo : </td>
                        <td width="10%"><input name="tippag"  type="text" autocomplete = "off" class="imagenInicio" id="tippag" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $tippag;?>" size="4" maxlength="10" onBlur="enterA(event,tippag.id,nomext.id,refierea.id,cedrif.id,1);"></td>
                        <td width="19%"><input name="busq_tp" type="button" autocomplete = "off" id="busq_tp" value="..." onClick="javascript: catalogo3(nomext.id,tippag.id,refierea.id,'x11',1);"></td>
                        <td width="39%"><input name="refierea"  type="hidden" autocomplete = "off" id="refierea" value="<? echo $refierea; ?>"></td>
                      </tr>
                      <tr>
                        <td colspan="4"><input name="nomext"  type="text"  autocomplete = "off" class="imagenInicio" id="nomext" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $nomext;?>" size="40" readonly="true"></td>
                      </tr>
                    </table>
          </fieldset>					  </td>
                      <td width="44%">
           <fieldset>
           <legend>&nbsp;Saldos&nbsp;&nbsp;</legend>
          <table cellpadding="2" cellspacing="1">
                      <tr valign="middle">
                        <td>Ajustado :                          </td>
                        <td align="right"><input name="salaju"  type="text" autocomplete = "off" class="imagenInicio1" id="disp2" value="<? print number_format($salaju,2,'.',',');?>" size="15" readonly="true"></td>
                        <td class="form_label_01">Bs</td>
                      </tr>
                      <tr valign="middle">
                        <td >Pagado:                          </td>
                        <td align="right"  ><input name="apar" type="text" autocomplete = "off" class="imagenInicio1" id="apar2" value="<? print number_format($monapa,2,'.',',');?>" size="15" readonly="true"></td>
                        <td>Bs</td>
                      </tr>


                    </table>
           </fieldset>					  </td>
                    </tr>
                  </table></td>
                </tr>
                <tr valign="middle">
                  <td height="24" colspan="2" class="form_label_01">Cod Beneficiario :
                  </td>
                  <td width="12%" class="form_label_01"><input name="cedrif" autocomplete = "off" type="text"   class="imagenInicio" id="cedrif" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $cedrif;?>" size="13" maxlength="15" onKeyPress="enterB(event,'cedrif','nomben','x11')"></td>
                  <td width="6%" class="form_label_01"><input name="busq_benef" autocomplete = "off" type="button" id="busq_benef" value="..." onClick="javascript: catalogo(nomben.id,cedrif.id,cedrif.id,2);"></td>
                  <td colspan="4" class="form_label_01"><input name="nomben" autocomplete = "off" type="text"  class="imagenInicio" id="nomben" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $nomben;?>" size="52" readonly="true"></td>
                </tr>
                <tr valign="middle">
                  <td height="24" colspan="2" class="form_label_01"><input name="ref" autocomplete = "off" type="text"  class="escondido" id="ref"  value="Referencia :" size="13"  readonly="true"></td>
                  <td class="form_label_01"><input name="refcau" type="text" autocomplete = "off" class="imagenInicio" id="refcau" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $refcau;?>" size="13" readonly="true"></td>
                  <td class="form_label_01"><input name="busq_refpre" type="button" autocomplete = "off" id="busq_refpre" value="..." onClick="javascript: catalogo(refcau.id,'',refcau.id,3);"></td>
                  <td colspan="4" class="form_label_01"><!--DWLayoutEmptyCell-->&nbsp;</td>
                </tr>
                <tr valign="middle">
                  <td height="17" colspan="2" class="form_label_01">Monto Pagado : </td>
                  <td colspan="6" class="form_label_01"> <input name="monpag" autocomplete = "off" type="text"  class="imagenInicio1" id="monpag" value="<? print number_format($monpag,2,'.',',');?>" size="20" readonly="true">
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
        <td width="4%" class="tpButtons"><img src="../../lib/general/toolbar/imgs/iconNewNewsEntry.gif" width="16" height="16" border="0" usemap="#Map"></td>
        <td width="96%"  class="tpButtons">IMPUTACIONES PRESUPUESTARIAS</td>
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
                        <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;&nbsp;Ajuste</td>
                        <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10"> Neto </td>
                        <? //if ($refierea=='N'){ ?>
                        <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;Disponibilidad </td>
                        <? //} ?>
                        <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10"> Referencia</td>
						<td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;Saldo para Pagar</td>

                        </tr>
                      <? }else{ ?>
                      <tr>
                        <td class="queryheader" >&nbsp;</td>
                        <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;&nbsp;C&oacute;digo Presupuestario </td>
                        <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;&nbsp;Monto</td>
                        <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;&nbsp;Ajuste</td>
                        <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10"> Neto </td>
                        <? //if ($refierea=='N'){ ?>
                        <!--td width="91" class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;Disponibilidad </td-->
                        <? //} ?>
                        <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10"> Disponibilidad</td>
                        <td class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10"> Referencia </td>
                        <td class="queryheader" ><img src="../../images/prev1.gif" alt="Saldo a Causar" width="10" height="10">&nbsp;Saldo para Pagar</td>
                      </tr>
                      <? } ?>
                      <?
              ////////   //////////
              $i=1;
              if ($var=='11'){ //Cuando viene por Refe.
              $contad=$_GET["contad"];
              //Mensaje($contad);
              $cod_bus=split("/",$refcau);
              //$cod_bus=refcau);
              $totajuste=0;
              $totmonto=0;
              $totneto=0;

              for($tg=1;$tg<=$contad;$tg++){

                  if      ($refierea=='A'){  $sql="Select * From cpimpcau Where trim(refcau)='$cod_bus[$tg]'"; }
                  else if ($refierea=='C'){  $sql="Select * From cpimpcom Where trim(refcau)='$cod_bus[$tg]'"; 	}
                  else if ($refierea=='P'){  $sql="Select * From cpimpprc Where trim(refcau)='$cod_bus[$tg]'"; 	}

                if ($tb=$tools->buscar_datos($sql)){
                  $col2=0;
                  $col3=0;
                  $col4=0;
                  $col5=0;
                  while (!$tb->EOF){
                      if      ($refierea=='A'){
                              $col1= trim($tb->fields["codpre"]);
                            $col2=($tb->fields["monimp"] - $tb->fields["monpag"] - $tb->fields["monaju"]);
                            $col3=0;
                            $col4=0;
                            $col5=($tb->fields["monimp"] - $tb->fields["monpag"] - $tb->fields["monaju"]);
                            }
                      else if ($refierea=='C'){
                              $col1= trim($tb->fields["codpre"]);
                            $col2=($tb->fields["monimp"] - $tb->fields["monpag"] - $tb->fields["monaju"]);
                            $col3=0;
                            $col4=0;
                            $col5=($tb->fields["monimp"] - $tb->fields["monpag"] - $tb->fields["monaju"]);

                              }
                      else if ($refierea=='P'){
                              $col1= trim($tb->fields["codpre"]);
                            $col2=($tb->fields["monimp"] - $tb->fields["monpag"]);
                            $col3=0;
                            $col4=0;
                            $col5=($tb->fields["monimp"] - $tb->fields["monpag"]);

                               }

                         $totmonto=$totmonto+$col2;
                         $totajuste=$totajuste+$col3;
                         $totneto=$totneto+$col4;
                           if ($tb->fields["monaju"] > 0){ $msg="El Pagado No Puede ser Eliminado Ni Anulado, Tiene un Ajuste."; }
                        ?>
                      <tr>
                        <td class="grid_line01_br"><input name="x<? print $i;?>0" type="text" autocomplete = "off"  class="imagenborrar" id="x<? print $i;?>0" onClick="eliminar_grip(<? print $i;?>,6)" value="" size="1" onFocus="this.blur()"></td>
                        <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>1"  autocomplete = "off" id="x<? print $i;?>1" type="text" class="grid_txt01" size="32" value="<? print $col1; ?>" align="right"></td>
                        <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>2" autocomplete = "off"  id="x<? print $i;?>2" type="text" class="grid_txt02" size="15" value="<? print number_format($col2,2,'.',','); ?>" align="right"  tabindex="2" onClick="QuitarComa(this.value,this.id)" onBlur="ColocarFormatoLocal(event,this.value,this.id); ColocarFormatoOnBlueLocal(event,this.value,this.id)"></td>
                        <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>3"  autocomplete = "off" id="x<? print $i;?>3" type="text" class="breadcrumbv2" size="15" value="<? print number_format($col3,2,'.',','); ?>" align="right"  tabindex="3"></td>
                        <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>4"  autocomplete = "off" id="x<? print $i;?>4" type="text" class="breadcrumbv2" size="15" value="<? print number_format($col4,2,'.',','); ?>" align="right"  tabindex="4"></td>
                        <? //if ($refierea=='N'){ ?>
                        <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>5" autocomplete = "off"  id="x<? print $i;?>5" type="text" class="breadcrumbv2" size="18" value="<? print number_format($col5,2,'.',','); ?>" align="right"  tabindex="5" readonly="true" ></td>
                        <? //} ?>
                        <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>6"   id="x<? print $i;?>6" type="text" class="grid_txt02" size="15" value="<? echo $cod_bus[$tg]; ?>" align="right"   tabindex="6" ></td>
						<td  align="right" class="grid_line01_br"><input name="x<? print $i;?>10" id="x<? print $i;?>10" type="text" class="breadcrumbv2" size="12" value="<? print number_format($col10[$i],2,'.',','); ?>" readonly="true"></td>
                        </tr>
                      <?
                    $tb->MoveNext();
                    $i=$i+1;
                    }   //While
                  }   //EndIf
                }

              }else{ $sql="select * from cpimppag where trim(refpag)='$refpag'";	//Para la Busqueda

              if ($tb=$tools->buscar_datos($sql)){
              $totajuste=0;
              $totmonto=0;
              $totneto=0;
              while (!$tb->EOF){
                     $totmonto  = $totmonto  + $tb->fields["monimp"];
                     $totajuste = $totajuste + $tb->fields["monaju"];
                     $totneto   = $totneto   + ($tb->fields["monimp"] - $tb->fields["monaju"]);

                       if ($tb->fields["monaju"] > 0){ $msg="El Pagado No Puede ser Eliminado Ni Anulado, Tiene un Ajuste."; }
                    ?>
                      <tr>
                        <td class="grid_line01_br"><input name="x<? print $i;?>0"  autocomplete = "off" type="txt" class="imagenborrar" id="x<? print $i;?>0" onClick="eliminar_grip(<? print $i;?>,6)" value="" size="1" onFocus="this.blur()"></td>
                        <td  align="left" class="grid_line01_br"><input name="x<? print $i;?>1"  autocomplete = "off" id="x<? print $i;?>1" type="text" class="grid_txt01" size="32" value="<? print $tb->fields["codpre"]; ?>" align="right"  tabindex="2"></td>
                        <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>2" autocomplete = "off"  id="x<? print $i;?>2" type="text" class="grid_txt02" size="15" value="<? print number_format($tb->fields["monimp"],2,'.',','); ?>" align="right"  tabindex="2" onClick="QuitarComa(this.value,this.id)" onBlur="ColocarFormatoLocal(event,this.value,this.id); ColocarFormatoOnBlueLocal(event,this.value,this.id)"></td>
                        <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>3" autocomplete = "off"  id="x<? print $i;?>3" type="text" class="breadcrumbv2" size="15" value="<? print number_format(($tb->fields["monaju"]*(-1)),2,'.',','); ?>" align="right"   tabindex="2" ></td>
                        <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>4" autocomplete = "off"  id="x<? print $i;?>4" type="text" class="breadcrumbv2" size="15" value="<? print number_format(($tb->fields["monimp"]-$tb->fields["monaju"]),2,'.',','); ?>" align="right"  tabindex="2" ></td>
                        <? //if ($refierea=='N'){ ?>
                        <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>5" autocomplete = "off"  id="x<? print $i;?>5" type="text" class="breadcrumbv2" size="18" value="" align="right"  tabindex="2" readonly="true" ></td>
                        <? //}breadcrumbv2
                          if ($tb->fields["refprc"]!='NULO')
                          {
                $referencia = $tb->fields["refprc"];

                          }else if ($tb->fields["refprc"]!='NULO')
                          {
                $referencia = $tb->fields["refprc"];

                          }else if ($tb->fields["refcom"]!='NULO')
                          {
                $referencia = $tb->fields["refcom"];
                          }
                        ?>
                        <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>6"   id="x<? print $i;?>6" type="text" class="breadcrumbv2" size="15" value="<? print $referencia; ?>" align="right"   tabindex="2" ></td>
                        </tr>
                      <?
                $tb->MoveNext();
                $i=$i+1;
                } ?>
                      <script>
              //actualizar_saldos();
              </script>
                      <?
              }else{
              $i=1;
              while ($i<=50){
              ?>
                      <tr>
                        <td class="grid_line01_br"><input name="x<? print $i;?>0"  autocomplete = "off" type="txt" class="imagenborrar" id="x<? print $i;?>0" onClick="eliminar_grip(<? print $i;?>,6)" value="" size="1" onFocus="this.blur()"></td>
                        <td  align="left" class="grid_line01_br"><input name="x<? print $i;?>1" autocomplete = "off"  id="x<? print $i;?>1" type="text" class="grid_txt01" size="32"  align="left"  tabindex="2"  onKeyDown="javascript:return dFilter (event.keyCode, this,'<? echo $FormatoPresup; ?>');" onBlur="gridatos1(this.value,this.id,'x<? print $i;?>2','x<? print $i;?>2')" value=""></td>
                        <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>2"  autocomplete = "off" id="x<? print $i;?>2" type="text" class="grid_txt02" size="15"  align="right"  tabindex="2"  onClick="QuitarComa(this.value,this.id)" onBlur="ColocarFormatoLocal(event,this.value,this.id); SaldoParaPagar(this.id);ColocarFormatoOnBlueLocal(event,this.value,this.id)" value="0.00"></td>
                        <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>3" autocomplete = "off"  id="x<? print $i;?>3" type="text" class="breadcrumbv2" size="15"   align="right" onKeyPress="actualizar_saldos2()" tabindex="2" value="0.00" ></td>
                        <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>4" autocomplete = "off"  id="x<? print $i;?>4" type="text" class="breadcrumbv2" size="15"  align="right"  onKeyPress="actualizar_saldos2()" tabindex="2" value="0.00"></td>
                        <?  //if ($refierea=='N'){ Mensaje($refierea); ?>
                        <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>5" autocomplete = "off"  id="x<? print $i;?>5" type="text" class="breadcrumbv2" size=" 18"  align="right"   tabindex="2"  readonly="true" value="0.00"></td>
                        <? // } ?>
                        <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>6" autocomplete = "off"   id="x<? print $i;?>6"  type="text" class="breadcrumbv2" size="15" value="" align="right"   tabindex="2" readonly="true"></td>
                        <td  align="right" class="grid_line01_br">
                        <input name="x<? print $i;?>10" autocomplete = "off"  id="x<? print $i;?>10" type="text" class="breadcrumbv2" size="12" value="0.00" readonly="true">
                        <input name="x<? print $i;?>7" autocomplete = "off"   id="x<? print $i;?>7"  type="hidden" class="breadcrumbv2" size="15" value="" align="right"   tabindex="2" readonly="true"></td>

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
            <td width="34%" class="tpHead" >Totales</td>
            <td width="14%"><input name="totmonto" type="text" class="cajadetextosimple" id="totmont" size="16" readonly="true"></td>
            <td width="19%"><input name="totajuste" type="text" class="cajadetextosimple" id="totajuste" size="16" readonly="true"></td>
            <td width="27%"><input name="totneto" type="text" class="cajadetextosimple" id="totneto" size="16" readonly="true"></td>
          </tr>
        </table></td>
                </tr>
    </table>

   </td>
  </tr>
  <tr>
    <td class="breadcrumb"><span class="style13">Registro de <? echo $forma; ?>...
  <?  ///// variable oculta que se necesita para guardar //// ?>
      <!--input name="fecini" type="hidden" id="fecini" value="<? //echo $fecini; ?>" /-->
  <?  /////////////////////////////////////////////////////// ?>
  <input type="hidden" name="i" value="<? echo $i-1; ?>">
  <input type="hidden" name="var" id="var" />
    </span></td>
  </tr>
</table>  </tr>
</td>
</table>
<script>
/*   function actualizar_saldos2()
      {
      document.form1.totmonto.value='<? echo number_format($totmonto,2,',','.'); ?>'
      document.form1.totajuste.value='<? echo number_format($totajuste,2,',','.'); ?>'
      document.form1.totneto.value='<? echo number_format($totneto,2,',','.'); ?>'
     }
*/

  function actualizar_saldos2()
      {
       f=document.form1;
        i=1;
        fila='<? echo $i-1; ?>';
        var acum2=0;
        var acum3=0;
        var acum4=0;
        while (i<=fila)
        {
          var x2="x"+i+"2";
          var x3="x"+i+"3";
          var x4="x"+i+"4";
          str2= document.getElementById(x2).value.toString();
          str3= document.getElementById(x3).value.toString();
          str4= document.getElementById(x4).value.toString();
          str2= str2.replace(',','');
          str3= str3.replace(',','');
          str4= str4.replace(',','');
          str2= str2.replace(',','');
          str3= str3.replace(',','');
          str4= str4.replace(',','');
          str2= str2.replace(',','');
          str3= str3.replace(',','');
          str4= str4.replace(',','');
          str2= str2.replace(',','');
          str3= str3.replace(',','');
          str4= str4.replace(',','');

          var num2=parseFloat(str2);
          var num3=parseFloat(str3);
          var num4=parseFloat(str4);

          acum2=acum2+num2;
          acum3=acum3+num3;
          acum4=acum4+num4;

          document.getElementById(x2).value=format(num2.toFixed(2),'.','.',',');
          document.getElementById(x3).value=format(num3.toFixed(2),'.','.',',');
          document.getElementById(x4).value=format(num4.toFixed(2),'.','.',',');
          i=i+1;
        }
          document.getElementById("totmont").value=format(acum2.toFixed(2),'.','.',',');
          document.getElementById("monpag").value=format(acum2.toFixed(2),'.','.',',');
          document.getElementById("totajuste").value=format(acum3.toFixed(2),'.','.',',');
          document.getElementById("totneto").value=format(acum4.toFixed(2),'.','.',',');

       }


desactivar('<? echo $i; ?>');
actualizar_saldos2();</script>
</form>
<map name="Map">
  <area shape="rect" coords="-2,0,18,20" href="javascript: catalogogrid(1,2)">
</map>
<? require_once('../../lib/general/bottom.php'); ?>
</body>
<script  type="text/javascript" language="JavaScript">

     function catalogogrid(im,fc)
     {
    f=document.form1;

      i=1;
      while (i<=50)
      {
        var x="x"+i+"1";
        if (document.getElementById(x).value=="")
        {
          if (i==1)
          {
            campo="x11";
            campo2="x15";
            //campo2="x";
            foco="x1"+fc;
            img="x1"+im;
            i=50;
          }
          else
          {
            campo=x;
            foco="x"+i+fc;
            img="x"+i+im;
            campo2="x"+i+"5";
            //campo2="x";
            i=50;
          }
        }
        i=i+1;
        //alert(img);
      }

      //sql='Select a.CodPre as Codigo, c.mondis as Disponibilidad, a.nompre as Descripcion From CPDefTit a, CPDefNiv b, cpasiini c where Length(trim(a.codpre))= Length(trim(b.ForPre)) and a.codpre=c.codpre and c.perpre=�00� and c.mondis > 0 and UPPER(a.nompre) like upper(�%�) Order By a.CodPre';
      //pagina="catalogo2.php?campo="+campo+"&campo2="+campo2+"&sql="+sql+"&img="+img+"&foco="+foco;
      //window.open(pagina,"","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");

           var host = '<? echo $_SERVER["HTTP_HOST"]; ?>';
          pagina='http://'+host+'/herramientas_dev.php/generales/catalogo/metodo/PrePagar_Cpasiini/clase/Cpasiini/frame/form1/obj1/'+campo+'/campo1/codpre/submit/false';
          window.open(pagina,"true","menubar=no,toolbar=no,scrollbars=yes,width=490,height=490,resizable=yes,left=500,top=80");
     }



  function buscarenter(e)
      {
        if (e.keyCode==13)
      {
        f=document.form1;
        //f.action="PrePagar.php?var=<? echo '9'; ?>";
        document.getElementById('var').value='9';
        f.submit();
      }
     }

    function Eliminar()
     {
      if(confirm("¿Esta seguro que desear Eliminar ?"))
        {
          f=document.form1;
          f.action="imecPrePagar.php?imec=<? echo 'E'; ?>";
          f.submit();
        }
     }

    function Limpiar()
     {
      location=("PrePagar.php")
     }


         function enterB(e,id,donde,foco)
     {
      f=document.form1;
      if (e.keyCode==13)
        {
          aux= document.getElementById('cedrif').value.toUpperCase();
          document.getElementById('cedrif').value=aux.toUpperCase();
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

    function validar_montos_0(hasta)
    {
      for (i=1;i<hasta;i++)
      {
        var x1="x"+i+"1";  //Codigo
        var x2="x"+i+"2";  //Monto
        if ((document.getElementById(x2).value<=0) && (document.getElementById(x1).value!='')){ return false; }
      }
      return true;
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
               Limpiar();
           }

      else if(itemId == '0_save')
      {
      var salvar = '<? echo $salvar; ?>';
      var hasta=<?echo $i;?>;
      if (salvar=='Si'){
        if (validar_montos_0(hasta)==false){
          alert("Los montos no deben ser Menores o Igual a 0 (Cero)");
        }else{
          if(confirm("¿Realmente desea Salvar?"))
          {
            f=document.form1;
            f.refpag.disabled=false;
            if (document.form1.despag.value=="")
              { alert("No puede salvar sin introducir una descripción"); }

      else if (document.form1.fecpag.value=="")
              { alert("No puede salvar sin introducir la fecha del Pago"); }

            else if (document.form1.cedrif.value=="")
              { alert("No puede salvar sin introducir el código del beneficiario"); }

            else {
                  /*document.getElementById("x13").disabled=false
                  document.getElementById("x15").disabled=false
                  document.getElementById("x16").disabled=false 									*/

                  desbloquearGrip(6,i-1,1); //Bloquea desde la columna 1=codigo
                  f.action="imecPrePagar.php?imec=<? echo $imec; ?>";
                  f.submit();
            }
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
        var EstatusPag='<? echo $EstatusPag; ?>';
        var totajuste='<? echo $totajuste; ?>';
        var msg='<? echo $msg; ?>';
        if (eliminar=='Si'){
          if (EstatusPag=='N'){ alert ("El Pagado ya esta Anulado") }
          else if (msg!=''){ alert(msg)}
          else if (totajuste > 0){ alert("El Pagado No Puede ser Eliminado Ni Anulado, Tiene un Ajuste") }
          else
          {
            if(confirm("¿Esta seguro que desea Anular/Eliminar este Código?"))
              {
                document.form1.refpag.disabled=false;
                refpag=document.form1.refpag.value;
                window.open("anuPrePagar.php?refpag="+refpag+"&operacion=P&fecpag="+document.getElementById('fecpag').value,"","menubar=no,toolbar=no,scrollbars=no,width=500,height=150,resizable=no,left=300,top=200");
                //f=document.form1;
                //f.action="imecPrePagar.php?imec=<? echo 'E'; ?>";
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
    aToolBar.loadXML("../../lib/general/_toolbarV1.xml")
    aToolBar.setToolbarCSS("toolbar_zone2","toolbarText3");
    aToolBar.showBar();


     function primero()
      {
      f=document.form1;
      f.refpag.disabled=false;
      //f.action="PrePagar.php?var=<? print '1';?>";
      document.getElementById('var').value='1';
      f.submit();
     }
     function anterior()
      {
      f=document.form1;
      f.refpag.disabled=false;
      //f.action="PrePagar.php?var=<? print '2';?>";
      document.getElementById('var').value='2';
      f.submit();
     }
     function siguiente()
      {
      f=document.form1;
      f.refpag.disabled=false;
      //f.action="PrePagar.php?var=<? print '3';?>";
      document.getElementById('var').value='3';
      f.submit();
     }
     function ultimo()
      {
      f=document.form1;
      f.refpag.disabled=false;
      //f.action="PrePagar.php?var=<? print '4';?>";
      document.getElementById('var').value='4';
      f.submit();
     }


 function catalogo2(campo,campo2,foco,sql)
     {
    f=document.form1;
      pagina="catalogo2.php?campo="+campo+"&campo2="+campo2+"&sql="+sql+"&foco="+foco;
      window.open(pagina,"","menubar=no,toolbar=no,scrollbars=yes,width=700,height=490,resizable=yes,left=50,top=50");
     }


 function catalogo_check(campo,campo2,foco,sql)
     {
        f=document.form1;
        refere=document.getElementById('refierea').value;
        pagina="check_prepagar.php?campo="+campo+"&campo2="+campo2+"&sql="+sql+"&foco="+foco+'&refere='+refere;
        window.open(pagina,"","menubar=no,toolbar=no,scrollbars=yes,width=810,height=450,resizable=yes,left=50,top=50");
     }


 function catalogo3(campo,campo2,campo3,foco,sw)  //Tipo de compromiso que me trae 3 valores
   {
    //var sql='Select NomExt as Nombre_Extendido,tippag as Codigo, refier as Refiere, NomAbr as Nombre_Abreviado From CPDocPag where tippag like upper(�%�) Order By tippag';
    //pagina="catalogo3.php?campo="+campo+"&campo2="+campo2+"&campo3="+campo3+"&sql="+sql+"&foco="+foco;
    //window.open(pagina,"","menubar=no,toolbar=no,scrollbars=yes,width=700,height=500,resizable=yes,left=50,top=50");

           var host = '<? echo $_SERVER["HTTP_HOST"]; ?>';
          pagina='http://'+host+'/herramientas_dev.php/generales/catalogo/metodo/Prepagar_Cpdocpag/clase/Cpdocpag/frame/form1/obj1/'+campo2+'/obj2/'+campo+'/obj3/'+campo3+'/campo1/tippag/campo2/nomext/campo3/refier/submit/false';
          window.open(pagina,"true","menubar=no,toolbar=no,scrollbars=yes,width=490,height=490,resizable=yes,left=500,top=80");

   }

 function catalogo(campo,campo2,foco,sw)
   {
  var pagina='';
  var host = '<? echo $_SERVER["HTTP_HOST"]; ?>';

   if (sw==1) {
       var sql='Select NomExt as Nombre_Extendido,tippag as Codigo, NomAbr as Nombre_Abreviado,refcau as Refiere From CPDocCom where tippag like upper(�%�) Order By tippag';
      catalogo2(campo,campo2,foco,sql);
    }

   else if (sw==2) {
    f=document.form1;
    refere=f.refierea.value;
    if (refere=='N')
    {
          //var sql='select nomben as nombre,cedrif as cedula_rif,dirben as dirección from opbenefi  order by cedrif';
          //catalogo2(campo,campo2,foco,sql);
          pagina='http://'+host+'/herramientas_dev.php/generales/catalogo/metodo/Preprecom_Opbenefi/clase/Opbenefi/frame/form1/obj1/'+campo2+'/obj2/'+campo+'/campo1/cedrif/campo2/nomben/submit/false';
    }
    }

   else if (sw==3) {  //Bonton de Referencia

      //document.getElementById("cedrif").value='';
      var refierea=document.getElementById("refierea").value;
      var fecpag=document.getElementById("fecpag").value;

       if (refierea=='A'){  var sql='Select DesCau as Descripcion,CedRif as Cedula,RefCau as Referencia, to_char(feccau,�dd/mm/yyyy�) as Fecha,MonCau - salaju as Monto from CPCausad where stacau=�A� and SALPAG < MONCAU-SALAJU  Order By refcau';  }
       else if (refierea=='C'){  var sql='Select CedRif as Cedula,RefCom as Referencia, to_char(Feccom,�dd/mm/yyyy�) as Fecha,DesCom as Descripcion,MonCom - salcau - salaju  as Monto From CPCompro Where StaCom=�A� AND SALPAG < MONCOM-SALAJU Order By RefCom '; 	}
       else if (refierea=='P'){  var sql='Select CedRif as Cedula,Refprc as Referencia, to_char(Fecprc,�dd/mm/yyyy�) as Fecha,Desprc as Descripcion,MonPrc - salcau - salaju as Monto From CPPrecom Where StaPrc=�A� AND SALPAG < monprc-SALAJU Order By RefPrc '; 	}

       f=document.form1;
       refere=f.refierea.value;
       if (refere!='N')
       {
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
      if (document.getElementById(id).value!='')
      {
        a=repetido2(id,donde);
        if (a==false)
        {
          if (Verificar_longitud(id)){
            cadena=rayitasfc(tira);
            document.getElementById(id).value=cadena;

            f=document.form1;
            cuantos='PreCompro-Grip';
            anocierre='<? echo $anocierre; ?>'
            sql="Select nompre as campo1 From CPDEFTIT Where trim(CodPre)=�"+cadena+"�";
            //sql="Select b.nompre as campo1 From cpasiini a, CPDEFTIT b Where a.codpre=b.codpre and trim(a.CodPre)=�"+cadena+"� and a.perpre=�00� and a.monasi>0";
            //sql2="Select sum(a.MonDis) as mondis From CPAsiIni a, CPDEFTIT b Where a.codpre=b.codpre and trim(a.CodPre)=�"+cadena+"� and a.perpre=�00� and a.monasi>0";
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

  function verificar_saldo(id,id2)
  {
    f=document.form1;

    if (QuitarComaLocal(id) > 0)
    {
    //alert(QuitarComaLocal(id));
    //alert(QuitarComaLocal(id2));
      if (QuitarComaLocal(id) > QuitarComaLocal(id2)){ alert("El Monto a Pagar es mayor al Saldo del Pagado."); return false;}
    }else{
      alert("El Monto no puede ser Menor o Igual a 0.");
      return false;
    }

    return true;
  }


  /* function verificar_saldo(e,id)
   {
      if (e.keyCode==13)
      {
        if (document.getElementById(id).value > 0)
        {
        refierea cambio a refierea
          var refierea=document.getElementById("refierea").value;
          var Formar_NivelDisponibilidad='<? echo $Formar_NivelDisponibilidad; ?>';
          if (refierea=='S')
          {
            //alert(Formar_NivelDisponibilidad);
          }else if (refierea=='N'){
            if (Formar_NivelDisponibilidad==true)
            {
            var anocierre='<? echo $anocierre; ?>';
            //var fecpag='<? echo $fecpag; ?>';
            fecpag = document.getElementById("fecpag").value;
            var NivelDisponibilidad='<? echo $NivelDisponibilidad; ?>';
              id3=id.substring(0,2)+"1";							  //Seleccionamo el codigo de la fila en donde se encuentra
            codigobuscar = document.getElementById(id3).value+"%";
            montocom     = document.getElementById(id).value;
              id5=id.substring(0,2)+"5";
            coldispo     = id5;  //Columna de Disponibilidad
            // alert(document.getElementById("x15").value)
              //Colocar % al codigo
            pagina="gridatos.php?codigobuscar="+codigobuscar+"&anocierre="+anocierre+"&fecpag="+fecpag+"&NivelDisponibilidad="+NivelDisponibilidad+"&montocom="+montocom+"&coldispo="+coldispo+"&cuantos=PreCompro-Asignacion";
            //pagina="gridatos.php"
            window.open(pagina,"","menubar=no,toolbar=no,scrollbars=no,width=500,height=20,resizable=no,left=100,top=300");

            //colocar formato
            //var valor=parseFloat(document.getElementById(id).value);
            //document.getElementById(id).value=format(valor.toFixed(2),'.','.',',');
            }
          }else{  alert("Debe seleccionar un Tipo de Compromiso. ");  }

        }
      }
   }*/


     function enterA(e,campo,campo2,campo3,foco,sw)
    {
      //if (e.keyCode==13)
      //{
        aux= document.getElementById(campo).value.toUpperCase();
        document.getElementById(campo).value=aux.toUpperCase();

        if (aux!="")
        {
          f=document.form1;
          cuantos='Busqueda3';
          valor=document.getElementById(campo).value;
          sql='Select NomExt as Nombre_Extendido,tippag as Codigo, NomAbr as Nombre_Abreviado,REFIER as Refiere From Cpdocpag where trim(tippag)=(�'+valor+'�) Order By tippag';
          pagina="gridatos.php?campo="+campo+"&campo2="+campo2+"&campo3="+campo3+"&sql="+sql+"&foco="+foco+"&cuantos="+cuantos;
          window.open(pagina,"","menubar=no,toolbar=no,scrollbars=yes,width=500,height=20,resizable=yes,left=10,top=300");
        }
      //}
    }

    /* function actualizar_saldos() //Actualiza el Saldo Actual
      {
      try
      {
      f=document.form1;
      fila='<? echo $i-1; ?>';
      i=1;
      var valor1=0;
      var valor2=0;
      var valor3=0;
      var valor5=0;
      var acum=0;
      var acum2=0;

      while (i<=fila)
      {
        //alert(i);
        var x1="x"+i+"2";
        var x2="x"+i+"3";
        var x3="x"+i+"4";
        var x5="x"+i+"5";
        if (document.getElementById(x1).value!=""){
          str= document.getElementById(x1).value.toString();
          str= str.replace(',','');
          str= str.replace(',','');
          str= str.replace(',','');
          var num1=parseFloat(str);  //Valor Real sin (.) y ni (,)
          valor1=valor1 + num1;
          }

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

          i=i+1;
        }

          document.getElementById("totmont").value=format(valor1.toFixed(2),'.','.',',');
          document.getElementById("monpag").value=format(valor1.toFixed(2),'.','.',',');
          document.getElementById("totajuste").value=format(valor2.toFixed(2),'.','.',',');
          document.getElementById("totneto").value=format(valor3.toFixed(2),'.','.',',');

        //alert('<? echo $i; ?>');
        //if (imec=='M'){ bloquearGrip(6,); }/*

      } catch(e) {

        alert(e.name + " - "+e.message);

      }

     }*/

  function actualizar_saldos()
      {
       f=document.form1;
        i=1;
        fila='<? echo $i-1; ?>';
        var acum2=0;
        var acum3=0;
        var acum4=0;
        while (i<=fila)
        {
          var x2="x"+i+"2";

          if ($F(x2) > 0)
          {
          var x3="x"+i+"3";
          var x4="x"+i+"4";
          str2= document.getElementById(x2).value.toString();
          str3= document.getElementById(x3).value.toString();
          str4= document.getElementById(x4).value.toString();
          str2= str2.replace(',','');
          str3= str3.replace(',','');
          str4= str4.replace(',','');
          str2= str2.replace(',','');
          str3= str3.replace(',','');
          str4= str4.replace(',','');
          str2= str2.replace(',','');
          str3= str3.replace(',','');
          str4= str4.replace(',','');
          str2= str2.replace(',','');
          str3= str3.replace(',','');
          str4= str4.replace(',','');

          var num2=parseFloat(str2);
          var num3=parseFloat(str3);
          var num4=parseFloat(str4);

          acum2=acum2+num2;
          acum3=acum3+num3;
          acum4=acum4+num4;

          document.getElementById(x2).value=format(num2.toFixed(2),'.','.',',');
          document.getElementById(x3).value=format(num3.toFixed(2),'.','.',',');
          document.getElementById(x4).value=format(num4.toFixed(2),'.','.',',');

          }
          i=i+1;

        }
          document.getElementById("totmont").value=format(acum2.toFixed(2),'.','.',',');
          document.getElementById("monpag").value=format(acum2.toFixed(2),'.','.',',');
          document.getElementById("totajuste").value=format(acum3.toFixed(2),'.','.',',');
          document.getElementById("totneto").value=format(acum4.toFixed(2),'.','.',',');

       }


    function validarFechaX(fecha,foco)
  {
         pagina="validar.php?cuantos=validarFechaPresup&sql="+fecha+"&foco="+foco;
      window.open(pagina,"","menubar=no,toolbar=no,scrollbars=no,width=20,height=20,resizable=no,left=100,top=300");

  }

    function validar_fecha()
    {
      f=document.form1;
      fecha=document.getElementById('fecpag').value;
      if (fecha.length==10)
      {
        f=document.form1;
        pagina="validar.php?fecha="+f.fecpag.value+"&varfec=3";
        window.open(pagina,"validar","menubar=no,toolbar=no,scrollbars=no,width=50,height=50,resizable=yes,left=350,top=300");
      }
      else
      {
        //alert("Longitud de Fecha inválida");
        document.getElementById('fecpag').value=mostrarfecha();
        document.getElementById('fecpag').focus();
      }

    }


   function eliminar_grip(i,c)
       {
         f=document.form1;
      var imec='<? echo $imec; ?>'
      //alert(imec);
      if (imec!='M'){
        var fila;
        var col;
        for (fila=i;fila<50;fila++)
        {
          for (col=0;col<=c;col++)
          {
            var x="x"+fila+col;
            fila2=parseInt(fila)+1;
            var y="x"+fila2+col;
            //alert(x);
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
     }

    function QuitarComaLocal(id)
    {
        str= document.getElementById(id).value.toString();
        str= str.replace(',','');
        str= str.replace(',','');
        str= str.replace(',','');
        var num=parseFloat(str);  //Valor Real sin (.) y ni (,)
    return num;
    }

      function consulta()
      {
          f=document.form1;
          document.getElementById('var').value='9';
          //var campo2='despag';
          //var campo='refpag';
          //var foco='submit';
          //sql='Select refpag as Codigo, despag as Nombre from cppagos where upper(despag) like upper(�%�) order by refpag';
          //pagina="catalogo2.php?campo="+campo+"&campo2="+campo2+"&sql="+sql+"&foco="+foco;
          //window.open(pagina,"","menubar=no,toolbar=no,scrollbars=yes,width=570,height=500,resizable=yes,left=50,top=50");

      var host = '<? echo $_SERVER["HTTP_HOST"]; ?>';
          pagina='http://'+host+'/herramientas_dev.php/generales/catalogo/metodo/Cppagos_PrePagar/clase/Cppagos/frame/form1/obj1/refpag/obj2/despag/campo1/refpag/campo2/despag/submit/true';
          window.open(pagina,"true","menubar=no,toolbar=no,scrollbars=yes,width=490,height=490,resizable=yes,left=500,top=80");
     }

	function SaldoParaPagar(id)
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

        var id10="x"+j+"10";  //Saldo para Pagar
        var id5="x"+j+"5";    //Disponibilidad

        str= document.getElementById(id5).value.toString();
        str= str.replace(',','');
        str= str.replace(',','');
        str= str.replace(',','');
        var id5=parseFloat(str);  //Valor Real sin (.) y ni (,)

        str= document.getElementById(id).value.toString();
        str= str.replace(',','');
        str= str.replace(',','');
        str= str.replace(',','');
        var id=parseFloat(str);  //Valor Real sin (.) y ni (,)

		$(id10).value = format($(id5) - ($(id)),'.','.',',');;

	}


</script>
</html>

<? if ($imec=='I') { ?>
  <script language="JavaScript" type="text/javascript">
      document.getElementById('fecpag').focus();
  </script>
<?  } ?>