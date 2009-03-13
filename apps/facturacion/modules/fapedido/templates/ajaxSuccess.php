<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid', 'Javascript') ?>
<?php if($ajaxs=='5') { if(count($precios)!=0) {
  echo options_for_select($precios,'','include_custom=Seleccione...');
} else{
echo options_for_select($precios,'');
}?>
<?php } else{ ?>
<?php $value = get_partial('grid', array('fapedido' => $fapedido)); echo $value ? $value : '&nbsp;'; ?>
<?php }?>