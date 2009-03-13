<?php if($infactura->getId()==''){?>

<?php echo radiobutton_tag('infactura[tipconc]', 'I', false,array('onClick' => 'mostrarDivConcepto(this.id)'))        ."Ingreso por Profesional".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('infactura[tipconc]', 'M', false,array('onClick' => 'mostrarDivConcepto(this.id)'))."   Multa";}else {?>

<?php } ?>

<?php if($infactura->getId()!=''){?>
<?php if($infactura->getTipconc()=='I'){?>
<?php echo radiobutton_tag('infactura[tipconc]', 'I', true,array('disabled' => true))        ."Ingreso por Profesional".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('infactura[tipconc]', 'M', false,array('disabled' => true))."   Multa";

      }else {?>
<?php echo radiobutton_tag('infactura[tipconc]', 'I', false,array('disabled' => true))        ."Ingreso por Profesional".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('infactura[tipconc]', 'M', true,array('disabled' => true))."   Multa"; ?>
<?php } ?>
<?php } ?>

