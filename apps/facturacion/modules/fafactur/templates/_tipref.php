 <?php echo select_tag('fafactur[tipref]', options_for_select(Constantes::ListaRefiereA(),$fafactur->getTipref()),array(
  'onchange' => "cambios();",
  )) ?>
