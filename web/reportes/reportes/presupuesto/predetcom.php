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
<form name="form1" method="post" action="rpredetcom.php">
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
          <table width="612" align="center" cellspacing="0" bordercolor="#6699CC" class="grid_line01_tl">
            <!--DWLayoutTable-->
            <tr>
              <td width="179" height="10"></td>
              <td width="160"></td>
              <td width="252"></td>
              <td width="4"></td>
            </tr>
            <!--DWLayoutTable-->
            <tr bordercolor="#FFFFFF">
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>DETALLE DE COMPROMISOS A LA FECHA
                      <input name="titulo" type="hidden" id="titulo">
</strong></font></div></td>
              <td></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td height="15"></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td height="25" valign="top" class="form_label_01"> <div align="left"><strong>Salida del
              Reporte:</strong></div></td>
              <td valign="top"> <div align="left"> </div>                <div align="left"> <strong>
                  <input name="radiobutton" type="radio" class="breadcrumb" value="radiobutton" checked>
              PANTALLA</strong></div></td>
              <td valign="top"> <strong>
                <input name="radiobutton" type="radio" class="breadcrumb" value="radiobutton">
              IMPRESORA</strong></td>
              <td></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="20" colspan="3" valign="top" class="form_label_01"> <div align="center"><font color="#000066" size="3"><strong><em>Criterios
              de Selecci&oacute;n</em></strong></font></div></td>
              <td></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="20"></td>
              <td valign="top"><strong>DESDE</strong></td>
              <td valign="top"><strong>HASTA</strong></td>
              <td></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="26" valign="top" class="form_label_01"><strong>N&ordm; del Compromiso:</strong></td>
              <td valign="top">
			  <?
			  $tb1=$bd->select("SELECT MIN(refcom) as refcom FROM cpcompro");
			  ?>
			  <select name="numcomp1" class="breadcrumb" id="numcomp1">
			  <?
			  //while(!$tb1->EOF)
			  //{
			  	?>
				<option value="<? print $tb1->fields["refcom"];?>"><? print $tb1->fields["refcom"];?></option>
				<?
				//$tb1->MoveNext();
			  //}
			  ?>
              </select> </td>
              <td valign="top"><font color="#00FFCC">
			  <?
			  $tb2=$bd->select("SELECT MAX( refcom ) AS refcom FROM cpcompro");
			  ?>
              <select name="numcomp2" class="breadcrumb" id="numcomp2">
			  <?
			  //while(!$tb2->EOF)
			  //{
			  	?>
				<option value="<? print $tb2->fields["refcom"];?>"><? print $tb2->fields["refcom"];?></option>
				<?
				//$tb2->MoveNext();
			  //}
			  ?>
              </select>
              </font></td>
              <td></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="26" valign="top" class="form_label_01"><strong>Fecha del Compromiso :</strong></td>
              <td valign="top">
			  <?
			  $tb3=$bd->select("SELECT MIN(feccom) as fec, to_char(MIN(feccom),'dd/mm/yyyy') as feccom FROM cpcompro");
//			  $tb3=$bd->select("SELECT MIN(feccom) as feccom FROM cpcompro");
			  ?>
			  <select name="fechcomp1" class="breadcrumb" id="fechcomp1">
			  <?
			  //while(!$tb3->EOF)
			  //{
			  	?>
				<option value="<? print $tb3->fields["feccom"];?>"><? print $tb3->fields["feccom"];?></option>
				<?
				//$tb3->MoveNext();
			  //}
			  ?>
              </select> </td>
              <td valign="top">
              <div align="left">
			  <?
			  $tb4=$bd->select("SELECT DISTINCT (feccom) as fec, to_char((feccom), 'dd/mm/yyyy') as feccom FROM cpcompro ORDER BY feccom DESC");
			  ?>
              <select name="fechcomp2" class="breadcrumb" id="fechcomp2">
			  <?
			  while(!$tb4->EOF)
			  {
			  	?>
				<option value="<? print $tb4->fields["feccom"];?>"><? print $tb4->fields["feccom"];?></option>
				<?
				$tb4->MoveNext();
			  }
			  ?>
              </select>
              </div></td>
              <td></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="28" valign="top" bordercolor="#FFFFFF" class="form_label_01"> <div align="left"><strong>Tipo de Compromiso:</strong></div></td>
              <td valign="top"> <div align="left">
			    <?
			  	$tb5=$bd->select("SELECT DISTINCT(tipcom) as tipcom, nomabr FROM cpdoccom ORDER BY tipcom ASC");
			  ?>
                  <select name="tipcomp1" class="breadcrumb" id="tipcomp1">
                  <?
				  	while(!$tb5->EOF)
					{
				  ?>
                    <option value="<? print $tb5->fields["tipcom"];?>"><? print $tb5->fields["nomabr"];?></option>
                    <?
					$tb5->MoveNext();
					}
				?>
                  </select>
              </div></td>
              <td valign="top"> <div align="left">
			   <?
			  	$tb6=$bd->select("SELECT DISTINCT(tipcom), nomabr FROM cpdoccom ORDER BY tipcom DESC");
			  ?>
                  <select name="tipcomp2" class="breadcrumb" id="tipcomp2">
                    <?
				  	while(!$tb6->EOF)
					{
				  ?>
                    <option value="<? print $tb6->fields["tipcom"];?>"><? print $tb6->fields["nomabr"];?></option>
                    <?
					$tb6->MoveNext();
					}
				?>
                  </select>

              </div></td>
              <td></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="28" valign="top"><strong class="form_label_01">Status:</strong></td>
              <td valign="top">
			  <?
			  $tb7=$bd->select("SELECT DISTINCT(stacom), case when stacom='A' then 'Activo' else 'Anulado' end FROM cpcompro");
			  ?>
			  <select name="status" class="breadcrumb" id="status">
			  <?
			  while(!$tb7->EOF)
			  {
			  	?>
				<option value="<? print $tb7->fields["stacom"];?>"><? print $tb7->fields["case"];?></option>
				<?
				$tb7->MoveNext();
			  }
			  ?>
              </select></td>
              <td>&nbsp;</td>
              <td></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="32" valign="top" class="form_label_01"><strong>C&oacute;digo Presupuestario:</strong></td>
              <td valign="top">
			  <?
			  $tb8=$bd->select("SELECT MIN(codpre) as codpre FROM cpimpcom ORDER BY codpre ASC");
			  ?>
			  <select name="codpresu1" class="breadcrumb" id="codpresu1">
			  <?
			  //while(!$tb8->EOF)
			  //{
			  	?>
				<option value="<? print $tb8->fields["codpre"];?>"><? print $tb8->fields["codpre"];?></option>
				<?
				//$tb8->MoveNext();
			  //}
			  ?>
			  </select>
              </td>
              <td valign="top">
			  <?
			  $tb9=$bd->select("SELECT MAX(codpre) as codpre  FROM cpimpcom ORDER BY codpre DESC");
			  ?>
			  <select name="codpresu2" class="breadcrumb" id="codpresu2">
			  <?
			  //while(!$tb9->EOF)
			  //{
			  	?>
				<option value="<? print $tb9->fields["codpre"];?>"><? print $tb9->fields["codpre"];?></option>
				<?
				//$tb9->MoveNext();
			  //}
			  ?>
              </select></td>
              <td></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"> <div align="left"><strong>Filtro:</strong></div></td>
              <td colspan="2"> <div align="left"></div>
                <div align="left">
                  <input name="comodin" type="text" class="breadcrumb" id="comodin" value="%" size="75">
                  <input name="sqls" type="hidden" id="sqls">
                </div></td>
              <td></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td colspan="3" class="form_label_01">Orientaci&oacute;n del Reporte: Carta/Horizontal </td>
              <td></td>
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
	f.titulo.value=" DETALLE DE COMPROMISOS A LA FECHA	";
	f.action="rpredetcom.php";
	f.submit();
}
function cerrar()
{
	window.close();
}
function catalogo1()
{
 	pagina="catalogoform.php?campo=codpre1&sql=select codpre as campo1 from cpimpcau order by codpre asc";
	window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=300,height=200,rezizable=yes, left=100,top=100");
}
function catalogo2()
{
 	pagina="catalogoform.php?campo=codpre2&sql=select codpre as campo1 from cpimpcau order by codpre desc";
	window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=300,height=200,rezizable=yes, left=100,top=100");
}
</script>
</html>
