<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid', 'DoubleList') ?>
<?php echo javascript_include_tag('ajax') ?>


<?php if ($js==false){   ?>
<fieldset id="sf_fieldset_none" class="">
<h2><?php echo __('Movimientos') ?></h2>
<div class="form-row">
<table>
<tr>
<td>
<?php echo label_for('tsmovban[libros_selec]', '', '') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovban{libros_selec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovban{libros_selec}')): ?>
    <?php echo form_error('tsmovban{libros_selec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>


  <?php $value = object_admin_double_list_criteria($c,$tsmovban, 'getLibrosSelec', array (
  'control_name' => 'tsmovban[libros_selec]',
  'through_class' => 'Tsmovlib',
  'onclick'=> remote_function(array(
        'url'      => 'tesmoslib/ajax',
        'complete' => 'AjaxJSON(request, json)',
          'with' => "'ajax=3&codigo='+this.value+'&cadena='+$('cadfecban').value",
        )),
  'unassociated_label' => 'Libros',
  'associated_label' => 'Seleccionados'
),$callback); echo $value ? $value : '&nbsp;' ?>
    </div>
</td>
<td><?php echo input_hidden_tag('cadfecban','') ?>
    <?php echo input_hidden_tag('nromovlib','') ?>
		<strong><?php echo __('Fecha Banco:') ?></strong>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<?php echo input_tag('fecban','',array(
        'calendar_button_img' => '/sf/sf_admin/images/date.png',
        'date_format' => 'dd/MM/yyyy',
        'onkeyup' => "javascript: mascara(this,'/',patron,true)",
        'onBlur' => "actualizarfecha(this.id)",
		'size' => 10
		)) ?>
     <br>
     <br>
	<ul>
		<?php echo textarea_tag('desmov','',array(
		'readonly' => true,
		'cols' => 26
		)) ?>
	</ul>
	  <br>
	<ul>
		<strong><?php echo __('Cod:') ?></strong>
		&nbsp;&nbsp;
		<?php echo input_tag('codche','',array(
		'readonly' => true,
		'size' => 5
		)) ?>
	    &nbsp;&nbsp;
		<?php echo input_tag('fecban2','',array(
        'readonly' => true,
		'size' => 10
		)) ?>
    </ul>
	  <br>
	<ul>
		<?php echo input_tag('desche','',array(
		'readonly' => true,
		'size' => 29
		)) ?>
    </ul>
       <br>
    <ul>
    	<strong><?php echo __('Monto:')?></strong>
    	&nbsp;&nbsp;
		<?php echo input_tag('monmov','',array(
		'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
		'size' => 19
		)) ?>
    </ul>
</td>
</tr>
</table>
</div>
</fieldset>

<?php include_partial('edit_actions', array('tsmovban' => $tsmovban)) ?>


<?php }else {
		echo javascript_tag(" alert('Esta cuenta no posee movimientos'); ");
} ?>
