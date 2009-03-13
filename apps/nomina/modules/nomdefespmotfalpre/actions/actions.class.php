<?php

/**
 * nomdefespmotfalpre actions.
 *
 * @package    siga
 * @subpackage nomdefespmotfalpre
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefespmotfalpreActions extends autonomdefespmotfalpreActions
{
public function executeEdit()
  {
    $this->npmotfal = $this->getNpmotfalOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpmotfalFromRequest();

      $this->saveNpmotfal($this->npmotfal);

      $this->npmotfal->setId(Herramientas::getX_vacio('codmotfal','npmotfal','id',$this->npmotfal->getCodmotfal()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefespmotfalpre/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefespmotfalpre/list');
      }
      else
      {
        return $this->redirect('nomdefespmotfalpre/edit?id='.$this->npmotfal->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeDelete()
  {
    $this->npmotfal = NpmotfalPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->npmotfal);

    $id=$this->getRequestParameter('id');
    $c=new Criteria();
    $c->add(NpfalperPeer::CODMOT,$this->npmotfal->getCodmotfal());
    $dato=NpfalperPeer::doSelect($c);
    if (!$dato)
    {
      $this->deleteNpmotfal($this->npmotfal);
    }
    else
    {
     $this->setFlash('notice','El Motivo no puede ser eliminado, ya que se encuentra asociado a un permiso');
     return $this->redirect('nomdefespmotfalpre/edit?id='.$id);
    }

    return $this->redirect('nomdefespmotfalpre/list');
  }

}
