 <?php /**echo select_tag('fafacturpro[tipref]', options_for_select(Constantes::ListaRefiereA($fafacturpro->getDespnotent()),$fafacturpro->getTipref()),array(
  'onchange' => "cambios();",
  ))**/
 echo select_tag('fafacturpro[tipref]', options_for_select(array('V'=>'Venta Directa'),$fafacturpro->getTipref()),array(
  'onchange' => "cambios();",
  ))
 ?>
