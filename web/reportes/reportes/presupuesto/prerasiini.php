<?php
include_once("../../lib/general/headhtml.php");
require_once("../../lib/bd/basedatosAdo.php");
require_once("../../lib/general/funciones.php");
require_once("../../lib/modelo/business/presupuesto.class.php");
$bd=new basedatosAdo();
$catalogo[] = presupuesto::catalogo_codprePrerasiini('codpredesde','A');
$catalogo[] = presupuesto::catalogo_codprePrerasiini('codprehasta','D');

$_SESSION['prerasiini'] = $catalogo;

$titulo='Asignacion Inicial';
$orientacion='HORIZONTAL';
$tipopagina='CARTA';
?>
<?php include_once("../../lib/general/formtop.php")?>
<tr bordercolor="#6699CC">
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><div align="left"><strong>Nivel</strong></div></td>
             <td>
             <select name="nivel1" class="breadcrumb"  id="nivel1">
              <? $sql="SELECT CONSEC as con,CONSEC||' - '||NOMEXT as agrupar FROM CPNIVELES ORDER BY CONSEC asc"; ?>
    	      <? LlenarComboSql($sql,"con","agrupar","",$bd); ?>
             </select></td>
              <td>
              <select name="nivel2" class="breadcrumb"  id="nivel2">
             <? $sql="SELECT CONSEC as con,CONSEC||' - '||NOMEXT as agrupar FROM CPNIVELES ORDER BY CONSEC DESC"; ?>
    	      <? LlenarComboSql($sql,"con","agrupar","",$bd); ?>
              </select></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="27" class="form_label_01"><strong>Código Presupuestario</strong></td>
              <td>
                  <input name="codpredesde" type="text" class="breadcrumb" id="codpredesde"
              value="<?$sql="select min(codpre) as codpredesde from cpdeftit";
              LlenarTextoSql($sql,"codpredesde",$bd); ?>" size ="25">
              <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('prerasiini',0); "></a>
             </td>
              <td>
              <input name="codprehasta" type="text" class="breadcrumb" id="codprehasta"
              value="<?$sql="select max(codpre) as codprehasta from cpdeftit";
              LlenarTextoSql($sql,"codprehasta",$bd); ?>" size ="25">
              <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('prerasiini',1); "></a>
              </td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><div align="left"><strong>Subtotal</strong></div></td>
             <td>
             <select name="nivel3" class="breadcrumb"  id="nivel3" onChange="verificar()">
              <? $sql="SELECT CONSEC as con,CONSEC||' - '||NOMEXT as agrupar FROM CPNIVELES WHERE CATPAR='P' ORDER BY CONSEC"; ?>
    	      <? LlenarComboSql($sql,"con","agrupar","",$bd,'Ninguno'); ?>
             </select></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"> <div align="left"><strong>Filtro</strong></div></td>
              <td colspan="2"> <div align="left"></div>
                <div align="left">
                  <input name="comodin" type="text" class="breadcrumb" id="comodin" value="%%" size="50">
                </div></td>
            </tr>
             <tr bordercolor="#6699CC">
              <td class="form_label_01"> <div align="left"><strong>REVISADO</strong></div></td>
              <td colspan="2"> <div align="left"></div>
                <div align="left">
                  <input name="revisado" type="text" class="breadcrumb" id="revisado" value="" size="50">
                </div></td>
            </tr>
             <tr bordercolor="#6699CC">
              <td class="form_label_01"> <div align="left"><strong>CONFORMADO</strong></div></td>
              <td colspan="2"> <div align="left"></div>
                <div align="left">
                  <input name="conformado" type="text" class="breadcrumb" id="conformado" value="" size="50">
                </div></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td colspan="3" class="form_label_01">Este ejemplo listara, todo
                los códigos presupuestarios que en su sexto nivel contengan 401 y en el décimo
                un 002</td>
            </tr>
<?php include_once("../../lib/general/formbottom.php")?>
<script language="javascript">
function verificar()
{
 if ((parseInt($('nivel3').value)>=parseInt($('nivel2').value)) || (parseInt($('nivel3').value)<=parseInt($('nivel1').value)))
 {
  alert('Los subtotales deben sacarse en base a los Niveles escogidos');
  $('nivel3').value="";
 }

}
</script>