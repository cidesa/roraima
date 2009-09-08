<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/01/10 09:57:23
?>
    <td><?php echo link_to($npcontipaporet->getCodtipapo() ? $npcontipaporet->getCodtipapo() : __('-'), 'nomdefconretencion/edit?id='.$npcontipaporet->getId().'&codigo='.$npcontipaporet->getCodtipapo()) ?></td>
    <td><?php echo $npcontipaporet->getDestipapo() ?></td>
