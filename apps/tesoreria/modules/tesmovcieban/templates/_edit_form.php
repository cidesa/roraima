<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _edit_form.php 40081 2010-08-11 13:09:35Z cramirez $
 */
// date: 2007/07/17 15:34:16
?>
<?php echo form_tag('tesmovcieban/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php use_helper('Javascript','Grid','wait') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools') ?>
<?php echo object_input_hidden_tag($tsconcil, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos del Cierre')?></legend>
<div class="form-row">
  <?php echo label_for('labelnrocuenta', __('Numero de Cuenta'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nrocuenta')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nrocuenta')): ?>
    <?php echo form_error('nrocuenta', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>


<?php echo input_auto_complete_tag('nrocuenta', '',
    'tesmovcieban/autocomplete?ajax=1',  array('autocomplete' => 'off','size' => 25, 'maxlength' => 20,
	'onBlur'=> remote_function(array(
			  'url'      => 'tesmovcieban/ajax',
			  'complete' => 'AjaxJSON(request, json)',
			  'condition' => "$('nrocuenta').value != '' && $('id').value == ''",
  			  'with' => "'ajax=1&cajtexmos=descta&cajtexcom=nrocuenta&codigo='+this.value",

			  ))),
     array('use_style' => 'true')
  )
?>
&nbsp;
<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Tsconcil_tesmovconban/clase/Tsdefban/frame/sf_admin_edit_form/obj1/descta/obj2/nrocuenta/campo1/nomcue/campo2/numcue/param1/1')?>
  <?php $value = input_tag('descta', '', array (
  'disabled' => true,
  'control_name' => 'descta',
  'size' => 50,
  'maxlength' => 100,
)); echo $value ? $value : '&nbsp;' ?>

    </div>

<br>

  <?php echo label_for('labelmes', __('Mes a Cerrar'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('labelmes')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('labelmes')): ?>
    <?php echo form_error('labelmes', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <select name="combomes" id="combomes">
	  <option value="01">Enero</option>
	  <option value="02">Febrero</option>
	  <option value="03">Marzo</option>
	  <option value="04">Abril</option>
	  <option value="05">Mayo</option>
	  <option value="06">Junio</option>
	  <option value="07">Julio</option>
	  <option value="08">Agosto</option>
	  <option value="09">Septiembre</option>
	  <option value="10">Octubre</option>
	  <option value="11">Noviembre</option>
	  <option value="12">Diciembre</option>
  </select>

    </div>

<br>

  <?php echo label_for('labelano', __('Del Año'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('labelano')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('labelano')): ?>
    <?php echo form_error('labelano', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<? echo input_tag('ano','',array (
  'control_name' => 'ano',
  'size' => 5,
  'maxlength' => 4,
  'value'=> $sf_user->getAttribute('anofis','','tesmovcieban') ,
)); ?>

    </div>

<br>

<div align="center">
<table>
  <tr>
    <th width="95px"></th>
    <th><input type="button" value="Cerrar" onClick="cerrar()"></th>
    <th><input type="button" value="Abrir" onClick="abrir()"></th>
  </tr>
</table>

</div>

</fieldset>

<?php include_partial('edit_actions', array('tsconcil' => $tsconcil)) ?>

</form>

<script type="text/javascript">
<!--
function cerrar()
{
	f=document.sf_admin_edit_form;

	f.action="cerrar";
	f.submit();
}

function abrir()
{
	f=document.sf_admin_edit_form;

	f.action="abrir";
	f.submit();
}
//-->
</script>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($tsconcil->getId()): ?>
<?php echo button_to(__('delete'), 'tesmovcieban/delete?id='.$tsconcil->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
