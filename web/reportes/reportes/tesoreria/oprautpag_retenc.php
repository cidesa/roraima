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
$bd->validar();
?>
<form name="form1" method="post" action="roprautpag_retenc" id="form1">
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
            <tr bordercolor="#FFFFFF">
              <td colspan="3" class="form_label_01"> <div align="center">
                <p><font color="#000066" size="4"><strong>Autorizaci&oacute;n de Pago FIDES</strong></font></p>
                <p><font color="#000066" size="4"><strong>
                    <input name="titulo" type="hidden" id="titulo">
                  </strong></font></p>
              </div></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td width="186" class="form_label_01"> <div align="left"><strong>Salida del
                  Reporte:</strong></div></td>
              <td width="174"> <div align="left"> </div>
                <div align="left"> <strong>
                  <input name="radiobutton" type="radio" class="breadcrumb" value="radiobutton" checked>
                  PANTALLA</strong></div></td>
              <td width="238"> <strong>
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
              <td class="form_label_01">
                <div align="left"><strong>N&uacute;mero de Autorizaci&oacute;n: </strong></div></td>
              <td>
                <div align="left">
                  <?
			  	$tb=$bd->select("select min(refcau) as valor  from cpcausad");			  ?>
                  <input  type="text" name="numaudes" class="breadcrumb" id="numaudes" value="<? print $tb->fields["valor"];?>"/>
                  <input type="button" name="Button" value="..." onclick="catalogo1('numaudes')" />
</div></td>
            <!--  <td>
                <div align="left">

			  	 $tb=$bd->select("select max(refcau) as valor from cpcausad");
                  <input  type="text" name="numauhas" class="breadcrumb" id="numauhas" value="// print $tb->fields["valor"];"/>
                  <input type="button" name="Button" value="..." onclick="catalogo1('numauhas')" />
</div></td> -->
		    </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01"><div align="left"><strong>Obra :</strong></div></td>
              <td colspan="2"><input size="58" name="obra" type="text" class="breadcrumb" id="obra" ></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01"><div align="left"><strong>N&uacute;mero de Contrato :</strong></div></td>
              <td colspan="2"><input size="58" name="numcont" type="text" class="breadcrumb" id="numcont"></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01"><div align="left"><strong>% Retenci&oacute;n :</strong></div></td>
              <td colspan="2"><input size="58" name="retenc" type="text" class="breadcrumb" id="retenc" ></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01"><div align="left"><strong>Agencia :</strong></div></td>
              <td colspan="2"><input size="58" name="agencia" type="text" class="breadcrumb" id="agencia"></td>
            </tr>
            <tr>
              <td class="form_label_01">
                <div align="left"><strong>Directora Admon. y Fin.: </strong></div></td>
              <td><input name="diradfin" type="text" class="breadcrumb" id="diradfin" ></td>
              <td class="form_label_01">
                <div align="left"><strong>C.I.:
                  <input name="ci1" type="text" class="breadcrumb" id="ci1" size="19" >
              </strong></div></td>
            </tr>
            <tr>
              <td class="form_label_01">
                <div align="left"><strong>Secretario General : </strong></div></td>
              <td>
                <div align="left">
                  <input name="secgen" type="text" class="breadcrumb" id="secgen"  >
</div></td>
              <td class="form_label_01">
                <div align="left"><strong>C.I.:
                  <input name="ci2" type="text" class="breadcrumb" id="ci2"  size="19">
              </strong></div></td>
            </tr>
            <tr>
              <td class="form_label_01">
                <div align="left"><strong>Contralor General: </strong></div></td>
              <td>
                <div align="left">
                  <input name="congen" type="text" class="breadcrumb" id="congen" >
</div></td>
              <td class="form_label_01">
                <div align="left"><strong>C.I.:
                  <input name="ci3" type="text" class="breadcrumb" id="ci3"  size="19">
              </strong></div></td>
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
            <td colspan="2" align="center"><input name="Button" type="button" class="form_button01" value="Generar" onClick="validar();">
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

function validar()
{
if (document.form1.obra.value=="")
{ alert ("Por favor llene el campo Obra");}
else {
	if (document.form1.numcont.value=="")
	{ alert ("Por favor llene el campo Numero de Contrato ");}
	else {
	     if (document.form1.retenc.value=="")
		{ alert ("Por favor llene el campo % Retencion ");}
		else {
				if (document.form1.agencia.value=="")
				{ alert ("Por favor llene el campo Agencia ");}
				else {
					if (document.form1.diradfin.value=="")
					{alert ("Por favor llene el campo Directora Admon. y Fin.");}
					else {
						if (document.form1.secgen.value=="")
						{ alert ("Por favor llene el campo Secretario General ");}
						else {
							if (document.form1.congen.value=="")
							{ alert ("Por favor llene el campo Contralor General");}
							else{
								if ((document.form1.ci1.value=="") || (document.form1.ci2.value=="") || (document.form1.ci3.value==""))
								{ alert ("Por favor llene el C.I. ");}
								else {document.form1.submit()};
								}
							}
						}
					}
				}
			}
		}
	}

function enviar()
{
	f=document.form1;
	f.titulo.value="";
	f.action="roprautpag_retenc.php";
	f.submit();
}
function cerrar()
{
	window.close();
}
function catalogo1(campo)
{
    pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=select distinct refcau from cpcausad order by refcau";
	window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
}
function catalogo2(campo)
{
    pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=select distinct nomben from opbenefi order by nomben asc";
	window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
}
</script>
<? $bd->closed(); ?>
</html>
