<?php

/**
 * tesdefrengas actions.
 *
 * @package    siga
 * @subpackage tesdefrengas
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class tesdefrengasActions extends autotesdefrengasActions
{

  public function executeIndex()
  {
    $c= new Criteria();
    $resul= TsdefrengasPeer::doSelectOne($c);
    if ($resul)
    {
      $this->redirect('tesdefrengas/edit?id='.$resul->getId());
    }
  	else
  	{
  		$this->redirect('tesdefrengas/edit');
  	}
  }
  
   
  public function executeEdit()
  {
     $this->tsdefrengas = $this->getTsdefrengasOrCreate();
     $this->mascara = Herramientas::ObtenerFormato('Contaba','Forcta');    
     $this->loncta=strlen($this->mascara);

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateTsdefrengasFromRequest();

      $this->saveTsdefrengas($this->tsdefrengas);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('tesdefrengas/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('tesdefrengas/list');
      }
      else
      {
        return $this->redirect('tesdefrengas/edit?id='.$this->tsdefrengas->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
  
  public function executeDelete()
  {
    $this->tsdefrengas = TsdefrengasPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->tsdefrengas);

    try
    {
      $this->deleteTsdefrengas($this->tsdefrengas);
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Tsdefrengas. Make sure it does not have any associated items.');
      return $this->forward('tesdefrengas', 'edit');
    }

    return $this->redirect('tesdefrengas/edit');
  }
  
  protected function updateTsdefrengasFromRequest()
  {
    $tsdefrengas = $this->getRequestParameter('tsdefrengas');
    $this->mascara = Herramientas::ObtenerFormato('Contaba','Forcta');
    $this->loncta=strlen($this->mascara);    

    if (isset($tsdefrengas['pagrepcaj']))
    {
      $this->tsdefrengas->setPagrepcaj($tsdefrengas['pagrepcaj']);
    }
    if (isset($tsdefrengas['ctarepcaj']))
    {
      $this->tsdefrengas->setCtarepcaj($tsdefrengas['ctarepcaj']);
    }
    if (isset($tsdefrengas['ctacheant']))
    {
      $this->tsdefrengas->setCtacheant($tsdefrengas['ctacheant']);
    }
    if (isset($tsdefrengas['movreicaj']))
    {
      $this->tsdefrengas->setMovreicaj($tsdefrengas['movreicaj']);
    }
  }

  public function executeAjax()
  {
	$cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
	if ($this->getRequestParameter('ajax')=='1')
	 {
	   $c = new Criteria();
       $c->add(CpdoccauPeer::REFIER,'N');
       $c->add(CpdoccauPeer::AFEPRC,'N');
       $c->add(CpdoccauPeer::AFECOM,'N');
       $c->add(CpdoccauPeer::AFEDIS,'N');
       $c->add(CpdoccauPeer::TIPCAU,$this->getRequestParameter('codigo'));
       $resul=CpdoccauPeer::doSelect($c);
       if ($resul)
       { $ext='';}else{ $ext='N';}
	   $dato=CpdoccauPeer::getNombre($this->getRequestParameter('codigo'));	  			 
       $output = '[["'.$cajtexmos.'","'.$dato.'",""],["extra","'.$ext.'",""]]';		 			 	    
	 } 
	 else  if ($this->getRequestParameter('ajax')=='2')
	 {
	   $dato=ContabbPeer::getDescta($this->getRequestParameter('codigo'));
	   $dato2=ContabbPeer::getCargab($this->getRequestParameter('codigo'));
	   if ($dato2=='C')
	   { $carg='';}else{ $carg='N';}	  			 
       $output = '[["'.$cajtexmos.'","'.$dato.'",""],["cargable","'.$carg.'",""]]';		 			 	    
	 } 	    
     else  if ($this->getRequestParameter('ajax')=='4')
	 {
	   $dato=TstipmovPeer::getMovimiento($this->getRequestParameter('codigo'));
	   $dato2=TstipmovPeer::getDebcre($this->getRequestParameter('codigo'));
	   if ($dato2!='D')
	   { $deb='N';}else { $deb='';}	  	  			 
       $output = '[["'.$cajtexmos.'","'.$dato.'",""],["nodeb","'.$deb.'",""]]';		 			 	    
	 }	    
  	 $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')'); 
	 return sfView::HEADER_ONLY;
  }
}

