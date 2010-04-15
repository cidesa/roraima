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
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>RECIBO 
                  DE PAGO 
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
              <td class="form_label_01"><strong>C&oacute;digo del Empleado Desde:</strong></td>
              <td colspan="2"> 
                <?
			  	
			  	$tb=$bd->select("SELECT distinct(CODEMP) as cod, nomemp as des FROM NPASICAREMP order by codemp");
			  ?>
                <select name="codempdes" class="breadcrumb" id="codempdes">
                  <?
				  	while(!$tb->EOF)	
					{
				  ?>
                  <option value="<? print $tb->fields["cod"];?>"><? print $tb->fields["cod"]."- ".$tb->fields["des"];?></option>
                  <?
										$tb->MoveNext();
					}
					
				?>
                </select></td>
            </tr>
            <tr> 
              <td class="form_label_01"><strong>C&oacute;digo del Empleado Hasta:</strong></td>
              <td colspan="2"> 
                <?
			  	
			  	$tb=$bd->select("SELECT distinct(CODEMP) as cod, nomemp as des FROM NPASICAREMP order by codemp desc");
			  ?>
                <select name="codemphas" class="breadcrumb" id="codemphas">
                  <?
				  	while(!$tb->EOF)	
					{
				  ?>
                  <option value="<? print $tb->fields["cod"];?>"><? print $tb->fields["cod"]."- ".$tb->fields["des"];?></option>
                  <?
										$tb->MoveNext();
					}
					
				?>
                </select></td>
            </tr>
            <tr> 
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr> 
              <td class="form_label_01"><strong>C&oacute;digo Cargo Desde:</strong></td>
              <td colspan="2"> 
                <?
			  	
			  	$tb=$bd->select("SELECT distinct(CODcar)as cod1, nomcar as des1 FROM NPASICAREMP order by codcar");
			  ?>
                <select name="codcardes" class="breadcrumb" id="codcardes">
                  <?
				  	while(!$tb->EOF)	
					{
				  ?>
                  <option value="<? print $tb->fields["cod1"];?>"><? print $tb->fields["cod1"]."- ".$tb->fields["des1"];?></option>
                  <?
										$tb->MoveNext();
					}
					
				?>
                </select></td>
            </tr>
            <tr> 
              <td class="form_label_01"><strong>C&oacute;digo Cargo Hasta:</strong></td>
              <td colspan="2"> 
                <?
			  	
			  	$tb=$bd->select("SELECT distinct(CODcar)as cod1, nomcar as des1 FROM NPASICAREMP order by codcar desc");
			  ?>
                <select name="codcarhas" class="breadcrumb" id="codcarhas">
                  <?
				  	while(!$tb->EOF)	
					{
				  ?>
                  <option value="<? print $tb->fields["cod1"];?>"><? print $tb->fields["cod1"]."- ".$tb->fields["des1"];?></option>
                  <?
										$tb->MoveNext();
					}
					
				?>
                </select></td>
            </tr>
            <tr> 
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr> 
              <td class="form_label_01"><strong>C&oacute;digo Concepto Desde:</strong></td>
              <td colspan="2"> 
                <?
			  	
			  	$tb=$bd->select("SELECT distinct(CODCON) as cod2, NOMCON as des2 FROM NPASICONEMP order by CODCON");
			  ?>
                <select name="codcondes" class="breadcrumb" id="codcondes">
                  <?
				  	while(!$tb->EOF)	
					{
				  ?>
                  <option value="<? print $tb->fields["cod2"];?>"><? print $tb->fields["cod2"]."- ".$tb->fields["des2"];?></option>
                  <?
										$tb->MoveNext();
					}
					
				?>
                </select></td>
            </tr>
            <tr> 
              <td class="form_label_01"><strong>C&oacute;digo Concepto Hasta:</strong></td>
              <td colspan="2"> 
                <?
			  	
			  	$tb=$bd->select("SELECT distinct(CODCON) as cod2, NOMCON as des2 FROM NPASICONEMP order by CODCON desc");
			  ?>
                <select name="codconhas" class="breadcrumb" id="codconhas">
                  <?
				  	while(!$tb->EOF)	
					{
				  ?>
                  <option value="<? print $tb->fields["cod2"];?>"><? print $tb->fields["cod2"]."- ".$tb->fields["des2"];?></option>
                  <?
										$tb->MoveNext();
					}
					
				?>
                </select></td>
            </tr>
            <tr> 
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr> 
              <td class="form_label_01"><strong>Tipo N&oacute;mina Desde:</strong></td>
              <td colspan="2"> 
                <?
			  	
			  	$tb=$bd->select("SELECT distinct(CODNOM) as cod3, NOMNOM as des3 FROM NPASICAREMP order by CODNOM");
			  ?>
                <select name="tipnomdes" class="breadcrumb" id="tipnomdes">
                  <?
				  	while(!$tb->EOF)	
					{
				  ?>
                  <option value="<? print $tb->fields["cod3"];?>"><? print $tb->fields["cod3"]."- ".$tb->fields["des3"];?></option>
                  <?
										$tb->MoveNext();
					}
					
				?>
                </select></td>
            </tr>
            <tr> 
              <td class="form_label_01"><strong>Tipo N&oacute;mina Hasta:</strong></td>
              <td colspan="2"> 
                <?
			  	
			  	$tb=$bd->select("SELECT distinct(CODNOM) as cod3, NOMNOM as des3 FROM NPASICAREMP order by CODNOM desc");
			  ?>
                <select name="tipnomhas" class="breadcrumb" id="tipnomhas">
                  <?
				  	while(!$tb->EOF)	
					{
				  ?>
                  <option value="<? print $tb->fields["cod3"];?>"><? print $tb->fields["cod3"]."- ".$tb->fields["des3"];?></option>
                  <?
										$tb->MoveNext();
					}
					
				?>
                </select></td>
            </tr>
            <tr> 
              <td class="form_label_01">&nbsp;</td>
              <td><strong>Desde</strong></td>
              <td><strong>Hasta</strong></td>
            </tr>
            <tr> 
              <td height="23" class="form_label_01"><strong>Per&iacute;odo de 
                N&oacute;mina:</strong></td>
              <td> <div align="left"> </div>
                <div align="left"> 
                  <?
	  	        
			  	$tb=$bd->select("SELECT to_char(MIN(fecemi),'DD/MM/YYYY') as fecha FROM opordpag");
				if(!$tb->EOF)
				{
					$fecini=$tb->fields["fecha"];
				}
	  	        
			  	$tb2=$bd->select("SELECT to_char(MAX(fecemi),'DD/MM/YYYY') as fecha FROM opordpag");
				if(!$tb2->EOF)
				{
					$fecdes=$tb2->fields["fecha"];
				}
				
				?>
                  <input name="fecreg1" type="text" class="breadcrumb" id="fecreg1" datepicker="true" value="<? print $fecini;?>">
                </div></td>
              <td><input name="fecreg2" type="text" class="breadcrumb" id="fecreg2" datepicker="true" value="<? print $fecdes;?>"></td>
            </tr>
            <tr> 
              <td class="form_label_01"><strong>Generar Consecutivo:</strong></td>
              <td> <select name="consecutivo" class="breadcrumb" id="consecutivo">
                  <option value="n">NO</option>
                  <option value="s">Si</option>
                </select></td>
              <td>&nbsp;</td>
            </tr>
            <tr bordercolor="#FFFFFF"> 
              <td class="form_label_01"><input name="sqls" type="hidden" id="sqls"></td>
              <td colspan="2">&nbsp;</td>
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
	f.titulo.value="ORDENES DE PAGO CON RETENCIONES";
	f.action="rNPRRECPAG.php";
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
