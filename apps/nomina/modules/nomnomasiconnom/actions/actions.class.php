<?php

/**
 * nomnomasiconnom actions.
 *
 * @package    siga
 * @subpackage nomnomasiconnom
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomnomasiconnomActions extends autonomnomasiconnomActions
{
public function executeEdit()
  {
    $c = new Criteria();
		$this->pagerNpasiconemp = NpasiconempPeer::getPagerByCriteria($c,$this->getRequestParameter('page',1));
		
  $this->npasiconemp = $this->getNpasiconempOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
     //$this->updateNpasiconempFromRequest();

     // $this->saveNpasiconemp($this->npasiconemp);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomnomasiconnom/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomnomasiconnom/list');
      }
      else
      {
        return $this->redirect('nomnomasiconnom/edit?id='.$this->npasiconemp->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
  
protected function updateNpasiconempFromRequest()
  {
    $npasiconemp = $this->getRequestParameter('npasiconemp');

    if (isset($npasiconemp['codemp']))
    {
      $this->npasiconemp->setCodemp($npasiconemp['codemp']);
    }
    if (isset($npasiconemp['codcon']))
    {
      $this->npasiconemp->setCodcon($npasiconemp['codcon']);
    }
    if (isset($npasiconemp['codcar']))
    {
      $this->npasiconemp->setCodcar($npasiconemp['codcar']);
    }
    if (isset($npasiconemp['nomemp']))
    {
      $this->npasiconemp->setNomemp($npasiconemp['nomemp']);
    }
    if (isset($npasiconemp['nomcon']))
    {
      $this->npasiconemp->setNomcon($npasiconemp['nomcon']);
    }
    if (isset($npasiconemp['nomcar']))
    {
      $this->npasiconemp->setNomcar($npasiconemp['nomcar']);
    }
    if (isset($npasiconemp['cantidad']))
    {
      $this->npasiconemp->setCantidad($npasiconemp['cantidad']);
    }
    if (isset($npasiconemp['monto']))
    {
      $this->npasiconemp->setMonto($npasiconemp['monto']);
    }
    if (isset($npasiconemp['fecini']))
    {
      if ($npasiconemp['fecini'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($npasiconemp['fecini']))
          {
            $value = $dateFormat->format($npasiconemp['fecini'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $npasiconemp['fecini'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->npasiconemp->setFecini($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npasiconemp->setFecini(null);
      }
    }
    if (isset($npasiconemp['fecexp']))
    {
      if ($npasiconemp['fecexp'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($npasiconemp['fecexp']))
          {
            $value = $dateFormat->format($npasiconemp['fecexp'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $npasiconemp['fecexp'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->npasiconemp->setFecexp($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npasiconemp->setFecexp(null);
      }
    }
    if (isset($npasiconemp['frecon']))
    {
      $this->npasiconemp->setFrecon($npasiconemp['frecon']);
    }
    if (isset($npasiconemp['asided']))
    {
      $this->npasiconemp->setAsided($npasiconemp['asided']);
    }
    if (isset($npasiconemp['acucon']))
    {
      $this->npasiconemp->setAcucon($npasiconemp['acucon']);
    }
    if (isset($npasiconemp['calcon']))
    {
      $this->npasiconemp->setCalcon($npasiconemp['calcon']);
    }
    if (isset($npasiconemp['activo']))
    {
      $this->npasiconemp->setActivo($npasiconemp['activo']);
    }
    if (isset($npasiconemp['acumulado']))
    {
      $this->npasiconemp->setAcumulado($npasiconemp['acumulado']);
    }
  }
	
}
