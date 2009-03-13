
function CalculaRecargos(id)
{
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var colmonrec=col+1;
    var monrec=name+"_"+fil+"_"+colmonrec;
    var mondoc=$('cobdocume_saldoc').value;
	toAjax(3,getUrlModulo()+'ajax',$(id).value,'ActualizarSaldosGrid("a",new Array("cobdocume_recdoc"));totalizar()','&monrec='+monrec+'&mondoc='+mondoc+'');
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

function CalculaDescuentos(id)
{
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var colmondes=col+1;
    var mondes=name+"_"+fil+"_"+colmondes;
    var mondoc=$('cobdocume_mondoc').value;
    var monrec=$('cobdocume_recdoc').value;
	toAjax(4,getUrlModulo()+'ajax',$(id).value,'ActualizarSaldosGrid("b",new Array("cobdocume_dscdoc"));totalizar()','&mondes='+mondes+'&mondoc='+mondoc+'&monrec='+monrec+'');
}