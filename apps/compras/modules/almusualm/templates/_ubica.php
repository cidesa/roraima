<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php $arreglo=$params['estado'];?>
<?php $codedo=$params['codedo'];?>

  <?php if($labels['causualm{codest}']!='.:') { ?>
  <?php echo label_for('causualm[codest]', __($labels['causualm{codest}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('causualm{codest}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('causualm{codest}')): ?>
    <?php echo form_error('causualm{codest}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>


  <?php echo select_tag('causualm[codest]', options_for_select($arreglo,$codedo), array (
   'onChange'=> remote_function(array(
                          'update'   => 'divalm',
			  'url'      => 'almusualm/ajax',
			  'complete' => 'AjaxJSON(request, json)',			  
  			  'with' => "'ajax=2&codigo='+this.value"
			  )),
)); ?>


  <?php if($labels['causualm{codest}']!='.:') { ?>



  </div>
  <?php  } ?>
<script>
    function MarcarTodos(id)
    {
        var tfil = obtener_filas_grid('a', 1);
        for(i=0;i<tfil;i++)
        {
            if($(id).checked==false)
                $('ax_'+i+'_1').checked=false;
            else
                $('ax_'+i+'_1').checked=true;
        }
    }
</script>




