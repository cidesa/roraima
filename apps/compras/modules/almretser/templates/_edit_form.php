<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/01 16:11:54
?>
<?php echo form_tag('almretser/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript','PopUp','Grid') ?>
<?php echo javascript_include_tag('dFilter','tools','observe','ajax') ?>


<?php echo object_input_hidden_tag($caretser, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('caretser[codser]', __($labels['caretser{codser}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caretser{codser}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caretser{codser}')): ?>
    <?php echo form_error('caretser{codser}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php $value = object_input_tag($caretser, 'getCodser', array (
  'size' => 20,
  'control_name' => 'caretser[codser]',
  'readonly'  =>  $caretser->getId()!='' ? true : false ,
  'maxlength' => $longitudarticulo,
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaraarticulo')",
  'onBlur'=> remote_function(array(
			  'url'      => 'almretser/ajax',
			  'script' => true,
			  'complete' => 'AjaxJSON(request, json)',
			  'condition' => "$('caretser_codser').value != ''",
  			  'with' => "'ajax=1&cajtexmos=caretser_desart&codigo='+this.value"
			  ))
  )); echo $value ? $value : '&nbsp;' ?>
   <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Caregart_Almretser/clase/Caregart/frame/sf_admin_edit_form/obj1/caretser_codser/obj2/caretser_desart/campo1/codart/campo2/desart/param1/'.$longitudarticulo,'','','botoncat')?></th>

  <?php $value = object_input_tag($caretser, 'getDesart', array (
  'size' => 80,
  'disabled' => true,
  'control_name' => 'caretser[desart]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>
<br>
<?php echo grid_tag($obj);?>



<?php include_partial('edit_actions', array('caretser' => $caretser)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($caretser->getId()): ?>
<?php echo button_to(__('delete'), 'almretser/delete?id='.$caretser->getId().'&codser='.$caretser->getCodser(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

  <script language="JavaScript" type="text/javascript">
  var idf='<?php echo $caretser->getId()?>';
  if (idf!="")
  {
    $$('.botoncat')[0].disabled=true;
  }
</script>
