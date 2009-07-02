
function actualizarformato(id)//Actualiza el formato de los niveles presupuestarios
{
   $('cidefniv_forpre').value='';
   var totfil = objs_filas_a.size();
  // alert(totfil);
   var fila = true;
   var fil=0;
   if ($F(obtenerColumnaAnterior(id))!='')
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

          if($('cidefniv_forpre').value!=''){
            $('cidefniv_forpre').value=$('cidefniv_forpre').value+"-"+rup;

          }else{
            $('cidefniv_forpre').value=rup;
          }
        }else{
          //fila=false;
        }
     fil++;
     }
  }else{
    alert('Debe seleccionar un Tipo (Categoria/Partida)');
  }
 }



 function cargargridper(){

 var fecha=$('cidefniv_fecini').value;
 var numper=$('cidefniv_numper').value;
 var fecfinal=$('cidefniv_feccie').value;

  if ((fecha!='') && (numper!='') && (fecfinal!='')){
     new Ajax.Updater('gridperiodos', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&fecha='+fecha+'&numper='+numper+'&fecfinal='+fecfinal});
   }


 }

 function niveldisponibilidad(){

 var suma=0;
 var numcat=parseInt($('cidefniv_rupcat').value);
 var numpar=parseInt($('cidefniv_ruppar').value);
 suma=numcat+numpar;
 $('cidefniv_nivdis').value=$(suma).toString();

 }

 function validarfecini(){

 var fecini=$('cidefniv_fecini').value;
 var fecper=$('cidefniv_fecper').value;


 array_fecini = fecini.split("/");

 var diaini=array_fecini[0];
 var mesini=(array_fecini[1]-1);
 var anoini=(array_fecini[2]);
 var fechaini = new Date(anoini,mesini,diaini);

  array_fecper = fecper.split("/");

 var diaper=array_fecper[0];
 var mesper=(array_fecper[1]-1);
 var anoper=(array_fecper[2]);
 var fechaper = new Date(anoper,mesper,diaper);

 if (fechaini>fechaper){
   alert_('La Fecha de Inicio debe estar dentro del Periodo');
   $('cidefniv_fecini').value='';
 }

 }

 function validarfeccie(){

 var fecini=$('cidefniv_fecini').value;
 var feccie=$('cidefniv_feccie').value;
  var fecper=$('cidefniv_fecper').value;

 array_fecini = fecini.split("/");

 var diaini=array_fecini[0];
 var mesini=(array_fecini[1]-1);
 var anoini=(array_fecini[2]);
 var fechaini = new Date(anoini,mesini,diaini);

  array_fecper = fecper.split("/");

 var diaper=array_fecper[0];
 var mesper=(array_fecper[1]-1);
 var anoper=(array_fecper[2]);
 var fechaper = new Date(anoper,mesper,diaper);

   array_feccie = feccie.split("/")

var diacie=array_feccie[0];
var mescie=(array_feccie[1]-1);
var anocie=(array_feccie[2]);
var fechacie = new Date(anocie,mescie,diacie);


 if (fechacie<fechaini){
   alert('La Fecha de Cierre debe ser mayor que la Fecha de Inicio');
   $('cidefniv_feccie').value='';
 }

  if (fechacie>fechaper){
   alert('La Fecha de Cierre esta fuera del Periodo');
   $('cidefniv_feccie').value='';
  }

 }

 function validarcatpar()//Valida el numero de partidas y categorias
 {

   var am=totalregistros('ax',1,16);
   var fil=0;
   var conpar=0;
   var concat=0;

   while (fil<am)
   {
    var id="ax_"+fil+"_1";
  var val=$(id).value;

  if ($(id).value!='Seleccione'){

    if ($(id).value=='C')
    {
       concat=concat+1;
    }

    if ($(id).value=='P'){

       conpar=conpar+1;
    }

  }
   fil++;
   }

  if (concat>$('cidefniv_rupcat').value){
    alert_('El N&uacute;mero de Rupturas para la Categor&iacute;a ya est&aacute; satisfecho');
    var fila=concat-1+conpar;
    id="ax_"+fila+"_1";
    $(id).value='';
  }

  if (conpar>$('cidefniv_ruppar').value)
  {
    alert_('El N&uacute;mero de Rupturas para la Partida ya est&aacute; satisfecho');
    var fila=conpar-1+concat;
    id="ax_"+fila+"_1";
    $(id).value='';

  }

 }




