<?php session_start();
include_once("../../lib/general/headhtml.php");
require_once("../../lib/bd/basedatosAdo.php");
require_once("../../lib/general/funciones.php");
require_once("../../lib/modelo/business/compras.class.php");



$bd=new basedatosAdo();

//AQUI SE CONFIGURAN LOS CATALOGOS PREGUNTAR A CARLOS
//OBJETO CODIGO DE DESPACHO
$catalogo[] = compras::catalogo_coddes2('coddphdes');
$catalogo[] = compras::catalogo_coddes2('coddphhas');
//OBJETO CODIGO DEL ARTICULO
$catalogo[] = compras::catalogo_codartd2('codesde');
$catalogo[] = compras::catalogo_codartd2('codhasta');


$_SESSION['cardhpre'] = $catalogo;


$titulo='ORDEN DE DESPACHO';
$orientacion='VERTICAL';
$tipopagina='CARTA';
?>
<?php include_once("../../lib/general/formtop.php")?>

            <!--AQUI SE COPIAN LAS CAJITAS DE TEXTO PERTENECIENTES AL REPORTE-->

            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>C&oacute;digo del Despacho: </strong></td>
              <td width="180px">
       <?
          $tb=$bd->select("SELECT min(DPHART) as cod  FROM CADPHART");
        ?>

           <input name="coddphdes" type="text" class="breadcrumb" id="coddphdes" value="<? echo $tb->fields['cod'] ?>">
                  <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('cardhpre',0); "></a>

        </td>
              <td width="180px">
        <?
          $tb=$bd->select("SELECT max(DPHART) as cod  FROM CADPHART");
        ?>
                  <input type="text" name="coddphhas" class="breadcrumb" id="coddphhas" value="<? print $tb->fields["cod"];?>">
          <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('cardhpre',1);" ></a>
        </td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"> <div align="left"><strong>C&oacute;digo de Art&iacute;culo:</strong></div></td>
              <td> <div align="left">
        <?
          $tb=$bd->select("SELECT min(CODART) as cod FROM CAARTDPH");
            ?>
            <input type="text" name="codesde" class="breadcrumb" id="codesde" value="<? print $tb->fields["cod"];?>">
          <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('cardhpre',2);" ></a>
         </div></td>
              <td> <div align="left">
        <?
          $tb=$bd->select("SELECT max(CODART) as cod FROM CAARTDPH");
            ?>
                 <input type="text" name="codhasta" class="breadcrumb" id="codhasta" value="<? print $tb->fields["cod"];?>">
                 <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('cardhpre',3);" ></a>
                </div></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Fecha:</strong></td>
        <?
          $ts=$bd->select("SELECT to_char(min(FECDPH),'dd/mm/yyyy') as fecha FROM CADPHART");
          if(!$ts->EOF)
        {
          $fecdesde=$ts->fields["fecha"];
        }
        ?>
              <td><input name="fechadesde" type="text" class="breadcrumb" id="fechadesde" value="<? print $fecdesde;?>" size="12" maxlength="12" datepicker="true"></td>
        <?
          $tr=$bd->select("SELECT to_char(max(FECDPH),'dd/mm/yyyy') as fecha FROM CADPHART");
        if(!$tr->EOF)
        {
          $fechasta=$tr->fields["fecha"];
        }
        ?>
              <td><input name="fechahasta" type="text" class="breadcrumb" id="fechahasta" value="<? print $fechasta;?>" size="12" maxlength="12" datepicker="true"></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Status:</strong></td>
              <td><select name="estado" class="breadcrumb" id="estado">
                <option selected>Ambos</option>
                <option>Activas</option>
                <option>Anuladas</option>
              </select></td>
              <td>&nbsp;</td>
            </tr>

            <!-- HASTA AQUI SE COPIAN LAS CAJITAS DEL REPORTE -->


<?php include_once("../../lib/general/formbottom.php")?>
