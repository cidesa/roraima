<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php if ($fcsollic->getId()!='')
{
?>
<div id="autorizacion" style="display:none;">

<div id="dividlic">
  <?php echo label_for('fcsollic[idlic]', __('Referencia:'), 'class="" Style="text-align:left; width:100px; color: red; font-weight: bold;"') ?>
  <div class="content<?php if ($sf_request->hasError('fcsollic{idlic}')): ?> form-error<?php endif; ?>">
  <?php $value = object_input_tag($fcsollic, 'getIdlic', array (
  'size' => 14,
  'maxlength' => 12,
  'control_name' => 'fcsollic[idlic]',
)); echo $value ? $value : '&nbsp;' ?>
  </div>
</div>
<br>

<div id="divfechlic">
  <?php echo label_for('fcsollic[fechlic]', __('Fecha:'), 'class="" Style="text-align:left; width:100px; color: red; font-weight: bold;"') ?>
  <div class="content<?php if ($sf_request->hasError('fcsollic{fechlic}')): ?> form-error<?php endif; ?>">

  <?php $value = object_input_date_tag($fcsollic, 'getFechlic', array (
  'rich' => true,
  'size' =>'10',
  'maxlength' => 10,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fcsollic[fechlic]',
  'date_format' => 'dd/MM/yyyy',
)); echo $value ? $value : '&nbsp;' ?>
  </div>
</div>
<br>

<div id="divcomnlic">
  <?php echo label_for('fcsollic[comnlic]', __('Motivo de la Modificación:'), 'class="" Style="text-align:left; width:100px; color: red; font-weight: bold;"') ?>
  <div class="content<?php if ($sf_request->hasError('fcsollic{comnlic}')): ?> form-error<?php endif; ?>">
  <?php $value = object_input_tag($fcsollic, 'getComnlic', array (
  'size' => 50,
  'maxlength' => 300,
  'control_name' => 'fcsollic[comnlic]',
)); echo $value ? $value : '&nbsp;' ?>
  </div>
</div>
<br>

</div>




<?php }
?>