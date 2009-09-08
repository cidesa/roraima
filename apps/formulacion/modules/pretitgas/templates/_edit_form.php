<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/27 18:37:19
?>
<?php echo form_tag('pretitgas/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>


<?php if ($sf_flash->has('notice1')): ?>
<div class="form-errors">
<h2><?php echo __($sf_flash->get('notice1')) ?></h2>
</div>
<?php endif; ?>

<?php echo object_input_hidden_tag($fordefparegr, 'getId') ?>

<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos de la Partida')?></legend>
<div class="form-row">

 <?php echo label_for('etiqueta',' ') ?>
 <?php echo $etiqueta ?>

 <br>

  <?php echo label_for('fordefparegr[codparegr]', __($labels['fordefparegr{codparegr}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefparegr{codparegr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefparegr{codparegr}')): ?>
    <?php echo form_error('fordefparegr{codparegr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefparegr, 'getCodparegr', array (
  'size' => $lonmaspar,
  'control_name' => 'fordefparegr[codparegr]',
  'readonly'  =>  $fordefparegr->getId()!='' ? true : false ,
  'maxlength' => $lonmaspar,
  'onKeyPress' => "cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}",
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascarapartida')",
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('fordefparegr[nomparegr]', __($labels['fordefparegr{nomparegr}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefparegr{nomparegr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefparegr{nomparegr}')): ?>
    <?php echo form_error('fordefparegr{nomparegr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefparegr, 'getNomparegr', array (
  'size' => 80,
  'control_name' => 'fordefparegr[nomparegr]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('fordefparegr' => $fordefparegr)) ?>

</form>


<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($fordefparegr->getId()): ?>
  <input id="eliminarboton" type="button" name="Submit2" value="Eliminar" class="sf_admin_action_delete" onclick="javascript:eliminar();"/>
<?php endif; ?>
</li>
  </ul>

<script type="text/javascript">
  function eliminar()
  {
    var cod=$('fordefparegr_codparegr').value;
    var id=$('id').value;

    location.href='/formulacion_dev.php/pretitgas/eliminar?cod='+cod+'&id='+id;
  }
 </script>
