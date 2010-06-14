<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_helper('Javascript') ?>

<?php $js = "  
    var msgpercer='".$msgpercer."';
     f=opener.document.sf_admin_edit_form;
      if (msgpercer==''){
	 self.close();
	 f.action=window.opener.document.location;
	 f.submit();
      }else{
        alert(msgpercer);
        self.close();
       }
     
"; ?>
<?php echo javascript_tag($js); ?>

