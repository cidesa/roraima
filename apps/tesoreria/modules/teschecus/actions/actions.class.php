<?php

/**
 * teschecus actions.
 *
 * @package    siga
 * @subpackage teschecus
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class teschecusActions extends autoteschecusActions
{
   
  
 public function getMostrar_Beneficiario()
  {
  	  $c = new Criteria;
  	  $this->campo = str_pad($this->tscheemi->getCedrif(),15,' ');
  	  $c->add(OpbenefiPeer::CEDRIF, $this->campo);
  	  $this->mibenefi = OpbenefiPeer::doSelect($c);
	  if ($this->mibenefi)
	  	return $this->mibenefi[0]->getNomben();
	  else 
	    return ' ';
  }

public function getMostrar_Banco()
  {
  	  $c = new Criteria;
  	  $c->add(TsdefbanPeer::NUMCUE,$this->tscheemi->getNumcue());
  	  $this->mibanco = TsdefbanPeer::doSelect($c);
  	  if ($this->mibanco)
	  	return $this->mibanco[0]->getNomcue();
	  else 
	    return '';
  }
  
  public function getMostrar_Comprobante()
  {
  	  $c = new Criteria;
  	  $c->addJoin(OpordpagPeer::NUMCHE,TscheemiPeer::NUMCHE);
  	  $c->add(OpordpagPeer::NUMCHE,$this->tscheemi->getNumche());
  	  $this->comprob = OpordpagPeer::doSelect($c);
  	  if ($this->comprob)
	  	{
	  		$this->numord = $this->comprob[0]->getNumord();
	  	    $this->numcomp = $this->comprob[0]->getNumcom();
	  	}
	  	else
	  	{
	  		$this->numord = '';
	  	    $this->numcomp = '';
	  	}
  }	
	public function executeEdit()
  {
    $this->tscheemi = $this->getTscheemiOrCreate();
    $this->bene = $this->getMostrar_Beneficiario();
    $this->banco = $this->getMostrar_Banco();
    $this->getMostrar_Comprobante();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateTscheemiFromRequest();

      $this->saveTscheemi($this->tscheemi);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('teschecus/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('teschecus/list');
      }
      else
      {
        return $this->redirect('teschecus/edit?id='.$this->tscheemi->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
protected function updateTscheemiFromRequest()
  {
    $tscheemi = $this->getRequestParameter('tscheemi');

    if (isset($tscheemi['numche']))
    {
      $this->tscheemi->setNumche($tscheemi['numche']);
    }
    if (isset($tscheemi['fecemi']))
    {
      if ($tscheemi['fecemi'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($tscheemi['fecemi']))
          {
            $value = $dateFormat->format($tscheemi['fecemi'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $tscheemi['fecemi'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->tscheemi->setFecemi($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->tscheemi->setFecemi(null);
      }
    }
    if (isset($tscheemi['monche']))
    {
      $this->tscheemi->setMonche($tscheemi['monche']);
    }
    if (isset($tscheemi['cedrif']))
    {
      $this->tscheemi->setCedrif($tscheemi['cedrif']);
    }
    if (isset($tscheemi['numcue']))
    {
      $this->tscheemi->setNumcue($tscheemi['numcue']);
    }
    //if (isset($tscheemi['status']))
    //{
       $this->tscheemi->setStatus($this->getRequestParameter('radio'));
   // }
    if (isset($tscheemi['fecent']))
    {
      if ($tscheemi['fecent'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($tscheemi['fecent']))
          {
            $value = $dateFormat->format($tscheemi['fecent'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $tscheemi['fecent'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->tscheemi->setFecent($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->tscheemi->setFecent(null);
      }
    }
    if (isset($tscheemi['obsent']))
    {
      $this->tscheemi->setObsent($tscheemi['obsent']);
    }
    if (isset($tscheemi['nomrec']))
    {
      $this->tscheemi->setNomrec($tscheemi['nomrec']);
    }
  }
}




