<?php session_start();
include_once("../../lib/general/headhtml.php");
require_once("../../lib/modelo/business/contabilidad.class.php");

$bd=new basedatosAdo();

//AQUI SE CONFIGURAN LOS CATALOGOS PREGUNTAR A CARLOS
//OBJETO CODIGO EMPLEADO
$catalogo[] = contabilidad::catalogo_codcta('codcta1');
$catalogo[] = contabilidad::catalogo_codcta('codcta2');

$_SESSION['conbalgen'] = $catalogo;

$titulo='ESTADO DE RESULTADOS';
$orientacion='VERTICAL';
$tipopagina='CARTA';
?>
<?php include_once("../../lib/general/formtop.php")?>

            <tr>
              <td class="form_label_01">
                <div align="left"><strong>C&oacute;digo de Cuenta:</strong></div></td>
              <td>
                <div align="left">

                  <? $tb=$bd->select("SELECT DISTINCT(codcta) FROM CONTABB WHERE codcta>=5 AND codcta<7 ORDER BY codcta");?>

                  <input name="codcta1" type="text" class="breadcrumb" id="codcta1" value="<? echo $tb->fields['codcta'] ?>" size ="20">
                  <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('conbalgen',0); "></a>   <!--AQUI SE HACEN LOS CATÁLOGOS -->

              </div></td>
              <td>
                <div align="left">
                  <? $tb=$bd->select("SELECT DISTINCT(codcta) FROM CONTABB WHERE codcta>=5 AND codcta<7 ORDER BY codcta desc");?>

                  <input name="codcta2" type="text" class="breadcrumb" id="codcta2" value="<? echo $tb->fields['codcta'] ?>" size ="20">
                  <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('conbalgen',1); "></a>   <!--AQUI SE HACEN LOS CATÁLOGOS -->

				</div></td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>Acumulado:</strong></td>
              <td>
 			   <select id="status" name="status" class="breadcrumb">
                  <option value="S">SI</option>
                  <option value="N">NO</option>
    		   </select>
			  </td>
              <td>&nbsp;
			  </td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>Peri&oacute;do:</strong></td>
              <td>

 			   <select id="periodo" name="periodo" class="breadcrumb">
   			     <? $sql="SELECT DISTINCT B.PEREJE as pereje FROM CONTABA A, CONTABA1 B WHERE A.FECINI = B.FECINI AND A.FECCIE = B.FECCIE ORDER BY B.PEREJE"; ?>
    		     <?	LlenarComboSql($sql,"pereje","pereje","",$bd,0); ?>
    		   </select>

			  </td>
              <td>&nbsp;
			  </td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>Niveles:</strong></td>
              <td>
	               <? $tb=$bd->select("SELECT numrup as nrorup FROM CONTABA");
	                  $auxnive11=$tb->fields["nrorup"];
	               ?>
                <input name="auxnivel" type="text" class="breadcrumb" id="auxnivel" size="3" maxlength="3" value="<? echo $tb->fields['nrorup'] ?>">
                <font color="#000066" size="4"><strong>
                <input name="nrorup" type="hidden" id="nrorup" value="<? print $auxnive11; ?>">
              </strong></font></td>
              <td>&nbsp;</td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01"><strong>Niveles Totales:</strong></td>
              <td colspan="2">
                  <? $tb=$bd->select("SELECT numrup as nrorup FROM CONTABA");
	                  $auxnive2=$tb->fields["nrorup"];
	               ?>

                <input name="auxnivel2" type="text" class="breadcrumb" id="auxnivel2" size="3" maxlength="3" value="<? echo $tb->fields['nrorup'] ?>">
                <font color="#000066" size="4"><strong>
                <input name="nrorup2" type="hidden" id="nrorup2" value="<? print $auxnive2; ?>">
              </strong></font></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"> <div align="left"><strong>Filtro:</strong></div></td>
              <td colspan="2"> <div align="left"></div>
                <div align="left">
                  <input name="comodin" type="text" class="breadcrumb" id="comodin" value="%%" size="75">
                  <input name="sqls" type="hidden" id="sqls">
                </div></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td colspan="3" class="form_label_01"></td>
            </tr>


<?php include_once("../../lib/general/formbottom.php")?>