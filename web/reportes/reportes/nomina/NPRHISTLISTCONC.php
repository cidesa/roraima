<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>SIGA Reportes</title>
<link  href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
<link  href="../../lib/css/datepickercontrol.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="../../lib/general/datepickercontrol.js"></script>
<script language="JavaScript" src="../../lib/general/fecha.js"></script>
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
          <table width="612"  border="0" align="center" cellspacing="0" bordercolor="#6699CC" class="grid_line01_tl">
            <tr bordercolor="#FFFFFF">
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>LISTADO
                  DE CONCEPTOS HISTORICOS
                  <input name="titulo" type="hidden" id="titulo">
                  </strong></font></div></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01">&nbsp;</td>
              <td>&nbsp;</td>
              <td><font color="#00FFCC">&nbsp; </font></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td width="192" class="form_label_01"><strong>Tama&ntilde;o Hoja:</strong></td>
              <td width="168"> <input name="tamano" type="text" class="breadcrumb" id="tamano" readonly="true"></td>
              <td width="238">&nbsp;</td>
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
              <td height="23" bordercolor="#FFFFFF" class="form_label_01">&nbsp;</td>
              <td><strong>DESDE</strong></td>
              <td><strong>HASTA</strong></td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>Tipo de Concepto:</strong></td>
              <td> <select name="pf_10" class="breadcrumb" id="pf_10">
                  <option value="t">Todos</option>
                  <option value="A">Asignaciones</option>
                  <option value="D">Deducciones</option>
                  <option value="P">Aportes</option>
                </select></td>
              <td>&nbsp;</td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>C&oacute;digo Empleado:</strong></td>
              <td>
                <?

			  	$tb=$bd->select("SELECT DISTINCT(CODEMP) as cod FROM NPHISCON order by codemp");
			  ?>
                <select name="codempdes" class="breadcrumb" id="codempdes">
                  <?
				  	while(!$tb->EOF)
					{
				  ?>
                  <option value="<? print $tb->fields["cod"];?>"><? print $tb->fields["cod"];?></option>
                  <?
										$tb->MoveNext();
					}

				?>
                </select></td>
              <td>
                <?

			  	$tb=$bd->select("SELECT DISTINCT(CODEMP) as cod FROM NPHISCON order by codemp DESC");
			  ?>
                <select name="codemphas" class="breadcrumb" id="codemphas">
                  <?
				  	while(!$tb->EOF)
					{
				  ?>
                  <option value="<? print $tb->fields["cod"];?>"><? print $tb->fields["cod"];?></option>
                  <?
				  	$tb->MoveNext();
					}
				?>
                </select></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Cargo:</strong></td>
             <td height="30">
                <?

			  	$tb=$bd->select("SELECT DISTINCT(CODCAR) as codc FROM NPHISCON order by codcar");
			  ?>
                <select name="codcardes" class="breadcrumb" id="codcardes">
                  <?
				  	while(!$tb->EOF)
					{
				  ?>
                  <option value="<? print $tb->fields["codc"];?>"><? print $tb->fields["codc"];?></option>
                  <?
										$tb->MoveNext();
					}

				?>
                </select></td>
            <td>
                <?

			  	$tb=$bd->select("SELECT DISTINCT(CODCAR) as codc FROM NPHISCON order by codcar DESC");
			  ?>
                <select name="codcarhas" class="breadcrumb" id="codcarhas">
                  <?
				  	while(!$tb->EOF)
					{
				  ?>
                  <option value="<? print $tb->fields["codc"];?>"><? print $tb->fields["codc"];?></option>
                  <?
										$tb->MoveNext();
					}

				?>
                </select></td>
            </tr>
              <tr>
              <td class="form_label_01"><div align="left"><strong>C&oacute;digo
                Concepto:</strong></div></td>
              <td><div align="left">
                <?
                $tb=$bd->select("SELECT min(CODCON) as codcon FROM NPHISCON");
				if(!$tb->EOF)
				{
					$codcon=$tb->fields["codcon"];
				}

				$tb2=$bd->select("SELECT max(CODCON) as codcon FROM NPHISCON");
				if(!$tb2->EOF)
				{
						$codcon2=$tb2->fields["codcon"];
				}

				?>
              	<input name="codcondes" type="text"  value="<? print $codcon;?>" class="breadcrumb" id="codcondes" size="20" maxlength="50">
                <input type="button" name="Button3" value="..." onClick="catalogo2('codcondes');">

              </div></td>
              <td>
              	<input name="codconhas" type="text"  value="<? print $codcon2; ?>" class="breadcrumb" id="codconhas" size="20" maxlength="50">
                <input type="button" name="Button3" value="..." onClick="catalogo2('codconhas');">


              </td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="23" class="form_label_01"><strong>Fecha Emisi&oacute;n:</strong></td>
              <td> <div align="left"> </div>
                <div align="left">
                  <?

			  	$tb=$bd->select("SELECT to_char(MIN(fecnom),'DD/MM/YYYY') as fecha FROM nphiscon");
				if(!$tb->EOF)
				{
					$fecini=$tb->fields["fecha"];
				}

			  	$tb2=$bd->select("SELECT to_char(MAX(fecnom),'DD/MM/YYYY') as fecha FROM nphiscon");
				if(!$tb2->EOF)
				{
					$fecdes=$tb2->fields["fecha"];
				}

				?>
                  <input name="fecreg1" type="text" class="breadcrumb" id="fecreg1" datepicker="true" value="<? print $fecini;?>">
                </div></td>
              <td><input name="fecreg2" type="text" class="breadcrumb" id="fecreg2" datepicker="true" value="<? print $fecdes;?>"></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>N&oacute;mina:</strong></td>
              <td>
                <?

			  	$tb=$bd->select("SELECT DISTINCT(CODNOM) as codn FROM NPHISCON");
			  ?>
                <select name="codnom" class="breadcrumb" id="codnom">
                  <?
				  	while(!$tb->EOF)
					{
				  ?>
                  <option value="<? print $tb->fields["codn"];?>"><? print $tb->fields["codn"];?></option>
                  <?
										$tb->MoveNext();
					}

				?>
                </select></td>
              <td>&nbsp; </td>
            </tr>
            <tr>
              <td height="26" class="form_label_01"> <div align="left"><strong>Nomina
                  Especial: </strong></div></td>
              <td colspan="2" valign="middle"> <select name="especial" class="breadcrumb" id="especial">
                  <option value="N" selected="selected">No</option>
                  <option value="S">Si</option>
                </select></td>
			</tr>
		  <tr>
              <td class="form_label_01"><strong>Tipo de Nomina Especial :</strong></td>
              <td colspan="2">
                  <select name="tipnomesp" class="breadcrumb" id="tipnomesp">
                    <?
                    $tb2=$bd->select("SELECT distinct(a.CODNOMESP),upper(a.DESNOMESP) as nombre FROM npnomesptipos a order by a.CODNOMESP");
                      while(!$tb2->EOF)
                    {
                  ?>
                    <option value="<? print $tb2->fields["codnomesp"];?>"><? print $tb2->fields["codnomesp"].' - '.$tb2->fields["nombre"];?></option>
                    <?
                          $tb2->MoveNext();
                    }
                  ?>
                </select></td>
            </tr>

            <tr bordercolor="#6699CC">
              <td class="form_label_01">&nbsp;</td>
              <td>&nbsp; </td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2"><input name="sqls" type="hidden" id="sqls"></td>
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
      <td align="right" valign="bottom"><img src="../../img/center01_br.gif" width="8" height="30"></td>
    </tr>
  </table>
</form>
</body>
<script language="javascript">
function enviar()
{
	f=document.form1;
	f.titulo.value="LISTADO POR CONCEPTOS";
	f.action="rNPRHISTLISTCONC.php";
	f.submit();
}
function cerrar()
{
//	 f= document.form1;
//	 alert(f.codubi.value);
window.close();
}
function catalogo1()
{
 	pagina="catalogoform.php?campo=codpre1&sql=select codpre as campo1 from cpimpcom order by codpre asc";
	window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=300,height=200,rezizable=yes, left=100,top=100");
}
function catalogo2(campo)
{
 	mysql='SELECT DISTINCT CODCON,NOMCON FROM NPHISCON ORDER BY CODCON';
    pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
}

</script>
</html>
