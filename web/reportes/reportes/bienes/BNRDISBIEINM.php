<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>SIGA Reportes</title>
<link href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
<link href="../../lib/css/datepickercontrol.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="../../lib/general/datepickercontrol.js"></script>
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
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>DISPOSICION DE BIENES INMUEBLES
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
            <tr>
              <td class="form_label_01"> <div align="left"><strong>Código del Activo:</strong></div></td>
             <td> <div align="left">
               	<input name="cat1" type="text" class="breadcrumb" id="cat1"
                   value="<?$sql="SELECT min(a.codact) as cod from bnregmue a, bndefact b where a.codact = b.codact";
 					LlenarTextoSql($sql,"cod",$bd); ?>" size ="20">
 					 <input type="button" name="Button5" value="..." onClick=" catalogo3('cat1');">
 			      </div></td>

              <td> <div align="left">
               	<input name="cat2" type="text" class="breadcrumb" id="cat2"
                   value="<?$sql="SELECT max(a.codact) as cod from bnregmue a, bndefact b where a.codact = b.codact ";
 					LlenarTextoSql($sql,"cod",$bd); ?>" size ="20">
 					 <input type="button" name="Button6" value="..." onClick=" catalogo3('cat2');">
 			      </div></td>
            </tr>


                        <tr>
              <td class="form_label_01"> <div align="left"><strong>Código del bien:</strong></div></td>
             <td> <div align="left">
               	<input name="cat3" type="text" class="breadcrumb" id="cat3"
                   value="<?$sql="select min(codmue) as cod FROM bnregmue";
 					LlenarTextoSql($sql,"cod",$bd); ?>" size ="20">
 					 <input type="button" name="Button5" value="..." onClick=" catalogo5('cat3');">
 			      </div></td>

              <td> <div align="left">
               	<input name="cat4" type="text" class="breadcrumb" id="cat4"
                   value="<?$sql="select max(codmue) as cod FROM bnregmue";
 					LlenarTextoSql($sql,"cod",$bd); ?>" size ="20">
 					 <input type="button" name="Button6" value="..." onClick=" catalogo5('cat4');">
 			      </div></td>
            </tr>

          <tr>
              <td class="form_label_01"> <div align="left"><strong>Número de Disposición:</strong></div></td>
             <td> <div align="left">
               	<input name="cat5" type="text" class="breadcrumb" id="cat5"
                   value="<?$sql="select min(nrodisinm) as cod from bndisinm";
 					LlenarTextoSql($sql,"cod",$bd); ?>" size ="20">
 					 <input type="button" name="Button5" value="..." onClick=" catalogo7('cat5');">
 			      </div></td>

              <td> <div align="left">
               	<input name="cat6" type="text" class="breadcrumb" id="cat6"
                   value="<?$sql="select max(nrodisinm) as cod from bndisinm";
 					LlenarTextoSql($sql,"cod",$bd); ?>" size ="20">
 					 <input type="button" name="Button6" value="..." onClick=" catalogo7('cat6');">
 			      </div></td>
            </tr>

   		 <tr>
              <td class="form_label_01"> <div align="left"><strong>Fecha de Disposición:</strong></div></td>
             <td> <div align="left">
               	<input name="cat7" type="text" class="breadcrumb" id="cat7"
                   value="<?$sql="select to_char(min(fecdisinm),'DD/MM/YYYY') as fecha FROM bndisinm";
 					LlenarTextoSql($sql,"fecha",$bd); ?>" size ="20" datepicker='true'>

 			      </div></td>

              <td> <div align="left">
               	<input name="cat8" type="text" class="breadcrumb" id="cat8"
                   value="<?$sql="select to_char(max(fecdisinm),'DD/MM/YYYY') as fecha FROM bndisinm";
 					LlenarTextoSql($sql,"fecha",$bd); ?>" size ="20" datepicker='true'>

 			      </div></td>
            </tr>

             <tr>
              <td class="form_label_01"> <div align="left"><strong>Tipo de Disposición:</strong></div></td>
             <td> <div align="left">
               	<input name="cat9" type="text" class="breadcrumb" id="cat9"
                   value="<?$sql="select min(tipdisinm) as cod from bndisinm";
 					LlenarTextoSql($sql,"cod",$bd); ?>" size ="20">
 					 <input type="button" name="Button5" value="..." onClick=" catalogo8('cat9');">
 			      </div></td>

              <td> <div align="left">
               	<input name="cat10" type="text" class="breadcrumb" id="cat10"
                   value="<?$sql="select max(tipdisinm) as cod from bndisinm";
 					LlenarTextoSql($sql,"cod",$bd); ?>" size ="20">
 					 <input type="button" name="Button6" value="..." onClick=" catalogo8('cat10');">
 			      </div></td>

            </tr>

		 <tr>
              <td class="form_label_01"> <div align="left"><strong>Ubicación:</strong></div></td>
             <td> <div align="left">
               	<input name="cat11" type="text" class="breadcrumb" id="cat11"
                   value="<?$sql="select min(codubiori) as cod from bndisinm";
 					LlenarTextoSql($sql,"cod",$bd); ?>" size ="20">
 					 <input type="button" name="Button5" value="..." onClick=" catalogo9('cat11');">
 			      </div></td>

              <td> <div align="left">
               	<input name="cat12" type="text" class="breadcrumb" id="cat12"
                   value="<?$sql="select max(codubiori) as cod from bndisinm";
 					LlenarTextoSql($sql,"cod",$bd); ?>" size ="20">
 					 <input type="button" name="Button6" value="..." onClick=" catalogo9('cat12');">
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
	f.titulo.value="CATALOGO DE ACTIVOS";
	f.action="rBNRDISBIEINM.php";
	f.submit();
}
function cerrar()
{
	window.close();
}


   function catalogo3(campo)
   {
      mysql='select distinct(a.codact) as cod, b.desact as des FROM bnregmue a, bndefact b where a.codact = b.codact ORDER BY a.codact';
	  pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	  window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }

function catalogo5(campo)
   {
      mysql='select distinct(codmue) as CODIGO, desmue as DESCRIPCION FROM bnregmue ORDER BY codmue asc';
	   pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	  window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }


function catalogo7(campo)
   {
      mysql='select distinct(nrodisinm) as CODIGO from bndisinm order by nrodisinm';
	   pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	  window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }
   function catalogo8(campo)
   {
      mysql='select distinct(tipdisinm) as CODIGO from bndisinm order by tipdisinm';
	   pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	  window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }
   function catalogo9(campo)
   {
      mysql='select distinct(codubiori)as CODIGO from bndisinm order by codubiori';
	   pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	  window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }


</script>
</html>
