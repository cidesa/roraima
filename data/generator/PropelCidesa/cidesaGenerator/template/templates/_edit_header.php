
<?php if($this->getParameterValue('edit.save', false)): ?>
[?php echo link_to_function('Guardar Estado!', "return GuardarEstado()") ?]
<div id="descarga"></div>
[?php echo link_to(	'Cargar Estado', cross_app_link_to('herramientas','/generales/cargarestado') , array(
        'popup' => array('Cargar Estado del Formulario', 'width=300,height=50,left=150,top=50,resizable=no') ) ); ?]
<?php endif; ?>


