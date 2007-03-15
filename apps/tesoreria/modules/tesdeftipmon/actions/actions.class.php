<?php

/**
 * tesdeftipmon actions.
 *
 * @package    siga
 * @subpackage tesdeftipmon
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class tesdeftipmonActions extends autotesdeftipmonActions
{
	 protected function updateTsdesmonFromRequest()
  {
    $tsdesmon = $this->getRequestParameter('tsdesmon');

    if (isset($tsdesmon['codmon']))
    {
      $this->tsdesmon->setCodmon($tsdesmon['codmon']);
    }
    if (isset($tsdesmon['nommon']))
    {
      $this->tsdesmon->setNommon($tsdesmon['nommon']);
    }
    if (isset($tsdesmon['valmon']))
    {
      $this->tsdesmon->setValmon($tsdesmon['valmon']);
    }
 //   if (isset($tsdesmon['aumdis']))
 //   {
      $this->tsdesmon->setAumdis($this->getRequestParameter('radio1'));
 //   }
    if (isset($tsdesmon['fecmon']))
    {
      if ($tsdesmon['fecmon'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($tsdesmon['fecmon']))
          {
            $value = $dateFormat->format($tsdesmon['fecmon'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $tsdesmon['fecmon'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->tsdesmon->setFecmon($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->tsdesmon->setFecmon(null);
      }
    }
  }
	
}
