<?php session_start();
include_once("../../lib/general/headhtml.php");
require_once("../../lib/bd/basedatosAdo.php");
require_once("../../lib/general/funciones.php");
require_once("../../lib/modelo/business/contabilidad.class.php");
$bd=new basedatosAdo();
$catalogo[] = contabilidad::catalogo_codcta('cod1','A');
$catalogo[] = contabilidad::catalogo_codcta('cod2','D');

$_SESSION['concatcue'] = $catalogo;

$titulo='Catalogo de Cuentas';
$orientacion='VERTICAL';
$tipopagina='CARTA';
?>
<?php include_once("../../lib/general/formtop.php")?>
             <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Código</strong></td>
              <td>
              <input name="cod1" type="text" class="breadcrumb" id="cod1"
              value="<?$sql="select min(codcta) as codcta1 from contabb";
              LlenarTextoSql($sql,"codcta1",$bd); ?>" size ="25">
              <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('concatcue',0); "></a>
             </td>
              <td>
              <input name="cod2" type="text" class="breadcrumb" id="cod2"
              value="<?$sql="select max(codcta) as codcta2 from contabb";
              LlenarTextoSql($sql,"codcta2",$bd); ?>" size ="25">
              <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('concatcue',1); "></a>
              </td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
              <td class="form_label_01"> <div align="left"><strong>Filtro:</strong></div></td>
              <td colspan="2"> <div align="left"></div>
                <div align="left">
                  <input name="filtro" type="text" class="breadcrumb" id="filtro" value="%" size="65">
                </div></td>
            </tr>
            <tr>
              <td colspan="3" class="form_label_01">&nbsp;</td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01"><input name="sqls" type="hidden" id="sqls"></td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
<?php include_once("../../lib/general/formbottom.php")?>