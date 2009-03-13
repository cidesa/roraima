
  var expresionfloatVE = /^(\d{1,3}\.){0,6}(\d{1,3})(\,\d{1,6})$/;
  var expresionfloatVE_1 = /^(\d{1,10})(\,\d{1,6})?$/;
  var expresionfloatVE_2 = /^(\d{1,3}\.){1,6}(\d{1,3})(\,\d{1,6})?$/;

  var expresionfloat =  /^(\d{1,3}\,){0,6}(\d{1,3})(\.\d{1,6})$/;
  var expresionfloat_1 =  /^(\d{1,10})(\.\d{1,6})?$/;
  var expresionfloat_2 =  /^(\d{1,3}\,){1,6}(\d{3,3})(\.\d{1,6})?$/;



// Inserta una nueva fila en el grid indicado
// grid = string
  function NuevaFilaGrid(grid)
  {
    var ultima_fila = $$('.'+grid+'f').last();
    var descendientes = ultima_fila.descendants();
    var ultimo = descendientes[1];

    //if(ultimo.className == "imagenborrar") ultimo = descendientes[3];

    var array_ultimo = ultimo.id.split('_');

    var max = parseFloat(array_ultimo[1])+1;

    var nuevo = $(grid+'_nuevo').value.replace(/INDEX/g,max);

    new Insertion.After(ultima_fila,nuevo);

    ActualizarObjetosGrids(grid);

  }


  // Validar si puede ser parseado por las funciones
  function ValidarNumeroV2(t)
  {
    if(ValidarNumeroV2VE(t) || ValidarNumeroV2Float(t)) return true;
    else return false;
  }

  // Pasando el Objeto HTML
  function ValidarNumeroV2VE(t)
  {
    var val = $(t).value;

    if(val.match(expresionfloatVE) || val.match(expresionfloatVE_1) || val.match(expresionfloatVE_2)) return true;
    else return false;
  }

  // Pasando el valor string
  function ValidarNumeroV2VE_(t)
  {
    var val = t;

    if(val.match(expresionfloatVE) || val.match(expresionfloatVE_1) || val.match(expresionfloatVE_2)) return true;
    else return false;
  }

  // Pasando el Objeto HTML
  function ValidarNumeroV2Float(t)
  {
    var val = $(t).value;

    if(val.match(expresionfloat_1) || val.match(expresionfloat_2) || val.match(expresionfloat)) return true;
    else return false;
  }

  // Pasando el Valor String
  function ValidarNumeroV2Float_(t)
  {
    var val = t;

    if(val.match(expresionfloat_1) || val.match(expresionfloat_2) || val.match(expresionfloat)) return true;
    else return false;
  }

  function ValidarMontoGrid(id)
  {
    if (ValidarNumeroV2(id)==true)
    {
      if(ValidarNumeroV2Float(id))
        elnum = FloattoFloatVE($(id).value);
      else
        if(ValidarNumeroV2VE(id))
        {
          elnum = FloatVEtoFloat($(id).value);
          elnum = FloattoFloatVE(elnum);
        }
        else{elnum = '0,00';}
      $(id).value = elnum;
      ActualizarSaldosGrid($(id).name.substring(0,1),ArrTotales);
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

  function ValidarMontoGridv2(id)
  {
    if (ValidarNumeroV2(id)==true)
    {
      if(ValidarNumeroV2Float(id))
        elnum = FloattoFloatVE($(id).value);
      else
        if(ValidarNumeroV2VE(id))
        {
          elnum = FloatVEtoFloat($(id).value);
          elnum = FloattoFloatVE(elnum);
        }
        else{elnum = '0,00';}
      $(id).value = elnum;
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

  function ActualizarObjetosGrids(grid)
  {
    var codigo = "objs_montos_"+grid+" = $$('.g_"+grid+"_m input')";
    eval(codigo);
    codigo = "objs_filas_"+grid+" = $$('."+grid+"f');";
    eval(codigo);
    codigo = "var filas = objs_filas_"+grid+"";
    eval(codigo);
    codigo = "var columnas = $$('grid_"+grid+"_col')";
    eval(codigo);
    codigo = "inputs_filas_"+grid+" = Array("+filas.lenght+");";
    eval(codigo);
    codigo = "inputs_cols_"+grid+" = Array("+columnas.lenght+");";
    eval(codigo);
    codigo = "inputs_grid_"+grid+" = $$('.gridint_"+grid+" input');";
    eval(codigo);

    filas.each(function(e,index){
      var f = e.className.substring(5);
      codigo = "var objs = $$('."+grid+"f"+f+" input');"
      eval(codigo);
      codigo = "inputs_filas_"+grid+"["+index+"] = objs;"
      eval(codigo);
    })

    columnas.each(function(e,index){
      var c = e.className.substring(5);
      codigo = "var objs = $$('."+grid+"c"+index+" input');"
      eval(codigo);
      codigo = "inputs_cols_"+grid+"["+index+"] = objs;"
      eval(codigo);
    })

  }


  function ActualizarSaldosGrid(grid,totales)
  {
    // Objetos tipo Monto del Grid
    var codigo = "var objs_montos = objs_montos_"+grid+""
    try{eval(codigo);}catch(e){}

    // Filas del Grid
    var codigo = "var objs_filas = objs_filas_"+grid+""
    try{eval(codigo);}catch(e){}

    if(objs_montos!=null && objs_filas!=null){

      if(objs_montos.size()>0 && objs_filas.size()>0){

        // Objetos Tipo Monto por Fila
        var objXfila = objs_montos.size() / objs_filas.size();

        // Arreglo de totales
        var acumtotales = new Array(objXfila);

        for(u=0;u<objXfila;u++) acumtotales[u] = 0;

        var columna = 0;

        // Ciclo para recorrer todos los objetos tipo monto del Grid
        objs_montos.each(function(elemento) {

          // ACUMULAR LOS CAMPOS DEL GRID y PROBAR CODIGO
          valor = FloatVEtoFloat(elemento.value);
          acumtotales[columna] += valor;
          columna++;
          if(columna==(objXfila)) columna=0;
        });

        totales.each(function(elemento,index){
          try{
            if(elemento!='' && $(elemento))
              $(elemento).value = FloattoFloatVE(acumtotales[index]);
          }catch(e){}
        })
      }
    }
  }

  function EliminarFilaGrid(grid,fila)
  {

    var idFila = $(grid+"x"+fila+"id");
    var eliminados = $(grid+"_idborrado");
    var filasAEliminar = $$('.'+grid+'f'+fila);

    if(idFila.value!=""){
      if(eliminados.value==""){
        eliminados.value = idFila.value;
      }else{
        eliminados.value += "-" + idFila.value;
      }
      // Eliminamos la fila
      if(filasAEliminar) {
        filasAEliminar[0].remove();
        ActualizarObjetosGrids(grid);
        ActualizarSaldosGrid(grid,ArrTotales);
      }
    }else{
      if(filasAEliminar) {
        filasAEliminar[0].remove();
      }
    }
  }

  function FloatVEtoFloat(val)
  {

    try{
      if(val.match(expresionfloatVE) || val.match(expresionfloatVE_1) || val.match(expresionfloatVE_2)){
        var sinpuntos = val.gsub(/\./, '');
        var valor_en_float = parseFloat(sinpuntos.gsub(/,/, '.'));
        if(isNaN(valor_en_float))
          return 0.00;
        else return valor_en_float
      }else return 0.00;
    }catch(e){return 0.00;}
  }

  function FloattoFloatVE(monto)
  {
    var val = monto.toString()
    var expresion = /^(\d{1,3}\,?){0,6}(\d{1,3})(\.\d{1,6})?$/;
    if(val.match(expresion)){
        //monto = redondeo2decimales(monto);
        //val = monto.toString();
        var numero = null;
        if(val.substring(val.length-3,val.length-2)!=',' && val.substring(val.length-2,val.length-1)!=',')
          {numero = val.gsub(/\,/,'');}
        else {
          numero = val.gsub(/\./,'');
          numero = numero.gsub(/\,/,'.');
        }
        numero = numero.split(/\./);
        var digitos = numero[0].length;
        var primer = digitos % 3;
        var miles = Math.ceil(digitos / 3);
        var i = 0;
        var floatve = '';
        for(var n=0;n<miles;n++) {
          if(n==0){
            if(primer==0){
              floatve = floatve + numero[0].substring(0,3);
              i += 3;
            }
            else{
              floatve = floatve + numero[0].substring(0,primer);
              i += primer;
            }
          }
          else{
            floatve = floatve + numero[0].substring(i,i+3);
            i += 3;
          }
          if(n!=(miles-1)) floatve = floatve + '.';
        }
        floatve = floatve + ',';
        if (numero.length>1) floatve = floatve + numero[1].substring(0,3);
        else floatve = floatve + '00';
        return floatve;
    }else {
      if(ValidarNumeroV2VE_(val)) return val; else return '0,00';
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

    filas[fila].each(function(e,index){
      var serial = "";
      if(e.id) {
        try{
          serial = Form.Element.serialize(e);
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
    codigo = "var cols = inputs_cols_"+grid+";";
    eval(codigo);
    var json = "";

    cols[col].each(function(e,index){
      try{
        json += Form.Element.serialize(e);
      }catch(e){}
    })
    json += "&grid="+grid;
    json += "&columna="+col;
    json += "&accion=columna";

    return json;
  }

  function serializeGrid(grid)
  {
    codigo = "var objsgrid = inputs_grid_"+grid+";";
    eval(codigo);
    var json = "";

    objsgrid.each(function(e,index){
      try{
        json += Form.Element.serialize(e);
      }catch(e){}

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

  function FloattoFloatVEd(monto,dec)
  {
    var val = monto.toString()
    var expresion = /^(\d{1,3}\,?){0,6}(\d{1,3})(\.\d{1,6})?$/;
    if(val.match(expresion)){
        //monto = redondeo2decimales(monto);
        //val = monto.toString();
        var numero = null;
        if(val.substring(val.length-3,val.length-2)!=',' && val.substring(val.length-2,val.length-1)!=',')
          {numero = val.gsub(/\,/,'');}
        else {
          numero = val.gsub(/\./,'');
          numero = numero.gsub(/\,/,'.');
        }
        numero = numero.split(/\./);
        var digitos = numero[0].length;
        var primer = digitos % 3;
        var miles = Math.ceil(digitos / 3);
        var i = 0;
        var floatve = '';
        for(var n=0;n<miles;n++) {
          if(n==0){
            if(primer==0){
              floatve = floatve + numero[0].substring(0,3);
              i += 3;
            }
            else{
              floatve = floatve + numero[0].substring(0,primer);
              i += primer;
            }
          }
          else{
            floatve = floatve + numero[0].substring(i,i+3);
            i += 3;
          }
          if(n!=(miles-1)) floatve = floatve + '.';
        }
        floatve = floatve + ',';
        if (numero.length>1) floatve = floatve + numero[1].substring(0,dec);
        else floatve = floatve + '00';
        return floatve;
    }else {
      if(ValidarNumeroV2VE_(val)) return val; else return '0,00';
    }
  }

