<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_helper('Javascript') ?>

<?php $js = "  
    
     f=opener.document.sf_admin_edit_form;
	 self.close();
	 f.action=window.opener.document.location;
	 f.submit();
     
"; ?>
<?php echo javascript_tag($js); ?>

