function activaSaldoActual() {
	var idActual = 'ax_0_2';
	var seleccion =  $('cpasiini_asiper').value;
	i=1;

	if (seleccion=='S') {
		$('cpasiini_monasi').readOnly=true;
		while ($(idActual)) {
			$(idActual).readOnly=false;
			idActual = "ax_"+i+"_"+'2';
			i++;
		}
	} else {
		if (seleccion=='N') {
			$('cpasiini_monasi').readOnly=false;
			while ($(idActual)) {
				$(idActual).readOnly=true;
				idActual = "ax_"+i+"_"+'2';
				i++;
			}
		} else {
			if (seleccion=='') {
				$('cpasiini_monasi').readOnly=true;
				while ($(idActual)) {
					$(idActual).readOnly=true;
					idActual = "ax_"+i+"_"+'2';
					i++;
				}
			}
		}
	}
}

function generarMonasig() {
	idActual = 'ax_0_2'; i=1;
    while ($(idActual)) {
	  idActual = "ax_"+i+"_"+'2';
  	  i++;
	}

	var monto = $('cpasiini_monasi').value;
	var pereje=i-1;
    var montoPeriodo=monto/pereje;

    j=0;
    while (j<pereje) {
    	idActual = "ax_"+j+"_"+'2';
    	$(idActual).value=format(montoPeriodo.toFixed(2),'.',',','.');
        j++;
    }
}