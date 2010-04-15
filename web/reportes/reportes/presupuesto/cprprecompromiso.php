<?php session_start();
include_once("../../lib/general/headhtml.php");
require_once("../../lib/modelo/business/presupuesto.class.php");
include_once("../../lib/general/funciones.php");
require_once("../../lib/bd/basedatosAdo.php");
$bd=new basedatosAdo();

//AQUI SE CONFIGURAN LOS CATALOGOS PREGUNTAR A CARLOS
//OBJETO CODIGO EMPLEADO
$catalogo[] = presupuesto::catalogo_cpprecom('refpredes');
$catalogo[] = presupuesto::catalogo_cpprecom('refprehas');

$_SESSION['cprprecompromiso'] = $catalogo;

$titulo='Comprobante de PreCompromiso';
$orientacion='VERTICAL';
$tipopagina='CARTA';

?>
<?php include_once("../../lib/general/formtop.php")?>

            <!--AQUI SE COPIAN LAS CAJITAS DE TEXTO PERTENECIENTES AL REPORTE-->
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>N&ordm; de PreCompromiso: </strong></td>
              <td>
			<input name="refpredes" type="text" class="breadcrumb" id="refpredes"
                   value="<?$sql="select min(refprc) as cod from cpprecom";
           LlenarTextoSql($sql,"cod",$bd); ?>" size ="15">
  			<a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('cprprecompromiso',0); "></a>
		      </td>
              <td>
			<input name="refprehas" type="text" class="breadcrumb" id="refprehas"
                   value="<?$sql="select max(refprc) as cod from cpprecom";
           LlenarTextoSql($sql,"cod",$bd); ?>" size ="15">
  			<a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('cprprecompromiso',1); "></a>
		      </td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Presupuesto: </strong></td>
              <td colspan="2">
			<input name="dirpre" type="text" class="breadcrumb" id="dirpre"
                   value="<?$sql="SELECT DIRPRE AS COD FROM EMPRESA";
           LlenarTextoSql($sql,"cod",$bd); ?>" size ="30">
           <!--
            <input type="button" name="Button3" value="..." onClick=" catalogo('dirpre');">
            -->
		      </td>
            </tr>

            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Administración: </strong></td>
              <td colspan="2">
			<input name="dirfin" type="text" class="breadcrumb" id="dirfin"
                   value="<?$sql="SELECT DIRFIN AS COD FROM EMPRESA";
           LlenarTextoSql($sql,"cod",$bd); ?>" size ="30">
           <!--
            <input type="button" name="Button3" value="..." onClick=" catalogo('dirfin');">
            -->
		      </td>
            </tr>

            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Revisado: </strong></td>
              <td colspan="2">
			<input name="anapre" type="text" class="breadcrumb" id="anapre"
                   value="<?$sql="SELECT ANAPRE AS COD FROM EMPRESA";
           LlenarTextoSql($sql,"cod",$bd); ?>" size ="30">
           <!--
            <input type="button" name="Button3" value="..." onClick=" catalogo('dirfin');">
            -->
		      </td>
            </tr>

            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Conformado: </strong></td>
              <td colspan="2">
			<input name="diradm" type="text" class="breadcrumb" id="diradm"
                   value="<?$sql="SELECT DIRADM AS COD FROM EMPRESA";
           LlenarTextoSql($sql,"cod",$bd); ?>" size ="30">
           <!--
            <input type="button" name="Button3" value="..." onClick=" catalogo('dirfin');">
            -->
		      </td>
            </tr>

            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Autorizado: </strong></td>
              <td colspan="2">
			<input name="dirgen" type="text" class="breadcrumb" id="dirgen"
                   value="<?$sql="SELECT DIRGEN AS COD FROM EMPRESA";
           LlenarTextoSql($sql,"cod",$bd); ?>" size ="30">
           <!--
            <input type="button" name="Button3" value="..." onClick=" catalogo('dirfin');">
            -->
		      </td>
            </tr>
            <!-- HASTA AQUI SE COPIAN LAS CAJITAS DEL REPORTE -->


<?php include_once("../../lib/general/formbottom.php")?>
