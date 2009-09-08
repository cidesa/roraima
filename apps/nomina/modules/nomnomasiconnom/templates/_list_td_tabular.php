<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/01/09 11:11:08
?>
    <td><?php echo link_to($npasiconemp->getCodcon() ? $npasiconemp->getCodcon() : __('-'), 'nomnomasiconnom/edit?id='.$npasiconemp->getId().'&concepto='.$npasiconemp->getCodcon().'&nomina='.$npasiconemp->getCodnom()) ?></td>
    <td><?php echo $npasiconemp->getNomcon() ?></td>
    <td><?php echo $npasiconemp->getCodnom() ?></td>
    <td><?php echo $npasiconemp->getNomnom() ?></td>
