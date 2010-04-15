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
#$bd->validar();
?>
<form name="form1" method="post" action="rtsrvoucher.php">
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
          <table width="612" align="center" cellpadding="0" cellspacing="0" bordercolor="#6699CC" class="grid_line01_tl">
            <!--DWLayoutTable-->
            <tr>
              <td width="190" height="10"></td>
              <td width="200"></td>
              <td width="209"></td>
              <td width="3"></td>
            </tr>
            <!--DWLayoutTable-->
            <tr bordercolor="#FFFFFF">
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>RELACION DE ORDEN DE PAGO
                      <input name="titulo" type="hidden" id="titulo">
</strong></font></div></td>
              <td></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td height="40"></td>
              <td></td>
              <td></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="25" valign="top" class="form_label_01"> <div align="left"><strong>Salida del
              Reporte:</strong></div></td>
              <td valign="top"> <div align="left"> </div>                <div align="left"> <strong>
                  <input name="radiobutton" type="radio" class="breadcrumb" value="radiobutton" checked>
              PANTALLA</strong></div></td>
              <td valign="top"> <strong>
                <input name="radiobutton" type="radio" class="breadcrumb" value="radiobutton">
              IMPRESORA</strong></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="31">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="20" colspan="3" valign="top" class="form_label_01"> <div align="center"><font color="#000066" size="3"><strong><em>Criterios
              de Selecci&oacute;n</em></strong></font></div></td>
              <td></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="20">&nbsp;</td>
              <td><div align="center"><strong>DESDE</strong></div></td>
              <td><div align="center"><strong>HASTA</strong></div></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="8"></td>
              <td></td>
              <td></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="32" valign="top" class="form_label_01"><p><strong>N&uacute;mero Orden de Pago:</strong><strong></strong></p>              </td>
              <td valign="top">
			  <?
			  $sql="select min(numche) as valor from tscheemi";
			  $tb1=$bd->select($sql);
			  ?>

			  <input type="text" name="nroorddes" class="breadcrumb" id="nroorddes" value="<? print $tb1->fields["valor"];?>" />
				<input type="button" value="..." name="btncatalogo1" onClick="catalogo1('nroorddes');"/>
			</td>
              <td valign="top"><?
			  $sql="select max(numche) as valor from tscheemi";
			  $tb1=$bd->select($sql);
			  ?>
			   <input type="text" name="nroordhas" class="breadcrumb" id="nroordhas" value="<? print $tb1->fields["valor"];?>" />
				<input type="button" value="..." name="btncatalogo2" onClick="catalogo1('nroordhas')"/>


      </td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="28" valign="top" class="form_label_01"><strong>Beneficiario:</strong></td>
              <td valign="top"><?
			  $sql="select min(cedrif) as valor from tscheemi";
			  $tb1=$bd->select($sql);
			  ?>
			  <input type="text" name="bendes" class="breadcrumb" id="bendes" value="<? print $tb1->fields["valor"];?>" />
				<input type="button" value="..." name="btncatalogo3" onClick="catalogo2('bendes')"/>





        </td>
              <td valign="top"><?
			  $sql="select max(cedrif) as valor from tscheemi";
			  $tb1=$bd->select($sql);
			  ?>

			   <input type="text" name="benhas" class="breadcrumb" id="benhas" value="<? print $tb1->fields["valor"];?>" />
				<input type="button" value="..." name="btncatalogo4" onClick="catalogo2('benhas')"/>

                </td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="28" valign="top" class="form_label_01"><strong>Fecha:</strong></td>
              <td valign="top"><?
			  $sql="select to_char(min(feclib),'dd/mm/yyyy') as valor from tsmovlib";
			  $tb1=$bd->select($sql);
			  ?>
                <input datepicker="true" type="text" name="fechades" class="breadcrumb" id="fechades" value="<? print $tb1->fields["valor"];?>" />
</td>
              <td valign="top"><?
			   $sql="select to_char(max(feclib),'dd/mm/yyyy') as valor from tsmovlib";
			  $tb1=$bd->select($sql);
			  ?>
                <input datepicker="true" type="text" name="fechahas" class="breadcrumb" id="fechahas" value="<? print $tb1->fields["valor"];?>" />
			 </td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="28" valign="top" class="form_label_01"><strong>Cuenta Bancaria Desde:</strong></td>
              <td valign="top" colspan="2"><?
			  $sql="select min(numcue) as valor from tsdefban";
			  $tb1=$bd->select($sql);
			  ?>
			   <input size="54" type="text" name="cuentades" class="breadcrumb" id="cuentades" value="<? print $tb1->fields["valor"];?>" />
				<input type="button" value="..." name="btncatalogo5" onClick="catalogo3('cuentades')"/>


               </td>

            </tr>
            <tr bordercolor="#6699CC">
              <td height="28" valign="top" class="form_label_01"><strong>Cuenta Bancaria Hasta: </strong></td>
                   <td valign="top" colspan="2"><?
			  $sql="select max(numcue) as valor from tsdefban";
			  $tb1=$bd->select($sql);
			  ?>
			   <input size="54" type="text" name="cuentahas" class="breadcrumb" id="cuentahas" value="<? print $tb1->fields["valor"];?>" />
				<input type="button" value="..." name="btncatalogo5" onClick="catalogo3('cuentahas')"/>


               </td>



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
	f.titulo.value="RELACION DE ORDEN DE PAGO";
	f.action="rtsrrelordemi.php";
	f.submit();
}
function cerrar()
{
	window.close();
}
function catalogo1(campo)
{
    pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=select numche from tscheemi order by numche asc";
	window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
}

function catalogo2(campo)
{
    pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=select cedrif from tscheemi where rtrim(cedrif) is not null order by cedrif";
	window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
}

function catalogo3(campo)
{
    pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=select numcue,nomcue from tsdefban order by numcue";
	window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
}
</script>
<? $bd->closed(); ?>
</html>
