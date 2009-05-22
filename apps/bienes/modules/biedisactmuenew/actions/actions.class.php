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
   public  $coderror1=-1;

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

        $codubi=Herramientas::getX('codmue','Bnregmue','codubi',$this->getRequestParameter('codigo'));
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


  public function executeAjaxcomprobante()
  {
    $this->bndismue = $this->getBndismueOrCreate();
    $this->updateBndismueFromRequest();

    $c = new Criteria();
    $c->add(BndisbiePeer::CODDIS,substr($this->bndismue->getTipdismue(),0,10));
    $bndisbie = BndisbiePeer::doSelectOne($c);

    if ($bndisbie){
      if ($bndisbie->getDesinc()=='S'){

        $desincorpora = true;
      }else{
        $desincorpora = false;
      }

               $concom   = 0;
               $mensaje1 = "";
               $msj1     = "";
               $msj2     = "";
               $cuentaporpagarrendicion = "";
               $mensajeuno  = "";
               $msjuno      = "";
               $msjdos      = "";
               $msjtres     = "";
               $comprobante = "";
               $this->mensajeuno = "";
               $this->msj1     = "";
               $this->msj2     = "";
               $this->mensaje1 = "";
               $this->msjuno   = "";
               $this->msjdos   = "";
               $this->msjtres  = "";
               $this->i        = "";
               $this->formulario = array();

      if ($bndisbie->getAfecon()=='S'){
        $c = new Criteria();
        $c->add(BndefconPeer::CODACT,$this->bndismue->getCodact());
        $c->add(BndefconPeer::CODMUE,$this->bndismue->getCodmue());
        $bndefcon = BndefconPeer::doSelectOne($c);

          if ($bndefcon){
            $c = new Criteria();
            $c->add(BnregmuePeer::CODACT,$this->bndismue->getCodact());
            $c->add(BnregmuePeer::CODMUE,$this->bndismue->getCodmue());
            $bnregmue = BnregmuePeer::doSelectOne($c);
              if ($bnregmue)
              {
                  $x = Muebles::grabarComprobante($this->bndismue,$bnregmue,&$comprobante,$desincorpora,$bndefcon);
                  $concom = $concom + 1;

                  $form = "sf_admin/biedisactmuenew/confincomgen";
                  $i    = 0;
                  while ($i < $concom)
                  {
                     $f[$i] = $form.$i;
                     $this->getUser()->setAttribute('grabar',$comprobante[$i]->getGrabar(),$f[$i]);
                     $this->getUser()->setAttribute('reftra',$comprobante[$i]->getReftra(),$f[$i]);
                     $this->getUser()->setAttribute('numcomp',$comprobante[$i]->getNumcom(),$f[$i]);
                     $this->getUser()->setAttribute('fectra',$comprobante[$i]->getFectra(),$f[$i]);
                     $this->getUser()->setAttribute('destra',$comprobante[$i]->getDestra(),$f[$i]);
                     $this->getUser()->setAttribute('ctas', $comprobante[$i]->getCtas(),$f[$i]);
                     $this->getUser()->setAttribute('desctas', $comprobante[$i]->getDesc(),$f[$i]);
                     $this->getUser()->setAttribute('tipmov', '');
                     $this->getUser()->setAttribute('mov', $comprobante[$i]->getMov(),$f[$i]);
                     $this->getUser()->setAttribute('montos', $comprobante[$i]->getMontos(),$f[$i]);
                     $i++;
                  }
                  $this->i = $concom - 1;
                  $this->formulario = $f;

              // }
              }
            }else{
              $this->msjtres="El Activo de esta Disposicion genera un Movimiento contable, pero este no puede ser realizado ya que dicho Activo no tiene Definicion Contable";
            }
          }else{
            $this->msjtres="No se Puede Generar el Movimiento Contable por el Tipo de Definicion de este Movimiento.";
        }
    }else{
      $this->msjtres="Este movimiento esta definido, que no se pueda generar movimiento contable";
    }

      $output =  '[["","",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
  }


 protected function saveBndismue($bndismue)
  {

    $this->coderror = Muebles::Validar_biedisactmuenew($bndismue->getFecdismue(),$bndismue->getFecdevdis());
    if ($this->coderror==-1)
    {
      if (!$bndismue->getId())
      {
        self::GenerarComprobante(&$bndismue, array());
        return Muebles::SalvarBiedisactmuenew($bndismue);
      }
    }
    return $this->coderror;
  }


  public function GenerarComprobante($bndismue, $grid)
  {
      $concom=1;
      $form="sf_admin/biedisactmuenew/confincomgen";
      $grabo=$this->getUser()->getAttribute('grabo',null,$form.'0');
      $numerocomp=$this->getUser()->getAttribute('contabc[numcom]',null,$form.'0');
      if ($grabo=='S')
      {
        $i=0;
        while ($i<$concom)
        {
         $formulario[$i]=$form.$i;
         if ($this->getUser()->getAttribute('grabo',null,$formulario[$i])=='S')
         {
          $numcom=$this->getUser()->getAttribute('contabc[numcom]',null,$formulario[$i]);
          $reftra=$this->getUser()->getAttribute('contabc[reftra]',null,$formulario[$i]);
          $feccom=$this->getUser()->getAttribute('contabc[feccom]',null,$formulario[$i]);
          $descom=$this->getUser()->getAttribute('contabc[descom]',null,$formulario[$i]);
          $debito=$this->getUser()->getAttribute('debito',null,$formulario[$i]);
          $credito=$this->getUser()->getAttribute('credito',null,$formulario[$i]);
          $grid=$this->getUser()->getAttribute('grid',null,$formulario[$i]);

          $this->getUser()->getAttributeHolder()->remove('contabc[numcom]',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('contabc[reftra]',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('contabc[feccom]',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('contabc[descom]',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('debito',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('credito',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('grid',$formulario[$i]);

          $this->numero = Comprobante::SalvarComprobante($numcom,$reftra,$feccom,$descom,$debito,$credito,$grid,$this->getUser()->getAttribute('grabar',null,$formulario[$i]));

          //$bndismue->setNumcom($this->numero);
         }
         $i++;
        }
      }
      $this->getUser()->getAttributeHolder()->remove('grabo',$form.'0');

     // $grid=Herramientas::CargarDatosGridv2($this,$this->objeto,true);

  }

public function handleErrorEdit()
  {
    $this->preExecute();
    $this->bndismue = $this->getBndismueOrCreate();
    $this->setVars();
    $this->tipos = $this->CargarTipos();
    $this->updateBndismueFromRequest();

    $this->labels = $this->getLabels();

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror1!=-1)
      {
      	if($this->coderror1==529)
      	{
      	  $err = Herramientas::obtenerMensajeError($this->coderror1);
          $this->getRequest()->setError('bndismue{fecdismue}',$err);
      	}
      	if($this->coderror1==521)
      	{
      	  $err = Herramientas::obtenerMensajeError($this->coderror1);
          $this->getRequest()->setError('bndismue{fecdismue}',$err);
      	}
      	if($this->coderror1==530)
      	{
      	  $err = Herramientas::obtenerMensajeError($this->coderror1);
          $this->getRequest()->setError('bndismue{fecdevdis}',$err);
      	}
        if($this->coderror1==508)
      	{
      	  $err = Herramientas::obtenerMensajeError($this->coderror1);
          $this->getRequest()->setError('',$err);
      	}
      }
    }

    return sfView::SUCCESS;
  }

  protected function deleteBndismue($bndismue)
  {
    return Muebles::EliminarBiedisactmuenew($bndismue);
  }

  public function validateEdit()
  {
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->bndismue = $this->getBndismueOrCreate();
      try{ $this->updateBndismueFromRequest();}catch(Exception $ex){}
      if ($this->getRequestParameter('bndismue[fecdismue]')!="")
      {
      if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('bndismue[fecdismue]'))==true)
  	  {
        $this->coderror1=529;
        return false;
  	  }

      if (Tesoreria::validarFechaPerContable($this->getRequestParameter('bndismue[fecdismue]')))
      {
	    $this->coderror1=521;
	    return false;
	  }
       if ($this->getRequestParameter('bndismue[fecdevdis]')!=""){
		if (Tesoreria::validarFechaMayorMenor($this->getRequestParameter('bndismue[fecdismue]'),$this->getRequestParameter('bndismue[fecdevdis]'),'>'))
		{
		  $this->coderror1=530;
		  return false;
		}
       }
      }

	    /*  if (self::validarGeneraComprobante())
	      {
		    $this->coderror1=508;
		    return false;
		  }*/

      return true;
    }else return true;
  }

  public function validarGeneraComprobante()
  {
    $form="sf_admin/biedisactmuenew/confincomgen";
    $grabo=$this->getUser()->getAttribute('grabo',null,$form.'0');

    if ($grabo=='')
    { return true;}
    else { return false;}
  }

}
