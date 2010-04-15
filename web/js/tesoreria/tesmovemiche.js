function CatalogoGrid()
  {
    window.open('/tesoreria_dev.php/confincomgen/edit/','...','menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80')
  }

 function mientermonto(e,id,iddto,idmon,idtot)
   {
  if (e.keyCode==13)
   {
    if (validarnumero(id)==true)
     {
       var num=toFloat(id);
       document.getElementById(id).value=format(num.toFixed(2),'.',',','.');
       //Obtener Neto a Pagar
       var dto=toFloat(iddto);
       var monto=toFloat(idmon);
       if (dto>monto)
       {
         alert("El Monto Descuento No Puede ser Mayor al Neto a Pagar");
         document.getElementById(iddto).value='0,00';
         dto=0;
       }
       neto=monto-dto;
       document.getElementById(idtot).value=format(neto.toFixed(2),'.',',','.');

       new Ajax.Request('/'+getScriptname()+'/tesmovemiche/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=6&fecemi='+$('tscheemi_fecemi').value+'&numcue='+$('tscheemi_numcue').value+'&canord='+$('tscheemi_montotpagnap').value+'&obj=tscheemi_montotpagnap&obj1=tscheemi_totnetpagnap'})

       }
      else
     {
       //alert("Dato Invalido");
      document.getElementById(id).value='0,00';
      document.getElementById(id).focus();
      document.getElementById(id).select();
      }

   }
   } //end function

   function actualizarsaldocheck(id,idtotal,coltot,tipo)
   {
     if ($('totalcomprobantes').value!="")
          generocomprobante='S';
      else
          generocomprobante='N';

 //   if (generocomprobante=='N')
 //   {
        var aux = id.split("_");
        var name=aux[0];
        var fil=aux[1];
        var col=parseInt(aux[2]);

        var colmonto=col-coltot;
        if (tipo=='OP') {var cedrif=name+"_"+fil+"_"+11}

        var monto=name+"_"+fil+"_"+colmonto;      

        var monordpag=toFloat(monto);
        var montototal=toFloat(idtotal);


         if (document.getElementById(id).checked==true) //fila seleccionada
         {
           neto=montototal+monordpag;
           document.getElementById(idtotal).value=format(neto.toFixed(2),'.',',','.');
           //if (tipo=='OP') {$('tscheemi_cedrif').value=document.getElementById(cedrif).value;}
         }
         else
         {
            neto=montototal-monordpag;
            if (neto<0) {neto=0;}
            document.getElementById(idtotal).value=format(neto.toFixed(2),'.',',','.');
            //if (tipo=='OP' && neto==0) {$('tscheemi_cedrif').value="";}
         }
   // }//if (generocomprobante=='N')
  //  else //Ya genero comprobante, si es asi no debe permiti seleccionar nada
  //  {
  //        document.getElementById(id).checked=!document.getElementById(id).checked;
 //         alert('No se puede modificar la selecci�n realizada, porque los comprobantes contables ya han sido generados');
 //   }
   } //end function

    function push()
    {
      $('tscheemi_tippagordpag_C').checked=false;
      $('tscheemi_tippagordpag_S').checked=true;
    }


  function comprobante(formulario)
  {
      window.open('/tesoreria_dev.php/confincomgen/edit/?formulario='+formulario,formulario,'menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
  }

  function ajaxdescripcion(id)
  {
  	var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var coldes= col-5;
    var numero=name+"_"+fil+"_"+coldes;
  	var numord=$(numero).value;
    var cantidad=name+"_"+fil+"_"+(col-1);
  	var canord=$(cantidad).value;
    var descuento=name+"_"+fil+"_"+(col-2);
  	var desord=$(descuento).value;

  	new Ajax.Request('/tesoreria_dev.php/tesmovemiche/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=5&cajtexmos=tscheemi_descriordpag&numord='+numord+'&tscheemi_fecemi='+$('tscheemi_fecemi').value+'&tscheemi_numcue='+$('tscheemi_numcue').value+'&canord='+canord+'&desord='+desord+'&tscheemi_montotordpag='+$('tscheemi_montotordpag').value+'&id='+id})

  }

  function validarmonto(id)
  {
    if (validarnumero(id)==true)
     {
       var aux = id.split("_");
       var name=aux[0];
       var fil=aux[1];
       var col=parseInt(aux[2]);

       var coltotord=name+"_"+fil+"_12";

       var monto=toFloat(id);
       document.getElementById(id).value=format(monto.toFixed(2),'.',',','.');
       //Verificar que el monto a pagar no  sea mayo que el monto total de la orden de pago
       var totord=toFloat(coltotord);

       if (monto>totord)
       {
         alert("El Monto a pagar No Puede ser Mayor al Monto Total de la Orden de Pago");
         document.getElementById(id).value=format(totord.toFixed(2),'.',',','.');
       }
      }
     else
     {
      document.getElementById(id).value='0,00';
      document.getElementById(id).focus();
      document.getElementById(id).select();
      }
   } //end function

  function entermontoordpagdir(event,id)
  {
    var aux = id.split("_");
    var name=aux[0];
    var fil=aux[1];
    var col=parseInt(aux[2]);
    var codpre=name+"_"+fil+"_1";
    var canord=name+"_"+fil+"_3";

    entermonto_b(event,id);
    if(event.keyCode==13) new Ajax.Request('/'+getScriptname()+'/tesmovemiche/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=6&fecemi='+$('tscheemi_fecemi').value+'&numcue='+$('tscheemi_numcue').value+'&canord='+$(canord).value+'&obj='+canord+'&obj1=tscheemi_totnetpagdir&tipord=ordpagdir&codpre='+$(codpre).value});
    return true;
  }
