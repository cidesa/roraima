<?php

/**
 * pagtipret actions.
 *
 * @package    siga
 * @subpackage pagtipret
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class pagtipretActions extends autopagtipretActions
{
  public function getNomcon()
  {
  	  $c = new Criteria;
  	  $c->add(ContabbPeer::CODCTA,str_pad($this->optipret->getCodcon(),32,' '));
  	  $this->misdatos = ContabbPeer::doSelect($c);
  	  if ($this->misdatos)
	  	return $this->misdatos[0]->getDescta();
	  	else return ' ';
	 
  }
  
  public function executeEdit()
  {
    $this->optipret = $this->getOptipretOrCreate();
    $this->nomcta = $this->getNomcon();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateOptipretFromRequest();

      $this->saveOptipret($this->optipret);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('pagtipret/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('pagtipret/list');
      }
      else
      {
        return $this->redirect('pagtipret/edit?id='.$this->optipret->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
 protected function updateOptipretFromRequest()
  {
    $optipret = $this->getRequestParameter('optipret');

    if (isset($optipret['codtip']))
    {
      $this->optipret->setCodtip($optipret['codtip']);
    }
    if (isset($optipret['destip']))
    {
      $this->optipret->setDestip($optipret['destip']);
    }
    if (isset($optipret['codcon']))
    {
      $this->optipret->setCodcon(str_pad($optipret['codcon'],32,' '));
    }
    if (isset($optipret['basimp']))
    {
      $this->optipret->setBasimp($optipret['basimp']);
    }
    if (isset($optipret['porret']))
    {
      $this->optipret->setPorret($optipret['porret']);
    }
    if (isset($optipret['unitri']))
    {
      $this->optipret->setUnitri($optipret['unitri']);
    }
    if (isset($optipret['porsus']))
    {
      $this->optipret->setPorsus($optipret['porsus']);
    }
    if (isset($optipret['factor']))
    {
      $this->optipret->setFactor($optipret['factor']);
    }
  }  
  
}
