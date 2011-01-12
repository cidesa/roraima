<tr class="row_<?php echo $alternateRow; if($workingCopy==$RevisionInfo['Revision']) echo ' actual_revision' ?>">
  <td valign="top" align="center">
    <span class="svn_revison_number">
      <?php echo $RevisionInfo['Revision']; ?>
    </span>
  </td>
  <td class="info">
    <span>Author:</span> <?php echo $RevisionInfo['Author']; ?><br />
    <span>Date:</span> <?php echo date("Y-m-d", $RevisionInfo['Date']); ?><br />
    <span>Age:</span> <?php echo distance_of_time_in_words($RevisionInfo['Date']); ?>
  </td>
  <td valign="top" width="45%">
    <span class="log_message"><?php echo htmlentities($RevisionInfo['Message']); ?></span>
  </td>
  <td valign="top" align="center">
    <?php if( $RevisionInfo['Revision'] < $workingCopy): ?>
    <span class="svn_down_to">
      <?php echo link_to('Downgrade', 'scSvnManagementUI/update?to='.$RevisionInfo['Revision']); ?>
    </span>
    <?php elseif($RevisionInfo['Revision'] == $workingCopy):?>
    <span class="svn_current">
      <a href='#'>
        Current revision
      </a>
    </span>
    <?php else: ?>
    <span class="svn_up_to">
      <?php echo link_to('Upgrade', 'scSvnManagementUI/update?to='.$RevisionInfo['Revision']); ?>
    </span>
    <?php endif; ?>
  </td>
</tr>