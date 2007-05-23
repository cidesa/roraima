<?php

/**
 * almregpro actions.
 *
 * @package    siga
 * @subpackage almregpro
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almregproActions extends autoalmregproActions
{
    private static $coderror=-1; 
       	
    public function validateEdit()
	  {  	 
	  	if($this->getRequest()->getMethod() == sfRequest::POST)
	    { 
	    	$this->caprovee = $this->getCaproveeOrCreate();
	    	$this->updateCaproveeFromRequest();	    	

	    	//Por si hay algunas validaciones
	    	//self::$coderror=Articulos::validarAlmregart($this->caregart,$grid);
	    	if (self::$coderror<>-1){	    		 	
	    		return false;
	    	}else return true;
	    }else return true;   
	  }  	

    public function handleErrorEdit()
      {
       /* $this->preExecute();
        $this->caprovee = $this->getCaproveeOrCreate();
        $this->updateCaproveeFromRequest();
        $this->labels = $this->getLabels();
  
        if(!$this->validateEdit())
          {
  	       $err = Herramientas::obtenerMensajeError(self::$coderror);	    
	       $this->getRequest()->setError('caregart{codart}',$err);	
          }
         return sfView::SUCCESS;*/
      	
     } 	

  public function executeEdit()
  {
    $this->caprovee = $this->getCaproveeOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCaproveeFromRequest();

      $this->saveCaprovee($this->caprovee);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('almregpro/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('almregpro/list');
      }
      else
      {
        return $this->redirect('almregpro/edit?id='.$this->caprovee->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
       
	public function saveCaprovee($caprovee)
	  {		
	  	Proveedor::salvarAlmregpro($caprovee);
        //Herramientas::obtenerMensajeError(self::$coderror);
	  	
	  }
	       

}
