<?php

/**
 * nomdefespsitemp actions.
 *
 * @package    Roraima
 * @subpackage nomdefespsitemp
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomdefespsitempActions extends autonomdefespsitempActions
{
  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateNpsitempFromRequest()
  {
    $npsitemp = $this->getRequestParameter('npsitemp');

    if (isset($npsitemp['codsitemp']))
    {
      $this->npsitemp->setCodsitemp($npsitemp['codsitemp']);
    }
    if (isset($npsitemp['dessitemp']))
    {
      $this->npsitemp->setDessitemp($npsitemp['dessitemp']);
    }
    if (isset($npsitemp['calnom']))
    {
      $this->npsitemp->setCalnom('S');
    }
    else
    {
      $this->npsitemp->setCalnom('N');
    }
  }


}
