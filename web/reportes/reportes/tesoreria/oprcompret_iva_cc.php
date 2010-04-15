<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>SIGA Reportes</title>
<link href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
<link href="../../lib/css/datepickercontrol.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="../../lib/general/datepickercontrol.js"></script>
</head>
<body>
<?
require_once("../../lib/bd/basedatosAdo.php");
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
          <table width="676"  border="0" align="center" cellspacing="0" bordercolor="#6699CC" class="grid_line01_tl">
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
              <td width="205" class="form_label_01"><strong>Tama&ntilde;o Hoja:</strong></td>
              <td width="141"> <input name="tamano" type="text" class="breadcrumb" id="tamano" readonly="true"></td>
              <td width="319">&nbsp;</td>
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
            <tr> 
              <td class="form_label_01"> <div align="left"> 
                  <p><strong>Agente </strong> <strong>de Retenci&oacute;n:</strong></p>
                </div></td>
              <td colspan="2"> <div align="left"><strong> 
                  <input name="ag" type="text" class="breadcrumb" id="ag" value="" size="89">
                  </strong> </div></td>
            </tr>
            <tr> 
              <td class="form_label_01"> <div align="left"><strong>RIF Agente 
                  </strong> <strong>de Retenci&oacute;n</strong><strong>:</strong></div></td>
              <td colspan="2"> <div align="left"><strong> 
                  <input name="rif" type="text" class="breadcrumb" id="rif" value="" size="40">
                  </strong> </div></td>
            </tr>
            <tr> 
              <td class="form_label_01"> <div align="left"><strong>Direcci&oacute;n 
                  Agente </strong> <strong>de Retenci&oacute;n</strong><strong> 
                  :</strong></div></td>
              <td colspan="2"> <div align="left"><strong> 
                  <input name="dire" type="text" class="breadcrumb" id="dire" value="" size="89">
                  </strong> </div></td>
            </tr>
            <tr> 
              <td class="form_label_01"> <div align="left"><strong>Numero de Orden:</strong></div></td>
              <td colspan="2"> <div align="left"> 
                  <?

			  	$tb=$bd->select("SELECT distinct(a.numord)
								from opfactur a, opordpag b, opretord c, tsrepret d
								where
								a.numord=b.numord and
								b.numord=c.numord and
								d.codrep='001' and
								c.codtip=d.codret
								order by a.numord");
			  ?>
                  <select name="orde" class="breadcrumb" id="orde">
                    <?
				  	while(!$tb->EOF)
					{
				  ?>
                    <option value="<? print $tb->fields["numord"];?>"><? print $tb->fields["numord"];?></option>
                    <?
					$tb->MoveNext();
					}
				?>
                  </select>
                </div></td>
            </tr>
            <tr> 
              <td class="form_label_01"><strong>Beneficiario Alterno:</strong></td>
              <td colspan="2"> 
                <?

			  	$tb2=$bd->select("select rtrim(cedrif) as cedrif, rtrim(nomben) as nomben from opbenefi
								order by nomben");
			  ?>
                <select name="ben" class="breadcrumb" id="ben">
				 <option VALUE=""> </option>
                  <?
				  	while(!$tb2->EOF)
					{

				  ?>
                  <option value="<? print strtoupper($tb2->fields["cedrif"])."?".strtoupper($tb2->fields["nomben"]);?>"><strong><? print strtoupper(str_pad($tb2->fields["cedrif"],15," ",STR_PAD_RIGHT))."*    ".strtoupper(substr($tb2->fields["nomben"],0,100));?></strong></option>
                  <?
					$tb2->MoveNext();
					}
				?>
                </select> </td>
            </tr>
            <tr> 
              <td class="form_label_01"> <div align="left"></div></td>
              <td colspan="2"> <div align="left"> 
                  <p>&nbsp;</p>
                </div></td>
            </tr>
            <tr> 
              <td class="form_label_01"> <div align="left"><strong>Sobreescribir 
                  Correlativo? :</strong></div></td>
              <td> <div align="left"> 
                  <select name="corr" class="breadcrumb" id="corr">
                    <option value="n">No</option>
                    <option value="s">Si</option>
                  </select>
                </div></td>
              <td><font color="#FF0000" size="-4"><strong>La opci&oacute;n por 
                defecto &quot;NO&quot;, generara un correlativo solo en caso de 
                que no se haya emitido anteriormente un correlativo para la orden.</strong></font></td>
            </tr>
            <tr bordercolor="#FFFFFF"> 
              <td class="form_label_01"><input name="sqls" type="hidden" id="sqls"></td>
              <td colspan="2">&nbsp;</td>
            </tr>
           <tr> 
              <td class="form_label_01"> <div align="left"><strong>Correlativo 
                  para Ordenes de Semestre Complementario: </strong> </div></td>
              <td> <div align="left"><strong> 
                  <input name="cor" type="text" class="breadcrumb" id="cor" value="" size="20">
                  </strong> </div></td>
              <td><font color="#FF0000" size="-4"><strong>Si desea incluir un 
                n&uacute;mero que no pertenece a la secuencia este modificara 
                el numero del comprobante de la Orden de Pago seleccionada. Dejar 
                en blanco si desea que el correlativo se genere automaticamente.</strong></font></td>
              <td width="8"><font color="#FF0000" size="-4" align="left"><strong> 
                </strong></font></td>
            </tr>
            <tr bordercolor="#FFFFFF"> 
              <td class="form_label_01"><input name="sqls" type="hidden" id="sqls"></td>
              <td colspan="2">&nbsp;</td>
            </tr>
			  <tr bordercolor="#FFFFFF"> 
              <td class="form_label_01"><input name="sqls" type="hidden" id="sqls"></td>
              <td colspan="2">&nbsp;</td>
            </tr>
			<tr> 
              <td class="form_label_01"> <div align="left"><strong>Contralor(a): </strong> </div></td>
              <td> <div align="left"><strong> 
                  <input name="cont" type="text" class="breadcrumb" id="cont" value="" size="60">
                  </strong> </div></td>
             
            </tr>
            <tr bordercolor="#FFFFFF"> 
              <td class="form_label_01"><input name="sqls" type="hidden" id="sqls"></td>
              <td colspan="2">&nbsp;</td>
            </tr>
			<tr> 
              <td class="form_label_01"> <div align="left"><strong>Director(a) de Administraci&oacute;n y Finanzas: </strong> </div></td>
              <td> <div align="left"><strong> 
                  <input name="diradm" type="text" class="breadcrumb" id="diradm" value="" size="60">
                  </strong> </div></td>
             
            </tr>
          <!--   <tr bordercolor="#FFFFFF">
              <td class="form_label_01"> <div align="left"><strong>Fecha para 
                  el Comprobante de Retenci&oacute;n:</strong></div></td>
              <td> <div align="left"><strong> 
						<input name="fec" class="breadcrumb" id="fec" value="" size="12" maxlength="12" datepicker="true">
    							</input>
			  
                  </strong> </div></td>
              <td><font color="#FF0000" size="-4"><strong>Colocar fecha en la 
                casilla si desea trasladar el comprobante a otro periodo. Dejar 
                en blanco si desea que la fecha se genere automaticamente.</strong></font></td>
            </tr>-->
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
	f.action="roprcompret_iva_cc.php";
	f.submit();
}
function cerrar()
{
	window.close();
}

</script>
</html>
<?
$bd->closed();
?>
