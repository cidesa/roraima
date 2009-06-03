<?php use_helper('Object', 'Validation', 'Javascript') ?>

<?php if ($lindero=='N'){ ?>
	<div id='divTipoNorte'>
		<?php
			echo
			select_tag('catman[cattramonorId]', options_for_select(
			$tipo,''
			,'include_custom=Seleccione Uno')
			);
		?>
	</div>

<?php }else if ($lindero=='S'){ ?>
	<div id='divTipoSur'>
		<?php
			echo
			select_tag('catman[cattramosurId]', options_for_select(
			$tipo,''
			,'include_custom=Seleccione Uno')
			);
		?>
	</div>


<?php }else if ($lindero=='E'){ ?>
	<div id='divTipoEste'>
		<?php
			echo
			select_tag('catman[cattramoestId]', options_for_select(
			$tipo,''
			,'include_custom=Seleccione Uno')
			);
		?>
	</div>


<?php }else if ($lindero=='O'){ ?>
	<div id='divTipoOeste'>
		<?php
			echo
			select_tag('catman[cattramooesId]', options_for_select(
			$tipo,''
			,'include_custom=Seleccione Uno')
			);
		?>
	</div>

<?php } ?>