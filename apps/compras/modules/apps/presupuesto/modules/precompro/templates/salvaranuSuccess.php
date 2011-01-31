<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_helper('Javascript') ?>

<?php $js = "
	var msj='".$msj."';
	f=opener.document.sf_admin_edit_form;
	if (msj!='') {
		alert(msj);
		self.close();
	} else {
		alert('Compromiso Anulado Exitosamente');
		self.close();
		f.action=getUrlModulo()+'list';
		f.submit();
	}
"; ?>
<?php echo javascript_tag($js); ?>