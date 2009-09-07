<?php

/**
 * tesdesubi actions.
 *
 * @package    Roraima
 * @subpackage tesdesubi
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
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

      $this->bnubica->setStacod('A');

  }

  public function setVars()
  {
   $this->mascaraubi = Herramientas::ObtenerFormato('Opdefemp','Forubi');
   $this->lonubi=strlen($this->mascaraubi);
  }
}


