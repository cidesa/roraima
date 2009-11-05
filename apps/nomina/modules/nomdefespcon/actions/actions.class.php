<?php

/**
 * nomdefespcon actions.
 *
 * @package    Roraima
 * @subpackage nomdefespcon
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomdefespconActions extends autonomdefespconActions
{
   public $coderror1=-1;

/**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
	{
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');
	  if ($this->getRequestParameter('ajax')=='1')
	    {
	  		$dato=NppartidasPeer::getNompar($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	    }

  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	    return sfView::HEADER_ONLY;
	}

	/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
	{
		$this->npdefcpt = $this->getNpdefcptOrCreate();
		$this->formato= Herramientas::getMascaraPartida();
		$this->longitud=strlen($this->formato);
        $this->mancorrel="";
  	    $varemp = $this->getUser()->getAttribute('configemp');
	    if(is_array($varemp))
	     if(array_key_exists('aplicacion',$varemp))
	  	  if(array_key_exists('nomina',$varemp['aplicacion']))
		   if(array_key_exists('modulos',$varemp['aplicacion']['nomina']))
		     if(array_key_exists('nomdefespcon',$varemp['aplicacion']['nomina']['modulos']))
			 {
			 	if (array_key_exists('mancorrel',$varemp['aplicacion']['nomina']['modulos']['nomdefespcon']))
		        {
		       	 $this->mancorrel=$varemp['aplicacion']['nomina']['modulos']['nomdefespcon']['mancorrel'];
		        }

			 }

		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$this->updateNpdefcptFromRequest();

			$this->saveNpdefcpt($this->npdefcpt);

            $this->npdefcpt->setId(Herramientas::getX_vacio('codcon','npdefcpt','id',$this->npdefcpt->getCodcon()));

			$this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

			if ($this->getRequestParameter('save_and_add'))
			{
				return $this->redirect('nomdefespcon/create');
			}
			else if ($this->getRequestParameter('save_and_list'))
			{
				return $this->redirect('nomdefespcon/list');
			}
			else
      {
        return $this->redirect('nomdefespcon/edit?id='.$this->npdefcpt->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

 /**
   * Función para manejar el salvado del formulario.
   * cabe destacar que en las versiones nuevas del formulario (cidesaPropel)
   * llama internamente a la función $this->saving
   * Esta función saving siempre debe retornar un valor >=-1.
   * En esta funcción se debe realizar el proceso de guardado de informacion
   * del negocio en la base de datos. Este proceso debe ser realizado llamado
   * a funciones de las clases del negocio que se encuentran en lib/bussines
   * todos los procesos de guardado deben estar en la clases del negocio (lib/bussines/"modulo")
   *
   */
  protected function saveNpdefcpt($npdefcpt)
  {
    Nomina::salvarNomdefespcon($npdefcpt);

  }


	/**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateNpdefcptFromRequest()
	{
		$npdefcpt = $this->getRequestParameter('npdefcpt');
		$this->formato= Herramientas::getMascaraPartida();
		$this->longitud=strlen($this->formato);
        $this->mancorrel="";
  	    $varemp = $this->getUser()->getAttribute('configemp');
	    if(is_array($varemp))
	     if(array_key_exists('aplicacion',$varemp))
	  	  if(array_key_exists('nomina',$varemp['aplicacion']))
		   if(array_key_exists('modulos',$varemp['aplicacion']['nomina']))
		     if(array_key_exists('nomdefespcon',$varemp['aplicacion']['nomina']['modulos']))
			 {
			 	if (array_key_exists('mancorrel',$varemp['aplicacion']['nomina']['modulos']['nomdefespcon']))
		        {
		       	 $this->mancorrel=$varemp['aplicacion']['nomina']['modulos']['nomdefespcon']['mancorrel'];
		        }
			 }

	if (isset($npdefcpt['codcon']))
    {
      $this->npdefcpt->setCodcon(str_pad($npdefcpt['codcon'],3,0,STR_PAD_LEFT));
    }
    if (isset($npdefcpt['nomcon']))
    {
      $this->npdefcpt->setNomcon($npdefcpt['nomcon']);
    }
    if (isset($npdefcpt['codpar']))
    {
      $this->npdefcpt->setCodpar($npdefcpt['codpar']);
    }
    if (isset($npdefcpt['nompar']))
    {
      $this->npdefcpt->setNompar($npdefcpt['nompar']);
    }
    if (isset($npdefcpt['opecon']))
    {
      $this->npdefcpt->setOpecon($npdefcpt['opecon']);
    }
    if (isset($npdefcpt['conact']))
    {
      $this->npdefcpt->setConact($npdefcpt['conact']);
    }
    if (isset($npdefcpt['impcpt']))
    {
      $this->npdefcpt->setImpcpt($npdefcpt['impcpt']);
    }
    if (isset($npdefcpt['inimon']))
    {
      $this->npdefcpt->setInimon($npdefcpt['inimon']);
    }
    if (isset($npdefcpt['acuhis']))
    {
      $this->npdefcpt->setAcuhis($npdefcpt['acuhis']);
    }
    if (isset($npdefcpt['ordpag']))
    {
      $this->npdefcpt->setOrdpag($npdefcpt['ordpag']);
    }
    if (isset($npdefcpt['afepre']))
    {
      $this->npdefcpt->setAfepre($npdefcpt['afepre']);
    }
  }

  /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
    $this->npdefcpt = NpdefcptPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->npdefcpt);

    $id=$this->getRequestParameter('id');
    $c= new Criteria();
    $c->add(NpasiconempPeer::CODCON,$this->npdefcpt->getCodcon());
    $dato=NpasiconempPeer::doSelect($c);
    if (!$dato)
    {
      $this->deleteNpdefcpt($this->npdefcpt);
      $this->Bitacora('Elimino');
    }
    else
    {
      $this->setFlash('notice','No puede eliminar el concepto, se encuentra asociado a un empleado.');
      return $this->redirect('nomdefespcon/edit?id='.$id);
    }

    return $this->redirect('nomdefespcon/list');
  }
}
