<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/08/30 10:27:42
?>
<?php echo form_tag('nomdefdiaadicnom/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php echo object_input_hidden_tag($npdiaadicnom, 'getId') ?>
<?php echo javascript_include_tag('ajax','dFilter','tools','observe') ?>

<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<fieldset id="sf_fieldset_none" class="">
<legend><? echo ('Tipo de Nómina') ?></legend>
<div class="form-row">
<table>
<tr>
<th>
<?php echo label_for('npdiaadicnom[codnom]', __($labels['npdiaadicnom{codnom}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npdiaadicnom{codnom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdiaadicnom{codnom}')): ?>
    <?php echo form_error('npdiaadicnom{codnom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>


  <?php echo input_auto_complete_tag('npdiaadicnom[codnom]', $npdiaadicnom->getCodnom(),
    'nomdefdiaadicnom/autocomplete?ajax=1',  array('autocomplete' => 'off','maxlength' => 3,
    'readonly'  =>  $npdiaadicnom->getId()!='' ? true : false ,
	'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('npdiaadicnom_codnom').value=cadena",
 	'onBlur'=> remote_function(array(
              'update'  => 'divGrid',
			  'url'      => 'nomdefdiaadicnom/ajax',
			  'complete' => 'AjaxJSON(request, json),duplicados()',
			  'condition' => "$('npdiaadicnom_codnom').value != '' && $('id').value == ''",
  			  'with' => "'ajax=1&cajtexmos=npdiaadicnom_nomnom&cajtexcom=npdiaadicnom_codnom&codigo='+this.value"
			  ))),
     array('use_style' => 'true')
  )
    ?>
 </div>
</th>
<th>
<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Npdefcpt_nomdefconaho/clase/Npnomina/frame/sf_admin_edit_form/obj1/npdiaadicnom_codnom/obj2/npdiaadicnom_nomnom/campo1/codnom/campo2/nomnom/param1/1/param2/y','','','botoncat')?>
  </th>
<th>
<?php $value = object_input_tag($npdiaadicnom, 'getNomnom', array (
  'disabled' => true,
  'size'=> 60,
  'control_name' => 'npdiaadicnom[nomnom]',
)); echo $value ? $value : '&nbsp;' ?>
</th>
</tr>
</table>
</div>
</fieldset>

<br>

<div id="divGrid">
<?php echo grid_tag($obj);?>
</div>

</div>
</fieldset>

<?php include_partial('edit_actions', array('npdiaadicnom' => $npdiaadicnom)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($npdiaadicnom->getId()): ?>
<?php echo button_to(__('delete'), 'nomdefdiaadicnom/delete?id='.$npdiaadicnom->getId().'&nomina='.$npdiaadicnom->getCodnom(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

<script language="JavaScript" type="text/javascript">
var id='<?php echo $npdiaadicnom->getId()?>';
if (id)
{
 $$('.botoncat')[0].disabled=true;
}
  function duplicados()
  {
  	if ($('duplicado').value=='S')
  	{
  	  alert('La Nomina ya esta registrada consultela desde la lista para aplicar nuevos cambios');
  	  $('npconaho_codnom').value="";
  	}
  }
</script>

