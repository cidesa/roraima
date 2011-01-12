<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:_edit_form.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/06/20 09:40:40
?>
<?php echo form_tag('fordefgen/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($fordefegrgen, 'getId') ?>

<?php use_helper('Javascript', 'Grid', 'PopUp', 'Linktoapp') ?>
<?php echo javascript_include_tag('dFilter', 'ajax', 'tools', 'formulacion/fordefgen') ?>

<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<?php echo label_for('label1', __('Estructura del Código Presupuestario'), 'class="required" style="width: 270px"') ?>
    <div class="content<?php if ($sf_request->hasError('fordefegrgen{desproacc}')): ?> form-error<?php endif; ?>">

    <?php echo input_tag('forpre', $forpre, array (
      'size' => 45, 'readonly' => true,
    )) ?></div>

<br>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Nivel de los Proyectos y Acciones Centralizadas')?></legend>
<div class="form-row">
<table>
 <tr>
  <th><?php echo label_for('fordefegrgen[desproacc]', __($labels['fordefegrgen{desproacc}']), 'class="required" ') ?>
      <div class="content<?php if ($sf_request->hasError('fordefegrgen{desproacc}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('fordefegrgen{desproacc}')): ?>
        <?php echo form_error('fordefegrgen{desproacc}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_input_tag($fordefegrgen, 'getDesproacc', array (
      'size' => 7,
      'control_name' => 'fordefegrgen[desproacc]',
      'maxlength' => 2,
    )); echo $value ? $value : '&nbsp;' ?>
        </div></th>
  <th>&nbsp;&nbsp;&nbsp;</th>
  <th><?php echo label_for('fordefegrgen[hasproacc]', __($labels['fordefegrgen{hasproacc}']), 'class="required" ') ?>
      <div class="content<?php if ($sf_request->hasError('fordefegrgen{hasproacc}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('fordefegrgen{hasproacc}')): ?>
        <?php echo form_error('fordefegrgen{hasproacc}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_input_tag($fordefegrgen, 'getHasproacc', array (
      'size' => 7,
      'control_name' => 'fordefegrgen[hasproacc]',
      'onKeypress' =>  'medida(event,"1","'.$forpre.'")',
      'maxlength' => 2,
    )); echo $value ? $value : '&nbsp;' ?>
        </div></th>
  <th>&nbsp;&nbsp;&nbsp;</th>
  <th><?php echo label_for('fordefegrgen[lonproacc]', __($labels['fordefegrgen{lonproacc}']), 'class="required" ') ?>
      <div class="content<?php if ($sf_request->hasError('fordefegrgen{lonproacc}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('fordefegrgen{lonproacc}')): ?>
        <?php echo form_error('fordefegrgen{lonproacc}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_input_tag($fordefegrgen, 'getLonproacc', array (
      'size' => 7,
      'control_name' => 'fordefegrgen[lonproacc]',
      'readonly' => true,
    )); echo $value ? $value : '&nbsp;' ?>
        </div></th>
  <th>&nbsp;&nbsp;&nbsp;</th>
  <th> <?php echo label_for('fordefegrgen[forproacc]', __($labels['fordefegrgen{forproacc}']), 'class="required" ') ?>
      <div class="content<?php if ($sf_request->hasError('fordefegrgen{forproacc}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('fordefegrgen{forproacc}')): ?>
        <?php echo form_error('fordefegrgen{forproacc}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_input_tag($fordefegrgen, 'getForproacc', array (
      'size' => 20,
      'control_name' => 'fordefegrgen[forproacc]',
      'readonly' => true,
    )); echo $value ? $value : '&nbsp;' ?>
        </div></th>
 </tr>
</table>
</div>
</fieldset>

<br>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Nivel de las Acciones Específicas')?></legend>
<div class="form-row">
<table>
 <tr>
  <th><?php echo label_for('fordefegrgen[desaccesp]', __($labels['fordefegrgen{desaccesp}']), 'class="required" ') ?>
        <div class="content<?php if ($sf_request->hasError('fordefegrgen{desaccesp}')): ?> form-error<?php endif; ?>">
        <?php if ($sf_request->hasError('fordefegrgen{desaccesp}')): ?>
          <?php echo form_error('fordefegrgen{desaccesp}', array('class' => 'form-error-msg')) ?>
        <?php endif; ?>

        <?php $value = object_input_tag($fordefegrgen, 'getDesaccesp', array (
        'size' => 7,
        'control_name' => 'fordefegrgen[desaccesp]',
        'maxlength' => 2,
      )); echo $value ? $value : '&nbsp;' ?>
      </div></th>
  <th>&nbsp;&nbsp;&nbsp;</th>
  <th><?php echo label_for('fordefegrgen[hasaccesp]', __($labels['fordefegrgen{hasaccesp}']), 'class="required" ') ?>
        <div class="content<?php if ($sf_request->hasError('fordefegrgen{hasaccesp}')): ?> form-error<?php endif; ?>">
        <?php if ($sf_request->hasError('fordefegrgen{hasaccesp}')): ?>
          <?php echo form_error('fordefegrgen{hasaccesp}', array('class' => 'form-error-msg')) ?>
        <?php endif; ?>

        <?php $value = object_input_tag($fordefegrgen, 'getHasaccesp', array (
        'size' => 7,
        'control_name' => 'fordefegrgen[hasaccesp]',
        'onKeypress' =>  'medida(event,"2","'.$forpre.'")',
        'maxlength' => 2,
      )); echo $value ? $value : '&nbsp;' ?>
          </div></th>
  <th>&nbsp;&nbsp;&nbsp;</th>
  <th> <?php echo label_for('fordefegrgen[lonaccesp]', __($labels['fordefegrgen{lonaccesp}']), 'class="required" ') ?>
      <div class="content<?php if ($sf_request->hasError('fordefegrgen{lonaccesp}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('fordefegrgen{lonaccesp}')): ?>
        <?php echo form_error('fordefegrgen{lonaccesp}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_input_tag($fordefegrgen, 'getLonaccesp', array (
      'size' => 7,
      'control_name' => 'fordefegrgen[lonaccesp]',
      'readonly' => true,
    )); echo $value ? $value : '&nbsp;' ?>
        </div></th>
  <th>&nbsp;&nbsp;&nbsp;</th>
  <th><?php echo label_for('fordefegrgen[foraccesp]', __($labels['fordefegrgen{foraccesp}']), 'class="required" ') ?>
      <div class="content<?php if ($sf_request->hasError('fordefegrgen{foraccesp}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('fordefegrgen{foraccesp}')): ?>
        <?php echo form_error('fordefegrgen{foraccesp}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_input_tag($fordefegrgen, 'getForaccesp', array (
      'size' => 20,
      'control_name' => 'fordefegrgen[foraccesp]',
      'readonly' => true,
    )); echo $value ? $value : '&nbsp;' ?>
     </div></th>
 </tr>
</table>
</div>
</fieldset>

<br>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Nivel de las Actividades o Sub Acciones Especificas')?></legend>
<div class="form-row">
<table>
 <tr>
  <th><?php echo label_for('fordefegrgen[dessubaccesp]', __($labels['fordefegrgen{dessubaccesp}']), 'class="required" ') ?>
      <div class="content<?php if ($sf_request->hasError('fordefegrgen{dessubaccesp}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('fordefegrgen{dessubaccesp}')): ?>
        <?php echo form_error('fordefegrgen{dessubaccesp}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_input_tag($fordefegrgen, 'getDessubaccesp', array (
      'size' => 7,
      'control_name' => 'fordefegrgen[dessubaccesp]',
      'maxlength' => 2,
    )); echo $value ? $value : '&nbsp;' ?>
        </div></th>
  <th>&nbsp;&nbsp;&nbsp;</th>
  <th><?php echo label_for('fordefegrgen[hassubaccesp]', __($labels['fordefegrgen{hassubaccesp}']), 'class="required" ') ?>
      <div class="content<?php if ($sf_request->hasError('fordefegrgen{hassubaccesp}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('fordefegrgen{hassubaccesp}')): ?>
        <?php echo form_error('fordefegrgen{hassubaccesp}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_input_tag($fordefegrgen, 'getHassubaccesp', array (
      'size' => 7,
      'control_name' => 'fordefegrgen[hassubaccesp]',
      'onKeypress' =>  'medida(event,"3","'.$forpre.'")',
      'maxlength' => 2,
      )); echo $value ? $value : '&nbsp;' ?>
        </div></th>
  <th>&nbsp;&nbsp;&nbsp;</th>
  <th><?php echo label_for('fordefegrgen[lonsubaccesp]', __($labels['fordefegrgen{lonsubaccesp}']), 'class="required" ') ?>
      <div class="content<?php if ($sf_request->hasError('fordefegrgen{lonsubaccesp}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('fordefegrgen{lonsubaccesp}')): ?>
        <?php echo form_error('fordefegrgen{lonsubaccesp}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_input_tag($fordefegrgen, 'getLonsubaccesp', array (
      'size' => 7,
      'control_name' => 'fordefegrgen[lonsubaccesp]',
      'readonly' => true,
    )); echo $value ? $value : '&nbsp;' ?>
        </div></th>
  <th>&nbsp;&nbsp;&nbsp;</th>
  <th> <?php echo label_for('fordefegrgen[forsubaccesp]', __($labels['fordefegrgen{forsubaccesp}']), 'class="required" ') ?>
      <div class="content<?php if ($sf_request->hasError('fordefegrgen{forsubaccesp}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('fordefegrgen{forsubaccesp}')): ?>
        <?php echo form_error('fordefegrgen{forsubaccesp}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_input_tag($fordefegrgen, 'getForsubaccesp', array (
      'size' => 20,
      'control_name' => 'fordefegrgen[forsubaccesp]',
      'readonly' => true,
    )); echo $value ? $value : '&nbsp;' ?>
     </div></th>
 </tr>
</table>
</div>
</fieldset>

<br>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Nivel de las Unidades Ejecutoras o Administrativas')?></legend>
<div class="form-row">
<table>
 <tr>
  <th><?php echo label_for('fordefegrgen[desuae]', __($labels['fordefegrgen{desuae}']), 'class="required" ') ?>
      <div class="content<?php if ($sf_request->hasError('fordefegrgen{desuae}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('fordefegrgen{desuae}')): ?>
        <?php echo form_error('fordefegrgen{desuae}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_input_tag($fordefegrgen, 'getDesuae', array (
      'size' => 7,
      'control_name' => 'fordefegrgen[desuae]',
      'maxlength' => 2,
      )); echo $value ? $value : '&nbsp;' ?>
      </div></th>
  <th>&nbsp;&nbsp;&nbsp;</th>
  <th>  <?php echo label_for('fordefegrgen[hasuae]', __($labels['fordefegrgen{hasuae}']), 'class="required" ') ?>
      <div class="content<?php if ($sf_request->hasError('fordefegrgen{hasuae}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('fordefegrgen{hasuae}')): ?>
        <?php echo form_error('fordefegrgen{hasuae}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_input_tag($fordefegrgen, 'getHasuae', array (
      'size' => 7,
      'control_name' => 'fordefegrgen[hasuae]',
      'onKeypress' =>  'medida(event,"4","'.$forpre.'")',
      'maxlength' => 2,
    )); echo $value ? $value : '&nbsp;' ?>
        </div></th>
  <th>&nbsp;&nbsp;&nbsp;</th>
  <th><?php echo label_for('fordefegrgen[lonuae]', __($labels['fordefegrgen{lonuae}']), 'class="required" ') ?>
      <div class="content<?php if ($sf_request->hasError('fordefegrgen{lonuae}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('fordefegrgen{lonuae}')): ?>
        <?php echo form_error('fordefegrgen{lonuae}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_input_tag($fordefegrgen, 'getLonuae', array (
      'size' => 7,
      'control_name' => 'fordefegrgen[lonuae]',
      'readonly' => true,
    )); echo $value ? $value : '&nbsp;' ?>
        </div></th>
  <th>&nbsp;&nbsp;&nbsp;</th>
  <th></th>
  <th>&nbsp;&nbsp;&nbsp;</th>
  <th><?php echo label_for('fordefegrgen[foruae]', __($labels['fordefegrgen{foruae}']), 'class="required" ') ?>
      <div class="content<?php if ($sf_request->hasError('fordefegrgen{foruae}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('fordefegrgen{foruae}')): ?>
        <?php echo form_error('fordefegrgen{foruae}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_input_tag($fordefegrgen, 'getForuae', array (
      'size' => 20,
      'control_name' => 'fordefegrgen[foruae]',
      'readonly' => true,
    )); echo $value ? $value : '&nbsp;' ?>
    </div></th>
 </tr>
</table>
</div>
</fieldset>

<br>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Nivel de las Partidas')?></legend>
<div class="form-row">
<table>
 <tr>
  <th><?php echo label_for('fordefegrgen[despar]', __($labels['fordefegrgen{despar}']), 'class="required" ') ?>
      <div class="content<?php if ($sf_request->hasError('fordefegrgen{despar}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('fordefegrgen{despar}')): ?>
        <?php echo form_error('fordefegrgen{despar}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_input_tag($fordefegrgen, 'getDespar', array (
      'size' => 7,
      'control_name' => 'fordefegrgen[despar]',
      'maxlength' => 2,
    )); echo $value ? $value : '&nbsp;' ?>
        </div></th>
  <th>&nbsp;&nbsp;&nbsp;</th>
  <th><?php echo label_for('fordefegrgen[haspar]', __($labels['fordefegrgen{haspar}']), 'class="required" ') ?>
      <div class="content<?php if ($sf_request->hasError('fordefegrgen{haspar}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('fordefegrgen{haspar}')): ?>
        <?php echo form_error('fordefegrgen{haspar}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_input_tag($fordefegrgen, 'getHaspar', array (
      'size' => 7,
      'control_name' => 'fordefegrgen[haspar]',
      'onKeypress' =>  'medida(event,"5","'.$forpre.'")',
      'maxlength' => 2,
    )); echo $value ? $value : '&nbsp;' ?>
        </div></th>
  <th>&nbsp;&nbsp;&nbsp;</th>
  <th> <?php echo label_for('fordefegrgen[lonpar]', __($labels['fordefegrgen{lonpar}']), 'class="required" ') ?>
      <div class="content<?php if ($sf_request->hasError('fordefegrgen{lonpar}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('fordefegrgen{lonpar}')): ?>
        <?php echo form_error('fordefegrgen{lonpar}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_input_tag($fordefegrgen, 'getLonpar', array (
      'size' => 7,
      'control_name' => 'fordefegrgen[lonpar]',
      'readonly' => true,
    )); echo $value ? $value : '&nbsp;' ?>
        </div></th>
  <th>&nbsp;&nbsp;&nbsp;</th>
  <th> <?php echo label_for('fordefegrgen[forpar]', __($labels['fordefegrgen{forpar}']), 'class="required" ') ?>
      <div class="content<?php if ($sf_request->hasError('fordefegrgen{forpar}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('fordefegrgen{forpar}')): ?>
        <?php echo form_error('fordefegrgen{forpar}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_input_tag($fordefegrgen, 'getForpar', array (
      'size' => 20,
      'control_name' => 'fordefegrgen[forpar]',
      'readonly' => true,
    )); echo $value ? $value : '&nbsp;' ?>
        </div></th>
 </tr>
</table>
</div>
</fieldset>

<br>

  <table>
   <tr>
    <th><?php echo label_for('fordefegrgen[codpariva]', __($labels['fordefegrgen{codpariva}']), 'class="required" style="width:200px"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefegrgen{codpariva}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefegrgen{codpariva}')): ?>
    <?php echo form_error('fordefegrgen{codpariva}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php echo input_auto_complete_tag('fordefegrgen[codpariva]', $fordefegrgen->getCodpariva(),
    'fordefgen/autocomplete?ajax=1', array('autocomplete' => 'off', 'onBlur'=> remote_function(array(
    'url'      => 'fordefgen/ajax',
    'complete' => 'AjaxJSON(request, json)',
    'condition' => "$('fordefegrgen_codpariva').value != ''",
    'script'   => true,
    'with' => "'ajax=2&cajtexmos=fordefegrgen_nomparegr&cajtexcom=fordefegrgen_codpariva&codigo='+this.value"
    ))),
    array('use_style' => 'true')
  )
  ?>

    <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Fordefparegr_Fordefgen/clase/Fordefparegr/frame/sf_admin_edit_form/obj1/fordefegrgen_codpariva/obj2/fordefegrgen_nomparegr/campo1/CODPAREGR/campo2/NOMPAREGR/param1/'.$codpariva)?>

    <?php //echo input_tag('despar',$fordefegrgen->getDespar(),'size=50,disabled=true'); ?>

  <?php $value = object_input_tag($fordefegrgen, 'getNomparegr', array (
  'disabled' => true,
  'size' => 80,
  'control_name' => 'fordefegrgen[nomparegr]',
)); echo $value ? $value : '&nbsp;' ?>

</div></th>
    </th>
   </tr>
  </table>

<br>

  <table>
   <tr>
   <th><?php echo label_for('fordefegrgen[manivafor]', __($labels['fordefegrgen{manivafor}']), 'class="required" style="width: 200px"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefegrgen{manivafor}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefegrgen{manivafor}')): ?>
    <?php echo form_error('fordefegrgen{manivafor}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?  if ($fordefegrgen->getManivafor()=='S') $val=true; else $val=false; ?>
<?php echo "Si ".radiobutton_tag('fordefegrgen[manivafor]', 'S', $val) ?>&nbsp;
<?php echo "No ".radiobutton_tag('fordefegrgen[manivafor]', 'N', !$val) ?></div></th>
   <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
   <th><?php echo label_for('fordefegrgen[porivafor]', __($labels['fordefegrgen{porivafor}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefegrgen{porivafor}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefegrgen{porivafor}')): ?>
    <?php echo form_error('fordefegrgen{porivafor}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo input_tag('fordefegrgen_moniva',$fordefegrgen->getPorivafor(),'size=3 maxlength=7'); ?> &nbsp;&nbsp;%</div></th>

   </tr>
  </table>

<br>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Correlativos')?></legend>
<div class="form-row">
<table>
 <tr>
  <th><?php echo label_for('fordefegrgen[corest]', __($labels['fordefegrgen{corest}']), 'class="required" ') ?>
      <div class="content<?php if ($sf_request->hasError('fordefegrgen{corest}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('fordefegrgen{corest}')): ?>
        <?php echo form_error('fordefegrgen{corest}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_input_tag($fordefegrgen, 'getCorest', array (
      'size' => 7,
      'control_name' => 'fordefegrgen[corest]',
      'maxlength' => 2,
      'disabled' => 'true',
    )); echo $value ? $value : '&nbsp;' ?>
        </div></th>
  <th>&nbsp;&nbsp;&nbsp;</th>
  <th><?php echo label_for('fordefegrgen[corequ]', __($labels['fordefegrgen{corequ}']), 'class="required" ') ?>
      <div class="content<?php if ($sf_request->hasError('fordefegrgen{corequ}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('fordefegrgen{corequ}')): ?>
        <?php echo form_error('fordefegrgen{corequ}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_input_tag($fordefegrgen, 'getCorequ', array (
      'size' => 7,
      'control_name' => 'fordefegrgen[corequ]',
      'maxlength' => 2,
      'disabled' => 'true',
    )); echo $value ? $value : '&nbsp;' ?>
        </div></th>
  <th>&nbsp;&nbsp;&nbsp;</th>
  <th><?php echo label_for('fordefegrgen[corsec]', __($labels['fordefegrgen{corsec}']), 'class="required" ') ?>
      <div class="content<?php if ($sf_request->hasError('fordefegrgen{corsec}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('fordefegrgen{corsec}')): ?>
        <?php echo form_error('fordefegrgen{corsec}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_input_tag($fordefegrgen, 'getCorsec', array (
      'size' => 7,
      'control_name' => 'fordefegrgen[corsec]',
      'maxlength' => 2,
      'disabled' => 'true',
    )); echo $value ? $value : '&nbsp;' ?>
        </div></th>
 </tr>
</table>
</div>
</fieldset>
</div>
</fieldset>


<?php include_partial('edit_actions', array('fordefegrgen' => $fordefegrgen)) ?>

</form>


