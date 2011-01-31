<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/01/07 16:05:23
?>
    <td><?php echo link_to($npconaho->getCodnom() ? $npconaho->getCodnom() : __('-'), 'nomdefconaho/edit?id='.$npconaho->getId().'&nomina='.$npconaho->getCodnom()) ?></td>
    <td><?php echo $npconaho->getNomnom() ?></td>
