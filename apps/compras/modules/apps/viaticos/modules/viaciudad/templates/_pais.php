<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php $arreglo=$params['pais'];?>

  <?php if($labels['viaciudad{codpai}']!='.:') { ?>
  <?php echo label_for('viaciudad[codpai]', __($labels['viaciudad{codpai}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viaciudad{codpai}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viaciudad{codpai}')): ?>
    <?php echo form_error('viaciudad{codpai}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>


  <?php echo select_tag('viaciudad[codpai]', options_for_select($arreglo,$viaciudad->getCodpai()), array (
    'onChange'=> remote_function(array(
          'update'   => 'divestado',
          'url'      => 'viaciudad/ajax',
          'complete' => 'AjaxJSON(request, json)',          
          'script' => true,
          'with' => "'ajax=1&codigo='+this.value"
          ))
)); ?>


  <?php if($labels['viaciudad{codpai}']!='.:') { ?>



  </div>
  <?php  } ?>



