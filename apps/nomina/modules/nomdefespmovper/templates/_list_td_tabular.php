<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/01/28 12:04:07
?>
    <td><?php echo link_to($npdefmov->getCodnom() ? $npdefmov->getCodnom() : __('-'), 'nomdefespmovper/edit?id='.$npdefmov->getId().'&nomina='.$npdefmov->getCodnom()) ?></td>
    <td><?php echo $npdefmov->getNomnom() ?></td>
