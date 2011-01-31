 <?php echo select_tag('caordcon[otorga]', options_for_select(array('P' => 'Privado', 'A' => 'Abierto', 'O' => 'Otro'),$caordcon->getOtorga()),array(
  )) ?>
