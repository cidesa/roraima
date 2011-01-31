<tr class="head">
    
  <?php if(!empty($check)): ?>
    <th width="60">
      <?php echo $check; ?>
    </th>
  <?php endif; ?>
    
  <th align="left">
    Files:
      
    <?php if(!empty($tableColumns['rootDir'])): ?>
      <span class="svn_ft_root_dir">
         <?php  echo $tableColumns['rootDir']; ?>
      </span>
    <?php endif; ?>
      
  </th>
    
  <?php if(count($tableColumns['status']) > 0): ?>
	  <?php $width = (int)(320/count($tableColumns['status'])); ?>
	  <?php foreach($tableColumns['status'] as $column_headline): ?>
	    <th width="<?php echo $width ?>">
	      <?php echo $column_headline; ?>
	    </th>
	  <?php endforeach; ?>
  <?php endif; ?>
    
</tr>