<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>SIGA Reportes</title>
<link href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
<link href="../../lib/css/datepickercontrol.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="../../lib/general/datepickercontrol.js"></script></head>
<body>
<?
require_once("../../lib/bd/basedatosAdo.php");
$bd=new basedatosAdo();
?>
<form name="form1" method="post" action="">
  <table width="760" height="40"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#EEEEEE">
    <tr>
      <td width="190" rowspan="2" bgcolor="#003399" class="cell_left_line02"><img src="../../img/tl_logo_01.gif" width="190" height="40" border="0"></td>
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
          <table width="689"  border="0" align="center" cellspacing="0" bordercolor="#6699CC" class="grid_line01_tl">
            <!--DWLayoutTable-->
            <tr bordercolor="#FFFFFF">
              <td height="24" colspan="4" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>RELACION DE NOMINA PARA BANCO
                      <input name="titulo" type="hidden" id="titulo">
                  </strong></font></div></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td width="168" height="20" class="form_label_01">&nbsp;</td>
              <td width="197">&nbsp;</td>
              <td colspan="2"><font color="#00FFCC">&nbsp; </font></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="25" class="form_label_01"><strong>Tama&ntilde;o Hoja:</strong></td>
              <td> <input name="tamano" type="text" class="breadcrumb" id="tamano" readonly="true"></td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="25" class="form_label_01"><strong>Orientaci&oacute;n:</strong></td>
              <td> <input name="orientacion" type="text" class="breadcrumb" id="orientacion" readonly="true"></td>
              <td colspan="2"> <div align="right"> </div></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="43" class="form_label_01"> <div align="left"><strong>Salida del
                  Reporte:</strong></div></td>
              <td> <div align="left"> </div>
                <div align="left"> <strong>
                  <input name="radiobutton" type="radio" class="breadcrumb" value="radiobutton" checked>
                  PANTALLA</strong></div></td>
              <td colspan="2"> <strong>
                <input name="radiobutton" type="radio" class="breadcrumb" value="radiobutton">
                IMPRESORA</strong></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td height="20" class="form_label_01">&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td height="20" colspan="4" class="form_label_01"> <div align="center"><font color="#000066" size="3"><strong><em>Criterios
                  de Selecci&oacute;n</em></strong></font></div></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="21" bordercolor="#FFFFFF" class="form_label_01">&nbsp;</td>
              <td colspan="2" valign="top"><strong>DESDE</strong></td>
              <td width="314" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
              <!--              <td colspan="2"><strong>HASTA</strong></td>-->
            </tr>
            <tr>
              <td height="25" class="form_label_01"> <div align="left"><strong>Tipo de N&oacute;mina:</strong></div></td>
              <td colspan="2" valign="middle">
                  <?

			  	$tb2=$bd->select("SELECT DISTINCT(CODNOM) AS CODNOM, nomnom
								FROM NPNOMCAL ORDER BY CODNOM ASC");
			  ?>
                  <select name="tipnomdes" class="breadcrumb" id="tipnomdes">
                  <?
				  while(!$tb2->EOF)
				{
			  ?>
                  <option value="<? print $tb2->fields["codnom"];?>"><? print $tb2->fields["codnom"]." - ".$tb2->fields["nomnom"];?></option>
                  <?
				  $tb2->MoveNext();
					}
				?>
                  </select>
			  </td>
              <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
            </tr>

                         <tr>

              <td height="26" class="form_label_01"> <div align="left"><strong>Nomina
                  Especial:</strong></div></td>
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

            <tr>
              <td height="25">&nbsp;</td>
              <td>&nbsp;</td>
              <td width="2">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
<!--            <tr>
              <td height="26" class="form_label_01"> <div align="left"><strong>Nombre del Archivo:</strong></div></td>
              <td valign="middle">
	      <input name="archivo" type="text" class="breadcrumb" id="archivo" value="nomina<? //print strftime('%d_%m_%Y',time());?>.txt" size="50" maxlength="1000">
	    </td>
            </tr>
-->

<!--
            <tr>
              <td height="26" class="form_label_01"> <div align="left"><strong>Formato:</strong></div></td>
            </tr>
            <tr>
              <td height="20">&nbsp;</td>
              <td colspan="3" align="center" valign="middle"><strong>Solo Banco de Venezuela </strong></td>
            </tr>
            <tr>
              <td height="25" valign="middle"><strong>Empresa Remitente:</strong></td>
              <td colspan="3" valign="middle"><input name="nombresolic" id="nombresolic" type="text" class="breadcrumb" size="80"></td>
            </tr>
            <tr>
              <td height="26" valign="middle"><strong>Cta. Empresa Remitente:</strong></td>
              <td colspan="3" valign="middle"><input name="numctasol" id="numctasol" type="text" class="breadcrumb" size="60"></td>
            </tr>
            <tr>
              <td height="21">&nbsp;</td>
              <td colspan="3" align="center" valign="middle"><strong>Solo Casa Propia</strong></td>
            </tr>
            <tr>
              <td height="25" valign="middle"><strong>Tipo:</strong></td>
              <td colspan="3" valign="middle">
			  <select name="tipo" id="tipo" class="breadcrumb">
                <option>0</option>
                <option>1</option>
              </select>              </td>
            </tr>
-->
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
	f.titulo.value="RELACION DE NOMINA PARA BANCO";
	f.action="rrelnomban.php";
	f.submit();
}
function cerrar()
{
	window.close();
}
function catalogo1()
{
 	pagina="catalogoform.php?campo=codpre1&sql=select codpre as campo1 from cpimpcom order by codpre asc";
	window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=300,height=200,rezizable=yes, left=100,top=100");
}
function catalogo2()
{
 	pagina="catalogoform.php?campo=codpre2&sql=select codpre as campo1 from cpimpcom order by codpre desc";
	window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=300,height=200,rezizable=yes, left=100,top=100");
}
</script>
</html>
