<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:_list_td_tabular.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/11/21 11:49:30
?>
    <td><?php echo link_to($fordefpryaccmet->getCodpro() ? $fordefpryaccmet->getCodpro() : __('-'), 'fordefpryaccmet/edit?id='.$fordefpryaccmet->getId().'&codpro='.$fordefpryaccmet->getCodpro().'&accion='.$fordefpryaccmet->getCodaccesp()) ?></td>
    <td><?php echo $fordefpryaccmet->getNompro() ?></td>
      <td><?php echo $fordefpryaccmet->getCodaccesp() ?></td>
      <td><?php echo $fordefpryaccmet->getDesaccesp() ?></td>
  