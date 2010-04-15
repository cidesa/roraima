<?php session_start();
include_once("../../lib/general/headhtml.php");
require_once("../../lib/modelo/business/contabilidad.class.php");

$bd=new basedatosAdo();

//AQUI SE CONFIGURAN LOS CATALOGOS PREGUNTAR A CARLOS
//OBJETO CODIGO DE CUENTA CONTABLE
$catalogo[] = contabilidad::catalogo_numcom('codcta');
$catalogo[] = contabilidad::catalogo_numcom('codcta1');

$_SESSION['conbalcom'] = $catalogo;

$titulo='Balance de ComprobaciÓn';
$orientacion='VERTICAL';
$tipopagina='CARTA';

?>
<?php include_once("../../lib/general/formtop.php")?>

            <!--AQUI SE COPIAN LAS CAJITAS DE TEXTO PERTENECIENTES AL REPORTE-->

            <tr>
              <td class="form_label_01" width="100"><div align="left"><strong>Cuenta Contable:</strong></div></td>
              <td>
                  <div align="left">
                  <? $tb=$bd->select("select min(b.codcta) as codctamin, max(b.codcta) as codctamax from  contabb b");?>

                  <input name="codcta" type="text" class="breadcrumb" id="codcta" value="<? echo $tb->fields['codctamin'] ?>" size ="20">
                  <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('conbalcom',0); "></a>   <!--AQUI SE HACEN LOS CATÁLOGOS -->

                  </div>
              </td>
              <td>
                   <input name="codcta1" type="text" class="breadcrumb" id="codcta1" value="<? echo $tb->fields['codctamax'] ?>" size ="20">
                   <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('conbalcom',1); "></a>   <!--AQUI SE HACEN LOS CATÁLOGOS -->
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
	                  <font color="#000066" size="4">
	                    <strong>
	                      <input name="nrorup" type="hidden" id="nrorup" value="<? print $auxnive11; ?>">
	                    </strong>
	                  </font>
              </td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>Actualizar Datos: </strong></td>
              <td>
                    <select name="actualizar" size="1" class=breadcrumb>
					   <option value="SI">SI</option>
					   <option value="NO" selected="selected">NO</option>
                    </select>
              </td>
              <td>&nbsp;</td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"> <div align="left"><strong>Filtro:</strong></div></td>
              <td colspan="2"> <div align="left"></div>
                <div align="left">
                  <input name="comodin" type="text" class="breadcrumb" id="comodin" value="%%" size="20">
                  <input name="sqls" type="hidden" id="sqls">
                </div></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Generar Archivo de Texto:</strong></td>
              <td colspan="2"><input name="archtxt" type="text" class="breadcrumb" id="archtxt" readonly="true"></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>

            <!-- HASTA AQUI SE COPIAN LAS CAJITAS DEL REPORTE -->


<?php include_once("../../lib/general/formbottom.php")?>