<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php if ($div=='1') { ?>
<?php if ($otro=='N') { ?>

<?php echo grid_tag($obj);?>
<?php }else { ?>
<?php echo grid_tag($obj4);?>
<?php }?>
<?php if ($val_ant==$tipvalu) {?>
<?php if ($ret_ant=='S') {?>
<script language="JavaScript" type="text/javascript">
 var codcon='<?php echo $codcont?>';
 var tipval='<?php echo $tipvalu?>';
 var arregloret='<?php echo $arreglorete?>';
 var arreglomontos='<?php echo $arreglomonto?>';
 var val_ret='<?php echo $val_ret ?>';
 var retant= '<?php echo $ret_ant ?>';

 new Ajax.Updater('divRet', '/obras_dev.php/oycval/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=7&codcon='+codcon+'&tipval='+tipval+'&arregloret='+arregloret+'&arreglomontos='+arreglomontos+'&val_ret='+val_ret+'&retant='+retant});

</script>
<?php }?>
<?php }else {?>
<script language="JavaScript" type="text/javascript">
 var codcon='<?php echo $codcont?>';
 var tipval='<?php echo $tipvalu?>';
 var arregloret='<?php echo $arreglorete?>';
 var arreglomontos='<?php echo $arreglomonto?>';
 var val_ret='<?php echo $val_ret ?>';
 var retant= '<?php echo $ret_ant ?>';

 new Ajax.Updater('divRet', '/obras_dev.php/oycval/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=7&codcon='+codcon+'&tipval='+tipval+'&arregloret='+arregloret+'&arreglomontos='+arreglomontos+'&val_ret='+val_ret+'&retant='+retant});

</script>
<?php }?>
<?php }else {?>
<?php echo grid_tag($obj2);?>
<?php }?>


