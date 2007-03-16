<?php

/**
 * pagretiva actions.
 *
 * @package    siga
 * @subpackage pagretiva
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class pagretivaActions extends autopagretivaActions
{
public function getMostrar_Retencion()
  {
  	  $c = new Criteria;
  	  $this->campo = str_pad($this->tsretiva->getCodret(),3,' ');
  	  $c->add(OptipretPeer::CODTIP, $this->campo);
  	  $this->reten = OptipretPeer::doSelect($c);
	  if ($this->reten)
	  	return $this->reten[0]->getDestip();
	  else 
	    return ' ';
  }
  
  public function getMostrar_Recargo()
  {
  	  $c = new Criteria;
  	  $c->addJoin(CarecargPeer::CODRGO,TsretivaPeer::CODREC);
  	  $c->add(CarecargPeer::CODRGO,$this->tsretiva->getCodrec());
  	  $this->recar = CarecargPeer::doSelect($c);
  	  if ($this->recar)
	  	{
	  		$this->nomreca = $this->recar[0]->getNomrgo();
	  	    $this->codpres = $this->recar[0]->getCodpre();
	  	}
	  	else
	  	{
	  		$this->nomreca = '';
	  	    $this->codpres = '';
	  	}
  }	
	

  public function executeEdit()
  {
    $this->tsretiva = $this->getTsretivaOrCreate();
    $this->tiporet = $this->getMostrar_Retencion();
    $this->getMostrar_Recargo();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateTsretivaFromRequest();

      $this->saveTsretiva($this->tsretiva);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('pagretiva/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('pagretiva/list');
      }
      else
      {
        return $this->redirect('pagretiva/edit?id='.$this->tsretiva->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }  

}
