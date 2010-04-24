<?php echo input_tag('nphispre[moncuota]',$nphispre->getMoncuota() ,array (
  'onBlur' => 'javascript:event.keyCode=13; entermontootro(event, this.id); calnrocuo();',
));
?>
<script language="JavaScript" type="text/javascript">
  function calnrocuo()
  {
     var monto=toFloat('nphispre_monpre');
     var moncuo=toFloat('nphispre_moncuota');
      if (monto>0 && moncuo>0)
      {
      	var motmod=monto%moncuo;
      	var calculo=monto/moncuo;
      	if (motmod!=0)
      	{
      	  var final=parseInt(calculo)+1;
      	}else final=calculo;

      	$('nphispre_nrocuota').value=final;
      }
  }
</script>
