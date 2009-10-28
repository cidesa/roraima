<?php echo input_tag('nphispre[nrocuota]',$nphispre->getNrocuota() ,array (
  'onBlur' => 'javascript:event.keyCode=13; entermontootro(event, this.id); calmoncuo();',
));
?>

<script language="JavaScript" type="text/javascript">
  function calmoncuo()
  {
     var monto=toFloat('nphispre_monpre');
     var numcuo=toFloat('nphispre_nrocuota');
      if (monto>0 && numcuo>0)
      {
      	var calculo=monto/numcuo;
      	$('nphispre_moncuota').value=format(calculo.toFixed(2),'.',',','.');
      }
  }
</script>
