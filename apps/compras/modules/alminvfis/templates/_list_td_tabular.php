<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/10/30 10:25:59
?>
    <td><?php echo link_to($cainvfis->getCodalm() ? $cainvfis->getCodalm() : __('-'), 'alminvfis/edit?id='.$cainvfis->getFecinv().'&codalm='.$cainvfis->getCodalm()) ?></td>
    <td><?php echo ($cainvfis->getFecinv() !== null && $cainvfis->getFecinv() !== '') ? format_date($cainvfis->getFecinv(), "dd/MM/yyyy") : '' ?></td>
