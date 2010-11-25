<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/07 19:02:34
?>
<?php echo form_tag('almreqser/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($careqartser, 'getId') ?>

<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('ajax') ?>
<?php echo javascript_include_tag('tools','observe') ?>

<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<table>
<tr>
<th>
<?php echo label_for('careqartser[reqart]', __($labels['careqartser{reqart}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('careqartser{reqart}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('careqartser{reqart}')): ?>
    <?php echo form_error('careqartser{reqart}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($careqartser, 'getReqart', array (
  'size' => 20,
  'control_name' => 'careqartser[reqart]',
  'maxlength' => 8,
  'readonly'  =>  $careqartser->getId()!='' ? true : false ,
  'onBlur'  => "javascript: enter(this.value);",
)); echo $value ? $value : '&nbsp;' ?>
  <div class="sf_admin_edit_help"><?php echo __('Máximo 8 caracteres') ?></div>  </div>
</th>
<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>
 <?php echo label_for('careqartser[fecreq]', __($labels['careqartser{fecreq}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('careqartser{fecreq}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('careqartser{fecreq}')): ?>
    <?php echo form_error('careqartser{fecreq}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($careqartser, 'getFecreq', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'careqartser[fecreq]',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
</tr>
</table>

<br>

  <?php echo label_for('careqartser[desreq]', __($labels['careqartser{desreq}']),  'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('careqartser{desreq}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('careqartser{desreq}')): ?>
    <?php echo form_error('careqartser{desreq}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($careqartser, 'getDesreq', array (
  'size' => 80,
  'control_name' => 'careqartser[desreq]',
  'maxlength' => 255,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>
<?php echo label_for('careqartser[codcatreq]', __($labels['careqartser{codcatreq}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('careqartser{codcatreq}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('careqartser{codcatreq}')): ?> <?php echo form_error('careqartser{codcatreq}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

 <?php $value = object_input_tag($careqartser, 'getCodcatreq', array (
  'size' => 20,
  'control_name' => 'careqartser[codcatreq]',
  'maxlength' => $lonubi,
  'readonly'  =>  $careqartser->getId()!='' ? true : false ,
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$forubi')",
  'onBlur'=> remote_function(array(
       'url'      => 'almreqser/ajax',
       'script'   => true,
       'complete' => 'AjaxJSON(request, json)',
       'condition' => "$('careqartser_codcatreq').value != ''",
       'with' => "'ajax=3&cajtexmos=careqartser_desubi&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
  &nbsp;
   <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnubibie_Almreq/clase/Bnubibie/frame/sf_admin_edit_form/obj1/careqartser_codcatreq/obj2/careqartser_desubi/campo1/codubi/campo2/desubi','','','botoncat')?></th>

<?php $value = object_input_tag($careqartser, 'getDesubi', array (
'disabled' => true,
'size' => 100,
'control_name' => 'careqartser[desubi]',
)); echo $value ? $value : '&nbsp;' ?></div>
<br>
<?php echo grid_tag($grid);?>
</div>
</fieldset>

<?php include_partial('edit_actions', array('careqartser' => $careqartser)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($careqartser->getId()): ?>
<?php echo button_to(__('delete'), 'almreqser/delete?id='.$careqartser->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

<script type="text/javascript">

 var id='<?php echo $careqartser->getId()?>';
    if (id!="")
    {
     $$('.botoncat')[0].disabled=true;

   }
   var i=0;
     while (i<10)
     {
         calen="trigger_ax_"+i+"_5";
         $(calen).hide();
         i++;
     }

function enter(valor)
 {

     if (valor!='')
     { valor=valor.pad(8, '0',0);}
     else
     {valor=valor.pad(8, '#',0);}

     $('careqartser_reqart').value=valor;


 }

</script>