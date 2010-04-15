<?
session_start();

   require_once($_SESSION["x"].'lib/bd/basedatosAdo.php');
   require_once($_SESSION["x"].'lib/general/funciones.php');
   require_once($_SESSION["x"].'lib/general/funciones2.php');
   require($_SESSION["x"].'lib/general/tools.php');
$codemp=$_SESSION["codemp"];
$bd=new basedatosAdo($codemp);
$tools=new tools();


   $campo=obtenerget("campo");
   $campo2=obtenerget("campo2");
   $sql=obtenerget("sql");
   $foco=obtenerget("foco");
   $tipo=obtenerget("tipo");
   $condicion=obtenerpost("condicion");
   $sql=str_replace("¿","'",$sql);
   $sql=str_replace("�","'",$sql);

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
<script language="JavaScript"  src="../../lib/general/js/prototype.js"></script>

<style type="text/css">
<!--
.style14 {color: #FFFFFF}
-->
</style>
</head>

<body>
<table width="500" border="0">
<form action="" method="post" name="form1">
  <tr>
    <td colspan="2">
    <table width="100%" border="0" class="recuadro">
      <tr>
      <td colspan="8" align="center" class="tpButtons">Opciones de B&uacute;squeda </td>
      </tr>
      <tr class='queryheader'>
      <td width="20" >
        <input type="checkbox" name="todos" id="todos" value="" onClick="seleccion_check()">
      </td>
      <td width="28" ><span class="style14">Id</span></td>
      <td width="97"><span class="style14">Referencia</span></td>
      <td width="105"><span class="style14">Descripci&oacute;n</span></td>
      <td width="108"><span class="style14">Beneficiario</span></td>
      <td width="54"><span class="style14">Fecha</span></td>
      <td width="58"><span class="style14">Monto</span></td>

      </tr>
      <?
      if ($tb=$tools->buscar_datos($sql)){
      $totcausado=0;
      $totmonto=0;
      $totpagdo=0;
      $cont=0;
      while (!$tb->EOF){
          $cont=$cont+1;
      ?>
      <tr bgcolor='#EEF2F2'>
      <td>
        <input type="checkbox" name="x<? print $cont;?>1" id="x<? print $cont;?>1" value="<? echo $tb->fields["referencia"]; ?>" onClick="marcar(this)">
      </td>
      <td><? echo $cont; ?></td>
      <td name="x<? print $cont;?>3" id="x<? print $cont;?>3" value="<? echo $tb->fields["referencia"]; ?>" ><? echo $tb->fields["referencia"]; ?></td>
      <td><? echo $tb->fields["descripcion"]; ?></td>
      <td><? echo $tb->fields["beneficiario"]; ?></td>
      <td><? echo $tb->fields["fecha"]; ?></td>
      <td align="right">
      <input name="x<? print $cont;?>7" id="x<? print $cont;?>7" type="text"  class="escondido"   size="13"  readonly="true" value="<? echo number_format($tb->fields["monto"],2,'.',','); ?>">
      <input name="x<? print $cont;?>8" id="x<? print $cont;?>8" type="hidden"  class="escondido"   size="13"  readonly="true" value="<? echo $tb->fields["beneficiario"]; ?>">

      </td>
        </tr>
      <?
      $tb->MoveNext();
       }
       }
      ?>
      <input name="cedula" type="hidden" id="cedula"></td>
    </table>
  </td>
  </tr>
  <tr>
    <td width="82"><input type="button" name="Button" value="Aceptar" onClick="aceptar()"></td>
    <td width="408"><input type="button" name="Button2" value="Cerrar" onClick="javascript:window.close()"></td>
  </tr>
</form>
</table>
</body>
<script>

     function seleccion_check()
     {
     f=document.form1;
     var igual;
     fila='<? echo $cont; ?>';
     if (f.todos.checked==true)
      {

       i=1;
       while (i<=fila)
       {
         var x8="x"+i+"8";
        j=i+1;
        var aux8="x"+j+"8";

        if (i==1)
        {
          cod=$F(x8);
        }

        if ($(aux8)){
          if (cod==$F(aux8))
          {
            igual=true;
          }
          else
          {
            alert("No todos los documentos tienen el mismo Beneficiario");
            document.form1.todos.checked=false;

            fila = i;
          }
        }
      var x="x"+i+"1";
      document.getElementById(x).checked=true;
      i=i+1;
      }
        f.todos.value='1';    //Para saber si se marco todas para validarlo en imecPreAsiPar

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
     }



     function marcar(f)
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
     }

     function aceptar()
     {
     //var refprc=document.getElementById("x21").value;
       fila='<? echo $cont; ?>';
       i=1;
       var concate='';
       var sel=0;
       var monto=0;
       valido = false;
       while (i<=fila)
       {
        var x  = "x"+i+"1";
        var x7 = "x"+i+"7";
        var x8 = "x"+i+"8";
        //cod = $F(x8);

          if (document.getElementById(x).checked==true)
          {
            if (valido==false)
            {
              cod = $F(x8);
            }
            // Verifica que los datos seleccionado
            // sean iguales
                        if (cod==$F(x8))
                        {
              concate = concate+'/'+document.getElementById(x).value;
              str = document.getElementById(x7).value.toString();
              str = str.replace(',','');
              str = str.replace(',','');
              str = str.replace(',','');

              var num = parseFloat(str);  //Valor Real sin (.) y ni (,)
              monto   = monto+num;
              document.getElementById('cedula').value=document.getElementById(x8).value;
              sel     = sel+1;
              valido  = true;
            }else
            {
              alert('No todos los documentos tienen el mismo Beneficiario');
              i      = 10000000;
              valido = false;
            }
          }
        i=i+1;
      }

      if (valido==true)
      {
         opener.document.form1.refcom.disabled=false;
         cedula=document.getElementById('cedula').value;
         document.form1.action="catal_check2.php?concate="+concate+"&sel="+sel+"&monto="+monto+"&cedula="+cedula;
         document.form1.submit();
         }
     }
</script>
</html>
