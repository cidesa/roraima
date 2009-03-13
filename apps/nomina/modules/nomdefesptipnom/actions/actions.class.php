<?php

/**
 * nomdefesptipnom actions.
 *
 * @package    siga
 * @subpackage nomdefesptipnom
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefesptipnomActions extends autonomdefesptipnomActions
{
  public function executeEdit()
  {
    $this->npnomina = $this->getNpnominaOrCreate();
    $this->listafrecpag = Constantes::ListaFrecuenciaPago();
    $this->listagenordpag = Constantes::ListaGeneraOrdenPago();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpnominaFromRequest();

      $this->saveNpnomina($this->npnomina);

      $this->npnomina->setId(Herramientas::getX_vacio('codnom','npnomina','id',$this->npnomina->getCodnom()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefesptipnom/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefesptipnom/list');
      }
      else
      {
        return $this->redirect('nomdefesptipnom/edit?id='.$this->npnomina->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }


 protected function updateNpnominaFromRequest()
  {
    $npnomina = $this->getRequestParameter('npnomina');
    $this->listafrecpag = Constantes::ListaFrecuenciaPago();
		$this->listagenordpag = Constantes::ListaGeneraOrdenPago();

    if (isset($npnomina['codnom']))
    {
      $this->npnomina->setCodnom(str_pad($npnomina['codnom'], 3, '0', STR_PAD_LEFT));
    }
    if (isset($npnomina['nomnom']))
    {
      $this->npnomina->setNomnom($npnomina['nomnom']);
    }
    if (isset($npnomina['frecal']))
    {
      $this->npnomina->setFrecal($npnomina['frecal']);
    }
    if (isset($npnomina['ultfec']))
    {
      if ($npnomina['ultfec'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($npnomina['ultfec']))
          {
            $value = $dateFormat->format($npnomina['ultfec'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $npnomina['ultfec'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->npnomina->setUltfec($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npnomina->setUltfec(null);
      }
    }
    if (isset($npnomina['profec']))
    {
      if ($npnomina['profec'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($npnomina['profec']))
          {
            $value = $dateFormat->format($npnomina['profec'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $npnomina['profec'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->npnomina->setProfec($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npnomina->setProfec(null);
      }
    }
    if (isset($npnomina['numsem']))
    {
      $this->npnomina->setNumsem($npnomina['numsem']);
    }
    if (isset($npnomina['ordpag']))
    {
      $this->npnomina->setOrdpag($npnomina['ordpag']);
    }
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->npnomina = $this->getNpnominaOrCreate();
    try{ $this->updateNpnominaFromRequest();}catch(Exception $ex){}


    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  public function executeDelete()
  {
    $this->npnomina = NpnominaPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->npnomina);


    $id=$this->getRequestParameter('id');
    $c= new Criteria();
    $c->add(NpasicarnomPeer::CODNOM,$this->npnomina->getCodnom());
    $dato=NpasicarnomPeer::doSelect($c);
    if (!$dato)
    {
      $c= new Criteria();
      $c->add(NpdefmovPeer::CODNOM,$this->npnomina->getCodnom());
      $dato2=NpdefmovPeer::doSelect($c);
      if (!$dato2)
      {
      	$this->deleteNpnomina($this->npnomina);
      }
      else
      {
      	$this->setFlash('notice','Esta Nómina esta asociada a Definición de Movimientos.');
        return $this->redirect('nomdefesptipnom/edit?id='.$id);
      }
    }
    else
    {
      $this->setFlash('notice','Esta Nómina ya tiene Cargos asignados.');
      return $this->redirect('nomdefesptipnom/edit?id='.$id);
    }
    return $this->redirect('nomdefesptipnom/list');
  }
}
