<?php

/**
 * bieregactmued actions.
 *
 * @package    siga
 * @subpackage bieregactmued
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class bieregactmuedActions extends autobieregactmuedActions
{
	protected function updateBnregmueFromRequest()
  {
    $bnregmue = $this->getRequestParameter('bnregmue');

    if (isset($bnregmue['codact']))
    {
      $this->bnregmue->setCodact(str_pad($bnregmue['codact'], 30 , ' '));
    }
    if (isset($bnregmue['codmue']))
    {
      $this->bnregmue->setCodmue(str_pad($bnregmue['codmue'], 20 , ' '));
    }
    if (isset($bnregmue['desmue']))
    {
      $this->bnregmue->setDesmue($bnregmue['desmue']);
    }
    if (isset($bnregmue['codpro']))
    {
      $this->bnregmue->setCodpro(str_pad(str_pad($bnregmue['codpro'],8,'0',STR_PAD_LEFT), 10 , ' '));
    }
    if (isset($bnregmue['ordcom']))
    {
      $this->bnregmue->setOrdcom(str_pad($bnregmue['codpro'],8,'0',STR_PAD_LEFT));
    }
    if (isset($bnregmue['fecreg']))
    {
      if ($bnregmue['fecreg'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bnregmue['fecreg']))
          {
            $value = $dateFormat->format($bnregmue['fecreg'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bnregmue['fecreg'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bnregmue->setFecreg($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bnregmue->setFecreg(null);
      }
    }
    if (isset($bnregmue['feccom']))
    {
      if ($bnregmue['feccom'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bnregmue['feccom']))
          {
            $value = $dateFormat->format($bnregmue['feccom'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bnregmue['feccom'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bnregmue->setFeccom($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bnregmue->setFeccom(null);
      }
    }
    if (isset($bnregmue['fecdep']))
    {
      if ($bnregmue['fecdep'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bnregmue['fecdep']))
          {
            $value = $dateFormat->format($bnregmue['fecdep'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bnregmue['fecdep'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bnregmue->setFecdep($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bnregmue->setFecdep(null);
      }
    }
    if (isset($bnregmue['fecaju']))
    {
      if ($bnregmue['fecaju'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bnregmue['fecaju']))
          {
            $value = $dateFormat->format($bnregmue['fecaju'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bnregmue['fecaju'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bnregmue->setFecaju($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bnregmue->setFecaju(null);
      }
    }
    if (isset($bnregmue['fecact']))
    {
      if ($bnregmue['fecact'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bnregmue['fecact']))
          {
            $value = $dateFormat->format($bnregmue['fecact'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bnregmue['fecact'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bnregmue->setFecact($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bnregmue->setFecact(null);
      }
    }
    if (isset($bnregmue['fecexp']))
    {
      if ($bnregmue['fecexp'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bnregmue['fecexp']))
          {
            $value = $dateFormat->format($bnregmue['fecexp'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bnregmue['fecexp'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bnregmue->setFecexp($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bnregmue->setFecexp(null);
      }
    }
    if (isset($bnregmue['ordrcp']))
    {
      $this->bnregmue->setOrdrcp($bnregmue['ordrcp']);
    }
    if (isset($bnregmue['fotmue']))
    {
      $this->bnregmue->setFotmue($bnregmue['fotmue']);
    }
    if (isset($bnregmue['marmue']))
    {
      $this->bnregmue->setMarmue($bnregmue['marmue']);
    }
    if (isset($bnregmue['modmue']))
    {
      $this->bnregmue->setModmue($bnregmue['modmue']);
    }
    if (isset($bnregmue['anomue']))
    {
      $this->bnregmue->setAnomue($bnregmue['anomue']);
    }
    if (isset($bnregmue['colmue']))
    {
      $this->bnregmue->setColmue($bnregmue['colmue']);
    }
    if (isset($bnregmue['codubi']))
    {
      $this->bnregmue->setCodubi($bnregmue['codubi']);
    }
    if (isset($bnregmue['pesmue']))
    {
      $this->bnregmue->setPesmue($bnregmue['pesmue']);
    }
    if (isset($bnregmue['capmue']))
    {
      $this->bnregmue->setCapmue($bnregmue['capmue']);
    }
    if (isset($bnregmue['tipmue']))
    {
      $this->bnregmue->setTipmue($bnregmue['tipmue']);
    }
    if (isset($bnregmue['viduti']))
    {
      $this->bnregmue->setViduti($bnregmue['viduti']);
    }
    if (isset($bnregmue['lngmue']))
    {
      $this->bnregmue->setLngmue($bnregmue['lngmue']);
    }
    if (isset($bnregmue['nropie']))
    {
      $this->bnregmue->setNropie($bnregmue['nropie']);
    }
    if (isset($bnregmue['sermue']))
    {
      $this->bnregmue->setSermue($bnregmue['sermue']);
    }
    if (isset($bnregmue['usomue']))
    {
      $this->bnregmue->setUsomue($bnregmue['usomue']);
    }
    if (isset($bnregmue['altmue']))
    {
      $this->bnregmue->setAltmue($bnregmue['altmue']);
    }
    if (isset($bnregmue['larmue']))
    {
      $this->bnregmue->setLarmue($bnregmue['larmue']);
    }
    if (isset($bnregmue['ancmue']))
    {
      $this->bnregmue->setAncmue($bnregmue['ancmue']);
    }
    if (isset($bnregmue['coddis']))
    {
      $this->bnregmue->setCoddis($bnregmue['coddis']);
    }
    if (isset($bnregmue['detmue']))
    {
      $this->bnregmue->setDetmue($bnregmue['detmue']);
    }
    if (isset($bnregmue['edomue']))
    {
      $this->bnregmue->setEdomue($bnregmue['edomue']);
    }
    if (isset($bnregmue['munmue']))
    {
      $this->bnregmue->setMunmue($bnregmue['munmue']);
    }
    if (isset($bnregmue['depmue']))
    {
      $this->bnregmue->setDepmue($bnregmue['depmue']);
    }
    if (isset($bnregmue['dirmue']))
    {
      $this->bnregmue->setDirmue($bnregmue['dirmue']);
    }
    if (isset($bnregmue['ubimue']))
    {
      $this->bnregmue->setUbimue($bnregmue['ubimue']);
    }
    if (isset($bnregmue['mesdep']))
    {
      $this->bnregmue->setMesdep($bnregmue['mesdep']);
    }
    if (isset($bnregmue['valini']))
    {
      $this->bnregmue->setValini($bnregmue['valini']);
    }
    if (isset($bnregmue['valres']))
    {
      $this->bnregmue->setValres($bnregmue['valres']);
    }
    if (isset($bnregmue['vallib']))
    {
      $this->bnregmue->setVallib($bnregmue['vallib']);
    }
    if (isset($bnregmue['valrex']))
    {
      $this->bnregmue->setValrex($bnregmue['valrex']);
    }
    if (isset($bnregmue['cosrep']))
    {
      $this->bnregmue->setCosrep($bnregmue['cosrep']);
    }
    if (isset($bnregmue['depmen']))
    {
      $this->bnregmue->setDepmen($bnregmue['depmen']);
    }
    if (isset($bnregmue['depacu']))
    {
      $this->bnregmue->setDepacu($bnregmue['depacu']);
    }
    if (isset($bnregmue['stamue']))
    {
      $this->bnregmue->setStamue($bnregmue['stamue']);
    }
    if (isset($bnregmue['codalt']))
    {
      $this->bnregmue->setCodalt(str_pad($bnregmue['codalt'], 30 , ' '));
    }
    if (isset($bnregmue['fecrcp']))
    {
      if ($bnregmue['fecrcp'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bnregmue['fecrcp']))
          {
            $value = $dateFormat->format($bnregmue['fecrcp'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bnregmue['fecrcp'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bnregmue->setFecrcp($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bnregmue->setFecrcp(null);
      }
    }
    if (isset($bnregmue['valadi']))
    {
      $this->bnregmue->setValadi($bnregmue['valadi']);
    }
    if (isset($bnregmue['aumviduti']))
    {
      $this->bnregmue->setAumviduti($bnregmue['aumviduti']);
    }
    if (isset($bnregmue['dimviduti']))
    {
      $this->bnregmue->setDimviduti($bnregmue['dimviduti']);
    }
    if (isset($bnregmue['stasem']))
    {
      $this->bnregmue->setStasem($bnregmue['stasem']);
    }
    if (isset($bnregmue['stainm']))
    {
      $this->bnregmue->setStainm($bnregmue['stainm']);
    }
  }
	
}
