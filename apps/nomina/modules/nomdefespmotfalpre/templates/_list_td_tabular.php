<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/08/22 16:05:13
?>
    <td><?php echo link_to($npmotfal->getCodmotfal() ? $npmotfal->getCodmotfal() : __('-'), 'nomdefespmotfalpre/edit?id='.$npmotfal->getId()) ?></td>
    <td><?php echo $npmotfal->getDesmotfal() ?></td>
      <td><?php $c=$npmotfal->getCausa();
      if ($c=='I')
      { echo 'Injustificada';
		}
	  else if ($c=='J')
	  { echo 'Justificada';
		}
	 else 
		{ echo $npmotfal->getCausa();  }

      
      ?></td>
  