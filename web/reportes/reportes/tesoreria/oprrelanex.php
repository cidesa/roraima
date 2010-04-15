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
#$bd->validar();

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
          <table width="647"  border="0" align="center" cellspacing="0" bordercolor="#6699CC" class="grid_line01_tl">
            <tr bordercolor="#FFFFFF">
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>ORDEN DE PAGO <br>
                (RELACI&Oacute;N ANEXA)
                      <input name="titulo" type="hidden" id="titulo">
</strong></font></div></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01">&nbsp;</td>
              <td>&nbsp;</td>
              <td><font color="#00FFCC">&nbsp; </font></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td width="150" class="form_label_01"><strong>Tama&ntilde;o Hoja:</strong></td>
              <td width="218"> <input name="tamano" type="text" class="breadcrumb" id="tamano" readonly="true"></td>
              <td width="272">&nbsp;</td>
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
              <td class="form_label_01"><div align="left"><strong>Nro. Orden de Pago </strong></div></td>
              <td><div align="left"> </div>
                  <div align="left">
                    <input name="nroorddes" type="text" value="<?
				$sql="Select min(numord) as numord from opordpag";
                LlenarTextoSql($sql,"numord",$bd);
				?>" class="breadcrumb" id="nroorddes" size="20" maxlength="8">
                    <input type="button" name="Button" value="..." onClick="catalogo3('nroorddes');">
                </div></td>
              <td><input name="nroordhas" type="text" value="<?
				$sql="Select max(numord) as numord from opordpag";
                LlenarTextoSql($sql,"numord",$bd);
				?>" class="breadcrumb" id="nroordhas" size="20" maxlength="8">
                  <input type="button" name="Button2" value="..." onClick="catalogo3('nroordhas');"></td>


    <tr>
              <td class="form_label_01"><div align="left"><strong>Beneficiario:</strong></div></td>
              <td><div align="left">
                <input name="bendes" type="text"  value="<?
				$sql="SELECT min(cedrif) as cedrif FROM OPORDPAG";
                LlenarTextoSql($sql,"cedrif",$bd);
				?>" class="breadcrumb" id="bendes" size="20" maxlength="50">
                <input type="button" name="Button3" value="..." onClick="catalogo('bendes');">
              </div></td>
              <td><input name="benhas" type="text" value="<?
				$sql="SELECT max(cedrif) as cedrif FROM OPORDPAG";
                LlenarTextoSql($sql,"cedrif",$bd);
				?>" class="breadcrumb" id="benhas" size="20" maxlength="50">
              <input type="button" name="Button2" value="..." onClick="catalogo('benhas');"></td>
            </tr>



            <tr bordercolor="#6699CC">
              <td class="form_label_01"> <div align="left"><strong>Fecha:</strong></div></td>
              <td> <div align="left">
                <?
				$tb=$bd->select("select distinct to_char(fecemi,'dd/mm/yyyy') as fecemi from opordpag order by fecemi desc");
			  ?>
                <select name="fechades" class="breadcrumb" id="fechades">
                  <?
				  	while(!$tb->EOF)
					{
				  ?>
                  <option value="<? print $tb->fields["fecemi"];?>"><? print $tb->fields["fecemi"]; ?></option>
                  <?
					$tb->MoveNext();
					}
				?>
                </select>
              </div>
              <div align="left">              </div></td>
              <td><?
				$tb=$bd->select("select distinct to_char(fecemi,'dd/mm/yyyy') as fecemi from opordpag order by fecemi asc");
			  ?>
                <select name="fechahas" class="breadcrumb" id="fechahas">
                <?
				  	while(!$tb->EOF)
					{
				  ?>
                <option value="<? print $tb->fields["fecemi"];?>"><? print $tb->fields["fecemi"]; ?></option>
                <?
					$tb->MoveNext();
					}
				?>
              </select></td>
            </tr>

            <tr bordercolor="#6699CC">
              <td class="form_label_01"> <div align="left"><strong>Tipo Orden:</strong></div></td>
              <td> <div align="left">
                <?
				$tb=$bd->select("select distinct(tipcau) as tipcau  from opordpag order by tipcau");
			  ?>
                <select name="tipcaudes" class="breadcrumb" id="tipcaudes">
                  <?
				  	while(!$tb->EOF)
					{
				  ?>
                  <option value="<? print $tb->fields["tipcau"];?>"><? print $tb->fields["tipcau"]; ?></option>
                  <?
					$tb->MoveNext();
					}
				?>
                </select>
              </div>
              <div align="left">              </div></td>
              <td><?
				$tb=$bd->select("select distinct(tipcau) as tipcau  from opordpag order by tipcau desc");
			  ?>
                <select name="tipcauhas" class="breadcrumb" id="tipcauhas">
                <?
				  	while(!$tb->EOF)
					{
				  ?>
                <option value="<? print $tb->fields["tipcau"];?>"><? print $tb->fields["tipcau"]; ?></option>
                <?
					$tb->MoveNext();
					}
				?>
              </select></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"> <div align="left"><strong>Status:</strong></div></td>
              <td colspan="2"> <div align="left">
                <select name="status" class="breadcrumb" id="status">
                  <option value="1">Todas</option>
                  <option value="2">Pagadas</option>
                  <option value="3">Anuladas</option>
                  <option value="4">Pendiente por Pagar</option>
                  <option value="5">Elaborada</option>
                  <option value="6">Caja</option>
                </select>
              </div>
              <div align="left">              </div></td>
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
	f.titulo.value="Relación Anexa";
	f.action="roprrelanex.php";
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


function catalogo(campo)
   {
      mysql='select distinct(b.nomben) as nomben from opordpag a,opbenefi b where trim(a.cedrif)=trim(b.cedrif) order by b.nomben';
	  pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	  window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }

function catalogo2()
{
 	pagina="../../lib/general/catalogoform.php?campo=codhasta&sql=select codemp as campo1 from nphojint order by codemp desc";
	window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=300,height=200,rezizable=yes, left=100,top=100");
}

function catalogo3(campo)
   {
      mysql='SELECT DISTINCT(NUMORD) as Numero FROM OPORDPAG ORDER BY NUMORD';
	   pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	  window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }

</script>
</html>
