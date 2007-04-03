<?php

/**
 * biedisactmuenew actions.
 *
 * @package    siga
 * @subpackage biedisactmuenew
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class biedisactmuenewActions extends autobiedisactmuenewActions
{
  public function CargarTipos()
	{
	$c = new Criteria();
	$lista_tip = BndisbiePeer::doSelect($c);
	
	$tipos = array();
	
	foreach($lista_tip as $obj_tip)
	{
		$tipos += array($obj_tip->getCoddis()." - ".$obj_tip->getDesdis() => $obj_tip->getCoddis()." - ".$obj_tip->getDesdis());    
	}
	return $tipos;
    }
	
  public function executeEdit()
  {
    $this->bndismue = $this->getBndismueOrCreate();
    $this->tipos = $this->CargarTipos();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateBndismueFromRequest();

      $this->saveBndismue($this->bndismue);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('biedisactmuenew/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('biedisactmuenew/list');
      }
      else
      {
        return $this->redirect('biedisactmuenew/edit?id='.$this->bndismue->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
	
  
protected function updateBndismueFromRequest()
  {
    $bndismue = $this->getRequestParameter('bndismue');

    if (isset($bndismue['codact']))
    {
      $this->bndismue->setCodact($bndismue['codact']);
    }
    if (isset($bndismue['codmue']))
    {
      $this->bndismue->setCodmue($bndismue['codmue']);
    }
    if (isset($bndismue['desmue']))
    {
      $this->bndismue->setDesmue($bndismue['desmue']);
    }
    if (isset($bndismue['nrodismue']))
    {
      $this->bndismue->setNrodismue($bndismue['nrodismue']);
    }
    if (isset($bndismue['tipdismue']))
    {
      $this->bndismue->setTipdismue($bndismue['tipdismue']);
    }
    if (isset($bndismue['codmot']))
    {
      $this->bndismue->setCodmot($bndismue['codmot']);
    }
    if (isset($bndismue['desmot']))
    {
      $this->bndismue->setDesmot($bndismue['desmot']);
    }
    if (isset($bndismue['fecdismue']))
    {
      if ($bndismue['fecdismue'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bndismue['fecdismue']))
          {
            $value = $dateFormat->format($bndismue['fecdismue'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bndismue['fecdismue'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bndismue->setFecdismue($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bndismue->setFecdismue(null);
      }
    }
    if (isset($bndismue['fecdevdis']))
    {
      if ($bndismue['fecdevdis'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bndismue['fecdevdis']))
          {
            $value = $dateFormat->format($bndismue['fecdevdis'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bndismue['fecdevdis'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bndismue->setFecdevdis($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bndismue->setFecdevdis(null);
      }
    }
    if (isset($bndismue['mondismue']))
    {
      $this->bndismue->setMondismue($bndismue['mondismue']);
    }
    if (isset($bndismue['vidutil']))
    {
      $this->bndismue->setVidutil($bndismue['vidutil']);
    }
    if (isset($bndismue['detdismue']))
    {
      $this->bndismue->setDetdismue($bndismue['detdismue']);
    }
    if (isset($bndismue['codubiori']))
    {
      $this->bndismue->setCodubiori($bndismue['codubiori']);
    }
    if (isset($bndismue['desubiori']))
    {
      $this->bndismue->setDesubiori($bndismue['desubiori']);
    }
    if (isset($bndismue['codubides']))
    {
      $this->bndismue->setCodubides($bndismue['codubides']);
    }
    if (isset($bndismue['desubides']))
    {
      $this->bndismue->setDesubides($bndismue['desubides']);
    }
    if (isset($bndismue['obsdismue']))
    {
      $this->bndismue->setObsdismue($bndismue['obsdismue']);
    }
    $this->bndismue->setStadismue('A');
    
  }
  
}
