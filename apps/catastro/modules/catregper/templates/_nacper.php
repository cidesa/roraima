<?php if($catregper->getNacper()=='E'){?>
<?php echo radiobutton_tag('catregper[nacper]', 'V', false,array('disabled' => false))        ." Venezolano".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('catregper[nacper]', 'E', true,array('disabled' => false))."   Extranjero";

      }else {?>
<?php echo radiobutton_tag('catregper[nacper]', 'V', true,array('disabled' => false))        ." Venezolano".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('catregper[nacper]', 'E', false,array('disabled' => false))."   Extranjero"; ?>
<?php } ?>
