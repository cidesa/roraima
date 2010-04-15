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
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>ORDEN 
                  DE PAGO DETALLADAS DE TIPO ANULACION
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
              <td height="23" bordercolor="#FFFFFF" class="form_label_01">&nbsp;</td>
              <td><strong>DESDE</strong></td>
              <td><strong>HASTA</strong></td>
            </tr>
            <tr> 
              <td class="form_label_01"><strong>N&uacute;mero de Orden de Pago de Tipo Anulacion:</strong></td>
              <td> 
              <input name="numorddes" type="text"  value="<?
				$sql="select a.refaju from cpajuste a, opordpag b where a.refere=b.numord and b.status='A' order by  a.refaju asc";
                LlenarTextoSql($sql,"refaju",$bd);				
				?>" class="breadcrumb" id="numorddes" size="15" maxlength="50">
              <input type="button" name="Button1" value="..." onClick="catalogo1('numorddes');">
				</td>
              <td> 
              <input name="numordhas" type="text"  value="<?
				$sql="select a.refaju from cpajuste a, opordpag b where a.refere=b.numord and b.status='A' order by  a.refaju desc";
                LlenarTextoSql($sql,"refaju",$bd);				
				?>" class="breadcrumb" id="numordhas" size="15" maxlength="50">
              <input type="button" name="Button2" value="..." onClick="catalogo1('numordhas');">
			 </td>
            </tr>
            <tr bordercolor="#6699CC"> 
              <td class="form_label_01"><strong>Beneficiario:</strong></td>
              <td> 
              <input name="bendes" type="text"  value="<?
				$sql="select distinct b.cedrif from cpajuste a, opordpag b where a.refere=b.numord and b.status='A' order by  b.cedrif asc";
                LlenarTextoSql($sql,"cedrif",$bd);				
				?>" class="breadcrumb" id="bendes" size="15" maxlength="50">
              <input type="button" name="Button3" value="..." onClick="catalogo2('bendes');">
			  </td>
              <td> 
              <input name="benhas" type="text"  value="<?
				$sql="select distinct b.cedrif from cpajuste a, opordpag b where a.refere=b.numord and b.status='A' order by  b.cedrif desc";
                LlenarTextoSql($sql,"cedrif",$bd);				
				?>" class="breadcrumb" id="benhas" size="15" maxlength="50">
              <input type="button" name="Button4" value="..." onClick="catalogo2('benhas');">
			  </td>
            </tr>
            <tr bordercolor="#6699CC"> 
              <td height="23" class="form_label_01"><strong>Fecha:</strong></td>
              <td>
                <?
				$tb=$bd->select("select to_char(min(a.fecaju),'dd/mm/yyyy') as fecaju  from cpajuste a, opordpag b where a.refere=b.numord and b.status='A'");			  
				//if(!$tb->EOF)
				//{
					$fecaju=$tb->fields["fecaju"];
				//}
	  	        
				$tb=$bd->select("select to_char(max(a.fecaju),'dd/mm/yyyy') as fecaju  from cpajuste a, opordpag b where a.refere=b.numord and b.status='A'");			  
				//if(!$tb->EOF)
				//{
					$fecdes=$tb->fields["fecaju"];
				//}
				
				?>
                  <input name="fechades" type="text" class="breadcrumb" id="fechades" value="<? print $fecaju;?>" size="12" maxlength="12" datepicker="true">                </td>
              <td><input name="fechahas" type="text" class="breadcrumb" id="fechahas" value="<? print $fecdes;?>" size="12" maxlength="12" datepicker="true"></td>
            </tr>
            <tr bordercolor="#6699CC"> 
              <td class="form_label_01"><strong>Tipo de Orden:</strong></td>
              <td> 
                <?
			  	
			  	$tb=$bd->select("select distinct tipaju from cpdocaju where refier='A' order by tipaju asc");
			  ?>
			  
                <select name="tipcaudes" class="breadcrumb" id="tipcaudes">
                  <?
				  	while(!$tb->EOF)	
					{
				  ?>
                  <option value="<? print $tb->fields["tipaju"];?>"><? print $tb->fields["tipaju"];?></option>
                  <?
										$tb->MoveNext();
					}
					
				?>
                </select></td>
              <td> 
                <?			  	
			  	$tb=$bd->select("select distinct tipaju from cpdocaju where refier='A' order by tipaju desc");
				?>
                <select name="tipcauhas" class="breadcrumb" id="tipcauhas">
                  <?
				  	while(!$tb->EOF)	
					{
				  ?>
                  <option value="<? print $tb->fields["tipaju"];?>"><? print $tb->fields["tipaju"];?></option>
                  <?
				  	$tb->MoveNext();
					}
				?>
                </select></td>
            </tr>
            <tr> 
              <td class="form_label_01"><strong>C&oacute;digo Presupuestario:</strong></td>
              <td colspan="2"> 
              <input name="codpredes" type="text"  value="<?
				$sql="select distinct(c.codpre) as codpre from cpajuste a, opordpag b, cpmovaju c where a.refere=b.numord and a.refaju=c.refaju and b.status='A' order by  c.codpre asc";
                LlenarTextoSql($sql,"codpre",$bd);				
				?>" class="breadcrumb" id="codpredes" size="33" maxlength="50">
              <input type="button" name="Button5" value="..." onClick="catalogo3('codpredes');">
			  </td>
			 </tr>
			 <tr>
			  <td></td>
              <td colspan="2"> 
              <input name="codprehas" type="text"  value="<?
				$sql="select distinct(c.codpre) as codpre from cpajuste a, opordpag b, cpmovaju c where a.refere=b.numord and a.refaju=c.refaju and b.status='A' order by  c.codpre desc";
                LlenarTextoSql($sql,"codpre",$bd);				
				?>" class="breadcrumb" id="codprehas" size="33" maxlength="50">
              <input type="button" name="Button6" value="..." onClick="catalogo3('codprehas');">
			  </td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>C&oacute;digo Unidad:</strong></td>
              <td>
              <input name="codunides" type="text"  value="<?
				$sql="select distinct(coduni) as coduni  from opordpag  where coduni like '0%' order by coduni asc";
                LlenarTextoSql($sql,"coduni",$bd);				
				?>" class="breadcrumb" id="codunides" size="15" maxlength="50">
              <input type="button" name="Button7" value="..." onClick="catalogo4('codunides');">
			  </td>
              <td>
              <input name="codunihas" type="text"  value="<?
				$sql="select distinct(coduni) as coduni  from opordpag  where coduni is not null order by coduni desc";
                LlenarTextoSql($sql,"coduni",$bd);				
				?>" class="breadcrumb" id="codunihas" size="15" maxlength="50">
              <input type="button" name="Button8" value="..." onClick="catalogo4('codunihas');">
			  </td>
            </tr>
            <tr>
              <td class="form_label_01">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr> 
              <td class="form_label_01"><strong>Filtrar Por:</strong></td>
              <td colspan="2"> <input name="comodin" type="text" class="breadcrumb" id="comodin" value="%" size="40"> </td>
            </tr>
            <tr> 
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2"><input name="sqls" type="hidden" id="sqls"></td>
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
      <td align="right" valign="bottom"><img src="../../img/center01_br.gif" width="8" height="30"></td>
    </tr>
  </table>
</form>
</body>
<script language="javascript">
function enviar()
{
	f=document.form1;
	f.titulo.value="ORDEN DE PAGO DETALLADAS DE TIPO ANULACION";
	f.action="roprdetordanu.php";
	f.submit();
}
function cerrar()
{
//	 f= document.form1;
//	 alert(f.codubi.value);
window.close();
}
function catalogo1(campo)
{
 	pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=select a.refaju from cpajuste a, opordpag b where a.refere=b.numord and b.status=¿A¿ order by  a.refaju asc";
	window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,rezizable=yes, left=50,top=50");
}
function catalogo2(campo)
{
 	pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=select distinct b.cedrif from cpajuste a, opordpag b where a.refere=b.numord and b.status=¿A¿ order by  b.cedrif asc";
	window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,rezizable=yes, left=50,top=50");
}
function catalogo3(campo)
{
 	pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=select distinct(c.codpre) as codpre from cpajuste a, opordpag b, cpmovaju c where a.refere=b.numord and a.refaju=c.refaju and b.status=¿A¿ order by  c.codpre asc";
	window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,rezizable=yes, left=50,top=50");
}
function catalogo4(campo)
{
 	pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=select distinct(coduni) as coduni  from opordpag  where coduni like ¿0%¿ order by coduni asc";
	window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,rezizable=yes, left=50,top=50");
}
</script>
</html>
