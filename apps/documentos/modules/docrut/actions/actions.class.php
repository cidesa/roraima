<?php

/**
 * docrut actions.
 *
 * @package    siga
 * @subpackage docrut
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class docrutActions extends autodocrutActions
{
  
  private function getTipdocs(){
    
    $c = new Criteria();
    $reg = DftabtipPeer::doSelect($c);
    $docs = array();

    if(count($reg)>0){
      
      for($i=0;$i<count($reg);$i++){
        $docs[$reg[0]->getTipdoc()] = $reg[0]->getTipdoc();
      }
      return $docs; 
      
    }else return array();
        
    
  }
  
  
  public function executeEdit()
  {
    $this->dfrutadoc = $this->getDfrutadocOrCreate();
    
    $this->listado = array('1' => '1','2' => '2','3' => '3','4' => '4','5' => '5','6' => '6','7' => '7','8' => '8','9' => '9','10' => '10');
    $this->docs = $this->getTipdocs();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateDfrutadocFromRequest();

      $this->saveDfrutadoc($this->dfrutadoc);
      
      $this->executePagerlist();

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('docrut/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('docrut/list');
      }
      else
      {
        return $this->redirect('docrut/edit?id='.$this->dfrutadoc->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
      $this->executePagerlist($this->dfrutadoc->getTipdoc());
    }
  }
  
  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->dfrutadoc = $this->getDfrutadocOrCreate();
    $this->updateDfrutadocFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }
  
  protected function updateDfrutadocFromRequest()
  {
    $dfrutadoc = $this->getRequestParameter('dfrutadoc');

    if (isset($dfrutadoc['id_acunidad']))
    {
    $this->dfrutadoc->setIdAcunidad($dfrutadoc['id_acunidad'] ? $dfrutadoc['id_acunidad'] : null);
    }
    if (isset($dfrutadoc['tipdoc']))
    {
      $this->dfrutadoc->setTipdoc($dfrutadoc['tipdoc']);
    }
    if (isset($dfrutadoc['rutdoc']))
    {
      $this->dfrutadoc->setRutdoc($dfrutadoc['rutdoc']);
    }
    if (isset($dfrutadoc['diadoc']))
    {
      $this->dfrutadoc->setDiadoc($dfrutadoc['diadoc']);
    }
  }
  
  public function executePagerlist($tipdoc = '')
  {
    $this->processSort();

    $this->processFilters();

    // pager
    $this->pager = new sfPropelPager('Dfrutadoc', 20);
    $c = new Criteria();
    $c->add(DfrutadocPeer::TIPDOC,$tipdoc);
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }
  
  protected function getDfrutadocOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $dfrutadoc = new Dfrutadoc();
    }
    else
    {
      $dfrutadoc = DfrutadocPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($dfrutadoc);
    }

    return $dfrutadoc;
  }
  
  
    public function executeAjax()
  {
    if ($this->getRequestParameter('par')=='1')
	{
	  $this->dfrutadoc = $this->getDfrutadocOrCreate();
	  $this->updateDfrutadocFromRequest();
      $this->executePagerlist($this->getRequestParameter('campo',''));      
      $this->labels = $this->getLabels();
	} 
  }	
  
  public function executePagerdelete()
  {
    $this->dfrutadoc = DfrutadocPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->dfrutadoc);

    try
    {
      $this->deleteDfrutadoc($this->dfrutadoc);
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Dfrutadoc. Make sure it does not have any associated items.');
      return $this->forward('docrut', 'edit');
    }

    return $this->redirect('docrut/edit');
  }
  
}
