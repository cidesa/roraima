
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

  <fieldset>
    <legend>Rutas Configuradas</legend>
    <?php include_partial('docrut/pagerlist', array('pager' => $pager)) ?>
  </fieldset>