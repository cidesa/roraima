<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>
<?php echo select_tag('cpdeftit[perpre]', options_for_select(Array('00'=>'00','01'=>'01','02'=>'02','03'=>'03','04'=>'04','05'=>'05','06'=>'06','07'=>'07','08'=>'08','09'=>'09','10'=>'10','11'=>'11','12'=>'12'),'00'),array('onChange'=> remote_function(array(
  'update'   => 'divgrid',
  'url'      => 'preejeglo/ajax',
  'script' => true,
  'complete' => 'AjaxJSON(request, json)',
  'with' => "'ajax=1&perpre='+this.value+'&cajtexmos=cpdeftit_nompre&codigo='+$('cpdeftit_codpre').value"
)))); ?>
