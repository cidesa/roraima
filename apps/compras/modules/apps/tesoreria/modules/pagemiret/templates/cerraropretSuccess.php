<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_helper('Javascript') ?>
<?php $jp = "
     f=opener.document.sf_admin_edit_form;
	 self.close();
"; ?>
<? 	echo javascript_tag($jp); ?>