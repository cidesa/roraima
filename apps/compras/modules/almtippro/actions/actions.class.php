<?php

/**
 * almtippro actions.
 *
 * @package    siga
 * @subpackage almtippro
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almtipproActions extends autoalmtipproActions
{
  public function executeEdit()
  {
    $this->catippro = $this->getCatipproOrCreate();
    $this->setVars();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCatipproFromRequest();

      $this->saveCatippro($this->catippro);

   // $this->catippro->setId(Herramientas::getX_vacio('codpro','catippro','id',$this->catippro->getCodpro()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('almtippro/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('almtippro/list');
      }
      else
      {
        return $this->redirect('almtippro/edit?id='.$this->catippro->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }


public function executeAjax()
  {
   $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');
     if ($this->getRequestParameter('ajax')=='1')
      {
        $dato=ContabbPeer::getDescta($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
      }

        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
  }

  public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='1')
      {
       $this->tags=Herramientas::autocompleteAjax('CODCTA','Contabb','codcta',trim($this->getRequestParameter('catippro[ctaord]')));
      }
    else  if ($this->getRequestParameter('ajax')=='2')
      {
       $this->tags=Herramientas::autocompleteAjax('CODCTA','Contabb','codcta',trim($this->getRequestParameter('catippro[ctaper]')));
      }
  }

  protected function saveCatippro($catippro)
  {
    $catippro->save();
  }


  public function setVars()
  {
    $this->mascara = Herramientas::ObtenerFormato('Contaba','Forcta');
    $this->loncta=strlen($this->mascara);
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->catippro = $this->getCatipproOrCreate();
    $this->updateCatipproFromRequest();
    $this->setVars();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }


}
