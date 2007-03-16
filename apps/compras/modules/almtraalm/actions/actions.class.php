<?php

/**
 * almtraalm actions.
 *
 * @package    siga
 * @subpackage almtraalm
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almtraalmActions extends autoalmtraalmActions
{
  public function getAlm_origen()
  {
  	  $c = new Criteria;
  	  $this->campo = $this->catraalm->getAlmori();
  	  $c->add(CadefalmPeer::CODALM, $this->campo);
  	  $this->nomalm = CadefalmPeer::doSelect($c);
	  if ($this->nomalm)
	  	return $this->nomalm[0]->getNomalm();
	  else 
	    return '<!Registro no Encontrado o vacio!> ';
  }
  public function getAlm_destino()
  {
  	  $c = new Criteria;
  	  $this->campo = $this->catraalm->getAlmdes();
  	  $c->add(CadefalmPeer::CODALM, $this->campo);
  	  $this->nomalm_des = CadefalmPeer::doSelect($c);
	  if ($this->nomalm_des)
	  	return $this->nomalm_des[0]->getNomalm();
	  else 
	    return '<!Registro no Encontrado o vacio!> ';
  }
  
  
  public function executeEdit()
  {
    $this->catraalm = $this->getCatraalmOrCreate();
    $this->nom_alm_ori = $this->getAlm_origen();
    $this->nom_alm_des = $this->getAlm_destino();    

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCatraalmFromRequest();

      $this->saveCatraalm($this->catraalm);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('almtraalm/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('almtraalm/list');
      }
      else
      {
        return $this->redirect('almtraalm/edit?id='.$this->catraalm->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }  

  protected function updateCatraalmFromRequest()
  {
    $catraalm = $this->getRequestParameter('catraalm');

    if (isset($catraalm['codtra']))
    {
      $this->catraalm->setCodtra($catraalm['codtra']);
    }
    if (isset($catraalm['fectra']))
    {
      if ($catraalm['fectra'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($catraalm['fectra']))
          {
            $value = $dateFormat->format($catraalm['fectra'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $catraalm['fectra'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->catraalm->setFectra($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->catraalm->setFectra(null);
      }
    }
    if (isset($catraalm['destra']))
    {
      $this->catraalm->setDestra($catraalm['destra']);
    }
    if (isset($catraalm['almori']))
    {
      $this->catraalm->setAlmori($catraalm['almori']);
    }
    if (isset($catraalm['almdes']))
    {
      $this->catraalm->setAlmdes($catraalm['almdes']);
    }
  }
}
