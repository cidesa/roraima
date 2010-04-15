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
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>Listado de Ingresos
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
			  <td class="form_label_01"><strong>Nro. del Ingreso:</strong></td>
              <td><input name="numing1" type="text" class="breadcrumb" id="numing1"
              value="<?$sql="SELECT min(refing) as refing FROM CIREGING";
              LlenarTextoSql($sql,"refing",$bd); ?>" size ="20"> <input type="button" name="Button5" value="..." onClick=" catalogo('numing1','1');"></td>
              <td><input name="numing2" type="text" class="breadcrumb" id="numing2"
              value="<?$sql="SELECT max(refing) as refing FROM CIREGING";
              LlenarTextoSql($sql,"refing",$bd); ?>" size ="20"> <input type="button" name="Button6" value="..." onClick=" catalogo('numing2','0');"></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Contribuyente:</strong></td>
              <td><input name="rifcon1" type="text" value="<?
				$sql="SELECT MIN(RIFCON) as rifcon FROM CICONREP";
                LlenarTextoSql($sql,"rifcon",$bd);
				?>" class="breadcrumb" id="rifcon1" size="20">
                <input type="button" name="Button3" value="..." onClick="catalogo3('rifcon1','1');"></td>
				<td><input name="rifcon2" type="text" value="<?
				$sql="SELECT MAX(RIFCON) as rifcon FROM CICONREP";
                LlenarTextoSql($sql,"rifcon",$bd);
				?>" class="breadcrumb" id="rifcon2" size="20">
                <input type="button" name="Button4" value="..." onClick="catalogo3('rifcon2','0');">
              </td>
            </tr>
           <tr bordercolor="#FFFFFF">
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Fecha de Ingreso:</strong></td>
              <td><input name="fecing1" type="text" value="<?
				$sql="Select to_char(min(FECING),'dd/mm/yyyy') as fecing from CIREGING";
                LlenarTextoSql($sql,"fecing",$bd);
				?>" id="fecing1" size="27" maxlength="10" datepicker="true" class="breadcrumb"></td>
                <td><input name="fecing2" type="text" value="<?
				$sql="Select to_char(max(FECING),'dd/mm/yyyy') as fecing from CIREGING";
                LlenarTextoSql($sql,"fecing",$bd);
				?>" id="fecing2" size="27" maxlength="10" datepicker="true" class="breadcrumb">
               </td>
			  </tr>
			 <tr bordercolor="#FFFFFF">
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Tipo de Ingreso: </strong></td>
              <td>
			    <?
			  	$tb=$bd->select("SELECT DISTINCT(CODTIP) as tip, DESTIP as nom FROM CITIPING");
			    ?>
                  <select name="tiping1" class="breadcrumb"  id="tiping1">
                    <?
				  	while(!$tb->EOF)
					{
				  ?>
                    <option value="<? print $tb->fields["tip"];?>"><? print $tb->fields["nom"];?></option>
                    <?
					$tb->MoveNext();
					}
				?>
				</select>
              </td>
              <td>
		       <?
			  	$tb=$bd->select("SELECT DISTINCT(CODTIP) as tip, DESTIP as nom FROM CITIPING ORDER BY CODTIP DESC");
			    ?>
                  <select name="tiping2" class="breadcrumb"  id="tiping2">
                    <?
				  	while(!$tb->EOF)
					{
				  ?>
                    <option value="<? print $tb->fields["tip"];?>"><? print $tb->fields["nom"];?></option>
                    <?
					$tb->MoveNext();
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
              <td class="form_label_01"><strong>Codigo Presupuestario:</strong></td>
              <td><input name="codpre1" type="text" value="<?
				$sql="SELECT min(a.codpre) as codpre FROM cideftit a, cidefniv b where Length(RTRIM(a.codpre))=Length(RTRIM(b.Forpre))";
                LlenarTextoSql($sql,"codpre",$bd);
				?>" class="breadcrumb" id="codpre1" size="20">
                <input type="button" name="Button1" value="..." onClick="catalogo2('codpre1','1');"></td>
           	  <td><input name="codpre2" type="text" value="<?
				$sql="SELECT max(a.codpre) as codpre FROM cideftit a, cidefniv b where Length(RTRIM(a.codpre))=Length(RTRIM(b.Forpre))";
                LlenarTextoSql($sql,"codpre",$bd);
				?>" class="breadcrumb" id="codpre2" size="20">
                <input type="button" name="Button2" value="..." onClick="catalogo2('codpre2','0');">
              </td>
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
	f.titulo.value="Listado de Ingresos";
	f.action="rinrlising.php";
	f.submit();
}
function cerrar()
{
	window.close();
}
function catalogo(campo,valor)
{
	if (valor=='1')
	{
      mysql='SELECT refing as Referencia, desing as Descripcion FROM CIREGING order by refing';
	}
	else
	{
	  mysql='SELECT refing as Referencia, desing as Descripcion FROM CIREGING order by refing desc';
	}
	pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
}

function catalogo2(campo,valor)
{
	if (valor=='1')
	{
      mysql='SELECT a.codpre as Codigo, a.nompre as Descripcion FROM cideftit a, cidefniv b where Length(RTRIM(a.codpre))=Length(RTRIM(b.Forpre)) order by codpre';
	}
	else
	{
	  mysql='SELECT a.codpre as Codigo, a.nompre as Descripcion FROM cideftit a, cidefniv b where Length(RTRIM(a.codpre))=Length(RTRIM(b.Forpre)) order by codpre desc';
	}
	pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
}

function catalogo3(campo,valor)
{
	if (valor=='1')
	{
      mysql='SELECT RIFCON as Rif, NOMCON as Nombre FROM CICONREP order by RIFCON';
	}
	else
	{
	  mysql='SELECT RIFCON as Rif, NOMCON as Nombre FROM CICONREP order by RIFCON desc';
	}
	pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
}
</script>
</html>
