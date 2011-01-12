<?php use_helper('Object', 'Javascript', 'PopUp', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools') ?>
<?php echo javascript_include_tag('ajax') ?>

<fieldset id="sf_fieldset_none" class="">

<div id="divGrid"><?php echo form_tag('tesmovsegban/edit', array(
'id'        => 'sf_admin_edit_form',
'name'      => 'sf_admin_edit_form',
'multipart' => true,
)) ?>


<div class="form-row"><?php $value = object_input_tag($tsmovban, 'getNumcue', array (
'size' => 20,
'control_name' => 'tsmovban[numcue]',
'maxlength' => 20,
)); echo $value ? $value : '&nbsp;' ?><?php echo button_to_popup('...','generales/catalogo?clase=Tsdefban&frame=sf_admin_edit_form&obj1=tsmovban_numcue&obj2=tsmovban_nombanco')?>

<?php $value = object_input_tag($tsmovban, 'getNombanco', array (
'disabled' => true,
'control_name' => 'tsmovban[nombanco]',
'maxlength' => 80,
)); echo $value ? $value : '&nbsp;' ?></div>

<br>
<br>

<div class="form-row"><?php $value = object_input_tag($tsmovban, 'getRefban', array (
'size' => 20,
'control_name' => 'tsmovban[refban]',
'maxlength' => 8,
'onBlur'  => "javascript: valor=this.value; valor=valor.pad(8, '0',0);document.getElementById('tsmovban_refban').value=valor",
)); echo $value ? $value : '&nbsp;' ?></div>


<br>
<br>
<div class="form-row"><?php $value = object_input_date_tag($tsmovban, 'getFecban', array (
'rich' => true,
'calendar_button_img' => '/sf/sf_admin/images/date.png',
'control_name' => 'tsmovban[fecban]',
'date_format' => 'dd/MM/yyyy',
)); echo $value ? $value : '&nbsp;' ?></div>


<br>
<br>



<div class="form-row"><?php $value = object_input_tag($tsmovban, 'getTipmov', array (
'size' => 20,
'control_name' => 'tsmovban[tipmov]',
'maxlength' => 4,
)); echo $value ? $value : '&nbsp;' ?> <?php echo button_to_popup('...','generales/catalogo?clase=Tstipmov&frame=sf_admin_edit_form&obj1=tsmovban_tipmov&obj2=tsmovban_nommovim')?>
<?php $value = object_input_tag($tsmovban, 'getNommovim', array (
'disabled' => true,
'control_name' => 'tsmovban[nommovim]',
'size' => 60,
'maxlength' => 120,
)); echo $value ? $value : '&nbsp;' ?></div>



<?php echo button_to('Salvar', 'tesmovsegban/salvaranu?refban='.$tsmovban->getRefban().'&fecban='.$tsmovban->getFecban().'&id='.$tsmovban->getId().'&numcue='.$tsmovban->getNumcue()) ?></fieldset>
</form>


