<?
session_start();
require_once($_SESSION["x"].'lib/bd/basedatosAdo.php');
require_once($_SESSION["x"].'lib/general/tools.php');
require_once($_SESSION["x"].'lib/general/funciones.php');
validar(array(15));            //Seguridad  del Sistema
$codemp=$_SESSION["codemp"];
$bd=new basedatosAdo($codemp);
$tool=new tools();
$z=new tools();
$btn = $z->ConfBotones();
  try
  {
    if (!empty($_GET["operacion"]))
    {
      if (!empty($_GET["operacion"])){$operacion= $_GET["operacion"]; }else{ $operacion = $_POST["operacion"]; }
      if (!empty($_GET["refcom"])){   $refcom   = $_GET["refcom"];    }else{ $refcom    = $_POST["refcom"];    }
      if (!empty($_GET["feccom"])){   $feccom   = $_GET["feccom"];    }else{ $feccom    = $_POST["feccom"];    }
            if (!empty($_GET["fecha"])){    $fecha    = $_GET["fecha"];     }else{ $fecha     = $_POST["fecha"];     }
    }

  if ($operacion=='S')   //Salvar de la pantalla de Anular
  {
    if ($tool->validarFechaPresup($fecha))
    {
      $refcom=$_POST["refcom"];
      $desanu=$_POST["desanu"];
      $fecanu=$_POST["fecha"];

        $sql="update cpcompro set desanu='$desanu', fecanu=to_date('$fecanu','dd/mm/yyyy'), stacom='N' where trim(refcom) ='$refcom'";
        $bd->actualizar($sql);

        $sql="update cpimpcom set staimp='N' where trim(refcom) ='$refcom'";
        $bd->actualizar($sql);

        // Guardar en Segbitaco
        $sql = "Select id from cpcompro where trim(refcom) ='$refcom'";
  
        $tb=$bd->select($sql);
        $id = $tb->fields["id"];
        $bd->Log($id, 'pre', 'Cpcompro', 'Precompro', 'N');


        $sql="update cpmovfuefin set stamov='N', fecanu=to_date('$fecanu','dd/mm/yyyy') where trim(refmov) ='$refcom' and stamov='COMPROMISO'";
        $bd->actualizar($sql);

        ?>
          <script>
             close();
            window.opener.document.location=("PreCompro.php");
          </script>
        <?
    }
    else
    {
      Regresar("anuPreCompro.php?operacion=A&refcom=".$refcom."&feccom=".$feccom);
    }
  }


  if ($operacion=='E')
  {
    //exit($feccom);
    if ($tool->validarFechaPresup($feccom))
    {
      
        // Guardar en Segbitaco
        $sql = "Select id from cpcompro where trim(refcom) ='$refcom'";
  
        $tb=$bd->select($sql);
        $id = $tb->fields["id"];
        $bd->Log($id, 'pre', 'Cpcompro', 'Precompro', 'E');
      
      $sql="delete from cpimpcom where refcom='$refcom'";
      $bd->actualizar($sql);
      $sql="delete from cpcompro where refcom='$refcom'";
      $bd->actualizar($sql);
      $sql="delete from cpmovfuefin where refmov='$refcom' and tipmov='COMPROMISO'";
      $bd->actualizar($sql);
      ?>
        <script>
        close();
          window.opener.document.location=("PreCompro.php");
          //window.opener.close()

        </script>
      <?
    }
    else
    {
      cerrar();//Regresar("PreCompro.php?operacion=A&refcom=".$refcom."&feccom=".$feccom);
    }
  }


  }
  catch(Exception $e)
  {
    print "Excepcion Obtenida: ".$e->getMessage()."\n";
  }


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Operaciones</title>
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
.style1 {
  font-family: Verdana, Arial, Helvetica, sans-serif;
  font-size: 12px;
  font-weight: bold;
  color: #000099;
}
body {
  background-color: #FFFFCC;
}
-->
</style>
</head>
<body>
<table width="100%" height="180" border="0" align="center">
<tr>
<td valign="middle">
 <?
   if ($operacion=='P'){ Opciones();} else if ($operacion=='A'){ AnularPrecompro(); }

   function Opciones()
  { global $refcom;
      global $feccom;
      global $btn;

?>
<form name="form1" method="post" action="">
 <fieldset>
  <table width="100%"  border="0" align="center">
    <tr bgcolor="#FFFFCC">
      <td colspan="4"><div align="center" class="style1">Operaci&oacute;n a Realizar... ? </div></td>
    </tr>
    <tr bgcolor="#FFFFCC">
      <td width="37%">
      <? if ($btn["anular"]=='t'){ ?>
        <div align="right">
          <input type="button" name="Button1" value="Anular" onClick="anular()">
        </div>
      <? } ?>
        </td>
      <td colspan="2">
      <? if ($btn['eliminar']=='t'){ ?>
      <div align="center">
        <input type="button" name="Button2" value="Eliminar" onClick="eliminar()">
      </div>
      <? } ?>
      </td>
      <td width="38%">
        <div align="left">
          <input type="button" name="Button3" value="Cancelar" onClick="cancelar()">
          <input name="refcom" type="hidden" id="refcom" value="<? echo $refcom; ?>">
          <input name="feccom" type="hidden" id="feccom" value="<? echo $feccom; ?>">
        </div></td>
    </tr>
  </table>
 </fieldset>
 </form>


  <? }


   function AnularPrecompro()
  {
   global $refcom;
   global $feccom;
    $fecha=date('d/m/Y');
  ?>
    <form name="form1" method="post" action="">
  <fieldset>

    <legend><span class="style3">Anular Compromiso</span></legend>
  <table  border="0" align="center" class="bodyline">
    <tr>
      <td colspan="2"><span class="style14">Referencia :</span></td>
      <td colspan="3"><input name="refcom1" type="text" id="refcom1" readonly="true" value="<? print $refcom;?>"></td>
    </tr>
    <tr>
      <td colspan="2"><span class="style14">Fecha de Anulaci&oacute;n : </span></td>
      <td colspan="3"><input name="fecha" type="text"  class="imagenInicio" id="fecha" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $fecha;?>" size="10" onKeyUp = "this.value=formateafecha(this.value);" onBlur="validar_fecha();">
        <input name="refcom" type="hidden" id="refcom" value="<? echo $refcom; ?>"></td>
    </tr>
    <tr>
      <td colspan="2"><span class="style14">Descripci&oacute;n :</span></td>
      <td colspan="3"><input name="desanu" type="text" id="desanu" size="50" tabindex="1"></td>
    </tr>
    <tr>
      <td height="30">&nbsp;</td>
      <td><div align="right">
      </div></td>
      <td><div align="center">
        <input type="button" name="button" value=" Salvar " onClick="salvar()">
      </div></td>
      <td><div align="center">
        <input type="button" name="Button2" value="Cancelar" onClick="cancelar()">
      </div></td>
      <td>&nbsp;</td>
    </tr>
    <input name="feccom" type="hidden" id="feccom" value="<? echo $feccom; ?>">
  </table>
  <script>
    f=document.form1;
  //f.descrip.focus;
  </script>
  </fieldset>
</form>
<?	}
 ?>

  </td>
</tr>
</table>
</body>

<script language="javascript1.2">

function validar_fecha()
    {
      var f=document.form1;
      fecha=document.getElementById('fecha').value;
      if (fecha.length==10)
      {
        f=document.form1;
        pagina="validar.php?fecha="+f.fecha.value+"&varfec=2";
        window.open(pagina,"validar","menubar=no,toolbar=no,scrollbars=no,width=50,height=50,resizable=yes,left=350,top=300");
      }
      else
      {
        //alert("Longitud de Fecha inválida");
        document.getElementById('fecha').value=mostrarfecha;
        document.getElementById('fecha').focus();
      }

    }

function anular()
{
  var f=document.form1;
  var refcom=document.form1.refcom.value;
  //pagina="anuPreCompro.php?operacion=A&refcom="+refcom+"&feccom="+document.getElementById('feccom').value;
  //close();
  //window.open(pagina,"","menubar=no,toolbar=no,scrollbars=no,width=600,height=150,resizable=yes,left=200,top=300");

  f.action="anuPreCompro.php?operacion=A&refcom="+refcom+"&feccom="+document.getElementById('feccom').value;
  f.submit();

}
function eliminar()
{
  var f=document.form1;
  f.action="anuPreCompro.php?operacion=E&refcom="+document.getElementById('refcom').value;
  //f.operacion.value="E";
  f.submit();
}
function cancelar()
{
  //z.cancelar();
  close();
}

function salvar()
{
  var f=document.form1;
  var refcom=f.refcom.value
  f.action="anuPreCompro.php?operacion=S&refcom="+refcom;

  var fec = document.getElementById('feccom').value;
  var arrefec = fec.split("/");
  var fecha = new Date();
  fecha.setFullYear(arrefec[2],parseInt(arrefec[1])-1,arrefec[0]);

  var fec2 = document.getElementById('fecha').value;
  var arrefec2 = fec2.split("/");
  fechaanu = new Date();
  fechaanu.setFullYear(arrefec2[2],parseInt(arrefec2[1])-1,arrefec2[0]);

  if (fechaanu<fecha)
  {
    alert('La fecha de Anulación no puede ser menor a la del Compromiso');
  }
  else
  {
    if (document.getElementById('fecha').value!="")
    {
      f.submit();
    }
    else
    {
      alert('La fecha no puede estar en blanco');
    }
  }

}

</script>
</html>
