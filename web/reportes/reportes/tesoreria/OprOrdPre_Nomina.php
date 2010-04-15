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
<?
require_once("../../lib/bd/basedatosAdo.php");
$bd=new basedatosAdo();
?>
<form name="form1" method="post" action="rOprOrdPre_Nomina" id="form1">
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
              <td colspan="3" class="form_label_01"> <div align="center"> 
                <p><font color="#000066" size="4"><strong>Orden de Pago Preimpresa</strong></font><font color="#000066" size="4"><strong>
                  <input name="titulo" type="hidden" id="titulo">
                  </strong></font></p>
                </div></td>
            </tr>
            <tr bordercolor="#6699CC"> 
              <td width="186" class="form_label_01"> <div align="left"><strong>Salida del 
                  Reporte:</strong></div></td>
              <td width="174"> <div align="left"> </div>
                <div align="left"> <strong> 
                  <input name="radiobutton" type="radio" class="breadcrumb" value="radiobutton" checked>
                  PANTALLA</strong></div></td>
              <td width="238"> <strong> 
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
              <td class="form_label_01">
                <div align="left"></div></td>
              <td>
                <div align="center"><strong>Desde</strong></div></td>
              <td><div align="center"><strong>Hasta</strong></div></td> 
		    </tr>
			           <td class="form_label_01">&nbsp;</td>
                         <td>&nbsp;</td>
                         
           
			           <tr>
                         <td class="form_label_01">
                           <div align="left"><strong>N&uacute;mero Orden de Pago : </strong></div></td>
                         <td><?
			  	$tb=$bd->select("SELECT trim(NUMORD) as numord
								FROM OPORDPAG
								ORDER BY NUMORD");
			  ?>
                           <select name="NUMORDDES" class="breadcrumb" id="NUMORDDES">
                           <?
				  	while(!$tb->EOF)	
					{
				  ?>
                           <option value="<? print $tb->fields["numord"];?>"><? print $tb->fields["numord"];?></option>
                           <?
					$tb->MoveNext();
					}
				?>
                         </select></td>
                         <td><?
			  	$tb1=$bd->select("SELECT trim(NUMORD) as numord
									FROM OPORDPAG
									ORDER BY NUMORD DESC");
			  ?>
                             <select name="NUMORDHAS" class="breadcrumb" id="NUMORDHAS">
                               <?
				  	while(!$tb1->EOF)	
					{
				  ?>
                               <option value="<? print $tb1->fields["numord"];?>"><? print $tb1->fields["numord"];?></option>
                               <?
					$tb1->MoveNext();
					}
				?>
                           </select></td>
            </tr>
			           <tr>
                         <td class="form_label_01">
                           <div align="left"><strong>Beneficiario: </strong></div></td>
                         <td><?
			  	$tb1=$bd->select("SELECT distinct cedrif, nomben FROM OPORDPAG ORDER BY cedrif asc");
			  ?>
                             <select name="BENDES" class="breadcrumb" id="BENDES">
                               <?
				  	while(!$tb1->EOF)	
					{
				  ?>
                               <option value="<? print trim($tb1->fields["cedrif"]) ;?>"><? print substr(trim($tb1->fields["cedrif"])." - ".trim($tb1->fields["nomben"]),0,30) ;?></option>
                               <?
					$tb1->MoveNext();
					}
				?>
                           </select></td>
                         <td><?
			  	$tb1=$bd->select("SELECT distinct cedrif, nomben FROM OPORDPAG ORDER BY cedrif desc");
			  ?>
                             <select name="BENHAS" class="breadcrumb" id="BENHAS">
                               <?
				  	while(!$tb1->EOF)	
					{
				  ?>
                                <option value="<? print trim($tb1->fields["cedrif"]) ;?>"><? print substr(trim($tb1->fields["cedrif"])." - ".trim($tb1->fields["nomben"]),0,30) ;?></option>
                               <?
					$tb1->MoveNext();
					}
				?>
                           </select></td>
            </tr>
			           <tr>
                         <td class="form_label_01">
                           <div align="left"><strong>Fecha: </strong></div></td>
                         <td><?
			  	$tb1=$bd->select("SELECT to_char(min(FECEMI),'dd/mm/yyyy') as fecemi FROM OPORDPAG ORDER BY FECEMI");
			  ?>
    							<input name="FECHADES" class="breadcrumb" id="FECHADES" value="<? print $tb1->fields["fecemi"];?>" size="12" maxlength="12" datepicker="true">
    							</input>                              
                         </td>
                         <td><?
						 //to_char(MIN(FECEMI),'DD/MM/YYYY') as fecemi 
			  	$tb1=$bd->select("SELECT to_char(max(FECEMI),'dd/mm/yyyy') as fecemi FROM OPORDPAG ORDER BY FECEMI");
			  ?>
                           <input name="FECHAHAS" class="breadcrumb" id="FECHAHAS" value="<? print $tb1->fields["fecemi"];?>" size="12" maxlength="12" datepicker="true">
                           </input></td>
            </tr>
			           <tr>
                         <td class="form_label_01">
                           <div align="left"><strong>Tipo Orden: </strong></div></td>
                         <td><?
			  	$tb1=$bd->select("SELECT tipcau FROM CPDOCCAU ORDER BY tipcau asc");
			  ?>
                             <select name="TIPCAUDES" class="breadcrumb" id="TIPCAUDES">
                               <?
				  	while(!$tb1->EOF)	
					{
				  ?>
                               <option value="<? print $tb1->fields["tipcau"];?>"><? echo substr($tb1->fields["tipcau"],0,30);?></option>
                               <?
					$tb1->MoveNext();
					}
				?>
                           </select></td>
                         <td><?
			  	$tb1=$bd->select("SELECT  tipcau FROM CPDOCCAU ORDER BY TIPCAU DESC");
			  ?>
                             <select name="TIPCAUHAS" class="breadcrumb" id="TIPCAUHAS">
                               <?
				  	while(!$tb1->EOF)	
					{
				  ?>
                               <option value="<? print $tb1->fields["tipcau"];?>"><? echo substr($tb1->fields["tipcau"],0,30);?></option>
                               <?
					$tb1->MoveNext();
					}
				?>
                           </select></td>
            </tr>
			           <tr>
                         <td class="form_label_01">
                           <div align="left"><strong>Lugar de Pago : </strong></div></td>
                         <td><input name="LUGAR_PAGO" type="text" VALUE ="MUNICIPIO HERES" class="breadcrumb" id="LUGAR_PAGO" ></td>
                         <td class="form_label_01">
                           <div align="left"><strong>Codigo:
                                 <input name="COD_LUGAR" type="text" class="breadcrumb" id="COD_LUGAR" VALUE="06" >
                         </strong></div></td>
            </tr>
			           <tr bordercolor="#FFFFFF">
                         <td class="form_label_01">&nbsp;</td>
                         <td colspan="2">&nbsp;                           </td>
            </tr>
			           <tr bordercolor="#FFFFFF">
                         <td class="form_label_01"><div align="right"><strong> </strong></div></td>
                         <td colspan="2"><div align="LEFT"><font color="#000066" size="3"><strong><em>Otros Datos</em></strong></font></div></td>
			           </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01"><div align="left"><strong>Contrato N&ordm;:</strong></div></td>
              <td colspan="2"><input name="NUMCONT" type="text" VALUE ="" class="breadcrumb" id="NUMCONT" ></td>
           
            </tr>
            <tr>
              <td class="form_label_01">
                <p><strong>3a. Anticipo : </strong></p></td>
              <td><input name="ANTIC" type="text" class="breadcrumb" id="ANTIC" ></td>
              <td class="form_label_01">                <div align="left">
                  <p><strong>3b.<br>
                  </strong><strong>Valuaciones :</strong><strong>
                    <input name="VALUAC" type="text" class="breadcrumb" id="VALUAC" >
                    </strong>                  </p>
                  </div></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01"><div align="left"><strong>Fecha :</strong></div></td>
              <td colspan="2"><input name="FECHA" type="text" class="breadcrumb" id="FECHA" datepicker="true"></td>
            </tr>
            <tr>
              <td class="form_label_01">
                <p><strong>Orden de Compra N&ordm; : </strong></p></td>
              <td><input name="NUMORD" type="text" class="breadcrumb" id="NUMORD" ></td>
              <td class="form_label_01">
                <div align="left"><strong>Fecha:
                      <input name="FECORD" type="text"class="breadcrumb" id="FECORD" datepicker="true">
              </strong></div></td>
            </tr>
            <tr>
              <td class="form_label_01">
                <p><strong>Orden de Servicio N&ordm;.: </strong></p>                </td>
              <td><input name="NUMSERV" type="text" class="breadcrumb" id="NUMSERV" ></td>
              <td class="form_label_01">
                <div align="left"><strong>Fecha: 
                    <input name="FECSERV" type="text" class="breadcrumb" id="FECSERV" datepicker="true">
              </strong></div></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01"><div align="left"><strong>Titulo de la Cuenta:</strong></div></td>
              <td colspan="2"><input name="cuenta" type="text" class="breadcrumb" id="cuenta" ></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01"><div align="left"><strong>Orientación del Reporte</strong></div></td>
              <td colspan="2"><div align="left"><strong>CARTA / VERTICAL </strong></strong></div></td>
            </tr>
            <tr bordercolor="#FFFFFF"> 
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
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
            <td colspan="2" align="center"><input name="Button" type="button" class="form_button01" value="Generar" onClick="validar();"> 
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

function validar()
{
if (document.form1.NUMCONT.value=="")
{ alert ("Por favor llene el campo numero de contrato");}
else {
	if (document.form1.ANTIC.value=="")
	{ alert ("Por favor llene el campo anticipo ");}
	else {
	     if (document.form1.VALUAC.value=="")
		{ alert ("Por favor llene el campo valuaciones ");}
		else {
				if (document.form1.FECHA.value=="")
				{ alert ("Por favor llene el campo fecha ");}
				else {
					if (document.form1.NUMORD.value=="")
					{alert ("Por favor llene el campo Orden de compra.");}
					else {
						if (document.form1.FECORD.value=="")
						{ alert ("Por favor llene el campo fecha de compra ");}
						else {
							if (document.form1.NUMSERV.value=="")
							{ alert ("Por favor llene el campo orden de servicio");}
							else{
								if (document.form1.FECSERV.value=="")
								{ alert ("Por favor llene el campo fecha de servicio ");}
								else {
									if (document.form1.cuenta.value=="")
									{ alert ("Por favor llene el campo titulo de la cuenta ");}
									else {document.form1.submit()};
								}
							}
						}
					}
				}
			}
		}
	}
}

function enviar()
{
	f=document.form1;
	f.titulo.value="";
	f.action="rOprOrdPre_Nomina.php";
	f.submit();
}
function cerrar()
{
	window.close();
}

</script>
</html>
