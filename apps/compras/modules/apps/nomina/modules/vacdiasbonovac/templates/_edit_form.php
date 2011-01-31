<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/09/04 10:27:38
?>
<?php echo form_tag('vacdiasbonovac/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php use_helper('Javascript','PopUp','Grid','Date','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools','nomina/vacdiasbonovac') ?>

<?php echo object_input_hidden_tag($npvacjorlab, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('npvacjorlab[codnom]', __($labels['npvacjorlab{codnom}']), 'class="required" ') ?>
  <?php if ($sf_request->hasError('npvacjorlab{codnom}')): ?> form-error<?php endif; ?>
  <?php if ($sf_request->hasError('npvacjorlab{codnom}')): ?>
    <?php echo form_error('npvacjorlab{codnom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo input_tag('npvacjorlab[codnom]', $npvacjorlab->getCodnom(),
    	array('maxlength' => 6,
			  'onBlur'=> remote_function(array(
			  'url'      => 'vacdiasbonovac/ajax',
			  'condition' => "$('npvacjorlab_codnom').value != '' && $('id').value == ''",
			  'complete' => 'AjaxJSON(request, json)',
  			  'with' => "'ajax=2&cajtexmos1=npvacjorlab_nomnom&codnom='+this.value"
			  )))
  )
?>

   <?php if (!$npvacjorlab->getId()) echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Npnomina_Presnomdefpre/clase/Npnomina/frame/sf_admin_edit_form/obj1/npvacjorlab_codnom/obj2/npvacjorlab_nomnom/campo1/codnom/campo2/nomnom/param1/','','','botoncat');?>

 <?php $value = object_input_tag($npvacjorlab, 'getNomnom', array (
  'size' => 50,
  'disabled' => true,
  'style' => "border-style:none;",
  'control_name' => 'npvacjorlab[nomnom]',
)); echo $value ? $value : '&nbsp;' ?>

</div>
</fieldset>
<br>
<fieldset>
<legend><?php echo __('Jornada Laboral')?></legend>
<div class="form-row">
<table>
<tr>
<td>

   <?php echo label_for('npvacjorlab[lunes]', __($labels['npvacjorlab{lunes}']), 'class="required"  Style="width:100px"') ?>
  <div class="content<?php if ($sf_request->hasError('npvacjorlab{lunes}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npvacjorlab{lunes}')): ?>
    <?php echo form_error('npvacjorlab{lunes}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php $value = object_checkbox_tag($npvacjorlab, 'getLunes', array (
  'control_name' => 'npvacjorlab[lunes]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</td>
<td>

 <?php echo label_for('npvacjorlab[martes]', __($labels['npvacjorlab{martes}']), 'class="required"  Style="width:100px"') ?>
  <div class="content<?php if ($sf_request->hasError('npvacjorlab{martes}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npvacjorlab{martes}')): ?>
    <?php echo form_error('npvacjorlab{martes}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php $value = object_checkbox_tag($npvacjorlab, 'getMartes', array (
  'control_name' => 'npvacjorlab[martes]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

</td>
<td>
     <?php echo label_for('npvacjorlab[miercoles]', __($labels['npvacjorlab{miercoles}']), 'class="required"  Style="width:100px"') ?>
  <div class="content<?php if ($sf_request->hasError('npvacjorlab{miercoles}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npvacjorlab{miercoles}')): ?>
    <?php echo form_error('npvacjorlab{miercoles}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php $value = object_checkbox_tag($npvacjorlab, 'getMiercoles', array (
  'control_name' => 'npvacjorlab[miercoles]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</td>
<td>
     <?php echo label_for('npvacjorlab[jueves]', __($labels['npvacjorlab{jueves}']), 'class="required"  Style="width:100px"') ?>
  <div class="content<?php if ($sf_request->hasError('npvacjorlab{jueves}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npvacjorlab{jueves}')): ?>
    <?php echo form_error('npvacjorlab{jueves}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php $value = object_checkbox_tag($npvacjorlab, 'getJueves', array (
  'control_name' => 'npvacjorlab[jueves]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>


</td>
<td>
     <?php echo label_for('npvacjorlab[viernes]', __($labels['npvacjorlab{viernes}']), 'class="required"  Style="width:100px"') ?>
  <div class="content<?php if ($sf_request->hasError('npvacjorlab{viernes}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npvacjorlab{viernes}')): ?>
    <?php echo form_error('npvacjorlab{viernes}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php $value = object_checkbox_tag($npvacjorlab, 'getViernes', array (
  'control_name' => 'npvacjorlab[viernes]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</td>
<td>

     <?php echo label_for('npvacjorlab[sabado]', __($labels['npvacjorlab{sabado}']), 'class="required"  Style="width:100px"') ?>
  <div class="content<?php if ($sf_request->hasError('npvacjorlab{sabado}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npvacjorlab{sabado}')): ?>
    <?php echo form_error('npvacjorlab{sabado}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php $value = object_checkbox_tag($npvacjorlab, 'getSabado', array (
  'control_name' => 'npvacjorlab[sabado]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</td>
<td>
     <?php echo label_for('npvacjorlab[domingo]', __($labels['npvacjorlab{domingo}']), 'class="required"  Style="width:100px"') ?>
  <div class="content<?php if ($sf_request->hasError('npvacjorlab{domingo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npvacjorlab{domingo}')): ?>
    <?php echo form_error('npvacjorlab{domingo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php $value = object_checkbox_tag($npvacjorlab, 'getDomingo', array (
  'control_name' => 'npvacjorlab[domingo]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    </td>
    </div>
    </tr>
</table>
</div>
</fieldset>



<?php include_partial('edit_actions', array('npvacjorlab' => $npvacjorlab)) ?>

</form>

<ul class="sf_admin_actions">
</ul>


