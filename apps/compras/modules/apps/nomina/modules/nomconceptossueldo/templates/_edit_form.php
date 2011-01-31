<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/24 18:38:50
?>
<?php echo form_tag('nomconceptossueldo/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($npconsueldo, 'getId') ?>
<?php echo javascript_include_tag('tools','ajax','dFilter','observe') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Conceptos de Sueldo para Reportes por Nómina')?></legend>
<div class="form-row">
<?php echo label_for('npconsueldo[codnom]', __($labels['npconsueldo{codnom}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('npconsueldo{codnom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npconsueldo{codnom}')): ?>
    <?php echo form_error('npconsueldo{codnom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo input_auto_complete_tag('npconsueldo[codnom]', $npconsueldo->getCodnom(),
    'nomconceptossueldo/autocomplete?ajax=1',  array('autocomplete' => 'off','maxlength' => 3, 'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('npconsueldo_codnom').value=cadena",
    'readonly'  =>  $npconsueldo->getId()!='' ? true : false ,
	'onBlur'=> remote_function(array(
			  'url'      => 'nomconceptossueldo/ajax',
			  'complete' => 'AjaxJSON(request, json)',
			  'condition' => "$('npconsueldo_codnom').value != '' && $('id').value == ''",
  			  'with' => "'ajax=1&cajtexmos=npconsueldo_nomnom&cajtexcom=npconsueldo_codnom&codigo='+this.value"
			  ))),
     array('use_style' => 'true')
  )
?>
  <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Npdefcpt_nomconceptossalariointegral/clase/Npnomina/frame/sf_admin_edit_form/obj1/npconsueldo_codnom/obj2/npconsueldo_nomnom/campo1/codnom/campo2/nomnom/param1/A','','','botoncat')?>

  <?php $value = object_input_tag($npconsueldo, 'getNomnom', array (
  'size' => 50,
  'disabled' => true,
  'control_name' => 'npconsueldo[nomnom]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

<?php echo label_for('npconsueldo[codcon]', __($labels['npconsueldo{codcon}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('npconsueldo{codcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npconsueldo{codcon}')): ?>
    <?php echo form_error('npconsueldo{codcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npconsueldo, 'getCodcon', array (
  'size' => 10,
  'control_name' => 'npconsueldo[codcon]',
  'readonly'  =>  $npconsueldo->getId()!='' ? true : false ,
  'maxlength' => 3,
  'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('npconsueldo_codcon').value=cadena",
  'onBlur'=> remote_function(array(
			  'url'      => 'nomconceptossueldo/ajax',
			  'complete' => 'AjaxJSON(request, json), verificar()',
			  'condition' => "$('npconsueldo_codcon').value != '' && $('id').value == ''",
  			  'with' => "'ajax=2&cajtexmos=npconsueldo_nomcon&nomina='+$('npconsueldo_codnom').value+'&cajtexcom=npconsueldo_codcon&codigo='+this.value"
			  ))
  )); echo $value ? $value : '&nbsp;' ?>

  <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Npdefcpt_nomconceptossalariointegral2/clase/Npdefcpt/frame/sf_admin_edit_form/obj1/npconsueldo_codcon/obj2/npconsueldo_nomcon/campo1/codcon/campo2/nomcon/param1/'+$('npconsueldo_codnom').value+'",'','','botoncat')?>
<?php echo input_hidden_tag('existe', '') ?>
  <?php $value = object_input_tag($npconsueldo, 'getNomcon', array (
  'size' => 50,
  'disabled' => true,
  'control_name' => 'npconsueldo[nomcon]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<?php include_partial('edit_actions', array('npconsueldo' => $npconsueldo)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($npconsueldo->getId()): ?>
<?php echo button_to(__('delete'), 'nomconceptossueldo/delete?id='.$npconsueldo->getId(), array (
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
  	var id='<?php echo $npconsueldo->getId()?>';
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
  	  $('npconsueldo_codcon').value="";
  	}

  	if ($('existe').value=='SS')
  	{
  	  alert('El Concepto no existe');
  	  $('npconsueldo_codcon').value="";
  	}
  }
</script>
