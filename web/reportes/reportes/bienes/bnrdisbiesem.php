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
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>DISPOSICION
                  DE BIENES SEMOVIENTES
                  <input name="titulo" type="hidden" id="titulo">
                  </strong></font></div></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01">&nbsp;</td>
              <td>&nbsp;</td>
              <td><font color="#00FFCC">&nbsp; </font></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td width="186" class="form_label_01"><strong>Tama&ntilde;o Hoja:</strong></td>
              <td width="174"> <input name="tamano" type="text" class="breadcrumb" id="tamano" readonly="true"></td>
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
              <td bordercolor="#FFFFFF" class="form_label_01">&nbsp;</td>
              <td><strong>DESDE</strong></td>
              <td><strong>HASTA</strong></td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>C&oacute;digo del Activo:</strong></td>
              <td>
                <?

			  	$tb=$bd->select("SELECT min(codact)as codact FROM bndissem");
			  ?>
			   <input name="codact1" type="text" value="<?print $tb->fields["codact"];

			  ?>"class="breadcrumb" id="codact1" size="20" maxlength="100">

         				<input type="button" name="Button" value="..." onClick="catalogo1('codact1');">
                </td>
              <td>
                <?

			  	$tb=$bd->select("SELECT max(codact) as codact FROM bndissem");
			  ?>
			  <input name="codact2" type="text" value="<?print $tb->fields["codact"];

			  ?>"class="breadcrumb" id="codact2" size="20" maxlength="100">

         				<input type="button" name="Button" value="..." onClick="catalogo1('codact2');">
                </td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>C&oacute;digo del Bien: </strong></td>
              <td>
                <?

			  	$tb=$bd->select("SELECT min(codsem) as codsem FROM bndissem");
               ?>
               <input name="codsem1" type="text" value="<?print $tb->fields["codsem"];

			  ?>"class="breadcrumb" id="codsem1" size="20" maxlength="100">

         				<input type="button" name="Button" value="..." onClick="catalogo2('codsem1');">
               </td>
              <td>
                <?

			  	$tb=$bd->select("SELECT max(codsem) as codsem FROM bndissem");
               ?>
                <input name="codsem2" type="text" value="<?print $tb->fields["codsem"];

			  ?>"class="breadcrumb" id="codsem2" size="20" maxlength="100">

         				<input type="button" name="Button" value="..." onClick="catalogo2('codsem2');"></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>N&uacute;mero Disposici&oacute;n</strong></td>
              <td>
                <?

			  	$tb=$bd->select("SELECT min(nrodissem) as nrodissem FROM bndissem");
               ?>
                <input name="nrodissem1" type="text" value="<?print $tb->fields["nrodissem"];

			  ?>"class="breadcrumb" id="nrodissem1" size="20" maxlength="100">

         				<input type="button" name="Button" value="..." onClick="catalogo3('nrodissem1');"></td></td>
              <td>
                <?

			  	$tb=$bd->select("SELECT max(nrodissem) as nrodissem FROM bndissem");
               ?>
               <input name="nrodissem2" type="text" value="<?print $tb->fields["nrodissem"];

			  ?>"class="breadcrumb" id="nrodissem2" size="20" maxlength="100">

         				<input type="button" name="Button" value="..." onClick="catalogo3('nrodissem2');"></td></td>
                </td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Fecha Disposici&oacute;n:</strong></td>
              <td> <div align="left"> </div>
                <div align="left">
                  <?

			  	$tb=$bd->select("SELECT to_char(MIN(fecdissem),'DD/MM/YYYY') as fecha FROM bndissem");
				if(!$tb->EOF)
				{
					$fecini=$tb->fields["fecha"];
				}

			  	$tb2=$bd->select("SELECT to_char(MAX(fecdissem),'DD/MM/YYYY') as fecha FROM bndissem");
				if(!$tb2->EOF)
				{
					$fecdes=$tb2->fields["fecha"];
				}

				?>
                  <input name="fecdis1" type="text" class="breadcrumb" id="fecdis1" datepicker="true" value="<? print $fecini;?>">
                </div></td>
              <td><input name="fecdis2" type="text" class="breadcrumb" id="fecdis2" datepicker="true" value="<? print $fecdes;?>"></td>
            </tr>
            <tr>
              <td bordercolor="#FFFFFF" class="form_label_01">&nbsp;</td>
              <td><strong>NOMBRE</strong></td>
              <td><strong>CARGO</strong></td>
            </tr>
            <tr>
              <td class="form_label_01"> <div align="left"><strong>Preparado :</strong></div></td>
              <td><div align="left">
                  <input class="breadcrumb" name="prenom" type="text" id="prenom">
                </div></td>
              <td><div align="left">
                  <input class="breadcrumb" name="precar" type="text" id="precar">
                </div></td>
            </tr>
            <tr>
              <td class="form_label_01"> <div align="left"><strong>Conformado:</strong></div></td>
              <td><div align="left">
                  <input class="breadcrumb" name="confnom" type="text" id="confnom">
                </div></td>
              <td><div align="left">
                  <input class="breadcrumb" name="confcar" type="text" id="confcar">
                </div></td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>Aprobado:</strong></td>
              <td><div align="left">
                  <input class="breadcrumb" name="apronom" type="text" id="apronom">
                </div></td>
              <td><div align="left">
                  <input class="breadcrumb" name="aprocar" type="text" id="aprocar">
                </div></td>
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
      <td align="right" valign="bottom"><img src="../../img/center01_br.gif" width="6" height="6"></td>
    </tr>
  </table>
</form>
</body>
<script language="javascript">
function enviar()
{
	f=document.form1;
	f.titulo.value="DISPOSICION DE BIENES SEMOVIENTES";
/*	sql='SELECT a.codubi, a.codubi,substr(a.codact,1,10) tipo,a.codact,a.codsem,a.dessem,a.feccom,';
	sql=sql+'a.fecreg,a.valini,a.viduti,a.stasem,a.ordcom,a.marsem,a.sersem,a.detsem,b.desubi ';
	sql=sql+'FROM bnregsem a,bnubibie b ';
	sql=sql+'WHERE a.codact >= rtrim("'+f.codact1.value+'") and rtrim(a.codact) <= rtrim("'+f.codact2.value+'") ';
	sql=sql+'and rtrim(a.codsem) >= ("'+f.codsem1.value+'") and rtrim(a.codsem) <= rtrim("'+f.codsem2.value+'") ';
	sql=sql+'and a.fecreg >= ("'+f.fecreg1.value+'") and a.fecreg <= ("'+f.fecreg2.value+'") and ';
	sql=sql+'a.stasem<>'d' and rtrim(a.codubi) = rtrim(b.codubi) order by a.codsem, a.codact ';
	f.sqls.value=sql; */
//	alert(f.codact1.value);
	f.action="rbnrdisbiesem.php";
	f.submit();
}
function cerrar()
{
//	 f= document.form1;
//	 alert(f.codact1.value);
//	 alert(f.codact2.value);
window.close();
}
function catalogo1(campo)
{
    pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=SELECT distinct(codact)as codact FROM bndissem order by codact";
	window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
}

function catalogo2(campo)
{
    pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=SELECT distinct(codsem) as codsem FROM bndissem order by codsem";
	window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
}

function catalogo3(campo)
{
    pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=SELECT distinct(nrodissem) as nrodissem FROM bndissem order by nrodissem";
	window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
}

</script>
<?$bd->closed()?>
</html>
