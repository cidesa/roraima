<?php

/**
 * almtipemp actions.
 *
 * @package    siga
 * @subpackage almtipemp
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almtipempActions extends autoalmtipempActions
{
public function executeEdit()
  {
    $this->catipempsnc = $this->getCatipempsncOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCatipempsncFromRequest();

      $this->saveCatipempsnc($this->catipempsnc);

      $this->catipempsnc->setId(Herramientas::getX_vacio('codtip','catipempsnc','id',$this->catipempsnc->getCodtip()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('almtipemp/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('almtipemp/list');
      }
      else
      {
        return $this->redirect('almtipemp/edit?id='.$this->catipempsnc->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
}
