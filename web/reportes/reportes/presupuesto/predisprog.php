<?php session_start();
include_once("../../lib/general/headhtml.php");
require_once("../../lib/bd/basedatosAdo.php");
require_once("../../lib/general/funciones.php");
require_once("../../lib/modelo/business/presupuesto.class.php");
$bd=new basedatosAdo();
$catalogo[] = presupuesto::catalogo_codprePredisper('codpredes','A');
$catalogo[] = presupuesto::catalogo_codprePredisper('codprehas','D');

$_SESSION['predisprog'] = $catalogo;

$titulo='Resumen General de Ejecucion Presupuestaria';
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
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Hasta Nivel N°</strong></td>
              <td colspan="2">
              <select name="nivhasta" class="breadcrumb"  id="nivhasta">
              <? $sql="SELECT CONSEC as con,CONSEC||' - '||NOMEXT as agrupare FROM CPNIVELES WHERE CATPAR='P' ORDER BY CONSEC DESC"; ?>
    	      <? LlenarComboSql($sql,"con","agrupare","",$bd); ?>
             </select></td>
             </tr>
            <tr>
              <td class="form_label_01"><div align="left"><strong>Código Presupuestario</strong></div></td>
              <td>
               <input name="codpredes" type="text" class="breadcrumb" id="codpredes"
               value="<?$sql="SELECT min(codpre) as codpre from cpasiini where PERPRE='00'";
               LlenarTextoSql($sql,"codpre",$bd); ?>" size ="30">
               <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('predisprog',0); "></a>
              </td>
              <td>
               <input name="codprehas" type="text" class="breadcrumb" id="codprehas"
               value="<?$sql="SELECT max(codpre) as codpre from cpasiini where PERPRE='00'";
               LlenarTextoSql($sql,"codpre",$bd); ?>" size ="30">
               <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('predisprog',1); "></a>
			  </td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Asignación</strong></td>
              <td colspan="2">
                <select name="asignacion" class="breadcrumb" id="asignacion">
                  <option>Acumulada</option>
                  <option>Total</option>
                </select> </td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Movimiento</strong></td>
              <td colspan="2">
                <select name="movimiento" class="breadcrumb" id="movimiento">
                  <option>Acumulados</option>
                  <option>Parciales</option>
                </select> </td>
            </tr>
             <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Subtotales por Partida</strong></td>
              <td colspan="2">
              <select name="agrupar" class="breadcrumb"  id="agrupar" onChange="verificar()">
              <? $sql="SELECT CONSEC as con,CONSEC||' - '||NOMEXT as agrupare FROM CPNIVELES WHERE CATPAR='P' ORDER BY CONSEC DESC"; ?>
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
            <tr>
              <td class="form_label_01"> <div align="left"><strong>Titulo de Reporte</strong></div></td>
              <td colspan="2">
              <select name="titul" class="breadcrumb" id="titul" onChange="mostrar()">
                  <option>Ejecución Presupuestaria por Proyectos</option>
                  <option>Resumen General de Ejecución Presupuestaria</option>
                  <option>Ejecución Presupuestaria por Niveles</option>
                  <option>Ejecución Presupuestaria por Partidas</option>
                  <option>Otro</option>
                </select>
                <div id="otr" style="display:none">
                <br>
                <input name="otrotit" type="text" class="breadcrumb" id="otrotit" value="" size="50">
                </div>
                </td>
            </tr>
<?php include_once("../../lib/general/formbottom.php")?>
<script language="JavaScript" type="text/javascript">
  function mostrar()
  {
  	if ($('titul').value=='Otro')
  	{
  	 $('otr').show();
  	 $('otrotit').value="";
  	}
  	else
  	{
  	  $('otr').hide();
  	  $('otrotit').value="";
  	}
  }

 function verificar()
{
 if (parseInt($('agrupar').value)>=parseInt($('nivhasta').value))
 {
  alert('Los subtotales deben sacarse en base a los Nivel hasta escogido');
  $('agrupar').value="";
 }

}
</script>