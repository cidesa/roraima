<?php if($npcestatickets->getMonpor()=='M'){?>
<?php echo radiobutton_tag('npcestatickets[monpor]', 'M', true,array('disabled' => false))        ."  Monto Fijo".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('npcestatickets[monpor]', 'P', false,array('disabled' => false))."   Porcentaje de U.T.";

      }else {?>
<?php echo radiobutton_tag('npcestatickets[monpor]', 'M', false,array('disabled' => false))        ."  Monto Fijo".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('npcestatickets[monpor]', 'P', true,array('disabled' => false))."   Porcentaje de U.T."; ?>
<?php } ?>
