<?php use_helper('Object', 'Javascript', 'PopUp', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools','observe') ?>
<?php echo javascript_include_tag('ajax') ?>

<div id="sf_admin_container">
<?php echo object_input_hidden_tag($casolart, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Anular Solicitud de Autorización de Compras y/o Trabajo') ?></legend>
<div id="divGrid"><?php echo form_tag('almsolegr/edit', array(
'id'        => 'sf_admin_edit_form',
'name'      => 'sf_admin_edit_form',
'multipart' => true,
)) ?>

<input id="reqart" name="reqart" type="hidden" value="<? print $casolart->getReqart(); ?>">
<input id="fecreq" name="fecreq" type="hidden" value="<? print $casolart->getFecreq(); ?>">

  <div class="form-row">
    <?php echo label_for('casolart[reqart]', __('Referencia'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('casolart{reqart}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{reqart}')): ?>
    <?php echo form_error('casolart{reqart}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($casolart, 'getReqart', array (
  'size' => 20,
  'maxlength' => 8,
  'control_name' => 'casolart[reqart]',
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

  <?php echo label_for('casolart[fecanu]', __('Fecha de Anulación'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('casolart{fecanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{fecanu}')): ?>
    <?php echo form_error('casolart{fecanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($casolart, 'getFecanu', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'casolart[fecanu]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'  => "javascript:event.keyCode=13; validar(event,this.id);",
  //'onkeyPress' => "javascript: validar(event,this.id)",
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
  var id='<? print $casolart->getId(); ?>';
  var reqart=$('reqart').value;
  var desanu=$('desanu').value;
  var fecanu=$('casolart_fecanu').value;

  if ($('casolart_reqart').value=="")
  {
  	alert('No puede salvar sin introducir la Referencia');
  	$('casolart_reqart').focus();
  }
  else if ($('casolart_fecanu').value=="")
  {
  	alert('No puede salvar sin introducir la Fecha de Anulación');
  	$('casolart_fecanu').focus();
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
    new Ajax.Request('/compras_dev.php/almsolegr/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json), verificar();}, parameters:'ajax=8&fecemi='+fecemi+'&codigo='+fecac})
    }
  }
}

function verificar()
{
  if ($('esmenor').value=='N')
  {
  	alert('La Fecha de Anulación no puede ser menor a la Fecha de la Solicitud')
  	$('casolart_fecanu').value="";
  	$('casolart_fecanu').focus();
  }
  else if ($('valfec2').value=='S')
  {
	alert('La Fecha no se encuentra del Período Fiscal');
	$('casolart_fecanu').value="";
	$('casolart_fecanu').focus();
  }
  else if ($('valfec').value=='S')
  {
	alert('La Fecha se encuentra dentro un Período Cerrado');
	$('casolart_fecanu').value="";
	$('casolart_fecanu').focus();
  }
}

</script>
