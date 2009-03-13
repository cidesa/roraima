<?php use_helper('Object', 'Javascript', 'PopUp', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools') ?>
<?php echo javascript_include_tag('ajax') ?>

<div id="sf_admin_container">
<?php echo object_input_hidden_tag($opordpag, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Anular Orden de Pago') ?></legend>
<div id="divGrid"><?php echo form_tag('pagemiord/edit', array(
'id'        => 'sf_admin_edit_form',
'name'      => 'sf_admin_edit_form',
'multipart' => true,
)) ?>

<input id="numord" name="numord" type="hidden" value="<? print $opordpag->getNumord(); ?>">
<input id="fecemi" name="fecemi" type="hidden" value="<? print $opordpag->getFecemi(); ?>">
<input id="refer" name="refer" type="hidden" value="<? print $referencia; ?>">
<input id="compadic" name="compadic" type="hidden" value="<? print $compadic; ?>">

  <div class="form-row">
  <?php echo label_for('opordpag[numord]', __('Referencia'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{numord}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{numord}')): ?>
    <?php echo form_error('opordpag{numord}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getNumord', array (
  'size' => 20,
  'control_name' => 'opordpag[numord]',
  'maxlength' => 8,
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('opordpag[desanu]', __('Descripción'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{desanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{desanu}')): ?>
    <?php echo form_error('opordpag{desanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getDesanu', array (
  'size' => 80,
  'control_name' => 'opordpag[desanu]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('opordpag[fecanu]', __('Fecha de Anulación'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{fecanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{fecanu}')): ?>
    <?php echo form_error('opordpag{fecanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($opordpag, 'getFecanu', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'opordpag[fecanu]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'url'      => 'pagemiord/ajax',
        'complete' => 'AjaxJSON(request, json), validafec()',
        'condition' => "$('opordpag_fecanu').value != ''",
        'with' => "'ajax=19&numord='+$('numord').value+'&codigo='+this.value"
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
$('opordpag_numord').value=$('refer').value;

function salvar()
{
  var id='<? print $opordpag->getId(); ?>';
  var numord=$('numord').value;
  var desanu=$('opordpag_desanu').value;
  var fecanu=$('opordpag_fecanu').value;
  var compadic=$('compadic').value;

  f=document.sf_admin_edit_form;
  f.action='salvaranu?id='+id+'&desanu='+desanu+'&numord='+numord+'&fecanu='+fecanu+'&compadic='+compadic;
  f.submit();
}

function validar(e,id)
{
  if (e.keyCode==13)
  {
    if (!fechaMayorOIgualQue($('reqart'),$(id)))
    {
      alert('La Fecha de Anulacion no puede ser menor a la de la Solicitud');
      $(id).value="";
    }
  }
}

function fechaMayorOIgualQue(fec0, fec1)
{
  var bRes = false;
  var sDia0 = fec0.value.substr(0, 2);
  var sMes0 = fec0.value.substr(3, 2);
  var sAno0 = fec0.value.substr(6, 4);
  var sDia1 = fec1.value.substr(0, 2);
  var sMes1 = fec1.value.substr(3, 2);
  var sAno1 = fec1.value.substr(6, 4);
  if (sAno0 > sAno1) bRes = true;
  else {
  if (sAno0 == sAno1){
   if (sMes0 > sMes1) bRes = true;
  else {
   if (sMes0 == sMes1)
   if (sDia0 >= sDia1) bRes = true;
     }
     }
    }
    return bRes;
   }
</script>