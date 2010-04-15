<?php session_start();
include_once("../../lib/general/headhtml.php");
require_once("../../lib/bd/basedatosAdo.php");
require_once("../../lib/general/funciones.php");
require_once("../../lib/modelo/business/presupuesto.class.php");
$bd=new basedatosAdo();

$titulo='Catalogo de Documentos que Comprometen';
$orientacion='HORIZONTAL';
$tipopagina='CARTA';
?>
<?php include_once("../../lib/general/formtop.php")?>
<tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Tipo de Compromiso:</strong></td>
              <td>
              <select name="tipcom1" class="breadcrumb"  id="tipcom1">
              <? $sql="SELECT TIPCOM as tipcom FROM CPDOCCOM ORDER BY TIPCOM"; ?>
    	      <? LlenarComboSql($sql,"tipcom","tipcom","",$bd); ?>
              </select>
             </td>
             <td>
              <select name="tipcom2" class="breadcrumb"  id="tipcom2">
              <? $sql="SELECT TIPCOM as tipcom FROM CPDOCCOM ORDER BY TIPCOM DESC"; ?>
    	      <? LlenarComboSql($sql,"tipcom","tipcom","",$bd); ?>
              </select>
             </td>
            </tr>
<?php include_once("../../lib/general/formbottom.php")?>