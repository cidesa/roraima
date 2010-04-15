<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/13 18:29:48
?>
<?php echo form_tag('tesdeftipmov/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo javascript_include_tag('tools','observe','dFilter','ajax') ?>
<?php echo object_input_hidden_tag($tstipmov, 'getId') ?>

<fieldset id="sf_fieldset_editable" class="">
<legend><? echo __('Datos del Tipo de Movimiento') ?></legend>
<div class="form-row">
  <?php echo label_for('tstipmov[codtip]', __($labels['tstipmov{codtip}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tstipmov{codtip}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tstipmov{codtip}')): ?>
    <?php echo form_error('tstipmov{codtip}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tstipmov, 'getCodtip', array (
  'size' => 10,
  'maxlength'=>4,
  'readonly'  =>  $tstipmov->getId()!='' ? true : false ,
  'control_name' => 'tstipmov[codtip]',
  'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('tstipmov_codtip').value=cadena",
)); echo $value ? $value : '&nbsp;' ?>

    <div class="sf_admin_edit_help"><?php echo __('Máximo 4 caracteres') ?></div>  </div>
<br>
  <?php echo label_for('tstipmov[destip]', __($labels['tstipmov{destip}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tstipmov{destip}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tstipmov{destip}')): ?>
    <?php echo form_error('tstipmov{destip}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tstipmov, 'getDestip', array (
  'size' => 40,
  'maxlength'=> 40,
  'control_name' => 'tstipmov[destip]',
)); echo $value ? $value : '&nbsp;' ?>
   <div class="sf_admin_edit_help"><?php echo __('Solo Texto') ?></div>  </div>
<br>
  <?php echo label_for('tstipmov[debcre]', __($labels['tstipmov{debcre}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tstipmov{debcre}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tstipmov{debcre}')): ?>
    <?php echo form_error('tstipmov{debcre}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php if($tstipmov->getDebcre()=='C') $val = true; else $val=false; ?>
  <?php echo "Debito ".radiobutton_tag('tstipmov[debcre]', 'D', !$val) ?>
  <?php echo "  Credito ".radiobutton_tag('tstipmov[debcre]', 'C', $val) ?>
    </div>

<br>
  <?php echo label_for('tstipmov[escheque]', __($labels['tstipmov{escheque}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tstipmov{escheque}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tstipmov{escheque}')): ?>
    <?php echo form_error('tstipmov{escheque}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_checkbox_tag($tstipmov, 'getEscheque', array (
  'control_name' => 'tstipmov[escheque]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

<fieldset id="sf_fieldset_none" class="">
<legend><?echo __('Datos Contable') ?></legend>
<div class="form-row">
  <?php echo label_for('tstipmov[codcon]', __($labels['tstipmov{codcon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tstipmov{codcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tstipmov{codcon}')): ?>
    <?php echo form_error('tstipmov{codcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tstipmov, 'getCodcon', array (
  'size' => 32,
  'maxlength'=> $loncta,
  'control_name' => 'tstipmov[codcon]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaracontabilidad')",
  'onBlur'=> remote_function(array(
        'url'      => 'tesdeftipmov/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'condition' => "$('tstipmov_codcon').value != ''",
          'with' => "'ajax=1&cajtexmos=tstipmov_descta&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?> <?php echo input_hidden_tag('cargable', '') ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Pagtipret/clase/Contabb/frame/sf_admin_edit_form/obj1/tstipmov_descta/obj2/tstipmov_codcon/campo1/descta/campo2/codcta')?>
    </div>
<br>
  <?php echo label_for('tstipmov[descta]', __($labels['tstipmov{descta}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('tstipmov{descta}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tstipmov{descta}')): ?>
    <?php echo form_error('tstipmov{descta}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tstipmov, 'getDescta', array (
  'disabled' => true,
  'size'=>60,
  'control_name' => 'tstipmov[descta]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

</div>
</fieldset>

<?php include_partial('edit_actions', array('tstipmov' => $tstipmov)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($tstipmov->getId()): ?>
<?php echo button_to(__('delete'), 'tesdeftipmov/delete?id='.$tstipmov->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
