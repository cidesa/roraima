<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_helper('Javascript') ?>

<?php $jsant = "
     var msg='".$mensaje."';
     f=opener.document.sf_admin_edit_form;
    if (msg!='')
    {
       alert(msg); self.close();
    }
   else
   {
	 self.close();
	 f.action=window.opener.document.location;
	 f.submit();
   }

"; ?>
<?php $js = "
     var msg='".$mensaje."';
     var msg2='".$mensaje2."';
     f=opener.document.sf_admin_edit_form;
      if (msg2!='')
     {
         	alert(msg2);
            self.close();
     }
     else
     {
	    if (msg!='')
	    {
	       alert(msg);
	    }
	   self.close();
	   f.action='/tesoreria_dev.php/tesmovtraban/list';
	   f.submit();
     }

"; ?>
<?php echo javascript_tag($js); ?>

