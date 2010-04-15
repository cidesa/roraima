<?php session_start();
include_once("../../lib/general/headhtml.php");
require_once("../../lib/modelo/business/compras.class.php");

$bd=new basedatosAdo();

//AQUI SE CONFIGURAN LOS CATALOGOS PREGUNTAR A CARLOS
//OBJETO CODIGO EMPLEADO
$catalogo[] = compras::catalogo_casolart('codreqdes');
$catalogo[] = compras::catalogo_casolart('codreqhas');

$_SESSION['carprebase'] = $catalogo;

$titulo='PRESUPUESTO BASE';
$orientacion='VERTICAL';
$tipopagina='CARTA';
?>
<?php include_once("../../lib/general/formtop.php")?>

            <!--AQUI SE COPIAN LAS CAJITAS DE TEXTO PERTENECIENTES AL REPORTE-->
            <tr>
              <td height="45" class="form_label_01"><div><strong>Solicitud de Egreso : </strong></div></td>
              <td valign="top">
	                <input name="codreqdes" type="text"  value="
					<?
					  $sql="SELECT MIN(REQART) as cod FROM CASOLART";
			          LlenarTextoSql($sql,"cod",$bd);
					?>" class="breadcrumb" id="codreqdes" size="12" maxlength="10">
			  		<a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('carsolegrpre',0); "></a>
		      </td>
              <td valign="top">
					<input name="codreqhas" type="text" value="
					<?
					  $sql="SELECT MAX(REQART) as cod FROM CASOLART";
	                  LlenarTextoSql($sql,"cod",$bd);
					?>" class="breadcrumb" id="codreqhas" size="12" maxlength="10">
			  		<a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('carsolegrpre',1); "></a>
		      </td>
            </tr>

            <!-- HASTA AQUI SE COPIAN LAS CAJITAS DEL REPORTE -->


<?php include_once("../../lib/general/formbottom.php")?>
