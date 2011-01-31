function nivelDisponibilidad() {
	var suma=0;
	var numcat=parseInt($('fordefniv_rupcat').value);
	var numpar=parseInt($('fordefniv_ruppar').value);
	if ((numcat!='NaN')&&(numpar!='NaN')) {
		suma=numcat+numpar;
		$('fordefniv_nivdis').value=$(suma).toString();
	}
}

function validarNivel() {
	var nivel=parseInt($('fordefniv_nivdis').value);
	var suma=parseInt($('fordefniv_rupcat').value)+parseInt($('fordefniv_ruppar').value);

	if (nivel>=suma) {
		alert("El nivel de Disponibilidad debe ser menor o igual a "+suma);
		$('fordefniv_nivdis').value=$(suma).toString();
	} else {
		$('fordefniv_rupcat').readOnly=true;
		$('fordefniv_ruppar').readOnly=true;
	}
}

function validarCmbTipo(idActual) {
	name='a';
	idActual = name+"x_0_1";
	contC=0;
	contP=0;
	i=1;

	while ($(idActual)) {
		if ($F(idActual)=='C' || $F(idActual)=='P') {
			if ($F(idActual)=='C') {
				contC=contC+1;
			} else {
				contP=contP+1;
			}
		}
		idActual = name+"x_"+i+"_"+'1';
		i++;
	}
	if (contC > $('fordefniv_rupcat').value) {
		alert('No se pueden agregar mas Categorias');
  	}
  	if (contP > $('fordefniv_ruppar').value) {
  		alert('No se pueden agregar mas Partidas');
  	}
}

function actualizarFormato2(id) {
	$('fordefniv_forpre').value='';

	var totfil = objs_filas_a.size();
        alert('total'+totfil);
	var fila = true;
	var fil=0;

	if ($F(obtenerColumnaAnterior(id))!='') {
		while (fil <= totfil) {
	        var aux="ax_"+fil+"_2";
    	    if (($(aux) && ($(aux).value!=''))) {
	          var rup='';
    	      var k=1;
	          var lon=parseInt($(aux).value);

    	      while (k<=lon){
        	    rup=rup+'#';
            	k++;
	          }

    	      if($('fordefniv_forpre').value!='') {
    	      	$('fordefniv_forpre').value=$('fordefniv_forpre').value+"-"+rup;
	          }else {
	            $('fordefniv_forpre').value=rup;
	          }
    	    }else { }
    	    fil++;
     	}
    }else {
    	alert('Debe seleccionar un Tipo (Categoria/Partida)');
	}
}

function abr(e,id,fc) {
	if (e.keyCode==13) {
		idant=id.substring(0,2)+"2";
        lon=parseInt($(idant).value);
        if ($(id).value.length==lon) {
        	focos(e,fc);
        }
    } else {
    	idant=id.substring(0,2)+"2";
        lon=parseInt($(idant).value);
        if ($(id).value.length>=lon) {
        	document.getElementById(id).value=document.getElementById(id).value.substring(0,lon-1);
        }
    }
}

function cargargridper() {
	var fecini=$('fordefniv_fecini').value;
	var feccie=$('fordefniv_feccie').value;
	var numper=$('fordefniv_numper').value;

	if ((fecini!='') && (feccie!='') && (numper!='')) {
    	new Ajax.Updater('gridperiodos', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&fecini='+fecini+'&feccie='+feccie+'&numper='+numper});
	}
}

function validarFecini() {
	var fecini=$('fordefniv_fecini').value;
	var fecper=$('fordefniv_fecper').value;

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

	if (fechaini>fechaper) {
		alert_('La Fecha de Inicio debe estar dentro del Periodo');
		$('fordefniv_fecini').value='';
	}
}

function validarFeccie(){
	var fecini=$('fordefniv_fecini').value;
	var feccie=$('fordefniv_feccie').value;
	var fecper=$('fordefniv_fecper').value;

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

	array_feccie = feccie.split("/");

	var diacie=array_feccie[0];
	var mescie=(array_feccie[1]-1);
	var anocie=(array_feccie[2]);
	var fechacie = new Date(anocie,mescie,diacie);

	if (fechacie<fechaini){
		alert('La Fecha de Cierre debe ser mayor que la Fecha de Inicio');
		$('fordefniv_feccie').value='';
	}
	if (fechacie<fechaper){
		alert('La Fecha de Cierre esta fuera del Periodo');
		$('fordefniv_feccie').value='';
	}
}
