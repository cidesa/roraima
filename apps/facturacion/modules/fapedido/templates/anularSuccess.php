<?php use_helper('Object', 'Javascript', 'PopUp', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php echo javascript_include_tag('dFilter', 'tools', 'ajax') ?>

<div id="sf_admin_container">
<?php echo object_input_hidden_tag($fapedido, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Anular Pedido') ?></legend>
<div id="divGrid">
<?php echo form_tag('fapedido/edit', array(
'id'        => 'sf_admin_edit_form',
'name'      => 'sf_admin_edit_form',
'multipart' => true,
)) ?>

<input id="nroped" name="nroped" type="hidden" value="<? print $fapedido->getNroped(); ?>">
<input id="fecped" name="fecped" type="hidden" value="<? print $fapedido->getFecped(); ?>">
<input id="refer" name="refer" type="hidden" value="<? print $referencia; ?>">

  <div class="form-row">
  <?php echo label_for('label1', __('Referencia'), 'class="required" ') ?>
  <?php $value = input_tag('refanu', '', array (
  'control_name' => 'refanu',
  'size' => 20,
  'maxlength' => 8,
)); echo $value ? $value : '&nbsp;' ?>

<br><br>

  <?php echo label_for('label1', __('Descripcion'), 'class="required" ') ?>
  <?php $value = input_tag('desanu', '', array (
  'control_name' => 'desanu',
  'size' => 80,
  'maxlength' => 100,
)); echo $value ? $value : '&nbsp;' ?>

<br><br>

  <?php echo label_for('fapedido[fecanu]', __('Fecha de Anulación'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fapedido{fecanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fapedido{fecanu}')): ?>
    <?php echo form_error('fapedido{fecanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($fapedido, 'getFecanu', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fapedido[fecanu]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'url'      => 'fapedido/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('fapedido_fecanu').value != ''",
        'with' => "'ajax=6&numord='+$('nroped').value+'&codigo='+this.value"
        ))
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
    </div>
  </div>


<div class="form-row" align="center">
   <input type="button" value="Salvar" onClick="salvar();">
   <input type="button" value="Cancelar" onClick="self.close();">
</div>

</div>
</form>
</fieldset>
</div>
<script type="text/javascript">
$('refanu').value=$('refer').value;
function salvar()
{
  var id='<? print $fapedido->getId(); ?>';
  var nroped=$('nroped').value;
  var fecanu=$('fapedido_fecanu').value;

  f=document.sf_admin_edit_form;
  f.action='salvaranu?id='+id+'&nroped='+nroped+'&fecanu='+fecanu;
  f.submit();
}
</script>