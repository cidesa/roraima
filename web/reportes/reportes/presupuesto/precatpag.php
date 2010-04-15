<?php session_start();
include_once("../../lib/general/headhtml.php");
require_once("../../lib/bd/basedatosAdo.php");
require_once("../../lib/general/funciones.php");
require_once("../../lib/modelo/business/presupuesto.class.php");
$bd=new basedatosAdo();

$titulo='Catalogo de Documentos que Pagan';
$orientacion='HORIZONTAL';
$tipopagina='CARTA';
?>
<?php include_once("../../lib/general/formtop.php")?>
<tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Tipo de Pagado:</strong></td>
              <td>
              <select name="tippag1" class="breadcrumb"  id="tippag1">
              <? $sql="SELECT TIPPAG as tippag FROM CPDOCPAG ORDER BY TIPPAG"; ?>
    	      <? LlenarComboSql($sql,"tippag","tippag","",$bd); ?>
              </select>
             </td>
             <td>
              <select name="tippag2" class="breadcrumb"  id="tippag2">
              <? $sql="SELECT TIPPAG as tippag FROM CPDOCPAG ORDER BY TIPPAG DESC"; ?>
    	      <? LlenarComboSql($sql,"tippag","tippag","",$bd); ?>
              </select>
             </td>
            </tr>
<?php include_once("../../lib/general/formbottom.php")?>