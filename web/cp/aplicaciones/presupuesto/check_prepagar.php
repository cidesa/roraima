<?
session_start();

   require_once($_SESSION["x"].'lib/bd/basedatosAdo.php');
   require_once($_SESSION["x"].'lib/general/funciones.php');
   require_once($_SESSION["x"].'lib/general/funciones2.php');
   require($_SESSION["x"].'lib/general/tools.php');

   $codemp = $_SESSION["codemp"];
   $bd     = new basedatosAdo($codemp);
   $tools  = new tools();

   $campo     = obtenerget("campo");
   $campo2    = obtenerget("campo2");
   $sql       = obtenerget("sql");
   $foco      = obtenerget("foco");
   $refere    = obtenerget("refere");
   $tipo      = obtenerget("tipo");
   $condicion = obtenerpost("condicion");
   $sql       = str_replace("�","'",$sql);
   $sql       = str_replace("¿","'",$sql);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Catalogo</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK media=all href="../../lib/css/base.css" type=text/css rel=stylesheet>
<link href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
<link href="../../lib/css/estilos.css" rel="stylesheet" type="text/css">

<style type="text/css">
<!--
.style14 {color: #FFFFFF}
-->
</style>
</head>

<body>
<table width="83%" border="0">
<form action="" method="post" name="form1">
  <tr>
    <td colspan="2">
    <table width="663" border="0" class="recuadro">
      <tr>
      <td colspan="8" align="center" class="tpButtons">Opciones de B&uacute;squeda </td>
      </tr>
      <tr class='queryheader'>
      <td width="27" >
        <input type="checkbox" name="todos" id="todos" value="" onClick="seleccion_check()">
      </td>
      <td width="17" ><span class="style14">Id</span></td>
      <td width="72"><span class="style14">C&eacute;dula</span></td>
      <td width="78"><span class="style14">Referencia</span></td>
      <td width="69"><span class="style14">Fecha</span></td>
      <td width="266"><span class="style14">Descripci&oacute;n</span></td>
      <td colspan="2"><span class="style14">Monto</span></td>
        </tr>
      <?
      if ($tb=$tools->buscar_datos($sql)){
      $cont=0;
      while (!$tb->EOF){
          $cont=$cont+1;
      ?>
      <tr bgcolor='#EEF2F2'>
      <td>
        <input type="checkbox" name="x<? print $cont;?>1" id="x<? print $cont;?>1" value="<? echo $tb->fields["referencia"]; ?>" onClick="marcar(this)">
      </td>
      <td><? echo $cont; ?></td>
      <td name="x<? print $cont;?>3" id="x<? print $cont;?>3" value="<? echo trim($tb->fields["cedula"]); ?>" ><? echo $tb->fields["cedula"]; ?></td>
      <td><? echo $tb->fields["referencia"]; ?></td>
      <td><? echo $tb->fields["fecha"]; ?></td>
      <td><? echo $tb->fields["descripcion"]; ?></td>
      <td width="81" align="right" ><span class="form_label_01">
        <input name="x<? print $cont;?>7" id="x<? print $cont;?>7" type="text"  class="escondido"   size="13"  readonly="true" value="<? echo number_format($tb->fields["monto"],2,'.',','); ?>">
      </span></td>
        <td width="17" align="right" ><input name="x<? print $cont;?>8" id="x<? print $cont;?>8" type="hidden" readonly="true" value="<? echo trim($tb->fields["cedula"]); ?>"></td>
      </tr>
      <?
      $tb->MoveNext();
       }
       }
      ?>

    </table>
  </td>
  </tr>
  <tr>
    <td width="16%"><input type="button" name="Button" value="Aceptar" onClick="aceptar()"></td>
    <td width="84%"><input type="button" name="Button2" value="Cerrar" onClick="javascript:window.close()">
      <input name="compara" type="hidden" id="compara">
      <input name="cuantos" type="hidden" id="cuantos" value="0">
      <input name="cedula" type="hidden" id="cedula"></td>
  </tr>
</form>
</table>
</body>
<script>

  /*   function seleccion_check()
     {
     f=document.form1
     if (f.todos.checked==true)
      {
       fila='<? echo $cont; ?>';
       f.todos.value='1' //Para saber si se marco todas para validarlo en imecPreAsiPar
       i=1;
       while (i<=fila)
       {
        var x="x"+i+"1";
        //document.getElementById(x).value='1'
        document.getElementById(x).checked=true
        i=i+1;
      }
    }else{
       fila='<? echo $cont; ?>';
       f.todos.value='' //Para saber si se marco todas para validarlo en imecPreAsiPar
       i=1;
       while (i<=fila)
       {
        var x="x"+i+"1";
        //document.getElementById(x).value=''
        document.getElementById(x).checked=false
        i=i+1;
      }

     }
     }*/

     function seleccion_check()
     {
     f=document.form1;
     var igual;
     c='<? echo $cont; ?>';
     if (f.todos.checked==true)
      {
         ////Si solo hay uno
         if (c==1)
         {
          document.getElementById('x11').checked=true;
          exit();
         }
         ////////////////////

         for (i=1;i<c;i++)//revisamos q todos tengan el mismo beneficiario
      {
        var x="x"+i+"8";
        j=i+1;
        var y="x"+j+"8";
        if (x==y)
        {
          igual=true;
        }
        else
        {
          igual=false;
          break;
        }
      }

      if (igual==true)
      {
        i=1;
        while (i<=c)
          {
          var x="x"+i+"1";
          document.getElementById(x).checked=true

          i=i+1;
        }
      }
        else
      {
        alert("No todos los documentos tienen el mismo Beneficiario");
        document.form1.todos.checked=false;
      }

    }
    else// para desmarcarlos todos
    {
       ////Si solo hay uno
         if (c==1)
         {
          document.getElementById('x11').checked=false;
          exit();
         }
       ////////////////////

       i=1;
       while (i<=c)
       {
        var x="x"+i+"1";
        document.getElementById(x).checked=false
        i=i+1;
      }
     }
     }


     function marcar(f)
     {
      if (parseInt(f.id.length)==6)
    {
      id=f.id.substring(0,5)+"8";
    }
      else if (parseInt(f.id.length)==5)
    {
      id=f.id.substring(0,4)+"8";
    }
    else if (parseInt(f.id.length)==4)
    {
      id=f.id.substring(0,3)+"8";
    }
    else
    {
      id=f.id.substring(0,2)+"8";
    }
    //alert(id);
//alert("compara="+document.form1.compara.value);
//alert("cuantos="+document.form1.cuantos.value);
       if ( (document.form1.compara.value=='') && (document.form1.cuantos.value=='0') )
       {
      // alert(document.getElementById(id).value);
            document.form1.cuantos.value= 1;
         document.form1.compara.value=document.getElementById(id).value;
          }
       else//si ya hay alguien seleccionado
       {
             if (f.checked==false)//SI LO ESTA DESMARCANDO
          {
           document.form1.cuantos.value=parseInt(document.form1.cuantos.value) - 1;//lo resto

            if ( (document.form1.compara.value) == (document.getElementById(id).value) )//si esta desmarcando el mismo
            {
              if (document.form1.cuantos.value=='0')
              {
                document.form1.compara.value='';
              }
            }

          }
          else//SI LO ESTA MARCANDO
          {
          //alert(document.form1.compara.value);
            if ( (document.form1.compara.value) == (document.getElementById(id).value) )
            {
              document.form1.cuantos.value=parseInt(document.form1.cuantos.value) + 1;//lo sumo
            }
            else
            {
              alert("El beneficiario de este Documento es distinto al ya seleccionado, por favor seleccione uno igual");
              f.checked=false;
            }
          }
      }
    //alert("cuantos=");
     }


     /*function marcar(f)
     {
     if (f.checked==true)
        {
      //document.getElementById(f.id).value='1'
         document.form1.todos.value='' //Para saber si se marco todas para validarlo

      }
    else
      {
      //document.getElementById(f.id).value=''
         document.form1.todos.value='' //Para saber si se marco todas para validarlo
      }
     }*/



   /*  function aceptar()
     {
     //var refprc=document.getElementById("x21").value;
       fila='<? echo $cont; ?>';
       i=1;
       var concate='';
       var sel=0;
       var monto=0;
       while (i<=fila)
       {
        var x="x"+i+"1";
        var x7="x"+i+"7";
          if (document.getElementById(x).checked==true)
          {
            concate=concate+'/'+document.getElementById(x).value;

            str= document.getElementById(x7).value.toString();
            str= str.replace(',','');
            str= str.replace(',','');
            str= str.replace(',','');

            var num=parseFloat(str);  //Valor Real sin (.) y ni (,)
            monto=monto+num;
            sel=sel+1;
          }
        i=i+1;
      }
     //alert(concate);
      close();
//	   opener.document.form1.method="get";
     opener.document.form1.refpag.disabled=false;
      opener.document.form1.action="PrePagar.php?refcau="+concate+"&var='25'&contad="+sel+"&monto="+monto;
     opener.document.form1.submit();

     }*/


     function aceptar()
     {

       fila='<? echo $cont; ?>';
       i=1;
       var concate='';
       var compara=document.form1.compara.value;
       var sel=0;
       var monto=0;
       while (i<=fila)
       {
        var x="x"+i+"1";
        var x7="x"+i+"7";
        var x8="x"+i+"8";
          if (document.getElementById(x).checked==true)
          {
            concate=concate+'/'+document.getElementById(x).value;

            str= document.getElementById(x7).value.toString();
            str= str.replace(',','');
            str= str.replace(',','');
            str= str.replace(',','');

            var num=parseFloat(str);  //Valor Real sin (.) y ni (,)
            monto=monto+num;
            document.getElementById('cedula').value=document.getElementById(x8).value;
            sel=sel+1;
          }
        i=i+1;
      }

 //	   close();
//	   opener.document.form1.method="get";
//	   opener.document.form1.refpag.disabled=false;
// 	   opener.document.form1.action="PrePagar.php?refcau="+concate+"&contad="+sel+"&monto="+monto+"&cedrif="+compara+"&var=9";
//	   opener.document.form1.submit();

     refere='<? print $refere; ?>';
     cedula=document.getElementById('cedula').value;
     document.form1.action="check_prepagar2.php?concate="+concate+"&sel="+sel+"&monto="+monto+"&cedula="+cedula+'&refere='+refere;
     document.form1.submit();

     }

</script>
</html>
