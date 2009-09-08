<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/10/25 16:05:26
?>
<?php echo form_tag('tesmoslib/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($tsmovban, 'getId') ?>
<?php use_helper('DoubleList') ?>
<?php echo javascript_include_tag('ajax','tesoreria/tesmoslib') ?>

<fieldset id="sf_fieldset_none" class="">
<h2><?php echo __('Bancos') ?></h2>
<div class="form-row">
<table>
<tr>
<td>
<?php echo label_for('tsmovban[numcue]', __($labels['tsmovban{numcue}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovban{numcue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovban{numcue}')): ?>
    <?php echo form_error('tsmovban{numcue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = select_tag('numcue',$tsmovban->getCuentas(),array (
  'control_name' => 'tsmovban[numcue]',
  'multiple' => false,
  'size' => 10,
  'onclick'=> remote_function(array(
        'url'      => 'tesmoslib/ajax',
         'script'   => true,
        'complete' => 'AjaxJSON(request, json)',
          'with' => "'ajax=1&cajtexmos=nrocta&cajtexcom=nomban&codigo='+this.value",

        ))
)); echo $value ? $value : '&nbsp;' ?>
</div>
</td>
<td>
   <ul>
	<?php echo input_tag('nrocta','',array(
	'readonly' => true,
	'size' => 30
	)) ?>
    &nbsp;&nbsp;
    <strong><?php echo __('Mes:')?></strong>
	<?php echo select_tag('mes',array(
	''   => 'todos',
	'01' => '01',
	'02' => '02',
	'03' => '03',
	'04' => '04',
	'05' => '05',
	'06' => '06',
	'07' => '07',
	'08' => '08',
	'09' => '09',
	'10' => '10',
	'11' => '11',
	'12' => '12'
	)) ?>
    </ul>
    <br>
	<?php echo textarea_tag('nomban','',array(
	'readonly' => true,
	'rows'  => 3,
	'cols' => 45
	)) ?>
	<ul class="sf_admin_actions">
	  <li>
	  <?php echo submit_to_remote('Submit2', 'Buscar', array(
	     'class'    => 'sf_admin_action_filter',
	     'update'   => 'doblelista',
         'url'      => 'tesmoslib/ajax',
         'script'   => true,
         'complete' => 'AjaxJSON(request, json)',
         'with' => "'ajax=2&nrocta='+$('nrocta').value+'&mes='+$('mes').value"
    )) ?>
	   </li>
	</ul>
</td>
</tr>
</table>
</div>
</fieldset>

<br>

<div id="doblelista">
<div style="display:none">
<fieldset id="sf_fieldset_none" class="">
<h2><?php echo __('Movimientos') ?></h2>
<div class="form-row">
<table>
<tr>
<td>
<?php echo label_for('tsmovban[libros_selec]', '', '') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovban{libros_selec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovban{libros_selec}')): ?>
    <?php echo form_error('tsmovban{libros_selec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>


  <?php $value = object_admin_double_list_criteria($c,$tsmovban, 'getLibrosSelec', array (
  'control_name' => 'tsmovban[libros_selec]',
  'through_class' => 'Tsmovlib',
  'unassociated_label' => 'Libros',
  'associated_label' => 'Seleccionados',
),$callback); echo $value ? $value : '&nbsp;' ?>
    </div>
</td>
</tr>
</table>
</div>
</fieldset>
</div>
</div>
<div style="display:none">
<?php include_partial('edit_actions', array('tsmovban' => $tsmovban)) ?>
</div>
</form>


