<?php

/**
 * ingreging actions.
 *
 * @package    siga
 * @subpackage ingreging
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class ingregingActions extends autoingregingActions
{
	// TODO: Terminar de buscar las descripciones de los campos Códigos 
 protected function updateCiregingFromRequest()
  {
    $cireging = $this->getRequestParameter('cireging');

    if (isset($cireging['refing']))
    {
      $this->cireging->setRefing(str_pad($cireging['refing'],8,'0', STR_PAD_LEFT));
    }
    if (isset($cireging['fecing']))
    {
      if ($cireging['fecing'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($cireging['fecing']))
          {
            $value = $dateFormat->format($cireging['fecing'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $cireging['fecing'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->cireging->setFecing($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->cireging->setFecing(null);
      }
    }
    if (isset($cireging['desing']))
    {
      $this->cireging->setDesing($cireging['desing']);
    }
    if (isset($cireging['codtip']))
    {
      $this->cireging->setCodtip(str_pad($cireging['codtip'],3,' '));
    }
    if (isset($cireging['rifcon']))
    {
      $this->cireging->setRifcon(str_pad($cireging['rifcon'],15,' '));
    }
    if (isset($cireging['moning']))
    {
      $this->cireging->setMoning($cireging['moning']);
    }
    if (isset($cireging['monrec']))
    {
      $this->cireging->setMonrec($cireging['monrec']);
    }
    if (isset($cireging['mondes']))
    {
      $this->cireging->setMondes($cireging['mondes']);
    }
    if (isset($cireging['montot']))
    {
      $this->cireging->setMontot($cireging['montot']);
    }
    if (isset($cireging['ctaban']))
    {
      $this->cireging->setCtaban(str_pad($cireging['ctaban'],20,' '));
    }
    if (isset($cireging['tipmov']))
    {
      $this->cireging->setTipmov(str_pad($cireging['tipmov'],4,' '));
    }
    if (isset($cireging['fecing']))
    {
      $this->cireging->setAnoing($value_array['year']);
    }
  }
	
	
  public function executeEdit()
  {
    $this->cireging = $this->getCiregingOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCiregingFromRequest();

      $this->saveCireging($this->cireging);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('ingreging/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('ingreging/list');
      }
      else
      {
        return $this->redirect('ingreging/edit?id='.$this->cireging->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
	
	
  protected function getCiregingOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $cireging = new Cireging();
      $cireging->setStaing('A');
      $cireging->setPrevis('S');
    }
    else
    {
      $cireging = CiregingPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($cireging);
    }

    return $cireging;
  }
	
}
