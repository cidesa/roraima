<?php

/**
 * nomconceptosprimas actions.
 *
 * @package    Roraima
 * @subpackage nomconceptosprimas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomconceptosprimasActions extends autonomconceptosprimasActions
{
  public $coderror=-1;

  
  
  
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
     $this->npconpri = $this->getNpconpriOrCreate();
     $this->updateNpconpriFromRequest();

      $c= new Criteria();
      $c->add(NpconpriPeer::CODNOM,$this->npconpri->getCodnom());
      $c->add(NpconpriPeer::CODCON,$this->npconpri->getCodcon());
      $result=NpconpriPeer::doSelectOne($c);
      if ($result)
      {
      	$this->coderror=406;
      	return false;
      }
     return true;
    }else return true;
  }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->npconpri = $this->getNpconpriOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpconpriFromRequest();

      $this->saveNpconpri($this->npconpri);

      $this->npconpri->setId(self::obtenerId($this->npconpri->getCodnom(),$this->npconpri->getCodcon()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomconceptosprimas/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomconceptosprimas/list');
      }
      else
      {
        return $this->redirect('nomconceptosprimas/edit?id='.$this->npconpri->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
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
    $this->npconpri = $this->getNpconpriOrCreate();
    $this->updateNpconpriFromRequest();

    $this->labels = $this->getLabels();

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror!=-1)
      {
       $err = Herramientas::obtenerMensajeError($this->coderror);
       $this->getRequest()->setError('npconpri{codcon}',$err);
      }
    }

    return sfView::SUCCESS;
  }

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
	  		$dato=NpnominaPeer::getDesnom($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	    }else
	  if ($this->getRequestParameter('ajax')=='2')
	    {
	  		$d= new Criteria();
	  		$d->add(NpdefcptPeer::CODCON,$this->getRequestParameter('codigo'));
	  		$resul=NpdefcptPeer::doSelectOne($d);
	  		if ($resul)
	  		{
	  		  $c= new Criteria();
	  		  $c->add(NpasiconnomPeer::CODNOM,$this->getRequestParameter('nomina'));
	  		  $c->add(NpasiconnomPeer::CODCON,$this->getRequestParameter('codigo'));
	  	      $data=NpasiconnomPeer::doSelectOne($c);
	  		  if ($data)
	  		  {
	  		   $dato=NpdefcptPeer::getDescon($this->getRequestParameter('codigo'));
	  		   $existe='N';
	  		  }
	  		  else
	  		  {
	  		   $dato="";
	  		   $existe='S';
	  		  }
	  		}
	  		else
	  		{ $existe='SS'; $dato="";}

            $output = '[["'.$cajtexmos.'","'.$dato.'",""],["existe","'.$existe.'",""]]';
	    }



  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	    return sfView::HEADER_ONLY;
	}

	public function executeAutocomplete()
	{
		if ($this->getRequestParameter('ajax')=='1')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('CODNOM','Npnomina','CODNOM',$this->getRequestParameter('npconpri[codnom]'));
	    }
	}

	public function obtenerId($dato1,$dato2)
  {
  	$c= new Criteria();
  	$c->add(NpconpriPeer::CODNOM,$dato1);
  	$c->add(NpconpriPeer::CODCON,$dato2);
  	$resul= NpconpriPeer::doSelectOne($c);
  	if ($resul)
  	{
  	  return $resul->getId();
  	}
  	else
  	{
  		return '';
  	}
  }

}
