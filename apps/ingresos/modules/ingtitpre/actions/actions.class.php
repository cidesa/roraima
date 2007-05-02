<?php

/**
 * ingtitpre actions.
 *
 * @package    siga
 * @subpackage ingtitpre
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class ingtitpreActions extends autoingtitpreActions
{
	public function executeEdit()
	  {
	    $this->cideftit = $this->getCideftitOrCreate();
	
	    if ($this->getRequest()->getMethod() == sfRequest::POST)
	    {
	      $this->updateCideftitFromRequest();
	
	      $this->saveCideftit($this->cideftit);
	
	      $this->setFlash('notice', 'Your modifications have been saved');
	
	      if ($this->getRequestParameter('save_and_add'))
	      {
	        return $this->redirect('ingtitpre/create');
	      }
	      else if ($this->getRequestParameter('save_and_list'))
	      {
	        return $this->redirect('ingtitpre/list');
	      }
	      else
	      {
	        return $this->redirect('ingtitpre/edit?id='.$this->cideftit->getId());
	      }
	    }
	    else
	    {
	      $this->labels = $this->getLabels();
	    }
	  }	
	  
	public function handleErrorEdit()
	  {
	    $this->preExecute();
	    $this->cideftit = $this->getCideftitOrCreate();
	    $this->updateCideftitFromRequest();
	
	    $this->labels = $this->getLabels();
	
	    return sfView::SUCCESS;
	  }	  
	  
	protected function updateCideftitFromRequest()
	  {
	    $cideftit = $this->getRequestParameter('cideftit');
	
	    if (isset($cideftit['codpre']))
	    {
	      $this->cideftit->setCodpre($cideftit['codpre']);
	    }
	    if (isset($cideftit['nompre']))
	    {
	      $this->cideftit->setNompre($cideftit['nompre']);
	    }
	    if (isset($cideftit['codcta']))
	    {
	      $this->cideftit->setCodcta($cideftit['codcta']);
	    }
	    if (isset($cideftit['descta']))
	    {
	      $this->cideftit->setDescta($cideftit['descta']);
	    }
	   
	      $this->cideftit->setStacod('A');
	    
	    if (isset($cideftit['coduni']))
	    {
	      $this->cideftit->setCoduni($cideftit['coduni']);
	    }
	    if (isset($cideftit['estatus']))
	    {
	      $this->cideftit->setEstatus($cideftit['estatus']);
	    }
	  }	  
	  
	protected function getLabels()
	  {
	    return array(
	      'cideftit{codpre}' => 'Código',
	      'cideftit{nompre}' => 'Nombre',
	      'cideftit{codcta}' => 'Código',
	      'cideftit{descta}' => 'Nombre',
	      'cideftit{stacod}' => 'Estatus',
	      'cideftit{coduni}' => 'Código de Unidad',
	      'cideftit{estatus}' => 'Estatus2',
	    );
	  }	  
}
