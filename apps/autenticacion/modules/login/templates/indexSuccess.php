
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="Container">
  
  <div id="Modal">
    <div class="inner">
      
      <a href="http://roraima.cidesa.com.ve/"><img alt="Roraima Logo" id="logo" src="/images/logo.gif" width="84" height="70"></a>
      
      <?php echo form_tag('login/login') ?>
        <dl>
          <dt><?php echo label_for('labelnombre', 'Usuario:') ?></dt>
          <dd><?php echo input_tag('textnombre','CIDESA') ?></dd>
          <dt><?php echo label_for('labelpasswd', 'Contraseña:') ?></dt>
          <dd><?php echo input_password_tag('textpasswd','CIDESA') ?></dd>
      
          <dt><?php echo label_for('labelempresa', 'Empresa') ?></dt>
          <dd><?php echo select_tag('selectemp', options_for_select($empresas)); ?></dd>
          
          <dd><br></dd>
          <dd><?php echo submit_tag('login') ?></dd>
        </dl>
      </form>

    </div>
  </div>
</div>


