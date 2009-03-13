<?php if($viaregente->getNacent()=='I'){?>
<?php echo radiobutton_tag('viaregente[nacent]', 'N', false,array('disabled' => false))        ." Nacional".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('viaregente[nacent]', 'I', true,array('disabled' => false))."   Internacional";

      }else {?>
<?php echo radiobutton_tag('viaregente[nacent]', 'N', true,array('disabled' => false))        ." Nacional".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('viaregente[nacent]', 'I', false,array('disabled' => false))."   Internacional"; ?>
<?php } ?>
