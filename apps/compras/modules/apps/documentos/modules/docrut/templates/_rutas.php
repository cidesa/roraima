<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<div id="divRutas" class="form-row">
  <fieldset>
    <legend>Rutas Configuradas</legend>
    <?php include_partial('docrut/pagerlist', array('pager' => $sf_flash->get('pager'))) ?>
  </fieldset>
</div>
