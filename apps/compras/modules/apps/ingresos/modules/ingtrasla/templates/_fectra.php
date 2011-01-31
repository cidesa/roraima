<?
//if ($citrasla->getStatra()=='N'){
  $value = object_input_date_tag($citrasla, 'getFectra', array (
  'readonly'  =>  $citrasla->getId()!='' ? true : false ,
  'readonly' => true,
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'citrasla[fectra]',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;';

//}else{

  //    $fectra = split('/', $fectra);
    //$fectra = $fectra[2] . "-" . $fectra[1] . "-" . $fectra[0];


  /*$value = object_input_tag($citrasla, 'getFectra', array (
  'readonly'  =>  $citrasla->getId()!='' ? true : false ,
  'size' => 10,
  'control_name' => 'citrasla[fectra]',
)); echo $value ? $value : '&nbsp;';
*/
//}
?>

<script>
  if ($('citrasla_statra').value=="N")
  {
    $('trigger_citrasla_fectra').hide();
  }
</script>