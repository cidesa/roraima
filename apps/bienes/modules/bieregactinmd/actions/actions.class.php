<?php

/**
 * bieregactinmd actions.
 *
 * @package    siga
 * @subpackage bieregactinmd
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class bieregactinmdActions extends autobieregactinmdActions
{
	public function CargarClaFun()
	{
	$c = new Criteria();
	$lista_clafun = BnclafunPeer::doSelect($c);
	
	$clafun = array();
	
	foreach($lista_clafun as $obj_clafun)
	{
		$clafun += array($obj_clafun->getCodcla() => $obj_clafun->getDescla());    
	}
	return $clafun;
    } 
    
    public function executeEdit()
  {
    $this->bnreginm = $this->getBnreginmOrCreate();
    $this->clafun = $this->CargarClaFun();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateBnreginmFromRequest();

      $this->saveBnreginm($this->bnreginm);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('bieregactinmd/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('bieregactinmd/list');
      }
      else
      {
        return $this->redirect('bieregactinmd/edit?id='.$this->bnreginm->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
  
    protected function updateBnreginmFromRequest()
  {
    $bnreginm = $this->getRequestParameter('bnreginm');

    
   if (isset($bnreginm['codact']))
    {
      $this->bnreginm->setCodact(str_pad($bnreginm['codact'], 30 , ' '));
    }
    if (isset($bnreginm['codinm']))
    {
      $this->bnreginm->setCodinm(str_pad($bnreginm['codinm'], 20 , ' '));
    }
    if (isset($bnreginm['desinm']))
    {
      $this->bnreginm->setDesinm($bnreginm['desinm']);
    }
    if (isset($bnreginm['codpro']))
    {
      $this->bnreginm->setCodpro(str_pad(str_pad($bnreginm['codpro'],8,'0',STR_PAD_LEFT), 10 , ' '));
    }
    if (isset($bnreginm['ordcom']))
    {
      $this->bnreginm->setOrdcom(str_pad($bnreginm['codpro'],8,'0',STR_PAD_LEFT));
    }
    
     if (isset($bnreginm['fecreg']))
    {
      if ($bnreginm['fecreg'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bnreginm['fecreg']))
          {
            $value = $dateFormat->format($bnreginm['fecreg'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bnreginm['fecreg'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bnreginm->setFecreg($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bnreginm->setFecreg(null);
      }
    }
    if (isset($bnreginm['feccom']))
    {
      if ($bnreginm['feccom'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bnreginm['feccom']))
          {
            $value = $dateFormat->format($bnreginm['feccom'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bnreginm['feccom'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bnreginm->setFeccom($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bnreginm->setFeccom(null);
      }
    }
    if (isset($bnreginm['fecdep']))
    {
      if ($bnreginm['fecdep'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bnreginm['fecdep']))
          {
            $value = $dateFormat->format($bnreginm['fecdep'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bnreginm['fecdep'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bnreginm->setFecdep($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bnreginm->setFecdep(null);
      }
    }
    if (isset($bnreginm['fecaju']))
    {
      if ($bnreginm['fecaju'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bnreginm['fecaju']))
          {
            $value = $dateFormat->format($bnreginm['fecaju'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bnreginm['fecaju'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bnreginm->setFecaju($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bnreginm->setFecaju(null);
      }
    }
    if (isset($bnreginm['fecact']))
    {
      if ($bnreginm['fecact'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bnreginm['fecact']))
          {
            $value = $dateFormat->format($bnreginm['fecact'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bnreginm['fecact'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bnreginm->setFecact($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bnreginm->setFecact(null);
      }
    }
    if (isset($bnreginm['fecexp']))
    {
      if ($bnreginm['fecexp'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bnreginm['fecexp']))
          {
            $value = $dateFormat->format($bnreginm['fecexp'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bnreginm['fecexp'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bnreginm->setFecexp($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bnreginm->setFecexp(null);
      }
    }
    if (isset($bnreginm['ordrcp']))
    {
      $this->bnreginm->setOrdrcp($bnreginm['ordrcp']);
    }
    if (isset($bnreginm['fotinm']))
    {
      $this->bnreginm->setFotinm($bnreginm['fotinm']);
    }
    if (isset($bnreginm['deninm']))
    {
      $this->bnreginm->setDeninm($bnreginm['deninm']);
    }
    if (isset($bnreginm['nroexp']))
    {
      $this->bnreginm->setNroexp($bnreginm['nroexp']);
    }
    if (isset($bnreginm['detinm']))
    {
      $this->bnreginm->setDetinm($bnreginm['detinm']);
    }
    if (isset($bnreginm['codubi']))
    {
      $this->bnreginm->setCodubi($bnreginm['codubi']);
    }
    if (isset($bnreginm['avaact']))
    {
      $this->bnreginm->setAvaact($bnreginm['avaact']);
    }
    if (isset($bnreginm['clafun']))
    {
      $this->bnreginm->setClafun($bnreginm['clafun']);
    }
    if (isset($bnreginm['avacom']))
    {
      $this->bnreginm->setAvacom($bnreginm['avacom']);
    }
    if (isset($bnreginm['edoleg']))
    {
      $this->bnreginm->setEdoleg($bnreginm['edoleg']);
    }
    if (isset($bnreginm['viduti']))
    {
      $this->bnreginm->setViduti($bnreginm['viduti']);
    }
    if (isset($bnreginm['obsinm']))
    {
      $this->bnreginm->setObsinm($bnreginm['obsinm']);
    }
    if (isset($bnreginm['linnor']))
    {
      $this->bnreginm->setLinnor($bnreginm['linnor']);
    }
    if (isset($bnreginm['linsur']))
    {
      $this->bnreginm->setLinsur($bnreginm['linsur']);
    }
    if (isset($bnreginm['linest']))
    {
      $this->bnreginm->setLinest($bnreginm['linest']);
    }
    if (isset($bnreginm['linoes']))
    {
      $this->bnreginm->setLinoes($bnreginm['linoes']);
    }
    if (isset($bnreginm['areter']))
    {
      $this->bnreginm->setAreter($bnreginm['areter']);
    }
    if (isset($bnreginm['arecub']))
    {
      $this->bnreginm->setArecub($bnreginm['arecub']);
    }
    if (isset($bnreginm['arecon']))
    {
      $this->bnreginm->setArecon($bnreginm['arecon']);
    }
    if (isset($bnreginm['areotr']))
    {
      $this->bnreginm->setAreotr($bnreginm['areotr']);
    }
    if (isset($bnreginm['aretot']))
    {
      $this->bnreginm->setAretot($bnreginm['aretot']);
    }
    if (isset($bnreginm['edoinm']))
    {
      $this->bnreginm->setEdoinm($bnreginm['edoinm']);
    }
    if (isset($bnreginm['muninm']))
    {
      $this->bnreginm->setMuninm($bnreginm['muninm']);
    }
    if (isset($bnreginm['depinm']))
    {
      $this->bnreginm->setDepinm($bnreginm['depinm']);
    }
    if (isset($bnreginm['dirinm']))
    {
      $this->bnreginm->setDirinm($bnreginm['dirinm']);
    }
    if (isset($bnreginm['mesdep']))
    {
      $this->bnreginm->setMesdep($bnreginm['mesdep']);
    }
    if (isset($bnreginm['valini']))
    {
      $this->bnreginm->setValini($bnreginm['valini']);
    }
    if (isset($bnreginm['valres']))
    {
      $this->bnreginm->setValres($bnreginm['valres']);
    }
    if (isset($bnreginm['vallib']))
    {
      $this->bnreginm->setVallib($bnreginm['vallib']);
    }
    if (isset($bnreginm['valrex']))
    {
      $this->bnreginm->setValrex($bnreginm['valrex']);
    }
    if (isset($bnreginm['cosrep']))
    {
      $this->bnreginm->setCosrep($bnreginm['cosrep']);
    }
    if (isset($bnreginm['depmen']))
    {
      $this->bnreginm->setDepmen($bnreginm['depmen']);
    }
    if (isset($bnreginm['depacu']))
    {
      $this->bnreginm->setDepacu($bnreginm['depacu']);
    }
    if (isset($bnreginm['stainm']))
    {
      $this->bnreginm->setStainm($bnreginm['stainm']);
    }
  }
  
    
}
