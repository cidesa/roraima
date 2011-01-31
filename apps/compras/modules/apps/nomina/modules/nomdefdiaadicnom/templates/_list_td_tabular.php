<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/01/07 15:56:23
?>
    <td><?php echo link_to($npdiaadicnom->getCodnom() ? $npdiaadicnom->getCodnom() : __('-'), 'nomdefdiaadicnom/edit?id='.$npdiaadicnom->getId().'&nomina='.$npdiaadicnom->getCodnom()) ?></td>
    <td><?php echo $npdiaadicnom->getNomnom() ?></td>
