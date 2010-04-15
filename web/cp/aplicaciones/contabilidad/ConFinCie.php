<?
session_start();
if (empty($_SESSION["x"]))
{
  ?>
  <script language="JavaScript" type="text/javascript">
      location=("http://"+window.location.host+"/autenticacion_dev.php/login");
  </script>
  <?
}

require_once($_SESSION["x"].'lib/bd/basedatosAdo.php');
require_once($_SESSION["x"].'lib/general/funciones.php');
require_once($_SESSION["x"].'lib/general/tools.php');
validar(array(8,11,15));            //Seguridad  del Sistema
$codemp=$_SESSION["codemp"];
$bd=new basedatosAdo($codemp);
$tools= new tools();

$modulo="";
$forma="Cierre del Ejercicio";
$modulo=$_SESSION["modulo"] . " > Def. Especificas > ".$forma;

?>
<!--DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd"-->
<html>
<head>
<title><? echo $forma; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK media=all href="../../lib/css/base.css" type=text/css rel=stylesheet>
<link href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
<link href="../../lib/css/estilos.css" rel="stylesheet" type="text/css">
<link rel="STYLESHEET" type="text/css"  href="../../lib/general/toolbar/css/dhtmlXToolbar.css">
<link  href="../../lib/css/datepickercontrol.css" rel="stylesheet" type="text/css">
<script language="JavaScript"  src="../../lib/general/js/fecha.js"></script>
<script language="JavaScript"  src="../../lib/general/js/datepickercontrol.js"></script>
<script language="JavaScript"  src="../../lib/general/toolbar/js/dhtmlXProtobar.js"></script>
<script language="JavaScript"  src="../../lib/general/toolbar/js/dhtmlXToolbar.js"></script>
<script language="JavaScript"  src="../../lib/general/toolbar/js/dhtmlXCommon.js"></script>
<script type='text/javascript' src='../../lib/general/js/dFilter.js'></script>
<script type="text/JavaScript"  src="../../lib/general/js/prototype.js"></script>

<script language="JavaScript" type="text/JavaScript">
<!--

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
//-->
</script>
</head>

<body>


<?
      $sql="select * from contaba";
    if ($tb=$tools->buscar_datos($sql))
    {
      $modulo = $modulo."  *** Ejercicio Fiscal: ".substr($tb->fields["feccie"],0,4)." ***";
      $fecini=fsalida($tb->fields["fecini"]);
      $feccie=fsalida($tb->fields["feccie"]);
    }
?>


<table width="100%" border="0" align="center">
  <tr>
    <td width="100%" align="center"><? require_once('../../lib/general/top.php'); ?></td>
  </tr>
  <tr>
    <td align="center"><table width="568" border="0"  class="box">
        <tr>
        <td class="breadcrumb">SIGA  <? echo $modulo; ?>
      </tr>
      <tr>
        <td><table width="100%" class="recuadro">
        <tr>
          <td width="100%" align="center">&nbsp;</td>
          <td align="right" width="2%">
            <?  // MENU PRINCIPAL  // ?>
            <div  align="center" id="toolbar_zone2" style="border :0px solid Silver;"/>          </td>
        </tr>
      </table></td>
      </tr>
    <form action="ConFinComGen.php" method="post" name="form1">
      <tr>
        <td class="box">
<table width="100%" align="center" class="bodyline">
          <!--DWLayoutTable-->
                <tr>
                  <td height="22" colspan="3" class="form_label_01">

            <table width="100%" border="0" cellpadding="0" cellspacing="2">
                    <tr>
                      <td height="33" colspan="2" align="center"><strong>Rango de Fecha para la Realizaci&oacute;n del Cierre del Ejercicio</strong></td>
                      </tr>
                    <tr>
                      <td width="22%"><strong>Fecha Inicio: </strong></td>
                      <td><input name="fecini" type="text"  class="imagenInicio" id="fecini" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $fecini;?>" size="10" datepicker="true" onKeyUp = "this.value=formateafecha(this.value);" onKeyPress="buscarenter(event)"></td>
                    </tr>
                    <tr>
                      <td><strong>Fecha Cierre:</strong></td>
                      <td><input name="feccie" type="text"  class="imagenInicio" id="feccie" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $feccie;?>" size="10" datepicker="true" onKeyUp = "this.value=formateafecha(this.value);" onKeyPress="buscarenter(event)"></td>
                    </tr>
                    <tr>
                      <td height="33" colspan="2" align="center"><strong>Traslados de Saldos Contables</strong></td>
                      </tr>
                    <tr>
                      <td width="25%"><strong>Esquema Origen: </strong></td>
                      <td><input name="esquemaorigen" type="text"  class="imagenInicio" id="esquemaorigen" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $codemp ;?>" size="3" ></td>
                    </tr>
                    <tr>
                      <td><strong>Esquema Destino :</strong></td>
                      <td><input name="esquemadestino" type="text"  class="imagenInicio" id="esquemadestino" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print "00".($codemp+1); ?>" size="3"></td>
                    </tr>

                  </table>
                  </td>
                  </tr>
                <tr>
                  <td height="19" colspan="3" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                </tr>
                <tr >
                  <td height="22" colspan="3"  align="right"><div align="center">
                    <input type="button" name="cerrar" value="Trasladar Saldos" onClick="formulario('1')">
                    <input type="submit" name="cerrar" value="Generar Comprobantes de Cierre" onSubmit="formulario('2')">
                  </div></td>
                </tr>

                <tr>
                  <td width="253" height="0"></td>
                  <td width="27" colspan="-5"></td>
                  <td width="282"></td>
                </tr>
      </table>
      </td>
      </tr>
      </form>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="breadcrumb">Registro de <? echo $forma; ?>...
  <?  ///// variable oculta que se necesita para guardar //// ?><?  /////////////////////////////////////////////////////// ?>	</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><? require_once('../../lib/general/bottom.php'); ?></td>
  </tr>
</table>
</body>
<script language="JavaScript">

  function formulario(dato)
           {
               f=document.form1;
               if (dato=='1')
               {
					f.action="imecConFinComGen.php?var=1";
               		f.submit();
               }else{
               		f.submit();
               }
           }


  function Limpiar()
           {
               location=("ConFinCue.php")
           }


       function onButtonClick(itemId,itemValue)// TOOLBAR
    {
      f=document.form1;

      if(itemId == '0_ojo'){
        //alert("Usted vera una Consulta");
        catalogo2('mcodigo','x','mcodigo');  // campo, x = que no devuelva nada en el 2do campo, mcodigo = foco
      }
      /////////////////////
      else if(itemId == '0_cancelar')
           {
               Limpiar();
           }

      else if(itemId == '0_save')
      {
        if(confirm("¿Realmente desea Salvar?"))
        {
          f=document.form1;
          if (document.form1.mcodigo.value=="")
            { alert("No puede salvar sin introducir el Código Contable"); }

          else if (document.form1.descta.value=="")
            { alert("No puede salvar sin introducir la Descripción del Código Contable"); }
              else{
                document.getElementById("x15").disabled=false
                document.getElementById("x16").disabled=false

                f.action="imecConFinCue.php?imec=<? echo 'I'; ?>&IncMod=<? echo $IncMod; ?>";
                f.submit();
            }
        }
      }
      //////////////////////////
      else if(itemId == '0_print'){
          print();
      }
      else if(itemId == '0_new'){
        alert("Nuevo Formulario");
      }
      else if(itemId == '0_form'){
        alert("Modificar Formulario");
      }
      else if(itemId == '0_search'){
        alert("Busqueda");
      }
      else if(itemId == '0_filter'){
        alert("Filtro");
      }
      else if(itemId == '0_cancelar'){
          cancelar();
      }
      else if(itemId == '0_delete')
      {
        var eliminar='<? echo $Eliminar; ?>';
        var msg='<? echo $msg; ?>';
        if (eliminar=='No'){ alert("No se puede eliminar esta Cuenta Contable")}
        else if (msg!=''){ alert(msg)}
        else
        {
          if(confirm("¿Esta seguro que desea Eliminar este Código?"))
            {
              f=document.form1;
              f.action="imecConFinCue.php?imec=<? echo 'E'; ?>";
              f.submit();
            }
        }
      }

      else if(itemId == '0_calc'){
        alert("llamando la calculadora");
      }
      else if(itemId == '0_calend'){
        alert("LLamando el Calendario");
      }
      else if(itemId == '0_salir'){
        window.close();
      }



    //aToolBar=new dhtmlXToolbarObject('toolbar_zone2','100%',16,"");
    //aToolBar.setOnClickHandler(onButtonClick);
    //aToolBar.loadXML("../../lib/general/_toolbarV1.xml")
    //aToolBar.setToolbarCSS("toolbar_zone2","toolbarText3");
    //aToolBar.showBar();
     }
</script>

</html>
