<p>
<?php echo image_tag('login_logo_01.jpg', 'size=300x200') ?>
<p></p>
<?php echo form_tag('login/login') ?>
  <?php echo label_for('labelnombre', 'Nombre de Usuario') ?>
  <p></p>
  <?php echo input_tag('textnombre','cidesa') ?>
  <p></p>
  <?php echo label_for('labelpasswd', 'Contraseña') ?>
  <p></p>
  <?php echo input_tag('textpasswd','cidesa') ?>
  <p></p>
  <?php echo submit_tag('login') ?>
</p>
  <p>  <?php echo 'Autenticado = '.$sf_user->isAuthenticated() ?> </p>
  <p>  <?php echo $sf_user->getAttribute('error') ?> </p>
  