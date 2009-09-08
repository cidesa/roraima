<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/06/30 09:48:51
?>
<?php echo form_tag('oycdefdivpar/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($ocparroq, 'getId') ?>
<?php echo javascript_include_tag('tools','ajax','observe') ?>
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos de la Parroquia')?></legend>
<div class="form-row">
<?php echo label_for('ocparroq[codpai]', __($labels['ocparroq{codpai}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('ocparroq{codpai}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocparroq{codpai}')): ?><?php echo form_error('ocparroq{codpai}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
<?php echo select_tag('ocparroq[codpai]', options_for_select($pais,$ocparroq->getCodpai(),'include_custom=Seleccione'),array('onChange'=> remote_function(array(
		'update'   => 'divEstados',
		'url'      => 'oycdefdivpar/combo?par=1',
		'with' => "'pais='+this.value"
  ))));?></div>
<br>
<?php echo label_for('ocparroq[codedo]', __($labels['ocparroq{codedo}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('ocparroq{codedo}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocparroq{codedo}')): ?> <?php echo form_error('ocparroq{codedo}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
<div id="divEstados">
<?php echo select_tag('ocparroq[codedo]', options_for_select($estados,$ocparroq->getCodedo(),'include_custom=Seleccione'),array('onChange'=> remote_function(array(
		'update'   => 'divMunicipio',
		'url'      => 'oycdefdivpar/combo?par=2',
		'with' => "'pais='+document.getElementById('ocparroq_codpai').value+'&estado='+this.value"
  ))));?></div>
</div>
<br>
<?php echo label_for('ocparroq[codmun]', __($labels['ocparroq{codmun}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('ocparroq{codmun}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocparroq{codmun}')): ?> <?php echo form_error('ocparroq{codmun}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
<div id="divMunicipio">
<?php echo select_tag('ocparroq[codmun]', options_for_select($municipios,$ocparroq->getCodmun(),'include_custom=Seleccione'),array('onChange'=> remote_function(array(
		'update'   => 'divOtro',
		'url'      => 'oycdefdivpar/combo?par=3',
		'with' => "'pais='+document.getElementById('ocparroq_codpai').value+'&estado='+document.getElementById('ocparroq_codedo').value+'&municipio='+this.value"
  ))));?></div>
</div>
<br>
  <?php echo label_for('ocparroq[codpar]', __($labels['ocparroq{codpar}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocparroq{codpar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocparroq{codpar}')): ?>
    <?php echo form_error('ocparroq{codpar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocparroq, 'getCodpar', array (
  'size' => 10,
  'maxlength' => 4,
  'control_name' => 'ocparroq[codpar]',
  'readonly'  =>  $ocparroq->getId()!='' ? true : false ,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('ocparroq_codpar').value=valor",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocparroq[nompar]', __($labels['ocparroq{nompar}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocparroq{nompar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocparroq{nompar}')): ?>
    <?php echo form_error('ocparroq{nompar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocparroq, 'getNompar', array (
  'size' => 50,
  'maxlength' => 50,
  'control_name' => 'ocparroq[nompar]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('ocparroq' => $ocparroq)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($ocparroq->getId()): ?>
<?php echo button_to(__('delete'), 'oycdefdivpar/delete?id='.$ocparroq->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
