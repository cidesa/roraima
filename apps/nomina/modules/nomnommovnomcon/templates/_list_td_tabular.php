<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2009/03/25 09:07:38
?>
    <td><?php echo link_to($npasiconemp->getCodcon() ? $npasiconemp->getCodcon() : __('-'), 'nomnommovnomcon/edit?id='.$npasiconemp->getId().'&codcon='.$npasiconemp->getCodcon().'&codnom='.$npasiconemp->getCodnom()) ?></td>
    <td><?php echo $npasiconemp->getNomcon() ?></td>
      <td><?php echo $npasiconemp->getCodnom() ?></td>
      <td><?php echo $npasiconemp->getNomnom() ?></td>
