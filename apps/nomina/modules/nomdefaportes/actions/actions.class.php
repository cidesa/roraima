<?php

/**
 * nomdefaportes actions.
 *
 * @package    Roraima
 * @subpackage nomdefaportes
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomdefaportesActions extends autonomdefaportesActions
{

/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->nptipaportes = $this->getNptipaportesOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNptipaportesFromRequest();

      $this->saveNptipaportes($this->nptipaportes);

      $this->nptipaportes->setId(Herramientas::getX_vacio('codtipapo','nptipaportes','id',$this->nptipaportes->getCodtipapo()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefaportes/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefaportes/list');
      }
      else
      {
        return $this->redirect('nomdefaportes/edit?id='.$this->nptipaportes->getId());
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
  protected function updateNptipaportesFromRequest()
  {
    $nptipaportes = $this->getRequestParameter('nptipaportes');

    if (isset($nptipaportes['codtipapo']))
    {

      $this->nptipaportes->setCodtipapo(str_pad($nptipaportes['codtipapo'], 4, '0', STR_PAD_LEFT));
    }
    if (isset($nptipaportes['destipapo']))
    {
      $this->nptipaportes->setDestipapo($nptipaportes['destipapo']);
    }
    if (isset($nptipaportes['porret']))
    {
      $this->nptipaportes->setPorret($nptipaportes['porret']);
    }
    if (isset($nptipaportes['porapo']))
    {
      $this->nptipaportes->setPorapo($nptipaportes['porapo']);
    }
  }



}
