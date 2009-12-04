/**
 * Librer√≠as Javascript
 *
 * @package    Roraima
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */

function distribuirPeriodos()
{
  str1= $('forparing_montoing').value.toString();
  str1= str1.replace('.','');
  str1= str1.replace('.','');
  str1= str1.replace('.','');
  str1= str1.replace('.','');
  str1= str1.replace('.','');
  str1= str1.replace('.','');
  str1= str1.replace(',','.');
  var monto=parseFloat(str1);
  var MontoPeriodo = monto / 12;

  var fil=0;
  while (fil<12)
  {
    var periodo    = "ax"+"_"+fil+"_1";     //Periodo
    var montocol   = "ax"+"_"+fil+"_2";  //Monto
    var porcentaje = "ax"+"_"+fil+"_3";  //Porcentaje

    $(montocol).value = format(MontoPeriodo.toFixed(2),'.',',','.');
    var calculo       = ((MontoPeriodo*100)/monto);
	$(porcentaje).value=format(calculo.toFixed(2),'.',',','.');

    if (fil < 9){
	    $(periodo).value= "0"+(fil +1);
    }else
    {
		$(periodo).value= (fil +1);
    }
	fil++;
  }
}




function distribuirPeriodos2()
{
  str1= $('forparing_montoing').value.toString();
  str1= str1.replace('.','');
  str1= str1.replace('.','');
  str1= str1.replace('.','');
  str1= str1.replace('.','');
  str1= str1.replace('.','');
  str1= str1.replace('.','');
  str1= str1.replace(',','.');
  var monto=parseFloat(str1);

  var fil=0;
  while (fil<12)
  {
    var periodo="ax"+"_"+fil+"_1";     //Periodo
    var porcentaje="ax"+"_"+fil+"_3";  //Porcentaje
    if (fil < 9){
	    $(periodo).value= "0"+(fil +1);
    }else
    {
		$(periodo).value= (fil +1);
    }

    if (monto==0)
    {
      $(porcentaje).setAttribute('readonly','true');
    }
    fil++;
  }

  if (monto==0)
  {
    $('escero').value="S";
  }

  if ($('escero').value=='S')
  {
  	var fil=0;
    while (fil<12)
    {
     var porcentaje="ax"+"_"+fil+"_3";
    if (fil < 9){
	    $(periodo).value= "0"+(fil +1);
    }else
    {
		$(periodo).value= (fil +1);
    }


    if (monto==0)
    {
      $(porcentaje).setAttribute('readonly','true');
    }
    fil++;
    }
  }

  str2= $('suma').value.toString();
  str2= str2.replace('.','') ;
  str2= str2.replace('.','') ;
  str2= str2.replace('.','') ;
  str2= str2.replace('.','') ;
  str2= str2.replace('.','') ;
  str2= str2.replace('.','') ;
  str2= str2.replace(',','.');
  var totmonto=parseFloat(str2);

  str3= $('forparing_montoing').value.toString();
  str3= str3.replace('.','') ;
  str3= str3.replace('.','') ;
  str3= str3.replace('.','') ;
  str3= str3.replace('.','') ;
  str3= str3.replace('.','') ;
  str3= str3.replace('.','') ;
  str3= str3.replace(',','.');
  var montoing=parseFloat(str3);

  if ($('escero').value=='S' && totmonto>0)
  {
    MontoPeriodo = monto / 12;
  	var fil=0;
    while (fil<12)
    {
     var porcentaje="ax"+"_"+fil+"_3";    //porcentaje
     var montos="ax"+"_"+fil+"_2";       //monto

     str4= $(montos).value.toString();
     str4= str4.replace('.','') ;
     str4= str4.replace('.','') ;
     str4= str4.replace('.','') ;
     str4= str4.replace('.','') ;
     str4= str4.replace('.','') ;
     str4= str4.replace('.','') ;
     str4= str4.replace(',','.');
     var montocol=parseFloat(str4);


	 $(montocol).value=format(MontoPeriodo.toFixed(2),'.',',','.');
    fil++;
    }
    actualizarsaldos();
  }
}

 function monto2(id)
 {
      var aux = id.split("_");
      var name=aux[0];
      var fil=aux[1];
      var col=parseInt(aux[2]);

      var colum=col+1;
      var porcen=name+"_"+fil+"_"+colum;

      str1= $('forparing_montoing').value.toString();
       str1= str1.replace('.','') ;
       str1= str1.replace('.','') ;
       str1= str1.replace('.','') ;
       str1= str1.replace('.','') ;
       str1= str1.replace('.','') ;
       str1= str1.replace('.','') ;
       str1= str1.replace(',','.');
       var montosreal=parseFloat(str1);

       str2= $(id).value.toString();
       str2= str2.replace('.','') ;
       str2= str2.replace('.','') ;
       str2= str2.replace('.','') ;
       str2= str2.replace('.','') ;
       str2= str2.replace('.','') ;
       str2= str2.replace('.','') ;
       str2= str2.replace(',','.');
       var monto2=parseFloat(str2);


     str3= $(porcen).value.toString();
     str3= str3.replace('.','') ;
     str3= str3.replace('.','') ;
     str3= str3.replace('.','') ;
     str3= str3.replace('.','') ;
     str3= str3.replace('.','') ;
     str3= str3.replace('.','') ;
     str3= str3.replace(',','.');
     var montopor=parseFloat(str3);

	   var mm = (monto2 * 100 / montosreal);
	  $(porcen).value = format(mm.toFixed(2),'.',',','.');

  	var fil   = 0;
  	var total = 0;
    while (fil<12)
    {
     var porcentaje="ax"+"_"+fil+"_3";    //porcentaje
     var montos="ax"+"_"+fil+"_2";       //monto

     str4= $(montos).value.toString();
     str4= str4.replace('.','') ;
     str4= str4.replace('.','') ;
     str4= str4.replace('.','') ;
     str4= str4.replace('.','') ;
     str4= str4.replace('.','') ;
     str4= str4.replace('.','') ;
     str4= str4.replace(',','.');
     var montocol=parseFloat(str4);

	 total = total + montocol;

     fil++;
    }

    if (total > montosreal)
    {
    	alert('El Monto del Periodo no puede exceder el Presupuesto de AÒo');
	   	$(porcen).value="0,00";
	   	$(id).value="0,00";
	   	actualizarsaldos();
	   	$(id).focus();
    }
 }


 function monto(e,id)
 {
   if (e.keyCode==13)
   {
     var aux = id.split("_");
     var name=aux[0];
     var fil=aux[1];
     var col=parseInt(aux[2]);

     var colum=col+1;
     var porcen=name+"_"+fil+"_"+colum;

     if (!validarnumero(id))
     {
       alert('Monto Invalido');
       $(id).value="0,00";
     }
     else
     {
       str1= $('forparing_montoing').value.toString();
       str1= str1.replace('.','') ;
       str1= str1.replace('.','') ;
       str1= str1.replace('.','') ;
       str1= str1.replace('.','') ;
       str1= str1.replace('.','') ;
       str1= str1.replace('.','') ;
       str1= str1.replace(',','.');
       var montos=parseFloat(str1);

       str2= $(id).value.toString();
       str2= str2.replace('.','') ;
       str2= str2.replace('.','') ;
       str2= str2.replace('.','') ;
       str2= str2.replace('.','') ;
       str2= str2.replace('.','') ;
       str2= str2.replace('.','') ;
       str2= str2.replace(',','.');
       var monto2=parseFloat(str2);

       if ($('escero').value=='')
       {
       if (montos >0)
       {
         var cal=((monto2*100)/montos);
         $(porcen).value=format(cal.toFixed(2),'.',',','.');
       }
       }
       actualizarsaldos();
       if ($('escero').value=="S")
       {
         $('forparing_montoing').value=$('suma').value;
       }

     }


   str4= $('suma').value.toString();
   str4= str4.replace('.','') ;
   str4= str4.replace('.','') ;
   str4= str4.replace('.','') ;
   str4= str4.replace('.','') ;
   str4= str4.replace('.','') ;
   str4= str4.replace('.','') ;
   str4= str4.replace(',','.');
   var monto4=parseFloat(str4);


   str5= $('forparing_montoing').value.toString();
   str5= str1.replace('.','') ;
   str5= str1.replace('.','') ;
   str5= str1.replace('.','') ;
   str5= str1.replace('.','') ;
   str5= str1.replace('.','') ;
   str5= str1.replace('.','') ;
   str5= str1.replace(',','.');
   var monto=parseFloat(str5);

   if ($('escero').value=='')
   {
   if (monto4 > monto)
   {
   	 alert('El Monto del PerÔøΩodo no puede exceder el Presupuesto de AÒo');
   	 $(id).value="0,00";
   	 $(porcen).value="0,00";
   	 actualizarsaldos();
   }
   }

   str3= $('suma2').value.toString();
   str3= str3.replace('.','') ;
   str3= str3.replace('.','') ;
   str3= str3.replace('.','') ;
   str3= str3.replace('.','') ;
   str3= str3.replace('.','') ;
   str3= str3.replace('.','') ;
   str3= str3.replace(',','.');
   var monto3=parseFloat(str3);

   if ($('escero').value=='')
   {
   if (monto3 > 100)
   {
   	 alert('El Porcentaje no puede exceder el 100%');
   	 $(id).value="0,00";
   	 $(porcen).value="0,00";
   	 actualizarsaldos();
   }
   }
  }
}

 function porcentaje(e,id)
 {
   if (e.keyCode==13)
   {
     var aux = id.split("_");
     var name=aux[0];
     var fil=aux[1];
     var col=parseInt(aux[2]);

     var colum=col-1;
     var mont=name+"_"+fil+"_"+colum;

     if (!validarnumero(id))
     {
       alert('Monto Invalido');
       $(id).value="0,00";
     }
     else
     {
       str1= $('forparing_montoing').value.toString();
       str1= str1.replace('.','') ;
       str1= str1.replace('.','') ;
       str1= str1.replace('.','') ;
       str1= str1.replace('.','') ;
       str1= str1.replace('.','') ;
       str1= str1.replace('.','') ;
       str1= str1.replace(',','.');
       var montoing=parseFloat(str1);

       str2= $(id).value.toString();
       str2= str2.replace('.','') ;
       str2= str2.replace('.','') ;
       str2= str2.replace('.','') ;
       str2= str2.replace('.','') ;
       str2= str2.replace('.','') ;
       str2= str2.replace('.','') ;
       str2= str2.replace(',','.');
       var monto2=parseFloat(str2);

       str1= $(mont).value.toString();
       str1= str1.replace('.','') ;
       str1= str1.replace('.','') ;
       str1= str1.replace('.','') ;
       str1= str1.replace('.','') ;
       str1= str1.replace('.','') ;
       str1= str1.replace('.','') ;
       str1= str1.replace(',','.');
       var monto3=parseFloat(str1);

       if ($('escero').value=='')
       {
       	/* if (monto3 >0)
       	 {*/
          var cal=(montoing*(monto2/100));
          $(mont).value=format(cal.toFixed(2),'.',',','.');
       	// }
       }
       else
       {
       	alert('Los Porcentajes se Calcularan al Final.');
       }

       actualizarsaldos();
     }

   str3= $('suma2').value.toString();
   str3= str3.replace('.','') ;
   str3= str3.replace('.','') ;
   str3= str3.replace('.','') ;
   str3= str3.replace('.','') ;
   str3= str3.replace('.','') ;
   str3= str3.replace('.','') ;
   str3= str3.replace(',','.');
   var monto3=parseFloat(str3);

   if ($('escero').value=='')
   {
   if (monto3 > 100)
   {
   	 alert('El Porcentaje no puede exceder el 100%');
   	 $(id).value="0,00";
   	 $(mont).value="0,00";
   	 actualizarsaldos();
   }
   }

   str4= $('suma').value.toString();
   str4= str4.replace('.','') ;
   str4= str4.replace('.','') ;
   str4= str4.replace('.','') ;
   str4= str4.replace('.','') ;
   str4= str4.replace('.','') ;
   str4= str4.replace('.','') ;
   str4= str4.replace(',','.');
   var monto4=parseFloat(str4);

   if ($('escero').value=='')
   {
   if (monto4 > monto)
   {
   	 alert('El Monto del Periodo no puede exceder el Presupuesto de AÒo');
   	 $(id).value="0,00";
   	 $(monto).value="0,00";
   	 actualizarsaldos();
   }
   }
  }
}



 function Calculo(id)
 {
      var aux = id.split("_");
      var name=aux[0];
      var fil=aux[1];
      var col=parseInt(aux[2]);

      var colum=col;
      var cajatxt=name+"_"+fil+"_"+colum;

      str1= $('forparing_montoing').value.toString();
       str1= str1.replace('.','') ;
       str1= str1.replace('.','') ;
       str1= str1.replace('.','') ;
       str1= str1.replace('.','') ;
       str1= str1.replace('.','') ;
       str1= str1.replace('.','') ;
       str1= str1.replace(',','.');
       var montosreal=parseFloat(str1);

       str2= $(id).value.toString();
       str2= str2.replace('.','') ;
       str2= str2.replace('.','') ;
       str2= str2.replace('.','') ;
       str2= str2.replace('.','') ;
       str2= str2.replace('.','') ;
       str2= str2.replace('.','') ;
       str2= str2.replace(',','.');
       var monto2=parseFloat(str2);

  	var fil   = 0;
  	var total = 0;
	  var cajatxt2="bx"+"_0_3";       //monto
  	if (monto2 > montosreal){
  		alert('El Monto del Periodo no puede exceder el Presupuesto de AÒo'); $(id).value="0,00"; $(id).focus();

  	}else{
	    while ($(cajatxt2))
	    {
//	    alert($(cajatxt).value.toString());
	     str4= $(cajatxt2).value.toString();
	     str4= str4.replace('.','') ;
	     str4= str4.replace('.','') ;
	     str4= str4.replace('.','') ;
	     str4= str4.replace('.','') ;
	     str4= str4.replace('.','') ;
	     str4= str4.replace('.','') ;
	     str4= str4.replace(',','.');
	     var montocol=parseFloat(str4);

	     fil = fil + 1;
	     var cajatxt2="bx"+"_"+fil+"_3";       //monto

		 total = total + montocol;

	    }

	    if (total > montosreal)
	    {
	    	alert('El Monto del Periodo no puede exceder el Presupuesto de AÒo');
		   	$(id).value="0,00";
	//	   	actualizarsaldos();
		   	$(id).focus();
	    }else{
		    $(cajatxt).value=format(monto2.toFixed(2),'.',',','.');
	    }
		}
 }


