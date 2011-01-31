  <?php echo label_for('tsdefban[fechades]', __('Fecha Desde:'), 'class="required"') ?>

  <?php $value = object_input_date_tag($tsdefban, 'getFechades', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'tsdefban[fechades]',
 'date_format' => 'dd/MM/yyyy',
 'value' => date('d/m/Y'),
 'size' => 10,
 'maxlength' => 10,
 'onkeyup' => "javascript: mascara(this,'/',patron,true)"));
 	echo $value ? $value : '&nbsp;' ?>

<br><br>


  <?php echo label_for('tsdefban[fechahas]', __('Fecha Hasta:'), 'class="required"') ?>

  <?php $value = object_input_date_tag($tsdefban, 'getFechahas', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'tsdefban[fechahas]',
 'date_format' => 'dd/MM/yyyy',
 'value' => date('d/m/Y'),
 'size' => 10,
 'maxlength' => 10,
 'onkeyup' => "javascript: mascara(this,'/',patron,true)"));
 	echo $value ? $value : '&nbsp;' ?>


<ul  class="sf_admin_actions" >
<?php echo submit_to_remote('btnCalcular', 'Buscar Movimiento', array(
         'update'  => 'grid',
         'url'      => 'tesconmovban/ajax',
         'script'   => true,
         'complete' => 'AjaxJSON(request, json)',
         'with'     => "'ajax=1&numcue='+$('tsdefban_numcue').value+'&fechades='+$('tsdefban_fechades').value+'&fechahas='+$('tsdefban_fechahas').value",
));
 ?>
</ul>