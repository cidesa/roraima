<?php

/**
 * oycregsol actions.
 *
 * @package    siga
 * @subpackage oycregsol
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycregsolActions extends autooycregsolActions
{
  protected function updateOcregsolFromRequest()
  {
    $ocregsol = $this->getRequestParameter('ocregsol');

    if (isset($ocregsol['numsol']))
    {
      $this->ocregsol->setNumsol(str_pad($ocregsol['numsol'],8,'0',STR_PAD_LEFT));
    }
    if (isset($ocregsol['cedste']))
    {
      $this->ocregsol->setCedste(str_pad($ocregsol['cedste'],15,' '));
    }
    if (isset($ocregsol['codsol']))
    {
      $this->ocregsol->setCodsol(str_pad($ocregsol['codsol'],4,'0',STR_PAD_LEFT));
    }
    if (isset($ocregsol['codorg']))
    {
      $this->ocregsol->setCodorg(str_pad($ocregsol['codorg'],4,'0',STR_PAD_LEFT));
    }
    if (isset($ocregsol['fecsol']))
    {
      if ($ocregsol['fecsol'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($ocregsol['fecsol']))
          {
            $value = $dateFormat->format($ocregsol['fecsol'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $ocregsol['fecsol'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->ocregsol->setFecsol($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->ocregsol->setFecsol(null);
      }
    }
    if (isset($ocregsol['fecres']))
    {
      if ($ocregsol['fecres'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($ocregsol['fecres']))
          {
            $value = $dateFormat->format($ocregsol['fecres'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $ocregsol['fecres'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->ocregsol->setFecres($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->ocregsol->setFecres(null);
      }
    }
    if (isset($ocregsol['obssol']))
    {
      $this->ocregsol->setObssol($ocregsol['obssol']);
    }
    if (isset($ocregsol['codemp']))
    {
      $this->ocregsol->setCodemp(str_pad($ocregsol['codemp'],16, ' '));
    }    
  }
	
}
