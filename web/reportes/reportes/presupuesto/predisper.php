<?php session_start();
include_once("../../lib/general/headhtml.php");
require_once("../../lib/bd/basedatosAdo.php");
require_once("../../lib/general/funciones.php");
require_once("../../lib/modelo/business/presupuesto.class.php");
$bd=new basedatosAdo();
$catalogo[] = presupuesto::catalogo_codprePredisper('codpredes','A');
$catalogo[] = presupuesto::catalogo_codprePredisper('codprehas','D');

$_SESSION['predisper'] = $catalogo;

$titulo='Ejecucion Presupuestaria';
$orientacion='HORIZONTAL';
$tipopagina='CARTA';
?>
<?php include_once("../../lib/general/formtop.php")?>
 <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Periodo</strong></td>
              <td>
              <select name="perdesde" class="breadcrumb"  id="perdesde">
              <? $sql="Select pereje from Cppereje  order by pereje"; ?>
    	      <? LlenarComboSql($sql,"pereje","pereje","",$bd); ?>
              </select>
              </td>
              <td>
              <select name="perhasta" class="breadcrumb"  id="perhasta">
              <? $sql="Select pereje from Cppereje  order by pereje DESC"; ?>
    	      <? LlenarComboSql($sql,"pereje","pereje","",$bd); ?>
              </select>
		      </td>
             </tr>
              <tr>
              <td class="form_label_01"><div align="left"><strong>Código Presupuestario</strong></div></td>
              <td>
               <input name="codpredes" type="text" class="breadcrumb" id="codpredes"
               value="<?$sql="SELECT min(codpre) as codpre from cpasiini where PERPRE='00'";
               LlenarTextoSql($sql,"codpre",$bd); ?>" size ="30">
               <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('predisper',0); "></a>
              </td>
              <td>
               <input name="codprehas" type="text" class="breadcrumb" id="codprehas"
               value="<?$sql="SELECT max(codpre) as codpre from cpasiini where PERPRE='00'";
               LlenarTextoSql($sql,"codpre",$bd); ?>" size ="30">
               <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('predisper',1); "></a>
			  </td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Asignación</strong></td>
              <td colspan="2">
                <select name="asignacion" class="breadcrumb" id="select2">
                  <option>Acumulados</option>
                  <option>Parciales</option>
                </select> </td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Totales por</strong></td>
              <td colspan="2">
              <select name="agrupar" class="breadcrumb"  id="agrupar">
              <? $sql="SELECT CONSEC as con,CONSEC||' - '||NOMEXT as agrupare FROM CPNIVELES WHERE CATPAR='C' ORDER BY CONSEC"; ?>
    	      <? LlenarComboSql($sql,"con","agrupare","",$bd,'Ninguno'); ?>
             </select></td>
             </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"> <div align="left"><strong>Filtro</strong></div></td>
              <td colspan="2"> <div align="left"></div>
                <div align="left">
                  <input name="comodin" type="text" class="breadcrumb" id="comodin" value="%%" size="75">
                  <input name="sqls" type="hidden" id="sqls">
                </div></td>
            </tr>


<?php include_once("../../lib/general/formbottom.php")?>