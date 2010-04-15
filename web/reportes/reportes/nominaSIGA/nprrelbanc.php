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
       

          <table width="647"  border="0" align="center" cellspacing="0" bordercolor="#6699CC" class="grid_line01_tl">
            <tr bordercolor="#FFFFFF"> 
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>RELACION CUENTAS BANCARIAS NOMINA
                      <input name="titulo" type="hidden" id="titulo">
</strong></font></div></td>
            </tr>
            <tr bordercolor="#FFFFFF"> 
              <td class="form_label_01">&nbsp;</td>
              <td>&nbsp;</td>
              <td><font color="#00FFCC">&nbsp; </font></td>
            </tr>
            <tr bordercolor="#6699CC"> 
              <td width="161" class="form_label_01"><strong>Tama&ntilde;o Hoja:</strong></td>
              <td width="218"> <input name="tamano" type="text" class="breadcrumb" id="tamano" readonly="true"></td>
              <td width="261">&nbsp;</td>
            </tr>
            <tr bordercolor="#6699CC"> 
              <td height="24" class="form_label_01"><strong>Orientaci&oacute;n:</strong></td>
              <td><input name="orientacion" type="text" class="breadcrumb" id="orientacion" readonly="true"></td>
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
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr bordercolor="#6699CC"> 
              <td class="form_label_01"> <strong>Tipo del Empleado:</strong></td>
              <td colspan="2"><select name="codemp1" class="breadcrumb" id="codemp1">
                <?
				  $tb1=$bd->select("select distinct codemp,nomemp from npasicaremp order by codemp");
				  	while(!$tb1->EOF)
					{
				  ?>
                <option value="<? print $tb1->fields["codemp"];?>"><? print substr($tb1->fields["codemp"].' - '.$tb1->fields["nomemp"],0,45);?></option>
                <?
				  		$tb1->MoveNext();
					}
				  ?>
              </select></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="40" class="form_label_01">&nbsp;</td>
              <td colspan="2" valign="top"><select name="codemp2" class="breadcrumb" id="codemp2">
                <?
				  $tb1=$bd->select("select distinct codemp,nomemp from npasicaremp order by codemp desc");
				  	while(!$tb1->EOF)
					{
				  ?>
                <option value="<? print $tb1->fields["codemp"];?>"><? print substr($tb1->fields["codemp"].' - '.$tb1->fields["nomemp"],0,45);?></option>
                <?
				  		$tb1->MoveNext();
					}
				  ?>
              </select></td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>C&oacute;digo del Banco :</strong></td>
              <td colspan="2"><select name="codban1" class="breadcrumb" id="codban1">
                <?
				  $tb1=$bd->select("select * from npbancos order by codban");
				  	while(!$tb1->EOF)
					{
				  ?>
                <option value="<? print $tb1->fields["codban"];?>"><? print $tb1->fields["codban"].' - '.$tb1->fields["nomban"];?></option>
                <?
				  		$tb1->MoveNext();
					}
				  ?>
              </select></td>
            </tr>
            <tr>
              <td height="37" class="form_label_01">&nbsp;</td>
              <td colspan="2" valign="top"><select name="codban2" class="breadcrumb" id="codban2">
                <?
				  $tb1=$bd->select("select * from npbancos order by codban desc");
				  	while(!$tb1->EOF)
					{
				  ?>
                <option value="<? print $tb1->fields["codban"];?>"><? print $tb1->fields["codban"].' - '.$tb1->fields["nomban"];?></option>
                <?
				  		$tb1->MoveNext();
					}
				  ?>
              </select></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>C&oacute;digo de Categor&iacute;a:</strong></td>
              <td colspan="2"><select name="codcat1" class="breadcrumb" id="codcat1">
                <?
				  $tb1=$bd->select("select * from npcatpre order by codcat");
				  	while(!$tb1->EOF)
					{
				  ?>
                <option value="<? print $tb1->fields["codcat"];?>"><? print substr($tb1->fields["codcat"].' - '.$tb1->fields["nomcat"],0,55);?></option>
                <?
				  		$tb1->MoveNext();
					}
				  ?>
              </select></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="45" class="form_label_01">&nbsp;</td>
              <td colspan="2" valign="top"><select name="codcat2" class="breadcrumb" id="codcat2">
                <?
				  $tb1=$bd->select("select * from npcatpre order by codcat desc");
				  	while(!$tb1->EOF)
					{
				  ?>
                <option value="<? print $tb1->fields["codcat"];?>"><? print substr($tb1->fields["codcat"].' - '.$tb1->fields["nomcat"],0,45);?></option>
                <?
				  		$tb1->MoveNext();
					}
				  ?>
              </select></td>
            </tr>
            <tr>
              <td height="33" class="form_label_01"><strong>Tipo de Nomina  :</strong></td>
              <td colspan="2" valign="top"><select name="codnom" class="breadcrumb" id="codnom">
                <?
				  $tb1=$bd->select("select distinct codnom, nomnom from npnomcal order by codnom");
				  	while(!$tb1->EOF)
					{
				  ?>
                <option value="<? print $tb1->fields["codnom"];?>"><? print $tb1->fields["codnom"]." - ".$tb1->fields["nomnom"];?></option>
                <?
				  		$tb1->MoveNext();
					}
				  ?>
              </select></td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>Periodo de Nomina  :</strong></td>
              <td colspan="2"><input name="pernomdes" type="text" id="pernomdes" size="6"></td>
            </tr>
            <tr>
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2"><input name="pernomhas" type="text" id="pernomhas" size="6"></td>
            </tr>
            <tr bordercolor="#6699CC"> 
              <td colspan="3" class="form_label_01">&nbsp;</td>
            </tr>
          </table>
   
        
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
	f.titulo.value="Relacion Cuentas Bancarias Nomina";
	f.action="rnprrelbanc.php";
	f.submit();
}
function cerrar()
{
	window.close();
}
function catalogo1()
{
 	pagina="../../lib/general/catalogoform.php?campo=codesde&sql=select codemp as campo1 from nphojint order by codemp asc";
	//window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=300,height=200,rezizable=yes, left=100,top=100");
}
function catalogo2()
{
 	pagina="../../lib/general/catalogoform.php?campo=codhasta&sql=select codemp as campo1 from nphojint order by codemp desc";
	//window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=300,height=200,rezizable=yes, left=100,top=100");
}
</script>
</html>
