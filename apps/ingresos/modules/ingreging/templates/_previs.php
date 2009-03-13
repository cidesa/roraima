<?php if($cireging->getId()==''){?>

<?php echo radiobutton_tag('cireging[previs]', 'S', true,array())        ."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('cireging[previs]', 'N', false,array())."   No";}else {?>

<?php } ?>

<?php if($cireging->getId()!=''){?>
<?php if($cireging->getPrevis()=='S'){?>
<?php echo radiobutton_tag('cireging[previs]', 'S', true,array('disabled' => true))        ."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('cireging[previs]', 'N', false,array('disabled' => true))."   No";

      }else {?>
<?php echo radiobutton_tag('cireging[previs]', 'S', false,array('disabled' => true))        ."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('cireging[previs]', 'N', true,array('disabled' => true))."   No"; ?>
<?php } ?>
<?php } ?>