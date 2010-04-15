<?
session_start();
require($_SESSION["x"].'lib/bd/basedatosAdo.php');
require($_SESSION["x"].'lib/general/funciones.php');
require($_SESSION["x"].'lib/general/tools.php');
validar(array(15),'presupuesto','precausar.php');            //Seguridad  del Sistema
$codemp = $_SESSION["codemp"];
$bd     = new basedatosAdo($codemp);
$z      = new tools();

if (!empty($_GET["ref"]))
{
  $ref   = $_GET["ref"];
  $fecha = $_GET["fecha"];
}

if (!empty($_POST["operacion"]))
{
  $refere  = $_POST["refere"];
  $descrip = $_POST["desc"];
  $fecha   = $_POST["fecha"];
  $ope     = $_POST["operacion"];
  if ($ope=='S')
  {
    if ($z->validarFechaPresup($fecha))
    {
      //$bd->startTransaccion();
      anularCausado();
      //$bd->completeTransaccion();
      ?>
      <script>
        alert('Causado Anulado Exitosamente');
        window.opener.close();
        close();
      </script>
      <?
    }
    else
    {
      cerrar();//Regresar("PreCompro.php?operacion=A&refcom=".$refcom."&feccom=".$feccom);
    }
  }
}

$fechahoy=date('d/m/Y');

  function anularCausado()
  {
    global $bd;
    global $refere;
    global $descrip;
    global $fecha;

    try
      {
        //Primero el Precompromiso
        $sql="UPDATE cpcausad SET DESANU='".$descrip."', FECANU=to_date('".$fecha."','dd/mm/yyyy'), stacau='N'
            WHERE refcau='".$refere."'";
        $bd->actualizar($sql);

        // Guardar en Segbitaco
        $sql = "Select id from cpcausad where refcau='".$refere."'";

        $tb=$bd->select($sql);
        $bd->Log($tb->fields["id"], 'pre', 'Cpcausad', 'Precausar', 'N');

        anularImpcau();
      }
      catch(Exception $e)
      {
          print "Excepcion Obtenida: ".$e->getMessage()."\n";
      }
  }

  function anularImpcau()
  {
    global $bd;
    global $refere;
    global $fecha;

      try
      {
        $sql="UPDATE cpimpcau SET STAIMP='N'  WHERE refcau='".$refere."'";
        $bd->actualizar($sql);

        $sql="update cpmovfuefin set stamov='N', fecanu=to_date('$fecha','dd/mm/yyyy') where trim(refmov) ='$refere' and stamov='CAUSADO'";
        $bd->actualizar($sql);
      }
      catch(Exception $e)
      {
          print "Excepcion Obtenida: ".$e->getMessage()."\n";
      }

  }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Anular Relación</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK media=all href="/lib/css/base.css" type=text/css rel=stylesheet>
<link href="/lib/css/siga.css" rel="stylesheet" type="text/css">
<link rel="STYLESHEET" type="text/css"  href="/lib/general/toolbar/css/dhtmlXToolbar.css">
<link  href="/lib/css/datepickercontrol.css" rel="stylesheet" type="text/css">
<script language="JavaScript"  src="../../../lib/general/js/fecha.js"></script>
<script language="JavaScript" src="../../../lib/general/js/datepickercontrol.js"></script>
<script language="JavaScript" src="../../../lib/general/toolbar/js/dhtmlXProtobar.js"></script>
<script language="JavaScript"  src="../../../lib/general/toolbar/js/dhtmlXToolbar.js"></script>
<script language="JavaScript" src="../../../lib/general/toolbar/js/dhtmlXCommon.js"></script>
<script language="JavaScript"  src="../../lib/general/js/funciones.js"></script>
<script type="text/JavaScript"  src="../../lib/general/js/prototype.js"></script>

<style type="text/css">
<!--
.style3 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; color: #003399; }
.style14 {
  font-size: 12px;
  font-weight: bold;
}
-->
</style>
</head>

<body>

<form name="form1" method="post" action="">
  <fieldset>


  <legend><span class="style3">Anular Causado</span></legend>
  <table width="100%"  border="0" align="center" class="bodyline">
    <tr>
      <td colspan="2"><span class="style14">Referencia :</span></td>
      <td colspan="3"><input name="refere" type="text" id="refere" value="<? print $ref;?>" readonly="true"></td>
    </tr>
    <tr>
      <td colspan="2"><span class="style14">Fecha de Anulaci&oacute;n : </span></td>
      <td colspan="3"><input name="fecha" type="text"  class="imagenInicio" id="fecha" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $fechahoy;?>" size="10" datepicker="true" onKeyUp = "this.value=formateafecha(this.value);" onBlur="validar_fecha()">
        <input name="operacion" type="hidden" id="operacion"></td>
    </tr>
    <tr>
      <td colspan="2"><span class="style14">Descripci&oacute;n :</span></td>
      <td colspan="3"><input name="desc" type="text" id="desc" size="75" tabindex="1"></td>
    </tr>
    <tr>
      <td width="8%" height="30">&nbsp;</td>
      <td width="9%"><div align="right">
      </div></td>
      <td width="7%"><div align="center">
        <input type="button" name="Button" value="Salvar" onClick="salvar()">
      </div></td>
      <td width="9%"><div align="center">
        <input type="button" name="Button2" value="Cancelar" onClick="cancelar()">
      </div></td>
      <td width="67%">&nbsp;</td>
    </tr>
  </table>
  <script>
    f=document.form1;
  f.desc.focus;
  </script>
  </fieldset>
</form>
</body>
<script>
function cancelar()
{
  close();
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


function salvar()
{
  f=document.form1;
  f.action="anularPagadoPreCausar.php";
  f.operacion.value="S";

  var fec = '<? print $fecha; ?>';
  arrefec = fec.split("/");
  fecha = new Date();
  fecha.setFullYear(arrefec[2],parseInt(arrefec[1])-1,arrefec[0]);
  //alert(fecha);

  var fec2 = f.fecha.value;
  arrefec2 = fec2.split("/");
  fechaanu = new Date();
  fechaanu.setFullYear(arrefec2[2],parseInt(arrefec2[1])-1,arrefec2[0]);
  //alert(fechaanu);

  if (fechaanu<fecha)
  {
    alert('La fecha de Anulación no puede ser menor a la del Causado');
  }
  else
  {
    if (document.getElementById('fecha').value!='')
    {
      f.submit();
    }
    else
    {
      alert('La Fecha no puede estar en blanco');
    }
  }
}

  function IsNumeric(valor)// FORMATEAR FECHA
    {
    var log=valor.length; var ok="S";
    for (x=0; x<log; x++)
    { v1=valor.substr(x,1);
    v2 = parseInt(v1);
    //Compruebo si es un valor numérico
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
