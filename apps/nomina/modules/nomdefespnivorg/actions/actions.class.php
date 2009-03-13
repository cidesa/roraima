<?php

/**
 * nomdefespnivorg actions.
 *
 * @package    siga
 * @subpackage nomdefespnivorg
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefespnivorgActions extends autonomdefespnivorgActions
{
  public $coderror1=-1;

  public function executeEdit()
  {

   $this->npestorg = $this->getNpestorgOrCreate();
   $this->formato = Herramientas::ObtenerFormato('npdefgen','fororg');
   $this->longitud=strlen($this->formato);

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpestorgFromRequest();

      $this->saveNpestorg($this->npestorg);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefespnivorg/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefespnivorg/list');
      }
      else
      {
        return $this->redirect('nomdefespnivorg/edit?id='.$this->npestorg->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  protected function updateNpestorgFromRequest()
  {
    $npestorg = $this->getRequestParameter('npestorg');
    $this->formato = Herramientas::ObtenerFormato('npdefgen','fororg');
    $this->longitud=strlen($this->formato);

    if (isset($npestorg['codniv']))
    {
      $this->npestorg->setCodniv($npestorg['codniv']);
    }
    if (isset($npestorg['desniv']))
    {
      $this->npestorg->setDesniv($npestorg['desniv']);
    }
    if (isset($npestorg['telext']))
    {
      $this->npestorg->setTelext($npestorg['telext']);
    }
  }

  public function validateEdit()
    {
      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
        $this->npestorg = $this->getNpestorgOrCreate();
        $this->updateNpestorgFromRequest();

        $this->coderror1=Nomina::validarNomdefespnivorg($this->npestorg);
        if ($this->coderror1<>-1){
          return false;
        }else return true;

      }else return true;
    }

  public function executeDelete()
  {
    $this->npestorg = NpestorgPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->npestorg);

    $id=$this->getRequestParameter('id');
    $c=new Criteria();
    $c->add(NpuniejePeer::CODNIV,$this->npestorg->getCodniv());
    $dato=NpuniejePeer::doSelect($c);
    if (!$dato)
    {
      if (!Nomina::Buscar_CodigoHijo($this->npestorg->getCodniv()))
     {
       $this->deleteNpestorg($this->npestorg);
     }
     else
     {
     	$this->setFlash('notice','El Nivel Organizacional no puede ser eliminado, ya que posee niveles que dependen de el');
        return $this->redirect('nomdefespnivorg/edit?id='.$id);
     }
    }
    else
    {
      $this->setFlash('notice','El Nivel Organizacional no puede ser eliminado, ya que se encuentra asociado a una Unidad Ejecutora');
      return $this->redirect('nomdefespnivorg/edit?id='.$id);
    }

    return $this->redirect('nomdefespnivorg/list');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->npestorg = $this->getNpestorgOrCreate();
    $this->updateNpestorgFromRequest();

    $this->labels = $this->getLabels();

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror1!=-1)
      {
       $err = Herramientas::obtenerMensajeError($this->coderror1);
       $this->getRequest()->setError('npestorg{codniv}',$err);
      }
    }

    return sfView::SUCCESS;
  }

}
