<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/12 16:56:51
?>
<?php echo form_tag('almtraalm/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript','PopUp','Grid','Date') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools','observe', 'compras/almtraalm') ?>
<?php echo object_input_hidden_tag($catraalm, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('catraalm[codtra]', __($labels['catraalm{codtra}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('catraalm{codtra}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('catraalm{codtra}')): ?> <?php echo form_error('catraalm{codtra}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

<?php $value = object_input_tag($catraalm, 'getCodtra', array (
'size' => 15,
'maxlength' => 8,
'readonly'  =>  $catraalm->getId()!='' ? true : false,
'control_name' => 'catraalm[codtra]',
'onBlur'  => "javascript: enter(this.value);",
)); echo $value ? $value : '&nbsp;' ?>
</div>
<div class="sf_admin_edit_help"><?php echo __('Máximo 8 caracteres') ?></div>
<br>
<?php echo label_for('catraalm[fectra]', __($labels['catraalm{fectra}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('catraalm{fectra}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('catraalm{fectra}')): ?>
    <?php echo form_error('catraalm{fectra}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($catraalm, 'getFectra', array (
  'size' => 11,
  'maxlength' => 10,  'rich' => true,
  'readonly'  =>  $catraalm->getId()!='' ? true : false ,
  'maxlength' => 10,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'catraalm[fectra]',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
<?php echo label_for('catraalm[destra]', __($labels['catraalm{destra}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('catraalm{destra}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('catraalm{destra}')): ?>
    <?php echo form_error('catraalm{destra}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($catraalm, 'getDestra', array (
  'size' => 80,
  'maxlength' => 255,
  'control_name' => 'catraalm[destra]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('catraalm[almori]', __($labels['catraalm{almori}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('catraalm{almori}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('catraalm{almori}')): ?>
    <?php echo form_error('catraalm{almori}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php echo input_auto_complete_tag('catraalm[almori]', $catraalm->getAlmori(),
  'almtraalm/autocomplete?ajax=1',  array('autocomplete' => 'off', 'size' => 10,   'readonly'  =>  $catraalm->getId()!='' ? true : false , 'maxlength' => 6, 'onBlur'=> remote_function(array(
  'url'      => 'almtraalm/ajax',
  'complete' => 'AjaxJSON(request, json)',
  'condition' => "$('catraalm_almori').value != '' && $('id').value == ''",
  'with' => "'ajax=1&cajtexmos=catraalm_almaori&cajtexcom=catraalm_almori&codigo='+this.value"
			  ))),
  array('use_style' => 'true')
  )  ?> &nbsp;
  <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cadefalm_Almtraalm/clase/Cadefalm/frame/sf_admin_edit_form/obj1/catraalm_almori/obj2/catraalm_almaori/campo1/codalm/campo2/nomalm','','','botoncat')?>
   <?php $value = object_input_tag($catraalm, 'getAlmaori', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'catraalm[almaori]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
 <?php echo label_for('catraalm[codubiori]', __($labels['catraalm{codubiori}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('catraalm{codubiori}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('catraalm{codubiori}')): ?>
    <?php echo form_error('catraalm{codubiori}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php $value = object_input_tag($catraalm, 'getCodubiori', array (
  'size' => 10,
  'maxlength' => $lonubi,
  'control_name' => 'catraalm[codubiori]',
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascaraubi')",
  'readonly'  =>  $catraalm->getId()!='' ? true : false ,
  'onBlur'=> remote_function(array(
       'url'      => 'almtraalm/ajax',
       'script'   => true,
       'condition' => "$('catraalm_codubiori').value != '' && $('id').value == ''",
       'complete' => 'AjaxJSON(request, json)',
       'with' => "'ajax=2&cajtexmos=catraalm_nomubiori&codalm='+$('catraalm_almori').value+'&origen=O&codigo='+this.value"
        ))
  )); echo $value ? $value : '&nbsp;' ?>
 &nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Cadefubi_Almdes/clase/Cadefubi/frame/sf_admin_edit_form/obj1/catraalm_codubiori/obj2/catraalm_nomubiori/campo1/codubi/campo2/nomubi/param1/'+$('catraalm_almori').value+'",'','','botoncat')?>

  <?php $value = object_input_tag($catraalm, 'getNomubiori', array (
  'disabled' => true,
   'size' => 60,
  'control_name' => 'catraalm[nomubiori]',
)); echo $value ? $value : '&nbsp;' ?>
</div>
<br>
  <?php echo label_for('catraalm[almdes]', __($labels['catraalm{almdes}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('catraalm{almdes}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('catraalm{almdes}')): ?>
    <?php echo form_error('catraalm{almdes}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>
    <?php echo input_auto_complete_tag('catraalm[almdes]', $catraalm->getAlmdes(),
    'almtraalm/autocomplete?ajax=1',  array('autocomplete' => 'off', 'size' => 10,   'readonly'  =>  $catraalm->getId()!='' ? true : false , 'maxlength' => 6, 'onBlur'=> remote_function(array(
    'url'      => 'almtraalm/ajax',
    'complete' => 'AjaxJSON(request, json)',
    'condition' => "$('catraalm_almdes').value != '' && $('id').value == ''",
    'with' => "'ajax=1&cajtexmos=catraalm_almades&cajtexcom=catraalm_almdes&codigo='+this.value"
			  ))),
    array('use_style' => 'true')
    )
    ?> &nbsp;
 <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cadefalm_Almtraalm/clase/Cadefalm/frame/sf_admin_edit_form/obj1/catraalm_almdes/obj2/catraalm_almades/campo1/codalm/campo2/nomalm','','','botoncat')?>

 <?php $value = object_input_tag($catraalm, 'getAlmades', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'catraalm[almades]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
 <?php echo label_for('catraalm[codubides]', __($labels['catraalm{codubides}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('catraalm{codubides}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('catraalm{codubides}')): ?>
    <?php echo form_error('catraalm{codubides}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php $value = object_input_tag($catraalm, 'getCodubides', array (
  'size' => 10,
  'maxlength' => $lonubi,
  'control_name' => 'catraalm[codubides]',
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascaraubi')",
  'readonly'  =>  $catraalm->getId()!='' ? true : false ,
  'onBlur'=> remote_function(array(
       'url'      => 'almtraalm/ajax',
       'script'   => true,
       'condition' => "$('catraalm_codubides').value != '' && $('id').value == ''",
       'complete' => 'AjaxJSON(request, json)',
       'with' => "'ajax=2&cajtexmos=catraalm_nomubides&codalm='+$('catraalm_almdes').value+'&origen=D&codigo='+this.value"
        ))
  )); echo $value ? $value : '&nbsp;' ?>
 &nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Cadefubi_Almdes/clase/Cadefubi/frame/sf_admin_edit_form/obj1/catraalm_codubides/obj2/catraalm_nomubides/campo1/codubi/campo2/nomubi/param1/'+$('catraalm_almdes').value+'",'','','botoncat')?>

  <?php $value = object_input_tag($catraalm, 'getNomubides', array (
  'disabled' => true,
   'size' => 60,
  'control_name' => 'catraalm[nomubides]',
)); echo $value ? $value : '&nbsp;' ?>
</div>
<br>
<?php echo grid_tag($obj);?>
</div>
</fieldset>

<?php include_partial('edit_actions', array('catraalm' => $catraalm)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($catraalm->getId()): ?>
<?php echo button_to(__('delete'), 'almtraalm/delete?id='.$catraalm->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

<script type="text/javascript">

    var id='<?php echo $catraalm->getId()?>';
    if (id!="")
    {
      $('trigger_catraalm_fectra').hide();
      $$('.botoncat')[0].disabled=true;
      $$('.botoncat')[1].disabled=true;
      $$('.botoncat')[2].disabled=true;
      $$('.botoncat')[3].disabled=true;
    }

</script>
