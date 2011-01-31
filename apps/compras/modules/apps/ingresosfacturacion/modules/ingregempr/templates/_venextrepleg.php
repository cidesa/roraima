<?php if($inempresa->getId()==''){?>

<?php echo radiobutton_tag('inempresa[venextrepleg]', 'V', true,array())        ."Venezolano".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('inempresa[venextrepleg]', 'E', false,array())."   Extranjero";}else {?>

<?php } ?>

<?php if($inempresa->getId()!=''){?>
<?php if($inempresa->getVenextrepleg()=='V'){?>
<?php echo radiobutton_tag('inempresa[venextrepleg]', 'V', true,array())        ."Venezolano".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('inempresa[venextrepleg]', 'E', false,array())."   Extranjero";

      }else {?>
<?php echo radiobutton_tag('inempresa[venextrepleg]', 'V', false,array())        ."Venezolano".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('inempresa[venextrepleg]', 'E', true,array())."   Extranjero"; ?>
<?php } ?>
<?php } ?>

