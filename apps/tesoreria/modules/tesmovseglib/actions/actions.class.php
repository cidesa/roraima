<?php

/**
 * tesmovseglib actions.
 *
 * @package    siga
 * @subpackage tesmovseglib
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class tesmovseglibActions extends autotesmovseglibActions
{
public function getMostrar_cuenta()
  {
  	  $c = new Criteria;
  	  $c->add(TsdefbanPeer::NUMCUE,trim($this->tsmovlib->getNumcue()));
  	  $this->micuenta = TsdefbanPeer::doSelect($c);
  	  if ($this->micuenta)
	  	return $this->micuenta[0]->getNomcue();
	  else 
	    return '';
  }

public function getMostrar_tipo()
  {
  	  $c = new Criteria;
  	  $c->add(TstipmovPeer::CODTIP,$this->tsmovlib->getTipmov());
  	  $this->tipo = TstipmovPeer::doSelect($c);
  	  if ($this->tipo)
	  	return $this->tipo[0]->getDestip();
	  else 
	    return '';
  }
  
  public function executeEdit()
  {
    $this->tsmovlib = $this->getTsmovlibOrCreate();
    $this->cuenta_nombre = $this->getMostrar_cuenta();
    $this->movtip = $this->getMostrar_tipo();
    
    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateTsmovlibFromRequest();

      $this->saveTsmovlib($this->tsmovlib);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('tesmovseglib/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('tesmovseglib/list');
      }
      else
      {
        return $this->redirect('tesmovseglib/edit?id='.$this->tsmovlib->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
	
 protected function updateTsmovlibFromRequest()
  {
    $tsmovlib = $this->getRequestParameter('tsmovlib');

    if (isset($tsmovlib['numcue']))
    {
      $this->tsmovlib->setNumcue($tsmovlib['numcue']);
    }
    if (isset($tsmovlib['reflib']))
    {
      $this->tsmovlib->setReflib($tsmovlib['reflib']);
    }
    if (isset($tsmovlib['feclib']))
    {
      if ($tsmovlib['feclib'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($tsmovlib['feclib']))
          {
            $value = $dateFormat->format($tsmovlib['feclib'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $tsmovlib['feclib'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->tsmovlib->setFeclib($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->tsmovlib->setFeclib(null);
      }
    }
    if (isset($tsmovlib['tipmov']))
    {
      $this->tsmovlib->setTipmov($tsmovlib['tipmov']);
    }
    if (isset($tsmovlib['deslib']))
    {
      $this->tsmovlib->setDeslib($tsmovlib['deslib']);
    }
   
      $this->tsmovlib->setStatus('C');
    
      $this->tsmovlib->setStacon('N');
   
    if (isset($tsmovlib['monmov']))
    {
      $this->tsmovlib->setMonmov($tsmovlib['monmov']);
    }
    if (isset($tsmovlib['fecing']))
    {
      if ($tsmovlib['fecing'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($tsmovlib['fecing']))
          {
            $value = $dateFormat->format($tsmovlib['fecing'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $tsmovlib['fecing'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->tsmovlib->setFecing($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->tsmovlib->setFecing(null);
      }
    }
    if (isset($tsmovlib['numcom']))
    {
      $this->tsmovlib->setNumcom($tsmovlib['numcom']);
    }
    if (isset($tsmovlib['feccom']))
    {
      if ($tsmovlib['feccom'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($tsmovlib['feccom']))
          {
            $value = $dateFormat->format($tsmovlib['feccom'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $tsmovlib['feccom'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->tsmovlib->setFeccom($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->tsmovlib->setFeccom(null);
      }
    }
  }	
}
