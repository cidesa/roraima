<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/05/17 08:22:33
?>
<?php echo form_tag('fadefalm/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($cadefalm, 'getId') ?>
<?php use_helper('PopUp') ?>
<?php echo javascript_include_tag('ajax','dFilter','tools', 'observe') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('cadefalm[codalm]', __($labels['cadefalm{codalm}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cadefalm{codalm}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefalm{codalm}')): ?>
    <?php echo form_error('cadefalm{codalm}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefalm, 'getCodalm', array (
  'size' => 10,
  'control_name' => 'cadefalm[codalm]',
  'readonly'  =>  $cadefalm->getId()!='' ? true : false ,
  'onBlur'  => "javascript:event.keyCode=13; enter(event,this.value);",
  'maxlength' => 6,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('cadefalm[nomalm]', __($labels['cadefalm{nomalm}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cadefalm{nomalm}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefalm{nomalm}')): ?>
    <?php echo form_error('cadefalm{nomalm}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefalm, 'getNomalm', array (
  'size' => 80,
  'maxlength' => 100,
  'control_name' => 'cadefalm[nomalm]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
<div id="divcatipalm_id">
  <?php echo label_for('cadefalm[catipalm_id]', __($labels['cadefalm{catipalm_id}' ]), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('cadefalm{catipalm_id}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefalm{catipalm_id}')): ?>
    <?php echo form_error('cadefalm{catipalm_id}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_select_tag($cadefalm, 'getCatipalmId', array (
  'related_class' => 'Catipalm',
  'control_name' => 'cadefalm[catipalm_id]',
  'include_blank' => true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<br>
  <?php echo label_for('cadefalm[codcat]', __($labels['cadefalm{codcat}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('cadefalm{codcat}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefalm{codcat}')): ?>
    <?php echo form_error('cadefalm{codcat}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefalm, 'getCodcat', array (
  'size' => 20,
  'maxlength' => 250,
  'control_name' => 'cadefalm[codcat]',
  'onBlur' => remote_function(array(
			  'url'      => 'fadefalm/ajax',
			  'complete' => 'AjaxJSON(request, json)',
  			  'with' => "'ajax=1&cajtexmos=cadefalm_nomcat&codigo='+this.value"
			  ))
)); echo $value ? $value : '&nbsp;' ?>

  <?php /*$value = object_input_tag($cadefalm, 'getCodcat', array (
  'size' => 20,
  'maxlength' => $lonmascara,
  'control_name' => 'cadefalm[codcat]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'".$mascaraubicacion."')",
  'onBlur' => remote_function(array(
			  'url'      => 'fadefalm/ajax',
			  'complete' => 'AjaxJSON(request, json)',
  			  'with' => "'ajax=1&cajtexmos=cadefalm_nomcat&codigo='+this.value"
			  ))
)); echo $value ? $value : '&nbsp;' */?>

  <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnubibie_Almdes/clase/Bnubibie/frame/sf_admin_edit_form/obj1/cadefalm_codcat/obj2/cadefalm_nomcat/campo1/codubi/campo2/desubi');?>

  <?php echo input_tag('cadefalm[nomcat]',$cadefalm->getNomcat(),'disabled=true; size=52'); ?>

    </div>
    <br>
</div>

</fieldset>

<?php include_partial('edit_actions', array('cadefalm' => $cadefalm)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($cadefalm->getId()): ?>
<?php echo button_to(__('delete'), 'fadefalm/delete?id='.$cadefalm->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>


<script type="text/javascript">

function enter(e,valor)
 {

   if (e.keyCode==13 || e.keyCode==9)
   {
     if (valor!='')
     { valor=valor.pad(6, '0',0);}

     $('cadefalm_codalm').value=valor;
   }
 }

</script>