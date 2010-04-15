<?php session_start();
include_once("../../lib/general/headhtml.php");
require_once("../../lib/modelo/business/compras.class.php");

$bd=new basedatosAdo();

//AQUI SE CONFIGURAN LOS CATALOGOS PREGUNTAR A CARLOS
//OBJETO CODIGO EMPLEADO
//$catalogo[] = compras::catalogo_1('<---micampo--->');

$_SESSION['careqpre'] = $catalogo;

$titulo='REQUISICION';
$orientacion='VERTICAL';
$tipopagina='CARTA';




?>
<?php include_once("../../lib/general/formtop.php")?>

            <!--AQUI SE COPIAN LAS CAJITAS DE TEXTO PERTENECIENTES AL REPORTE-->

            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Requisici&oacute;n: </strong></td>
              <td>
				 <?
			  	$tb=$bd->select("SELECT REQART as cod FROM CAREQART ORDER BY REQART asc");
			  ?>
                  <select name="codreqdes" class="breadcrumb" id="codreqdes">
                    <?
				  	while(!$tb->EOF)
					{
				  ?>
                    <option value="<? print $tb->fields["cod"];?>"><? print $tb->fields["cod"];?></option>
                    <?
					$tb->MoveNext();
					}
				?>
                  </select>
			  </td>
              <td>
			 <?
			  	$tb=$bd->select("SELECT REQART as cod FROM CAREQART ORDER BY REQART desc");
			  ?>
                  <select name="codreqhas" class="breadcrumb" id="codreqhas">
                    <?
				  	while(!$tb->EOF)
					{
				  ?>
                    <option value="<? print $tb->fields["cod"];?>"><? print $tb->fields["cod"];?></option>
                    <?
					$tb->MoveNext();
					}
				?>
                  </select>

			  </td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Solicitante:</strong></td>
              <td>
				<?
			  	$tb=$bd->select("SELECT DISTINCT CODCAT as cod FROM CAARTREQ ORDER BY CODCAT ASC");
			   ?>
                  <select name="codcatdes" class="breadcrumb" id="codcatdes">
                    <?
				  	while(!$tb->EOF)
					{
				  ?>
                    <option value="<? print $tb->fields["cod"];?>"><? print $tb->fields["cod"];?></option>
                    <?
					$tb->MoveNext();
					}
				?>
                  </select>
			  </td>
              <td>
				<?
			  	$tb=$bd->select("SELECT DISTINCT CODCAT as cod FROM CAARTREQ ORDER BY CODCAT desc");
			   ?>
                  <select name="codcathas" class="breadcrumb" id="codcathas">
                    <?
				  	while(!$tb->EOF)
					{
				  ?>
                    <option value="<? print $tb->fields["cod"];?>"><? print $tb->fields["cod"];?></option>
                    <?
					$tb->MoveNext();
					}
				?>
                  </select>
			  </td>
            </tr>
          <!--  <tr>
              <td class="form_label_01"><strong>Fecha:</strong></td>
              <?
			  	$ts=$bd->select("SELECT DISTINCT MIN(to_date(FECREQ,'yyyy-mm-dd')) as fecha FROM  CAREQART");
			  	if(!$ts->EOF)
				{
					$fecdesde=$ts->fields["fecha"];
				}
			  ?>
              <td><input name="fechadesde" type="text" class="breadcrumb" id="fechadesde" value="<? print $fecdesde;?>" size="12" maxlength="12" datepicker="true"></td>
              <?
			  	$tr=$bd->select("SELECT DISTINCT MAX(to_date(FECREQ,'yyyy-mm-dd')) as fecha FROM  CAREQART");
				if(!$tr->EOF)
				{
					$fechasta=$tr->fields["fecha"];
				}
			  ?>
              <td><input name="fechahasta" type="text" class="breadcrumb" id="fechahasta" value="<? print $fechasta;?>" size="12" maxlength="12" datepicker="true"></td>
            </tr>-->
            <tr bordercolor="#6699CC">
              <td class="form_label_01"> <div align="left"><strong>C&oacute;digo de Art&iacute;culo:</strong></div></td>
              <td> <div align="left">
				<?
			  	$tb=$bd->select("SELECT DISTINCT(CODART) as  cod FROM CAREGART ORDER BY CODART");
			   ?>
                  <select name="codesde" class="breadcrumb" id="codesde">
                    <?
				  	while(!$tb->EOF)
					{
				  ?>
                    <option value="<? print $tb->fields["cod"];?>"><? print $tb->fields["cod"];?></option>
                    <?
					$tb->MoveNext();
					}
				?>
                  </select>
                </div></td>
              <td> <div align="left">
				<?
			  	$tb=$bd->select("SELECT DISTINCT(CODART) as  cod FROM CAREGART ORDER BY CODART desc");
			   ?>
                  <select name="codhasta" class="breadcrumb" id="codhasta">
                    <?
				  	while(!$tb->EOF)
					{
				  ?>
                    <option value="<? print $tb->fields["cod"];?>"><? print $tb->fields["cod"];?></option>
                    <?
					$tb->MoveNext();
					}
				?>
                  </select>
                </div></td>
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
            <tr bordercolor="#6699CC">
              <td colspan="3" class="form_label_01">&nbsp;</td>
            </tr>
          </table>
        </div>



            <!-- HASTA AQUI SE COPIAN LAS CAJITAS DEL REPORTE -->


<?php include_once("../../lib/general/formbottom.php")?>