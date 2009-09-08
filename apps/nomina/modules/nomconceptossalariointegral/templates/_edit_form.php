<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/21 12:29:37
?>
<?php echo form_tag('nomconceptossalariointegral/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($npnomina, 'getId') ?>
<?php echo javascript_include_tag('tools','observe','ajax','dFilter') ?>
<?php use_helper('Javascript') ?>
<?php use_helper('Grid') ?>
<?php use_helper('PopUp') ?>
<?php use_helper('SubmitClick') ?>
<?php use_helper('tabs') ?>
<?php use_helper('wait') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Conceptos de Salario Integral por Nómina')?></legend>
<div class="form-row">
  <?php echo label_for('npnomina[codnom]', __($labels['npnomina{codnom}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('npnomina{codnom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npnomina{codnom}')): ?>
    <?php echo form_error('npnomina{codnom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo input_auto_complete_tag('npnomina[codnom]', $npnomina->getCodnom(),
    'nomconceptossalariointegral/autocomplete?ajax=1',  array('autocomplete' => 'off','size' => 8, 'maxlength' => 3, 'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('npnomina_codnom').value=cadena",
    'readonly'  =>  $npnomina->getId()!='' ? true : false ,
	'onBlur'=> remote_function(array(
			  'update'   => 'grid',
			  'url'      => 'nomconceptossalariointegral/ajax',
			  'condition' => "$('npnomina_codnom').value != '' && $('id').value == ''",
			  'complete' => 'AjaxJSON(request, json)',
  			  'with' => "'ajax=1&cajtexmos=npnomina_nomnom&cajtexcom=npnomina_codnom&codigo='+this.value"
			  ))),
     array('use_style' => 'true')
  )
?>
 <?php /*echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Npdefcpt_nomconceptossalariointegral/clase/Npnomina/frame/sf_admin_edit_form/obj1/npnomina_codnom/obj2/npnomina_nomnom/campo1/codnom/campo2/nomnom/param1/1','','','botoncat') */?>

 <?php $value = object_input_tag($npnomina, 'getNomnom', array (
  'size' => 50,
  'control_name' => 'npnomina[nomnom]',
  'disabled' => 'true'
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

    </div>
</div>



<div id="grid" class="form-row">
<?
echo grid_tag($obj);
?>
<?
echo grid_tag($obj2);
?>
</div>


</fieldset>

<?php include_partial('edit_actions', array('npnomina' => $npnomina)) ?>

</form>



<script language="JavaScript" type="text/javascript">
//deshabilitar();

  function verificar()
  {
  	if ($('existe').value=='S')
  	{
  	  alert('El Concepto no esta asociado a la Nomina');
  	  $('npnomina_codcon').value="";
  	}

  	if ($('existe').value=='SS')
  	{
  	  alert('El Concepto no existe');
  	  $('npnomina_codcon').value="";
  	}
  }


  function deshabilitar()
  {
  	var id='<?php echo $npnomina->getId()?>';
  	if (id!="")
  	{
     $$('.botoncat')[0].disabled=true;
  	 //$$('.botoncat')[1].disabled=true;
  	}
  }
</script>
