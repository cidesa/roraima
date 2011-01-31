<?php

/**
 * nomdefespmotfalpre actions.
 *
 * @package    Roraima
 * @subpackage nomdefespmotfalpre
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomdefespmotfalpreActions extends autonomdefespmotfalpreActions
{
/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
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

  /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
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
      $this->Bitacora('Elimino');
    }
    else
    {
     $this->setFlash('notice','El Motivo no puede ser eliminado, ya que se encuentra asociado a un permiso');
     return $this->redirect('nomdefespmotfalpre/edit?id='.$id);
    }

    return $this->redirect('nomdefespmotfalpre/list');
  }

}
