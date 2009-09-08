<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/01/29 16:24:15
?>
<?php echo form_tag('presnomdefpre/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($npdefpreliq, 'getId') ?>
<?php use_helper('Javascript','PopUp','Grid','Date','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools') ?>


<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('npdefpreliq[codnom]', __($labels['npdefpreliq{codnom}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npdefpreliq{codnom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdefpreliq{codnom}')): ?>
    <?php echo form_error('npdefpreliq{codnom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npdefpreliq, 'getCodnom', array (
  'size' => 20,
  'control_name' => 'npdefpreliq[codnom]',
  'readonly' => $npdefpreliq->getId()!='' ? true : false ,
  'onBlur'=> remote_function(array(
       // 'update'   => 'mensaje',
        'condition' =>  "$('id').value == ''",
        'url'      => 'presnomdefpre/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=1&cajtexmos=npdefpreliq_nomnom&cajtexcom=npdefpreliq_codnom&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;&nbsp;&nbsp;
<?php if (!$npdefpreliq->getId()) echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Npnomina_Presnomdefpre/clase/Npnomina/frame/sf_admin_edit_form/obj1/npdefpreliq_codnom/obj2/npdefpreliq_nomnom/campo1/codnom/campo2/nomnom/param1/')?>
&nbsp;&nbsp;&nbsp;&nbsp;

  <?php $value = object_input_tag($npdefpreliq, 'getNomnom', array (
  'disabled' => true,
  'control_name' => 'npdefpreliq[nomnom]',
  'maxlength' => 100,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<div class="form-row">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo select_tag('npdefpreliq[codcon]', options_for_select($listaconceptos,$npdefpreliq->getCodcon()), array (
'disabled' => $npdefpreliq->getId()!='' ? true : false ,
'onChange'=> remote_function(array(
//    'condition' => "$('id').value == ''",
    'update'   => 'mensaje',
    'complete' => 'AjaxJSON(request, json)',
    'url'      => 'presnomdefpre/ajax',
    'script' => true,
    'with' => "'ajax=2&cod='+this.value+'&cajtexcom1='+npdefpreliq_codnom.value",
  ))));?>

</div>
<div id="mensaje">
</div>
<?
echo grid_tag($obj);
?></div>
</fieldset>

<?php include_partial('edit_actions', array('npdefpreliq' => $npdefpreliq)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($npdefpreliq->getId()): ?>
<?php echo button_to(__('delete'), 'presnomdefpre/delete?id='.$npdefpreliq->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>