<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>SIGA Reportes</title>
<link href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
<link href="../../lib/css/datepickercontrol.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="../../lib/general/datepickercontrol.js"></script>
<script language="JavaScript" src="../../lib/general/prototype_1_5_1.js"></script>
</head>
<body>
<?
require_once("../../lib/bd/basedatosAdo.php");
require_once("../../lib/general/funciones.php");
$bd=new basedatosAdo();
?>
<form name="form1" method="post" action="">
  <table width="760" height="40"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#EEEEEE">
    <tr>
      <td width="190" rowspan="2" bgcolor="#003399" class="cell_left_line02"><img src="../../img/tl_logo_01.gif" width="190" height="40" border="0"></a></td>
      <td colspan="2" class="cell_date" align="right">
		<?
		$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","S&aacute;bado");
		$mes = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		$me=$mes[date('n')];
		echo $dias[date('w')].strftime(", %d de $me del %Y")."<br>";
		?>
		</td>
    </tr>
    <tr>
      <td width="313">&nbsp; </td>
      <td width="257" align="right" valign="middle" class="cell_logout">&nbsp;</td>
    </tr>
  </table>
  <table width="760"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td width="6" align="left" valign="top" class="cell_left_line02"><img src="../../img/center02_tl.gif" width="6" height="6"></td>
      <td rowspan="2" valign="top" class="cell_padding_01"> <p class="breadcrumb">Reportes
        </p>
        <fieldset>

        <div align="left">&nbsp;
          <table width="678"  border="0" align="center" cellspacing="0" bordercolor="#6699CC" class="grid_line01_tl">
            <tr bordercolor="#FFFFFF">
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>COMPROBANTE
                  DE RETENCION del IVA
                  <input name="titulo" type="hidden" id="titulo">
                  </strong></font></div></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01">&nbsp;</td>
              <td>&nbsp;</td>
              <td><font color="#00FFCC">&nbsp; </font></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td width="203" class="form_label_01"><strong>Tama&ntilde;o Hoja:</strong></td>
              <td width="230"> <input name="tamano" type="text" class="breadcrumb" id="tamano" readonly="true"></td>
              <td width="231">&nbsp;</td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="24" class="form_label_01"><strong>Orientaci&oacute;n:</strong></td>
              <td> <input name="orientacion" type="text" class="breadcrumb" id="orientacion" readonly="true"></td>
              <td> <div align="right"> </div></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"> <div align="left"><strong>Salida del
                  Reporte:</strong></div></td>
              <td> <div align="left"> </div>
                <div align="left"> <strong>
                  <input name="radiobutton" type="radio" class="breadcrumb" value="radiobutton" checked>
                  PANTALLA</strong></div></td>
              <td> <strong>
                <input name="radiobutton" type="radio" class="breadcrumb" value="radiobutton">
                IMPRESORA</strong></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td colspan="3" class="form_label_01"> <div align="center"><font color="#000066" size="3"><strong><em>Criterios
                  de Selecci&oacute;n</em></strong></font></div></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td bordercolor="#FFFFFF" class="form_label_01">&nbsp;</td>
              <td><strong>DESDE</strong></td>
              <td><strong>HASTA</strong></td>
            </tr>
            <?php
                	$tb=$bd->select("SELECT nomemp as nomageret,diremp as dirageret,'G20000160-7' as rifageret from empresa");
			       if (!$tb->EOF)
			       {
			       	  $nomage=$tb->fields["nomageret"];
			       	  $dirage=$tb->fields["dirageret"];
			       	  $rifage=$tb->fields["rifageret"];
			       }
			?>
            <tr>
              <td class="form_label_01"> <div align="left">
                  <p><strong>Responsable:</strong></p>
                </div></td>
              <td colspan="2"> <div align="left"><strong>
                  <input name="responsable" type="text" class="breadcrumb" id="responsable" value="" size="89">
                  </strong> </div></td>
            </tr>
            <tr>
              <td class="form_label_01"> <div align="left">
                  <p><strong>Correlativo:</strong></p>
                </div></td>
              <td colspan="2"> <div align="left"><strong>
                  <input name="co" type="text" class="breadcrumb" id="co" value="" size="20">
                  </strong> </div></td>
            </tr>
            <tr>
              <td class="form_label_01"> <div align="left">
                  <p><strong>Fecha Entrega:</strong></p>
                </div></td>
              <td colspan="2"> <div align="left"><strong>
                  <input name="fechaentrega" type="text" class="breadcrumb" id="fechaentrega" value="<?print date('d/m/Y');?>" size="20" datepicker="true">
                  </strong> </div></td>
            </tr>
            <?


            ?>
            <tr>
              <td class="form_label_01"> <div align="left">
                  <p><strong>Agente </strong> <strong>de Retenci&oacute;n:</strong></p>
                </div></td>
              <td colspan="2"> <div align="left"><strong>
                  <input name="ag" type="text" class="breadcrumb" id="ag" value="<? print $nomage;?>" size="89">
                  </strong> </div></td>
            </tr>
            <tr>
              <td class="form_label_01"> <div align="left"><strong>RIF Agente
                  </strong> <strong>de Retenci&oacute;n</strong><strong>:</strong></div></td>
              <td colspan="2"> <div align="left"><strong>
                  <input name="rif" type="text" class="breadcrumb" id="rif" value="<? print $rifage;?>" size="40">
                  </strong> </div></td>
            </tr>
            <tr>
              <td class="form_label_01"> <div align="left"><strong>Direcci&oacute;n
                  Agente </strong> <strong>de Retenci&oacute;n</strong><strong>
                  :</strong></div></td>
              <td colspan="2"> <div align="left"><strong>
                  <input name="dire" type="text" class="breadcrumb" id="dire" value="<? print $dirage;?>" size="89">
                  </strong> </div></td>
            </tr>
            <tr>
              <td class="form_label_01"> <div align="left"><strong>Numero de Orden:</strong></div></td>
              <td colspan="2"> <div align="left">
                  <?

			  	$tb=$bd->select("SELECT distinct(a.numord) as numord, comret from opfactur a,opordpag b
								where a.numord=b.numord and moniva>0
								order by a.numord");
			  ?>
                  <select name="orde" class="breadcrumb" id="orde">
                    <?
				  	while(!$tb->EOF)
					{
				  ?>
                    <option value="<? print $tb->fields["numord"]."?".$tb->fields["comret"];?>"><? print $tb->fields["numord"];?></option>
                    <?
					$tb->MoveNext();
					}
				?>
                  </select>
                </div></td>
            </tr>
            <tr>
              <td class="form_label_01"> <div align="left"><strong>Número Nota de Débito:</strong></div></td>
              <td colspan="2"> <div align="left">
  <input name="debito" type="text" class="breadcrumb" id="debito" value="" size="30">
                </div></td>
            </tr>
             <tr>
              <td class="form_label_01"> <div align="left"><strong>Número Nota de Crédito:</strong></div></td>
              <td colspan="2"> <div align="left">
  <input name="credito" type="text" class="breadcrumb" id="credito" value="" size="30">
                </div></td>
            </tr>
            <tr>
              <td class="form_label_01"> <div align="left"><strong>Tipo de Transacción:</strong></div></td>
              <td colspan="2"> <div align="left">
  <input name="tipo" type="text" class="breadcrumb" id="tipo" value="" size="30">
                </div></td>
            </tr>
            <!--
            <tr>
              <td class="form_label_01"><strong>Beneficiario Alterno:</strong></td>
              <td colspan="2">
                <?

#			  	$tb2="select trim(cedrif)||'?'||trim(nomben) as valor, trim(cedrif)||'*'||trim(nomben) as vista from opbenefi order by nomben";
			  ?>
                <select name="ben" class="breadcrumb" id="ben">
                <?
 #               LlenarComboSql($tb2,"valor","vista",'',$bd,'Seleccione un Beneficiario Alterno');
                ?>
                </select>
              </td>
            </tr>
-->
            <tr>
              <td class="form_label_01"> <div align="left"></div></td>
              <td colspan="2"> <div align="left">
                  <p>&nbsp;</p>
                </div></td>
            </tr>
            <tr>
              <td class="form_label_01"> <div align="left"><strong>Generar
                  Correlativo? :</strong></div></td>
              <td colspan="2"> <div align="left">
                  <select name="corr" class="breadcrumb" id="corr">
  <option value="S">Si</option>
                    <option value="N">No</option>


                  </select>
                </div></td>
            </tr>
             <tr>
            	<td class="form_label_01"><strong>Habilitar Actualizacion:</strong></td>
            	<td>
  					<input type="radio" name="actcom" class="breadcrumb" id="actcom" value="NO" onClick="habilitar('NO')" checked/><strong>NO</strong>
  					<input type="radio" name="actcom" class="breadcrumb" id="actcom" value="SI" onClick="habilitar('SI')"/><strong>SI</strong>
            	</td>
            </tr>
            <tr>
           	  <td class="form_label_01"><strong>Fecha Comprobante:</strong></td>
           	  <td><input type="text" class="breadcrumb" name="feccomp" id="feccomp" value="" size="15" maxlength="10" datepicker="true" readonly="true"/></td>
           </tr>
           <tr>
           	  <td class="form_label_01"><strong>Correlativo Comprobante:</strong></td>
           	  <td><input type="text" class="breadcrumb" name="numcomp" id="numcomp" value="" size="20" maxlength="20" readonly="true"/></td>
           </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01"><input name="sqls" type="hidden" id="sqls"></td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
          </table>
        </div>
        <div align="left">&nbsp; </div>
        </fieldset>
        <table width="356"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#EEEEEE">
          <tr>
            <td width="38" rowspan="3" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="258"><img src="../../img/box01_tl.gif" width="6" height="6"></td>
            <td width="60" align="right"><img src="../../img/box01_tr.gif" width="6" height="6"></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input name="Button" type="button" class="form_button01" value="Generar" onClick="enviar()">
              <input name="Button" type="button" class="form_button01" value="   Salir    " onClick="cerrar()"> </td>
          </tr>
          <tr>
            <td><img src="../../img/box01_bl.gif" width="6" height="6"></td>
            <td align="right"><img src="../../img/box01_br.gif" width="6" height="6"></td>
          </tr>
        </table></td>
      <td width="6" align="right" valign="top"><img src="../../img/center01_tr.gif" width="6" height="6"></td>
      <td width="40" rowspan="2" align="center" bgcolor="#EEEEEE">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="bottom" class="cell_left_line02"><img src="../../img/center02_bl.gif" width="6" height="6"></td>
      <td align="right" valign="bottom"><img src="../../img/center01_br.gif" width="6" height="6"></td>
    </tr>
  </table>
</form>
</body>
<script language="javascript">
function enviar()
{
	f=document.form1;
	f.titulo.value="COMPROBANTE DE RETENCION DEL IVA";
	f.action="roprcompret_iva.php";
	var orden = document.getElementById('orde').value.split("?")
	document.getElementById('orde').value=orden[0];
	if(document.getElementById('co').value!='' && orden[1]!='')
	{
		if(confirm('Desea reemplazar el correlativo existente('+orden[1]+') por '+document.getElementById('co').value+'?'))
		{
			f.submit();
		}
	}
	else if(document.getElementById('co').value=='' && document.getElementById('corr').value=='N' && orden[1]=='')
	{
		if(confirm('desea generar correlativo automaticamente?'))
		{
			f.submit();
		}
	}
	else if(document.getElementById('co').value!='' && document.getElementById('corr').value=='S' && orden[1]=='')
	{
		if(confirm('desea reemplazar el correlativo ha generar por '+document.getElementById('co').value+'?'))
		{
			f.submit();
		}
	}
	else if(document.getElementById('co').value=='' && document.getElementById('corr').value=='S' && orden[1]!='')
	{
		alert('no se puede reemplazar el correlativo ha generar por el correlativo ya asignado('+orden[1]+')');
	}
	else
	f.submit();
}
function cerrar()
{
	window.close();
}
function habilitar(val)
{
	if(val=='SI')
	{
		$('feccomp').readOnly=false;
		$('numcomp').readOnly=false;
		$('actcor').disabled=false;
	}else
	{
		$('feccomp').readOnly=true;
		$('numcomp').readOnly=true;
		$('feccomp').value='';
		$('numcomp').value='';
		$('actcor').disabled=true;

	}
}
</script>
</html>
<?
$bd->closed();
?>
