<div id="filter">
<input name="filter_text" id="filter_text" value="filter" onClick="this.value='';" size=10 />
<?php echo javascript_tag('
new Form.Element.Observer("filter_text", 1, function(input, value) {
   $$(".parameter").each(function (parameter) {
     parameter.style.display = (parameter.id.indexOf(value) == 0) ? "block" : "none";
   });
});
') ?>
</div>

  <?php if(isset($model_files)): ?>
  <ul>
    <?php foreach ($model_files as $model): ?>
    <?php $model = substr($model, 0, strlen($model)-8) ?>
    <li id=<?php echo strtolower($model)  ?>  class="data parameter"><?php echo link_to($model, 'sfControlPanel/tableManager?class='.$model) ?></li>
    <?php endforeach; ?>
  </ul>
  <?php else: ?>
    No model files found
  <?php endif; ?>
