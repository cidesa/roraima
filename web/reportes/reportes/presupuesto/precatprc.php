<?php session_start();
include_once("../../lib/general/headhtml.php");
require_once("../../lib/bd/basedatosAdo.php");
require_once("../../lib/general/funciones.php");
require_once("../../lib/modelo/business/presupuesto.class.php");
$bd=new basedatosAdo();

$titulo='Catalogo de Documentos que Precomprometen';
$orientacion='VERTICAL';
$tipopagina='CARTA';
?>
<?php include_once("../../lib/general/formtop.php")?>
<tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Tipo de Precompromiso:</strong></td>
              <td>
              <select name="tipprc1" class="breadcrumb"  id="tipprc1">
              <? $sql="SELECT tipprc as tipprc FROM cpdocprc ORDER BY tipprc"; ?>
    	      <? LlenarComboSql($sql,"tipprc","tipprc","",$bd); ?>
              </select>
             </td>
             <td>
              <select name="tipprc2" class="breadcrumb"  id="tipprc2">
              <? $sql="SELECT tipprc as tipprc FROM cpdocprc ORDER BY tipprc DESC"; ?>
    	      <? LlenarComboSql($sql,"tipprc","tipprc","",$bd); ?>
              </select>
             </td>
            </tr>
<?php include_once("../../lib/general/formbottom.php")?>