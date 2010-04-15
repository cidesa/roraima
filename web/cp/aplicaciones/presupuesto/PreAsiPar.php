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

require($_SESSION["x"].'lib/bd/basedatosAdo.php');
require($_SESSION["x"].'lib/general/funciones.php');
require($_SESSION["x"].'lib/general/tools.php');
validar(array(8,11,15));            //Seguridad  del Sistema
$codemp=$_SESSION["codemp"];
$bd=new basedatosAdo($codemp);
$tools=new tools();

$modulo="";
$forma="Asignar Clasificador de Partidas";
$modulo=$_SESSION["modulo"] . " > Definiciones Especificas >".$forma;

Limpiar();
Obtener_FormatoPresup();
ObtenerNiveles();



if (!empty($_POST["var"]))
{

    if (!empty($_POST["codpre"])){ $codpre=trim($_POST["codpre"]); } else { $codigo=trim($_GET["codpre"]);}
    if (!empty($_POST["codigocon"])){ $codigocon=trim($_POST["codigocon"]); } else { $codigocon="";}

    $var=$_POST["var"];

    if (($var=='9') and (!empty($codpre))){
      //////  Busqueda por Codigo  ////////
    $codpre=trim($codpre);
    $sql="select * from cpdeftit where trim(codpre)='$codpre'";
     if ($tb=$tools->buscar_datos($sql))
     {
      $nompre=$tb->fields["nompre"];

       if (!empty($codigocon)){
         $sql="select * from cpdeftit where trim(codpre)='$codigocon'";
         if ($tb=$tools->buscar_datos($sql)){ $nompre1=$tb->fields["nompre"]; }else { Mensaje("Categoría Presupuestaria Inválida");$nompre1=""; $codigocon="";}
        }

        Datos_CodigoPre();
     }
     else { Mensaje("Categoría Presupuestaria Inválida ");$nompre=""; $codpre="";}
  }

}

  function Datos_CodigoPre()
  {
    global $codpre;
    global $LonCat;
    global $LonPar;
    global $tools;
    global $sqlgrip;

    if (strlen($codpre)==($LonCat-1)){
         $sql= "select substr(codpre,($LonCat+1),($LonPar - 1)) as codpre, nompre  from cpdeftit where length(rtrim(codpre))=($LonCat + $LonPar - 1) and substr(codpre,1,($LonCat - 1))=trim('$codpre') order by codpre";

       if ($tb=$tools->buscar_datos($sql))
       {
       $sqlgrip= "select substr(codpre,($LonCat+1),($LonPar - 1)) as codpre, nompre  from cpdeftit where length(rtrim(codpre))=($LonCat + $LonPar - 1) and substr(codpre,1,($LonCat - 1))=trim('$codpre') order by codpre";

       }
    }else{
      Mensaje("Categoría Presupuestaria Inválida");
      Limpiar();
    }

  }

  function Limpiar()
  {
  global $saldo_anterior;
  global $descta;
    $saldo_anterior=0;
    $descta="";
  }

  function Obtener_FormatoPresup()
  {
  global $tools;
  global $bd;
  global $FormatoPresup;

    ////////// Definicion Presupuestaria ///////////
     $sql="select * from cpdefniv";
     if ($tb=$tools->buscar_datos($sql))
     {
     $FormatoPresup=trim($tb->fields["forpre"]);  //Mascara
     }
  }


  function ObtenerNiveles()  //Niveles
  {
  global $tools;
  global $tb;
  global $LonCat;
  global $LonPar;

    $sql="select * from cpniveles";
    if ($tb=$tools->buscar_datos($sql))
     {
       while(!$tb->EOF){
        if ($tb->fields["catpar"]=='C'){
           $LonCat=$LonCat + strlen($tb->fields["nomabr"]) + 1; }
        else if ($tb->fields["catpar"]=='P'){
           $LonPar=$LonPar + strlen($tb->fields["nomabr"]) + 1; }

      $tb->MoveNext();
      }
     }
  }

?>
<!-- DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
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
<script language="JavaScript"  src="../../lib/general/js/funciones.js"></script>
<script language="JavaScript"  src="../../lib/general/js/fecha.js"></script>
<script language="JavaScript"  src="../../lib/general/js/datepickercontrol.js"></script>
<script language="JavaScript"  src="../../lib/general/toolbar/js/dhtmlXProtobar.js"></script>
<script language="JavaScript"  src="../../lib/general/toolbar/js/dhtmlXToolbar.js"></script>
<script language="JavaScript"  src="../../lib/general/toolbar/js/dhtmlXCommon.js"></script>
<script type="text/javascript" src="../../lib/general/js/dFilter.js"></script>
<script type="text/JavaScript"  src="../../lib/general/js/prototype.js"></script>

<style type="text/css">
<!--
.style9 {color: #FFFFFF
 }
-->
</style>
<script language="JavaScript" type="text/JavaScript">
  function desactivar(fila)
  {
  bloquearGrip(2,fila-1,2);
  }



  </script>

<script language="JavaScript" type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->



</script>
</head>

<body onLoad="MM_preloadImages('../../images/rbut_01_f2.gif','../../images/rbut_02_f2.gif','../../images/rbut_03_f2.gif','../../images/rbut_04_f2.gif')">
<form name="form1" method="post" action="">
<table width="100%" align="center">
  <tr>
<td width="100%">
      <? require_once('../../lib/general/top_p.php'); ?>
    </td>
  </tr>
</table>
<table width="584" align="center">
<tr>
<td height="343" valign="top">
<table width="100%" height="175" border="0" class="box">
  <!--DWLayoutTable-->
  <tr>
    <td height="20" valign="top" class="breadcrumb">SIGA <? echo $modulo; ?></td>
  </tr>
  <tr >
    <td  >
      <table width="100%" class="recuadro">
      <tr>
         <td align="center" width="27%"><!--<input type="button" name="Button" value="|&lt;" onClick="primero()">
          <input type="button" name="Submit2" value="&lt;&lt;" onClick="anterior()">
          <input type="button" name="Submit3" value="&gt;&gt;" onClick="siguiente()">
          <input type="button" name="Submit4" value="&gt;|" onClick="ultimo()">-->				</td>
        <td align="left" width="12%">
            </td>
          <td align="right" width="61%">
          <?  // MENU PRINCIPAL  // ?>
          <div  align="center" id="toolbar_zone2" style="border :0px solid Silver;"/>
        </td>
      </tr>
    </table>
  </td>
  </tr>
  <tr>
    <td class="box" >
        <table width="100%" align="center" class="bodyline">
          <!--DWLayoutTable-->
                <tr>
                  <td height="22" class="form_label_01">
           <fieldset>
           <legend>Cat&eacute;goria Presupuestaria Or&iacute;gen</legend>
           <table border="0" width="100%">
                    <tr>
                      <td width="14%">C&oacute;digo</td>
                      <td width="13%"><input name="codpre" type="text" class="imagenInicio" id="codpre" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? echo $codpre; ?>" size="15" maxlength="20"  onKeyDown="javascript: return dFilter(event.keyCode, this,'<? print $FormatoPresup; ?>');" onKeyPress="buscarenter(event)" onFocus="PreAsiPar.php">                        </td>
                      <td width="5%"><input name="suss" type="button" id="suss" value="..." onClick="javascript: catalogo2(nompre.id,codpre.id,'submit');"></td>
                      <td width="68%"><input name="nompre" type="text" class="imagenInicio" id="nompre" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? echo $nompre; ?>" size="60" maxlength="100" readonly="true">
            <input name="var" type="hidden" id="var" value="<? print $var;?>">
            </td>
                    </tr>
                  </table>
          </fieldset>
          </td>
                </tr>
                <tr>
                  <td height="22" class="form_label_01">
           <fieldset>
           <legend>Cat&eacute;goria Presupuestaria Destino</legend>
           <table width="100%" border="0">
                    <tr>
                      <td width="14%">C&oacute;digo</td>
                      <td width="13%"><input name="codigocon" type="text" class="imagenInicio" id="codigocon" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? echo $codigocon; ?>" size="15" maxlength="20"  onKeyDown="javascript:return dFilter (event.keyCode, this,'<? echo $FormatoPresup; ?>');" onKeyPress="buscarenter(event)"></td>
                      <td width="5%"><input name="suss2" type="button" id="suss4" value="..." onClick="javascript: catalogo2(nompre1.id,codigocon.id,codigocon.id);"></td>
                      <td width="68%"><input name="nompre1" type="text" class="imagenInicio" id="nompre1" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? echo $nompre1; ?>" size="60" maxlength="100" readonly="true"></td>
                    </tr>
                  </table>
          </fieldset>
          </td>
                </tr>
      </table>

    </td>
  </tr>
  <tr>
    <td>
  <table width="100%" border="0" cellpadding="0" cellspacing="0"  class="recuadro">
                <tr valign="bottom" bgcolor="#ECEBE6">
                  <td width="4%" height="16" valign="middle" class="tpButtons"><span class="grid_line01_br">
                    <input type="checkbox" name="todos" id="todos" value="" onClick="seleccion_check()">
                  </span></td>
                  <td width="96%" valign="middle"  class="tpButtons"><img src="../../images/spacer.gif" width="16" height="20" align="absmiddle">Partidas Seleccionadas</td>
                </tr>
                <tr valign="bottom" bgcolor="#ECEBE6">
                  <td height="1" colspan="2">
         <div class="grid01" id="grid01">
                      <?
                ////////////////////////?>
        <table width="100%"  border="0" cellpadding="0" cellspacing="0">
          <tr >
            <td width="4%" class="queryheader" >&nbsp;</td>
            <td width="29%" class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;C&oacute;digo</td>
            <td width="67%" class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;&nbsp;Partidas</td>
            </tr>
            <?
            /////////////////
            $i=1;
            if ($tb=$tools->buscar_datos($sqlgrip)){
            while (!$tb->EOF){
              //while ($i<=12)
             ?>
            <tr>
              <td  class="grid_line01_br"><input type="checkbox" name="x<? print $i;?>1" id="x<? print $i;?>1" value="" onClick="marcar(this)"></td>
              <td  class="grid_line01_br"><input name="x<? print $i;?>2" type="text" class="grid_txt01" id="x<? print $i;?>2" tabindex="1" value="<? print $tb->fields["codpre"]; ?>" size="23" maxlength="33" readonly="true"></td>
              <td  class="grid_line01_br"><input name="x<? print $i;?>3" type="text" class="grid_txt01" id="x<? print $i;?>3"  tabindex="2" value="<? print $tb->fields["nompre"]; ?>" size="85"  align="right" readonly="true"></td>
              </tr>
            <?
            $tb->MoveNext();
            $i=$i+1;
            }
            }else{
            $i=1;
             ?>
            <tr>
              <td  class="grid_line01_br"><input type="checkbox" name="x<? print $i;?>1" id="x<? print $i;?>1" value=""></td>
              <td  class="grid_line01_br"><input name="x<? print $i;?>2" type="text" class="grid_txt01" id="x<? print $i;?>2" tabindex="1" value="<? print $tb->fields["numcom"]; ?>" size="23" maxlength="33" readonly="true"></td>
              <td  class="grid_line01_br"><input name="x<? print $i;?>3" id="x<? print $i;?>3" type="text" class="grid_txt01" size="85" value="<? print $tb->fields["descom"]; ?>" align="right"  tabindex="2" readonly="true"></td>
            </tr>
            <?
             }
             ?>
        </table>
                    </div>

          </td>
                </tr>
                <? // } ?>
              </table></td>
  </tr>
  <tr>
    <td class="breadcrumb"><span class="style13">Registro de <? echo $forma; ?>...
  <?  ///// variable oculta que se necesita para guardar //// ?>
      <input name="i" type="hidden" id="i" value="<? echo $i; ?>" />
  <?  /////////////////////////////////////////////////////// ?>
    </span></td>
  </tr>
</table>  </tr>
</td>
</table>
</form>
<? require_once('../../lib/general/bottom.php'); ?>
</body>
<script language="JavaScript">

    function buscarenter(e)
      {
    //var codpre
        if (e.keyCode==13)
    {
      f=document.form1;
      f.codpre.value=rayitas(e,f.codpre.value);
      if (f.codigocon.value!=""){
        f.codigocon.value=rayitas(e,f.codigocon.value); }
      document.getElementById('var').value='9';
      f.submit();
    }
     }


  function Limpiar()
           {
               location=("PreAsiPar.php")
           }


  function onButtonClick(itemId,itemValue)// TOOLBAR
    {
      f=document.form1;

      if(itemId == '0_ojo'){
        //alert("Usted vera una Consulta");
        catalogo2('codpre','x','codpre');  // campo, x = que no devuelva nada en el 2do campo, codpre = foco
      }
      /////////////////////
      else if(itemId == '0_cancelar')
           {
               Limpiar();
           }

      else if(itemId == '0_save')
      {
        if(confirm("�Realmente desea Salvar?"))
        {
          f=document.form1;
          if (document.form1.codpre.value=="")
            { alert("No puede salvar sin introducir el Código Presupuestario Origen"); }

          else if (document.form1.codigocon.value=="")
            { alert("No puede salvar sin introducir el Código Presupuestario Destino"); }

          else{
                  desbloquearGrip(1,4,2); //(columna,fila)


                f.action="imecPreAsiPar.php";
                f.submit();
            }
        }
      }
      //////////////////////////
      else if(itemId == '0_print'){
          print();
      }
      else if(itemId == '0_new'){

      }
      else if(itemId == '0_form'){

      }
      else if(itemId == '0_search'){

      }
      else if(itemId == '0_filter'){

      }
      else if(itemId == '0_cancelar'){
          cancelar();
      }
      else if(itemId == '0_delete')
      {
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
    };


    aToolBar=new dhtmlXToolbarObject('toolbar_zone2','100%',16,"");
    aToolBar.setOnClickHandler(onButtonClick);
    aToolBar.loadXML("../../lib/general/_toolbarV1.xml")
    aToolBar.setToolbarCSS("toolbar_zone2","toolbarText3");
    aToolBar.showBar();





     function primero()
      {
      f=document.form1;
       document.getElementById('var').value='1';
      f.submit();
     }
     function anterior()
      {
      f=document.form1;
       document.getElementById('var').value='2';
      f.submit();
     }
     function siguiente()
      {
      f=document.form1;
       document.getElementById('var').value='3';
      f.submit();
     }
     function ultimo()
      {
      f=document.form1;
       document.getElementById('var').value='4';
      f.submit();
     }


     function catalogo2(campo,campo2,foco)
     {
    f=document.form1;
    document.getElementById('var').value='9';
    var LonCat='<? echo $LonCat; ?>'

      //sql='Select nompre as Descripcion, codpre as Codigo from cpdeftit where length(rtrim(codpre))='+LonCat+' - 1 and upper(nompre) like upper(�%�) order by codpre';
      //pagina="catalogo2.php?campo="+campo+"&campo2="+campo2+"&sql="+sql+"&foco="+foco;
      //window.open(pagina,"","menubar=no,toolbar=no,scrollbars=yes,width=570,height=500,resizable=yes,left=50,top=50");


         var host = '<? echo $_SERVER["HTTP_HOST"]; ?>';
          pagina='http://'+host+'/herramientas_dev.php/generales/catalogo/metodo/Preasipar_Cpdeftit/clase/Cpdeftit/frame/form1/obj1/'+campo2+'/obj2/'+campo+'/campo1/codpre/campo2/nompre/submit/true/param1/'+LonCat;
          window.open(pagina,"true","menubar=no,toolbar=no,scrollbars=yes,width=490,height=490,resizable=yes,left=500,top=80");

     }

     function seleccion_check()
     {
     f=document.form1
     if (f.todos.checked==true)
      {
       fila='<? echo $i; ?>';
       f.todos.value='1' //Para saber si se marco todas para validarlo en imecPreAsiPar
       i=1;
       while (i<=fila)
       {
        var x="x"+i+"1";
        document.getElementById(x).value='1'
        document.getElementById(x).checked=true
        i=i+1;
      }
    }else{
       fila='<? echo $i; ?>';
       f.todos.value='' //Para saber si se marco todas para validarlo en imecPreAsiPar
       i=1;
       while (i<=fila)
       {
        var x="x"+i+"1";
        document.getElementById(x).value=''
        document.getElementById(x).checked=false
        i=i+1;
      }

     }
     }

     function marcar(f)
     {
     if (f.checked==true)
        {
      document.getElementById(f.id).value='1'
         document.form1.todos.value='' //Para saber si se marco todas para validarlo en imecPreAsiPar

      }
    else
      {
      document.getElementById(f.id).value=''
         document.form1.todos.value='' //Para saber si se marco todas para validarlo en imecPreAsiPar
      }
     }

   //  desactivar('<? echo $i; ?>')
</script>
</html>