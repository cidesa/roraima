<?php

/**
 * biecatact actions.
 *
 * @package    siga
 * @subpackage biecatact
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class biecatactActions extends autobiecatactActions
{

  public function executeEdit()
  {
    $this->setVars();
    parent::executeEdit();
  }

  public function setVars()
  {
    $this->foract = Herramientas::ObtenerFormato('Bndefins','foract');
    $this->lonact=strlen($this->foract);
  }


  public function executeAjax()
  {
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
	 if ($this->getRequestParameter('ajax')=='1')
	 {
	 	$dato=BndefactPeer::getDesact(trim($this->getRequestParameter('codigo')));
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	 	return sfView::HEADER_ONLY;
	 }
  }

	public function executeAutocomplete()
	{
		if ($this->getRequestParameter('ajax')=='1')
	    {
		 	$this->tags="";
	    }
	}


  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->bndefact = $this->getBndefactOrCreate();
    $this->updateBndefactFromRequest();
    $this->setVars();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

}
