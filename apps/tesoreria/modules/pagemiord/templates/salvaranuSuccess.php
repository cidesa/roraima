<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_helper('Javascript') ?>

<?php $js2 = "
     var msg2='".$msg2."';
    f=opener.document.sf_admin_edit_form;
    if (msg2!='')
    {
       alert(msg2);
       self.close();
    }

"; ?>
<?php $js = "
     var msg='".$msg."';
     f=opener.document.sf_admin_edit_form;
    if (msg!='')
    {
       alert(msg);
    }
   self.close();
   f.action='/tesoreria_dev.php/pagemiord/list';
   f.submit();

"; ?>
<?php if ($msg2!="") {?>
<?php echo javascript_tag($js2); ?>
<?php }else {?>
<?php echo javascript_tag($js); ?>
<?php } ?>