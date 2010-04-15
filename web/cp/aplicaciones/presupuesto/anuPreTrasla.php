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
  if (!empty($_GET["operacion"])){
    if (!empty($_GET["operacion"])){$operacion=$_GET["operacion"];}else{ $operacion=$_POST["operacion"]; }
    if (!empty($_GET["codigo"])){$codigo=$_GET["codigo"];}else{ $codigo=$_POST["codigo"]; }
    if (!empty($_GET["fecpre"])){$fecpre=$_GET["fecpre"];}else{ $fecpre=$_POST["fecpre"]; }
  }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  if ($operacion=='S')   //Salvar de la pantalla de Anular
  {

  if ($tool->validarFechaPresup($fecpre))
  {
        $codigo=$_POST["codigo"];
        $desanu=$_POST["desanu"];
        $fecanu=$_POST["fecha"];
        $statra="N";

        $bd->startTransaccion();

        //traslados
        $sql="update CPTrasla set desanu='".$desanu."',
                   fecanu=to_date('".$fecanu."','dd/mm/yyyy'),
                   statra='".$statra."'
             where trim(reftra) = '".trim($codigo)."'";
        $bd->actualizar($sql);

        // Guardar en Segbitaco
        $sql = "Select id from cptrasla where trim(reftra) = '".trim($codigo)."'";
  
        $tb=$bd->select($sql);
        $id = $tb->fields["id"];
        $bd->Log($id, 'pre', 'Cptrasla', 'Pretrasla', 'N');


        //movimientos
         $sql="update CPMovTra set stamov='".$statra."'
             where trim(reftra) = '".trim($codigo)."'";
        $bd->actualizar($sql);
        //Grabar Precompromiso
        $aux=substr($codigo,2 );
        $aux="TR".$aux;
        $sql="update CPPrecom
             set StaPrc='A',
               DesAnu='',
               FecAnu=Null
          where trim(RefPrc)='".trim($aux)."' ";
        $bd->actualizar($sql);
        $sql="update CPImpPrc set StaImp='A'
            where trim(RefPrc)='".trim($aux)."' ";
        $bd->actualizar($sql);

        ////////////////////////
        $bd->completeTransaccion();

        ?>
          <script>
                window.opener.document.location=("PreTrasla.php");
             close();
          </script>
        <?
  }
  else
  {
    Regresar("anuPreTrasla.php?operacion=S&codigo=".$codigo);
  }
  }

  if ($operacion=='E') //eliminar
  {
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $codigo=$_POST["codigo"];
    //Eliminar Datos
    if ($tool->validarFechaPresup($fecpre))
    {
      $bd->startTransaccion();

      // Guardar en Segbitaco
      $sql = "Select id from cptrasla where trim(reftra) = '".trim($codigo)."'";

      $tb=$bd->select($sql);
      $id = $tb->fields["id"];
      $bd->Log($id, 'pre', 'Cptrasla', 'Pretrasla', 'E');


      $sql="delete from CPMovTra Where trim(RefTra)='".trim($codigo)."'";
      $bd->actualizar($sql);
      $sql="delete from CPTrasla Where trim(RefTra)='".trim($codigo)."'";
      $bd->actualizar($sql);
      //Eliminar Fuente Financiamiento
      $sql="delete from cpdisfuefin Where trim(refdis)='".trim($codigo)."'";
      $bd->actualizar($sql);

      //Activa el Precompromiso
      $aux=substr($codigo,2 );
      $aux="TR".$aux;
      $sql="update CPPrecom
           set StaPrc='A',
             DesAnu='',
             FecAnu=Null
        where trim(RefPrc)='".trim($aux)."' ";

      $bd->actualizar($sql);
      $sql="update CPImpPrc set StaImp='A'
          where trim(RefPrc)='".trim($aux)."' ";
      $bd->actualizar($sql);
      ////////////////////////
      $bd->completeTransaccion();

    }//if ($tool->validarFechaPresup($fecha))
    ?>
      <script>
        window.opener.document.location=("PreTrasla.php");
        close();
      </script>
    <?
  }

  }//try
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
.style1 {
  font-family: Verdana, Arial, Helvetica, sans-serif;
  font-size: 12px;
  font-weight: bold;
  color: #000099;
}

-->
</style>
</head>
<body>

 <?
if ($operacion=='P'){ Opciones();} else if ($operacion=='A'){ AnularPreTrasla(); }

function Opciones()
{ global $codigo;
  global $btn;
	?>
<form name="form1" method="post" action="">
 <table width="100%" height="100"  border="0" align="center" cellpadding="0" cellspacing="0"  bgcolor="#FFFFCC">
 <tr bgcolor="#FFFFCC">
<td height="30" colspan="4">
 <fieldset>
  <table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0"  bgcolor="#FFFFCC">
    <tr bgcolor="#FFFFCC">
      <td height="35" colspan="4">&nbsp;</td>
    </tr>
    <tr valign="top" bgcolor="#FFFFCC">
      <td height="41" colspan="4"><div align="center" class="style1">Operaci&oacute;n a Realizar... ? </div></td>
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
          <input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>">
        </div></td>
    </tr>
        <tr bgcolor="#FFFFCC">
          <td height="22">&nbsp;</td>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr bgcolor="#FFFFCC">
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
 </fieldset>
 </td>
</tr>
</table>
</form>


<? }


   function AnularPreTrasla()
  {
   global $codigo;
    $fecha=date('d/m/Y');

  ?>
    <form name="form1" method="post" action="">
  <fieldset>

    <legend><span class="style3">Anular Traslado</span></legend>
    <table  border="0" align="center" class="bodyline">
    <tr>
      <td colspan="2"><span class="style14">Referencia :</span></td>
      <td colspan="3"><input name="codigo" type="text" id="codigo" value="<? print $codigo;?>"  class="imagenincio2"   readonly="true"></td>
    </tr>
    <tr>
      <td colspan="2"><span class="style14">Descripci&oacute;n :</span></td>
      <td colspan="3"><input name="desanu" type="text" id="desanu" size="70" tabindex="1" onKeyPress="focos(event,'fecha')"></td>
    </tr>
    <tr>
      <td colspan="2"><span class="style14">Fecha de Anulaci&oacute;n : </span></td>
      <td colspan="3"><input name="fecha" type="text"  class="imagenInicio" id="fecha" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $fecha;?>" size="10" datepicker="true" onKeyUp = "this.value=formateafecha(this.value);" onKeyPress="validar_fecha(event)">
        <input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>"></td>
    </tr>
    <tr>
      <td width="38" height="30">&nbsp;</td>
      <td width="79"><div align="right">
      </div></td>
      <td width="117">
        <div align="right">
          <input type="button" name="Button" value=" Salvar " onClick="salvar()">
        </div></td><td width="255">
        <div align="left">&nbsp;
           <input type="button" name="Button2" value="Cancelar" onClick="cancelar()">
        </div></td><td width="24">&nbsp;</td>
    </tr>
  </table>
  <script>
    f=document.form1;
  f.desanu.focus;
  </script>
  </fieldset>
</form>
<?	}
 ?>
</body>

<script language="javascript1.2">
function anular()
{
    f=document.form1;
  codigo=f.codigo.value;
  fecpre='<? print $fecpre;?>';
  f.action="anuPreTrasla.php?operacion=A&codigo="+codigo+"&fecpre="+fecpre;
  f.submit();
  //pagina="anuPreTrasla.php?operacion=A&codigo="+codigo+"&fecpre="+fecpre;
  //close();
  //window.open(pagina,"","menubar=no,toolbar=no,scrollbars=no,width=600,height=150,resizable=yes,left=200,top=300");
}

function eliminar()
{
  f=document.form1;
  fecpre='<? print $fecpre;?>';
     f.action="anuPreTrasla.php?operacion=E&fecpre="+fecpre;
  f.submit();
}

function cancelar()
{
  close();
}

function salvar()
{
  f=document.form1;
  //verificar datos completos
  if (TrimString(f.fecha.value)=="")
  {
    alert("Debe Incluir la Fecha de Anulacion del Traslado");
    f.fecha.focus();
  }
  else
  {
    codigo=f.codigo.value;
    fecpre='<? print $fecpre;?>';

    f.action="anuPreTrasla.php?operacion=S&codigo="+codigo+"&fecpre="+fecpre;
    f.submit();
  }
}
 function validar_fecha(e)
    {
      f=document.form1;
      if (e.keyCode==13)
    {
      fecha=document.getElementById('fecha').value;
      if (fecha.length==10)
      {
        f=document.form1;
        fecotr='<? print $fecpre;?>';
        ori="A";
        pagina="validar_fecha.php?fecha="+f.fecha.value+"&fecotr="+fecotr+"&origen="+ori;
        window.open(pagina,"validar","menubar=no,toolbar=no,scrollbars=no,width=50,height=50,resizable=yes,left=350,top=300");
      }
      else
      {
        //alert("Longitud de Fecha inválida");
        document.getElementById('fecha').value=mostrarfecha;
        document.getElementById('fecha').focus();
      }//else if (fecha.length==10)
    }//if (e.keyCode==13)
    }//end function

</script>
</html>
