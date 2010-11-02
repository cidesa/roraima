<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _edit_form.php 41068 2010-10-20 17:12:48Z cramirez $
 */
// date: 2007/05/17 08:22:33
?>
<?php echo form_tag('almdefalm/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form', 'onsubmit'  => 'return false;',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($cadefalm, 'getId') ?>
<?php use_helper('PopUp') ?>
<?php echo javascript_include_tag('ajax','dFilter','tools', 'observe') ?>
<?php echo input_hidden_tag('cadefalm[codlongveinte]', $cadefalm->getCodlongveinte()) ?>
<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('cadefalm[codalm]', __($labels['cadefalm{codalm}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cadefalm{codalm}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefalm{codalm}')): ?>
    <?php echo form_error('cadefalm{codalm}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefalm, 'getCodalm', array (
  'size' => $cadefalm->getCodlongveinte()=='S' ? 25 : 10 ,
  'control_name' => 'cadefalm[codalm]',
  'readonly'  =>  $cadefalm->getId()!='' ? true : false ,
  'onBlur'  => "javascript:event.keyCode=13; enter(event,this.value);",
  'maxlength' => $cadefalm->getCodlongveinte()=='S' ? 20 : 6 ,
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
  'onKeyUp'=>"javascript:cadena=this.value;cadena=cadena.toUpperCase();this.value=cadena;",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('cadefalm[codcat]', __($labels['cadefalm{codcat}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('cadefalm{codcat}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefalm{codcat}')): ?>
    <?php echo form_error('cadefalm{codcat}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefalm, 'getCodcat', array (
  'size' => 20,
  'maxlength' => $lonmascara,
  'control_name' => 'cadefalm[codcat]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'".$mascaraubicacion."')",
  'onBlur' => remote_function(array(
			  'url'      => 'almdefalm/ajax',
			  'complete' => 'AjaxJSON(request, json)',
  			  'with' => "'ajax=1&cajtexmos=cadefalm_nomcat&codigo='+this.value"
			  ))
)); echo $value ? $value : '&nbsp;' ?>

  <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnubibie_Almdes/clase/Bnubibie/frame/sf_admin_edit_form/obj1/cadefalm_codcat/obj2/cadefalm_nomcat/campo1/codubi/campo2/desubi');?>

  <?php echo input_tag('cadefalm[nomcat]',$cadefalm->getNomcat(),'disabled=true; size=52'); ?>

    </div>
<br>
  <?php echo label_for('cadefalm[codtip]', __($labels['cadefalm{codtip}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('cadefalm{codtip}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefalm{codtip}')): ?>
    <?php echo form_error('cadefalm{codtip}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefalm, 'getCodtip', array (
  'size' => 20,
  'control_name' => 'cadefalm[codtip]',
  'onBlur' => remote_function(array(
			  'url'      => 'almdefalm/ajax',
			  'complete' => 'AjaxJSON(request, json)',
  			  'with' => "'ajax=2&cajtexmos=cadefalm_nomtip&codigo='+this.value"
			  ))
)); echo $value ? $value : '&nbsp;' ?>

  <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Catipalm_id/clase/Catipalm/frame/sf_admin_edit_form/obj1/cadefalm_codtip/obj2/cadefalm_nomtip/campo1/id/campo2/nomtip');?>

  <?php echo input_tag('cadefalm[nomtip]',$cadefalm->getNomtip(),'disabled=true; size=52'); ?>


    </div>
<br>
  <?php echo label_for('cadefalm[codedo]', __($labels['cadefalm{codedo}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('cadefalm{codedo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefalm{codedo}')): ?>
    <?php echo form_error('cadefalm{codedo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefalm, 'getCodedo', array (
  'size' => 20,
  'control_name' => 'cadefalm[codedo]',
  'onBlur' => remote_function(array(
			  'url'      => 'almdefalm/ajax',
			  'complete' => 'AjaxJSON(request, json)',
  			  'with' => "'ajax=3&cajtexmos=cadefalm_nomedo&codigo='+this.value"
			  ))
)); echo $value ? $value : '&nbsp;' ?>

  <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Catipalm_codedo/clase/Ocestado/frame/sf_admin_edit_form/obj1/cadefalm_codedo/obj2/cadefalm_nomedo/campo1/codedo/campo2/nomedo');?>

  <?php echo input_tag('cadefalm[nomedo]',$cadefalm->getNomedo(),'disabled=true; size=52'); ?>


    </div>
<br>
  <?php echo label_for('cadefalm[diralm]', __($labels['cadefalm{diralm}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cadefalm{diralm}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefalm{diralm}')): ?>
    <?php echo form_error('cadefalm{diralm}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($cadefalm, 'getDiralm', array (
  'size' => '77x4',
  'maxlength' => 500,
  'control_name' => 'cadefalm[diralm]',
  'onKeyUp'=>"javascript:cadena=this.value;cadena=cadena.toUpperCase();this.value=cadena;",
)); echo $value ? $value : '&nbsp;' ?>
    </div>


    <br>
</div>

</fieldset>

<?php include_partial('edit_actions', array('cadefalm' => $cadefalm)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($cadefalm->getId()): ?>
<?php echo button_to(__('delete'), 'almdefalm/delete?id='.$cadefalm->getId(), array (
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
     {
         var longveinte='<?php echo $cadefalm->getCodlongveinte(); ?>';
         if (longveinte!='S')
           valor=valor.pad(6, '0',0);
     }

     $('cadefalm_codalm').value=valor;
   }
 }

</script>
