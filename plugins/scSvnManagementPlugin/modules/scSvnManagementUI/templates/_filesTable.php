<?php use_helper('Javascript'); ?>
<?php 
  $alternateColumn = 0;
?>

<?php if(isset($check)) 
    echo javascript_tag("
      function toggle_box(checkbox)
      {
        var fr = document.forms[0];  
        var len = fr.length;
      
        for(var i=0; i<len; i++)
        {
          if( (fr.elements[i].id).substr(0, checkbox.id.length) == checkbox.id ) {        
             fr.elements[i].checked = checkbox.checked;
          }
        }
      }"); ?>


<table width="100%" cellpadding="2" cellspacing="0">	
	<thead>
  <?php include_partial("filesTableShowTableHeader", 
                        array(
                            'check' => isset($check) ? $check : null,
                            'rootDir' => isset($rootDir) ? $rootDir : null, 
                             'tableColumns' => $tableElements['info'],
                              ));
                              ?>
  </thead>
  <?php if(isset($tableElements['messages']) && count($tableElements['messages']) > 0): ?>
    <tfoot>   
	  <?php foreach($tableElements['messages'] as $message): ?>
	    <tr class="msg">
	      <td colspan="<?php echo 1+count($tableElements['info']['status']); ?>">
	        <br /><?php echo $message;?>
	      </td>
	    </tr>
	  <?php endforeach; ?>
    </tfoot>
  <?php endif;?>
  <tbody>
	<?php foreach($tableElements['files'] as $fileInfo): $alternateColumn++; ?>
		 
		<?php if($fileInfo['element'] == 'dir'): ?>
		  <?php include_partial('filesTableShowDirectoryRow', array( 
		            'element' => $fileInfo, 
		            'tableColumns' => $tableElements['info'],
		            'alternateColumn' => $alternateColumn%2,
		            'check' => isset($check) ? $check : null,
		        )); ?>
		<?php else: ?>
		  <?php include_partial('filesTableShowFilesRow', array(		             
		            'element' => $fileInfo, 
		            'link'    => isset($link) ? $link : array(),
		            'tableColumns' => $tableElements['info'],
		            'alternateColumn' => $alternateColumn%2,
		            'check' => isset($check) ? $check : null,
		        )); ?>
		<?php endif; ?>  

	<?php endforeach; ?>
	</tbody>
</table>