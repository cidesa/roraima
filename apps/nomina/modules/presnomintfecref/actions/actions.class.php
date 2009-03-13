<?php

/**
 * presnomintfecref actions.
 *
 * @package    siga
 * @subpackage presnomintfecref
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class presnomintfecrefActions extends autopresnomintfecrefActions
{
	 public static $coderror=-1;

     public function validateEdit()
      {
      if($this->getRequest()->getMethod() == sfRequest::POST)
        {
	  $this->npintfecref = $this->getNpintfecrefOrCreate();
	  $this->updateNpintfecrefFromRequest();

       	if ($this->npintfecref->getId()=="")
	  	self::$coderror=Nomina::validarNpintfecref($this->npintfecref->getFeciniref(),$this->npintfecref->getFecfinref());

	  /*	if (self::$coderror==-1)
	  	{
	  	  $inicio= $this->npintfecref->getFeciniref();
	  	  $fin= $this->npintfecref->getFecfinref();
	  	   if ($inicio > $fin)
	  	   {
	  	   self::$coderror= 431;

	  	   }

	  	}*/
	  	if (self::$coderror==-1)
	  	{
	  	  $pro= $this->npintfecref->getTasintpro();
  	  	  $act= $this->npintfecref->getTasintact();
  	  	  $pas= $this->npintfecref->getTasintpas();
	  	   if (($pro == null) or ($act == null) or ($pas == null) )
	  	   {
	  	   self::$coderror= 432;

	  	   }
	  	}

	  if (self::$coderror<>-1)
            {
	      return false;
	    }else return true;
	  }
	 else return true;
    }


  public function handleErrorEdit()
    {
    $this->preExecute();
    $this->npintfecref = $this->getNpintfecrefOrCreate();
    $this->updateNpintfecrefFromRequest();
    $this->labels = $this->getLabels();


      if(!$this->validateEdit())

      {

	  $err = Herramientas::obtenerMensajeError(self::$coderror);

	  $this->getRequest()->setError('npintfecref{feciniref}',$err);
	  //$this->getRequest()->setError('npintfecref{fecfinref}',$err);
        }
       return sfView::SUCCESS;
     }

 protected function getNpintfecrefOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $npintfecref = new Npintfecref();
    }
    else
    {
      $npintfecref = NpintfecrefPeer::retrieveByPk($this->getRequestParameter($id));
      $this->forward404Unless($npintfecref);
    }

    return $npintfecref;
  }


}
