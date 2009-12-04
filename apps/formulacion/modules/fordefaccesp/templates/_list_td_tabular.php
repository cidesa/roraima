<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:_list_td_tabular.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/11/13 15:53:58
?>
    <td><?php echo link_to($fordefaccesp->getCodpro() ? $fordefaccesp->getCodpro() : __('-'), 'fordefaccesp/edit?id='.$fordefaccesp->getId().'&codpro='.$fordefaccesp->getCodpro()) ?></td>
    <td><?php echo $fordefaccesp->getNompro() ?></td>
      <td><?php echo $fordefaccesp->getProacc() ?></td>
