<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<div class="form-error" align="center">
<h3>
<?php
  if ($cireging->getStaing()=='N')
  {
      echo 'Anulado el '.date('d/m/Y',strtotime($cireging->getFecanu()));
  }
?>
</h3>
</div>

