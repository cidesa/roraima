<?php

/**
 * biedisactinm actions.
 *
 * @package    siga
 * @subpackage biedisactinm
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class biedisactinmActions extends autobiedisactinmActions
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
    $this->bndisinm = $this->getBndisinmOrCreate();
    $this->tipos = $this->CargarTipos();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateBndisinmFromRequest();

      $this->saveBndisinm($this->bndisinm);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('biedisactinm/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('biedisactinm/list');
      }
      else
      {
        return $this->redirect('biedisactinm/edit?id='.$this->bndisinm->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
  
  protected function updateBndisinmFromRequest()
  {
    $bndisinm = $this->getRequestParameter('bndisinm');

    if (isset($bndisinm['codact']))
    {
      $this->bndisinm->setCodact($bndisinm['codact']);
    }
    if (isset($bndisinm['codmue']))
    {
      $this->bndisinm->setCodmue($bndisinm['codmue']);
    }
    if (isset($bndisinm['desinm']))
    {
      $this->bndisinm->setDesinm($bndisinm['desinm']);
    }
    if (isset($bndisinm['nrodisinm']))
    {
      $this->bndisinm->setNrodisinm($bndisinm['nrodisinm']);
    }
    if (isset($bndisinm['tipdisinm']))
    {
      $this->bndisinm->setTipdisinm($bndisinm['tipdisinm']);
    }
    if (isset($bndisinm['motdisinm']))
    {
      $this->bndisinm->setMotdisinm($bndisinm['motdisinm']);
    }
    if (isset($bndisinm['fecdisinm']))
    {
      if ($bndisinm['fecdisinm'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bndisinm['fecdisinm']))
          {
            $value = $dateFormat->format($bndisinm['fecdisinm'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bndisinm['fecdisinm'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bndisinm->setFecdisinm($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bndisinm->setFecdisinm(null);
      }
    }
    if (isset($bndisinm['fecdevdis']))
    {
      if ($bndisinm['fecdevdis'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bndisinm['fecdevdis']))
          {
            $value = $dateFormat->format($bndisinm['fecdevdis'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bndisinm['fecdevdis'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bndisinm->setFecdevdis($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bndisinm->setFecdevdis(null);
      }
    }
    if (isset($bndisinm['mondisinm']))
    {
      $this->bndisinm->setMondisinm($bndisinm['mondisinm']);
    }
    if (isset($bndisinm['detdisinm']))
    {
      $this->bndisinm->setDetdisinm($bndisinm['detdisinm']);
    }
    if (isset($bndisinm['codubiori']))
    {
      $this->bndisinm->setCodubiori($bndisinm['codubiori']);
    }
    if (isset($bndisinm['desubiori']))
    {
      $this->bndisinm->setDesubiori($bndisinm['desubiori']);
    }
    if (isset($bndisinm['codubides']))
    {
      $this->bndisinm->setCodubides($bndisinm['codubides']);
    }
    if (isset($bndisinm['desubides']))
    {
      $this->bndisinm->setDesubides($bndisinm['desubides']);
    }
    if (isset($bndisinm['obsdisinm']))
    {
      $this->bndisinm->setObsdisinm($bndisinm['obsdisinm']);
    }
    
      $this->bndisinm->setStadisinm('A');
    
  }
}
