<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/05/16 12:30:21
?>
<?php echo form_tag('docrut/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($dfrutadoc, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('dfrutadoc[id_dftabtip]', __($labels['dfrutadoc{id_dftabtip}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('dfrutadoc{id_dftabtip}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dfrutadoc{id_dftabtip}')): ?>
    <?php echo form_error('dfrutadoc{id_dftabtip}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo object_select_tag($dfrutadoc, 'getIdDftabtip', array (
  'related_class' => 'Dftabtip',
  'control_name' => 'dfrutadoc[id_dftabtip]',
  //'text_method' => 'getTipdoc',
  'include_custom' => 'Seleccione...',
  'onChange' => remote_function(array(
          'update'   => 'divRutas',//Div a Actualizar
    'url'      => 'docrut/ajax?par=1',//Variable para el control de la accion(1)
    'with' => "'campo='+this.value"//Valor de la variale de la caja de texto
      )),
)); ?>
  </div>  
</div>

<div class="form-row">
  <?php echo label_for('dfrutadoc[nomuni]', __($labels['dfrutadoc{nomuni}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('dfrutadoc{id_acunidad}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dfrutadoc{id_acunidad}')): ?>
    <?php echo form_error('dfrutadoc{id_acunidad}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_select_tag($dfrutadoc, 'getIdAcunidad', array (
  'related_class' => 'Acunidad',
  'control_name' => 'dfrutadoc[id_acunidad]',
  'text_method' => 'getNomuni',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('dfrutadoc[desuni]', __($labels['dfrutadoc{desuni}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('dfrutadoc{desuni}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dfrutadoc{desuni}')): ?>
    <?php echo form_error('dfrutadoc{desuni}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($dfrutadoc, 'getDesuni', array (
  'size' => 80,
  'control_name' => 'dfrutadoc[desuni]',
)); echo $value ? $value : '&nbsp;' ?>
  </div>
</div>

<div  class="form-row">
  <?php echo label_for('dfrutadoc[rutdoc]', __($labels['dfrutadoc{rutdoc}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('dfrutadoc{rutdoc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dfrutadoc{rutdoc}')): ?>
    <?php echo form_error('dfrutadoc{rutdoc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('dfrutadoc[rutdoc]', options_for_select($listado,$dfrutadoc->getRutdoc(),'include_custom=Seleccione...')) ?>
    </div>
</div>

<div  class="form-row">
  <?php echo label_for('dfrutadoc[diadoc]', __($labels['dfrutadoc{diadoc}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('dfrutadoc{diadoc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dfrutadoc{diadoc}')): ?>
    <?php echo form_error('dfrutadoc{diadoc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('dfrutadoc[diadoc]', options_for_select($listado,$dfrutadoc->getDiadoc(),'include_custom=Seleccione...')) ?>
  </div>
</div>

<div class="form-row">
  <?php echo label_for('dfrutadoc[desrut]', __($labels['dfrutadoc{desrut}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('dfrutadoc{desrut}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dfrutadoc{desrut}')): ?>
    <?php echo form_error('dfrutadoc{desrut}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($dfrutadoc, 'getDesrut', array (
  'size' => 80,
  'control_name' => 'dfrutadoc[desrut]',
)); echo $value ? $value : '&nbsp;' ?>
  </div>
</div>


<div class="form-row">
  <?php echo label_for('detrut', __('Detalle de la ruta'), '') ?>
  <div class="content<?php if ($sf_request->hasError('dfrutadoc{desrut}')): ?> form-error<?php endif; ?>">
    <div id="divRutas" >
    <?php include_partial('docrut/pagerlist', array('pager' => $pager)) ?>
    <div>
  </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('dfrutadoc' => $dfrutadoc)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($dfrutadoc->getId()): ?>
<?php echo button_to(__('delete'), 'docrut/delete?id='.$dfrutadoc->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
