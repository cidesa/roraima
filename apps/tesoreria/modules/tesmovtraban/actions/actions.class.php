<?php

/**
 * tesmovtraban actions.
 *
 * @package    siga
 * @subpackage tesmovtraban
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class tesmovtrabanActions extends autotesmovtrabanActions
{
  public function getNomcueori()
  {
  	  $c = new Criteria;
  	  $c->add(TsdefbanPeer::NUMCUE,str_pad($this->tsmovtra->getCtaori(),20,' '));
  	  $this->misdatos = TsdefbanPeer::doSelect($c);
  	  if ($this->misdatos)
	  	return $this->misdatos[0]->getNomcue();
	  	else return ' ';	
  }
  
  public function getNomcuedes()
  {
  	  $c = new Criteria;
  	  $c->add(TsdefbanPeer::NUMCUE,str_pad($this->tsmovtra->getCtades(),20,' '));
  	  $this->misdatos = TsdefbanPeer::doSelect($c);
  	  if ($this->misdatos)
	  	return $this->misdatos[0]->getNomcue();
	  	else return ' ';	
  }
  
   public function executeEdit()
  {
    $this->tsmovtra = $this->getTsmovtraOrCreate();
    $this->nomcueori = $this->getNomcueori();
    $this->nomcuedes = $this->getNomcuedes();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateTsmovtraFromRequest();

      $this->saveTsmovtra($this->tsmovtra);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('tesmovtraban/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('tesmovtraban/list');
      }
      else
      {
        return $this->redirect('tesmovtraban/edit?id='.$this->tsmovtra->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
  
	protected function updateTsmovtraFromRequest()
  {
    $tsmovtra = $this->getRequestParameter('tsmovtra');

    if (isset($tsmovtra['reftra']))
    {
      $this->tsmovtra->setReftra($tsmovtra['reftra']);
    }
    if (isset($tsmovtra['fectra']))
    {
      if ($tsmovtra['fectra'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($tsmovtra['fectra']))
          {
            $value = $dateFormat->format($tsmovtra['fectra'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $tsmovtra['fectra'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->tsmovtra->setFectra($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->tsmovtra->setFectra(null);
      }
    }
    if (isset($tsmovtra['destra']))
    {
      $this->tsmovtra->setDestra($tsmovtra['destra']);
    }
    if (isset($tsmovtra['ctaori']))
    {
      $this->tsmovtra->setCtaori($tsmovtra['ctaori']);
    }
    if (isset($tsmovtra['ctades']))
    {
      $this->tsmovtra->setCtades($tsmovtra['ctades']);
    }
    if (isset($tsmovtra['montra']))
    {
      $this->tsmovtra->setMontra($tsmovtra['montra']);
    }
    if (isset($tsmovtra['numcom']))
    {
      $this->tsmovtra->setNumcom($tsmovtra['numcom']);
    }
    
    $this->tsmovtra->setStatus('A');
        
    if (isset($tsmovtra['fecing']))
    {
      if ($tsmovtra['fecing'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($tsmovtra['fecing']))
          {
            $value = $dateFormat->format($tsmovtra['fecing'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $tsmovtra['fecing'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->tsmovtra->setFecing($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->tsmovtra->setFecing(null);
      }
    }
    if (isset($tsmovtra['fecanu']))
    {
      if ($tsmovtra['fecanu'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($tsmovtra['fecanu']))
          {
            $value = $dateFormat->format($tsmovtra['fecanu'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $tsmovtra['fecanu'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->tsmovtra->setFecanu($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->tsmovtra->setFecanu(null);
      }
    }
  }	
}
