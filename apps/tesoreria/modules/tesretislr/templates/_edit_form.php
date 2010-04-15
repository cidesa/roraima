<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/14 17:18:31
?>
<?php echo form_tag('tesretislr/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($tsentislr, 'getId') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools','observe') ?>

<fieldset id="sf_fieldset_none" class="">
<div class="form-row">

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos de la Orden de Retencion')?></legend>
<div class="form-row">
  <table>
   <tr>
    <th><?php echo label_for('tsentislr[numord]', __($labels['tsentislr{numord}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsentislr{numord}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsentislr{numord}')): ?>
    <?php echo form_error('tsentislr{numord}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo input_auto_complete_tag('tsentislr[numord]', $tsentislr->getNumord(),
    'tesretislr/autocomplete?ajax=1',  array('autocomplete' => 'off','maxlength' => 8, 'onBlur'=> remote_function(array(
        'url'      => 'tesretislr/ajax',
        'complete' => 'AjaxJSON(request, json)',
          'with' => "'ajax=1&cajtexmos=tsentislr_feclib&cajtexcom=tsentislr_numord&codigo='+this.value"
        ))),
     array('use_style' => 'true')
  )
?></div></th>
    <th>&nbsp;&nbsp;&nbsp;
<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Tsentislr_tesretislr/clase/Tsmovlib/frame/sf_admin_edit_form/obj1/tsentislr_numord/obj2/tsentislr_feclib/campo1/reflib/campo2/feclib/param1/1')?>

    </th>
    <th>&nbsp;&nbsp;&nbsp;</th>
    <th><?php echo label_for('tsentislr[feclib]', __($labels['tsentislr{feclib}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsentislr{feclib}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsentislr{feclib}')): ?>
    <?php echo form_error('tsentislr{feclib}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

   <?php $value = object_input_tag($tsentislr, 'getFeclib', array (
  'disabled' => true,
  'control_name' => 'tsentislr[feclib]',
  'date_format' => 'dd/MM/yyyy',
)); echo $value ? $value : '&nbsp;' ?></div></th>
   </tr>
  </table>
</div>
</fieldset>

<br>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos del Depósito')?></legend>
<div class="form-row">
  <?php echo label_for('tsentislr[numdep]', __($labels['tsentislr{numdep}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsentislr{numdep}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsentislr{numdep}')): ?>
    <?php echo form_error('tsentislr{numdep}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsentislr, 'getNumdep', array (
  'size' => 20,
  'control_name' => 'tsentislr[numdep]',
  'maxlength' => 20,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('tsentislr[fecha]', __($labels['tsentislr{fecha}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsentislr{fecha}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsentislr{fecha}')): ?>
    <?php echo form_error('tsentislr{fecha}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($tsentislr, 'getFecha', array (
  'rich' => true,
  'maxlength' => 10,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'tsentislr[fecha]',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('tsentislr[banco]', __($labels['tsentislr{banco}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsentislr{banco}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsentislr{banco}')): ?>
    <?php echo form_error('tsentislr{banco}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsentislr, 'getBanco', array (
  'size' => 80,
  'maxlength' => 100,
  'control_name' => 'tsentislr[banco]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

</div>
</fieldset>

<?php include_partial('edit_actions', array('tsentislr' => $tsentislr)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($tsentislr->getId()): ?>
<?php echo button_to(__('delete'), 'tesretislr/delete?id='.$tsentislr->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
