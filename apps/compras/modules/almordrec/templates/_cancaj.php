<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _edit_actions.php 32813 2009-09-08 16:19:47Z lhernandez $
 */

?>
<?php if ($recmer=='S') { ?>
  <?php $value = object_input_tag($carcpart, array('getCancaj',true), array (
  'size' => 7,
  'control_name' => 'carcpart[cancaj]',
  'maxlenght' => 14,
)); echo $value ? $value : '&nbsp;' ?>

<?php }?>