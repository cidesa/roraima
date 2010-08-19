<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _edit_form__.php 40192 2010-08-13 22:57:44Z lhernandez $
 */
// date: 2007/05/15 12:08:22
?>
<?php echo form_tag('doctab/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form', 'onsubmit'  => 'return false;',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($dftabtip, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('dftabtip[tipdoc]', __($labels['dftabtip{tipdoc}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('dftabtip{tipdoc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dftabtip{tipdoc}')): ?>
    <?php echo form_error('dftabtip{tipdoc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('dftabtip[tipdoc]', options_for_select(
  Documentos::getDocs(),
  $dftabtip->getTipdoc(),
  'include_custom=Seleccione...'
));
  ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('dftabtip[vidutil]', __($labels['dftabtip{vidutil}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('dftabtip{vidutil}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dftabtip{vidutil}')): ?>
    <?php echo form_error('dftabtip{vidutil}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('dftabtip[vidutil]', options_for_select(array('1','2','3','4','5','6'),$dftabtip->getVidutil(),'include_custom=Seleccione...')) ?>
  <?php echo __('Años') ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('dftabtip[nomtab]', __($labels['dftabtip{nomtab}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('dftabtip{nomtab}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dftabtip{nomtab}')): ?>
    <?php echo form_error('dftabtip{nomtab}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('dftabtip[nomtab]', options_for_select($tablas,$dftabtip->getNomtab(),'include_custom=Seleccione...'), array('onChange' => remote_function(array(
        'update'   => 'divCombos',//Div a Actualizar
    'url'      => 'doctab/ajax?par=1',//Variable para el control de la accion(1)
    'with' => "'campo='+this.value"//Valor de la variale de la caja de texto
      ))) ) ?>
    </div>
</div>

<div id="divCombos" class="form-row">
<?php include_partial('combos', array('dftabtip' => $dftabtip, 'labels' => $labels, 'campos' => $campos)) ?>

</div>

<div id="divadicional" class="form-row">
<div id="divvalact">
  <?php if($labels['dftabtip{valact}']!='.:') { ?>
  <?php echo label_for('dftabtip[valact]', __($labels['dftabtip{valact}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('dftabtip{valact}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dftabtip{valact}')): ?>
    <?php echo form_error('dftabtip{valact}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($dftabtip, 'getValact', array (
  'size' => 3,
  'control_name' => 'dftabtip[valact]',
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['dftabtip{valact}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divvalanu">
  <?php if($labels['dftabtip{valanu}']!='.:') { ?>
  <?php echo label_for('dftabtip[valanu]', __($labels['dftabtip{valanu}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('dftabtip{valanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dftabtip{valanu}')): ?>
    <?php echo form_error('dftabtip{valanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($dftabtip, 'getValanu', array (
  'size' => 3,
  'control_name' => 'dftabtip[valanu]',
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['dftabtip{valanu}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br>
<div id="divfecini">
  <?php if($labels['dftabtip{fecini}']!='.:') { ?>
  <?php echo label_for('dftabtip[fecini]', __($labels['dftabtip{fecini}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('dftabtip{fecini}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dftabtip{fecini}')): ?>
    <?php echo form_error('dftabtip{fecini}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_date_tag($dftabtip, 'getFecini', array (
  'rich' => true,
  'onkeyup' => 'javascript: mascara(this,\'/\',patron,true)',
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'dftabtip[fecini]',
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['dftabtip{fecini}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
</div>
</fieldset>

<?php include_partial('edit_actions', array('dftabtip' => $dftabtip)) ?>

</div>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($dftabtip->getId()): ?>
<?php echo button_to(__('delete'), 'doctab/delete?id='.$dftabtip->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
