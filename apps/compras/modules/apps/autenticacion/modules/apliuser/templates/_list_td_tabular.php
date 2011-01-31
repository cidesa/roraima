<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:_list_td_tabular.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2008/04/24 17:58:00
?>
    <td><?php echo link_to($apli_user->getLoguse() ? $apli_user->getLoguse() : __('-'), 'apliuser/edit?id='.$apli_user->getId().'&login='.$apli_user->getLoguse()) ?></td>
    <td><?php echo $apli_user->getNomuse() ?></td>

