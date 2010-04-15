<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>SIGA Reportes</title>
<link  href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
<link  href="../../lib/css/datepickercontrol.css" rel="stylesheet" type="text/css">
<script language="JavaScript"  src="../../lib/general/datepickercontrol.js"></script>
<script language="JavaScript"  src="../../lib/general/fecha.js"></script>
<style type="text/css">
<!--
.style1 {color: #0000CC}
-->
</style>
</head>
<body>
<?
require_once("../../lib/bd/basedatosAdo.php");
require_once("../../lib/general/funciones.php");
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
          <table width="612" align="center" cellspacing="0" bordercolor="#6699CC" class="grid_line01_tl">
            <tr bordercolor="#FFFFFF">
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>Traspasos y Rectificaciones
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
            <tr bordercolor="#6699CC">
              <td height="22" class="form_label_01"><strong>Codigo de Traslado:
                </strong></td>
              <td>
			 <?
			  	$tb=$bd->select("SELECT DISTINCT(REFTRA) as codtra  FROM CPTRASLA ORDER BY REFTRA");
			  ?>
                  <select name="codtra1" class="breadcrumb"  id="codtra1">
                    <?
				  	while(!$tb->EOF)
					{
				  ?>
                    <option value="<? print $tb->fields["codtra"];?>"><? print $tb->fields["codtra"];?></option>
                    <?
					$tb->MoveNext();
					}
				?>
                  </select>
              </td>
              <td>
			    <?
			  	$tb=$bd->select("SELECT DISTINCT(REFTRA) as codtra  FROM CPTRASLA ORDER BY REFTRA DESC");
			    ?>
                  <select name="codtra2" class="breadcrumb"  id="codtra2">
                    <?
				  	while(!$tb->EOF)
					{
				  ?>
                    <option value="<? print $tb->fields["codtra"];?>"><? print $tb->fields["codtra"];?></option>
                    <?
					$tb->MoveNext();
					}
				?>
                  </select>
              </td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"> <div align="left"><strong>Fecha de Traslado:</strong></div></td>
              <td> <div align="left"> </div>
                <div align="left">
                  <?
			  	$tb=$bd->select("SELECT to_char(MIN(FECTRA),'DD/MM/YYYY') as fecha FROM CPTRASLA");
				if(!$tb->EOF)
				{
					$fecini=$tb->fields["fecha"];
				}
			  	$tb2=$bd->select("SELECT to_char(MAX(FECTRA),'DD/MM/YYYY') as fecha FROM CPTRASLA");
				if(!$tb2->EOF)
				{
					$fecdes=$tb2->fields["fecha"];
				}

				?>
                  <input name="fectra1" type="text" class="breadcrumb" id="fectra1" value="<? print $fecini;?>" size="12" maxlength="12" datepicker="true">
                </div></td>
              <td><input name="fectra2" type="text" class="breadcrumb" id="fectra2" value="<? print $fecdes;?>" size="12" maxlength="12" datepicker="true"></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Periodo : </strong></td>
              <td>
                <?
			  	$tb=$bd->select("SELECT DISTINCT(pertra) as periodo FROM cptrasla ORDER BY pertra");
				//print $tb->GetMenu('pertra1','01',true,false,0,'class=breadcrumb');
               ?>
                <select name="pertra1" class="breadcrumb"  id="pertra1">
                  <?
				  	while(!$tb->EOF)
					{
				  ?>
                  <option value="<? print $tb->fields["periodo"];?>"><? print $tb->fields["periodo"];?></option>
                  <?
					$tb->MoveNext();
					}
				?>
                </select></td>
              <td>
                <?
			  	$tb=$bd->select("SELECT DISTINCT(pertra) as periodo FROM cptrasla ORDER BY pertra DESC");
				//print $tb->GetMenu('pertra2','12',true,false,0,'class=breadcrumb');
               ?>
                <select name="pertra2" class="breadcrumb"  id="pertra2">
                  <?
				  	while(!$tb->EOF)
					{
				  ?>
                  <option value="<? print $tb->fields["periodo"];?>"><? print $tb->fields["periodo"];?></option>
                  <?
					$tb->MoveNext();
					}
				?>
                </select></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Status:</strong></td>
              <td colspan="2"> <select name="estado" class="breadcrumb" id="estado">
                  <option value="Activo">Activo</option>
                  <option value="Anulado">Anulado</option>
               </select></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"> <div align="left"><strong>Codigo Presupuestario:</strong></div></td>
              <td> <div align="left">
			   <?

			  	$tb=$bd->select("SELECT CODPRE as cod FROM CPASIINI  WHERE  PERPRE='00' order by CODPRE asc");

			  ?>
                  <select name="codpre1" class="breadcrumb"  id="codpre1">
                    <?
				  	while(!$tb->EOF)
					{
				  ?>
                    <option value="<? print $tb->fields["cod"];?>"><? print $tb->fields["cod"];?></option>
                    <?
					$tb->MoveNext();
					}
				?>
                  </select>

                </div></td>
              <td> <div align="left">
			   <?
			  	$tb=$bd->select("SELECT CODPRE as cod FROM CPASIINI  WHERE  PERPRE='00' order by CODPRE desc");
			   ?>
                  <select name="codpre2" class="breadcrumb" id="select2">
                    <?
				  	while(!$tb->EOF)
					{
				  ?>
                    <option value="<? print $tb->fields["cod"];?>"><? print $tb->fields["cod"];?></option>
                    <?
					$tb->MoveNext();
					}
				?>
                  </select>
                </div></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"> <div align="left"><strong>Filtro:</strong></div></td>
              <td colspan="2"> <div align="left"></div>
                <div align="left">
                  <input name="comodin" type="text" class="breadcrumb" id="comodin" value="%%" size="60">
                  <input name="sqls" type="hidden" id="sqls">
                </div></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td colspan="3" class="form_label_01">Este ejemplo listara, tTraspasos y Rectificacionesodo
                los codigos que en su sexto nivel contengan 401 y en el d&eacute;cimo
                un 002</td>
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
	f.titulo.value="Traspasos y Rectificaciones";
	  f.action="r.php?m=<?php echo TraerModuloReporte()?>&r=<?php echo TraerNombreReporte()?>";                                    //CAMBIAR NOMBRE DEL REPORTE
	f.submit();
}
function cerrar()
{
	window.close();
}
function catalogo1()
{
 	pagina="catalogoform.php?campo=codpre1&sql=select codpre as campo1 from cpasiini order by codpre asc";
	window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=300,height=200,rezizable=yes, left=100,top=100");
}
function catalogo2()
{
 	pagina="catalogoform.php?campo=codpre2&sql=select codpre as campo1 from cpasiini order by codpre desc";
	window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=300,height=200,rezizable=yes, left=100,top=100");
}
</script>
<? $bd->closed();?>
<?$bd->closed();?>
	</html>

