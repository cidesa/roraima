<?php if($infactura->getId()==''){?>

<?php echo radiobutton_tag('infactura[tipper]', 'P', false,array('onClick' => 'mostrarDivPersona(this.id),ocultarDivM()'))        ."Profesional".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('infactura[tipper]', 'E', false,array('onClick' => 'mostrarDivPersona(this.id),ocultarDivI()'))."   Empresa";}else {?>

<?php } ?>

<?php if($infactura->getId()!=''){?>
<?php if($infactura->getTipper()=='P'){?>
<?php echo radiobutton_tag('infactura[tipper]', 'P', true,array('disabled' => true,  'checked' => 'ocultarDivE(this.tipper)'))        ."Profesional".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('infactura[tipper]', 'E', false,array('disabled' => true))."   Empresa";

      }else {?>
<?php echo radiobutton_tag('infactura[tipper]', 'P', false,array('disabled' => true))        ."Profesional".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('infactura[tipper]', 'E', true,array('disabled' => true, 'checked' => 'ocultarDivE(this.tipper)'))."   Empresa"; ?>
<?php } ?>
<?php } ?>

