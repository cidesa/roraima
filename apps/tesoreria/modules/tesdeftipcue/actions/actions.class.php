<?php

/**
 * tesdeftipcue actions.
 *
 * @package    Roraima
 * @subpackage tesdeftipcue
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class tesdeftipcueActions extends autotesdeftipcueActions
{
    /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
    $this->tstipcue = TstipcuePeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->tstipcue);
    $id=$this->getRequestParameter('id');
    $c= new Criteria();
    $c->add(TsdefbanPeer::TIPCUE,$this->tstipcue->getCodtip());
    $dato=TsdefbanPeer::doSelect($c);
    if (!$dato)
    { $this->deleteTstipcue($this->tstipcue);}
    else {

        $this->setFlash('notice','El tipo de Cuenta no puede ser eliminado, porque esta asociado a un banco');
      return $this->redirect('tesdeftipcue/edit?id='.$id);
    }
    $this->Bitacora('Elimino');
    return $this->redirect('tesdeftipcue/list');
  }


  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->tstipcue = $this->getTstipcueOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateTstipcueFromRequest();

      $this->saveTstipcue($this->tstipcue);

       $this->tstipcue->setId(Herramientas::getX_vacio('codtip','tstipcue','id',$this->tstipcue->getCodtip()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('tesdeftipcue/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('tesdeftipcue/list');
      }
      else
      {
        return $this->redirect('tesdeftipcue/edit?id='.$this->tstipcue->getId());
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
  protected function updateTstipcueFromRequest()
  {
    $tstipcue = $this->getRequestParameter('tstipcue');

    if (isset($tstipcue['codtip']))
    {
      $this->tstipcue->setCodtip($tstipcue['codtip']);
    }
    if (isset($tstipcue['destip']))
    {
      $this->tstipcue->setDestip($tstipcue['destip']);
    }
  }
}
