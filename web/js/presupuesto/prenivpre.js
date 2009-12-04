function nivelDisponibilidad() {
	var suma=0;
	var numcat=parseInt($('cpdefniv_rupcat').value);
	var numpar=parseInt($('cpdefniv_ruppar').value);
	if ((numcat!='NaN')&&(numpar!='NaN')) {
		suma=numcat+numpar;
		$('cpdefniv_nivdis').value=$(suma).toString();
	}
}

function validarNivel() {
	var nivel=parseInt($('cpdefniv_nivdis').value);
	var suma=parseInt($('cpdefniv_rupcat').value)+parseInt($('cpdefniv_ruppar').value);

	if (nivel>=suma) {
		alert("El nivel de Disponibilidad debe ser menor o igual a "+suma);
		$('cpdefniv_nivdis').value=$(suma).toString();
	} else {
		$('cpdefniv_rupcat').readOnly=true;
		$('cpdefniv_ruppar').readOnly=true;
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
	if (contC > $('cpdefniv_rupcat').value) {
		alert('No se pueden agregar mas Categorias');
  	}
  	if (contP > $('cpdefniv_ruppar').value) {
  		alert('No se pueden agregar mas Partidas');
  	}
}

function actualizarFormato(id) {
	$('cpdefniv_forpre').value='';

	var totfil = objs_filas_a.size();
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

    	      if($('cpdefniv_forpre').value!='') {
    	      	$('cpdefniv_forpre').value=$('cpdefniv_forpre').value+"-"+rup;
	          }else {
	            $('cpdefniv_forpre').value=rup;
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
	var fecini=$('cpdefniv_fecini').value;
	var feccie=$('cpdefniv_feccie').value;
	var numper=$('cpdefniv_numper').value;

	if ((fecini!='') && (feccie!='') && (numper!='')) {
    	new Ajax.Updater('gridperiodos', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&fecini='+fecini+'&feccie='+feccie+'&numper='+numper});
	}
}

function validarFecini() {
	var fecini=$('cpdefniv_fecini').value;
	var fecper=$('cpdefniv_fecper').value;

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
		$('cpdefniv_fecini').value='';
	}
}

function validarFeccie(){
	var fecini=$('cpdefniv_fecini').value;
	var feccie=$('cpdefniv_feccie').value;
	var fecper=$('cpdefniv_fecper').value;

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
		$('cpdefniv_feccie').value='';
	}
	if (fechacie<fechaper){
		alert('La Fecha de Cierre esta fuera del Periodo');
		$('cpdefniv_feccie').value='';
	}
}
