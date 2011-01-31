<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/05/16 14:35:05
?>
    <td><?php echo $dfrutadoc->getTipdoc() ? $dfrutadoc->getTipdoc() : __('-') ?></td>
      <td><?php echo $dfrutadoc->getNomuni() ?></td>
        <td><?php echo $dfrutadoc->getDesuni() ?></td>
          <td><?php echo $dfrutadoc->getDesrut() ?></td>        
            <td><?php echo $dfrutadoc->getDiadoc() ?></td>
              <td><?php echo $dfrutadoc->getRutdoc() ?></td>
