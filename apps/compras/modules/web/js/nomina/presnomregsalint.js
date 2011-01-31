function calculartotal(e,id)
{
if (e.keyCode==13 || e.keyCode==9)
{
	var aux = id.split("_");
	var name=aux[0];
	var fil=aux[1];

	//sumar los montos de todas las columnas de asignaciones, estas columnas son dinámicas , por lo tanto tengo que sumar mientras la columna exista
	var col=4;
	var totalasignaciones=0;
	var seguir=true;
    while (col<100 && seguir)
    {
	 var colasig=col;
	 var nomcajasi=name+"_"+fil+"_"+colasig;
	 if ($(nomcajasi))
	 {
	 	 var valcajasi=toFloat(nomcajasi);
    	 totalasignaciones=totalasignaciones+valcajasi;
    	 col++;
      }
      else
         seguir=false;
    }
     //busco la ultima columas que es la del total
     col=col-1;
     var nomtotasi=name+"_"+fil+"_"+col;
	 if ($(nomtotasi))
	 {
	 	var valtotasi=toFloat(nomtotasi);
		totalasignaciones=totalasignaciones-valtotasi;
	 }


	 //FORMAT(PUNTO,COMA,PUNTO)
	 $(nomtotasi).value=format(totalasignaciones.toFixed(2),'.',',','.');
	 var valact=toFloat(id);
	 $(id).value=format(valact.toFixed(2),'.',',','.');

 }
}
 function totvacaciones()
 {
   var cm = obtener_filas_grid('c',1);
   var fil=0;
   var acuval = 0;
   while (fil<cm)
   {
     var  ida = 'cx_'+fil+'_6';
     var  val = $(ida).value;
 	 if($(ida))
	 {
	   var num1=toFloat(ida);
  	   acuval = acuval + num1;
	 }
	 fil++;
   }
   $('total_vac').value = number_format(acuval,2,',','.');
 }

 function totasignaciones()
 {
   var cm = obtener_filas_grid('a',1);
   var fil=0;
   var acuval = 0;
   while (fil<cm)
   {
     var  ida = 'ax_'+fil+'_2';
     var  val = $(ida).value;
 	 if($(ida))
	 {
	   var num1=toFloat(ida);
  	   acuval = acuval + num1;
	 }
	 fil++;
   }
   $('total_asi').value = number_format(acuval,2,',','.');
 }

  function totdeducciones()
 {
   var cm = obtener_filas_grid('b',1);
   var fil=0;
   var acuval = 0;
   while (fil<cm)
   {
     var  ida = 'bx_'+fil+'_2';
     var  val = $(ida).value;
 	 if($(ida))
	 {
	   var num1=toFloat(ida);
  	   acuval = acuval + num1;
	 }
	 fil++;
   }
   $('total_ded').value = number_format(acuval,2,',','.');
 }


