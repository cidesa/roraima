<?php

/**
 * nomdefesppai actions.
 *
 * @package    Roraima
 * @subpackage nomdefesppai
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomdefesppaiActions extends autonomdefesppaiActions
{
	 /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
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

  /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
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

   /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
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
