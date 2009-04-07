<?php decorate_with(sfLoader::getTemplatePath('generales', 'errores.php')) ?>

<div class="sfTMessageContainer sfTLock">
  <?php echo image_tag('/sf/sf_default/images/icons/lock48.png', array('alt' => 'login required', 'class' => 'sfTMessageIcon', 'size' => '48x48')) ?>
  <div class="sfTMessageWrap">
    <h1>Credenciales Requerida</h1>
    <h5>Este módulo tiene acceso restringido</h5>
  </div>
</div>
<dl class="sfTMessageInfo">
  <dt>Usted no tienes las credenciales apropiadas para acceder a este módulo</dt>
  <dd>Inclusive si esta apropiadamente autenticado, este módulo requiere de credenciales especiales que no posees.</dd>


  <dt>¿Cómo Acceder a éste módulo?</dt>
  <dd>Debes pedirle al administrador de la aplicación que te asigne las credenciales necesarias para usar este módulo.</dd>

  <dt>¿Y ahora que hago?</dt>
  <dd>
    <ul class="sfTIconList">
      <li class="sfTLinkMessage"><a href="javascript:history.go(-1)">Devuelveme a la página anterior</a></li>
      <li class="sfTLinkMessage"><a href="javascript:self.close()">Cerrar esta ventana</a></li>
    </ul>
  </dd>

</dl>