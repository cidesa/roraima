<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>SIGA Reportes</title>
<link  href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
<link  href="../../lib/css/datepickercontrol.css" rel="stylesheet" type="text/css">
<script language="JavaScript"  src="../../lib/general/datepickercontrol.js"></script>
<script language="JavaScript"  src="../../lib/general/fecha.js"></script>
<script language="JavaScript" type="text/javascript" src="../../lib/general/prototype_1_5_1.js"></script>
</head>
<body>
<?
  require_once("../../lib/bd/basedatosAdo.php");
  require_once("../../lib/general/funciones.php");
  $bd=new basedatosAdo();
#  $bd->validar();
?>
<form name="form1" method="post" action="">
  <table width="760" height="40"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#EEEEEE">
    <tr>
      <td width="190" rowspan="2" bgcolor="#003399" class="cell_left_line02"><img src="../../img/tl_logo_01.gif" width="190" height="40" border="0"></a></td>
      <td colspan="2" class="cell_date"><div align="right"><font color="#00FFCC">

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
          <table width="612"  border="0" align="center" cellspacing="0" bordercolor="#FFFFFF" class="grid_line01_tl">
            <tr bordercolor="#FFFFFF">
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>Ejecuci&oacute;n
                  Presupuestaria por Espec&iacute;fica
                  <input name="titulo" type="hidden" id="titulo">
                  </strong></font></div></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01">&nbsp;</td>
              <td>&nbsp;</td>
              <td><font color="#00FFCC">&nbsp; </font></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td width="186" class="form_label_01"><strong>Tama&ntilde;o Hoja:</strong></td>
              <td width="174"><strong>CARTA</strong></td>
              <td width="238">&nbsp;</td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td height="24" class="form_label_01"><strong>Orientaci&oacute;n:</strong></td>
              <td> <strong>HORIZONTAL</strong></td>
              <td> <div align="right"> </div></td>
            </tr>
            <tr bordercolor="#FFFFFF">
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
              <td height="23" class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td colspan="3" class="form_label_01"> <div align="center"><font color="#000066" size="3"><strong><em>Criterios
                  de Selecci&oacute;n</em></strong></font></div></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td bordercolor="#FFFFFF" class="form_label_01">&nbsp;</td>
              <td><strong>DESDE</strong></td>
              <td><strong>HASTA</strong></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01"> <div align="left"><strong>Periodo :</strong></div></td>
              <td> <div align="left">
                 <?
			  	    $tb=$bd->select("SELECT DISTINCT PEREJE as pereje FROM CPPEREJE  ORDER BY PEREJE ASC");
				    print $tb->GetMenu('perdesde','pereje',false,false,0,'class="breadcrumb"');
			     ?>
              </div></td>
              <td>
				  <?
					$tb2=$bd->select("SELECT DISTINCT PEREJE as pereje FROM CPPEREJE  ORDER BY PEREJE DESC");
					print $tb2->GetMenu('perhasta','pereje',false,false,0,'class="breadcrumb"');
				  ?>
		    </tr>
		    <tr bordercolor="#FFFFFF">
              <td class="form_label_01"><strong>Nivel Categoria:</strong></td>
              <td colspan="2">
    			 <?
			  	   //$bd->actualizar('SET search_path TO "SIMA001"');
			  	   //$tb=$bd->select("SELECT CONSEC||' - '||NOMEXT as agrupar FROM CPNIVELES WHERE CATPAR='C' ORDER BY CONSEC;");
			  	   $sql="SELECT CONSEC||' - '||NOMEXT as agrupar FROM CPNIVELES WHERE CATPAR='C' ORDER BY CONSEC";
                 ?>

                <select name="agrupar" class="breadcrumb" id="agrupar" >
				 <? LlenarComboSql($sql,"agrupar","agrupar","xx",$bd,"0 - General") ?>
                </select></td>
            </tr>
   		 	<tr bordercolor="#FFFFFF">
              <td height="24" class="form_label_01">
                <div align="left"><strong>Nivel Partida :</strong></div></td>
              <td> <div align="left">
                <select name="nivhasta" class="breadcrumb" id="nivhasta">
                 <?
			  	    //$tb=$bd->select("select nomext,consec from cpniveles where catpar='P' order by consec deSC");
			  	    $sql="select nomext,consec from cpniveles where catpar='P' order by consec deSC";
				    LlenarComboSql($sql,"consec","nomext","xx",$bd,"General");
			     ?>
			     </select>
			  </div></td>
              <td> </tr>
			<tr>
			           <td class="form_label_01">
                <div align="left"><strong>C&oacute;digo Presupuestario Desde:</strong></div></td>
              <td colspan=]"2">
                <div align="left">
                  <?
			  	$tb=$bd->select("select min(codpre) as valor from cpasiini");
			  ?>
			  	<input size="40" type="text" name="codpredes" class="breadcrumb" id="codpredes" value="<? print $tb->fields["valor"];?>"
				<input type="button" name="Button" value="..." onClick="catalogo1('codpredes')"/>

              </div></td>
              </tr>
              <tr>
              <td class="form_label_01">
                <div align="left"><strong>C&oacute;digo Presupuestario Hasta:</strong></div></td>
              <td colspan="2">
                <div align="left">
                       <?
			  	$tb=$bd->select("select max(codpre) as valor from cpasiini");
			  ?>
			  	<input size="40" type="text" name="codprehas" class="breadcrumb" id="codprehas" value="<? print $tb->fields["valor"];?>"
				<input type="button" name="Button" value="..." onClick="catalogo1('codprehas')"/>
              </div></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01"><strong>Asignaci&oacute;n: </strong></td>
              <td colspan="2">
                <select name="asignacion" class="breadcrumb" id="select2">
                  <option>Acumulados</option>
                  <option>Parciales</option>
                </select> </td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td height="24" class="form_label_01">
                <div align="left"><strong>Totales Por Partidas :</strong></div></td>
              <td> <div align="left">
                <select name="consepar" class="breadcrumb" id="consepar">
                 <?
			  	    //$tb=$bd->select("select nomext,consec from cpniveles where catpar='P' order by consec deSC");
			  	    $sql="select nomext,consec from cpniveles where catpar='P' order by consec deSC";
				    LlenarComboSql($sql,"consec","nomext","xx",$bd,"General");
			     ?>
			     </select>
			  </div></td>
              <td> </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01"> <div align="left"><strong>Filtro:</strong></div></td>
              <td colspan="2"> <div align="left"></div>
                <div align="left">
                  <input name="comodin" type="text" class="breadcrumb" id="comodin" value="%%" size="55">
                  <input name="sqls" type="hidden" id="sqls">
                </div></td>
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
	if (verificar())
	{
		if(verificar2())
		{
			f=document.form1;
			f.titulo.value="Ejecución Presupuestaria por Específica";
			f.action="rpredisparesp.php";
			f.submit();
		}else
		    alert("Error de Selección: Debe seleccionar los totales un nivel menor de las partidas");
	}else
	  alert("Debe filtrar el reporte ya sea por Partida o Por Categoria, no pueden estar las dos en Generales");

}
function cerrar()
{
	window.close();
}

function verificar2()
{


	if ($('nivhasta').value=='')
	    if ($('consepar').value=='')
	         return true;
	    else
	         return false;
	else
	{
		if ($('consepar').value!='')
		{
			if ((parseInt($('nivhasta').value) > parseInt($('consepar').value)) )
			 {
			 	//alert("nivhata-->"+$('nivhasta').value+"consepar-->"+$('consepar').value);
			 	return true;
			 }
			else
			   return false;
		}else
		    return true;
	}
}
function verificar()
{

	if($('nivhasta').value=='')
		if($('agrupar').value=='')
			return false;
        else
	    	return true;
	else
	    return true;
}

function catalogo1(campo)
{
    pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=select distinct(a.codpre) as codpre,b.nompre from cpasiini a, cpdeftit b where trim(a.codpre)=trim(b.codpre) ";
	window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
}

</script>
<? $bd->closed(); ?>
</html>
