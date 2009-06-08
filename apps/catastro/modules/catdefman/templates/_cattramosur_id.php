
<div id="linderos">
  <?php $value = object_select_tag($catman, 'getCattramosurId', array (
  'related_class' => 'Cattramo',
  'control_name' => 'catman[cattramosur_id]',
  'include_custom' => 'Seleccione',
  'include_blank' => true,
)); echo $value ? $value : '&nbsp;' ?>
</div>