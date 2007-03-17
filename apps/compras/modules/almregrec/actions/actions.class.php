<?php

/**
 * almregrec actions.
 *
 * @package    siga
 * @subpackage almregrec
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almregrecActions extends autoalmregrecActions
{
	
  protected function updateCarecaudFromRequest()
  {
    $carecaud = $this->getRequestParameter('carecaud');

    if (isset($carecaud['codrec']))
    {
      $this->carecaud->setCodrec($carecaud['codrec']);
    }
    if (isset($carecaud['desrec']))
    {
      $this->carecaud->setDesrec($carecaud['desrec']);
    }
    if (true)
    {
      	$this->carecaud->setLimrec($this->getRequestParameter('estado','D'));
    }
    if (isset($carecaud['canutr']))
    {
      $this->carecaud->setCanutr($carecaud['canutr']);
    }
    if (isset($carecaud['codtiprec']))
    {
      $this->carecaud->setCodtiprec($carecaud['codtiprec']);
    }
    if (isset($carecaud['observ']))
    {
      $this->carecaud->setObserv($carecaud['observ']);
    }
    
  }
  
  protected function getCarecaudOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $carecaud = new Carecaud();
      $carecaud->setLimrec('N');
    }
    else
    {
      $carecaud = CarecaudPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($carecaud);
    }

    return $carecaud;
  }

  
}
