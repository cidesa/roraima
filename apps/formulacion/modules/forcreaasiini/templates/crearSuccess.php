<?php
/*
 * Created on 02/01/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
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