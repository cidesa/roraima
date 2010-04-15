<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>SIGA Reportes</title>
<link href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
<link href="../../lib/css/datepickercontrol.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="../../lib/general/datepickercontrol.js"></script>
<script language="JavaScript" src="../../lib/general/fecha.js"></script>
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
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>Compromisos por Beneficiario
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
              <td height="22" bordercolor="#FFFFFF" class="form_label_01">&nbsp;</td>
              <td><strong>DESDE</strong></td>
              <td><strong>HASTA</strong></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"> <div align="left"><strong>Nro. del Compromiso
                  :</strong></div></td>
              <td> <div align="left">
                <?
			  	$tb=$bd->select("SELECT REFCOM  as ref FROM CPCOMPRO ORDER BY REFCOM ASC");
			    ?>
                  <select name="numcom1" class="breadcrumb"  id="numcom1">
                    <?
				  	while(!$tb->EOF)
					{
				  ?>
                    <option value="<? print $tb->fields["ref"];?>"><? print $tb->fields["ref"];?></option>
                    <?
					$tb->MoveNext();
					}
				?>
                  </select>
                </div></td>
              <td>
			   <?
			  	$tb=$bd->select("SELECT REFCOM as ref FROM CPCOMPRO ORDER BY REFCOM DESC");
			    ?>
                  <select name="numcom2" class="breadcrumb"  id="numcom2">
                    <?
				  	while(!$tb->EOF)
					{
				  ?>
                    <option value="<? print $tb->fields["ref"];?>"><? print $tb->fields["ref"];?></option>
                    <?
					$tb->MoveNext();
					}
				?>
                  </select>              </td>
            </tr>
<!------------------------------------------------------------------------------------ -->
            <tr bordercolor="#6699CC">
              <td class="form_label_01"> <div align="left"><strong>Beneficiario:</strong></div></td>
              <td> <div align="left">
                  <input name="bendes" type="text" class="breadcrumb" id="bendes"
                   value="<?$sql="SELECT cedrif as cod FROM OPBENEFI where trim(cedrif)<>trim('') ORDER BY cedrif";
 					LlenarTextoSql($sql,"cod",$bd); ?>" size ="20">
 					 <input type="button" name="Button1" value="..." onClick=" catalogo1('bendes');">
                </div></td>
              <td>
                  <input name="benhas" type="text" class="breadcrumb" id="benhas"
                   value="<?$sql="SELECT cedrif as cod FROM OPBENEFI ORDER BY cedrif DESC";
 					LlenarTextoSql($sql,"cod",$bd); ?>" size ="20">
 					 <input type="button" name="Button2" value="..." onClick=" catalogo2('benhas');">
                </td>

				</td>
            </tr>
<!------------------------------------------------------------------------------------------------------- -->
            <tr bordercolor="#6699CC">
              <td class="form_label_01"> <div align="left"><strong>Fecha del Compromiso
                  :</strong></div></td>
              <td> <div align="left"> </div>
                <div align="left">
                  <?
			  	$tb=$bd->select("SELECT to_char(MIN(FECCOM),'DD/MM/YYYY') as fecha FROM CPCOMPRO");
				if(!$tb->EOF)
				{
					$fecini=$tb->fields["fecha"];
				}
			  	$tb2=$bd->select("SELECT to_char(MAX(FECCOM),'DD/MM/YYYY') as fecha FROM CPCOMPRO");
				if(!$tb2->EOF)
				{
					$fecdes=$tb2->fields["fecha"];
				}

				?>
                  <input name="feccom1" type="text" class="breadcrumb" id="feccom1" value="<? print $fecini;?>" size="12" maxlength="12" datepicker="true">
                </div></td>
              <td><input name="feccom2" type="text" class="breadcrumb" id="feccom2" value="<? print $fecdes;?>" size="12" maxlength="12" datepicker="true"></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Tipo de Compromiso: </strong></td>
              <td>
			    <?
			  	$tb=$bd->select("SELECT DISTINCT(TIPCOM) as tip, NOMABR as nom FROM CPDOCCOM");
			    ?>
                  <select name="tipcom1" class="breadcrumb"  id="tipcom1">
                    <?
				  	while(!$tb->EOF)
					{
				  ?>
                    <option value="<? print $tb->fields["tip"];?>"><? print $tb->fields["nom"];?></option>
                    <?
					$tb->MoveNext();
					}
				?>
				</select>              </td>
              <td>
		       <?
			  	$tb=$bd->select("SELECT DISTINCT(TIPCOM) as tip, NOMABR as nom FROM CPDOCCOM ORDER BY TIPCOM DESC");
			    ?>
                  <select name="tipcom2" class="breadcrumb"  id="tipcom2">
                    <?
				  	while(!$tb->EOF)
					{
				  ?>
                    <option value="<? print $tb->fields["tip"];?>"><? print $tb->fields["nom"];?></option>
                    <?
					$tb->MoveNext();
					}
				?>
				</select>              </td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Status:</strong></td>
              <td colspan="2"> <select name="estado" class="breadcrumb" id="estado">
                  <option>Activo</option>
                  <option>Anulado</option>
                  <option>Todos</option>
                </select></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"> <div align="left"><strong>Codigo Presupuestario
                  :</strong></div></td>
              <td> <div align="left">
                  <?
			  	$tb=$bd->select("select cpi.codpre as cod from cpimpcom as cpi, cpcompro as cpc where cpi.refcom=cpc.refcom  order by cpi.codpre asc");
			  ?>
                  <select name="codpre1" class="breadcrumb" id="codpre1">
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
			  	//$tb=$bd->select("SELECT MAX(CODPRE) as cod2  FROM CPIMPCOM");
				$tb=$bd->select("select cpi.codpre as cod2 from cpimpcom as cpi, cpcompro as cpc where cpi.refcom=cpc.refcom order by cpi.codpre desc");
			  ?>
                  <select name="codpre2" class="breadcrumb" id="codpre2">
                    <?
				  	while(!$tb->EOF)
					{
				  ?>
                    <option value="<? print $tb->fields["cod2"];?>" ><? print $tb->fields["cod2"];?></option>
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
                  <input name="comodin" type="text" class="breadcrumb" id="comodin" value="%%" size="75">
                  <input name="sqls" type="hidden" id="sqls">
                </div></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td colspan="3" class="form_label_01">Este ejemplo listara, todo
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
      <td height="257" align="left" valign="bottom" class="cell_left_line02"><img src="../../img/center02_bl.gif" width="6" height="6"></td>
      <td align="right" valign="bottom"><img src="../../img/center01_br.gif" width="6" height="6"></td>
    </tr>
  </table>
</form>
</body>
<script language="javascript">
function enviar()
{
	f=document.form1;
	f.titulo.value="Compromisos";
	f.action="rprecomben.php";
	f.submit();
}
function cerrar()
{
	window.close();
}

function catalogo(campo)
   {
    mysql='select distinct(refaju),desaju from cpajuste order by refaju';
    pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
    window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }

   function catalogo1(campo)
   {
      mysql='SELECT cedrif as cod , nomben as des FROM OPBENEFI ORDER BY nomben ASC';
	  pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	  window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }

   function catalogo2(campo)
   {
      mysql='SELECT cedrif as cod ,nomben as des FROM OPBENEFI ORDER BY nomben DESC';
	  pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	  window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }
</script>
</html>
