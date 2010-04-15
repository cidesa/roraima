<?php use_helper('I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>
<div id="sf_admin_container">

<h1><?php echo __('Importar Valores de Conceptos', 
array()) ?></h1>



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
				<p><?php echo form_tag('importarvaloresconceptos/procesar') ?></p>
				<p><?php echo input_file_tag('archivo') ?></p>
				<p><?php echo submit_tag('Revisar los Datos') ?></p>
				</form>
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

</div>