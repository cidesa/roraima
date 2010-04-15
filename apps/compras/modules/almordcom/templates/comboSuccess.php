<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/04/09 17:27:37
?>
<?php use_helper('Object', 'Validation', 'Javascript', 'PopUp', 'Helper') ?>

<?php echo '<strong>Tipo:</strong>   '. select_tag('caordcom[tipord]', options_for_select($listatipocompra,$tipo_ord));

?>