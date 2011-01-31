<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<div id="divcattramonor_id">

  <?php echo label_for('catman[cattramonor_id]', __("Norte:"), 'class="required" Style="text-align:left; width:150px"') ?>

<? 	echo
	select_tag('catman[cattramonor_id]', options_for_select(
	$catman->ListCattramo($codigo),
	$catman->getTiplinnor(),'include_custom=Seleccione')
	);
?>

</div>

<br>

<div id="divtiplinnor_id">
  <?php echo label_for('catman[tiplinnor_id]', __($labels['catman{tiplinnor_id}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <?php $value = object_select_tag($catman, 'getTiplinnorId', array (
  'related_class' => 'Cattipvia',
  'control_name' => 'catman[tiplinnor_id]',
  'include_blank' => true,
)); echo $value ? $value : '&nbsp;' ?>
</div>

<br>

<div id="divcattramosur_id">

  <?php echo label_for('catman[cattramosur_id]', __("Sur:"), 'class="required" Style="text-align:left; width:150px"') ?>

<? 	echo
	select_tag('catman[cattramosur_id]', options_for_select(
	$catman->ListCattramo($codigo),
	$catman->getTiplinsur(),'include_custom=Seleccione')
	);
?>

</div>

<br>

<div id="divtiplinsur_id">
  <?php echo label_for('catman[tiplinsur_id]', __($labels['catman{tiplinsur_id}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <?php $value = object_select_tag($catman, 'getTiplinsurId', array (
  'related_class' => 'Cattipvia',
  'control_name' => 'catman[tiplinsur_id]',
  'include_blank' => true,
)); echo $value ? $value : '&nbsp;' ?>
</div>

<br>

<div id="divcattramooes_id">

  <?php echo label_for('catman[cattramooes_id]', __("Oeste:"), 'class="required" Style="text-align:left; width:150px"') ?>

<? 	echo
	select_tag('catman[cattramooes_id]', options_for_select(
	$catman->ListCattramo($codigo),
	$catman->getTiplinoes(),'include_custom=Seleccione')
	);
?>

</div>

<br>

<div id="divtiplinooes_id">
  <?php echo label_for('catman[tiplinoes_id]', __($labels['catman{tiplinoes_id}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <?php $value = object_select_tag($catman, 'getTiplinoesId', array (
  'related_class' => 'Cattipvia',
  'control_name' => 'catman[tiplinoes_id]',
  'include_blank' => true,
)); echo $value ? $value : '&nbsp;' ?>
</div>

<br>

<div id="divcattramoest_id">

  <?php echo label_for('catman[cattramoest_id]', __("Este:"), 'class="required" Style="text-align:left; width:150px"') ?>

<? 	echo
	select_tag('catman[cattramoest_id]', options_for_select(
	$catman->ListCattramo($codigo),
	$catman->getTiplinest(),'include_custom=Seleccione')
	);
?>

</div>

<br>

<div id="divtiplinest_id">
  <?php echo label_for('catman[tiplinest_id]', __($labels['catman{tiplinest_id}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <?php $value = object_select_tag($catman, 'getTiplinestId', array (
  'related_class' => 'Cattipvia',
  'control_name' => 'catman[tiplinest_id]',
  'include_blank' => true,
)); echo $value ? $value : '&nbsp;' ?>
</div>



