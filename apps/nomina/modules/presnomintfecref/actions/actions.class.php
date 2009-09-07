<?php

/**
 * presnomintfecref actions.
 *
 * @package    Roraima
 * @subpackage presnomintfecref
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class presnomintfecrefActions extends autopresnomintfecrefActions
{
	 // variable donde se debe colocar el código de error generado en el validateEdit 
  // para que sea procesado por el handleErrorEdit.
  public static $coderror=-1;

     
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
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
	  	   if (($pro == null) and ($act == null) and ($pas == null) )
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


  /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function handleErrorEdit()
    {
    $this->preExecute();
    $this->npintfecref = $this->getNpintfecrefOrCreate();
    $this->updateNpintfecrefFromRequest();
    $this->labels = $this->getLabels();


      if(!$this->validateEdit())

      {

	  $err = Herramientas::obtenerMensajeError(self::$coderror);

	  $this->getRequest()->setError('',$err);
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
