<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/16 09:30:03
?>
<?php echo form_tag('almregrec/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo javascript_include_tag('ajax','tools','observe') ?>
<?php echo object_input_hidden_tag($carecaud, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Recaudos') ?></legend>
<div class="form-row">
  <?php echo label_for('carecaud[codrec]', __($labels['carecaud{codrec}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('carecaud{codrec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('carecaud{codrec}')): ?>
    <?php echo form_error('carecaud{codrec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($carecaud, 'getCodrec', array (
  'size' => 10,
  'maxlength' => 10,
  'readonly'  =>  $carecaud->getId()!='' ? true : false ,
  'control_name' => 'carecaud[codrec]',
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(10, '0',0);document.getElementById('carecaud_codrec').value=valor;",
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('carecaud[desrec]', __($labels['carecaud{desrec}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('carecaud{desrec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('carecaud{desrec}')): ?>
    <?php echo form_error('carecaud{desrec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($carecaud, 'getDesrec', array (
  'size' => '80x5',
  'maxlength' => 100,
  'control_name' => 'carecaud[desrec]',
  'onKeyUp'=>"javascript:cadena=this.value;cadena=cadena.toUpperCase();this.value=cadena;",
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

<table with="100%" border="0">
<tr>
<th>
<?php echo label_for('carecaud[codtiprec]', __($labels['carecaud{codtiprec}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('carecaud{codtiprec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('carecaud{codtiprec}')): ?>
    <?php echo form_error('carecaud{codtiprec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo input_auto_complete_tag('carecaud[codtiprec]', $carecaud->getCodtiprec(),
    'almregrec/autocomplete?ajax=1',  array('autocomplete' => 'off',
	'maxlength' => 4,
	'readonly'  =>  $carecaud->getId()!='' ? true : false ,
	'onBlur'=> remote_function(array(
			  'url'      => 'almregrec/ajax',
			  'complete' => 'AjaxJSON(request, json)',
			  'condition' => "$('carecaud_codtiprec').value != '' && $('id').value == ''",
  			  'with' => "'ajax=1&cajtexcom=carecaud_codtiprec&cajtexmos=carecaud_destiprec&codigo='+this.value"
			  ))),
     array('use_style' => 'true')
  )
?>
</div>
</th>
<th valign="top">&nbsp;&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Catiprec_Almregrec/clase/Catiprec/frame/sf_admin_edit_form/obj1/carecaud_codtiprec/obj2/carecaud_destiprec','','','botoncat')?>
&nbsp;&nbsp;
</th>
<th><?php $value = object_input_tag($carecaud, 'getDestiprec', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'carecaud[destiprec]',
)); echo $value ? $value : '&nbsp;' ?>
</th>
</tr>
</table>

<br>

<table>
<tr>
<th><fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Limitante') ?></legend>
<div class="form-row">
<?
if ($carecaud->getLimrec()=='S')	{
  ?><?php echo radiobutton_tag('carecaud[limrec]', 'S', true)        ."Si".'&nbsp;&nbsp;';
		  echo radiobutton_tag('carecaud[limrec]', 'N', false)."   No";?>
		<?

}else{
	echo radiobutton_tag('carecaud[limrec]', 'S', false)        ."Si".'&nbsp;&nbsp;';
	echo radiobutton_tag('carecaud[limrec]', 'N', true)."   No";

} ?> </div></fieldset></th>
<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>
<?php echo label_for('carecaud[canutr]', __($labels['carecaud{canutr}']),'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('carecaud{canutr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('carecaud{canutr}')): ?>
    <?php echo form_error('carecaud{canutr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($carecaud, array('getCanutr',true), array (
  'size' => 7,
  'control_name' => 'carecaud[canutr]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>&nbsp;&nbsp;UT
    </div></th>
</tr>
</table>
</fieldset>

<?php include_partial('edit_actions', array('carecaud' => $carecaud)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($carecaud->getId()): ?>
<?php echo button_to(__('delete'), 'almregrec/delete?id='.$carecaud->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

<script language="JavaScript" type="text/javascript">
  var idf='<?php echo $carecaud->getId()?>';
  var mansolocor='<?php echo $mansolocor; ?>';
  if (idf!="")
  {
    $$('.botoncat')[0].disabled=true;
  }else {
  	if (mansolocor=='S')
  	{
  		$('carecaud_codrec').readOnly=true;
  	}
  }
</script>
