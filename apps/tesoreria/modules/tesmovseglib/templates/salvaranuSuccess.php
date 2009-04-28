<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_helper('Javascript') ?>

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

