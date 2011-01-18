  //FUNCIONES JAVASCRIPT

  var form = null;
  var arreglo = null;
  var inicio = true;

  function ActualizarInputs()
  {
    form = $('form1');
    arreglo = Array();

    if(form) arreglo = $$('input[type=text]'); // -> only text inputs
    var i = 0;
    arreglo.each(function(e,index){
      if(!e.disabled && !e.readOnly)
      {
        e.tabindex = index;
        i++;
      }
    });


    if(arreglo && inicio) {
      arreglo.first().focus();
      inicio=false;
    }
  }

  ///////////////////////////////////////////////////
  // Observar si se cargado la página por completo //
  ///////////////////////////////////////////////////
    Event.observe(window, 'load',
      function() {
        ActualizarInputs();
      }
    );

  ///////////////////////////////////////////////////
  // Observando si se presiona enter para cmabiar
  Event.observe(document, 'keypress', function(event)
  {
    if(event.keyCode == Event.KEY_RETURN && form) {

      var obj = Event.element(event);

      var indice = parseInt(obj.tabindex);;
      /*arreglo.each(function(e,index){
        if(e.name == obj.name) indice = index;
      });
      */
      var salir=false;
      var i=1;
      while(!salir)
      {
        try{
          if(!arreglo[indice+i].disabled && !arreglo[indice+i].readOnly)
          {
            arreglo[indice+i].focus();
            arreglo[indice+i].select();
            salir=true;
          }else {
            i++;
          }
        }catch(e){
          arreglo[indice].blur();
          arreglo[indice].focus();
          arreglo[indice].select();
          salir=true;
        }
      }
      /*
      var indexSig = parseInt(obj.tabindex);
      indexSig++;
      objSig = $$('input[tabindex=' + indexSig + ']');
      if(objSig) objSig.focus();
      */
    }

  })
