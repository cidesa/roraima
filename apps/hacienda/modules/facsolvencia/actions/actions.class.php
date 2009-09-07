<?php

/**
 * facsolvencia actions.
 *
 * @package    Roraima
 * @subpackage facsolvencia
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class facsolvenciaActions extends autofacsolvenciaActions
{
  
  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
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
  
  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
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
  
  /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->fcsolvencia = $this->getFcsolvenciaOrCreate();
    $this->updateFcsolvenciaFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }
  
  /**
   * Función para manejar el salvado del formulario.
   * cabe destacar que en las versiones nuevas del formulario (cidesaPropel)
   * llama internamente a la función $this->saving
   * Esta función saving siempre debe retornar un valor >=-1.
   * En esta funcción se debe realizar el proceso de guardado de informacion
   * del negocio en la base de datos. Este proceso debe ser realizado llamado
   * a funciones de las clases del negocio que se encuentran en lib/bussines
   * todos los procesos de guardado deben estar en la clases del negocio (lib/bussines/"modulo")
   *
   */
  protected function saveFcsolvencia($fcsolvencia)
  {
    $fcsolvencia->save();

  }
  
  
}
