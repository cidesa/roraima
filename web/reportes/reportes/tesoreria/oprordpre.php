<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>SIGA Reportes </title>
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

$ordcomdes="";
$ordcomdhas="";
$codprodes="";
$codprohas="";
$codartdes="";
$codarthas="";
$desartdes="";
$desarthas="";
$fecorddes="";
$fecordhas="";
$satus="Ambos";


global $ordcomdes;
global $ordcomdhas;
global $codprodes;
global $codprohas;
global $codartdes;
global $codarthas;
global $desartdes;
global $desarthas;
global $fecorddes;
global $fecordhas;
global $satus;
$bd=new basedatosAdo();
$bd->validar();
 function LlenarComboSql($sql,$campo1,$campo2,$seleccionado,$con)
  {
     $tb=$con->select($sql);
	 while (!($tb->EOF))
	 {
	   if ($tb->fields[$campo1]==$seleccionado)
	      {
	   ?>
	      <option value="<? print $tb->fields[$campo1];?>" selected><? print $tb->fields[$campo2];?></option>
	   <?
	      }
	   else
	      {
	   ?>
	      <option value="<? print $tb->fields[$campo1];?>"><? print $tb->fields[$campo2];?></option>
	   <?
		  }
	   $tb->MoveNext();
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
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>ORDEN DE PAGO
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

          <!--  <tr>
              <td class="form_label_01"><div align="left"><strong>Seg&uacute;n
                Decreto N&ordm; </strong></div></td>
              <td colspan="2"><div align="left"> </div>
                  <div align="left">
                    <input name="decreto" type="text" class="breadcrumb" id="decreto" value="1080" size="20" maxlength="8">
                </div></td>
            </tr>-->
            <tr>
              <td class="form_label_01"><div align="left"><strong>Orden de Pago </strong></div></td>
              <td><div align="left"> </div>
                  <div align="left">
                    <input name="ordpagdes" type="text" value="<?
				$sql="Select min(numord) as numord from opordpag";
                LlenarTextoSql($sql,"numord",$bd);
				?>" class="breadcrumb" id="ordpagdes" size="20" maxlength="8">
                    <input type="button" name="Button" value="..." onClick="catalogo3('ordpagdes');">
                </div></td>
              <td><input name="ordpaghas" type="text" value="<?
				$sql="Select max(numord) as numord from opordpag";
                LlenarTextoSql($sql,"numord",$bd);
				?>" class="breadcrumb" id="ordpaghas" size="20" maxlength="8">
                  <input type="button" name="Button2" value="..." onClick="catalogo3('ordpaghas');"></td>


                 <tr>
              <td class="form_label_01"><div align="left"><strong>Beneficiario:</strong></div></td>
              <td><div align="left">
                <input name="codprodes" type="text"  value="<?
				$sql="SELECT min(cedrif) as cedrif FROM OPORDPAG";
                LlenarTextoSql($sql,"cedrif",$bd);
				?>" class="breadcrumb" id="codprodes" size="20" maxlength="50">
                <input type="button" name="Button3" value="..." onClick="catalogo('codprodes');">
              </div></td>
              <td><input name="codprohas" type="text" value="<?
				$sql="SELECT max(cedrif) as cedrif FROM OPORDPAG";
                LlenarTextoSql($sql,"cedrif",$bd);
				?>" class="breadcrumb" id="codprohas" size="20" maxlength="50">
              <input type="button" name="Button2" value="..." onClick="catalogo('codprohas');"></td>
            </tr>



            <tr>
              <td class="form_label_01"><div align="left"><strong>Tipo de Orden
                :</strong></div></td>
              <td><div align="left"> </div>
                  <div align="left">
                    <select name="tiporddes" class="breadcrumb" id="tiporddes">
                       <option value="" selected>TODOS</option>
                      <?
            	  $sql="SELECT DISTINCT A.TIPCAU,SUBSTR(B.NOMEXT,1,45) AS NOMEXT FROM OPORDPAG A,CPDOCCAU B WHERE A.TIPCAU=B.TIPCAU ORDER BY A.TIPCAU;";
	              LlenarComboSql($sql,"tipcau","nomext",$codorddes,$bd);
            	  ?>
                    </select>
                </div></td>
              <td><select name="tipordhas" class="breadcrumb" id="tipordhas">
               <option value="" selected>TODOS</option>
                  <?
            	  $sql="SELECT DISTINCT A.TIPCAU,SUBSTR(B.NOMEXT,1,45) AS NOMEXT FROM OPORDPAG A,CPDOCCAU B WHERE A.TIPCAU=B.TIPCAU ORDER BY A.TIPCAU desc;";
	              LlenarComboSql($sql,"tipcau","nomext",$codordhas,$bd);
            	  ?>
              </select></td>
            </tr>
            <tr>
              <td class="form_label_01"><div align="left"><strong>Fecha:</strong></div></td>
              <td><div align="left">
                  <input name="fecorddes" type="text" value="<?
				$sql="Select to_char(min(fecemi),'dd/mm/yyyy') as fecord from opordpag";
                LlenarTextoSql($sql,"fecord",$bd);
				?>" id="fecorddes" size="12" maxlength="10" datepicker="true" class="breadcrumb">
              </div></td>
              <td><input name="fecordhas" type="text" value="<?
				$sql="Select to_char(max(fecemi),'dd/mm/yyyy') as fecord from opordpag";
                LlenarTextoSql($sql,"fecord",$bd);
				?>" id="fecordhas" size="12" maxlength="10" datepicker="true" class="breadcrumb"></td>
            </tr>
            <tr>
              <td class="form_label_01"><div align="left"><strong>Status:</strong></div></td>
              <td colspan="2"><div align="left"> </div>
                  <div align="left">
                    <select name="status" class="breadcrumb" id="status">
                      <option value="Todas">Todas</option>
                      <option value="Pagadas">Pagadas</option>
                      <option value="No Pagadas">No Pagadas</option>
                      <option value="Anuladas">Anuladas</option>
                    </select>
                </div></td>
            </tr>
            <tr>
              <td class="form_label_01"><div align="left"><strong>Coordinacion:</strong></div></td>
              <td colspan="2"><div align="left"> </div>
                  <div align="left">
                    <select name="coordinacion" class="breadcrumb" id="coordinacion">
                      <option value="N">Ninguna</option>
                      <option value="C">Compras</option>
                      <option value="R">Recusrsos Humanos</option>
                    </select>
                </div></td>
            </tr>
			 <tr>

              <td class="form_label_01"> <div align="left">
                  <p><strong> ANALISTA DE PRESUPUESTO: </strong></p>
                </div></td>
              <td colspan="2"> <div align="left"><strong>
                  <input name="responsable" type="text" class="breadcrumb" id="responsable"  size="60" value="">
                  </strong> </div></td>
            </tr>
             <tr>
              <td class="form_label_01"> <div align="left">
                  <p><strong> JEFE DE LA OFICINA:</strong></p>
                </div></td>
              <td colspan="2"> <div align="left"><strong>
                  <input name="elaborado" type="text" class="breadcrumb" id="elaborado"  size="60" value="">
                  </strong> </div></td>
            </tr>
			<tr>
              <td class="form_label_01"> <div align="left">
                  <p><strong> ANALISTA FINANZAS:</strong></p>
                </div></td>
              <td colspan="2"> <div align="left"><strong>
                  <input name="conformado" type="text" class="breadcrumb" id="conformado"  size="60" value="">
                  </strong> </div></td>
            </tr>
			<tr>
              <td class="form_label_01"> <div align="left">
                  <p><strong> DIRECTOR(A) DE ADM. Y FINANZAS:</strong></p>
                </div></td>
              <td colspan="2"> <div align="left"><strong>
                  <input name="aprobado" type="text" class="breadcrumb" id="aprobado"  size="60" value="ESTHER NORELIA PEREZ">
                  </strong> </div></td>
            </tr>
			<tr>
              <td class="form_label_01"> <div align="left">
                  <p><strong>CONTRALOR MUNICIPAL :</strong></p>
                </div></td>
              <td colspan="2"> <div align="left"><strong>
                  <input name="presidencia" type="text" class="breadcrumb" id="presidencia"  size="60" value="RAFAEL SAEZ">
                  </strong> </div></td>
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
  f.action="roprordpre.php";
  f.submit();
}
function cerrar()
{
	window.close();
}


function catalogo(campo)
   {
      mysql='select  distinct(b.cedrif), b.nomben as nomben from opordpag a,opbenefi b where trim(a.cedrif)=trim(b.cedrif) order by b.nomben';
	  pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	  window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }

function catalogo3(campo)
   {
      mysql='SELECT DISTINCT(NUMORD) as Numero FROM OPORDPAG ORDER BY NUMORD';
	   pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	  window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }


</script>
<script language="JavaScript" src="datepickercontrol.js"></script>
</html>