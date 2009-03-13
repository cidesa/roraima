<?php
/*
 * Created on 17/12/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php echo javascript_tag(" var formato_presupuesto = '".H::formatoPresupuesto()."';" .
    "$('cpdeftit_codpre').maxlength=formato_presupuesto.length; ") ?>
