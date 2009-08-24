<?php

/**
 * almdefart actions.
 *
 * @package    siga
 * @subpackage almdefart
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almdefartActions extends autoalmdefartActions
{
  public  $coderror1=-1;
  public  $coderror2=-1;


    public function validateEdit()
    { $resp=-1;
 /*     if($this->getRequest()->getMethod() == sfRequest::POST)
      {
        $this->cadefart = $this->getCadefartOrCreate();
        $this->updateCadefartFromRequest();

        Articulos::validarAlmdefart($this->cadefart,&$msj1,&$msj2);
        $this->coderror1=$msj1;
        $this->coderror2=$msj2;
        if ($this->coderror1<>-1 || $this->coderror2<>-1){
          return false;
        }else return true;
      }else return true;*/
      return true;
    }

  public function executeIndex()
  {
  	$c= new	Criteria();
  	$c->add(CadefartPeer::CODEMP,'001');
  	$data=CadefartPeer::doSelectOne($c);
    if ($data)
    { $id=$data->getId();
    return $this->redirect('almdefart/edit?id='.$id);
    }
    else { return $this->redirect('almdefart/edit');}
  }

  public function executeEdit()
  {
    $this->cadefart = $this->getCadefartOrCreate();
    $this->setVars();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCadefartFromRequest();

      $this->saveCadefart($this->cadefart);

      $this->cadefart->setId(Herramientas::getX_vacio('codemp','cadefart','id',$this->cadefart->getCodemp()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('almdefart/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('almdefart/list');
      }
      else
      {
        return $this->redirect('almdefart/edit?id='.$this->cadefart->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function handleErrorEdit()
  {
  $this->preExecute();
  $this->cadefart = $this->getCadefartOrCreate();
  $this->updateCadefartFromRequest();
  $this->labels = $this->getLabels();

  if($this->getRequest()->getMethod() == sfRequest::POST)
  {
   if($this->coderror1!=-1)
     {
       $err = Herramientas::obtenerMensajeError($this->coderror1);
   //  $this->getRequest()->setError('cadefart{corcom}',$err);
     }

     if($this->coderror2!=-1)
     {
       $erro = Herramientas::obtenerMensajeError($this->coderror2);
    // $this->getRequest()->setError('cadefart{corser}',$erro);
     }
  }
    return sfView::SUCCESS;
  }

  protected function saveCadefart($cadefart)
  {
     Articulos::salvarAlmdefart($cadefart,$this->getRequestParameter('cadefart[corcom]'),$this->getRequestParameter('cadefart[correc2]'),$this->getRequestParameter('cadefart[correq2]'),$this->getRequestParameter('cadefart[cordes2]'),$this->getRequestParameter('cadefart[corser]'),$this->getRequestParameter('cadefart[corsol]'),$this->getRequestParameter('cadefart[corcot2]'),$this->getRequestParameter('cadefart[corent]'),$this->getRequestParameter('cadefart[corsal]'));
  }

  protected function updateCadefartFromRequest()
  {
    $cadefart = $this->getRequestParameter('cadefart');
    $this->setVars();

    if (isset($cadefart['codemp']))
    {
      $this->cadefart->setCodemp($cadefart['codemp']);
    }
    if (isset($cadefart['nomemp']))
    {
      $this->cadefart->setNomemp($cadefart['nomemp']);
    }
    if (isset($cadefart['diremp']))
    {
      $this->cadefart->setDiremp($cadefart['diremp']);
    }
    if (isset($cadefart['tlfemp']))
    {
      $this->cadefart->setTlfemp($cadefart['tlfemp']);
    }
    if (isset($cadefart['lonart']))
    {
      $this->cadefart->setLonart($cadefart['lonart']);
    }
    if (isset($cadefart['rupart']))
    {
      $this->cadefart->setRupart($cadefart['rupart']);
    }
    if (isset($cadefart['forart']))
    {
      $this->cadefart->setForart($cadefart['forart']);
    }
    if (isset($cadefart['desart']))
    {
      $this->cadefart->setDesart($cadefart['desart']);
    }
    if (isset($cadefart['forubi']))
    {
      $this->cadefart->setForubi($cadefart['forubi']);
    }
    if (isset($cadefart['desubi']))
    {
      $this->cadefart->setDesubi($cadefart['desubi']);
    }
  /*  if (isset($cadefart['generaop']))
    {
      $this->cadefart->setGeneraop($cadefart['generaop']);
    }
    if (isset($cadefart['generacom']))
    {
      $this->cadefart->setGeneracom($cadefart['generacom']);
    }*/
    if (isset($cadefart['asiparrec']))
    {
      $this->cadefart->setAsiparrec($cadefart['asiparrec']);
    }
    if (isset($cadefart['prcasopre']))
    {
      $this->cadefart->setPrcasopre($cadefart['prcasopre']);
    }
    if (isset($cadefart['prcreqapr']))
    {
      $this->cadefart->setPrcreqapr($cadefart['prcreqapr']);
    }
    if (isset($cadefart['comasopre']))
    {
      $this->cadefart->setComasopre($cadefart['comasopre']);
    }
    if (isset($cadefart['comreqapr']))
    {
      $this->cadefart->setComreqapr($cadefart['comreqapr']);
    }
     if (isset($cadefart['almcorre']))
    {
      $this->cadefart->setAlmcorre($cadefart['almcorre']);
    }
    if (isset($cadefart['forsnc']))
    {
      $this->cadefart->setForsnc($cadefart['forsnc']);
    }
    if (isset($cadefart['dessnc']))
    {
      $this->cadefart->setDessnc($cadefart['dessnc']);
    }
    if (isset($cadefart['reqreqapr']))
    {
      $this->cadefart->setReqreqapr($cadefart['reqreqapr']);
    }
    if (isset($cadefart['solreqapr']))
    {
      $this->cadefart->setSolreqapr($cadefart['solreqapr']);
    }
    if (isset($cadefart['gencorart']))
    {
      $this->cadefart->setGencorart($cadefart['gencorart']);
    }
    if (isset($cadefart['tipdocpre']))
    {
      $this->cadefart->setTipdocpre($cadefart['tipdocpre']);
    }

  }

  protected function getCadefartOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $cadefart = new Cadefart();
    }
    else
    {
      $cadefart = CadefartPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($cadefart);
    }

    return $cadefart;
  }

  public function setVars()
  {
    $c = new Criteria();
    $datos=CaregartPeer::doselect($c);
    if ($datos)
    { $this->esta='1';}
    else { $this->esta='0';}

    $c = new Criteria();
    $dato=CadefubiPeer::doselect($c);
    if ($dato)
    { $this->esta1='1';}
    else { $this->esta1='0';}

    $c = new Criteria();
    $data=CacatsncPeer::doselect($c);
    if ($data)
    { $this->esta2='1';}
    else { $this->esta2='0';}

  }

  public function executeAjax()
  {
   if ($this->getRequestParameter('ajax')=='1')
   {
   	$output = '[["","",""]';
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $codigo=$this->getRequestParameter('codigo');
    if ($codigo!="")
    {
	    $c= new Criteria();
	    $c->add(CpdocprcPeer::TIPPRC,$codigo);
	    $result=CpdocprcPeer::doSelectOne($c);
	    if ($result)
	    {
	      $dato=$result->getNomext();
	      $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	    }
	    else
	    {
	      $javascript="alert('El código no existe...');$('cadefart_tipdocpre').value=''";
	      $dato="";
	      $output = '[["javascript","'.$javascript.'",""],["'.$cajtexmos.'","'.$dato.'",""]]';
	    }
    }

     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;
   }
  }
}
