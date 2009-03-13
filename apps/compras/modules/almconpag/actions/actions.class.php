<?php

/**
 * almconpag actions.
 *
 * @package    siga
 * @subpackage almconpag
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almconpagActions extends autoalmconpagActions
{
   private $coderror = -1;
   
   
	protected function updateCaconpagFromRequest()
	{
		$caconpag = $this->getRequestParameter('caconpag');
	
		if (isset($caconpag['codconpag']))
		{
		  $this->caconpag->setCodconpag(str_pad($caconpag['codconpag'], 4, '0', STR_PAD_LEFT));
	    }
	    if (isset($caconpag['desconpag']))
	    {
	      $this->caconpag->setDesconpag($caconpag['desconpag']);
	    }
  }
  
  public function validateEdit()
  {
    $resp=-1; 

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->caconpag = $this->getCaconpagOrCreate();    
      $caconpag = $this->getRequestParameter('caconpag');
      $valor = $caconpag['codconpag'];
      $campo='codconpag';

      $resp=Herramientas::ValidarCodigo($valor,$this->caconpag,$campo);

      if($resp!=-1)
      {
        $this->coderror = $resp; 
        return false;
      } else return true;
   }else return true;
  }
	
  public function handleErrorEdit()
  {
    $this->labels = $this->getLabels();
        
     $this->caconpag = $this->getCaconpagOrCreate();
     $this->updateCaconpagFromRequest();    
          
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
	
}
