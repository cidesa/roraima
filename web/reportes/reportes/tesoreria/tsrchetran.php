<?php session_start();
include_once("../../lib/general/headhtml.php");
require_once("../../lib/modelo/business/tesoreria.class.php");

$bd=new basedatosAdo();

//AQUI SE CONFIGURAN LOS CATALOGOS PREGUNTAR A CARLOS
//OBJETO CODIGO EMPLEADO
$catalogo[] = tesoreria::catalogo_numche_tscheemi('numche1');
$catalogo[] = tesoreria::catalogo_numche_tscheemi('numche2');

$catalogo[] = tesoreria::catalogo_numcue_tscheemi('numcue1');
$catalogo[] = tesoreria::catalogo_numcue_tscheemi('numcue2');

$catalogo[] = tesoreria::catalogo_benefi('ben1');
$catalogo[] = tesoreria::catalogo_benefi('ben2');

$catalogo[] = tesoreria::catalogo_tipdoc('tipdoc1');
$catalogo[] = tesoreria::catalogo_tipdoc('tipdoc2');

$_SESSION['tsrchetran'] = $catalogo;

$titulo='cheques en transito';
$orientacion='VERTICAL';
$tipopagina='CARTA';
?>
<?php include_once("../../lib/general/formtop.php")?>

            <!--AQUI SE COPIAN LAS CAJITAS DE TEXTO PERTENECIENTES AL REPORTE-->


		<tr>
              <td class="form_label_01"> <div align="left"><strong>N&uacute;mero de Cheque:</strong></div></td>
             <td width="180"> <div align="left">
               	<input name="numche1" type="text" class="breadcrumb" id="numche1"
                   value="<?$sql="SELECT min(NUMCHE) as codmin,max(NUMCHE) as codmax FROM TSCHEEMI";
 					LlenarTextoSql($sql,"codmin",$bd); ?>" size ="22">
 					 <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('tsrchetran',0); "></a>
 			      </div></td>

              <td width="180"> <div align="left">
               	<input name="numche2" type="text" class="breadcrumb" id="numche2"
                   value="<? LlenarTextoSql($sql,"codmax",$bd); ?>" size ="22">
 					 <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('tsrchetran',1); "></a>
 			      </div></td>

            </tr>

		<tr>
              <td class="form_label_01"> <div align="left"><strong>Numero de Cuenta:</strong></div></td>
             <td> <div align="left">
               	<input name="numcue1" type="text" class="breadcrumb" id="numcue1"
                   value="<?$sql="SELECT min(NUMCUE) as codmin,max(NUMCUE) as codmax FROM TSCHEEMI";
 					LlenarTextoSql($sql,"codmin",$bd); ?>" size ="22">
 					<a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('tsrchetran',2); "></a>
 			      </div></td>

              <td> <div align="left">
               	<input name="numcue2" type="text" class="breadcrumb" id="numcue2"
                   value="<? LlenarTextoSql($sql,"codmax",$bd); ?>" size ="22">
                   <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('tsrchetran',3); "></a>
 			      </div></td>

            </tr>


		<tr>
              <td class="form_label_01"> <div align="left"><strong>Beneficiario:</strong></div></td>
             <td> <div align="left">
               	<input name="ben1" type="text" class="breadcrumb" id="ben1"
                   value="<?$sql="SELECT min(cedrif)as codmin,max(cedrif)as codmax FROM OPBENEFI";
 					LlenarTextoSql($sql,"codmin",$bd); ?>" size ="22">
 					 <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('tsrchetran',4); "></a>
 			      </div></td>

              <td> <div align="left">
               	<input name="ben2" type="text" class="breadcrumb" id="ben2"
                   value="<? LlenarTextoSql($sql,"codmax",$bd); ?>" size ="22">
 					 <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('tsrchetran',5); "></a>
 			      </div></td>

            </tr>

		<tr>
              <td class="form_label_01"> <div align="left"><strong>Fecha Emisi&oacute;n:</strong></div></td>
             <td> <div align="left">
               	<input name="fecreg1" type="text" class="breadcrumb" id="fecreg1"
                   value="<?$sql="SELECT to_char(MIN(fecemi),'DD/MM/YYYY') as fechamin,to_char(max(fecemi),'DD/MM/YYYY') as fechamax FROM tscheemi";
 					LlenarTextoSql($sql,"fechamin",$bd); ?>" size ="22" datepicker='true'>
 					 </div></td>

              <td> <div align="left">
               	<input name="fecreg2" type="text" class="breadcrumb" id="fecreg2"
                   value="<?LlenarTextoSql($sql,"fechamax",$bd); ?>" size ="20" datepicker='true'>
 			      </div></td>

            </tr>

        <!-- <tr>
              <td class="form_label_01"> <div align="left"><strong>Tipo Documento:</strong></div></td>
             <td> <div align="left">
               	<input name="tipdoc1" type="text" class="breadcrumb" id="tipdoc1"
                   value="<?$sql="SELECT min(b.destip) as codmin,max(b.destip) as codmax FROM tscheemi a, tstipmov b where a.tipdoc=b.codtip";
 					LlenarTextoSql($sql,"codmin",$bd); ?>" size ="22">
 					 <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('tsrcheemi',6); "></a>
 			      </div></td>

              <td> <div align="left">
               	<input name="tipdoc2" type="text" class="breadcrumb" id="tipdoc2"
                   value="<?LlenarTextoSql($sql,"codmax",$bd); ?>" size ="22">
 					 <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('tsrcheemi',7); "></a>
 			      </div></td>

            </tr>


            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Status:</strong></td>
              <td>
                <select name="status" class="breadcrumb" id="status">
                  <option value="t">Todos</option>
		  <option value="l">Impreso</option>
                  <option value="f">En la firma</option>
		  <option value="c">En caja</option>
                  <option value="e">Entregados</option>
                  <option value="a">Anulados</option>        
                </select></td>
              <td>&nbsp;</td>
            </tr>-->
			<!--<tr>
              <td height="26" class="form_label_01"> <div align="left"><strong>Generar Disco:</strong></div></td>
              <td colspan="2" valign="middle">
                <select name="gendis" class="breadcrumb" id="gendis">
                    <option selected="selected">NO</option>
                    <option>SI</option>
                </select></td>
              <td width="315" valign="middle"><strong>

              </strong></td>
            </tr>  -->


            <!-- HASTA AQUI SE COPIAN LAS CAJITAS DEL REPORTE -->


<?php include_once("../../lib/general/formbottom.php")?>
