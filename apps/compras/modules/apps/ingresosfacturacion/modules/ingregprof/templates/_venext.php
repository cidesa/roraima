<?php if($inprofes->getId()==''){?>

<?php echo radiobutton_tag('inprofes[venext]', 'V', true,array())        ."Venezolano".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('inprofes[venext]', 'E', false,array())."   Extranjero";}else {?>

<?php } ?>

<?php if($inprofes->getId()!=''){?>
<?php if($inprofes->getVenext()=='V'){?>
<?php echo radiobutton_tag('inprofes[venext]', 'V', true,array('disabled' => true))        ."Venezolano".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('inprofes[venext]', 'E', false,array('disabled' => true))."   Extranjero";

      }else {?>
<?php echo radiobutton_tag('inprofes[venext]', 'V', false,array('disabled' => true))        ."Venezolano".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('inprofes[venext]', 'E', true,array('disabled' => true))."   Extranjero"; ?>
<?php } ?>
<?php } ?>

