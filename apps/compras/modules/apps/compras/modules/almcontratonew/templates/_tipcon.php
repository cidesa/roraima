 <?php echo select_tag('caordcon[tipcon]', options_for_select(array('O' => 'Obra', 'B' => 'Bienes', 'S' => 'Servicio'),$caordcon->getTipcon()),array(
  )) ?>
