<?php
/*
 * Created on 12/10/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
  <?php $value = object_input_date_tag($ocadjobr, 'getFecgan', array (
  'rich' => true,
    'readonly'  =>  $ocadjobr->getFecgan()!='' ? true : false ,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'ocadjobr[fecgan]',
  'onkeyup' => 'mascara(this,\'/\',patron,true)',
)); echo $value ? $value : '&nbsp;' ?>

<script language="JavaScript" type="text/javascript">
   var reg='<?php echo $ocadjobr->getId(); ?>';
   if (reg!='')
   {
   	   $('trigger_ocadjobr_fecgan').hide();
   }
</script>