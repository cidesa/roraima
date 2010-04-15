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
<script type="text/JavaScript">
<!--

//-->
</script>
</head>
<body>
<?
require_once("../../lib/bd/basedatosAdo.php");


		$periododes="";

		$ano="";
		
		global $periododes;

		global $ano;

$bd=new basedatosAdo();
?>
<?	
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
      <td width="6" align="left" valign="top" class="cell_left_line02"><img src="../img/center02_tl.gif" width="6" height="6"></td>
      <td rowspan="2" valign="top" class="cell_padding_01"> <p class="breadcrumb">Reportes 
        </p>
        <fieldset>
       
        <div align="left">&nbsp; 
          <table width="647" align="center" cellspacing="0" bordercolor="#6699CC" class="grid_line01_tl">
            <tr bordercolor="#FFFFFF"> 
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>INVERSIONES
                      <input name="titulo" type="hidden" id="titulo">
</strong></font></div></td>
            </tr>
            <tr bordercolor="#FFFFFF"> 
              <td class="form_label_01">&nbsp;</td>
              <td>&nbsp;</td>
              <td><font color="#00FFCC">&nbsp; </font></td>
            </tr>
            <tr bordercolor="#6699CC"> 
              <td width="131" class="form_label_01"><strong>Tama&ntilde;o Hoja:</strong></td>
              <td width="246"> <input name="tamano" type="text" class="breadcrumb" id="tamano" readonly="true"></td>
              <td width="262">&nbsp;</td>
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
              <td colspan="3" class="form_label_01"><div align="center"><font color="#000066" size="3"><strong><em>Criterios 
              de Selecci&oacute;n</em></strong></font></div></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01"><p><strong>Periodo:</strong></p>              </td>
              <td><div align="left"> 
                  <select name="periododes" id="periododes" class="breadcrumb">
                    <option value="<? echo date('m') ?>" selected>Actual (<? echo date('m').' - '.$me ?>)</option>
                    <? for ($i=1;$i<=2;$i++)
				{?>
                    <option value="01">01 - Enero</option>
                    <? if (date("m")==1){break;}?>
                    <option value="02">02 - Febrero</option>
                    <? if (date("m")==2){break;}?>
                    <option value="03">03 - Marzo</option>
                    <? if (date("m")==3){break;}?>
                    <option value="04">04 - Abril</option>
                    <? if (date("m")==4){break;}?>
                    <option value="05">05 - Mayo</option>
                    <? if (date("m")==5){break;}?>
                    <option value="06">06 - Junio</option>
                    <? if (date("m")==6){break;}?>
                    <option value="07">07 - Julio</option>
                    <? if (date("m")==7){break;}?>
                    <option value="08">08 - Agosto</option>
                    <? if (date("m")==8){break;}?>
                    <option value="09">09 - Septiembre</option>
                    <? if (date("m")==9){break;}?>
                    <option value="10">10 - Octubre</option>
                    <? if (date("m")==10){break;}?>
                    <option value="11">11 - Noviembre</option>
                    <? if (date("m")==11){break;}?>
                    <option value="12">12 - Diciembre</option>
                    <? }?>
                  </select>
                </div></td>
              <td>&nbsp;</td>
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
            <td height="10"><img src="../../img/box01_bl.gif" width="6" height="6"></td>
            <td align="right"><img src="../../img/box01_br.gif" width="6" height="6"></td>
          </tr>
        </table></td>
      <td width="6" align="right" valign="top"><img src="../img/center01_tr.gif" width="6" height="6"></td>
      <td width="40" rowspan="2" align="center" bgcolor="#EEEEEE">&nbsp;</td>
    </tr>
    <tr> 
      <td align="left" valign="bottom" class="cell_left_line02"><img src="../img/center02_bl.gif" width="6" height="6"></td>
      <td align="right" valign="bottom"><img src="../img/center01_br.gif" width="6" height="6"></td>
    </tr>
  </table>
</form>
</body>
<script language="javascript">
function enviar()
{
	f=document.form1;
	f.titulo.value="INVERSIONES";
	f.action="rpreinversiones.php";
	f.submit();
}

   function catalogo(campo)
   {
      pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=select distinct pereje from contabb1 where (pereje <> �00�) order by pereje";
	  window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
   }
      function catalogo2(campo)
   {
      pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=select distinct anopre from contabb1 order by anopre";
	  window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
   }
   
function cerrar()
{
	window.close();
}
</script>
</html>
