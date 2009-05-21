<?php

/**
 * nomdefesppai actions.
 *
 * @package    siga
 * @subpackage nomdefesppai
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefesppaiActions extends autonomdefesppaiActions
{
	 protected function updateNppaisFromRequest()
  {
    $nppais = $this->getRequestParameter('nppais');

    if (isset($nppais['codpai']))
    {
      $this->nppais->setCodpai(str_pad($nppais['codpai'],4,'0',STR_PAD_LEFT));
    }
    if (isset($nppais['nompai']))
    {
      $this->nppais->setNompai($nppais['nompai']);
    }
  }

  public function executeDelete()
  {
    $this->nppais = NppaisPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->nppais);

    $id=$this->getRequestParameter('id');
    $c=new Criteria();
    $c->add(NpestadoPeer::CODPAI,$this->nppais->getCodpai());
    $dato=NpestadoPeer::doSelect($c);
    if (!$dato)
    {
      $this->deleteNppais($this->nppais);
      $this->Bitacora('Elimino');
    }
    else
    {
      $this->setFlash('notice','El Pais no puede ser eliminado, ya que se encuentra asociado a un Estado');
      return $this->redirect('nomdefesppai/edit?id='.$id);
    }
    return $this->redirect('nomdefesppai/list');
  }

   public function executeEdit()
  {
    $this->nppais = $this->getNppaisOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNppaisFromRequest();

      $this->saveNppais($this->nppais);

      $this->nppais->setId(Herramientas::getX_vacio('codpai','nppais','id',$this->nppais->getCodpai()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefesppai/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefesppai/list');
      }
      else
      {
        return $this->redirect('nomdefesppai/edit?id='.$this->nppais->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
}
