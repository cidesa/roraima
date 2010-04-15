<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/21 10:44:21
?>
<?php echo form_tag('nomconceptoscompensacion/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($npconcomp, 'getId') ?>
<?php use_helper('Javascript', 'PopUp', 'Grid', 'Date') ?>
<?php echo javascript_include_tag('dFilter', 'ajax', 'tools', 'observe') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Conceptos de Compensación por Nómina')?></legend>
<div class="form-row">
  <?php echo label_for('npconcomp[codnom]', __($labels['npconcomp{codnom}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npconcomp{codnom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npconcomp{codnom}')): ?>
    <?php echo form_error('npconcomp{codnom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo input_auto_complete_tag('npconcomp[codnom]', $npconcomp->getCodnom(),
    'nomconceptoscompensacion/autocomplete?ajax=1',  array('autocomplete' => 'off','maxlength' => 3, 'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('npconcomp_codnom').value=cadena",
	'onBlur'=> remote_function(array(
			  'url'      => 'nomconceptoscompensacion/ajax',
			  'complete' => 'AjaxJSON(request, json)',
			  'condition' => "$('npconcomp_codnom').value != '' && $('id').value == ''",
  			  'with' => "'ajax=1&cajtexmos=npconcomp_nomnom&cajtexcom=npconcomp_codnom&codigo='+this.value"
			  ))),
     array('use_style' => 'true')
  )
?>
 <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Npdefcpt_nomconceptossalariointegral/clase/Npnomina/frame/sf_admin_edit_form/obj1/npconcomp_codnom/obj2/npconcomp_nomnom/campo1/codnom/campo2/nomnom/param1/1','','','botoncat')?>

<?php $value = object_input_tag($npconcomp, 'getNomnom', array (
  'size' => 50,
  'control_name' => 'npconcomp[nomnom]',
  'disabled' => 'true'
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('npconcomp[codcon]', __($labels['npconcomp{codcon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npconcomp{codcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npconcomp{codcon}')): ?>
    <?php echo form_error('npconcomp{codcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

    <?php $value = object_input_tag($npconcomp, 'getCodcon', array (
  'size' => 10,
  'control_name' => 'npconcomp[codcon]',
  'readonly'  =>  $npconcomp->getId()!='' ? true : false ,
  'maxlength' => 3,
  'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('npconcomp_codcon').value=cadena",
  'onBlur'=> remote_function(array(
			  'url'      => 'nomconceptosprimas/ajax',
			  'complete' => 'AjaxJSON(request, json), verificar()',
			  'condition' => "$('npconpri_codcon').value != '' && $('id').value == ''",
  			  'with' => "'ajax=2&cajtexmos=npconcomp_nomcon&nomina='+$('npconcomp_codnom').value+'&cajtexcom=npconcomp_codcon&codigo='+this.value"
			  ))
)); echo $value ? $value : '&nbsp;' ?>

 <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Npdefcpt_nomconceptossalariointegral2/clase/Npdefcpt/frame/sf_admin_edit_form/obj1/npconcomp_codcon/obj2/npconcomp_nomcon/campo1/codcon/campo2/nomcon/param1/'+$('npconcomp_codnom').value+'",'','','botoncat')?>
<?php echo input_hidden_tag('existe', '') ?>
<?php $value = object_input_tag($npconcomp, 'getNomcon', array (
  'size' => 50,
  'control_name' => 'npconcomp[nomcon]',
  'disabled' => 'true'
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('npconcomp' => $npconcomp)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($npconcomp->getId()): ?>
<?php echo button_to(__('delete'), 'nomconceptoscompensacion/delete?id='.$npconcomp->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
<script language="JavaScript" type="text/javascript">
  deshabilitar();

  function deshabilitar()
  {
  	var id='<?php echo $npconcomp->getId()?>';
  	if (id!="")
  	{
     $$('.botoncat')[0].disabled=true;
  	 $$('.botoncat')[1].disabled=true;
  	}
  }

  function verificar()
  {
  	if ($('existe').value=='S')
  	{
  	  alert('El Concepto no esta asociado a la Nomina');
  	  $('npconcomp_codcon').value="";
  	}

  	if ($('existe').value=='SS')
  	{
  	  alert('El Concepto no existe');
  	  $('npconcomp_codcon').value="";
  	}
  }
</script>