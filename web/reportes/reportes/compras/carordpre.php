<?php session_start();
include_once("../../lib/general/headhtml.php");
require_once("../../lib/modelo/business/compras.class.php");

$bd=new basedatosAdo();

//AQUI SE CONFIGURAN LOS CATALOGOS PREGUNTAR A CARLOS
//OBJETO CODIGO EMPLEADO
$catalogo[] = compras::catalogo_caordcom('ordcomdes');
$catalogo[] = compras::catalogo_caordcom('ordcomhas');

$catalogo[] = compras::catalogo_caprovee('codprodes');
$catalogo[] = compras::catalogo_caprovee('codprohas');

$catalogo[] = compras::catalogo_codartg('codratdes');
$catalogo[] = compras::catalogo_codartg('codarthas');

$_SESSION['carordpre'] = $catalogo;

$titulo='ORDEN DE COMPRA';
$orientacion='VERTICAL';
$tipopagina='OFICIO';
?>
<?php include_once("../../lib/general/formtop.php")?>
            <!--AQUI SE COPIAN LAS CAJITAS DE TEXTO PERTENECIENTES AL REPORTE-->
            <tr>
              <td height="45" class="form_label_01"><div><strong>Orden de Compra: </strong></div></td>
              <td valign="top">
                  <input name="ordcomdes" type="text"  value="
		<?
		  $sql="Select min(ordcom) as ordcom from caordcom where ordcom like 'OC%'";
                  LlenarTextoSql($sql,"ordcom",$bd);
		?>" class="breadcrumb" id="ordcomdes" size="12" maxlength="8">
  		<a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('carordpre',0); "></a>
	      </td>
              <td valign="top">
		<input name="ordcomhas" type="text" value="<?
		$sql="Select max(ordcom) as ordcom from caordcom where ordcom like 'OC%'";
                LlenarTextoSql($sql,"ordcom",$bd);
		?>" class="breadcrumb" id="ordcomhas" size="12" maxlength="8">
  		<a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('carordpre',1); "></a>
	      </td>
            </tr>
            <tr>
              <td height="26" class="form_label_01"><div align="left"><strong>Proveedor:</strong></div></td>
              <td valign="top"><div align="left">
                <input name="codprodes" type="text" value="<?
				$sql="Select min(codpro) as codpro from caprovee";
                LlenarTextoSql($sql,"codpro",$bd);
				?>" class="breadcrumb" id="codprodes" size="12">
  		<a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('carordpre',2); "></a>
              </div></td>
              <td valign="top">
			  <input name="codprohas" type="text" value="<?
				$sql="Select max(codpro) as codpro from caprovee";
                LlenarTextoSql($sql,"codpro",$bd);
				?>" class="breadcrumb" id="codprohas" size="12">
  		<a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('carordpre',3); "></a>
			  </td>
            </tr>
            <tr>
              <td height="45" class="form_label_01"><div align="left"><strong>Art&iacute;culo:</strong></div></td>
              <td valign="top">
                  <input name="codartdes" type="text" value="<?
				$sql="Select min(codart) as cod from caregart";
                LlenarTextoSql($sql,"cod",$bd);
				?>" class="breadcrumb" id="codartdes" size="13">
  		<a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('carordpre',4); "></a>
              </div></td>             <td valign="top"><input name="codarthas" type="text" value="<?
				$sql="Select max(codart) as cod from caregart";
                LlenarTextoSql($sql,"cod",$bd);
				?>" class="breadcrumb" id="codarthas" size="13">
  		<a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('carordpre',5); "></a>
		</td>
            </tr>
            <tr>
              <td height="24" class="form_label_01"><div align="left"><strong>Fecha:</strong></div></td>
              <td valign="top"><div align="left">
                  <input name="fecorddes" type="text" value="<?
				$sql="Select to_char(min(fecord),'dd/mm/yyyy') as fecord from caordcom";
                LlenarTextoSql($sql,"fecord",$bd);
				?>" id="fecorddes" size="12" maxlength="10" datepicker="true" class="breadcrumb">
              </div></td>
              <td valign="top"><input name="fecordhas" type="text" value="<?
				$sql="Select to_char(max(fecord),'dd/mm/yyyy') as fecord from caordcom";
                LlenarTextoSql($sql,"fecord",$bd);
				?>" id="fecordhas" size="12" maxlength="10" datepicker="true" class="breadcrumb"></td>
            </tr>
            <tr>
              <td class="form_label_01"><div align="left"><strong>Status:</strong> </div></td>
              <td><div align="left"> </div>
                  <div align="left">
                    <select name="status" class="breadcrumb" id="status">
                      <option value="Ambos" selected>Ambos</option>
                      <option value="Activas">Activas</option>
                      <option value="Anuladas">Anuladas</option>
                    </select>
                </div></td>
            </tr>
            <!--       <tr>
              <td class="form_label_01"><div align="left"><strong>Tipo Orden:</strong> </div></td>
              <td><div align="left"> </div>
                  <div align="left">
                   <?
			  	//$tb7=$bd->select("SELECT TIPCOM FROM CPDOCCOM WHERE TIPCOM LIKE 'OC%'");
			  ?>
			  <select name="tipcom" class="breadcrumb" id="tipcom" >
			   <option value="" selected>Todos</option>
                               <?
				  //	while(!$tb7->EOF)
					//{
				  ?>

                               <option value="<? //print $tb7->fields["tipcom"];?>"><?// echo substr($tb7->fields["tipcom"],0,30);


                               ?></option>

                               <?
					//$tb7->MoveNext();
					//}

				?>
                           </select>
                </div></td>

            </tr>-->
            <tr>
              <td height="24" class="form_label_01"><div align="left"><strong>COORDINADOR DE FINANZAS:</strong></div></td>
              <td colspan="2" valign="top"><div align="left">
                  <input name="gerfin" type="text" value="" id="gerfin"  "size="40" maxlength="45" class="breadcrumb">
              </div></td>
            </tr>

            <tr>
              <td height="24" class="form_label_01"><div align="left"><strong>DIRECTOR DE ADMINISTRACION Y FINANZAS:</strong></div></td>
              <td colspan="2" valign="top"><div align="left">
                  <input name="diradm" type="text" value="" id="diradm" size="40" maxlength="45" class="breadcrumb">
              </div></td>
            </tr>
            <tr>
              <td height="24" class="form_label_01"><div align="left"><strong>APROBADO POR:</strong></div></td>
              <td colspan="2" valign="top"><div align="left">
                  <input name="cont" type="text" value="" id="cont" size="40" maxlength="45" class="breadcrumb">
              </div></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="32">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <!-- HASTA AQUI SE COPIAN LAS CAJITAS DEL REPORTE -->
<?php include_once("../../lib/general/formbottom.php")?>
