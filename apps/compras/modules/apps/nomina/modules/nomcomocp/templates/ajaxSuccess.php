<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>


<? if ($ajax=='1') { ?>
<?php echo grid_tag($obj); ?>
<? }else {?>
<?php echo grid_tag($obj); ?>
<script language="JavaScript" type="text/javascript">
actualizar_grid()    
</script>
<? }?>


