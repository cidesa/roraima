<?php session_start();
include_once("../../lib/general/headhtml.php");
require_once("../../lib/modelo/business/tesoreria.class.php");

$bd=new basedatosAdo();


//OBJETO CODIGO EMPLEADO
$catalogo[] = tesoreria::catalogo_numche_tscheemi('numchedes');
$catalogo[] = tesoreria::catalogo_numche_tscheemi('numchehas');
$catalogo[] = tesoreria::catalogo_benefi('bendes');
$catalogo[] = tesoreria::catalogo_benefi('benhas');
$catalogo[] = tesoreria::catalogo_numcue('numcuedes');
$catalogo[] = tesoreria::catalogo_numcue('numcuehas');

$_SESSION['tsrmovimiento_cc'] = $catalogo;

$titulo='MOVIMIENTOS';
$orientacion='HORIZONTAL';
$tipopagina='CARTA';
?>
<?php include_once("../../lib/general/formtop.php")?>
      		<tr>
				  <td class="form_label_01"> <div align="left"><strong>N&uacute;mero Cheque:</strong></div></td>
				  <td> <div align="left">
			<input name="numchedes" type="text" class="breadcrumb" id="numchedes"
					value="<?$sql="Select min(numche) as num from tscheemi";
				LlenarTextoSql($sql,"num",$bd); ?>" size ="15">
			<a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('tsrmovimiento_cc',0); "></a>
					</div></td>
				  <td>
			<input name="numchehas" type="text" class="breadcrumb" id="numchehas"
					value="<?$sql="Select max(numche) as num from tscheemi";
				LlenarTextoSql($sql,"num",$bd); ?>" size ="15">
			<a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('tsrmovimiento_cc',1); "></a>
			   </td>
				</tr>
				<tr>
				  <td class="form_label_01"> <div align="left"><strong>N&uacute;mero Cuenta:</strong></div></td>
				  <td> <div align="left">
			<input name="numcuedes" type="text" class="breadcrumb" id="numcuedes"
					value="<?$sql="Select min(numcue) as num from tscheemi";
				LlenarTextoSql($sql,"num",$bd); ?>" size ="20">
			<a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('tsrmovimiento_cc',4); "></a>
					</div></td>
				  <td>
			<input name="numcuehas" type="text" class="breadcrumb" id="numcuehas"
					value="<?$sql="Select max(numcue) as num from tscheemi";
				LlenarTextoSql($sql,"num",$bd); ?>" size ="20">
			<a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('tsrmovimiento_cc',5); "></a>
			   </td>
				</tr>

			<tr>
				  <td class="form_label_01"> <div align="left"><strong>C.I./RIF del Beneficiario:</strong></div></td>
				  <td> <div align="left">
			<input name="bendes" type="text" class="breadcrumb" id="bendes"
					value="<?$sql="Select min(cedrif) as cedrif from opbenefi";
				LlenarTextoSql($sql,"cedrif",$bd); ?>" size ="15">
			<a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('tsrmovimiento_cc',2); "></a>
					</div></td>
				  <td>
			<input name="benhas" type="text" class="breadcrumb" id="benhas"
					value="<?$sql="Select max(cedrif) as cedrif from opbenefi";
				LlenarTextoSql($sql,"cedrif",$bd); ?>" size ="15">
			<a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('tsrmovimiento_cc',3); "></a>
			   </td>
				</tr>

           <tr>
              <td class="form_label_01"> <div align="left"><strong>Fecha Emisi&oacute;n:</strong></div></td>
             <td> <div align="left">
               	<input name="fechades" type="text" class="breadcrumb" id="fechades"
                   value="<?$sql="SELECT to_char(MIN(fecemi),'DD/MM/YYYY') as fechamin,to_char(max(fecemi),'DD/MM/YYYY') as fechamax FROM tscheemi";
 					LlenarTextoSql($sql,"fechamin",$bd); ?>" size ="22" datepicker='true'>
 					 </div></td>

              <td> <div align="left">
               	<input name="fechahas" type="text" class="breadcrumb" id="fechahas"
                   value="<?LlenarTextoSql($sql,"fechamax",$bd); ?>" size ="20" datepicker='true'>
 			      </div></td>
</tr>


            <!-- HASTA AQUI SE COPIAN LAS CAJITAS DEL REPORTE -->


<?php include_once("../../lib/general/formbottom.php")?>
