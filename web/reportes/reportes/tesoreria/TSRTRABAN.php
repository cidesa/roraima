<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>SIGA Reportes</title>
<link href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
<link href="../../lib/ccs/datepickercontrol.css" rel="stylesheet" type="text/css">
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
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>TRANSFERENCIA 
                  BANCARIA 
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
              <td class="form_label_01"><strong>Referencia Transacci&oacute;n:</strong></td>
              <td> 
                <?
			  	
			  	$tb=$bd->select("SELECT MIN(reftra) as ref FROM tsmovtra");
			  ?>
                <select name="reftra1" class="breadcrumb" id="reftra1">
                  <?
				  	while(!$tb->EOF)	
					{
				  ?>
                  <option value="<? print $tb->fields["ref"];?>"><? print $tb->fields["ref"];?></option>
                  <?
										$tb->MoveNext();
					}
					
				?>
                </select></td>
              <td> 
                <?
			  	
			  	$tb=$bd->select("SELECT MAX(reftra) as ref2 FROM tsmovtra");
			  ?>
                <select name="select" class="breadcrumb" id="select2">
                  <?
				  	while(!$tb->EOF)	
					{
				  ?>
                  <option value="<? print $tb->fields["ref2"];?>"><? print $tb->fields["ref2"];?></option>
                  <?
										$tb->MoveNext();
					}
					
				?>
                </select></td>
            </tr>
            <tr bordercolor="#6699CC"> 
              <td class="form_label_01"><strong>Fecha de Transacci&oacute;n:</strong></td>
              <td> <div align="left"> </div>
                <div align="left"> 
                  <?
	  	        
			  	$tb=$bd->select("SELECT to_char(MIN(fectra),'DD/MM/YYYY') as fecha FROM tsmovtra");
				if(!$tb->EOF)
				{
					$fecini=$tb->fields["fecha"];
				}
	  	        
			  	$tb2=$bd->select("SELECT to_char(MAX(fectra),'DD/MM/YYYY') as fecha FROM tsmovtra");
				if(!$tb2->EOF)
				{
					$fecdes=$tb2->fields["fecha"];
				}
				
				?>
                  <input name="fecreg1" type="text" class="breadcrumb" id="feccom1" datepicker="true" value="<? print $fecini;?>">
                </div></td>
              <td><input name="fecreg2" type="text" class="breadcrumb" id="feccom2" datepicker="true" value="<? print $fecdes;?>"></td>
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
              <input name="Button" type="button" class="form_button01" value="   Salir    " onClick="cerrar()">              </td>
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
      <td align="right" valign="bottom"><img src="../../img/center01_br.gif" width="8" height="30"></td>
    </tr>
  </table>
</form>
</body>
<script language="javascript">
function enviar()
{
	f=document.form1;
	f.titulo.value="TRANSFERENCIA BANCARIA";
/*	sql='SELECT a.codubi, a.codubi,substr(a.codact,1,10) tipo,a.codact,a.codmue,a.desmue,a.feccom,';
	sql=sql+'a.fecreg,a.valini,a.viduti,a.stamue,a.ordcom,a.marmue,a.sermue,a.detmue,b.desubi ';
	sql=sql+'FROM bnregmue a,bnubibie b ';
	sql=sql+'WHERE a.codact >= rtrim("'+f.codact1.value+'") and rtrim(a.codact) <= rtrim("'+f.codact2.value+'") ';
	sql=sql+'and rtrim(a.codmue) >= ("'+f.codmue1.value+'") and rtrim(a.codmue) <= rtrim("'+f.codmue2.value+'") ';
	sql=sql+'and a.fecreg >= ("'+f.fecreg1.value+'") and a.fecreg <= ("'+f.fecreg2.value+'") and ';
	sql=sql+'a.stamue<>'d' and rtrim(a.codubi) = rtrim(b.codubi) order by a.codmue, a.codact ';
	f.sqls.value=sql; */
//	alert(f.codact1.value); 
	f.action="rTSRTRABAN.php";
	f.submit();
}

function cerrar()
{
    window.close(); 
//	var  father=window.self;
//	father.opener=window.self;
//	father.close()
	 
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
