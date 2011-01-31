<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/26 19:21:28
?>
<?php echo form_tag('nomnommovnomcon/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript','PopUp','Grid','Date','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools') ?>


<?php echo object_input_hidden_tag($npasiconemp, 'getId') ?>

<fieldset>
<h2>Tipo de N&oacute;mina</h2>
<div class="form-row">

 <strong>C&oacute;digo</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <?php $value = object_input_tag($npasiconemp, 'getCodnom', array (
  'size' => 10,
  'control_name' => 'codigonomina',
  'maxlength' => 3,
  'onBlur'=> remote_function(array(
        'url'      => 'nomnommovnomconcar/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=1&cajtexmos=codigonomina&cajtexcom=nombrenomina&codigo='+this.value"
        ))

)); echo $value ? $value : '&nbsp;' ?>&nbsp;

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Npdefmov_nomnommovnomcon/clase/Npnomina/frame/sf_admin_edit_form/obj1/codigonomina/obj2/nombrenomina/campo1/codnom/campo2/nomnom/param1/")?>

<?php $value = object_input_tag($npasiconemp, 'getNomnom', array (
  'size' => 50,
  'control_name' => 'nombrenomina',
  'maxlength' => '40,',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>

</div>

</fieldset>


<fieldset>
<h2>Conceptos</h2>
<div class="form-row">


  <?php echo label_for('npasiconemp[codcon]', __($labels['npasiconemp{codcon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npasiconemp{codcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasiconemp{codcon}')): ?>
    <?php echo form_error('npasiconemp{codcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npasiconemp, 'getCodcon', array (
  'size' => 10,
  'control_name' => 'npasiconemp[codcon]',
  'maxlength' => 3,
  'onBlur'=> remote_function(array(
        'update'   => 'grid',
        'url'      => 'nomnommovnomcon/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=2&cajtexcom=nombreconcepto&codigonomina='+$('codigonomina').value+'&codigoconcepto='+this.value"
  )),
)); echo $value ? $value : '&nbsp;' ?>&nbsp;



<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Npdefcpt_nomnommovnomcon/clase/Npdefcpt/frame/sf_admin_edit_form/obj1/npasiconemp_codcon/obj2/nombreconcepto/campo1/codcon/campo2/nomcon/param1/'+$('codigonomina').value+'")?>

<?php $value = object_input_tag($npasiconemp, 'getNomcon', array (
  'size' => 50,
  'control_name' => 'nombreconcepto',
  'maxlength' => '40,',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>

</div>

</div>

<div id="grid" class="form-row">
<?
//echo grid_tag($obj);
echo grid_tag_v2($npasiconemp->getGrid());
?>

</div>



</fieldset>


<?php include_partial('edit_actions', array('npasiconemp' => $npasiconemp)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($npasiconemp->getId()): ?>
<?php echo button_to(__('delete'), 'nomnommovnomcon/delete?id='.$npasiconemp->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

