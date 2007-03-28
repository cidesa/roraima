<?php

/**
 * fordefsubsubobj actions.
 *
 * @package    siga
 * @subpackage fordefsubsubobj
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class fordefsubsubobjActions extends autofordefsubsubobjActions
{
  public function CargarEquilibrio()
	{
	$c = new Criteria();
	$lista_equ = FordefequPeer::doSelect($c);
	
	$equilibrio = array();
	
	foreach($lista_equ as $obj_equ)
	{
		$equilibrio += array($obj_equ->getCodequ() => $obj_equ->getdesequ());    
	}
	return $equilibrio;
    } 
    
  public function CargarSubOjetivo()
	{
	$c = new Criteria();
	$lista_Sub = FordefsubobjPeer::doSelect($c);
	
	$Subobjetivo = array();
	
	foreach($lista_Sub as $obj_Sub)
	{
		$Subobjetivo += array($obj_Sub->getCodsubobj() => $obj_Sub->getdessubobj());    
	}
	return $Subobjetivo;
    } 
	
	
  public function executeEdit()
  {
    $this->fordefsubsubobj = $this->getFordefsubsubobjOrCreate();
    $this->equilibrio = $this->CargarEquilibrio();
    $this->Subobjetivo = $this->CargarSubOjetivo();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFordefsubsubobjFromRequest();

      $this->saveFordefsubsubobj($this->fordefsubsubobj);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('fordefsubsubobj/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('fordefsubsubobj/list');
      }
      else
      {
        return $this->redirect('fordefsubsubobj/edit?id='.$this->fordefsubsubobj->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
  
  protected function updateFordefsubsubobjFromRequest()
  {
    $fordefsubsubobj = $this->getRequestParameter('fordefsubsubobj');

    if (isset($fordefsubsubobj['codequ']))
    {
      $this->fordefsubsubobj->setCodequ($fordefsubsubobj['codequ']);
    }
    if (isset($fordefsubsubobj['codsubobj']))
    {
      $this->fordefsubsubobj->setCodsubobj($fordefsubsubobj['codsubobj']);
    }
    if (isset($fordefsubsubobj['codsubsubobj']))
    {
      $this->fordefsubsubobj->setCodsubsubobj($fordefsubsubobj['codsubsubobj']);
    }
    if (isset($fordefsubsubobj['dessubsubobj']))
    {
      $this->fordefsubsubobj->setDessubsubobj($fordefsubsubobj['dessubsubobj']);
    }
  }
  
}
