<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/12/30 19:41:13
?>
<?php echo form_tag('oyctartip/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($octipprl, 'getId') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools','observe') ?>
<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('octipprl[codtippro]', __($labels['octipprl{codtippro}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('octipprl{codtippro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('octipprl{codtippro}')): ?>
    <?php echo form_error('octipprl{codtippro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($octipprl, 'getCodtippro', array (
  'size' => 8,
  'maxlength' => 4,
  'control_name' => 'octipprl[codtippro]',
  'readonly' => $octipprl->getId()!='' ? true : false,
  'onBlur'=> remote_function(array(
  			  'update' => 'grid',
  			  'condition' =>"$('octipprl_codtippro').value!=''",
              'url' => 'oyctartip/ajax',
              'script' => true,
			  'complete' => 'AjaxJSON(request, json)',
  			  'with' => "'ajax=1&cajtexmos=octipprl_destippro&cajtexcom=octipprl_codtippro&codigo='+this.value"
			  )),
)); echo $value ? $value : '&nbsp;' ?>


<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/oyctartip_octipprl/clase/Octipprl/frame/sf_admin_edit_form/obj1/octipprl_codtippro/obj2/octipprl_destippro/campo1/codtippro/campo2/destippro')?>


  <?php $value = object_input_tag($octipprl, 'getDestippro', array (
  'size' => 80,
  'readonly' => true,
  'control_name' => 'octipprl[destippro]',
)); echo $value ? $value : '&nbsp;' ?>

    </div>

<br>
<?php echo grid_tag($obj);?>
</div>

</fieldset>

<?php include_partial('edit_actions', array('octipprl' => $octipprl)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($octipprl->getId()): ?>
<?php echo button_to(__('delete'), 'oyctartip/delete?id='.$octipprl->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
