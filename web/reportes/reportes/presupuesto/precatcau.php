<?php session_start();
include_once("../../lib/general/headhtml.php");
require_once("../../lib/bd/basedatosAdo.php");
require_once("../../lib/general/funciones.php");
require_once("../../lib/modelo/business/presupuesto.class.php");
$bd=new basedatosAdo();

$titulo='Catalogo de Documentos que Causan';
$orientacion='HORIZONTAL';
$tipopagina='CARTA';
?>
<?php include_once("../../lib/general/formtop.php")?>
<tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Tipo de Causado:</strong></td>
              <td>
              <select name="tipcau1" class="breadcrumb"  id="tipcau1">
              <? $sql="SELECT TIPCAU  as tipcau FROM CPDOCCAU ORDER BY TIPCAU"; ?>
    	      <? LlenarComboSql($sql,"tipcau","tipcau","",$bd); ?>
              </select>
             </td>
             <td>
              <select name="tipcau2" class="breadcrumb"  id="tipcau2">
              <? $sql="SELECT TIPCAU  as tipcau FROM CPDOCCAU ORDER BY TIPCAU DESC"; ?>
    	      <? LlenarComboSql($sql,"tipcau","tipcau","",$bd); ?>
              </select>
             </td>
            </tr>
<?php include_once("../../lib/general/formbottom.php")?>