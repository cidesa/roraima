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
   private $coderror = -1;
   
  public function validateEdit()
  {
    $resp=-1;    
    
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {       
      $this->carecaud = $this->getCarecaudOrCreate();
       $carecaud = $this->getRequestParameter('carecaud');
       $valor = $carecaud['codrec'];
       $campo='codrec';

       $resp=Herramientas::ValidarCodigo($valor,$this->carecaud,$campo);
       
      if($resp!=-1)
      {
        $this->coderror = $resp; 
        return false;
      } else return true;
    }else return true;  
 }
	
	public function executeEdit()
	  {
	    $this->carecaud = $this->getCarecaudOrCreate();
	
	    if ($this->getRequest()->getMethod() == sfRequest::POST)
	    {
	      $this->updateCarecaudFromRequest();
	
	      $this->saveCarecaud($this->carecaud);
	
	      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');
	
	      if ($this->getRequestParameter('save_and_add'))
	      {
	        return $this->redirect('almregrec/create');
	      }
	      else if ($this->getRequestParameter('save_and_list'))
	      {
	        return $this->redirect('almregrec/list');
	      }
	      else
	      {
	        return $this->redirect('almregrec/edit?id='.$this->carecaud->getId());
	      }
	    }
	    else
	    {
	      $this->labels = $this->getLabels();
	    }
	  }
	  
  public function handleErrorEdit()
  {
    $this->labels = $this->getLabels();
        
    $this->carecaud = $this->getCarecaudOrCreate();
    $this->updateCarecaudFromRequest();    
    
        
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror!=-1)
      {
        $err = Herramientas::obtenerMensajeError($this->coderror);	    
        $this->getRequest()->setError('',$err);	
      }
    }
    return sfView::SUCCESS;

  }
  
	  
  public function executeAjax()
	{
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');
	  if ($this->getRequestParameter('ajax')=='1')
	    {
	  		$dato=CatiprecPeer::getDestip($this->getRequestParameter('codigo'));	  			 
            $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","4","c"]]';		 			 	    
	    } 	    		  	    

  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')'); 
	    return sfView::HEADER_ONLY;
	}	 
 
	public function executeAutocomplete()
	{
		if ($this->getRequestParameter('ajax')=='1')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('CODTIPREC','Catiprec','codtiprec',$this->getRequestParameter('carecaud[codtiprec]'));
	    }	   
	}	  

	protected function getLabels()
	  {
	    return array(
	      'carecaud{codrec}' => 'Código',
	      'carecaud{desrec}' => 'Descripción',
	      'carecaud{limrec}' => 'Limitante',
	      'carecaud{canutr}' => 'Apartir de',
	      'carecaud{codtiprec}' => 'Grupo',
	      'carecaud{destiprec}' => 'Descripción',
	      'carecaud{observ}' => 'Observación',
	    );
	  }
  
}
