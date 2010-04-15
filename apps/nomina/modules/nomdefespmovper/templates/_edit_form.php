<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/01/25 16:28:42
?>
<?php echo form_tag('nomdefespmovper/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($npdefmov, 'getId') ?>
<?php echo javascript_include_tag('tools','observe','ajax','dFilter') ?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Tipos de Nómina')?></legend>
<div class="form-row">
  <?php echo label_for('npdefmov[codnom]', __($labels['npdefmov{codnom}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npdefmov{codnom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdefmov{codnom}')): ?>
    <?php echo form_error('npdefmov{codnom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo input_auto_complete_tag('npdefmov[codnom]', $npdefmov->getCodnom(),
    'nomdefespmovper/autocomplete?ajax=1',  array('autocomplete' => 'off','maxlength' => 3,
    'readonly'  =>  $npdefmov->getId()!='' ? true : false ,
	'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('npdefmov_codnom').value=cadena",
 	'onBlur'=> remote_function(array(
              'update'  => 'divGrid',
			  'url'      => 'nomdefespmovper/ajax',
			  'complete' => 'AjaxJSON(request, json), alerta()',
			  'condition' => "$('npdefmov_codnom').value != '' && $('id').value == ''",
  			  'with' => "'ajax=1&cajtexmos=npdefmov_nomnom&cajtexcom=npdefmov_codnom&codigo='+this.value"
			  ))),
     array('use_style' => 'true')
  )?>&nbsp;
<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Npnomina_nomdefespvar/clase/Npnomina/frame/sf_admin_edit_form/obj1/npdefmov_codnom/obj2/npdefmov_nomnom/campo1/codnom/campo2/nomnom','','','botoncat')?>

 <?php $value = object_input_tag($npdefmov, 'getNomnom', array (
  'disabled' => true,
  'size' => 80,
  'control_name' => 'npdefmov[nomnom]',
)); echo $value ? $value : '&nbsp;' ?> <?php echo input_hidden_tag('dupli', '') ?>
    </div>
</div>
</fieldset>

<br>

<div id="divGrid">
<?php echo grid_tag($obj);?>
</div>

</div>
</fieldset>

<?php include_partial('edit_actions', array('npdefmov' => $npdefmov)) ?>

</form>

<ul class="sf_admin_actions">
  </ul>

<script language="JavaScript" type="text/javascript">
function alerta()
  {
  	if ($('dupli').value=='S')
  	{
  	  alert('La Nomina ya esta registrada consultela desde la lista para aplicar nuevos cambios');
  	  $('npdefmov_codnom').value="";
  	}
  }
</script>
