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
<?php } else{ ?>
<?php echo select_tag('fafactur[listaart]', options_for_select($arreglo,''),array(
  'onfocus' => "colocarengrid(this.value,'$filagrid');",
  'multiple' => true,
  'size' => 10,
  'style'=> "width:500px; height:250px;",
  )) ?>
<?php }?>
