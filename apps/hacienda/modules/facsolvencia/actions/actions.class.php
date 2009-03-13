<?php

/**
 * facsolvencia actions.
 *
 * @package    siga
 * @subpackage facsolvencia
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class facsolvenciaActions extends autofacsolvenciaActions
{
  
  public function executeEdit()
  {
    $this->fcsolvencia = $this->getFcsolvenciaOrCreate();
    $sta = $this->fcsolvencia->getStasol();

    if($sta=='A') $this->status = 'Estado:  Anulada';
    else {
      $fecha = getdate();
      $f = date($fecha[0]);
      if(Herramientas::dateDiff('d',$this->fcsolvencia->getFecven(),$f)<0) $this->status = 'Estado:  Vigente';
      else $this->status = 'Estado:  Vencida';
    } 

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFcsolvenciaFromRequest();

      $this->saveFcsolvencia($this->fcsolvencia);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('facsolvencia/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('facsolvencia/list');
      }
      else
      {
        return $this->redirect('facsolvencia/edit?id='.$this->fcsolvencia->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
  
  protected function updateFcsolvenciaFromRequest()
  {
    $fcsolvencia = $this->getRequestParameter('fcsolvencia');

    if (isset($fcsolvencia['codsol']))
    {
      $this->fcsolvencia->setCodsol($fcsolvencia['codsol']);
    }
    if (isset($fcsolvencia['fecexp']))
    {
      if ($fcsolvencia['fecexp'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcsolvencia['fecexp']))
          {
            $value = $dateFormat->format($fcsolvencia['fecexp'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcsolvencia['fecexp'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcsolvencia->setFecexp($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcsolvencia->setFecexp(null);
      }
    }
    if (isset($fcsolvencia['codtip']))
    {
    $this->fcsolvencia->setCodtip($fcsolvencia['codtip'] ? $fcsolvencia['codtip'] : null);
    }
    if (isset($fcsolvencia['rifcon']))
    {
      $this->fcsolvencia->setRifcon($fcsolvencia['rifcon']);
    }
    if (isset($fcsolvencia['numlic']))
    {
      $this->fcsolvencia->setNumlic($fcsolvencia['numlic']);
    }
    if (isset($fcsolvencia['codcat']))
    {
      $this->fcsolvencia->setCodcat($fcsolvencia['codcat']);
    }
    if (isset($fcsolvencia['nomcon']))
    {
      $this->fcsolvencia->setNomcon($fcsolvencia['nomcon']);
    }
    if (isset($fcsolvencia['dircon']))
    {
      $this->fcsolvencia->setDircon($fcsolvencia['dircon']);
    }
    if (isset($fcsolvencia['motivo']))
    {
      $this->fcsolvencia->setMotivo($fcsolvencia['motivo']);
    }
    if (isset($fcsolvencia['stasol']))
    {
      $this->fcsolvencia->setStasol('V');
    }
  }
  
  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->fcsolvencia = $this->getFcsolvenciaOrCreate();
    $this->updateFcsolvenciaFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }
  
  protected function saveFcsolvencia($fcsolvencia)
  {
    $fcsolvencia->save();

  }
  
  
}
