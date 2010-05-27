  <tr class="row_<?php echo $alternateColumn; ?>">
  <?php if(isset($check)): ?>
    <td valign="top" align="center">
      <?php echo checkbox_tag('selected_files[]', 
                    $element['ID'], true, 
                    array('id' => $element['ID'],
                          'onclick' => 'toggle_box(this)'
                    )
                 );?>
    </td>
  <?php endif; ?> 
    <td colspan="<?php echo 1+count($tableColumns['status']); ?>">
      <span class="svn_ft_indent">
        <?php for($i=0; $i<$element['depth'];$i++) echo '&nbsp;&middot;';  ?>
      </span>
      <span class="svn_ft_folder">
        <?php echo $element['name']; ?>
      </span>
    </td>
  </tr>  