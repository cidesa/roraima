<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>


<?php
 echo grid_tag($objVac);
 ?>
  <br>
  <?php $totalliq = $sf_user->getAttribute('totalliq','','vacliquidacion');?>
  <strong>Total Liquidación:</strong>&nbsp;&nbsp;
          <?php echo input_tag('nphojint_totalliq',$totalliq, array (
          'size' => 13,
          'readonly'  =>  true,
          'name' => 'nphojint_totalliq',
          'maxlength' => 20,

        ));  ?>
        &nbsp;&nbsp;&nbsp;
 <br>
 <br>
<?php
 echo grid_tag($objHis);
?>

