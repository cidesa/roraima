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
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>CONSOLIDADO DE EJECUCION
                      POR MOVIMIENTO
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
              <td height="26" valign="top" class="form_label_01"><strong>Per&iacute;odo :</strong></td>
              <td valign="top">
				  <?
				  $tb1=$bd->select("SELECT DISTINCT (pereje)  FROM CPPEREJE ORDER BY pereje asc");
				  ?>
				  <select name="perdesde" class="breadcrumb" id="perdesde">
				  <?
				  while(!$tb1->EOF)
				  {
					?>
					<option value="<? print $tb1->fields["pereje"];?>"><? print $tb1->fields["pereje"];?></option>
					<?
					$tb1->MoveNext();
				  }
				  ?>
              </select>			  </td>
              <td valign="top">

			  <?
			  $tb4=$bd->select("SELECT DISTINCT (pereje)  FROM cppereje ORDER BY pereje DESC");
			  ?>
              <select name="perhasta" class="breadcrumb" id="perhasta">
			  <?
			  while(!$tb4->EOF)
			  {
			  	?>
				<option value="<? print $tb4->fields["pereje"];?>"><? print $tb4->fields["pereje"];?></option>
				<?
				$tb4->MoveNext();
			  }
			  ?>
              </select>              </td>
              <td></td>
            </tr>
            <tr bordercolor="#6699CC">
                 <td class="form_label_01">
                <div align="left"><strong>C&oacute;digo Presupuestario Desde:</strong></div></td>
              <td colspan=]"2">
                <div align="left">
                  <?
			  	$tb=$bd->select("select min(codpre) as valor from cpimpcau");
			  ?>
			  	<input size="40" type="text" name="codpredesde" class="breadcrumb" id="codpredesde" value="<? print $tb->fields["valor"];?>"
				<input type="button" name="Button" value="..." onclick="catalogo2('codpredesde')"/>

              </div></td>
              </tr>
              <tr>
              <td class="form_label_01">
                <div align="left"><strong>C&oacute;digo Presupuestario Hasta:</strong></div></td>
              <td colspan="2">
                <div align="left">
                       <?
			  	$tb=$bd->select("select max(codpre) as valor from cpimpcau");
			  ?>
			  	<input size="40" type="text" name="codprehasta" class="breadcrumb" id="codprehasta" value="<? print $tb->fields["valor"];?>"
				<input type="button" name="Button" value="..." onclick="catalogo2('codprehasta')"/>
              </div></td>
            </tr>
           <tr bordercolor="#6699CC">
              <td class="form_label_01"> <strong>Filtro:</strong></td>
              <td colspan="2">

                  <input name="comodin" type="text" class="breadcrumb" id="comodin" value="%%" size="70">
                  <input name="sqls" type="hidden" id="sqls">               </td>
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
	f.titulo.value="Consolidado de Ejecucion por Movimiento";
	f.action="rpreconeje.php";
	f.submit();
}
function cerrar()
{
	window.close();
}
function catalogo2(campo)
{
    pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=select distinct(a.codpre) as codpre, b.nompre as nompre from cpimpcau a, cpdeftit b where a.codpre=b.codpre order by codpre";
	window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
}

</script>
<? $bd->closed();?>
</html>
