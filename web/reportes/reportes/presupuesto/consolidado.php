<?php session_start();
include_once("../../lib/general/headhtml.php");
require_once("../../lib/bd/basedatosAdo.php");
require_once("../../lib/general/funciones.php");
require_once("../../lib/modelo/business/presupuesto.class.php");

$bd=new basedatosAdo();
$catalogo[] = presupuesto::catalogo_codprePredisper('codpredesde','A');
$catalogo[] = presupuesto::catalogo_codprePredisper('codprehasta','D');

$_SESSION['consolidado'] = $catalogo;

$titulo='Consolidado de Ejecucion';
$orientacion='HORIZONTAL';
$tipopagina='CARTA';
?>
<?php include_once("../../lib/general/formtop.php")?>
             <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>A&ntilde;o</strong></td>
              <td>
			  <select name="anopresup" class="breadcrumb" id="anopresup">
			  <? $sql="SELECT max(anopre) as anopre FROM cpasiini ORDER BY anopre desc"; ?>
    	      <? LlenarComboSql($sql,"anopre","anopre","",$bd); ?>
              </select></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Per&iacute;odo</strong></td>
              <td>
			    <select name="perdesde" class="breadcrumb" id="perdesde">
				 <? $sql="Select pereje from Cppereje  order by pereje"; ?>
    	         <? LlenarComboSql($sql,"pereje","pereje","",$bd); ?>
                 </select>
			  </td>
              <td>
			   <select name="perhasta" class="breadcrumb" id="perhasta">
                 <? $sql="Select pereje from Cppereje  order by pereje DESC"; ?>
    	         <? LlenarComboSql($sql,"pereje","pereje","",$bd); ?>
			   </select>
              </td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><div align="left"><strong>C&oacute;digo Presupuestario</strong></div></td>
              <td>
              <input name="codpredesde" type="text"  value="<?
				$sql="SELECT min(codpre) as codpre from cpasiini where PERPRE='00'";
                LlenarTextoSql($sql,"codpre",$bd);
				?>" class="breadcrumb" id="codpredesde" size="30" maxlength="50">
				<a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('consolidado',0); "></a>
              </td>
              <td>
              <input name="codprehasta" type="text"  value="<?
				$sql="SELECT max(codpre) as codpre from cpasiini where PERPRE='00'";
                LlenarTextoSql($sql,"codpre",$bd);
				?>" class="breadcrumb" id="codprehasta" size="30" maxlength="50">
				<a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('consolidado',1); "></a>
			  </td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"> <div align="left"><strong>Filtro</strong></div></td>
              <td colspan="2"> <div align="left"></div>
                <div align="left">
                  <input name="comodin" type="text" class="breadcrumb" id="comodin" value="%" size="75">
                  <input name="sqls" type="hidden" id="sqls">
                </div></td>
            </tr>
<?php include_once("../../lib/general/formbottom.php")?>