<?php

/**
 * nomdefespest actions.
 *
 * @package    Roraima
 * @subpackage nomdefespest
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomdefespestActions extends autonomdefespestActions
{
  public  $coderror1=-1;

  
  
  
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
      $this->npestado = $this->getNpestadoOrCreate();
      $this->updateNpestadoFromRequest();
      $c= new Criteria();
      $c->add(NpestadoPeer::CODPAI,$this->npestado->getCodpai());
      $c->add(NpestadoPeer::CODEDO,$this->npestado->getCodedo());
      $resul= NpestadoPeer::doSelect($c);
      if ($resul)
      {
      	$this->coderror1=409;
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
    $this->npestado = $this->getNpestadoOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpestadoFromRequest();

      $this->saveNpestado($this->npestado);

      $this->npestado->setId(self::obtenerId($this->npestado->getCodpai(),$this->npestado->getCodedo()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefespest/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefespest/list');
      }
      else
      {
        return $this->redirect('nomdefespest/edit?id='.$this->npestado->getId());
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
    $this->npestado = $this->getNpestadoOrCreate();
    $this->updateNpestadoFromRequest();

    $this->labels = $this->getLabels();

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror1!=-1)
      {
       $err = Herramientas::obtenerMensajeError($this->coderror1);
       $this->getRequest()->setError('',$err);
      }
    }

    return sfView::SUCCESS;
  }

  /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
    $this->npestado = NpestadoPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->npestado);

    $id=$this->getRequestParameter('id');
    $c=new Criteria();
    $c->add(NpciudadPeer::CODPAI,$this->npestado->getCodpai());
    $c->add(NpciudadPeer::CODEDO,$this->npestado->getCodedo());
    $dato=NpciudadPeer::doSelect($c);
    if (!$dato)
    {
      $this->deleteNpestado($this->npestado);
      $this->Bitacora('Elimino');
    }
    else
    {
      $this->setFlash('notice','El Estado no puede ser eliminado, ya que se encuentra asociado a un Ciudad');
      return $this->redirect('nomdefespest/edit?id='.$id);
    }
    return $this->redirect('nomdefespest/list');
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
    $ajax = $this->getRequestParameter('ajax');

    switch ($ajax){
      case '1':
        $dato=NppaisPeer::getNompai($this->getRequestParameter('codigo'));
        $output = '[["'.$cajtexmos.'","'.$dato.'"],["npestado_codpai","4","c"]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        break;
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }


  public function executeAutocomplete()
  {
	if ($this->getRequestParameter('ajax')=='1')
	{
	 $this->tags=Herramientas::autocompleteAjax('CODPAI','Nppais','CODPAI',$this->getRequestParameter('npestado[codpai]'));
	}
  }

/**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateNpestadoFromRequest()
  {
    $npestado = $this->getRequestParameter('npestado');

    if (isset($npestado['codpai']))
    {
      $this->npestado->setCodpai(str_pad($npestado['codpai'], 4, '0', STR_PAD_LEFT));
    }
    if (isset($npestado['codedo']))
    {
      $this->npestado->setCodedo(str_pad($npestado['codedo'], 4, '0', STR_PAD_LEFT));
    }
    if (isset($npestado['nomedo']))
    {
      $this->npestado->setNomedo($npestado['nomedo']);
    }
  }

  public function obtenerId($dato1,$dato2)
  {
  	$c= new Criteria();
  	$c->add(NpestadoPeer::CODPAI,$dato1);
  	$c->add(NpestadoPeer::CODEDO,$dato2);
  	$resul= NpestadoPeer::doSelectOne($c);
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
