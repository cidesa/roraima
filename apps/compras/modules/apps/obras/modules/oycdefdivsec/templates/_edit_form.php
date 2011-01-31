<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/06/30 09:52:12
?>
<?php echo form_tag('oycdefdivsec/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($ocsector, 'getId') ?>
<?php echo javascript_include_tag('tools','ajax','observe') ?>
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos del Sector')?></legend>
<div class="form-row">
<?php echo label_for('ocsector[codpai]', __($labels['ocsector{codpai}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('ocsector{codpai}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocsector{codpai}')): ?><?php echo form_error('ocsector{codpai}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
<?php echo select_tag('ocsector[codpai]', options_for_select($pais,$ocsector->getCodpai(),'include_custom=Seleccione'),array('onChange'=> remote_function(array(
		'update'   => 'divEstados',
		'url'      => 'oycdefdivsec/combo?par=1',
		'with' => "'pais='+this.value"
  ))));?></div>
<br>
<?php echo label_for('ocsector[codedo]', __($labels['ocsector{codedo}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('ocsector{codedo}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocsector{codedo}')): ?> <?php echo form_error('ocsector{codedo}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
<div id="divEstados">
<?php echo select_tag('ocsector[codedo]', options_for_select($estados,$ocsector->getCodedo(),'include_custom=Seleccione'),array('onChange'=> remote_function(array(
		'update'   => 'divMunicipio',
		'url'      => 'oycdefdivsec/combo?par=2',
		'with' => "'pais='+document.getElementById('ocsector_codpai').value+'&estado='+this.value"
  ))));?></div>
</div>
<br>
<?php echo label_for('ocsector[codmun]', __($labels['ocsector{codmun}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('ocsector{codmun}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocsector{codmun}')): ?> <?php echo form_error('ocsector{codmun}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
<div id="divMunicipio">
<?php echo select_tag('ocsector[codmun]', options_for_select($municipios,$ocsector->getCodmun(),'include_custom=Seleccione'),array('onChange'=> remote_function(array(
		'update'   => 'divParroquia',
		'url'      => 'oycdefdivsec/combo?par=3',
		'with' => "'pais='+document.getElementById('ocsector_codpai').value+'&estado='+document.getElementById('ocsector_codedo').value+'&municipio='+this.value"
  ))));?></div>
</div>
<br>
<?php echo label_for('ocsector[codpar]', __($labels['ocsector{codpar}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('ocsector{codpar}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocsector{codpar}')): ?> <?php echo form_error('ocsector{codpar}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
<div id="divParroquia">
<?php echo select_tag('ocsector[codpar]', options_for_select($parroquias,$ocsector->getCodpar(),'include_custom=Seleccione'),array('onChange'=> remote_function(array(
		'update'   => 'divOtro',
		'url'      => 'oycdefdivsec/combo?par=4',
		'with' => "'pais='+document.getElementById('ocsector_codpai').value+'&estado='+document.getElementById('ocsector_codedo').value+'&municipio='+document.getElementById('ocsector_codmun').value+'&parroquia='+this.value"
  ))));?></div>
</div>
<br>
  <?php echo label_for('ocsector[codsec]', __($labels['ocsector{codsec}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocsector{codsec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocsector{codsec}')): ?>
    <?php echo form_error('ocsector{codsec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocsector, 'getCodsec', array (
  'size' => 20,
  'maxlength' => 4,
  'control_name' => 'ocsector[codsec]',
  'readonly'  =>  $ocsector->getId()!='' ? true : false ,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('ocsector_codsec').value=valor",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocsector[nomsec]', __($labels['ocsector{nomsec}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocsector{nomsec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocsector{nomsec}')): ?>
    <?php echo form_error('ocsector{nomsec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocsector, 'getNomsec', array (
  'size' => 50,
  'maxlength' => 50,
  'control_name' => 'ocsector[nomsec]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('ocsector' => $ocsector)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($ocsector->getId()): ?>
<?php echo button_to(__('delete'), 'oycdefdivsec/delete?id='.$ocsector->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
