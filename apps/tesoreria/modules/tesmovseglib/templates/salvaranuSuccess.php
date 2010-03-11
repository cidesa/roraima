<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_helper('Javascript') ?>

<?
if ($msg=="1") {
	if ($msjuno==""){
	$x=0;
	$formu='';
	while ($x<count($formulario))
	{
	  $formu=$formu.$formulario[$x].'*';
	  $x++;
	}
	?>
    <script type="text/javascript">
        j=0;
        i='<? print $i; ?>';
        i=parseInt(i);
        formu='<? print $formu; ?>';
        formulario=formu.split('*');
        while (j<=i)
        {
          comprobante(formulario[j]);
          j++;
        }
    </script>
    <?php }else {
  			if ($msjuno!="") { $msgerr=$msjuno;}
?>
      <script type="text/javascript">
            mens='<? print $msgerr; ?>';
            alert(mens);
        </script>
<?php } }else { ?>
<?php $js = "
     var msg='".$msg."';
     var msgpercer='".$msgpercer."';
     var id='".$id."';
     f=opener.document.sf_admin_edit_form;
     if (msgpercer!='')
     {
         	alert(msgpercer);
            self.close();
     }
     else
     {
		if (msg!='')
		{
		 	alert(msg);
		}
	    self.close();
	    f.action='/tesoreria_dev.php/tesmovseglib/list';
	    f.submit();
    }
"; ?>
<?php echo javascript_tag($js); ?>
<?php }?>
