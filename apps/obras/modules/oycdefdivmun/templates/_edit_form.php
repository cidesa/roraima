<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/06/29 18:49:14
?>
<?php echo form_tag('oycdefdivmun/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($ocmunici, 'getId') ?>
<?php echo javascript_include_tag('tools','ajax','observe') ?>
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos del Municipio')?></legend>
<div class="form-row">
<?php echo label_for('ocmunici[codpai]', __($labels['ocmunici{codpai}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('ocmunici{codpai}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocmunici{codpai}')): ?><?php echo form_error('ocmunici{codpai}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
<?php echo select_tag('ocmunici[codpai]', options_for_select($pais,$ocmunici->getCodpai(),'include_custom=Seleccione'),array('onChange'=> remote_function(array(
		'update'   => 'divEstados',
		'url'      => 'oycdefdivmun/combo?par=1',
		'with' => "'pais='+this.value"
  ))));?></div>
<br>
<?php echo label_for('ocmunici[codedo]', __($labels['ocmunici{codedo}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('ocmunici{codedo}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocmunici{codedo}')): ?> <?php echo form_error('ocmunici{codedo}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
<div id="divEstados">
<?php echo select_tag('ocmunici[codedo]', options_for_select($estados,$ocmunici->getCodedo(),'include_custom=Seleccione'),array('onChange'=> remote_function(array(
		'update'   => 'divCiudad',
		'url'      => 'oycdefdivmun/combo?par=2',
		'with' => "'pais='+document.getElementById('ocmunici_codpai').value+'&estado='+this.value"
  ))));?></div>
</div>
<br>
  <?php echo label_for('ocmunici[codmun]', __($labels['ocmunici{codmun}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocmunici{codmun}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocmunici{codmun}')): ?>
    <?php echo form_error('ocmunici{codmun}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocmunici, 'getCodmun', array (
  'size' => 10,
  'maxlength' => 4,
  'control_name' => 'ocmunici[codmun]',
   'readonly'  =>  $ocmunici->getId()!='' ? true : false ,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('ocmunici_codmun').value=valor",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocmunici[nommun]', __($labels['ocmunici{nommun}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocmunici{nommun}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocmunici{nommun}')): ?>
    <?php echo form_error('ocmunici{nommun}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocmunici, 'getNommun', array (
  'size' => 50,
  'maxlength' => 50,
  'control_name' => 'ocmunici[nommun]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('ocmunici' => $ocmunici)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($ocmunici->getId()): ?>
<?php echo button_to(__('delete'), 'oycdefdivmun/delete?id='.$ocmunici->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
