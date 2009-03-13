<?php decorate_with(sfLoader::getTemplatePath('generales', 'errores.php')) ?>

<div class="sfTMessageContainer sfTLock">
  <?php echo image_tag('/sf/sf_default/images/icons/lock48.png', array('alt' => 'login required', 'class' => 'sfTMessageIcon', 'size' => '48x48')) ?>
  <div class="sfTMessageWrap">
    <h1>Autenticación Requerida</h1>
    <h5>Este módulo no es Público</h5>
  </div>
</div>
<dl class="sfTMessageInfo">
  <dt>¿Cómo Acceder a ésta aplicación?</dt>
  <dd>Debes autenticarte colocando tu usuario y contraseña en la página de inicio.</dd>

  <dt>¿Y ahora que hago?</dt>
  <dd>
    <ul class="sfTIconList">
      <li class="sfTLinkMessage"><?php echo link_to('Proceder a autenticarme', 'generales/login') ?></li>
      <li class="sfTLinkMessage"><a href="javascript:history.go(-1)">Devuelveme a la página anterior</a></li>
      <li class="sfTLinkMessage"><a href="javascript:self.close()" style="color:#8B0000;" >Cerrar esta ventana</a></li>
    </ul>
  </dd>
</dl>