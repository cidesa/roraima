<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/11/13 15:53:58
?>
    <td><?php echo link_to($fordefaccesp->getCodpro() ? $fordefaccesp->getCodpro() : __('-'), 'fordefaccesp/edit?id='.$fordefaccesp->getId().'&codpro='.$fordefaccesp->getCodpro()) ?></td>
    <td><?php echo $fordefaccesp->getNompro() ?></td>
      <td><?php echo $fordefaccesp->getProacc() ?></td>
