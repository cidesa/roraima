<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php $arrsal=$params['arrsal'];?>

<table>
        <tr>
            <th>
                  <div id="divtodret">
			  <?php if($labels['npdefespparpre{totret}']!='.:') { ?>
			  <?php echo label_for('npdefespparpre[totret]', __($labels['npdefespparpre{totret}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
			  <div class="divlado<?php if ($sf_request->hasError('npdefespparpre{totret}')): ?> form-error<?php endif; ?>">
			  <?php if ($sf_request->hasError('npdefespparpre{totret}')): ?>
			    <?php echo form_error('npdefespparpre{totret}', array('class' => 'form-error-msg')) ?>
			  <?php endif; }?>



			  <?php $value = object_checkbox_tag($npdefespparpre, 'getTotret', array (
			  'control_name' => 'npdefespparpre[totret]',
			)); echo $value ? $value : '&nbsp;' ?>


			  <?php if($labels['npdefespparpre{totret}']!='.:') { ?>



			  </div>
			  <?php  } ?>

			</div>
            </th>
        </tr>
	<tr>
		<th>
			<div id="divnumdiaant">
			  <?php if($labels['npdefespparpre{numdiaant}']!='.:') { ?>
			  <?php echo label_for('npdefespparpre[numdiaant]', __($labels['npdefespparpre{numdiaant}' ]), 'class="required" Style="text-align:left; width:143px"') ?>
			  <div class="divlado<?php if ($sf_request->hasError('npdefespparpre{numdiaant}')): ?> form-error<?php endif; ?>">
			  <?php if ($sf_request->hasError('npdefespparpre{numdiaant}')): ?>
			    <?php echo form_error('npdefespparpre{numdiaant}', array('class' => 'form-error-msg')) ?>
			  <?php endif; }?>



			 <?php $value = object_input_tag($npdefespparpre, array('getNumdiaant',true), array (
                              'size' => 7,
                              'onKeyPress' => 'return validaDecimal(event)',
                              'onBlur' => 'event.keyCode=13;return formatoDecimal(event,this.id)',
                              'control_name' => 'npdefespparpre[numdiaant]',
                            )); echo $value ? $value : '&nbsp;' ?>


			  <?php if($labels['npdefespparpre{numdiaant}']!='.:') { ?>



			  </div>
			  <?php  } ?>

			</div>
		</th>
		<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
		<th>
			<div id="divporanoant">
			  <?php if($labels['npdefespparpre{poranoant}']!='.:') { ?>
			  <?php echo label_for('npdefespparpre[poranoant]', __($labels['npdefespparpre{poranoant}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
			  <div class="divlado<?php if ($sf_request->hasError('npdefespparpre{poranoant}')): ?> form-error<?php endif; ?>">
			  <?php if ($sf_request->hasError('npdefespparpre{poranoant}')): ?>
			    <?php echo form_error('npdefespparpre{poranoant}', array('class' => 'form-error-msg')) ?>
			  <?php endif; }?>



			  <?php $value = object_checkbox_tag($npdefespparpre, 'getPoranoant', array (
			  'control_name' => 'npdefespparpre[poranoant]',
                          'onClick' => 'VerificarCheck("1")',
			)); echo $value ? $value : '&nbsp;' ?>


			  <?php if($labels['npdefespparpre{poranoant}']!='.:') { ?>



			  </div>
			  <?php  } ?>

			</div>
		</th>
	</tr>
        <tr>
		<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
		<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
		<th>
			<div id="divpormesant">
			  <?php if($labels['npdefespparpre{pormesant}']!='.:') { ?>
			  <?php echo label_for('npdefespparpre[pormesant]', __($labels['npdefespparpre{pormesant}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
			  <div class="divlado<?php if ($sf_request->hasError('npdefespparpre{v}')): ?> form-error<?php endif; ?>">
			  <?php if ($sf_request->hasError('npdefespparpre{pormesant}')): ?>
			    <?php echo form_error('npdefespparpre{pormesant}', array('class' => 'form-error-msg')) ?>
			  <?php endif; }?>



			  <?php $value = object_checkbox_tag($npdefespparpre, 'getPormesant', array (
			  'control_name' => 'npdefespparpre[pormesant]',
                          'onClick' => 'VerificarCheck("2")',
			)); echo $value ? $value : '&nbsp;' ?>


			  <?php if($labels['npdefespparpre{pormesant}']!='.:') { ?>



			  </div>
			  <?php  } ?>

			</div>
		</th>
	</tr>
</table>
<br>

  <?php if($labels['npdefespparpre{tipsaldiaant}']!='.:') { ?>
  <?php echo label_for('npdefespparpre[tipsaldiaant]', __($labels['npdefespparpre{tipsaldiaant}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('npdefespparpre{tipsaldiaant}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdefespparpre{tipsaldiaant}')): ?>
    <?php echo form_error('npdefespparpre{tipsaldiaant}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>


  <?php echo select_tag('npdefespparpre[tipsaldiaant]', options_for_select($arrsal, $npdefespparpre->getTipsaldiaant(), array (
  'control_name' => 'npdefespparpre[tipsaldiaant]',
))); ?>


  <?php if($labels['npdefespparpre{tipsaldiaant}']!='.:') { ?>



  </div>
  <?php  } ?>


<script language="JavaScript">
	var p = '<?php echo $npdefespparpre->getPoranoant()?>';
	if(p!='S')
		$('npdefespparpre_poranoant').checked=false;
	else
		$('npdefespparpre_poranoant').checked=true;

        var p = '<?php echo $npdefespparpre->getTotret()?>';
	if(p!='S')
		$('npdefespparpre_totret').checked=false;
	else
		$('npdefespparpre_totret').checked=true;

        var p = '<?php echo $npdefespparpre->getPormesant()?>';
	if(p!='S')
		$('npdefespparpre_pormesant').checked=false;
	else
		$('npdefespparpre_pormesant').checked=true;

        function VerificarCheck(c)
        {
            if(c=='2')
                $('npdefespparpre_poranoant').checked=false;
            else
                $('npdefespparpre_pormesant').checked=false;
        }

</script>
