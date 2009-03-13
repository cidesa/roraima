<?php

/**
 * nomdefespsitemp actions.
 *
 * @package    siga
 * @subpackage nomdefespsitemp
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefespsitempActions extends autonomdefespsitempActions
{
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
