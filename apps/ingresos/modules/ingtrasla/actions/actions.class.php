<?php

/**
 * ingtrasla actions.
 *
 * @package    siga
 * @subpackage ingtrasla
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class ingtraslaActions extends autoingtraslaActions
{
	
  public function executeEdit()
  {
    $this->citrasla = $this->getCitraslaOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCitraslaFromRequest();

      $this->saveCitrasla($this->citrasla);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('ingtrasla/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('ingtrasla/list');
      }
      else
      {
        return $this->redirect('ingtrasla/edit?id='.$this->citrasla->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
  
  
  protected function updateCitraslaFromRequest()
  {
    $citrasla = $this->getRequestParameter('citrasla');

    if (isset($citrasla['reftra']))
    {
      $this->citrasla->setReftra($citrasla['reftra']);
    }
    if (isset($citrasla['fectra']))
    {
      if ($citrasla['fectra'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($citrasla['fectra']))
          {
            $value = $dateFormat->format($citrasla['fectra'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $citrasla['fectra'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->citrasla->setFectra($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->citrasla->setFectra(null);
      }
    }
    if (isset($citrasla['pertra']))
    {
      $this->citrasla->setPertra($citrasla['pertra']);
    }
    if (isset($citrasla['destra']))
    {
      $this->citrasla->setDestra($citrasla['destra']);
    }
    if (isset($citrasla['anotra']))
    {
      $this->citrasla->setAnotra($citrasla['anotra']);
    }
  }
  
  protected function getCitraslaOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $citrasla = new Citrasla();
    }
    else
    {
      $citrasla = CitraslaPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($citrasla);
    }

    return $citrasla;
  }
  
}
