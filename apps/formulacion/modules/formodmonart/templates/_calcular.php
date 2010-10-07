<ul class="sf_admin_actions">
<li class="float-rigth">
    <input id="calculo" type="button" name="Submit2" value="Calcular" class="sf_admin_action_save" onclick="calcularmonto();"/>
</li>
</ul>


<script language="JavaScript" type="text/javascript">

function calcularmonto()
{
   if ($('forregart_tipo_P').checked==true) var tipo='P';
   else var tipo='N';

   var monto=toFloat('forregart_monto');
   
   var am=obtener_filas_grid('a',2);
   var l=0;
   while (l<am)
   {
    var check="ax_"+l+"_1";
    var codart="ax_"+l+"_2";
    var cosult="ax_"+l+"_5";
    var num1=toFloat(cosult);

    if ($(check).checked==true)
    {
        if (tipo=='P')
        {
          var calculo= ((num1*monto)/100)+num1;
          $(cosult).value=format(calculo.toFixed(2),'.',',','.');
        }
        else
        {
          var calculo= num1+monto;
          $(cosult).value=format(calculo.toFixed(2),'.',',','.');
        }        
    }

    l++;
   }
}
</script>

