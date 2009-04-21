<?php

/**
 * biedisactinm actions.
 *
 * @package    siga
 * @subpackage biedisactinm
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class biedisactinmActions extends autobiedisactinmActions
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
    $this->bndisinm = $this->getBndisinmOrCreate();
    $this->setVars();
    $this->tipos = $this->CargarTipos();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateBndisinmFromRequest();

       if ($this->saveBndisinm($this->bndisinm)==-1)

         {

          $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

          if ($this->getRequestParameter('save_and_add'))
          {
            return $this->redirect('biedisactinm/create');
          }
          else if ($this->getRequestParameter('save_and_list'))
          {
            return $this->redirect('biedisactinm/list');
          }
          else
          {
            return $this->redirect('biedisactinm/edit?id='.$this->bndisinm->getId());
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

public function setVars()
  {
      $this->mascaracatalogo = Herramientas::getX_vacio('codins','bndefins','ForAct','001');
      $this->mascaraformatoubi = Herramientas::getX_vacio('codins','bndefins','ForUbi','001');
      $this->mascaralonformato = Herramientas::getX_vacio('codins','bndefins','LonAct','001');
      $this->mascaralonubicacion = Herramientas::getX_vacio('codins','bndefins','LonUbi','001');
  }



  public function executeAjax()
  {
     $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');

    if ($this->getRequestParameter('ajax')=='1')
      {
        $c = new Criteria();
        $c->add(BnreginmPeer::CODINM,$this->getRequestParameter('codigo'));
        $bnreginm = BnreginmPeer::doSelectOne($c);

        if($bnreginm) $output = '[["'.$cajtexmos.'","'.$bnreginm->getCodact().'",""],["'.$cajtexcom.'","'.$bnreginm->getDesinm().'"],["bndisinm_codubiori","'.$bnreginm->getCodubi().'"],["bndisinm_desubiori","'.$bnreginm->getDesubi().'"]]';
        else $output = '[["'.$cajtexmos.'","",""],["'.$cajtexcom.'","'.Constantes::REGVACIO.'"]]';

      }
      else if($this->getRequestParameter('ajax')=='2')
      {
        $dato=BnreginmPeer::getDescrinm($this->getRequestParameter('codigo'),$cajtexcom);
        $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
      }

      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
  }

  protected function updateBndisinmFromRequest()
  {
    $bndisinm = $this->getRequestParameter('bndisinm');

    if (isset($bndisinm['codact']))
    {
      $this->bndisinm->setCodact($bndisinm['codact']);
    }
    if (isset($bndisinm['codmue']))
    {
      $this->bndisinm->setCodmue($bndisinm['codmue']);
    }
    if (isset($bndisinm['desinm']))
    {
      $this->bndisinm->setDesinm($bndisinm['desinm']);
    }
    if (isset($bndisinm['nrodisinm']))
    {
      $this->bndisinm->setNrodisinm($bndisinm['nrodisinm']);
    }
    if (isset($bndisinm['tipdisinm']))
    {
      $this->bndisinm->setTipdisinm($bndisinm['tipdisinm']);
    }
    if (isset($bndisinm['motdisinm']))
    {
      $this->bndisinm->setMotdisinm($bndisinm['motdisinm']);
    }
    if (isset($bndisinm['fecdisinm']))
    {
      if ($bndisinm['fecdisinm'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bndisinm['fecdisinm']))
          {
            $value = $dateFormat->format($bndisinm['fecdisinm'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bndisinm['fecdisinm'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bndisinm->setFecdisinm($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bndisinm->setFecdisinm(null);
      }
    }
    if (isset($bndisinm['fecdevdis']))
    {
      if ($bndisinm['fecdevdis'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bndisinm['fecdevdis']))
          {
            $value = $dateFormat->format($bndisinm['fecdevdis'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bndisinm['fecdevdis'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bndisinm->setFecdevdis($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bndisinm->setFecdevdis(null);
      }
    }
    if (isset($bndisinm['mondisinm']))
    {
      $this->bndisinm->setMondisinm($bndisinm['mondisinm']);
    }
    if (isset($bndisinm['detdisinm']))
    {
      $this->bndisinm->setDetdisinm($bndisinm['detdisinm']);
    }
    if (isset($bndisinm['codubiori']))
    {
      $this->bndisinm->setCodubiori($bndisinm['codubiori']);
    }
    if (isset($bndisinm['desubiori']))
    {
      $this->bndisinm->setDesubiori($bndisinm['desubiori']);
    }
    if (isset($bndisinm['codubides']))
    {
      $this->bndisinm->setCodubides($bndisinm['codubides']);
    }
    if (isset($bndisinm['desubides']))
    {
      $this->bndisinm->setDesubides($bndisinm['desubides']);
    }
    if (isset($bndisinm['obsdisinm']))
    {
      $this->bndisinm->setObsdisinm($bndisinm['obsdisinm']);
    }

      $this->bndisinm->setStadisinm('A');

  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->bndisinm = $this->getBndisinmOrCreate();
    $this->updateBndisinmFromRequest();
    $this->tipos = $this->CargarTipos();
    $this->setVars();
    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function saveBndisinm($bndisinm)
  {
    $this->coderror = Inmuebles::Validar_biedisactinm($bndisinm->getFecdisinm(),$bndisinm->getFecdevdis());
    if ($this->coderror==-1)
    {
      if (!$bndisinm->getId())
      {
        self::GenerarComprobante(&$bndisinm, array());
        return Inmuebles::SalvarBiedisactinm($bndisinm);
      }
    }
    return $this->coderror;
  }


  public function GenerarComprobante($bndismue, $grid)
  {
      $concom=1;
      $form="sf_admin/biedisactinm/confincomgen";
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


  public function executeAjaxcomprobante()
  {
    $this->bndisinm = $this->getBndisinmOrCreate();
    $this->updateBndisinmFromRequest();

    $c = new Criteria();
    $c->add(BndisbiePeer::CODDIS,substr($this->bndisinm->getTipdisinm(),0,10));
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
        $c->add(BndefconiPeer::CODACT,$this->bndisinm->getCodact());
        $c->add(BndefconiPeer::CODINM,$this->bndisinm->getCodmue());
        $bndefcon = BndefconPeer::doSelectOne($c);

          if ($bndefcon){
            $c = new Criteria();
            $c->add(BnreginmPeer::CODACT,$this->bndisinm->getCodact());
            $c->add(BnreginmPeer::CODINM,$this->bndisinm->getCodmue());
            $bnreginm = BnreginmPeer::doSelectOne($c);
              if ($bnreginm)
              {
                  $x = Inmuebles::grabarComprobante($this->bndisinm,$bnreginm,&$comprobante,$desincorpora,$bndefcon);
                  $concom = $concom + 1;

                  $form = "sf_admin/biedisactinm/confincomgen";
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


  protected function deleteBndisinm($bndisinm)
  {
    return Inmuebles::EliminarBiedisactinm($bndisinm);
  }


}
