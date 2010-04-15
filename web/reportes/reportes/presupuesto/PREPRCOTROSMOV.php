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
          <table width="720" align="center" cellspacing="0" bordercolor="#6699CC" class="grid_line01_tl">
            <tr bordercolor="#FFFFFF">
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>Precompromisos
                      afectados por otros Movimientos
                      <input name="titulo" type="hidden" id="titulo">
                  </strong></font></div></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr bordercolor="#6699CC">
              <td width="186" class="form_label_01"><strong>Tama&ntilde;o Hoja:</strong></td>
              <td width="174" colspan="2"> <input name="tamano" type="text" class="breadcrumb" id="tamano" readonly="true"></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="24" class="form_label_01"><strong>Orientaci&oacute;n:</strong></td>
              <td colspan="2"> <input name="orientacion" type="text" class="breadcrumb" id="orientacion" readonly="true"></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"> <div align="left"><strong>Salida del
                  Reporte:</strong></div></td>
              <td colspan="2"> <div align="left"> </div>
                <div align="left"> <strong>
                  <input name="radiobutton" type="radio" class="breadcrumb" value="radiobutton" checked>
                  PANTALLA</strong></div></td>
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
              <td colspan="2"><strong>DESDE</strong></td>
            </tr>

            <tr>
              <td height="22" class="form_label_01"><strong>Fecha: </strong></td>
              <td><?
          $tb=$bd->select("select to_char(fecprc,'dd/mm/yyyy') as fecprc, fecprc as f from cpprecom order by f");
        ?>
                  <select name="fecha1" class="breadcrumb"  id="fecha1">
                    <?
            while(!$tb->EOF)
          {
          ?>
                    <option value="<? print $tb->fields["fecprc"];?>"><? print $tb->fields["fecprc"];?></option>
                    <?
          $tb->MoveNext();
          }
        ?>
                  </select>              </td>
              <td><?
          $tb=$bd->select("select to_char(fecprc,'dd/mm/yyyy') as fecprc, fecprc as f from cpprecom order by f DESC");
          ?>
                  <select name="fecha2" class="breadcrumb"  id="fecha2">
                    <?
            while(!$tb->EOF)
          {
          ?>
                    <option value="<? print $tb->fields["fecprc"];?>"><? print $tb->fields["fecprc"];?></option>
                    <?
          $tb->MoveNext();
          }
        ?>
                  </select>              </td>
            </tr>
            <tr>
              <td height="22" class="form_label_01"><strong>Tipo: </strong></td>
              <td><?
          $tb=$bd->select("select distinct(c.tipprc), upper(rtrim(c.nomabr)) as nom
                from cpdocprc c
                group by c.tipprc,c.nomabr
                order by c.tipprc");
        ?>
                  <select name="tipo1" class="breadcrumb"  id="tipo1">
                    <?
            while(!$tb->EOF)
          {
          ?>
                    <option value="<? print $tb->fields["tipprc"];?>"><? print $tb->fields["nom"];?></option>
                    <?
          $tb->MoveNext();
          }
        ?>
                  </select>              </td>
              <td><?
          $tb=$bd->select("select distinct(c.tipprc), upper(rtrim(c.nomabr)) as nom
                from cpdocprc c
                group by c.tipprc,c.nomabr
                order by c.tipprc DESC");
          ?>
                  <select name="tipo2" class="breadcrumb"  id="tipo2">
                    <?
            while(!$tb->EOF)
          {
          ?>
                    <option value="<? print $tb->fields["tipprc"];?>"><? print $tb->fields["nom"];?></option>
                    <?
          $tb->MoveNext();
          }
        ?>
                  </select>              </td>
            </tr>
            <tr>
              <td height="22" class="form_label_01"><strong>C&oacute;digo Presupuestario: </strong></td>
              <td> <input name="cod1" type="text" class="breadcrumb" id="cod1"
              value="<?$sql="select min(codpre) as cod1 from cpimpprc";
              LlenarTextoSql($sql,"cod1",$bd); ?>" size ="34">
              <input type="button" name="Button5" value="..." onClick=" catalogo('cod1');">
               </div></td>
              <td>
               <input name="cod2" type="text" class="breadcrumb" id="cod2"
              value="<?$sql="select max(codpre) as cod2 from cpimpprc";
              LlenarTextoSql($sql,"cod2",$bd); ?>" size ="34">
              <input type="button" name="Button5" value="..." onClick=" catalogo('cod2');"></td>
            </tr>
            <tr>
              <td height="22" class="form_label_01"><strong>Status: </strong></td>
              <td><?
          $tb=$bd->select("select distinct(staprc) as cod, (case when staprc='A' then 'Activos' else 'Anulados' end) as nom
                 from cpprecom");
        ?>
                  <select name="status" class="breadcrumb"  id="status">
                    <?
            while(!$tb->EOF)
          {
          ?>
                    <option value="<? print $tb->fields["cod"];?>"><? print $tb->fields["nom"];?></option>
                    <?
          $tb->MoveNext();
          }
        ?>
          <option value="T">Todos</option>
                  </select>              </td>
              <td>&nbsp;</td>
            </tr>

            <tr bordercolor="#6699CC">
              <td class="form_label_01"> <div align="left"><strong>Filtro:</strong></div></td>
              <td colspan="2"> <div align="left"></div>
                <div align="left">
                  <input name="filtro" type="text" class="breadcrumb" id="filtro" value="%%" size="60">
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
  f.titulo.value="Precompromisos afectados por otros movimientos";
  f.action="rPREPRCOTROSMOV.php";
  f.submit();
}
function cerrar()
{
  window.close();
}
function catalogo(campo)
   {
      mysql='select a.codpre,b.nompre from cpimpprc a,cpdeftit b where a.codpre=b.codpre order by a.codpre';
      pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
      window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }
</script>
</html>
