<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<? if ($err){ ?>
<div class="form-errors">
	<h2 align="center"><?php  echo __('::: E r r o r :::'); ?></h2>
		<dl>
			<dt>
				<?php  echo __($err); ?>
			</dt>
		</dl>
</div>

<? } ?>
<?
 echo grid_tag($obj);
?>
