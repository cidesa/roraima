<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/09/10 16:47:14
?>
<?php echo form_tag('nomdefespciu/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($npciudad, 'getId') ?>
<?php echo javascript_include_tag('tools','ajax','dFilter','observe') ?>

<fieldset id="sf_fieldset_none" class="">
<div class="form-row">

<fieldset id="sf_fieldset_none" class="">
<legend><h2><?php echo __('Estado')?></h2></legend>
<div class="form-row">
  <?php echo label_for('npciudad[codpai]', __($labels['npciudad{codpai}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npciudad{codpai}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npciudad{codpai}')): ?>
    <?php echo form_error('npciudad{codpai}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo input_auto_complete_tag('npciudad[codpai]', $npciudad->getCodpai(),
    'nomdefespciu/autocomplete?ajax=1',  array('autocomplete' => 'off','maxlength' => 4,
    'readonly'  =>  $npciudad->getId()!='' ? true : false ,
    'size ' => 5,
	'onBlur'=> remote_function(array(
			  'url'      => 'nomdefespciu/ajax',
			  'complete' => 'AjaxJSON(request, json)',
			  'condition' => "$('npciudad_codpai').value != '' && $('id').value == ''",
  			  'with' => "'ajax=1&cajtexmos=npciudad_nompai&cajtexcom=npciudad_codpai&codigo='+this.value"
			  ))),
     array('use_style' => 'true')
  )
?>
&nbsp;&nbsp;
<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Nppais_Nomdefespest/clase/Nppais/frame/sf_admin_edit_form/obj1/npciudad_codpai/obj2/npciudad_nompai/campo1/codpai/campo2/nompai','','','botoncat')?>
   </div>

<br>

 <?php echo label_for('npciudad[nompai]', __($labels['npciudad{nompai}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npciudad{nompai}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npciudad{nompai}')): ?>
    <?php echo form_error('npciudad{nompai}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npciudad, 'getNompai', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'npciudad[nompai]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<br>


<fieldset id="sf_fieldset_none" class="">
<legend><h2><?php echo __('Municipio')?></h2></legend>
<div class="form-row">
  <?php echo label_for('npciudad[codedo]', __($labels['npciudad{codedo}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npciudad{codedo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npciudad{codedo}')): ?>
    <?php echo form_error('npciudad{codedo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npciudad, 'getCodedo', array (
  'size' => 5,
  'control_name' => 'npciudad[codedo]',
  'maxlength' => 4,
  'readonly'  =>  $npciudad->getId()!='' ? true : false ,
   'onBlur'=> remote_function(array(
	'url'      => 'nomdefespciu/ajax',
	'complete' => 'AjaxJSON(request, json), verificar()',
	'before' => 'valor=this.value; valor=valor.pad(4, "0",0);$("npciudad_codedo").value=valor',
	'condition' => "$('npciudad_codedo').value != '' && $('id').value == ''",
  	'with' => "'ajax=2&cajtexmos=npciudad_nomedo&cajtexcom=npciudad_codedo&pais='+$('npciudad_codpai').value+'&codigo='+this.value"
	))
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;
<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Npestado_Nomdefespciu/clase/Npestado/frame/sf_admin_edit_form/obj1/npciudad_codedo/obj2/npciudad_nomedo/campo1/codedo/campo2/nomedo/param1/'+$('npciudad_codpai').value+'",'','','botoncat')?>
 <?php echo input_hidden_tag('existe', '') ?>  </div>

<br>

  <?php echo label_for('npciudad[nomedo]', __($labels['npciudad{nomedo}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npciudad{nomedo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npciudad{nomedo}')): ?>
    <?php echo form_error('npciudad{nomedo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npciudad, 'getNomedo', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'npciudad[nomedo]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<br>

<fieldset id="sf_fieldset_none" class="">
<legend><h2><?php echo __('Parroquia')?></h2></legend>
<div class="form-row">
  <?php echo label_for('npciudad[codciu]', __($labels['npciudad{codciu}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npciudad{codciu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npciudad{codciu}')): ?>
    <?php echo form_error('npciudad{codciu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npciudad, 'getCodciu', array (
  'size' => 5,
  'maxlength' => 4,
  'control_name' => 'npciudad[codciu]',
  'readonly'  =>  $npciudad->getId()!='' ? true : false ,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);$('npciudad_codciu').value=valor",
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('npciudad[nomciu]', __($labels['npciudad{nomciu}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npciudad{nomciu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npciudad{nomciu}')): ?>
    <?php echo form_error('npciudad{nomciu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npciudad, 'getNomciu', array (
  'size' => 60,
  'maxlength' => 100,
  'control_name' => 'npciudad[nomciu]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

</div>
</fieldset>

<?php include_partial('edit_actions', array('npciudad' => $npciudad)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($npciudad->getId()): ?>
<?php echo button_to(__('delete'), 'nomdefespciu/delete?id='.$npciudad->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
<script language="JavaScript" type="text/javascript">
  var id='<?php echo $npciudad->getId()?>';
  if (id!='')
  {
    $$('.botoncat')[0].disabled=true;
    $$('.botoncat')[1].disabled=true;
  }
  function verificar()
  {
  	if ($('existe').value=='N')
  	{
  	  alert('El Municipio no Existe o no esta asociado al Estado');
  	  $('npciudad_codedo').value="";
  	}
  }
</script>
