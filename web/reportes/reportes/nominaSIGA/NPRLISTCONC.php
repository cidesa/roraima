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
?>
<form name="form1" method="post" action="">
  <table width="760" height="40"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#EEEEEE">
    <tr> 
      <td width="190" rowspan="2" bgcolor="#003399" class="cell_left_line02"><img src="../../img/tl_logo_01.gif" width="190" height="40" border="0"></td>
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
          <table width="689"  border="0" align="center" cellspacing="0" bordercolor="#6699CC" class="grid_line01_tl">
            <!--DWLayoutTable-->
            <tr bordercolor="#FFFFFF"> 
              <td height="24" colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>LISTADO 
                  DE CONCEPTOS 
                  <input name="titulo" type="hidden" id="titulo">
                  </strong></font></div></td>
            </tr>
            <tr bordercolor="#FFFFFF"> 
              <td height="20" class="form_label_01">&nbsp;</td>
              <td width="205">&nbsp;</td>
              <td width="288"><font color="#00FFCC">&nbsp; </font></td>
            </tr>
            <tr bordercolor="#6699CC"> 
              <td width="186" height="25" class="form_label_01"><strong>Tama&ntilde;o Hoja:</strong></td>
              <td> <input name="tamano" type="text" class="breadcrumb" id="tamano" readonly="true"></td>
              <td>&nbsp;</td>
            </tr>
            <tr bordercolor="#6699CC"> 
              <td height="25" class="form_label_01"><strong>Orientaci&oacute;n:</strong></td>
              <td> <input name="orientacion" type="text" class="breadcrumb" id="orientacion" readonly="true"></td>
              <td> <div align="right"> </div></td>
            </tr>
            <tr bordercolor="#6699CC"> 
              <td height="43" class="form_label_01"> <div align="left"><strong>Salida del 
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
              <td height="20" class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr bordercolor="#FFFFFF"> 
              <td height="20" colspan="3" class="form_label_01"> <div align="center"><font color="#000066" size="3"><strong><em>Criterios 
                  de Selecci&oacute;n</em></strong></font></div></td>
            </tr>
            <tr bordercolor="#6699CC"> 
              <td height="20" bordercolor="#FFFFFF" class="form_label_01">&nbsp;</td>
              <td><strong>DESDE</strong></td>
              <td><strong>HASTA</strong></td>
            </tr>
            <tr> 
              <td height="25" class="form_label_01"> <div align="left"><strong>Tipo de Concepto:</strong></div></td>
              <td colspan="2"> <div align="left"> 
                  <select name="tipcon" class="breadcrumb" id="select">
                    <option value="t">Todos</option>
                    <option value="a">Asignaciones</option>
                    <option value="d">Deducciones</option>
                    <option value="p">Aportes</option>
                  </select>
                </div></td>
            </tr>
            <tr> 
              <td height="26" class="form_label_01"> <div align="left"><strong> Concepto:</strong></div></td>
              <td> <div align="left"> 
                  <?
			  	
			  	$tb=$bd->select("select distinct a.codcon,b.nomcon from npnomcal a, npdefcpt b
								where a.codcon=b.codcon order by a.codcon");
			  ?>
                  <select name="con1" class="breadcrumb" id="con1">
                    <?
				  	while(!$tb->EOF)	
					{
				  ?>
                    <option value="<? print $tb->fields["codcon"];?>"><? print $tb->fields["codcon"];?></option>
                    <?
					$tb->MoveNext();
					}
				?>
                  </select>
                </div></td>
              <td> 
                <?
			  	
			  	$tb2=$bd->select("select distinct a.codcon,b.nomcon from npnomcal a, npdefcpt b
								where a.codcon=b.codcon order by a.codcon desc");
			  ?>
                <select name="con2" class="breadcrumb" id="con2">
                  <?
				  while(!$tb2->EOF)	
				{
			  ?>
                  <option value="<? print $tb2->fields["codcon"];?>"><? print $tb2->fields["codcon"];?></option>
                  <?
				  $tb2->MoveNext();
					}
				?>
                </select></td>
            </tr>
            <tr> 
              <td height="26" class="form_label_01"> <div align="left"><strong>C&oacute;digo 
                  Empleado:</strong></div></td>
              <td> <div align="left"> 
                  <?
			  	
			  	$tb=$bd->select("select distinct a.codemp,b.nomemp from npasicaremp a, nphojint b
							where a.codemp=b.codemp order by b.nomemp");
			  ?>
                  <select name="emp1" class="breadcrumb" id="emp1">
                    <?
				  	while(!$tb->EOF)	
					{
				  ?>
                    <option value="<? print $tb->fields["codemp"];?>"><? print $tb->fields["codemp"]."- ".$tb->fields["nomemp"];?></option>
                    <?
					$tb->MoveNext();
					}
				?>
                  </select>
                </div></td>
              <td> 
                <?
			  	
			  	$tb2=$bd->select("select distinct a.codemp,b.nomemp from npasicaremp a, nphojint b
							where a.codemp=b.codemp order by b.nomemp desc");
			  ?>
                <select name="emp2" class="breadcrumb" id="emp2">
                  <?
				  while(!$tb2->EOF)	
				{
			  ?>
                  <option value="<? print $tb2->fields["codemp"];?>"><? print $tb2->fields["codemp"]."- ".$tb2->fields["nomemp"];?></option>
                  <?
				  $tb2->MoveNext();
					}
				?>
                </select></td>
            </tr>
            <tr> 
              <td height="26" class="form_label_01"> <div align="left"><strong> Cargo:</strong></div></td>
              <td> <div align="left"> 
                  <?
			  	
			  	$tb=$bd->select("SELECT distinct(codcar),nomcar 
								FROM NPASICAREMP order by codcar");
			  ?>
                  <select name="car1" class="breadcrumb" id="car1">
                    <?
				  	while(!$tb->EOF)	
					{
				  ?>
                    <option value="<? print $tb->fields["codcar"];?>"><? print $tb->fields["codcar"]." - ".$tb->fields["nomcar"];?></option>
                    <?
					$tb->MoveNext();
					}
				?>
                  </select>
                </div></td>
              <td> 
                <?
			  	
			  	$tb2=$bd->select("SELECT distinct(codcar),nomcar 
								FROM NPASICAREMP order by codcar desc");
			  ?>
                <select name="car2" class="breadcrumb" id="car2">
                  <?
				  while(!$tb2->EOF)	
				{
			  ?>
                  <option value="<? print $tb2->fields["codcar"];?>"><? print $tb2->fields["codcar"]." - ".$tb2->fields["nomcar"];?></option>
                  <?
				  $tb2->MoveNext();
					}
				?>
                </select></td>
            </tr>
            <tr> 
              <td height="26" class="form_label_01"> <div align="left"><strong>Categor&iacute;a 
                  Presupuestaria:</strong></div></td>
              <td> <div align="left"> 
                  <?
			  	
			  	$tb=$bd->select("select distinct rtrim(codcat) as codcat,nomcat from npcatpre
								order by rtrim(codcat)");
			  ?>
                  <select name="cat1" class="breadcrumb" id="cat1">
                    <?
				  	while(!$tb->EOF)	
					{
				  ?>
                    <option value="<? print $tb->fields["codcat"];?>"><? print $tb->fields["codcat"]."- ".$tb->fields["nomcat"];?></option>
                    <?
					$tb->MoveNext();
					}
				?>
                  </select>
                </div></td>
              <td> 
                <?
			  	
			  	$tb2=$bd->select("select distinct rtrim(codcat) as codcat,nomcat from npcatpre
								order by rtrim(codcat) desc");
			  ?>
                <select name="cat2" class="breadcrumb" id="cat2">
                  <?
				  while(!$tb2->EOF)	
				{
			  ?>
                  <option value="<? print $tb2->fields["codcat"];?>"><? print $tb2->fields["codcat"]."- ".$tb2->fields["nomcat"];?></option>
                  <?
				  $tb2->MoveNext();
					}
				?>
                </select></td>
            </tr>
            <tr> 
              <td height="26" class="form_label_01"> <div align="left"><strong>N&oacute;mina:</strong></div></td>
              <td valign="top"> <div align="left"> 
                  <?
			  	
			  	$tb=$bd->select("select distinct a.codnom,b.nomnom from npnomcal a, npnomina b
							where a.codnom=b.codnom order by a.codnom");
			  ?>
                  <select name="nom" class="breadcrumb" id="nom">
                    <?
				  	while(!$tb->EOF)	
					{
				  ?>
                    <option value="<? print $tb->fields["codnom"];?>"><? print $tb->fields["codnom"]." - ".strtoupper($tb->fields["nomnom"]);?></option>
                    <?
					$tb->MoveNext();
					}
				?>
                  </select>
              </div></td>
            <td rowspan="2" align="center" valign="middle"><p><strong>N&oacute;mina Especial:</strong></p>
              <p>
			  <?
			  	$tb=$bd->select("SELECT DISTINCT(A.CODNOMESP) AS COD,B.DESNOMESP AS DESC
								FROM NPNOMCAL A,NPNOMESPTIPOS B
								WHERE A.CODNOMESP=B.CODNOMESP
								ORDER BY A.CODNOMESP");
			  	//$tb=$bd->select("SELECT DISTINCT(A.CODNOM) AS COD, B.DESNOMESP AS DESC
				//				FROM NPNOMCAL A,NPNOMESPTIPOS B
				//				WHERE A.CODNOM=B.CODNOMESP
				//				ORDER BY A.CODNOM");
			  ?>
			  <select name="nomesp" id="nomesp" class="breadcrumb">
                    <?
				  	while(!$tb->EOF)	
					{
				  ?>
                    <option value="<? print $tb->fields["cod"];?>"><? print $tb->fields["cod"]." - ".strtoupper($tb->fields["desc"]);?></option>
                    <?
					$tb->MoveNext();
					}
				?>
                  </select>
                </p></td>
            </tr>
            <tr> 
              <td height="25" class="form_label_01"><strong>Generar Disco:</strong></td>
              <td> <div align="left">
                <select name="select" class="breadcrumb">
                  <option selected="selected">NO</option>
                  <option>SI</option>
                  </select>
                </div></td>
            </tr>
            <tr bordercolor="#FFFFFF"> 
              <td height="21" class="form_label_01"><input name="sqls" type="hidden" id="sqls"></td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr bordercolor="#FFFFFF"> 
              <td height="20" class="form_label_01">&nbsp;</td>
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
	f.titulo.value="LISTADO POR CONCEPTOS";
	f.action="rNPRLISTCONC.php";
	f.submit();
}
function cerrar()
{
	window.close();
}
function catalogo1()
{
 	pagina="catalogoform.php?campo=codpre1&sql=select codpre as campo1 from cpimpcom order by codpre asc";
	window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=300,height=200,rezizable=yes, left=100,top=100");
}
function catalogo2()
{
 	pagina="catalogoform.php?campo=codpre2&sql=select codpre as campo1 from cpimpcom order by codpre desc";
	window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=300,height=200,rezizable=yes, left=100,top=100");
}
</script>
</html>
