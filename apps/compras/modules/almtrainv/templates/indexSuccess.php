<?php use_helper('I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>
<div id="sf_admin_container">

<h1><?php echo __('Traspaso de Inventario Físico a Lógico', 
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
 style="width: 300px; text-align: left; margin-left: auto; margin-right: auto;"
 border="0" cellpadding="2" cellspacing="2">
        <tbody>
          <tr>
            <td>
				<p><?php echo form_tag('almtrainv/traspasar') ?></p>
				<p><?php echo label_for('labelnombre', 'Fecha del Inventario') ?></p>
				
				<p><?php echo input_date_tag('fechainv',date("Y/n/j"), 'rich=true') ?></p>				
				<p><?php echo submit_tag('Traspasar Inventario') ?></p>
				</form>
				
				<p><?php if($traspasado) $r='Inventario Traspasado'; else $r=''  ?></p>
				<p><?php echo $r  ?></p>
				
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