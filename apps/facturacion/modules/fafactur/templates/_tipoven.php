 <?php echo select_tag('fafactur[tipoven]', options_for_select(array('I' => 'Internas', 'E' => 'Exportaciones'),$fafactur->getTipoven(),'include_custom=Seleccione'),array()) ?>
