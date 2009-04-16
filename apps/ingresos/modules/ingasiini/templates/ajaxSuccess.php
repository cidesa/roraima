<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Javascript', 'Catalogo', 'Grid') ?>

<?php $value = get_partial('grid', array('type' => 'edit', 'ciasiini' => $ciasiini)); echo $value ? $value : '&nbsp;' ?>
