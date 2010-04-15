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
$z= new tools();

$modulo="";
$forma="Precompromisos";
$modulo=$_SESSION["modulo"] . " > Def. Especificas > Documentos > ".$forma;


  if (!empty($_POST["var"]))
  {
    $var=$_POST["var"];
    if (!empty($_POST["tipdoc"])) {$tipprc=strtoupper(trim($_POST["tipdoc"]));}
  /*  if ($var=='C') //CONSULTA
    {
      $tipprc=strtoupper(trim($_POST["tipdoc"]));
    }
    else*/
    if ($var=='1')//PRIMERO
    {
      if ($tb=$z->primerRegistro('cpdocprc','tipprc'))
      {
        $tipprc=strtoupper(trim($tb->fields["tipprc"]));
      }
    }
    else if ($var=='2')//ANTERIOR
    {
      if (!empty($tipprc))
      {
        $aux=$tipprc;
        //chekeamos q no sea el primero
          $tb=$z->primerRegistro('cpdocprc','tipprc');
          $tipprc=strtoupper(trim($tb->fields["tipprc"]));
          if ($aux!=$tipprc)
          {
            $tb=$z->anteriorRegistro('cpdocprc','tipprc',$aux,'N');
            $tipprc=strtoupper(trim($tb->fields["tipprc"]));
          }
          else
          {
            $tb=$z->ultimoRegistro('cpdocprc','tipprc');
            $tipprc=strtoupper(trim($tb->fields["tipprc"]));
          }
      }
       else
          {
            $tb=$z->ultimoRegistro('cpdocprc','tipprc');
            $tipprc=strtoupper(trim($tb->fields["tipprc"]));
          }
    }
    else if ($var=='3')//SIGUIENTE
    {
      if (!empty($tipprc))
      {
        $aux=strtoupper(trim($tipprc));
        //chekeamos q no sea el ultimo
          $tb=$z->ultimoRegistro('cpdocprc','tipprc');
          $tipprc=strtoupper(trim($tb->fields["tipprc"]));
          if ($aux!=$tipprc)
          {
            $tb=$z->proximoRegistro('cpdocprc','tipprc',$aux,'N');
            $tipprc=strtoupper(trim($tb->fields["tipprc"]));
          }
          else
          {
            $tb=$z->primerRegistro('cpdocprc','tipprc');
            $tipprc=strtoupper(trim($tb->fields["tipprc"]));
          }
      }
      else
      {
          $tb=$z->primerRegistro('cpdocprc','tipprc');
          $tipprc=strtoupper(trim($tb->fields["tipprc"]));
      }
    }
    else if ($var=='4')//ULTIMO
    {
      if ($tb=$z->ultimoRegistro('cpdocprc','tipprc'))
      {
        $tipprc=strtoupper(trim($tb->fields["tipprc"]));
      }
    }
      //TRAER DATOS
      $sql="select * from cpdocprc where trim(upper(tipprc))='".$tipprc."' ";
      if ($tb=$z->buscar_datos($sql))
      {
        $tipdoc=$tb->fields["tipprc"];
        $nomext=$tb->fields["nomext"];
        $nomabr=$tb->fields["nomabr"];
        $imec="M";
        $block='1';
        $save='S';
        $delete='S';
      }
      else
      {
        $tipdoc=strtoupper(trim($tipprc));
        $nomext="";
        $nomabr="";
        $imec="I";
        $block='1';
        $save='S';
        $delete='N';
      }
  }
  else//SI EL VAR VIENE VACIO
  {
    $tipdoc="";
    $nomext="";
    $nomabr="";
    $block='0';
    $imec="I";
    $save='S';
    $delete='N';
  }


  //////////////////////////
  if ($var=="L")
  {
    //Limpiar
    $tipdoc="";
    $nomext="";
    $nomabr="";
    $block='0';
    $imec="I";
    $save='S';
    $delete='N';
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
<script type='text/javascript' src='../../lib/general/js/funciones.js'></script>
<script type="text/JavaScript"  src="../../lib/general/js/prototype.js"></script>

</head>

<body>
<form name="form1" method="post" action="">
<table width="100%" align="center">
  <tr>
<td width="100%">
      <? require_once('../../lib/general/top_p.php'); ?>
    </td>
  </tr>
</table>
<table width="584" border="0" align="center">
  <tr>
    <td colspan="2"><table width="100%" border="0"  class="box">
        <tr>
          <td class="breadcrumb">SIGA <? echo $modulo; ?>
            <input name="imec" type="hidden" id="imec"></td>
        </tr>
        <tr>
          <td><table width="100%" class="recuadro">
      <tr>
         <td align="center" width="27%">
          <!-- a href='javascript: primero();'><img src="../../images/1.GIF" width="13" height="13"--></a>
          <!-- a href='javascript: anterior();'><img src="../../images/2.GIF" width="13" height="13"--></a>
          <!-- a href='javascript: siguiente();'><img src="../../images/3.GIF" width="13" height="13"--></a>
          <!-- a href='javascript: ultimo();'><img src="../../images/4.GIF" width="13" height="13"--></a>
        </td>
        <td align="left" width="73%">
          <?  // MENU PRINCIPAL  // ?>
          <div  align="center" id="toolbar_zone2" style="border :0px solid Silver;"/>
         </td>

      </tr>
    </table></td>
        </tr>
        <tr>
          <td class="box"> <table width="100%" align="center" class="bodyline">
              <!--DWLayoutTable-->
              <tr>
                <td height="22" colspan="3" class="form_label_01"> <fieldset>
                  <legend>Datos del Documento</legend>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td width="22%">Tipo de Documento</td>
                              <td width="78%">
                <? if ($block=='0') { ?>
                  <input name="tipdoc" type="text" class="imagenInicio" id="tipdoc" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" onKeyPress="buscarenter(event)" value="<? print $tipdoc;?>" size="7" maxlength="4">
                <? } else { ?>
                  <input name="tipdoc" type="text" id="tipdoc" onKeyPress="buscarenter(event)" value="<? print $tipdoc;?>" size="7" maxlength="4" readonly="true">
                <? } ?>
                </td>
                            </tr>
                            <tr>
                              <td><input name="var" type="hidden" id="var" value="<? print $var;?>"></td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Nombre Extendido</td>
                              <td><input name="nomext" type="text" id="nomext" class="imagenInicio" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" size="65" value="<? print $nomext;?>" onKeyPress="focos(event,'nomabr')"></td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Nombre Abreviado</td>
                              <td><input name="nomabr" type="text" class="imagenInicio" id="nomabr" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? print $nomabr;?>" size="7" maxlength="4"></td>
                            </tr>
              <tr>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                          </table></td>
                    </tr>
                  </table>
                  </fieldset></td>
              </tr>
              <tr>
                <td width="140" height="0"></td>
                <td width="182" colspan="-5"></td>
                <td width="232"></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td class="breadcrumb">Registro de <? echo $forma; ?>...
            <?  ///// variable oculta que se necesita para guardar //// ?>
            <input name="fecini" type="hidden" id="fecini" value="<? //echo $fecini; ?>" />
            <?  /////////////////////////////////////////////////////// ?>
          </td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
<script>
f=document.form1;
block='<? print $block;?>';
if (block=='0')
{
  f.tipdoc.focus();
}
else
{
  f.nomext.focus();
}
</script>
</form>
<? require_once('../../lib/general/bottom.php'); ?>
</body>
<script language="JavaScript">

      function consulta()
      {
          f=document.form1;
          document.getElementById('var').value='C';
          var host = '<? echo $_SERVER["HTTP_HOST"]; ?>';
          //var campo2='tipdoc';
          //var campo='nomext';
          //var foco='submit';
          //sql='Select nomext as Nombre_Extendido,tipprc as Tipo,nomabr as Nombre_Abreviado From CPDocPrc where upper(nomext) like upper(�%�)  Order By TipPrc';
          //pagina="catalogo2.php?campo="+campo+"&campo2="+campo2+"&sql="+sql+"&foco="+foco;
          //window.open(pagina,"","menubar=no,toolbar=no,scrollbars=yes,width=570,height=500,resizable=yes,left=50,top=50");

          pagina='http://'+host+'/herramientas_dev.php/generales/catalogo/metodo/Cpdocprc_Predocpre/clase/Cpdocprc/frame/form1/obj1/tipdoc/campo1/tipprc/submit/true';
          window.open(pagina,"true","menubar=no,toolbar=no,scrollbars=yes,width=490,height=490,resizable=yes,left=500,top=80");

     }

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

    function buscarenter(e)
    {
       if (e.keyCode==13)
       {
        f=document.form1;
        f.action="PreDocPre.php";
        document.getElementById('var').value='C';
        f.submit();
       }
    }

     function cancelar()
     {
        f=document.form1;
        document.getElementById('var').value='L';
        f.action="PreDocPre.php?>";
        f.submit();
     }

     function salvar()
    {
      f=document.form1;
      document.getElementById('var').value='';
      save='<? print $save;?>';
      if (save=='S')
      {
        if(confirm("¿Realmente desea Salvar?"))
        {
          if (verificar())
          {
            imec='<? print $imec;?>';
            f.action="imecPreDocPre.php?imec="+imec;
            f.submit();
          }
        }
      }
    }

     function eliminar()
    {
      f=document.form1;
      document.getElementById('var').value='';
      del='<? print $delete;?>';
      if (del=='S')
      {
        if(confirm("¿Realmente desea Eliminar?"))
        {
            imec='E';
            f.action="imecPreDocPre.php?imec="+imec;
            f.submit();
        }
      }
    }

    function verificar()
    {
      f=document.form1;

      if (!verificar_campo_clave(0,f.tipdoc.value,"No puede salvar sin introducir un Tipo de Precompromiso"))
      {
        return false;
      }
      else if (!verificar_campo_clave(0,f.nomext.value,"No puede salvar sin introducir El nombre Extendido"))
      {
        return false;
      }
      else if (!verificar_campo_clave(0,f.nomabr.value,"No puede salvar sin introducir El nombre Abreviado"))
      {
        return false;
      }
      else
      {
        return true;
      }

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
               cancelar();
           }

      else if(itemId == '0_save')
      {
        salvar();
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
        consulta();
      }
      else if(itemId == '0_filter'){

      }
      else if(itemId == '0_cancelar'){
          cancelar();
      }
      else if(itemId == '0_delete')
      {
        eliminar();
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



</script>

</html>
