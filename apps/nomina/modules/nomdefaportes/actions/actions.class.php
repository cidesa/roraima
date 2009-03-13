<?php

/**
 * nomdefaportes actions.
 *
 * @package    siga
 * @subpackage nomdefaportes
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefaportesActions extends autonomdefaportesActions
{

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
