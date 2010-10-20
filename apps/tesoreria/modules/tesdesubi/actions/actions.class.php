<?php

/**
 * tesdesubi actions.
 *
 * @package    Roraima
 * @subpackage tesdesubi
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 41077 2010-10-20 17:59:18Z cramirez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class tesdesubiActions extends autotesdesubiActions
{
  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->bnubica = $this->getBnubicaOrCreate();
    $this->setVars();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateBnubicaFromRequest();

      $this->saveBnubica($this->bnubica);

      $this->bnubica->setId(Herramientas::getX_vacio('codubi','bnubica','id',$this->bnubica->getCodubi()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('tesdesubi/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('tesdesubi/list');
      }
      else
      {
        return $this->redirect('tesdesubi/edit?id='.$this->bnubica->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  /**
   * Actualiza la informacion que viene de la vista
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateBnubicaFromRequest()
  {
    $bnubica = $this->getRequestParameter('bnubica');
    $this->setVars();

    if (isset($bnubica['codubi']))
    {
      $this->bnubica->setCodubi($bnubica['codubi']);
    }
    if (isset($bnubica['desubi']))
    {
      $this->bnubica->setDesubi($bnubica['desubi']);
    }
    if (isset($bnubica['nomemp']))
    {
      $this->bnubica->setNomemp($bnubica['nomemp']);
    }
    if (isset($bnubica['nomcar']))
    {
      $this->bnubica->setNomcar($bnubica['nomcar']);
    }

      $this->bnubica->setStacod('A');

  }

  public function setVars()
  {
   $this->mascaraubi = Herramientas::ObtenerFormato('Opdefemp','Forubi');
   $this->lonubi=strlen($this->mascaraubi);
   $respon = H::getConfApp('respon', 'tesoreria', 'tesdesubi');
   $this->getUser()->setAttribute('respon',$respon,'tesdesubi');
  }

    public function executeDelete()
  {
    $this->bnubica = BnubicaPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->bnubica);

    try
    {
      $c= new Criteria();
      $c->add(OpordpagPeer::CODUNI,$this->bnubica->getCodubi());
      $reg= OpordpagPeer::doSelectOne($c);
      if (!$reg){
      $this->deleteBnubica($this->bnubica);
      $this->Bitacora('Elimino');
      }else {
      	$this->getRequest()->setError('delete', 'No se pudo borrar la registro seleccionado. Asegúrese de que no tiene ningún tipo de registros asociados.');
        return $this->forward('tesdesubi', 'list');
      }
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'No se pudo borrar la registro seleccionado. Asegúrese de que no tiene ningún tipo de registros asociados.');
      return $this->forward('tesdesubi', 'list');
    }

    return $this->redirect('tesdesubi/list');
  }

}


