<!--  Programado  por Jaime Su�rez -->
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
          <table width="647"  border="0" align="center" cellspacing="0" bordercolor="#6699CC" class="grid_line01_tl">
            <tr bordercolor="#FFFFFF">
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>Criterios de Selecci&oacute;n para el Listado por Concepto 5% de Ctas. de Ahorro Docentes
                      <input name="titulo" type="hidden" id="titulo">
</strong></font></div></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01">&nbsp;</td>
              <td>&nbsp;</td>
              <td><font color="#00FFCC">&nbsp; </font></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td width="194" class="form_label_01"><strong>Tama&ntilde;o Hoja:</strong></td>
              <td width="195"> <input name="tamano" type="text" class="breadcrumb" id="tamano" readonly="true"></td>
              <td width="244">&nbsp;</td>
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
              <td class="form_label_01"> <div align="left">
                <p><strong>C&oacute;digo Empleado:</strong></p>
              </div></td>
              <td> <div align="left">
                  <?

				$tb=$bd->select("Select min(codemp) as codemp from npnomcal ");//este codigo iba en el WHERE: where codnom='009'
			  ?>
                  <select name="codempdes" class="breadcrumb" id="codempdes">
                    <?
				  	while(!$tb->EOF)
					{
				  ?>
                    <option value="<? print $tb->fields["codemp"];?>"><? print $tb->fields["codemp"]; ?></option>
                    <?
					$tb->MoveNext();
					}
				?>
                  </select>
                </div></td>
              <td>
                <?
				$tb=$bd->select("Select max(codemp) as codemp from npnomcal");//este codigo iba en el WHERE: where codnom='009'
			  ?>
                <select name="codemphas" class="breadcrumb" id="codemphas">
                  <?
				  	while(!$tb->EOF)
					{
				  ?>
                  <option value="<? print $tb->fields["codemp"];?>"><? print $tb->fields["codemp"]; ?></option>
                  <?
					$tb->MoveNext();
					}
				?>
                </select>
</td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"> <div align="left"><strong>Cargo:</strong></div></td>
              <td> <div align="left">
			    <?
				$tb=$bd->select("Select min(codcar) as codcar from npnomcal");//este codigo iba en el WHERE: where codnom='009'
			  ?>
                <select name="codcardes" class="breadcrumb" id="select8">
                  <?
				  	while(!$tb->EOF)
					{
				  ?>
                  <option value="<? print $tb->fields["codcar"];?>"><? print $tb->fields["codcar"]; ?></option>
                  <?
					$tb->MoveNext();
					}
				?>
                </select>
              </div></td>
              <td> <div align="left">
			    <?

				$tb=$bd->select("Select max(codcar) as codcar from npnomcal");//este codigo iba en el WHERE: where codnom='009'
			  ?>
                <select name="codcarhas" class="breadcrumb" id="codcarhas">
                  <?
				  	while(!$tb->EOF)
					{
				  ?>
                  <option value="<? print $tb->fields["codcar"];?>"><? print $tb->fields["codcar"]; ?></option>
                  <?
					$tb->MoveNext();
					}
				?>
                </select>
</div></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"> <div align="left"><strong>Centro  de Pago:</strong></div></td>
              <td> <div align="left">
			    <?
				$tb=$bd->select("Select distinct codban, nomban from npbancos order by codban");
			  ?>
                <select name="bancodes" class="breadcrumb" id="bancodes">
                  <?
				  	while(!$tb->EOF)
					{
				  ?>
                  <option value="<? print $tb->fields["codban"];?>"><? print $tb->fields["codban"]." - ".substr($tb->fields["nomban"],'0','25'); ?></option>
                  <?
					$tb->MoveNext();
					}
				?>
                </select>
</div></td>
              <td> <div align="left">
			    <?
				$tb=$bd->select("Select distinct codban, nomban from npbancos order by codban desc");
			  ?>
                <select name="bancohas" class="breadcrumb" id="bancohas">
                  <?
				  	while(!$tb->EOF)
					{
				  ?>
                  <option value="<? print $tb->fields["codban"];?>"><? print $tb->fields["codban"]." - ".substr($tb->fields["nomban"],'0','25'); ?></option>
                  <?
					$tb->MoveNext();
					}
				?>
                </select>
</div></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"> <div align="left"><strong>Categoria Presupuestaria:</strong></div></td>
              <td colspan="2"> <div align="left">
                </div> <div align="left">
				<?
					$tb1=$bd->select("SELECT rtrim(codcat) as codcat, nomcat from npcatpre order by codcat");//este codigo iba en el WHERE:  where char_length(rtrim(codcat))='11'
				?>
                  <select name="codcatdes" class="breadcrumb" id="codcatdes">
				  <?
				  	while(!$tb1->EOF)
					{
				  ?>
				  <option value="<? print $tb1->fields["codcat"];?>"><? print $tb1->fields["codcat"].' - '.$tb1->fields["nomcat"];?></option>
				  <?
				  		$tb1->MoveNext();
					}
				  ?>
                  </select>
                </div></td>
            </tr>
            <tr>
              <td class="form_label_01">
                <div align="left"></div></td>
              <td colspan="2">
                <div align="left"> </div>
                <div align="left">
                  <?
					$tb2=$bd->select("SELECT rtrim(codcat) as codcat, nomcat FROM npcatpre  ORDER BY codcat DESC");//este codigo iba en el WHERE:  where char_length(rtrim(codcat))='11'
				?>
                  <select name="codcathas" class="breadcrumb" id="codcathas">
                    <?
				  	while(!$tb2->EOF)
					{
				  ?>
                    <option value="<? print $tb2->fields["codcat"];?>"><? print $tb2->fields["codcat"].' - '.$tb2->fields["nomcat"];?></option>
                    <?
				  		$tb2->MoveNext();
					}
				  ?>
                  </select>
              </div></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Concepto para 5% Ctas. de Ahorro:</strong></td>
              <td colspan="2">
				<?
					$tb2=$bd->select("SELECT distinct(codcon) as codcon FROM npnomcal");//este codigo iba en el WHERE:   where CODNOM='009'
				?>
                <select name="codconhas" class="breadcrumb" id="codconhas">
                  <?
				  	while(!$tb2->EOF)
					{
				  ?>
                  <option value="<? print $tb2->fields["codcon"];?>"><? print $tb2->fields["codcon"];?></option>
                  <?
				  		$tb2->MoveNext();
					}
				  ?>
                </select></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"> <div align="left"><strong>Per&iacute;odo de N&oacute;mina:</strong></div></td>
              <td> <div align="left">
                <input name="pernomdes" type="text" class="breadcrumb" id="pernomdes" value="" >
                </div></td>
              <td> <div align="left">
                <input name="pernomhas" type="text" class="breadcrumb" id="pernomhas" value="">
                </div></td>
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
	f.titulo.value="Listado por Concepto 5% Ctas. de Ahorro para Docentes";
	f.action="rnprlistconcdoc.php";
	f.submit();
}
function cerrar()
{
	window.close();
}
function catalogo1()
{
 	pagina="../../lib/general/catalogoform.php?campo=codesde&sql=select codemp as campo1 from nphojint order by codemp asc";
	window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=300,height=200,rezizable=yes, left=100,top=100");
}
function catalogo2()
{
 	pagina="../../lib/general/catalogoform.php?campo=codhasta&sql=select codemp as campo1 from nphojint order by codemp desc";
	window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=300,height=200,rezizable=yes, left=100,top=100");
}
</script>
</html>
