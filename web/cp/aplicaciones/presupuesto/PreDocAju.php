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
$forma="Ajustes";
$modulo=$_SESSION["modulo"] . " > Def. Especificas > Documentos > ".$forma;


  if (!empty($_POST["var"]))
  {
    $var=$_POST["var"];
    if (!empty($_POST["tipdoc"])) {$tipaju=strtoupper(trim($_POST["tipdoc"]));}
  /*  if ($var=='C') //CONSULTA
    {
      $tipaju=strtoupper(trim($_POST["tipdoc"]));
    }
    else*/
     if ($var=='1')//PRIMERO
    {
      if ($tb=$z->primerRegistro('cpdocaju','tipaju'))
      {
        $tipaju=strtoupper(trim($tb->fields["tipaju"]));
      }
    }
    else if ($var=='2')//ANTERIOR
    {
      if (!empty($tipaju))
      {
        $aux=strtoupper(trim($tipaju));
        //chekeamos q no sea el primero
          $tb=$z->primerRegistro('cpdocaju','tipaju');
          $tipaju=strtoupper(trim($tb->fields["tipaju"]));
          if ($aux!=$tipaju)
          {
            $tb=$z->anteriorRegistro('cpdocaju','tipaju',$aux,'N');
          }
          else
          {
            $tb=$z->ultimoRegistro('cpdocaju','tipaju');
          }
      }
      else
      {
        $tb=$z->ultimoRegistro('cpdocaju','tipaju');
      }
      if (!$tb->EOF)
      {
        $tipaju=strtoupper(trim($tb->fields["tipaju"]));
      }
    }
    else if ($var=='3')//SIGUIENTE
    {
      if (!empty($tipaju))
      {
         $aux=strtoupper(trim($tipaju));
        //chekeamos q no sea el ultimo
          $tb=$z->ultimoRegistro('cpdocaju','tipaju');
          $tipaju=strtoupper(trim($tb->fields["tipaju"]));
          if ($aux!=$tipaju)
          {
            $tb=$z->proximoRegistro('cpdocaju','tipaju',$aux,'N');
          }
         else
          {
            $tb=$z->primerRegistro('cpdocaju','tipaju');
          }
      }
      else
      {
        $tb=$z->primerRegistro('cpdocaju','tipaju');
      }
      if (!$tb->EOF)
      {
        $tipaju=strtoupper(trim($tb->fields["tipaju"]));
      }
    }
    else if ($var=='4')//ULTIMO
    {
      if ($tb=$z->ultimoRegistro('cpdocaju','tipaju'))
      {
        $tipaju=strtoupper(trim($tb->fields["tipaju"]));
      }
    }
      //TRAER DATOS
      $sql="select * from cpdocaju where trim(upper(tipaju))='".$tipaju."' ";
      if ($tb=$z->buscar_datos($sql))
      {
        $tipdoc=$tb->fields["tipaju"];
        $nomext=$tb->fields["nomext"];
        $nomabr=$tb->fields["nomabr"];
        $refprc=$tb->fields["refier"];
        $imec="M";
        $block='1';
        $save='S';
        $delete='S';
      }
      else
      {
        $tipdoc=strtoupper(trim($tipaju));
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
    $imec="I";
    $block='0';
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
<link rel="stylesheet" TYPE="text/css" MEDIA="screen" href="../../lib/css/tabber.css">
<script language="JavaScript"  src="../../lib/general/js/fecha.js"></script>
<script language="JavaScript"  src="../../lib/general/js/datepickercontrol.js"></script>
<script language="JavaScript"  src="../../lib/general/toolbar/js/dhtmlXProtobar.js"></script>
<script language="JavaScript"  src="../../lib/general/toolbar/js/dhtmlXToolbar.js"></script>
<script language="JavaScript"  src="../../lib/general/toolbar/js/dhtmlXCommon.js"></script>
<script type='text/javascript' src='../../lib/general/js/dFilter.js'></script>
<script type='text/javascript' src='../../lib/general/js/funciones.js'></script>
<script type="text/javascript" src="../../lib/general/js/tabber.js"></script>
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
    <td colspan="2"><table border="0"  class="box">
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
          <!--<input type="button" name="Button" value="|&lt;" onClick="primero()">
          <input type="button" name="Submit2" value="&lt;&lt;" onClick="anterior()">
          <input type="button" name="Submit3" value="&gt;&gt;" onClick="siguiente()">
          <input type="button" name="Submit4" value="&gt;|" onClick="ultimo()">-->
        </td>
         <td align="right" width="73%">
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
                              <td width="25%">Tipo de Documento</td>
                              <td width="75%">
                                <? if ($block=='0') { ?>
                                <input name="tipdoc" type="text" class="imagenInicio" id="tipdoc" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" onKeyPress="buscarenter(event)" value="<? print $tipdoc;?>" size="7" maxlength="4">
                                <? } else { ?>
                                <input name="tipdoc" type="text" id="tipdoc" onKeyPress="buscarenter(event)" value="<? print $tipdoc;?>" size="7" maxlength="4" readonly="true">
                                <? } ?>
                              </td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>Nombre Extendido</td>
                              <td><input name="nomext" type="text" id="nomext" class="imagenInicio" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" size="65" value="<? print $nomext;?>" onKeyPress="focos(event,'nomabr')"></td>
                            </tr>
                            <tr>
                              <td>&nbsp;<input name="var" type="hidden" id="var" value="<? print $var;?>"></td>
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
                            <tr>
                              <td colspan="2"><table border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="115">Refiere a </td>
                                    <td width="600"> <fieldset>
                                      <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td width="15%"> <div align="center">
                                              <label>
                                              <? if ($refprc=='P') { ?>
                                              <input type="radio" name="radio" id="radio" value="P" checked>
                                              <? } else { ?>
                                              <input type="radio" name="radio" id="radio" value="P">
                                              <? } ?>
                                              Precompromiso</label>
                                            </div></td>
                                          <td width="15%"> <label>
                                            <? if ($refprc=='C') { ?>
                                            <input type="radio" name="radio" id="radio" value="C" checked>
                                            <? } else { ?>
                                            <input type="radio" name="radio" id="radio" value="C">
                                            <? } ?>
                                            Compromiso</label> </td>
                                          <td width="15%"> <div align="center">
                                              <label>
                                              <? if (($refprc=='A') || ($refprc=='')) { ?>
                                              <input type="radio" name="radio" id="radio" value="A" checked>
                                              <? } else { ?>
                                              <input type="radio" name="radio" id="radio" value="A">
                                              <? } ?>
                                              Causado</label>
                                            </div></div>
                                            </td>
                                          <td width="15%"><label>
                                            <? if (($refprc=='G') || ($refprc=='')) { ?>
                                            <input type="radio" name="radio" id="radio" value="G" checked>
                                            <? } else { ?>
                                            <input type="radio" name="radio" id="radio" value="G">
                                            <? } ?>
                                            Pago</label></td>
                                        </tr>
                                      </table>
                                      </fieldset></td>
                                    <td width="20">&nbsp;</td>
                                  </tr>
                                </table></td>
                            </tr>
                          </table></td>
                    </tr>
          <tr>
            <td>
            </td>
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
          var campo2='tipdoc';
          var campo='nomext';
          var foco='submit';
          sql='Select nomext as Nombre_Extendido,tipaju as Tipo,nomabr as Nombre_Abreviado From CPDocAju where upper(nomext) like upper(�%�)  Order By tipaju';
          //pagina="catalogo2.php?campo="+campo+"&campo2="+campo2+"&sql="+sql+"&foco="+foco;
          //window.open(pagina,"","menubar=no,toolbar=no,scrollbars=yes,width=570,height=500,resizable=yes,left=50,top=50");


          pagina='http://'+host+'/herramientas_dev.php/generales/catalogo/metodo/Cpdocaju_Predocaju/clase/Cpdocaju/frame/form1/obj1/tipdoc/campo1/tipaju/submit/true';
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
          f.action="PreDocAju.php";
          document.getElementById('var').value='C';
          f.submit();
       }
    }

     function cancelar()
     {
       f=document.form1;
       document.getElementById('var').value='L';
       f.action="PreDocAju.php";
       f.submit();
     }

     function salvar()
    {
      f=document.form1;
      document.getElementById('var').value='';
      save='<? print $save;?>';
      if (save=='S')
      {
        if(confirm("�Realmente desea Salvar?"))
        {
          if (verificar())
          {
            imec='<? print $imec;?>';
            f.action="imecPreDocAju.php?imec="+imec;
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
        if(confirm("�Realmente desea Eliminar?"))
        {
            imec='E';
            f.action="imecPreDocAju.php?imec="+imec;
            f.submit();
        }
      }
    }

    function verificar()
    {
      f=document.form1;

      if (!verificar_campo_clave(0,f.tipdoc.value,"No puede salvar sin introducir un Tipo del Ajuste"))
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
