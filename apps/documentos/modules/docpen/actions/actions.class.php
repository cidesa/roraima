<?php

/**
 * docpen actions.
 *
 * @package    siga
 * @subpackage docpen
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class docpenActions extends autodocpenActions
{
  
  public function executePagerlist($info = '')
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/dfatendocdef/filters');

    // pager
    $this->pager = new sfPropelPager('Dfatendocdef', 10);
    $c = new Criteria();
    $c->add(DfatendocdefPeer::ID,$info);
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }
  
  public function executeEdit()
  {
    $this->dfatendoc = $this->getDfatendocOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateDfatendocFromRequest();

      $this->saveDfatendoc($this->dfatendoc);

      $this->executePagerlist($this->dfatendoc->getId());
      
      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('docpen/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('docpen/list');
      }
      else
      {
        return $this->redirect('docpen/edit?id='.$this->dfatendoc->getId());
      }
    }
    else
    {
      $this->executePagerlist($this->dfatendoc->getId());
      $this->labels = $this->getLabels();
    }
  }
  
  protected function updateDfatendocFromRequest()
  {
    $dfatendoc = $this->getRequestParameter('dfatendoc');

    if (isset($dfatendoc['coddoc']))
    {
      $this->dfatendoc->setCoddoc($dfatendoc['coddoc']);
    }
    if (isset($dfatendoc['obsdoc']))
    {
      $this->dfatendoc->setObsdoc($dfatendoc['obsdoc']);
    }
    if (isset($dfatendoc['staate']))
    {
      $this->dfatendoc->setStaate($dfatendoc['staate']);
    }
    if (isset($dfatendoc['anuate']))
    {
      $this->dfatendoc->setAnuate($dfatendoc['anuate']);
    }
    if (isset($dfatendoc['estado']))
    {
      $this->dfatendoc->setEstado($dfatendoc['estado']);
    }
    if (isset($dfatendoc['id_dftabtip']))
    {
    $this->dfatendoc->setIdDftabtip($dfatendoc['id_dftabtip'] ? $dfatendoc['id_dftabtip'] : null);
    }
  }
  
  protected function getDfatendocOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $dfatendoc = new Dfatendoc();
    }
    else
    {
      $dfatendoc = DfatendocPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($dfatendoc);
    }

    return $dfatendoc;
  }
  
  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->dfatendoc = $this->getDfatendocOrCreate();
    $this->updateDfatendocFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }
  
  public function executeDelete()
  {
    $this->dfatendoc = DfatendocPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->dfatendoc);

    /*
    try
    {
      $this->deleteDfatendoc($this->dfatendoc);
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Dfatendoc. Make sure it does not have any associated items.');
      return $this->forward('docpen', 'list');
    }
	*/

    return $this->redirect('docpen/list');
  }
  
	
}
