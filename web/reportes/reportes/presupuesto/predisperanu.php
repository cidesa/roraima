<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>SIGA Reportes</title>
<link  href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
<link  href="../../lib/css/datepickercontrol.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="../../lib/general/datepickercontrol.js"></script>
<script language="JavaScript" src="../../lib/general/fecha.js"></script>

</head>
<body>
<?php
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
      <td colspan="2" class="cell_date"><div align="right"><font color="#00FFCC"> 
          <script language="JavaScript1.2" src="../../lib/general/fechahora.js"></script>
          </font></div></td>
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
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>Ejecuci&oacute;n 
                  Presupuestaria 
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
              <td width="174"><strong>CARTA</strong></td>
              <td width="238">&nbsp;</td>
            </tr>
            <tr bordercolor="#6699CC"> 
              <td height="24" class="form_label_01"><strong>Orientaci&oacute;n:</strong></td>
              <td> <strong>HORIZONTAL</strong></td>
              <td> <div align="right"> </div></td>
            </tr>
            <tr bordercolor="#6699CC"> 
              <td class="form_label_01"> <strong>Salida del 
                  Reporte:</strong></td>
              <td><strong> 
                  <input name="radiobutton" type="radio" class="breadcrumb" value="radiobutton" checked>
                  PANTALLA</strong></td>
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
              <td class="form_label_01"><strong>Periodo :</strong></td>
              <td>
              <?
			  	 $tb=$bd->select("SELECT DISTINCT PEREJE as pereje FROM CPPEREJE  ORDER BY PEREJE ASC");
				 print $tb->GetMenu('perdesde','pereje',false,false,0,'class="breadcrumb"');
			  ?>                </td>
              <td> 
            <?
			  	$tb2=$bd->select("SELECT DISTINCT PEREJE as pereje FROM CPPEREJE  ORDER BY PEREJE DESC");
  			    print $tb2->GetMenu('perhasta','pereje',false,false,0,'class="breadcrumb"');
			  ?>            </tr>
			  <tr>
              <td class="form_label_01"><div align="left"><strong>Codigo Presupuestario 
                :</strong></div></td>
              <td colspan="2"><div align="left"> </div>
                  <div align="left">
              <input name="codpredes" type="text"  value="<?
				$sql="select distinct(codpre) as codpre FROM CPASIINI WHERE PERPRE='00' order by codpre asc";
                LlenarTextoSql($sql,"codpre",$bd);				
				?>" class="breadcrumb" id="codpredes" size="34">
              <input type="button" name="Button1" value="..." onClick="catalogo('codpredes');">
                </div></td>
              </tr>
              <tr>
              <td></td>
              <td colspan="2">
              <input name="codprehas" type="text"  value="<?
				$sql="select distinct(codpre) as codpre FROM CPASIINI WHERE PERPRE='00' order by codpre desc";
                LlenarTextoSql($sql,"codpre",$bd);				
				?>" class="breadcrumb" id="codprehas" size="34">
              <input type="button" name="Button2" value="..." onClick="catalogo('codprehas');">
              </td>
            </tr>
            <tr bordercolor="#6699CC"> 
              <td class="form_label_01"><strong>Asignaci&oacute;n: </strong></td>
              <td colspan="2"> 
                <select name="asignacion" class="breadcrumb" id="select2">
                  <option>Acumulados</option>
                  <option>Parciales</option>
                </select> </td>
            </tr>
            <tr bordercolor="#6699CC"> 
              <td class="form_label_01"><strong>Totales por:</strong></td>
              <td colspan="2"> 
		    <?
			  	 $tb=$bd->select("SELECT NOMEXT,consec FROM CPNIVELES WHERE CATPAR='C' ORDER BY CONSEC;");
				 print $tb->GetMenu('agrupar','nomext',false,false,0,'class="breadcrumb"');
			  ?>            </tr>
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
              <td colspan="3" class="form_label_01">explicacion del filtro</td>
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
                <input name="Button" type="button" class="form_button01" value="   Salir    " onClick="cerrar()">
            </td>
          </tr>
          <tr>
            <td><img src="../../img/box01_bl.gif" width="6" height="6"></td>
            <td align="right"><img src="../../img/box01_br.gif" width="6" height="6"></td>
          </tr>
        </table></td>
      <td width="6" align="right" valign="top">&nbsp;</td>
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
	f.titulo.value="Ejecucion Presupuestaria";
	f.action="rpredisperanu.php";
	f.submit();
}
function cerrar()
{
	window.close();
}

function catalogo(campo)
{
 	pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=select distinct(codpre) as codpre FROM CPASIINI WHERE PERPRE=¿00¿ order by codpre";
	window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,rezizable=yes, left=50,top=50");
}

</script>
</html>
