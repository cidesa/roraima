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
$forma="Actualizar Comprobantes";
$modulo=$_SESSION["modulo"] . " > Def. Especificas > ".$forma;

Limpiar();
if (!empty($_GET["var"]))
  {
    if (!empty($_POST["mcodigo"])){ $codigo=trim($_POST["mcodigo"]); } else { $codigo=trim($_GET["mcodigo"]);}
    $var=$_GET["var"];

        ///////////////// BARRA DE MENU /////////////////
    if ($var=='1')
      {
        if ($tb=$tools->primerRegistro('contabb','codcta'))
        {
          $codigo=$mcodigo=trim($tb->fields["codcta"]);
          $var=9;   //Para que haga la busqueda
        }
      }
    else if ($var=='2') //Anterior
      {
        if (!empty($codigo))
        {
          $tb=$tools->anteriorRegistro('contabb','codcta',$codigo,'N');
          $codigo=$mcodigo=trim($tb->fields["codcta"]);
          $var=9;   //Para que haga la busqueda
        }
        else
        {
          $tb=$tools->primerRegistro('contabb','codcta');
          $codigo=$mcodigo=trim($tb->fields["codcta"]);
          $var=9;   //Para que haga la busqueda
        }
      }
    else if ($var=='3') //PROXIMO
      {
        if (!empty($codigo))
        {
          $tb=$tools->proximoRegistro('contabb','codcta',$codigo,'N');
          $codigo=$mcodigo=trim($tb->fields["codcta"]);
          $var=9;   //Para que haga la busqueda
        }
        else
        {
          $tb=$tools->primerRegistro('contabb','codcta');
          $codigo=$mcodigo=trim($tb->fields["codcta"]);
          $var=9;   //Para que haga la busqueda
        }
      }
    else if ($var=='4')
      {
        if ($tb=$tools->ultimoRegistro('contabb','codcta'))
        {
          $codigo=$mcodigo=trim($tb->fields["codcta"]);
          $var=9;   //Para que haga la busqueda
        }
      }
    //////////////// FIN MENU ////////////////

}

      $sql="SELECT * from contaba where codemp='001'";
      $tb=$bd->select($sql);
      if (!$tb->EOF)
        {
        	$modulo = $modulo."  *** Ejercicio Fiscal: ".substr($tb->fields["feccie"],0,4)." ***";
        }


  function Limpiar()
  {
  global $saldo_anterior;
  global $descta;
    $saldo_anterior=0;
    $descta="";
  }


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


</head>

<body>
<table width="100%" border="0" align="center">
  <tr>
    <td width="100%" align="center"><? require_once('../../lib/general/top.php'); ?></td>
  </tr>
  <tr>
    <td align="center">
  <form name="form1" method="post">
  <table width="600" border="0"  class="box" >
      <tr>
        <td class="breadcrumb">SIGA <? echo $modulo; ?>
      <input name="imec" type="hidden" id="imec"></td>
      </tr>
      <tr>
        <td><table width="100%" class="recuadro">
        <tr>
          <td width="100%" align="center">&nbsp;				  </td>
          <td align="right" width="2%">
            <?  // MENU PRINCIPAL  // ?>
            <div  align="center" id="toolbar_zone2" style="border :0px solid Silver;"/>					</td>
        </tr>
      </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="0">
          <tr>
            <td class="tpButtons">Comprobantes</td>
            </tr>
          <tr>
            <td>
<table width="100%" border="0" cellpadding="0" cellspacing="0"  class="recuadro">
                <tr valign="bottom" bgcolor="#ECEBE6">
                  <td width="100%" height="1"> <div class="grid01" id="grid01">
                      <? ///////// G R I B ////////////?>
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="37%" class="queryheader" >
                    <input type="checkbox" name="todos" id="todos" value="" onClick="seleccion_check()">                  </td>
    <td width="37%" class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;N&uacute;mero de Comprobantes</td>
    <td width="13%" class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;&nbsp;Fecha</td>
    <td width="50%" class="queryheader" ><img src="../../images/prev1.gif" alt="busqueda" width="10" height="10">&nbsp;&nbsp;Descripci&oacute;n</td>
    </tr>
    <?
    //////// Cargar_Comprobantes //////////
    $i=1;
    $sql="select numcom,feccom,descom from contabc where stacom='D' order by feccom,numcom ASC";
    if ($tb=$tools->buscar_datos($sql)){
      while (!$tb->EOF){
      //while ($i<=12)
     ?>
    <tr>
      <td  class="grid_line01_br"><input type="checkbox" name="x<? print $i;?>1" id="x<? print $i;?>1" value="" onClick="marcar(this)"></td>
      <td  class="grid_line01_br"><input name="x<? print $i;?>2" type="text" class="grid_txt01" id="x<? print $i;?>2" tabindex="1" value="<? print $tb->fields["numcom"]; ?>" size="33" maxlength="8" readonly="true"></td>
      <td  class="grid_line01_br"><input name="x<? print $i;?>3" type="text" class="grid_txt01" id="x<? print $i;?>3"  tabindex="2" value="<? print fsalida($tb->fields["feccom"]); ?>" size="11" readonly="true" align="right"></td>
      <td  class="grid_line01_br"><input name="x<? print $i;?>4" id="x<? print $i;?>4" type="text" class="grid_txt01" size="150" value="<? print $tb->fields["descom"]; ?>" align="right"  tabindex="2" readonly="true"></td>
      </tr>
    <?
    $tb->MoveNext();
    $i=$i+1;
    }
    }else{
      Mensaje("No Existen Comprobantes para Actualizar");
    ?>
    <tr>
      <td class="grid_line01_br">&nbsp;</td>
      <td class="grid_line01_br"><input name="x<? print $i;?>1" type="text" class="grid_txt01" id="x<? print $i;?>1" tabindex="1" value="" size="33" maxlength="8" readonly="true"></td>
      <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>2" id="x<? print $i;?>2" type="text" class="grid_txt02" size="11" value="" align="right"  tabindex="2" readonly="true"></td>
      <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>3" id="x<? print $i;?>3" type="text" class="grid_txt02" size="150" value="" align="right"  tabindex="2" readonly="true"></td>
      </tr>
    <?
     }
     ?>
</table>
            <? ///////////////////////?>
                    </div></td>
                </tr>
                <? // } ?>
              </table>			</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td class="breadcrumb">Registro de <? echo $forma; ?>...
  <?  ///// variable oculta que se necesita para guardar //// ?>
      <input name="i" type="hidden" id="i" value="<? echo $i; ?>" />
  <?  /////////////////////////////////////////////////////// ?>	</td>
      </tr>
    </table>
  </form>	</td>
  </tr>
  <tr>
    <td><? require_once('../../lib/general/bottom.php'); ?></td>
  </tr>
</table>
</body>
<script language="JavaScript">

    function Eliminar()
     {
      if(confirm("¿Esta seguro que desear Eliminar este Código?"))
        {
          f=document.form1;
          f.action="imecConFinActCom.php?imec=<? echo 'E'; ?>";
          f.submit();
        }
     }

  function Limpiar()
           {
               location=("ConFinActCom.php")
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
          i='<? echo $i-1; ?>'
          cont=1;
          estado='No';
          while(cont<=i)
          {
              x1="x"+cont+"1";
            if ((document.getElementById(x1).checked)==true){ estado='Si'; document.getElementById(x1).value='x' }
            cont=cont+1
          }
          if (estado=='No'){ alert("Debe Seleccionar por lo menos un Comprobante para actualizarlo.");
          }else
          if (estado=='Si'){
            f.action="imecConFinActCom.php?imec=<? echo 'S'; ?>";
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

      }
      else if(itemId == '0_filter'){
        alert("Filtro");
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




     function catalogo2(campo,campo2,foco)
     {
    f=document.form1;
      sql='select codcta  as CODIGO,descta as DESCRIPCION from contabb where descta like upper(¿%¿) order by codcta';
      pagina="catalogo2.php?campo="+campo+"&campo2="+campo2+"&sql="+sql+"&foco="+foco;
      window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
     }


     function seleccion_check()
     {
     f=document.form1
     if (f.todos.checked==true)
      {
       fila='<? echo $i; ?>';
       f.todos.value='1' //Para saber si se marco todas para validarlo en imecPreAsiPar
       i=1;
       while (i<fila)
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
       while (i<fila)
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

</script>

</html>
