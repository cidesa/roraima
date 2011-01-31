<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>

<div id="divgridcargos">
<?php echo grid_tag_v2($npcargos->getObjcar()); ?>
</div>
<script>
  function aumentosuecar(val,h)
  {
	  var totfil = obtener_filas_grid('a',1);
	  if(h==1)
	  	$('npcargos_porcentaje').value='0';
	  else 
	   	$('npcargos_cantidad').value='0,00';
	  for(i=0;i<totfil;i++)
	  {
            if ($('ax_'+i+'_4').checked==true) {
                var celda = toFloat('ax_'+i+'_3');
		//celda = celda.replace('.','');
		//celda = celda.replace(',','.');
        
		if(h==1)
		{
			//val = val.replace('.','');
			//val = val.replace(',','.');
                        var calculo= celda + toFloat2(val);
			$('ax_'+i+'_3').value=number_format(calculo,2,',','.');
		}else
		{
			if(parseInt(val))
			{
                            var valor=toFloat2(val);
                            var calculo= celda + ((celda*valor)/100);
				$('ax_'+i+'_3').value=number_format(calculo,2,',','.');
			}				
			else
			    break;	
		}
            }
	  }
  }	
	
  function mientermontootro(e,id)
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

  function MarcarTodos()
  {
	  var totfil = obtener_filas_grid('a',1);

          if ($('npcargos_todos').checked==true) {
              for(i=0;i<totfil;i++)
              {
                  $('ax_'+i+'_4').checked=true;
              }
          }else
          {
              for(i=0;i<totfil;i++)
              {
                  $('ax_'+i+'_4').checked=false;
              }
          }

  }
</script>
