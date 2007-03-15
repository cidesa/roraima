

<table
 style="width: 100%; text-align: left; margin-left: auto; margin-right: auto;"
 border="0" cellpadding="2" cellspacing="2">
  <tbody>
    <tr>
      <td></td>
    </tr>
    <tr>
      <td style="text-align: center; vertical-align: middle;">
      <table
 style="width: 250px; text-align: left; margin-left: auto; margin-right: auto;"
 border="0" cellpadding="2" cellspacing="2">
        <tbody>
          <tr>
            <td>
            	<p><?php echo image_tag('login_logo_01.jpg', 'size=300x200') ?></p>
            </td>
          </tr>
          <tr>
            <td>
				<p><?php echo form_tag('login/login') ?></p>
				<p><?php echo label_for('labelnombre', 'Nombre de Usuario') ?></p>
				
				<p><?php echo input_tag('textnombre','cidesa') ?></p>
				
				<p><?php echo label_for('labelpasswd', 'Contraseña') ?></p>
				
				<p><?php echo input_tag('textpasswd','cidesa') ?></p>
				
				<p><?php echo select_tag('selectemp', options_for_select($empresas)); ?></p>
				
				<p><?php echo submit_tag('login') ?></p>
				</form>
				<p><?php echo 'Autenticado = '.$sf_user->isAuthenticated() ?></p>
				<p><?php echo $sf_user->getAttribute('error') ?></p>            
            </td>
          </tr>
        </tbody>
      </table>
      </td>
    </tr>
    <tr>
      <td></td>
    </tr>
  </tbody>
</table>


        
        
