<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/11/15 15:09:15
?>
<?php echo form_tag('vacdiadis/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($npvacdiadis, 'getId') ?>
<?php use_helper('Javascript','wait','Grid','PopUp','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools','observe','nomina/vacdiasbonovac') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Nomina')?></legend>
<br>
<div class="form-row">
  <?php echo label_for('npvacdiadis[codnom]', __($labels['npvacdiadis{codnom}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('npvacdiadis{codnom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npvacdiadis{codnom}')): ?>
    <?php echo form_error('npvacdiadis{codnom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php $value = object_input_tag($npvacdiadis, 'getCodnom',array (
  'size' => 20,
  'readonly' => $npvacdiadis->getId()!='' ? true : false ,
  'control_name' => 'npvacdiadis[codnom]',
  'onBlur'=> remote_function(array(
          'update'   => 'mensaje',
          'condition' =>  "$('id').value == ''",
          'url'      => 'vacdiadis/ajax',
          'complete' => 'AjaxJSON(request, json)',
          'script' => true,
          'with' => "'ajax=1&cajtexmos=npvacdiadis_nomnom&cajtexcom=npvacdiadis_codnom&codigo='+this.value",
        )),
  )); echo $value ? $value : '&nbsp;'?>

  &nbsp;&nbsp;&nbsp;
 <?php if (!$npvacdiadis->getId()) echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Npvacdiadis_vacdiadis/clase/Npnomina/frame/sf_admin_edit_form/obj1/npvacdiadis_codnom/obj2/npvacdiadis_nomnom/campo1/codnom/campo2/nomnom')?>
&nbsp;&nbsp;&nbsp;&nbsp;

 <?php $value = object_input_tag($npvacdiadis, 'getNomnom', array (
  'disabled' => true,
  'style' => "border-style:none;",
   'size'=> 60,
  'control_name' => 'npvacdiadis[nomnom]',
)); echo $value ? $value : '&nbsp;' ?></div>
</div>

<div id="mensaje">
</div>
</fieldset>
<br>
<?
echo grid_tag($obj);
?>



<?php include_partial('edit_actions', array('npvacdiadis' => $npvacdiadis)) ?>

</form>
<ul class="sf_admin_actions">
  </ul>