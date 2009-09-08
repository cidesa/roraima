<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/05/11 09:46:14
?>
<?php echo form_tag('facsolvencia/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($fcsolvencia, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">


<table border=0 >
<tr>
	<th>
		<div class="form-row">
	    <?php echo label_for('fcsolvencia[codsol]', __($labels['fcsolvencia{codsol}']), 'class="required" ') ?>
	  	<div class="content<?php if ($sf_request->hasError('fcsolvencia{codsol}')): ?> form-error<?php endif; ?>">
	    <?php if ($sf_request->hasError('fcsolvencia{codsol}')): ?>
	    <?php echo form_error('fcsolvencia{codsol}', array('class' => 'form-error-msg')) ?>
	    <?php endif; ?>
	
	    <?php $value = object_input_tag($fcsolvencia, 'getCodsol', array (
	  	'size' => 20,
	  	'control_name' => 'fcsolvencia[codsol]',
	    )); echo $value ? $value : '&nbsp;' ?>
	    </div>

	</th>
	<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
	<th>

	    <?php echo label_for('fcsolvencia[stasol]', __($status), 'style="font-size: 18pt"') ?>
	    </div>
	</th>
</tr>
</table>


<div class="form-row">
  <?php echo label_for('fcsolvencia[fecexp]', __($labels['fcsolvencia{fecexp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fcsolvencia{fecexp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fcsolvencia{fecexp}')): ?>
    <?php echo form_error('fcsolvencia{fecexp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($fcsolvencia, 'getFecexp', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fcsolvencia[fecexp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('fcsolvencia[codtip]', __($labels['fcsolvencia{codtip}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fcsolvencia{codtip}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fcsolvencia{codtip}')): ?>
    <?php echo form_error('fcsolvencia{codtip}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_select_tag($fcsolvencia, 'getCodtip', array (
  'related_class' => 'Fctipsol',
  'control_name' => 'fcsolvencia[codtip]',
  'text_method' => 'getDestip',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('fcsolvencia[rifcon]', __($labels['fcsolvencia{rifcon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fcsolvencia{rifcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fcsolvencia{rifcon}')): ?>
    <?php echo form_error('fcsolvencia{rifcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fcsolvencia, 'getRifcon', array (
  'size' => 20,
  'control_name' => 'fcsolvencia[rifcon]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('fcsolvencia[numlic]', __($labels['fcsolvencia{numlic}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('fcsolvencia{numlic}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fcsolvencia{numlic}')): ?>
    <?php echo form_error('fcsolvencia{numlic}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fcsolvencia, 'getNumlic', array (
  'size' => 20,
  'control_name' => 'fcsolvencia[numlic]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('fcsolvencia[codcat]', __($labels['fcsolvencia{codcat}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('fcsolvencia{codcat}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fcsolvencia{codcat}')): ?>
    <?php echo form_error('fcsolvencia{codcat}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fcsolvencia, 'getCodcat', array (
  'size' => 30,
  'control_name' => 'fcsolvencia[codcat]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('fcsolvencia[nomcon]', __($labels['fcsolvencia{nomcon}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('fcsolvencia{nomcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fcsolvencia{nomcon}')): ?>
    <?php echo form_error('fcsolvencia{nomcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fcsolvencia, 'getNomcon', array (
  'size' => 50,
  'control_name' => 'fcsolvencia[nomcon]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('fcsolvencia[dircon]', __($labels['fcsolvencia{dircon}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('fcsolvencia{dircon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fcsolvencia{dircon}')): ?>
    <?php echo form_error('fcsolvencia{dircon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fcsolvencia, 'getDircon', array (
  'size' => 80,
  'control_name' => 'fcsolvencia[dircon]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('fcsolvencia[motivo]', __($labels['fcsolvencia{motivo}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('fcsolvencia{motivo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fcsolvencia{motivo}')): ?>
    <?php echo form_error('fcsolvencia{motivo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fcsolvencia, 'getMotivo', array (
  'size' => 80,
  'control_name' => 'fcsolvencia[motivo]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('fcsolvencia' => $fcsolvencia)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($fcsolvencia->getId()): ?>
<?php echo button_to(__('delete'), 'facsolvencia/delete?id='.$fcsolvencia->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
