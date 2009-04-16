<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<div class="form-error" align="center">
<h3>
<?php
  if ($ciadidis->getStaadi()=='N')
  {
      echo 'Anulado el '.date('d/m/Y',strtotime($ciadidis->getFecanu()));
  }
?>
</h3>
</div>

