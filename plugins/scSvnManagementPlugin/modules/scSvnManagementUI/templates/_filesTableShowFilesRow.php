    <tr class="row_<?php echo $alternateColumn; ?>">   
      <?php if(isset($check)): ?>
        <td valign="top" align="center">
          <?php echo checkbox_tag('selected_files[]', 
                                  $element['ID'], true, 
                                  array('id' => $element['ID'])
                                 );?>
        </td>
      <?php endif; ?> 
      <td valign="top" nowrap>
        <span class="svn_ft_indent">
           <?php for($i=0; $i<$element['depth'];$i++) echo '&nbsp;&middot;';?>
        </span>
        <span class="svn_ft_<?php echo $element['name'] == '.' ? 'open_dir': 'file'?>"><?php 
          if(!count($link))
            echo $element['name'];
          else if(count($link) == 3)
            echo link_to($element['name'], $link[0].'/'.$link[1].'?'.$link[2].'='.$element['name'], array('class' => 'svn_file_link'));
          else
            echo link_to($element['name'], $link[0].'/'.$link[1].'/'.$element['name'], array('class' => 'svn_file_link'));
        ?></span> 
      </td>
      <?php foreach($tableColumns['status'] as $option):?>     
        <?php if(array_key_exists($option, $element['options'])): ?>
        
          <?php if(!is_array($element['options'][$option]) && !empty($element['options'][$option])): ?>
		      <td>		      
		        <span><?php echo $element['options'][$option];?>&nbsp;</span>		        
		      </td>
		      <?php elseif(isset($element['options'][$option][0]) && !empty($element['options'][$option][0])):?> 
		      <td  valign="top" align="center">
            <div class="svn_icon svn_<?php echo $element['options'][$option][1];?>">
              <span><?php echo $element['options'][$option][0];?>&nbsp;</span>
            </div>
          </td>
          <?php else: ?>
          <td>&nbsp;</td>
		      <?php endif;?>
		      
	      <?php else: ?>
	      <td>&nbsp;</td>
	      <?php endif;?>
      <?php endforeach; ?>
    </tr>
    