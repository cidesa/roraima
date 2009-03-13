<?php

/**
 * fordefunimed actions.
 *
 * @package    siga
 * @subpackage fordefunimed
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class fordefunimedActions extends autofordefunimedActions
{
  public function executeEdit()
  {
    $this->fordefunimed = $this->getFordefunimedOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFordefunimedFromRequest();

      $this->saveFordefunimed($this->fordefunimed);
      
       $this->fordefunimed->setId(Herramientas::getX_vacio('codunimed','fordefunimed','id',$this->fordefunimed->getCodunimed()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('fordefunimed/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('fordefunimed/list');
      }
      else
      {
        return $this->redirect('fordefunimed/edit?id='.$this->fordefunimed->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
	
  protected function getLabels()
  {
    return array(
      'fordefunimed{codunimed}' => 'Código',
      'fordefunimed{desunimed}' => 'Descripción',
      'fordefunimed{nomabrunimed}' => 'Nombre Abreviado',
    );
  }	
}
