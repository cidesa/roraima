<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/11/08 10:06:27
?>
    <td><?php echo link_to($npasicarnom->getCodnom() ? $npasicarnom->getCodnom() : __('-'), 'nomdefespasicartipnomlot/edit?id='.$npasicarnom->getId().'&codnom='.$npasicarnom->getCodnom()) ?></td>
    <td><?php echo $npasicarnom->getCodcar() ?></td>
      <td><?php echo $npasicarnom->getNomnom() ?></td>
