<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<script>
  $('trigger_liregofe_fecven').hide();
  $('liregofe_desnumexp').hide();
  function Correl(id)
  {
      if($(id).value=='')
            $(id).value=$(id).value.pad(8,'#',0)
        else
            $(id).value=$(id).value.pad(8,'0',0);
  }
  function CalculaFecha(v)
  {
      toAjax('6',getUrlModulo()+'ajax',v,'','&fecha='+$('liregofe_fecreg').value+'&dias='+$('liregofe_dias').value);
  }
  function CalculaTotal(id)
  {
    var aux = id.split('_');
    var cantid = $('ax_'+aux[1]+'_4').value;
    var preuni = $('ax_'+aux[1]+'_5').value;
    var monrec = $('ax_'+aux[1]+'_6').value;
    var idsubtot = 'ax_'+aux[1]+'_7';
    var tmonofe = 0;

    cantid = cantid.replace('.','');
    cantid = cantid.replace(',','.');

    monrec = monrec.replace('.','');
    monrec = monrec.replace(',','.');

    preuni = preuni.replace('.','');
    preuni = preuni.replace(',','.');

    $(idsubtot).value = number_format((parseFloat(cantid)*parseFloat(preuni))+parseFloat(monrec),'2',',','.');

    var tfil = obtener_filas_grid('a',1);
    for(i=0;i<tfil;i++)
    {
        monofe = $('ax_'+i+'_7').value;
        monofe = monofe.replace('.','');
        monofe = monofe.replace(',','.');        
        tmonofe= parseFloat(tmonofe) + parseFloat(monofe);
    }
    $('liregofe_monofe').value=number_format(tmonofe,'2',',','.');
  }

  function CalculaRecargo(id)
  {
      var aux = id.split('_');
      var idmonrgo = 'bx_'+aux[1]+'_3';
      var tiprgo = $('bx_'+aux[1]+'_4').value;
      var monto = $('bx_'+aux[1]+'_5').value;
      var monofe = $('liregofe_monofe').value;
      var tmonrecofe = 0;

      monto = monto.replace('.','');
      monto = monto.replace(',','.');

      monofe = monofe.replace('.','');
      monofe = monofe.replace(',','.');

      if(tiprgo=='P')
        $(idmonrgo).value = number_format((parseFloat(monto)*parseFloat(monofe)/100),'2',',','.');
      else
        $(idmonrgo).value = number_format((parseFloat(monto)+parseFloat(monofe)),'2',',','.');

      var tfil = obtener_filas_grid('b',1);
      for(i=0;i<tfil;i++)
      {
        monrecofe = $('bx_'+i+'_3').value;
        if(isNaN(monrecofe))
        {
            monrecofe = monrecofe.replace('.','');
            monrecofe = monrecofe.replace(',','.');
            tmonrecofe= parseFloat(tmonrecofe) + parseFloat(monrecofe);
        }
      }

      $('liregofe_monrecofe').value=number_format(tmonrecofe,'2',',','.');
  }

</script>