/**
 * Librerías Javascript
 *
 * @package    Roraima
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */


function validaMontos(id,obj) {
  var idS=id.split('_');
  var c=0;
  var f=idS[1];
  var u=idS[2];
  if (u=='4') {
    if (toFloat($('ax_'+f+'_5').id)>0) {
      $('ax_'+f+'_4').value=format(c.toFixed(2),'.',',','.');;
    }
  }else
    if (u=='5') {
      if (toFloat($('ax_'+f+'_4').id)>0) {
        $('ax_'+f+'_5').value=format(c.toFixed(2),'.',',','.');;
    }
  }
  ValidarMontoGridv2(obj);
}

// Inserta una nueva fila en el grid indicado
// grid = string
  function NuevaFilaGrid(grid)
  {
    var ultima_fila = $$('.'+grid+'f').last();
    var descendientes = ultima_fila.descendants();
    var ultimo = descendientes[1];

    var array_ultimo = ultimo.id.split('_');

    var max = parseFloat(array_ultimo[1])+1;

    var nuevo = $(grid+'_nuevo').value.replace(/INDEX/g,max);

    new Insertion.After(ultima_fila,nuevo);

    ActualizarObjetosGrids(grid,max);

  }

  function ValidarMontoGridv2(id)
  {
    if ($(id).esNumeroValido()==true)
    {
      $(id).valueToFloatVE();
      eval('Atotales = ArrTotales_'+$(id).name.substring(4,5)+';');
      ActualizarSaldosGrid($(id).name.substring(4,5),Atotales);
      return true;
    }
    else
    {
      $(id).value='0,00';
      $(id).focus();
      $(id).select();
      return false;
    }
  }

  function EliminarFilaArreglosGrid(grid,fila)
  {

    // Objetos tipo Monto del Grid
    var codigo = "var objs_montos = objs_montos_"+grid+""
    try{eval(codigo);}catch(e){}

    // Filas del Grid
    var codigo = "var objs_filas = inputs_filas_"+grid+""
    try{eval(codigo);}catch(e){}

    // recorrer y eliminar cada objeto del arreglo que concuerde con la fila
    // son puros inputs
    if (objs_montos != null && objs_filas != null) {

      if (objs_montos.size() > 0 && objs_filas.size() > 0) {

        // Objetos Tipo Monto por Fila
        var objXfila = (parseInt(objs_montos.size() / objs_filas.size()));

        // Eliminamos tantos objetos como tipos monto exista en el arreglo objs_montos_"grid"
        for(var i=0;i<objs_montos.size();i++){
          if(objs_montos[i].lastIndexOf("x_"+fila+"_")!=-1 || objs_montos[i].lastIndexOf("x"+fila+"id")!=-1){
            var codigo = "objs_montos_"+grid+".splice("+i+","+objXfila+")";
            try{eval(codigo);}catch(e){}
            break;
          }
        }

        // Eliminamos la fila del arreglo de filas
        for(var i=0;i<objs_filas.size();i++){
          if(objs_filas[i][0].lastIndexOf("x_"+fila+"_")!=-1 || objs_filas[i][0].lastIndexOf("x"+fila+"id")!=-1){
            var codigo = "inputs_filas_"+grid+".splice("+i+",1)";
            try{eval(codigo);}catch(e){}
            break;
          }
        }
      }
    }
  }

  function ActualizarObjetosGrids(grid,fila)
  {

    var codigo = "var objs_montos = $$('."+grid+"f"+fila+" .g_"+grid+"_m input')";
    eval(codigo);

    // Objetos para los montos
    var arrayobjs = new Array();

    objs_montos.each(function(e,index){
      auxid = $(e).id.split('_').size();
      if (auxid == 3) {
        codigo = "objs_montos_"+grid+".push('"+e.id+"');";
        eval(codigo);
      }
    })

    // Filas
    codigo = "var objs = $$('."+grid+"f"+fila+" input');"
    eval(codigo);
    var arrayobjs = new Array(objs.size());

    objs.each(function(e,index){
      arrayobjs[index] = e.id;
    })

    // Agregar una nueva fila
    codigo = "inputs_filas_"+grid+".push(arrayobjs);"
    eval(codigo);

    return true;
  }


  function ActualizarSaldosGrid(grid,totales)
  {
    // Objetos tipo Monto del Grid
    var codigo = "var objs_montos = objs_montos_"+grid+"";
    try{eval(codigo);}catch(e){}

    // Filas del Grid
    var codigo = "var objs_filas = inputs_filas_"+grid+"";
    try{eval(codigo);}catch(e){}

    if(objs_montos!=null && objs_filas!=null){

      if(objs_montos.size()>0 && objs_filas.size()>0){

        // Objetos Tipo Monto por Fila
        var objXfila = (parseInt(objs_montos.size() / objs_filas.size()));

        // Arreglo de totales
        var acumtotales = new Array(objXfila);

        for(u=0;u<objXfila;u++) acumtotales[u] = 0;

        var columna = 0;
    		var idc = '';
		    var  sw = true;
        // Ciclo para recorrer todos los objetos tipo monto del Grid
        objs_montos.each(function(elemento) {
  		    auxid = $(elemento).id.split('_').size();
  		    if((auxid)==3){
              acumtotales[columna] += $(elemento).toFloat();
  			      columna++;
  			      if(columna==(objXfila)){
  			  	    columna=0;
  			      }
          }
        });

        totales.each(function(elemento, index){
          if($(elemento)!=null){
            $(elemento).value = acumtotales[index];
            $(elemento).valueToFloatVE();
          }
        });

      }
    }

  }

  function EliminarFilaGrid(grid,fila,totales)
  {
    var aux = totales.split(',');
  	var campototales = "'"+aux[0]+"'";
	  for(g=1;g<aux.size();g++)
		  campototales = campototales+","+ "'"+aux[g]+"'";

	  eval('var ArrTotales = new Array('+campototales+');');
    var idFila = $(grid+"x"+fila+"id");
    var eliminados = $(grid+"_idborrado");
    var filasAEliminar = $$('.'+grid+'f'+fila);

    if(idFila){
    if(idFila.value!=""){
      if(eliminados.value==""){
        eliminados.value = idFila.value;
      }else{
        eliminados.value += "-" + idFila.value;
      }
      // Eliminamos la fila
      if(filasAEliminar) {
        filasAEliminar[0].remove();
        EliminarFilaArreglosGrid(grid,fila)
        ActualizarSaldosGrid(grid,ArrTotales);
      }
    }else{
      if(filasAEliminar) {
        filasAEliminar[0].remove();
        EliminarFilaArreglosGrid(grid,fila)
        ActualizarSaldosGrid(grid,ArrTotales);
      }
    }
    }
    else{
    if(filasAEliminar) {
        filasAEliminar[0].remove();
        EliminarFilaArreglosGrid(grid,fila)
        ActualizarSaldosGrid(grid,ArrTotales);
      }
    }
  }

  function redondeo2decimales(numero)
  {
    var original=parseFloat(numero);
    var result=Math.round(original*100)/100 ;
    return result;
  }

  function serializeFila(grid,fila)
  {
    codigo = "var filas = inputs_filas_"+grid+";";
    eval(codigo);

    var json = "";
    var index = 0;

    for(var i=0;i<filas.size();i++){
      if(filas[i][0].lastIndexOf("x_"+fila+"_")!=-1 || filas[i][0].lastIndexOf("x"+fila+"id")!=-1){
        index = i;
        break;
      }
    }


    filas[index].each(function(e,index){
      var serial = "";
      if($(e).id) {
        try{
          serial = Form.Element.serialize($(e));
          if(serial!="") {json += "&"; json += serial;}
        }catch(e){}
      }
    })
    json += "&grid="+grid;
    json += "&fila="+fila;
    json += "&accion=fila";

    return json;
  }

  function serializeColumna(grid,col)
  {
    codigo = "var filas = inputs_filas_"+grid+";";
    eval(codigo);

    var json = "";
    var index = 0;

    if(filas!=null){

      filas.each(function(e){
        e.each(function(elemento,i){
          auxid = $(elemento).id.split('_');
          if(auxid.size()==3)
          if(auxid[2]==col){
            index = i;
            throw $break;
          }
        });
        throw $break;
      })

      for(var i=0;i<filas.size();i++){
        try{
            serial = Form.Element.serialize($(filas[i][index]));
            if(serial!="") {json += "&"; json += serial;}
        }catch(e){}

      }

      json += "&grid="+grid;
      json += "&columna="+col;
      json += "&accion=columna";

      return json;
    }else return '';
  }

  function serializeGrid(grid)
  {
    codigo = "var objsgrid = inputs_filas_"+grid+";";
    eval(codigo);
    var json = "";

    objsgrid.each(function(fila){
      fila.each(function(e){
        try{
          serial = Form.Element.serialize($(e));
          if(serial!="") {json += "&"; json += serial;}
        }catch(e){}
      });
    })
    json += "&grid="+grid;
    json += "&accion=grid";

    return json;
  }

  function accionRemotaGrid(accion,grid,tipo,indice,adicionales)
  {
    var param = null;
    if(tipo=="fila") param = serializeFila(grid,indice);
    else if(tipo=="columna") param = serializeColumna(grid,indice);
    else if(tipo=="grid") param = serializeGrid(grid);

    for(i=0;i<adicionales.length;i++) param += '&'+adicionales[0]+'='+$(adicionales[0]).value;

    new Ajax.Request(accion, {
        asynchronous:true,
        evalScripts:false,
        onComplete:
            function(request, json){
                AjaxJSON(request, json)
            },
        parameters:param
        });
    return true;
  }

  // Compatibilidad con Grid v1.0
  function accionAjax(accion,funcion,indiceAjax,objMos,objCom,valor)
  {
    new Ajax.Request(accion, {
        asynchronous:true,
        evalScripts:false,
        onComplete:
            function(request, json){
                AjaxJSON(request, json);
                try{eval(funcion);}
                catch(ex){}
            },
        parameters: 'ajax='+indiceAjax+'&cajtexmos='+objMos+'&cajtexcom='+objCom+'&codigo='+valor
        });
  }
