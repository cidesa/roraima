<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/04/05 13:39:01
?>
<?php echo form_tag('oycdeforg/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($ocdeforg, 'getId') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools','observe') ?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <?php echo label_for('ocdeforg[codorg]', __($labels['ocdeforg{codorg}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocdeforg{codorg}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdeforg{codorg}')): ?>
    <?php echo form_error('ocdeforg{codorg}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdeforg, 'getCodorg', array (
  'size' => 20,
  'maxlength' => 4,
  'control_name' => 'ocdeforg[codorg]',
  'readonly'  =>  $ocdeforg->getId()!='' ? true : false ,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('ocdeforg_codorg').value=valor",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocdeforg[desorg]', __($labels['ocdeforg{desorg}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocdeforg{desorg}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdeforg{desorg}')): ?>
    <?php echo form_error('ocdeforg{desorg}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdeforg, 'getDesorg', array (
  'size' => 80,
  'maxlength' => 250,
  'control_name' => 'ocdeforg[desorg]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocdeforg[codtiporg]', __($labels['ocdeforg{codtiporg}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocdeforg{codtiporg}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdeforg{codtiporg}')): ?>
    <?php echo form_error('ocdeforg{codtiporg}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo input_auto_complete_tag('ocdeforg[codtiporg]', $ocdeforg->getCodtiporg(),
    'oycdeforg/autocomplete?ajax=1', array('autocomplete' => 'off',
	'maxlength' => 4,'size' => 6,
    'onBlur'=> remote_function(array(
      'url'      => 'oycdeforg/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'with' => "'ajax=1&cajtexmos=ocdeforg_destiporg&cajtexcom=ocdeforg_codtiporg&codigo='+this.value"
      ))),
     array('use_style' => 'true')
  )
?>

  <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Octiporg_Oycdeforg/clase/Octiporg/frame/sf_admin_edit_form/obj1/ocdeforg_codtiporg/obj2/ocdeforg_destiporg/campo1/codtiporg/campo2/destiporg')?>

  <?php $value = object_input_tag($ocdeforg, 'getDestiporg', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'ocdeforg[destiporg]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
<?php echo label_for('ocdeforg[entorg]', __($labels['ocdeforg{entorg}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocdeforg{entorg}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdeforg{entorg}')): ?>
    <?php echo form_error('ocdeforg{entorg}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php
  ?> <?php if($ocdeforg->getEntorg()=='I') $val = true; else $val=false; ?>
  <?php echo "Organismo ".radiobutton_tag('ocdeforg[entorg]', 'O', !$val) ?>  &nbsp;
  <?php echo "Institución ".radiobutton_tag('ocdeforg[entorg]', 'I', $val) ?>
    </div>
<br>
<?php echo label_for('ocdeforg[dirorg]', __($labels['ocdeforg{dirorg}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocdeforg{dirorg}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdeforg{dirorg}')): ?>
    <?php echo form_error('ocdeforg{dirorg}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdeforg, 'getDirorg', array (
  'size' => 80,
  'maxlength' => 100,
  'control_name' => 'ocdeforg[dirorg]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
<?php echo label_for('ocdeforg[codpai]', __($labels['ocdeforg{codpai}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('ocdeforg{codpai}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocdeforg{codpai}')): ?><?php echo form_error('ocdeforg{codpai}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
<?php echo select_tag('ocdeforg[codpai]', options_for_select($pais,$ocdeforg->getCodpai(),'include_custom=Seleccione'),array('onChange'=> remote_function(array(
		'update'   => 'divEstados',
		'url'      => 'oycdeforg/combo?par=1',
		'with' => "'pais='+this.value"
  ))));?></div>
<br>
<?php echo label_for('ocdeforg[codedo]', __($labels['ocdeforg{codedo}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('ocdeforg{codedo}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocdeforg{codedo}')): ?> <?php echo form_error('ocdeforg{codedo}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
<div id="divEstados">
<?php echo select_tag('ocdeforg[codedo]', options_for_select($estados,$ocdeforg->getCodedo(),'include_custom=Seleccione'),array('onChange'=> remote_function(array(
		'update'   => 'divCiudad',
		'url'      => 'oycdeforg/combo?par=2',
		'with' => "'pais='+document.getElementById('ocdeforg_codpai').value+'&estado='+this.value"
  ))));?></div>
</div>
<br>
<?php echo label_for('ocdeforg[codciu]', __($labels['ocdeforg{codciu}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('ocdeforg{codciu}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocdeforg{codciu}')): ?> <?php echo form_error('ocdeforg{codciu}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
<div id="divCiudad">
<?php echo select_tag('ocdeforg[codciu]', options_for_select($ciudades,$ocdeforg->getCodciu(),'include_custom=Seleccione'),array('onChange'=> remote_function(array(
		'update'   => 'divOtro',
		'url'      => 'oycdeforg/combo?par=3',
		'with' => "'pais='+document.getElementById('ocdeforg_codpai').value+'&estado='+document.getElementById('ocdeforg_codedo').value+'&ciudad='+this.value"
  ))));?></div>
</div>
<br>
<?php echo label_for('ocdeforg[telorg]', __($labels['ocdeforg{telorg}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocdeforg{telorg}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdeforg{telorg}')): ?>
    <?php echo form_error('ocdeforg{telorg}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdeforg, 'getTelorg', array (
  'size' => 20,
  'maxlength' => 30,
  'control_name' => 'ocdeforg[telorg]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
<?php echo label_for('ocdeforg[faxorg]', __($labels['ocdeforg{faxorg}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocdeforg{faxorg}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdeforg{faxorg}')): ?>
    <?php echo form_error('ocdeforg{faxorg}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdeforg, 'getFaxorg', array (
  'size' => 20,
  'maxlength' => 15,
  'control_name' => 'ocdeforg[faxorg]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
<?php echo label_for('ocdeforg[emaorg]', __($labels['ocdeforg{emaorg}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocdeforg{emaorg}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdeforg{emaorg}')): ?>
    <?php echo form_error('ocdeforg{emaorg}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdeforg, 'getEmaorg', array (
  'size' => 50,
  'maxlength' => 50,
  'control_name' => 'ocdeforg[emaorg]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('ocdeforg' => $ocdeforg)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($ocdeforg->getId()): ?>
<?php echo button_to(__('delete'), 'oycdeforg/delete?id='.$ocdeforg->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
