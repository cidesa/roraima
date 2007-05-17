<?php

?>
<table cellspacing="0" class="sf_admin_list">
<thead>
<tr>
<?php include_partial('pagerlist_th_tabular') ?>
</tr>
</thead>
<tbody>
<?php $i = 1; foreach ($pager->getResults() as $dfrutadoc): $odd = fmod(++$i, 2) ?>
<tr class="sf_admin_row_<?php echo $odd ?>">
<?php include_partial('pagerlist_td_tabular', array('dfrutadoc' => $dfrutadoc)) ?>
<?php include_partial('pagerlist_td_actions', array('dfrutadoc' => $dfrutadoc)) ?>
</tr>
<?php endforeach; ?>
</tbody>
<tfoot>
<tr><th colspan="5">
<div class="float-right">
<?php if ($pager->haveToPaginate()): ?>
  <?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/first.png', array('align' => 'absmiddle', 'alt' => __('First'), 'title' => __('First'))), 'docrut/edit?page=1') ?>
  <?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/previous.png', array('align' => 'absmiddle', 'alt' => __('Previous'), 'title' => __('Previous'))), 'docrut/edit?page='.$pager->getPreviousPage()) ?>

  <?php foreach ($pager->getLinks() as $page): ?>
    <?php echo link_to_unless($page == $pager->getPage(), $page, 'docrut/edit?page='.$page) ?>
  <?php endforeach; ?>

  <?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/next.png', array('align' => 'absmiddle', 'alt' => __('Next'), 'title' => __('Next'))), 'docrut/edit?page='.$pager->getNextPage()) ?>
  <?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/last.png', array('align' => 'absmiddle', 'alt' => __('Last'), 'title' => __('Last'))), 'docrut/edit?page='.$pager->getLastPage()) ?>
<?php endif; ?>
</div>
<?php echo format_number_choice('[0] no result|[1] 1 result|(1,+Inf] %1% results', array('%1%' => $pager->getNbResults()), $pager->getNbResults()) ?>
</th></tr>
</tfoot>
</table>