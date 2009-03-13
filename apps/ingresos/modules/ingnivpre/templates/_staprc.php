<?php if($cidefniv->getId()==''){?>

<?php echo radiobutton_tag('cidefniv[staprc]', 'S', true,array())        ."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('cidefniv[staprc]', 'N', false,array())."   No";}else {?>

<?php } ?>

<?php if($cidefniv->getId()!=''){?>
<?php if($cidefniv->getStaprc()=='S'){?>
<?php echo radiobutton_tag('cidefniv[staprc]', 'S', true,array('disabled' => true))        ."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('cidefniv[staprc]', 'N', false,array('disabled' => true))."   No";

      }else {?>
<?php echo radiobutton_tag('cidefniv[staprc]', 'S', false,array('disabled' => true))        ."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('cidefniv[asiper]', 'N', true,array('disabled' => true))."   No"; ?>
<?php } ?>
<?php } ?>