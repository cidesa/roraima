<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/16 11:39:26
?>
<?php echo form_tag('almdesp/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Object', 'Validation', 'Javascript', 'Grid') ?>
<?php echo javascript_include_tag('dFilter', 'ajax', 'compras/almdesp', 'tools','observe') ?>

<?php echo object_input_hidden_tag($cadphart, 'getId') ?>
<?php echo input_hidden_tag('verificaexisydisp', '') ?>
<?php echo input_hidden_tag('mensaje', '') ?>
<?php echo input_hidden_tag('existeubicacion', '') ?>
<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos del Despacho') ?></legend>
<div class="form-row">
<table>
<tr>
<th>
<?php echo label_for('cadphart[dphart]', __($labels['cadphart{dphart}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('cadphart{dphart}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadphart{dphart}')): ?>
    <?php echo form_error('cadphart{dphart}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php $value = object_input_tag($cadphart, 'getDphart', array (
  'size' => 15,
  'maxlegth' => 8,
  'control_name' => 'cadphart[dphart]',
  'readonly'  =>  $cadphart->getId()!='' ? true : false,
  'onBlur'  => "javascript:enter(this.value);",
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
<th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th> <?php echo label_for('cadphart[fecdph]', __($labels['cadphart{fecdph}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cadphart{fecdph}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadphart{fecdph}')): ?>
    <?php echo form_error('cadphart{fecdph}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
   <?php
	$value = object_input_date_tag($cadphart, 'getFecdph', array (
	  'rich' => true,
	  'maxlegth' => 10,
	  'calendar_button_img' => '/sf/sf_admin/images/date.png',
	  'control_name' => 'cadphart[fecdph]',
	  'date_format' => 'dd/MM/yy',
	  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
	  'readonly'  =>  $cadphart->getId()!='' ? true : false,
		),date('Y-m-d')); echo $value ? $value : '&nbsp;'; ?>
    </div></th>
</tr>
</table>
<br>
  <?php echo label_for('cadphart[reqart]', __($labels['cadphart{reqart}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('cadphart{reqart}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadphart{reqart}')): ?>
    <?php echo form_error('cadphart{reqart}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php echo input_auto_complete_tag('cadphart[reqart]', $cadphart->getReqart(),
    'almdesp/autocomplete?ajax=2',  array('autocomplete' => 'off','maxlength' => 8,
       'readonly'  =>  $cadphart->getId()!='' ? true : false, 'onBlur'=> remote_function(array(
        'update'   => 'divGrid',
         'url'      => 'almdesp/grid',
        'complete' => 'AjaxJSON(request, json), actualizarsaldos() ',
         'condition' => "$('cadphart_reqart').value != '' && $('id').value == ''",
         'script' => true,
          'with' => "'ajax=2&cajtexmos=cadphart_desreq&cajtexcom=cadphart_reqart&codigo='+this.value"
        ))),
     array('use_style' => 'true') )?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Careqart_Almdes/clase/Careqart/frame/sf_admin_edit_form/obj1/cadphart_reqart/obj2/cadphart_desreq','','','botoncat')?></th>
&nbsp;&nbsp;

 <?php $value = object_input_tag($cadphart, 'getDesreq', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'cadphart[desreq]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('cadphart[desdph]', __($labels['cadphart{desdph}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('cadphart{desdph}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadphart{desdph}')): ?>
    <?php echo form_error('cadphart{desdph}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadphart, 'getDesdph', array (
  'size' => 80,
  'control_name' => 'cadphart[desdph]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('cadphart[codori]', __($labels['cadphart{codori}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('cadphart{codori}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadphart{codori}')): ?>
    <?php echo form_error('cadphart{codori}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php $value = object_input_tag($cadphart, 'getCodori', array (
  'size' => 20,
  'control_name' => 'cadphart[codori]',
  'maxlength' => $lonubi,
  'readonly'  =>  $cadphart->getId()!='' ? true : false,
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$forubi')",
  'onBlur'=> remote_function(array(
       'url'      => 'almdesp/ajax',
       'script'   => true,
       'condition' => "$('cadphart_codori').value != '' && $('id').value == ''",
       'complete' => 'AjaxJSON(request, json)',
       'with' => "'ajax=3&cajtexmos=cadphart_nomcat&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnubibie_Almdes/clase/Bnubibie/frame/sf_admin_edit_form/obj1/cadphart_codori/obj2/cadphart_nomcat/campo1/codubi/campo2/desubi','','','botoncat')?></th>
&nbsp;&nbsp;
 <?php $value = object_input_tag($cadphart, 'getNomcat', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'cadphart[nomcat]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('cadphart[mondph]', __($labels['cadphart{mondph}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('cadphart{mondph}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadphart{mondph}')): ?>
    <?php echo form_error('cadphart{mondph}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadphart, 'getMondph', array (
  'size' => 20,
  'readonly' => true,
  'control_name' => 'cadphart[mondph]',
),$default_value = number_format($value,2,',','.')); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>
</div>


<div class="form-row" id="divGrid">
<form name="form1" id="form1">
<?
echo grid_tag($obj);
?>
</form>
<br>
<!--
<table>
 <tr>
 <th>&nbsp;&nbsp;&nbsp;<?php echo __('Totales') ?></th>
  <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
  <th><input class="grid_txtright" type="text" id="totalcantd" name="totalcantd" size="10" disabled=true></th>
  <th>&nbsp;&nbsp;&nbsp;</th>
  <th><input class="grid_txtright" type="text" id="totalcantnd" name="totalcantnd" size="10" disabled=true></th>
  <th>&nbsp;&nbsp;&nbsp;</th>
  <th><input class="grid_txtright" type="text" id="totalcosto" name="totalcosto" size="10" disabled=true></th>
 </tr>
</table> -->
</div>

</fieldset>


<?php include_partial('edit_actions', array('cadphart' => $cadphart)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($cadphart->getId()): ?>
<?php echo button_to(__('delete'), 'almdesp/delete?id='.$cadphart->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

<script type="text/javascript">
  var id="";
  var id='<?php echo $cadphart->getId()?>';
  actualiza(id);

 function enter(valor)
 {
     if (valor!='')
     { valor=valor.pad(8, '0',0);}
     else
     {valor=valor.pad(8, '#',0);}
     $('cadphart_dphart').value=valor;
     
     var dphdesh='<?php echo $dphdesh; ?>';
     if (dphdesh=='S')
     {
     	$('cadphart_dphart').readOnly=true;
     }
 }
</script>
