<?php include_partial('menu', array('actions' => $actions, 'logFiles' => $logFiles)); ?>

<div id="svn_content">

<h2>Update - Done</h2>

<?php if(isset($files['messages']) && count($files['messages'] > 0)): ?>
<div class="svn_info_message">
  <?php foreach($files['messages'] as $message): ?>
    <?php echo $message ?>
  <?php endforeach; ?>
</div>
<?php endif; ?>


<?php if(count($files['files']) > 0): ?>
  <?php include_partial('filesTable', array('tableElements' => $files)); ?>
<?php endif; ?>
</div>
