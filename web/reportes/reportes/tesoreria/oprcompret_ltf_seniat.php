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
/*
function LlenarTextoSql($sql,$campo1,$con)
  {
     $tb=$con->select($sql);
	 if (!$tb->EOF)
	 {
	   print $tb->fields[$campo1];
	 }
	 else
	 {
	   print "";
	 }
  }
  */
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
                  DE RETENCION DE LEY DE TIMBRE FISCAL(SENIAT)
                  <input name="titulo" type="hidden" id="titulo">
                  </strong></font></div></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01">&nbsp;</td>
              <td>&nbsp;</td>
              <td><font color="#00FFCC">&nbsp; </font></td>
            </tr>
            <tr bordercolor="#6699CC">

              <td width="221" class="form_label_01"><strong>Tama&ntilde;o Hoja:</strong></td>
              <td width="120"> <input name="tamano" type="text" class="breadcrumb" id="tamano" readonly="true"></td>
              <td width="323">&nbsp;</td>
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
            <?php
                	$tb=$bd->select("SELECT nomemp as nomageret,diremp as dirageret,'G20000239-5' as rifageret from empresa");
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
              <td class="form_label_01"> <div align="left">
                  <p><strong>Fecha Entrega:</strong></p>
                </div></td>
              <td colspan="2"> <div align="left"><strong>
                  <input name="fechaentrega" type="text" class="breadcrumb" id="fechaentrega" value="<?print date('d/m/Y');?>" size="20" datepicker="true">
                  </strong> </div></td>
            </tr>
              <td class="form_label_01"><strong>Nro de Orden: </strong></td>

              <td>
              <?
               if ($_GET["orde"]==""){
                $sql="SELECT min(a.numord) as valor from opfactur a, opordpag b, opretord c, tsrepret d where a.numord=b.numord and b.numord=c.numord  and	c.codtip=d.codret";
                 $tb=$bd->select($sql);
                 $orden=$tb->fields["valor"];
                }
               else if ($_GET["orde"]<>""){
               	 $orden=$_GET["orde"];}
              ?>
              <input name="orde" type="text"  value="<? print $orden?>" class="breadcrumb" id="orde" size="15" maxlength="50">
              <input type="button" name="Button1" value="..." onClick="catalogo1('orde');">
              </td>
              </tr>
<tr>
              <td class="form_label_01"><strong>Beneficiario Alterno:</strong></td>
              <td colspan="2">
                <?

			  	$tb2="select cedrif as valor, trim(cedrif)||'*'||trim(nomben) as vista from opbenefi order by nomben";
			  ?>
                <select name="ben" class="breadcrumb" id="ben">
                <?
                LlenarComboSql($tb2,"valor","vista",'',$bd,'Seleccione un Beneficiario Alterno');
                ?>
                </select>
              </td>
            </tr>
            <tr>
              <td height="35" class="form_label_01">
                <div align="left"><strong>Sobreescribir
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
            <tr>
              <td height="35" class="form_label_01">
                <div align="left"><strong>Actualizar Correlativo:</strong></div></td>
              <td> <div align="left">
                  <select name="actcor" class="breadcrumb" id="actcor" disabled=true>
                    <option value="n" selected>No</option>
                    <option value="s">Si</option>
                  </select>
                </div></td>
              <td</td>
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
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01"><input name="sqls" type="hidden" id="sqls">
              </td>
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
	if($('feccomp').value!='' || $('numcomp').value!='')
	{
		if(confirm('Seguro desea Actualizar la informacion referente al Comprobante'))
		{
			f=document.form1;
			f.titulo.value="COMPROBANTE DE RETENCION LTF";
			f.action="roprcompret_ltf_seniat.php";
			f.submit();
		}
	}
	else
	{
		f=document.form1;
		f.titulo.value="COMPROBANTE DE RETENCION LTF";
		f.action="roprcompret_ltf_seniat.php";
		f.submit();
	}

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
function cerrar()
{
	window.close();
}
function catalogo1(campo)
{
 	pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=SELECT distinct(a.numord) as Numero, a.fecfac as Fecha from opfactur a, opordpag b, opretord c, tsrepret d where a.numord=b.numord and b.numord=c.numord and a.monltf>0 and c.codtip=d.codret order by a.numord";
	window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,rezizable=yes, left=50,top=50");
}
function catalogo2(campo)
{
 	mysql='select rtrim(cedrif) as cedrif, rtrim(nomben) as nomben from opbenefi order by cedrif';
    pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
}

</script>
</html>
