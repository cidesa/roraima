<?php use_helper('Object', 'Validation', 'Javascript', 'Grid', 'SubmitClick') ?>
<?
if ($msgerr!="")
{
    ?>
        <script type="text/javascript">
	       m='<? print $msgerr; ?>';
	       alert(m);
        </script>
<?php
}//if ($msgerr!="")
 if ($btn)
 {
?>
   <input type="button" name="Submit" value="Anular" class="sf_admin_action_delete" onclick="javascript:Anular_orden();" />
<?
}
?>