<?php

/**
 * nomdefespvar actions.
 *
 * @package    siga
 * @subpackage nomdefespvar
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefespvarActions extends autonomdefespvarActions
{
public function getMostrar_TIPONOM()
  {
  	  $c = new Criteria;
  	  $this->campo = str_pad($this->npdefvar->getCodnom(),3,' ');
  	  $c->add(NpnominaPeer::CODNOM, $this->campo);
  	  $this->nomina = NpnominaPeer::doSelect($c);
	  if ($this->nomina)
	  	return $this->nomina[0]->getNomnom();
	  else 
	    return ' ';
  }
	
	
public function executeEdit()
  {
    $this->npdefvar = $this->getNpdefvarOrCreate();
    $this->tipo = $this->getMostrar_TIPONOM();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpdefvarFromRequest();

      $this->saveNpdefvar($this->npdefvar);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefespvar/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefespvar/list');
      }
      else
      {
        return $this->redirect('nomdefespvar/edit?id='.$this->npdefvar->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
	
}
