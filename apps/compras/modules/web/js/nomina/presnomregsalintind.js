function calculartotal(e,id)
{
if (e.keyCode==13 || e.keyCode==9)
{
	var aux = id.split("_");
	var name=aux[0];
	var fil=aux[1];

	//sumar los montos de todas las columnas de asignaciones, estas columnas son dinámicas , por lo tanto tengo que sumar mientras la columna exista
	var col=3;
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
