<?php $value = object_textarea_tag($fafacturpro, 'getDesfac', array (
  'control_name' => 'fafacturpro[desfac]',
  'maxlength' => 255,
  'cols' => 66,
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php if ($fafacturpro->getMancatdes()=='S' && $fafacturpro->getId()=='') { ?>
<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Fadescripfac_Fafacturpro/clase/Fadescripfac/frame/sf_admin_edit_form/obj1/fafacturpro_desfac/campo1/desfac')?>
<?php } ?>