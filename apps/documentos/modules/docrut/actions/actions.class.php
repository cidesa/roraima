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

  public function executeEdit()
  {
    $this->dfrutadoc = $this->getDfrutadocOrCreate();

    $this->listado = array('1' => '1','2' => '2','3' => '3','4' => '4','5' => '5','6' => '6','7' => '7','8' => '8','9' => '9','10' => '10');

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateDfrutadocFromRequest();

      $this->saveDfrutadoc($this->dfrutadoc);

      $this->executePagerlist();

      $this->setFlash('pager', $this->pager);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

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
      //$this->CargarPagerList($this->dfrutadoc->getIdDftabtip());
      $this->executePagerlist($this->dfrutadoc->getIdDftabtip());
      $this->setFlash('pager', $this->pager);
      $this->labels = $this->getLabels();
    }
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->dfrutadoc = $this->getDfrutadocOrCreate();
    $this->updateDfrutadocFromRequest();

    $this->listado = array('1' => '1','2' => '2','3' => '3','4' => '4','5' => '5','6' => '6','7' => '7','8' => '8','9' => '9','10' => '10');

    $this->executePagerlist($this->dfrutadoc->getIdDftabtip());

    //$this->executePagerlist();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  public function CargarPagerList($tipdoc)
  {
    // pager
    $this->pager = new sfPropelPager('Dfrutadoc', 20);
    $c = new Criteria();
    //print 'tipdoc='.$tipdoc;
    $c->add(DfrutadocPeer::ID_DFTABTIP,$tipdoc);
    $c->addAscendingOrderByColumn(DfrutadocPeer::RUTDOC);
    //$this->addSortCriteria($c);
    //$this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  public function executePagerlist($tipdoc = '')
  {
    $this->CargarPagerList($tipdoc);
  }

  protected function getDfrutadocOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $dfrutadoc = new Dfrutadoc();
    }
    else
    {
      $c = new Criteria();
      $c->add(DfrutadocPeer::ID_DFTABTIP,$this->getRequestParameter($id));
      $c->addAscendingOrderByColumn(DfrutadocPeer::DIADOC);
      $dfrutadoc = DfrutadocPeer::doSelectOne($c);
      //print 'id='.$this->getRequestParameter($id).'=tipdoc='.$dfrutadoc->getTipDoc();

      $this->forward404Unless($dfrutadoc);
    }

    return $dfrutadoc;
  }


  public function executeAjax()
  {
    if ($this->getRequestParameter('par')=='1')
  {
    //$this->dfrutadoc = $this->getDfrutadocOrCreate();
    //$this->updateDfrutadocFromRequest();
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

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    // pager
    $this->pager = new sfPropelPager('Dfrutadoc', 10);
    $c = new Criteria();

    $c->addSelectColumn("0 AS RUTDOC");
    $c->addSelectColumn("' ' AS DESUNI");
    $c->addSelectColumn("' ' AS DESRUT");
    $c->addSelectColumn("0 AS DIADOC");
    $c->addSelectColumn("0 AS ID_ACUNIDAD");
    $c->addSelectColumn(DfrutadocPeer::ID_DFTABTIP);
    $c->addSelectColumn(DfrutadocPeer::ID_DFTABTIP." AS ID");

    $c->addGroupByColumn(DfrutadocPeer::ID_DFTABTIP);
    //$c->addGroupByColumn(DfrutadocPeer::ID);
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }



}
