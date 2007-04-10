<?php

/**
 * ingajustenew actions.
 *
 * @package    siga
 * @subpackage ingajustenew
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class ingajustenewActions extends autoingajustenewActions
{

  public function executeEdit()
  {
    $this->ciajuste = $this->getCiajusteOrCreate();
    $this->pagercimovaju = CimovajuPeer::getPagerByRefaju($this->ciajuste->getRefaju(),$this->getRequestParameter('page'));

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCiajusteFromRequest();

      $this->saveCiajuste($this->ciajuste);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('ingajustenew/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('ingajustenew/list');
      }
      else
      {
        return $this->redirect('ingajustenew/edit?id='.$this->ciajuste->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
	
  protected function getCiajusteOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $ciajuste = new Ciajuste();
    }
    else
    {
      $ciajuste = CiajustePeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($ciajuste);
    }

    return $ciajuste;
  }
	
  
  protected function updateCiajusteFromRequest()
  {
    $ciajuste = $this->getRequestParameter('ciajuste');

    if (isset($ciajuste['refaju']))
    {
      $this->ciajuste->setRefaju($ciajuste['refaju']);
    }
    if (isset($ciajuste['fecaju']))
    {
      if ($ciajuste['fecaju'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($ciajuste['fecaju']))
          {
            $value = $dateFormat->format($ciajuste['fecaju'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $ciajuste['fecaju'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->ciajuste->setFecaju($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->ciajuste->setFecaju(null);
      }
    }
    if (isset($ciajuste['desaju']))
    {
      $this->ciajuste->setDesaju($ciajuste['desaju']);
    }
    if (isset($ciajuste['refere']))
    {
      $this->ciajuste->setRefere($ciajuste['refere']);
    }
    if (isset($ciajuste['desanu']))
    {
      $this->ciajuste->setDesanu($ciajuste['desanu']);
    }
    if (isset($ciajuste['totaju']))
    {
      $this->ciajuste->setTotaju($ciajuste['totaju']);
    }
  }
  
	
}
