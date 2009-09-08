<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/26 11:24:47
?>
<?php echo form_tag('nomactpre/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript') ?>
<?php echo object_input_hidden_tag($nphispre, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div align=center> 
  <?php echo button_to_function('Actualizar Saldos de prestamos', "alert('Prestamos Actualizados')") ?>  
</div>
</fieldset>

<?php include_partial('edit_actions', array('nphispre' => $nphispre)) ?>

</form>

