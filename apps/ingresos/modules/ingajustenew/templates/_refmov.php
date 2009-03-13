<?php if($ciajuste->getId()==''){?>

<?php echo radiobutton_tag('ciajuste[refmov]', 'S', true,array('onClick' => 'mostrarDivRefMov()'))        ."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('ciajuste[refmov]', 'N', false,array('onClick' => 'ocultarDivRefMov()'))."   No";}else {?>

<?php } ?>

<?php if($ciajuste->getId()!=''){?>
<?php if($ciajuste->getRefere()!='NULO'){?>
<?php echo radiobutton_tag('ciajuste[refmov]', 'S', true,array('disabled' => true))        ."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('ciajuste[refmov]', 'N', false,array('disabled' => true))."   No";

      }else {?>
<?php echo radiobutton_tag('ciajuste[refmov]', 'S', false,array('disabled' => true))        ."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('ciajuste[refmov]', 'N', true,array('disabled' => true))."   No"; ?>
<?php } ?>
<?php } ?>

