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
            <!--DWLayoutTable-->
            <tr bordercolor="#FFFFFF"> 
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>EJECUCI&Oacute;N DE LOS GASTOS ESPECIFICOS DE PERSONAL,<br>
                SERVICIOS Y TRANSFERENCIAS<br>
                (Bol&iacute;vares)
                <input name="titulo" type="hidden" id="titulo">
</strong></font></div></td>
              <td width="2"></td>
            </tr>
            <tr bordercolor="#FFFFFF"> 
              <td width="149" class="form_label_01">&nbsp;</td>
              <td width="217">&nbsp;</td>
              <td width="270"><font color="#00FFCC">&nbsp; </font></td>
              <td></td>
            </tr>
            <tr bordercolor="#6699CC"> 
              <td class="form_label_01"><strong>Tama&ntilde;o Hoja:</strong></td>
              <td> <input name="tamano" type="text" class="breadcrumb" id="tamano" readonly="true"></td>
              <td>&nbsp;</td>
              <td></td>
            </tr>
            <tr bordercolor="#6699CC"> 
              <td height="24" class="form_label_01"><strong>Orientaci&oacute;n:</strong></td>
              <td> <input name="orientacion" type="text" class="breadcrumb" id="orientacion" readonly="true"></td>
              <td> <div align="right"> </div></td>
              <td></td>
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
              <td></td>
            </tr>
            <tr bordercolor="#FFFFFF"> 
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
              <td></td>
            </tr>
            <tr bordercolor="#FFFFFF"> 
              <td colspan="3" class="form_label_01"> <div align="center"><font color="#000066" size="3"><strong><em>Criterios 
                  de Selecci&oacute;n</em></strong></font></div></td>
              <td></td>
            </tr>
            <tr bordercolor="#6699CC"> 
              <td bordercolor="#FFFFFF" class="form_label_01">&nbsp;</td>
              <td><!--DWLayoutEmptyCell-->&nbsp;</td>
              <td><!--DWLayoutEmptyCell-->&nbsp;</td>
              <td></td>
            </tr>




            <tr bordercolor="#6699CC"> 
              <td height="15" valign="top"><strong>Periodo:</strong></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="23" align="right" valign="top"><strong>Desde:</strong></td>
              <td colspan="2" valign="top"><select name="periododes" id="periododes" class="breadcrumb">
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
              </select></td>
              <td></td>
            </tr>
            
            <tr bordercolor="#6699CC">
              <td height="4"></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            
            
            
            <tr bordercolor="#6699CC">
              <td height="25" align="right" valign="top"><strong>Hasta:</strong></td>
              <td colspan="2" valign="bottom"><select name="periodohas" id="periodohas" class="breadcrumb">
                <option value="<? echo date('m') ?>" selected>Actual (<? echo date('m').' - '.$me ?>)</option>
                <option value="01">01 - Enero</option>
                <option value="02">02 - Febrero</option>
                <option value="03">03 - Marzo</option>
                <option value="04">04 - Abril</option>
                <option value="05">05 - Mayo</option>
                <option value="06">06 - Junio</option>
                <option value="07">07 - Julio</option>
                <option value="08">08 - Agosto</option>
                <option value="09">09 - Septiembre</option>
                <option value="10">10 - Octubre</option>
                <option value="11">11 - Noviembre</option>
                <option value="12">12 - Diciembre</option>
              </select>              </td>
              <td></td>
            </tr>
            
            
            
            
            <tr bordercolor="#6699CC">
              <td height="82">&nbsp;</td>
              <td></td>
              <td></td>
              <td></td>
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
	f.titulo.value="RELACION ANEXA ORDEN DE PAGO PERMANENTE";
	f.action="rejegasesppersertra.php";
	f.submit();
}
function cerrar()
{
	window.close();
}
function catalogo1(campo)
{
      mysql='select distinct g.refadi as Número_Crédito, g.desadi as Nombre	from opordpag a, opdetord b, cpdoccau c, cpimpcau d, cpmovfuefin e, cpdisfuefin f, cpadidis g, cpmovadi h where a.numord=b.numord and a.tipcau=c.tipcau and a.numord=d.refcau and b.numord=d.refcau and b.codpre=d.codpre and b.codpre=e.codpre and d.codpre=e.codpre and (e.refmov=d.refere or e.refmov=d.refprc or e.refmov=d.refcau)and e.correl=f.correl and e.codpre=f.codpre and g.refadi=h.refadi and g.refadi=f.refdis and h.codpre=f.codpre and upper(f.origen)=upper(¿credito¿) union select distinct g.refadi, g.desadi	from opordpag a, opdetord b, cpdoccom c, cpimpcom d, cpmovfuefin e, cpdisfuefin f, cpadidis g, cpmovadi h where a.numord=b.numord and a.tipcau=c.tipcom and a.numord=d.refcom and b.numord=d.refcom and b.codpre=d.codpre and b.codpre=e.codpre and d.codpre=e.codpre and (e.refmov=d.refere or e.refmov=d.refcom) and e.correl=f.correl and e.codpre=f.codpre and	g.refadi=h.refadi and g.refadi=f.refdis and h.codpre=f.codpre and upper(f.origen)=upper(¿credito¿)';
	  pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	  window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
}

function catalogo2(campo)
{
      mysql='select distinct ctaban as Número_Cuenta, nomcue as Nombre from opordpag, tsdefban where ctaban = numcue order by ctaban asc';
	  pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	  window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
}
</script>
</html>
