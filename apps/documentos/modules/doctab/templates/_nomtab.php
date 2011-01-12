  <?php echo select_tag('dftabtip[nomtab]', options_for_select($params['tablas'],$dftabtip->getNomtab(),'include_custom=Seleccione...'), array('onChange' => remote_function(array(
        'update'   => 'divcombos',//Div a Actualizar
    'url'      => 'doctab/ajax?par=1',//Variable para el control de la accion(1)
    'with' => "'campo='+this.value",//Valor de la variale de la caja de texto
    'script' => true,
      ))) ) ?>