<?php session_start();
include_once("../../lib/general/headhtml.php");
require_once("../../lib/bd/basedatosAdo.php");
require_once("../../lib/general/funciones.php");
require_once("../../lib/modelo/business/tesoreria.class.php");
$bd=new basedatosAdo();
//OBJETO CODIGO EMPLEADO
$catalogo[] = tesoreria::catalogo_numordpag('NUMORDDES');
$catalogo[] = tesoreria::catalogo_numordpag('NUMORDHAS');
$catalogo[] = tesoreria::catalogo_benefi('BENDES');
$catalogo[] = tesoreria::catalogo_benefi('BENHAS');

$_SESSION['oprordpre'] = $catalogo;

$titulo='Orden de Pago';
$orientacion='VERTICAL';
$tipopagina='CARTA';
?>
<?php include_once("../../lib/general/formtop.php")?>
         <tr>
              <td class="form_label_01"><strong>N&uacute;mero de Orden de Pago:</strong></td>
              <td>
                  <div align="left">
                    <input name="NUMORDDES" type="text" value="<?
				$sql="select min(numord) as cod from opordpag";
                LlenarTextoSql($sql,"cod",$bd);
				?>" class="breadcrumb" id="NUMORDDES" size="16" maxlength="20">
                    <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('oprordpre',0); "></a>
                </div></td>
                <td>
                  <div align="left">
                    <input name="NUMORDHAS" type="text" value="<?
				$sql="select max(numord) as cod from opordpag";
                LlenarTextoSql($sql,"cod",$bd);
				?>" class="breadcrumb" id="NUMORDHAS" size="16" maxlength="20">
                    <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('oprordpre',1); "></a>
                </div></td>
            </tr>

	<tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>C.I/RIF  Beneficiario:</strong></td>
              <td>
                  <div align="left">
                    <input name="BENDES" type="text" value="<?
				$sql="SELECT min(trim(CEDRIF)) as cod FROM OPORDPAG";

                LlenarTextoSql($sql,"cod",$bd);
				?>" class="breadcrumb" id="BENDES" size="16" maxlength="20">
                      <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('oprordpre',2); "></a>
                </div></td>
                <td>
                  <div align="left">
                    <input name="BENHAS" type="text" value="<?
				$sql="SELECT max(trim(CEDRIF)) as cod FROM OPORDPAG";
                LlenarTextoSql($sql,"cod",$bd);
				?>" class="breadcrumb" id="BENHAS" size="16" maxlength="20">
                      <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('oprordpre',3); "></a>
                </div></td>
            </tr>


            <tr>
              <td class="form_label_01"><strong>Fecha:</strong></td>
              <td>
                <?
					$tb2=$bd->select("SELECT to_char(min(FECEMI),'dd/mm/yyyy') as fecemi FROM OPORDPAG ORDER BY FECEMI");

				?>
					<input name="FECHADES" type="text" class="breadcrumb" id="FECHADES" value="<? print $tb2->fields["fecemi"]; ?>" size="12" datepicker="true"></td>
              <td><?
					$tb2=$bd->select("SELECT to_char(max(FECEMI),'dd/mm/yyyy') as fecemi FROM OPORDPAG ORDER BY FECEMI");
					?>
                <input name="FECHAHAS" type="text" class="breadcrumb" id="FECHAHAS" value="<? print $tb2->fields["fecemi"]; ?>" size="12" datepicker="true"></td>
            </tr>



			             <tr>
                         <td class="form_label_01">
                           <div align="left"><strong>Tipo Orden: </strong></div></td>
                         <td><?
			  	$tb7=$bd->select("SELECT trim(TIPCAU) as tipcau FROM CPDOCCAU UNION SELECT TIPCOM FROM CPDOCCOM
									ORDER BY TIPCAU");
			  ?>
                             <select name="TIPCAUDES" class="breadcrumb" id="TIPCAUDES">
                               <?
				  	while(!$tb7->EOF)
					{
				  ?>
                               <option value="<? print $tb7->fields["tipcau"];?>"><? echo substr($tb7->fields["tipcau"],0,30);?></option>
                               <?
					$tb7->MoveNext();
					}
				?>
                           </select></td>
                         <td><?
			  	$tb8=$bd->select("SELECT trim(TIPCAU) as tipcau FROM CPDOCCAU UNION SELECT TIPCOM FROM CPDOCCOM
									ORDER BY TIPCAU DESC");
			  ?>
                             <select name="TIPCAUHAS" class="breadcrumb" id="TIPCAUHAS">
                               <?
				  	while(!$tb8->EOF)
					{
				  ?>
                               <option value="<? print $tb8->fields["tipcau"];?>"><? echo substr($tb8->fields["tipcau"],0,30);?></option>
                               <?
					$tb8->MoveNext();
					}
				?>
                           </select></td>
            </tr>

<?php include_once("../../lib/general/formbottom.php")?>

<script language="javascript">

function validar()
{
if (document.form1.NUMCONT.value=="")
{ alert ("Por favor llene el campo numero de contrato");}
else {
	if (document.form1.ANTIC.value=="")
	{ alert ("Por favor llene el campo anticipo ");}
	else {
	     if (document.form1.VALUAC.value=="")
		{ alert ("Por favor llene el campo valuaciones ");}
		else {
				if (document.form1.FECHA.value=="")
				{ alert ("Por favor llene el campo fecha ");}
				else {
					if (document.form1.NUMORD.value=="")
					{alert ("Por favor llene el campo Orden de compra.");}
					else {
						if (document.form1.FECORD.value=="")
						{ alert ("Por favor llene el campo fecha de compra ");}
						else {
							if (document.form1.NUMSERV.value=="")
							{ alert ("Por favor llene el campo orden de servicio");}
							else{
								if (document.form1.FECSERV.value=="")
								{ alert ("Por favor llene el campo fecha de servicio ");}
								else {
									if (document.form1.PROY.value=="")
									{ alert ("Por favor llene el campo proyecto ");}
									else {document.form1.submit()};
								}
							}
						}
					}
				}
			}
		}
	}
}

</script>
</html>
