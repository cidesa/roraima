<?php if($ciadidis->getId()==''){?>

<?php echo radiobutton_tag('ciadidis[adidis]', 'A', true,array())        ."Adición".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('ciadidis[adidis]', 'D', false,array())."   Disminución";}else {?>

<?php } ?>

<?php if($ciadidis->getId()!=''){?>
<?php if($ciadidis->getAdidis()=='A'){?>
<?php echo radiobutton_tag('ciadidis[adidis]', 'A', true,array('disabled' => true))        ."Adición".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('ciadidis[adidis]', 'D', false,array('disabled' => true))."   Disminución";

      }else {?>
<?php echo radiobutton_tag('ciadidis[adidis]', 'A', false,array('disabled' => true))        ."Adición".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('ciadidis[adidis]', 'D', true,array('disabled' => true))."   Disminución"; ?>
<?php } ?>
<?php } ?>