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
$forma="Titulo Presupuestario";
$modulo=$_SESSION["modulo"] . " > Def. Especificas > ".$forma;

$IncMod='I';

Limpiar();
Chequeo();

//if (!empty($_GET["var"]))

//echo "psot - > ".$_POST["var"]."<br>";
//echo $_GET["var"];
if (!empty($_POST["var"]) or (!empty($_POST["codigopre"])))
  {
    if (!empty($_POST["codigopre"])){ $codigo=trim($_POST["codigopre"]); } else { $codigo=trim($_GET["codigopre"]);}
    $var=$_POST["var"];

        ///////////////// BARRA DE MENU /////////////////
    if ($var=='1')
      {
        if ($tb=$tools->primerRegistro('CPDefTit','codpre'))
        {
          $codigo=trim($tb->fields["codpre"]);
          $var=9;   //Para que haga la busqueda
        }
      }
     else if ($var=='2') //Anterior
        {
          if (!empty($codigo))
          {
              $aux=$codigo;
              //chekeamos q no sea el primero
            $tb=$tools->primerRegistro('CPDefTit','codpre');
            $codigo=strtoupper(trim($tb->fields["codpre"]));
            if ($aux==$codigo)
            {
              $tb=$tools->ultimoRegistro('CPDefTit','codpre');
                 $codigo=strtoupper(trim($tb->fields["codpre"]));
                $var=9;   //Para que haga la busqueda
            }
            else
            {
              $tb=$tools->anteriorRegistro('CPDefTit','codpre',$aux,'N');
              $codigo=strtoupper(trim($tb->fields["codpre"]));
              $var=9;   //Para que haga la busqueda
            }
          }
          else
          {
            $tb=$tools->ultimoRegistro('CPDefTit','codpre');
            $codigo=strtoupper(trim($tb->fields["codpre"]));
            $var=9;   //Para que haga la busqueda
          }
        }
      else if ($var=='3') //PROXIMO
        {
          if (!empty($codigo))
          {
              $aux=$codigo;
              //chekeamos q no sea el ultimo
            $tb=$tools->ultimoRegistro('CPDefTit','codpre');
            $codigo=strtoupper(trim($tb->fields["codpre"]));
            if ($aux==$codigo)
            {
              $tb=$tools->primerRegistro('CPDefTit','codpre');
                 $codigo=strtoupper(trim($tb->fields["codpre"]));
                $var=9;   //Para que haga la busqueda
            }
            else
            {
              $tb=$tools->proximoRegistro('CPDefTit','codpre',$aux,'N');
              $codigo=strtoupper(trim($tb->fields["codpre"]));
              $var=9;   //Para que haga la busqueda
            }
          }
       else
        {
          $tb=$tools->primerRegistro('CPDefTit','codpre');
          $codigo=strtoupper(trim($tb->fields["codpre"]));
          $var=9;   //Para que haga la busqueda
        }
      }
    else if ($var=='4')
      {
        if ($tb=$tools->ultimoRegistro('CPDefTit','codpre'))
        {
          $codigo=trim($tb->fields["codpre"]);
          $var=9;   //Para que haga la busqueda
        }
      }
    //////////////// FIN MENU ////////////////

    if ($var=='9')
    {
      //////  Busqueda por Codigo  ////////
        $codigopre=$codigo;
      $sql="select * from cpdeftit where trim(codpre)='$codigo'";
       if ($tb=$tools->buscar_datos($sql))
       {
         $IncMod = "M";
        $nompre=$tb->fields["nompre"];
        if (strlen($codigo)==strlen($MascaraPresupuesto))
         {
          $esultimonivel="S";
          $codcta=$tb->fields["codcta"];
          $sql="select descta from contabb where codcta = '$codcta'";
           if ($tb=$tools->buscar_datos($sql)){ $descta=$tb->fields["descta"]; }
         }
         else
         {
           $esultimonivel="N";
         }
       }
       else //no existe antes de incluir verificar si tiene padre
       {
         if (pre_buscar_codigo_padre($codigo))
         {
         //nada
          if (strlen($codigo)==strlen($MascaraPresupuesto))
            $esultimonivel="S";
            else
                $esultimonivel="N";
         }
         else
         {
          Mensaje("Nivel Anterior no existe");
          $codigo="";
          $codigopre="";
          $IncMod ="";
         }
         }
    if (pre_buscar_codigoHijo($codigo)){ $Eliminar='No'; }else{ $msg=VerificarEliminar(); }
    }//if ($var=='9')
}

  function VerificarEliminar()
  {
        global $codigo;
     global $tools;

      //verificar si tiene: precompromiso, compromiso, causado, pagado, ajuste, traslado, adiciones
      $sql="select * from cpasiini where trim(codpre)='$codigo'";
      if (!$tools->buscar_datos($sql)){
          $sql="select * from cpimpprc where trim(codpre)='$codigo'";
       if (!$tools->buscar_datos($sql)){
         $sql="select * from cpimpcom where trim(codpre)='$codigo'";
         if (!$tools->buscar_datos($sql)){
           $sql="select * from cpimpcau where trim(codpre)='$codigo'";
           if (!$tools->buscar_datos($sql)){
             $sql="select * from cpimppag where trim(codpre)='$codigo'";
             if (!$tools->buscar_datos($sql)){
               $sql="select * from cpmovaju where trim(codpre)='$codigo'";
               if (!$tools->buscar_datos($sql)){
                 $sql="select * from cpmovadi where trim(codpre)='$codigo'";
                 if (!$tools->buscar_datos($sql)){
                     $sql="select * from cpmovtra where trim(codori)='$codigo' or trim(coddes)='$codigo'";
                     if (!$tools->buscar_datos($sql)){
                      $msg="";
                      return $msg;
                    }else{
                      $msg="Código Presupuestario ya tiene Asociado un Traslado";}
                }else{
                  $msg="Código Presupuestario ya tiene Asociado una Adicion/Disminución";}
              }else{
                $msg="Código Presupuestario ya tiene Asociado un Ajuste";}
            }else{
              $msg="Código Presupuestario ya tiene Pagado Asociados";}
          }else{
            $msg="Código Presupuestario ya tiene Causado Asociados";}
        }else{
          $msg="Código Presupuestario ya tiene Compromisos Asociados";}
      }else{
        $msg="Código Presupuestario ya tiene Precompromisos Asociados";}
    }else{
      $msg="Código Presupuestario ya tiene Asignación Presupuestaria";}
  return $msg;
  }

  function Limpiar()
  {
    global $codcta;
    global $descta;
    global $nompre;
    global $esultimonivel;

    $codigo="";
    $nompre="";
    $descta="";
    $codcta="";
    $esultimonivel="N";
  }


  function Chequeo()
  {
  global $tools;
  global $bd;
  global $mascara;
  global $MascaraPresupuesto;
  global $MascaraContabilidad;
  global $LongitudCuenta;

    ////////// Definicion Presupuestaria ///////////
     $sql="select forpre from cpdefniv";
     if ($tb=$tools->buscar_datos($sql))
     {
     $MascaraPresupuesto=trim($tb->fields["forpre"]);
       if (empty($MascaraPresupuesto))
       {
         Mensaje("La Definición Presupuestaria no ha sido grabada");
       }
     }
     ////////// Formato Contable ///////////
     $sql="select codcta,forcta from contaba";
     if ($tb=$tools->buscar_datos($sql))
     {
     $MascaraContabilidad=trim($tb->fields["forcta"]);
     //$LongitudCuenta=$tb->fields["codcta"];
     $arreglo=$bd->longitud("contaba");
     $LongitudCuenta=($arreglo["codcta"]->max_length);

       if (empty($MascaraContabilidad))
       {
         Mensaje("El Formato Contable no ha sido grabado");
       }
       elseif ($LongitudCuenta==0)
       {
         Mensaje("El Formato Contable no ha sido grabado");
       }

      ObtenerNiveles();
     }
  }


  function ObtenerNiveles()
  {
  global $tools;
  global $tb;
  global $mascara;

    $sql="select * from cpniveles";
    if ($tb=$tools->buscar_datos($sql))
     {
       while(!$tb->EOF){
         $aux=$aux.'-'.$tb->fields["nomabr"];
      $tb->MoveNext();
      }
     }
     $mascara=substr($aux,1,strlen($aux));

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
<script type="text/javascript" src="../../lib/general/js/dFilter.js"></script>
<script type='text/javascript' src='../../lib/general/js/funciones.js'></script>
<script type="text/JavaScript"  src="../../lib/general/js/prototype.js"></script>

</head>

<body>
<table width="100%" align="center">
<tr>
<td width="100%">
      <? require_once('../../lib/general/top_p.php'); ?>
    </td>
  </tr>
</table>
<table width="584" border="0" align="center">
  <tr>
    <td colspan="2">
  <form name="form1" method="post" action="">
  <table width="100%" border="0"  class="box">
      <tr>
        <td class="breadcrumb">SIGA  <? echo $modulo; ?>
      <input name="imec" type="hidden" id="imec"></td>
      </tr>
      <tr>
        <td>	<table width="100%" class="recuadro">
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
        <td align="left" width="12%">
            </td>
          <td align="right" width="61%">
          <?  // MENU PRINCIPAL  // ?>
          <div  align="center" id="toolbar_zone2" style="border :0px solid Silver;"/>
        </td>
      </tr>
    </table></td>
      </tr>
      <tr>
        <td class="box">
<table width="100%" align="center" class="bodyline">
          <!--DWLayoutTable-->
                <tr>
                  <td height="22" colspan="3" class="form_label_01">
          <fieldset><legend>Datos del Titulo Presupuestario</legend>
          <table width="100%" border="0">
                    <tr>
                      <td>&nbsp;</td>
                      <td><? echo $mascara; ?></td>
                    </tr>
                    <tr>
                      <td width="12%">C&oacute;digo</td>
                      <td width="88%">
            <? if ($IncMod!="M")
            {
            ?>
              <input name="codigopre" type="text" class="imagenInicio" id="codigopre" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? echo $codigopre; ?>" size="30" maxlength="<? echo strlen($MascaraPresupuesto); ?>"  onKeyDown="javascript:return dFilter (event.keyCode, this,'<? echo $MascaraPresupuesto; ?>');" onblur="if (document.getElementById('codigopre').value!=''){ $('var').value='9'; document.form1.submit(); }">
             <?
              }
            else
            {
             ?>
             <input name="codigopre" type="text" class="imagenInicio2" id="codigopre" value="<? echo $codigopre; ?>" size="30" maxlength="<? echo strlen($MascaraPresupuesto); ?>"  readonly="true">
             <?
              } ?>
            </td>
                    <tr>
                      <td>Nombre</td>
                      <td><input name="nompre" type="text" class="imagenInicio" id="nompre" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? echo $nompre; ?>" size="80" maxlength="255"></td>
                    </tr>
                  </table>
          </fieldset>
          </td>
                  </tr>
                <tr>
                  <td height="22" colspan="3" class="form_label_01">
           <fieldset><legend>Datos Contables</legend>
          <table width="100%" border="0">
                    <tr>
                      <td width="12%">C&oacute;digo</td>
           <? if ($esultimonivel=="S")
           { ?>
                      <td width="88%"><input name="codcta" type="text" class="imagenInicio" id="codcta" onMouseOver="this.className='imagenFoco'" onMouseOut="this.className='imagenInicio'" value="<? echo $codcta; ?>" size="20" maxlength="32" onKeyDown="javascript:return dFilter (event.keyCode, this,'<? echo $MascaraContabilidad; ?>');" onKeyPress="enterB(event,codcta.id,descta.id,codcta.id)">
                        <input name="suss" type="button" id="suss" value="..." onClick="javascript: catalogo2(descta.id,codcta.id,codcta.id);">
            </td>
          <? }
            else
            {
          ?>
                      <td width="88%"><input name="codcta" type="text" class="imagenInicio2" id="codcta" value="<? echo $codcta; ?>" size="20" maxlength="32"  readonly="true">
                        <input name="suss" type="button" id="suss" value="..." >
            </td>
                     <? } ?>
                    </tr>
                    <tr>
                      <td>Nombre</td>
                      <td><input name="descta" type="text" class="imagenInicio2" id="descta" value="<? echo $descta; ?>" size="80" maxlength="80" readonly="true"></td>
                    </tr>
                  </table>
          </fieldset>
          </td>
                </tr>
                <tr>
                  <td height="22" colspan="3" class="form_label_01"><!--DWLayoutEmptyCell-->&nbsp;</td>
                </tr>

                <tr>
                  <td width="140" height="0"></td>
                  <td width="182" colspan="-5"></td>
                  <td width="232"></td>
                </tr>
      </table>
    </td>
      </tr>
      <tr>
        <td class="breadcrumb">Registro de <? echo $forma; ?>...
  <?  ///// variable oculta que se necesita para guardar //// ?>
      <input name="LongitudCuenta" type="hidden" id="LongitudCuenta" value="<? echo $LongitudCuenta; ?>" />
      <input type="hidden" name="var" id="var" />
  <?  /////////////////////////////////////////////////////// ?>	</td>
      </tr>
    </table>

   <?
if  (!empty($codigo))
{
 $salvar='S'
?>
  <script>
    document.form1.nompre.focus();
    document.form1.nompre.select();
   </script>
<?
 }
else
{
 $salvar='N'
?>
  <script>
    document.form1.codigopre.focus();
    document.form1.codigopre.select();
   </script>
<?
}
?>
  </form>
  </td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
<? require_once('../../lib/general/bottom.php'); ?>
</body>
<script language="JavaScript">

/*    function buscarenter(e,valor,id)
      {
        if (e.keyCode==13)
      {
      cadena=rayitas(e,valor);
      document.getElementById(id).value=cadena;
      f=document.form1;
      document.getElementById('var').value='9';
      //f.action="PreTitPre.php?var=<? echo '9'; ?>";
      f.submit();
      }
     }
*/
    function Eliminar()
     {
      if(confirm("¿Esta seguro que desear Eliminar este Código?"))
        {
          f=document.form1;
          f.action="imecPreTitPre.php?imec=<? echo 'E'; ?>";
          f.submit();
        }
     }

  function Limpiar()
           {
               location=("PreTitPre.php")
           }


  function onButtonClick(itemId,itemValue)// TOOLBAR
    {
      f=document.form1;

      if(itemId == '0_ojo'){
        //alert("Usted vera una Consulta");
        //catalogo2('mcodigo','x','mcodigo');  // campo, x = que no devuelva nada en el 2do campo, mcodigo = foco
      }
      /////////////////////
      else if(itemId == '0_cancelar')
           {
               Limpiar();
           }

      else if(itemId == '0_save')
      {
        save='<? print $salvar;?>';
        if (save=='S')
        {
        if(confirm("¿Realmente desea Salvar?"))
        {
          cod=document.getElementById('codigopre').value;
          forpre='<? print $MascaraPresupuesto; ?>';
          loncod=cod.length;
          lonfor=forpre.length;

          f=document.form1;
          if (document.form1.codigopre.value=="")
            { alert("No puede salvar sin introducir el Código Presupuestario"); }

          else if (document.form1.nompre.value=="")
            { alert("No puede salvar sin introducir la Descripción del Código Presupuestario"); }
              else if (document.form1.codcta.value=="" && loncod==lonfor)
              { alert("No puede salvar sin introducir una Cuenta Contable"); }
                else{
                  //document.getElementById("x15").disabled=false
                  //document.getElementById("x16").disabled=false

                  f.action="imecPreTitPre.php?imec=<? echo 'I'; ?>&IncMod=<? echo $IncMod; ?>";
                  f.submit();
                  }
        }
       }	// if (save=='S')
      }
      //////////////////////////
      else if(itemId == '0_print'){
          print();
      }
      else if(itemId == '0_new'){
        //alert("Nuevo Formulario");
        Limpiar();
      }
      else if(itemId == '0_form'){
        alert("Modificar Formulario");
      }
      else if(itemId == '0_search'){
        consulta();
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
        if (eliminar=='No'){ alert("No se puede eliminar Título Presupuestrario Padre")}
        else if (msg!=''){ alert(msg)}
        else
        {
          if(confirm("¿Esta seguro que desea Eliminar este Código?"))
            {
              f=document.form1;
              f.action="imecPreTitPre.php?imec=<? echo 'E'; ?>";
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
    };


    aToolBar=new dhtmlXToolbarObject('toolbar_zone2','100%',16,"");
    aToolBar.setOnClickHandler(onButtonClick);
    aToolBar.loadXML("../../lib/general/_toolbarV1.xml")
    aToolBar.setToolbarCSS("toolbar_zone2","toolbarText3");
    aToolBar.showBar();


     function primero()
      {
      f=document.form1;
      //f.action="PreTitPre.php?var=<? print '1';?>";
      document.getElementById('var').value='1';
      f.submit();
     }
     function anterior()
      {
      f=document.form1;
      //f.action="PreTitPre.php?var=<? print '2';?>";
      document.getElementById('var').value='2';
      f.submit();
     }
     function siguiente()
      {
      f=document.form1;
      //f.action="PreTitPre.php?var=<? print '3';?>";
      document.getElementById('var').value='3';
      f.submit();
     }
     function ultimo()
      {
      f=document.form1;
      //f.action="PreTitPre.php?var=<? print '4';?>";
      document.getElementById('var').value='4';
      f.submit();
     }


     function catalogo2(campo,campo2,foco)
     {
      f=document.form1;
      tipo='G';
      //sql='select descta as DESCRIPCION,codcta as CODIGO from contabb where cargab=¿C¿ and descta like upper(¿%¿) order by codcta';
      //pagina="catalogo2.php?campo="+campo+"&campo2="+campo2+"&sql="+sql+"&foco="+foco;
      //window.open(pagina,'Catalogo','menubar=no,toolbar=no,scrollbars=yes,width=600,height=450,resizable=yes,left=50,top=50');

      var host = '<? echo $_SERVER["HTTP_HOST"]; ?>';
          pagina='http://'+host+'/herramientas_dev.php/generales/catalogo/metodo/Pretitpre_Contabb/clase/Contabb/frame/form1/obj1/codcta/obj2/descta/campo1/codcta/campo2/descta';
          window.open(pagina,"true","menubar=no,toolbar=no,scrollbars=yes,width=490,height=490,resizable=yes,left=500,top=80");

     }

     function enterB(e,id,donde,foco)
    {
      f=document.form1;
      if (e.keyCode==13)
        {
          aux= document.getElementById('codcta').value.toUpperCase();
          cadena=rayitas(e,aux);
          document.getElementById('codcta').value=cadena
          if (cadena!="")
          {
            f=document.form1;
            cuantos='ctacontable';
            sql='select descta as campo1  from contabb where trim(codcta)=trim(¿'+cadena+'¿) ';
            pagina="gridatos.php?cuantos="+cuantos+"&id="+id+"&donde="+donde+"&foco="+foco+"&sql="+sql;
            window.open(pagina,"","menubar=no,toolbar=no,scrollbars=no,width=50,height=50,resizable=no,left=150,top=350");
          }
        }
    }

  function consulta()
  {
      f=document.form1;
      document.getElementById('var').value='9';
      //var campo2='nompre';
      //var campo='codigopre';
      //var foco='submit';
      //sql='Select codpre as Codigo, nompre as Nombre, coddep as Depend from cpdeftit where upper(nompre) like upper(�%�) order by codpre';
      //pagina="catalogo2.php?campo="+campo+"&campo2="+campo2+"&campo3="+campo3+"&sql="+sql+"&foco="+foco;
      //window.open(pagina,"","menubar=no,toolbar=no,scrollbars=yes,width=570,height=500,resizable=yes,left=50,top=50");

      var host = '<? echo $_SERVER["HTTP_HOST"]; ?>';
          pagina='http://'+host+'/herramientas_dev.php/generales/catalogo/metodo/Cpdeftit_Pretitpre/clase/Cpdeftit/frame/form1/obj1/codigopre/obj2/nompre/campo1/codpre/campo2/nompre/submit/true';
          window.open(pagina,"true","menubar=no,toolbar=no,scrollbars=yes,width=490,height=490,resizable=yes,left=500,top=80");
   }


</script>

</html>
