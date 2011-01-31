<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/01/24 10:58:49
?>
    <td><?php echo link_to(($caprocomart->getFecprocom() !== null && $caprocomart->getFecprocom() !== '') ? format_date($caprocomart->getFecprocom(), "dd/MM/yyyy") : '' ? ($caprocomart->getFecprocom() !== null && $caprocomart->getFecprocom() !== '') ? format_date($caprocomart->getFecprocom(), "dd/MM/yyyy") : '' : __('-'), 'almprocomart/edit?id='.$caprocomart->getFecprocom().'&fecprocom='.$caprocomart->getFecprocom().'&codcat='.$caprocomart->getCodcat()) ?></td>
    <td><?php echo $caprocomart->getCodcat() ?></td>
      <td><?php echo $caprocomart->getNomcat() ?></td>
