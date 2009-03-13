<?php if($ciconrep->getId()==''){?>

<?php echo radiobutton_tag('ciconrep[naccon]', 'V', true,array())        ."Venezolano".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('ciconrep[naccon]', 'E', false,array())."   Extranjero";}else {?>

<?php } ?>

<?php if($ciconrep->getId()!=''){?>
<?php if($ciconrep->getNaccon()=='V'){?>
<?php echo radiobutton_tag('ciconrep[naccon]', 'V', true,array('disabled' => true))        ."Venezolano".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('ciconrep[naccon]', 'E', false,array('disabled' => true))."   Extranjero";

      }else {?>
<?php echo radiobutton_tag('ciconrep[naccon]', 'V', false,array('disabled' => true))        ."Venezolano".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('ciconrep[naccon]', 'E', true,array('disabled' => true))."   Extranjero"; ?>
<?php } ?>
<?php } ?>