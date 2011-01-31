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

  //FUNCIONES JAVASCRIPT

  var form = null;
  var arreglo = null;
  var inicio = true;
  var noActualizarInputs = false;

  function ActualizarInputs()
  {
    if(!noActualizarInputs){
      form = $('sf_admin_edit_form');
      arreglo = Array();

      if(form) arreglo = $$('input[type=text]', 'select','textarea'); // -> only text inputs

      var i = 0;
      arreglo.each(function(e,index){
        if(!e.disabled && !e.readOnly)
        {
          e.tabindex = index;
          i++;
        }
      });


      if(arreglo & inicio) {
        try{arreglo.first().focus();}catch(e){}
        inicio=false;
      }

    }
  }

  ///////////////////////////////////////////////////
  // Observar si se cargado la p�gina por completo //
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

      if(!noActualizarInputs){

        var obj = Event.element(event);
        var indice = parseInt(obj.tabindex);
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
              try{arreglo[indice+i].select();}catch(e){}
              salir=true;
            }else {
              i++;
            }
          }catch(e){
            if(arreglo[indice])
            if(!arreglo[indice].disabled && !arreglo[indice].readOnly)
            {
              arreglo[indice].blur();
              arreglo[indice].focus();
              //try{arreglo[indice].select();}catch(e){}
            }
            salir=true;
          }
        }
        obj.returnEvent = false;
        return false;
        /*
        var indexSig = parseInt(obj.tabindex);
        indexSig++;
        objSig = $$('input[tabindex=' + indexSig + ']');
        if(objSig) objSig.focus();
        */

      }

    }
    return true

  })
