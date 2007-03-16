<?php

/**
 * tesmovsegbanant actions.
 *
 * @package    siga
 * @subpackage tesmovsegbanant
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class tesmovsegbanantActions extends autotesmovsegbanantActions
{
  public function getNomcue()
  {
  	  $c = new Criteria;
  	  $c->add(TsdefbanPeer::NUMCUE,str_pad($this->tsmovban->getNumcue(),20,' '));
  	  $this->misdatos = TsdefbanPeer::doSelect($c);
  	  if ($this->misdatos)
	  	return $this->misdatos[0]->getNomcue();
	  	else return ' ';	
  }
  public function getNomTipMov()
  {
  	  $c = new Criteria;
  	  $c->add(TstipmovPeer::CODTIP,str_pad($this->tsmovban->getTipmov(),4,' '));
  	  $this->misdatos = TstipmovPeer::doSelect($c);
  	  if ($this->misdatos)
	  	return $this->misdatos[0]->getDestip();
	  	else return ' ';	
  }
  public function executeEdit()
  {
    $this->tsmovban = $this->getTsmovbanOrCreate();
    $this->nomcue = $this->getNomcue();
    $this->nomtipmov = $this->getNomTipMov();
    
    
    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateTsmovbanFromRequest();

      $this->saveTsmovban($this->tsmovban);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('tesmovsegbanant/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('tesmovsegbanant/list');
      }
      else
      {
        return $this->redirect('tesmovsegbanant/edit?id='.$this->tsmovban->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
  
	protected function updateTsmovbanFromRequest()
  {
    $tsmovban = $this->getRequestParameter('tsmovban');

    if (isset($tsmovban['numcue']))
    {
      $this->tsmovban->setNumcue($tsmovban['numcue']);
    }
    if (isset($tsmovban['codcta']))
    {
      $this->tsmovban->setCodcta($tsmovban['codcta']);
    }
    if (isset($tsmovban['refban']))
    {
      $this->tsmovban->setRefban($tsmovban['refban']);
    }
    if (isset($tsmovban['fecban']))
    {
      if ($tsmovban['fecban'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($tsmovban['fecban']))
          {
            $value = $dateFormat->format($tsmovban['fecban'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $tsmovban['fecban'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->tsmovban->setFecban($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->tsmovban->setFecban(null);
      }
    }
    if (isset($tsmovban['tipmov']))
    {
      $this->tsmovban->setTipmov($tsmovban['tipmov']);
    }
    if (isset($tsmovban['desban']))
    {
      $this->tsmovban->setDesban($tsmovban['desban']);
    }
    if (isset($tsmovban['monmov']))
    {
      $this->tsmovban->setMonmov($tsmovban['monmov']);
    }

      $this->tsmovban->setStatus('C');

      $this->tsmovban->setStacon('N');

    if (isset($tsmovban['transito']))
    {
      $this->tsmovban->setTransito($tsmovban['transito']);
    }
    if (isset($tsmovban['stacon1']))
    {
      $this->tsmovban->setStacon1($tsmovban['stacon1']);
    }
  }
	
}
