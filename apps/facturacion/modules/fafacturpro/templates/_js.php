<?php echo javascript_include_tag('dFilter', 'ajax', 'facturacion/proformas', 'tools') ?>

<script>
function rellenarcorr(id)
    {
        if($(id).value=='')
            $(id).value=$(id).value.pad(8,'#',0)
        else
            $(id).value=$(id).value.pad(8,'0',0)
    }
    
function aplicarBL(id)
{
    var aux = id.split("_");
    var name=aux[0];
    var fil=aux[1];
    var col=parseInt(aux[2]);

   if (fil==0) {
       reg=obtener_filas_grid('a',2);
        var j=1;
        while (j<reg)
        {
          var billindg="ax_"+j+"_27";
          $(billindg).value=$(id).value;
         j++;
        }
   }
  }

  function calculardif(id)
  {
    var aux = id.split("_");
    var name=aux[0];
    var fil=aux[1];
    var col=parseInt(aux[2]);

    var num=toFloat(id);

    if (num>0) {

    if (col==45 || col==46)
    {
        var ko=name+"_"+fil+"_45";
        var ke=name+"_"+fil+"_46";
        var dk=name+"_"+fil+"_47";
        var to=name+"_"+fil+"_51";
        var te=name+"_"+fil+"_52";
        var dt=name+"_"+fil+"_53";

        var num1=toFloat(ko);
        var num2=toFloat(ke);
        var resta= num1 - num2;
        if (col==45)
        {
            var cal=num1/1000;
            $(to).value=format(cal.toFixed(2),'.',',','.');
        }

        if (col==46)
        {
          var cal2=num2/1000;
            $(te).value=format(cal2.toFixed(2),'.',',','.');
        }

        var num5=toFloat(to);
        var num6=toFloat(te);
        var resta2= num5 - num6;

        $(dt).value=format(resta2.toFixed(2),'.',',','.'); //diferencia Toneladas
        $(dk).value=format(resta.toFixed(2),'.',',','.'); //diferencia kilogramos
    }

    if (col==48 || col==49)
    {
        var co=name+"_"+fil+"_48";
        var ce=name+"_"+fil+"_49";
        var dc=name+"_"+fil+"_50";

        var num3=toFloat(co);
        var num4=toFloat(ce);
        var resta1= num3 - num4;

        $(dc).value=format(resta1.toFixed(2),'.',',','.');
    }

    if (col==51 || col==52)
    {
        var to=name+"_"+fil+"_51";
        var te=name+"_"+fil+"_52";
        var dt=name+"_"+fil+"_53";
        var ko=name+"_"+fil+"_45";
        var ke=name+"_"+fil+"_46";
        var dk=name+"_"+fil+"_47";

        var num5=toFloat(to);
        var num6=toFloat(te);
        var resta2= num5 - num6;

        if (col==51)
        {
            var cal=num5*1000;
            $(ko).value=format(cal.toFixed(2),'.',',','.');
        }
        if (col==52)
        {
            var cal2=num6*1000;
            $(ke).value=format(cal2.toFixed(2),'.',',','.');
        }

        var num1=toFloat(ko);
        var num2=toFloat(ke);
        var resta= num1 - num2;

        $(dk).value=format(resta.toFixed(2),'.',',','.'); //diferencia kilogramos
        $(dt).value=format(resta2.toFixed(2),'.',',','.'); //diferencia Toneladas
    }
  }else {
      alert("El Valor introducido debe ser mayor a cero");
      $(id).value="0,00";
  }

}

function validarEstatus(id)
{
    var aux = id.split("_");
    var name=aux[0];
    var fil=aux[1];
    var col=parseInt(aux[2]);

    var estreal=col+3;
    var idestreal=name+"_"+fil+"_"+estreal;

    if ($(idestreal).value=='P')
    {
      alert("Este estatus es solo de consulta, no se puede modificar");
      $(id).value=$(idestreal).value;
    }else {
        if ($(id).value=='P')
        {
          alert("Este estatus es solo de consulta, no se puede utilizar");
          $(id).value=$(idestreal).value;
        }
    }
}
</script>