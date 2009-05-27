<?php
/*
 * Created on 22/05/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php echo select_tag('npasiconsue[tippres]', options_for_select(Constantes::TipoPrestamo(),$npasiconsue->getTippres()),array(
'onChange'=> remote_function(array(
  'update'   => 'divcasep',
  'url'      => 'nomdefespconsue/ajax?ajax=4',
  'script' => true,
  'with'   => "'codigo='+this.value"
  ))
)); ?>