<ul  class="sf_admin_actions" >
  <input type="button" name="Submit1" value="Calcular" class="sf_admin_action_list" onclick="calcularajuste();" />
</ul>

<script type="text/javascript">

function calcularajuste()
{
   if ($('npasiconemp_tipo_M').checked==true) var tipo='M';
   else var tipo='C';

   if ($('npasiconemp_aumento_P').checked==true) var aumento='P';
   else var aumento='N';

   var monto=toFloat('npasiconemp_monto');

  var filas=parseInt($('npasiconemp_filas').value);

  var i=0;
  while (i<filas)
  {
     var marcada="ax_"+i+"_1";
   if ($(marcada).checked==true) {
    if (aumento=='P') {    
        if (tipo=='M')
        {
          var colmon="ax_"+i+"_4";
          var num=toFloat(colmon);
          var calculo= ((num*monto)/100)+num;
          $(colmon).value=format(calculo.toFixed(2),'.',',','.');

        }else if (tipo=='C') {
          var colcan="ax_"+i+"_5";
          var num=toFloat(colcan);
          var calculo= ((num*monto)/100)+num;
          $(colcan).value=format(calculo.toFixed(2),'.',',','.');
        }
    }else if (aumento=='N') {
       if (tipo=='M')
        {
          var colmon="ax_"+i+"_4";
          var num=toFloat(colmon);
          var calculo= num+monto;
          $(colmon).value=format(calculo.toFixed(2),'.',',','.');

        }else if (tipo=='C') {
          var colcan="ax_"+i+"_5";
          var num=toFloat(colcan);
          var calculo= num+monto;
          $(colcan).value=format(calculo.toFixed(2),'.',',','.');
        }
    }
   }
    i++;
  }
}

function desmarcar(id)
{
  var aux = id.split("_");
  var name=aux[0];
  var fil=aux[1];
  var col=parseInt(aux[2]);
  
  var colmonto=col+3;
  var colcant=col+4;
  var cajmonto=name+"_"+fil+"_"+colmonto;
  var cajacant=name+"_"+fil+"_"+colcant;

  var colmonto2=col+5;
  var colcant2=col+6;
  var cajmonto2=name+"_"+fil+"_"+colmonto2;
  var cajacant2=name+"_"+fil+"_"+colcant2;

   if ($('npasiconemp_tipo_M').checked==true) var tipo='M';
   else var tipo='C';

  if ($(id).checked==false)
  {
    if (tipo=='M') {
     $(cajmonto).value=$(cajmonto2).value;
   }else if (tipo=='C') {
     $(cajacant).value=$(cajacant2).value;
   }
  }
}
</script>