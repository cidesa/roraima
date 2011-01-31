<?php

?>
<?php use_helper('PopUp', 'Grid', 'wait', 'Linktoapp') ?>
<fieldset>

<div class="form-row" id="divGrid">
<?
$obj  = $sf_user->getAttribute('obj');
$regelim= $sf_user->getAttribute('regelim');
echo grid_tag($obj,$regelim);
?>
</div>

</fieldset>