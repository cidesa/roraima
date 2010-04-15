<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/11/16 17:50:12
?>
<td><?php echo link_to($npcomocp->getCodtipcar() ? $npcomocp->getCodtipcar() : __('-'), 'nomcomocp/edit?id='.$npcomocp->getId().'&codtipcar='.$npcomocp->getCodtipcar().'&fecdes='.$npcomocp->getFecdes()) ?></td>    <td><?php echo $npcomocp->getGracar() ?></td>
