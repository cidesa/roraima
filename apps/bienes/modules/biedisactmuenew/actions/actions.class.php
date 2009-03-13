<?php

/**
 * biedisactmuenew actions.
 *
 * @package    siga
 * @subpackage biedisactmuenew
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class biedisactmuenewActions extends autobiedisactmuenewActions
{
	 private static $coderror=-1;

  public function CargarTipos()
  {
  $c = new Criteria();
  $lista_tip = BndisbiePeer::doSelect($c);

  $tipos = array();

  foreach($lista_tip as $obj_tip)
  {
    $tipos += array($obj_tip->getCoddis()." - ".$obj_tip->getDesdis() => $obj_tip->getCoddis()." - ".$obj_tip->getDesdis());
  }
  return $tipos;
    }

  public function executeEdit()
  {
    $this->bndismue = $this->getBndismueOrCreate();

    $this->tipos = $this->CargarTipos();
    $this->setVars();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateBndismueFromRequest();

     if ($this->saveBndismue($this->bndismue)==-1)
      {

	      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

	      if ($this->getRequestParameter('save_and_add'))
	      {
	        return $this->redirect('biedisactmuenew/create');
	      }
	      else if ($this->getRequestParameter('save_and_list'))
	      {
	        return $this->redirect('biedisactmuenew/list');
	      }
	      else
	      {
	        return $this->redirect('biedisactmuenew/edit?id='.$this->bndismue->getId());
	      }
     }
	    else
	      {
		          $this->labels = $this->getLabels();
		          $err = Herramientas::obtenerMensajeError($this->coderror);
	         	  $this->getRequest()->setError('',$err);
		          return sfView::SUCCESS;
	      }

    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }


  protected function updateBndismueFromRequest()
  {
    $bndismue = $this->getRequestParameter('bndismue');

    if (isset($bndismue['codact']))
    {
      $this->bndismue->setCodact($bndismue['codact']);
    }
    if (isset($bndismue['codmue']))
    {
      $this->bndismue->setCodmue($bndismue['codmue']);
    }
    if (isset($bndismue['desmue']))
    {
      $this->bndismue->setDesmue($bndismue['desmue']);
    }
    if (isset($bndismue['nrodismue']))
    {
      $this->bndismue->setNrodismue($bndismue['nrodismue']);
    }
    if (isset($bndismue['tipdismue']))
    {
      $this->bndismue->setTipdismue($bndismue['tipdismue']);
    }
    if (isset($bndismue['codmot']))
    {
      $this->bndismue->setCodmot($bndismue['codmot']);
    }
    if (isset($bndismue['desmot']))
    {
      $this->bndismue->setDesmot($bndismue['desmot']);
    }
    if (isset($bndismue['fecdismue']))
    {
      if ($bndismue['fecdismue'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bndismue['fecdismue']))
          {
            $value = $dateFormat->format($bndismue['fecdismue'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bndismue['fecdismue'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bndismue->setFecdismue($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bndismue->setFecdismue(null);
      }
    }
    if (isset($bndismue['fecdevdis']))
    {
      if ($bndismue['fecdevdis'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bndismue['fecdevdis']))
          {
            $value = $dateFormat->format($bndismue['fecdevdis'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bndismue['fecdevdis'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bndismue->setFecdevdis($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bndismue->setFecdevdis(null);
      }
    }
    if (isset($bndismue['mondismue']))
    {
      $this->bndismue->setMondismue($bndismue['mondismue']);
    }
    if (isset($bndismue['vidutil']))
    {
      $this->bndismue->setVidutil($bndismue['vidutil']);
    }
    if (isset($bndismue['detdismue']))
    {
      $this->bndismue->setDetdismue($bndismue['detdismue']);
    }
    if (isset($bndismue['codubiori']))
    {
      $this->bndismue->setCodubiori($bndismue['codubiori']);
    }
    if (isset($bndismue['desubiori']))
    {
      $this->bndismue->setDesubiori($bndismue['desubiori']);
    }
    if (isset($bndismue['codubides']))
    {
      $this->bndismue->setCodubides($bndismue['codubides']);
    }
    if (isset($bndismue['desubides']))
    {
      $this->bndismue->setDesubides($bndismue['desubides']);
    }
    if (isset($bndismue['obsdismue']))
    {
      $this->bndismue->setObsdismue($bndismue['obsdismue']);
    }
    $this->bndismue->setStadismue('A');

  }

  public function setVars()
  {
      $this->mascaracatalogo = Herramientas::getX_vacio('codins','bndefins','ForAct','001');
      $this->mascaraformatoubi = Herramientas::getX_vacio('codins','bndefins','ForUbi','001');
      $this->mascaralonformato = Herramientas::getX_vacio('codins','bndefins','LonAct','001');
      $this->mascaralonubicacion = Herramientas::getX_vacio('codins','bndefins','LonUbi','001');
  }

  public function executeAjax()
  {
     $cajtexmos    = $this->getRequestParameter('cajtexmos');
     $cajtexcom    = $this->getRequestParameter('cajtexcom');
     $cajtexubi    = $this->getRequestParameter('cajtexubi');
     $cajtexdesubi = $this->getRequestParameter('cajtexdesubi');

     if ($this->getRequestParameter('ajax')=='0')
      {
        $codmue=Herramientas::getX('codact','Bnregmue','codmue',$this->getRequestParameter('codigo'));
        $desmue=Herramientas::getX('codmue','Bnregmue','desmue',$codmue);
        $output = '[["'.$cajtexmos.'","'.$codmue.'",""],["'.$cajtexcom.'","'.$desmue.'"]]';
      }

    elseif ($this->getRequestParameter('ajax')=='1')
      {
        $codact = Herramientas::getX('codmue','Bnregmue','codact',$this->getRequestParameter('codigo'));
        $desmue = Herramientas::getX('codmue','Bnregmue','desmue',$this->getRequestParameter('codigo'));

        $codubi=Herramientas::getX('codact','Bnregmue','codubi',$codact);
        $desubi=Herramientas::getX('codubi','Bnubibie','desubi',$codubi);

        $output = '[["'.$cajtexmos.'","'.$codact.'",""],["'.$cajtexcom.'","'.$desmue.'"],["'.$cajtexubi.'","'.$codubi.'"],["'.$cajtexdesubi.'","'.$desubi.'"]]';

      }
      elseif ($this->getRequestParameter('ajax')=='2')
      {
        $codigo=str_pad($this->getRequestParameter('codigo'),4,"0",STR_PAD_LEFT);
        $dato=BnmotdisPeer::getDesmot($codigo);
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","4","c"]]';
      }
    elseif ($this->getRequestParameter('ajax')=='3')
      {
        $dato=BnubibiePeer::getDesubicacion($this->getRequestParameter('codigo'));
        $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
      }

        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
  }

 protected function saveBndismue($bndismue)
  {

    $this->coderror = Muebles::Validar_biedisactmuenew($bndismue->getFecdismue(),$bndismue->getFecdevdis());
    if ($this->coderror==-1)
    {
    $bndismue->save();
    return $this->coderror;
    }


    return $this->coderror;

  }

public function handleErrorEdit()
  {
    $this->preExecute();
    $this->bndismue = $this->getBndismueOrCreate();
    $this->setVars();
    $this->tipos = $this->CargarTipos();
    $this->updateBndismueFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

}
