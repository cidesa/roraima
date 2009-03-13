<?php if($cidefniv->getId()==''){?>

<?php echo radiobutton_tag('cidefniv[asiper]', 'S', true,array('onClick' => '$("cidefniv_numper").disabled=false'))        ."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('cidefniv[asiper]', 'N', false,array('onClick' => '$("cidefniv_numper").disabled=true'))."   No";}else {?>

<?php } ?>

<?php if($cidefniv->getId()!=''){?>
<?php if($cidefniv->getAsiper()=='S'){?>
<?php echo radiobutton_tag('cidefniv[asiper]', 'S', true,array('disabled' => true ))        ."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('cidefniv[asiper]', 'N', false,array('disabled' => true ))."   No";

      }else {?>
<?php echo radiobutton_tag('cidefniv[asiper]', 'S', false,array('disabled' => true ))        ."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('cidefniv[asiper]', 'N', true,array('disabled' => true ))."   No"; ?>

<?php } ?>
<?php } ?>

