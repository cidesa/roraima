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
$codsecdes="";
$codsechas="";
$codprodes="";
$codprohas="";
$perdesde="";
$perhasta="";
$codprydes="";
$codpryhas="";
$codpardes="";
$codparhas="";
$codactdes="";
$codacthas="";

global $codsecdes;
global $codsechas;
global $codprodes;
global $codprohas;
global $codprydes;
global $codpryhas;
global $perdesde;
global $perhasta;
global $codpardes;
global $codparhas;
global $codactdes;
global $codacthas;

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
          <table width="647" align="center" cellspacing="0" bordercolor="#6699CC" class="grid_line01_tl">
            <tr bordercolor="#FFFFFF">
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>Creditos Presupuestarios del Programa y sus Actividades a Nivel de Partidas, Sub-Partidas Especificas y/o Ordinal
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
              <td><strong> ACTIVIDADES 51 HASTA LA 56</strong></td>

            </tr>
            <tr>
              <td class="form_label_01"><strong>Sector : </strong></td>
              <td> <div align="left">
                  <?
            $tb=$bd->select("SELECT distinct(SUBSTR(CODCAT,1,2)) as sector FROM FORDEFCATPRE order by SUBSTR(CODCAT,1,2)");
            ?>
                  <select name="codsecdes" class="breadcrumb" id="codsecdes">
                    <?
            while(!$tb->EOF)
          {
            ?>
                    <option value="<? print $tb->fields["sector"];?>"><? print substr($tb->fields["sector"],0,40);?></option>
                    <?
          $tb->MoveNext();
          }
            ?>
              </tr>

      <tr>
              <td class="form_label_01"><strong>Programa : </strong></td>
              <td> <div align="left">
                  <?
            $tb=$bd->select("select substr(codpro,1,2)||'-'||substr(codpro,3,4) as programa from fordefproble order by 1");
          ?>
                  <select name="codprodes" class="breadcrumb" id="codprodes">

                    <?
            while(!$tb->EOF)
          {
            ?>
            	   <option value="<? print $tb->fields["programa"];?>"><? print substr($tb->fields["programa"],0,40);?></option>
                    <?
          $tb->MoveNext();
          }
            ?>

            </tr>


            <tr>
            </tr>

            <tr>
            </tr>
            <tr>
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr bordercolor="#6699CC">
              <td colspan="3" class="form_label_01">&nbsp;</td>
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
  f.titulo.value="Creditos Presupuestarios del Programa y sus Actividades a Nivel de Partidas y Sub-Partidas Especificas (Bs.)";
  f.action="roce2033.php";
  f.submit();
}

function catalogo(campo)
{
    pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=SELECT DISTINCT(CODPAREGR) as Codigo FROM FORDEFPAREGR ORDER BY CODPAREGR";
  window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
}

function cerrar()
{
  window.close();
}
</script>
</html>
