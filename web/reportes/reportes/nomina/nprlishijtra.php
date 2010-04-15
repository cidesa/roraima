<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>SIGA Reportes</title>
<link href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
<link href="../../lib/css/datepickercontrol.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="../../lib/general/datepickercontrol.js"></script>
</head>
<body>
<?
require_once("../../lib/bd/basedatosAdo.php");
$bd=new basedatosAdo();
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
              <td height="24" colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>LISTADO
                  CON FECHAS DE NACIMIENTO
                      <input name="titulo" type="hidden" id="titulo">
                  </strong></font></div></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td height="20" class="form_label_01">&nbsp;</td>
              <td width="205">&nbsp;</td>
              <td width="288"><font color="#00FFCC">&nbsp; </font></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td width="186" height="25" class="form_label_01"><strong>Tama&ntilde;o Hoja:</strong></td>
              <td> <input name="tamano" type="text" class="breadcrumb" id="tamano" readonly="true"></td>
              <td>&nbsp;</td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="25" class="form_label_01"><strong>Orientaci&oacute;n:</strong></td>
              <td> <input name="orientacion" type="text" class="breadcrumb" id="orientacion" readonly="true"></td>
              <td> <div align="right"> </div></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="43" class="form_label_01"> <div align="left"><strong>Salida del
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
              <td height="20" class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td height="20" colspan="3" class="form_label_01"> <div align="center"><font color="#000066" size="3"><strong><em>Criterios
                  de Selecci&oacute;n</em></strong></font></div></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="20" bordercolor="#FFFFFF" class="form_label_01">&nbsp;</td>
              <td><strong>DESDE</strong></td>
              <td><strong>HASTA</strong></td>
            </tr>
		  <tr>
              <td class="form_label_01"><div align="left"><strong>C&oacute;digo Empleado:</strong></div></td>
              <td><div align="left">
                  <input name="emp1" type="text" class="breadcrumb" id="emp1"
                   value="<?$sql="select min(a.codemp) as cod from nphojint a";
 					LlenarTextoSql($sql,"cod",$bd); ?>" size ="20">
                  <input type="button" name="Button1" value="..." onClick=" catalogo1('emp1');">
              </div></td>
              <td><input name="emp2" type="text" class="breadcrumb" id="emp2"
                   value="<?$sql="select max(a.codemp) as cod from nphojint a";
 					LlenarTextoSql($sql,"cod",$bd); ?>" size ="20">
                  <input type="button" name="Button2" value="..." onClick=" catalogo1('emp2');">
              </td>
            </tr>

		   <tr>
              <td class="form_label_01"><div align="left"><strong>Ubicaci&oacute;n Administrativa:</strong></div></td>
              <td><div align="left">
                  <input name="cat1" type="text" class="breadcrumb" id="cat1"
                   value="<?$sql="select min(codniv) as codniv from npestorg";
 					LlenarTextoSql($sql,"codniv",$bd); ?>" size ="20">
                  <input type="button" name="Button1" value="..." onClick=" catalogo2('cat1');">
              </div></td>
              <td><input name="cat2" type="text" class="breadcrumb" id="cat2"
                   value="<?$sql="select max(codniv) as codniv from npestorg";
 					LlenarTextoSql($sql,"codniv",$bd); ?>" size ="20">
                  <input type="button" name="Button2" value="..." onClick=" catalogo2('cat2');">
              </td>
            </tr>

			<tr>
              <td class="form_label_01"><div align="left"><strong>Edad de hijo:</strong></div></td>
              <td><div align="left">
                  <input name="edad1" type="text" class="breadcrumb" id="edad1"
                   value="<?$sql="select min(edafam) as edad from npinffam where parfam='004'";
 					LlenarTextoSql($sql,"edad",$bd); ?>" size ="20">

              </div></td>
              <td><input name="edad2" type="text" class="breadcrumb" id="edad2"
                   value="<?$sql="select max(edafam) as edad from npinffam where parfam='004'";
 					LlenarTextoSql($sql,"edad",$bd); ?>" size ="20">

              </td>
            </tr>



			 <tr>
              <td height="29" class="form_label_01"><div align="left"><strong>Fecha de nacimiento:</strong></div></td>
              <td><div align="left">
                  <input name="fecorddes" type="text" value="<?
				$sql="Select to_char(min(fecnac),'dd/mm/yyyy') as fecord from nphojint";
                LlenarTextoSql($sql,"fecord",$bd);
				?>" id="fecorddes" size="12" maxlength="10" datepicker="true">
              </div></td>
              <td colspan="2"><input name="fecordhas" type="text" value="<?
				$sql="Select to_char(max(fecnac),'dd/mm/yyyy') as fecord from nphojint";
                LlenarTextoSql($sql,"fecord",$bd);
				?>" id="fecordhas" size="12" maxlength="10" datepicker="true"></td>
            </tr>




            <td rowspan="2" align="center" valign="middle"><p>&nbsp;</p>
              <p>&nbsp;</p></td>
            </tr>
            <tr>
              <td height="25" class="form_label_01"><!--DWLayoutEmptyCell-->&nbsp;</td>
              <td><!--DWLayoutEmptyCell-->&nbsp;</td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td height="21" class="form_label_01"><input name="sqls" type="hidden" id="sqls"></td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td height="20" class="form_label_01">&nbsp;</td>
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
	f=document.form1;
	f.titulo.value="LISTADO DE HIJOS DE TRABAJADORES";
	f.action="rnprlishijtra.php";
	f.submit();
}
function cerrar()
{
	window.close();
}
function catalogo1(campo)
{
    mysql='select distinct a.codemp,a.nomemp from nphojint a order by a.nomemp';
	pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
}s

function catalogo2(campo)
{
    mysql='select distinct rtrim(codniv) as codniv,desniv from npestorg order by rtrim(codniv)';
	pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
}

function catalogo3(campo)
{
    mysql='select distinct edafam as edad from npinffam where parfam=�002� order by edad';
	pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
}
</script>
</html>
