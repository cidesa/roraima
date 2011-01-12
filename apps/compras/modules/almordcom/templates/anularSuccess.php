<?php use_helper('Object', 'Javascript', 'PopUp', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools') ?>
<?php echo javascript_include_tag('ajax') ?>

<fieldset id="sf_fieldset_none" class="">

<div id="divGrid"><?php echo form_tag('almordcom/edit', array(
'id'        => 'sf_admin_edit_form',
'name'      => 'sf_admin_edit_form',
'multipart' => true,
)) ?>


<div class="form-row"><?php $value = object_input_tag($caordcom, 'getOrdcom', array (
'size' => 8,
'maxlength' => 8,
'control_name' => 'caordcom[ordcom]',
)); echo $value ? $value : '&nbsp;' ?><?php echo button_to_popup('...','generales/catalogo?clase=Tsdefban&frame=sf_admin_edit_form&obj1=caordcom_numcue&obj2=caordcom_nombanco')?>

<?php $value = object_input_tag($caordcom, 'getDesord', array (
'disabled' => true,
'control_name' => 'caordcom[desord]',
  'size' => '106x3',
)); echo $value ? $value : '&nbsp;' ?></div>


<br>
<br>
<div class="form-row"><?php $value = object_input_date_tag($caordcom, 'getFecord', array (
'rich' => true,
'size' => 11,
'maxlength' => 10,
'calendar_button_img' => '/sf/sf_admin/images/date.png',
'control_name' => 'caordcom[fecord]',
'date_format' => 'dd/MM/yyyy',
)); echo $value ? $value : '&nbsp;' ?></div>

<br>
<div id="motivo" style="display:none">
  <?php echo label_for('caordcom[motanu]', __('Motivo de AnulaciÃ³n'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{motanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{motanu}')): ?>
    <?php echo form_error('caordcom{motanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caordcom, 'getMotanu', array (
  'size' => 80,
  'control_name' => 'caordcom[motanu]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
</div>
<br>
<div class="form-row" align="center">
   <input type="button" value="Salvar" onClick="salvar();">
   <input type="button" value="Cancelar" onClick="self.close();">
</div>
</form>
<script type="text/javascript">
 var traemot='<?php echo $caordcom->getTraemot() ?>';
 if (traemot)
 {
     $('motivo').show();
 }
function salvar()
{
  var id='<? print $caordcom->getId(); ?>';
  var ordcom=$('caordcom_ordcom').value;
  var desord=$('caordcom_desord').value;
  var fecord=$('caordcom_fecord').value;
  var motanu=$('caordcom_motanu').value;

  f=document.sf_admin_edit_form;
  f.action='salvaranu?id='+id+'&ordcom='+ordcom+'&desord='+desord+'&motanu='+motanu+'&fecord='+fecord;
  f.submit();
}
</script>

