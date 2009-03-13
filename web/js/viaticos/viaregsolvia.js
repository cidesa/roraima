function GuardarDatos()
{
  var datos = '';
  var c = 1;                  //Columna
  var f = 0;                  //Fila
  var nombrecampo = '';
  var grid        = 'gx';       //Nombre del Grid Origen
  var colNoAfecta = 3;

//
  var fila = $F(grid+'_0_3');     //Campo donde indica la Fila que Afecta al Otro Grid
  var aux  = fila.split("_");
  var name = aux[0];
  var fil  = parseInt(aux[1]);
  var col  = parseInt(aux[2])+1;
  var filafectada = name+"_"+fil+"_"+col;   //Fila que Afecta al Otro Grid
//

  while ((f >= 0) && ($(grid+"_"+f+"_"+c)) && ($F(grid+"_"+f+"_"+c)!=''))
  {
    while ((c >= 0) && ($(grid+"_"+f+"_"+c)) && (c != colNoAfecta))
    {
      var c1 = grid+"_"+f+"_"+c;
      if ($(grid+"_"+f+"_"+c) && ($F(grid+"_"+f+"_"+c)!=''))
      {
        datos = datos + $F(grid+"_"+f+"_"+c)+'_';
      }
      c++;
    }
    c = 1;
    datos = datos + '/';
    f++;
  }
  if ($(filafectada))	$(filafectada).value = datos;
}


function mostrar(id)  //Agregar los Gastos
{
    var aux  = id.split("_");
    var name = aux[0];
    var fil  = parseInt(aux[1]);
    var col  = parseInt(aux[2]);

//    var codente    = name+"_"+fil+"_"+1; //Codigo Ente
    var gridgastos = name+"_"+fil+"_"+11; //gridgastos

    var ciudad = name+"_"+fil+"_"+5; //Ciudad
    var moneda = name+"_"+fil+"_"+6; //Moneda
    var tabulador = 'viaregsolvia_viaregtiptab_id'; //Tabulador

  if (($(ciudad).value!="") && ($(moneda).value!="") && ($(tabulador).value!=""))
  {
    new Ajax.Updater('divGrid', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json) }, parameters:'ajax=2&tabulador='+$F(tabulador)+'&ciudad='+$F(ciudad)+'&moneda='+$F(moneda)+'&id='+$F('id')+'&gridgastos='+$F(gridgastos)+'&fila='+id})
  }
  else if ($(tabulador).value=="")
  {
    alert("Debe selecionar un Tabulador, para Asignarle los Gastos.");
  }
  else if ($(ciudad).value!="")
  {
    alert("Debe selecionar una Ciudad, para Asignarle los Gastos.");
  }
  else if ($(moneda).value!="")
  {
    alert("Debe selecionar una Moneda, para Asignarle los Gastos.");
  }
}


function cargargridper()
{
  var fecha    = $('cidefniv_fecini').value;
  var numper   = $('cidefniv_numper').value;
  var fecfinal = $('cidefniv_feccie').value;

 new Ajax.Updater('gridperiodos', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&fecha='+fecha+'&numper='+numper+'&fecfinal='+fecfinal});

 }

function MostrarMontoServicio(id,filaafectada)  //Muestra el monto del servicio dependiendo de la seleccion del combo de grid Gastos
{
  var aux  = filaafectada.split("_");
  var aux2  = id.split("_");
  var name = aux[0];
  var fil  = parseInt(aux[1]);
  var col  = parseInt(aux[2]);

  var ciudad = $F(name+"_"+fil+"_"+5); //Ciudad
  var moneda = $F(name+"_"+fil+"_"+6); //Moneda
  var servicio  = $F(id); //Servicios
  var tabulador = $F('viaregsolvia_viaregtiptab_id'); //Tabulador
  var cajtexmos = aux2[0]+"_"+parseInt(aux2[1])+"_"+2; //Ciudad

  new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json) }, parameters:'ajax=5&ciudad='+ciudad+'&moneda='+moneda+'&tabulador='+tabulador+'&servicio='+servicio+'&cajtexmos='+cajtexmos});

 }
