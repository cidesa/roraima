<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/01/09 00:14:14
?>
    <td><?php echo link_to($npcontipaporet->getCodtipapo() ? $npcontipaporet->getCodtipapo() : __('-'), 'nomdefconaportes/edit?id='.$npcontipaporet->getId().'&codigo='.$npcontipaporet->getCodtipapo()) ?></td>
    <td><?php echo $npcontipaporet->getDestipapo() ?></td>
