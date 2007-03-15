<?php

/**
 * tesdefcueban actions.
 *
 * @package    siga
 * @subpackage tesdefcueban
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class tesdefcuebanActions extends autotesdefcuebanActions
{
  public function getTipcue()
  {
  	  $c = new Criteria;
  	  $c->add(TstipcuePeer::CODTIP,$this->tsdefban->getTipcue());
  	  $this->tipcuenta = TstipcuePeer::doSelect($c);
  	  if ($this->tipcuenta)
	    return $this->tipcuenta[0]->getDestip();
	  else 
	    return ' ';
  }	
	
  public function getTipren()
  {
  	  $c = new Criteria;
  	  $c->add(TstiprenPeer::CODTIP,$this->tsdefban->getTipren());
  	  $this->tiprendim = TstiprenPeer::doSelect($c);
  	  if ($this->tiprendim)
	    return $this->tiprendim[0]->getDestip();
	  else 
	    return ' ';
  }	
  
  public function executeEdit()
  {
    $this->tsdefban = $this->getTsdefbanOrCreate();
    $this->tipcue = $this->getTipcue();
    $this->tipren = $this->getTipren();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateTsdefbanFromRequest();

      $this->saveTsdefban($this->tsdefban);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('tesdefcueban/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('tesdefcueban/list');
      }
      else
      {
        return $this->redirect('tesdefcueban/edit?id='.$this->tsdefban->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
  
  protected function updateTsdefbanFromRequest()
  {
    $tsdefban = $this->getRequestParameter('tsdefban');

    if (isset($tsdefban['numcue']))
    {
      $this->tsdefban->setNumcue($tsdefban['numcue']);
    }
    if (isset($tsdefban['nomcue']))
    {
      $this->tsdefban->setNomcue($tsdefban['nomcue']);
    }
    if (isset($tsdefban['tipcue']))
    {
      $this->tsdefban->setTipcue($tsdefban['tipcue']);
    }
    if (isset($tsdefban['codcta']))
    {
      $this->tsdefban->setCodcta($tsdefban['codcta']);
    }
    if (isset($tsdefban['fecreg']))
    {
      if ($tsdefban['fecreg'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($tsdefban['fecreg']))
          {
            $value = $dateFormat->format($tsdefban['fecreg'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $tsdefban['fecreg'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->tsdefban->setFecreg($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->tsdefban->setFecreg(null);
      }
    }
    if (isset($tsdefban['fecven']))
    {
      if ($tsdefban['fecven'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($tsdefban['fecven']))
          {
            $value = $dateFormat->format($tsdefban['fecven'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $tsdefban['fecven'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->tsdefban->setFecven($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->tsdefban->setFecven(null);
      }
    }
    if (isset($tsdefban['fecper']))
    {
      if ($tsdefban['fecper'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($tsdefban['fecper']))
          {
            $value = $dateFormat->format($tsdefban['fecper'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $tsdefban['fecper'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->tsdefban->setFecper($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->tsdefban->setFecper(null);
      }
    }
    //if (isset($tsdefban['renaut']))
    //{
      $this->tsdefban->setRenaut($this->getRequestParameter('renaut'));
    //}
    /*if (isset($tsdefban['porint']))
    {
      $this->tsdefban->setPorint($tsdefban['porint']);
    }*/
    //if (isset($tsdefban['tipint']))
    //{
      $this->tsdefban->setTipint($this->getRequestParameter('tipint'));
    //}
    if (isset($tsdefban['numche']))
    {
      $this->tsdefban->setNumche($tsdefban['numche']);
    }
    if (isset($tsdefban['antban']))
    {
      $this->tsdefban->setAntban($tsdefban['antban']);
    }
    if (isset($tsdefban['debban']))
    {
      $this->tsdefban->setDebban($tsdefban['debban']);
    }
    if (isset($tsdefban['creban']))
    {
      $this->tsdefban->setCreban($tsdefban['creban']);
    }
    if (isset($tsdefban['antlib']))
    {
      $this->tsdefban->setAntlib($tsdefban['antlib']);
    }
    if (isset($tsdefban['deblib']))
    {
      $this->tsdefban->setDeblib($tsdefban['deblib']);
    }
    if (isset($tsdefban['crelib']))
    {
      $this->tsdefban->setCrelib($tsdefban['crelib']);
    }
    if (isset($tsdefban['valche']))
    {
      $this->tsdefban->setValche($tsdefban['valche']);
    }
    //if (isset($tsdefban['concil']))
    //{
      $this->tsdefban->setConcil($this->getRequestParameter('concil'));
   // }
    /*if (isset($tsdefban['plazo']))
    {
      $this->tsdefban->setPlazo($tsdefban['plazo']);
    }*/
    if (isset($tsdefban['fecape']))
    {
      if ($tsdefban['fecape'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($tsdefban['fecape']))
          {
            $value = $dateFormat->format($tsdefban['fecape'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $tsdefban['fecape'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->tsdefban->setFecape($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->tsdefban->setFecape(null);
      }
    }
    if (isset($tsdefban['usocue']))
    {
      $this->tsdefban->setUsocue($tsdefban['usocue']);
    }
    if (isset($tsdefban['tipren']))
    {
      $this->tsdefban->setTipren($tsdefban['tipren']);
    }
    /*if (isset($tsdefban['desenl']))
    {
      $this->tsdefban->setDesenl($tsdefban['desenl']);
    }
    if (isset($tsdefban['porsalmin']))
    {
      $this->tsdefban->setPorsalmin($tsdefban['porsalmin']);
    }
    if (isset($tsdefban['monsalmin']))
    {
      $this->tsdefban->setMonsalmin($tsdefban['monsalmin']);
    }
    if (isset($tsdefban['codctaprecoo']))
    {
      $this->tsdefban->setCodctaprecoo($tsdefban['codctaprecoo']);
    }
    if (isset($tsdefban['codctapreord']))
    {
      $this->tsdefban->setCodctapreord($tsdefban['codctapreord']);
    }
    if (isset($tsdefban['trasitoria']))
    {
      $this->tsdefban->setTrasitoria($tsdefban['trasitoria']);
    }
    if (isset($tsdefban['salact']))
    {
      $this->tsdefban->setSalact($tsdefban['salact']);
    }
    if (isset($tsdefban['fecaper']))
    {
      if ($tsdefban['fecaper'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($tsdefban['fecaper']))
          {
            $value = $dateFormat->format($tsdefban['fecaper'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $tsdefban['fecaper'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->tsdefban->setFecaper($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->tsdefban->setFecaper(null);
      }
    }
    if (isset($tsdefban['temnumcue']))
    {
      $this->tsdefban->setTemnumcue($tsdefban['temnumcue']);
    }
    if (isset($tsdefban['cantdig']))
    {
      $this->tsdefban->setCantdig($tsdefban['cantdig']);
    }*/
  }
  
}
