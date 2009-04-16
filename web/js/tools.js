  //FUNCIONES JAVASCRIPT
    var expresionfloatVE = /^(\d{1,3}\.){0,6}(\d{1,3})(\,\d{1,6})$/;
  var expresionfloatVE_1 = /^(\d{1,10})(\,\d{1,6})?$/;
  var expresionfloatVE_2 = /^(\d{1,3}\.){1,6}(\d{1,3})(\,\d{1,6})?$/;


/* var   expresionfloat =  /^(\d{1,3}\,)(\d{3,3}\,){1,10}(\.\d+)$/;
 var  expresionfloat_1 =  /^(\d{1,10})(\.\d+)$/;
 var expresionfloat_2 =  /^(\d{1,3}\,){1,10}(\d{3,3})(\.\d+)$/;*/
 var  expresionfloat_3 =  /^(\d{1,20})$/;
 var  expresionfloat_4 =  /^(\d{1,20})(\.\d+)$/;



/* var   expresionfloatVE =  /^(\d{1,3}\,)(\d{3,3}\,){1,10}(\.\d+)$/;
 var  expresionfloatVE_1 =  /^(\d{1,10})(\.\d+)$/;
 var expresionfloatVE_2 =  /^(\d{1,3}\,){1,10}(\d{3,3})(\.\d+)$/;*/
 var  expresionfloatVE_3 =  /^(\d{1,20})$/;
 var  expresionfloatVE_4 =  /^(\d{1,20})(\.\d+)$/;

 var expresionfloat =  /^(\d{1,3}\,){0,6}(\d{1,3})(\.\d{1,6})$/;
  var expresionfloat_1 =  /^(\d{1,10})(\.\d{1,6})?$/;
  var expresionfloat_2 =  /^(\d{1,3}\,){1,6}(\d{3,3})(\.\d{1,6})$/;


  ////////////////////////////////////////////////////

    /////////////////////////////////////////////////////////////////////////
    function validarnumero(t)
    {
      valor=document.getElementById(t).value;
      longitud=valor.length;
      bueno=true;
      for(i=0;i<longitud;i++)
      {
        car=valor.substring(i,i+1);
        if ( (!((car>="0") && (car<="9"))) && (car!=".") && (car!=",") )
        {
            bueno=false;
            break;
        }
      }
      return bueno;
    }

    /////////////////////////////////////////////////////////////////////////
    // Validar Numeros con formato Num?rico con separador de decimales con coma (,)
    function validarnumerocoma(t)
    {
      valor=document.getElementById(t).value;
      longitud=valor.length;
      bueno=true;
      for(i=0;i<longitud;i++)
      {
        car=valor.substring(i,i+1);
        if ( (!((car>="0") && (car<="9"))) &&(car!=",") )
        {
            bueno=false;
            break;
        }
      }
      return bueno;
    }

  function redondear(cantidad, decimales)
  {
    var cantidad = parseFloat(cantidad);
    var decimales = parseFloat(decimales);
    decimales = (!decimales ? 2 : decimales);
    return Math.round(cantidad * Math.pow(10, decimales)) / Math.pow(10, decimales);
  }

    /////////////////////////////////////////////////////////////////////////
    function format(nStr, inD, outD, sep)
    {
      nStr += '';
      var dpos = nStr.indexOf(inD);
      var nStrEnd = '';
      if (dpos != -1) {
        nStrEnd = outD + nStr.substring(dpos + 1, nStr.length);
        nStr = nStr.substring(0, dpos);
      }
      var rgx = /(\d+)(\d{3})/;
      while (rgx.test(nStr)) {
        nStr = nStr.replace(rgx, '$1' + sep + '$2');
      }
      return nStr + nStrEnd;
    }


    /////////////////////////////////////////////////////////////////////////
    function IsNumeric(valor)// FORMATEAR FECHA
    {
    var log=valor.length; var ok="S";
    for (x=0; x<log; x++)
    { v1=valor.substr(x,1);
    v2 = parseInt(v1);
    //Compruebo si es un valor num?rico
    if (isNaN(v2)) { ok= "N";}
    }
    if (ok=="S") {return true;} else {return false; }
    }

    var primerslap=false;
    var segundoslap=false;
    var tercerslap=false;

    function formateafecha(fecha)
    {
    var long = fecha.length;
    var dia;
    var mes;
    var ano;

    if ((long>=2) && (primerslap==false)) { dia=fecha.substr(0,2);
    if ((IsNumeric(dia)==true) && (dia<=31) && (dia!="00")) { fecha=fecha.substr(0,2)+"/"+fecha.substr(3,7); primerslap=true; }
    else { fecha=""; primerslap=false;}
    }
    else
    { dia=fecha.substr(0,1);
    if (IsNumeric(dia)==false)
    {fecha="";}
    if ((long<=2) && (primerslap=true)) {fecha=fecha.substr(0,1); primerslap=false; }
    }
    if ((long>=5) && (segundoslap==false))
    { mes=fecha.substr(3,2);
    if ((IsNumeric(mes)==true) &&(mes<=12) && (mes!="00")) { fecha=fecha.substr(0,5)+"/"+fecha.substr(6,4); segundoslap=true; }
    else { fecha=fecha.substr(0,3); segundoslap=false;}
    }
    else { if ((long<=5) && (segundoslap=true)) { fecha=fecha.substr(0,4); segundoslap=false; } }
    if (long>=7)
    { ano=fecha.substr(6,4);
    if (IsNumeric(ano)==false) { fecha=fecha.substr(0,6); }
    else { if (long==10){ if ((ano==0) || (ano<1900) || (ano>2100)) { fecha=fecha.substr(0,6); } } }
    }

    if (long>=10)
    {
    fecha=fecha.substr(0,10);
    dia=fecha.substr(0,2);
    mes=fecha.substr(3,2);
    ano=fecha.substr(6,4);
    // A?o no viciesto y es febrero y el dia es mayor a 28
    if ( (ano%4 != 0) && (mes ==02) && (dia > 28) ) { fecha=fecha.substr(0,2)+"/"; }
    }
    return (fecha);
    }

    /////////////////////////////////////////////////////////////////////////
    function disableObjetos(obj,val) // Deshabilita los objetos segun un arreglo de objetos
    {
          for(i=0;i<document.forms[0].elements.length;i++) document.forms[0].elements[i].setAttribute("readOnly",val);
          for(i=0;i<obj.length;i++)
      {
         document.getElementById(obj[i]).setAttribute("readOnly",!val);
      }
    }

    /////////////////////////////////////////////////////////////////////////
    function disableAllObjetos(obj,val) // Desahabilita todos los objetos menos los del arreglo
    {
      for(i=0;i<document.forms[0].elements.length;i++) document.forms[0].elements[i].readOnly = val;


      for(i=0;i<obj.length;i++)
      {
        tip=obj[i].split('-');
        if (tip.length==1) //Verifico que no sea radio button
           document.getElementById(obj[i]).readOnly = !val;
        else // Es un radio button, entonces se activa o desactiva segun el nro de radio button indicados
        {
           cont=parseInt(tip[1]);
           nombre=tip[0];
          for(j=0;j<cont;j++)
             eval('document.forms[0].'+nombre+'[j].readOnly=!val');
        }
      }
    }

    function disableAllClass(form, class, val) // Desahabilita todos los objetos menos los del arreglo
    {
      var objform = $(form)

      var buttons = objform.getInputs();

      if(val){
        buttons.invoke('disable');
      }else{

      }



    }


    function focos(e,fc)
    {
     if (e.keyCode==9)
      {
        document.getElementById(fc).focus();
        document.getElementById(fc).select();
      }
    }


  function entermontootro(e,id)
  {
    if (e.keyCode==13  || e.keyCode==9)
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
    }

  } //end function

  function toFloatVE(id)
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

  } //end function


function enternumero(e,id)
  {
    if (e.keyCode==13  || e.keyCode==9)


     valor = $(id).value;
     valor = parseInt(valor);

      if (isNaN(valor))
      {
            $(id).value='0';
            $(id).focus();
      }
      else
      {
            $(id).value=valor;
      }


  } //end function




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

    if(val.match(expresionfloatVE) || val.match(expresionfloatVE_1) || val.match(expresionfloatVE_2) || val.match(expresionfloatVE_3) || val.match(expresionfloatVE_4)) return true;
    else return false;
  }

  // Pasando el valor string
  function ValidarNumeroV2VE_(t)
  {
    var val = t;

    if(val.match(expresionfloatVE) || val.match(expresionfloatVE_1) || val.match(expresionfloatVE_2) || val.match(expresionfloatVE_3) || val.match(expresionfloatVE_4)) return true;
    else return false;
  }

  // Pasando el Objeto HTML
  function ValidarNumeroV2Float(t)
  {
    var val = $(t).value;

    if(val.match(expresionfloat_1) || val.match(expresionfloat_2) || val.match(expresionfloat_3) || val.match(expresionfloat_4) || val.match(expresionfloat)) return true;
    else return false;
  }

  // Pasando el Valor String
  function ValidarNumeroV2Float_(t)
  {
    var val = t;

    if(val.match(expresionfloat_1) || val.match(expresionfloat_2) || val.match(expresionfloat_3) || val.match(expresionfloat_4) || val.match(expresionfloat)) return true;
    else return false;
  }

  function FloatVEtoFloat(val)
  {

    try{
      if(val.match(expresionfloatVE) || val.match(expresionfloatVE_1) || val.match(expresionfloatVE_2) || val.match(expresionfloatVE_3) || val.match(expresionfloatVE_4)){
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
   // var expresion = /^(\d{1,3}\,)(\d{3,3}\,){1,10}(\.\d+)$/;
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

  function toFloat(id)
  {
    var elnum = 0.00;

    if(ValidarNumeroV2Float(id))
    elnum = parseFloat($(id).value);
    else
    if(ValidarNumeroV2VE(id))
      elnum = FloatVEtoFloat($(id).value);
    else
      elnum = 0.00;

  return elnum;
  } //end function

   // Validar los datos num?ricos, similar a entermontootro, pero el separador
   // decimal es la coma (,)
   function validardecimal(e,id,fc)
   {
   if (e.keyCode==13)
   {
    if (validarnumero(id)==true)
     {
       str= document.getElementById(id).value.toString();
       str = str.replace(".","");
       str = str.replace(",",".");
       var num=parseFloat(str);
       document.getElementById(id).value=format(num.toFixed(2),'.',',','.');
        focos(e,fc);
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

  function currencyFormat(fld, milSep, decSep, e) {
    var sep = 0;
    var key = '';
    var i = j = 0;
    var len = len2 = 0;
    var strCheck = '0123456789';
    var aux = aux2 = '';
    var whichCode = (window.Event) ? e.which : e.keyCode;
    if (whichCode == 13) return true; // Enter
    key = String.fromCharCode(whichCode); // Get key value from key code
    if (strCheck.indexOf(key) == -1) return false; // Not a valid key
    len = fld.value.length;
    for(i = 0; i < len; i++)
     if ((fld.value.charAt(i) != '0') && (fld.value.charAt(i) != decSep)) break;
    aux = '';
    for(; i < len; i++)
     if (strCheck.indexOf(fld.value.charAt(i))!=-1) aux += fld.value.charAt(i);
    aux += key;
    len = aux.length;
    if (len == 0) fld.value = '';
    if (len == 1) fld.value = '0'+ decSep + '0' + aux;
    if (len == 2) fld.value = '0'+ decSep + aux;
    if (len > 2) {
     aux2 = '';
     for (j = 0, i = len - 3; i >= 0; i--) {
      if (j == 3) {
       aux2 += milSep;
       j = 0;
      }
      aux2 += aux.charAt(i);
      j++;
     }
     fld.value = '';
     len2 = aux2.length;
     for (i = len2 - 1; i >= 0; i--)
      fld.value += aux2.charAt(i);
     fld.value += decSep + aux.substr(len - 2, len);
    }
    return false;
   }

 function ColocarFormato(key,valor,id)
    {
       if (key.keyCode==13)
      {
      //str= document.getElementById(id).value.toString();
      var valor=parseFloat(valor);
      document.getElementById(id).value=format(valor.toFixed(2),'.','.',',');
      }
    }
  function ColocarFormatoOnBlue(key,valor,id)
    {
       if ((key.keyCode!=13) && (valor!=""))
      {
      var valor=parseFloat(valor);
      document.getElementById(id).value=format(valor.toFixed(2),'.','.',',');
      }
    }
  function rayitas(tira)
    {
        long=tira.length;
        i=1;
        if (long > 1)
        {
          i=long;
          while (i>0)
          {
            if ( (tira.charAt(i)=='0') || (tira.charAt(i)=='1') || (tira.charAt(i)=='2') || (tira.charAt(i)=='3') || (tira.charAt(i)=='4') || (tira.charAt(i)=='5') || (tira.charAt(i)=='6') || (tira.charAt(i)=='7') || (tira.charAt(i)=='8') || (tira.charAt(i)=='9'))
            {
              hasta=i+1;
              i=0;
            }else
               hasta=i;
            i=i-1;
          }
        tira= tira.substring(0,hasta);
        return tira;
        }
    }
  function rayaenter(e,tira)
    {

      if (e.keyCode==13 || e.keyCode==9)
      {

        long=tira.length;
        i=1;
        if (long > 1)
        {
          i=long;
          while (i>0)
          {
            if ( (tira.charAt(i)=='0') || (tira.charAt(i)=='1') || (tira.charAt(i)=='2') || (tira.charAt(i)=='3') || (tira.charAt(i)=='4') || (tira.charAt(i)=='5') || (tira.charAt(i)=='6') || (tira.charAt(i)=='7') || (tira.charAt(i)=='8') || (tira.charAt(i)=='9'))
            {
              hasta=i+1;
              i=0;
            }
            i=i-1;
          }
        tira= tira.substring(0,hasta);
        return tira;
        }
      }

    }


  String.prototype.pad = function(l, s, t){
        return s || (s = " "), (l -= this.length) > 0 ? (s = new Array(Math.ceil(l / s.length)
    + 1).join(s)).substr(0, t = !t ? l : t == 1 ? 0 : Math.ceil(l / 2))
    + this + s.substr(0, l - t) : this;
         };

      /////////////////////////////////////////////////
      /*  Seleccionar los objetos de un slct multiple*/

      function ObjetosSelectMultiple(objetoSelect)
      {
        for (var i=0;i < objetoSelect.options.length;i++)
        {
          objetoSelect.options[i].selected=true;
        }
      }

      var patron = new Array(2,2,4)

      function mascara(d,sep,pat,nums)
      {
          if(d.valant != d.value){
            val = d.value
            largo = val.length
            val = val.split(sep)
            val2 = ''
            for(r=0;r<val.length;r++){
              val2 += val[r]
            }
            if(nums){
              for(z=0;z<val2.length;z++){
                if(isNaN(val2.charAt(z))){
                  letra = new RegExp(val2.charAt(z),"g")
                  val2 = val2.replace(letra,"")
                }
              }
            }
            val = ''
            val3 = new Array()
            for(s=0; s<pat.length; s++){
              val3[s] = val2.substring(0,pat[s])
              val2 = val2.substr(pat[s])
            }
            for(q=0;q<val3.length; q++){
              if(q ==0){
                val = val3[q]
              }
              else{
                if(val3[q] != ""){
                  val += sep + val3[q]
                  }
              }
            }
            d.value = val
            d.valant = val
            }
      }

  function MascaraCodigo(obj,tam)
  {
    if(!isNaN(obj.value))
    {
      obj.value = parseInt(obj.value).toPaddedString(4);
    }
  }
  function ismaxlength(obj)
  {
     var mlength=obj.getAttribute? parseInt(obj.getAttribute("maxlength")) : ""
     if (obj.getAttribute && obj.value.length>mlength)
     obj.value=obj.value.substring(0,mlength)
  }

  function entermontofactor(e,id)
   {
  if (e.keyCode==13)
   {
    if (validarnumero(id)==true)
     {
       var num=toFloat(id);
       document.getElementById(id).value=format(num.toFixed(4),'.',',','.');
       }
      else
     {
       //alert("Dato Invalido");
      document.getElementById(id).value='0,0000';
      document.getElementById(id).focus();
      document.getElementById(id).select();
     }
   }
   } //end function

  function entermonto3d(e,id)
  {
    if (e.keyCode==13)
     {
      if (validarnumero(id)==true)
       {
         var num=toFloat(id);
         document.getElementById(id).value=format(num.toFixed(3),'.',',','.');
         }
        else
       {
         //alert("Dato Invalido");
        document.getElementById(id).value='0,000';
        document.getElementById(id).focus();
        document.getElementById(id).select();
       }
     }
  } //end function


  function trim(cadena)
    {
      for(i=0; i<cadena.length; )
      {
        if(cadena.charAt(i)==" ")
          cadena=cadena.substring(i+1, cadena.length);
        else
          break;
      }

      for(i=cadena.length-1; i>=0; i=cadena.length-1)
      {
        if(cadena.charAt(i)==" ")
          cadena=cadena.substring(0,i);
        else
          break;
      }
      i=0;
      while (i <= cadena.length)
      {
          if(cadena.charAt(i)==" ")
        {
          cad1 = cadena.substring(0,i);
          cad2 = cadena.substring(i+1,cadena.length);
          cadena= cad1+cad2;
        }
        i = i + 1;
      }

      return cadena;
    }


function isDate(dateStr) {

  var datePat = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/;
  var matchArray = dateStr.match(datePat); // is the format ok?

  if (matchArray == null) {
  //alert("Please enter date as either mm/dd/yyyy or mm-dd-yyyy.");
  return false;
  }

  month = matchArray[1]; // p@rse date into variables
  day = matchArray[3];
  year = matchArray[5];

  if (month < 1 || month > 12) { // check month range
  //alert("Month must be between 1 and 12.");
  return false;
  }

  if (day < 1 || day > 31) {
  //alert("Day must be between 1 and 31.");
  return false;
  }

  if ((month==4 || month==6 || month==9 || month==11) && day==31) {
  //alert("Month "+month+" doesn`t have 31 days!")
  return false;
  }

  if (month == 2) { // check for february 29th
  var isleap = (year % 4 == 0 && (year % 100 != 0 || year % 400 == 0));
  if (day > 29 || (day==29 && !isleap)) {
  //alert("February " + year + " doesn`t have " + day + " days!");
  return false;
  }
  }
  return true; // date is valid
  }
function totalregistros(letra,posicion,filas)
  {
    var fil=0;
    var total=0;
    while (fil<filas)
    {
      var chk=letra+"_"+fil+"_"+posicion;
      if($(chk)){
        if ($(chk).value!="")
        { total=total + 1; }
      }
     fil++;
    }
    return total;
  }

  function getUrlModulo()
  {
    host = location.host;
    app=location.pathname;
    apparray=app.split('/');

    return 'http://'+host+'/'+apparray[1]+'/'+apparray[2]+'/';
  }

  function getUrlModuloAjax()
  {
     return getUrlModulo()+"ajax"
  }

  function obtenerColumnaSiguiente(id){
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var colotro= col+1;
    var otros=name+"_"+fil+"_"+colotro;

   return otros;
  }

  function obtenerColumnaAnterior(id){
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var colotro= col-1;
    var otros=name+"_"+fil+"_"+colotro;

   return otros;
  }

  function obtenerColumna(id,valor,signo){
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    if (signo=='-') var colotro= col-valor;
    else if (signo=='+') var colotro= col+valor;
    else var colotro= col;

    var otros=name+"_"+fil+"_"+colotro;
    return otros;
  }

 function toFloat2(val)
  {
    var elnum = 0.00;

    if(ValidarNumeroV2Float2(val))
    elnum = parseFloat(val);
    else
    if(ValidarNumeroV2VE2(val))
      elnum = FloatVEtoFloat(val);
    else
      elnum = 0.00;

  return elnum;
  } //end function

  function ValidarNumeroV2Float2(val)
  {
    if(val.match(expresionfloat_1) || val.match(expresionfloat_2) || val.match(expresionfloat_3) || val.match(expresionfloat_4) || val.match(expresionfloat)) return true;
    else return false;
  }

  function ValidarNumeroV2VE2(val)
  {

    if(val.match(expresionfloatVE) || val.match(expresionfloatVE_1) || val.match(expresionfloatVE_2) || val.match(expresionfloatVE_3) || val.match(expresionfloatVE_4)) return true;
    else return false;
  }

/*
*  provide JJSG
*  Trae el numero de filas de un grip
*  solo hay que pasarle esta funcion
*  var filas=obtener_filas_grid('a','3');
*  el resultado es el numero de filas de un grip
*/

 function obtener_filas_grid(name_grid,numcolumn)
 {
  f=0;
  var grid=name_grid+"x_";
  var columna="_"+numcolumn;
  while (f < 500)
  {
    var campo=grid+f+columna;
    if(!$(campo))
    break;
    f++;
  }
  return f;
 }

 /*
 *provide JJSG
 *Trabaja como cualquier trim
 *
 */
 function trim(cadena)
 {
  for(i=0; i<cadena.length; )
  {
    if(cadena.charAt(i)==" ")
      cadena=cadena.substring(i+1, cadena.length);
    else
      break;
  }

  for(i=cadena.length-1; i>=0; i=cadena.length-1)
  {
    if(cadena.charAt(i)==" ")
      cadena=cadena.substring(0,i);
    else
      break;
  }

  return cadena;
 }

 /*
 *provide JJSG
 *Ordena un arreglo de menor a mayor
 *
 */
 function ordenar_arreglo(arreglo)
 {
  arreglo.sort(compareNum);
  return arreglo;
 }


 /*
 *provide JJSG
 *Compara dos numero y retorna un valor
 *utilizada para el ordenar_arreglo
 */

 function compareNum(a,b)
 {
    return a-b;
 }


  function Validar_fecha(fecha)
  {
    // provide jjsg
    var validacion_fecha=false;
    var long = fecha.length;
  if (long==10)
  {
    dia=fecha.substr(0,2);
    long = dia.length;
    if ((IsNumeric(dia)==true) && (dia<=31) && (dia!="00") && (long==2))
    {
      mes=fecha.substr(3,2);
      long = mes.length;
      if ((IsNumeric(mes)==true) && (mes<=12) && (mes!="00")  && (long==2))
      {
        ano=fecha.substr(6,4);
        long = ano.length;
        if ((IsNumeric(ano)==true)  && (ano<10000)  && (long==4))
          validacion_fecha=true;
        else
          alert('A�o mal escrito');
      }
      else
        alert('Mes mal escrito');
    }
    else
      alert('D�a mal escrito');
  }
  return validacion_fecha;
  }

///FUNCIONES QUE USA EL CIDESA GENERATOR NO BORRAR

  function formatoDecimal(e,id)
  {
    if (e.keyCode==13  || e.keyCode==9)
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
    }

  }


   function validaEntero(e){
     evt = e ? e : event;
     tcl = (window.Event) ? evt.which : evt.keyCode;
     if((tcl>=48 && tcl<=57) || (tcl==8) || (tcl==9) || (tcl==13) || (tcl==0)) {
       return true;
       }
     else return false;
  }

   function validaDecimal(e){
     evt = e ? e : event;
     tcl = (window.Event) ? evt.which : evt.keyCode;
     if((tcl>=48 && tcl<=57) || (tcl==8) || (tcl==9) || (tcl==13) || (tcl==46) || (tcl==44) || (tcl==0)) {
       return true;
       }
     else return false;
  }

  //////////////////////


  //PARA USAR ACENTOS EN LOS ALERT O LOS CONFIRM !!! BEATRIZ
  function acentos(x) {

  x = x.replace(/�/g,"\xA1");	x = x.replace(/&iexcl;/g,"\xA1")
  x = x.replace(/�/g,"\xBF");	x = x.replace(/&iquest;/g,"\xBF")
  x = x.replace(/�/g,"\xC0");	x = x.replace(/&Agrave;/g,"\xC0")
  x = x.replace(/�/g,"\xE0");	x = x.replace(/&agrave;/g,"\xE0")
  x = x.replace(/�/g,"\xC1");	x = x.replace(/&Aacute;/g,"\xC1")
  x = x.replace(/�/g,"\xE1");	x = x.replace(/&aacute;/g,"\xE1")
  x = x.replace(/�/g,"\xC2");	x = x.replace(/&Acirc;/g,"\xC2")
  x = x.replace(/�/g,"\xE2");	x = x.replace(/&acirc;/g,"\xE2")
  x = x.replace(/�/g,"\xC3");	x = x.replace(/&Atilde;/g,"\xC3")
  x = x.replace(/�/g,"\xE3");	x = x.replace(/&atilde;/g,"\xE3")
  x = x.replace(/�/g,"\xC4");	x = x.replace(/&Auml;/g,"\xC4")
  x = x.replace(/�/g,"\xE4");	x = x.replace(/&auml;/g,"\xE4")
  x = x.replace(/�/g,"\xC5");	x = x.replace(/&Aring;/g,"\xC5")
  x = x.replace(/�/g,"\xE5");	x = x.replace(/&aring;/g,"\xE5")
  x = x.replace(/�/g,"\xC6");	x = x.replace(/&AElig;/g,"\xC6")
  x = x.replace(/�/g,"\xE6");	x = x.replace(/&aelig;/g,"\xE6")
  x = x.replace(/�/g,"\xC7");	x = x.replace(/&Ccedil;/g,"\xC7")
  x = x.replace(/�/g,"\xE7");	x = x.replace(/&ccedil;/g,"\xE7")
  x = x.replace(/�/g,"\xC8");	x = x.replace(/&Egrave;/g,"\xC8")
  x = x.replace(/�/g,"\xE8");	x = x.replace(/&egrave;/g,"\xE8")
  x = x.replace(/�/g,"\xC9");	x = x.replace(/&Eacute;/g,"\xC9")
  x = x.replace(/�/g,"\xE9");	x = x.replace(/&eacute;/g,"\xE9")
  x = x.replace(/�/g,"\xCA");	x = x.replace(/&Ecirc;/g,"\xCA")
  x = x.replace(/�/g,"\xEA");	x = x.replace(/&ecirc;/g,"\xEA")
  x = x.replace(/�/g,"\xCB");	x = x.replace(/&Euml;/g,"\xCB")
  x = x.replace(/�/g,"\xEB");	x = x.replace(/&euml;/g,"\xEB")
  x = x.replace(/�/g,"\xCC");	x = x.replace(/&Igrave;/g,"\xCC")
  x = x.replace(/�/g,"\xEC");	x = x.replace(/&igrave;/g,"\xEC")
  x = x.replace(/�/g,"\xCD");	x = x.replace(/&Iacute;/g,"\xCD")
  x = x.replace(/�/g,"\xED");	x = x.replace(/&iacute;/g,"\xED")
  x = x.replace(/�/g,"\xCE");	x = x.replace(/&Icirc;/g,"\xCE")
  x = x.replace(/�/g,"\xEE");	x = x.replace(/&icirc;/g,"\xEE")
  x = x.replace(/�/g,"\xCF");	x = x.replace(/&Iuml;/g,"\xCF")
  x = x.replace(/�/g,"\xEF");	x = x.replace(/&iuml;/g,"\xEF")
  x = x.replace(/�/g,"\xD1");	x = x.replace(/&Ntilde;/g,"\xD1")
  x = x.replace(/�/g,"\xF1");	x = x.replace(/&ntilde;/g,"\xF1")
  x = x.replace(/�/g,"\xD2");	x = x.replace(/&Ograve;/g,"\xD2")
  x = x.replace(/�/g,"\xF2");	x = x.replace(/&ograve;/g,"\xF2")
  x = x.replace(/�/g,"\xD3");	x = x.replace(/&Oacute;/g,"\xD3")
  x = x.replace(/�/g,"\xF3");	x = x.replace(/&oacute;/g,"\xF3")
  x = x.replace(/�/g,"\xD4");	x = x.replace(/&Ocirc;/g,"\xD4")
  x = x.replace(/�/g,"\xF4");	x = x.replace(/&ocirc;/g,"\xF4")
  x = x.replace(/�/g,"\xD5");	x = x.replace(/&Otilde;/g,"\xD5")
  x = x.replace(/�/g,"\xF5");	x = x.replace(/&otilde;/g,"\xF5")
  x = x.replace(/�/g,"\xD6");	x = x.replace(/&Ouml;/g,"\xD6")
  x = x.replace(/�/g,"\xF6");	x = x.replace(/&ouml;/g,"\xF6")
  x = x.replace(/�/g,"\xD8");	x = x.replace(/&Oslash;/g,"\xD8")
  x = x.replace(/�/g,"\xF8");	x = x.replace(/&oslash;/g,"\xF8")
  x = x.replace(/�/g,"\xD9");	x = x.replace(/&Ugrave;/g,"\xD9")
  x = x.replace(/�/g,"\xF9");	x = x.replace(/&ugrave;/g,"\xF9")
  x = x.replace(/�/g,"\xDA");	x = x.replace(/&Uacute;/g,"\xDA")
  x = x.replace(/�/g,"\xFA");	x = x.replace(/&uacute;/g,"\xFA")
  x = x.replace(/�/g,"\xDB");	x = x.replace(/&Ucirc;/g,"\xDB")
  x = x.replace(/�/g,"\xFB");	x = x.replace(/&ucirc;/g,"\xFB")
  x = x.replace(/�/g,"\xDC");	x = x.replace(/&Uuml;/g,"\xDC")
  x = x.replace(/�/g,"\xFC");	x = x.replace(/&uuml;/g,"\xFC")
  x = x.replace(/&quot;/g,'"');

  return x
}

  function alert_(x){
    alert(acentos(x));
  }

   /////////////////////////////////////////////////////////////////////////
   function disableAllObjetos_(obj,val) // Desahabilita todos los objetos menos los del arreglo
   {
     for(i=0;i<document.forms[0].elements.length;i++) document.forms[0].elements[i].disabled = val;


     for(i=0;i<obj.length;i++)
     {
       tip=obj[i].split('-');
       if (tip.length==1) //Verifico que no sea radio button
          document.getElementById(obj[i]).disabled = !val;
       else // Es un radio button, entonces se activa o desactiva segun el nro de radio button indicados
       {
          cont=parseInt(tip[1]);
          nombre=tip[0];
         for(j=0;j<cont;j++)
            eval('document.forms[0].'+nombre+'[j].disabled=!val');
       }
     }
   }

 function getCeldav2(id, pos)
  {

    celda = id.split('_');

    if(celda[0]=='popup'){  //"popup_b_0_4"

      celda[3] = parseInt(celda[3])+pos;

      c = $(celda[1]+'x_'+celda[2]+'_'+celda[3]);

      return c.value;

    }else{

      celda[1] = parseInt(celda[1])+1;

      c = $(celda[0]+'_'+celda[1]+'_'+celda[2]);

      return c.value;


    }
   }


  function compareDate2(dateA, dateB)
  {
    dateA1=new Date(dateA);
    dateB1=new Date(dateB);

    timeDifference = dateA1 - dateB1;
  //alert(timeDifference);
    if (timeDifference > 0)
        return 1;  //verdadero
    else if (timeDifference < 0)
        return -1;
    else
        return 0;  //falso
  }

    function confirm_(x){
       return  confirm(acentos(x));
      }

      function devuelveParVacios(){
      return "";
    }

     function delay(milisegundos)
  {
  for(i=0;i<=milisegundos;i++)
  {
  setTimeout('return 0',1);

  }
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

      function cambiarclasecatalogo(id)
    {
        var valant = getCeldav2(id,-1)
      if(valant=='P')
        var clase = 'cpdeftit';
      else if(valant=='I')
          var clase = 'cideftit';
      else if(valant=='C')
          var clase = 'contabb';
        else
          var clase = 'cpdefniv';


      return clase;
    }

    function quitarcatalogo(id)
    {
      var idnext = obtenerColumnaSiguiente(id);
    var idpop= idnext.replace('x','');

       if($(id).value!="C" && $(id).value!="P" && $(id).value!="I")
       {
         if($(id).value=="T")
         {
           $("popup_"+idpop).hide();
           $(idnext).readOnly=false;
           idnext2 = obtenerColumnaSiguiente(idnext);
           $(idnext2).readOnly=true;
         }else
         {
           $("popup_"+idpop).hide();
           $(idnext).readOnly=true;
           idnext2 = obtenerColumnaSiguiente(idnext);
           $(idnext2).readOnly=false;
         }
    }else
    {
      $("popup_"+idpop).show();
         $(idnext).readOnly=false;
         idnext2 = obtenerColumnaSiguiente(idnext);
         $(idnext2).readOnly=true;
    }
    }

    function readonlytool(id)
    {

      if($('id').value=='')
      {
        $(id).readOnly=false;
      }else
      {
      $(id).readOnly=true;
      }

    }


    function getScriptname() {
      return window.location.toString().split('/')[3];
    }
