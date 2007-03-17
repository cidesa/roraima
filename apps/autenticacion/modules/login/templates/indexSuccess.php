

<table align="center" background="/images/prueba1.jpg" border="0" height="474" width="46%">
  <tbody>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" height="344" valign="bottom">
      <table align="center" border="0" cellpadding="3" cellspacing="3" width="310">
        <tbody>
          <?php echo form_tag('login/login') ?>
          <tr> 
            <td class="nuevo style14" width="174">&nbsp;<?php echo label_for('labelnombre', 'Nombre de Usuario') ?></td>
            <td width="103"><?php echo input_tag('textnombre','cidesa') ?><br>
            </td>
          </tr>
          <tr>
            <td class="form_label_01 Order tiny style16">&nbsp;<?php echo label_for('labelpasswd', 'Contraseña') ?></td>
            <td><span style="font-family: &quot;Sans&quot;;"><?php echo input_tag('textpasswd','cidesa') ?></span><br>
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
            <td></td>
          </tr>
          </form>
        </tbody>
      </table>
      </td>
    </tr>
    <tr>
      <td colspan="2" height="64">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" height="29">&nbsp;</td>
    </tr>
  </tbody>
</table>


        
        
