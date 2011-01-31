<?php

/**
 * pagretcon actions.
 *
 * @package    Roraima
 * @subpackage pagretcon
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class pagretconActions extends autopagretconActions
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
    if(($this->getRequest()->getMethod() == sfRequest::POST) && ($this->getRequestParameter('id')==""))
    {
      $this->opretcon = $this->getOpretconOrCreate();
      $this->updateOpretconFromRequest();

      $c= new Criteria();
      $c->add(OpretconPeer::CODNOM,$this->opretcon->getCodnom());
      $c->add(OpretconPeer::CODCON,$this->opretcon->getCodcon());
      //$c->add(OpretconPeer::CODTIP,$this->opretcon->getCodtip());
      $resul= OpretconPeer::doSelectOne($c);
      if ($resul)
      {	$this->coderror1=509;}
      else { $this->coderror1=-1;}

      if ($this->coderror1<>-1)
      {return false; }
      else return true;
    }else return true;
  }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->opretcon = $this->getOpretconOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateOpretconFromRequest();

      $this->saveOpretcon($this->opretcon);

      $this->opretcon->setId(self::obtenerId($this->opretcon->getCodnom(),$this->opretcon->getCodcon(),$this->opretcon->getCodtip()));

      $this->setFlash('notice', 'Your modifications have been saved');
      $this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('pagretcon/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('pagretcon/list');
      }
      else
      {
        return $this->redirect('pagretcon/edit?id='.$this->opretcon->getId());
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
    $this->opretcon = $this->getOpretconOrCreate();
    $this->updateOpretconFromRequest();

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
      $dato=NpdefcptPeer::getDescon($this->getRequestParameter('codigo'));
      $c= new Criteria();
      $c->add(NpasiconnomPeer::CODNOM,$this->getRequestParameter('nomina'));
      $c->add(NpasiconnomPeer::CODCON,$this->getRequestParameter('codigo'));
      $resul= NpasiconnomPeer::doSelect($c);
      if (!$resul)
      {	$dato2='N';}
      else{ $dato2='';}
      $output = '[["'.$cajtexmos.'","'.$dato.'",""], ["pertenece","'.$dato2.'",""]]';
    }
    else if ($this->getRequestParameter('ajax')=='2')
    {
      $dato=OptipretPeer::getRetencion($this->getRequestParameter('codigo'));
      $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
    }
    else if ($this->getRequestParameter('ajax')=='3')
    {
      $dato=NpnominaPeer::getDesnom($this->getRequestParameter('codigo'));
      $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
    }
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
  }

  public function obtenerId($dato1,$dato2,$dato3)
  {
  	$c= new Criteria();
  	$c->add(OpretconPeer::CODNOM,$dato1);
    $c->add(OpretconPeer::CODCON,$dato2);
    $c->add(OpretconPeer::CODTIP,$dato3);
  	$resul= OpretconPeer::doSelectOne($c);
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
