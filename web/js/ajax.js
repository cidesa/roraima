/**
 * Librerías Javascript para el manejo del Ajax
 *
 * @package    Roraima
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */

  //////////////////////////////////////////////////
  // Cargar una imagen de espera al ejecutar Ajax //
  //////////////////////////////////////////////////

  // JavaScript Document
  /* Stack up window.onload events using this function from Simon Willison - http://www.sitepoint.com/blog-post-view.php?id=171578 */
  function addLoadEvent(func) {
    var oldonload = window.onload;
    if (typeof window.onload != 'function') {
      window.onload = func;
    } else {
      window.onload = function() {
      oldonload();
      func();
      }
    }
  }

  Ajax.Responders.register({
    onCreate: function() {
      if($('cargando') && Ajax.activeRequestCount > 0)
      Effect.Appear('cargando',{duration: 0.25, queue: 'end'});
    },
    onComplete: function() {
      OcultarCargando()
    },

  });

  function OcultarCargando() {
      if($('cargando'))
      Effect.Fade('cargando',{duration: 0.25, queue: 'end'});
      try{ActualizarInputs()}catch(e){}
    }


  String.prototype.pad = function(l, s, t){
        return s || (s = " "), (l -= this.length) > 0 ? (s = new Array(Math.ceil(l / s.length)
    + 1).join(s)).substr(0, t = !t ? l : t == 1 ? 0 : Math.ceil(l / 2))
    + this + s.substr(0, l - t) : this;
         };

  function AjaxJSON(request, json)
  {
    var nbElementsInResponse = json.length;
    for (var i = 0; i < nbElementsInResponse; i++)
    {
      //Completar con ceros la cantidad indicada a la izquierda
      if (json[i][0]=="javascript")
        {
          var datos=acentos(json[i][1]);
          eval(datos);
        }
      else//if (json[i][0]=="javascript")
      {
        if($(json[i][0])){
         if (json[i][2]=="c"){
          if (document.getElementById(json[i][0]).value!="")
          {
            valor=document.getElementById(json[i][0]).value;
            valor=valor.pad(json[i][1], "0",0);
            document.getElementById(json[i][0]).value=valor;
          }
        }// if (json[i][2]=="c"){
        else{
          var datos=acentos(json[i][1]);
          document.getElementById(json[i][0]).value=datos;
        }//else
      }//if($(json[i][0]))
     } // else if (json[i][0]=="javascript")
    }//for
    OcultarCargando();
  }

  function AjaxJSONv2(request, json)
  {
    var nbElementsInResponse = json.length;
    for (var i = 0; i < nbElementsInResponse; i++)
    {
      if($(json[i][0])){
        $(json[i][0]).value=json[i][1];
      }
    }
    OcultarCargando();
  }

  function toAjax(indiceAjax,accion,valor,funcion,params)
  {
    if (valor!=''){
    new Ajax.Request(accion, {
        asynchronous:true,
        evalScripts:true,
        onComplete:
            function(request, json){
                AjaxJSON(request, json);
                try{eval(funcion);}
                catch(ex){}
            },
        parameters: 'ajax='+indiceAjax+'&codigo='+valor+params
        });
    }
  }

  function toAjaxUpdater(div,indiceAjax,accion,valor,funcion,params)
  {
    /*p='';
    if (params)
    {
	  	for (key in params){
	  	  p = p+'&'+key+'='+params[key];
	  	}
  	}*/
    new Ajax.Updater(div, accion, {
        asynchronous:true,
        evalScripts:true,
        onComplete:
            function(request, json){
                AjaxJSON(request, json);
                try{eval(funcion);}
                catch(ex){}
            },
        parameters: 'ajax='+indiceAjax+'&id='+$('id').value+'&codigo='+valor+params
        });
  }

    function accionRemota(accion,param,indice)
  {
    new Ajax.Request(getUrlModulo()+accion, {
        asynchronous:true,
        evalScripts:false,
        onComplete:
            function(request, json){
                AjaxJSON(request, json)
            },
        parameters: accion+'='+indice+"&"+param
        });
    return true;
  }
