<?php use_helper('Object', 'Javascript', 'PopUp', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools') ?>
<?php echo javascript_include_tag('ajax') ?>

<script type="text/javascript">
    var msg = '<? echo $msg; ?>';
    f = opener.document.sf_admin_edit_form;
    if ((msg!='') && (msg!='-1'))
    {
       alert(msg);
    }
   self.close();
   f.action=getUrlModulo()+'list';
   f.submit();

</script>
