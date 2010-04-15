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
$tools= new tools();

$modulo="";
$forma="Cierre de la Etapa de Definicion";
$modulo=$_SESSION["modulo"] . " > Def. Especificas > ".$forma;
$fecha1=date('d-m-Y');
$fecha2=date('d-m-Y');
  if (!empty($_POST["sw"]))
  {
    $etadef = $_POST["sw"];
    $sql    = "update contaba set etadef='$etadef'";
    $bd->actualizar($sql);
    Mensaje('La Etapa de Definicion se Abierto/Cerrado.');
  }

?>
<DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
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

<script language="JavaScript" type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}


//-->
</script>

</head>

<body>
<?
      $sql="select * from contaba where codemp='001'";
      if ($tb=$tools->buscar_datos($sql))
      {
        $etadef=$tb->fields["etadef"];
      }
?>

<table width="100%" border="0" align="center">
  <tr>
    <td width="100%" align="center"><? require_once('../../lib/general/top.php'); ?></td>
  </tr>
  <tr>
    <td align="center"><table width="584" border="0"  class="box" >
     <tr>
        <td class="breadcrumb">SIGA  <? echo $modulo; ?>
      </tr>
      <tr>
        <td class="box">
        <form action="ConFinCieDef.php" method="post" name="form1">
        <table width="100%" align="center" class="bodyline">
                  <td height="189" colspan="3" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td valign="top"><h2>ADVERTENCIA:</h2>                        </td>
                    </tr>
                    <tr>
                      <td><strong>Recuerde revisar todos los Saldos Anteriores de sus Cuentas, Antes de Ejecutar esta opcion.
                      </strong>
                      <p>
                      <strong>El Archivo de Saldos por Periodo sera Actualizado y no se permitiran mas modificaciones.</strong></td>
                    </tr>
                  </table></td>
                </tr>
                <tr >
                  <td height="22"  align="right"><input type="button" name="abrir" value="Abrir" onClick="Abrir();"></td>
                  <td height="22"  align="right"><!--DWLayoutEmptyCell-->&nbsp;</td>
                  <td height="22" align="left"><input type="button" name="cerrar" value="Cerrar" onClick="Cerrar();"></td>
                </tr>

                <tr>
                  <td width="253" height="0"></td>
                  <td width="27" colspan="-5"></td>
                  <td width="282"></td>
                </tr>
      </table>
          <?  ///// variable oculta que se necesita para guardar //// ?>
            <input name="sw" type="hidden" id="sw" value="<? if ($etadef=='C'){ echo 'A'; }else{ echo 'C'; }; ?>" />
        <?  /////////////////////////////////////////////////////// ?>
      </form>
      </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="breadcrumb">Registro de <? echo $forma; ?>...

        </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><? require_once('../../lib/general/bottom.php'); ?></td>
  </tr>
</table>
</body>
<script language="JavaScript">

    function Abrir()
     {
         var etadef='<? echo $etadef;?>';
       if (etadef=='C'){
           document.form1.submit();
      }else{
        alert('La Etapa de Definicion ya esta abierto.');
      }
     }


     function Cerrar()
     {
         var etadef='<? echo $etadef;?>';
       if (etadef=='A'){
         if (confirm('Esta seguro que desea cerrar el Período?'))
         {
           document.form1.submit();
         }
      }else{
        alert('La Etapa de Definicion ya esta cerrado.');
      }
     }
</script>

</html>
