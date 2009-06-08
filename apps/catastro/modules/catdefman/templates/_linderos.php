<div id="linderos">

<div id="divcattramonor_id">

  <?php echo label_for('catman[cattramonor_id]', __("Norte:"), 'class="required" Style="text-align:left; width:150px"') ?>

<?php $value = object_select_tag($catman, 'getCattramonorId', array (
  'related_class' => 'Cattramo',
  'control_name' => 'catman[cattramonor_id]',
  'include_custom' => 'Seleccione',
  'include_blank' => true,
)); echo $value ? $value : '&nbsp;' ?>

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

<?php $value = object_select_tag($catman, 'getCattramosurId', array (
  'related_class' => 'Cattramo',
  'control_name' => 'catman[cattramosur_id]',
  'include_custom' => 'Seleccione',
  'include_blank' => true,
)); echo $value ? $value : '&nbsp;' ?>

</div>

<br>

<div id="divtiplinoes_id">
  <?php echo label_for('catman[tiplinoes_id]', __($labels['catman{tiplinoes_id}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <?php $value = object_select_tag($catman, 'getTiplinoesId', array (
  'related_class' => 'Cattipvia',
  'control_name' => 'catman[tiplinoes_id]',
  'include_blank' => true,
)); echo $value ? $value : '&nbsp;' ?>
</div>

<br>

<div id="divcattramooes_id">

  <?php echo label_for('catman[cattramooes_id]', __("Oeste:"), 'class="required" Style="text-align:left; width:150px"') ?>

<?php $value = object_select_tag($catman, 'getCattramosurId', array (
  'related_class' => 'Cattramo',
  'control_name' => 'catman[cattramooes_id]',
  'include_custom' => 'Seleccione',
  'include_blank' => true,
)); echo $value ? $value : '&nbsp;' ?>

</div>

<br>

<div id="divtiplinoes_id">
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

<?php $value = object_select_tag($catman, 'getCattramoestId', array (
  'related_class' => 'Cattramo',
  'control_name' => 'catman[cattramoest_id]',
  'include_custom' => 'Seleccione',
  'include_blank' => true,
)); echo $value ? $value : '&nbsp;' ?>

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

<br>

</div>