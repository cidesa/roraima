
function ValidarPuntaje(id)
{
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var colpuntaje=col;
    var colpuntajereal=col+1;
    var puntaje=name+"_"+fil+"_"+colpuntaje;
    var puntajereal=name+"_"+fil+"_"+colpuntajereal;

    var num1=toFloat(puntaje);
    var num2=toFloat(puntajereal);

   if (num1>num2)
   {
       alert("El puntaje introducido no puede ser mayor al definido: "+$(puntajereal).value);
       $(puntaje).value="0.00";
    }


}

function totalizar()
{
  var monrec=toFloat('cobdocume_recdoc');
  var dscdoc=toFloat('cobdocume_dscdoc');
  var abodoc=toFloat('cobdocume_abodoc');
  var mondoc=toFloat('cobdocume_mondoc');

   var tototal= mondoc+monrec-dscdoc+abodoc;

   $('cobdocume_saldoc').value=format(tototal.toFixed(2),'.',',','.');

}

