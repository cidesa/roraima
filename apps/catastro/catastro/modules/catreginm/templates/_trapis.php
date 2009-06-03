<?php if($catreginm->getTrapis()=='T'){?>
<?php echo radiobutton_tag('catreginm[trapis]', 'T', false,array('disabled' => false))        ." Tratamiento".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('catreginm[trapis]', 'R', true,array('disabled' => false))."   Recirculacion";

      }else {?>
<?php echo radiobutton_tag('catreginm[trapis]', 'T', true,array('disabled' => false))        ." Tratamiento".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('catreginm[trapis]', 'R', false,array('disabled' => false))."   Recirculacion"; ?>
<?php } ?>
