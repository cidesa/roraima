<?php if($indefdes->getId()==''){?>

<?php echo radiobutton_tag('indefdes[tipdes]', 'P', true,array())        ."Puntual".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('indefdes[tipdes]', 'R', false,array())."   Porcentual";}else {?>

<?php } ?>

<?php if($indefdes->getId()!=''){?>
<?php if($indefdes->getTipdes()=='P'){?>
<?php echo radiobutton_tag('indefdes[tipdes]', 'P', true,array('disabled' => true))        ."Puntual".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('indefdes[tipdes]', 'R', false,array('disabled' => true))."   Porcentual";}else {?>
<?php echo radiobutton_tag('indefdes[tipdes]', 'P', false,array('disabled' => true))        ."Puntual".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('indefdes[tipdes]', 'R', true,array('disabled' => true))."   Porcentual"; ?>
<?php } ?>
<?php } ?>


