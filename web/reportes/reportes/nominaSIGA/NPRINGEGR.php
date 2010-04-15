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
          <table width="612"  border="1" align="center" cellspacing="0" bordercolor="#6699CC" class="grid_line01_tl">
            <tr bordercolor="#FFFFFF"> 
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>INGRESOS 
                  Y EGRESOS DE EMPLEADOS 
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
              <td class="form_label_01"> <div align="left"><strong>C&oacute;digo 
                  Empleado:</strong></div></td>
              <td> <div align="left"> 
                  <?
			  	
			  	$tb=$bd->select("select codemp,nomemp from nphojint order by codemp");
			  ?>
                  <select name="emp1" class="breadcrumb" id="emp1">
                    <?
				  	while(!$tb->EOF)	
					{
				  ?>
                    <option value="<? print $tb->fields["codemp"];?>"><? print $tb->fields["codemp"]." - ".$tb->fields["nomemp"];?></option>
                    <?
					$tb->MoveNext();
					}
				?>
                  </select>
                </div></td>
              <td> 
                <?
			  	
			  	$tb2=$bd->select("select codemp,nomemp from nphojint order by codemp desc");
			  ?>
                <select name="emp2" class="breadcrumb" id="emp2">
                  <?
				  while(!$tb2->EOF)	
				{
			  ?>
                  <option value="<? print $tb2->fields["codemp"];?>"><? print $tb2->fields["codemp"]." - ".$tb2->fields["nomemp"];?></option>
                  <?
				  $tb2->MoveNext();
					}
				?>
                </select></td>
            </tr>
            <tr> 
              <td height="28" class="form_label_01"> 
                <div align="left">
                  <p><strong>Fechas de Ingreso:</strong></p>
                </div></td>
              <td> <div align="left"> </div>
                <div align="left"> 
                  <?
	  	        
			  	$tb=$bd->select("select to_char(MIN(fecing),'DD/MM/YYYY') as fecha1 from nphiineg");
				if(!$tb->EOF)
				{
					$fecha1=$tb->fields["fecha1"];
				}
	  	        
			  	$tb2=$bd->select("select to_char(MAX(fecing),'DD/MM/YYYY') as fecha2 from nphiineg");
				if(!$tb2->EOF)
				{
					$fecha2=$tb2->fields["fecha2"];
				}
				
				?>
                  <input name="fechai1" type="text" class="breadcrumb" id="fechai1" datepicker="true" value="<? print $fecha1;?>">
                </div></td>
              <td><input name="fechai2" type="text" class="breadcrumb" id="fechai2" datepicker="true" value="<? print $fecha2;?>"></td>
            </tr>
            <tr> 
              <td class="form_label_01"> <div align="left"><strong>Fechas de Egreso:</strong></div></td>
              <td> <div align="left"> </div>
                <div align="left"> 
                  <?
	  	        
			  	$tb=$bd->select("select to_char(MIN(fecegr),'DD/MM/YYYY') as fecha1 from nphiineg");
				if(!$tb->EOF)
				{
					$fecha1=$tb->fields["fecha1"];
				}
	  	        
			  	$tb2=$bd->select("select to_char(MAX(fecegr),'DD/MM/YYYY') as fecha2 from nphiineg");
				if(!$tb2->EOF)
				{
					$fecha2=$tb2->fields["fecha2"];
				}
				
				?>
                  <input name="fechae1" type="text" class="breadcrumb" id="fechae1" datepicker="true" value="<? print $fecha1;?>">
                </div></td>
              <td><input name="fechae2" type="text" class="breadcrumb" id="fechae2" datepicker="true" value="<? print $fecha2;?>"></td>
            </tr>
            <tr> 
              <td class="form_label_01"> <div align="left"><strong>Nivel Organizacional:</strong></div></td>
              <td> <div align="left"> 
                  <?
			  	
			  	$tb=$bd->select("select distinct codniv,desniv from npestorg
							where length(rtrim(codniv))=(select max(length(rtrim(codniv))) from npestorg)
							order by codniv");
			  ?>
                  <select name="niv1" class="breadcrumb" id="niv1">
                    <?
				  	while(!$tb->EOF)	
					{
				  ?>
                    <option value="<? print $tb->fields["codniv"];?>"><? print $tb->fields["codniv"]." - ".substr($tb->fields["desniv"],0,30);?></option>
                    <?
					$tb->MoveNext();
					}
				?>
                  </select>
                </div></td>
              <td> 
                <?
			  	
			  	$tb2=$bd->select("select distinct codniv,desniv from npestorg
							where length(rtrim(codniv))=(select max(length(rtrim(codniv))) from npestorg)
							order by codniv desc");
			  ?>
                <select name="niv2" class="breadcrumb" id="niv2">
                  <?
				  while(!$tb2->EOF)	
				{
			  ?>
                  <option value="<? print $tb2->fields["codniv"];?>"><? print $tb2->fields["codniv"]." - ".substr($tb2->fields["desniv"],0,30);?></option>
                  <?
				  $tb2->MoveNext();
					}
				?>
                </select></td>
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
	f.titulo.value="INGRESOS Y EGRESOS DE EMPLEADOS";
	f.action="rNPRINGEGR.php";
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
