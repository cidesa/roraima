<?
session_start();
require_once($_SESSION["x"].'adodb/adodb-exceptions.inc.php');
require_once($_SESSION["x"].'lib/bd/basedatosAdo.php');
require_once($_SESSION["x"].'lib/general/tools.php');
require_once($_SESSION["x"].'lib/general/funciones.php');
validar(array(11,15),'','presoltrasla.php');            //Seguridad  del Sistema
$codemp = $_SESSION["codemp"];
$bd     = new basedatosAdo($codemp);
$tool   = new tools();
//limpiar
 $fecha  = "";
 $desc   = "";
 $status = "N";
//

  try
  {
  if (!empty($_GET["operacion"])){ $operacion = $_GET["operacion"]; }
  if (!empty($_GET["imec"]))     { $imec      = $_GET["imec"];      }
  if (!empty($_GET["codigo"]))   { $codigo    = $_GET["codigo"];    }
  if (!empty($_GET["sw"]))       { $sw        = $_GET["sw"];        }  //G => Gobernador P => Presupuesto  C => Contraloria

  if (($operacion=='M') or $imec=='M')   //Mostrar Datos  , Primera  vez que carga la pagina
  {
    if  (!empty($codigo))
    {
      if ($sw=='C'){ $sql = "Select to_char(FecCon,'dd/mm/yyyy') as fechaaprob, DesCon as descripcion, StaCon as opcion From cpsoltrasla where reftra='".$codigo."' Order By Reftra"; 	}
      if ($sw=='G'){ $sql = "Select to_char(Fecgob,'dd/mm/yyyy') as fechaaprob, Desgob as descripcion, Stagob as opcion From cpsoltrasla where reftra='".$codigo."' Order By Reftra"; 	}
      if ($sw=='P'){ $sql = "Select to_char(Fecpre,'dd/mm/yyyy') as fechaaprob, Despre as descripcion, Stapre as opcion From cpsoltrasla where reftra='".$codigo."' Order By Reftra"; 	}
      if ($sw=='N4'){ $sql = "Select to_char(FecNiv4,'dd/mm/yyyy') as fechaaprob, Desniv4 as descripcion, Staniv4 as opcion From cpsoltrasla where reftra='".$codigo."' Order By Reftra"; 	}
      if ($sw=='N5'){ $sql = "Select to_char(FecNiv5,'dd/mm/yyyy') as fechaaprob, Desniv5 as descripcion, Staniv5 as opcion From cpsoltrasla where reftra='".$codigo."' Order By Reftra"; 	}
      if ($sw=='N6'){ $sql = "Select to_char(FecNiv6,'dd/mm/yyyy') as fechaaprob, Desniv6 as descripcion, Staniv6 as opcion From cpsoltrasla where reftra='".$codigo."' Order By Reftra"; 	}

        $tb = $bd->select($sql);
        if (!$tb->EOF)
         {
          if (trim($tb->fields["fechaaprob"])!="")
          {
            $desc  = $tb->fields["descripcion"];
            $fecha = $tb->fields["fechaaprob"];
            if (trim($tb->fields["opcion"])=="S")
            {
              $status="S";
            }
            else
            {
              $status="N";
            }
          }//if (trim($tb->fields["fecpre"])!="")
        }//if (!$tb->EOF)

      /*$sql="select stapre as stapre, despre as despre,to_char(fecpre,'dd/mm/yyyy') as fecpre from CPSolTrasla Where trim(reftra) = '".trim($codigo)."' ";
      $tb=$bd->select($sql);
      if (!$tb->EOF)
       {
        if (trim($tb->fields["fecpre"])!="")
        {
          $desc  = $tb->fields["despre"];
          $fecha = $tb->fields["fecpre"];
          if (trim($tb->fields["stapre"])=="S")
          {
            $status="S";
          }
          else
          {
            $status="N";
          }
        }//if (trim($tb->fields["fecpre"])!="")
      }//if (!$tb->EOF)*/
    } //if (!empty($codigo))
    } //if ($operacion=='M')

  if ($operacion=='S')   //Salvar la aprobacion o rechazo
  {
    $fecha  = $_POST["fecha"];
    $desc   = $_POST["desc"];
    $status = $_POST["status"];

    if ($tool->Validar_Periodo($fecha,"CPDefNiv"))
    {
        if ($tool->Fecha_en_Periodo_Abierto($fecha)) //cppereje, CERRADO='N'
         {
           if ($sw == 'C'){
          $sql="update cpsoltrasla set descon='".$desc."',
                         feccon=to_date('".$fecha."','dd/mm/yyyy'),
                         stacon='".$status."'
                where trim(reftra) = '".trim($codigo)."'";
          $bd->actualizar($sql);

           }else if ($sw == 'G'){
          $sql="update cpsoltrasla set desgob='".$desc."',
                         fecgob=to_date('".$fecha."','dd/mm/yyyy'),
                         stagob='".$status."'
                where trim(reftra) = '".trim($codigo)."'";
          $bd->actualizar($sql);

           }else if ($sw == 'P'){
          $sql="update cpsoltrasla set despre='".$desc."',
                         fecpre=to_date('".$fecha."','dd/mm/yyyy'),
                         stapre='".$status."'
                where trim(reftra) = '".trim($codigo)."'";
          $bd->actualizar($sql);
           }else if ($sw == 'N4'){
          $sql="update cpsoltrasla set desniv4='".$desc."',
                         fecniv4=to_date('".$fecha."','dd/mm/yyyy'),
                         staniv4='".$status."'
                where trim(reftra) = '".trim($codigo)."'";
          $bd->actualizar($sql);
           }else if ($sw == 'N5'){
          $sql="update cpsoltrasla set desniv5='".$desc."',
                         fecniv5=to_date('".$fecha."','dd/mm/yyyy'),
                         staniv5='".$status."'
                where trim(reftra) = '".trim($codigo)."'";
          $bd->actualizar($sql);
           }else if ($sw == 'N6'){
          $sql="update cpsoltrasla set desniv6='".$desc."',
                         fecniv6=to_date('".$fecha."','dd/mm/yyyy'),
                         staniv6='".$status."'
                where trim(reftra) = '".trim($codigo)."'";
          $bd->actualizar($sql);
           }


  //		Grabar_NewPrecompromiso();
      //verificar estas lineas
        $aux2    = substr($codigo,2);
        $codigo2 = "TR".$aux2;
        $sql     = "update cpprecom set staprc = 'N',
                       fecanu = to_date('".$fecha."','dd/mm/yyyy'),
                       desanu ='".$desc."'
              where trim(refprc) = '".trim($codigo2)."'";
        $bd->actualizar($sql);


        ?>
          <script>
             close();
             window.opener.document.location=("PreSolTrasla.php");
          </script>
        <?
        }
    }//if ($tool->Validar_Periodo($fecha,"CPDefNiv"))
  }
  }//try
  catch(Exception $e)
  {
    print "Excepcion Obtenida: ".$e->getMessage()."\n";
  }

  //fucntion Grabar_NewPrecompromiso()
  //{

  //}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Aprobación de Solicitud de Traslados</title>
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
<script type="text/JavaScript" src="../../lib/general/js/prototype.js"></script>

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
<form name="form1" method="post" action="">
  <fieldset>

    <legend><span class="style3">Conformaci&oacute;n-Autorizaci&oacute;n-Aprobaci&oacute;n de Solicitud de Traslado/Rectificaci&oacute;n</span></legend>
 <table width="546"  border="0" align="center">
   <tr>
      <td height="20">&nbsp;</td>
    </tr>
 </table>
  <table  border="0" align="center" class="bodyline">
   <tr>
      <td width="10" height="35">&nbsp;</td>
      <td height="35" colspan="2"><span class="style14">Fecha  : </span></td>
      <td height="35" colspan="4"><input name="fecha" type="text"  class="imagenInicio" id="fecha" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $fecha;?>" size="10" datepicker="true" onKeyUp = "this.value=formateafecha(this.value);" onKeyPress="focos(event,'desc');">
      <input name="refcom" type="hidden" id="refcom" value="<? echo $refcom; ?>"></td>
    </tr>
    <tr>
   <td height="35">&nbsp;</td>
      <td height="35" colspan="2"><span class="style14">Descripci&oacute;n :</span></td>
      <td height="35" colspan="4"><input name="desc" type="text" id="desc" size="70" tabindex="1" value="<? print $desc ?>" onKeyPress="if (event.keyCode==13) {document.form1.status[0].focus()}"></td>
    </tr>
    <tr>
   <td height="35">&nbsp;</td>
      <td height="35" colspan="3">Conformado - Autorizado - Aprobado: </td>
      <td width="87" height="35"><input name="status" id="status" type="radio" value="S" <? if ($status=="S") { print "checked";}?>  >
      Si</td>
      <td width="174" height="35"><input name="status"  id="status" type="radio" value="N" <? if ($status=="N") { print "checked";}?>>
      No</td>
      <td width="24" height="35">&nbsp;</td>
    </tr>
    <tr>
   <td height="35">&nbsp;</td>
      <td width="29" height="35">&nbsp;</td>
      <td width="52" height="35"><div align="right">
      </div></td>
      <td width="135" height="35">
        <div align="right">
          <input type="button" name="Salvar" value="  Salvar  " onClick="salvar()">
      </div></td><td height="35">
        <div align="center">
          <input type="button" name="Cancelar" value="Cancelar" onClick="cancelar()">
        </div></td>
      <td height="35">&nbsp;</td>
      <td height="35">&nbsp;</td>
    </tr>
  </table>
  <table width="546"  border="0" align="center">
    <tr>
      <td height="10">&nbsp;</td>
    </tr>
  </table>
  <script>
    f=document.form1;
    f.desc.focus;
  </script>
  </fieldset>
</form>

</body>

<script language="javascript1.2">

function cancelar()
{
  close();
}

function salvar()
{
  f=document.form1;
  var sw='<? echo $sw; ?>';

  var fecha1=$F('fecha').split("/");
  var fecha2=opener.$F('fecha').split("/");

  var fecha11=fecha1[1]+"/"+fecha1[0]+"/"+fecha1[2];
  var fecha22=fecha2[1]+"/"+fecha2[0]+"/"+fecha2[2];

  //verificar datos completos

  if (TrimString(f.fecha.value)=="")
  {
    alert("Debe Incluir los Datos para la Conformación - Autorización - Aprobación");
    f.fecha.focus();

  }else if (compareDate2(fecha11, fecha22) < 0)
  {
    alert('La fecha no puede ser menor a la Solicitud.');
        $('fecha').focus();

  }else if (compareDate2(fecha11, fecha22) < 0)
  {
    alert('La fecha no puede ser menor a la Aprobacion.');
        $('fecha').focus();

  }
  else
  {
    codigo='<? print $codigo;?>';
    f.action="aprSolTrasla.php?operacion=S&codigo="+codigo+"&sw="+sw;
    f.submit();
  }
}

</script>
</html>
