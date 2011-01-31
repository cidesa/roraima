<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/04/17 17:52:21
?>
<?php echo form_tag('oycdatsol/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript') ?>
<?php use_helper('tabs') ?>
<?php echo javascript_include_tag('dFilter','Linktoapp','observe') ?>
<?php echo javascript_include_tag('tools','observe') ?>
<?php echo javascript_include_tag('ajax') ?>
<?php use_helper('PopUp') ?>

<?php echo object_input_hidden_tag($ocdatste, 'getId') ?>

<fieldset>
<legend><?php echo __('Datos de Solicitante')?></legend>
<div class="form-row"><?php echo label_for('ocdatste[cedste]', __($labels['ocdatste{cedste}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('ocdatste{cedste}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocdatste{cedste}')): ?> <?php echo form_error('ocdatste{cedste}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($ocdatste, 'getCedste', array (
  'size' => 10,
  'maxlength' => 15,
  'readonly'  =>  $ocdatste->getId()!='' ? true : false ,
  'control_name' => 'ocdatste[cedste]',
)); echo $value ? $value : '&nbsp;' ?></div>
<br>
<?php echo label_for('ocdatste[nomste]', __($labels['ocdatste{nomste}']), 'class="required" ') ?>

<div
	class="content<?php if ($sf_request->hasError('ocdatste{nomste}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocdatste{nomste}')): ?> <?php echo form_error('ocdatste{nomste}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

<?php $value = object_input_tag($ocdatste, 'getNomste', array (
  'size' => 50,
  'maxlength' => 50,
  'control_name' => 'ocdatste[nomste]',
)); echo $value ? $value : '&nbsp;' ?></div>

<br>
<?php echo label_for('ocdatste[codste]', __($labels['ocdatste{codste}']), 'class="required" ') ?>

<div
	class="content<?php if ($sf_request->hasError('ocdatste{codste}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocdatste{codste}')): ?> <?php echo form_error('ocdatste{codste}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

<?php echo input_auto_complete_tag('ocdatste[codste]', $ocdatste->getCodste(),
    'oycdatsol/autocomplete?ajax=2', array('autocomplete' => 'off',
	'maxlength' => 4,'size' => 4,
    'onBlur'=> remote_function(array(
      'url'      => 'oycdatsol/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'with' => "'ajax=2&cajtexmos=ocdatste_desste&cajtexcom=ocdatste_codste&codigo='+this.value"
      ))),
     array('use_style' => 'true')
  )
?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/oycdatsol_octipste/clase/Octipste/frame/sf_admin_edit_form/obj1/ocdatste_codste/obj2/ocdatste_desste/campo1/codste/campo2/desste')?>


<?php $value = object_input_tag($ocdatste, 'getDesste', array (
'disabled' => true,
'size' => 60,
'control_name' => 'ocdatste[desste]',
)); echo $value ? $value : '&nbsp;' ?></div>
<br>
<?php echo label_for('ocdatste[telste]', __($labels['ocdatste{telste}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('ocdatste{telste}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocdatste{telste}')): ?> <?php echo form_error('ocdatste{telste}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($ocdatste, 'getTelste', array (
  'size' => 30,
  'maxlength' => 30,
  'control_name' => 'ocdatste[telste]',
)); echo $value ? $value : '&nbsp;' ?></div>
<br>
<?php echo label_for('ocdatste[faxste]', __($labels['ocdatste{faxste}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('ocdatste{faxste}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocdatste{faxste}')): ?> <?php echo form_error('ocdatste{faxste}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($ocdatste, 'getFaxste', array (
  'size' => 20,
  'maxlength' => 15,
  'control_name' => 'ocdatste[faxste]',
)); echo $value ? $value : '&nbsp;' ?></div>
<br>
<?php echo label_for('ocdatste[emaste]', __($labels['ocdatste{emaste}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('ocdatste{emaste}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocdatste{emaste}')): ?> <?php echo form_error('ocdatste{emaste}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($ocdatste, 'getEmaste', array (
  'size' => 80,
  'maxlength' => 100,
  'control_name' => 'ocdatste[emaste]',
)); echo $value ? $value : '&nbsp;' ?></div>
</div>
</fieldset>
<br>
<?php tabMainJS("tp1","tabPane1", "tabPage1", 'Datos de Ubicación');?>
<fieldset>
<div class="form-row"><?php echo label_for('ocdatste[codpai]', __($labels['ocdatste{codpai}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('ocdatste{codpai}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocdatste{codpai}')): ?><?php echo form_error('ocdatste{codpai}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
<?php echo select_tag('ocdatste[codpai]', options_for_select($pais,$ocdatste->getCodpai(),'include_custom=Seleccione'),array('onChange'=> remote_function(array(
		'update'   => 'divEstados',
		'url'      => 'oycdatsol/combo?par=1',
		'with' => "'pais='+this.value"
  ))));?></div>
<br>
<?php echo label_for('ocdatste[codedo]', __($labels['ocdatste{codedo}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('ocdatste{codedo}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocdatste{codedo}')): ?> <?php echo form_error('ocdatste{codedo}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
<div id="divEstados">
<?php echo select_tag('ocdatste[codedo]', options_for_select($estados,$ocdatste->getCodedo(),'include_custom=Seleccione'),array('onChange'=> remote_function(array(
		'update'   => 'divMunicipios',
		'url'      => 'oycdatsol/combo?par=2',
		'with' => "'pais='+document.getElementById('ocdatste_codpai').value+'&estado='+this.value"
  ))));?></div>
</div>
<br>
<?php echo label_for('ocdatste[codmun]', __($labels['ocdatste{codmun}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('ocdatste{codmun}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocdatste{codmun}')): ?> <?php echo form_error('ocdatste{codmun}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
<div id="divMunicipios">
<?php echo select_tag('ocdatste[codmun]', options_for_select($municipio,$ocdatste->getCodmun(),'include_custom=Seleccione'),array('onChange'=> remote_function(array(
		'update'   => 'divParroquia',
		'url'      => 'oycdatsol/combo?par=3',
		'with' => "'pais='+document.getElementById('ocdatste_codpai').value+'&estado='+document.getElementById('ocdatste_codedo').value+'&municipio='+this.value"
  ))));?></div>
</div>
<br>
<?php echo label_for('ocdatste[codpar]', __($labels['ocdatste{codpar}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('ocdatste{codpar}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocdatste{codpar}')): ?> <?php echo form_error('ocdatste{codpar}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
<div id="divParroquia">
<?php echo select_tag('ocdatste[codpar]', options_for_select($parroquia,$ocdatste->getCodpar(),'include_custom=Seleccione'),array('onChange'=> remote_function(array(
'update'   => 'divSector',
'url'      => 'oycdatsol/combo?par=4',
'with' => "'pais='+document.getElementById('ocdatste_codpai').value+'&estado='+document.getElementById('ocdatste_codedo').value+'&municipio='+document.getElementById('ocdatste_codmun').value+'&parroquia='+this.value"
  ))));?></div>
</div>
<br>
<?php echo label_for('ocdatste[codsec]', __($labels['ocdatste{codsec}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('ocdatste{codsec}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocdatste{codsec}')): ?> <?php echo form_error('ocdatste{codsec}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
<div id="divSector">

<?php echo select_tag('ocdatste[codsec]', options_for_select($sector,$ocdatste->getCodsec(),'include_custom=Seleccione'),array('onChange'=> remote_function(array(
'update'   => 'divCasa',
'url'      => 'oycdatsol/combo?par=5',
'with' => "'pais='+document.getElementById('ocdatste_codpai').value+'&estado='+document.getElementById('ocdatste_codedo').value+'&municipio='+document.getElementById('ocdatste_codmun').value+'&parroquia='+document.getElementById('ocdatste_codpar').value+'&sector='+this.value"
  ))));?></div>
</div>
<br>
<?php echo label_for('ocdatste[dirste]', __($labels['ocdatste{dirste}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('ocdatste{dirste}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocdatste{dirste}')): ?> <?php echo form_error('ocdatste{dirste}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($ocdatste, 'getDirste', array (
  'size' => 80,
  'maxlength' => 100,
  'control_name' => 'ocdatste[dirste]',
)); echo $value ? $value : '&nbsp;' ?></div>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage2", 'Datos de Representante');?>
<fieldset>
<div class="form-row"><?php echo label_for('ocdatste[cedrep]', __($labels['ocdatste{cedrep}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('ocdatste{cedrep}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocdatste{cedrep}')): ?> <?php echo form_error('ocdatste{cedrep}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($ocdatste, 'getCedrep', array (
  'size' => 20,
  'maxlength' => 15,
  'control_name' => 'ocdatste[cedrep]',
)); echo $value ? $value : '&nbsp;' ?></div>
<br>
<?php echo label_for('ocdatste[nomrep]', __($labels['ocdatste{nomrep}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('ocdatste{nomrep}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocdatste{nomrep}')): ?> <?php echo form_error('ocdatste{nomrep}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($ocdatste, 'getNomrep', array (
  'size' => 50,
  'maxlength' => 50,
  'control_name' => 'ocdatste[nomrep]',
)); echo $value ? $value : '&nbsp;' ?></div>
<br>
<?php echo label_for('ocdatste[dirrep]', __($labels['ocdatste{dirrep}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('ocdatste{dirrep}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocdatste{dirrep}')): ?> <?php echo form_error('ocdatste{dirrep}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($ocdatste, 'getDirrep', array (
  'size' => 80,
  'maxlength' => 100,
  'control_name' => 'ocdatste[dirrep]',
)); echo $value ? $value : '&nbsp;' ?></div>
<br>
<?php echo label_for('ocdatste[telrep]', __($labels['ocdatste{telrep}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('ocdatste{telrep}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocdatste{telrep}')): ?> <?php echo form_error('ocdatste{telrep}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($ocdatste, 'getTelrep', array (
  'size' => 30,
  'maxlength' =>30,
  'control_name' => 'ocdatste[telrep]',
)); echo $value ? $value : '&nbsp;' ?></div>
<br>
<?php echo label_for('ocdatste[faxrep]', __($labels['ocdatste{faxrep}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('ocdatste{faxrep}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocdatste{faxrep}')): ?> <?php echo form_error('ocdatste{faxrep}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($ocdatste, 'getFaxrep', array (
  'size' => 20,
  'maxlength' => 15,
  'control_name' => 'ocdatste[faxrep]',
)); echo $value ? $value : '&nbsp;' ?></div>
<br>
<?php echo label_for('ocdatste[emarep]', __($labels['ocdatste{emarep}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('ocdatste{emarep}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocdatste{emarep}')): ?> <?php echo form_error('ocdatste{emarep}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($ocdatste, 'getEmarep', array (
  'size' => 80,
  'maxlength' => 100,
  'control_name' => 'ocdatste[emarep]',
)); echo $value ? $value : '&nbsp;' ?></div>
</div>
</fieldset>

<?php tabInit('tp1','0');?>
<?php include_partial('edit_actions', array('ocdatste' => $ocdatste)) ?>

</form>

<ul class="sf_admin_actions">
	<li class="float-left"><?php if ($ocdatste->getId()): ?> <?php echo button_to(__('delete'), 'oycdatsol/delete?id='.$ocdatste->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?></li>
</ul>
