<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/23 19:26:15
?>
<?php echo form_tag('nomfalpersal/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript','PopUp','Grid','Date','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools') ?>
<?php echo object_input_hidden_tag($npfalper, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('npfalper[codemp]', __($labels['npfalper{codemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npfalper{codemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npfalper{codemp}')): ?>
    <?php echo form_error('npfalper{codemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npfalper, 'getCodemp', array (
  'size' => 20,
  'control_name' => 'npfalper[codemp]',
  'maxlength' => 9,
  'onBlur'=> remote_function(array(
        'url'      => 'nomfalpersal/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=1&cajtexmos=npfalper_nomemp&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Npfalper_Nomfalpersal/clase/Nphojint/frame/sf_admin_edit_form/obj1/npfalper_codemp/obj2/npfalper_nomemp/campo1/codemp/campo2/nomemp/param1/')?>

    </div>
</div>

<div class="form-row">
  <?php echo label_for('npfalper[nomemp]', __($labels['npfalper{nomemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npfalper{nomemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npfalper{nomemp}')): ?>
    <?php echo form_error('npfalper{nomemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npfalper, 'getNomemp', array (
  'size' => 50,
  'disabled' => true,
  'control_name' => 'npfalper[nomemp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npfalper[codmot]', __($labels['npfalper{codmot}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npfalper{codmot}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npfalper{codmot}')): ?>
    <?php echo form_error('npfalper{codmot}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npfalper, 'getCodmot', array (
  'size' => 6,
  'control_name' => 'npfalper[codmot]',
  'maxlength' => 4,
  'onBlur'=> remote_function(array(
        'url'      => 'nomfalpersal/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=2&cajtexmos=npfalper_desmotfal&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>




<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Npmotfal_Nomfalpersal/clase/Npmotfal/frame/sf_admin_edit_form/obj1/npfalper_codmot/obj2/npfalper_desmotfal/campo1/codmotfal/campo2/desmotfal/param1/')?>

    </div>
</div>

<div class="form-row">
  <?php echo label_for('npfalper[desmotfal]', __($labels['npfalper{desmotfal}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npfalper{desmotfal}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npfalper{desmotfal}')): ?>
    <?php echo form_error('npfalper{desmotfal}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npfalper, 'getDesmotfal', array (
  'size' => 50,
  'readonly' => true,
  'control_name' => 'npfalper[desmotfal]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npfalper[observ]', __($labels['npfalper{observ}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npfalper{observ}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npfalper{observ}')): ?>
    <?php echo form_error('npfalper{observ}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($npfalper, 'getObserv', array (
  'size' => '80x3',
  'control_name' => 'npfalper[observ]',
  'maxlength'=> 250,
  'onkeyup' => "javascript:return ismaxlength(this)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<div class="form-row">
  <?php echo label_for('npfalper[numctr]', __($labels['npfalper{numctr}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('npfalper{numctr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npfalper{numctr}')): ?>
    <?php echo form_error('npfalper{numctr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npfalper, 'getNumctr', array (
  'size' => 10,
  'control_name' => 'npfalper[numctr]',
  'maxlength' => 8,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
    <div class="form-row" id="desde" style= "display:none">
  <?php echo label_for('npfalper[fecdes]', __($labels['npfalper{fecdes}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npfalper{fecdes}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npfalper{fecdes}')): ?>
    <?php echo form_error('npfalper{fecdes}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($npfalper, 'getFecdes', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'npfalper[fecdes]',
  'date_format' => 'dd/MM/yyyy',
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<div class="form-row">
  <?php echo label_for('npfalper[fechas]', __($labels['npfalper{fechas}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npfalper{fechas}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npfalper{fechas}')): ?>
    <?php echo form_error('npfalper{fechas}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($npfalper, 'getFechas', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'npfalper[fechas]',
  'date_format' => 'dd/MM/yyyy',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
    <div class="form-row" >
  <?php echo label_for('npfalper[nrodia]', __($labels['npfalper{nrodia}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('npfalper{nrodia}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npfalper{nrodia}')): ?>
    <?php echo form_error('npfalper{nrodia}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npfalper, 'getNrodia', array (
  'size' => 7,
  'control_name' => 'npfalper[nrodia]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<div class="form-row">
  <?php echo label_for('npfalper[nrohoras]', __($labels['npfalper{nrohoras}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('npfalper{nrohoras}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npfalper{nrohoras}')): ?>
    <?php echo form_error('npfalper{nrohoras}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npfalper, array('getNrohoras',true), array (
  'size' => 7,
  'control_name' => 'npfalper[nrohoras]',
  'onBlur'  => "javascript:event.keyCode=13; return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('npfalper' => $npfalper)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($npfalper->getId()): ?>
<?php echo button_to(__('delete'), 'nomfalpersal/delete?id='.$npfalper->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
<script language="JavaScript" type="text/javascript">

if ($('id').value!="")
{
    $('desde').show();
}

</script>