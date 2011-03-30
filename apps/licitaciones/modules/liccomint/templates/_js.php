<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<script>
  if($('licomint_codmon').value=='001' || $('licomint_codmon').value=='')
  {
    $('divmoncomext').hide();
    $('divmoncomextlet').hide();
  }else
  {
    $('divmoncomext').show();
    $('divmoncomextlet').show();
  }
  if($('licomint_destiplic').value=='')
    $('divdestiplic').hide();
  $('trigger_licomint_fecven').hide();
  function Correl(id)
  {
      if($(id).value=='')
            $(id).value=$(id).value.pad(8,'#',0)
        else
            $(id).value=$(id).value.pad(8,'0',0);
  }

  function VerSolicitud(id)
  {
     var aux = id.split('_');
     var val = $('ax_'+aux[1]+'_6').value;
     var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';
     pagina=getUrl()+"licsolegr/edit/id/"+val;
     window.open(pagina,1,"menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80")
  } 

  function CalculaFecha(v)
  {
      toAjax('6',getUrlModulo()+'ajax',v,'','&fecha='+$('licomint_fecreg').value+'&dias='+$('licomint_dias').value);
  }
</script>