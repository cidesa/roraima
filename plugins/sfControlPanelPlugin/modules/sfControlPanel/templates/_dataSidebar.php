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
    <?php $name = substr($model, 0, strlen($model)-8) ?>
    <?php $model = substr($model, 0, strlen($model)-8) ?>
    <?php $model = split('/', $model) ?>
    <?php if(count($model)>1) $model = $model[1]; else $model = $model[0]; ?>
    <li id=<?php echo strtolower($name)  ?>  class="data parameter"><?php echo link_to($name, 'sfControlPanel/tableManager?class='.$model) ?></li>
    <?php endforeach; ?>
  </ul>
  <?php else: ?>
    No model files found
  <?php endif; ?>
