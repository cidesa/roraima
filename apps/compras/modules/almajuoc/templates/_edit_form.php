<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/20 12:29:18
?>
<?php echo form_tag('almajuoc/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php echo object_input_hidden_tag($caajuoc, 'getId') ?>
<?php use_helper('PopUp', 'wait', 'Linktoapp') ?>
<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('ajax') ?>
<?php echo javascript_include_tag('tools','observe') ?>
<?php echo javascript_include_tag('compras/almajuoc') ?>
<?php echo javascript_include_tag('grid') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('caajuoc[ajuoc]', __($labels['caajuoc{ajuoc}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caajuoc{ajuoc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caajuoc{ajuoc}')): ?>
    <?php echo form_error('caajuoc{ajuoc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caajuoc, 'getAjuoc', array (
  'size' => 20,
  'maxlength' => 8,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(8, '0',0);document.getElementById('caajuoc_ajuoc').value=valor;",
  'control_name' => 'caajuoc[ajuoc]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('caajuoc[ordcom]', __($labels['caajuoc{ordcom}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caajuoc{ordcom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caajuoc{ordcom}')): ?>
    <?php echo form_error('caajuoc{ordcom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = input_auto_complete_tag('caajuoc[ordcom]', $caajuoc->getOrdcom(), cross_app_link_to('herramientas','autocomplete').'/fieldwhere/ordcom/table/caordcom/fieldget/ordcom/val/caajuoc[ordcom]', array (
  'size' => 20,
  'maxlegth'=> 8,
  'onBlur'=> remote_function(array(
   'update'   => 'divGrid',
              'url'      => 'almajuoc/ajax',
              'complete' => 'AjaxJSON(request, json); actualizarsaldos();',
              'with' => "'ajax=1&codigo='+this.value+'&id='+document.getElementById('id').value",
              'script' => 'true',
        ))

),array('use_style' => 'true')); echo $value ? $value : '&nbsp;' ?>
  <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Caordcom_Almajuoc/clase/Caordcom/frame/sf_admin_edit_form/obj1/caajuoc_ordcom/obj2/caajuoc_desord/')  ?>
  <?php echo input_tag('caajuoc[desord]',$caajuoc->getDesord(),'disabled=false; size=80'); ?>
    </div>
<br>
  <?php echo label_for('caajuoc[fecaju]', __($labels['caajuoc{fecaju}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caajuoc{fecaju}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caajuoc{fecaju}')): ?>
    <?php echo form_error('caajuoc{fecaju}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($caajuoc, 'getFecaju', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'caajuoc[fecaju]',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('caajuoc[desaju]', __($labels['caajuoc{desaju}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caajuoc{desaju}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caajuoc{desaju}')): ?>
    <?php echo form_error('caajuoc{desaju}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caajuoc, 'getDesaju', array (
  'size' => 80,
  'control_name' => 'caajuoc[desaju]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
<table border=0 >
<tr>
  <th>
    <?php echo label_for('caajuoc[codpro]', __($labels['caajuoc{codpro}']), 'class="required" ') ?>
    <div class="content<?php if ($sf_request->hasError('caajuoc{codpro}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('caajuoc{codpro}')): ?>
      <?php echo form_error('caajuoc{codpro}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>

    <?php $value = object_input_tag($caajuoc, 'getCodpro', array (
    'disabled' => true,
    'control_name' => 'caajuoc[codpro]',
  )); echo $value ? $value : '&nbsp;' ?>
      </div>

  </th>
<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
  <th>
    <?php echo label_for('caajuoc[nompro]', __($labels['caajuoc{nompro}']), 'style="width:150px" class="required" ') ?>
    <div class="content<?php if ($sf_request->hasError('caajuoc{nompro}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('caajuoc{nompro}')): ?>
      <?php echo form_error('caajuoc{nompro}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>

    <?php $value = object_input_tag($caajuoc, 'getNompro', array (
    'disabled' => true,
    'size' => 40,
    'control_name' => 'caajuoc[nompro]',
  )); echo $value ? $value : '&nbsp;' ?>
      </div>

  </th>
</tr>
</table>
<br>
  <?php echo label_for('caajuoc[monaju]', __($labels['caajuoc{monaju}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caajuoc{monaju}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caajuoc{monaju}')): ?>
    <?php echo form_error('caajuoc{monaju}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caajuoc, array('getMonaju',true), array (
  'size' => 15,
  'control_name' => 'caajuoc[monaju]',
  'readonly'=> true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('grid', array('obj' => $obj)) ?>

<?php include_partial('edit_actions', array('caajuoc' => $caajuoc)) ?>

</form>
<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($caajuoc->getId()): ?>
<?php echo button_to(__('delete'), 'almajuoc/delete?id='.$caajuoc->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
