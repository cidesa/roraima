<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/11/21 11:49:30
?>
    <td><?php echo link_to($fordefpryaccmet->getCodpro() ? $fordefpryaccmet->getCodpro() : __('-'), 'fordefpryaccmet/edit?id='.$fordefpryaccmet->getId().'&codpro='.$fordefpryaccmet->getCodpro().'&accion='.$fordefpryaccmet->getCodaccesp()) ?></td>
    <td><?php echo $fordefpryaccmet->getNompro() ?></td>
      <td><?php echo $fordefpryaccmet->getCodaccesp() ?></td>
      <td><?php echo $fordefpryaccmet->getDesaccesp() ?></td>
  