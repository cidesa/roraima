<?php

/**
 * fordefaccpoaivss actions.
 *
 * @package    Roraima
 * @subpackage fordefaccpoaivss
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:actions.class.php 32379 2009-09-01 16:59:06Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class fordefaccpoaivssActions extends autofordefaccpoaivssActions
{
  public function getMostrar_Unidad()
  {
  	  $c = new Criteria;
  	  $this->campo = str_pad($this->fordefaccpoa->getCodunimed(),3,' ');
  	  $c->add(FordefunimedPeer::CODUNIMED, $this->campo);
  	  $this->unidad = FordefunimedPeer::doSelect($c);
	  if ($this->unidad)
	  	return $this->unidad[0]->getDesunimed();
	  else 
	    return ' ';
  }
  function executeEdit()
  {
    $this->fordefaccpoa = $this->getFordefaccpoaOrCreate();
    $this->unimed = $this->getMostrar_Unidad();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFordefaccpoaFromRequest();

      $this->saveFordefaccpoa($this->fordefaccpoa);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('fordefaccpoaivss/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('fordefaccpoaivss/list');
      }
      else
      {
        return $this->redirect('fordefaccpoaivss/edit?id='.$this->fordefaccpoa->getId());
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
  protected function updateFordefaccpoaFromRequest()
  {
    $fordefaccpoa = $this->getRequestParameter('fordefaccpoa');

    if (isset($fordefaccpoa['codsubacc']))
    {
      $this->fordefaccpoa->setCodsubacc($fordefaccpoa['codsubacc']);
    }
    if (isset($fordefaccpoa['dessubacc']))
    {
      $this->fordefaccpoa->setDessubacc($fordefaccpoa['dessubacc']);
    }
    if (isset($fordefaccpoa['metsubacc']))
    {
      $this->fordefaccpoa->setMetsubacc($fordefaccpoa['metsubacc']);
    }
    if (isset($fordefaccpoa['codunimed']))
    {
      $this->fordefaccpoa->setCodunimed($fordefaccpoa['codunimed']);
    }
    if (isset($fordefaccpoa['metpritri']))
    {
      $this->fordefaccpoa->setMetpritri($fordefaccpoa['metpritri']);
    }
    if (isset($fordefaccpoa['metsegtri']))
    {
      $this->fordefaccpoa->setMetsegtri($fordefaccpoa['metsegtri']);
    }
    if (isset($fordefaccpoa['mettertri']))
    {
      $this->fordefaccpoa->setMettertri($fordefaccpoa['mettertri']);
    }
    if (isset($fordefaccpoa['mettot']))
    {
      $this->fordefaccpoa->setMettot($fordefaccpoa['mettot']);
    }
    if (isset($fordefaccpoa['locsubacc']))
    {
      $this->fordefaccpoa->setLocsubacc($fordefaccpoa['locsubacc']);
    }
    if (isset($fordefaccpoa['indgessubacc']))
    {
      $this->fordefaccpoa->setIndgessubacc($fordefaccpoa['indgessubacc']);
    }
    if (isset($fordefaccpoa['medversubacc']))
    {
      $this->fordefaccpoa->setMedversubacc($fordefaccpoa['medversubacc']);
    }
    if (isset($fordefaccpoa['supsubacc']))
    {
      $this->fordefaccpoa->setSupsubacc($fordefaccpoa['supsubacc']);
    }
  }
  
}
