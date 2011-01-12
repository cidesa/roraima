<?php decorate_with(sfLoader::getTemplatePath('generales', 'errores.php')) ?>

<div class="sfTMessageContainer sfTLock">
  <?php echo image_tag('/sf/sf_default/images/icons/lock48.png', array('alt' => 'login required', 'class' => 'sfTMessageIcon', 'size' => '48x48')) ?>
  <div class="sfTMessageWrap">
    <h1>Este módulo esta Inhabilitado</h1>
    <h5>Este módulo ha sido deshabilitado por el administrador con motivos de mantenimiento</h5>
    <h5>Comuniquese con el administrador de la aplicación para conocer el tiempo del plan de mantenimiento</h5>
  </div>
</div>
<dl class="sfTMessageInfo">
  <dt>¿Y ahora que hago?</dt>
  <dd>
    <ul class="sfTIconList">
      <li class="sfTLinkMessage"><a href="javascript:history.go(-1)">Devuelveme a la página anterior</a></li>
      <li class="sfTLinkMessage"><a href="javascript:self.close()">Cerrar esta ventana</a></li>
    </ul>
  </dd>

</dl>