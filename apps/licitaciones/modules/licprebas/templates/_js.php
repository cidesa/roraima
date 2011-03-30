<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<script>
  if($('liprebas_codmon').value!='001')
  {
      $('divvalcam').show();
      $('divmonpreext').show();
      $('divmonpreextletras').show();      
  }else
  {
      $('divvalcam').hide();
      $('divmonpreext').hide();
      $('divmonpreextletras').hide();      
  }
  $('liprebas_valcam').readOnly=true;  
  $('trigger_liprebas_fecven').hide();  
  $('liprebas_nompre').setAttribute('size','100')
  $('divgrid_rec').hide();
  if($('liprebas_id').value=='')
    $('liprebas_codempadm').focus();
  else
    $('liprebas_numpre').readOnly=true;
  function Correl(id)
  {
      if($(id).value=='')
            $(id).value=$(id).value.pad(8,'#',0)
        else
            $(id).value=$(id).value.pad(8,'0',0);
  }

  function CalculaFecha(v)
  {
      toAjax('4',getUrlModulo()+'ajax',v,'','&fecha='+$('liprebas_fecreg').value+'&dias='+$('liprebas_dias').value);
  }

  function CalcularTotal()
  {
      var tfil = obtener_filas_grid('a',1);
      var tmonpre=0;
      var tmonpreext=0;
      for(i=0;i<tfil;i++)
      {
        monpre = $('ax_'+i+'_15').value;        
        monpreext = $('ax_'+i+'_16').value;
        if(isNaN(monpre))
        {
            monpre = monpre.replace('.','');
            monpre = monpre.replace(',','.');
            monpreext = monpreext.replace('.','');
            monpreext = monpreext.replace(',','.');
            tmonpre= parseFloat(tmonpre) + parseFloat(monpre);
            tmonpreext= parseFloat(tmonpreext) + parseFloat(monpreext);
        }
      }
      toAjax('5',getUrlModulo()+'ajax','0','','&monpre='+tmonpre+'&monpreext='+tmonpreext);
  }

  function CalculaGrid(v1,v2)
  {
      toAjaxUpdater('divgrid1','7',getUrlModulo()+'ajax',v1,'','&valmon='+v2);
  }

  function MostrarGrid(id)
  {
      var aux=id.split('_');      
      var name = aux[0];
      var fil = aux[1];
      var col = aux[2];
      var codart = $(name+'_'+fil+'_1').value;
      var codcat = $(name+'_'+fil+'_3').value;
      var subtot = $(name+'_'+fil+'_12').value;
      var idmonrec = name+'_'+fil+'_14';
      var idmontot = name+'_'+fil+'_15';
      var idcadena = name+'_'+fil+'_19';
      if(codart=='' || codcat=='' || subtot=='' || subtot=='0,00')
          alert('Debe Cargar el Articulos y la Categoria previamente');
      else
          toAjaxUpdater('divgrid_rec','8',getUrlModulo()+'ajax',id,'','&codart='+codart+'&codcat='+codcat+'&subtot='+subtot+'&idmonrec='+idmonrec+'&idcadena='+idcadena+'&idmontot='+idmontot);
  }

  function CalculaRgo(id)
  {
      var codrgo=$(id).value;
      var aux=id.split('_');
      var name = aux[0];
      var fil = aux[1];
      var col = aux[2];
      var codart = $(name+'_'+fil+'_6').value;
      var codcat = $(name+'_'+fil+'_7').value;
      var tiprgo = $(name+'_'+fil+'_4').value;
      var monrgo = $(name+'_'+fil+'_5').value;
      var subtot = $(name+'_'+fil+'_9').value
      var idcodpre = name+'_'+fil+'_8'
      var idmonto  = name+'_'+fil+'_3'

      toAjax('9',getUrlModulo()+'ajax',codrgo,'','&tiprgo='+tiprgo+'&monrgo='+monrgo+'&subtot='+subtot+'&codart='+codart+'&codcat='+codcat+'&idcodpre='+idcodpre+'&idmonto='+idmonto);
  }


  function OcultarGrid()
  {      
      var tfil = obtener_filas_grid('b',1);
      var tmonrgo = 0;
      var cadena = '';
      for(i=0;i<tfil;i++)
      {
            var codart = $('bx_'+i+'_6').value;
            var codcat = $('bx_'+i+'_7').value;
            var monto  = $('bx_'+i+'_3').value;
            var codrgo = $('bx_'+i+'_1').value;
            if(isNaN(monto))
            {
                monrgo = $('bx_'+i+'_3').value;
                monrgo = monrgo.replace('.','');
                monrgo = monrgo.replace(',','.');
                tmonrgo = parseFloat(tmonrgo) + parseFloat(monrgo);
                cadena = cadena + codart +'_'+codcat+'_'+monto+'_'+codrgo+'!';
            }
      }
      toAjax('10',getUrlModulo()+'ajax','0','','&monrgo='+tmonrgo+'&cadena='+cadena);
      $('divgrid_rec').hide();
      
  }
</script>