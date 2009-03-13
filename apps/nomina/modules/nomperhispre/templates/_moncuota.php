<?php echo input_tag('nphispre[moncuota]',$nphispre->getMoncuota() ,array (
  'onBlur' => 'javascript:event.keyCode=13;return entermontootro(event, this.id)',
));
?>
