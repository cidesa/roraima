<?php if($catregper->getTipper()=='N'){?>
<?php echo radiobutton_tag('catregper[tipper]', 'N', true,array('disabled' => false))        ." Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('catregper[tipper]', 'J', false,array('disabled' => false))."   Juridica";

      }else {?>
<?php echo radiobutton_tag('catregper[tipper]', 'N', false,array('disabled' => false))        ." Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('catregper[tipper]', 'J', true,array('disabled' => false))."   Juridica"; ?>
<?php } ?>
