<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'PopUp', 'Grid', 'SubmitClick', 'Javascript') ?>
<?php use_helper('Object', 'Validation', 'Javascript', 'Grid', 'SubmitClick') ?>
<form name="form1" id="form1">
<?
if ($coderr!="")
{
?>
      <script type="text/javascript">
            mens='<? print $coderr; ?>';
            alert(mens);
        </script>
<?php
}
?>
</form>