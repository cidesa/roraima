<?php if($viaregente->getTipent()=='N'){?>
<?php echo radiobutton_tag('viaregente[tipent]', 'N', true)        ." Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('viaregente[tipent]', 'J', false)."   Juridica";

      }else {?>
<?php echo radiobutton_tag('viaregente[tipent]', 'N', false)        ." Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('viaregente[tipent]', 'J', true)."   Juridica"; ?>
<?php } ?>
