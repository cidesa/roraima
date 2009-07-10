function actualizarformato(id)    //Actualiza el formato de los niveles presupuestarios
{
   $('catnivcat_forcodcat').value='';

   var totfil = objs_filas_a.size();
   var fila = true;
   var fil=0;
   if (($F(obtenerColumnaAnterior(id))!=''))
   {
     //while (fila==true)
     while (fil <= totfil)
     {
        var aux="ax_"+fil+"_2";
        if (($(aux) && ($(aux).value!='')))
        {
          var rup='';
          var k=1;
          var lon=parseInt($(aux).value);

          while (k<=lon){
            rup=rup+'#';
            k++;
          }

          if($('catnivcat_forcodcat').value!=''){
            $('catnivcat_forcodcat').value=$('catnivcat_forcodcat').value+"-"+rup;

          }else{
            $('catnivcat_forcodcat').value=rup;
          }
       }else{
        //  fila=false;
        }
     fil++;
     }
  }else{

  	if  ($(id).value!=''){
	    alert('Debe seleccionar un Tipo');
	  	$(id).value = '';
  	}
  }
 }