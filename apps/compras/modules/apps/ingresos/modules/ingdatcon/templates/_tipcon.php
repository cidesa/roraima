<?php if($ciconrep->getId()==''){?>

<?php echo radiobutton_tag('ciconrep[tipcon]', 'N', true,array())        ."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('ciconrep[tipcon]', 'J', false,array())."   Jurídica";}else {?>

<?php } ?>

<?php if($ciconrep->getId()!=''){?>
<?php if($ciconrep->getTipcon()=='N'){?>
<?php echo radiobutton_tag('ciconrep[tipcon]', 'N', true,array('disabled' => true))        ."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('ciconrep[tipcon]', 'J', false,array('disabled' => true))."   Jurídica";

      }else {?>
<?php echo radiobutton_tag('ciconrep[tipcon]', 'N', false,array('disabled' => true))        ."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('ciconrep[tipcon]', 'J', true,array('disabled' => true))."   Jurídica"; ?>
<?php } ?>
<?php } ?>