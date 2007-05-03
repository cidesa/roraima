<?php

/**
 * oycinscon actions.
 *
 * @package    siga
 * @subpackage oycinscon
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycinsconActions extends autooycinsconActions
{
  
  public function executeEdit()
  {
    $this->ocinscon = $this->getOcinsconOrCreate();
    $this->configGrid();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateOcinsconFromRequest();

      $this->saveOcinscon($this->ocinscon);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('oycinscon/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('oycinscon/list');
      }
      else
      {
        return $this->redirect('oycinscon/edit?id='.$this->ocinscon->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
  
  protected function saveOcinscon($ocinscon)
  {
    $ocinscon->save();

  }
  
  protected function updateOcinsconFromRequest()
  {
    $ocinscon = $this->getRequestParameter('ocinscon');

    if (isset($ocinscon['codcon']))
    {
      $this->ocinscon->setCodcon($ocinscon['codcon']);
    }
    if (isset($ocinscon['descon']))
    {
      $this->ocinscon->setDescon($ocinscon['descon']);
    }
    if (isset($ocinscon['codobr']))
    {
      $this->ocinscon->setCodobr($ocinscon['codobr']);
    }
    if (isset($ocinscon['desobr']))
    {
      $this->ocinscon->setDesobr($ocinscon['desobr']);
    }
    if (isset($ocinscon['codpro']))
    {
      $this->ocinscon->setCodpro($ocinscon['codpro']);
    }
    if (isset($ocinscon['nompro']))
    {
      $this->ocinscon->setNompro($ocinscon['nompro']);
    }
    if (isset($ocinscon['numins']))
    {
      $this->ocinscon->setNumins($ocinscon['numins']);
    }
    if (isset($ocinscon['feccom']))
    {
      if ($ocinscon['feccom'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($ocinscon['feccom']))
          {
            $value = $dateFormat->format($ocinscon['feccom'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $ocinscon['feccom'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->ocinscon->setFeccom($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->ocinscon->setFeccom(null);
      }
    }
    if (isset($ocinscon['fecter']))
    {
      if ($ocinscon['fecter'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($ocinscon['fecter']))
          {
            $value = $dateFormat->format($ocinscon['fecter'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $ocinscon['fecter'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->ocinscon->setFecter($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->ocinscon->setFecter(null);
      }
    }
    if (isset($ocinscon['portietra']))
    {
      $this->ocinscon->setPortietra($ocinscon['portietra']);
    }
  }
  
  
  private function configGrid(){


    $opciones = new OpcionesGrid();

    $opciones->setEliminar(false);
    $opciones->setTabla('ocparins');
    $opciones->setAnchoGrid(1150);
    $opciones->setTitulo('Datos de Partidas Inspeccionadas');
    $opciones->setHTMLTotalFilas(' ');
    
    // Se generan las columnas
    $col1 = new Columna('Cod. partida');
    $col1->setTipo(Columna::TEXTO);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codpar');
    
    $col2 = clone $col1;
    $col2->setTitulo('Descripción');
    $col2->setNombreCampo('despar');
    
    $col3 = clone $col1;
    $col3->setTitulo('Unidad');
    $col3->setNombreCampo('abruni');
    
    $col4 = clone $col1;
    $col4->setTitulo('Cantidad Contrat.');
    $col4->setNombreCampo('cancon');

    $col5 = new Columna('Ejecutado');
    $col5->setTipo(Columna::MONTO);
    $col5->setEsGrabable(true);
    $col5->setEsNumerico(true);
    $col5->setNombreCampo('poreje');
    
    $col6 = new Columna('Observaciones');
    $col6->setTipo(Columna::TEXTO);
    $col6->setAlineacionContenido(Columna::DERECHA);
    $col6->setAlineacionObjeto(Columna::DERECHA);
    $col6->setEsGrabable(true);
    $col6->setNombreCampo('obsins');
    
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);

    $this->obj = $opciones->getConfig(array());
    
  }
  
  
}
