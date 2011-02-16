<?php use_helper('Object', 'Javascript', 'PopUp', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools','observe') ?>
<?php echo javascript_include_tag('ajax') ?>

<div id="sf_admin_container">
<?php echo object_input_hidden_tag($liprebas, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Anular Presupuesto Base') ?></legend>
<div id="divGrid"><?php echo form_tag('licprebas/edit', array(
'id'        => 'sf_admin_edit_form',
'name'      => 'sf_admin_edit_form', 'onsubmit'  => 'return false;',
'multipart' => true,
)) ?>

<input id="reqart" name="reqart" type="hidden" value="<? print $liprebas->getReqart(); ?>">
<input id="fecreq" name="fecreq" type="hidden" value="<? print $liprebas->getFecreq(); ?>">

  <div class="form-row">
    <?php echo label_for('liprebas[reqart]', __('Referencia'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('liprebas{reqart}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('liprebas{reqart}')): ?>
    <?php echo form_error('liprebas{reqart}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($liprebas, 'getReqart', array (
  'size' => 20,
  'maxlength' => 8,
  'control_name' => 'liprebas[reqart]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>
      </div>

<br>

  <?php echo label_for('label1', __('Descripcion'), 'class="required" ') ?>
  <?php $value = input_tag('desanu', '', array (
  'control_name' => 'desanu',
  'size' => 80,
  'maxlength' => 100,
)); echo $value ? $value : '&nbsp;' ?>

<br><br>

  <?php echo label_for('liprebas[fecanu]', __('Fecha de Anulación'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('liprebas{fecanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('liprebas{fecanu}')): ?>
    <?php echo form_error('liprebas{fecanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($liprebas, 'getFecanu', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'liprebas[fecanu]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'  => "javascript:event.keyCode=13; validar(event,this.id);",
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
      </div>
  </div><?php echo input_hidden_tag('esmenor', '') ?><?php echo input_hidden_tag('valfec', '') ?>
  <?php echo input_hidden_tag('valfec2', '') ?>


<div class="form-row" align="center">
   <input type="button" value="Salvar" onClick="salvar();">
   <input type="button" value="Cancelar" onClick="self.close();">
</div>

</div>
</form>
</fieldset>
</div>
<script type="text/javascript">
function salvar()
{
  var id='<? print $liprebas->getId(); ?>';
  var reqart=$('reqart').value;
  var desanu=$('desanu').value;
  var fecanu=$('liprebas_fecanu').value;

  if ($('liprebas_reqart').value=="")
  {
  	alert('No puede salvar sin introducir la Referencia');
  	$('liprebas_reqart').focus();
  }
  else if ($('liprebas_fecanu').value=="")
  {
  	alert('No puede salvar sin introducir la Fecha de Anulación');
  	$('liprebas_fecanu').focus();
  }
  else if ($('desanu').value=="")
  {
  	alert('No puede salvar sin introducir la Descripción de Anulación');
  	$('desanu').focus();
  }
  else
  {
   f=document.sf_admin_edit_form;
   f.action='salvaranu?id='+id+'&desanu='+desanu+'&reqart='+reqart+'&fecanu='+fecanu;
   f.submit();
  }
}

function validar(e,id)
{
  var fecemi=$('fecreq').value;
  var fecac=$(id).value;

  if (e.keyCode==13 || e.keyCode==9)
  {
   if ($(id).value!="")
   {
    new Ajax.Request('/compras_dev.php/licprebas/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=8&fecemi='+fecemi+'&codigo='+fecac})
    }
  }
}
</script>
