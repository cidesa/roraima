
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>SIGA Reportes</title>
<link  href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
<link  href="../../lib/css/datepickercontrol.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="../../lib/general/datepickercontrol.js"></script>
<script language="JavaScript" src="../../lib/general/fecha.js"></script>
<style type="text/css">
<!--
.style1 {color: #0000CC}
-->
</style>
</head>
<body>
<?
require_once("../../lib/bd/basedatosAdo.php");
$bd=new basedatosAdo();
?>
<?
  $tb10=$bd->select("SELECT DISTINCT(CODCTA) FROM CONTABB ORDER BY CODCTA");
	if (!$tb10->EOF)
		{
		 $auxnivel=$tb10->fields["nrorup"];
		 $auxnive2=$tb10->fields["nrorup"];
		 }

?>

<form name="form1" method="post" action="">
  <table width="760" height="40"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#EEEEEE">
    <tr>
      <td width="190" rowspan="2" bgcolor="#003399" class="cell_left_line02"><img src="../../img/tl_logo_01.gif" width="190" height="40" border="0"></a></td>
      <td colspan="2" class="cell_date"><div align="right" class="style1">
          	  <script type="text/javascript" language="JavaScript">
		<!--
				document.write (displayDate());//-->
		      </script>
          </div></td>
    </tr>
    <tr>
      <td width="313">&nbsp; </td>
      <td width="257" align="right" valign="middle" class="cell_logout">&nbsp;</td>
    </tr>
  </table>
  <table width="738"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td width="7" align="left" valign="top" class="cell_left_line02"><img src="../../img/center02_tl.gif" width="6" height="6"></td>
      <td width="694" rowspan="2" valign="top" class="cell_padding_01"> <p class="breadcrumb">Reportes
        </p>
        <fieldset>

        <div align="left">&nbsp;
          <table width="548" align="center" cellspacing="0" bordercolor="#6699CC" class="grid_line01_tl">
            <tr bordercolor="#FFFFFF">
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>Estado de Resultado
                      <input name="titulo" type="hidden" id="titulo">
</strong></font></div></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01">&nbsp;</td>
              <td>&nbsp;</td>
              <td><font color="#00FFCC">&nbsp; </font></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td width="141" class="form_label_01"><strong>Tama&ntilde;o Hoja:</strong></td>
              <td width="165"> <input name="tamano" type="text" class="breadcrumb" id="tamano" readonly="true"></td>
              <td width="243">&nbsp;</td>
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
              <td class="form_label_01">
                <div align="left"><strong>C&oacute;digo de Cuenta:</strong></div></td>
              <td>
                <div align="left">
                  <?
				$tb=$bd->select("SELECT DISTINCT(CODCTA) FROM CONTABB WHERE CODCTA>='5' AND CODCTA<'7' ORDER BY CODCTA");
				print $tb->GetMenu('codcta1','5',true,false,0,'class=breadcrumb');
				?>
              </div></td>
              <td>
                <div align="left">
				<?
   			    $tb2=$bd->select("SELECT DISTINCT(CODCTA) FROM CONTABB WHERE CODCTA>='5' AND CODCTA<='7' ORDER BY CODCTA DESC");
				print $tb2->GetMenu('codcta2','6-4-3-99-01-01-001',true,false,0,'class=breadcrumb');
				?>
				</div></td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>Peri&oacute;do:</strong></td>
              <td>
				<?
   			    $tb3=$bd->select("SELECT DISTINCT B.PEREJE FROM CONTABA A, CONTABA1 B WHERE A.FECINI = B.FECINI AND A.FECCIE = B.FECCIE ORDER BY B.PEREJE");
				print $tb3->GetMenu('periodo','01',true,false,0,'class=breadcrumb');

				?>

			  </td>
              <td>&nbsp;
			  </td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>Niveles:</strong></td>
              <td>
			  <?
				  $tb10=$bd->select("SELECT numrup as nrorup FROM CONTABA");
					if (!$tb10->EOF)
						{
						 $auxnivel=$tb10->fields["nrorup"];
						 $auxnive2=$tb10->fields["nrorup"];
						 }

			  ?>
			  <input name="auxnivel" type="text" class="breadcrumb" id="auxnivel" size="8" maxlength="10" value="<? print $auxnivel; ?>">
			  <font color="#000066" size="4"><strong>
			  <input name="nrorup" type="hidden" id="nrorup" value="<? print $auxnive2; ?>">
			  </strong></font></td>
              <td>&nbsp;</td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01"><strong>Niveles Totales:</strong></td>
              <td colspan="2">
                  <? $tb=$bd->select("SELECT numrup as nrorup FROM CONTABA");
	                  $auxnive2=$tb->fields["nrorup"];
	               ?>

                <input name="auxnivel2" type="text" class="breadcrumb" id="auxnivel2" size="3" maxlength="3" value="<? echo $tb->fields['nrorup'] ?>">
                <font color="#000066" size="4"><strong>
                <input name="nrorup2" type="hidden" id="nrorup2" value="<? print $auxnive2; ?>">
              </strong></font></td>
            </tr>

            <tr bordercolor="#FFFFFF">
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"> <div align="left"><strong>Filtro:</strong></div></td>
              <td colspan="2"> <div align="left"></div>
                <div align="left">
                  <input name="comodin" type="text" class="breadcrumb" id="comodin" value="%%" size="75">
                  <input name="sqls" type="hidden" id="sqls">
                </div></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td colspan="3" class="form_label_01">Este ejemplo listara, todo
                los codigos que en su sexto nivel contengan 401 y en el d&eacute;cimo
                un 002</td>
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
      <td width="31" rowspan="2" align="center" bgcolor="#EEEEEE">&nbsp;</td>
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
	f.titulo.value="Estado de Resultado";
	f.action="rConEdoRes.php";
	f.submit();
}
function cerrar()
{
	window.close();
}
</script>
</html>
