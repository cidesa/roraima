<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?
  echo grid_tag_v2($viacalviatra->getGrid());
?>
<script language="Javascript">

    Calculartotal();

</script>
