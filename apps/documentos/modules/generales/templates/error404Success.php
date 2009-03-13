<?php
/*
 * Created on 26/05/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>

<?php decorate_with(sfLoader::getTemplatePath('generales', 'errores.php')) ?>

<div class="sfTMessageContainer sfTAlert">
  <?php echo image_tag('/sf/sf_default/images/icons/cancel48.png', array('alt' => 'page not found', 'class' => 'sfTMessageIcon', 'size' => '48x48')) ?>
  <div class="sfTMessageWrap">
    <h1>Oops! Página no Encontrada</h1>
    <h5>El servidor Retorno como respuesta 404.</h5>
  </div>
</div>
<dl class="sfTMessageInfo">
  <dt>¿Escribiste bien la dirección?</dt>
  <dd>Chequea que escribistes bien la dirección URL. Verifica las letras mayusculas y minusculas en la URL</dd>

  <dt>¿Y ahora que hago?</dt>
  <dd>
    <ul class="sfTIconList">
      <li class="sfTLinkMessage"><a href="javascript:history.go(-1)">Devuelveme a la página anterior</a></li>
      <li class="sfTLinkMessage"><a href="javascript:self.close()">Cerrar esta ventana</a></li>
    </ul>
  </dd>
</dl>