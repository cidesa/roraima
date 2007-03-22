<?php

/**
 * presnomantpre actions.
 *
 * @package    siga
 * @subpackage presnomantpre
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class presnomantpreActions extends autopresnomantpreActions
{
public function getMostrarEmpleado()
  {
  	  $c = new Criteria;
  	  $this->campo = str_pad($this->npantpre->getCodemp(),16,' ');
  	  $c->add(NphojintPeer::CODEMP, $this->campo);
  	  $this->cod = NphojintPeer::doSelect($c);
	  if ($this->cod)
	  	return $this->cod[0]->getNomemp();
	  else 
	    return ' ';
  }
	
public function executeEdit()
  {
    $this->npantpre = $this->getNpantpreOrCreate();
    $this->codigo = $this->getMostrarEmpleado();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpantpreFromRequest();

      $this->saveNpantpre($this->npantpre);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('presnomantpre/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('presnomantpre/list');
      }
      else
      {
        return $this->redirect('presnomantpre/edit?id='.$this->npantpre->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

protected function updateNpantpreFromRequest()
  {
    $npantpre = $this->getRequestParameter('npantpre');

    if (isset($npantpre['codemp']))
    {
      $this->npantpre->setCodemp($npantpre['codemp']);
    }
    if (isset($npantpre['monant']))
    {
      $this->npantpre->setMonant($npantpre['monant']);
    }
    if (isset($npantpre['fecant']))
    {
      if ($npantpre['fecant'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($npantpre['fecant']))
          {
            $value = $dateFormat->format($npantpre['fecant'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $npantpre['fecant'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->npantpre->setFecant($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npantpre->setFecant(null);
      }
    }
    if (isset($npantpre['monto']))
    {
      $this->npantpre->setMonto($npantpre['monto']);
    }
  }
  
}
