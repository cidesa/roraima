<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/01/08 22:55:40
?>
    <td><?php echo link_to($npconfon->getCodnom() ? $npconfon->getCodnom() : __('-'), 'nomdefconfon/edit?id='.$npconfon->getId().'&nomina='.$npconfon->getCodnom()) ?></td>
    <td><?php echo $npconfon->getNomnom() ?></td>
