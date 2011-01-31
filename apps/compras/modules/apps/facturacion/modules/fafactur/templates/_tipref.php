 <?php echo select_tag('fafactur[tipref]', options_for_select(Constantes::ListaRefiereA($fafactur->getDespnotent()),$fafactur->getTipref()),array(
  'onchange' => "cambios();",
  )) ?>
