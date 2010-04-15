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
       
        <div align="left">&nbsp; 
          <table width="644" align="center" cellspacing="0" bordercolor="#6699CC" class="grid_line01_tl">
            <tr bordercolor="#FFFFFF"> 
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>Ficha de Proveedores
                      <input name="titulo" type="hidden" id="titulo">
</strong></font></div></td>
            </tr>
            <tr bordercolor="#FFFFFF"> 
              <td class="form_label_01">&nbsp;</td>
              <td>&nbsp;</td>
              <td><font color="#00FFCC">&nbsp; </font></td>
            </tr>
            <tr bordercolor="#6699CC"> 
              <td width="201" class="form_label_01"><strong>Tama&ntilde;o Hoja:</strong></td>
              <td width="159"> <input name="tamano" type="text" class="breadcrumb" id="tamano" readonly="true"></td>
              <td width="270">&nbsp;</td>
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
            <tr>
              <td class="form_label_01"><div align="left"><strong>Proveedor Desde:</strong></div></td>
              <td colspan="2"><div align="left">
                  <?
			  	$tb3=$bd->select("SELECT DISTINCT(UPPER(NOMPRO)) as nom FROM CAPROVEE ORDER BY UPPER(NOMPRO)");
			  ?>
                  <select name="nombdesde" id="nombdesde" class="breadcrumb">
                    <?
				while(!$tb3->EOF)
				{
				?>
                    <option value="<? print $tb3->fields["nom"];?>"><? print $tb3->fields["nom"];?></option>
                    <?
				 $tb3->MoveNext();
				}				
				?>
                  </select>
                </div>
                  <div align="left"> </div></td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>Proveedor Hasta:</strong></td>
              <td colspan="2"><?
			  	$tb3=$bd->select("SELECT DISTINCT(UPPER(NOMPRO)) as nom FROM CAPROVEE ORDER BY UPPER(NOMPRO) DESC");
			  ?>
                  <select name="nombhasta" id="nombhasta" class="breadcrumb">
                    <?
				while(!$tb3->EOF)
				{
				?>
                    <option value="<? print $tb3->fields["nom"];?>"><? print $tb3->fields["nom"];?></option>
                    <?
				 $tb3->MoveNext();
				}
				?>
                </select></td>
            </tr>
            <tr>
              <td class="form_label_01"><div align="left"><strong>Ramo Desde:</strong></div></td>
              <td colspan="2"><div align="left">
                  <?
			  	$tb3=$bd->select("SELECT DISTINCT(RAMART) as ramo,UPPER(NOMRAM) as nombre FROM CARAMART ORDER BY RAMART");
			  ?>
                  <select name="ramodesde" id="ramodesde" class="breadcrumb">
                    <?
				while(!$tb3->EOF)
				{
				?>
                    <option value="<? print $tb3->fields["ramo"];?>"><? print $tb3->fields["ramo"].' - '.substr($tb3->fields["nombre"],0,50);?></option>
                    <?
				 $tb3->MoveNext();
				}
				?>
                  </select>
              </div></td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>Ramo  Hasta:</strong></td>
              <td colspan="2"><?
			  	$tb4=$bd->select("SELECT DISTINCT(RAMART) as ramo,UPPER(NOMRAM) as nombre FROM CARAMART ORDER BY RAMART DESC");
			  ?>
                  <select name="ramohasta" id="ramohasta" class="breadcrumb">
                    <?
				while(!$tb4->EOF)
				{
				?>
                    <option value="<? print $tb4->fields["ramo"];?>"><? print $tb4->fields["ramo"].' - '.substr($tb4->fields["nombre"],0,50);?></option>
                    <?
				 $tb4->MoveNext();
				}
				?>
                  </select>              </td>
            </tr>
            <tr>
              <td bordercolor="#FFFFFF" class="form_label_01">&nbsp;</td>
              <td><strong>DESDE</strong></td>
              <td><strong>HASTA</strong></td>
            </tr>
            <tr>
              <td height="25" class="form_label_01"><strong>C&oacute;digo Prov.:</strong></td>
              <td><?
			  	$tb3=$bd->select("SELECT CODPRO as codpro FROM CAPROVEE order by CODPRO");
			  ?>
                  <select name="codprodesde" id="codprodesde" class="breadcrumb">
                    <?
				while(!$tb3->EOF)
				{       
				?>
                    <option value="<? print $tb3->fields["codpro"];?>"><? print $tb3->fields["codpro"];?></option>
                    <?
				 $tb3->MoveNext();
				}
				?>
                  </select>
              </td>
              <td><?
			  	$tb3=$bd->select("SELECT CODPRO as codpro FROM CAPROVEE order by CODPRO desc");
			  ?>
                  <select name="codprohasta" id="codprohasta" class="breadcrumb">
                    <?
				while(!$tb3->EOF)
				{
				?>
                    <option value="<? print $tb3->fields["codpro"];?>"><? print $tb3->fields["codpro"];?></option>
                    <?
				 $tb3->MoveNext();
				}
				?>
                  </select>
              </td>
            </tr>
            <tr>
              <td height="25" class="form_label_01"><strong>Rif Prov.:</strong></td>
              <td><?
			  	$tb3=$bd->select("SELECT RIFPRO as rif FROM CAPROVEE order by RIFPRO asc");
			  ?>
                  <select name="rifdesde" id="rifdesde" class="breadcrumb">
                    <?
				while(!$tb3->EOF)
				{
				?>
                    <option value="<? print $tb3->fields["rif"];?>"><? print $tb3->fields["rif"];?></option>
                    <?
				 $tb3->MoveNext();
				}
				?>
                  </select>
              </td>
              <td><?
			  	$tb3=$bd->select("SELECT RIFPRO as rif FROM CAPROVEE order by RIFPRO desc");
			  ?>
                  <select name="rifhasta" id="rifhasta" class="breadcrumb">
                    <?
				while(!$tb3->EOF)
				{
				?>
                    <option value="<? print $tb3->fields["rif"];?>"><? print $tb3->fields["rif"];?></option>
                    <?
				 $tb3->MoveNext();
				}
				?>
                  </select>
              </td>
            </tr>
            <tr bordercolor="#FFFFFF"> 
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr bordercolor="#6699CC"> 
              <td colspan="3" class="form_label_01">&nbsp;</td>
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
	f.titulo.value="Ficha de Proveedores";
	f.action="rcarficpro.php";
	f.submit();
}
function cerrar()
{
	window.close();
}
function catalogo1()
{
 	pagina="../../lib/general/catalogoform.php?campo=codprodesde&sql=select codpro as campo1 from caprovee order by codpro asc";
	window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=300,height=200,rezizable=yes, left=100,top=100");
}
function catalogo2()
{
 	pagina="../../lib/general/catalogoform.php?campo=codprohasta&sql=select codpro as campo1 from caprovee order by codpro desc";
	window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=300,height=200,rezizable=yes, left=100,top=100");
}
function catalogo3()
{
 	pagina="../../lib/general/catalogoform.php?campo=rifdesde&sql=select rifpro as campo1 from caprovee order by rifpro asc";
	window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=300,height=200,rezizable=yes, left=100,top=100");
}
function catalogo4()
{
 	pagina="../../lib/general/catalogoform.php?campo=rifhasta&sql=select rifpro as campo1 from caprovee order by rifpro desc";
	window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=300,height=200,rezizable=yes, left=100,top=100");
}

</script>
</html>
