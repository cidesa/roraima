  <?php echo select_tag('dftabtip[nomtabfk]', options_for_select($params['tablas'],$dftabtip->getNomtabfk(),'include_custom=Seleccione...'), array('onChange' => remote_function(array(
        'update'   => 'divinfadic',//Div a Actualizar
    'url'      => 'doctab/ajax?par=2',//Variable para el control de la accion(1)
    'with' => "'campo='+this.value",//Valor de la variale de la caja de texto
    'script' => true,
      ))) ) ?>