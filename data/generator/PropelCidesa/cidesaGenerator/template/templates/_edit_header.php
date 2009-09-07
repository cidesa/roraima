[?php

/**
 *
 * @package    Roraima
 * @subpackage <?php echo $this->getGeneratedModuleName() ?>
 
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 * @copyright  Copyright 2007, Cidesa C.A.
 *
 */
 ?]

[?php
$varcargar="";
$varemp =$sf_user->getAttribute('configemp');
    if ($varemp)
	  if(array_key_exists('generales',$varemp))
		 if(array_key_exists('cargaest',$varemp['generales']))
		 {
		  $varcargar=$varemp['generales']['cargaest'];
		 }
	 ?]
<?php if($this->getParameterValue('edit.save', false)): ?>
[?php if ($varcargar=='S'): ?]
[?php echo link_to_function('Guardar Estado!', "return GuardarEstado()") ?]
<div id="descarga"></div>
[?php echo link_to(	'Cargar Estado', cross_app_link_to('herramientas','/generales/cargarestado') , array(
        'popup' => array('Cargar Estado del Formulario', 'width=300,height=50,left=150,top=50,resizable=no') ) ); ?]
[?php endif; ?]
<?php endif; ?>

<?php $report = $this->getParameterValue('edit.report', array()); ?>

<?php if(count($report)>0): ?>
<?php if($report['url']!=''): ?>

[?php if($<?php echo $this->getSingularName() ?>->getId()!=''): ?]

[?php $params = ''; ?]
<?php foreach($report['params'] as $valor => $campo) { ?>
  [?php $params .= '<?php echo $valor ?>='.$<?php echo $this->getSingularName() ?>->get<?php echo ucfirst($campo); ?>().'&' ?]
<?php } ?>

[?php echo button_to(	'Imprimir', 'http://'.$sf_request->getHost().'/'.$sf_user->getAttribute('reportes_web').'/<?php echo $report['url']; ?>&'.$params, array(
        'popup' => array('Reportes', 'dependent=1,toolbar=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=1,width=800,height=600') ) ); ?]
[?php endif; ?]
<?php endif; ?>
<?php endif; ?>
<br>
<br>
<br>
