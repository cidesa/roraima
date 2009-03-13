
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<table align="center" background="../images/prueba1.jpg" border="0" height="474" width="33%">
  <tbody>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" height="344" valign="bottom">
      <?php echo form_tag('login/login') ?>
      <table align="center" border="0" cellpadding="3" cellspacing="3" width="310">
        <tbody>
          <tr>
            <td class="nuevo style14" width="174">&nbsp;<?php echo label_for('labelnombre', 'Nombre de Usuario') ?></td>
            <td width="103"><?php echo input_tag('textnombre','CIDESA') ?><br>
            </td>
          </tr>
          <tr>
            <td class="form_label_01 Order tiny style16">&nbsp;<?php echo label_for('labelpasswd', 'Contraseña') ?></td>
            <td><span style="font-family: &quot;Sans&quot;;"><?php echo input_password_tag('textpasswd','CIDESA') ?></span><br>
            </td>
          </tr>
          <tr>
            <td class="form_label_01 Order tiny style15">&nbsp;<?php echo label_for('labelempresa', 'Empresa') ?></td>
            <td><?php echo select_tag('selectemp', options_for_select($empresas)); ?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;<?php echo submit_tag('login') ?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>
            </td>
          </tr>
        </tbody>
      </table>
      </form>
      </td>
      <td>

      <div id="sf_admin_content">
    <?php if ($sf_flash->has('sincredencial')): ?>
    <div class="form-errors">
    <h2><?php echo __('Error de Autenticacion/Credenciales') ?></h2>
    <dl>
    <?php echo $sf_flash->get('sincredencial') ?></dl>
    </div>
    </div>
    <?php endif; ?>
      </div>
      </td>
    </tr>
    <tr>
      <td colspan="2" height="64" align="true">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; * Se recomienda usar el navegador <a href="http://www.mozilla-europe.org/es/products/firefox/">Mozilla Firefox.</a></td>

    </tr>
    <tr>
      <td colspan="2" height="29">&nbsp;</td>
    </tr>
  </tbody>
</table>




