<?php

/**
 * nomperhispre actions.
 *
 * @package    siga
 * @subpackage nomperhispre
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomperhispreActions extends autonomperhispreActions
{
  public function getSaldoanterior()
  {  	
  	if ($this->nphispre->getMonpre()!=''  and $this->nphispre->getSaldo()!='')
      {	  	
      	 $saldoanterior=$this->nphispre->getSaldo()-$this->nphispre->getMonpre();
	  	 return $saldoanterior;
  	  }  	 	
	  	else return ' ';	
  }	
	 
  public function executeEdit()
  {
    $this->nphispre = $this->getNphispreOrCreate();
    $this->salant = $this->getSaldoanterior();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNphispreFromRequest();

      $this->saveNphispre($this->nphispre);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('NomPerHisPre/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('NomPerHisPre/list');
      }
      else
      {
        return $this->redirect('NomPerHisPre/edit?id='.$this->nphispre->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
   protected function updateNphispreFromRequest()
  {
    $nphispre = $this->getRequestParameter('nphispre');

    if (isset($nphispre['codtippre']))
    {
      $this->nphispre->setCodtippre(str_pad($nphispre['codtippre'],4,'0',STR_PAD_LEFT));
    }
    if (isset($nphispre['fechispre']))
    {
      if ($nphispre['fechispre'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($nphispre['fechispre']))
          {
            $value = $dateFormat->format($nphispre['fechispre'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $nphispre['fechispre'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->nphispre->setFechispre($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->nphispre->setFechispre(null);
      }
    }
    if (isset($nphispre['deshispre']))
    {
      $this->nphispre->setDeshispre($nphispre['deshispre']);
    }
    if (isset($nphispre['codemp']))
    {
      $this->nphispre->setCodemp(str_pad($nphispre['codemp'],16,' '));
    }
    if (isset($nphispre['monpre']))
    {
      $this->nphispre->setMonpre($nphispre['monpre']);
    }
    if (isset($nphispre['saldo']))
    {
      $this->nphispre->setSaldo($nphispre['saldo']);
    }
  }
  
}
