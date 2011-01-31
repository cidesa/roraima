
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php if($sf_request->getParameter('par')=='1') : ?>
  <?php include_partial('doctab/combos', array('dftabtip' => $dftabtip, 'labels' => $labels, 'params' => $params )) ?>
<?php elseif($sf_request->getParameter('par')=='2') : ?>
  <?php include_partial('doctab/infadic', array('dftabtip' => $dftabtip, 'labels' => $labels, 'params' => $params )) ?>
<?php endif; ?>