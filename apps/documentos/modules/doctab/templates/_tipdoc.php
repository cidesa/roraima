  <?php echo select_tag('dftabtip[tipdoc]', options_for_select(
  Documentos::getDocs(),
  $dftabtip->getTipdoc(),
  'include_custom=Seleccione...'
));
  ?>