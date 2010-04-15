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


$empdes="";
$emphas="";
$cardes="";
$carhas="";
$nivdes="";
$nivhas="";
$condes="";
$conhas="";
$revisado="";
$autorizado="";
$elaborado="";
$tipnomdes="";
$tipnomesp="";


global $empdes;
global $emphas;
global $cardes;
global $carhas;
global $nivdes;
global $nivhas;
global $condes;
global $conhas;
global $revisado;
global $autorizado;
global $elaborado;
global $tipnomdes;
global $tipnomesp;

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
          <table width="647"  border="0" align="center" cellspacing="0" bordercolor="#6699CC" class="grid_line01_tl">
            <tr bordercolor="#FFFFFF">
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>Historico Nomina Para la Firma por Nivel
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
              <td width="181"> <input name="tamano" type="text" class="breadcrumb" id="tamano" readonly="true"></td>
              <td width="258">&nbsp;</td>
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
              <td class="form_label_01"><div align="left"><strong>C&oacute;digo Empleado:</strong></div></td>
              <td><div align="left">
                <input name="empdes" type="text"  value="<?
        $sql="SELECT min(CODEMP) as codemp FROM NPASICAREMP";
                LlenarTextoSql($sql,"codemp",$bd);
        ?>" class="breadcrumb" id="empdes" size="20" maxlength="50">
                <input type="button" name="Button3" value="..." onClick="catalogo('empdes');">
              </div></td>
              <td><input name="emphas" type="text" value="<?
        $sql="SELECT max(CODEMP) as codemp FROM NPASICAREMP";
                LlenarTextoSql($sql,"codemp",$bd);
        ?>" class="breadcrumb" id="emphas" size="20" maxlength="50">
              <input type="button" name="Button2" value="..." onClick="catalogo('emphas');"></td>
            </tr>


              <tr>
              <td class="form_label_01"><div align="left"><strong>C&oacute;digo Cargo:</strong></div></td>
              <td><div align="left">
                <input name="cardes" type="text"  value="<?
        $sql="SELECT min(codcar) as codcar FROM NPASICAREMP where trim(codcar)!='' ";
                LlenarTextoSql($sql,"codcar",$bd);
        ?>" class="breadcrumb" id="cardes" size="20" maxlength="50">
                <input type="button" name="Button3" value="..." onClick="catalogo1('cardes');">
              </div></td>
              <td><input name="carhas" type="text" value="<?
        $sql="SELECT max(codcar) as codcar FROM NPASICAREMP";
                LlenarTextoSql($sql,"codcar",$bd);
        ?>" class="breadcrumb" id="carhas" size="20" maxlength="50">
              <input type="button" name="Button2" value="..." onClick="catalogo1('carhas');"></td>
            </tr>

      <tr>
              <td class="form_label_01"><div align="left"><strong>C&oacute;digo Nivel:</strong></div></td>
              <td><div align="left">
                <input name="nivdes" type="text"  value="<?
        $sql="SELECT min(CODNIV) as codniv FROM NPESTORG";
                LlenarTextoSql($sql,"codniv",$bd);
        ?>" class="breadcrumb" id="nivdes" size="20" maxlength="50">
                <input type="button" name="Button3" value="..." onClick="catalogo5('nivdes');">
              </div></td>
              <td><input name="nivhas" type="text" value="<?
        $sql="SELECT max(CODNIV) as codniv FROM NPESTORG";
                LlenarTextoSql($sql,"codniv",$bd);
        ?>" class="breadcrumb" id="nivhas" size="20" maxlength="50">
              <input type="button" name="Button2" value="..." onClick="catalogo5('nivhas');"></td>
            </tr>

      <tr>
              <td class="form_label_01"><div align="left"><strong>C&oacute;digo Concepto:</strong></div></td>
              <td><div align="left">
                <input name="condes" type="text"  value="<?
        $sql="SELECT min(CODCON) as codcon FROM NPASICONEMP";
                LlenarTextoSql($sql,"codcon",$bd);
        ?>" class="breadcrumb" id="condes" size="20" maxlength="50">
                <input type="button" name="Button3" value="..." onClick="catalogo2('condes');">
              </div></td>
              <td><input name="conhas" type="text" value="<?
        $sql="SELECT max(CODCON) as codcon FROM NPASICONEMP";
                LlenarTextoSql($sql,"codcon",$bd);
        ?>" class="breadcrumb" id="conhas" size="20" maxlength="50">
              <input type="button" name="Button2" value="..." onClick="catalogo2('conhas');"></td>
            </tr>


           <tr>
              <td class="form_label_01"><div align="left"><strong>Tipo de Nomina:</strong></div></td>
              <td><div align="left">
                <input name="tipnomdes" type="text"  value="<?
        $sql="SELECT min(CODNOM) as codnom from NPASICAREMP where trim(codnom)!=''";
                LlenarTextoSql($sql,"codnom",$bd);
        ?>" class="breadcrumb" id="tipnomdes" size="20" maxlength="50">
                <input type="button" name="Button3" value="..." onClick="catalogo3('tipnomdes');">
              </div></tr>
            <tr>
              <td height="26" class="form_label_01"> <div align="left"><strong>Nomina
                  Especial:</strong></div></td>
              <td colspan="2" valign="middle"> <select name="especial" class="breadcrumb" id="especial">
                  <option value="N" selected="selected">No</option>
                  <option value="S">Si</option>
                </select></td>
            </tr>
		 <tr>
              <td class="form_label_01"><div align="left"><strong>Tipo de Nomina Especial:</strong></div></td>
              <td><div align="left">
                <input name="tipnomesp" type="text"  value="<?
        $sql="SELECT min(CODNOMESP) as codnom from NPNOMESPTIPOS where trim(codnomesp)!=''";
                LlenarTextoSql($sql,"codnom",$bd);
        ?>" class="breadcrumb" id="tipnomesp" size="20" maxlength="50">
                <input type="button" name="Button3" value="..." onClick="catalogo4('tipnomesp');">
              </div></tr>
           <tr>
            <tr>
                 <td height="23" class="form_label_01"><strong>Per&iacute;odo de
                N&oacute;mina:</strong></td>
              <td> <div align="left"> </div>
                <div align="left">
                  <?

			  	$tb=$bd->select("SELECT to_char(MIN(fecnomdes),'DD/MM/YYYY') as fecha FROM nphiscon");
				if(!$tb->EOF)
				{
					$fecini=$tb->fields["fecha"];
				}

			  	$tb2=$bd->select("SELECT to_char(MAX(fecnom),'DD/MM/YYYY') as fecha FROM nphiscon");
				if(!$tb2->EOF)
				{
					$fecdes=$tb2->fields["fecha"];
				}

				?>
                  <input name="fechades" type="text" class="breadcrumb" id="fechades" datepicker="true" value="<? print $fecini;?>">
                </div></td>
              <td><input name="fechahas" type="text" class="breadcrumb" id="fechahas" datepicker="true" value="<? print $fecdes;?>"></td>
            </tr>
              <td class="form_label_01"><strong>Elaborado Por: </strong></td>
              <td ><input name="elaborado" type="text" class="breadcrumb" id="elaborado" value=" Ingrid Hermoso" size="30"></td>
              <td ><input name="elaboradocar" type="text" class="breadcrumb" id="elaboradocar" value="Direccion de Recursos Humanos" size="30"></td>

            </tr>
              <tr>
         <td class="form_label_01"><strong>Revisado Por: </strong></td>
              <td ><input name="revisado" type="text" class="breadcrumb" id="revisado" value="Lic. Reinier Parra" size="30"></td>
              <td><input name="revisadocar" type="text" class="breadcrumb" id="revisadocar" value="Director(E) Recursos Humanos" size="30"></td>

            </tr>
             <tr>
              <td class="form_label_01"><strong>  </strong></td>

                <td><input name="revisado2" type="text" class="breadcrumb" id="revisado2" value="Lic. Esther N. Perez U." size="30"></td>
                <td><input name="revisado2car" type="text" class="breadcrumb" id="revisado2car" value="Directora de Administracion y Finanzas" size="30"></td>

            </tr>
             <tr>
              <td class="form_label_01"><strong> </strong></td>

                  <td><input name="revisado3" type="text" class="breadcrumb" id="revisado3" value="Rafael Sáez" size="30"></td>
                  <td><input name="revisado3car" type="text" class="breadcrumb" id="revisado3car" value="Contralor Municipal " size="30"></td>
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
  f.titulo.value="Nomina Para la Firma por Nivel";
  f.action="rnprhistnomfirdefniv.php";
  f.submit();
}
function cerrar()
{
  window.close();
}


function catalogo(campo)
   {
      mysql='SELECT distinct(CODEMP) as Código,nomemp as Nombre FROM NPASICAREMP order by codemp';
    pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
    window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }

function catalogo1(campo)
   {
      mysql='SELECT distinct(codcar) as Codigo,nomcar as Nombre FROM NPASICAREMP order by codcar';
    pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
    window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }


function catalogo2(campo)
   {
      mysql='SELECT distinct(CODCON) as Codigo,NOMCON as Nombre FROM NPASICONEMP order by CODCON';
    pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
    window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }

function catalogo3(campo)
   {
      mysql='SELECT distinct(CODNOM) as Codigo, NOMNOM as Nomina FROM NPASICAREMP order by CODNOM';
    pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
    window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }

function catalogo4(campo)
   {
      mysql='SELECT distinct(CODNOMESP) as Codigo, DESNOMESP as Nomina FROM NPNOMESPTIPOS order by CODNOMESP';
    pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
    window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }


function catalogo5(campo)
   {
      mysql='SELECT distinct(CODNIV) as Codigo, desniv as Descripcion FROM NPESTORG ORDER BY CODNIV';
    pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
    window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }
</script>
</html>
