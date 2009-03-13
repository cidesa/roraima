<?php

/**
 * tesdeftipcue actions.
 *
 * @package    siga
 * @subpackage tesdeftipcue
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class tesdeftipcueActions extends autotesdeftipcueActions
{ 
    public function executeDelete()
  {
    $this->tstipcue = TstipcuePeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->tstipcue);
    $id=$this->getRequestParameter('id');
    $c= new Criteria();
    $c->add(TsdefbanPeer::TIPCUE,$this->tstipcue->getCodtip());
    $dato=TsdefbanPeer::doSelect($c);
    if (!$dato)
    { $this->deleteTstipcue($this->tstipcue);}
    else {
    	
        $this->setFlash('notice','El tipo de Cuenta no puede ser eliminado, porque esta asociado a un banco');       
      return $this->redirect('tesdeftipcue/edit?id='.$id); 	
    }  

    return $this->redirect('tesdeftipcue/list');
  }
  
  
  public function executeEdit()
  {
    $this->tstipcue = $this->getTstipcueOrCreate();     
    
    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateTstipcueFromRequest();

      $this->saveTstipcue($this->tstipcue);

       $this->tstipcue->setId(Herramientas::getX_vacio('codtip','tstipcue','id',$this->tstipcue->getCodtip()));
       
      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('tesdeftipcue/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('tesdeftipcue/list');
      }
      else
      {
        return $this->redirect('tesdeftipcue/edit?id='.$this->tstipcue->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
  
  protected function updateTstipcueFromRequest()
  {
    $tstipcue = $this->getRequestParameter('tstipcue');

    if (isset($tstipcue['codtip']))
    {
      $this->tstipcue->setCodtip($tstipcue['codtip']);
    }
    if (isset($tstipcue['destip']))
    {
      $this->tstipcue->setDestip($tstipcue['destip']);
    }
  }
}
