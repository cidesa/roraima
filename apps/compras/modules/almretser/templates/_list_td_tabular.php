<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/11/26 14:26:03
?>
    <td><?php echo link_to($caretser->getCodser() ? $caretser->getCodser() : __('-'), 'almretser/edit?id='.$caretser->getId().'&codser='.$caretser->getCodser()) ?></td>
