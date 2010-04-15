<?php session_start();
include_once("../../lib/general/headhtml.php");
require_once("../../lib/modelo/business/tesoreria.class.php");

$bd=new basedatosAdo();


//OBJETO CODIGO EMPLEADO
$catalogo[] = tesoreria::catalogo_numordpag('numorddes');
$catalogo[] = tesoreria::catalogo_numordpag('numordhas');
$catalogo[] = tesoreria::catalogo_benefi('bendes');
$catalogo[] = tesoreria::catalogo_benefi('benhas');

$_SESSION['oprordpag_cc'] = $catalogo;

$titulo='REPORTE MENSUAL POR ORDENES DE PAGO';
$orientacion='HORIZONTAL';
$tipopagina='CARTA';
?>
<?php include_once("../../lib/general/formtop.php")?>
      		<tr>
				  <td class="form_label_01"> <div align="left"><strong>N&uacute;mero
					   Orden de Pago:</strong></div></td>
				  <td> <div align="left">
			<input name="numorddes" type="text" class="breadcrumb" id="numorddes"
					value="<?$sql="Select min(numord) as numord from opordpag";
				LlenarTextoSql($sql,"numord",$bd); ?>" size ="15">
			<a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('oprordpag_cc',0); "></a>
					</div></td>
				  <td>
			<input name="numordhas" type="text" class="breadcrumb" id="numordhas"
					value="<?$sql="Select max(numord) as numord from opordpag";
				LlenarTextoSql($sql,"numord",$bd); ?>" size ="15">
			<a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('oprordpag_cc',1); "></a>
			   </td>
				</tr>
				
			<tr>
				  <td class="form_label_01"> <div align="left"><strong>C.I./RIF del Beneficiario:</strong></div></td>
				  <td> <div align="left">
			<input name="bendes" type="text" class="breadcrumb" id="bendes"
					value="<?$sql="Select min(cedrif) as cedrif from opbenefi";
				LlenarTextoSql($sql,"cedrif",$bd); ?>" size ="15">
			<a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('oprordpag_cc',2); "></a>
					</div></td>
				  <td>
			<input name="benhas" type="text" class="breadcrumb" id="benhas"
					value="<?$sql="Select max(cedrif) as cedrif from opbenefi";
				LlenarTextoSql($sql,"cedrif",$bd); ?>" size ="15">
			<a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('oprordpag_cc',3); "></a>
			   </td>
				</tr>	

           <tr>
              <td class="form_label_01"> <div align="left"><strong>Fecha Emisi&oacute;n:</strong></div></td>
             <td> <div align="left">
               	<input name="fechades" type="text" class="breadcrumb" id="fechades"
                   value="<?$sql="SELECT to_char(MIN(fecemi),'DD/MM/YYYY') as fechamin,to_char(max(fecemi),'DD/MM/YYYY') as fechamax FROM opordpag";
 					LlenarTextoSql($sql,"fechamin",$bd); ?>" size ="22" datepicker='true'>
 					 </div></td>

              <td> <div align="left">
               	<input name="fechahas" type="text" class="breadcrumb" id="fechahas"
                   value="<?LlenarTextoSql($sql,"fechamax",$bd); ?>" size ="20" datepicker='true'>
 			      </div></td>

            </tr>
         <tr>
              <td class="form_label_01"><strong>Aprobado por:</strong></td>
              <td colspan="2"><input name="apro" type="text" class="breadcrumb" id="apro" size="40"></td>
            </tr>
            <tr>
              <td class="form_label_01"> <div align="left"><strong>Revisado por:</strong></div></td>
              <td colspan="2"> <div align="left">
                  <input name="revi" type="text" class="breadcrumb" id="revi" size="40">
                </div></td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>Elaborado por:</strong></td>
              <td colspan="2"><input name="elab" type="text" class="breadcrumb" id="elab" size="40"></td>
            </tr>
           
            <!-- HASTA AQUI SE COPIAN LAS CAJITAS DEL REPORTE -->


<?php include_once("../../lib/general/formbottom.php")?>
