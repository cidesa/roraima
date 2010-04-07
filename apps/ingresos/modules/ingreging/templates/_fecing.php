  <?php
  if ($cireging->getId()!=''){
  $value = object_input_date_tag($cireging, 'getFecing', array (
  'readonly' => true,
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'cireging[fecing]',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;';

  }else
  {

  $value = object_input_date_tag($cireging, 'getFecing', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'cireging[fecing]',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ;}?>

<script type="text/javascript">
 if ($('cireging_blocfec').value=='S')
 {
	 $('trigger_cireging_fecing').hide();
 	 $('cireging_fecing').readOnly=true;
 }

 if ($('id').value=='' && $('cireging_mansolocor').value=='S')
 {
	 $('cireging_refing').value='########';
   $('cireging_refing').readOnly=true;
 }
</script>