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
<form name="form1" method="post" action="rOprOrdEnvCont" id="form1">
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
              <td height="98" colspan="3" class="form_label_01"> <div align="center"> 
                <p><font color="#000066" size="4"><strong>RELACI&Oacute;N DE ORDEN DE PAGO </strong></font></p>
                <p><strong><font color="#000066" size="4">ENVIADAS A CONTRALORIA </font></strong><font color="#000066" size="4"><strong>
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
                <div align="left"></div></td>
              <td>
                <div align="left"><strong>Desde: </strong></div></td>
              <td><div align="left"><strong>Hasta: </strong></div></td> 
		    </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01"><div align="left"></div></td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
              <td class="form_label_01">
                <div align="left"><strong>Numero Orden Pago : </strong></div></td>
              <td>
                <div align="left">
                  <?
			  	$tb=$bd->select("SELECT a.numord FROM TMPORDPAGCON as A 
								UNION SELECT B.REFAJU FROM CPAJUSTE as B 
								WHERE B.ORDPAG='C' order by NUMORD asc");
			  ?>
                  <select name="orden" class="breadcrumb" id="orden">
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
              <td class="form_label_01">
                <div align="left">
                  <?
			  	$tb1=$bd->select("SELECT a.numord FROM TMPORDPAGCON as A 
									UNION SELECT B.REFAJU FROM CPAJUSTE as B
									WHERE B.ORDPAG='C' ORDER BY NUMORD DESC");
			  ?>
                  <select name="ord2" class="breadcrumb" id="ord2">
                    <?
				  	while(!$tb1->EOF)	
					{
				  ?>
                    <option value="<? print $tb1->fields["numord"];?>"><? print $tb1->fields["numord"];?></option>
                    <?
					$tb1->MoveNext();
					}
				?>
                  </select>
				</div></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01"><strong>Orientación del Reporte:</strong></td>
              <td class="form_label_01"><strong>CARTA / HORIZONTAL</strong></td>
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
            <td colspan="2" align="center"><input name="Button" type="button" class="form_button01" value="Generar" onClick="enviar();"> 
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
if (document.form1.reg.value=="")
{ alert ("Por favor llene el campo Registrador");}
else {document.form1.submit()};
								
	}

function enviar()
{
	f=document.form1;
	f.titulo.value="";
	f.action="rOprOrdEnvCont.php";
	f.submit();
}
function cerrar()
{
	window.close();
}

</script>
</html>
