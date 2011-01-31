<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_helper('Javascript') ?>

<?php $js = "
     var msg='".$msg."';
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
	   f.action='/facturacion_dev.php/fafactur/list';
	   f.submit();
     }
"; ?>
<?php echo javascript_tag($js); ?>