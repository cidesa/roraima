<?php

/**
 * nomdefesptippre actions.
 *
 * @package    siga
 * @subpackage nomdefesptippre
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefesptippreActions extends autonomdefesptippreActions
{


  public function executeEdit()
  {
    $this->nptippre = $this->getNptippreOrCreate();


    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNptippreFromRequest();

      $this->saveNptippre($this->nptippre);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefesptippre/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefesptippre/list');
      }
      else
      {
        return $this->redirect('nomdefesptippre/edit?id='.$this->nptippre->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeAjax()
	{
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');

	  if ($this->getRequestParameter('ajax')=='1')
	    {

	  		$dato=Herramientas::getX('codcon','Npdefcpt','nomcon',strtoupper($this->getRequestParameter('codcon')));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	    }

  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	    return sfView::HEADER_ONLY;
	}



  protected function updateNptippreFromRequest()
  {
    $nptippre = $this->getRequestParameter('nptippre');

    if (isset($nptippre['codcon']))
    {
      $this->nptippre->setCodcon(str_pad($nptippre['codcon'],3,'0',STR_PAD_LEFT));
    }
    if (isset($nptippre['tippre']))
    {
      $this->nptippre->setTippre($nptippre['tippre']);
    }
    if (isset($nptippre['codtippre']))
    {
      $this->nptippre->setCodtippre(str_pad($nptippre['codtippre'],4,'0',STR_PAD_LEFT));
    }
    if (isset($nptippre['destippre']))
    {
      $this->nptippre->setDestippre($nptippre['destippre']);
    }
  }

}
