<?php if($ajaxs=='5') {
 if(count($precios)!=0) {
  echo options_for_select($precios,'','include_custom=Seleccione...');
} else{
echo options_for_select($precios,'');
}?>
<?php } else if ($ajaxs=='13') { ?>
<?php $value = get_partial('grid_fapeddes', array('fafactur' => $fafactur)); echo $value ? $value : '&nbsp;'; ?>
<?php } else if ($ajaxs=='16') { ?>
<?php $value = get_partial('grid_faartfac', array('type' => 'edit', 'fafactur' => $fafactur)); echo $value ? $value : '&nbsp;' ?>
<?php echo object_input_hidden_tag($fafactur, 'getTotcanpreart', array('id' => 'fafactur_totcanpreart', 'name' => 'fafactur[totcanpreart]')) ?>
  <?php echo object_input_hidden_tag($fafactur, 'getTottotart', array('id' => 'fafactur_tottotart', 'name' => 'fafactur[tottotart]')) ?>
  <?php echo object_input_hidden_tag($fafactur, 'getTotmonrgo', array('id' => 'fafactur_totmonrgo', 'name' => 'fafactur[totmonrgo]')) ?>
  <?php echo object_input_hidden_tag($fafactur, 'getTotprecio', array('id' => 'fafactur_totprecio', 'name' => 'fafactur[totprecio]')) ?>
<?php } else{ ?>
<?php echo select_tag('fafactur[listaart]', options_for_select($arreglo,''),array(
  'onfocus' => "colocarengrid(this.value,'$filagrid');",
  'multiple' => true,
  'size' => 10,
  'style'=> "width:500px; height:250px;",
  )) ?>
<?php }?>
